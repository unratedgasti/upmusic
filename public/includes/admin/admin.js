$('.select2').select2({
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
			text: "Record will be added/updated",
			type: "warning",
			showCancelButton: true,
			confirmButtonColor: "#DD6B55",
			confirmButtonText: "Yes, Save it!",
			closeOnConfirm: false
		}, function(isConfirm){
			if (isConfirm) form.submit();
		});
	}
});

$('#btn-add').on('click',function(e){
	e.preventDefault();
	var form = $(this).parents('form');
	var formElements = new Array();
	var valid=1;
	var pass= $('#password').val();
	var conpass= $('#confirm-pass').val();
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

	if(pass!=conpass)
	{
		$('#password').css( "border-color", "red")
		$('#confirm-pass').css( "border-color", "red")
		valid=0;
	}
	if(valid==1)
	{
		swal({
			title: "Are you sure?",
			text: "You want to add another user",
			type: "warning",
			showCancelButton: true,
			confirmButtonColor: "#DD6B55",
			confirmButtonText: "Yes",
			closeOnConfirm: false
		}, function(isConfirm){
			if (isConfirm) form.submit();
		});
	}
});


$('#search_btn_materials').click(function(){
	keyword = $('#search').val();        
	location.href = "view?list=all&q="+keyword;
});

$('#search_btn_authors').click(function(){
	keyword = $('#search').val();        
	location.href = "view?list=all&q="+keyword;
});

$('#search_btn_subjects').click(function(){
	keyword = $('#search').val();        
	location.href = "view?list=all&q="+keyword;
});

$('#search_btn_containertypes').click(function(){
	keyword = $('#search').val();        
	location.href = "view?list=all&q="+keyword;
});

$('#search_btn_materialcategories').click(function(){
	keyword = $('#search').val();        
	location.href = "view?list=all&q="+keyword;
});