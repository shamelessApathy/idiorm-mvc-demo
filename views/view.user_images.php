<?php
require(HEADER);

var_dump($info);
$root = ROOT;
foreach ($info as $image)
{
	echo "<img src='$image->path'/><br>";
}

?>
<h1> This is the user image page!</h1>


<?php require(FOOTER); ?>