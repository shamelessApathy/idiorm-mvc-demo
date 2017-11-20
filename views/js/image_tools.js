$(function(){
	console.log('loading image_tools.js');
	var ImageTools = function()
	{
		this.init = function()
		{
			this.canvas = document.getElementById('ie-canvas');
			this.button_upload = document.getElementById('ie-upload');
			this.button_image_mount = document.getElementById('ie-image-mount');
			this.button_brightness_up = document.getElementById('ie-brighter');
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
			$(this.button_brightness_up).on('click', function(){
				console.log('brightness UP running');
				this.startFilters('#ie-canvas');
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
		this.startFilters = function(outImage)
		{
			console.log('startFilters() started!');
			this.getData = function()
			{
				 var c = document.getElementById('ie-canvas');
				  var ctx = c.getContext('2d');
				  return ctx.getImageData(0,0,c.width,c.height);
			}
			var data = this.getData();
			console.log(data);
			/*Filters = {};
			Filters.getCanvas = function(w,h) 
			{
  				var c = document.createElement('ie-canvas');
  				c.width = w;
  				c.height = h;
		    	return c;
			};
			Filters.getPixels = function(img) 
			{
  				var c = document.getElementById('ie-canvas');
  				var ctx = c.getContext('2d');
  				ctx.drawImage(img);
  				return ctx.getImageData(0,0,c.width,c.height);
			};


			Filters.filterImage = function(filter, image, var_args) 
			{
  				var args = [this.getPixels(image)];
  				for (var i=2; i<arguments.length; i++) 
  				{
    				args.push(arguments[i]);
  				}
  				return filter.apply(null, args);
			};
			Filters.grayscale = function(pixels, args) 
			{
  				var d = pixels.data;
  				for (var i=0; i<d.length; i+=4) 
  				{
	    			var r = d[i];
	    			var g = d[i+1];
	    			var b = d[i+2];
	    			// CIE luminance for the RGB
	    			// The human eye is bad at seeing red and blue, so we de-emphasize them.
	    			var v = 0.2126*r + 0.7152*g + 0.0722*b;
	    			d[i] = d[i+1] = d[i+2] = v
  				}
  				return pixels;
			};
			var pixels = Filters.getPixels(outImage);
			console.log(pixels);
			*/


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