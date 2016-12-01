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
	public function add_image()
	{
		if (empty($_POST['album_id']))
		{
			$album_id = $this->create_new();
			var_dump($album_id);
		}
		$images = array();
		//foreach($_POST['image'] as $image)
		//{
		//	$entry = ORM::for_table('album_image')
		//}
	}
	public function album_manager($album_id )
	{	
		$user_id = $_SESSION['user_info']['id'];
		require_once(MODELS . '/User.php');
		require_once(MODELS . '/Image.php');
		$model = Model::factory('User')->find_one($user_id);
		$images = $model->images()->find_many();
		$album = ORM::for_table('album')->where('album_id', $album_id)->find_one();
		$images = array('images'=>$images, 'album'=>$album);
		return_view('store/store.album_manager.php',$images);
	}

}
?>