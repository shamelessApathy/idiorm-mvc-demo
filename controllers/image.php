<?php
require(BASE_CONTROLLER);
require(MODELS . '/Image.php');
class imageController extends Controller {
	/**
	* Unauthorizes an Image, done from the admin area
	* @param Image ID
	* @return BOOL, true on success, false on failure
	*/
	public function unauthorize($report_id)
	{
		 $this->lockdown(TRUE);
		 require_once(MODELS . '/Image.php');
		 require_once(MODELS . '/Report.php');
		 require_once(MODELS . '/User.php');
		 require_once(MAILER);
		 $report_id = (int) $report_id;
		 $report_model = ORM::for_table('report')->where('id', $report_id)->find_one();
		 $image_id = $report_model['image_id'];
		 $image_model = Model::factory('Image')->find_one($image_id);
		 $owner = Model::factory('User')->find_one($model->user_id);
		 $image_model->auth = 0;
		 $image_model->save();
		 $report_model->resolved = 1;
		 $report_model->save();

		 $mailer = new Mailer(); 
		 if ($mailer->report($owner, $image_model, $report_model))
		 {
		 	header("Location:/report/get_reports/unresolved");
		 }
		 else
		 {
		 	echo 'returned false';
		 }
	}
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
	public function rotate($deg)
	{
		$pixel = new ImagickPixel('none');
		$file = $_FILES['image']['tmp_name'];
		$image = new Imagick($file);
		$rotated = $image->rotateImage($pixel, $deg);
		$image->writeImage($file);
	}
	public function payout()
	{
		return_view('view.payout.php');
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
		$this->lockdown();
		require_once(MODELS . '/Profile.php');
		$user = ORM::for_table('profile')->where('user_id', $_SESSION['user_info']['id'])->find_one();
		require_once(MODELS . '/Category.php');
		$category = new Category();
		//$categories = $category->get_all();
		$categories = $category->approved_only();
		if (isset($_GET['success']) && $_GET['success'] == 'true')
		{
			user_msg('Image upload succesful!');
		}
		if (isset($_GET['success']) && $_GET['success'] == 'false')
		{
			sys_msg('Something went wrong. You may have tried to upload a duplicate image, or there may have been another error');
		}
		return_view('view.upload_image.php', $categories);
		
	}
	// returns image_size, that's it
	public function image_size()
	{
		$file = $_FILES['image']['tmp_name'];
		$size = getimagesize($file);
		return $size;
	}
	/**
	*
	* @param $image_id and $cat_id, sent from new_image function
	* @return bool if unsuccessfull
	*/
	public function add_category_to_image($image_id, $cat_id)
	{
		require_once(MODELS .'/Category.php');
		$model = new Category(); 
		if ($model->add_cat_to_image($cat_id, $image_id))
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	// runs through list of everything that needs to be done and recorded to create an instance of an image
	public function new_image()
	{
		$check = $_FILES['image']['tmp_name'];
		// This can get used ONLY on JPEGs and TIFFs
		//$exif = exif_read_data($check);
		$user_id = $_SESSION['user_info']->id;
		$cat_id = $_POST['category-id'];
		$name = $_FILES['image']['name'];
		$tags = $_POST['tags'];
		$deg = $_POST['rotate'];
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
						echo 'npot working';
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
	public function change_name()
	{
		$name = $_POST['name'];
		$image_id = $_POST['image_id'];
		require_once(MODELS . '/Image.php');
		$image = Model::factory('Image')->find_one($image_id);
		$image->change_name($name);
	}
	public function add_category($cat_id, $image_id)
	{
		require_once(MODELS . '/Category.php');
		$model = new Category();
		$model->add_cat_to_image($cat_id, $image_id);
	}
	// creates watermarked image for preview
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
	// delete's image from db and file
	public function delete_image($image_id = null)
	{

		if (empty($image_id))
		{
			$image_id = $_POST['image_id'];
		}
		require_once(MODELS . '/Image.php');
		require_once(MODELS . '/Tag.php');
		require_once(MODELS . '/Vote.php');
		require_once(MODELS . '/Category.php');
		$category_model = new Category();
		$category_model->delete_image_relation($image_id);
		$image_model = Model::factory('Image')->find_one($image_id);
		$path = $image_model->path;
		$tags = $image_model->get_tags();
		$tag_model = new Tag();
		if (unlink(ROOT . $image_model->path))
		{
			echo ' it deleted';
			$image_model->delete();
		}
		
		foreach ($tags as $tag)
		{
			$tag_model->remove_tag($image_id, $tag->tag_id);
		}
		$vote_model = new Vote();
		$votes = $vote_model->get_all_for_image($image_id);
		foreach ($votes as $vote)
		{
			$vote_model->delete_vote($vote->id);
		}


	}
	public function before($id_not_used=null)
	{
		$id = $_GET['id'];
		require_once(MODELS . '/Image.php');
		$previousModel = Model::factory('Image')->where_lt('id', $id)->find_many();
		//$send_to = $previousModel[$offset];
		if (empty($previousModel))
		{
				echo "No more images in this direction";
				return;
		}
		else
		{
			$send_to = end($previousModel);
		}
		$this->info($send_to->id, '1');
	}	
	public function after($id_not_used=null)
	{
		$id = $_GET['id'];
		require_once(MODELS . '/Image.php');
		$nextModel = Model::factory('Image')->where_gt('id', $id)->find_many();
		if (empty($nextModel))
		{
				$nextModel = Model::factory('Image')->where_gt('id', 1)->find_many();
				$send_to = reset($nextModel);
				$this->info($send_to->id, '1');
				/*echo "No more images in this direction <a href='/image/info?id=$id'>Go Back</a>";*/
				return;
		}
		else
		{
			$send_to = reset($nextModel);
		}
		$this->info($send_to->id, '1');
	}
	// get info to be able to display on the single store.image.php view
	public function info($id_func = null, $recursive =  null)
	{
		require_once(MODELS . '/User.php');
		require_once(MODELS . '/Profile.php');
		$user_model = new User();
		if (isset($id_func) && !is_null($id_func) && !is_null($recursive))
		{
			$id = $id_func;
		}
		else
		{
			$id = $_GET['id'];
		}
		$image = $this->get_image($id);
		if (!empty($image))
		{
			$user_info = Model::factory('User')->find_one($image->user_id);
			$tags = $image->get_tags();
			$categories = $image->get_categories();
			$user_profile = $user_info->profile();
			$image = array('image'=>$image, 'tags'=>$tags, 'categories'=> $categories, 'user'=>$user_info, 'profile' => $user_profile);
			return_view('store/store.image.php', $image);
		}
		else
		{
			echo "Image not found";
		}
	}
	// instantiates an image class based on image_id using ORM Model::factory
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
		if($controller->add_tag($tags, $image_id, false))
		{
			return true;
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
	}
	/*
	*
	* Calls the purchase function, this will be replaced with a payment portal once site is live
	*
	*/
	/*
	*
	* This will use up a subscription point to purchase the image
	*
	*/
	public function subscription()
	{
		$user_id = $_SESSION['user_info']['id'];
		$stripe_sub_id = ORM::for_table('subscription_to_user')->where('user_id', $user_id)->find_one();
		$stripe_sub_id = $stripe_sub_id['stripe_subscription_id'];
		$image_id = $_POST['image_id'];
		require_once(MODELS . '/Image.php');
		require_once(MODELS . '/User.php');
		$user_model = new User();
		$model = new Image();
		\Stripe\Stripe::setApiKey("sk_test_u05I8eb3Re5YPyHaTeJpgSZx");
		// Request information on the subscription
		$response = \Stripe\Subscription::retrieve($stripe_sub_id);

		// If the subscription has not ended, proceed
		if ($response['ended_at'] === null)
		{
			// Update database values to match current period_start and period_end values
			$user_sub = ORM::for_table('subscription_to_user')->where('user_id', $user_id)->find_one();
			$user_sub->period_start = $response['current_period_start'];
			$user_sub->period_end = $response['current_period_end'];
			$user_sub->save();
			$count = $user_model->subscription_count($user_id);
			if($count != 0)
			{
				if($model->subscription_purchase($image_id, $user_id))
				{
					$_SESSION['sub_count'] = $user_model->subscription_count($user_id);
					$this->purchase($image_id);
				}
			}
			else
			{
				return_view('view.home.php');
				sys_msg("You've hit your subscription max download for the month! Upgrade your plan for more images!");
			}
		}
		else
		{
			return_view('view.home.php');
			sys_msg('Your subscription is no longer active. Sign up for another to download more images!');
		}
	}
	private function purchase($image_id)
	{
		$user_id = $_SESSION['user_info']['id'];
		require_once(MODELS . '/Image.php');
		$model = new Image();
		if($model->purchase($image_id, $user_id))
		{
			$link = "/image/download/$image_id";
			return_view("store/store.image_success.php", $link);
		}
	}
	// Simply records the download so it can be accessed later as a record of how many times image has been downloaded
	public function record_download($image_model)
	{
		$download = ORM::for_table('download')->create();
		$download->image_id = $image_model->id;
		$download->owner_id = $image_model->user_id;
		$download->user_id = $_SESSION['user_info']['id'];
		$download->save();
	}
	public function download($image_id = null)
	{
		require_once(MODELS . '/Image.php');
		if (!empty($_SESSION['user_info'])) 
		{		
			$user_id = $_SESSION['user_info']['id'];
			$model = Model::factory('Image')->find_one($image_id);
			# Took out ownership test
			#$test = $model->ownership($image_id, $user_id);
			#if ($test || $model->user_id == $user_id)
			#{
				require_once(MODELS . '/Image.php');
				$image_model = Model::factory('Image')->find_one($image_id);
				$this->record_download($image_model);
				$image_path = $image_model->path;
				if (file_exists(ROOT . $image_path)) 
				{
		    		header('Content-Description: File Transfer');
		    		header('Content-Type: application/octet-stream');
		    		header('Content-Disposition: attachment; filename="'.basename(ROOT . $image_path).'"');
		    		header('Expires: 0');
		    		header('Cache-Control: must-revalidate');
		    		header('Pragma: public');
		    		header('Content-Length: ' . filesize(ROOT . $image_path));
		    		readfile(ROOT . $image_path);
		    		exit;
				}
			#}
		/*else
		{
			return_view('view.home.php');
			sys_msg("You are not the user who purchased this image!");
			return;
		}*/ // This else belongs to the ownership test function
		}
		else
		{
			return_view('view.home.php');
			sys_msg('You must be logged in first!');
		}
	}
	/**
	*
	* @param User ID
	* @return All Images for Sale from User ** AVAILABLE FOR PUBLIC TO SEE **
	*/	
	public function user($user_id)
	{
		require_once(MODELS . '/User.php');
		require_once(MODELS . '/Image.php');
		$model = Model::factory('User')->find_one($id);
		$images = $model->images()->find_many();
		foreach( $images as $image)
		{
			$tags = $image->get_tags();
			$tag_array = array();
			if (count($tags) >= 3)
			{
				for ($i = 0; $i < 3; $i++)
				{
					array_push($tag_array, $tags[$i]);
				}
			}
			else
			{
				$count = count($tags);
				for ($i = 0; $i < $count; $i++ )
				{
					array_push($tag_array, $tags[$i]);
				}
			}
			$image->tags = $tag_array;
			$username = $model->username;

		}
		return_view('store/store.images_by_user.php', ['images'=>$images, 'username'=>$username]);
	}
}
?>