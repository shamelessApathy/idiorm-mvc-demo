

<html>
<head>
<link href="<?php echo '/'. CSS . '/styles.css';?>" rel='stylesheet' type='text/css'/>
</head>
<nav>
	<div class='top-bar'>
		<div class='nav-button'><?php if (isset($_SESSION['user_info']))
		{
			echo $_SESSION['user_info']->email;
			}
			else {
			 	echo '<a href="/user/login">Login</a>';
			 } ?>

		 	
		</div>
		<?php if (isset($_SESSION['user_info'])) : ?>
		<div class='nav-button'><a href="/user/info/<?php echo $_SESSION['user_info']->id; ?>">Info</a></div>
		<?php endif?>
		<?php if (isset($_SESSION['user_info'])):?><div class='nav-button'><a href='/user/get_user_posts'>Posts</a></div><?php endif; ?>
		<?php if (isset($_SESSION['user_info'])):?><div class='nav-button'><a href='/user/logout'>Logout</a></div><?php endif;?>
	</div>
</nav>
<div class='spacer'></div>
</html>