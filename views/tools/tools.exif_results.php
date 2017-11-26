<?php require_once(HEADER);?>
<?php $exif_data = $info;?>
<div class='container'>
	<h4>EXIF DATA EXTRACTED</h4>
	<p><a href='/tools/exif'>Read Another Image</a></p>
	<?php 
		echo "<pre>";
		print_r($exif_data);
		echo "</pre>";
	?>

</div>

<?php require_once(FOOTER);?>
<?php require_once(HTML_FOOTER);?>