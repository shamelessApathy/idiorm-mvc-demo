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
		return $images;
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
	public function change_category($image_id, $cat_id)
	{
		$current = ORM::for_table('category_to_image')->where('image_id', $image_id)->find_one();
		if ( !empty($current))
		{
			if ($current->delete())
			{
				if ($this->add_cat_to_image($cat_id, $image_id))
				{
					return true;
				}
			}
		}
		else
		{
			if($this->add_cat_to_image($cat_id, $image_id))
			{
				return true;
			}
		}
	}
	public function approved_only()
	{
		// When using the ORM::for_table function do NOT capitalize the table name, confused this the Model::factory where you capitalize the MODEL's name
		$categories = ORM::for_table('category')->where('approved','1')->find_many();
		return $categories;
	}
	public function get_category($image_id)
	{
		$category_relation = ORM::for_table('category_to_image')->where('image_id', $image_id)->find_one();
		if (!empty($category_relation))
		{
			$category = ORM::for_table('category')->where('id', $category_relation->category_id)->find_one();
			return $category;
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