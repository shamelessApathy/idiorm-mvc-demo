<?php require(HEADER);
?>
<div class='container'>
<h3>Search Results for "<?php echo $info['query'];?>"</h3>
<?php
$images = $info['images'];

?>
<?php if (is_array($info)):?>
<?php foreach ($images as $image): ?>
<div class='search-item'>	
<a href="/image/info?id=<?php echo $image->image_id;?>">
		<div class='preview-thumb'>
			<img src="<?php echo $image->thumbnail;?>"/>
		</div>
		<ul class='search-results-info'>
		<li>Price <?php echo $image->info->price . '.00';?></li>
		<li>FileType <?php echo $image->info->mime_type;?></li>
		<li>Width <?php echo $image->info->width;?></li>
		<li>Height <?php echo $image->info->height;?></li>
		</ul>
		<h4 style=text-align:center;'>TAGS</h4>
		<div class='search-tags'>
		<?php foreach ($image['tags'] as $tag):?>
			<div class='tag' id="<?php echo $tag['id'];?>">
				<?php echo $tag['text'];?>
			</div>
		<?php endforeach;?>
		</div> 
</a>
</div>
<?php endforeach ;?>
<?php endif;?>
 
 </div>
 <?php require_once(HTML_FOOTER); ?>
<?php require(FOOTER); ?>