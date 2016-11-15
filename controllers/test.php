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
}