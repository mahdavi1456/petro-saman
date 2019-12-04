<?php
$table_name = "schedule";
$field_names = array();
$field_types = array();

$field_names[0] = "sc_id";
$field_types[0] = "int(11) NOT NULL COMMENT 'کد جدول' AUTO_INCREMENT PRIMARY KEY";

$field_names[1] = "sc_month";
$field_types[1] = "varchar(35) CHARACTER SET utf8 DEFAULT NULL";

$field_names[2] = "sc_group";
$field_types[2] = "varchar(35) CHARACTER SET utf8 DEFAULT NULL";

$field_names[3] = "sc_schedule";
$field_types[3] = "text CHARACTER SET utf8 DEFAULT NULL";

migrate_drop($table_name);
migrate_create($table_name, $field_names, $field_types);
//migrate_add($table_name, $field_names, $field_types);
//migrate_remove($table_name, $field_names);
