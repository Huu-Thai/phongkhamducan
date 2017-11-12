$('.rating_stars').rating(function(vote, event){
	var idTT = $('input[name="idTT"]').val();
	
	$.ajax({
		url:'index.php?nameCtr=SingleController&action=handleRate',
		type: 'post',
		typeData: 'json',
		data: {
			vote: vote,
			idTT: idTT
		},
		success: function(data){
			console.log(data);
		}
	})
});