$(function(){
	console.log('test-batch.js loaded');

	$('#image_file').on('change', function(){
		console.log('here it is!! change accepted');
		console.log($('#image_file').val());
	})
})