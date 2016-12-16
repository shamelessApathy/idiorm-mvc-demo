var tags;
var orig;
$(function(){
	var AlbumManager = function()
	{
		this.init = function(){
			this.id;
			this.element = $('.album_modal');
			this.user_id = $('#user_id').attr('data-attribute');
			this.setTags = function(results)
			{
				tags = results;
				tags = JSON.parse(tags);
				length = tags.length;
				$('#focus_tags').html('');
				$('#focus_tags').html('<strong>Tags:</strong>');
				for (var i = 0; i < length; i++)
				{
					//tags[i] = "<span class='tag'"
					$('#focus_tags').append('<span class="tag" data-id='+ tags[i]["id"] +'>' + tags[i]["text"] + '</span>');
				}
				$('#add_tag').val('');
				this.tagListeners();
			}
			// puts image info and preview image in focus_modal
			this.populate_details = function(el)
			{
				orig = el;
				$('.focus_move').attr('style', 'margin-top:0');
				$('.focus_modal').attr('style','opacity:1');
				$('.focus_details').attr('style','display:block');
				var image = el.getElementsByTagName('IMG')[0];
				this.id = $(image).attr('data-id');
				this.get_categories(this.id);
				var watermark = $(image).attr('data-watermark');
				var name = $(image).attr('data-name');
				var width = $(image).attr('data-width');
				var height = $(image).attr('data-height');
				$('.focus_image').html('<img  id="the_image" data-id='+ this.id +' class="img-responsive" src="'+ watermark +'"/>');
				document.getElementById('focus_name').value = name;
				$('#focus_width').html('<strong>Width:</strong>' + width );
				$('#focus_height').html('<strong>Height:</strong>' + height );
				var data = {'id': this.id};
				$.ajax({
					url: '/tag/get_tags',
					type: 'POST',
					data: data,
					success: function(results){
						this.setTags(results);
					}.bind(this)
				});
				
				

			}.bind(this);
			this.addTags = function(){
				console.log('running addTags() func');
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
				console.log(image_id);
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
			this.addCategoryListener = function()
			{
				var button = ('#add_category_button');
				$(button).on('click', this.add_category);
			}.bind(this)
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
		}
		this.albums = function()
		{
			// Get all albums via ajax for current user
		}
		this.show_details = function(e){
			var element = e;
		}
		this.set_category = function (results)
		{
			if(results != null)
			{

				var categories = $('#categories');
			for (var i = 0; i < results.length; i++)
			{
			categories.append("<span class='category'>"+results[i]['category_title'] +"</span>");
					
			}
		}
		}
		this.add_category = function()
		{
			var input = $('#add_category').val();
			var data = {'image_id':this.id, 'category_id': input};
			$.ajax({
				type:'POST',
				data: data,
				dataType: 'json',
				url: '/category/add_cat_to_image',
				success: function(results){
					this.set_category(results);
				}.bind(this)
			});
		}.bind(this)
		this.get_categories = function(image_id){
			console.log('running!!!');
				var data = {'image_id': image_id};
			$.ajax({
				type:'POST',
				data: data,
				url:'/category/get_categories',
				success: function(results){
					console.log(results);
					this.set_category(results);
				}.bind(this)
			});
		}.bind(this)
		this.init();
		this.addTagListener();
		this.addDeleteListener();
		this.keyListeners();
		this.addCategoryListener();
		this.remove_tag = function(e){
						target = e.target;
						var tag = $(target).attr('data-id');
						var data = {'tag_id' : tag, 'image_id' : this.id}
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
	
	var image_thumb_array = document.getElementsByClassName('image_thumb');
	for ( var i =0; i < image_thumb_array.length; i++)
	{
		album.thumbListeners(image_thumb_array[i]);
	}
})