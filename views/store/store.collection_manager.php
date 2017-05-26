<?php
require_once(HEADER);
if (isset($info['user_images']))
{
	$user_images = $info['user_images'];
}
?>
<div class='container'>
<div class='row'>
	<div class='focus_modal'>
		<div class='col-md-6'>
			<div class='focus_details'>
			<p id='focus_type'></p>
				<ul>
					<li id='focus_name'></li>
					<li id='focus-category'>
						<select id='category-change'>
								<option id='none-selected'>No Category Assigned</option>
							<?php foreach($info['categories'] as $cat):?>
								<option value="<?php echo $cat->id;?>"><?php echo ucwords($cat->title);?></option>
							<?php endforeach;?>
						</select>
						<button type='button'>Change</button>
					</li>
					<li id='focus_edit_name'><input id='edit_name'><button id='save_name'>save</button></li>
					<li id='focus_price'></li>
					<li id='focus_width'></li>
					<li id='focus_height'></li>
					<li><strong>Tags:</strong></li>
					<li id='focus_tags'></li><br>
				</ul>
				<input type='text' id='add_tag'>
				<button type='button' id='add_tag_button'>Add Tag</button>
			</div>
			<div id='download_image'></div>
			<button style='margin-top:15px;' id='delete_image' type='button'>Delete</button>
		</div>
		<div class='col-md-6'>
		<div class='focus_image'></div>
		</div>	
		<div class='close'>X</div>
	</div>
</div>
<?php if (isset($user_images)):?>
<div class='row focus_move_two'>
<div class='col-md-2'></div>
<div class='col-md-8'>

<h1 style='text-align:center;'>All User Images</h1>
<p style='text-align:center;'> click on an image to edit </p>
<?php
echo "<div class='collection-wrapper'><div class='focus-scroll-hider'></div>";
		foreach ($user_images as $image)
		{
			$uploaded = $image->created_at;
			$uploaded = date("m/d/Y", $uploaded);
			if ($image->auth == 2)
			{
				$image->thumbnail = '/views/img/unauth.png';
				$image->watermark = '/views/img/unauth.png';
			}
			if (isset($image->category->title))
			{
				$cat = $image->category->title;
			}
			else
			{
				$cat = null;
			}
			echo "
					<div class='search-item'>
						<img class='collection-thumb' style='max-height:110px;' data-name='$image->user_image_name'  data-width='$image->width' data-height='$image->height' data-watermark='$image->watermark' data-price='$image->price' data-premium='$image->premium' data-id='$image->id' data-category='$cat'  src='$image->thumbnail'/>
						</div>
				";
				
		}
	echo "</div>";
	?>




</div>
<div class='col-md-2'></div>
</div>
</div>
<?php endif; ?>

<?php require_once(HTML_FOOTER); ?>
<?php

require_once(FOOTER);
?>
<script src='/views/js/album_manager.js' type='text/javascript' rel='javascript'></script>