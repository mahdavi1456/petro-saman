<?php
$table_name = "stock_log";
$field_names = array();
$field_types = array();

$field_names[0] = "p_id";
$field_types[0] = "int(6) UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY";

$field_names[1] = "sl_date";
$field_types[1] = "DATETIME";

$field_names[1] = "sl_amount";
$field_types[1] = "double DEFAULT NULL";

$field_names[2] = "sl_type";
$field_types[2] = "varchar(10) DEFAULT NULL";

migrate_drop($table_name);
migrate_create($table_name, $field_names, $field_types);
//migrate_add($table_name, $field_names, $field_types);
//migrate_remove($table_name, $field_names);
