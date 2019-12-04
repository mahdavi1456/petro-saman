<?php
$table_name = "produce";
$field_names = array();
$field_types = array();

$field_names[0] = "prc_id";
$field_types[0] = "int(11) NOT NULL COMMENT 'کد تولید' AUTO_INCREMENT PRIMARY KEY";

$field_names[1] = "prc_date";
$field_types[1] = "varchar(12) DEFAULT NULL";

$field_names[2] = "prc_sh_id";
$field_types[2] = "int(11) DEFAULT NULL";

$field_names[3] = "prc_p_id";
$field_types[3] = "int(11) DEFAULT NULL";

$field_names[4] = "prc_cat_id";
$field_types[4] = "int(11) DEFAULT NULL";

$field_names[5] = "prc_val";
$field_types[5] = "bigint(20) NOT NULL DEFAULT 0 COMMENT 'مقدار'";

$field_names[6] = "prc_status";
$field_types[6] = "tinyint(1) NOT NULL DEFAULT 0 COMMENT 'اضافه شده'";

migrate_drop($table_name);
migrate_create($table_name, $field_names, $field_types);
//migrate_add($table_name, $field_names, $field_types);
//migrate_remove($table_name, $field_names);
