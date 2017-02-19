<?php require(HEADER);?>
<?php $price = $info['price'] * 100; ?>
<?php $_SESSION['plan'] = $info['name'];?>
<div class='container'>
<div class='cart-outside'>
	<div id='cart-container'>
		<div class='cart-item'>
			<div class="<?php echo $info['class'];?>"><?php echo $info['name'] . '<br>'; ?></div>
			<div class='subscription-number'>Images per month: <?php echo $info['number'] . '<br>'; ?></div>
			<div class='subscription-price'>Price: <?php echo $info['price'] . '<br>'; ?></div>
		</div>
		<div class='subscription-agreement'>You are signing up for the <?php echo $info['name'];?> plan. Subscription is recurring every 30 days</div>
		<form style='margin-top:30px;margin-left:20px;' action="/cart/process_subscription" method="POST">
			<input type='number' value="<?php echo $info['price'];?>" readonly hidden>
			  <script
			    src="https://checkout.stripe.com/checkout.js" class="stripe-button"
			    data-key="pk_test_THNgelG59hWBD2E9l16SZqsj"
			    data-amount="<?php echo $price; ?>"
			    data-name="Sharefuly LLC"
			    data-description="Widget"
			    data-image="https://stripe.com/img/documentation/checkout/marketplace.png"
			    data-locale="auto">
			  </script>
		</form>
	</div>
</div>
</div>

<?php require(FOOTER);?>