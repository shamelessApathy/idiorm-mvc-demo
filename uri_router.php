<?php 

require_once('globals.php');
$controller;
$method;
$param;
function uri_router($uri) {
	$full_uri = $uri;
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
if ($controller === 'home' || $controller === '')
{
	return_view('view.home.php');
}


$controller_path = CONTROLLERS . '/' . $controller . '.php';
// currently stuck on a way to call the controller function specified in the URI ambiguously
if (file_exists($controller_path))
{
	$controllerConcat = "$controller" . "Controller";
	require($controller_path);
	$new = new $controllerConcat();
	// had original set the $param = null just in case there would be an error if there wasn't one, we'll see
	if (!isset($param))
	{
		$param = '';
	}
	$new->$method($param);
}
elseif (!isset($controller))
{
	return_view('view.home.php');
	sys_msg('No Controller Found!');
}
}


?>