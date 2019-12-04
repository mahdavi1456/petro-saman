<?php
require_once"../../includes.php";
require_once"../functions.php";
if(isset($_POST['prl_send'])){
	$array = array();
	if ( isset($_POST["prl_uid"]) && $_POST["prl_uid"] != "" && isset($_POST["prl_month"]) && $_POST["prl_month"] != "" && isset($_POST["prl_monthly_right"]) && $_POST["prl_monthly_right"] != "" && isset($_POST["prl_bon"]) && $_POST["prl_bon"] != "" && isset($_POST["prl_home_right"]) && $_POST["prl_home_right"] != "" && isset($_POST["prl_child_right"]) && $_POST["prl_child_right"] != "" && isset($_POST["prl_overtime_right"]) && $_POST["prl_overtime_right"] != "" && isset($_POST["prl_penalty"]) && $_POST["prl_penalty"] != "" && isset($_POST["prl_shift_right"]) && $_POST["prl_shift_right"] != "" && isset($_POST["prl_night_work_right"]) && $_POST["prl_night_work_right"] != "" && isset($_POST["prl_traffic"]) && $_POST["prl_traffic"] != "" && isset($_POST["prl_total_income"]) && $_POST["prl_total_income"] != "" && isset($_POST["prl_insure"]) && $_POST["prl_insure"] != "" && isset($_POST["prl_tax"]) && $_POST["prl_tax"] != "" && isset($_POST["prl_help"]) && $_POST["prl_help"] != "" && isset($_POST["prl_debt"]) && $_POST["prl_debt"] != "" && isset($_POST["prl_deficit"]) && $_POST["prl_deficit"] != "" && isset($_POST["prl_saving"]) && $_POST["prl_saving"] != "" && isset($_POST["prl_other"]) && $_POST["prl_other"] != "" && isset($_POST["prl_modifier"]) && $_POST["prl_modifier"] != "" && isset($_POST["prl_total_expends"]) && $_POST["prl_total_expends"] != "" && isset($_POST["prl_total"]) && $_POST["prl_total"] != "" && isset($_POST["prl_date"]) && $_POST["prl_date"] != "" && isset($_POST["prl_overtime_hours"]) && $_POST["prl_overtime_hours"] != "" ) {

		array_push($array, $_POST["prl_uid"]);
		array_push($array, $_POST["prl_month"]);
		array_push($array, $_POST["prl_monthly_right"]);
		array_push($array, $_POST["prl_bon"]);
		array_push($array, $_POST["prl_home_right"]);
		array_push($array, $_POST["prl_child_right"]);
		array_push($array, $_POST["prl_overtime_right"]);
		array_push($array, $_POST["prl_penalty"]);
		array_push($array, $_POST["prl_shift_right"]);
		array_push($array, $_POST["prl_night_work_right"]);
		array_push($array, $_POST["prl_traffic"]);
		array_push($array, $_POST["prl_total_income"]);
		array_push($array, $_POST["prl_insure"]);
		array_push($array, $_POST["prl_tax"]);
		array_push($array, $_POST["prl_help"]);
		array_push($array, $_POST["prl_debt"]);
		array_push($array, $_POST["prl_deficit"]);
		array_push($array, $_POST["prl_saving"]);
		array_push($array, $_POST["prl_other"]);
		array_push($array, $_POST["prl_modifier"]);
		array_push($array, $_POST["prl_total_expends"]);
		array_push($array, $_POST["prl_total"]);
		array_push($array, $_POST["prl_date"]);
		array_push($array, $_POST["prl_overtime_hours"]);

		$res = insert_payroll($array);
		echo "عملیات با موفقیت انجام شد.";
	} else {
		echo "ابتدا اطلاعات کاربر در بخش 'لیست کاربران'\n و سپس اطلاعات حقوقی در بخش 'محاسبه حقوق' را تکمیل کنید.\n با تشکر.";
	}

	exit();
}