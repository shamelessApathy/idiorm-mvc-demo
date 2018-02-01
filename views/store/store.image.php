<?php 
require(HEADER);
$image = $info['image'];
$tags = $info['tags'];
$profile = $info['profile'];
$categories = $info['categories'];
$user = $info['user'];
if (isset($_SESSION['user_info']))
{
	$user_info = $_SESSION['user_info'];
}
$user_link = "/user/info/$user->id";

?>



<div class='container'>
<div class='user_info' data-user-id="<?php echo $user_info['id'];?>">
	<div class='row'>
	<div class='col-md-2'>
				<div class='image_info' data-id="<?php echo $image->id; ?>">
			<ul>
			<?php
			// This checks to see if the user has an avatar image set, if they don't, it won't load a broken image link 
			if (isset($user->avatar) && $user->avatar != null)
			{
				$user_avatar_string = "<img class='user_avatar2' src='$user->avatar'/>";
			}
			else 
			{
				$user_avatar_string = "<a href='user/info?id=<?php echo $user->id;??'><img class='user_avatar' src='users/avatar/profile_image_default.jpg;'>?>" +'</a>';
			}
			echo "
				<li>Uploaded By: </li>
				<li><a href=$user_link> $user->username $user_avatar_string</a></li>
				<li>Name: $image->user_image_name</li>
				<li>Dimensions: $image->width x $image->height</li>
				
			";
			?>
			</ul>
<?php if(isset($_SESSION['user_info'])):?>
<a href="/image/download/<?php echo $image->id;?>"><button class='image-download' type='button'>Download</button></a>
<button id='report-button'>Report Image</button>
<div class='report-image'>
	<form action='/report/create_new' method='POST'>
		<label>Why are you reporting this image?</label><br>
		<label>Copyright Infringment</label><input style='float:right;' type='radio' name='type' value='copyright'><br>
		<label>Graphic Violence</label><input style='float:right;' type='radio' name='type' value='violence'><br>
		<label>Nudity</label><input style='float:right;' type='radio' name='type' value='nudity'><br>
		<input type='number' name='image_id' value="<?php echo $image->id; ?>" HIDDEN>
		<input style='width:100%;' type='text' name='description' placeholder='Optional Description'>
		<button type='submit'>Submit Report</button>
	</form>
</div>
<?php else:?>
<a href='/login'><button type='button' class='login-button'>Login to Download</button></a>
<?php endif; ?>
			</div>
			<a class="twitter-share-button"
  href="https://twitter.com/intent/tweet">
Tweet</a>
			<?php $fb_share_link = "https://sharefuly.com/image/info?id=" . $image->id;?>
			 <div class="fb-share-button" 
    data-href="<?php echo $fb_share_link;?>" 
    data-layout="button_count">
			</div>

  </div>
		<div class='col-md-8'>
			<div class='watermark-container'>
			<div class='mobile-nav-arrows'>
				<a href="/image/before?id=<?php echo $image->id;?>">
					<div class='mobile-nav-arrow-left'>
						<i class='fa fa-arrow-circle-left'></i>
					</div>
				</a>
				<a href="/image/after?id=<?php echo $image->id;?>">
					<div class='mobile-nav-arrow-right'>
						<i class='fa fa-arrow-circle-right'></i>
					</div>
				</a>
			</div>
					<a href="/image/before?id=<?php echo $image->id;?>">
						<div class='nav-arrow-left'>
							<i class='fa fa-arrow-circle-left'></i>
						</div>
					</a>
				<img class='watermark' onclick="window.open(this.src)" data-id="<?php echo $image->id;?>" src="<?php echo $image->watermark;?>"/>
					<a href="/image/after?id=<?php echo $image->id;?>">
						<div class='nav-arrow-right'>
							<i class='fa fa-arrow-circle-right'></i>
						</div>
					</a>
			</div>
		</div>
				<div class='col-md-2'>
				<?php if (!empty($categories)):?>
					<h3>CATEGORY</h3>
					<div class='category'><?php echo ucwords($categories[0]->title);?></div>
					<div class='clear'></div>
				<?php endif;?>
				<?php if (isset($_SESSION['user_info'])):?>
			<div style='margin-top:10px;'><h3>TAGS</h3><div class='store_tags'> <?php 
			foreach ($tags as $tag)
			{

				echo "<div class='vote_control'><button class='up relevance_button' data-tag-id='$tag->tag_id' data-value='1'>+</button><button class='down relevance_button' data-tag-id='$tag->tag_id' data-value='-1'>-</button><div class='tag'>$tag->text</div><div class='clear'></div></div>";
			}
			?>
				</div>
			<?php endif;?>
	<?php if (!isset($_SESSION['user_info'])): ?>
		<div style='margin-top:10px;'><h3>TAGS</h3><div class='store_tags'> <?php 
			foreach ($tags as $tag)
			{

				echo "<div class='vote_control'><div class='tag'>$tag->text</div><div class='clear'></div></div>";
			}
			?>
		<?php endif; ?>
			</div>
	</div>
</div>
</div>
</div>
</div>

<?php require_once(HTML_FOOTER);?>
<?php require(FOOTER);?>
<script src='/views/js/single.js' rel='javascript' type='text/javascript'></script>
  <!-- Load Facebook SDK for JavaScript -->
  <div id="fb-root"></div>
  <script>(function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = "https://connect.facebook.net/en_US/sdk.js#xfbml=1";
    fjs.parentNode.insertBefore(js, fjs);
  }(document, 'script', 'facebook-jssdk'));</script>