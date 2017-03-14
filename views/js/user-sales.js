// The only point of this script is to show and hide sales tables based on which button is clicked

$(function(){
	console.log('this might work?');

	var cashButton =  document.getElementById('cash-sales');
	var subButton = document.getElementById('sub-sales');

	var cashTable = document.getElementById('cash-table');
	var subTable = document.getElementById('sub-table');


	$(cashButton).on('click', function(){
		if ($(cashTable).css("display") == "block")
		{
			$(cashTable).css({"display":"none"});
		}
		else
		{
			$(cashTable).css({"display":"block"});
		}
	})

	$(subButton).on('click', function(){
		if ($(subTable).css("display") == "block")
		{
			$(subTable).css({"display":"none"});
		}
		else
		{
			$(subTable).css({"display":"block"});
		}
	})

})
