<?php

class Album{
	public static $_id_column = 'album_id';
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
	public function add_image($images, $album_id)
	{
		var_dump($images);
		$time = time();
		$image = ORM::for_table('album_image')->create();
		$image->image_id = $images[0];
		$image->album_id = $album_id;
		$image->created_at = $time;
		$image->save();
	}
	public function get_all($user_id)
	{
		$albums = ORM::for_table('album')->where('user_id', $user_id)->find_many();
		return $albums;
	}
	public function get_info($album_id)
	{
		$info = ORM::for_table('album')->where('album_id', $album_id)->find_one();
		return $info;
	}

	public function get_album_images($album_id)
	{
		var_dump($album_id);
		$album = ORM::for_table('album_image')->where('album_id', $album_id)->find_many();
		$album_images = array();
		foreach ($album as $image)
		{
			$id = $image->image_id;
			$im = ORM::for_table('image')->where('id', $id )->find_one();
			array_push($album_images, $im);
		}
		return $album_images;
	}
	public function remove_image($image, $album_id)
	{
		var_dump($album_id);
		$album = ORM::for_table('album_image')->where('image_id', $image)->find_one();
		var_dump($album);
		if($album->delete())
		{
			return true;
		}
	}
	public function get_first_image($albums)
	{
		$first = array();
		$second = array();
		$num = count($albums);
		$i = 0;
		foreach ($albums as $album)
		{
			echo $albums[$i]->album_id;
			$instance = ORM::for_table('album_image')->where('album_id', $album->album_id)->find_one();
			$image_id = $instance['image_id'];
			array_push($second, $image_id);
		}
		foreach ($second as $first_image)
		{
			$image = ORM::for_table('image')->where('id', $second[$i])->find_one();
			array_push($first, $image['thumbnail']);
			$i++;
		}
		var_dump($first);
		return $first;
	}
}

?>