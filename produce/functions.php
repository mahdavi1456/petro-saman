<?php
function insert_produce($array){
	$prc_date = $array[0];
	$prc_sh_id = $array[1];
	$prc_p_id = $array[2];
	$prc_cat_id = $array[3];
	$prc_val = $array[4];
	$sql = "insert into produce(prc_date, prc_sh_id, prc_p_id, prc_cat_id, prc_val) values('$prc_date', $prc_sh_id, $prc_p_id, $prc_cat_id, $prc_val)";
	$res = ex_query($sql);
	return $res;
}

function list_produce() {
	$sql = "select * from produce";
	$res = get_select_query($sql);
	return $res;
}

function update_produce($array){
	$prc_id = $array[0];
	$prc_date = $array[1];
	$prc_sh_id = $array[2];
	$prc_p_id = $array[3];
	$prc_cat_id = $array[4];
	$prc_val = $array[5];
	$sql = "update produce set prc_date = '$prc_date', prc_sh_id = $prc_sh_id, prc_p_id = $prc_p_id, prc_cat_id = $prc_cat_id, prc_val = $prc_val where prc_id = $prc_id";
	$res = ex_query($sql);

	return $res;
}

function delete_produce($prc_id){
	$sql = "delete from produce where prc_id = $prc_id";
	$res = ex_query($sql);
}

function update_produce_status($prc_id){
	$status = 1;
	$sql = "update produce set prc_status = $status where prc_id = $prc_id";
	$res = ex_query($sql);

	return $res;
}

function check_status_produce($prc_id) {
	$check = get_var_query("select prc_status from produce where prc_id = $prc_id");
	return $check;
}