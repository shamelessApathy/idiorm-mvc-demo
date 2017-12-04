
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
$image_url = "http://www.sharefuly.com" . $image->thumbnail;
$path = "/image/info?id=";
$request =$_SERVER['REQUEST_URI'];
$exploded = explode('/',$request);
$second_explode = explode('?',$exploded[2]);
$which = $second_explode[0];
if (isset($image->id))
{
  $page_url = "https:/www.sharefuly.com/image/info?id=".$image->id;
}
else
{
  $page_url = "https://sharefuly.com";
}
$description = "";
if (isset($info['tags']))
{
  foreach ($info['tags'] as $tag)
  {
    $description = $description.$tag['text'].", ";
  }
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
  if (isset($info['count']))
  {
    $description = $info['count'] . " images and counting, a stock photo website anyone can contribute to!";
  }
  else
  {
    $description = "";  
  }
  ?>
<meta property="og:title" content="Sharefuly Stock Photography" />
<meta property="og:type" content="website"/>  
<meta property="og:image"              content="<?php echo $main_image;?>"/>
<meta property="og:description"        content="<?php echo $description;?>"/>
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
<div class='nav-mod'>
<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" id='barz' data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <i class='fa fa-navicon'></i>
      </button>
     
      <a class="navbar-brand" href="/">sharefuly</a>
    </div>



    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

      <ul id='nav-search-holder' class="nav navbar-nav">

      <form class="navbar-form" id='nav_search' action='/tag/search_by_tag' method="GET">
        <div class="form-group" >
          <input type="text" class="form-control" id='nav-search-box' name='query' placeholder="Search">
        </div>
        <button type="submit">Submit</button>
      </form>
        </ul>
         <ul class='nav navbar-nav' id='navbar-avatar'>
        <li id='user-avatar' class="active"><?php if(isset($user)):?>
        <a href="/user/info/<?php echo $user->id;?>"><?php echo $user->username . "  <img style='width:25px;height:25px;' src='$user->avatar'/>  ". $_SESSION['sub_count'];?></a>
      <?php endif;?>
        </li>
        </ul>
            <span class="sr-only">(current)</span></li>
      <?php if (isset($user)):?>
        <ul class='nav navbar-nav' id='navbar-options'>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class='fa fa-cog'></i>  Options <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a id='drop-color' href="/profile/options"><i class='fa fa-pencil'></i>  Profile</a></li>
            <li role="separator" class="divider"></li>
            <li><a id='drop-color' href="/image/upload_image"><i class='fa fa-upload'></i>  Upload an Image</a></li>
            <li role="separator" class="divider"></li>
            <li><a id='drop-color' href="/user/image_manager"><i class='fa fa-image'></i>  Image Manager</a></li>
            <li role="separator" class="divider"></li>
            <li><a id='drop-color' href="/tools"><i class='fa fa-wrench'></i>  Tools</a></li>
            <li role="separator" class="divider"></li>
            <?php if ($user->level === '1'):?>
              <li><a href='/admin/dashboard'>Admin Dashboard</a></li>
              <li role='separator' class='divider'></li>
            <?php endif;?>
            <?php if (isset($user)):?>
              <li><a id='drop-color' href='/user/logout'>Logout</a></li>
            <?php endif; ?>
          </ul>
        </li>
        </ul>
      <?php endif;?>
      <div class='mobile-hide'>
      
      </div>
      <?php if (!isset($user)):?>
      <a id='login-navbar' href='/login'>Login</a>

      <div class='divider'></div>
            <?php endif; ?>
      <ul class="nav navbar-nav">
     


      </ul>


    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
</div>
<div id='tools-nav-bar'>
  <a href='/tools'><i class='fa fa-wrench'></i> Image Tools</a>
</div>
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
