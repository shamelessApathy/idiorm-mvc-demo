<?php
require(BASE_CONTROLLER);
require(MODELS . '/Image.php');
class imageController extends Controller {
	public function search_images($param, $query)
	{
		require (MODELS . '/Image.php');
		$model = new Image();
		$images = $model->search_images($param, $query);
		return_view('view.images.php', $images);
	}
	public function user_owned_images()
	{
		require(MODELS . '/User.php');
		$id = $_SESSION['user_info']->id;
		$user = Model::factory('User')->find_one($id);
		$images = $user->images()->find_many();
		return_view('view.user_images.php', $images);
	}
	public function upload_image()
	{
		return_view('view.upload_image.php');
	}
	public function image_size()
	{
		$file = $_FILES['image']['tmp_name'];
		$size = getimagesize($file);
		return $size;
	}
	public function new_image()
	{
		
		$check = $_FILES['image']['tmp_name'];
		$user_id = $_SESSION['user_info']->id;
		$name = $_FILES['image']['name'];
		$type = 'image';
		if (!empty($_POST['user_image_name']))
		{
		$user_image_name = $_POST['user_image_name'];
		}
		else
		{
			return_view('view.upload_image.php');
			sys_msg('You need to name the image for tracking purposes!');
			return;
		}
		// Better Validate the file
		if ($this->validate($check, $type, $name))
		{
			$ext = explode('.',$name);
			$ext = '.'. $ext[1];
			$tmp_name = $_FILES['image']['tmp_name'];
			$save_path = ROOT . "/users/images";			
			$myname = strtolower($_FILES['image']['tmp_name']); //You are renaming the file here
			$newpath = '/users/images'.$myname.$ext;
			$size = $this->image_size();
			$width = $size[0];
			$height = $size[1];
			$size_string = $size[3];
			$mime_type = $size['mime'];
			// If the file is moved and stored successfully, call the model to make a DB entry for it
  			if(move_uploaded_file($_FILES['image']['tmp_name'], $save_path.$myname.$ext))
  			{
  				chmod($save_path.$myname.$ext, 0755);
  				require_once(MODELS . '/Image.php');
				$model = new Image();
				if ($model->create_new($tmp_name, $user_id, $newpath, $width, $height, $size_string, $mime_type, $user_image_name))
				{
					$this->user_owned_images(); //sends you to function that renders view that shows all images from user (that are authorized!!!)
				}
				else
				{
					echo 'there was a problem';
				}
			}
			else
			{
				echo 'problem saving file';
			}
		}
		else
		{
			echo 'false';
		}
	}
}
?>