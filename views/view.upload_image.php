<?php 
require(HEADER);
$categories = $info;
?>
<div class='container'>
<h3> Upload an Image</h3>
<form enctype='multipart/form-data' action='/image/new_image' method="POST">
<label>Check here for Premium &nbsp</label><input id='premium' type='checkbox' name='premium'><br>
<div id='upload_price'><label>Price</label><span style='font-size:8px; color:red;'>  Format like 10.99 no "$"</span><br>
<input type='text' id='input_price' value='3' name='price'>
</div>
<br>
<input type='file' name='image'><br>
<label>Image Name:</label><br>
<input type='text' name='user_image_name'/><br>
<label>Image Category:</label><br>
<select name='category'>
<option value='' selected='true' disabled select>CHOOSE ONE</option>
	<?php 
	foreach ($categories as $category)
	{
		$category->title = strtoupper($category->title);
		echo "<option value='$category->id'>$category->title</option>";
	}
	?>
</select><br>
<label>Tags</label><br>
<div id='tag_div'></div><br>
<input id='tag_holder' type='text' style='display:none;' name='tags' placeholder='Use tag editor to add tags' readonly/><br>
<label>Tag Editor</label><br>
<input id='new_tag'><button id='add_tag' type='button'>Add</button>
<br>
<button style='margin-top:5px;' type='submit'>Submit</button>
</form>
</div>

<?php require(FOOTER); ?>
<script src='/views/js/tag_format.js' type='text/javascript' rel='javascript'></script>