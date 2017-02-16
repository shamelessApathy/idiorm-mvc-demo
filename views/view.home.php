<?php require_once(HEADER); 
$images = $info['images'];
$featured = $info['featured'];
var_dump($_SESSION);
?>
<div class='container' >
<div class='row'>
<div class='col-md-4'></div>
<div class='col-md-4'>
	<h1 style='text-align:center; color:#6666ff;'>sharefuly</h1>
	<p style='text-align:center; color:#6666ff;'>monetize your photos</p>
</div>
<div class='col-md-4'></div>
</div>
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
<div class='row'>
<div class='col-md-6'>
	<div class='left-container'>
	<div class='extra-inside'>
		<?php 
			if (isset($info))
			{
				foreach ($featured as $image)
				{
					echo "<a href='/image/info?id=$image->id'><div class='left-glass'><img src='$image->thumbnail'/></div></a>";
				}
			}
		?>
		</div>
	</div> 
</div>
<div class='col-md-6'>
<div class='front-container'>
<div class='extra-inside'>
<?php 
if (isset($info))
{
foreach ($images as $image)
{
	echo "<a href='/image/info?id=$image->id'><div class='looking-glass'><img class='aimg-responsive' src='$image->thumbnail'/></div></a>";
}
}
?>
</div>
</div>
</div>
</div>
</div>
<?php require_once(FOOTER); ?>