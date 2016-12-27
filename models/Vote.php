<?php

class Vote {
	// gets all votes for an image
	public function get_all_for_image($image_id)
	{
		$votes = ORM::for_table('vote')->where('image_id', $image_id)->find_many();
		return $votes;
	}
	public function delete_vote($vote_id)
	{
		$vote = ORM::for_table('vote')->where('id', $vote_id)->find_one();
		$vote->delete();
	}
	public function get_all_for_tag_and_image($tag_id, $image_id)
	{
		$votes = ORM::for_table('vote')->where('tag_id', $tag_id)->where('image_id', $image_id)->find_many();
		return $votes;
	}
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
			var_dump(ORM::get_last_query());
			return true;
		}
	}
	public function weighted($image_id, $tag_id)
	{
		$votes = ORM::for_table('vote')->where('image_id', $image_id)->where('tag_id', $tag_id)->find_many();
		return $votes;
	}
}

?>