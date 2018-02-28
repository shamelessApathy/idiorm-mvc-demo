<?php
require(HEADER);

echo "<pre>";
print_r($info);
echo "</pre>";
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


<?php 
require_once(HTML_FOOTER);
require(FOOTER);
?>

<script src='/views/js/batch.js'></script> 