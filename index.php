<?php 

//require('vendor/j4mie/idiorm/idiorm.php');
//require('vendor/j4mie/paris/paris.php');
//error_reporting(0);
//ini_set('display_errors', 0);
require('vendor/autoload.php');
require('constants.php');
require('globals.php');
require('uri_router.php');
error_reporting(0);
$dotenv = new Dotenv\Dotenv(__DIR__);
$dotenv->load();
ORM::configure('mysql:host=localhost;dbname=idiorm_production');
ORM::configure('username', $_ENV['DB_USER']);
ORM::configure('password', $_ENV['DB_PASS']);
ORM::configure('logging', true);
ORM::configure('error_mode', PDO::ERRMODE_EXCEPTION);
ORM::configure('id_column_overrides', array(
    'album' => 'album_id',
    'user' => 'user_id'
));
session_start();
$_SESSION['start'] = true;

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
