<?php
require(HEADER);

$root = ROOT;
foreach ($info as $image)
{
	if ($image->auth === '2')
	{
		echo '<div style="width:100px; height:100px; border:1px solid black;">Image has been rejected by admin</div>';
	}
	else
	{
	echo "<img src='$image->watermark'/><br>";
	}
}

?>
<h1> This is the user image page!</h1>

<?php require_once(HTML_FOOTER); ?>
<?php require(FOOTER); ?>