<?php 
class Tag {
	public function image()
	{
		return $this->hasMany('Image');
	}
	public function add_tag($tag_string, $image_id)
	{
		$test = ORM::for_table('tag')->where('text', $tag_string)->find_one();
		if ($test)
		{
			$tag_id = $test->id;
			$many = ORM::for_table('tag_to_image')->create();
			$many->tag_id = $tag_id;
			$many->image_id = $image_id;
			if ($many->save())
			{
				return true;
			}
		}
		else
		{
		$tag = ORM::for_table('tag')->create();
		$tag->text = $tag_string;
		if ($tag->save())
		{
			$tag_id = $tag->id;
			$many = ORM::for_table('tag_to_image')->create();
			$many->tag_id = $tag_id;
			$many->image_id = $image_id;
			if($many->save())
			{
				return true;
			}
		}
		else
		{
			return false;
		}
	}
	}
	public function get_tags($image_id)
	{
		$tags = ORM::for_table('tag_to_image')->where('image_id', $image_id)->find_many();
		return $tags;
	}
	public function get_images($tag_id)
	{
		$images = ORM::for_table('tag_to_image')->where('tag_id', $tag_id)->find_many();
		return $images;
	}
	public function remove_tag($image_id, $tag_id)
	{
		$tag = ORM::for_table('tag_to_image')->where('tag_id', $tag_id)->where('image_id', $image_id)->find_one();
		if ($tag->delete())
		{
			return true;
		}
	}
	public function get_tag_text($tag_id)
	{
		$tag = ORM::for_table('tag')->where('id', $tag_id)->find_one();
		return $tag;
	}
	public function search_by_tag($query)
	{
		$query = '%'.$query.'%';
		$images = ORM::for_table('tag')
            ->where_like('text', $query)
            ->find_many();
            $last = ORM::get_last_query();
            return $images;
	}

}

?>