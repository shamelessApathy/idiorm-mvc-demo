<?php require_once(HEADER); 
$images = $info['images'];
$featured = $info['featured'];
?>
<link href='/views/css/featured.css' type='text/css' rel='stylesheet'/>
<div class='container' >
<div class='row'>
<div class='col-md-4'></div>
<div class='col-md-4'>
	<h1 class='font-color text-center'>sharefuly</h1>
	<p class='font-color text-center'>monetize your photos</p>
</div>
<div class='col-md-4'></div>
</div>
	<div class='row'>
		<div class='col-md-2'></div>
		<div class='col-md-8'>
			<form action='/tag/search_by_tag' method='GET'>
				<input id='big_search'  type='text' name='query'>
				<button type='submit' class='big-submit'>Search</button>
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
<div class='col-md-12'>

</div>
</div>
<div class='row'>
<div class='col-md-12'>
<h3 class='text-center'>Recently Uploaded</h3><br>
<div class='front-container'>
<div class='scroll-hider'></div>
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
<div class='row'>
	<div style='width:100%; height:500px;'></div>
</div>
</div>
<?php require_once(FOOTER); ?>
<script src='/views/js/featured.js'></script>