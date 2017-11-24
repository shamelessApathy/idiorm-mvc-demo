<?php
define('ROOT','/var/www/dev_idiorm/idiorm-mvc-demo');
define('CONTROLLERS', ROOT . '/controllers');
define('CLASSES', ROOT . '/classes');
define('MODELS', ROOT . '/models');
define('VIEWS', ROOT . '/views');
define('HEADER', VIEWS . '/header.php');
define('FOOTER', VIEWS . '/footer.php');
define('CSS', 'views/css');
define('BOOTSTRAP', 'views/bootstrap-3.3.7-dist');
define('BASE_CONTROLLER', ROOT . '/controllers/controller.php');
define('SIDEBAR', ROOT . '/views/view.sidebar.php');
define('HTML_FOOTER', ROOT . '/views/html_footer.php');
define('GLOBAL_PRICE', 5);
define('SWIFT_MAILER', ROOT . '/vendor/swiftmailer/swiftmailer/lib/swift_required.php');
define('MAILER', ROOT . '/classes/Mailer.php');
define('STORE_URI', 'http://idiorm.dev');

?>