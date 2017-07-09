<?php require_once(HEADER);?>
<div class='container'>
<?php foreach ($info as $image):?>
	<div class='admin-image-holder'>
		<img src="<?php echo $image->thumbnail;?>">
		<a href="/admin/delete_user_image?image_id=<?php echo $image->id;?>&user_id=<?php echo $image->user_id;?>"><button type='button'>Delete</button></a>
	</div>
<?php endforeach;?>
</div>
<?php require_once(HTML_FOOTER);?>
<?php require_once(FOOTER);?>