$(document).ready(function() {
	
	$('.box_search').keyup(function(){
		var keyword = $(this).val();
		$.ajax({
			url: 'index.php?nameCtr=SingleController&action=search',
			type: 'post',
			dataType: 'json',
			data: {
				keyword: keyword
			},
			success: function(data){
				console.log(data);	
			}
		});
	});
});