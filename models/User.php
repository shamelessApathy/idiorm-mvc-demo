<?php

class User {

	public function create_new()
	{

		//define post data
		$name = $_POST['name'];
		$email = $_POST['email'];
		$password = $_POST['password'];
		// password and salt function
		$password = $password;
		$password = hash('sha256', $password);
		$salt = substr(md5(microtime()),rand(0,26),5);
		$password = $password . $salt;

		// add new entry to database

		$newPerson = ORM::for_table('users')->create();
		$newPerson->name = $name;
		$newPerson->email = $email;
		$newPerson->password = $password;
		$newPerson->salt = $salt;
		if($newPerson->save())
		{
			return true;
		}
		else
		{
			return false;
		}

	}
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
	public function get_user_posts()
	{
		$author_id = $_SESSION['user_info']->id;
		$id = intval($author_id);
		$name = ORM::for_table('users')->where('id', $author_id)->findOne();
		$name = $name->name;
		$posts = ORM::for_table('posts')->where('author_id', $author_id)->find_many();
		$dataObject = ['posts'=>$posts, 'name'=> $name];
		return $dataObject;
	}
	public function info($id)
	{
		$id = intval($id);
		$info = ORM::for_table('users')->where('id', $id)->find_one();
		return $info;
	}
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
}
