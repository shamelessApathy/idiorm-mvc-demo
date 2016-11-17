<?php
require(BASE_CONTROLLER);
require(MODELS . '/Image.php');
class imageController extends Controller {
	public function user_images($id = null)
	{
		require(MODELS . '/User.php');
		if (empty($id))
		{
			$id = $_SESSION['user_info']->id;
		}
		$user = Model::factory('User')->find_one($id);
		$images = $user->images()->find_many();
		return_view('view.user_images.php', $images);

	}
	public function upload_image()
	{
		return_view('view.upload_image.php');
	}
	public function new()
	{
		$check = $_FILES['image']['tmp_name'];
		$user_id = $_SESSION['user_info']->id;
		$name = $_FILES['image']['name'];
		$type = 'image';
		if ($this->validate($check, $type, $name))
		{
			$ext = explode('.',$name);
			$ext = '.'. $ext[1];
			$save_path = ROOT . "/users/avatars";			
			$myname = strtolower($_FILES['image']['tmp_name']); //You are renaming the file here
			$newpath = '/users/avatars'.$myname.$ext;
  			if(move_uploaded_file($_FILES['image']['tmp_name'], $save_path.$myname.$ext))
  			{
  				require_once(MODELS . '/Image.php');
				$model = new Image();
				if ($model->create_new($tmp_name, $user_id, $newpath))
				{
					$this->user_images();
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