$(function(){
	var button = $('#add_tag');
	var field = document.getElementById('new_tag');
	var tags = document.getElementById('tag_holder');
	var tag_div = document.getElementById('tag_div');
	var premium = document.getElementById('premium');
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
	var show_price = function()
	{
		console.log('click run');
		if (!premium.checked)
		{
			console.log('checkeD?');
			$('#input_price').val('');
			$('#upload_price').css({'display':'none'});
		}
		else
		{
			$('#upload_price').css({'display':'block'});
		}
	}
	button.on('click', add_tags);
	$(premium).on('click', show_price);
	
})