<?php
		use Imagine\Image\BoxInterface;
		use Imagine\Image\ImageInterface;
		use Imagine\Image\FontInterface;
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
		if ($ext[1] === 'jpg')
		{
			$ext = 'jpeg';
		}
		else
		{
			$ext = $ext[1];
		}
		$ext = '.' . $ext;
		$save_path = $nodir . $ext;
		$imagine = new Imagine\Gd\Imagine();
		$width = 100;
		$height = 100;
		$size = new \Imagine\Image\Box($width, $height);
		$mode = \Imagine\Image\ImageInterface::THUMBNAIL_INSET;
		$image = $imagine->open($file);
		$new = $image->thumbnail($size, $mode);

		if($new->save("/var/www/idiorm/idiorm-mvc-demo/users/images/thumbnails/$save_path"))
		{
			echo 'works so far';
		}
	}
	public function inset()
	{
		$file = $_FILES['image']['tmp_name'];
		$nodir = explode('/', $file);
		$nodir = $nodir[2];
		$name = $_FILES['image']['name'];
		$ext = explode('.', $name);
		if ($ext[1] === 'jpg')
		{
			$ext = 'jpeg';
		}
		else
		{
			$ext = $ext[1];
		}
		$ext2 = $ext;
		$ext = '.' . $ext;
		$save_path = '/var/www/idiorm/idiorm-mvc-demo/users/images/thumbnails/' . $nodir . $ext;
		switch ($ext2)
		{
			case 'jpeg' : $image = ImageCreateFromJPEG($file);
			break;
			case 'png' : $image = ImageCreateFromPNG($file);
			break;
			case 'gif' : $image = ImageCreateFromGIF($file);
			break;
		}
		$font = 'font/college.ttf';
		$string = '123dollarmedia.com      123dollarmedia.com        123dollarmedia.com      123dollarmedia.com        123dollarmedia.com      123dollarmedia.com        ';
		$color = imagecolorallocatealpha($image, 255,255,255,30);
		if (!$color)
		{
			echo 'color returning false';
		}
		imagettftext($image, 44, 0,50,50, $color, $font, $string);
		switch ($ext2)
		{
			case 'jpeg' : if(imagejpeg($image , $save_path)){
							echo 'its done';
						}
			break;
			case 'png' : $image = imagepng($image, $save_path);
			echo 'its done';
			break;
			case 'gif' : $image = imagegif($image, $save_path);
			echo 'its done';
			break;
		}
 	}

 	public function stamp()
 	{
		// Load the stamp and the photo to apply the watermark to
		$stamp = imagecreatefrompng('newstamp.png');
		$file = $_FILES['image']['tmp_name'];
		$nodir = explode('/', $file);
		$nodir = $nodir[2];
		$name = $_FILES['image']['name'];
		$ext = explode('.', $name);
		if ($ext[1] === 'jpg')
		{
			$ext = 'jpeg';
		}
		else
		{
			$ext = $ext[1];
		}
		$ext2 = $ext;
		$ext = '.' . $ext;
		$save_path = '/var/www/idiorm/idiorm-mvc-demo/users/images/thumbnails/' . $nodir . $ext;
		switch ($ext2)
		{
			case 'jpeg' : $im = ImageCreateFromJPEG($file);
			break;
			case 'png' : $im = ImageCreateFromPNG($file);
			break;
			case 'gif' : $im = ImageCreateFromGIF($file);
			break;
		}
		// get dimensions of image to be watermarked
		$size = getimagesize($file);
		$newWidth = $size[0];
		$newHeight = $size[1];
		// resize stamp image 
		$tmp = imagecreatetruecolor($newWidth, $newHeight);
		//$fill = imagecolorallocatealpha($tmp,0,0,0,0);
    	imagefill($tmp,0,0,0x7fff0000);
    	imagecopyresampled($tmp, $stamp, 0, 0, 0, 0, $newWidth, $newHeight, 2000, 2000);

		// Set the margins for the stamp and get the height/width of the stamp image
		$marge_right = 10;
		$marge_bottom = 10;
		$sx = imagesx($tmp);
		$sy = imagesy($tmp);

		// Copy the stamp image onto our photo using the margin offsets and the photo 
		// width to calculate positioning of the stamp. 
		imagecopy($im, $tmp, imagesx($im) - $sx - $marge_right, imagesy($im) - $sy - $marge_bottom, 0, 0, imagesx($stamp), imagesy($tmp));

		// Output and free memory
		header('Content-type: image/png');
		imagepng($im);
		imagedestroy($im);
 	}
}
