$(document).ready(function() {

	$("#send_comment").click(function(){
		var name = $('#ho_ten').val();
		var phone = $('#phone_cmt').val();
		var message = $('#comment').val();
		var idTT = $('#idTT').val();
		
		if(name == '' || phone == '' || message == ''){
			alert('Bạn chưa nhập đầy đủ thông tin');
		}else{

			$.ajax({
				url:'index.php?nameCtr=SingleController&action=storeComment',
				type: 'post',
				typeData: 'json',
				data: {
					name: name,
					phone: phone,
					message: message,
					idTT: idTT
				},
				success: function(data){
					if(data != '')
						alert(data);
				}
			});
		}
	});	
});