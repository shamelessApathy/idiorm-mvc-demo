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
	public function get_images($cat_id = null)
	{
		if (!isset($cat_id))
		{
			$cat_id = $_GET['cat_id'];
		}
		require_once(MODELS . '/Category.php');
		$model = new Category();
		$images = $model->get_images($cat_id);
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
			var_dump($image_id);
			$cat_array = array();
			foreach ($categories as $category)
			{
				$title = $model->get_title($category->category_id);
				$assoc = array('category_title'=>$title->title,'cat_id'=>$category->category_id);
				array_push($cat_array, $assoc);
			}
			var_dump($cat_array);
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