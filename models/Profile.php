<?php 
class Profile extends Model {
	public static $_table_use_short_name = true;
	//public static $_table = 'profile';
	//public static $_id_column = 'profile_id';
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
	public function set_avatar()
	{
		if (!isset($_FILES['user_avatar']['error']))
		{
			$orig = $_FILES['user_avatar']['name'];
			$orig = explode('.',$orig);
			$ext = '.' . $orig[1];
			$save_path = ROOT . "/users/avatars";
			
			$myname = strtolower($_FILES['user_avatar']['tmp_name']); //You are renaming the file here
			$newpath = '/users/avatars'.$myname.$ext;
  			if(move_uploaded_file($_FILES['user_avatar']['tmp_name'], $save_path.$myname.$ext))
  			{ 
  				echo 'making it this far';
  				$avatar = ORM::for_table('profile')->where('user_id', $_SESSION['user_info']->id)->find_one();
  				$avatar->avatar = $newpath;
  				$avatar->save();
  				$_SESSION['user_info']->avatar = '/users/avatars'.$myname.$ext;
  				return true;
  			} 
		}
		else
		{
			echo "not making it";
		}
	}
}
?>