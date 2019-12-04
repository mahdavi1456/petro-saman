<?php
$table_name = "hse_rates";
$field_names = array();
$field_types = array();

$field_names[0] = "hr_id";
$field_types[0] = "int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY";

$field_names[1] = "u_id";
$field_types[1] = "int(11)";

$field_names[2] = "h_id";
$field_types[2] = "int(11)";

$field_names[3] = "hr_date";
$field_types[3] = "varchar(20)";


$field_names[4] = "hr_rate";
$field_types[4] = "int(11) NULL";


migrate_drop($table_name);
migrate_create($table_name, $field_names, $field_types);
//migrate_add($table_name, $field_names, $field_types);
//migrate_remove($table_name, $field_names);
