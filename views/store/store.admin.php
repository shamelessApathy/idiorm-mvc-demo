<?php
require(HEADER);

$store = $info['store'];
if (!empty($info['albums']))
{
	$albums = $info['albums'];
}
?>

<div class='container'>
	<div class='row'>
	<form action='/store/edit' method='POST'>
		<div class='col-md-2'></div>
		<div class='col-md-4'>
			
				<label>Intro Paragraph</label><br>
				<textarea style='width:100%; height:150px; padding:10px 5px; ' placeholder='Intro Paragraph' name='intro' value="" ><?php if(isset($store->intro)){ echo $store->intro; } ?></textarea>
		</div>
		<div class='col-md-4'>
			<label>Website</label><br>
			<input type='text' name='website' placeholder='Your Website Here' value="<?php if(isset($store->website)){ echo $store->website; } ?>"/><br>
			<label>Location</label><br>
			<input type='text' name='location' placeholder='Where are you located?' value="<?php if (isset($store->location)) { echo $store->location; } ?>"/>
			<br><br><button type='submit'>Submit</button>
	
			
		</div>
		<div class='col-md-2'></div>
	</form>
	</div>
	<br>
	<div class='row'>
	<div class='col-md-2'></div>
	<div class='col-md-8'>
		<form action='/album/create_new' method='POST'>
		<label>Create new album:</label>
		<input type='text' name='album_name'/>
		<button type='submit'>Submit</button>
		</form>
	</div>
	<div class='col-md-2'></div>

	</div>
	<div class='row' style='margin-top:20px; '>
		<div class='col-md-2'></div>
		<div class='col-md-8'>
			<div class='album_manager' style="padding:10px;<?php if (isset($user_images)) { echo 'display:none';}?>">
				<div class='row'>
					<?php foreach($albums as $album){
						echo 
						"<a href='/album/album_manager/$album->album_id'><p>Name:$album->album_name</p></a>";
					}
					?>
				</div>
			</div>
		</div>
		<div class='col-md-2'></div>
	</div>

</div>


<div id='user_id' data-attribute="<?php echo $_SESSION['user_info']['id'];?>" style='display:none;'></div>
<?php 
require(FOOTER);
?>
<script src='/views/js/album_manager.js' type='text/javascript'></script>