

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

		<div class='nav-button'><a href="/user/info/<?php echo $_SESSION['user_info']->id; ?>">Info</a></div>
		<div class='nav-button'>Posts</div>
	</div>
</nav>
</html>