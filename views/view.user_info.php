
<?php require_once(HEADER);
$date = $info->created_at;
$memberSince = date("F j, Y, g:i a");  
?>





<body>
<div class='container'>
<div class='row'>
<div class='col-md-6'>
<div class='user-info-container'>
<h3> USER INFO </h3>	
<ul>
	<li><strong>User</strong><br> <?php echo "$info->username" ;?></li>
	<li><strong>Since</strong><br> <?php echo $memberSince; ?></li>
	<li><strong>Website</strong><br> <?php echo (!empty($info->website)) ? $info->website : 'No Website Set' ?></li>
	<li><strong>Images</strong><br> <?php echo $info->image_count; ?></li>
</ul>
</div>
</div>
<div class='col-md-6'>
	<img style='max-width:100%;' src="<?php echo $info->avatar; ?>"/>
</div>
</div>
</div>



</body>
<?php require_once(HTML_FOOTER); ?>
<?php require_once(FOOTER); ?>