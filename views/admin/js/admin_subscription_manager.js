$(function(){
	var parents = document.getElementsByClassName('more-button');
	console.log(parents);
	var run = function(e){
		target = e.target;
		parent = target.parentElement.parentElement;
		hidden = parent.getElementsByClassName('sub-hidden')[0];
		$(hidden).css({'display':'block'});
		console.log(parent);
	}
	for (i =0; i < parents.length; i++)
	{
		$(parents[i]).on('click', run);
	}
})