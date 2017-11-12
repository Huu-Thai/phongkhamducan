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
				if(data.length > 0){
					$('.list_sick_depart').empty();
					data.forEach(function(value){

						appendHtml(value);
					});
				}
						
			}
		});
	});
});

function appendHtml(value){
	var t = '';

	t += '<div class="clear20"></div>';
	t += '<div class="sick_depart">';
	t += '<img src="'+value.UrlHinh+'" alt="'+value.Title+'">';
	t += '<div>';
	t += '<h2>'+value.Title+'</h2>';
	t += '<p>'+value.TomTat+'</p>';
	t += '</div>';
	t += '<div class="hu_xemthem">';
	t += '<a href="index.php?nameCtr=SingleController&action=showPost&idTT='+value.idTT+'" title="Xem them">Xem chi tiết...</a>';
	t += '</div>';
	t += '</div>';

	$('.list_sick_depart').append(t);
}