$(document).ready(function(){
	
	$('#c_vat').on('change', function() {
	  	var boolian = $('#c_vat').find(":selected").val();
		if(boolian=='no'){
			$("#vatdate").css("display" , "none");
		}else {
			$("#vatdate").css("display" , "inline-block");
		}
	});
	
	
	$('#cat_id').on('change', function() {
	  	$('#cat_id_result').html("لطفا صبر کنید..");
		var cat_id = $('#cat_id').find(":selected").val();
		var p_id = $('#p_id').find(":selected").val();
		$.post("back.php", {get_product_price:1, p_id:p_id, cat_id:cat_id}, function(data){
			$('#cat_id_result').html(data);
		});
	});
	
	/*
	$('#customer_id').on('change', function() {
		var customer_id = $('#customer_id').find(":selected").val();
		$.post("back.php", {storage_change:1, customer_id:customer_id}, function(data){
			$('#storage_change').html(data);
		});
	});*/
	
});
function calculate() {
	var fb_quantity = document.getElementById('fb_quantity').value; 
	var fb_price = document.getElementById('fb_price').value;
	bresult = fb_quantity * fb_price;
	document.getElementById('total_price').value = bresult;

}