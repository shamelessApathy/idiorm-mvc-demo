$(function(){
	console.log('running');

	var VotingBooth = function(element){
		this.init = function()
		{
			this.element = element;
			this.up = $(element).find('.up');
			this.down = $(element).find('.down');

			this.tag_id = $(this.up).attr('data-tag-id');
			this.image_id = $('.image_info').attr('data-id');
			this.user_id = $('.user_info').attr('data-user-id');
		}
		this.add_message = function()
		{
			$(this.element).append('Vote successfully cast!');
		}.bind(this)
		this.add_vote = function(e)
		{
			var target = e.target;
			var vote_value = $(target).attr('data-value');
			var data = {'vote': vote_value, 'image_id': this.image_id, 'tag_id': this.tag_id, 'user_id':this.user_id};
			$.ajax({
				url:"/vote/add_vote",
				data: data,
				type: "POST",
				success: function(results){
					console.log(results);
					this.add_message();
				}.bind(this)
			});
			
		}.bind(this)
		this.addListeners = function()
		{
			$(this.up).on('click', this.add_vote);
			$(this.down).on('click', this.add_vote);
		}
		this.init();
		this.addListeners();
	};
	var voteArray = document.getElementsByClassName('vote_control');
	for (var i = 0; i < voteArray.length; i++)
	{
		var vote = new VotingBooth(voteArray[i]);
	}

	$('#report-button').on('click', function(){
		$('.report-image').css({'display':'block'});
	})
})