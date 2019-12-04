<?php
$table_name = "stock";
$field_names = array();
$field_types = array();

$field_names[0] = "s_id";
$field_types[0] = "int(11) NOT NULL COMMENT 'کد ردیف' AUTO_INCREMENT PRIMARY KEY";

$field_names[1] = "p_id";
$field_types[1] = "int(11) DEFAULT NULL COMMENT 'کد محصول'";

$field_names[2] = "cat_id";
$field_types[2] = "int(11) NOT NULL COMMENT 'کد دسته بندی'";

$field_names[3] = "s_amount";
$field_types[3] = "int(11) DEFAULT NULL COMMENT 'مقدار'";

$field_names[4] = "s_eprice";
$field_types[4] = "double NOT NULL COMMENT 'قیمت تمام شده'";

$field_names[5] = "s_sprice";
$field_types[5] = "double NOT NULL COMMENT 'قیمت فروش'";

migrate_drop($table_name);
migrate_create($table_name, $field_names, $field_types);
//migrate_add($table_name, $field_names, $field_types);
//migrate_remove($table_name, $field_names);
