
<?php
require('app/libraries/cart.php');
$cart2 = new Cart();
 ?>
<html>
<head>
<link rel="apple-touch-icon" sizes="57x57" href="/apple-icon-57x57.png">
<link rel="apple-touch-icon" sizes="60x60" href="/apple-icon-60x60.png">
<link rel="apple-touch-icon" sizes="72x72" href="/apple-icon-72x72.png">
<link rel="apple-touch-icon" sizes="76x76" href="/apple-icon-76x76.png">
<link rel="apple-touch-icon" sizes="114x114" href="/apple-icon-114x114.png">
<link rel="apple-touch-icon" sizes="120x120" href="/apple-icon-120x120.png">
<link rel="apple-touch-icon" sizes="144x144" href="/apple-icon-144x144.png">
<link rel="apple-touch-icon" sizes="152x152" href="/apple-icon-152x152.png">
<link rel="apple-touch-icon" sizes="180x180" href="/apple-icon-180x180.png">
<link rel="icon" type="image/png" sizes="192x192"  href="/android-icon-192x192.png">
<link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="96x96" href="/favicon-96x96.png">
<link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
<link rel="manifest" href="/manifest.json">
<meta name="msapplication-TileColor" content="#ffffff">
<meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
<meta name="theme-color" content="#ffffff">
<?php if (is_array($info) && isset($info['image'])) : ?>
  <?php $image = $info['image'];
$image_url = "http://dev.sharefuly.com" . $image->thumbnail;
$path = "/image/info?id=";
$request =$_SERVER['REQUEST_URI'];
$exploded = explode('/',$request);
$second_explode = explode('?',$exploded[2]);
$which = $second_explode[0];
$page_url = "http://dev.sharefuly.com/image/info?id=".$image->id;
$description = "";
foreach ($info['tags'] as $tag)
{
  $description = $description.$tag['text'].", ";
}

   ?>
<meta property="og:title" content="<?php echo $image->user_image_name;?>" />
<meta property="og:type" content="website"/>  
<meta property="og:image"              content="<?php echo $image_url;?>"/>
<meta property="og:url"              content="<?php echo $page_url;?>"/>
<meta property="og:description"        content="<?php echo $description;?>"/>
<meta property="og:site_name"              content="Sharefuly"/>
<?php else: ?>
  <?php $server = $_SERVER['SERVER_NAME']; 
  $main_image = "http://" . $server . '/sharefulynewlogo.png';
  ?>
<meta property="og:title" content="Sharefuly Stock Photography" />
<meta property="og:type" content="website"/>  
<meta property="og:image"              content="<?php echo $main_image;?>"/>
<meta property="og:description"        content="Stock photo website anyone can contribute to!"/>
<meta property="og:site_name"              content="Sharefuly"/>
<?php endif; ?>
<!-- <meta name="viewport" content="width=device-width, initial-scale=1">-->
<link href="<?php echo '/views/bootstrap/css/bootstrap.css';?>" rel='stylesheet' type='text/css'/>
<link href='/views/js/jquery-ui-1.12.1/jquery-ui.css' rel='stylesheet' type='text/css'/>
<link href="<?php echo '/'. CSS . '/styles.css';?>" rel='stylesheet' type='text/css'/>
<link href='/views/css/font-awesome-4.7.0/css/font-awesome.min.css' type='text/css' rel='stylesheet'/>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<!--<?php // require_once('piwik_head.php');?>-->
</head>
<?php if (isset($_SESSION['user_info'])) {$user = $_SESSION['user_info'];} ?>

<?php 
$request = $_SERVER['REQUEST_URI'];
$request = explode('/', $request);

if ($request[1] === 'admin')
{
  echo "<div class='admin-warning'>You are in the admin area! </div>";
}
?>
<div class='spacer'></div>
</html>
