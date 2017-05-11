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
			this.tag_holder = $('.item-details-tags');
			this.width = $(this.element).attr('data-width');
			this.image_id = $(this.element).attr('data-id');
			this.height = $(this.element).attr('data-height');
			this.filetype_holder = $('.image-details-filetype');
			this.width_holder = $('.image-details-width');
			this.height_holder = $('.image-details-height');
			this.price_holder = $('.image-details-price');
			this.url = $(this.element).attr('src');
			this.image_holder = $('.image-details-holder');
			this.hider = $('.image-details-hider');
		}
		this.open = function()
		{
			console.log('running');
			$(this.area).css({"height":"300px"});
			$(this.hider).css({"display":"block"});
			this.addDetails();
		}.bind(this);
		this.close = function()
		{
			$(this.hider).css({"display":"none"});
			$(this.area).css({"height":"0"});
		}.bind(this)
		this.setListener = function(el)
		{
			$(el).on('click', this.open);
			$('.close-image-details').on('click', this.close);
		}.bind(this)
		this.addDetails = function()
		{
			$(this.image_holder).html("<img style='max-width:100%;' src='"+this.url+"'/>");
			var price = "Price " + this.price + ".00";
			var filetype = "Filetype " + this.filetype;
			var width = "Width " + this.width + "px";
			var height = "Height " + this.height + "px";
			$(this.add_to_cart).attr('data-id',this.image_id);
			$(this.price_holder).html(price);
			$(this.filetype_holder).html(filetype);
			$(this.width_holder).html(width);
			$(this.height_holder).html(height);
			console.log(this.tags);
//			$('.item-details-price').html(this.price);
		}
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