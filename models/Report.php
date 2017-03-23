<?php
class Report {
	public function create_new($type, $description = null, $user_id, $image_id)
	{
		$report = ORM::for_table('report')->create();
		$time = time();
		$report->type = $type;
		$report->description = $description;
		$report->user_id = $user_id;
		$report->image_id = $image_id;
		$report->created_at = $time;
		if ($report->save())
		{
			return true;
		}
	}
	public function get_reports()
	{
		$reports = ORM::for_table('report')->find_many();
		return $reports;
	}
}