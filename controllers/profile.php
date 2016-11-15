<?php
require_once(BASE_CONTROLLER);
class profileController extends Controller {
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
		require(MODELS . '/Profile.php');
		$model = new Profile();
		$model->update($info);
		$profile = $model->user();
		return_view('view.edit_profile.php', $profile );
	}
	public function edit_profile()
	{
		$user_id = $_SESSION['user_info']->id;
		require(MODELS . '/Profile.php');
		$model = new Profile();
		$profile = $model->info($user_id);
		return_view('view.edit_profile.php', $profile);
	}
	public function user()
	{
		require(MODELS . '/Profile.php');
		$model = new Profile();
		$model->user();
	}

}

?>