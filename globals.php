<?php

function return_view($view, $info =null) 
{

require(VIEWS . '/' . $view);
$info = $info;
}
function sys_msg($msg)
{
	$inline = "this.parentElement.setAttribute('style','display:none')";
	echo "<div  class='sys_msg'>System Message: $msg <i onclick=$inline class='fa fa-window-close'></i></div>";
}


function user_msg($msg)
{
	$inline = "this.parentElement.setAttribute('style','display:none')";
	echo "<div class='user_msg'>User Message: $msg <i onclick=$inline class='fa fa-window-close'></i></div>";
}
?>