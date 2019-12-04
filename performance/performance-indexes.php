<?php include"../header.php"; include"../nav.php";
    $aru = new aru();
    $user = new user();
    $u_level = $user->get_current_user_level();
    $asb = $aru->get_list('performance_indexes','pi_id');
    $asb2 = $aru->get_list('user','u_id');
    $home_dir = get_the_url();
?> 
<div class="content-wrapper">
	
	<?php breadcrumb("فرم ارزیابی"); ?>
	
	<section class="content pd-btm">
		<section class="box box-info">
			<div class="box-header">
				<h3 class="box-title">فرم ارزیابی</h3>
            </div>
    		<div class="box-header with-border">
				<div class="box-body pd-btm pd-top">
                    <div class="row">
                        <div class="col-xs-12 table-responsive">
                            <div class="row">
                                <div class="item col-md-4">
                                    <input type="hidden" id="date" value="<?php echo jdate('Y/m/d'); ?>">
                                    <input type="hidden" id="u_level" value="<?php echo $u_level; ?>">
                                    <label>نام و نام خانوادگی</label>
                                    <select class="form-control" id="u_id" name="u_id">
                                        <?php
                                        if(count($asb2) > 0){
                                            foreach ($asb2 as $a2){ ?>
                                                <option value="<?php echo $a2['u_id']; ?>"><?php echo $a2["u_name"] . " " . $a2["u_family"]; ?></option>
                                                <?php
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="item col-xs-3">
                                    <label>از تاریخ</label>
                                    <input name="pr_fromdate" id="pr_fromdate" type="text" autocomplete="off" class="form-control datepickerClass" >
                                </div>
                                <div class="item col-xs-3">
                                    <label>تا تاریخ</label>
                                    <input name="pr_todate" id="pr_todate" type="text" autocomplete="off" class="form-control datepickerClass" >
                                </div>
                                <div class="item col-xs-2"><br><br>
                                    <button type="submit" id="load-data" class="btn btn-info btn-sm">انتخاب</button>
                                </div>
                            </div>
                            <div id="result">
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
                                                                        <input type="text" id="pr_admin_rate_<?php echo $row['pi_id']; ?>"  name="pr_admin_rate_<?php echo $row['pi_id']; ?>"  class="form-control">
                                                                        <?php 
                                                                    } 
                                                                    else { ?>
                                                                        <input value="0" type="text"  id="pr_admin_rate_<?php echo $row['pi_id']; ?>"  name="pr_admin_rate_<?php echo $row['pi_id']; ?>"  class="form-control" readonly>
                                                                        <?php 
                                                                    } ?>                                                            
                                                                </td>
                                                        
                                                                <td colspan="1" class="center">منابع انسانی</td> 
                                                                <td colspan="5">  
                                                                    <?php 
                                                                    if($u_level == "منابع انسانی"){ ?>
                                                                        <input type="text" id="pr_hr_rate_<?php echo $row['pi_id']; ?>"  name="pr_hr_rate_<?php echo $row['pi_id']; ?>"  class="form-control">
                                                                        <?php
                                                                    } 
                                                                    else { ?>
                                                                        <input type="text" value="0" id="pr_hr_rate_<?php echo $row['pi_id']; ?>"  name="pr_hr_rate_<?php echo $row['pi_id']; ?>" class="form-control" readonly>
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
                                        </div>
                                    <button type="submit" class="btn btn-success" id="add-performance_rates" name="add-performance_rates">ثبت ارزیابی</button>
                                </div>
                            
                        </div>
                        <?php
                    ?>


                </div>
			</div>
		</section>
	</section>
</div>
<div class="control-sidebar-bg"></div>
<script type="text/javascript">
	$(function () {
		$('#example1').DataTable({
			"paging": true,
			"lengthChange": false,
			"searching": false,
			"ordering": false,
			"info": true,
			"autoWidth": false
		});
	});
</script>

<script type="text/javascript">
    $(document).ready(function(){
        
        $('#add-performance_rates').click(function(){
            var list = $('#index-inputs *').serialize();
            var u_id = $('#u_id').find('option:selected').val();
            var pr_fromdate = $('#pr_fromdate').val();
            var pr_todate = $('#pr_todate').val();
            var date = $('#date').val();
            $.post("back.php", {list:list, u_id:u_id, pr_fromdate:pr_fromdate, pr_todate:pr_todate, date:date}, function(data){
                $('#result1').html(data);
            });
        });

        $('#load-data').click(function(){
            $('#result').html("Loading...");
            var u_id = $('#u_id').find('option:selected').val();
            var pr_fromdate = $('#pr_fromdate').val();
            var pr_todate = $('#pr_todate').val();
            var u_level = $('#u_level').val();
            $.post("back.php", {load_data:1, u_id:u_id, pr_fromdate:pr_fromdate, pr_todate:pr_todate, u_level:u_level}, function(data){
                $('#result').html(data);
            });
        });

    });
</script>
<?php include"../left-nav.php"; include"../footer.php"; ?>