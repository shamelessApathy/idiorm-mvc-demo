<?php require_once(HEADER);?>
<div class='row'>
<div class='col-md-6'>
<?php if ($info === false):?>
<a href="/profile/profile_create"><button class='image-manager-button'> Create Profile </button></a>
<?php else:?>
<a href="/profile/edit_profile"><button class='image-manager-button'> Edit Profile </button></a>
<?php endif;?>
</div>
<div class='col-md-6'>
<a href="/profile/profile_avatar"><button class='image-manager-button'> Set Avatar </button></a>
</div>
<div class='row'>
	<div class='col-md-3'></div>
	<div class='col-md-6'>
		<a href='/profile/edit_logo'><button class='image-manager-button'>Set Artist Logo</button></a>
	</div>
	<div class='col-md-3'></div>
</div>
</div>


<?php require_once(HTML_FOOTER);?>
<?php require_once(FOOTER);?>