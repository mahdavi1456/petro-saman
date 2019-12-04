<?php
function get_the_url() {
	return $GLOBALS['site_url'];
}

function get_url() {
	echo $GLOBALS['site_url'];
}

function get_view($view){
	return $GLOBALS['site_url'] . $view . "/";
}

function check_active($current){
	$filename = basename($_SERVER['PHP_SELF']);
	if($filename==$current)
		echo 'active';
}

function alert($type, $msg){
	$home_dir = get_the_url();
	echo "<div class='alert-aru col-xs-12'><div class='alert " . $type . " col-xs-6'><img src='$home_dir/dist/img/check4.gif'>" . $msg . "</div></div>";
	echo '<meta http-equiv="refresh" content="2"/>';
}