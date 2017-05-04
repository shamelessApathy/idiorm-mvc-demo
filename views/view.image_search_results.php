<?php require(HEADER);
?>
<div class='container'>
<h3>Search Results for "<?php echo $info['query'];?>"</h3>
<?php
$images = $info['images'];

?>
<?php if (is_array($info)):?>
<?php foreach ($images as $image): ?>
<div class='row'>
<div class='search-item'>	
<a href="/image/info?id=<?php echo $image->image_id;?>">
<div class='col-md-9'>
		<div class='preview-thumb'>
			<img src="<?php echo $image->thumbnail;?>"/>
		</div>
</div>
<div class='col-md-3'>
		<div class='search-price'><?php echo $image->price . '.00';?></div>
		<div class='search-tags'>
		<?php foreach ($image['tags'] as $tag):?>
			<div class='tag' id="<?php echo $tag['id'];?>">
				<?php echo $tag['text'];?>
			</div>
		<?php endforeach;?>
		</div>
	</div>
</a>
</div>
</div>
<?php endforeach ;?>
<?php endif;?>
 
 </div>
 <?php require_once(HTML_FOOTER); ?>
<?php require(FOOTER); ?>