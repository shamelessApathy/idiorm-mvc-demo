

<html>
<head>
<!-- <meta name="viewport" content="width=device-width, initial-scale=1">-->
<link href="<?php echo '/views/bootstrap/css/bootstrap.css';?>" rel='stylesheet' type='text/css'/>
<link href='/views/js/jquery-ui-1.12.1/jquery-ui.css' rel='stylesheet' type='text/css'/>
<link href="<?php echo '/'. CSS . '/styles.css';?>" rel='stylesheet' type='text/css'/>

</head>
<?php if (isset($_SESSION['user_info'])) {$user = $_SESSION['user_info'];}?>
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
      <a class="navbar-brand" href="/">BLOG</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="active"><?php if(isset($user)):?>
        <a href="/user/info/<?php echo $user->id;?>"><?php echo $user->email . "  <img style='width:25px;height:25px;' src='$user->avatar'/>";?></a>
      <?php else:?>
        <a href='/home'>Login</a>
      <?php endif;?>

            <span class="sr-only">(current)</span></li>
        <?php if(isset($user)):?>
        <li><a href="/user/get_user_posts">My Posts</a></li>
      <?php endif;?>
      <?php if (isset($user)):?>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Options <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="/post/new_post">New Post</a></li>
            <li><a href="/profile/edit_profile">Edit Profile</a></li>
            <li><a href="/image/upload_image">Upload an Image</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="/store/admin">Your Store</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="/album/album_manager">Album Manager</a></li>
          </ul>
        </li>
      <?php endif;?>
      <?php if (!isset($user)):?>
        <li>
          <a href='/user/register'>Register</a>
        </li>
      <?php endif;?>
      </ul>
      <form class="navbar-form navbar-left">
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Search">
        </div>
        <button type="submit" class="btn btn-default">Submit</button>
      </form>
      <ul class="nav navbar-nav navbar-right">
        <?php if (!isset($_SESSION['user_info'])):?>
          <form style='top:+15px; position:relative; display:block;' action='/user/verify' method='POST'>
          <label>Email:</label><input type='text' name='email'/>
          <label>Password:</label><input type='password' name='password'/>
          <button type='submit'>Login</button>
          <a href='/user/register'>Register</a>
          </form>
        <?php endif;?>


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
      <a class='navbar-brand' style='float:right;' href='/user/logout'>Logout</a>
    <?php endif; ?>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
<div class='spacer'></div>
</html>