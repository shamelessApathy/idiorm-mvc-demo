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
	public function get_reports($param)
	{
		if ($param == 'unresolved')
		{
			$reports = ORM::for_table('report')->where('resolved',0)->find_many();
			return $reports;
		}
		if ($param = 'resolved')
		{
			$reports = ORM::for_table('report')->where('resolved', 1)->find_many();
		}
		else
		{
			return false;
		}
	}
}