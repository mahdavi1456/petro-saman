<?php
$table_name = "factor_buy";
$field_names = array();
$field_types = array();

$field_names[0] = "f_id";
$field_types[0] = "int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY COMMENT 'کد فاکتور'";

$field_names[1] = "c_id";
$field_types[1] = "int(11) NOT NULL COMMENT 'کد تامین کننده'";

$field_names[2] = "f_date";
$field_types[2] = "varchar(16) NOT NULL COMMENT 'تاریخ ثبت فاکتور'";

$field_names[3] = "u_id";
$field_types[3] = "int(11) NOT NULL COMMENT 'کد کاربر'";

migrate_drop($table_name);
migrate_create($table_name, $field_names, $field_types);
//migrate_add($table_name, $field_names, $field_types);
//migrate_remove($table_name, $field_names);
