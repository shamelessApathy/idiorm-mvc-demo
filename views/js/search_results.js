$(function(){
	var Image_Details = function(element){
		this.element = element;
		this.initialize = function(){
			this.area = $('.image-details');
			this.price = $(this.element).attr('data-price');
			this.username = $(this.element).attr('data-username');
			this.filetype = $(this.element).attr('data-filetype');
			this.add_to_cart = $('.add_to_cart');
			this.user_id = $(this.element).attr('data-user');
			this.tags = $(this.element).attr('data-tags');
			this.json = $.parseJSON(this.tags);
			this.tag_holder = $('.image-details-tags');
			this.tag_string = "<h4>TAGS</h4>";
			this.download_link = $('#image-download-link');
			for (var i = 0; i < this.json.length; i++)
			{
				var wrapper = "<div class='tag'>" + this.json[i]['text'] + "</div>";
				this.tag_string = this.tag_string + wrapper;
			}
			this.width = $(this.element).attr('data-width');
			this.image_id = $(this.element).attr('data-id');
			this.height = $(this.element).attr('data-height');
			this.filetype_holder = $('.image-details-filetype');
			this.width_holder = $('.image-details-width');
			this.height_holder = $('.image-details-height');
			this.user_avatar = $(this.element).attr('data-avatar');
			if (this.user_avatar === "NULL")
			{
				this.user_avatar = false;
			}
			// no more price
			//this.price_holder = $('.image-details-price');
			this.username_holder = $('.image-details-username');
			this.url = $(this.element).attr('data-watermark');
			console.log(this.url);
			this.image_holder = $('.image-details-holder');
			this.button = $('.add_to_cart');
			this.hider = $('.image-details-hider');
			this.opacity = $('.image-details-opacity');
		}
		this.getImageHeight = function()
		{
			/*var poll = setInterval(function () 
			{
	    		if (img.naturalWidth) 
	    		{
	        		clearInterval(poll);
	        		console.log(img.naturalWidth, img.naturalHeight);
	        	}
        	}, 10);*/
		}
		this.open = function()
		{
			var width = .9*window.innerWidth;
			$('body').width(window.innerWidth);
			var tenpercent = -(.2 * width);
			var left_string = tenpercent+'px';
			$(this.area).width(width);
			$(this.opacity).hide();
			console.log('running');
			$(this.area).css({"margin-top":"150px"});
			this.addDetails();
		}.bind(this);
		this.close = function()
		{
			$(this.img).remove();
			$(this.area).css({"margin-top":"-1000"});
		}.bind(this)
		this.setListener = function(el)
		{
			$(el).on('click', this.open);
			$('.close-image-details').on('click', this.close);
		}.bind(this)
		this.img;
		this.addDetails = function()
		{
			var sizing = .7*this.area.width() + "px";
			var size_string = "max-width:"+sizing;
			this.img = document.createElement('img');
			$(this.img).attr("style",size_string);
			this.img.src = this.url;
			$(this.image_holder).append(this.img);
			console.log(this.img.height);

			//$(this.image_holder).html("<a href='/image/info?id="+this.image_id+"'><img style='max-width:100%;' src='"+this.url+"'/></a>");
			var price = "Price " + this.price + ".00";
			var filetype = "Filetype " + this.filetype;
			var width = "Width " + this.width + "px";
			var height = "Height " + this.height + "px";
			$(this.add_to_cart).attr('data-id',this.image_id);
			// Checking to see if User Avatar is set yet, if not, don't bother adding it in
			if (this.user_avatar)
			{
				var user_avatar_string = "<img class='user_avatar2' src='"+this.user_avatar+"'/>";	
			}
			else
			{
				user_avatar_string = "";
			}
			var user_link = "<a href='/user/info/"+this.user_id+"'>"+this.username+"</a>&nbsp"+user_avatar_string;

			$(this.username_holder).html(user_link);
			$(this.filetype_holder).html(filetype);
			$(this.width_holder).html(width);
			$(this.height_holder).html(height);
			$(this.button).attr('data-id', this.image_id);
			console.log(this.tag_string);
			$(this.tag_holder).html(this.tag_string);
			$(this.opacity).fadeIn(function(){console.log('runniing!!!')});

//			$('.item-details-price').html(this.price);
// Adding image source download link here
			var url_download_string = "/image/download/" + this.image_id;
			$(this.download_link).attr('href', url_download_string);
		}.bind(this)
		this.initialize();
	}
var elements = document.getElementsByClassName('image-result');
var length = elements.length;
for (var i = 0; i < length; i++)
{
	var image = new Image_Details(elements[i]);
	image.setListener(elements[i]);
}

})