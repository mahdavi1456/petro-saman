<?php
include_once '../../../includes.php';

function migrate_create($table_name, $field_names, $field_types){
    $c = count($field_names);
    $sql = "CREATE TABLE " . $table_name . " (";
    for($i = 0; $i < $c; $i++){
        $sql .= $field_names[$i] . "  " . $field_types[$i];
        if($i != $c - 1){
            $sql .= ", ";
        }
    }
    $sql .= ")";
    ex_query($sql);
    echo "Table " . $table_name . " Created! <br>";
}

function migrate_remove($table_name, $field_names){
    $sql_remove = "SHOW COLUMNS  FROM " . $table_name;
    $res_remove = get_select_query($sql_remove);
    foreach($res_remove as $row){
        if(!in_array($row['Field'], $field_names)){
            ex_query("ALTER TABLE " . $table_name . " DROP COLUMN " . $row['Field']);
            echo $row['Field'] . " Removed!";
        }
    }
}

function migrate_add($table_name, $field_names, $field_types){
    $c = count($field_names);
    for($i = 0; $i < $c; $i++){
        $sql_check_c = "SHOW COLUMNS FROM " . $table_name . " LIKE '" . $field_names[$i] . "'";
        if(count(get_select_query($sql_check_c)) == 0){
            $sql_alter = "ALTER TABLE " . $table_name . " ";
            $sql_alter .= "ADD COLUMN " . $field_names[$i] . "  " . $field_types[$i];
            ex_query($sql_alter);
            echo $field_names[$i] . " added <br>";
        }
    }
}

function migrate_drop($table_name){
    $sql_drop = "DROP TABLE " . $table_name;
    ex_query($sql_drop);
}

include "user.php";
include "stock_log.php";
include "bar_bring.php";
include "category.php";
include "customer.php";
include "driver.php";
include "factor.php";
include "factor_body.php";
include "factor_buy.php";
include "factor_log.php";
include "group_info.php";
include "group_log.php";
include "media.php";
include "partners.php";
include "partner.php";
include "payroll.php";
include "product.php";
include "raw_rights.php";
include "schedule.php";
include "stock.php";
include "store.php";
include "transfer_list.php";
include "shifts.php";
include "produce.php";
include "analyze_form.php";
include "raw_material.php";
include "hse_item.php";
include "hse_rates.php";