<?php require_once(HEADER);?>
<?php $images = $info['images'];?>
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
	<div class='row'>
	<h1><?php echo strtoupper($info['category']);?></h1>
		<?php foreach($images as $image):?>
			<?php if (!empty($image)):?>
			<div class='search-item'>
			<div class='preview-thumb'> 
				<a href="/image/info?id=<?php echo $image->id;?>" class='search-item-link'></a>
			<img class='image-result' 
				data-price="<?php echo $image->price;?>" 
				data-filetype="<?php echo $image->mime_type;?>" 
				data-width="<?php echo $image->width;?>" 
				data-height="<?php echo $image->height;?>" 
				data-id="<?php echo $image->id;?>"
				data-tags="<?php $json = json_encode($image->tags);echo htmlentities($json, ENT_QUOTES, 'UTF-8');?>"
				data-watermark="<?php echo $image->watermark;?>"
				src="<?php echo $image->thumbnail;?>"/>
			</div>
			</div>
		<?php endif;?>
		<?php endforeach;?>
	</div>
</div>
<?php require_once(HTML_FOOTER);?>
<?php require_once(FOOTER);?> 
<script src='/views/js/search_results.js'></script>