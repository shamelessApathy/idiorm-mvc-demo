<?php require_once(HEADER);?>

<div class='container'>
	<form name='exif-form' method='POST' action='get_exif' enctype="multipart/form-data">
		<input type='file' name='image'/>
		<button type='submit'>Submit</button>
	</form>
</div>


<?php require_once(FOOTER);?>
<?php require_once(HTML_FOOTER);?>