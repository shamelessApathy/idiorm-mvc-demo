<?php
require_once(HEADER);
?>
<div class='container'>
<h1 style='text-align:center;'> Images Purchased</h1>
<?php foreach ($info as $image)
{
	echo "<div class='row'>
			  <div class='col-md-3'></div>
			  <div class='col-md-6'>
			  <div class='admin_image_row'>
			  <ul>
			  	<li>Name: $image->user_image_name</li>
			  	<li>Size: $image->width x $image->height</li>
			  	<li><a href='/image/download/$image->id'><button style='margin-top:10px;'>DOWNLOAD</button></a></li>
			  </ul>
			  <a href='/image/info?id=$image->id'>
			  <img class='admin_image' src='$image->thumbnail'/>
			  </div>
			  </a>
			  </div>
			  <div class='col-md-3'></div>
			  </div>";
}
?>
</div>
<?php
require_once(FOOTER);
?>