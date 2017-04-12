<?php 
require_once(HEADER);
?>

<div class='container'>
<h1>Bug Reporting</h1>
<p> Thank you for taking the time to report a bug you have encountered while using the site!</p>
<p> We are constantly trying to improve our user experience so be as detailed as you like in the description field!</p>
<form action='/bug/create_report' method='POST'>
<label>Error Type</label><br>
	<select name='type'>
		<option value='default'>Choose One</option>
		<option value='0'>Images</option>
		<option value='1'>Payment</option>
		<option value='2'>Account</option>
		<option value='3'>Other</option>
	</select><br>
	<label>Email</label><br>
	<input type='text' name='email'/><br>
	<label>Description</label><br>
	<input style='width:300px; height:150px;' type='text' name='description'><br>
	<button type='submit'>Submit Bug</button>
</form>
</div>




<?php require_once(FOOTER);?>