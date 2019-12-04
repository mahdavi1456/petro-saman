<?php
$table_name = "factor_log";
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

$field_names[5] = "l_amount";
$field_types[5] = "int(11) NOT NULL DEFAULT 0 COMMENT 'مقدار ارسال شده'";

$field_names[6] = "fl_driver_id";
$field_types[6] = "int(11) NOT NULL DEFAULT 0 COMMENT 'کد راننده'";

$field_names[7] = "fl_exit_bar";
$field_types[7] = "tinyint(1) NOT NULL DEFAULT 0 COMMENT 'خارج شده'";

$field_names[8] = "fl_analyze_id";
$field_types[8] = "int(11) NOT NULL DEFAULT 0 COMMENT 'کد آزمون'";

$field_names[9] = "fl_admin_confirm";
$field_types[9] = "tinyint(1) NOT NULL DEFAULT 0 COMMENT 'تایید مدیر'";

migrate_drop($table_name);
migrate_create($table_name, $field_names, $field_types);
//migrate_add($table_name, $field_names, $field_types);
//migrate_remove($table_name, $field_names);
