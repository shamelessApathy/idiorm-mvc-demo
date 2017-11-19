<?php require_once(HEADER);?>
<div class='container'>
<h1> Avatar for <?php echo $_SESSION['user_info']['username'];?></h1>
<div class='row'>
<div class='col-md-6'>
<div class='profile_edit_section'>
<form id="user_avatar" type='file' runat="server" enctype='multipart/form-data' action="/profile/validate_file/set_avatar" method='POST' >
    <label>Choose an avatar:</label><input type='file' id="imgInp" name="user_avatar"/>
	<div class='note'>Avatar must be 75px by 75px or it will be resized</div>
    <img id="blah"  src="#" alt="your image" />
    <div>Current image: <img class='user_avatar' src="<?php 
    if (isset($_SESSION['user_info']->avatar)) 
    {
    	echo $_SESSION['user_info']->avatar;
    }
    ?>"></div>
    <button type='submit'>Change Avatar</button>
</form>
</div></div>
<?php require_once(HTML_FOOTER);?>
<?php require_once(FOOTER);?>
<script src='/views/js/edit_profile.js'></script>