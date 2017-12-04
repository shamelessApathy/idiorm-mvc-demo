<?php
require_once(BASE_CONTROLLER);
class profileController extends Controller {
	public function user_id()
	{
		return $_SESSION['user_info']->id;
	}
	public function edit_logo()
	{
		return_view('view.edit_logo.php');
	}
	public function create()
	{
		
		$profile_info = $_POST;
		require_once(MODELS . '/Profile.php');
		$model = new Profile();
		$result = $model->create($profile_info);
		var_dump($result);
	}
	public function profile_create()
	{
		return_view('view.profile_create.php');
	}
	public function profile_avatar()
	{
		return_view('view.profile_avatar.php');
	}
	public function options()
	{
		$user_id = $_SESSION['user_info']['id'];
		$model = require_once(MODELS . '/Profile.php');
		$exists = Model::factory('Profile')->where('user_id',$user_id)->find_one();
		return_view('view.profile_options.php', $exists);
	}
	public function edit_profile($bool = null)
	{
		require_once(MODELS . "/User.php");
		require_once(MODELS . '/Profile.php');
		$user_id = $_SESSION['user_info']->id;
		$user = Model::factory('User')->find_one($user_id);
		$profile =$user->profile()->find_one();
		return_view('view.edit_profile.php', $profile);
		if ($bool === true)
		{
			user_msg('Profile Update Successfully!');
		}
	}
	public function update()
	{
		$id = $_SESSION['user_info']->id;
		$firstname = $_POST['first_name'];
		$middlename = $_POST['middle_name'];
		$lastname = $_POST['last_name'];
		$dob = $_POST['month'] . '/' . $_POST['day'] . '/' . $_POST['year'];
		#$streetaddress = $_POST['street_address'];
		$city = $_POST['city'];
		$state = $_POST['state'];
		#$zipcode = $_POST['zip_code'];
		$country = $_POST['country'];
		$website = $_POST['website'];
		$bio = $_POST['bio'];
		$info = array(
			'user_id' =>$id, 
			'first_name' => $firstname, 
			'middle_name' => $middlename, 
			'last_name' => $lastname, 
			'dob' => $dob, 
			#'street_address' => $streetaddress, 
			'city' => $city, 
			'state' => $state, 
			#'zip_code' => $zipcode, 
			'country'=>$country,
			'bio'=>$bio,
			'website'=>$website);
		require_once(MODELS . '/Profile.php');
		$model = new Profile();
		if($model->update($info))
		{
			$this->edit_profile(true);
		}
		else
		{
			$this->edit_profile(false);
		}
	}
	/**
	*
	* @param Paypal/Stripe/Squarepay
	* @return bool true on success
	*/
	public function edit_merchant()
	{
		require_once(MODELS . '/Profile.php');
		$user_id = $_SESSION['user_info']['id'];
		$profile = Model::factory('Profile')->find_one($user_id);
		$merchant = $_POST['merchant'];
		if ($merchant == 'paypal')
		{
			$profile->merchant = 1;
			$profile->merchant_account = $_POST['account-name'];
		}
		if ($merchant == 'squarepay')
		{
			$profile->merchant = 2;
			$profile->merchant_account = $_POST['account-name'];
		}
		$profile->save();
		$this->edit_profile(true);
	}
/*
* calls set_avatar function
*/
	public function set_avatar()
	{
		if (empty($_FILES['user_avatar']['error']))
		{
			$orig = $_FILES['user_avatar']['name'];
			$file = $_FILES['user_avatar']['tmp_name'];
			$nodir = explode('/', $file);
			$nodir = $nodir[2];
			$orig = explode('.',$orig);
			$ext = '.' . $orig[1];
			$save_path = ROOT . "/users/avatars/";
			
			$myname = $nodir; //You are renaming the file here
			$newpath = '/users/avatars/'.$myname.$ext;
		}
		else
		{
			return_view('view.edit_profile.php');
			sys_msg('Need to select a file for your avatar');
		}
  		if(move_uploaded_file($_FILES['user_avatar']['tmp_name'], $save_path.$myname.$ext))
  		{
  			require_once(MODELS .  '/User.php');
			$user_id = $_SESSION['user_info']['id'];
			$model = Model::factory('User')->find_one($user_id);
			$model->avatar = $newpath;
			$model->save();
			$_SESSION['user_info']['avatar'] = $newpath;
			header('Location: /profile/edit_profile');
		}
	}
	public function set_logo()
	{
		require_once(MODELS . '/Profile.php');
		$profile = Model::factory('Profile')->where('user_id',$this->user_id())->find_one();
		$orig = $_FILES['artist-logo']['name'];
			$file = $_FILES['artist-logo']['tmp_name'];
			$nodir = explode('/', $file);
			$nodir = $nodir[2];
			$orig = explode('.',$orig);
			$ext = '.' . $orig[1];
			$save_path = ROOT . "/users/logos/";
			
			$myname = $nodir; //You are renaming the file here
			$newpath = '/users/logos/'.$myname.$ext;
			if(move_uploaded_file($_FILES['artist-logo']['tmp_name'], $save_path.$myname.$ext))
	  		{
				$profile->logo = $newpath;
				$profile->save();
				$_SESSION['user_info']['logo'] = $newpath;
				$this->edit_logo();
				user_msg('Artist Logo successfully changed!');
			}
	}
	public function validate_file($function)
	{
	if (empty($_FILES['user_avatar']['error']))
	{
		$file = $_FILES['user_avatar']['tmp_name'];
		$name = $_FILES['user_avatar']['name'];
		$validate = $this->validate($file, 'image', $name);
		$function = $this->$function();
		if ($validate)
		{
			$function;
		}
	}
	else
	{
		var_dump($_FILES['user_avatar']);
		$this->edit_profile();
	}
}



}

?>