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
?>

<div class='container'>

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
	<div class='image_thumb'><img src='$img'/><input type='checkbox' value='$album_id' name='album_id' class='image_checkbox'/></div>
	</div>
	";
}
	
?>

<button style='position:absolute; display:block; bottom:0; right:15;' type='submit'>Select</button>
</form>
</div>
<?php if (isset($album_images)):?>
<div class='album_modal' style='display:block;'>
<h1> Images Currently in Album: <?php echo $album->album_name;?></h1>
<form action="/album/add_image ?>" method='POST'>
	<?php 
		foreach ($album_images as $image)
		{
			echo "<div class='image_thumb'><img src='$image->thumbnail'/><input type='checkbox' class='image_checkbox' name='image[]' value='$image->id'/></div>";
		}
	?>
</form>
</div>
<?php endif; ?>
<?php if (isset($user_images)):?>
<div class='album_modal' style='display:block;'>
<form action="/album/add_image/<?php echo $album->album_id; ?>" method='POST'>
	<?php 
		foreach ($user_images as $image)
		{
			echo "<div class='image_thumb'><img src='$image->thumbnail'/><input type='checkbox' class='image_checkbox' name='image[]' value='$image->id'/></div>";
		}
	?>
	<button style='position:absolute; display:block; bottom:0; right:15;' type='submit'>Submit</button>
</form>
</div>
<?php endif; ?>
</div>
<div class='col-md-2'></div>
</div>
</div>
<?php require(FOOTER);?>