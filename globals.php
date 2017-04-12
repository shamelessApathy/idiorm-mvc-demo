<?php

function return_view($view, $info =null) 
{

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
?>