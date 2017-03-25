<?php require_once(HEADER); ?>

<div class='container'>
	<div class='row'>
		<img style='max-width:200px; height:200px;' src="<?php echo $info['user']->avatar; ?>"/>
		<div class='store_user'>
			<ul>
				<li><?php echo $info['user']->username; ?></li>
				<li><a href="<?php echo $info['store']->website ?>"><?php echo $info['store']->website ?></a></li>
				<li><?php echo $info['user']->username; ?></li>
				
			</ul>
		</div>
	</div>
</div>

<?php require_once(FOOTER); ?>