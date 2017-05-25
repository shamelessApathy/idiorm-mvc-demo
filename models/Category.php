<?php

class Category{
	public function add_category($name)
	{
		$category = ORM::for_table('category')->create();
		$category->title = $name;
		$category->save();
		return $category->id;
	}
	public function get_images($cat_id)
	{
		$images = ORM::for_table('category_to_image')->where('category_id', $cat_id)->find_many();
	}
	public function get_all()
	{
		$categories = ORM::for_table('category')->find_many();
		return $categories;
	}
	public function add_cat_to_image($cat_id, $image_id)
	{
		$category = ORM::for_table('category_to_image')->create();
		$category->category_id = $cat_id;
		$category->image_id = $image_id;
		if($category->save())
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	public function get_categories($image_id)
	{
		$categories = ORM::for_table('category_to_image')->where('image_id', $image_id)->find_many();
		if ($categories)
		{
		return $categories;
	}
	else
	{
		return false;
	}
	}
	public function get_title($cat_id)
	{
		$title = ORM::for_table('category')->where('id', $cat_id)->find_one();
		return $title;
	}
}

?>