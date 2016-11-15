<?php
require(HEADER);
?>
<?php if ($_SESSION['search_params']):?>
<div class='container'>
<div class='search_params'>
<h2>Search Parameters</h2>
<?php
if (isset($_SESSION['search_params']))
{
	foreach($_SESSION['search_params'] as $key => $value)
	{
		echo $key . ': ' . $value . '<br>';
	}
}
?>
</div>
<?php endif;?>
<?php
foreach($info as $post)
{	
	$summary = str_split($post->body);
	$length = count($summary);
	if ($length < 15)
	{
		$summary = $post->body;
	}
	else
	{
		$summary = implode($summary);
		$summary = substr($summary,0,16);
	}
	echo "
	<div class='row'>
	<div class='col-md-3'></div>
	<div class='col-md-6'>
	<div class='post_preview'>
	<p class='title'>$post->title</p>
	<div class='author'>Author:$post->author_name</div>
	<div class='summary'>$summary ...</div>
	<div class='post_controls'>
	<a class='edit_post_link' href='/post/edit_post/$post->post_id'>Edit Post</a><br>
	<a class='delete_post_link' href='/post/confirm_delete/$post->post_id'>Delete Post</a>
	</div>
	</div>
	</div>
	<div class='col-md-3'></div>
	</div>
	";

}
?>
</div>
<?php

require(FOOTER);
?>