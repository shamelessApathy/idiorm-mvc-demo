<?php
require_once(BASE_CONTROLLER);

class suggestionController extends Controller {
	public function create_new()
	{
		return_view('view.suggestion.php');
	}
	public function create_suggestion()
	{
		if (empty($_POST['email']))
		{
			return_view('view.suggestion.php');
			sys_msg('Please include your email so we can respond!');
			return;
		}
		if (empty($_POST['description']))
		{
			return_view('view.suggestion.php');
			sys_msg('We need a description of your suggestion!');
			return;
		}
		else
		{
			if (isset($_POST['user_info']['id']))
			{
				$user_id = $_POST['user_info']['id'];
			}
			else
			{
				$user_id = NULL;
			}
			$email = $_POST['email'];
			$description = $_POST['description'];
			require_once(MODELS . '/Suggestion.php');
			$model = new Suggestion();
			if($model->create_new($user_id, $email, $description))
			{
				return_view('view.suggestion.php');
				user_msg('Thank you for submitting your suggestion, we will take it into consideration!');
			}
			else
			{
				echo "something happened";
			}
	}
}
}

?>
