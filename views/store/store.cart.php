<?php
require_once(HEADER);
$cart = $info;
?>



<h1>This is the cart</h1>
<?php 
foreach($info as $image)
{
	echo "<img src='$image->thumbnail'/><br>";
}
?>

<?php require_once(FOOTER); ?>