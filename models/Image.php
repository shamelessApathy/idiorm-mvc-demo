<?php
class Image extends Model
{
	public function user()
	{
		$this->belongs_to('User');
	}
	public function create_new($tmp_name, $user_id, $new_path)
	{
		$time = time();
		$new_image = ORM::for_table('image')->create();
		$new_image->created_at = $time;
		$new_image->path =	$new_path;
		$new_image->user_id = $user_id;
		if ($new_image->save())
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	public function user_images($id)
	{
		echo 'getting this far';
		$images = ORM::for_table('image')->where('user_id', $id)->find_many();
		return $images;
	}
}
?>