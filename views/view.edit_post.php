<?php 

require_once(HEADER);
$post = $info;
?>
<h1> Edit Post Page </h1>
<form name='post' action='/post/update_post/<?php echo $post->post_id; ?>' method='POST' style='display:block;'>
	<label>Title:</label><input name='title' style='width:300px;' value="<?php echo $post->title;?>"><p></p>
	<label>Body:</label><input name='body' style='height:400px; width:300px;' value="<?php echo $post->body;?>"><p></p>
	<label>Tags:</label><input name='tags' style='height:200px; width:300px;' value="<?php echo $post->tags;?>"><p></p>
	<button type='submit'>Submit</button>

</form>

<?php require_once(FOOTER); ?>