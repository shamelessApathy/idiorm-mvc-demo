<?php
require_once(HEADER);
?>

<div class='container'>
	<h3>Subscription Options</h3>
	<br>
	<div class='row'>
		<div class='col-md-4'>
			<a class='sub-link' href='/user/subscription_pay?plan=1'>
				<div class='sub-container' id='bronze-sub'>			
				<label>BRONZE</label>
				<p>Limit 5 pictures</p>
				</div>
			</a>
		</div>
		<div class='col-md-4'>
		<a class='sub-link' href='/user/subscription_pay?plan=2'>
			<div class='sub-container' id='silver-sub'>
				<label>SILVER</label>
				<p>Limit 12 pictures</p>
			</div>
		</a>
		</div>
		<div class='col-md-4'>
			<a class='sub-link' href='/user/subscription_pay?plan=3'>
				<div class='sub-container' id='gold-sub'>
					<label>GOLD</label>
					<p>Limit 25 pictures</p>
				</div>			
			</a>
		</div>	
	</div>
</div>
<?php require_once(HTML_FOOTER); ?>
<?php require_once(FOOTER); ?>
<script src='/views/js/subscribe_script.js'></script>