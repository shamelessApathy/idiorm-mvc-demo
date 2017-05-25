$(function(){

var CategoryManager = function(){
	this.init = function(){
		this.initializeListeners = function(el)
		{
			$(el).on('click', function(){
				var id = $(el).attr('data-id');
				$.ajax({
					type:'POST',
					url: "/admin/approve_category",
					data: {'id': id},
					success: function(results)
					{
						location.reload();
					}
				})
			})
		}
	}
	this.init();
}
var holder = document.getElementsByClassName('approve');
for (var i = 0 ; i < holder.length; i++)
{
	var newManager = new CategoryManager();
	newManager.initializeListeners(holder[i]);
}

})