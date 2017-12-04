<?php require_once(HEADER);

 ?>


<div class='container'>
<div class='row'>
<h4 style='text-align:center;'>Images for <?php echo $info['username'];?></h4>
<table class='user-images-table'>
<col style='width:10%'>
<col style='width:30%'>
<col style='width:25%'>
<col style='width:25%'>
<thead>
	<th>Image</th>
	<th style='text-align:center;'>Tags</th>
	<th>Description</th>
	<th>Dimensions</th>
</thead>
<tbody>
	<?php foreach ($info['images'] as $image): ?>
		<?php $address = "'/image/info?id=$image->id'" ;?>
		<tr onclick="window.location = <?php echo $address; ?>">
			<td><img style='max-height:110px; max-width:100%;' class='user-images-table-thumb' src="<?php echo $image->thumbnail;?>"></td>
			<td>
			<div class='tag-cell'>
				<?php 
				foreach($image->tags as $tag) 
				{
					if (!empty($tag['text']))
					{
						$text = $tag['text'];
					}
					else
					{
						$text = 'No Tag';
					}
					echo "<div class='tag'> $text </div>"; 
				}
				?>
				</div>
				</td>
				<td>No description</td>
				<td> <?php echo $image->width . "<br>" . $image->height;?></td>
		</tr>
	<?php endforeach; ?>

</tbody>

</table>
</div>
</div>


<?php require_once(HTML_FOOTER); ?>
<?php require_once(FOOTER); ?>
