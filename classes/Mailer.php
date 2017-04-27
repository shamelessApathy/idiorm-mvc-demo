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
		$html = "<em>Stock Photography <strong>Sharefuly</strong></em><br><h4>You've made a purchase!</h4><p>Price: $price</p><p>You can view all of your purchased images <a href='http://idiorm.dev/user/purchased'>here</a> by logging in!</p> <h4>Purchased Items</h4><ul>";

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