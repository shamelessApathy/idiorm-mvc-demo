<?php require_once(HEADER);?>
<div class='container'>
<form name="user_profile" action='/profile/create' method='POST'>

<h3>Create profile for <?php echo $_SESSION['user_info']['username'];?></h3>
<div class='profile_edit_section'>

	<label>First Name</label><br>
	<input type='text' name='first_name' value="<?php echo isset($info->first_name) ?  $info->first_name : '';?>"/><br>
	<label>Middle</label><br>
	<input type='text' name='middle_name' value="<?php echo isset($info->middle_name) ? $info->middle_name : '';?>"/><br>
	<label>Last</label><br>
	<input type='text' name='last_name' value="<?php echo isset($info->last_name) ? $info->last_name : '';?>"/><br>

</div>

	<label>City</label><br>
	<input name='city' value="<?php echo isset($info->city) ? $info->city : ''; ?>"><br>
	<label>State/Region</label><br>
	<input name='state' value="<?php echo isset($info->state) ? $info->state : ''; ?>"><br>
	<label>Country</label><br>
	<input name='country' value="<?php echo isset($info->country) ?  $info->country : ''; ?>"><br>
	<label>Website</label><br>
	<input name='website' value="<?php echo isset($info->website) ? $info->website : '';?>"><br>
<button style='margin-top:10px;' type='submit'>Submit</button>
</form>
</div>



<?php require_once(HTML_FOOTER);?>
<?php require_once(FOOTER);?>
