<?php require(HEADER); ?>
<?php if (!isset($_SESSION['user'])) :?>
<form action='verify' method='POST'>
<label>Name:</label><input type='text' name='name'/>
<label>Email:</label><input type='text' name='email'/>
<label>Password:</label><input type='password' name='password'/>
<button type='submit'>Submit</button>
</form>
<?php endif; ?>

<?php 

if (isset($_SESSION['user']))
{
	$user = $_SESSION['user'];
	echo "Welcome " . $user->name . '!';
}

?>