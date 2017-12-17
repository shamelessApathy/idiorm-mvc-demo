<?php require_once(HEADER);?>
<?php $images = $info['images'];?>
<?php
/*echo "<pre>";
print_r($images);
echo "</pre>";*/

?>
<div class='image-details'>
<div class='image-details-hider'>
<div class='image-details-opacity'>
<div class='image-button-holder'><a href='/login'><button type='button'>Login to Download</button></a></div>
<div class='close-image-details'><i class='fa fa-close'></i></div>
<div class='clear'></div>
<div class='row'>
<div class='col-md-3'>

<ul class='image-details-ul'>
		<li class='image-details-username'></li>
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
				alt="<?php echo $image->user_image_name;?>"
				data-user="<?php echo $image->user_id;?>"
				data-avatar="<?php echo $image->user_avatar;?>"
				data-price="<?php echo $image->price;?>"
				data-username="<?php echo $image->username;?>" 
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