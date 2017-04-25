<?php require(HEADER);?>
<div class='container'>
<div class='row'>
<div class='col-md-2'></div>
<div class='col-md-8'>
<form action='/user/change_password' method='POST'>
<label>Email</label><br>
<input type='text' name='email' ><br>
<label>Old password</label><br>
	<input name='old_password' type='password'><br>
	<label>New Password</label><br>
	<input name='new_password' type='password'><br>
	<label>Verify New Password</label><br>
	<input name='new_verify' type='password'><br><br>
<button type='submit'>Change Password</button>
</form>
</div>
<div class='col-md-2'></div>
</div>
</div>
<?php require_once(HTML_FOOTER);?>
<?php require(FOOTER);?>