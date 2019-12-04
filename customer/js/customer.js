$(document).ready(function(){
	
	$('#c_vat').on('change', function() {
	  	var boolian = $('#c_vat').find(":selected").val();
		if(boolian=='no'){
			$("#vatdate").css("display" , "none");
			}else {
			$("#vatdate").css("display" , "inline-block");
		}
	});
	
	
	$("#person_select").change(function(){
		var val = $('#person_select').find(":selected").val();
		if(val =='real_person' ){
			$("#form2").css("display" , "none");
			$("#form1").css("display" , "block");
		}
		else if(val=='legal_person'){
			$("#form1").css("display" , "none");
			$("#form2").css("display" , "block");
		}
	});
	
});