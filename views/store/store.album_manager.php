<?php 
require(HEADER);
$user_images = $info['images'];
$album = $info['album'];
var_dump($album);
?>

<div class='container'>

<div class='row'>
<div class='col-md-2'></div>
<div class='col-md-8'>
<div class='album_modal' style="<?php if (isset($user_images)) { echo 'display:block';}?>">
<h3>Album Title:<?php echo $album->album_name;?></h3>
<?php  
	if (isset($user_images))
	{
		foreach($user_images as $image)
		{
			echo "<div class='image_thumb'><img src='$image->thumbnail'/><input type='checkbox' class='image_checkbox' name='image' value='$image->id'/></div>";
		}
	}
?>
<button style='position:absolute; display:block; bottom:0; right:15;'type='submit'>Submit</button>
</form>
</div>
</div>
<div class='col-md-2'></div>
</div>
</div>
<?php require(FOOTER);?>