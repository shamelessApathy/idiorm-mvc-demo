<link href='/views/css/reset.css' rel='stylesheet' type='text/css'/>
<?php require_once('views/image_editor_header.php');?>
<link rel="stylesheet" href="/views/tools/pick-a-color-master/build/dependencies/bootstrap-3.0.0.min.css">
<link rel="stylesheet" href="/views/tools/pick-a-color-master/build/1.2.3/css/pick-a-color-1.2.3.min.css">
<link href='/views/css/image_editor.css' rel='stylesheet' type='text/css'/>

	
		<div id="ie-image-loading"><i class="fa fa-cog fa-spin fa-3x fa-fw"></i>
		<span class="sr-only">Loading...</span></div>
	<div id='ie-container'>
		<div id='ie-toolbar-top'>
			<h4 style='text-align:center; color:#ccc; font-size:8px;'>HTML5 Canvas Image Editor</h4>
			<button title='sepia' class='ie-icon-top' id='ie-sepia'><p>Sepia</p></button>
			<button title='blue' class='ie-icon-top' id='ie-blue'><p>Blue</p></button>
		</div>

		<canvas id='ie-canvas'>
		</canvas>
		<div id='ie-file-input'>
			<span id='ie-close'><button>X</button></span>
			<h4>Choose your image to edit</h4>
			<input type='file' id='ie-image' name='ie-image'/>
		</div>
		<div id='ie-toolbar-bottom'>
			<button title='Upload' class='ie-icon' id='ie-upload'>
				<p>Upload</p> 
				<i class='fa fa-upload'></i>
			</button>
			<button title='Brighter' class='ie-icon' id='ie-brighter'>
				<p>Brighter</p>
				<i class='fa fa-lightbulb-o'></i>
			</button>
			<button title='Darker' class='ie-icon' id='ie-darker'>
				<p>Darker</p>
				<i class='fa fa-lightbulb-o'></i>
			</button>
			<button title='Black and White' class='ie-icon' id='ie-black-and-white'>
				<p>B&W</p>
				<i class='fa fa-adjust'></i>
			</button>
			<button title='Download Image' class='ie-icon' id='ie-download'>
				<p>Download</p>
				<?php $time = time();?>
				<a id="downloadLnk" download="<?php echo $time . '.jpg';?>"><i class='fa fa-download'></i></a>
			</button>
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