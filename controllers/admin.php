<?php
require_once(BASE_CONTROLLER);
class adminController extends Controller {
	public function post_manager()
	{
		return_view('admin/admin.post_manager.php');
	}
	public function user_manager()
	{
		return_view('admin/admin.user_manager.php');
	}
	public function image_manager()
	{
		return_view('admin/admin.image_manager.php');
	}
	public function subscription_manager()
	{
		return_view('admin/admin.subscription_manager.php');
	}
	public function get_subscription_purchases()
	{
		$purchases = ORM::for_table('subscription_purchase')->find_many();
		return_view('admin/admin.subscription_manager.php', $purchases);
	}
	public function search_images()
	{
		$param = $_POST['parameter'];
		$query = $_POST['query'];
		require(MODELS . '/Image.php');
		$model = new Image();
		$images = $model->admin_search_images($param, $query);
		return_view('admin/admin.image_manager.php', $images);
	}
	public function get_unauth_images()
	{
		require_once(MODELS . '/Image.php');
		$model = new Image();
		$images = $model->get_unauth_images();
		return_view('admin/admin.image_manager.php', $images);
	}
	public function authorize_image($id)
	{
		require_once(MODELS . '/Image.php');
		$model = new Image();
		if ($model->authorize_image($id))
		{
			$this->get_unauth_images();
		}
	}
	public function delete_image($path)
	{
		unlink(ROOT .$path);
	}
	public function reject_image($id)
	{
		require_once(MODELS . '/Image.php');
		$model = Model::factory('Image')->find_one($id);
		$path = $model->reject_image();
		if ($path)
		{
			$this->get_unauth_images();
		}
	}

}