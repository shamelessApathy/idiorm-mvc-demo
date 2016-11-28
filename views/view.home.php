<?php require_once(HEADER); ?>
<div class='container'>
	<div class='row'>
		<div class='col-md-2'></div>
		<div class='col-md-8'>
			<form action='image/search_by_tag' method='GET'>
				<input id='big_search'  type='text' name='query'>
				<button type='submit' class='big_submit'>Search</button>
			</form>
		</div>
		<div class='col-md-2'></div>
	</div>
</div>
<?php 

if (isset($_SESSION['user_info']))
{
	$user = $_SESSION['user_info'];
}

?>

<?php if (isset($_SESSION['user_info'])):?>
<div class='container'>
<h1>This is the hompage</h1>
<h3>Welcome <?php echo $user->first_name; ?> !</h3>
<a href='/post/new_post'> Create a new post!</a><br>
<a href='/image/upload_image'>Upload an image!</a>
<?php endif;?>
</div>
<?php require_once(FOOTER); ?>