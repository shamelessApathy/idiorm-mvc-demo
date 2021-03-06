<?php
class Controller {
	/*
	*
	* Checks to make sure an uploaded file what its supposed to be
	* @params $check = file to be checked    $type = string
	*/
	public function validate($check, $type)
	{
		function test_input($data) 
		{
  			$data = trim($data);
  			$data = stripslashes($data);
  			$data = htmlspecialchars($data);
  			return $data;
		}
		switch ($type)
		{

		case 'image' :	$ext_array = array('GIF','PNG','JPEG','JPG');
						$fileinfo = finfo_open();
						$fileinfo = finfo_file($fileinfo, $check);
						$fileinfo = explode(" ",$fileinfo);
						if (in_array($fileinfo[0], $ext_array))
						{
							return true;
						}
						else
						{
							return false;
						}
						break;
		case 'email' :  $email = test_input($check);
						if (!filter_var($email, FILTER_VALIDATE_EMAIL)) 
						{
  							return false;
						}
						else
						{
							return true;
						}
		default : return 'default';

	}
}
}

