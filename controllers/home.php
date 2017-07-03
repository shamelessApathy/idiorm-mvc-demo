<?php
require_once(BASE_CONTROLLER);
class homeController extends Controller{
	public function load($logout = null)
	{
		require_once(MODELS . '/Image.php');
		require_once(MODELS . '/Category.php');
		$cat_model = new Category();
		$model = new Image();
		$images = $model->get_newest();
		$featured = $model->get_featured();
		$categories = $cat_model->get_all();
		$array = array('images' => $images, 'featured' => $featured, 'categories' => $categories);
		return_view('view.home.php' , $array );	
		if (isset($logout) && $logout = true)
		{
			user_msg('You have logged out successfully!');
		}
	}
}

?>