<?php
class Suggestion {
	public function create_new($user_id = null, $email, $description)
	{
		$time = time();
		$suggestion = ORM::for_table('suggestion')->create();
		$suggestion->user_id = $user_id;
		$suggestion->email = $email;
		$suggestion->description = $description;
		$suggestion->created_at = $time;
		if ($suggestion->save())
		{
			return true;
		}
	}
}