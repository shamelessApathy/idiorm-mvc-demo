<?php require_once(HEADER);?>

<div class='container'>
	<h3>Reset Password for <?php echo $info['user']->username;?></h3>
	<form name='reset-final' action='/user/final_reset' method='POST'>
		<label>Password</label><br>
		<input type='password' name='password'/><br>
		<label>Confirm Password</label><br>
		<input type='password' name='confirm-password'/><br>
		<input type='hidden' name='token' value="<?php echo $info['token'];?>"/>
		<input type='hidden' name='user_id' value="<?php echo $info['user']->id;?>"/>
		<button type='submit'>Submit</button>
	</form>
</div>
<?php require_once(HTML_FOOTER);?>
<?php require_once(FOOTER);?>