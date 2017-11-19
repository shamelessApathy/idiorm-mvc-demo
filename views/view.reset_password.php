<?php require_once(HEADER);?>


<div class='container'>
<h3> Reset your password here</h3>
	<form name='reset-password' action='/user/reset_email' method='POST'>
	<label>The email associated with your account?</label><br>
	<input name='email' type='text'>&nbsp<button type='submit'>Send Email</button>
	</form>
</div>
<?php require_once(HTML_FOOTER);?>
<?php require_once(FOOTER);?>