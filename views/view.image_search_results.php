<?php require(HEADER); ?>
<h1> this is the image search results page </h1>
<?php
var_dump($info);
foreach ($info as $image)
{
	echo "<a href='$image->watermark'><img src='$image->thumbnail'/></a>";
}

 ?>
<?php require(FOOTER); ?>