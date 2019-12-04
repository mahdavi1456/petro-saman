<?php
$table_name = "media";
$field_names = array();
$field_types = array();

$field_names[0] = "m_id";
$field_types[0] = "int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY";

$field_names[1] = "m_name";
$field_types[1] = "varchar(50) NOT NULL";

$field_names[2] = "m_type";
$field_types[2] = "varchar(50) DEFAULT NULL";

$field_names[3] = "m_name_file";
$field_types[3] = "varchar(50) NOT NULL";

$field_names[4] = "bu_id";
$field_types[4] = "int(11) NOT NULL";

migrate_drop($table_name);
migrate_create($table_name, $field_names, $field_types);
//migrate_add($table_name, $field_names, $field_types);
//migrate_remove($table_name, $field_names);
