$(document).ready(function() {

	$("#send_comment").click(function(){
		var name = $('#ho_ten').val();
		var phone = $('#phone_cmt').val();
		var message = $('#comment').val();
		var idTT = $('#idTT').val();
		var idLoai = $('#idLoai').val();
		var parentId = 0;
		
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
					idTT: idTT,
					idLoai: idLoai,
					parentId: parentId
				},
				success: function(data){
					if(data != '')
						alert(data);
				}
			});
		}
	});	

	$(".reply").each(function(){
		$(this).click(function(){
			var parentId = $(this).attr('id');

			$(".box_rep").css('display','none');
			$("#box_rep_"+parentId).css('display','block');

			$("#box_rep_"+parentId + " a").click(function(){
				var name = $("#box_rep_"+parentId +' input').val();
				var message = $("#box_rep_"+parentId + " textarea").val();
				var idTT = $('#idTT').val();
				var idLoai = $('#idLoai').val();
				
				if(name == '' || message == ''){
					alert('Bạn chưa nhập đủ thông tin');
				}else{

					$.ajax({
						url:'index.php?nameCtr=SingleController&action=storeComment',
						type: 'post',
						typeData: 'json',
						data: {
							name: name,
							phone: 0,
							message: message,
							idTT: idTT,
							idLoai: idLoai,
							parentId: parentId
						},
						success: function(data){
							if(data == 'true'){
								console.log(data);
								appendHTML(parentId, name, message);
							}
						}
					});
				}
				$("#box_rep_"+parentId +' input').val('');
				$("#box_rep_"+parentId + " textarea").val('');
				$(".box_rep").css('display','none');
			});
		});
	});
});

function appendHTML(parentId, name, message){
	var t= '';
	t += '<div class="message_child">';
	t += '<img src="images/profile.png">';
	t += '<div class="right_mess">';
	t += '<h2>'+name+'</h2>';
	t += '<p>'+message+'</p>';
	t += '</div>';
	t += '</div>';

	$("#list_message_child_"+parentId).append(t);
}