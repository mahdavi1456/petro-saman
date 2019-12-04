<?php
function get_connection_string(){
	$host = $GLOBALS['host'];
	$db_name = $GLOBALS['db_name'];
	$db_user = $GLOBALS['db_user'];
	$db_user_pass = $GLOBALS['db_user_pass'];
	$dsn = "mysql:host=$host;dbname=$db_name;charset=utf8";
    $pdo_conn = new PDO($dsn, $db_user, $db_user_pass,
		array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
    return $pdo_conn;
}

function ex_query($sql){
	$pdo_conn = get_connection_string();
	$pdo_statement = $pdo_conn->prepare($sql);
	$pdo_statement->execute();
	$id = $pdo_conn->lastInsertId();
	return $id;
}

function get_select_query($sql){
    $pdo_conn = get_connection_string();
	$pdo_statement = $pdo_conn->prepare($sql);
	$pdo_statement->execute();
	$result = $pdo_statement->fetchAll();
	return $result;
}

function get_var_query($sql){
    $pdo_conn = get_connection_string();
    $pdo_statement = $pdo_conn->prepare($sql);
    $pdo_statement->execute();
    $result = $pdo_statement->fetchAll();
    if(count($result)>0){
		return $result[0][0];
	}else{
		return;
	}
}

function check_login($u_username, $u_password){
	$res = get_select_query("select * from user where u_username='$u_username' and u_password='$u_password'");
	return count($res);
}
?>
