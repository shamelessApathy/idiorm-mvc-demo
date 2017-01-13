<?php
require(HEADER);
?>
<form action='/vote/weighted_vote' method='POST'>
<label>Tag ID</label><br>
<input type='text' name='tag_id'><br>
<label>Image ID</label><br>
<input type='text' name='image_id'><br>
<label>Tag ID</label><br>
<button type='submit'>Vote</button>
</form>



<?php 
require(FOOTER);
?>