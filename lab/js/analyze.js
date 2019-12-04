$(document).ready(function(){
	$('#printer_lab_table').click(function(){
		$.print('#print_lab_table');
	});
	$(".date_picker_class").persianDatepicker();

	$('#an_full_weight').on('keyup',function(){
	    var an_full_weight = $('#an_full_weight').val();
	    var an_empty_weight = $('#an_empty_weight').val();
	    var am_full_weight = an_full_weight - an_empty_weight;
	    $('#am_full_weight').val(Math.round(am_full_weight * 10000) / 10000);
	});
	$('#an_empty_weight').on('keyup',function(){
	    var an_full_weight = $('#an_full_weight').val();
	    var an_empty_weight = $('#an_empty_weight').val();
	    var am_full_weight = an_full_weight - an_empty_weight;
	    $('#am_full_weight').val(Math.round(am_full_weight * 10000) / 10000);
	});

	$('#hb_full_weight').on('keyup',function(){
	    var hb_full_weight = $('#hb_full_weight').val();
	    var hb_empty_weight = $('#hb_empty_weight').val();
	    var hm_pure_weight = hb_full_weight - hb_empty_weight;
	    $('#hm_pure_weight').val(Math.round(hm_pure_weight * 10000) / 10000);
	});
	$('#hb_empty_weight').on('keyup',function(){
	    var hb_full_weight = $('#hb_full_weight').val();
	    var hb_empty_weight = $('#hb_empty_weight').val();
	    var hm_pure_weight = hb_full_weight - hb_empty_weight;
	    $('#hm_pure_weight').val(Math.round(hm_pure_weight * 10000) / 10000);
	});

	$('#ec_full_weight').on('keyup',function(){
	    var ec_full_weight = $('#ec_full_weight').val();
	    var ec_empty_weight = $('#ec_empty_weight').val();
	    var em_pure_weight = ec_full_weight - ec_empty_weight;
	    $('#em_pure_weight').val(Math.round(em_pure_weight * 10000) / 10000);
	});
	$('#ec_empty_weight').on('keyup',function(){
	    var ec_full_weight = $('#ec_full_weight').val();
	    var ec_empty_weight = $('#ec_empty_weight').val();
	    var em_pure_weight = ec_full_weight - ec_empty_weight;
	    $('#em_pure_weight').val(Math.round(em_pure_weight * 10000) / 10000);
	});

	$('#am_full_weight').on('keyup',function(){
	    var am_full_weight = $('#am_full_weight').val();
	    var am_empty_weight = $('#am_empty_weight').val();
	    var ash_percent = ( am_full_weight / am_empty_weight ) * 100;
	    $('#ash_percent').val(Math.round(ash_percent * 10000) / 10000);
	});
	$('#am_empty_weight').on('keyup',function(){
	    var am_full_weight = $('#am_full_weight').val();
	    var am_empty_weight = $('#am_empty_weight').val();
	    var ash_percent = ( am_full_weight / am_empty_weight ) * 100;
	    $('#ash_percent').val(Math.round(ash_percent * 10000) / 10000);
	});
	$('#an_empty_weight').on('keyup',function(){
	    var am_full_weight = $('#am_full_weight').val();
	    var am_empty_weight = $('#am_empty_weight').val();
	    var ash_percent = ( am_full_weight / am_empty_weight ) * 100;
	    $('#ash_percent').val(Math.round(ash_percent * 10000) / 10000);
	});
	$('#an_full_weight').on('keyup',function(){
	    var am_full_weight = $('#am_full_weight').val();
	    var am_empty_weight = $('#am_empty_weight').val();
	    var ash_percent = ( am_full_weight / am_empty_weight ) * 100;
	    $('#ash_percent').val(Math.round(ash_percent * 10000) / 10000);
	});

	$('#hm_pure_weight').on('keyup',function(){
	    var hm_pure_weight = $('#hm_pure_weight').val();
	    var hm_empty_weight = $('#hm_empty_weight').val();
	    var humidity_percent = 100 - ( ( hm_pure_weight / hm_empty_weight ) * 100 );
	    $('#humidity_percent').val(Math.round(humidity_percent * 10000) / 10000);
	});
	$('#hm_empty_weight').on('keyup',function(){
	    var hm_pure_weight = $('#hm_pure_weight').val();
	    var hm_empty_weight = $('#hm_empty_weight').val();
	    var humidity_percent = 100 - ( ( hm_pure_weight / hm_empty_weight ) * 100 );
	    $('#humidity_percent').val(Math.round(humidity_percent * 10000) / 10000);
	});
	$('#hb_empty_weight').on('keyup',function(){
	    var hm_pure_weight = $('#hm_pure_weight').val();
	    var hm_empty_weight = $('#hm_empty_weight').val();
	    var humidity_percent = 100 - ( ( hm_pure_weight / hm_empty_weight ) * 100 );
	    $('#humidity_percent').val(Math.round(humidity_percent * 10000) / 10000);
	});
	$('#hb_full_weight').on('keyup',function(){
	    var hm_pure_weight = $('#hm_pure_weight').val();
	    var hm_empty_weight = $('#hm_empty_weight').val();
	    var humidity_percent = 100 - ( ( hm_pure_weight / hm_empty_weight ) * 100 );
	    $('#humidity_percent').val(Math.round(humidity_percent * 10000) / 10000);
	});

	$('#em_pure_weight').on('keyup',function(){
	    var em_pure_weight = $('#em_pure_weight').val();
	    var em_empty_weight = $('#em_empty_weight').val();
		var ash_percent = $('#ash_percent').val();
		var escape_percent = 100 - ( ( em_pure_weight / em_empty_weight ) * 100 );
	    //var escape_percent = 100 - ( ( ( em_pure_weight - ash_percent/100 ) / em_empty_weight ) * 100 );
	    $('#escape_percent').val(Math.round(escape_percent * 10000) / 10000);
	});
	$('#em_empty_weight').on('keyup',function(){
	    var em_pure_weight = $('#em_pure_weight').val();
	    var em_empty_weight = $('#em_empty_weight').val();
		var ash_percent = $('#ash_percent').val();
		var escape_percent = 100 - ( ( em_pure_weight / em_empty_weight ) * 100 );
   		//var escape_percent = 100 - ( ( ( em_pure_weight - ash_percent/100 ) / em_empty_weight ) * 100 );
	    $('#escape_percent').val(Math.round(escape_percent * 10000) / 10000);
	});
	$('#ec_full_weight').on('keyup',function(){
	    var em_pure_weight = $('#em_pure_weight').val();
	    var em_empty_weight = $('#em_empty_weight').val();
		var ash_percent = $('#ash_percent').val();
		var escape_percent = 100 - ( ( em_pure_weight / em_empty_weight ) * 100 );
	    //var escape_percent = 100 - ( ( ( em_pure_weight - ash_percent/100 ) / em_empty_weight ) * 100 );
	    $('#escape_percent').val(Math.round(escape_percent * 10000) / 10000);
	});
	$('#ec_empty_weight').on('keyup',function(){
	    var em_pure_weight = $('#em_pure_weight').val();
	    var em_empty_weight = $('#em_empty_weight').val();
		var ash_percent = $('#ash_percent').val();
		var escape_percent = 100 - ( ( em_pure_weight / em_empty_weight ) * 100 );
	    //var escape_percent = 100 - ( ( ( em_pure_weight - ash_percent/100 ) / em_empty_weight ) * 100 );
	    $('#escape_percent').val(Math.round(escape_percent * 10000) / 10000);
	});
	$('#ash_percent').on('keyup',function(){
	    var em_pure_weight = $('#em_pure_weight').val();
	    var em_empty_weight = $('#em_empty_weight').val();
		var ash_percent = $('#ash_percent').val();
		var escape_percent = 100 - ( ( em_pure_weight / em_empty_weight ) * 100 );
	    //var escape_percent = 100 - ( ( ( em_pure_weight - ash_percent/100 ) / em_empty_weight ) * 100 );
	    $('#escape_percent').val(Math.round(escape_percent * 10000) / 10000);
	});
	$('#an_full_weight').on('keyup',function(){
	    var em_pure_weight = $('#em_pure_weight').val();
	    var em_empty_weight = $('#em_empty_weight').val();
		var ash_percent = $('#ash_percent').val();
		var escape_percent = 100 - ( ( em_pure_weight / em_empty_weight ) * 100 );
	    //var escape_percent = 100 - ( ( ( em_pure_weight - ash_percent/100 ) / em_empty_weight ) * 100 );
	    $('#escape_percent').val(Math.round(escape_percent * 10000) / 10000);
	});
	$('#an_empty_weight').on('keyup',function(){
	    var em_pure_weight = $('#em_pure_weight').val();
	    var em_empty_weight = $('#em_empty_weight').val();
		var ash_percent = $('#ash_percent').val();
		var escape_percent = 100 - ( ( em_pure_weight / em_empty_weight ) * 100 );
	    //var escape_percent = 100 - ( ( ( em_pure_weight - ash_percent/100 ) / em_empty_weight ) * 100 );
	    $('#escape_percent').val(Math.round(escape_percent * 10000) / 10000);
	});
	$('#am_empty_weight').on('keyup',function(){
	    var em_pure_weight = $('#em_pure_weight').val();
	    var em_empty_weight = $('#em_empty_weight').val();
		var ash_percent = $('#ash_percent').val();
		var escape_percent = 100 - ( ( em_pure_weight / em_empty_weight ) * 100 );
	    //var escape_percent = 100 - ( ( ( em_pure_weight - ash_percent/100 ) / em_empty_weight ) * 100 );
	    $('#escape_percent').val(Math.round(escape_percent * 10000) / 10000);
	});

	$('#ash_percent').on('keyup',function(){
	    var ash_percent = $('#ash_percent').val();
	    var humidity_percent = $('#humidity_percent').val();
	    var escape_percent = $('#escape_percent').val();
	    var carbon_percent = 100 - ash_percent - humidity_percent - escape_percent;
	    $('#carbon_percent').val(Math.round(carbon_percent * 10000) / 10000);
	});
	$('#humidity_percent').on('keyup',function(){
	    var ash_percent = $('#ash_percent').val();
	    var humidity_percent = $('#humidity_percent').val();
	    var escape_percent = $('#escape_percent').val();
	    var carbon_percent = 100 - ash_percent - humidity_percent - escape_percent;
	    $('#carbon_percent').val(Math.round(carbon_percent * 10000) / 10000);
	});
	$('#escape_percent').on('keyup',function(){
	    var ash_percent = $('#ash_percent').val();
	    var humidity_percent = $('#humidity_percent').val();
	    var escape_percent = $('#escape_percent').val();
	    var carbon_percent = 100 - ash_percent - humidity_percent - escape_percent;
	    $('#carbon_percent').val(Math.round(carbon_percent * 10000) / 10000);
	});
	$('#an_empty_weight').on('keyup',function(){
	    var ash_percent = $('#ash_percent').val();
	    var humidity_percent = $('#humidity_percent').val();
	    var escape_percent = $('#escape_percent').val();
	    var carbon_percent = 100 - ash_percent - humidity_percent - escape_percent;
	    $('#carbon_percent').val(Math.round(carbon_percent * 10000) / 10000);
	});
	$('#an_full_weight').on('keyup',function(){
	    var ash_percent = $('#ash_percent').val();
	    var humidity_percent = $('#humidity_percent').val();
	    var escape_percent = $('#escape_percent').val();
	    var carbon_percent = 100 - ash_percent - humidity_percent - escape_percent;
	    $('#carbon_percent').val(Math.round(carbon_percent * 10000) / 10000);
	});
	$('#am_full_weight').on('keyup',function(){
	    var ash_percent = $('#ash_percent').val();
	    var humidity_percent = $('#humidity_percent').val();
	    var escape_percent = $('#escape_percent').val();
	    var carbon_percent = 100 - ash_percent - humidity_percent - escape_percent;
	    $('#carbon_percent').val(Math.round(carbon_percent * 10000) / 10000);
	});
	$('#am_empty_weight').on('keyup',function(){
	    var ash_percent = $('#ash_percent').val();
	    var humidity_percent = $('#humidity_percent').val();
	    var escape_percent = $('#escape_percent').val();
	    var carbon_percent = 100 - ash_percent - humidity_percent - escape_percent;
	    $('#carbon_percent').val(Math.round(carbon_percent * 10000) / 10000);
	});
	$('#hb_empty_weight').on('keyup',function(){
	    var ash_percent = $('#ash_percent').val();
	    var humidity_percent = $('#humidity_percent').val();
	    var escape_percent = $('#escape_percent').val();
	    var carbon_percent = 100 - ash_percent - humidity_percent - escape_percent;
	    $('#carbon_percent').val(Math.round(carbon_percent * 10000) / 10000);
	});
	$('#hm_empty_weight').on('keyup',function(){
	    var ash_percent = $('#ash_percent').val();
	    var humidity_percent = $('#humidity_percent').val();
	    var escape_percent = $('#escape_percent').val();
	    var carbon_percent = 100 - ash_percent - humidity_percent - escape_percent;
	    $('#carbon_percent').val(Math.round(carbon_percent * 10000) / 10000);
	});
	$('#hb_full_weight').on('keyup',function(){
	    var ash_percent = $('#ash_percent').val();
	    var humidity_percent = $('#humidity_percent').val();
	    var escape_percent = $('#escape_percent').val();
	    var carbon_percent = 100 - ash_percent - humidity_percent - escape_percent;
	    $('#carbon_percent').val(Math.round(carbon_percent * 10000) / 10000);
	});
	$('#hm_pure_weight').on('keyup',function(){
	    var ash_percent = $('#ash_percent').val();
	    var humidity_percent = $('#humidity_percent').val();
	    var escape_percent = $('#escape_percent').val();
	    var carbon_percent = 100 - ash_percent - humidity_percent - escape_percent;
	    $('#carbon_percent').val(Math.round(carbon_percent * 10000) / 10000);
	});
	$('#ec_empty_weight').on('keyup',function(){
	    var ash_percent = $('#ash_percent').val();
	    var humidity_percent = $('#humidity_percent').val();
	    var escape_percent = $('#escape_percent').val();
	    var carbon_percent = 100 - ash_percent - humidity_percent - escape_percent;
	    $('#carbon_percent').val(Math.round(carbon_percent * 10000) / 10000);
	});
	$('#em_empty_weight').on('keyup',function(){
	    var ash_percent = $('#ash_percent').val();
	    var humidity_percent = $('#humidity_percent').val();
	    var escape_percent = $('#escape_percent').val();
	    var carbon_percent = 100 - ash_percent - humidity_percent - escape_percent;
	    $('#carbon_percent').val(Math.round(carbon_percent * 10000) / 10000);
	});
	$('#ec_full_weight').on('keyup',function(){
	    var ash_percent = $('#ash_percent').val();
	    var humidity_percent = $('#humidity_percent').val();
	    var escape_percent = $('#escape_percent').val();
	    var carbon_percent = 100 - ash_percent - humidity_percent - escape_percent;
	    $('#carbon_percent').val(Math.round(carbon_percent * 10000) / 10000);
	});
	$('#em_pure_weight').on('keyup',function(){
	    var ash_percent = $('#ash_percent').val();
	    var humidity_percent = $('#humidity_percent').val();
	    var escape_percent = $('#escape_percent').val();
	    var carbon_percent = 100 - ash_percent - humidity_percent - escape_percent;
	    $('#carbon_percent').val(Math.round(carbon_percent * 10000) / 10000);
	});

	$('#gm_less_weight').on('keyup',function(){
	    var gm_less_weight = $('#gm_less_weight').val();
	    var gm_weight = $('#gm_weight').val();
	    var gm_up_percent = gm_less_weight / gm_weight * 100
	    $('#gm_up_percent').val(Math.round(gm_up_percent * 10000) / 10000);
	});
	$('#gm_weight').on('keyup',function(){
	    var gm_less_weight = $('#gm_less_weight').val();
	    var gm_weight = $('#gm_weight').val();
	    var gm_up_percent = gm_less_weight / gm_weight * 100
	    $('#gm_up_percent').val(Math.round(gm_up_percent * 10000) / 10000);
	});

	$('#gm_dot_weight').on('keyup',function(){
	    var gm_dot_weight = $('#gm_dot_weight').val();
	    var gm_weight = $('#gm_weight').val();
	    var gm_area_percent = gm_dot_weight / gm_weight * 100
	    $('#gm_area_percent').val(Math.round(gm_area_percent * 10000) / 10000);
	});
	$('#gm_weight').on('keyup',function(){
	    var gm_dot_weight = $('#gm_dot_weight').val();
	    var gm_weight = $('#gm_weight').val();
	    var gm_area_percent = gm_dot_weight / gm_weight * 100
	    $('#gm_area_percent').val(Math.round(gm_area_percent * 10000) / 10000);
	});

	$('#gm_more_weight').on('keyup',function(){
	    var gm_more_weight = $('#gm_more_weight').val();
	    var gm_weight = $('#gm_weight').val();
	    var gm_down_percent = gm_more_weight / gm_weight * 100
	    $('#gm_down_percent').val(Math.round(gm_down_percent * 10000) / 10000);
	});
	$('#gm_weight').on('keyup',function(){
	    var gm_more_weight = $('#gm_more_weight').val();
	    var gm_weight = $('#gm_weight').val();
	    var gm_down_percent = gm_more_weight / gm_weight * 100
	    $('#gm_down_percent').val(Math.round(gm_down_percent * 10000) / 10000);
	});
});
