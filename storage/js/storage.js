$(document).ready(function(){
	$("#close-sub").click(function(){
		$("#tl_submit").click();
	});
	$('#trasfer_form_printer').on('click', function() {
	  	$.print('#trasfer_form_print');
	});

	/*
	$('#fb_id').change(function(){
		var fb_id = $(this).val();
		$.post("back.php", {get_st_id:1, fb_id:fb_id}, function(data){
			$('#st_id_from').html(data);
		});
	});*/

});