<?php
$table_name = "transfer_list";
$field_names = array();
$field_types = array();

$field_names[0] = "tl_id";
$field_types[0] = "int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY";

$field_names[1] = "u_id";
$field_types[1] = "int(11) DEFAULT NULL";

$field_names[2] = "fb_id";
$field_types[2] = "int(11) DEFAULT NULL";

$field_names[3] = "dr_id";
$field_types[3] = "int(11) DEFAULT NULL";

migrate_drop($table_name);
migrate_create($table_name, $field_names, $field_types);
//migrate_add($table_name, $field_names, $field_types);
//migrate_remove($table_name, $field_names);
