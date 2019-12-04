<?php
function get_fl_analyze_id($factor_log_id){
	$sql = "select analyze_id from analyze_form where factor_log_id = $factor_log_id";
	$res = get_var_query($sql);
	return $res;
}
function set_fl_analyze_id($analyze_id, $factor_log_id){
	$sql = "update factor_log set fl_analyze_id = $analyze_id where l_id = $factor_log_id";
	$res = ex_query($sql);
	return $res;
}

function get_customer_fullname_by_l_id($l_id){
	$fb_id = get_var_query("select fb_id from factor_log where l_id = $l_id");
	$f_id = get_var_query("select f_id from factor_body where fb_id = $fb_id");
	$c_id = get_var_query("select c_id from factor where f_id = $f_id");
	$c_name = get_var_query("select c_name from customer where c_id = $c_id");
	$c_family = get_var_query("select c_family from customer where c_id = $c_id");
	$c_fullname = $c_name . " " . $c_family;
	return $c_fullname;
}

function get_category_by_l_id($l_id){
	$fb_id = get_var_query("select fb_id from factor_log where l_id = $l_id");
	$cat_id = get_var_query("select cat_id from factor_body where fb_id = $fb_id");
	$cat_name = get_var_query("select cat_name from category where cat_id = $cat_id");
	return $cat_name;
}