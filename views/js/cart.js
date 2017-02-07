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
			$.ajax({
				url: '/cart/add_item',
				method: 'POST',
				data : {'image_id':id},
				success: function(results)
				{
					location.reload();
				}
			})
		}.bind(this)
		this.remove_item = function(e)
		{
			var parent = $(e.target).parent();
			var id = $(e.target).attr('data-id');
			$.ajax({
				url: '/cart/remove_item',
				method: 'POST',
				data: {'image_id':id},
				success: function(results)
				{
					console.log(results);
				}
			})
			console.log(parent);
			$(parent).remove();
		}
		this.add_remove_button = function(button)
		{
			$(button).on('click', this.remove_item);
		}.bind(this);
		this.addListeners = function()
		{
			this.add_button.on('click', this.add_item);
		}.bind(this)
		this.init();
		this.addListeners();
	}
	// had tried to use jquery for $('#cart-container') but it kept returning truish... don't know why, had to use regular JS
	var add2cart = document.getElementsByClassName('add_to_cart');
	var cartContainer = document.getElementById('cart-container');
	if (add2cart)
	{
	var newCart = new Cart();
	}
	if (cartContainer)
	{
		var newCart = new Cart();
		$buttonArray = document.getElementsByClassName('remove-item');
		for (var i = 0; i < $buttonArray.length; i++)
		{
			newCart.add_remove_button($buttonArray[i]);
		}
	}
})