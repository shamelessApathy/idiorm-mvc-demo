<?php
require_once('/var/www/idiorm/idiorm-mvc-demo/globals.php');
require_once('/var/www/idiorm/idiorm-mvc-demo/constants.php');
class SpecialImage {

	public function new_image($file,$user_image_name,$category_id,$tags)
	{

		
		$check = $file['tmp_name'];
		// This can get used ONLY on JPEGs and TIFFs
		//$exif = exif_read_data($check);
		$user_id = $_SESSION['user_info']->id;
		$cat_id = $category_id;
		$name = $file['name'];
		$tags = $tags;
		$deg = 0;
		// Make sure a tag and category are attached to image
		if (empty($tags) || empty($cat_id))
		{
			require_once(CONTROLLERS . '/category.php');
			$category = new categoryController();
			$categories = $category->get_all();
			return_view('view.upload_image.php', $categories);
			sys_msg('You need a category and tags to submit the image!');
			return;
		}
		// If price is set, it will be a premium image, handle accordingly
		if ($_POST['price'] !== GLOBAL_PRICE)
			{
				$price = $_POST['price'];
				$premium = 1;
				if (!is_numeric($price))
				{
					require_once(CONTROLLERS . '/category.php');
					$category = new categoryController();
					$categories = $category->get_all();
					return_view('view.upload_image.php', $categories);
					sys_msg('Your price is not an integer!');
					return;
				}
			}
			// if not premium, set it to global price
		else
		{
			$price = GLOBAL_PRICE;
			$premium = 0; 
		}

		$tags = explode('|', $tags);
		array_pop($tags);
		$type = 'image';
		if (!empty($_POST['user_image_name']))
		{
		$user_image_name = $_POST['user_image_name'];
		}
		else
		{
			return_view('view.upload_image.php');
			sys_msg('You need to name the image for tracking purposes!');
			return;
		}
		// Better Validate the file
		if ($this->validate($check, $type, $name))
		{
			$ext = explode('.',$name);
			$ext = '.'. $ext[1];
			$tmp_name = $_FILES['image']['tmp_name'];
			$save_path = ROOT . "/users/images/raw_images/";			
			$myname = strtolower($_FILES['image']['tmp_name']); //You are renaming the file here
			$myname = explode('/',$myname);
			$myname = $myname[2];
			$myname = sha1_file($_FILES['image']['tmp_name']);
			$newpath = '/users/images/raw_images/'.$myname.$ext;
			$size = $this->image_size();
			$width = $size[0];
			$height = $size[1];
			$size_string = $size[3];
			$mime_type = $size['mime'];
			$watermark = $this->watermark($deg);
			$thumbnail = $this->thumbnail($deg);
			$rotate = new Imagick($_FILES['image']['tmp_name']);
			$rotate->rotateImage('none', $deg);
			
			// If the file is moved and stored successfully, call the model to make a DB entry for it
  			if($rotate->writeImage($save_path.$myname.$ext))
  			{
  				chmod($save_path.$myname.$ext, 0755);
  				require_once(MODELS . '/Image.php');
				$model = new Image();
				$return = $model->create_new($tmp_name, $user_id, $newpath, $width, $height, $size_string, $mime_type, $user_image_name, $watermark, $thumbnail, $price, $premium);
				if ($return)
				{
					//$this->upload_image(true); //sends you to function that renders view that shows all images from user (that are authorized!!!)
					$this->add_tag($tags, $return);
					if($this->add_category_to_image($return, $cat_id))
					{

					}
					else
					{
						echo 'not working';
					}
					header("Location:/image/upload_image?success=true");
				}
				else
				{
					header("Location:/image/upload_image?success=false");
				}
			}
			else
			{
				echo 'problem saving file';
			}
		}
		else
		{
			echo 'false';
		}
	}
public function watermark($deg = null)
 	{
 		$file = $_FILES['image']['tmp_name'];
 		$name = $_FILES['image']['name'];
 		$type = 'image';
		$nodir = explode('/', $file);
		$nodir = $nodir[2];
		$extFind = strrpos($name, '.');
		$extFind = $extFind + 1;
		$ext = substr($name, $extFind);
		if ($ext === 'jpg')
		{
			$ext = 'jpeg';
		}
		else
		{
			$ext = $ext;
		}
		$ext2 = $ext;
		$ext = '.' . $ext;
		$save_path = '/var/www/idiorm/idiorm-mvc-demo/users/images/preview/' . $nodir . $ext;
		$image = new Imagick($file);
		$image->rotateImage('none', $deg);
		$watermark = new Imagick('watermark.png');
		$width = $image->getImageWidth();
		$height = $image->getImageHeight();
		$watermark->scaleImage($width, $height, 0,0);
		$image->compositeImage($watermark, imagick::COMPOSITE_OVER, 0,0);
		$image->setImageCompressionQuality(0);	
		$new_path = '/users/images/preview/' . $nodir . $ext;

		if($image->writeImage($save_path))
		{
			return $new_path;
		}
		else
		{
			return false;
		}
	}
	// creates thumbnail version of the image
	public function thumbnail($deg = null)
	{
		// I am doing a rotation function twice, once for each thumbnail and watermark, not touching the original .... so far
		$file = $_FILES['image']['tmp_name'];
 		$name = $_FILES['image']['name'];
 		$type = 'image';
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
		$new_path = '/users/images/thumbnails/' . $nodir . $ext;
		$image = new Imagick($file);
		$image->rotateImage('none', $deg);
		$image->thumbnailImage(600,600, true);
		if ($image->writeImage($save_path))
		{
			return $new_path;
		}
		else
		{
			return false;
		}
	}
}

?>