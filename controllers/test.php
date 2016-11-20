<?php
require(BASE_CONTROLLER);
class testController extends Controller {
	public function test()
	{
		require(MODELS . '/User.php');
		$model = new User();
		$profile = $model->profile();
		var_dump($profile);
	}
	public function image_size()
	{
		$file = $_FILES['image']['tmp_name'];
		$size = getimagesize($file);
		$width = $size[0];
		$height = $size[1];
		$size_string = $size[3];
		$mime_type = $size['mime'];
		return $size;
	}
}