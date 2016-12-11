<?php 
require(HEADER);
?>
<div class='container'>
<h1>This is the upload image page!</h1>
<form enctype='multipart/form-data' action='/image/new_image' method="POST">
<input type='file' name='image'><br>
<label>Image Name:</label><br>
<input type='text' name='user_image_name'/><br>
<label>Tags</label><br>
<input id='tag_holder' type='text' name='tags' placeholder='Use tag editor to add tags' readonly/><br>
<label>Tag Editor</label><br>
<input id='new_tag'><button id='add_tag' type='button'>Add</button>
<br>
<button style='margin-top:5px;' type='submit'>Submit</button>
</form>
</div>

<?php require(FOOTER); ?>
<script src='/views/js/tag_format.js' type='text/javascript' rel='javascript'></script>