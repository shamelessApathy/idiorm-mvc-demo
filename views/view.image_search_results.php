<?php require(HEADER);

?>
<h1> this is the image search results page </h1>
<?php
$images = $info;
foreach ($info as $image)
{
	$image->vote = (Int) $image->vote;
}
uasort($images, function ($a, $b) {
    if ($a->vote === $b->vote) {
        return 0;
    }

    return ($a->vote < $b->vote) ? -1 : 1;
});

foreach ($info as $image)
{
	echo "<a href='/image/info?id=$image->image_id'><img src='$image->thumbnail'/></a>";
}

 ?>
<?php require(FOOTER); ?>