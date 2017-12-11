$('#search_code_button').on('click',function(e){
	e.preventDefault();
	var code = $('#search_code');
	var errormessage = $('#errorcode');
	$('#errorcode').html('');
	if(code.val() == ""){
		$('.alert-danger').removeClass('hidden');
		errormessage.html('Code is required.');
	}else{
		$.ajax({
			type:"POST",
			url:$('#methodroute').val(),
			data:{code:code.val(),'_token':$('meta[name="csrf-token"]').attr('content')},
			beforeSend: function(){

			},
			success:function(data){
				alert(data);
			}

		});
	}

});