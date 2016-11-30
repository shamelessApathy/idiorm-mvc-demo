<?php
require(HEADER);
?>

<div class='container'>
	<div class='row'>
	<form action='/store/edit' method='POST'>
		<div class='col-md-2'></div>
		<div class='col-md-4'>
			
				<label>Intro Paragraph</label><br>
				<textarea style='width:100%; height:150px; padding:10px 5px; ' placeholder='Intro Paragraph' name='intro' value="" ><?php if(isset($info->intro)){ echo $info->intro; } ?></textarea>
		</div>
		<div class='col-md-4'>
			<label>Website</label><br>
			<input type='text' name='website' placeholder='Your Website Here' value="<?php if(isset($info->website)){ echo $info->website; } ?>"/><br>
			<label>Location</label><br>
			<input type='text' name='location' placeholder='Where are you located?' value="<?php if (isset($info->location)) { echo $info->location; } ?>"/>
			<br><br><button type='submit'>Submit</button>
	
			
		</div>
		<div class='col-md-2'></div>
	</form>
	</div>
</div>



<?php 
require(FOOTER);
?>