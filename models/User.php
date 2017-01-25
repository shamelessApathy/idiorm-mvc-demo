<?php

class User extends Model {

	//new
	public function id()
	{
		return $_SESSION['user_info']->id;
	}
	/*
	*
	* Creates new user
	*
	*/
	public function create_new($username,$email,$password)
	{


		// password and salt function
		$password = $password;
		$password = hash('sha256', $password);
		$salt = random_bytes(8);
		$password = $password . $salt;

		// add new entry to database

		$newPerson = ORM::for_table('user')->create();
		$newPerson->email = $email;
		$newPerson->password = $password;
		$newPerson->salt = $salt;
		$newPerson->username = $username;
		$newPerson->level = 2;
		if($newPerson->save())
		{
			return true;
		}
		else
		{
			return false;
		}

	}
	public function subscription_count($user_id = null)
	{
		if (empty($user_id))
		{
		$user_id = $this->id;
		}
		$sub = ORM::for_table('subscription_to_user')->where('user_id', $user_id)->find_one();
		$details = ORM::for_table('subscription_details')->where('subscription_id', $sub->subscription_id)->find_one();
		$number = $details->number;
		$initial = $sub->created_at;
		$time = time();
		$modulo = $time - $initial;
		$month = 86400*30;
		$howmany = floor($modulo/$month);
		$change = $month*$howmany;
		$change = $change + $initial;
		$after = $change + $month;
		$purchases = ORM::for_table('subscription_purchase')->where('user_id', $user_id)->where_gt('created_at', $change)->where_lt('created_at',$after)->find_many();
		$left = $number - count($purchases);
		return $left;

	}
	/*
	*
	* Verifies user identity and checks salted password value against email
	*
	*/
	public function verify($email,$password)
	{
		// hash password to match
		$password = hash('sha256', $password);
		// retrieve salt hash
		$user = ORM::for_table('user')->where('email' , $email)->findOne();
		$salt = $user->salt;
		// concatenate salt with password
		$password = $password . $salt;
		if ($password === $user->password)
		{
			return $user;
		}
		else
		{
			return false;
		}		
	}
	/*
	*
	* Edits the user's profile 
	*
	*/
	public function edit_profile($id)
	{
		
		$profile = ORM::for_table('user')->where('id', $id)->find_one();
		if ($profile)
		{
			return $profile;
		}
		else
		{
			return false;
		}
	}

	
	/*
	*
	* Gets all posts from user currently logged in
	*
	*/
	public function get_user_posts()
	{
		$author_id = $_SESSION['user_info']->id;
		$id = intval($author_id);
		$user = ORM::for_table('user')->where('id', $author_id)->findOne();
		$username = $user->username;
		$posts = ORM::for_table('post')->where('author_id', $author_id)->find_many();
		$dataObject = ['posts'=>$posts, 'username'=> $username];
		return $dataObject;
	}
	/*
	*
	* Gets all user info (don't know if I'm using this anywhere?)
	*
	*/
	public function info($id)
	{
		$id = intval($id);
		$info = ORM::for_table('user')->where('id', $id)->find_one();
		return $info;
	}
	/*
	*
	* Logs user out
	*
	*/
	public function logout()
	{
		// Unset all of the session variables.
		$_SESSION = array();

		// If it's desired to kill the session, also delete the session cookie.
		// Note: This will destroy the session, and not just the session data!
		if (ini_get("session.use_cookies")) 
		{
    		$params = session_get_cookie_params();
    		setcookie(session_name(), '', time() - 42000,
        	$params["path"], $params["domain"],
        	$params["secure"], $params["httponly"]
    		);
		}

		// Finally, destroy the session.
		if(session_destroy())
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	public function get_all()
	{
		$users = ORM::for_table('user')->select('username')->select('email')->select('level')->select('id')->find_many();
		foreach ($users as $user)
		{
			$id = $user->id;
			$posts = ORM::for_table('post')->where('author_id', $id)->find_many();
			$number = count($posts);
			$user->number_posts = $number;
		}
		return $users;
	}
	public function change_password($user_id, $new_password)
	{
		$user = ORM::for_table('user')->find_one($user_id);
		$password = hash('sha256', $new_password);
		$salt = random_bytes(8);
		$password = $password . $salt;
		$user->password = $password;
		$user->salt = $salt;
		if($user->save())
		{
			return true;
		}
	}
	/*
	*
	* Adds new user subscription information to subscription_to_user table
	*
	*/
	public function add_subscription($user_id, $subscription)
	{
		$time = time();
		$table = ORM::for_table('subscription_to_user')->create();
		$table->user_id = $user_id;
		$table->subscription_id = $subscription;
		$table->created_at = $time;
		if($table->save())
		{
			return true;
		}
	}
	//new
	public function profile()
	{
		return $this->has_one('Profile','user_id','id');
	}
	public function posts()
	{
		return $this->has_many('Post','author_id','id');
	}
	public function images()
	{
		return $this->has_many('Image','user_id','id');
	}
	public function store()
	{
		return $this->has_one('Store');
	}
	public function purchased()
	{
		$user_id = $this->id;
		$table = ORM::for_table('images_owned')->where('user_id', $user_id)->where('status', 2)->find_many();
		return $table;

	}
}
