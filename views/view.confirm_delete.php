<?php 
$id = $info;


require(HEADER);
?>

<div class='container'>
	
<h2>Are you sure you want to delete this post?</h2>
<a href="/post/delete/<?php echo $info; ?>"><button>Yes</button></a>
<a href="/home"><button>No</button></a>

</div>

<?php require(FOOTER); ?>

