

<html>
<head>
<!-- <meta name="viewport" content="width=device-width, initial-scale=1">-->
<link href="<?php echo '/views/bootstrap/css/bootstrap.css';?>" rel='stylesheet' type='text/css'/>
<link href='/views/js/jquery-ui-1.12.1/jquery-ui.css' rel='stylesheet' type='text/css'/>
<link href="<?php echo '/'. CSS . '/styles.css';?>" rel='stylesheet' type='text/css'/>

</head>
<?php if (isset($_SESSION['user_info'])) {$user = $_SESSION['user_info'];}?>
<div class='nav-mod'>
<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="/">sharefuly</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="active"><?php if(isset($user)):?>
        <a href="/user/info/<?php echo $user->id;?>"><?php echo $user->username . "  <img style='width:25px;height:25px;' src='$user->avatar'/>";?></a>
      <?php else:?>
       <!-- <a href='/home'>Login</a>-->
      <?php endif;?>

            <span class="sr-only">(current)</span></li>
        <?php if(isset($user)):?>
      <?php endif;?>
      <?php if (isset($user)):?>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Options <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="/profile/edit_profile">Edit Profile</a></li>
            <li><a href="/image/upload_image">Upload an Image</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="/store/admin">Your Store</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="/user/get_images">Image Manager</a></li>
            <li><a href='/user/purchased'>Purchased Images</a></li>
          </ul>
        </li>
      <?php endif;?>
      <?php if (!isset($user)):?>
        <li>
          <a href='/user/register'>Register</a>
        </li>
        <li>
          <form id='login_form' style='top:+15px; position:relative; display:block;' action='/user/verify' method='POST'>
          <input type='text' name='email' placeholder='email' style='width:90px;'/>
          <input type='password' name='password' placeholder='password' style='width:90px;' />
          <button type='submit'>Login</button>
          </form>
        </li>
      <?php endif;?>
      </ul>
      <form class="navbar-form navbar-left" id='nav_search' action='/tag/search_by_tag' method="GET">
        <div class="form-group" >
          <input type="text" class="form-control" style='width:100px;' name='query' placeholder="Search">
        </div>
        <button type="submit" class="btn btn-default">Submit</button>
      </form>
      <ul  id='login-form' class="nav navbar-nav navbar-right">
     


        <?php if (isset($user) && $user->level === '1'): ?> <!-- just found out this right here, the user->level returns a string, why? -->
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Admin Options <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="/admin/post_manager">Post Manager</a></li>
            <li><a href="/admin/user_manager">User Manager</a></li>
            <li><a href="/admin/image_manager">Image Manager</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="#">Separated link</a></li>
          </ul>
        </li>
      
      <?php endif; ?>
      </ul>
      <?php if (isset($user)):?>
      <a class='navbar-brand logout' href='/user/logout'>Logout</a>
    <?php endif; ?>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
</div>
<div class='spacer'></div>
</html>