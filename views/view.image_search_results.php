<?php require(HEADER);
?>
<div class='container'>
<h3>Search Results</h3>
<?php
$images = $info;

if (is_array($info))
foreach ($info as $image)
{
	echo "<a href='/image/info?id=$image->image_id'><div class='preview_thumb'><img src='$image->thumbnail'/></div></a>";
}
else
{
	$query = $_SESSION['query'];
	echo "Sorry your query of '$query' returned no results!";
}
 ?>
 </div>
<?php require(FOOTER); ?>