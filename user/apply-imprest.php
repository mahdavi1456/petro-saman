<?php include"../header.php"; include"../nav.php";
	$aru = new aru();
    $asb = $aru->get_list('points_ceiling','pc_id');
    $u_id = $_SESSION['user_id'];
    $rate_admin = get_var_query ("select sum(pr_admin_rate) from performance_rates where u_id = $u_id" );
    $rate_hr = get_var_query ("select sum(pr_hr_rate) from performance_rates where u_id = $u_id");
    $count = get_var_query ("select count(*) from performance_indexes");
    $rate = $rate_admin + $rate_hr;
    $total_points = $count * 200;
    $rate_percent = ($rate * 100) / ($total_points);
    $asb2 = get_select_query ("select * from apply_imprest where u_id = '$u_id'" );
    $home_dir = get_the_url();

?>
<div class="content-wrapper">
	<?php breadcrumb("" , "index.php"); ?>
	<section class="content pd-btm">
		<section class="box box-info">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">درخواست مساعده</h3>
                </div>
                <div class="row">
                    <div class="col-xs-12">
                        <div class="box">
                            <div class="box-header">
                                <h3 class="box-title">جدول سقف درخواست</h3>
                            </div>
                            <div class="box-body">
                                <table id="example1" class="table table-bordered table-striped center">
                                    <tbody>
                                        <tr>
                                            <td colspan="2">امتیاز شما : <?php if($rate != null){ echo per_number($rate_percent); } else { echo per_number(0); } ?> درصد</td>
                                        </tr>
                                        <tr>
                                            <td>مبلغ مساعده (ریال)</td>
                                            <td>امتیاز مورد نیاز</td>
                                        </tr>
                                        <?php
                                        if(count($asb) > 0){
                                            foreach($asb as $row) { ?>
                                                <tr>
                                                    <td><?php echo per_number(number_format($row['pc_amount'])); ?></td>
                                                    <td><?php echo per_number($row['pc_points_needed']); ?> درصد</td>
                                                </tr>
                                            <?php
                                            }
                                        } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div><br>
                <div class="box-body pd-btm pd-top">
                    <form action="" method="post">
                        <input id="u_id" type="hidden" name="u_id" value="<?php echo $u_id ; ?>" class="form-control">
                        <div id="details" class="col-xs-12 no-padd">
                            <div class="row">
                                <div class="item col-md-6">
                                    <div class="margin-tb input-group-prepend">
                                        <span class="input-group-text">تاریخ درخواست </span><span class="necessary">*</span>
                                    </div>
                                    <input name="ai_date" id="ai_date" type="text" autocomplete="off" class="form-control datepickerClass" value="<?php echo jdate('Y/n/j'); ?>" required>
                                </div>
                                <div class="item col-md-6">
                                    <div class="margin-tb input-group-prepend">
                                        <span class="input-group-text">مبلغ درخواست (ریال) </span><span class="necessary">*</span>
                                    </div>
                                    <input id="ai_amount" type="text" name="ai_amount" onkeyup="javascript:FormatNumber('ai_amount','ai_amount2'); calculate()" placeholder="مبلغ درخواست" class="form-control" autocomplete="off" required>
                                    <input id="ai_amount2" type="text" class="form-control" disabled="disabled" style="margin: 0;" />
                                </div>
                                <div class="item col-md-12">
                                    <div class="margin-tb input-group-prepend">
                                        <span class="input-group-text">توضیحات</span>
                                    </div>
                                    <input id="ai_details" type="text" rows="3" name="ai_details" placeholder="توضیحات" class="form-control">
                                </div></br>
                                <?php 
                                if(isset($_POST['add-apply_imprest'])) {
                                    $ai_date = $_POST['ai_date'] ;
                                    $ai_amount = $_POST['ai_amount'] ;
                                    $ai_details = $_POST['ai_details'] ;
                                    $u_id = $_POST['u_id'] ;
                                    $res5 = get_select_query("select * from points_ceiling where pc_amount >= $ai_amount and pc_points_needed <= $rate_percent ");
                                    if(count($res5) >0 ){
                                        $sql = ex_query("insert into apply_imprest (u_id, ai_date, ai_amount, ai_details) values ($u_id , '$ai_date', $ai_amount, '$ai_details')");
                                        ?>
                                        <script>
                                            alertify.set('notifier','position', 'bottom-right');
                                            alertify.success('مورد با موفقیت ثبت شد');
                                        </script>
                                        <?php
                                        echo '<meta http-equiv="refresh" content="2"/>';
                                    }
                                    else {
                                        ?>
                                        <script>
                                            alertify.set('notifier','position', 'bottom-right');
                                            alertify.error('امتیاز شما برای این مساعده کافی نمی باشد');
                                        </script>
                                        <?php
                                        echo '<meta http-equiv="refresh" content="2"/>';
                                    }
                                }
                                ?>
                                <div class="item col-md-2 text-left">
                                    <input type="submit" class="btn btn-success" name="add-apply_imprest" value="اضافه کردن" style="width:100%;">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
		</section>
	</section>
    <section class="content pd-top">
		<div class="row">
			<div class="col-xs-12">
				<div class="box">
					<div class="box-header">
						<h3 class="box-title">لیست درخواست های مساعده</h3>
					</div>
					<div class="box-body">
						<table id="example1" class="table table-bordered table-striped">
							<thead>
								<tr>
									<th>ردیف</th>
									<th>تاریخ درخواست</th>
									<th>مبلغ درخواست (ریال)</th>
                                    <th>توضیحات</th>
									<th>عملیات</th>
								</tr>
							</thead>
							<tbody>
								<?php
                                $i = 1;
                                if(count($asb2) > 0){
                                    foreach ($asb2 as $a){ ?>
                                        <tr>
                                            <td><?php echo per_number($i); ?></td>
                                            <td><?php echo  per_number(str_replace("-", "/", $a['ai_date'])); ?></td>
                                            <td><?php echo per_number(number_format($a['ai_amount'])); ?></td>
                                            <td><?php echo per_number($a['ai_details']); ?></td>
                                            <td>
                                                <form action="" method="post" onSubmit="if(!confirm('آیا از انجام این عملیات اطمینان دارید؟')){return false;}">
                                                    <button class="btn btn-danger btn-xs" type="submit" name="delete-list" id="delete-list">حذف</button>
                                                        <input class="hidden" type="text" name="delete-text" id="delete-text" value="<?php echo $a['ai_id']; ?>">
                                                        <?php
                                                            if(isset($_POST['delete-list'])){
                                                                $ai_id = $_POST['delete-text'];
                                                                $aru->remove('apply_imprest','ai_id', $ai_id,'int');
                                                                exit();
                                                            }
                                                        ?>
                                                </form>
                                            </td>
                                        </tr>
                                        <?php
                                        $i++;
                                    } 
                                }
                                else { ?>
                                    <td colspan="12">داده ای موجود نیست...</td>
                                    <?php 
                                } ?> ?>
							</tbody>
                            <tfoot>
                                <tr>
                                    <th>ردیف</th>
									<th>تاریخ درخواست</th>
									<th>مبلغ درخواست (ریال)</th>
                                    <th>توضیحات</th>
									<th>عملیات</th>
                                </tr>
						    </tfoot>
						</table>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>
<div class="control-sidebar-bg"></div>
<script src="../plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../plugins/datatables/dataTables.bootstrap.min.js"></script>
<script>
	$(function() {
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
<?php include"../left-nav.php"; include"../footer.php"; ?>								