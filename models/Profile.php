<?php 
class Profile extends Model {
	//public static $_table_use_short_name = true;
	//public static $_table = 'profile';
	//public static $_id_column = 'user_id';
	public function user_id()
	{
		return $_SESSION['user_info']->id;
	}
	public function create($profile_info)
	{
		$profile = ORM::for_table('profile')->create();
		$profile->user_id = $this->user_id();
		$profile->first_name = $profile_info['first_name'];
		$profile->middle_name = $profile_info['middle_name'];
		$profile->last_name = $profile_info['last_name'];
		$profile->city = $profile_info['city'];
		$profile->state = $profile_info['state'];
		$profile->country = $profile_info['country'];
		if ($bool = $profile->save())
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	public function update($info)
	{
		$profile = ORM::for_table('profile')->where('user_id' , $_SESSION['user_info']->id)->find_one();

		foreach ($info as $key => $value)
		{
			$profile->set($key, $value); 
		}
		if($profile->save())
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	public function user()
	{
		return $this->belongs_to('User','id','user_id');
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