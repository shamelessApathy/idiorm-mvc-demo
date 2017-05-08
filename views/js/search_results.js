$(function(){
	var Image_Details = function(element){
		this.element = element;
		this.initialize = function(){
			this.area = $('.image-details');
			this.price = $(this.element).attr('data-price');
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
			$(this.price_holder).html(this.price);

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