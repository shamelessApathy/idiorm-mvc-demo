<?php

class User {
	/*
	*
	* Creates new user
	*
	*/
	public function create_new()
	{

		//define post data
		$username = $_POST['username'];
		$email = $_POST['email'];
		$password = $_POST['password'];
		// password and salt function
		$password = $password;
		$password = hash('sha256', $password);
		$salt = substr(md5(microtime()),rand(0,26),5);
		$password = $password . $salt;

		// add new entry to database

		$newPerson = ORM::for_table('users')->create();
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
	/*
	*
	* Verifies user identity and checks salted password value against email
	*
	*/
	public function verify()
	{
		$name = $_POST['name'];
		$email = $_POST['email'];
		$password = $_POST['password'];
		// hash password to match
		$password = hash('sha256', $password);
		// retrieve salt hash
		$user = ORM::for_table('users')->where('email' , $email)->findOne();
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
	public function edit_profile()
	{
		$id = $_SESSION['user_info']->id;
		$profile = ORM::for_table('users')->where('id', $id)->find_one();
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
	* Deals with file handling for setting the user's avatar
	* Although it is called from the edit_profile view
	* It was easier to write it seperate from the rest of the
	* edit profile function due to the file handling
	*
	*/
	public function set_avatar()
	{
		var_dump($_FILES);
		if (isset($_FILES['user_avatar']))
		{
			$orig = $_FILES['user_avatar']['name'];
			$orig = explode('.',$orig);
			$ext = '.' . $orig[1];
			$save_path = ROOT . "/users/avatars";
			$myname = strtolower($_FILES['user_avatar']['tmp_name']); //You are renaming the file here
  			if(move_uploaded_file($_FILES['user_avatar']['tmp_name'], $save_path.$myname.$ext))
  			{
  				$avatar = ORM::for_table('users')->where('id', $_SESSION['user_info']->id)->find_one();
  				$avatar->set('avatar', '/users/avatars'.$myname.$ext);
  				$avatar->save();
  				$_SESSION['user_info']->avatar = '/users/avatars'.$myname.$ext;
  				return true;
  			} 
		}
		else
		{
			echo "not making it";
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
		$user = ORM::for_table('users')->where('id', $author_id)->findOne();
		$username = $user->username;
		$posts = ORM::for_table('posts')->where('author_id', $author_id)->find_many();
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
		$info = ORM::for_table('users')->where('id', $id)->find_one();
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
		$users = ORM::for_table('users')->select('username')->select('email')->select('level')->select('id')->find_many();
		foreach ($users as $user)
		{
			$id = $user->id;
			$posts = ORM::for_table('posts')->where('author_id', $id)->find_many();
			$number = count($posts);
			$user->number_posts = $number;
		}
		return $users;
	}
}
