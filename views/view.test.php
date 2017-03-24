<?php
require(HEADER);
?>
<form enctype='multipart/form-data' action='/test/upload' method='POST'>
	<input type='file' name='image'/>
	<button type='submit'>Submit</button>
</form>



<?php 
require(FOOTER);
?>