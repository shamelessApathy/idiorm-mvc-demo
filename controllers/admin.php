<?php
require_once(BASE_CONTROLLER);
class adminController extends Controller {
	public function post_manager()
	{
		return_view('admin/admin.post_manager.php');
	}
}