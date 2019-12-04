<?php

function get_tools() {
	$sql = "select * from tools order by t_id DESC";
	$res = get_select_query($sql);
	return $res;
}


function get_tools_returned() {
	$sql = "select * from tools_returned tr inner join usage_tools ut on tr.us_id = ut.us_id order by tr.tr_id DESC";
	$res = get_select_query($sql);
	return $res;
}


function get_usage_tools($t_id) {
	$usage_tools = 0;
	$usage_back_tools = 0;
	$usage_tools_new = 0;
	$res = get_select_query("select * from usage_tools where us_type ='مصرفی' and t_id = $t_id ");
	if(count($res) >0){
		foreach($res as $row){
			$usage_tools += $row['us_quantity'];
			$usage_back_tools += get_back_tools($row['us_id']);
		}
	}
	$usage_tools_new = $usage_tools - $usage_back_tools;
	return $usage_tools_new;
}



function get_trustee_tools($t_id) {
	$trustee_tools = 0;
	$trustee_back_tools = 0;
	$trustee_tools_new = 0;
	$res = get_select_query("select * from usage_tools where us_type ='امانتی' and t_id = $t_id ");
	if(count($res) >0){
		foreach($res as $row){
			$trustee_tools += $row['us_quantity'];
			$trustee_back_tools += get_back_tools($row['us_id']);
		}
	}
	$trustee_tools_new = $trustee_tools - $trustee_back_tools;
	return $trustee_tools_new;
}


function get_back_tools($us_id) {
	$tr_quantity = get_var_query("select sum(tr_quantity) from tools_returned where us_id = $us_id ");
	return $tr_quantity;
}

function get_stock($t_id){
	$t_stock = get_var_query("select t_stock from tools where t_id = $t_id ");
	$trustee_back_tools = get_var_query("select sum(tr_quantity) from usage_tools ut inner join tools_returned tr on tr.us_id = ut.us_id where us_type ='امانتی' and t_id = $t_id ");
	$repairable_usage_back_tools = get_var_query("select sum(tr_quantity) from usage_tools ut inner join tools_returned tr on tr.us_id = ut.us_id where us_type ='مصرفی' and t_id = $t_id and tr_condition='1' ");
	$unrepairable_usage_back_tools = get_var_query("select sum(tr_quantity) from usage_tools ut inner join tools_returned tr on tr.us_id = ut.us_id where us_type ='مصرفی' and t_id = $t_id and tr_condition='-1' ");
	$trustee_tools = get_trustee_tools($t_id);
	$usage_tools = get_usage_tools($t_id);
	$stock = ($t_stock) - ($trustee_tools + $usage_tools + $unrepairable_usage_back_tools);
	return $stock;
}