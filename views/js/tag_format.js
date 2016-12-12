$(function(){
	var button = $('#add_tag');
	var field = document.getElementById('new_tag');
	var tags = document.getElementById('tag_holder');
	var tag_div = document.getElementById('tag_div');
	var add_tags = function(){
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
	
})