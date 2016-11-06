<?php

function return_view($view, $data = null) 
{
if (isset($data)){
	$data = $data;
}
require(VIEWS . '/' . $view);
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