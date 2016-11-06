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
}