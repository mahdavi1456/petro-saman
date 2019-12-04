$(document).ready(function(){
	
	$(document.body).on('click', '#hse_rating_submit' ,function(){
		$("#hse_rating input[type='checkbox']").each(function(){
			var h_id = $(this).data('h_id');
			var u_id = $(this).data('u_id');
			var hr_date = $(this).data('hr_date');
			var hr_rate = $(this).val();
			if(hr_rate) hr_rate = 1; else hr_rate = 0;
			$.post("", {hse_rating_submit:1, h_id:h_id, u_id:u_id, hr_date:hr_date, hr_rate:hr_rate}, function(){});
		});
		location.reload();
	});
	
});