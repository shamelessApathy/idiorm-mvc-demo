<?php
require_once(HEADER);
?>

<div class='container'>
	<h1 style='text-align:center;'>Subscription Options</h1>
	<div class='row'>
		<div class='col-md-4'></div>
		<div class='col-md-4' style='text-align:center;'>
			<form method='POST' action='/user/add_subscription'>
			<label>Basic 9.99 / month. Limit 5 pictures &nbsp&nbsp&nbsp&nbsp&nbsp</label><input name='subscription' type='radio' value='1'>
			<label>Basic 19.99 / month. Limit 12 pictures &nbsp</label><input type='radio' name='subscription' value='2'>
			<label>Basic 29.99 / month. Limit 25 pictures &nbsp</label><input type='radio' name='subscription' value='3'><br>
			<button type='submit'>Subscribe</button>
			</form>
		</div>
		<div class='col-md-4'></div>		
	</div>
</div>


<?php require_once(FOOTER); ?>