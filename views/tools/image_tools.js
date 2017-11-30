var keys = [];
var orig_image = new Image();
var layer_counter = 0 ;
$(function(){


	console.log('loading image_tools.js');
	var ImageTools = function()
	{
		this.init = function()
		{
			this.tagHolder = document.getElementById('tag_holder');
			this.iframe = document.getElementById('ie-iframe');
			this.canvas = document.getElementById('ie-canvas');
			this.login_form = document.getElementById('ie-login-form');
			this.save_form = document.getElementById('ie-save-form');
			this.button_save_image = document.getElementById('ie-image-submit-button');
			this.button_login = document.getElementById('ie-login');
			this.button_upload = document.getElementById('ie-upload');
			this.button_image_mount = document.getElementById('ie-image-mount');
			this.button_brightness_up = document.getElementById('ie-brighter');
			this.button_brightness_down = document.getElementById('ie-darker');
			this.button_download = document.getElementById('ie-download');
			this.button_text_editor = document.getElementById('ie-text-editor');
			this.button_refresh = document.getElementById('ie-refresh');
			this.button_black_and_white = document.getElementById('ie-black-and-white');
			this.button_sharpen = document.getElementById('ie-sharpen');
			this.button_save = document.getElementById('ie-save');
			this.button_sepia = document.getElementById('ie-sepia');
			this.button_close = document.getElementById('ie-close');
			this.hidden_input = document.getElementById('ie-file-input');
			this.toolbar_left = document.getElementById('ie-toolbar-left');
			this.toolbar_right = document.getElementById('ie-toolbar-right');
			this.waiting_div = document.getElementById('ie-image-loading');

			// Initilizating pick a color

			// Filters

		this.Filters = function(action)
		{
			console.log('startFilters() started!');
			var interiorCanvas = document.getElementById('ie-canvas');
			// Tint blue function first attemp
			this.tintBlue = function(pixels)
			{
				console.log(pixels);
				var d = pixels.data;
				console.log(d);
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
			// Makes image Sepia colored, spits it back out... not mine, different than other guy who had it break to pixels first?@?
			this.processSepia = function(canvas) 
			{
				var r = [0, 0, 0, 1, 1, 2, 3, 3, 3, 4, 4, 4, 5, 5, 5, 6, 6, 7, 7, 7, 7, 8, 8, 8, 9, 9, 9, 9, 10, 10, 10, 10, 11, 11, 12, 12, 12, 12, 13, 13, 13, 14, 14, 15, 15, 16, 16, 17, 17, 17, 18, 19, 19, 20, 21, 22, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36, 37, 39, 40, 41, 42, 44, 45, 47, 48, 49, 52, 54, 55, 57, 59, 60, 62, 65, 67, 69, 70, 72, 74, 77, 79, 81, 83, 86, 88, 90, 92, 94, 97, 99, 101, 103, 107, 109, 111, 112, 116, 118, 120, 124, 126, 127, 129, 133, 135, 136, 140, 142, 143, 145, 149, 150, 152, 155, 157, 159, 162, 163, 165, 167, 170, 171, 173, 176, 177, 178, 180, 183, 184, 185, 188, 189, 190, 192, 194, 195, 196, 198, 200, 201, 202, 203, 204, 206, 207, 208, 209, 211, 212, 213, 214, 215, 216, 218, 219, 219, 220, 221, 222, 223, 224, 225, 226, 227, 227, 228, 229, 229, 230, 231, 232, 232, 233, 234, 234, 235, 236, 236, 237, 238, 238, 239, 239, 240, 241, 241, 242, 242, 243, 244, 244, 245, 245, 245, 246, 247, 247, 248, 248, 249, 249, 249, 250, 251, 251, 252, 252, 252, 253, 254, 254, 254, 255, 255, 255, 255, 255, 255, 255, 255, 255, 255, 255, 255, 255, 255, 255, 255, 255, 255, 255, 255, 255, 255, 255, 255, 255, 255, 255, 255, 255],
				    g = [0, 0, 1, 2, 2, 3, 5, 5, 6, 7, 8, 8, 10, 11, 11, 12, 13, 15, 15, 16, 17, 18, 18, 19, 21, 22, 22, 23, 24, 26, 26, 27, 28, 29, 31, 31, 32, 33, 34, 35, 35, 37, 38, 39, 40, 41, 43, 44, 44, 45, 46, 47, 48, 50, 51, 52, 53, 54, 56, 57, 58, 59, 60, 61, 63, 64, 65, 66, 67, 68, 69, 71, 72, 73, 74, 75, 76, 77, 79, 80, 81, 83, 84, 85, 86, 88, 89, 90, 92, 93, 94, 95, 96, 97, 100, 101, 102, 103, 105, 106, 107, 108, 109, 111, 113, 114, 115, 117, 118, 119, 120, 122, 123, 124, 126, 127, 128, 129, 131, 132, 133, 135, 136, 137, 138, 140, 141, 142, 144, 145, 146, 148, 149, 150, 151, 153, 154, 155, 157, 158, 159, 160, 162, 163, 164, 166, 167, 168, 169, 171, 172, 173, 174, 175, 176, 177, 178, 179, 181, 182, 183, 184, 186, 186, 187, 188, 189, 190, 192, 193, 194, 195, 195, 196, 197, 199, 200, 201, 202, 202, 203, 204, 205, 206, 207, 208, 208, 209, 210, 211, 212, 213, 214, 214, 215, 216, 217, 218, 219, 219, 220, 221, 222, 223, 223, 224, 225, 226, 226, 227, 228, 228, 229, 230, 231, 232, 232, 232, 233, 234, 235, 235, 236, 236, 237, 238, 238, 239, 239, 240, 240, 241, 242, 242, 242, 243, 244, 245, 245, 246, 246, 247, 247, 248, 249, 249, 249, 250, 251, 251, 252, 252, 252, 253, 254, 255],
				    b = [53, 53, 53, 54, 54, 54, 55, 55, 55, 56, 57, 57, 57, 58, 58, 58, 59, 59, 59, 60, 61, 61, 61, 62, 62, 63, 63, 63, 64, 65, 65, 65, 66, 66, 67, 67, 67, 68, 69, 69, 69, 70, 70, 71, 71, 72, 73, 73, 73, 74, 74, 75, 75, 76, 77, 77, 78, 78, 79, 79, 80, 81, 81, 82, 82, 83, 83, 84, 85, 85, 86, 86, 87, 87, 88, 89, 89, 90, 90, 91, 91, 93, 93, 94, 94, 95, 95, 96, 97, 98, 98, 99, 99, 100, 101, 102, 102, 103, 104, 105, 105, 106, 106, 107, 108, 109, 109, 110, 111, 111, 112, 113, 114, 114, 115, 116, 117, 117, 118, 119, 119, 121, 121, 122, 122, 123, 124, 125, 126, 126, 127, 128, 129, 129, 130, 131, 132, 132, 133, 134, 134, 135, 136, 137, 137, 138, 139, 140, 140, 141, 142, 142, 143, 144, 145, 145, 146, 146, 148, 148, 149, 149, 150, 151, 152, 152, 153, 153, 154, 155, 156, 156, 157, 157, 158, 159, 160, 160, 161, 161, 162, 162, 163, 164, 164, 165, 165, 166, 166, 167, 168, 168, 169, 169, 170, 170, 171, 172, 172, 173, 173, 174, 174, 175, 176, 176, 177, 177, 177, 178, 178, 179, 180, 180, 181, 181, 181, 182, 182, 183, 184, 184, 184, 185, 185, 186, 186, 186, 187, 188, 188, 188, 189, 189, 189, 190, 190, 191, 191, 192, 192, 193, 193, 193, 194, 194, 194, 195, 196, 196, 196, 197, 197, 197, 198, 199];
				    // noise value
				    var noise = 20;
		    // get current image data
		    	ctx = canvas.getContext('2d');
			    var imageData = ctx.getImageData(0,0,canvas.width,canvas.height);
			    for (var i=0; i < imageData.data.length; i+=4) 
			    {
			        // change image colors
			        imageData.data[i] = r[imageData.data[i]];
			        imageData.data[i+1] = g[imageData.data[i+1]];
			        imageData.data[i+2] = b[imageData.data[i+2]];
			        // apply noise
			        if (noise > 0) 
			        {
			            var noise = Math.round(noise - Math.random() * noise);
			            for(var j=0; j<3; j++)
			            {
			                var iPN = noise + imageData.data[i+j];
			                imageData.data[i+j] = (iPN > 255) ? 255 : iPN;
			            }
			        }
			    }
			    // put image data back to context
			    ctx.putImageData(imageData, 0, 0);
			}

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
				console.log(pixels);
				var d = pixels.data;
				console.log(d);
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
			this.blackAndWhite = function()
			{
				console.log('inside blackAndWhite function()');
				var preCan = this.convertCanvasToImage(interiorCanvas);
				var demo = this.filterImage(this.grayScale, preCan);
				var sCanvas = document.getElementById('ie-canvas');
				var sCtx = sCanvas.getContext('2d');
				sCtx.putImageData(demo,0,0);
			}
			this.makeSharper = function(){
				console.log('in the make sharper cfunction');
				var preCan = this.convertCanvasToImage(interiorCanvas);
				var demo = this.filterImage(this.convolute, preCan, [  0, -1,  0,
																	 -1,  5, -1,
																	  0, -1,  0 ]);
				var sCanvas = document.getElementById('ie-canvas');
				var sCtx = sCanvas.getContext('2d');
				sCtx.putImageData(demo,0,0);

			}
			/* All new stuff convultion andshit */


			this.tmpCanvas = document.getElementById('ie-canvas');
			this.tmpCtx = this.tmpCanvas.getContext('2d');

			this.createImageData = function(w,h) {
			  return this.tmpCtx.createImageData(w,h);
			}.bind(this)

			this.convolute = function(pixels, weights, opaque) 
			{
			  var side = Math.round(Math.sqrt(weights.length));
			  var halfSide = Math.floor(side/2);
			  var src = pixels.data;
			  var sw = pixels.width;
			  var sh = pixels.height;
			  // pad output by the convolution matrix
			  var w = sw;
			  var h = sh;
			  var output = this.createImageData(w, h);
			  var dst = output.data;
			  // go through the destination image pixels
			  var alphaFac = opaque ? 1 : 0;
			  for (var y=0; y<h; y++) {
			    for (var x=0; x<w; x++) {
			      var sy = y;
			      var sx = x;
			      var dstOff = (y*w+x)*4;
			      // calculate the weighed sum of the source image pixels that
			      // fall under the convolution matrix
			      var r=0, g=0, b=0, a=0;
			      for (var cy=0; cy<side; cy++) {
			        for (var cx=0; cx<side; cx++) {
			          var scy = sy + cy - halfSide;
			          var scx = sx + cx - halfSide;
			          if (scy >= 0 && scy < sh && scx >= 0 && scx < sw) {
			            var srcOff = (scy*sw+scx)*4;
			            var wt = weights[cy*side+cx];
			            r += src[srcOff] * wt;
			            g += src[srcOff+1] * wt;
			            b += src[srcOff+2] * wt;
			            a += src[srcOff+3] * wt;
			          }
			        }
			      }
			      dst[dstOff] = r;
			      dst[dstOff+1] = g;
			      dst[dstOff+2] = b;
			      dst[dstOff+3] = a + alphaFac*(255-a);
			    }
			  }
			  return output;
			}.bind(this);



			switch(action)
			{
				case "brighter": this.makeBrighter();
				break;
				case "darker" : this.makeDarker();
				break;
				case "blackandwhite" : this.blackAndWhite();
				break;
				case "convertcanvastoimage" : this.convertCanvasToImage(interiorCanvas);
				break;
				case "sepia" : this.processSepia(interiorCanvas);
				break;
				case 'sharpen' : this.makeSharper();
				break;
			}
		}

	}
		this.scaleImageToViewport = function()
		{
			var w = Math.max(document.documentElement.clientWidth, window.innerWidth || 0);
			var h = Math.max(document.documentElement.clientHeight, window.innerHeight || 0);
			console.log('width:'+w);
			console.log('height:'+h);
			var img = this.Filters('convertcanvastoimage');
			var hRatio = w / img.width    ;
			var vRatio = h / img.height  ;
			var ratio  = Math.min ( hRatio, vRatio );
			var canvas = document.getElementById('ie-canvas');
			var ctx = canvas.getcontext('2d');
			ctx.drawImage(img, 0,0, img.width, img.height, 0,0,img.width*ratio, img.height*ratio);
		}
		this.waitingOn = function()
		{
			console.log('inside waitingOn function');
			$(this.waiting_div).css({'display':'block'});
		}
		this.waitingOff = function()
		{
			$(this.waiting_div).css({'display':'none'});
		}
		// Refreshes original uploaded image onto the canvas
		this.refreshOriginal = function()
		{
			var canvas = document.getElementById('ie-canvas');
			var ctx = canvas.getContext('2d');
			ctx.drawImage(orig_image,0,0);
		}
		this.saveImage = function()
		{
			
			$(this.save_form).change(function(){
				console.log('inside save_form function change!');
			});
			this.tag_handler();
			var test_login = session;
			if (test_login === 1)
			{
				var stuff;
				var form = document.getElementById('ie-save-form');
				console.log('inside login test');
				canvas = document.getElementById('ie-canvas');
				var dataURL = canvas.toDataURL("image/png");
				$('#ie-save-form-container').css({"display":"block", "z-index":'10'});
				// listener for submit function for image save
				$(this.button_save_image).on('click', function()
				{
				var user_image_name = $('#user_image_name').val();
				var category = $('#category-id').val();
				var all_tags = $('#tag_holder').val();
				serialData = {'user_image_name': user_image_name, 'category-id': category, 'tags': all_tags};
				//serialData = $(form).serialize();
				var blobBin = atob(dataURL.split(',')[1]);
				var array = [];
				for(var i = 0; i < blobBin.length; i++) {
				    array.push(blobBin.charCodeAt(i)); 
				}
				var file=new Blob([new Uint8Array(array)], {type: 'image/png'});


				var formdata = new FormData();
				formdata.append("canvas-file", file);
				formdata.append("category-id", category);
				formdata.append("tags", all_tags);
				formdata.append("user_image_name", user_image_name);
				$.ajax({
				   url: "/views/tools/tools.special_upload.php",
				   type: "POST",
				   data: formdata,
				   processData: false,
				   contentType: false,
				   success:  function(results){
				   	console.log(results);
				   }
				});		
				});
				

				/*var text = canvasData;
      			$('<form class="hidden-form" action="/views/tools/tools.special_upload.php" method="post" style="display: none;"><input name="image" type="file"></form>')
          		.appendTo('body');
      			$('[name="image"]').val(text);
      			$('.hidden-form').submit();*/


      			/* This works to send asynchronously, add in modal to add tags and shit, you're golden */
      			
      			
			}
			else
			{
				console.log('inside else loop of saveImage()');
				$(this.login_form).css({"display":'block',"z-index":'10'});
			}
			$(this.login_form).css({"visibility":"visible","z-index":"10"})
		}.bind(this)


		// This will handle all tags being added to save-form element
		this.tag_handler = function()
		{
			console.log('tag handler running!!!');
			var button = $('#add_tag');
			var tag_div = document.getElementById('ie-tag-div');
			console.log(tag_div);
			var tags = document.getElementById('tag_holder');
			var field = document.getElementById('new_tag');
			
			var add_tags = function()
			{
				myvalue =  function()
				{
					value = tags.value;
				}
				console.log(field.value);
				myvalue();
				console.log(value);
				if (value === undefined || value === null)
				{
					console.log('if running');
					value = '';
				}
				tags.value = (value + field.value + "|");
				var new_tag = "<span class='tag'>" + field.value + "</span>";
				tag_div.innerHTML += new_tag;
				field.value = "";
			}
			button.on('click', add_tags);
		}.bind(this)

		// All event listeners that need to be instantly instantiated are in this function
		this.listeners = function()
		{
			// Listens for close click on anything with #ie-close
			$('.ie-close').on('click', function(e){
				console.log('inside click close listener');
				console.log(e.target.parentNode);
				$(e.target.parentNode).css({'display':'none', "z-index":'0'});
			});
			// This listens for clicks on the Save button
			this.button_save.addEventListener('click', function(){
				this.saveImage();
			}.bind(this))
			// This listens for clicks on the refresh button
			this.button_refresh.addEventListener('click', function(){
				console.log('in the refresh listener!!!');
				this.refreshOriginal();
			}.bind(this))
			// Makes image more bklue scale
			this.button_sharpen.addEventListener('click', function(){
				console.log('in the sharpen listener');
				this.Filters('sharpen');
			}.bind(this))
			// Makes image sepia colored
			this.button_sepia.addEventListener('click', function(){
				this.Filters('sepia');
			}.bind(this))

			// Click listener for Upload Button
			this.button_black_and_white.addEventListener('click', function(){
				console.log('in black and white listener'); 
				this.Filters('blackandwhite');
			}.bind(this))
			this.button_upload.addEventListener('click', function(){
				console.log('running click loop');
				this.show_file_input();
			}.bind(this))
			//Click listener for Image Mount button
			// Listen for file change here
			$("#ie-image").change(function(e){
				this.handleImage(e);
			}.bind(this))
			// Listening for button_brightness button click
			this.button_brightness_up.addEventListener('click', function(){
				this.Filters('brighter');
				console.log('brightness UP running');
				//this.Filters('makeBrighter');
			}.bind(this))
			// Listening for button_darkness click
			this.button_brightness_down.addEventListener('click', function(){
				this.Filters("darker");
				console.log('click recognized for darker!');
				//this.Filters('makeDarker');
			}.bind(this))
			// Listening for button download click ## REALLY NEEDS HREF LINK INSTEAD ##
			this.button_download.addEventListener('click', function(){
				console.log('made it to the download function listener');
				canvas = document.getElementById('ie-canvas');
				var dataURL = canvas.toDataURL('image/jpeg');
    			$(this.button_download).href = dataURL;
			}.bind(this))			
		}
		this.clearOpacity = function()
		{
		    $(this.button_brightness_up).css({'opacity':'1'});
		    $(this.button_brightness_down).css({'opacity':'1'});
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
				    orig_image = img_obj;
				    return img_obj;
				}
				function updateSrc(e)
				{
            			$('#ie-current-image').attr('src', e.target.result);
						console.log('updateSrc function() running'); 
				}
	

			var canvas = document.getElementById('ie-canvas');
			var context = canvas.getContext('2d');
			i = objectifyImage(event.target.result);
			i.onload = function() 
			{
    			canvas.width = i.width;
		    	canvas.height = i.height;

    			context.drawImage(i, 0, 0);
			}.bind(this);

	        	//img.src = event.target.result;
	        	// Coudn't get the right reading here because of the canvas not being made larger yet, image hadn't loaded...
	        	
	        	
	    	}.bind(this)
	    	
    		reader.readAsDataURL(e.target.files[0]);
    		$(this.hidden_input).css({"visibility":"hidden"});
    		$(this.hidden_input).css({"z-index":"-1"});
		}

		
		// This function shows the hidden input for file
		this.show_file_input = function()
		{
			$(this.hidden_input).css({"visibility":"visible"});
			$(this.hidden_input).css({"z-index":"10"});
		}



	
		this.init();
		this.listeners();
	}
	var newTools = new ImageTools();
})