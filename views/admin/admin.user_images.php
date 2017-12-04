<?php require_once(HEADER);?>
<div class='container'>
	<p>Current URI = <?php echo $_SERVER['REQUEST_URI'];?></p>
<?php foreach ($info as $image):?>
	<div class='admin-image-holder'>
		<img src="<?php echo $image->thumbnail;?>">
		<div class="image-controls" style="display: block;">
			<a href="/admin/rotate_image?direction=counterclockwise&image_id=<?php echo $image->id;?>&uri=<?php echo $_SERVER['REQUEST_URI'];?>"><i id="counterclockwise" class="fa fa-rotate-left" style="float:left;"></i></a>
			<a href="/admin/rotate_image?direction=clockwise&image_id=<?php echo $image->id;?>&uri=<?php echo $_SERVER['REQUEST_URI'];?>"><i id="clockwise" class="fa fa-rotate-right" style="float:right;"></i>
		</div>
		<a href="/admin/delete_user_image?image_id=<?php echo $image->id;?>&user_id=<?php echo $image->user_id;?>"><button style='background-color:red;' type='button'>Delete</button></a>
	</div>
	<br>
<?php endforeach;?>
</div>
<?php require_once(HTML_FOOTER);?>
<?php require_once(FOOTER);?>