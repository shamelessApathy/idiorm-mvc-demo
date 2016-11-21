<?php
require_once(BASE_CONTROLLER);
class profileController extends Controller {
	public function edit_profile($bool = null)
	{
		require_once(MODELS . "/User.php");
		require_once(MODELS . '/Profile.php');
		$user_id = $_SESSION['user_info']->id;
		$user = Model::factory('User')->find_one($user_id);
		$profile =$user->profile()->find_one();
		if($bool)
		{
		return_view('view.edit_profile.php', $profile);
		user_msg('profile edited successfully!');
		}
		else
		{
		return_view('view.edit_profile.php', $profile);
		}
	}
	public function update()
	{
		$id = $_SESSION['user_info']->id;
		$firstname = $_POST['first_name'];
		$middlename = $_POST['middle_name'];
		$lastname = $_POST['last_name'];
		$dob = $_POST['month'] . '/' . $_POST['day'] . '/' . $_POST['year'];
		$streetaddress = $_POST['street_address'];
		$city = $_POST['city'];
		$state = $_POST['state'];
		$zipcode = $_POST['zip_code'];
		$info = array('user_id' =>$id, 'first_name' => $firstname, 'middle_name' => $middlename, 'last_name' => $lastname, 'dob' => $dob, 'street_address' => $streetaddress, 'city' => $city, 'state' => $state, 'zip_code' => $zipcode);
		require_once(MODELS . '/Profile.php');
		$model = new Profile();
		$model->update($info);
		$this->edit_profile(true);
	}
/*
* calls set_avatar function
*/
	public function set_avatar()
	{
		require_once(MODELS . '/Profile.php');
		$model = new Profile();
		$result = $model->set_avatar();
		if ($result)
		{
		header('Location: /profile/edit_profile');;
		}
		else
		{
			return_view('view.edit_profile.php');
			sys_msg('Need to select a file for your avatar');
		}
	}
	public function validate_file($function)
	{
	if (empty($_FILES['user_avatar']['error']))
	{
		$file = $_FILES['user_avatar']['tmp_name'];
		$validate = $this->validate($file, 'image');
		$function = $this->$function();
		if ($validate)
		{
			$function;
		}
	}
	else
	{
		var_dump($_FILES['user_avatar']);
		$this->edit_profile();
	}
}



}

?>