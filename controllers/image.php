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
	public function user_images($id = null)
	{
		require(MODELS . '/User.php');
		if (empty($id))
		{
			$id = $_SESSION['user_info']->id;
		}
		$model = new Image();
		$images = $model->user_images();
		return_view('view.user_images.php', $images);

	}

	public function upload_image()
	{
		return_view('view.upload_image.php');
	}
	public function new_image()
	{
		$check = $_FILES['image']['tmp_name'];
		$user_id = $_SESSION['user_info']->id;
		$name = $_FILES['image']['name'];
		$type = 'image';
		if ($this->validate($check, $type, $name))
		{
			$ext = explode('.',$name);
			$ext = '.'. $ext[1];
			$tmp_name = $_FILES['image']['tmp_name'];
			$save_path = ROOT . "/users/avatars";			
			$myname = strtolower($_FILES['image']['tmp_name']); //You are renaming the file here
			$newpath = '/users/avatars'.$myname.$ext;
  			if(move_uploaded_file($_FILES['image']['tmp_name'], $save_path.$myname.$ext))
  			{
  				require_once(MODELS . '/Image.php');
				$model = new Image();
				if ($model->create_new($tmp_name, $user_id, $newpath))
				{
					$this->user_images(); //sends you to function that renders view that shows all images from user (that are authorized!!!)
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