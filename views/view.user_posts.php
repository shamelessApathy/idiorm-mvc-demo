<?php
require_once(HEADER);

$posts = $info['posts'];
$name = $info['username'];

?>
<div class='container'>
<div class='row'>
<h1 class='center'> This is the User Posts page</h1>
</div>
<?php echo !$posts ? "no posts yet" : ''; ?>
<?php 

foreach($posts as $post)
{
	echo "
	<div class='post'>
	<div class='title'><strong>Title:$post->title</strong></div>
	<div class='author'>Author:$name</div>
	<div class='post_controls'>
	<a class='edit_post_link' href='/post/edit_post/$post->post_id'>Edit Post</a><br>
	<a class='delete_post_link' href='/post/confirm_delete/$post->post_id'>Delete Post</a>
	</div>
	</div>
	";

}

?>
</div>
<?php require_once(FOOTER); ?>