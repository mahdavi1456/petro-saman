<?php
$table_name = "partners";
$field_names = array();
$field_types = array();

$field_names[0] = "pa-id";
$field_types[0] = "int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY";

$field_names[1] = "pa_name";
$field_types[1] = "varchar(50) NOT NULL";

$field_names[2] = "pa_family";
$field_types[2] = "varchar(50) NOT NULL";

$field_names[3] = "pa_company";
$field_types[3] = "varchar(50) NOT NULL";

$field_names[4] = "pa_company_adress";
$field_types[4] = "varchar(100) NOT NULL";

migrate_drop($table_name);
migrate_create($table_name, $field_names, $field_types);
//migrate_add($table_name, $field_names, $field_types);
//migrate_remove($table_name, $field_names);
