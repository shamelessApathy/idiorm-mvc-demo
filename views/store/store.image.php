<?php 
require(HEADER);

$image = $info['image'];
?>

<div class='container'>
	<div class='row'>
		<div class='col-md-3'>
			<div class='image_info'>
			<?php echo "
				<ul>
				<li>Name: $image->user_image_name</li>
				<li>Tags: $image->tags</li>
				<li>Width: $image->width</li>
				<li>Height: $image->height</li>
				</ul>
			";?>
			</div>
		</div>
		<div class='col-md-9'>
			<img class='watermark' src="<?php echo $image->watermark;?>"/>
		</div>
	</div>
</div>

<?php require(FOOTER);?>