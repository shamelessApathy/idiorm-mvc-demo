<?php require(HEADER);
?>
<h1> this is the image search results page </h1>
<?php
$images = $info;


foreach ($info as $image)
{
	echo "<a href='/image/info?id=$image->image_id'><div class='preview_thumb'><img src='$image->thumbnail'/></div></a>";
}

 ?>
<?php require(FOOTER); ?>