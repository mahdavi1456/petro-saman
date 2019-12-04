<?php
$table_name = "store";
$field_names = array();
$field_types = array();

$field_names[0] = "s_id";
$field_types[0] = "int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY";

$field_names[1] = "s_type";
$field_types[1] = "int(11) NOT NULL";

$field_names[2] = "s_weight";
$field_types[2] = "varchar(35) CHARACTER SET utf8 DEFAULT NULL";

$field_names[3] = "s_date";
$field_types[3] = "int(11) NOT NULL";

$field_names[4] = "s_time";
$field_types[4] = "varchar(30) CHARACTER SET utf8 DEFAULT NULL";

$field_names[5] = "dr_id";
$field_types[5] = "varchar(10) NOT NULL";

$field_names[6] = "s_scan_b";
$field_types[6] = "int(11) DEFAULT NULL";

$field_names[7] = "s_verify_fiscal";
$field_types[7] = "int(1) DEFAULT NULL";

$field_names[8] = "s_verify_admin";
$field_types[8] = "int(1) DEFAULT NULL";

$field_names[9] = "s_verify_admin_Quality";
$field_types[9] = "int(1) DEFAULT NULL";

$field_names[10] = "s_scan_gh";
$field_types[10] = "int(11) DEFAULT NULL";

migrate_drop($table_name);
migrate_create($table_name, $field_names, $field_types);
//migrate_add($table_name, $field_names, $field_types);
//migrate_remove($table_name, $field_names);
