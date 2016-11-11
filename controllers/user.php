<?php

/*
*
*user controller
*/

Class userController {

public function register(){
	return_view('view.register.php');
}
public function create_new(){
	require_once(MODELS . '/User.php');
	$model = new User();
	if($model->create_new()){
		return_view('view.home.php');
		user_msg('New User created successfully!');
	}
	else
	{
		return_view('view.home.php');
		sys_msg('Something went wrong and the user was not added');
	}
}
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
public function login()
{
	return_view('view.login.php');
}
public function verify()
{
	require_once(MODELS . '/User.php');
	$model = new User();
	$user = $model->verify();
	if ($user)
	{

		$_SESSION['user_info'] = $user;
		$_SESSION['logged_in'] = 1;
		header('Location: /home');
		user_msg('login successfull');
	}
	else
	{
		return_view('view.login.php');
		sys_msg('Incorrect credentials');
	}
}
public function info($id)
{
	require_once(MODELS .'/User.php');
	$model = new User();
	$info = $model->info($id);
	$info =$info;
	return_view('view.user_info.php',$info);
}
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
public function edit_profile()
{
	require_once(MODELS . '/User.php');
	$model = new User();
	$profile = $model->edit_profile();
	if ($profile)
	{
		return_view('view.edit_profile.php', $profile);
	}
	else
	{
		return_view('view.create_profile.php');
	}
}
public function validate_profile()
{
	echo $_POST['first_name'];
}
public function set_avatar(){
	require_once(MODELS . '/User.php');
	$model = new User();
	$result = $model->set_avatar();
	if ($result)
	{
		return_view('view.edit_profile.php');
		user_msg('Avatar uploaded successfully');
	}
	else
	{
		echo $result;
	}
}

}