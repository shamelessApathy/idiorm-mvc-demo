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
			this.button_brightness_down = document.getElementById('ie-darker');
			this.button_download = document.getElementById('ie-download');
			this.hidden_input = document.getElementById('ie-file-input');
			this.toolbar_left = document.getElementById('ie-toolbar-left');
			this.toolbar_right = document.getElementById('ie-toolbar-right');

			// Filters
			// This function is the beginning of figuring out filters
		this.Filters = function(action)
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
			this.darkness = function(pixels, adjustment) 
			{
				var d = pixels.data;
				for (var i=0; i<d.length; i+=4) 
				{
			    	d[i] -= adjustment;
			    	d[i+1] -= adjustment;
			    	d[i+2] -= adjustment;
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
			this.makeBrighter = function()
			{
				console.log('inside makebrighter function!!');
				var preCan = this.convertCanvasToImage(interiorCanvas);
				var demo = this.filterImage(this.brightness, preCan, 10);
				var sCanvas = document.getElementById('ie-canvas');
				var sCtx = sCanvas.getContext('2d');
				sCtx.putImageData(demo,0,0);
			}
			this.makeDarker = function()
			{
				console.log('inside makedarker function!!');
				var preCan = this.convertCanvasToImage(interiorCanvas);
				var demo = this.filterImage(this.darkness, preCan, 10);
				var sCanvas = document.getElementById('ie-canvas');
				var sCtx = sCanvas.getContext('2d');
				sCtx.putImageData(demo,0,0);
			}
			switch(action)
			{
				case "makeBrighter": this.makeBrighter();
				break;
				case "makeDarker" : this.makeDarker();
				break;
			}
		}

		}
		// adjusts for height and width of toolbars to help provide visibility
		this.adjustToolbars = function(width,height)
		{
			
			
			console.log(height);
			$(this.toolbar_left).css({"height":height});
			$(this.toolbar_right).css({"height":height});
		}
		// All event listeners that need to be instantly instantiated are in this function
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
				//this.canvas.height = document.getElementById('ie-canvas').height;
				this.handleImage(e);
			}.bind(this))
			$(this.button_brightness_up).on('click', function(){
				console.log('brightness UP running');
				this.Filters('makeBrighter');
			}.bind(this))
			$(this.button_brightness_down).on('click', function(){
				console.log('click recognized for darker!');
				this.Filters('makeDarker');
			}.bind(this))
			$(this.button_download).on('click', function(){
				console.log('made it to the download function listener');
				canvas = document.getElementById('ie-canvas');
				var dataURL = canvas.toDataURL('image/jpeg');
    			$(this.button_download).href = dataURL;
			}.bind(this))			
			$(this.canvas).on('object:modified', function(event) {
    		// the object that has been modified is in:
    		console.log('working now');
			}.bind(this))
		}
		// This function mounts image onto HMTL5 Canvas
		this.handleImage = function(e)
		{
    		var reader = new FileReader();
    		reader.onload = function(event)
    		{
        		//var img = new Image();
        		//var current_img_height =  0;
        		function objectifyImage(i) 
				{
				    var img_obj = new Image();
				    img_obj.src = i;
				    return img_obj;
				}

			var canvas = document.getElementById('ie-canvas');
			var context = canvas.getContext('2d');
			i = objectifyImage(event.target.result);
			i.onload = function() 
			{
    			canvas.width = i.width;
		    	canvas.height = i.height;

    			context.drawImage(i, 0, 0);
    			// have to multiple by 1.63 it is scaling the height 63%?37%?
    			width = i.width;
    			height = i.height - (i.height * 0.2);
    			this.adjustToolbars(width, height);
			}.bind(this);

	        	//img.src = event.target.result;
	        	// Coudn't get the right reading here because of the canvas not being made larger yet, image hadn't loaded...
	        	
	        	
	    	}.bind(this)
	    	
    		reader.readAsDataURL(e.target.files[0]);     
		}

		
		// This function shows the hidden input for file
		this.show_file_input = function()
		{
			$(this.hidden_input).css({"visibility":"visible"});
		}


	
		this.init();
		setInterval( this.listeners(), 500);
	}
	var newTools = new ImageTools();
})