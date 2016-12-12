<?php
class Image extends Model
{
	public function user()
	{
		$this->belongs_to('User');
	}
	public function create_new($tmp_name, $user_id, $new_path, $width, $height, $size_string, $mime_type, $user_image_name, $watermark, $thumbnail)
	{
		$time = time();
		$new_image = ORM::for_table('image')->create();
		$new_image->created_at = $time;
		$new_image->path =	$new_path;
		$new_image->user_id = $user_id;
		$new_image->width = $width;
		$new_image->height = $height;
		$new_image->size_string = $size_string;
		$new_image->mime_type = $mime_type;
		$new_image->user_image_name = $user_image_name;
		$new_image->watermark = $watermark;
		$new_image->thumbnail = $thumbnail;
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
	public function authorize_image($id)
	{
		$image = ORM::for_table('image')->where('id', $id)->find_one();
		$image->auth = 1;
		if($image->save())
		{
			return true;
		}
	}
	public function reject_image($id)
	{
		$image = ORM::for_table('image')->where('id', $id)->find_one();
		$image->auth = 2;
		if ($image->save())
		{
			return $image;
		}
	}

	public function search_by_tag($query)
	{
		$query = '%'.$query.'%';
		$images = ORM::for_table('image')
            ->where_like('tags', $query)
            ->where('auth','1')
            ->find_many();
            $last = ORM::get_last_query();
            var_dump($last);
            return $images;
	}
	public function album()
	{
		return $this->has_many('Album');
	}


}
?>