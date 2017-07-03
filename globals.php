<?php

function return_view($view, $info =null) 
{
require_once(MODELS . '/Category.php');
$model =new Category();
$categories = $model->get_all();
require(VIEWS . '/' . $view);
$info = $info;
}
function sys_msg($msg)
{
	$inline = "this.parentElement.setAttribute('style','display:none')";
	echo "<div  class='sys_msg'><i onclick=$inline class='fa fa-window-close'></i><strong>            System Message</strong><br> $msg </div>";
}


function user_msg($msg)
{
	$inline = "this.parentElement.setAttribute('style','display:none')";
	echo "<div class='user_msg'><i onclick=$inline class='fa fa-window-close'></i> <strong>           User Message</strong><br>$msg</div> ";
}


/**
*
* @param none
* @return Returns TRUE is user logged in FALSE if now, checks $_SESSION var
*/

function is_logged_in()
{
	if (!empty($_SESSION['user_info']))
	{
		return TRUE;
	}
	else
	{
		return FALSE;
	}
}
?>