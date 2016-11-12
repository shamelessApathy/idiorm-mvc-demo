<?php

function return_view($view, $info =null) 
{

require(VIEWS . '/' . $view);
$info = $info;
}

function sys_msg($msg)
{
	echo "<div class='sys_msg'>System Message: $msg</div>";
}


function user_msg($msg)
{
	echo "<div class='user_msg'>User Message: $msg</div>";
}
?>