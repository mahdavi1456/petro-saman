<?php
$table_name = "group_info";
$field_names = array();
$field_types = array();

$field_names[0] = "g_id";
$field_types[0] = "int(11) NOT NULL COMMENT 'کد جدول' AUTO_INCREMENT PRIMARY KEY";

$field_names[1] = "g_name";
$field_types[1] = "varchar(20) DEFAULT NULL COMMENT 'نام گروه'";

$field_names[2] = "g_sup_1";
$field_types[2] = "varchar(50) DEFAULT NULL COMMENT 'سرپرست ۱'";

$field_names[3] = "g_sup_2";
$field_types[3] = "varchar(50) DEFAULT NULL COMMENT 'سرپرست‌ ۲'";

$field_names[4] = "g_sup_3";
$field_types[4] = "varchar(50) DEFAULT NULL COMMENT 'سرپرست ۳'";

$field_names[5] = "g_sup_4";
$field_types[5] = "varchar(50) DEFAULT NULL COMMENT 'سرپرست ۴'";

$field_names[6] = "g_sup_5";
$field_types[6] = "varchar(50) DEFAULT NULL COMMENT 'سرپرست ۵'";

$field_names[7] = "g_driver_1";
$field_types[7] = "varchar(50) DEFAULT NULL COMMENT 'راننده ۱'";

$field_names[8] = "g_driver_2";
$field_types[8] = "varchar(50) DEFAULT NULL COMMENT 'راننده ۲'";

migrate_drop($table_name);
migrate_create($table_name, $field_names, $field_types);
//migrate_add($table_name, $field_names, $field_types);
//migrate_remove($table_name, $field_names);
