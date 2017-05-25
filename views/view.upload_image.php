<?php 
require(HEADER);


$categories = $info;

?>

<meta name="viewport" content="width=device-width, initial-scale=1">
<div class='desktop'>
<div class='container'>
<div class='row'>
<div class='col-md-6'>
<div class='mobile-upload'>
<h3 class='upload-title'> Upload an Image</h3>
<form enctype='multipart/form-data' action='/image/new_image' method="POST">
<label class='image_file_label' for='image_file'>Choose an Image</label>
<input type='file' id='image_file' name='image'><br>
<label>Image Name:</label><br>
<input type='text' name='user_image_name'/><br>
<label>Category</label><br>
<select id='upload-category' name='category-id'>
		<option>Choose a Category</option>
	<?php foreach ($categories as $cat):?>
		<option value="<?php echo $cat->id;?>"><?php echo ucwords($cat->title);?></option>
	<?php endforeach;?>
</select><button name='add-a-category' value='add-a-category' type='button' id='add-a-category'>New Category</button><br>
<label>Tags</label><br>
<div id='tag_div'></div><br>
<input id='tag_holder' type='text' style='display:none;' name='tags' placeholder='Use tag editor to add tags' readonly/><br>
<label>Tag Editor</label><br>
<input id='new_tag'><button id='add_tag' type='button'>Add</button>
<br>
<input type='number' name='rotate' id='rotate' value='0' HIDDEN>
<label>Check here for Premium &nbsp</label><input id='premium' type='checkbox' name='premium'><br>
<div id='upload_price'><label>Price</label><span style='font-size:8px; color:red;'>  Format like 10.99 no "$"</span><br>
<input type='text' id='input_price' value='5' name='price'>
</div>
<br>
<button style='margin-top:5px;' type='submit'>Submit</button>
</form>
</div>
</div>

<div class='col-md-6'>
	<div class='image-controls'>
	<i id='counterclockwise' class='fa fa-rotate-left' style='float:left;'></i>
	<i id='clockwise' class='fa fa-rotate-right' style='float:right;'></i>
	</div>
	<div class='upload_preview_holder'>
	<img width=300  id='upload_preview'/>
	</div>

</div>
</div> 
<div class='add-cat-div'>
	<div class='close'>X</div>
	<p>Submit a New Category</p>
	<input name='cat-title' id='cat-title' type='text'/>
	<button type='button' id='add-cat-button'>Submit</button>
</div>
</div>
</div>



<?php require_once(HTML_FOOTER); ?>
<?php require(FOOTER); ?>
<script src='/views/js/jqueryrotate.js' type='text/javascript' rel='javascript'></script>
<script src='/views/js/tag_format.js' type='text/javascript' rel='javascript'></script>
<script src='/views/js/category.js' type='text/javascript' rel='javascript'></script>
