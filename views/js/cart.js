$(function(){
	var Cart = function()
	{
		this.init = function()
		{
			this.add_button = $('.add_to_cart');
		}
		this.add_item = function()
		{
			var id = $(this.add_button).attr('data-id');
			console.log(id);
			$.ajax({
				url: '/cart/add_item',
				method: 'POST',
				data : {'image_id':id},
				success: function(results)
				{
					console.log(results);
				}
			})
		}.bind(this)
		this.addListeners = function()
		{
			this.add_button.on('click', this.add_item);
		}.bind(this)
		this.init();
		this.addListeners();
	}
	if ($('.add_to_cart'))
	{
	var newCart = new Cart();
	}
})