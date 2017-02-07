
<?php require_once(HEADER);
$date = $info->created_at;
$memberSince = date("F j, Y, g:i a");  
?>





<body>
<div class='container'>
<div class='row'>
<div class='col-md-6'>
<h1> USER INFO: </h1>	
<ul class='user_info_list'>
	<li>Username: <?php echo "$info->username" ;?></li>
	<li>Member Since: <?php echo $memberSince; ?></li>
	<li>Website: <?php echo (!empty($info->website)) ? $info->website : 'No Website Set' ?></li>
</ul>
</div>
<div class='col-md-6'>
	<img style='margin-top:40px;' src="<?php echo $info->avatar; ?>"/>
</div>
</div>
</div>


</body>

<?php require_once(FOOTER); ?>