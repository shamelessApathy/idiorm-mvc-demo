<?php 

require(BASE_CONTROLLER);
class albumController extends Controller{

	public function albums()
	{
		require_once(MODELS . '/Album.php');
	}
	public function create_new()
	{
		$album_name = $_POST['album_name'];
		$user_id = $_SESSION['user_info']['id'];
		require_once(MODELS . '/Album.php');
		$model = new Album();
		$album_id = $model->create_album($album_name , $user_id);
	}
	public function add_image($album_id)
	{
		$images = array();
		require_once(MODELS . '/Album.php');
		$model = new Album();
		foreach ($_POST['image'] as $image)
		{
			$model->add_image($_POST['image'], $album_id);
		}
		$this->album_manager($album_id);
	}
	public function album_manager()
	{	
		$user_id = $_SESSION['user_info']['id'];
		require_once(MODELS . '/User.php');
		require_once(MODELS . '/Image.php');
		require_once(MODELS . '/Album.php');
		$model = Model::factory('User')->find_one($user_id);
		//$images = $model->images()->find_many();
		$album_model = new Album();
		$albums = $album_model->get_all($user_id);
		$album_first_images = $album_model->get_first_image($albums);
		$images = array('albums'=>$albums, 'album_first_images'=>$album_first_images);
		return_view('store/store.album_manager.php',$images);
	}
	public function remove_image($album_id)
	{
		$image = $_POST['image'];
		require_once(MODELS . '/Album.php');
		$model = new Album();
		if($model->remove_image($image, $album_id))
		{
			$this->album_manager($album_id);
		}
		else
		{
			echo ' there was a problem';
		}
	}
	public function edit_album()
	{
		$album_id = $_POST['album_id'];
		require_once(MODELS . '/Album.php');
		require_once(MODELS . '/User.php');
		require_once(MODELS . '/Image.php');
		$user_id = $_SESSION['user_info']['id'];
		$user = Model::factory('User')->find_one($user_id);
		$images = $user->images()->find_many();
		$model = new Album();
		$full = $model->get_info($album_id);
		$album = $model->get_album_images($album_id);
		$album = array('album_images'=> $album , 'user_images' => $images, 'album' => $full);
		return_view('store/store.album_manager.php', $album);
	}

}
?>