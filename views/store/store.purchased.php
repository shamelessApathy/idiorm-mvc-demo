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
			  <a href='/image/info?id=$image->id'>
			  <div class='admin_image_row'>
			  <ul>
			  	<li>Name: $image->user_image_name</li>
			  	<li>Size: $image->size_string</li>
			  	<li><a href='/image/download/$image->id'>DOWNLOAD</a></li>
			  </ul>
			  <img class='admin_image' src='$image->path'/>
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