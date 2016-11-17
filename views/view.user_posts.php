<?php
require_once(HEADER);

$posts = $info['posts'];
$name = $info['username'];



?>
<div class='container'>
<div class='row'>
<h1 class='center' style='text-align:center;'> This is the User Posts page</h1>
</div>
<?php echo !$posts ? "no posts yet" : ''; ?>
<?php 

foreach($posts as $post)
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
	<div class='author'>Author:$name</div>
	<div class='summary'>$summary ...</div>
	<div class='tags'><strong>Tags:</strong> $post->post_tags</div>
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
<?php require_once(FOOTER); ?>