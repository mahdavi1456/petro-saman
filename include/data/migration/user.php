<?php
$table_name = "user";
$field_names = array();
$field_types = array();

$field_names[0] = "u_id";
$field_types[0] = "int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY";

$field_names[1] = "u_name";
$field_types[1] = "varchar(35) CHARACTER SET utf8 DEFAULT NULL";

$field_names[2] = "u_family";
$field_types[2] = "varchar(35) CHARACTER SET utf8 DEFAULT NULL";

$field_names[3] = "u_level";
$field_types[3] = "varchar(20) CHARACTER SET utf8 DEFAULT NULL";

$field_names[4] = "u_username";
$field_types[4] = "varchar(30) CHARACTER SET utf8 DEFAULT NULL";

$field_names[5] = "u_password";
$field_types[5] = "varchar(35) CHARACTER SET utf8 DEFAULT NULL";

$field_names[6] = "u_father";
$field_types[6] = "varchar(40) CHARACTER SET utf8 DEFAULT NULL COMMENT 'نام پدر'";

$field_names[7] = "u_meli";
$field_types[7] = "varchar(15) CHARACTER SET utf8 DEFAULT NULL COMMENT 'کد ملی'";

$field_names[8] = "u_birth";
$field_types[8] = "varchar(15) CHARACTER SET utf8 DEFAULT NULL COMMENT 'تاریخ تولد'";

$field_names[9] = "u_live_city";
$field_types[9] = "varchar(40) CHARACTER SET utf8 DEFAULT NULL COMMENT 'شهر محل سکونت'";

$field_names[10] = "u_destination";
$field_types[10] = "varchar(10) CHARACTER SET utf8 DEFAULT NULL COMMENT 'مسافت تا کارخانه'";

$field_names[11] = "u_mobile";
$field_types[11] = "varchar(15) CHARACTER SET utf8 DEFAULT NULL COMMENT 'موبایل'";

$field_names[12] = "u_tell";
$field_types[12] = "varchar(15) CHARACTER SET utf8 DEFAULT NULL COMMENT 'تلفن ثابت'";

$field_names[13] = "u_address";
$field_types[13] = "text CHARACTER SET utf8 DEFAULT NULL COMMENT 'آدرس محل سکونت'";

$field_names[14] = "u_pre";
$field_types[14] = "text CHARACTER SET utf8 DEFAULT NULL COMMENT 'سنوات'";

$field_names[15] = "u_group";
$field_types[15] = "varchar(10) CHARACTER SET utf8 DEFAULT NULL COMMENT 'نام گروه'";

$field_names[16] = "u_description";
$field_types[16] = "text CHARACTER SET utf8 DEFAULT NULL COMMENT 'توضیحات'";

$field_names[17] = "u_pcode";
$field_types[17] = "varchar(20) CHARACTER SET utf8 DEFAULT NULL COMMENT 'شماره پرسنل'";

$field_names[18] = "u_wtype";
$field_types[18] = "varchar(20) CHARACTER SET utf8 DEFAULT NULL COMMENT 'سمت'";

$field_names[19] = "u_marital";
$field_types[19] = "varchar(20) CHARACTER SET utf8 DEFAULT NULL COMMENT 'وضعیت تاهل'";

$field_names[20] = "u_evidence";
$field_types[20] = "varchar(40) CHARACTER SET utf8 DEFAULT NULL COMMENT 'مدرک'";

$field_names[21] = "u_child_count";
$field_types[21] = "int(11) DEFAULT 0 COMMENT 'تعداد فرزند'";

$field_names[22] = "u_daily_wage";
$field_types[22] = "bigint(20) DEFAULT 0 COMMENT 'دستمزد روزانه'";

$field_names[23] = "u_fix_right";
$field_types[23] = "int(11) DEFAULT 0 COMMENT 'اضافه ثابت'";

$field_names[24] = "u_fin_contract";
$field_types[24] = "varchar(11) CHARACTER SET utf8 NOT NULL COMMENT 'تاریخ انقضای قرارداد'";

$field_names[25] = "u_cart";
$field_types[25] = "varchar(50) DEFAULT NULL COMMENT 'شماره کارت'";

$field_names[26] = "u_hesab";
$field_types[26] = "varchar(50) DEFAULT NULL COMMENT 'شماره حساب'";

$field_names[27] = "u_shaba";
$field_types[27] = "varchar(50) DEFAULT NULL COMMENT 'شماره شبا'";

$field_names[28] = "u_birth_city";
$field_types[28] = "varchar(40) DEFAULT NULL COMMENT 'محل تولد'";

$field_names[29] = "u_cert_number";
$field_types[29] = "varchar(20) DEFAULT NULL COMMENT 'شماره شناسنامه'";

$field_names[30] = "u_cert_city";
$field_types[30] = "varchar(40) DEFAULT NULL COMMENT 'محل صدور'";

$field_names[31] = "u_start_work";
$field_types[31] = "varchar(11) DEFAULT NULL COMMENT 'تاریخ شروع به کار'";

$field_names[32] = "u_end_work";
$field_types[32] = "varchar(11) DEFAULT NULL COMMENT 'تاریخ ترک کار'";

migrate_drop($table_name);
migrate_create($table_name, $field_names, $field_types);
//migrate_add($table_name, $field_names, $field_types);
//migrate_remove($table_name, $field_names);