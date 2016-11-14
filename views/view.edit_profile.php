<?php 

require(HEADER);
var_dump($info);
if (isset($_SESSION['user_info']))
{
	$user = $_SESSION['user_info'];
}

?>


<!-- This is going to need some javascript, want to preview the avatar, probably a bunch of other cool features to add -->
<html>
<div class='container'>
<h1> Profile for <?php echo $_SESSION['user_info']->name;?></h1>
<div class='row'>
<div class='profile_edit_section'>
<div class='col-md-12'>
<form id="user_avatar" type='file' runat="server" enctype='multipart/form-data' action="/user/validate_file/set_avatar" method='POST' >
    <label>Choose an avatar:</label><input type='file' id="imgInp" name="user_avatar"/>
	<div class='note'>Avatar must be 75px by 75px or it will be resized</div>
    <img id="blah"  src="#" alt="your image" />
    <button type='submit'>Submit</button>
    <div>Current image: <img class='user_avatar' src="<?php 
    if (isset($_SESSION['user_info']->avatar)) 
    {
    	echo $_SESSION['user_info']->avatar;
    }
    ?>"></div>
</form>
</div></div>
</div>
<form name="user_profile" action='/profile/update' method='POST'>
<div class='row'>
<div class='profile_edit_section'>
<div class='col-md-6'>
<div class='form-group'>
	<label>First Name:</label><br>
	<input type='text' name='first_name' value="<?php echo (isset($user->first_name) ?  $user->first_name : 'First Name');?>"/><br>
	<label>Middle:</label><br>
	<input type='text' name='middle_name'/><br>
	<label>Last:</label><br>
	<input type='text' name='last_name'/><br>
	<label>Birthdate:</label><br>
	<input class='dob' value='MM' name='month'/><input class='dob' value='DD' name='day'/><input class='dob_year' name='year' value='YYYY'/>
</div>
</div>
<div class='col-md-6'>
<div class='form-group'>
	<label>Street Address</label><br>
	<input name='street_address'/><br>
	<label>City</label><br>
	<input name='city'><br>
	<label>State</label><br>
	<input name='state'><br>
	<label>Zip Code</label><br>
	<input name='zip_code'>
</div>
<button type='submit'>Submit</button>
</div>
</div>
</div>
</div>
</form>




<?php require(FOOTER);?>
<script src='/views/js/edit_profile.js'></script>