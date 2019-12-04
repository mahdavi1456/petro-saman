<?php
$table_name = "driver";
$field_names = array();
$field_types = array();

$field_names[0] = "dr_id";
$field_types[0] = "int(11) NOT NULL COMMENT 'کد راننده' AUTO_INCREMENT PRIMARY KEY";

$field_names[1] = "dr_name";
$field_types[1] = "varchar(50) DEFAULT NULL COMMENT 'نام'";

$field_names[2] = "dr_family";
$field_types[2] = "varchar(50) DEFAULT NULL COMMENT 'نام خانوادگی'";

$field_names[3] = "dr_national";
$field_types[3] = "int(10) DEFAULT NULL COMMENT 'کد ملی'";

$field_names[4] = "dr_car";
$field_types[4] = "varchar(50) DEFAULT NULL COMMENT 'نوع ماشین'";

$field_names[5] = "dr_plaque";
$field_types[5] = "varchar(50) DEFAULT NULL COMMENT 'پلاک'";

$field_names[6] = "dr_mobile";
$field_types[6] = "int(11) DEFAULT NULL COMMENT 'شماره همراه'";

$field_names[7] = "dr_status";
$field_types[7] = "int(11) DEFAULT NULL COMMENT 'وضعیت'";

$field_names[8] = "dr_melicart_img";
$field_types[8] = "varchar(50) DEFAULT NULL COMMENT 'کارت ملی'";

$field_names[9] = "dr_certificate_img";
$field_types[9] = "varchar(50) DEFAULT NULL COMMENT 'گواهینامه'";

$field_names[10] = "dr_car_cart_img";
$field_types[10] = "varchar(50) DEFAULT NULL COMMENT 'کارت ماشین'";

migrate_drop($table_name);
migrate_create($table_name, $field_names, $field_types);
//migrate_add($table_name, $field_names, $field_types);
//migrate_remove($table_name, $field_names);
