<?php require(HEADER);?>

<div class='container'>
<div class='row'>
<div class='col-md-6'>
<button class='image-manager-button' id='cash-sales' type='button'>Cash Sales</button>
<br>
<table id='cash-table'>
<col style='width:100px;'>
<col style='width:100px;'>
<col style='width:100px;'>
<col style='width:130px;'>
<thead>
	<th>Preview</th>
	<th>Image ID</th>
	<th>Price</th>
	<th>Date</th>
</thead>
<?php foreach ($info['sold'] as $sale): ?>
	<tr>
		<td><a href="/image/info?id=<?php echo $sale->image_id;?>"><img style='max-width:100%;' src="<?php echo $sale->preview;?>"/></a></td>
		<td><?php echo $sale->image_id;?></td>
		<td><?php echo $sale->price;?></td>
		<td><?php echo date("F j, Y, g:i a", $sale->created_at);?></td>
	</tr>
<?php endforeach;?>
</table>
</div>
<div class='col-md-6'>
<button class='image-manager-button' id='sub-sales' type='button'>Subscription Sales</button>
<br>
<table id='sub-table'>
	<col style='width:100px;'>
	<col style='width:100px;'>
	<col style='width:100px;'>
	<col style='width:100px;'>
	<thead>
		<th>Preview</th>
		<th>Image ID</th>
		<th>Buyer ID</th>
		<th>Date</th>
	</thead>
	<?php foreach ($info['sub'] as $sale):?>
		<tr>
			<td><a href="/image/info?id=<?php echo $sale->image_id;?>"><img style='max-width:100%;' src="<?php echo $sale->preview;?>"/></a></td>
			<td><?php echo $sale->image_id;?></td>
			<td><?php echo $sale->user_id;?></td>
			<td><?php echo date("F j, Y, g:i a", $sale->created_at);?></td>
		</tr>
<?php endforeach;?>
</table>
</table>
</div>
</div>
</div>

<?php require(FOOTER);?>
<script src="/views/js/user-sales.js"></script>