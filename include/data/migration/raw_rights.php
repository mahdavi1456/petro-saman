<?php
$table_name = "raw_rights";
$field_names = array();
$field_types = array();

$field_names[0] = "rr_id";
$field_types[0] = "int(11) NOT NULL COMMENT 'کد جدول' AUTO_INCREMENT PRIMARY KEY";

$field_names[1] = "rr_uid";
$field_types[1] = "int(11) NOT NULL COMMENT 'کد کاربر'";

$field_names[2] = "rr_month";
$field_types[2] = "varchar(10) NOT NULL COMMENT 'ماه'";

$field_names[3] = "rr_work_days";
$field_types[3] = "int(11) NOT NULL DEFAULT 0 COMMENT 'روزهای کارکرد'";

$field_names[4] = "rr_overtime_hours";
$field_types[4] = "int(11) NOT NULL DEFAULT 0 COMMENT 'ساعت اضافه کاری'";

$field_names[5] = "rr_child_right_ratio";
$field_types[5] = "double NOT NULL DEFAULT 1 COMMENT 'ضریب حق اولاد'";

$field_names[6] = "rr_shift";
$field_types[6] = "int(11) NOT NULL DEFAULT 0 COMMENT 'شیفت'";

$field_names[7] = "rr_night_work_hours";
$field_types[7] = "int(11) NOT NULL DEFAULT 0 COMMENT 'ساعت شب'";

$field_names[8] = "rr_modifier";
$field_types[8] = "int(11) DEFAULT 0 COMMENT 'اصلاح حساب'";

$field_names[9] = "rr_penalty";
$field_types[9] = "int(11) DEFAULT 0 COMMENT 'جریمه / کارانه'";

$field_names[10] = "rr_traffic";
$field_types[10] = "int(11) DEFAULT 0 COMMENT 'ایاب ذهاب'";

$field_names[11] = "rr_help";
$field_types[11] = "int(11) DEFAULT 0 COMMENT 'مساعده'";

$field_names[12] = "rr_debt";
$field_types[12] = "int(11) DEFAULT 0 COMMENT 'قسط وام'";

migrate_drop($table_name);
migrate_create($table_name, $field_names, $field_types);
//migrate_add($table_name, $field_names, $field_types);
//migrate_remove($table_name, $field_names);
