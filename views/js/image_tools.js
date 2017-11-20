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
				this.Filters('#ie-canvas');
			}.bind(this))
		}
		// This function mounts image onto HMTL5 Canvas
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

		// This function is the beginning of figuring out filters
		this.Filters = function()
		{
			console.log('startFilters() started!');
			var interiorCanvas = document.getElementById('ie-canvas');
			this.convertCanvasToImage = function(canvas) 
			{	
				var image = new Image();
				image.src = canvas.toDataURL("image/jpg");
				return image;
			}
			this.getCanvas = function(w,h)
			{
				var c = document.getElementById('ie-canvas');
  				//c.width = w;
				//c.height = h;
  				return c;
			}
			this.getPixels = function(img) 
			{
				var c = document.getElementById('ie-canvas');
				var ctx = c.getContext('2d');
				ctx.drawImage(img,0,0);
				return ctx.getImageData(0,0,c.width,c.height);
			};
			this.filterImage = function(filter, image, var_args) 
			{
				var args = [this.getPixels(image)];
				for (var i=2; i<arguments.length; i++) 
				{
					args.push(arguments[i]);
				}
			  	return filter.apply(null, args);
			};
			this.grayScale = function(pixels)
			{
				var d = pixels.data;
				for (var i = 0; i < d.length; i+=4)
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
			}
			this.brightness = function(pixels, adjustment) 
			{
				var d = pixels.data;
				for (var i=0; i<d.length; i+=4) 
				{
			    	d[i] += adjustment;
			    	d[i+1] += adjustment;
			    	d[i+2] += adjustment;
			  	}
			  return pixels;
			};
			this.convertImageToCanvas = function(image) 
			{
				var canvas = document.createElement("canvas");
				canvas.width = image.width;
				canvas.height = image.height;
				canvas.getContext("2d").drawImage(image, 0, 0);
				return canvas;
			}
			var preCan = this.convertCanvasToImage(interiorCanvas);
			var demo = this.filterImage(this.brightness, preCan, 10);
			var sCanvas = document.getElementById('ie-canvas');
			var sCtx = sCanvas.getContext('2d');
			sCtx.putImageData(demo,0,0);
			//this.convertImageToCanvas(demo);
			

			/*var canvas = document.getElementById('ie-canvas');
	        var ctx = canvas.getContext('2d');
	        canvas.width = demo.width;
	        canvas.height = demo.height;
	        ctx.drawImage(demo,0,0);

			
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
		// This function shows the hidden input for file
		this.show_file_input = function()
		{
			$(this.hidden_input).css({"visibility":"visible"});
		}


	
		this.init();
		this.listeners();
	}
	var newTools = new ImageTools();
})