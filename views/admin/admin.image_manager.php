<?php
require(HEADER);
?>
<div class='container'>
	<h1>This is the Image Manager Page</h1>
</div>
<form method='POST' action='/admin/search_images'>
	<label>Search by:</label><br>
	<select name='parameter'>
		<option value='user_id'>User ID</option>
	</select>
	<input name='query' type='text'>
	<button type='submit'>Submit</button>
</form>
<a href='/admin/get_unauth_images'><button>Get Unauth Images</button></a>

<?php 
if(isset($info))
{
	echo "<div class='admin_image_list'>";
	foreach ($info as $image)
	{
		if ($image->auth == '0')
		{
			$id = $image->id;
		echo "<div class='row'>
			  <div class='col-md-3'></div>
			  <div class='col-md-6'>
			  <a href='/image/info?id=$image->id'>
			  <div class='admin_image_row unauthorized'>
			  <ul>
			  	<li>Name: $image->user_image_name</li>
			  	<li>Size: $image->size_string</li>
			  	<li>Tags: $image->tags</li>
			  </ul>
			  <img class='admin_image' src='$image->path'/>
			  <div class='image_controls'>
			  <a href='/admin/authorize_image/$id'><button>Authorize</button></a>
			  <a  href='/admin/reject_image/$id'><button style='margin-top:5px;'>Reject</button></a>
			  </div>
			  </div>
			  </a>
			  </div>
			  <div class='col-md-3'></div>
			  </div>";
		}
		else
		{
		echo "<div class='row'>
			  <div class='col-md-3'></div>
			  <div class='col-md-6'>
			   <a href='/image/info?id=$image->id'>
			  <div class='admin_image_row'>
			  <ul>
			  	<li>Name: $image->user_image_name</li>
			  	<li>Size: $image->size_string</li>
			  	<li>Tags: $image->tags</li>
			  </ul>
			  <img class='admin_image' src='$image->path'/>
			  </div>
			  </a>
			  </div>
			  <div class='col-md-3'></div>
			  </div>";
		}
	}
	echo "</div>";
}
?>
<?php
require(FOOTER);
?>