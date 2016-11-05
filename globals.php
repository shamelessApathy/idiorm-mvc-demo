<?php

function return_view($view, $data = null) {
if (isset($data)){
	$data = $data;
}
require(VIEWS . '/' . $view);
}

?>