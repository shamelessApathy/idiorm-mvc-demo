$(function(){
	var AlbumManager = function()
	{
		this.init = function(){
			this.element = $('.album_modal');
			this.user_id = $('#user_id').attr('data-attribute');
		}
		this.albums = function(){
			// Get all albums via ajax for current user
		}
		this.show_details = function(e){
			var element = e;
			console.log(element);
		}
		this.init();
	}

	var album = new AlbumManager();
	var button_array = document.getElementsByClassName('image_details_button');
	for (var i = 0; i < button_array.length; i++)
	{
		button_array[i].addEventListener('click', function(e){
			var element = e.target;
			var parent = element.parentNode.parentNode;
			var image = parent.getElementsByClassName('image_holder')[0];
			var sibling = element.parentNode.parentNode;
			sibling = sibling.getElementsByClassName('image_details')[0];
			$(image).css("display", "none");
			$(sibling).css("display",'block');
		});
	}
	var update_tags_array = document.getElementsByClassName('tags_button');
	console.log(update_tags_array);
	for (var i =0; i < update_tags_array.length; i++)
	{
		var instance = update_tags_array[i];
		instance.addEventListener('click', function(e){
			var target = e.target;
			var tags_input = target.parentNode.getElementsByClassName('tags_input')[0];
			var tags = tags_input.value;
			var image_id = $(tags_input).attr('data-attribute');
			var data = {'tags' : tags, "id" : image_id };
			$.ajax({
				url: "/image/edit_tags",
				data: data,
				method:'POST',
				success: function(){
					console.log('success');
					$(tags_input).css("border-color","green");
				}
			});
		});
	}
})