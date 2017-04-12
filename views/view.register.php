
<?php require_once(HEADER); ?>
<div class='container'>
<div class='row'>
<div class='col-md-6'>
<h1> Register</h1>
<form action='create_new' method='POST'>
<label>Username:</label><br>
<input type='text' name='username'><br>
<label>Email:</label><br> 
<input type='text' name='email'/><br>
<label>Password:</label><br>
<input type='password' name='password'/><br>
</div>
<div class='col-md-6'>
	<div class='user-agreement-container'>
		<div class='user-agreement-label'>
			<p>User Agreement</p>
		</div>
		<div class='user-agreement-inside'>
		<div class='user-agreement-slider-hider'></div>
			<p>"Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?"</p>
			<p>"Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?"</p>
		</div>
	</div>
<label>Do you agree to all of the terms and conditions expressed above?</label><br>
<label>I agree</label>  <input type='checkbox' name='agree'><br>
<button type='submit'>Submit</button>
</form>
</div>
</div>

<?php require_once(FOOTER); ?>