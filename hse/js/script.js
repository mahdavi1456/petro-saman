$(document).ready(function(){
	
	$(document.body).on('change', '.hse_rating' ,function(){
		var h_id = $(this).data('h_id');
		var u_id = $(this).data('u_id');
		var hr_date = $(this).data('hr_date');
		if ($(this).is(":checked")){
			var hr_rate = 1;
		}else{
			var hr_rate = 0;
		}
		$.post("back.php", {hse_rating_submit:1, h_id:h_id, u_id:u_id, hr_date:hr_date, hr_rate:hr_rate}, function(){});
	});
	
});