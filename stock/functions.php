<?php
function insert_stock($array){
	$p_id = $array[0];
	$cat_id = $array[1];
	$s_amount = $array[2];
	$s_eprice = $array[3];
	$s_sprice = $array[4];
	$sql = "insert into stock(p_id, cat_id, s_amount, s_eprice, s_sprice) values($p_id, $cat_id, $s_amount, $s_eprice, $s_sprice)";
	$res = ex_query($sql);
	return $res;
}

function update_stock($array){
	$s_id = $array[0];
	$p_id = $array[1];
	$cat_id = $array[2];
	$s_amount = $array[3];
	$s_eprice = $array[4];
	$s_sprice = $array[5];
	$sql = "update stock set p_id = $p_id, cat_id = $cat_id, s_amount = $s_amount, s_eprice = $s_eprice, s_sprice = $s_sprice where s_id = $s_id";
	$res = ex_query($sql);
	return $res;	
}

function delete_stock($s_id){
	$sql = "delete from stock where s_id = '$s_id'";
	$res = ex_query($sql);
}

function list_stock() {
	$sql = "select * from stock";
	$res = get_select_query($sql);
	return $res;
}

function a_stock($s_id) {
	$sql = "select * from stock where s_id = $s_id";
	$res = get_select_query($sql);
	return $res;
}

function check_exist_stock($p_id, $cat_id) {
	$check = get_select_query("select count(s_id) from stock where p_id = $p_id and cat_id = $cat_id");
	return $check;
}

function update_val_stock($array){
	$p_id = $array[0];
	$cat_id = $array[1];
	$s_amount = $array[2];
	$s_amount_in_stock = get_var_query("select s_amount from stock where p_id = $p_id and cat_id = $cat_id");
	$s_amount_new = $s_amount_in_stock + $s_amount;

	$sql = "update stock set s_amount = $s_amount_new where p_id = $p_id and cat_id = $cat_id";
	$res = ex_query($sql);
	return $res;	
}

function insert_stock_from_produce($array){
	$p_id = $array[0];
	$cat_id = $array[1];
	$s_amount = $array[2];
	$sql = "insert into stock(p_id, cat_id, s_amount) values($p_id, $cat_id, $s_amount)";
	$res = ex_query($sql);
	return $res;
}
?>