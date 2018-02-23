<?php
require(HEADER);
?>
<h1>You are in the batch upload test area</h1>

<form enctype="multipart/form-data" name="test-batch" id="test-batch" method="POST" target="batch-upload-iframe" action="/test/catch_batch">
	<input type="file" name="batch-file[]" id="batch-file" multiple/>
	<div class="batch-upload-card-holder"></div>
	<button type="submit">Submit</button>
</form>


<div id='files'>
 
</div>


<iframe name="batch-upload-iframe" id="batch-upload-iframe"></iframe>


<?php 
require_once(HTML_FOOTER);
require(FOOTER);
?>

<script src='/views/js/batch.js'></script> 