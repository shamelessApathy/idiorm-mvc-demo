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
})