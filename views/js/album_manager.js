$(function(){
	var AlbumManager = function()
	{
			this.id;
		this.init = function(){
			this.element = $('.album_modal');
			this.user_id = $('#user_id').attr('data-attribute');
			// puts image info and preview image in focus_modal
			this.populate_details = function(el)
			{
				$('.focus_move').attr('style', 'margin-top:0');
				$('.focus_modal').attr('style','opacity:1');
				$('.focus_details').attr('style','display:block');
				var image = el.getElementsByTagName('IMG')[0];
				this.id = $(image).attr('data-id');
				var watermark = $(image).attr('data-watermark');
				var name = $(image).attr('data-name');
				var width = $(image).attr('data-width');
				var height = $(image).attr('data-height');
				var tags = $(image).attr('data-tags');
				var tags = tags.split("|");
				console.log(tags);
				$('.focus_image').html('<img class="img-responsive" src="'+ watermark +'"/>');
				document.getElementById('focus_name').value = name;
				$('#focus_width').html('<strong>Width:</strong>' + width );
				$('#focus_height').html('<strong>Height:</strong>' + height );
				$('#focus_tags').html('<strong>Tags:</strong>');
				for (var i = 0; i < tags.length; i++)
				{
					//tags[i] = "<span class='tag'"
					$('#focus_tags').append('<span class="tag">' + tags[i] + '</span>');
				}
				this.tagListeners();

			}
			// adds listeners on tag elements so we can remove them when clicked
			this.tagListeners = function(){
				var tags = document.getElementsByClassName('tag');
				for (var i = 0; i < tags.length; i++)
				{
					tags[i].addEventListener('click', function(e){
						target = e.target;
						var tag = target.innerHTML;
						var data = {'tag' : tag, 'id' : this.id}
						console.log(data);
						$.ajax({
							url: "/image/remove_tag",
							type: "POST",
							data: data, 
							success: function(results){
								console.log(results);
							}
						})
					}.bind(this))
				}
			}.bind(this);
			// attaches event listener to each element thats passed in, assigns action function
			this.thumbListeners = function(el)
			{
				var element = el;
				$(el).on('click', function(){
					this.populate_details(element);
				}.bind(this))
			}.bind(this);
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
	var image_thumb_array = document.getElementsByClassName('image_thumb');
	for ( var i =0; i < image_thumb_array.length; i++)
	{
		album.thumbListeners(image_thumb_array[i]);
	}
})