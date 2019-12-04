<?php
require_once"../includes.php";
require_once"functions.php";
if(isset($_POST['get_st_id'])){
	$fb_id = $_POST['fb_id'];
	$sql = "select st_id from factor_buy fb inner join factor_buy_body fbb on fb.f_id = fbb.f_id where fbb.fb_id = $fb_id";
	$st_id = get_var_query($sql);
	?><option value="<?php echo $st_id; ?>"><?php echo get_storage_name($st_id); ?></option><?php
	exit();
}
?>