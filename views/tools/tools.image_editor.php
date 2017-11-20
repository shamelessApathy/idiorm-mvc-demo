<link href='/views/css/reset.css' rel='stylesheet' type='text/css'/>
<?php require_once(HEADER);?>
<link href='/views/css/image_editor.css' rel='stylesheet' type='text/css'/>

<div class='container'>
	<h4>HTML5 Canvas Image Editor</h4>
	<div id='ie-file-input'>
		<h4>Choose your image to edit</h4>
		<input type='file' id='ie-image' name='ie-image'/>
		<br>
		<button type='button' id='ie-image-mount'>Load Image</button>
	</div>
	<div id='ie-container'>
		<div id='ie-toolbar-left'></div>
		<canvas id='ie-canvas'>
		</canvas>
		<div id='ie-toolbar-right'>
			<div class='ie-icon' id='ie-upload'>
				<i class='fa fa-upload'></i>
			</div>
			<div class='ie-icon' id='ie-brighter'>
				<i class='fa fa-lightbulb-o'></i>
			</div>
			<div class='ie-icon' id='ie-darker'>
				<i class='fa fa-lightbulb-o'></i>
			</div>
			<div class='ie-icon' id='ie-download'>
				<i class='fa fa-download'></i>
			</div>
		</div>
	</div>
<a id="downloadLnk" download="YourFileName.jpg">Download as image</a>

</div>

<?php require_once(FOOTER);?>
<?php require_once(HTML_FOOTER);?>

<script src='/views/js/image_tools.js'></script>
<script>
function download() {
	canvas = document.getElementById('ie-canvas');
    var dt = canvas.toDataURL('image/jpeg');
    this.href = dt;
};
downloadLnk.addEventListener('click', download, false);
</script>
</script>
	
<!--<script src='/views/js/filter.js'></script>  -->