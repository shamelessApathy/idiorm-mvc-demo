<?php
require_once(HEADER);
?>
<div class='container'>
	<h3>Artist Logo Editor</h3>
	<p>Here you may set a small logo with your name or company in .png format no greater than 50px by 50px</p>
	<div class='profile_edit_section'>
<form id="user_avatar" type='file' runat="server" enctype='multipart/form-data' action="/profile/set_logo" method='POST' >
    <label>Choose an artist logo:</label><input type='file' id="imgInp" name="artist-logo"/>
	<div class='note'>Logo must be 50px by 50px or it will be resized</div>
    <img id="blah"  src="#" alt="your image" />
    <div>Current image: <img class='current-artist-logo' src="<?php 
    if (isset($_SESSION['user_info']->logo)) 
    {
    	echo $_SESSION['user_info']->logo;
    }
    ?>"></div>
    <button type='submit'>Change Artist Logo</button>
</form>
</div>
</div>

<?php 
require_once(HTML_FOOTER);
require_once(FOOTER);
?>
<script src='/views/js/artist_logo.js' type='text/javascript'></script>