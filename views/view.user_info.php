
<?php require_once(HEADER);
var_dump($info);
$date = $info->created_at;
$memberSince = date("F j, Y, g:i a");  
?>





<body>
<h1> USER INFO: </h1>	
<ul class='user_info_list'>
	<li>Username: <?php echo "$info->username" ;?></li>
	<li>Member Since: <?php echo $memberSince; ?></li>
	<li>Website: <?php echo (!empty($info->website)) ? $info->website : null ?></li>
</ul>


</body>

<?php require_once(FOOTER); ?>