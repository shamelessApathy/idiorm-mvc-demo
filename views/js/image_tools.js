$(function(){
	console.log('loading image_tools.js');
	var ImageTools = function()
	{
		this.init = function()
		{
			this.canvas = document.getElementById('ie-canvas');
			this.button_upload = document.getElementById('ie-upload');
			this.hidden_input = document.getElementById('ie-file-input');
		}
		this.listeners = function()
		{
			$(this.button_upload).on('click', function(){
				console.log('running click loop');
				this.show_file_input();
			}.bind(this))
		}
		this.show_file_input = function()
		{
			console.log('running hsow_file_input ');
			$(this.hidden_input).css({"visibility":"visible"});
		}
		this.init();
		this.listeners();
	}
	var newTools = new ImageTools();
})