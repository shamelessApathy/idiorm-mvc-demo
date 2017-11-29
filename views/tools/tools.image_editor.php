<link href='/views/css/reset.css' rel='stylesheet' type='text/css'/>
<?php require_once('views/image_editor_header.php');?>
<link rel="stylesheet" href="/views/tools/pick-a-color-master/build/dependencies/bootstrap-3.0.0.min.css">
<link rel="stylesheet" href="/views/tools/pick-a-color-master/build/1.2.3/css/pick-a-color-1.2.3.min.css">
<link href='/views/css/image_editor.css' rel='stylesheet' type='text/css'/>

<?php $logged_in = $_SESSION['user_info'] ?? null;?>
<div id='ie-login-form'>
<iframe id='ie-iframe' height=300 src='/views/tools/tools.special_login.php'></iframe>
</div>

<div id='ie-image-details'>
	
</div>
		<div id="ie-image-loading"><i class="fa fa-cog fa-spin fa-3x fa-fw"></i>
		<span class="sr-only">Loading...</span></div>
	<div id='ie-container'>
		<div id='ie-toolbar-top'>
			<button title='sepia'
			class='ie-icon-top' id='ie-sepia'><p>Sepia</p></button> 
			<button title='sharpen' class='ie-icon-top' id='ie-sharpen'><p>Sharpen</p><i class='fa fa-diamond'></i></button>
			<button title='refresh' class='ie-icon-top' id='ie-refresh'><p>Refresh</p><i class='fa fa-refresh'></i></button>
			<button title='save' class='ie-icon-top' id='ie-save'><p>Save</p><i class='fa fa-floppy-o'></i></button>
		</div>
		<div id='ie-save-form-container'>
			<form name='ie-save-form' id='ie-save-form'>
			<label>Image Name:</label><br>
			<input type='text' name='user_image_name'/><br>
			<label>Category</label><br>
			<select id='upload-category' name='category-id'>
			<option>Choose a Category</option>
			<?php foreach ($categories as $cat):?>
			<!-- categories is apparrently global variable yea!! -->
			<option value="<?php echo $cat->id;?>"><?php echo ucwords($cat->title);?>
				
			</option>
			<?php endforeach;?>
			<label>Tags</label><br>
			<div id='tag_div'></div><br>
			<input id='tag_holder' type='text' style='display:none;' name='tags' placeholder='Use tag editor to add tags' readonly/><br>
			<label>Tag Editor</label><br>
			<input id='new_tag'><button id='add_tag' type='button'>Add</button>
			<br>
			<input type='number' name='rotate' id='rotate' value='0' HIDDEN>
					</select>
				</form>
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


<div id='ie-session'><script> var session = <?php echo (isset($_SESSION['user_info'])) ? 1 : 0; ?> </script></div>
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
<script>
	function closeIFrame()
	{
		$('#ie-login-form').remove();
		// setting session here now
		$('#ie-session').remove();
		session = 1;
	}
 </script>

<!--<script src='/views/js/filter.js'></script>  -->