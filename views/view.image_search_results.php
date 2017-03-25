<?php require(HEADER);
?>
<div class='container'>
<h3>Search Results for "<?php echo $info['query'];?>"</h3>
<?php
$images = $info['images'];

if (is_array($info))
foreach ($images as $image)
{
	echo "<a href='/image/info?id=$image->image_id'><div class='preview_thumb'><img src='$image->thumbnail'/></div></a>";
}
else
{
	$query = $info['query'];
	echo "Sorry your query of '$query' returned no results!";
}
 ?>
 </div>
<?php require(FOOTER); ?>