<?php
require_once(BASE_CONTROLLER);
class adminController extends Controller {
	public function category_manager()
	{
		require_once(MODELS . "/Category.php");
		$model = new Category();
		$categories = $model->approved_only();

		return_view('admin/admin.category_manager.php', ['approved' =>$categories]);
	}
	public function approve_category()
	{
		var_dump($_POST);
		require_once(MODELS . '/Category.php');
		$id = $_POST['id'];
		$model = new Category();
		$model->approve($id);
	}
	public function show_unapproved()
	{
		require_once(MODELS . '/Category.php');
		$model = new Category();
		$categories = $model->get_unapproved();

		return_view('admin/admin.category_manager.php', ['unapproved' => $categories]);
	}
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
	public function bug_manager()
	{
		$bugs = $this->get_bugs();
		return_view('admin/admin.bug_manager.php', $bugs);
	}
	/**
	*
	* @param none
	* @return list of unresolved/ unanswered bugs
	*/
	public function get_bugs()
	{
		$bugs = ORM::for_table('bug')->find_many();
		return $bugs;
	}
	public function get_subscription_purchases()
	{
		require_once(MODELS . '/User.php');
		$owners_results = ORM::for_table('subscription_purchase')->find_many();
		require_once(CLASSES . '/Owner.php');
				$owners = array();
				$objects = array();
			foreach($owners_results as $owner)
			{

				if (!in_array($owner['owner_id'],$owners))
				{
					array_push($owners, $owner['owner_id']);
				}
			}
			foreach($owners as $owner)
			{
				$user_model = Model::factory('User')->find_one($owner);
				$new = new Owner;
				$new->id = $owner;
				$new->first_name = $user_model->first_name;
				$new->last_name = $user_model->last_name;
				foreach ($owners_results as $purchase)
				{
					if ($new->id === $purchase['owner_id'])
					{
						array_push($new->purchases, $purchase);
					}
				}
				array_push($objects, $new);
			}







		/*$big = array();
		$owner_holder = array();
		// Make an Array of Owner_IDs
		foreach ($owners as $owner)
		{
			$string = $owner['owner_id'];
			if(!in_array($string, $owner_holder))
			{
				array_push($owner_holder, $string );
			}
		}
		// Make an array where Owner_Ids are the key, and the value being another array, holding all the purchase objects
		$second_array = array();


		//
		foreach ($owners as $purchase)
		{

		}*/

		return_view('admin/admin.subscription_manager.php', $objects);
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