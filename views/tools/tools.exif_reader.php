<?php require_once(HEADER);?>


<div class='container'>
	<h1>EXIF Data Reader</h1>
	<p> Only works with .jpg and .jpeg images right now</p>
	<form name='exif-form' method='POST' action='get_exif' enctype="multipart/form-data">
		<input type='file' name='image'/>
		<br>
		<button type='submit'>Submit</button>
	</form>
</div>
<?php require_once(FOOTER);?>
<?php require_once(HTML_FOOTER);?>