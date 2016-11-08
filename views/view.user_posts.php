<?php
require(HEADER);

$posts = $info['posts'];
$name = $info['name'];

?>

<h1> This is the User Posts page</h1>

<?php 

foreach($posts as $post)
{
	echo "
	<div class='post'>
	<h1> Post ID: $post->post_id</h1>
	<div class='title'>Title:$post->title</div>
	<div class='author'>Author_ID:$name</div>
	<div class='body'>Body:$post->body</div>
	</div>
	";
}

?>