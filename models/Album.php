<?php

class Album{
	public function user()
	{
		return $this->belongs_to('User');
	}
	public function image()
	{
		return $this->has_many('Image');
	}
	public function create_album($name,  $user_id)
	{
		$time = time();
		$album = ORM::for_table('album')->create();
		$album->album_name = $name;
		$album->user_id = $user_id;
		$album->created_at = $time;
		if ($album->save())
		{
			var_dump(ORM::get_last_query());
			return $album->album_id;
		}
	}
	public function get_all($user_id)
	{
		$albums = ORM::for_table('album')->where('user_id', $user_id)->find_many();
		return $albums;
	}
	public function add_image_to_album($album_id, $images)
	{
		foreach ($images as $image)
		{
			$time = time();
			$album = ORM::for_table('album_image')->create();
			$album->album_id = $album_id;
			$album->image_id = $image;
			$album->created_at = $time;
			$album->save();
		}
	}
}

?>