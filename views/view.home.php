<?php require_once(HEADER); ?>
<?php //var_dump($_SESSION['data']); ?>
<?php if (!isset($_SESSION['user_info'])) :?>
<div class='container'>
<h1> This is the homepage </h1>
<h2>Login</h2>
<form action='/user/verify' method='POST'>
<label>Email:</label><input type='text' name='email'/>
<label>Password:</label><input type='password' name='password'/>
<button type='submit'>Submit</button>
</form>
<a href='/user/register'>Need to Register?</a>
<?php endif; ?>
<?php 

if (isset($_SESSION['user_info']))
{
	$user = $_SESSION['user_info'];
}

?>

<?php if (isset($_SESSION['user_info'])):?>
<div class='container'>
<h1>This is the hompage</h1>
<h3>Welcome <?php echo $user->first_name; ?> !</h3>
<a href='/post/new_post'> Create a new post!</a><br>
<a href='/image/upload_image'>Upload an image!</a>
<?php endif;?>
</div>
<?php require_once(FOOTER); ?>