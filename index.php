<?php 

//require('vendor/j4mie/idiorm/idiorm.php');
//require('vendor/j4mie/paris/paris.php');
require('vendor/autoload.php');
require('constants.php');
require('globals.php');
require('uri_router.php');
ORM::configure('mysql:host=localhost;dbname=idiorm');
ORM::configure('username', 'root');
ORM::configure('password', 'Poke8112');
ORM::configure('logging', true);
ORM::configure('id_column_overrides', array(
    'album' => 'album_id',
    'user' => 'user_id'
));
session_start();

$uri = $_SERVER['REQUEST_URI'];
if (strpos($uri, '?'))
{
	$explode = explode('?',$uri);
	$uri = $explode[0];
	$query = $explode[1];
	uri_router($uri, $query);
}
else
{
uri_router($uri);
}




?>
