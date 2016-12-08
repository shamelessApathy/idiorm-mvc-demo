<?php require(HEADER); ?>
<h1> this is the image search results page </h1>
<?php

foreach ($info as $image)
{
	echo "<a href='/image/info?id=$image->id'><img src='$image->thumbnail'/></a>";
}

 ?>
<?php require(FOOTER); ?>