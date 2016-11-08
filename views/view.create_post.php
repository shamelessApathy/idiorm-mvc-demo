<?php
require(HEADER);
?>

<form name='post' action='/post/create_new' method='POST' style='display:block;'>
	<label>Title:</label><input name='title' style='width:300px;'><p></p>
	<label>Body:</label><input name='body' style='height:400px; width:300px;'><p></p>
	<button type='submit'>Submit</button>

</form>