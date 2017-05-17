$(function(){
	var Image_Details = function(element){
		this.element = element;
		this.initialize = function(){
			this.area = $('.image-details');
			this.price = $(this.element).attr('data-price');
			this.filetype = $(this.element).attr('data-filetype');
			this.add_to_cart = $('.add_to_cart');
			this.tags = $(this.element).attr('data-tags');
			this.json = $.parseJSON(this.tags);
			this.tag_holder = $('.image-details-tags');
			this.tag_string = "<h4>TAGS</h4>";
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
			this.price_holder = $('.image-details-price');
			this.url = $(this.element).attr('src');
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
			var tenpercent = -(.2 * width);
			var left_string = tenpercent+'px';
			$(this.area).width(width);
			$(this.opacity).hide();
			console.log('running');
			$(this.area).css({"margin-top":"0"});
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
			console.log(this.area.width());
			var sizing = .7*this.area.width() + "px";
			var size_string = "max-width:"+sizing;
			this.img = document.createElement('img');
			$(this.img).attr("style",size_string);
			this.img.src = this.url;
			$(this.image_holder).append(this.img);
			//$(this.image_holder).html("<a href='/image/info?id="+this.image_id+"'><img style='max-width:100%;' src='"+this.url+"'/></a>");
			var price = "Price " + this.price + ".00";
			var filetype = "Filetype " + this.filetype;
			var width = "Width " + this.width + "px";
			var height = "Height " + this.height + "px";
			$(this.add_to_cart).attr('data-id',this.image_id);
			$(this.price_holder).html(price);
			$(this.filetype_holder).html(filetype);
			$(this.width_holder).html(width);
			$(this.height_holder).html(height);
			$(this.button).attr('data-id', this.image_id);
			console.log(this.tag_string);
			$(this.tag_holder).html(this.tag_string);
			$(this.opacity).fadeIn(function(){console.log('runniing!!!')});

//			$('.item-details-price').html(this.price);
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