<?php
require_once(BASE_CONTROLLER);
/*
*
*user controller
*/

Class userController extends Controller {
	public function __construct()
	{
		// No one is accessing UserController functions without being logged in 
		$this->lockdown();
	}
/**
*
* @param Takes a User ID
* @return Returns a  the view showcasing all the images from a certain user
*/
public function get_all_images($id)
{
	require_once(MODELS . '/User.php');
	require_once(MODELS . '/Image.php');
	$model = Model::factory('User')->find_one($id);
	$images = $model->images()->find_many();
	foreach( $images as $image)
	{
		$tags = $image->get_tags();
		$tag_array = array();
		if (count($tags) >= 3)
		{
			for ($i = 0; $i < 3; $i++)
			{
				array_push($tag_array, $tags[$i]);
			}
		}
		else
		{
			$count = count($tags);
			for ($i = 0; $i < $count; $i++ )
			{
				array_push($tag_array, $tags[$i]);
			}
		}
		$image->tags = $tag_array;

	}

	return_view('store/store.user_images.php', ['images' => $images, 'username'=>$model->username]);
}

/**
*
*
* @return The view for Terms and Conditions
*/
public function terms()
{
	return_view('view.terms_and_conditions.php');
}

/*
*
* Returns image_manager front page selector area
*/
public function image_manager()
{
	return_view('store/store.image_manager.php');
}

/**
*
* @return view with all images sold my current user that's logged in
* @param none
*/
public function sold()
{
	require_once(MODELS . '/User.php');
	$user = new User();
	$sold = $user->get_sold_images();
	$sub = $user->get_sub_images(); 
	$array = array('sold'=>$sold, 'sub'=> $sub);
	return_view('store/store.sold.php', $array);
}


/*
*
* Brings up view to pay for subscription
*/
public function subscription_pay()
{
	var_dump($_POST);
	$plan = $_POST['plan'];
	$sub = ORM::for_table('subscription_details')->where('subscription_id', $plan)->find_one();
	return_view('store/store.subscription_pay.php', $sub);
}
/*
* Brings up register view
*/
public function register(){
	return_view('view.register.php', $sub);
}
/*
* Call model's create_new function
*/
public function create_new(){
	if (isset($_POST['agree']) && $_POST['agree'] == 'on')
	{
	if (empty($_POST['username']))
	{
		return_view('view.register.php');
		sys_msg('You need to select a username!');
		return;
	}
	if ($this->validate($_POST['email'], 'email'))
	{	
		//define post data
		$username = $_POST['username'];
		$email = $_POST['email'];
		$password = $_POST['password'];
		require_once(MODELS . '/User.php');
		$model = new User();
		if($model->create_new($username,$email,$password))
		{
			return_view('view.home.php');
			user_msg('New User created successfully!');
		}
		else  
		{
			return_view('view.home.php');
			sys_msg('Something went wrong and the user was not added');
		}
	}
	else
	{
		return_view('view.register.php');
		sys_msg('email is invalid');
	}
}
	else
	{
		return_view('view.register.php');
		sys_msg('You need to agree to our Terms of Service in order to register!');
	}
}
/*
* Call model's get_user_posts() function   ** Why did I do this? It should be some one->toMany relationship to the posts model::: i think
*/
public function get_user_posts()
{
	require_once(MODELS . '/User.php');
	$model = new User();
	$results = $model->get_user_posts();
	if ($results)
	{
		return_view('view.user_posts.php', $results);
	}
}
/*
* Gets login view
*/
public function login()
{
	return_view('view.login.php');
}
/*
* Verifies user's creds through model, set's session vars related to user
*/
public function verify()
{
	// Define User Email and Password
	$email = $_POST['email'];
	$password = $_POST['password'];
	// Check to see if there is a reroute form element set from login form
	if (!empty($_POST['reroute']))
	{
		$reroute = $_POST['reroute'];
	}
	else
	{
		$reroute = NULL;
	}
	// Instantiate User class
	require_once(MODELS . '/User.php');
	$model = new User();
	// Test to make sure Email and Password are actually filled in??? -- don't know why I didn't test up there where they're defined
	if (!empty($email) && !empty($password))
	{
		// User Model verifies email/password combo
		$user = $model->verify($email,$password);
		// If there's a match continue	
		if ($user)
		{
			// Sets session variables for the user   
			$_SESSION['sub_count'] = $this->subscription_count($user->id);   //$_SESSION['sub_count'] is a point system for subscriptions
			$_SESSION['user_info'] = $user;     // Should I have this set as only USER_ID and not all the fucking info?
			$_SESSION['logged_in'] = 1;  // Easy way to see if someone is logged in, although I never use it
			// ** NEW TODAY **
			// If $reroute is active, send the user to that page
			if ($reroute !== NULL)
			{
				header("Location: $reroute");
				user_msg('login successful');
			}
			// no $reroute? send use to home page
			else
			{
				header('Location: /home');
				user_msg('login successful');
			}
		}
		// no match? send back to login page, also include $reroute var, if it's null it won't matter right?
		else
		{
			return_view('view.login.php', $reroute);
			sys_msg('Incorrect Credentials');
		}
	}
	// Fields are empty send em back, include $reroute again
	else
	{
		return_view('view.login.php', $reroute);
		sys_msg('One of the login fields is empty!');
	}
}
/*
* Call model's info function (don't know where I'm using this?)
*/
public function info($id)
{
	require_once(MODELS .'/User.php');
	require_once(MODELS . '/Image.php');
	$user = Model::factory('User')->find_one($id);
	$images = $user->images()->find_many();
	$image_count = count($images);
	$user->image_count = $image_count;
	return_view('view.user_info.php',$user);
}
/*
* Calls logout function from model
*/
public function logout()
{
	require_once(MODELS . '/User.php');
	$model = new User();
	if ($model->logout())
	{
		return_view('view.home.php');
		user_msg('Successfully Logged Out!');
	}
}
/*
* Calls edit_profile function
*/ 
public function edit_profile()
{
	$id = $_SESSION['user_info']->id;
	require_once(MODELS . '/User.php');
	$model = new User();
	$profile = $model->profile();
	if ($profile)
	{
		return_view('view.edit_profile.php', $profile);
	}
	else
	{
		sys_msg('there was an error retrieving User information');
	}
}

/*
* prepares data and sends it to validate() inherent function
* I think this may be able to be avoided with careful structuring of
* the actual validate() function
* leaving it for now
*/
public function validate_file($function)
{

	$file = $_FILES['user_avatar']['tmp_name'];
	$validate = $this->validate($file, 'image');
	$function = $this->$function();
	if ($validate)
	{
		$function;
	}
	
}
public function get_all()
{
	require_once(MODELS . '/User.php');
	$model = new User();
	$users = $model->get_all();
	return_view('admin/admin.user_manager.php', $users);
}
public function new_password()
{
	return_view('view.change_password.php');
}
public function change_password()
{
	$new_password = $_POST['new_password'];
	$new_verify = $_POST['new_verify'];
	if ($new_password === $new_verify)
	{
	$email = $_POST['email'];
	$old_password = $_POST['old_password'];
	$user_id = $_SESSION['user_info']['id'];
	require_once(MODELS . '/User.php');
	$model = new User();
	if ($model->verify($email, $old_password))
	{
		if($model->change_password($user_id, $new_password))
		{
			return_view('view.change_password.php');
			user_msg('Password changed successfully!');
		}
	}
	}
	else
	{
		return_view('view.change_password.php');
		sys_msg('Your new passwords did not match!');
	}

}
public function get_images($user_id = null)
{
	if (empty($user_id))
	{
		$user_id = $_SESSION['user_info']['id'];
	}
	require_once(MODELS . '/User.php');
	require_once(MODELS . '/Image.php');
	require_once(MODELS . '/Category.php');
	$model = Model::factory('User')->find_one($user_id);
	$images = $model->images()->find_many();

	$images = array('user_images' => $images);

	return_view('store/store.collection_manager.php', $images);

}
/**
* 
* @param none
* @return View of current User's purchased images
*/
public function purchased()
{
		$user_id = $_SESSION['user_info']['id'];
		require_once(MODELS . '/User.php');
		$user = Model::factory('User')->find_one($user_id);
		$results = $user->purchased();
		require_once(MODELS . '/Image.php');
		$image_model = new Image();
		$images = array();
		foreach ($results as $result)
		{
			$stuff = Model::factory('Image')->find_one($result->image_id);
			array_push($images, $stuff);
		}
		return_view('store/store.purchased.php', $images);
}
/*
*
* count how many downloads left for the month with current subscription
*
*/

public function subscription_count($user_id)
{
	
		require_once(MODELS . '/User.php');
		$model = Model::factory('User')->find_one($user_id);
		$count = $model->subscription_count();
		return $count;
}

/*
*
* Calls post_manager view
*
*/

}
