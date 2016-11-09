
<?php require_once(HEADER); ?>


<h1> Login</h1>
<form action='verify' method='POST'>
<label>Name:</label><input type='text' name='name'/>
<label>Email:</label><input type='text' name='email'/>
<label>Password:</label><input type='password' name='password'/>
<button type='submit'>Submit</button>
</form>


<a href='register'>Register</a>
<?php require_once(FOOTER); ?>