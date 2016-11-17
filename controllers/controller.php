<?php
class Controller {
	/*
	*
	* Checks to make sure an uploaded file what its supposed to be
	* @params $check = file to be checked    $type = string
	*/
	public function validate($check, $type, $name = null)
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
						$name = explode('.',$name);
						$ext = $name[1];
						$ext = strtoupper($ext);
						if ($ext === 'JPG')
						{
							$ext = 'JPEG';
						}
						$test = ($fileinfo[0] === $ext);
						if (in_array($fileinfo[0], $ext_array) && ($test))
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

