<?php
$table_name = "analyze_form";
$field_names = array();
$field_types = array();

$field_names[0] = "analyze_id";
$field_types[0] = "int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY";

$field_names[1] = "factor_log_id";
$field_types[1] = "int(11) NOT NULL";

$field_names[2] = "sample_in_date";
$field_types[2] = "varchar(16) DEFAULT NULL COMMENT 'تاریخ دریافت نمونه'";

$field_names[3] = "analyze_date";
$field_types[3] = "varchar(16) DEFAULT NULL COMMENT 'تاریخ انجام آزمون'";

$field_names[4] = "analyzer";
$field_types[4] = "varchar(50) DEFAULT NULL COMMENT 'نمونه گیری توسط'";

$field_names[5] = "temprature";
$field_types[5] = "varchar(50) DEFAULT NULL COMMENT 'دمای محیط'";

$field_names[6] = "humidity";
$field_types[6] = "varchar(50) DEFAULT NULL COMMENT 'رطوبت محیط'";

$field_names[7] = "an_empty_weight";
$field_types[7] = "int(11) NOT NULL DEFAULT 0";

$field_names[8] = "am_empty_weight";
$field_types[8] = "int(11) NOT NULL DEFAULT 0";

$field_names[9] = "an_full_weight";
$field_types[9] = "int(11) NOT NULL DEFAULT 0";

$field_names[10] = "hb_empty_weight";
$field_types[10] = "int(11) NOT NULL DEFAULT 0";

$field_names[11] = "hm_empty_weight";
$field_types[11] = "int(11) NOT NULL DEFAULT 0";

$field_names[12] = "hb_full_weight";
$field_types[12] = "int(11) NOT NULL DEFAULT 0";

$field_names[13] = "ec_empty_weight";
$field_types[13] = "int(11) NOT NULL DEFAULT 0";

$field_names[14] = "em_empty_weight";
$field_types[14] = "int(11) NOT NULL DEFAULT 0";

$field_names[15] = "ec_full_weight";
$field_types[15] = "int(11) NOT NULL DEFAULT 0";

$field_names[16] = "sulfur_percent";
$field_types[16] = "int(11) NOT NULL DEFAULT 0";

$field_names[17] = "gm_weight";
$field_types[17] = "int(11) NOT NULL DEFAULT 0";

$field_names[18] = "gm_less_weight";
$field_types[18] = "int(11) NOT NULL DEFAULT 0";

$field_names[19] = "gm_dot_weight";
$field_types[19] = "int(11) NOT NULL DEFAULT 0";

$field_names[20] = "gm_more_weight";
$field_types[20] = "int(11) NOT NULL DEFAULT 0";

migrate_drop($table_name);
migrate_create($table_name, $field_names, $field_types);
//migrate_add($table_name, $field_names, $field_types);
//migrate_remove($table_name, $field_names);