<?php
require_once"../includes.php";
if(isset($_POST['hse_rating_submit'])){
	$h_id = $_POST['h_id'];
	$u_id = $_POST['u_id'];
	$hr_date = $_POST['hr_date'];
	$hr_rate = $_POST['hr_rate'];
	
	$exists = get_var_query("select count(hr_id) from hse_rates where h_id = $h_id and u_id = $u_id and hr_date = '$hr_date'");
	if($exists){
		ex_query("update hse_rates set hr_rate = $hr_rate where h_id = $h_id and u_id = $u_id and hr_date = '$hr_date'");
	}else{
		ex_query("insert into hse_rates(h_id, u_id, hr_date, hr_rate) values($h_id, $u_id, '$hr_date', $hr_rate)");
	}
	
	exit();
}
?>