<?php
function insert_user($array){
	$u_name = $array[0];
	$u_family = $array[1];
	$u_level = $array[2];
	$u_username = $array[3];
	$u_password = $array[4];
	$u_link = $array[5];
	$sql = "insert into user(u_name, u_family, u_level, u_username, u_password , u_link) values('$u_name', '$u_family', '$u_level', '$u_username', '$u_password' , '$u_link' )";
	$res = ex_query($sql);
	return $res;
}

function update_user($array){
	$u_id = $array[0];
	$u_name = $array[1];
	$u_family = $array[2];
	$u_level = $array[3];
	$u_username = $array[4];
	$u_password = $array[5];
	$u_father = $array[6];
	$u_meli = $array[7];
	$u_birth = $array[8];
	$u_live_city = $array[9];
	$u_destination = $array[10];
	$u_mobile = $array[11];
	$u_tell = $array[12];
	$u_address = $array[13];
	$u_pre = $array[14];
	$u_description = $array[15];
	$u_group = $array[16];
	$u_pcode = $array[17];
	$u_wtype = $array[18];
	$u_marital = $array[19];
	$u_evidence = $array[20];
	$u_child_count = $array[21];
	$u_daily_wage = $array[22];
	$u_fix_right = $array[23];
    $u_fin_contract = $array[24];
    $u_cart = $array[25];
	$u_hesab = $array[26];
	$u_shaba = $array[27];
	$u_birth_city = $array[28];
	$u_cert_number = $array[29];
	$u_cert_city = $array[30];
	$u_start_work = $array[31];
	$u_end_work = $array[32];
	$u_link = $array[33];
	$today = jdate('Y/n/j');
	$chk_gp = get_var_query("select u_group from user where u_id = $u_id");
	if($chk_gp != $u_group){
		ex_query("insert into group_log (u_id,g_id,gl_date) values ($u_id,$chk_gp,'$today')");
	}
    $sql = "update user set u_link = '$u_link' , u_name = '$u_name', u_family = '$u_family', u_level = '$u_level', u_username = '$u_username', u_password = '$u_password', u_father = '$u_father', u_meli = '$u_meli', u_birth = '$u_birth', u_live_city = '$u_live_city', u_destination = '$u_destination', u_mobile = '$u_mobile', u_tell = '$u_tell', u_address = '$u_address', u_pre = '$u_pre', u_group = '$u_group', u_description = '$u_description', u_pcode = '$u_pcode', u_wtype = '$u_wtype', u_marital = '$u_marital', u_evidence = '$u_evidence', u_child_count = '$u_child_count', u_daily_wage = '$u_daily_wage', u_fix_right = '$u_fix_right', u_fin_contract = '$u_fin_contract', u_cart = '$u_cart', u_hesab = '$u_hesab', u_shaba = '$u_shaba', u_birth_city = '$u_birth_city', u_cert_number = '$u_cert_number', u_cert_city = '$u_cert_city', u_start_work = '$u_start_work', u_end_work = '$u_end_work' where u_id = $u_id";
	$res = ex_query($sql);

	return $res;
}

function delete_user($u_id){
	$sql = "delete from user where u_id = $u_id";
	$res = ex_query($sql);
}

function select_a_user($u_id){
	$sql = "select * from user where u_id = $u_id";
	$res = get_select_query($sql);
	return $res;
}

function list_user() {
	$sql = "select * from user";
	$res = get_select_query($sql);
	return $res;
}

function insert_raw_rights($array){
	$rr_uid = $array[0];
	$rr_month = $array[1];
	$rr_work_days = $array[2];
	$rr_overtime_hours = $array[3];
	$rr_child_right_ratio = $array[4];
	$rr_shift = $array[5];
	$rr_night_work_hours = $array[6];
	$sql = "insert into raw_rights(rr_uid, rr_month, rr_work_days, rr_overtime_hours, rr_child_right_ratio, rr_shift, rr_night_work_hours) values($rr_uid, '$rr_month', $rr_work_days, $rr_overtime_hours, $rr_child_right_ratio, $rr_shift, $rr_night_work_hours)";
	$res = ex_query($sql);
	return $res;
}

function list_raw_rights() {
	$sql = "select * from raw_rights";
	$res = get_select_query($sql);
	return $res;
}

function list_raw_rights_joined() {
	$sql = "SELECT * FROM raw_rights rr INNER JOIN user u ON rr.rr_uid = u.u_id";
	$res = get_select_query($sql);
	return $res;
}

function update_raw_rights($array){
	$rr_uid = $array[0];
	$rr_month = $array[1];
	$rr_work_days = $array[2];
	$rr_overtime_hours = $array[3];
	$rr_child_right_ratio = $array[4];
	$rr_shift = $array[5];
	$rr_night_work_hours = $array[6];
	$rr_modifier = $array[7];
	$rr_penalty = $array[8];
	$rr_traffic = $array[9];
	$rr_help = $array[10];
	$rr_debt = $array[11];
	$sql = "update raw_rights set rr_month = '$rr_month', rr_work_days = $rr_work_days, rr_overtime_hours = $rr_overtime_hours, rr_child_right_ratio = $rr_child_right_ratio, rr_shift = $rr_shift, rr_night_work_hours = $rr_night_work_hours, rr_modifier = $rr_modifier, rr_penalty = $rr_penalty, rr_traffic = $rr_traffic, rr_help = $rr_help, rr_debt = $rr_debt where rr_uid = $rr_uid";
	$res = ex_query($sql);

	return $res;
}

function delete_raw_rights($u_id){
	$sql = "delete from raw_rights where rr_uid = $u_id";
	$res = ex_query($sql);
}

function insert_payroll($array){
	$prl_uid = $array[0];
	$prl_month = $array[1];
	$prl_monthly_right = $array[2];
	$prl_bon = $array[3];
	$prl_home_right = $array[4];
	$prl_child_right = $array[5];
	$prl_child_right = $array[5];
	$prl_overtime_right = $array[6];
	$prl_penalty = $array[7];
	$prl_shift_right = $array[8];
	$prl_night_work_right = $array[9];
	$prl_traffic = $array[10];
	$prl_total_income = $array[11];
	$prl_insure = $array[12];
	$prl_tax = $array[13];
	$prl_help = $array[14];
	$prl_debt = $array[15];
	$prl_deficit = $array[16];
	$prl_saving = $array[17];
	$prl_other = $array[18];
	$prl_modifier = $array[19];
	$prl_total_expends = $array[20];
	$prl_total = $array[21];
	$prl_date = $array[22];
	$prl_overtime_hours = $array[23];
	$sql_check = "SELECT prl_id FROM payroll WHERE prl_uid = $prl_uid AND prl_month = '$prl_month'";
	$check = get_var_query($sql_check);
	if($check < 1){
		$sql = "INSERT INTO payroll(prl_uid, prl_month, prl_monthly_right, prl_bon, prl_home_right, prl_child_right, prl_overtime_right, prl_penalty, prl_shift_right, prl_night_work_right, prl_traffic, prl_total_income, prl_insure, prl_tax, prl_help, prl_debt, prl_deficit, prl_saving, prl_other, prl_modifier, prl_total_expends, prl_total, prl_date, prl_overtime_hours) VALUES($prl_uid, '$prl_month', $prl_monthly_right, $prl_bon, $prl_home_right, $prl_child_right, $prl_overtime_right, $prl_penalty, $prl_shift_right, $prl_night_work_right, $prl_traffic, $prl_total_income, $prl_insure, $prl_tax, $prl_help, $prl_debt, $prl_deficit, $prl_saving, $prl_other, $prl_modifier, $prl_total_expends, $prl_total, '$prl_date', $prl_overtime_hours)";

	}else{
		$sql = "UPDATE payroll SET prl_uid = $prl_uid, prl_month = '$prl_month', prl_monthly_right = $prl_monthly_right, prl_bon = $prl_bon, prl_home_right = $prl_home_right, prl_child_right = $prl_child_right, prl_overtime_right = $prl_overtime_right, prl_penalty = $prl_penalty, prl_shift_right = $prl_shift_right, prl_night_work_right = $prl_night_work_right, prl_traffic = $prl_traffic, prl_total_income = $prl_total_income, prl_insure = $prl_insure, prl_tax = $prl_tax, prl_help = $prl_help, prl_debt = $prl_debt, prl_deficit = $prl_deficit, prl_saving = $prl_saving, prl_other = $prl_other, prl_modifier = $prl_modifier, prl_total_expends = $prl_total_expends, prl_total = $prl_total, prl_date = '$prl_date', prl_overtime_hours = $prl_overtime_hours WHERE prl_uid = $prl_uid AND prl_month = '$prl_month'";
	}
	$res = ex_query($sql);
	return $res;
}

function get_uid_with_pcode($pcode){
	$sql = "SELECT u_id FROM user WHERE u_pcode = $pcode";
	$res = get_var_query($sql);
	return $res;
}

function select_payroll_joined($array){
	$uid = $array[0];
	$month = $array[1];
	$sql = "SELECT * FROM payroll prl INNER JOIN user u ON prl.prl_uid = u.u_id WHERE prl.prl_uid = $uid AND prl.prl_month = '$month'";
	$res = get_select_query($sql);
	return $res;
}

function get_mobiles_by_type($type){
	$sql = "select u_mobile from user where u_level = '$type'";
	$res = get_select_query($sql);
	$mobile_array = array();
	foreach($res as $row){
		array_push($mobile_array, $row['u_mobile']);
	}
	return $mobile_array;
}

function get_factor_signature($type_confirm, $table, $fb_id){
	$u_id = get_var_query("select $type_confirm from $table WHERE fb_id = $fb_id");
	if($u_id){
		?><img class="signature-fixer" src="<?php echo user_get_media($u_id, 'u_signature'); ?>">
	<?php
	}
}

function get_current_user_level(){
	$u_id = $_SESSION['user_id'];
	$u_level = get_var_query("select u_level from user where u_id = $u_id");
	return $u_level;
}

function get_current_user_id(){
	$u_id = $_SESSION['user_id'];
	return $u_id;
}

function get_user_name($u_id) {
	$res = get_select_query("select u_name, u_family from user where u_id = $u_id");
	if(count($res) > 0) {
		return $res[0]['u_name'] . " " . $res[0]['u_family'];
	} else {
		return "نامعتبر";
	}
}

function get_signature($u_id){
	if($u_id){
		?><img class="signature-fixer" src="<?php echo user_get_media($u_id, 'u_signature'); ?>">
	<?php
	}
}