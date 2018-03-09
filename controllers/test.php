<?php
		use Imagine\Image\BoxInterface;
		use Imagine\Image\ImageInterface;
		use Imagine\Image\FontInterface;
require(BASE_CONTROLLER);
class testController extends Controller {
	public function file()
	{
		return_view('view.test.php');
	}
	// pulls all votes associated with tags for a particular image
	public function test_vote($user_id, $image_id, $tag_id, $ip)
	{
		$arbiter = false;
		require_once(MODELS . '/Vote.php');
		$model = new Vote();
		$votes = $model->get_all_for_image($image_id);
		foreach ($votes as $vote)
		{
			if (($vote->user_id === $user_id && $vote->tag_id === $tag_id) || ($vote->ip === $ip && $vote->tag_id === $tag_id))
			{
				$arbiter = true;
			}
		}
		if ($arbiter)
		{
			echo 'arbiter returning true';
		}
		else
		{
			echo 'no current match';
		}
	}
	// adds vote entry to vote table with all applicable info, needs to be able to check for duplicate IPs
	public function add_vote()
	{
		$user_id = $_SESSION['user_info']['id'];
		$image_id = $_POST['image_id'];
		$tag_id = $_POST['tag_id'];
		$vote = $_POST['vote'];
		$ip = $_SERVER['REMOTE_ADDR'];
		$this->test_vote($user_id, $image_id, $tag_id, $ip);
		{
			require_once(CONTROLLERS . '/Vote.php');
			$model = new Test();
			if ($model->add_vote($vote, $ip, $user_id, $image_id, $tag_id))
			{
				echo "it worked!~~!!!";
			}
		}
	}
	public function move($image)
	{
		$table = ORM::for_table('images_owned')->create();
		$table->user_id = $image->user_id;
		$table->image_id = $image->id;
		$table->status = 1;
		if($table->save())
		{
			echo 'yes';
		}

	}
	public function change_over()
	{
		$table = ORM::for_table('image')->find_many();
		foreach($table as $image)
		{
			$this->move($image);
		}
	}
	public function start_mail()
	{
		return_view('view.test.php');
	}
	public function send_mail()
	{
		$email = $_POST['email'];
		$text = $_POST['text'];
		require_once(SWIFT_MAILER);

		$subject = 'Hello from Sharefuly!';
		$from = array('support@dev.sharefuly.com' =>'Support');
		$to = array(
		 $email => 'Customer'
		);

		$text = "Some demo text lorem ipsum etcetera";
		$html = "<em>Stock Photography <strong>Sharefuly</strong></em>";

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
	public function thumb()
	{
		require_once(MODELS . '/Image.php');
		$all = Model::factory('image')->find_many();
		foreach ($all as $image)
		{
			$path = $this->thumbnail($image->path);
			$image->thumbnail = $path;
			$image->save();
		}
	}
	public function time()
	{
		$user_id = 1;
		$sub = ORM::for_table('subscription_to_user')->where('user_id', $user_id)->find_one();
		$details = ORM::for_table('subscription_details')->where('subscription_id', $sub->subscription_id)->find_one();
		$number = $details->number;
		$initial = $sub->created_at;
		$time = time();
		$modulo = $time - $initial;
		$month = 86400*30;
		$howmany = floor($modulo/$month);
		$change = $month*$howmany;
		$change = $change + $initial;
		$after = $change + $month;
		var_dump($time);
		var_dump($change);
		var_dump($after);
		$purchases = ORM::for_table('subscription_purchase')->where('user_id', $user_id)->where_gt('created_at', $change)->where_lt('created_at',$after)->find_many();
		var_dump(count($purchases));
	}
	public function cart($item)
	{
		require_once(ROOT . '/app/libraries/cart.php');
		$cart = new Cart();
		$cart->remove_item($item);
	}
	public function upload()
	{
		$file = $_FILES['image']['tmp_name'];
		$sha = sha1_file($file);
		echo "$file <br>";
		var_dump($sha);
	}
	public function app($info)
	{
		echo $info . "<br>";
		echo "you are in the app function";
	}
	public function batch()
	{
		return_view('view.test.php');
	}
	public function catch_batch()
	{
		$big_array = $_FILES;
		$count = count($big_array['batch-file']['name']);
		$simple_array = array();
		$path_holder = array();

		for ($i=0; $i < $count; $i++)
		{
			$name = ["name" => $big_array['batch-file']['name'][$i], "type" => $big_array['batch-file']['type'][$i],"tmp_name" => $big_array['batch-file']['tmp_name'][$i], "size"=> $big_array['batch-file']['size'][$i]];
			array_push($simple_array, $name);
		}
		foreach ($simple_array as $image)
		{
			$path  = $this->thumbnail($image); 
			array_push($path_holder, $path);	
		}
		$json_ready = json_encode($path_holder);
		echo $json_ready;
	}
		// from here we create new images and store them in the DB, need RAW, Watermark, and Thumbnail

	public function thumbnail($image)
	{
		$file = $image['tmp_name'];
 		$name = $image['name'];
 		$type = 'image';
		$nodir = explode('/', $file);
		$nodir = $nodir[2];
		$ext = explode('.', $name);
		if ($ext[1] === 'jpg')
		{
			$ext = 'jpeg';
		}
		else
		{
			$ext = $ext[1];
		}
		$ext2 = $ext;
		$ext = '.' . $ext;
		$save_path = '/var/www/idiorm/idiorm-mvc-demo/users/images/batch/thumb_' . $nodir . $ext;
		$new_path = '/users/images/batch/thumb_' . $nodir . $ext;
		$image_real = new Imagick($file);
		$image_real->thumbnailImage(600,600, true);
		if ($image_real->writeImage($save_path))
		{
			return $new_path;
		}
		else
		{
			return false;
		}
	}
}
