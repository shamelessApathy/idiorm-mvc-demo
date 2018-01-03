<?php

header('Access-Control-Allow-Origin: *');
require(BASE_CONTROLLER);

class apiController extends Controller{
	public function test(){
		var_dump($_POST);
	}
	private function verify($email,$password)
	{
		// hash password to match
		$password =  $password;
		// retrieve salt hash
		$user = ORM::for_table('user')->where('email' , $email)->findOne();
		if ($user)
		{
			$salt = $user->salt;
			// concatenate salt with password
			$password = $password . $salt;
			if ($password === $user->password)
			{
				
				$data = array(
					'user_id'=>$user->id,
					'username'=>$user->username,
					'email'=>$user->email,
					'avatar'=>$user->avatar
				);
				$data = json_encode($data);
				echo $data;
			}
			else
			{
				echo "false";
			}
		}
	}
	public function login()
	{
		$email = $_POST['username'];	
		$password = $_POST['password'];
		$test = $this->verify($email,$password);
	}
	public function upload()
	{
		echo "got to the upload function!!!";
		var_dump($_FILE);
	}
}


?>