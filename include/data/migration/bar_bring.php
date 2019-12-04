<?php
$table_name = "bar_bring";
$field_names = array();
$field_types = array();

$field_names[0] = "bar_id";
$field_types[0] = "int(11) NOT NULL COMMENT 'کد بار' AUTO_INCREMENT PRIMARY KEY";

$field_names[1] = "fx_id";
$field_types[1] = "int(11) DEFAULT NULL COMMENT 'کد فاکتور'";

$field_names[2] = "fx_type";
$field_types[2] = "int(11) DEFAULT NULL COMMENT 'نوع بار'";

$field_names[3] = "dr_id";
$field_types[3] = "int(11) DEFAULT NULL COMMENT 'کد راننده'";

$field_names[4] = "bar_quantity";
$field_types[4] = "varchar(35) DEFAULT NULL COMMENT 'وزن بار'";

$field_names[5] = "bar_time";
$field_types[5] = "varchar(16) DEFAULT NULL COMMENT 'تاریخ بار'";

$field_names[6] = "bar_verify_admin";
$field_types[6] = "int(11) DEFAULT '0' COMMENT 'تایید مدیریت'";

migrate_drop($table_name);
migrate_create($table_name, $field_names, $field_types);
//migrate_add($table_name, $field_names, $field_types);
//migrate_remove($table_name, $field_names);
