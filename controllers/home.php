<?php
require_once(BASE_CONTROLLER);
class homeController extends Controller{
	public function load()
	{
		require_once(MODELS . '/Image.php');
		$model = new Image();
		$images = $model->get_newest();
		return_view('view.home.php' , $images);		
	}
}

?>