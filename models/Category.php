<?php

class Category{
	public function get_unapproved()
	{
		$categories = ORM::for_table('category')->where('approved', 0)->find_many();
		return $categories;
	}
	public function approve($id)
	{
		$category = ORM::for_table('category')->where('id', $id)->find_one();
		$category->approved = 1;
		$category->save();
	}
	public function add_category($name)
	{
		$name = ucfirst($name);
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
	public function approved_only()
	{
		// When using the ORM::for_table function do NOT capitalize the table name, confused this the Model::factory where you capitalize the MODEL's name
		$categories = ORM::for_table('category')->where('approved','1')->find_many();
		var_dump(ORM::get_last_query());
		return $categories;
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