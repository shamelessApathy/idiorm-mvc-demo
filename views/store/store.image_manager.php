<?php require(HEADER);?>

<div class='container'>
<div class='row'>
	<div class='col-md-6'>
		<a href='/image/upload_image'><button class='image-manager-button' type='button'>Upload</button></a><br>
	</div>
	<div class='col-md-6'>
		<a href='/user/get_images'><button class='image-manager-button' type='button'>Manage Images</button></a><br>
	</div>
</div>
<div class='row'>
	<div class='col-md-6'>
	<a href='/user/purchased'><button class='image-manager-button' type='button'>Purchased Images</button></a><br>
	</div>
	<div class='col-md-6'>
	<a href='/user/sold'><button class='image-manager-button' type='button'>Sold Images</button></a><br>
	</div>
</div>

<?php require(FOOTER);?>