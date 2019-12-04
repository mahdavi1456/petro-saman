<?php
$table_name = "raw_material";
$field_names = array();
$field_types = array();

$field_names[0] = "rm_id";
$field_types[0] = "int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY";

$field_names[1] = "rm_name";
$field_types[1] = "varchar(20) DEFAULT NULL";

$field_names[2] = "rm_unit";
$field_types[2] = "varchar(20) DEFAULT NULL";


migrate_drop($table_name);
migrate_create($table_name, $field_names, $field_types);
//migrate_add($table_name, $field_names, $field_types);
//migrate_remove($table_name, $field_names);
