<?php
$table_name = "factor_buy_log";
$field_names = array();
$field_types = array();

$field_names[0] = "l_id";
$field_types[0] = "int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY";

$field_names[1] = "u_id";
$field_types[1] = "int(11) DEFAULT NULL";

$field_names[2] = "l_date";
$field_types[2] = "varchar(16) CHARACTER SET utf8 DEFAULT NULL";

$field_names[3] = "fb_id";
$field_types[3] = "int(11) DEFAULT NULL";

$field_names[4] = "l_details";
$field_types[4] = "text CHARACTER SET utf8";

migrate_drop($table_name);
migrate_create($table_name, $field_names, $field_types);
//migrate_add($table_name, $field_names, $field_types);
//migrate_remove($table_name, $field_names);
