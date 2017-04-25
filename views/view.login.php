
<?php require_once(HEADER); ?>

<div class='container'>
<div class='style01-form-container'>
<h1> Login</h1>
<form action='verify' method='POST'>
<label>Email</label><br>
<input type='text' name='email'/><br>
<label>Password</label><br>
<input type='password' name='password'/><br>
<button type='submit'>Submit</button>
</form>
<a id='mobile-register' href='register'>Register</a>
</div>
</div>

<?php require_once(HTML_FOOTER); ?>
<?php require_once(FOOTER); ?>