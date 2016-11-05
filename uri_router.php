<?php 
require_once('globals.php');
function uri_router($uri) {
	$uri = explode('/', $uri);
	if(isset($uri[1]))
	{
	$controller = $uri[1];
	}

	if(isset($uri[2]))
	{
		$method = $uri[2];
	}
	if(isset($uri[3]))
	{
		$param = $uri[3];
	}

$controller_path = CONTROLLERS . '/' . $controller . '.php';
if (file_exists($controller_path))
{
	echo 'true';
}
else
{
	echo 'no controller found';
}
}
if (!isset($controller))
{
	return_view('view.home.php');
}


?>