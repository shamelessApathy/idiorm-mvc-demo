
<?php require_once(HEADER); ?>


<h1> Register</h1>
<form action='create_new' method='POST'>
<label>Username:</label><input type='text' name='username'>
<label>Email:</label><input type='text' name='email'/>
<label>Password:</label><input type='password' name='password'/>
<button type='submit'>Submit</button>
</form>

<?php require_once(FOOTER); ?>