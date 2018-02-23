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
			$(this.form).on('change', function(e){
				console.log('it changed');
				var files = $('#batch-file').prop("files")
				var names = $.map(files, function(val) { return val.name; });
				this.previewBatch(files);

			}.bind(this));
		}
		this.dataURL = function(file)
		{
			var reader = new FileReader();
			var src;
			reader.onload = function(file)
			{
				var source = file.currentTarget.result;
				$('.batch-upload-card-holder').append('<div class="batch-upload-card"><br><div class="batch-img-holder"><img style="max-width:100%;" src="'+source+'" /></div><div class="batch-image-info"></div></div>');
			}
			var dataURL = reader.readAsDataURL(file);
		}
		this.previewBatch = function(list)
		{
			var cards = document.getElementsByClassName('batch-upload-card');
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