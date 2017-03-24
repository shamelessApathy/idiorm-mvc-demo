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
	public function thumbnail($path)
	{
 		$type = 'image';
		$nodir = explode('/', $path);
		$nodir = $nodir[4];
		$ext = explode('.', $nodir);
		var_dump($ext);
		if ($ext[1] === 'jpg')
		{
			$ext = 'jpeg';
		}
		else
		{
			$ext = $ext[1];
		}
		$ext = '.' . $ext;
		$save_path = '/var/www/idiorm/idiorm-mvc-demo/users/images/thumbnails/' . $nodir . $ext;
		$new_path = '/users/images/thumbnails/' . $nodir . $ext;
		$image = new Imagick('/var/www/idiorm/idiorm-mvc-demo' . $path);
		$image->thumbnailImage(300,300, true);
		if ($image->writeImage($save_path))
		{
			return $new_path;
		}
		else
		{
			return false;
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
}
