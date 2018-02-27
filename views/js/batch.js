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
			console.log(return_final);
		}
		this.init();
		this.listen();
	}
	var upload = new BatchUpload();
}) 