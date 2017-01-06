<?php
require_once(BASE_CONTROLLER);

class tokenController extends Controller {

	public function create_token()
	{
		require_once(MODELS . '/Token.php');
		$token_model = new Token();
		$image_id = $_POST['image_id'];
		$username = $_SESSION['user_info']['id'];
		$token = sha1(uniqid($username, true));
		if($token_model->store_token($token, $image_id, $username))
		{
			echo "this is your url: /token/get_file?hash=$token";
		}
	}
	public function get_file()
	{
		$hash = $_GET['hash'];
		require_once(MODELS . '/Token.php');
		$token_model = ORM::for_table('token')->where('hash', $hash)->find_one();
		$image_id = $token_model->image_id;
		require_once(MODELS . '/Image.php');
		$image_model = ORM::for_table('image')->find_one($image_id);
		$image_path = $image_model->path;
		if (file_exists(ROOT . $image_path)) {
    header('Content-Description: File Transfer');
    header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment; filename="'.basename(ROOT . $image_path).'"');
    header('Expires: 0');
    header('Cache-Control: must-revalidate');
    header('Pragma: public');
    header('Content-Length: ' . filesize(ROOT . $image_path));
    readfile(ROOT . $image_path);
    exit;
}
	}

}

 ?>
