<?php
require_once(BASE_CONTROLLER);
class voteController extends Controller {
	// pulls all votes associated with tags for a particular image
	// tests to see if any of the tags have been voted on by that user or ip address
	// returns true or false
	public function test_vote($user_id, $image_id, $tag_id, $ip)
	{
		$arbiter = false;
		require_once(MODELS . '/Vote.php');
		$model = new Vote();
		$votes = $model->get_all_for_image($image_id);
		var_dump($votes);
		if ($votes){
		foreach ($votes as $vote)
		{
			// basically what I'm doing here is checking to see if there is a match between any of the tag votes for this image, and a user_id or password
			if (($vote->user_id === $user_id && $vote->tag_id === $tag_id) || ($vote->ip === $ip && $vote->tag_id === $tag_id))
			{
				$arbiter = true;
			}
		}
			if ($arbiter)
			{
				return true;
			}
			else
			{
				return false;
			}
		}
		else
		{
			return false;
		}
	}
	// adds vote entry to vote table with all applicable info, needs to be able to check for duplicate IPs
	public function add_vote()
	{
		$user_id = $_POST['user_id'];
		$image_id = $_POST['image_id'];
		$tag_id = $_POST['tag_id'];
		$vote = $_POST['vote'];
		$ip = $_SERVER['REMOTE_ADDR'];
		// get the bool value of this function, if no vote has been cast for this tag on this image, vote may be cast
		$bool = $this->test_vote($user_id, $image_id, $tag_id, $ip);
		
		if(!$bool)
		{
			require_once(MODELS . '/Vote.php');
			$model = new Vote();
			if ($model->add_vote($vote, $ip, $user_id, $image_id, $tag_id))
			{
				echo true;
				/*require_once(CONTROLLERS . '/image.php');
				$image_controller = new imageControler();
				$image_controller->info($image_id);
				usr_msg('Vote Cast');*/
			}
		}
		else
		{
			echo false;
		}
		
	}
}