<?php
		use Imagine\Image\BoxInterface;
		use Imagine\Image\ImageInterface;
		use Imagine\Image\FontInterface;
require(BASE_CONTROLLER);
class testController extends Controller {
	public function vote()
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
}
