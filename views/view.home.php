<?php require_once(HEADER); 
?>
<div class='container' >
	<div class='row'>
		<div class='col-md-2'></div>
		<div class='col-md-8'>
			<form action='/tag/search_by_tag' method='GET'>
				<input id='big_search'  type='text' name='query'>
				<button type='submit' class='big_submit'>Search</button>
			</form>
		</div>
		<div class='col-md-2'></div>
	</div>

<?php 

if (isset($_SESSION['user_info']))
{
	$user = $_SESSION['user_info'];
}

?>
<div class='categories'>
	<ul>
		<li>People</li>
		<li>Places</li>
		<li>Things</li>
	</ul>
</div>
<?php 
foreach ($info as $image)
{
	echo "<a href='/image/info?id=$image->id'><div class='preview_thumb'><img class='img-responsive' src='$image->thumbnail'/></div></a>";
}
?>

</div>
<?php require_once(FOOTER); ?>