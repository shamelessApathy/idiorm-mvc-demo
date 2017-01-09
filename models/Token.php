<?php 
class Token {
	public function store_token($hash, $image_id, $user_id)
	{
		$time = time();
		$model = ORM::for_table('token')->create();
		$model->hash = $hash;
		$model->user_id = $user_id;
		$model->image_id = $image_id;
		$model->created_at = $time;
		if($model->save())
		{
			return true;
		}
	}
	public function get_file($hash)
	{
		$hash_model = ORM::for_table('token')->where('hash', $hash)->find_one();
		return $hash_model;
	}
	public function delete_token($hash)
	{
		$token = ORM::for_table('token')->where('hash', $hash)->find_one();
		if ($token->delete())
		{
			return true;
		}
		else
		{
			return false;
		}
	}
}


?>