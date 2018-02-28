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
			var iframe = document.getElementById('batch-upload-iframe');
			var doc = $(iframe).contents();
			var return_data = $(doc).children().children()[1];
			var body = return_data.innerHTML;
			var return_final = JSON.parse(body);
			var card_holder = document.getElementById('files');
			console.log(return_final);
			for ( var i = 0; i < return_final.length; i++)
			{
				var id = return_final[i]['id'];
				var string = "<div class='batch-upload-card' data-id='"+return_final[i]['id']+"''><div class='batch-img-holder'><img style='max-width:100%; max-height:100%;' src='"+return_final[i]['path']+"'/></div><input type='number' name='images["+id+"]' value='"+id+"' HIDDEN/><label>Image Name</label><br><input type='text' name='images["+id+"][name]'/><input type='text' name='images["+id+"][tags]' HIDDEN/><br><label>Tags:</label><br><br><textarea id='tag-input'></textarea><button type='button'>Add Tag</button></div>";
				card_holder.innerHTML += string; 
			}
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