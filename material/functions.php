<?php
function get_material_name($ma_id){
	$sql = "select ma_name from material where ma_id = $ma_id";
	$res = get_var_query($sql);
	return $res;
}
function get_material_unit($ma_id) {
	$sql = "select ma_unit from material where ma_id = $ma_id";
	$res = get_var_query($sql);
	if($res!=""){
		return $res;
	}else
	{
		return 0;
	}
}
function list_material() {
	$sql = "select * from material";
	$res = get_select_query($sql);
	return $res;
}
?>