<?php 
require(HEADER);
?>

<div class='container'>
<h1> This is the Admin Post Manager!</h1>

<form action='/post/search_posts' method='POST'>
<label>Search posts by</label><br>
<select name='parameter'>
	<option value='author_id'>Author ID</option>
	<option value='tags'>Tags</option>
	<option value='title'>Title</option>
	<option value='username'>Username</option>
	<option value='post_id'>Post ID</option>
</select>
<input type='text' name='query'>
<button type='submit'>Submit</button>
</form>
<form action='/post/search_by_date' method='POST'>
	<label>Show all in date range</label><br>
	<label>Begin:</label><input class='datepicker' type='text' id='#datepicker1' name='begin_range'>
	<label>End:</label><input class='datepicker' type='text' id='#datepicker2' name='end_range'>
	<button type='submit'>Submit</button>
</form>
</div>


<?php 
require(FOOTER); 
?>
<script src="/views/admin/js/admin_post_manager.js" type='text/javascript'></script>
