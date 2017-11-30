<?php var_dump($_FILES);?>

<form name='ie-save-form' id='ie-save-form'>
			<label>Image Name:</label><br>
			<input type='text' id='user_image_name' name='user_image_name'/><br>
			<label>Category</label><br>
			<select id='category-id' name='category-id'>
			<option>Choose a Category</option>
			<?php foreach ($categories as $cat):?>
			<!-- categories is apparrently global variable yea!! -->
			<option value="<?php echo $cat->id;?>"><?php echo ucwords($cat->title);?>
			</option>
			<?php endforeach;?>
			<label>Tags</label><br>
			<input id='tag_holder' type='text' name='tags' placeholder='Use tag editor to add tags' value='' readonly/><br>
			<label>Tag Editor</label><br>
			<input id='new_tag'><button id='add_tag' type='button'>Add</button>
			<br>
			<input type='number' name='rotate' id='rotate' value='0' HIDDEN>
					</select>
				<div id='ie-tag-div'></div>
			<button id='ie-image-submit-button' type='button'>Submit</button>
				</form>