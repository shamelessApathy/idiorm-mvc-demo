<?php 
require(HEADER);

if (isset($info['user_images']))
{
	$user_images = $info['user_images'];
}

if (isset($info['albums']))
{
$albums = $info['albums'];
$first_images = $info['album_first_images'];
}

if (isset($info['album_images']))
{
	$album = $info['album'];
	$album_images = $info['album_images'];
}
if (isset($info['categories']))
{
	$categories = $info['categories'];
}
?>

<div class='container'>
<div class='row'>
	<div class='focus_modal'>
		<div class='col-md-6'>
			<div class='focus_details'>
				<ul>
					<li><label>Name:</label><input id='focus_name' name='user_image_name'></li>
					<li id='focus_width'></li>
					<li id='focus_height'></li>
					<li id='categories'><strong>Categories:</strong></li>
					<li id='focus_tags'><strong>Tags:</strong></li>
				</ul>
				<input type='text' id='add_tag'>
				<button type='button' id='add_tag_button'>Add Tag</button>
				<select id='add_category'>
					<option value='1' name='people'>People</option>
					<option value='2' name='places'>Places</option>
					<option value='3' name='things'>Things</option>
				</select>
				<button id='add_category_button'>Add Category</button>
			</div>
			<button style='margin-top:15px;' id='delete_image' type='button'>Delete</button>
		</div>
		<div class='col-md-6'>
		<div class='focus_image'></div>
		</div>		
	</div>
</div>
	<div class='row focus_move'>
	<div class='col-md-2'></div>
	<div class='col-md-8'>
	<?php if (!isset($info['album_images'])):?>
		<a href='/user/get_images'>Get All Your Images</a>
	<?php endif; ?>
	<?php if (isset($info['album_images'])):?>
	<a href='/album/album_manager'>Go back to Album Manager</a>
<?php endif; ?>
		<form action='/album/create_new' method='POST'>
		<label>Create new album:</label>
		<input type='text' name='album_name'/>
		<button type='submit'>Submit</button>
		</form>
	</div>
	<div class='col-md-2'></div>

	</div>
<div class='row'>
<div class='col-md-2'></div>
<div class='col-md-8'>
<div class='album_modal' style="<?php if (isset($albums)) { echo 'display:block';}?>">
<form action="/album/edit_album" method="POST">
<h3>Select which album to edit</h3>
<?php  

$num = count($albums);
for ($i = 0; $i < $num; $i++)
{
	$name = $albums[$i]->album_name;
	$img = $first_images[$i];
	$album_id = $albums[$i]->album_id;
	echo "
	<div class='album_thumb'>
	<h3>$name</h3>
	<div class='_thumb'><img src='$img'/><input type='checkbox' value='$album_id' name='album_id' class='image_checkbox'/></div>
	</div>
	";
}
	
?>
<div class='album-options'>
<select name='param'>
	<option value='edit' name='param'>Edit</option>
	<option value='delete' name='param'>Delete</option>
</select>
<button  type='submit'>Submit</button>
</div>

</form>
</div>
</div>
<div class='col-md-2'></div>
</div>
<!-- album images area -->
<?php if (isset($album_images)):?>
<div class='row'>
<div class='col-md-2'></div>
<div class='col-md-8'>
<div class='album_modal' style='display:block; height:250px;'>
<h1> Images Currently in Album: <?php echo $album->album_name;?></h1>
<form action="/album/remove_image/<?php echo $album->album_id; ?>" method='POST'>
	<?php 
		foreach ($album_images as $image)
		{
			echo "<div class='image_thumb'><img src='$image->thumbnail'/><input type='checkbox' class='image_checkbox' name='image[]' value='$image->id'/></div>";
		}
	?>
</div>
<div class='modal_button'>
	<button style='position:absolute; display:block; bottom:0; right:15;' type='submit'>Remove</button>
</div>
</form>
</div>
<div class='col-md-2'></div>
</div>
<?php endif; ?>
<!-- this is the all user images area -->
<?php if (isset($user_images)):?>
<div class='row'>
<div class='col-md-2'></div>
<div class='col-md-8'>
<div class='album_modal' style='display:block;'>
<h1>All User Images</h1>
<form action="/album/add_image/<?php echo $album->album_id; ?>" method='POST'>
	<?php 
	$counter = 0;
		foreach ($user_images as $image)
		{
			$uploaded = $image->created_at;
			$uploaded = date("m/d/Y", $uploaded);
			echo "<div class='image_thumb'><input type='checkbox' class='image_checkbox' name='image[]' value='$image->id'/><div class='image_holder'><img data-name='$image->user_image_name'  data-width='$image->width' data-height='$image->height' data-watermark='$image->watermark' data-id='$image->id' src='$image->thumbnail'/></div></div>";
		}
	?>
</div>
<div class='modal_button'>
	<button style='position:absolute; display:block; bottom:0; right:15;' type='submit'>Submit</button>
</div>
</form>
</div>
<div class='col-md-2'></div>
</div>

<?php endif; ?>
</div>
</div>
</div>
<?php require(FOOTER);?>
<script src='/views/js/album_manager.js' type='text/javascript' rel='javascript'></script>