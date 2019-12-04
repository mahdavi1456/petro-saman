<?php
function insert_customer($array){
	$c_name = $array[0];
	$c_family = $array[1];
	$c_company = $array[2];
	$c_national = $array[3];
	$c_phone = $array[4];
	$c_mobile = $array[5];
	$c_email = $array[6];
	$c_managername = $array[7];
	$c_managercode = $array[8];
	$c_activity = $array[9];
	$c_economic = $array[10];
	$c_vat = $array[11];
	$c_expire_vat = $array[12];
	$c_customertype = $array[13];
	$c_registernumber = $array[14];
	$c_postalcode = $array[15];
	$c_businessinterface = $array[16];
	$c_financialinterface = $array[17];
	$c_dischargephone = $array[18];
	$c_fax = $array[19];
	$c_oaddress = $array[20];
	$c_faddress = $array[21];
	$c_discharge = $array[22];
	$c_stamp = $array[23];
	$c_signaturep = $array[24];
	$c_signaturep2 = $array[25];
	$sql = "insert into customer(c_name, c_family, c_company, c_national , c_phone , c_mobile ,c_email ,c_managername, c_managercode, c_activity, c_economic, c_vat, c_expire_vat, c_customertype, c_registernumber, c_postalcode , c_businessinterface , c_financialinterface ,  c_dischargephone , c_fax , c_oaddress ,c_faddress ,c_discharge , c_stamp , c_signaturep , c_signaturep2 ) values ('$c_name', '$c_family', '$c_company', '$c_national', '$c_phone', '$c_mobile', '$c_email', '$c_managername', '$c_managercode', '$c_activity', '$c_economic', '$c_vat', '$c_expire_vat','$c_customertype' ,'$c_registernumber' ,'$c_postalcode' ,'$c_businessinterface','$c_financialinterface','$c_dischargephone','$c_fax','$c_oaddress','$c_faddress','$c_discharge', '$c_stamp' , '$c_signaturep' , '$c_signaturep2' )";
	$res = ex_query($sql);
	return $res;
}

function update_customer($array){
	$c_id = $array[0];
	$c_name = $array[1];
	$c_family = $array[2];
	$c_company = $array[3];
	$c_national = $array[4];
	$c_phone = $array[5];
	$c_mobile = $array[6];
	$c_email = $array[7];
	$c_managername = $array[8];
	$c_managercode = $array[9];
	$c_activity = $array[10];
	$c_economic = $array[11];
	$c_vat = $array[12];
	$c_expire_vat = $array[13];
	$c_customertype = $array[14];
	$c_registernumber = $array[15];
	$c_postalcode = $array[16];
	$c_businessinterface = $array[17];
	$c_financialinterface = $array[18];
	$c_dischargephone = $array[19];
	$c_fax = $array[20];
	$c_oaddress = $array[21];
	$c_faddress = $array[22];
	$c_discharge = $array[23];
	$c_stamp = $array[24];
	$c_signaturep = $array[25];
	$c_signaturep2 = $array[26];
	$sql = "update customer set c_name = '$c_name', c_family = '$c_family', c_company = '$c_company', c_national = '$c_national', c_economic = '$c_economic', c_phone = '$c_phone', c_fax = '$c_fax', c_mobile = '$c_mobile', c_oaddress = '$c_oaddress', c_faddress = '$c_faddress', c_email = '$c_email', c_vat = '$c_vat', c_expire_vat = '$c_expire_vat', c_customertype = '$c_customertype' , c_registernumber = '$c_registernumber' , c_postalcode = '$c_postalcode' , c_managercode = '$c_managercode' , c_managername = '$c_managername' , c_businessinterface = '$c_businessinterface' , c_financialinterface = '$c_financialinterface' , c_discharge = '$c_discharge' , c_dischargephone = '$c_dischargephone' , c_activity = '$c_activity' , c_stamp = '$c_stamp' , c_signaturep = '$c_signaturep' , c_signaturep2 = '$c_signaturep2' where c_id = $c_id";
	$res = ex_query($sql);
	return $res;
}

function delete_customer($c_id){
	$sql = "delete from customer where c_id = '$c_id'";
	$res = ex_query($sql);
}

function a_customer($c_id){
	$sql = "select * from customer where c_id = $c_id";
	$res = get_select_query($sql);
	return $res;
}

function list_customer_all() {
	$sql = "select * from customer";
	$res = get_select_query($sql);
	if(count($res)>0){
		return $res;
	}else{
		return;
	}
}

function list_customer() {
	$sql = "select * from customer where c_type = 'مشتری'";
	$res = get_select_query($sql);
	if(count($res)>0){
		return $res;
	}else{
		return;
	}
}

function list_provider() {
	$sql = "select * from customer where c_type = 'تامین کننده'";
	$res = get_select_query($sql);
	if(count($res)>0){
		return $res;
	}else{
		return;
	}
}
function list_colleague_provider() {
	$sql = "select * from customer where c_type = 'همکار' or c_type = 'تامین کننده'";
	$res = get_select_query($sql);
	if(count($res)>0){
		return $res;
	}else{
		return;
	}
}

function list_just_customer() {
	$sql = "select * from customer where c_customertype = 'مشتری'";
	$res = get_select_query($sql);
	if(count($res)>0){
		return $res;
	}else{
		return;
	}
}

function get_customer_name($c_id) {
	$sql = "select c_name, c_family, c_account, c_company from customer where c_id = $c_id";
	$res = get_select_query($sql);
	$c_account = $res[0]['c_account'];
	if($c_account == "real_person") {
		$name = $res[0]['c_name'] . " " . $res[0]['c_family'];
	} else {
		$name = $res[0]['c_company'];
	}
	return $name;
}

function get_national($c_id) {
	$sql = "select c_national, c_national_id, c_account from customer where c_id = $c_id";
	$res = get_select_query($sql);
	$c_account = $res[0]['c_account'];
	if($c_account == "real_person") {
		$name = $res[0]['c_national'];
	} else {
		$name = $res[0]['c_national_id'];
	}
	return $name;
}

function get_company_name($c_id) {
	$sql = "select c_company from customer where c_id = $c_id";
	$res = get_select_query($sql);
	if(count($res)>0){
		return $res[0]['c_company'];
	}else{
		return "";
	}
}

function get_customer_address($c_id, $type = 0) {
	if($type==0){
		$sql = "select c_oaddress from customer where c_id = $c_id";
	} else if($type==1){
		$sql = "select c_faddress from customer where c_id = $c_id";
	}
	$res = get_var_query($sql);
	return $res;
}

function show_customer_as_select($c_id){ ?>
	<select name="c_id" class="form-control select2">
		<?php
		$res = list_customer();
		if(count($res)>0){
			foreach($res as $row){
			?>
			<option <?php if($row['c_id']==$c_id)echo "selected"; ?> value="<?php echo $row['c_id']; ?>"><?php echo $row['c_name'] . " " . $row['c_family']; ?></option>
			<?php
			}
		} ?>
	</select>
	<?php
}

function show_provider_as_select($c_id){ ?>
	<select name="c_id" class="form-control select2">
		<?php
		$res = list_provider();
		if(count($res)>0){
			foreach($res as $row){
			?>
			<option <?php if($row['c_id']==$c_id)echo "selected"; ?> value="<?php echo $row['c_id']; ?>"><?php echo $row['c_name'] . " " . $row['c_family']; ?></option>
			<?php
			}
		} ?>
	</select>
	<?php
}

function get_expire_time($c_id, $action=0){
	$sql = "select c_expire_vat from customer where c_id = $c_id";
	$res = get_var_query($sql);
	$ex_date = $res;
	$now = jdate('Y/m/d');
	$diff = timeDiff($ex_date, $now);
	if($action==0){
		if($diff<0){
			echo "<span class='badge bg-red'>" . per_number(round($diff)) . " روز گذشته</span>";
		}else{
			echo "<span class='badge bg-green'>" . per_number(round($diff)) . " روز دیگر اعتبار دارد</span>";
		}
	}else{
		return $diff;
	}
}

function list_customer_expire() {
	$sql = "select * from customer where c_vat='yes'";
	$arr = array();
	$res = get_select_query($sql);
	foreach($res as $row){
		$diff = get_expire_time($row['c_id'], 1);
		if($diff<0){
			array_push($arr, $row);
		}
	}
	return $arr;
}

function customer_expire_count() {
	$sql = "select * from customer where c_vat='yes'";
	$c = 0;
	$res = get_select_query($sql);
	foreach($res as $row){
		$diff = get_expire_time($row['c_id'], 1);
		if($diff<0){
			$c++;
		}
	}
	return $c;
}

function customer_count() {
	$sql = "select count(c_id) from customer where c_customertype = 'مشتری'";
	$res = get_var_query($sql);
	return $res;
}

function get_customer_mobile($fb_id){
	$sql = "select c_mobile from customer inner join factor on customer.c_id = factor.c_id inner join factor_body on factor_body.f_id = factor_body.f_id where factor_body.fb_id = $fb_id";
	$res = get_var_query($sql);
	return $res;
}

function get_customer_name_by_factor_log_id($factor_log_id){
	$fb_id = get_var_query("select fb_id from factor_log where l_id = $factor_log_id");
	$f_id = get_var_query("select f_id from factor_body where fb_id = $fb_id");
	$c_id = get_var_query("select c_id from factor where f_id = $f_id");
	$c_name = get_var_query("select c_name from customer where c_id = $c_id");
	$c_family = get_var_query("select c_family from customer where c_id = $c_id");
	$c_fullname = $c_name . " " . $c_family;

	return $c_fullname;
}