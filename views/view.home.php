<?php require_once(HEADER); ?>
<?php //var_dump($_SESSION['data']); ?>
<h1> This is the homepage </h1>
<?php if (!isset($_SESSION['user_info'])) :?>
<h2>Login</h2>
<form action='/user/verify' method='POST'>
<label>Email:</label><input type='text' name='email'/>
<label>Password:</label><input type='password' name='password'/>
<button type='submit'>Submit</button>
</form>
<?php endif; ?>

<?php 

if (isset($_SESSION['user_info']))
{
	$user = $_SESSION['user_info'];
	echo "Welcome " . $user->name . '!';
}

?>

<?php if (isset($_SESSION['user_info'])):?><a href='/post/new_post'> Create a new post!</a><?php endif;?>

<?php require_once(FOOTER); ?>