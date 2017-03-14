<?php require(HEADER);?>


<table class='sold'>
<h3>Images Sold for Cash</h3>
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
		<td><img style='max-width:100%;' src="<?php echo $sale->preview;?>"/></td>
		<td><?php echo $sale->image_id;?></td>
		<td><?php echo $sale->price;?></td>
		<td><?php echo date("F j, Y, g:i a", $sale->created_at);?></td>
	</tr>
<?php endforeach;?>
<?php require(FOOTER);?>