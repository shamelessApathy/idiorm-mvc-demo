<link href='/views/css/reset.css' rel='stylesheet' type='text/css'/>
<?php require_once(HEADER);?>
<link href='/views/css/image_editor.css' rel='stylesheet' type='text/css'/>

	<h4 style='text-align:center;'>HTML5 Canvas Image Editor</h4>

	<div id='ie-container'>
		<canvas id='ie-canvas'>
		</canvas>
		<div id='ie-file-input'>
			<h4>Choose your image to edit</h4>
			<input type='file' id='ie-image' name='ie-image'/>
		</div>
		<div id='ie-toolbar-bottom'>
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
				<?php $time = time();?>
				<a id="downloadLnk" download="<?php echo $time . '.jpg';?>"><i class='fa fa-download'></i></a>
			</div>
		</div>
	</div>


<?php require_once(FOOTER);?>


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