<?php
require_once(BASE_CONTROLLER);
class storeController extends Controller{


	public function admin()
	{
		require_once(MODELS . '/Store.php');
		$user_id = $_SESSION['user_info']['id'];
		$model = new Store();
		$store = $model->admin($user_id);
		require_once(MODELS . '/Album.php');
		$album = new Album();
		$albums = $album->get_all($user_id);
		$store = array('store'=>$store, 'albums'=>$albums);
		if ($store)
		{
			return_view('store/store.admin.php' , $store);
		}
		else 
		{
			return_view('store/store.admin.php');
			sys_msg('You need to create your store!');
		}
	}
	public function edit()
	{
		$user_id = $_SESSION['user_info']['id'];
		require_once(MODELS . '/Store.php');
		$model = new Store();
		 if (isset($_POST['website']))
		{
			$website =  $_POST['website'];
		}
		else
		{
		$website =	null;
		}
		$info = array(
			'intro' => $_POST['intro'],
			'website' => $website
			);
		$results = $model->edit($info, $user_id);
		if ($results)
		{
			$this->admin();
		}
		else
		{
			echo 'it returned false someqwhere';
		}
	}
	public function get_user_images()
	{
		$user_id = $_SESSION['user_info']['id'];
		require_once(MODELS . '/User.php');
		require_once(MODELS . '/Image.php');
		$model = Model::factory('User')->find_one($user_id);
		$images = $model->images()->find_many();
		return_view('store/store.album_manager.php',$images);
	}
	
}



?>