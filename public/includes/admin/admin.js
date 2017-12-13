$('.select2').select2({
	placeholder: 'Select an option'
});

$('#btn-submit').on('click',function(e){
	e.preventDefault();
	var form = $(this).parents('form');
	var formElements = new Array();
	var valid=1;
	$("form :input[required]").each(function(){
		formElements.push($(this).attr('id'));
	});
	jQuery.each( formElements, function( i, val ) {
		if($('#'+val).val()=='' ||  $('#'+val).val()==null)
		{
			if($('#'+val).prop('type')=='select-one')
			{
				$('#'+val).next().find("[aria-labelledby='select2-"+val+"-container']").css( "border-color", "red")
			}
			$('#'+val).css( "border-color", "red")
			$('#notif').css({"display":"block"})
			valid=0;
		}
		else
		{
			if($('#'+val).prop('type')=='select-one')
			{
				$('#'+val).next().find("[aria-labelledby='select2-"+val+"-container']").css( "border-color", "#aaa")
			}
			$('#'+val).css( "border-color", "#aaa")
		}
		
	});
if(valid==1)
{
	swal({
		title: "Are you sure?",
		text: "You will not be able to recover this imaginary file!",
		type: "warning",
		showCancelButton: true,
		confirmButtonColor: "#DD6B55",
		confirmButtonText: "Yes, delete it!",
		closeOnConfirm: false
	}, function(isConfirm){
		if (isConfirm) form.submit();
	});
}
});