<?php require(HEADER);
?>
<div class='container'>
<h3>Search Results for "<?php echo $info['query'];?>"</h3>
<h4><?php echo $info['count'] . ' results';?></h4>
<?php
$images = $info['images'];
?>

<?php if (is_array($info)):?>
<?php foreach($images as $image):?>
<div class='search-item'>	
<a href="/image/info?id=<?php echo $image->image_id;?>">
		<div class='preview-thumb'>
			<img 
				data-price="<?php echo $image->info->price;?>" 
				data-filetype="<?php echo $image->info->mime_type;?>" 
				data-width="<?php echo $image->info->width;?>" 
				data-height="<?php echo $image->info->height;?>" 
				data-id="<?php echo $image->info->id;?>"
				data-tags="<?php $json = json_encode($image['tags']); echo $json;?>"
				src="<?php echo $image->thumbnail;?>"/>
		</div>
</a>
</div>
<?php endforeach;?>
<?php endif;?>
 <div class='page-count'>Pages  
 <?php 
$count = $info['count'];
$limit = $info['limit'];
$offset = $info['page'];
$query = $info['query'];
$num_pages = ceil($count/$limit);
for ($i = 1; $i <= $num_pages; $i++)
{
	echo "<a href='/tag/search_by_tag?query=".$query."&page=".$i."'>$i  </a>";
}
 ?> 
 </div>
 </div>
 <?php require_once(HTML_FOOTER); ?>
<?php require(FOOTER); ?>