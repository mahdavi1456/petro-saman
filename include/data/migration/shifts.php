<?php
$table_name = "shifts";
$field_names = array();
$field_types = array();

$field_names[0] = "sh_id";
$field_types[0] = "int(11) NOT NULL COMMENT 'کد شیفت' AUTO_INCREMENT PRIMARY KEY";

$field_names[1] = "sh_name";
$field_types[1] = "varchar(14) DEFAULT NULL COMMENT 'نام شیفت'";

$field_names[2] = "sh_checkin";
$field_types[2] = "int(11) DEFAULT NULL COMMENT 'ساعت ورود'";

$field_names[3] = "sh_checkout";
$field_types[3] = "int(11) DEFAULT NULL COMMENT 'ساعت خروج'";

migrate_drop($table_name);
migrate_create($table_name, $field_names, $field_types);
//migrate_add($table_name, $field_names, $field_types);
//migrate_remove($table_name, $field_names);
