
<?php require_once(HEADER);
$date = $info['user']->created_at;
$memberSince = date("F j, Y, g:i a");  
$user = $info['user'];
$profile = $info['profile'];
$user_link = "/image/user/$user->id";
?>





<body>
<div class='container'>
<div class='row'>
<div class='col-md-6'>
<div class='user-info-container'>
<h3> USER INFO </h3>	
<ul>
	<li><strong>User</strong><br> <?php echo "$user->username" ;?></li>
	<li><strong>Since</strong><br> <?php echo $memberSince; ?></li>
	<li><strong>Website</strong><br> <?php echo (!empty($user->website)) ? $user->website : 'No Website Set' ?></li>
	<li><strong>Images</strong><br> <?php echo $user->image_count; ?></li>
</ul>
</div>
</div>
<div class='col-md-6'>
	<img style='max-width:300px;' src="<?php echo $user->avatar; ?>"/>
</div>
</div>
<div class='row'>
	<a style='text-decoration:none;' href="<?php echo $user_link;?>">
	<div class='user-info-paragraph'>
		<h3 style='text-align:center;'>Click to see all images available from <?php echo $user->username;?></h3>
	</div>
	</a>
	<div class='user-info-paragraph'>
		<h3>Artist Bio</h3>
		<?php if (!empty($profile->bio)):?>
			<?php echo $profile->bio;?>
			<p>stuff</p>
		<?php else: ?>
			<h4> This artist has not yet set up a bio!</h4>
		<?php endif;?>
	</div>
</div>
</div>



</body>
<?php require_once(HTML_FOOTER); ?>
<?php require_once(FOOTER); ?>
