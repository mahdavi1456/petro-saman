<?php
function list_partner() {
	$sql = "select * from partner";
	$res = get_select_query($sql);
	return $res;
}
?>