$(function(){
	var Category = function(){
		this.init = function()
		{
			this.add_trigger = $('#add-a-category');
			this.add_cat_div = $('.add-cat-div');
			this.cat_choice = $('#upload-category');
			this.submit = $('#add-cat-button');
		}
		this.close = function()
		{

			$(this.add_cat_div).css({'opacity':'0'});
			$(this.add_cat_div).css({'z-index':'-1'});
		}.bind(this)
		this.show_add = function()
		{
			$(this.add_cat_div).css({'z-index':"2"});
			$(this.add_cat_div).css({'opacity':'1'});
			$('.close').on('click', this.close);
		}.bind(this)
		this.submit_category = function()
		{
			var title = $('#cat-title').val();
			var data = {"cat_name": title};
			$.ajax({
				type: "POST",
				url: '/category/create_category',
				data: data,
				dataType: "json"
			});
			this.close();
			$('.container').append("<div class='user_msg'>Category Submitted Successfully!!</div>");
		}.bind(this)
		this.initializeListeners = function(show)
		{
			var func1 = show;
			$('#add-a-category').on('click', func1);
			$(this.submit).on('click', this.submit_category);

		}.bind(this)
		this.init();
		this.initializeListeners(this.show_add);
	}
	var newCategory = new Category();
})