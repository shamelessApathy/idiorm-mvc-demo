<?php
require_once(HEADER);
?>


<div class='container'>
	<form name='suggestion' action='/suggestion/create_suggestion' method='POST'>
		<label>Email</label><br>
		<input type='text' name='email'><br>
		<label>Suggestion</label><br>
	<input style='width:300px; height:100px;' type='text' name='description'><br>
	<button type='submit'>Submit</button>
	</form>
</div>






<?php 
require_once(HTML_FOOTER);
require_once(FOOTER);
?>