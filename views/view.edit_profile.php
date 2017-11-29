<?php 
require(HEADER);
if (isset($_SESSION['user_info']))
{
	$user = $_SESSION['user_info'];
}
if (isset($info->dob))
{
	$date = explode('/' ,$info->dob);
	$mm = $date[0]; 
	$dd = $date[1];
	$yy = $date[2];
}
?>


<!-- This is going to need some javascript, want to preview the avatar, probably a bunch of other cool features to add -->
<html>
<div class='container'>
<h1> Profile for <?php echo $_SESSION['user_info']['username'];?></h1>

<form name="user_profile" action='/profile/update' method='POST'>


<div class='profile_edit_section'>

	<label>First Name</label><br>
	<input type='text' name='first_name' value="<?php echo isset($info->first_name) ?  $info->first_name : '';?>"/><br>
	<label>Middle</label><br>
	<input type='text' name='middle_name' value="<?php echo isset($info->middle_name) ? $info->middle_name : '';?>"/><br>
	<label>Last</label><br>
	<input type='text' name='last_name' value="<?php echo isset($info->last_name) ? $info->last_name : '';?>"/><br>
	<label>Birthdate</label><br>
	<input class='dob' value="<?php echo isset($info->dob) ? $mm : '';?>" name='month'/><input class='dob' value="<?php echo isset($info->dob) ? $dd : '';?>" name='day'/><input class='dob_year' name='year' value="<?php echo isset($info->dob) ? $yy : '';?>"/><br>





	<label>City</label><br>
	<input name='city' value="<?php echo isset($info->city) ? $info->city : ''; ?>"><br>
	<label>State/Region</label><br>
	<input name='state' value="<?php echo isset($info->state) ? $info->state : ''; ?>"><br>
	<label>Country</label><br>
	<input name='country' value="<?php echo isset($info->country) ?  $info->country : ''; ?>"><br>
	<label>Website</label><br>
	<input name='website' value="<?php echo isset($info->website) ? $info->website : '';?>"><br>
	<label>Bio Paragraph</label><br>
	<textarea style='width:500px; height:200px;' name='bio' value=""><?php echo isset($info->bio) ? $info->bio : '';?></textarea><br>
</div>
<br>
<button type='submit'>Submit</button>


<a href='/user/new_password'>Click here to change your password!</a>
</div>
</div>





<?php require_once(HTML_FOOTER);?>
<?php require(FOOTER);?>
