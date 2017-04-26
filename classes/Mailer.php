<?php
class Mailer {
	function __construct()
	{
		require_once(SWIFT_MAILER);
	}
	function purchase_confirmation($user_id, $items)
	{
		require_once(MODELS . '/User.php');
		$user = Model::factory('User')->find_one($user_id); 
		$image_ids = "";
		foreach ($items as $item)
		{
			$image_ids= $image_ids . ', ' . $item->id;
		}
		$email = $user->email;
		$text = "Thank you for purchasing your image!";

		$subject = 'Sharefuly Image Purchase Confirmation';
		$from = array('support@dev.sharefuly.com' =>'Support');
		$to = array(
		 $email => "$user->first_name $user->last_name"
		);

		$html = "<em>Stock Photography <strong>Sharefuly</strong></em><br><p>You can view all of your purchased images <a href='http://idiorm.dev/user/purchased_images'>here</a> by logging in!</p>";
 
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