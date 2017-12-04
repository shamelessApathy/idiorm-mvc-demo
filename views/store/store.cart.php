<?php
require(HEADER);
$cart = $info;
$price = 0;
?>


<div class='container'>
<h1 style='text-align:center'>CART</h1>
<div class='row'>
<div class='col-md-2'></div>
<div class='col-md-8'>
<div class='cart-outside'>
<div id='cart-container'>
<?php 
if (empty($info))
{
	echo '<h3 style="text-align:center;">Nothing in cart</h3>';
}
foreach($info as $image)
{
	echo "<div class='cart-item'>
			<img class='cart-image' data-id='$image->id' src='$image->thumbnail'/>
			<button data-id='$image->id' class='remove-item'>X</button>
			<div class='item-info'>
				<ul>
					<li id='item-price'>$image->price.00</li>
					<li id='item-name'>$image->user_image_name</li>
					<li id='item-size'>$image->width x $image->height</li>
					<li id='item-filetype'>$image->mime_type</li>
				</ul>
			</div>
		</div>";
		$price = $price + $image->price;
}
?>
</div>
</div>
<?php 
$str_price = strval($price);
$formatted = $str_price . '.00';
$price = $price*100;
if ($price < 1000)
{
	$price = $price + 30;
	echo "<div style='width:100%; color:red;'>If total is less than $10.00 a 30 cent transaction fee will be added</div>";
}
?>
<p>Total:<?php echo $formatted;?></p>
<form style='margin-top:10px;' action="/cart/send_info" method="POST">
	<input type='number' value="<?php echo $price;?>" readonly hidden>
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
<div class='col-md-2'></div>
</div>
</div>
</div>
<?php require_once(HTML_FOOTER); ?>
<?php require_once(FOOTER); ?>