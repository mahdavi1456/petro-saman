<?php
function get_option($key){
	$sql = "select o_value from options where o_key = '$key'";
	return get_var_query($sql);
}
?>