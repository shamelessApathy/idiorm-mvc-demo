<?php require(HEADER);?>

<div class='container'>
<h3>Subscription Manager</h3>
<a href='/admin/get_subscription_purchases'><button>Subscription Purchases</button></a>

<ul class='sub-list'>
<?php 
if (isset($info))
{
	$objects = $info;
	foreach ($objects as $owner):?>

	<li class='owner-id'><?php echo $owner->first_name . ' ' . $owner->last_name; ?> 
	<br>Sales: <?php echo count($owner->purchases);?><br><button class='more-button'>More Info</button>
		<ul class='sub-hidden'>
			<?php foreach ($owner->purchases as $purchase): ?>
				<li>Image ID: <?php echo $purchase->image_id;?></li>
				<li>Buyer ID: <?php echo $purchase->user_id;?></li>
				<li>Date: <?php echo $purchase->created_at;?></li><br>
			<?php endforeach; ?>
		</ul></li><br>

<?php endforeach;?>
<?php };?>
</ul>

</div>
<?php require(FOOTER);?>
<script src='/views/admin/js/admin_subscription_manager.js'></script>

