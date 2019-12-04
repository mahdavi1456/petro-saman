<?php
$table_name = "product";
$field_names = array();
$field_types = array();

$field_names[0] = "p_id";
$field_types[0] = "int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY";

$field_names[1] = "p_name";
$field_types[1] = "varchar(35) DEFAULT NULL";

$field_names[2] = "p_unit";
$field_types[2] = "varchar(15) DEFAULT NULL";

$field_names[3] = "p_type";
$field_types[3] = "varchar(10) DEFAULT NULL";

migrate_drop($table_name);
migrate_create($table_name, $field_names, $field_types);
//migrate_add($table_name, $field_names, $field_types);
//migrate_remove($table_name, $field_names);
