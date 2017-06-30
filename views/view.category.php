<?php require_once(HEADER);?>
<?php $images = $info['images'];?>

<div class='container'>
	<div class='row'>
	<h1><?php echo strtoupper($info['category']);?></h1>
		<?php foreach($images as $image):?>
			<?php if (!empty($image)):?>
			<div class='preview-thumb'> 
				<a href="/image/info?id=<?php echo $image->id;?>" class='search-item-link'></a>
			<img class='image-result' 
				data-price="<?php echo $image->price;?>" 
				data-filetype="<?php echo $image->mime_type;?>" 
				data-width="<?php echo $image->width;?>" 
				data-height="<?php echo $image->height;?>" 
				data-id="<?php echo $image->id;?>"
				data-tags="<?php $json = json_encode($image->tags);echo htmlentities($json, ENT_QUOTES, 'UTF-8');?>"
				src="<?php echo $image->watermark;?>"/>
			</div>
		<?php endif;?>
		<?php endforeach;?>
	</div>
</div>
<?php require_once(HTML_FOOTER);?>
<?php require_once(FOOTER);?>