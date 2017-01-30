<?php 
require(HEADER);
$image = $info['image'];
$tags = $info['tags'];
$profile = $info['profile'];
$categories = $info['categories'];
$user = $info['user'];
if (isset($_SESSION['user_info']))
{
	$user_info = $_SESSION['user_info'];
}
?>

<div class='container'>
<div class='user_info' data-user-id="<?php echo $user_info['id'];?>">
	<div class='row'>
	<div class='col-md-2'>
				<div class='image_info' data-id="<?php echo $image->id; ?>">
			<ul>
			<?php echo "
				<li>Uploaded By: </li>
				<li>$user->username <img class='user_avatar2' src='$user->avatar'/></li>
				<li>Name: $image->user_image_name</li>
				<li>Dimensions: $image->width x $image->height</li>
				<li id='price'>Price: $image->price</li>
				
			";
			?>
			</ul>
			</div>
			</div>
		<div class='col-md-8'>
			<img class='watermark' data-id="<?php echo $image->id;?>" src="<?php echo $image->watermark;?>"/>
		</div>
				<div class='col-md-2'>

				<?php if (isset($_SESSION['user_info'])):?>
			<div style='margin-top:10px;'><h3>TAGS</h3><div class='store_tags'> <?php 
			foreach ($tags as $tag)
			{

				echo "<div class='vote_control'><button class='up relevance_button' data-tag-id='$tag->tag_id' data-value='1'>+</button><button class='down relevance_button' data-tag-id='$tag->tag_id' data-value='-1'>-</button><div class='tag'>$tag->text</div><div class='clear'></div></div>";
			}
			?>
				</div>
			<?php endif;?>
	<?php if (!isset($_SESSION['user_info'])): ?>
		<div style='margin-top:10px;'><h3>TAGS</h3><div class='store_tags'> <?php 
			foreach ($tags as $tag)
			{

				echo "<div class='vote_control'><div class='tag'>$tag->text</div><div class='clear'></div></div>";
			}
			?>
		<?php endif; ?>
			</div>
	</div>
</div>
<form id='form_buy' action='/image/buy' method='POST'>
<input name='image_id' hidden value="<?php echo $image->id;?>">
<input id='token' name='token' hidden value="">
<input id='price' name='price' hidden value="<?php echo $image->price;?>">
<button type='submit'>BUY NOW</button>
</form>
<button class='add_to_cart' data-id="<?php echo $image->id; ?>">Add to cart</button>
<script src="https://checkout.stripe.com/checkout.js"></script>

<button id="customButton">Purchase</button>

<script>
var handler = StripeCheckout.configure({
  key: 'pk_test_THNgelG59hWBD2E9l16SZqsj',
  image: 'https://stripe.com/img/documentation/checkout/marketplace.png',
  locale: 'auto',
  token: function(token) {
    // You can access the token ID with `token.id`.
    // Get the token ID to your server-side code for use.
    var token = token.id;
    $('#token').val(token);
    document.getElementById('form_buy').submit();
    }
  });

document.getElementById('customButton').addEventListener('click', function(e) {
  // Open Checkout with further options:
  handler.open({
    name: 'Stripe.com',
    description: '2 widgets',
    zipCode: true,
    amount: <?php echo $image->price*100 ;?>,
    description: "image_id =<?php echo $image->id ;?>"
  });
  e.preventDefault();
});

// Close Checkout on page navigation:
window.addEventListener('popstate', function() {
  handler.close();
});
</script>
<form action='/image/subscription' method='POST'>
	<input name='image_id' hidden value="<?php echo $image->id;?>">
	<button type='submit'>USE SUBSCRIPTION</button>
</form>
</div>
</div>


<?php require(FOOTER);?>
<script src='/views/js/single.js' rel='javascript' type='text/javascript'></script>