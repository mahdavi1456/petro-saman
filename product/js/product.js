$(document).ready(function(){
	$('#c_vat').on('change', function() {
	  	var boolian = $('#c_vat').find(":selected").val();
		if(boolian=='no'){
			$("#vatdate").css("display" , "none");
		}else {
			$("#vatdate").css("display" , "inline-block");
		}
	});
});