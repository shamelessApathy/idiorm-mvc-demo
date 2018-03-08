$(function(){
	console.log('made it to batch script');

	var BatchUpload = function(){
		this.init = function()
		{
			this.form = $('#test-batch');
			this.file_input = document.getElementById('batch-file');
		}
		this.listen = function()
		{
			$('#batch-upload-iframe').on('load',this.findInfo);
			console.log('listeners active');
		}.bind(this)
		this.findInfo = function()
		{
			var cardTemplate = $('.card-template');
			console.log(cardTemplate);
			var iframe = document.getElementById('batch-upload-iframe');
			var doc = $(iframe).contents();
			var return_data = $(doc).children().children()[1];
			var body = return_data.innerHTML;
			var return_final = JSON.parse(body);
			var card_holder = document.getElementById('files');
			console.log(return_final);
			for (var i = 0; i < return_final.length; i++)
			{
				var template = $(cardTemplate).clone();
				var path = return_final[i]['path'];
				var thumbnail = $(template).find('.batch-thumbnail');
				console.log(path);
				console.log('template: ' + template);
				console.log('thumbnail: ' + thumbnail);
				//
				$(thumbnail).attr('src', path);
				$(card_holder).append(template);
			}
			var category_json_holder = document.getElementById('json-categories');
			var cats = $(category_json_holder).html();
			var decoded = JSON.parse(cats);
			console.log(decoded);
			var final_button = document.getElementById('final-cut-button');
			var first_button = document.getElementById('first-submit');
			first_button.classList.add('invisible');
			final_button.classList.remove('invisible');
		}
		this.init();
		this.listen();
	} 
	var upload = new BatchUpload();
});