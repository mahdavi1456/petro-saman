$(document).ready(function(){

	$(document.body).on('click', '#payroll_send' ,function(){
		var r = confirm("صدور فیش حقوق. آیا مطمین هستید؟");
		if (r == true) {
			var prl_rows = $("#prl_rows").val();
			for (var i = 1; i <= prl_rows; i++) {
				var prl_uid = $("#prl_uid" + i).val();
		    	var prl_month = $("#prl_month" + i).val();
		    	var prl_monthly_right = $("#prl_monthly_right" + i).val();
		    	var prl_bon = $("#prl_bon" + i).val();
		    	var prl_home_right = $("#prl_home_right" + i).val();
		    	var prl_child_right = $("#prl_child_right" + i).val();
		    	var prl_overtime_hours = $("#prl_overtime_hours" + i).val();
		    	var prl_overtime_right = $("#prl_overtime_right" + i).val();
		    	var prl_penalty = $("#prl_penalty" + i).val();
		    	var prl_shift_right = $("#prl_shift_right" + i).val();
		    	var prl_night_work_right = $("#prl_night_work_right" + i).val();
		    	var prl_traffic = $("#prl_traffic" + i).val();
		    	var prl_total_income = $("#prl_total_income" + i).val();
		    	var prl_insure = $("#prl_insure" + i).val();
		    	var prl_tax = $("#prl_tax" + i).val();
		    	var prl_help = $("#prl_help" + i).val();
		    	var prl_debt = $("#prl_debt" + i).val();
		    	var prl_deficit = $("#prl_deficit" + i).val();
		    	var prl_saving = $("#prl_saving" + i).val();
		    	var prl_other = $("#prl_other" + i).val();
		    	var prl_modifier = $("#prl_modifier" + i).val();
		    	var prl_total_expends = $("#prl_total_expends" + i).val();
		    	var prl_total = $("#prl_total" + i).val();
		    	var prl_date = $("#prl_date").val();
		    	var url = $("#prl_url_container").val();
		    	$.post(
					url,
					{prl_send:1, prl_uid:prl_uid, prl_month:prl_month, prl_monthly_right:prl_monthly_right, prl_bon:prl_bon, prl_home_right:prl_home_right, prl_child_right:prl_child_right, prl_overtime_hours:prl_overtime_hours, prl_overtime_right:prl_overtime_right, prl_penalty:prl_penalty, prl_shift_right:prl_shift_right, prl_night_work_right:prl_night_work_right, prl_traffic:prl_traffic, prl_total_income:prl_total_income, prl_insure:prl_insure, prl_tax:prl_tax, prl_help:prl_help, prl_debt:prl_debt, prl_deficit:prl_deficit, prl_saving:prl_saving, prl_other:prl_other, prl_modifier:prl_modifier, prl_total_expends:prl_total_expends, prl_total:prl_total, prl_date:prl_date},
					function(data){
						alert(data);
						if(data != "ابتدا اطلاعات کاربر در بخش 'لیست کاربران'\n و سپس اطلاعات حقوقی در بخش 'محاسبه حقوق' را تکمیل کنید.\n با تشکر."){
							location.reload();
						}
					}
				);
			}
	  	}
	});

	$('#raw_rights_printer').on('click', function() {
	  	$.print('#raw_rights_print');
	});

	$('#rights_printer').on('click', function() {
	  	$.print('#rights_print');
	});

	$('#payrol_printer').on('click', function() {
	  	$.print('#payrol_print');
	});

});