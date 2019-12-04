<?php
$table_name = "payroll";
$field_names = array();
$field_types = array();

$field_names[0] = "prl_id";
$field_types[0] = "int(11) NOT NULL COMMENT 'کد جدول' AUTO_INCREMENT PRIMARY KEY";

$field_names[1] = "prl_uid";
$field_types[1] = "int(11) NOT NULL COMMENT 'کد کاربر'";

$field_names[2] = "prl_month";
$field_types[2] = "varchar(10) NOT NULL COMMENT 'ماه'";

$field_names[3] = "prl_monthly_right";
$field_types[3] = "int(11) DEFAULT 0 COMMENT 'پایه حقوق'";

$field_names[4] = "prl_bon";
$field_types[4] = "int(11) DEFAULT 0 COMMENT 'بن و خوار و بار'";

$field_names[5] = "prl_home_right";
$field_types[5] = "int(11) DEFAULT 0 COMMENT 'حق مسکن'";

$field_names[6] = "prl_child_right";
$field_types[6] = "int(11) DEFAULT 0 COMMENT 'عائله مندی'";

$field_names[7] = "prl_overtime_hours";
$field_types[7] = "varchar(15) CHARACTER SET utf8 DEFAULT NULL COMMENT 'کد ملی'";

$field_names[8] = "prl_overtime_right";
$field_types[8] = "int(11) NOT NULL COMMENT 'ساعت اضافه کار'";

$field_names[9] = "prl_penalty";
$field_types[9] = "int(11) DEFAULT 0 COMMENT 'کارانه/جریمه'";

$field_names[10] = "prl_shift_right";
$field_types[10] = "int(11) DEFAULT 0 COMMENT 'حق شیفت'";

$field_names[11] = "prl_night_work_right";
$field_types[11] = "int(11) DEFAULT 0 COMMENT 'شب کاری'";

$field_names[12] = "prl_traffic";
$field_types[12] = "int(11) DEFAULT 0 COMMENT 'ایاب و ذهاب'";

$field_names[13] = "prl_total_income";
$field_types[13] = "int(11) DEFAULT 0 COMMENT 'جمع دریافتی'";

$field_names[14] = "prl_insure";
$field_types[14] = "int(11) DEFAULT 0 COMMENT 'بیمه تامین اجتماعی'";

$field_names[15] = "prl_tax";
$field_types[15] = "int(11) DEFAULT 0 COMMENT 'مالیات'";

$field_names[16] = "prl_help";
$field_types[16] = "int(11) DEFAULT 0 COMMENT 'مساعده'";

$field_names[17] = "prl_debt";
$field_types[17] = "int(11) DEFAULT 0 COMMENT 'قسط وام'";

$field_names[18] = "prl_deficit";
$field_types[18] = "int(11) DEFAULT 0 COMMENT 'کسر از حقوق'";

$field_names[19] = "prl_saving";
$field_types[19] = "int(11) DEFAULT 0 COMMENT 'پس انداز'";

$field_names[20] = "prl_other";
$field_types[20] = "int(11) DEFAULT 0 COMMENT 'سایر'";

$field_names[21] = "prl_modifier";
$field_types[21] = "int(11) DEFAULT 0 COMMENT 'اصلاح حساب'";

$field_names[22] = "prl_total_expends";
$field_types[22] = "int(11) DEFAULT 0 COMMENT 'جمع کسورات'";

$field_names[23] = "prl_total";
$field_types[23] = "int(11) NOT NULL DEFAULT 0 COMMENT 'مبلغ خالص پرداختی'";

$field_names[24] = "prl_date";
$field_types[24] = "varchar(12) NOT NULL COMMENT 'تاریخ صدور'";

migrate_drop($table_name);
migrate_create($table_name, $field_names, $field_types);
//migrate_add($table_name, $field_names, $field_types);
//migrate_remove($table_name, $field_names);
