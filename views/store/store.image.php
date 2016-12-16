<?php 
require(HEADER);
$image = $info['image'];
$tags = $info['tags'];
?>

<div class='container'>
	<div class='row'>
		<div class='col-md-3'>
			<div class='image_info'>
			<ul>
			<?php echo "
				
				<li>Name: $image->user_image_name</li>
				<li>Tags: $image->tags</li>
				<li>Width: $image->width</li>
				<li>Height: $image->height</li>
				
			";
			?>
			<li style='margin-top:10px;'>Tags: <?php 
			foreach ($tags as $tag)
			{
				echo "<span class='tag'>$tag->text</span>";
			}
			?>
				
			</li>
			</ul>
			</div>
			</div>
		<div class='col-md-9'>
			<img class='watermark' src="<?php echo $image->watermark;?>"/>
		</div>
	</div>
</div>

<?php require(FOOTER);?>