<link href='/views/css/reset.css' rel='stylesheet' type='text/css'/>
<?php require_once(HEADER);?>
<link rel="stylesheet" href="/views/tools/pick-a-color-master/build/dependencies/bootstrap-3.0.0.min.css">
<link rel="stylesheet" href="/views/tools/pick-a-color-master/build/1.2.3/css/pick-a-color-1.2.3.min.css">
<link href='/views/css/image_editor.css' rel='stylesheet' type='text/css'/>

	<h4 style='text-align:center;'>HTML5 Canvas Image Editor</h4>

	<div id='ie-container'>
		<div id='ie-toolbar-top'>
			<div class='ie-icon' id='ie-text-editor'>
				<i class='fa fa-font'></i>
			</div>
		</div>
		<div id='ie-text-menu'>
			<input type="text" value="000" name="border-color" class="pick-a-color form-control">
		</div>
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
			<div class='ie-icon' id='ie-layer'>
				<i class='fa fa-plus'></i>
			</div>
		</div>
	</div>



<script src="/views/tools/pick-a-color-master/build/dependencies/jquery-1.9.1.min.js"></script>
<script src="/views/tools/pick-a-color-master/build/dependencies/tinycolor-0.9.15.min.js"></script>
<script src="/views/tools/pick-a-color-master/build/1.2.3/js/pick-a-color-1.2.3.min.js"></script>
<script src='/views/js/image_tools.js'></script>

<script>
function download() {
	canvas = document.getElementById('ie-canvas');
    var dt = canvas.toDataURL('image/jpeg');
    this.href = dt;
};
downloadLnk.addEventListener('click', download, false);
</script>
<script>
	document.addEventListener('DOMContentLoaded', function(){
		$(".pick-a-color").pickAColor();
	})
</script>

<!--<script src='/views/js/filter.js'></script>  -->