<?php 
class Profile extends Model {
	public static $_table_use_short_name = true;
	//public static $_table = 'profile';
	public static $_id_column = 'user_id';
	public function user_id()
	{
		return $_SESSION['user_info']->id;
	}
	public function update($info)
	{
		$profile = ORM::for_table('profile')->where('user_id' , $_SESSION['user_info']->id)->find_one();
		if (!$profile){

	$profile = ORM::for_table('profile')->create();
	}

		foreach ($info as $key => $value)
		{
			$profile->set($key, $value); 
		}
		$profile->save();
	}
	public function user()
	{
		return $this->belongs_to('User','user_id','id');
	}
	public function info($id)
	{
		$info = ORM::for_table('profile')->where('user_id', $id)->find_one();
	}
	public function set_avatar($newpath)
	{
  			$avatar = ORM::for_table('user')->where('id', $_SESSION['user_info']->id)->find_one();
  			$avatar->avatar = $newpath;
  			$avatar->save();
  			$_SESSION['user_info']->avatar = $newpath;
  			return true;
    }
   }

?>