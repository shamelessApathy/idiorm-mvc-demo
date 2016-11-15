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
		require(MODELS . "/User.php");
		var_dump($this->user_id());
		$user_id = $this->user_id();
		$user = Model::factory('User')->find_one($user_id);
		$profile =$user->profile()->find_one();
		var_dump($profile);
	}
	public function info($id)
	{
		$info = ORM::for_table('profile')->where('user_id', $id)->find_one();
	}
}
?>