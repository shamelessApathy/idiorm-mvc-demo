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

			<label>Intro Paragraph</label><br>
			<textarea style='width:100%; height:150px; padding:10px 5px; ' placeholder='Intro Paragraph' name='intro' value="" ><?php if(isset($store->intro)){ echo $store->intro; } ?></textarea>

			<label>Website</label><br>
			<input type='text' name='website' placeholder='Your Website Here' value="<?php if(isset($store->website)){ echo $store->website; } ?>"/><br>
			<label>Location</label><br>
			<input type='text' name='location' placeholder='Where are you located?' value="<?php if (isset($store->location)) { echo $store->location; } ?>"/>
			<br><br><button type='submit'>Submit</button>
	</form>
	</div>
	<br>


</div>


<div id='user_id' data-attribute="<?php echo $_SESSION['user_info']['id'];?>" style='display:none;'></div>
<?php 
require(FOOTER);
?>
<script src='/views/js/album_manager.js' type='text/javascript'></script>