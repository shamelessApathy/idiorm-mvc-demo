var tags;
var orig;
$(function(){
	var AlbumManager = function()
	{
		this.init = function(){
			this.id;
			this.thumb_el;
			this.close = $('.close');
			this.element = $('.album_modal');
			this.user_id = $('#user_id').attr('data-attribute');
			this.setTags = function(results)
			{
				tags = results;
				tags = JSON.parse(tags);
				length = tags.length;
				$('#focus_tags').html('');
				for (var i = 0; i < length; i++)
				{
					$('#focus_tags').append('<span class="tag" data-id='+ tags[i]["tag_id"] +'>' + tags[i]["text"] + '</span>');
				}
				$('#add_tag').val('');
				this.tagListeners();
			}
			// puts image info and preview image in focus_modal
			this.populate_details = function(el)
			{
				this.thumb_el = el.getElementsByClassName('collection-thumb')[0];
				orig = el;
				$('.focus_modal').css({'display':'block'});
				$('.focus_details').attr('style','display:block');
				$('#focus_type').html('');
				$('#focus_price').html('');
				$('#focus_category').html('');
				var premium = $(el).attr('data-premium');
				if (premium === '1')
				{
					$('#focus_type').html('Premium Image');
				}
				else
				{
					$('#focus_type').html('Regular Image');
				}
				var image = el.getElementsByTagName('IMG')[0];
				this.id = $(image).attr('data-id');
				var download = $('#download_image');
				var watermark = $(image).attr('data-watermark');
				var name = $(image).attr('data-name');
				var width = $(image).attr('data-width');
				var height = $(image).attr('data-height');
				var price = $(image).attr('data-price');
				var category = $(image).attr('data-category');
				var price_string = ('<strong>Price:</strong>' + '   ' + price);
				var download_string = "<a href='/image/download/"+ this.id + "'><button id='download_image'>DOWNLOAD</button></a>";
				$('#focus_price').html(price_string);
				$(download).html(download_string);
				$('.focus_image').html('<img  id="the_image" data-id='+ this.id +' class="img-responsive" src="'+ watermark +'"/>');
				$('#focus_name').html('<strong>Name:</strong>' + name + "  <sup><a href='#' class='tiny_link'>edit</a></sup>");
				this.addEditNameListener();
				$('#focus_width').html('<strong>Width:</strong>' + width );
				$('#focus_height').html('<strong>Height:</strong>' + height );
				
				if (category != '')
				{
					var categoryElements = document.getElementsByClassName('category-option');
					for (var i =0; i < categoryElements.length; i++)
					{
						if (categoryElements[i].value === category)
						{
							$(categoryElements[i]).attr('selected','selected');
						}
						
					}

				}
				else
						{
							$('#category_change:first-child').attr('selected','selected');
						}
				var data = {'image_id': this.id};
				$.ajax({
					url: '/image/get_tags',
					type: 'POST',
					data: data,
					success: function(results){
						this.setTags(results);
					}.bind(this)
				});
				
				

			}.bind(this);
			this.addTags = function(){
				var tag = $('#add_tag').val();
				var focus = document.getElementsByClassName('focus_modal')[0];
				var id = focus.getElementsByTagName('img')[0];
				var id = id.getAttribute('data-id');
				var data = {'image_id': id, 'tag':tag};
				$.ajax({
					url: "/tag/add_tag",
					type: "POST",
					data: data,
					success: function(results)
					{
						this.setTags(results);
					}.bind(this)
				})
				$(tag).val("");
			}.bind(this);
			this.delete = function()
			{ 
				var image_id = document.getElementById('the_image');
				image_id = image_id.getAttribute('data-id');
				var data = {'image_id': image_id};
				$.ajax({
					url: '/image/delete_image',
					type: "POST",
					data: data,
					success: function(results){
						console.log(results);
					}
				})
				$('.focus_modal').attr('style','');
				orig.remove();
			}
			this.change_name = function(new_name)
			{
				var image_id = document.getElementById('the_image');
				image_id = image_id.getAttribute('data-id');
				var data = {'image_id': image_id, 'name':new_name};
				$.ajax({
					url: '/image/change_name',
					type: "POST",
					data: data,
					success: function(results){
					}
				})
			}
			this.editName = function()
			{
				$('#focus_edit_name').css({"display":"block"});
				$('#save_name').on('click', function(){
					var new_name = $('#edit_name').val();
					this.change_name(new_name);
					$('#focus_edit_name').css({"display":"none"});
					$('#focus_name').html('<strong>Name:</strong>' + new_name + "<sup><a href='#' class='tiny_link'>edit</a></sup>");
					$('#edit_name').val(' ');
					this.addEditNameListener();
				}.bind(this))
			}.bind(this)
			this.addEditNameListener = function()
			{
				var button = $('.tiny_link');
				button.on('click', this.editName);
			}.bind(this)
			this.addCloseListener = function()
			{
				this.close.on('click', function(){
					$('.focus_move').attr('style','');
					$('.focus_modal').attr('style','display:none');
				})
			}
			this.addDeleteListener = function()
			{
				var button = $('#delete_image');
				button.on('click', this.delete);
			}.bind(this)
			this.addTagListener = function()
			{
				var button = $('#add_tag_button');
				button.on('click', this.addTags);
			}
			this.keyListeners = function()
			{ 
				$("#add_tag").on('keyup', function (e) {
    				if (e.keyCode == 13) 
    				{
        				this.addTags();
    				}
				}.bind(this));
			}.bind(this);
			
			// adds listeners on tag elements so we can remove them when clicked
			this.tagListeners = function(){
				var tags = document.getElementsByClassName('tag');
				for (var i = 0; i < tags.length; i++)
				{
					tags[i].addEventListener('click', this.remove_tag); 
				}
			}.bind(this);
			// attaches event listener to each element thats passed in, assigns action function
			this.thumbListeners = function(el)
			{
				var element = el;
				$(el).on('click', function()
				{
					this.populate_details(element);
				}.bind(this))
			}.bind(this);
			this.updateThumb = function(id)
			{
				$(this.thumb_el).attr('data-category',id);
			}.bind(this)
			this.changeCategory = function()
			{
				var id = $('#category-change').find(':selected').val();
				var image_id = this.id;
				$.ajax({
					method:'POST',
					url: '/category/change_category',
					data: {'cat_id':id, 'image_id':image_id},
					success: function(results)
					{
						this.updateThumb(id);
					}.bind(this)
				})
			}.bind(this)
			this.changeCategoryListener = function()
			{
				$('#change-category').on('click', this.changeCategory);
			}
		}
		this.albums = function()
		{
			// Get all albums via ajax for current user
		}
		this.show_details = function(e){
			var element = e;
		}
		this.init();
		this.addCloseListener();
		this.addTagListener();
		this.addDeleteListener();
		this.keyListeners();
		this.changeCategoryListener();

		this.remove_tag = function(e){
						target = e.target;
						var tag = $(target).attr('data-id');
						var image_id = $('#the_image').attr('data-id');
						var data = {'tag_id' : tag, 'image_id' : image_id};
						$.ajax({
							url: "/tag/remove_tag",
							type: "POST",
							data: data, 
							success: function(results){
								this.setTags(results);
							}.bind(this)
						})
					}.bind(this)
	}

	var album = new AlbumManager();
	
	var image_thumb_array = document.getElementsByClassName('search-item');
	for ( var i =0; i < image_thumb_array.length; i++)
	{
		album.thumbListeners(image_thumb_array[i]);
	}
})