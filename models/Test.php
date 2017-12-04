<?php
class Test {
	// model function to add a vote entry to the vote table
	public function add_vote($vote, $ip, $user_id, $image_id, $tag_id)
	{
		$model = ORM::for_table('vote')->create();
		$model->vote = $vote;
		$model->ip = $ip;
		$model->user_id = $user_id;
		$model->image_id = $image_id;
		$model->tag_id = $tag_id;
		if ($model->save())
		{
			return true;
		}
	}
}