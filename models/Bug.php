<?php
class Bug {
	public function create_report($type, $email, $description)
	{
		$time = time();
		$bug = ORM::for_table('bug')->create();
		$bug->type = $type;
		$bug->email = $email;
		$bug->description = $description;
		$bug->created_at = $time;
		if ($bug->save())
		{
			return true;
		}
		else
		{
			return false;
		}
	}
}