<?php
require(BASE_CONTROLLER);
require(MODELS . '/Image.php');
class imageController extends Controller {
	public function search_images($param, $query)
	{
		require (MODELS . '/Image.php');
		$model = new Image();
		$images = $model->search_images($param, $query);
		return_view('view.images.php', $images);
	}
	public function get_categories($image_id = null)
	{
		if (empty($image_id))
		{
			$image_id = $_POST['image_id'];
		}
		require_once(MODELS . '/Image.php');
		$model = Model::factory('Image')->find_one($image_id);
		$categories = $model->get_categories();
		$cat_array = array();
		foreach ($categories as $category)
		{
			array_push($cat_array, ['title'=> $category->title, 'cat_id'=>$category->id]);
		}
		$categories = json_encode($cat_array);
		echo $categories;
	}
	public function get_tags()
	{
		if (empty($image_id))
		{
			$image_id = $_POST['image_id'];
		}
		require_once(MODELS . '/Image.php');
		$model = Model::factory('Image')->find_one($image_id);
		$image_to_tag = $model->get_tags();
		if (isset($_POST['image_id']))
		{	
			$image_array = array();
			$i = 0;
			foreach ($image_to_tag as $image)
			{
				$stuff = ['text'=>$image_to_tag[$i]['text'], 'tag_id'=>$image_to_tag[$i]['tag_id']];
				array_push($image_array, $stuff);
				$i++;
			}
			
			$image_array = json_encode($image_array);
			echo $image_array;
		}
		else
		{
			return $image_to_tag;
		}
	}
	public function user_owned_images()
	{
		require(MODELS . '/User.php');
		$id = $_SESSION['user_info']->id;
		$user = Model::factory('User')->find_one($id);
		$images = $user->images()->find_many();
		return_view('view.user_images.php', $images);
	}
	public function upload_image($success = null)
	{
		return_view('view.upload_image.php');
		if (isset($success) && $success === true)
		{
			user_msg('Image uploaded successfully!');
		}
	}
	public function image_size()
	{
		$file = $_FILES['image']['tmp_name'];
		$size = getimagesize($file);
		return $size;
	}
	public function new_image()
	{
		
		$check = $_FILES['image']['tmp_name'];
		$user_id = $_SESSION['user_info']->id;
		$name = $_FILES['image']['name'];
		$tags = $_POST['tags'];
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
			$newpath = '/users/images/raw_images/'.$myname.$ext;
			$size = $this->image_size();
			$width = $size[0];
			$height = $size[1];
			$size_string = $size[3];
			$mime_type = $size['mime'];
			$watermark = $this->watermark();
			$thumbnail = $this->thumbnail();
			// If the file is moved and stored successfully, call the model to make a DB entry for it
  			if(move_uploaded_file($_FILES['image']['tmp_name'], $save_path.$myname.$ext))
  			{
  				chmod($save_path.$myname.$ext, 0755);
  				require_once(MODELS . '/Image.php');
				$model = new Image();
				$return = $model->create_new($tmp_name, $user_id, $newpath, $width, $height, $size_string, $mime_type, $user_image_name, $watermark, $thumbnail);
				if ($return)
				{
					//$this->upload_image(true); //sends you to function that renders view that shows all images from user (that are authorized!!!)
					$this->add_tag($tags, $return);
					$this->upload_image(true);
				}
				else
				{
					echo 'there was a problem';
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
	public function watermark()
 	{
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
		$save_path = '/var/www/idiorm/idiorm-mvc-demo/users/images/preview/' . $nodir . $ext;
		$image = new Imagick($file);
		$watermark = new Imagick('watermark.png');
		$width = $image->getImageWidth();
		$height = $image->getImageHeight();
		$watermark->scaleImage($width, $height, 0,0);
		$image->compositeImage($watermark, imagick::COMPOSITE_OVER, 0,0);
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
	public function thumbnail()
	{
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
		$image->thumbnailImage(100,100, true);
		if ($image->writeImage($save_path))
		{
			return $new_path;
		}
		else
		{
			return false;
		}
	}
	// delete's image from db and file
	public function delete_image($image_id = null)
	{

		if (empty($image_id))
		{
			$image_id = $_POST['image_id'];
		}
		require_once(MODELS . '/Image.php');
		$image_model = Model::factory('Image')->find_one($image_id);
		$path = $image_model->path;
		if (unlink(ROOT . $image_model->path))
		{
			echo ' it deleted';
			$image_model->delete();
		}
		require_once(MODELS . '/Tag.php');
		$tag_model = new Tag();
		$tags = $tag_model->get_tags($image_id);
		foreach ($tags as $tag)
		{
			$tag_model->remove_tag($image_id, $tag->tag_id);
		}


	}
	
	public function info()
	{
		$id = $_GET['id'];
		$image = $this->get_image($id);
		$tags = $image->get_tags();
		$image = array('image'=>$image, 'tags'=>$tags);
		return_view('store/store.image.php', $image);
	}
	public function get_image($id)
	{
		require_once(MODELS . '/Image.php');
		$model = Model::factory('Image')->find_one($id);
		return $model;
	}
	public function add_tag($tags = null, $image_id = null) 	
	{
		require_once(CONTROLLERS . '/tag.php');
		$controller = new tagController();
		if($controller->add_tag($tags, $image_id))
		{
			return_view('view.upload_image.php');
			user_msg('Image Uploaded Successfully!');
		}
	}
	public function remove_tag()
	{
		$id = $_POST['id'];
		$tag = $_POST['tag'];
		require_once(MODELS . '/Image.php');
		$image = Model::factory('Image')->find_one($id);
		$tags = $image->tags;
		$tags = str_ireplace($tag, '', $tags);
		$tags = explode(' ', $tags);
		var_dump($tags);
		/*if ($this->edit_tags($tags, $id))
		{
			echo 'it worked';
		}
		else
		{
			echo 'didnt work';
		}*/

	}
}
?>