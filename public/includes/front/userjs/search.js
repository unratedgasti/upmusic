/*$('#search_code_button').on('click',function(e){
	e.preventDefault();
	var author = $('#search_author');	
	var errormessage = $('#errorcode');
	$('#errorcode').html('');
	if(author.val() == ""){
		$('.alert-danger').removeClass('hidden');
		errormessage.html('Code is required.');
	}else{
		$.ajax({
			type:"POST",
			url:$('#methodroute').val(),
			data:{author:author.val(),'_token':$('meta[name="csrf-token"]').attr('content')},
			beforeSend: function(){

			},
			success:function(data){
				alert(data);
			}

		});
	}

});

*/


$('#search_author_ad').on('change',function(){
		
		alert($(this).val());
	if($(this).val()){
	}else{

				$.ajax({
			type:"POST",
			url:$('#methodroute').val(),
			data:{author:$(this).val(),'_token':$('meta[name="csrf-token"]').attr('content')},
			beforeSend: function(){

			},
			success:function(data){
				alert(data);
			}

		});
	}
})


$('#advance').on('click',function(e){
	e.preventDefault();
	$('#searchnorm').fadeOut('slow');
	$('#searchnorm').addClass('hidden');
	$('#searchad').fadeIn('slow');
	$('#searchad').removeClass('hidden');
});

$('#normal').on('click',function(e){
	e.preventDefault();
	$('#searchad').fadeOut('slow');
	$('#searchad').addClass('hidden');
	$('#searchnorm').fadeIn('slow');
	$('#searchnorm').removeClass('hidden');
});