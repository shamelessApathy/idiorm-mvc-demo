<?php
require_once(BASE_CONTROLLER);
class adminController extends Controller {
	// this will rotate image in given direction, also lookup watermarks and thumbnails and also rotate and resave them
	public function rotate_image()
	{
		// Set variables from $_GET string
		$image_id = $_GET['image_id'];
		$direction = $_GET['direction'];
		$uri = $_GET['uri'];
		var_dump($uri);
		// Change direction from words to degrees
		if ($direction === 'clockwise')
		{
			$deg =  90;
		}
		if ($direction === 'counterclockwise')
		{
			$deg = -90;
		} 

		// Logic starts here

		$image_model = require_once(MODELS . "/Image.php");
		$image_model = Model::factory('Image')->find_one($image_id);
		$raw = ROOT . "/". $image_model->path;
		$thumbnail = ROOT . "/" . $image_model->thumbnail;
		$watermark = ROOT . "/" . $image_model->watermark;
		echo "<pre>";
		print_r($image_model);
		echo "</pre>";

		// Need to rotate all three version of the image, thumbnail, watermark, and raw
		// Rotate Raw
		$raw_rotate = $this->rotate($deg, $raw);
		$thumbnail_rotate = $this->rotate($deg, $thumbnail);
		$watermark_rotate = $this->rotate($deg, $watermark);
		if ($raw_rotate && $thumbnail_rotate && $watermark_rotate )
		{
			header("Location: $uri");			
		}

	}
	public function rotate($deg, $file)
	{
		// this function differs slightly from main image controller, added the $file param
		$pixel = new ImagickPixel('none');
		$image = new Imagick($file);
		$rotated = $image->rotateImage($pixel, $deg);
		if ($image->writeImage($file))
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	public function images_by_user($user_id)
	{
		$images = ORM::for_table('image')->where('user_id', $user_id)->find_many();
		return_view("admin/admin.user_images.php", $images);
	}
	public function admin_delete_image($image_id = null)
	{

		if (empty($image_id))
		{
			$image_id = $_POST['image_id'];
		}
		require_once(MODELS . '/Image.php');
		require_once(MODELS . '/Tag.php');
		require_once(MODELS . '/Vote.php');
		require_once(MODELS . '/Category.php');
		$category_model = new Category();
		$category_model->delete_image_relation($image_id);
		$image_model = Model::factory('Image')->find_one($image_id);
		$path = $image_model->path;
		$tags = $image_model->get_tags();
		$tag_model = new Tag();
		if (unlink(ROOT . $image_model->path))
		{
			echo ' it deleted';
			$image_model->delete();
		}
		
		foreach ($tags as $tag)
		{
			$tag_model->remove_tag($image_id, $tag->tag_id);
		}
		$vote_model = new Vote();
		$votes = $vote_model->get_all_for_image($image_id);
		foreach ($votes as $vote)
		{
			$vote_model->delete_vote($vote->id);
		}


	}
	/**
	* 
	* @param $image_id , $user_id (needed to return to the view of images_by_user)
	* @return if true, deletes image, sends you back to admin area of user_id you were just at
	*/
	public function delete_user_image()
	{
		$image_id = $_GET['image_id'] ?? null;
		$user_id = $_GET['user_id'] ?? null;
		$this->admin_delete_image($image_id);
		$this->images_by_user($user_id);
		sys_msg("Image deleted successfully!");
	}
	public function dashboard()
	{
		return_view("admin/admin.dashboard.php");
	}
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