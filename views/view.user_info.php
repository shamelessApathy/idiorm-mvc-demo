
<?php require_once(HEADER);
$date = $info['user']->created_at;
$memberSince = date("F j, Y, g:i a");  
$user = $info['user'];
$profile = $info['profile'];
$user_link = "/image/user/$user->id";
$images = $info['images'];


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
	<li><strong>Website</strong><br> <?php echo (!empty($profile->website)) ? "<a href='$profile->website'>".$profile->website."</a>" : 'No Website Set' ?></li>
	<li><strong>Images</strong><br> <?php echo $user->image_count; ?></li>
</ul>
</div>
</div>
<div class='col-md-6'>
	<div style='width:300px; margin:0 auto'><img style='max-width:300px;' src="<?php echo $user->avatar; ?>"/></div>
</div>
</div>
<div class='row' style='margin-top:20px;'>
	<div class='col-md-12'>
	</div>
	<?php 
		$image_counter = 0;

		$count= count($images);
	?>

		<?php foreach ($images as $image):   ?>
			<div class='user-info-recent-image-single'>
				<a href="/image/info?id=<?php echo $image->id;?>"><img src="<?php echo $image->thumbnail;?>" class='user-info-recent-image'/></a>
			</div>
			<?php $image_counter++;?>
		<?php endforeach;?>
	<div class='clear'></div>
	<div id='user-info-more'>
	<a style='text-decoration:none;' href="<?php echo $user_link;?>">
	<div class='user-info-paragraph'>
		<h3 style='text-align:center;'>Click to see all images available from <?php echo $user->username;?></h3>
	</div>
	</a>
	</div>
	<div class='user-info-paragraph'>
		<h3>Artist Bio</h3>
		<?php if (!empty($profile->bio)):?>
			<?php echo $profile->bio;?>
			
		<?php else: ?>
			<h4> This artist has not yet set up a bio!</h4>
		<?php endif;?>
	</div>
</div>
</div>
</div>



</body>
<?php require_once(HTML_FOOTER); ?>
<?php require_once(FOOTER); ?>
