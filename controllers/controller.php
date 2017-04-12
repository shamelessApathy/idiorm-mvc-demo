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
						$extFind = strrpos($name, '.');
						$extFind = $extFind + 1;
						// I rewrote this, anything with more than one "." was having an error because it couldn't find the actual extension of the file
						$ext = substr($name, $extFind);
						$ext = strtoupper($ext);
						$name = explode('.',$name);
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
						break;
		default : return 'default';

	}
}
}

