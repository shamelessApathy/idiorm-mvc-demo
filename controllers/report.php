<?php
require(BASE_CONTROLLER);

class reportController extends Controller { 

/**
*
* @param $_POST vars Type, Description = null, Image_ID
* @return true on success
*/
	public function create_new()
	{
		require_once(MODELS . '/Report.php');
		$type = $_POST['type'];
		if (isset($_POST['description']))
		{
			$description = $_POST['description'];
		}
		else
		{
			$description = null;
		}
		$user_id= $_SESSION['user_info']['id'];
		$image_id = $_POST['image_id'];
		$model = new Report();
		if ( $model->create_new($type, $description, $user_id, $image_id))
		{
			$array = array('image_id' => $image_id, 'type' => $type);
			return_view('store/store.report.php', $array);
		}
	}
}