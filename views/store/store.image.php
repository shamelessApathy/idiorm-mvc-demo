<?php 
require(HEADER);
$image = $info['image'];
$tags = $info['tags'];
$categories = $info['categories'];
if (isset($_SESSION['user_info']))
{
	$user_info = $_SESSION['user_info'];
}
?>

<div class='container'>
<div class='user_info' data-user-id="<?php echo $user_info['id'];?>">
	<div class='row'>
		<div class='col-md-3'>
			<div class='image_info' data-id="<?php echo $image->id; ?>">
			<ul>
			<?php echo "
				
				<li>Name: $image->user_image_name</li>
				<li>Tags: $image->tags</li>
				<li>Width: $image->width</li>
				<li>Height: $image->height</li>
				
			";
			?>
			<?php if (isset($_SESSION['user_info'])):?>
			<li style='margin-top:10px;'><h3>TAGS</h3><div class='store_tags'> <?php 
			foreach ($tags as $tag)
			{

				echo "<div class='vote_control'><button class='up relevance_button' data-tag-id='$tag->tag_id' data-value='1'>+</button><button class='down relevance_button' data-tag-id='$tag->tag_id' data-value='0'>-</button><div class='tag'>$tag->text</div><div class='clear'></div></div>";
			}
			?>
				</div>
			<?php endif;?>
	<?php if (!isset($_SESSION['user_info'])): ?>
		<li style='margin-top:10px;'><h3>TAGS</h3><div class='store_tags'> <?php 
			foreach ($tags as $tag)
			{

				echo "<div class='vote_control'><div class='tag'>$tag->text</div><div class='clear'></div></div>";
			}
			?>
		<?php endif; ?>
			</li>

			<li>Categories:<div class='store_categories'> <?php 
			foreach ($categories as $category)
			{
				echo "<span class='category'>$category->title</span>";
			}
			?>
			</div>
			</li>
			</ul>
			</div>
			</div>
		<div class='col-md-9'>
			<img class='watermark' src="<?php echo $image->watermark;?>"/>
		</div>
	</div>
</div>

<?php require(FOOTER);?>
<script src='/views/js/single.js' rel='javascript' type='text/javascript'></script>