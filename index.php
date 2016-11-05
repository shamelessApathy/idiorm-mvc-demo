<?php 

require('vendor/j4mie/idiorm/idiorm.php');
require('constants.php');
require('globals.php');
require('uri_router.php');
ORM::configure('mysql:host=localhost;dbname=idiorm');
ORM::configure('username', 'root');
ORM::configure('password', 'proline55');

$uri = $_SERVER['REQUEST_URI'];
uri_router($uri);





?>