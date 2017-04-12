
<?php require_once(HEADER); ?>
<div class='container'>
<h1> Register</h1>
<form action='create_new' method='POST'>
<label>Username:</label><br>
<input type='text' name='username'><br>
<label>Email:</label><br> 
<input type='text' name='email'/><br>
<label>Password:</label><br>
<input type='password' name='password'/><br>	
<label>Do you agree to all of the <a href='/user/terms'>terms and conditions</a>?</label><br>
<label>I agree</label>  <input type='checkbox' name='agree'><br>
<button type='submit'>Submit</button>
</form>
</div>

<?php require_once(FOOTER); ?>