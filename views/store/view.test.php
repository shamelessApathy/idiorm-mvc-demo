<?php
require(HEADER);
?>
<form action='/test/add_vote'>
<select>
<option value='0'>Down</option>
<option value='1'>Up</option>
</select>
<input type='text' value='25' name='image_id'>
<button type='submit'>Vote</button>
</form>



<?php 
require(FOOTER);
?>