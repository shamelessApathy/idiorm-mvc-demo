<?php
class Image extends Model
{
	public function user()
	{
		return $this->belongs_to('User');
	}
	public function get_featured()
	{
		$featured = ORM::for_table('image')->where('featured', 1)->find_many();
		return $featured;
	}
	public function get_categories()
	{
		$cats = ORM::for_table('category_to_image')->join('category', 'category.id = category_to_image.category_id')->select('category_to_image.*')->select('category.*')->where('image_id', $this->id)->find_many();
		return $cats;
	}
	public function change_name($name)
	{
		$this->user_image_name = $name;
		$this->save();
	}
	public function get_newest()
	{
		$images = ORM::for_table('image')->order_by_desc('created_at')->where('auth', 1)->find_many();
		$image_array = array();
		if (count($images) < 30)
		{
			foreach($images as $image)
			{
				array_push($image_array, $image);
			}
		}
		else 
		{
			for ($i = 0; $i < 60; $i++)
			{
				if (isset($images[$i]))
				{
					array_push($image_array, $images[$i]);
				}
			}
		}
		return $image_array;
	}
	public function get_tags()
	{
		//$tags = ORM::for_table('image_to_tag')->where('image_id', $this->id)->find_many();
		$tags = ORM::for_table('image_to_tag')->join('tag', 'tag.id = image_to_tag.tag_id')->select('image_to_tag.*')->select('tag.*')->where('image_id', $this->id)->find_many();
		return $tags;
	}
	public function create_new($tmp_name, $user_id, $new_path, $width, $height, $size_string, $mime_type, $user_image_name, $watermark, $thumbnail, $price, $premium)
	{
		$time = time();
		$new_image = ORM::for_table('image')->create();
		$new_image->created_at = $time;
		$new_image->path =	$new_path;
		$new_image->user_id = $user_id;
		$new_image->width = $width;
		$new_image->auth = 1;
		$new_image->height = $height;
		$new_image->size_string = $size_string;
		$new_image->mime_type = $mime_type;
		$new_image->user_image_name = $user_image_name;
		$new_image->watermark = $watermark;
		$new_image->thumbnail = $thumbnail;
		$new_image->price = $price;
		$new_image->premium = $premium;
		if ($new_image->save())
		{
			return $new_image->id();
		}
		else
		{
			return false;
		}
	}
	public function admin_search_images($param, $query)
	{
		$images = ORM::for_table('image')->where($param, $query)->find_many();
		return $images;
	}
	public function get_unauth_images($next = null)
	{
		if ($next)
		{
			$images = ORM::for_table('image')->where('auth', '0')->limit(10)->offset(10)->find_many();
		}
		else
		{
		$images = ORM::for_table('image')->where('auth', 0)->limit(10)->find_many();
		}
		return $images;
	}
	public function delete_image($image_id)
	{
		$image = ORM::for_table('image')->where('id', $image_id)->find_one();
		if ($image->delete())
		{
			return true;
		}
		
	}
	public function authorize_image($id)
	{
		$image = ORM::for_table('image')->where('id', $id)->find_one();
		$image->auth = 1;
		if($image->save())
		{
			return true;
		}
	}
	public function reject_image($id  = null)
	{
		if (!isset($id))
		{
			$id = $this->id;
		}
		$image = ORM::for_table('image')->where('id', $id)->find_one();
		$image->auth = 2;
		if ($image->save())
		{
			return $image;
		}
	}
	public function album()
	{
		return $this->has_many('Album');
	}
	public function ownership($image_id, $user_id)
	{
		$table = ORM::for_table('images_owned')->where('image_id', $image_id)->where('user_id', $user_id)->find_one();
		if ($table)
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	public function purchase($image_id, $user_id)
	{
		$time = time();
		// Instantiate specific model based on image id to access attributes
		$owner = Model::factory('Image')->find_one($image_id);
		// Create a purchase record in purchase table
		$purchase = ORM::for_table('purchase')->create();
		$purchase->owner_id = $owner->user_id;
		$purchase->image_id = $image_id;
		$purchase->price = $owner->price;
		$purchase->user_id = $_SESSION['user_info']['id'];
		$purchase->created_at = $time;
		$purchase->save();
		// Create entry in images owned for_table
		$table = ORM::for_table('images_owned')->create();
		$table->user_id = $user_id;
		$table->owner_id = $owner->user_id;
		$table->image_id = $image_id;
		$table->status = 2;
		$table->created_at = $time;
		if ($table->save())
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	public function subscription_purchase($image_id, $user_id)
	{
		$time = time();
		$owner = ORM::for_table('image')->where('id', $image_id)->find_one();
		$owner = $owner->user_id; 
		$table = ORM::for_table('subscription_purchase')->create();
		$table->user_id = $user_id;
		$table->owner_id = $owner;
		$table->image_id = $image_id;
		$table->created_at = $time;
		if ($table->save())
		{
			return true;
		}
	}
	public function get_info ($id)
	{
		$id = (int) $id;
		$image = ORM::for_table('image')->where('id', $id)->find_one();
		return $image;

	}
	/**
	*
	* @param $image_id
	* @return Tags relating to image
	* NOTE :: currently doesn't work, something needs to be done to define a relationship with a "through" table but I'm not wasting
	* Time on that right now, I've got another join query that should do the trick for what I  need
	*/ 
	public function tags()
	{
		return $this->has_many('image_to_tag');
	}



}
?>
