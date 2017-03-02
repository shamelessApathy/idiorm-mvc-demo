<?php require(HEADER);?>

<div class='container'>
<h3>Subscription Manager</h3>
<a href='/admin/get_subscription_purchases'><button>Subscription Purchases</button></a>
<?php if ($info): ?>
	<table>
	<thead>
		<col style='width:100px;'>
		<col style='width:200px;'>
		<col style='width:100px;'>
		<col style='width:200px;'>
	</thead>
		<th>User</th>
		<th>Owner</th>
		<th>Image</th>
		<th>Date</th>
	<?php foreach ($info as $purchase){ ?>
		<tr>
			<td><?php echo $purchase->user_id; ?></td>
			<td><?php echo "NEED JOIN TABLE" ?></td>
			<td><?php echo $purchase->image_id; ?></td>
			<td><?php echo gmdate("Y-m-d\TH:i:s\Z", $purchase->created_at); ?></td>
		</tr>
		<?php };?>
<?php endif; ?>
</div>
<?php require(FOOTER);?>