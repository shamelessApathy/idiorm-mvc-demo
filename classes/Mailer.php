<?php
class Mailer {
	function __construct()
	{
		require_once(SWIFT_MAILER);
	}
	function purchase_confirmation($user_id, $items, $price)
	{
		require_once(MODELS . '/User.php');
		$user = Model::factory('User')->find_one($user_id); 
		$email = $user->email;
		$text = "Thank you for purchasing your image!";

		$subject = 'Sharefuly Image Purchase Confirmation';
		$from = array('support@dev.sharefuly.com' =>'Support');
		$to = array(
		 $email => "$user->first_name $user->last_name"
		);
		// add a decimal to the price string, more complicated than it sounded 3 steps
		$price = str_split($price);
		array_splice($price, -2, count($input), ".");
		$price = implode($price);
		$html = "<em> <strong>Sharefuly</strong> Stock Photography</em><br><h4>You've made a purchase!</h4><p>Price: $price</p><p>You can view all of your purchased images <a href='http://idiorm.dev/user/purchased'>here</a> by logging in!</p> <h4>Purchased Items</h4><ul>";

		// if $items array has more than one thing in it, then run this.
		if (count($items) > 1)
		{
		// creates a bunch of list items <li> and appends them to the HTML blob $html
			foreach ($items as $item)
			{
				require_once(MODELS . "/Image.php");
				$model = Model::factory('Image')->find_one($item['image_id']);
				$html = $html . "<li>ID: $model->id Name: $model->user_image_name</li>";
			}
			$html = $html . "</ul>";
		}
		else
		{
			require_once(MODELS . "/Image.php");
			$model = Model::factory('Image')->find_one($items['image_id']);
			$html = $html . "<li>ID : $model->id Name: $model->user_image_name</li></ul>";
		}
		$html = $html . "<h4>Thank you very much for using Sharefuly as your media supplier!</h4>";
 
		$transport = Swift_SmtpTransport::newInstance('smtp.mailtrap.io', 465);
		$transport->setUsername('496800b5ca10efac0');
		$transport->setPassword('fbcf6bacada144');
		$swift = Swift_Mailer::newInstance($transport);

		$message = new Swift_Message($subject);
		$message->setFrom($from);
		$message->setBody($html, 'text/html');
		$message->setTo($to);
		$message->addPart($text, 'text/plain');

		if ($recipients = $swift->send($message, $failures))
		{
		 echo 'Message successfully sent!';
		} else {
		 echo "There was an error:\n";
		 print_r($failures);
		}
	}
	public function bug_submission_confirmation($email)
	{
		require_once(MODELS . '/User.php');
		$email = $email;
		$text = "Thank you for your bug submission!";

		$subject = 'Sharefuly Bug Submission Confirmation';
		$from = array('support@dev.sharefuly.com' =>'Support');
		$to = array(
		 $email => "Bug Submission"
		);
		$html = "<h4>Thank you!</h4><p>You taking the time to submit a bug you found is helping make Sharefuly better!</p><p>Sharefuly Support Team</p><a href='http://sharefuly.com'>Sharefuly Stock Photography</a>";

 
		$transport = Swift_SmtpTransport::newInstance('smtp.mailtrap.io', 465);
		$transport->setUsername('496800b5ca10efac0');
		$transport->setPassword('fbcf6bacada144');
		$swift = Swift_Mailer::newInstance($transport);

		$message = new Swift_Message($subject);
		$message->setFrom($from);
		$message->setBody($html, 'text/html');
		$message->setTo($to);
		$message->addPart($text, 'text/plain');

		if ($recipients = $swift->send($message, $failures))
		{
		 echo 'Message successfully sent!';
		} else {
		 echo "There was an error:\n";
		 print_r($failures);
		}
	}
	public function suggestion_confirmation($email, $user_id = null)
	{
		if (!empty($user_id))
		{
			require_once(MODELS . '/User.php');
			$user = Model::factory('User')->find_one($user_id);
		}
		else
		{
			$user = null;
		}

		$email = $email;
		$text = "Thank you for your suggestion!";

		$subject = 'Sharefuly Suggestion Submission Confirmation';
		$from = array('support@dev.sharefuly.com' =>'Support');
		if (!empty($user))
		{
			$to = array(
				$email => "$user->first_name $user->last_name"
				);
		}
		else
		{
			$to = array(
		 	$email => "Suggestion Submission"
			);
		}
		$html = "<h4>Thank you!</h4><p>This is an auto-generated confirmation response to your suggestion submission</p><p>You taking the time to suggest something helps make Sharefuly better!</p><p>Sharefuly Support Team</p><a href='http://sharefuly.com'>Sharefuly Stock Photography</a>";

 
		$transport = Swift_SmtpTransport::newInstance('smtp.mailtrap.io', 465);
		$transport->setUsername('496800b5ca10efac0');
		$transport->setPassword('fbcf6bacada144');
		$swift = Swift_Mailer::newInstance($transport);

		$message = new Swift_Message($subject);
		$message->setFrom($from);
		$message->setBody($html, 'text/html');
		$message->setTo($to);
		$message->addPart($text, 'text/plain');

		if ($recipients = $swift->send($message, $failures))
		{
		 echo 'Message successfully sent!';
		} else {
		 echo "There was an error:\n";
		 print_r($failures);
		}

	}
	// The whole $user object is already instantiated within the calling function for this
	// Might as well send the whole thing rather than instantiate again
	public function subscription_confirmation($user, $plan)
	{
		$plan = ORM::for_table('subscription_details')->where('id', $plan)->find_one();
		$plan_text = $plan['name'];
		$plan_price = $plan['price'];
		$plan_number = $plan['number'];
		$email = $user->email;
		$text = "Subscription Confirmation";

		$subject = 'Sharefuly Subscription Confirmation';
		$from = array('support@dev.sharefuly.com' =>'Support');
		$to = array(
				$email => "$user->first_name $user->last_name"
				);

		$html = "<h4>Thank you!</h4><p>This is an auto-generated confirmation response to your subscription enrollment</p><ul><li>Plan: $plan_text</li><li>Price: $plan_price</li><li>Images: $plan_number</li></ul><p>Sharefuly Support Team</p><a href='http://sharefuly.com'>Sharefuly Stock Photography</a>";

 
		$transport = Swift_SmtpTransport::newInstance('smtp.mailtrap.io', 465);
		$transport->setUsername('496800b5ca10efac0');
		$transport->setPassword('fbcf6bacada144');
		$swift = Swift_Mailer::newInstance($transport);

		$message = new Swift_Message($subject);
		$message->setFrom($from);
		$message->setBody($html, 'text/html');
		$message->setTo($to);
		$message->addPart($text, 'text/plain');

		if ($recipients = $swift->send($message, $failures))
		{
		 echo 'Message successfully sent!';
		} else {
		 echo "There was an error:\n";
		 print_r($failures);
		}
	}
}