$(function(){
	var Listing = function(target)
	{
		this.target = target;
		// Get parent of the button
		this.parent = this.target.parentElement;
		// Get hidden area inside parent of button
		this.hidden = this.parent.getElementsByClassName('sub-hidden')[0];
		// Change CSS so hidden List Items Show
		this.show = function(e)
		{
			$(this.hidden).css({'display' :'block'});
		}.bind(this)
		// Change CSS so list items hide
		this.hide = function(e)
		{
			$(this.hidden).css({'display':'none'});
		}
		// Set an event listener on the listing's button
		this.initializeListeners = function()
		{
			$(this.target).on('click', function(e){
				if ($(this.hidden).css('display') == 'block')
				{
					this.hide(e);
				}
				else
				{
					this.show(e);
				}
			}.bind(this));
		}.bind(this)
		this.initializeListeners();
	}
	// Get all Listing groups, put in array
	var parents = document.getElementsByClassName('more-button');
	// For each element in the array, create a new Listing() object
	for (i = 0; i < parents.length; i++)
	{
		list = new Listing(parents[i]);
	}
})