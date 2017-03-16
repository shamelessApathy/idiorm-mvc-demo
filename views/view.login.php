
<?php require_once(HEADER); ?>

<div class='container'>
<h1> Login</h1>
<form action='verify' method='POST'>
<label>Email:</label><br>
<input type='text' name='email'/><br>
<label>Password:</label><br>
<input type='password' name='password'/><br>
<button type='submit'>Submit</button>
</form>
<a href='register'>Register</a>
</div>


<?php require_once(FOOTER); ?>