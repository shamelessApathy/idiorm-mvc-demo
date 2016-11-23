<?php
		use Imagine\Image\BoxInterface;
		use Imagine\Image\ImageInterface;
require(BASE_CONTROLLER);
class testController extends Controller {
	public function test()
	{
		require(MODELS . '/User.php');
		$model = new User();
		$profile = $model->profile();
		var_dump($profile);
	}
	public function zebra()
	{
		$file = $_FILES['image']['tmp_name'];
		$nodir = explode('/', $file);
		$nodir = $nodir[2];
		$name = $_FILES['image']['name'];
		$ext = explode('.', $name);
		if ($ext === 'jpg')
		{
			$ext = 'jpeg';
		}
		$ext = '.' . $ext[1];
		$save_path = $nodir . $ext;
		$imagine = new Imagine\Gd\Imagine();
		$image = $imagine->open($file);
		$interface = new BoxInterface();
		$new = $image->thumbnail($interface, $mode = THUMBNAIL_INSET);

		if($new->save("/var/www/idiorm/idiorm-mvc-demo/users/images/thumbnails/$save_path"))
		{
			echo 'works so far';
		}
	}
}