<?php require(HEADER); ?>

<div class='container'>
	<h2> User Manager </h2>
	<div class='row'>
		<form action='/user/search' method='POST'>
			<label>Search by Username</label><br>
			<input type='text' name='username'>
			<button type='submit'>Submit</button>
		</form>
	</div>
	<div class='row'>
	<a href='/user/get_all'><button type='button'>Show all users</button></a>
		<?php if (isset($info)): ?>
		<?php 
		foreach ($info as $user)
		{ 
			/*function test($rel){
				if ($rel === $user->level)
				{
					return "selected='selected'";
				}
			}*/
			echo "
			<div class='post_preview'>
			<p>Username : $user->username</p>
			<p>Email :  $user->email</p>
			<p>User ID : $user->id</p>
			<p>Number of posts: $user->number_posts</p>
			<div class='user_actions'>
			<a href='/post/search_posts/$user->id'>Get Posts</a>
			<p>User Level: $user->level</p>
			<form action='/user/set_level'>
			<select name='level'>
			<option value=''>----</option>
			<option  value='1'>-1- Admin</option>
			<option value='2'>-2- User</option>
			<option value='3'>-3- Disabled</option>
			</select>
			<button type='submit'>Submit</button>
			</form>
			</div>
			</div>
			";
		}

		?>
		<?php endif; ?>

	</div>
</div>

<?php require(FOOTER); ?>

<script src='/views/admin/js/admin_user_manager.js' type='text/javascript'></script>