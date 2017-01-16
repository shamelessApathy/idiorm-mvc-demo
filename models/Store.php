<?php
class Store extends Model {
public static $_id_column = 'user_id';
	public function user()
	{
		return $this->belongs_to('User');
	}
	public function admin($user_id)
	{
		$store = ORM::for_table('store')->where('user_id', $user_id)->find_one();
		if (!$store)
		{
			$time = time();
			$store = ORM::for_table('store')->create();
			$store->user_id =  $user_id;
			$store->created_at = $time;
			$store->save();
		}
		return $store;
	}
	public function edit($info, $user_id)
	{
		$test = ORM::for_table('store')->where('user_id', $user_id)->find_one();
		$time = time();
		foreach ($info as $key => $value)
		{
		$test->set($key , $value);
		}
		$test->updated_at = $time;
		if($test->save())
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