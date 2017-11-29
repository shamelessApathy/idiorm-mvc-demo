<?php 
require_once(BASE_CONTROLLER);
class categoryController extends Controller{
	public function add_category()
	{
		$name = $_POST['category'];
		require_once(MODELS . '/Category.php');
		$model = new Category();
		if ($model->add_category($name))
		{
			return_view('admin/admin.image_manager.php');
		}
	}
	public function change_category()
	{
		$image_id = $_POST['image_id'];
		$cat_id = $_POST['cat_id'];
		require_once(MODELS . '/Category.php');
		$cat_model = new Category();
		if($cat_model->change_category($image_id, $cat_id))
		{
			echo "it happened!!!!";
		}
	}
	public function get_images($cat_id = null)
	{

		if (!isset($cat_id))
		{
			$cat_id = !empty($_GET['cat_id']) ? $_GET['cat_id'] : $_POST['cat_id'];
		}
		$cat_id = explode('=',$cat_id);
		$cat_id = $cat_id[1];
		require_once(MODELS . '/Category.php');
		$model = new Category();
		$images = $model->get_images($cat_id);
		$title = $model->get_title($cat_id);
		require_once(MODELS . '/Image.php');
		require_once(MODELS . '/User.php');
		$images_in_cat = array();
		foreach($images as $image)
		{
			$image_instance = Model::factory('Image')->find_one($image->image_id);
			$user_for_image = Model::factory('User')->find_one($image_instance->user_id);
			$image_instance->username = $user_for_image->username;
			$image_instance->user_avatar = $user_for_image->avatar;
			array_push($images_in_cat, $image_instance);
		}
		// Need to attach tags
		require_once(MODELS . '/Tag.php');
		$tag_model = new Tag();
		foreach($images_in_cat as $image)
		{
			if (!empty($image))
			{
				$tags = $tag_model->get_tags_for_image($image->id);
				$image->tags = $tags;
			}
		}
		return_view('view.category.php', array('images'=>$images_in_cat, 'category'=>$title->title));
	}
	public function approved_only()
	{
		require_once(MODELS . '/Category.php');
		$model = new Category();
		$approved = $model->approved_only();
		return $approved;
	}
	public function get_all()
	{
		require_once(MODELS. '/Category.php');
		$model = new Category();
		$categories = $model->get_all();
		return $categories;
	}
	public function add_cat_to_image()
	{
		$image_id = $_POST['image_id'];
		$cat_id = $_POST['category_id'];
		require_once(MODELS . '/Category.php');
		$model = new Category();
		if($model->add_cat_to_image($cat_id, $image_id))
		{
			$this->get_categories($image_id);
		}
	}
	public function get_categories($image_id = null)
	{
		if (empty($image_id))
		{
		$image_id = $_POST['image_id'];			
		}
		require_once(MODELS . '/Category.php');
		$model = new Category();
		$categories = $model->get_categories($image_id);
		if($categories)
		{
			$cat_array = array();
			foreach ($categories as $category)
			{
				$title = $model->get_title($category->category_id);
				$assoc = array('category_title'=>$title->title,'cat_id'=>$category->category_id);
				array_push($cat_array, $assoc);
			}
			if (!empty($cat_array))
			{
			$result = json_encode($cat_array);
			echo $result;
			}
			else
			{
				return false;
			}
		}
	}
	/**
	*
	* @param $cat_name
	* @return BOOL for success or failure
	*/
	public function create_category($cat_name = null)
	{
		if (empty($cat_name))
		{
			$cat_name = $_POST['cat_name'];
		}
		
		require_once(MODELS . '/Category.php');
		$model = new Category();
		$model->add_category($cat_name);
	}

}