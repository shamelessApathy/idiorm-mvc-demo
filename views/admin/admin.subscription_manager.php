<?php require(HEADER);?>

<div class='container'>
<h3>Subscription Manager</h3>
<a href='/admin/get_subscription_purchases'><button>Subscription Purchases</button></a>
<?php if ($info): ?>

	<?php foreach ($info['results'] as $owner) {?>
	<ul id="<?php echo $owner;?>"> User ID: <?php echo $owner;?> Amount:
		<?php foreach ($info['purchases'] as $purchase){ ?>
		<?php if ($purchase['owner_id'] === $owner):?>
				<li>Image ID:<?php echo $purchase->image_id; ?></li>
				<li>Date:<?php echo gmdate("Y-m-d\TH:i:s\Z", $purchase->created_at); ?></li>
		<?php endif;?>
		<?php };?>
		</ul>
	<?php };?>
<?php endif; ?>


<?php $link = $info['extra'];?>
<?php foreach ($link as $subarray)
{
	foreach($subarray as $subsub)
	{
		foreach($subsub as $subsubsub)
		{
			var_dump($subsubsub['image_id']);
		}
	}
	?>
	<br>
	<?php
}
?>

</div>
<?php require(FOOTER);?>