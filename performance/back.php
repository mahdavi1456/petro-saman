<?php
include"../includes.php";
$aru = new aru();
$asb = $aru->get_list('performance_indexes','pi_id');
//$home_dir = get_the_url();
if(isset($_POST['list'])) {
    $list = $_POST['list'];
    parse_str($list, $n);
    foreach($n as $key => $value) {        
        $date = $_POST['date'];
        $pi_id = explode('_', $key)[3];
        $u_id = $_POST['u_id'];
        $pr_fromdate = $_POST['pr_fromdate'];
        $pr_todate = $_POST['pr_todate'];
        if($_POST['u_id'] != ""  &&  $_POST['pr_fromdate'] != "" &&  $_POST['pr_todate'] != "") {
            if($n['pr_admin_rate_' . $pi_id] != "") {
                $pr_admin_rate = $n['pr_admin_rate_' . $pi_id];
                $sql = get_select_query("select * from performance_rates where u_id = $u_id and pi_id = $pi_id and pr_fromdate = '$pr_fromdate' and pr_todate = '$pr_todate' ");
                if(count($sql) > 0) {
                    $res1 = ex_query("update performance_rates set pr_admin_rate = $pr_admin_rate , pr_admin_date = '$date' where u_id = $u_id and pi_id = $pi_id and pr_fromdate = '$pr_fromdate' and pr_todate = '$pr_todate'  ");
                }
                else {
                    $res2 = ex_query("insert into performance_rates(u_id, pi_id, pr_fromdate, pr_todate, pr_admin_rate, pr_admin_date) values($u_id, $pi_id, '$pr_fromdate', '$pr_todate', $pr_admin_rate , '$date' )");
                }
            }

            if($n['pr_hr_rate_' . $pi_id] != "") {
                $pr_hr_rate = $n['pr_hr_rate_' . $pi_id];
                $sql = get_select_query("select * from performance_rates where u_id = $u_id and pi_id = $pi_id and pr_fromdate = '$pr_fromdate' and pr_todate = '$pr_todate' ");
                if(count($sql) > 0) {
                    $res1 = ex_query("update performance_rates set pr_hr_rate = $pr_hr_rate , pr_hr_date = '$date' where u_id = $u_id and pi_id = $pi_id and pr_fromdate = '$pr_fromdate' and pr_todate = '$pr_todate'  ");
                }
                else {
                    $res2 = ex_query("insert into performance_rates(u_id, pi_id, pr_fromdate, pr_todate, pr_hr_rate, pr_hr_date) values($u_id, $pi_id, '$pr_fromdate', '$pr_todate', $pr_hr_rate , '$date' )");
                }
                //echo "<div class='alert-aru col-xs-12'><div class='alert alert-success col-xs-6'>ارزیابی ثبت شد</div></div>";
            }
        }
        else {
           // echo "<div class='alert-aru col-xs-12'><div class='alert alert-success col-xs-6'><img src='$home_dir/dist/img/check4.gif'>اطلاعات لازم را وارد کنید</div></div>";
        }    

    }
}

if(isset($_POST['load_data'])) {
    $u_id = $_POST['u_id'];
    $pr_fromdate = $_POST['pr_fromdate'];
    $pr_todate = $_POST['pr_todate'];   
    $u_level = $_POST['u_level']; 
    if($_POST['u_id'] != ""  &&  $_POST['pr_fromdate'] != "" &&  $_POST['pr_todate'] != "") {
        ?>
        <table id="index-inputs" class="col-xs-12 table table-striped table-bordered table-responsive performance_rates_table">                        
            <thead>
                <tr>
                    <th colspan="5" class="center">شاخص های ارزیابی</th>
                    <th colspan="2" class="center">سقف امتیاز شاخص</th>
                    <th colspan="12" class="center">امتیاز مکتسبه</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if(count($asb) > 0){
                    foreach ($asb as $row) {
                        $pi_id = $row['pi_id'];
                        $sql = get_select_query("select * from performance_rates where u_id = $u_id and pi_id = $pi_id and pr_fromdate = '$pr_fromdate' and pr_todate = '$pr_todate' ");
                        ?>
                        <tr>
                            <td colspan="5" class="center">
                                <?php echo per_number($row['pi_name']); ?>                                                    
                            </td>
                            <td colspan="2" class="center">100</td>    
                            <td colspan="1" class="center">مدیریت</td> 
                            <td colspan="5">       
                                <?php
                                if($u_level == "مدیریت"){ ?>
                                    <input type="text" id="pr_admin_rate_<?php echo $row['pi_id']; ?>"  name="pr_admin_rate_<?php echo $row['pi_id']; ?>" value="<?php if(count($sql) > 0) { echo $sql[0]['pr_admin_rate']; } ?>"  class="form-control">
                                    <?php 
                                } 
                                else { ?>
                                    <input type="text"  id="pr_admin_rate_<?php echo $row['pi_id']; ?>"  name="pr_admin_rate_<?php echo $row['pi_id']; ?>"  value="<?php if(count($sql) > 0) { echo $sql[0]['pr_admin_rate']; } ?>" class="form-control" readonly>
                                    <?php 
                                } ?>                                                            
                            </td>
                    
                            <td colspan="1" class="center">منابع انسانی</td> 
                            <td colspan="5">  
                                <?php 
                                if($u_level == "منابع انسانی"){ ?>
                                    <input type="text" id="pr_hr_rate_<?php echo $row['pi_id']; ?>"  name="pr_hr_rate_<?php echo $row['pi_id']; ?>" value="<?php if(count($sql) > 0) { echo $sql[0]['pr_hr_rate']; } ?>" class="form-control">
                                    <?php
                                } 
                                else { ?>
                                    <input type="text" id="pr_hr_rate_<?php echo $row['pi_id']; ?>"  name="pr_hr_rate_<?php echo $row['pi_id']; ?>" value="<?php if(count($sql) > 0) { echo $sql[0]['pr_hr_rate']; } ?>" class="form-control" readonly>
                                    <?php
                                } ?>
                            </td>
                    
                        </tr>
                        <?php
                    }
                }
                ?>
            </tbody>
            <tfoot>
                <tr>
                    <th colspan="5" class="center">شاخص های ارزیابی</th>
                    <th colspan="2" class="center">سقف امتیاز شاخص</th>
                    <th colspan="12" class="center">امتیاز مکتسبه</th>
                </tr>
            </tfoot>
        </table>
        <?php
    }    
}


exit();
