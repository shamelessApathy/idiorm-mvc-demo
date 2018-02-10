<?php require_once(HEADER);?>
<?php $images = $info['images'];?>
<?php
/*echo "<pre>";
print_r($images);
echo "</pre>";*/

?>
<div class='container'>
	<div class='row'>
	<h1><?php echo strtoupper($info['category']);?></h1>
		<?php foreach($images as $image):?>
			<?php if (!empty($image)):?>
			<div class='search-item'>
				<a href="/image/info?id=<?php echo $image->id;?>" class='search-item-link'>
			<div class='preview-thumb'> 				
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
			</div></a>
			</div>
		<?php endif;?>
		<?php endforeach;?>
	</div>
</div>
<?php require_once(HTML_FOOTER);?>
<?php require_once(FOOTER);?> 