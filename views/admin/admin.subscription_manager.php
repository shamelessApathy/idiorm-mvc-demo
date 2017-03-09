<?php require(HEADER);?>

<div class='container'>
<h3>Subscription Manager</h3>
<a href='/admin/get_subscription_purchases'><button>Subscription Purchases</button></a>

<ul class='sub-list'>
<?php 
	$objects = $info;
	foreach ($objects as $owner):?>

	<li class='owner-id'><?php echo $owner->first_name . ' ' . $owner->last_name; ?> Sales <?php echo count($owner->purchases);?><button class='more-button'>More Info</button></li>
		<li class='sub-hidden'><ul>
			<?php foreach ($owner->purchases as $purchase): ?>
				<li>Image ID: <?php echo $purchase->image_id;?></li>
				<li>Buyer ID: <?php echo $purchase->user_id;?></li>
				<li>Date: <?php echo $purchase->created_at;?></li>
			<?php endforeach; ?>
		</ul></li><br>

<?php endforeach;?>
</ul>

</div>
<?php require(FOOTER);?>
<script src='/views/admin/js/admin_subscription_manager.js'></script>

