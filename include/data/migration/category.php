<?php
$table_name = "category";
$field_names = array();
$field_types = array();

$field_names[0] = "cat_id";
$field_types[0] = "int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY";

$field_names[1] = "cat_name";
$field_types[1] = "varchar(35) DEFAULT NULL";

migrate_drop($table_name);
migrate_create($table_name, $field_names, $field_types);
//migrate_add($table_name, $field_names, $field_types);
//migrate_remove($table_name, $field_names);
