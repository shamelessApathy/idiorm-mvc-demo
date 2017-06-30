<?php require(HEADER);
?>
<div class='image-details'>
<div class='image-details-hider'>
<div class='image-details-opacity'>
<div class='image-button-holder'><button type='button' class='add_to_cart'>Add To Cart</button></div>
<div class='close-image-details'><i class='fa fa-close'></i></div>
<div class='clear'></div>
<div class='row'>
<div class='col-md-3'>

<ul class='image-details-ul'>
		<li class='image-details-price'></li>
		<li class='image-details-filtype'></li>
		<li class='image-details-width'></li>
		<li class='image-details-height'></li>
		<li class='image-details-tags'></li>
</ul>
</div>
<div class='col-md-9'>


	<div class='image-details-holder'></div>
	<div class='image-details-cart'></div>
</div>
</div>
</div>
</div>
</div>
<div class='container'>

<h3>Search Results for "<?php echo $info['query'];?>"</h3>
<?php if (!empty($info['images'])):?>
	<h4><?php echo $info['count'] . ' results';?></h4>
<?php endif;?>
<?php
if (!empty($info['images']))
{
	$images = $info['images'];
}
?>

<br>
<?php if (is_array($info) && !empty($info['images'])):?>
<?php foreach($images as $image):?>
<div class='search-item'>
		<div class='preview-thumb'>
			<a href="/image/info?id=<?php echo $image->info->id;?>" class='search-item-link'></a>
			<img class='image-result' 
				data-price="<?php echo $image->info->price;?>" 
				data-filetype="<?php echo $image->info->mime_type;?>" 
				data-width="<?php echo $image->info->width;?>" 
				data-height="<?php echo $image->info->height;?>" 
				data-id="<?php echo $image->info->id;?>"
				data-tags="<?php $json = json_encode($image['tags']);echo htmlentities($json, ENT_QUOTES, 'UTF-8');?>"
				data-watermark="<?php echo $image->info->watermark;?>"
				src="<?php echo $image->thumbnail;?>"/>
		</div> 

</div>
<?php endforeach;?>
<?php else:?>
	<h4>No images matching your criteria</h4>
<?php endif;?>
<?php if (!empty($images)):?>
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
<?php endif;?>
 </div>
 <?php require_once(HTML_FOOTER); ?>
<?php require(FOOTER); ?>
<script src='/views/js/search_results.js'></script>