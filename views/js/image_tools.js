$(function(){
	console.log('loading image_tools.js');
	var ImageTools = function()
	{
		this.init = function()
		{
			this.canvas = document.getElementById('ie-canvas');
			this.button_upload = document.getElementById('ie-upload');
			this.button_image_mount = document.getElementById('ie-image-mount');
			this.hidden_input = document.getElementById('ie-file-input');
		}
		this.listeners = function()
		{
			$(this.button_upload).on('click', function(){
				console.log('running click loop');
				this.show_file_input();
			}.bind(this))
			$(this.button_image_mount).on('click', function(){
				console.log('mount button listener running!');
			})
			// Listen for file change here
			$("#ie-image").change(function(e){
				console.log('change function firing');
				this.handleImage(e);	
			}.bind(this))
		}
		this.handleImage = function(e)
		{
    		var reader = new FileReader();
    		reader.onload = function(event)
    		{
        		var img = new Image();
        		img.onload = function()
	        	{
	        		var canvas = document.getElementById('ie-canvas');
	        		var ctx = canvas.getContext('2d');
	            	canvas.width = img.width;
	            	canvas.height = img.height;
	            	ctx.drawImage(img,0,0);
	        	}
	        	img.src = event.target.result;
	    	}
    		reader.readAsDataURL(e.target.files[0]);     
		}
		this.show_file_input = function()
		{
			console.log('running hsow_file_input ');
			$(this.hidden_input).css({"visibility":"visible"});
		}
		this.readURL = function(input) 
		{
			if (input.files && input.files[0]) 
			{
        		var reader = new FileReader();

        		reader.onload = function (e) 
        		{
            		$('#ie-canvas-image').attr('src', e.target.result);
            		$('#ie-canvas-image').attr('style','display:block');
        		}

        		reader.readAsDataURL(input.files[0]);
    		}
		}

	
		this.init();
		this.listeners();
	}
	var newTools = new ImageTools();
})