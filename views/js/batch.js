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
			$(this.form).on('change', function(){
				console.log('it changed');
				var files = $('#batch-file').prop("files")
				this.previewBatch(files);
				console.log(files);
				var names = $.map(files, function(val) { return val.name; });
				for (var i=0; i < names.length; i++)
				{
					$('#file-names').append(names[i] + "<br>");
				}
			}.bind(this));
		}
		this.dataURL = function(file)
		{
			var reader = new FileReader();
			reader.onload = function(file)
			{
				console.log(file);
			}
			reader.readAsDataURL(file);
		}
		this.previewBatch = function(list)
		{
			for (var i=0; i < list.length; i++)
			{
				this.dataURL(list[i]);
			}
		}.bind(this)
		this.init();
		this.listen();
	}
	var upload = new BatchUpload();
}) 