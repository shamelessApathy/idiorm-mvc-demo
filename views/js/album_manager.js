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
		
		this.init();
	}

	var album = new AlbumManager();

})