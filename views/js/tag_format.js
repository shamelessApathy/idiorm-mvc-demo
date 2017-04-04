$(function(){
	var button = $('#add_tag');
	var field = document.getElementById('new_tag');
	var mobile_field = document.getElementById('mobile_new_tag');
	var tags = document.getElementById('tag_holder');
	var mobile_tags = document.getElementById('mobile_tag_holder');
	var tag_div = document.getElementById('tag_div');
	var mobile_tag_div = document.getElementById('mobile_tag_div');
	var premium = document.getElementById('premium');
	var premium_mobile = $('#premium-mobile');
	var premium_cancel = $('#premium-cancel');

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
	var mobile_add_tags = function(){
		$('#mobile-spacer').css({'display':'block'});
		myvalue =  function()
		{
			value = mobile_tags.value;
		}
		console.log(mobile_field.value);
		myvalue();
		console.log(value);
		if (value === undefined || value === null)
		{
			console.log('if running');
			value = '';
		}
		mobile_tags.value = (value + mobile_field.value + "|");
		var new_tag = "<span class='tag'>" + mobile_field.value + "</span>";
		mobile_tag_div.innerHTML += new_tag;
		mobile_field.value = "";

	}
	var cancel_premium = function()
	{
		$('#mobile_input_price').val('5');
		$('#upload_price_mobile').css({'display':'none'});
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
	var show_price_mobile = function()
	{

		console.log('showprice function');
		premium_mobile.attr('checked', true);
		$('#mobile_input_price').val('');
		$('#upload_price_mobile').css({'display':'block'});
	}
	var rotation = 0;
	var rotate_image = function(num)
	{
		console.log(rotation);
		var rotate = num + rotation;
		rotation += num;
		console.log(num);
		$('#upload_preview').rotate(rotate);
		$('#mobile_upload_preview').rotate(rotate);
		if (rotation === 360 || rotation === -360)
		{
			rotation = 0;
		}
		$('#rotate').val(rotation);
		$('#mobile-rotate').val(rotation);
	}
	var runThat = function(e){
		if (e.keyCode == 13)
		{
			console.log('running');
			e.preventDefault();
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
	}
	function readURL(input) {

    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#upload_preview').attr('src', e.target.result);
            $('#upload_preview').attr('style','display:block');
            $('#mobile_upload_preview').attr('src', e.target.result);
            $('#mobile_upload_preview').attr('style','display:block');
            $('#mobile_upload_preview').css({'margin':"0 auto"});
            var height = $('#mobile_upload_preview').height();
            $('#mobile_upload_preview_holder').css({"height":height});
            		$('.image-controls').css({'display':'block'});
            		$('.mobile-image-controls').css({'display':'block'});
        }

        reader.readAsDataURL(input.files[0]);
    }

}
	$("#image_file").change(function(){
    	readURL(this);
	});
	$('#mobile_image_file').change(function(){
		readURL(this);
	})
	$(field).on('keypress', runThat);
	button.on('click', add_tags);
	$('#mobile_add_tag').on('touchstart', mobile_add_tags);
	$(premium).on('click', show_price);
	$('#premium-label').on('touchstart', show_price_mobile);
	$(premium_cancel).on('touchstart', cancel_premium);
	$('#clockwise').on('click', function(){
		rotate_image(90);
		});
	$('#counterclockwise').on('click', function(){
		rotate_image(-90);
	})
	$('#mobile-counterclockwise').on('touchstart', function(){
		rotate_image(-90);
	})
	$('#mobile-clockwise').on('touchstart', function(){
		rotate_image(90);
	})
})