<?php
require(HEADER);
$json_array = array();
foreach($info as $category)
{
	$temp_array = array("id"=> $category->id, "title" => $category->title);
	array_push($json_array, $temp_array);
}


$encoded_array = json_encode($json_array);

?>
<h1>You are in the batch upload test area</h1>

<form enctype="multipart/form-data" name="test-batch" id="test-batch" method="POST" target="batch-upload-iframe" action="/test/catch_batch">
	<input type="file" name="batch-file[]" id="batch-file" multiple/>
	<div class="batch-upload-card-holder"></div>
	<button id='first-submit' type="submit">Submit</button>
</form>

<form id='final-cut' name='images[]' action='/test/final_cut' method='POST'>
<div id='files'>
 
</div>
<button class='invisible' type='submit' id='final-cut-button'>Submit</button>
</form>


<iframe name="batch-upload-iframe" id="batch-upload-iframe"></iframe>


<div class='invisible' id='json-categories'><?php echo $encoded_array;?></div>
<div class='card-template'>
	<div class='batch-img-holder'>
		<img class='batch-thumbnail' style='max-width:100%; max-height:100%;' src='/demo-image.jpg'/>
	</div>
	<label>Image Name</label><br>
	<input type='text' name='images[][name]'/><br>
	<label>Category</label>
	<select name='images[][category]'>
			<option value=''>Pick One</option>
		<?php foreach($info as $category):?>
			<option value="<?php echo $category->id;?>"><?php echo $category->title;?></option>
		<?php endforeach;?>
	</select><br>
	<label>Tags</label><br>
	<input type='text' name='images[][tags]'/><button type='button' id='add-tag'>Add</button><br>
</div>
<?php 
require_once(HTML_FOOTER);
require(FOOTER);
?>

<script src='/views/js/batch.js'></script> 