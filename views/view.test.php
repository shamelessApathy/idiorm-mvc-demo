<?php
require(HEADER);
?>
<form action='/test/send_mail' method='POST'>
<label>Email</label><input type='text' name='email'><br>
<label>Body</label><br>
<input type='text' name='text'><br>
<button type='submit'>Send</button>
</form>



<?php 
require_once(HTML_FOOTER);
require(FOOTER);
?>