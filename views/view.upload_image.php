<?php 
require(HEADER);
$categories = $info;
?>
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

<label>Tags</label><br>
<div id='tag_div'></div><br>
<input id='tag_holder' type='text' style='display:none;' name='tags' placeholder='Use tag editor to add tags' readonly/><br>
<label>Tag Editor</label><br>
<input id='new_tag'><button id='add_tag' type='button'>Add</button>
<br>
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
	<div class='upload_preview_holder'>
	<img width=300  id='upload_preview'/>
	</div>
</div>
</div> 
</div>
</div>
<div class='mobile'>
<form enctype='multipart/form-data' action='/image/new_image' method="POST">
<label id='image_file_label' class='image_file_label' for='mobile_image_file'>Choose an Image</label>
<input type='file' id='mobile_image_file' name='image'><br>
	<div class='mobile_upload_preview_holder' style='position:relative;'>
	<img id='mobile_upload_preview' class='preview-img' />
	</div>
<label>Image Name</label><br>
<input type='text' class='mobile-field' name='user_image_name'/><br>

<label>Tags</label><br>
<div id='mobile_tag_div'></div><br>
<div id='mobile-spacer'></div>
<input id='mobile_tag_holder' type='text' style='display:none;' name='tags' placeholder='Use tag editor to add tags' readonly/><br>
<label>Tag Editor</label><br>
<input id='mobile_new_tag' class='mobile-field'><button id='mobile_add_tag' type='button'>Add</button>
<br>
<input type='checkbox' name='premium' id='premium-mobile' HIDDEN>
<label id='premium-label'>Check here for Premium &nbsp</label><br>
<div id='upload_price_mobile'><label>Price</label><br>
<input type='text' id='mobile_input_price' value='5' name='price'>
<p class='mobile-warn'>  Format like 10.99 no "$"</p>
<button type='button' id='premium-cancel' >Cancel</button>
</div>
<br>
<button class='mobile-submit' type='submit'>Submit</button>
</form>



<?php require(FOOTER); ?>
<script src='/views/js/tag_format.js' type='text/javascript' rel='javascript'></script>