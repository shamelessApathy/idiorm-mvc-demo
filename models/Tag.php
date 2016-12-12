<?php 
class Tag {
	public function image()
	{
		return $this->hasMany('Image');
	}
	public function add_tag($tag_string, $image_id)
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
	public function get_tags($image_id)
	{
		$tags = ORM::for_table('tag_to_image')->where('image_id', $image_id)->find_many();
		return $tags;
	}
	public function remove_tag($image_id, $tag_id)
	{
		$tag = ORM::for_table('tag_to_image')->where('tag_id', $tag_id)->where('image_id', $image_id)->find_one();
		if ($tag->delete())
		{
			return true;
		}
	}

}

?>