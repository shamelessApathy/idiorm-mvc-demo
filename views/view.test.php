<?php
require(HEADER);
?>
<form action='/test/add_vote' method='POST'>
<select name='vote'>
<option value='0'>Down</option>
<option value='1'>Up</option>
</select><br>
<label>Image ID</label><br>
<input type='text' value='25' name='image_id' readonly><br>
<label>Tag ID</label><br>
<input type='text' value='30' name='tag_id' readonly><br>
<button type='submit'>Vote</button>
</form>



<?php 
require(FOOTER);
?>