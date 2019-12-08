<?php
$src = $_SERVER["DOCUMENT_ROOT"] . "/petro-saman/gt-config.gt";
$myfile = fopen($src, "r") or die("Unable to open file!");
$data = fread($myfile, filesize($src));
fclose($myfile);

preg_match('/"([^"]+)"/', explode(",", $data)[0], $hostArray);
$GLOBALS['host'] = $hostArray[1];

preg_match('/"([^"]+)"/', explode(",", $data)[1], $db_nameArray);
$GLOBALS['db_name'] = $db_nameArray[1];

preg_match('/"([^"]+)"/', explode(",", $data)[2], $db_userArray);
$GLOBALS['db_user'] = $db_userArray[1];

preg_match('/"([^"]+)"/', explode(",", $data)[3], $db_user_passArray);
if(!empty($db_user_passArray[1])){
	$GLOBALS['db_user_pass'] = $db_user_passArray[1];
}else{
	$GLOBALS['db_user_pass'] = "";
}

preg_match('/"([^"]+)"/', explode(",", $data)[4], $site_urlArray);
$GLOBALS['site_url'] = $site_urlArray[1];