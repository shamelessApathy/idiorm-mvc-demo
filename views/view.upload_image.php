<?php 
require(HEADER);
?>
<div class='container'>
<h1>This is the upload image page!</h1>
<form enctype='multipart/form-data' action='/test/overlay' method="POST">
<input type='file' name='image'><br>
<label>Image Name:</label><br>
<input type='text' name='user_image_name'/><br>
<button style='margin-top:5px;' type='submit'>Submit</button>
</form>
</div>

<?php require(FOOTER); ?>