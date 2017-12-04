<?php 
require_once(BASE_CONTROLLER);
class bugController extends Controller {

	public function report()
	{
		return_view('view.bug.php');
		if ( isset($_GET['success']))
		{
			user_msg('Your Bug report was submitted successfully! Thank you!');
		}
	}
	public function create_report()
	{
		$type = $_POST['type'];
		if ($type == 'default')
		{
			return_view('view.bug.php');
			sys_msg('You must have all fields filled in!');
		}

		$description = $_POST['description'];
		if (isset($_POST['email']))
		{
			$email = $_POST['email'];
		}
		else
		{
			$email = null;
		} 

		require_once(MODELS . '/Bug.php');
		$model = new Bug();
		require_once(MAILER);
		$mailer = new Mailer();
		$bool = $this->validate($email, 'email');
		if (!empty($email) && $bool)
		{
			$mailer->bug_submission_confirmation($email);
		}
		if ($model->create_report($type, $email, $description))
		{
			header("Location:/bug/report?success=true");
		}
	}

}