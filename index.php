<?php 

require('vendor/j4mie/idiorm/idiorm.php');
require('vendor/j4mie/paris/paris.php');
require('constants.php');
require('globals.php');
require('uri_router.php');
ORM::configure('mysql:host=localhost;dbname=idiorm');
ORM::configure('username', 'root');
ORM::configure('password', 'proline55');
ORM::configure('logging', true);
session_start();

$uri = $_SERVER['REQUEST_URI'];

uri_router($uri)




?>
