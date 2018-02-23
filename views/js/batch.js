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
			console.log('listeners active');
		}
		this.init();
		this.listen();
	}
	var upload = new BatchUpload();
}) 