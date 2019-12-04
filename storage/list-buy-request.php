<?php include"../header.php"; include"../nav.php"; $u_level = get_current_user_level(); $aru = new aru(); ?>

<div class="content-wrapper">

	<?php
	breadcrumb();
	
	require_once"../product/functions.php";

	if(isset($_POST['buy_material_in_submit'])) {
		$fb_id = $_POST['fb_id'];
		$fb_quantity = get_var_query("select fb_quantity from factor_buy_body where fb_id = $fb_id");
		$new_amount = $_POST['add_to_fb_amount_get'];
		$old_amount = get_var_query("select fb_amount_get from factor_buy_body where fb_id = $fb_id");
		
		$update_amount = $old_amount + $new_amount;
		if($update_amount < $fb_quantity){
        	ex_query("update factor_buy_body set fb_amount_get = $update_amount where fb_id = $fb_id");
		}else{
			alert("alert-danger", "مقدار از حد مجاز فاکتور خرید بیشتر است");
		}
	}
											
	if(isset($_POST['tl_submit'])) {
		$user_id = $_SESSION['user_id'];
		$fb_id = $_POST['fb_id'];
		$fl_id = $_POST['fl_id'];
		$dr_id = $_POST['dr_id'];
		$sql = "update factor_log set fl_driver_id = $dr_id where l_id = $fl_id";
		ex_query($sql);
		
		$type = "sale3_loading";
		send_sms_confirm($fb_id, $type);
	}

	if(isset($_POST['confirm_bar'])) {
		$l_id = $_POST['confirm_bar'];
		$sql = "update factor_log set fl_exit_bar = '1' where l_id = $l_id";
		ex_query($sql);
		insert_bar_bring_factor_v2($l_id);
		
		$type = "lab1";
		send_sms_confirm($l_id, $type);
	}

	if(isset($_POST['fl_admin_confirm'])) {
		$l_id = $_POST['fl_admin_confirm'];
		$sql = "update factor_log set fl_admin_confirm = '1' where l_id = $l_id";
		ex_query($sql);
		insert_bar_bring_factor_v2($l_id);
	}
	?>

	<section class="content">
		<div class="row">
			<div class="col-xs-12">
				<div class="box">
					<div class="box-header">
						<h3 class="box-title">لیست بارهای خریداری شده</h3>
					</div>
					<div class="box-body">
						<table id="example1" class="table table-bordered table-striped">
							<thead>
								<tr>
									<th>ردیف</th>
									<th>پیش فاکتور</th>
									<th>سطر</th>
									<th>محصول</th>
									<th>دانه بندی</th>
									<th>مقدار کل</th>
									<th>دریافت شده</th>
									<th>مقدار باقی مانده</th>
									<th>نوع خرید</th>
									<th>عملیات</th>
								</tr>
							</thead>
							<tbody>
							<?php
							$i = 1;
							$status_final = 1;
							$sql = "select * from factor_buy_body where fb_outsourcing in ('yes', 'no') order by fb_id ASC";
							$res = get_select_query($sql);
							foreach ($res as $row) { ?>
								<tr>
									<td><?php echo per_number($i); ?></td>
									<td><?php echo per_number($row['f_id']); ?></td>
									<td><?php echo per_number($row['fb_id']); ?></td>
									<td><?php echo get_product_name($row['ma_id']); ?></td>
									<td><?php echo get_category_name($row['cat_id']); ?></td>
									<td><?php echo per_number(number_format($row['fb_quantity'])); ?></td>
									<td><?php echo per_number(number_format($row['fb_amount_get'])); ?></td>
									<td><?php echo per_number(number_format($row['fb_quantity']-$row['fb_amount_get'])); ?></td>
									<td>
										<?php
										$buy_type = $row['fb_outsourcing'];
										if($buy_type=="yes"){
											echo "برون سپاری";
										} else if($buy_type=="no") {
											echo "خرید مستقیم";
										}
										?>
									</td>
									<td class="force-inline-text">
										
										<button type="button" class="btn btn-info" data-toggle="modal" data-target="#stModal<?php echo $i; ?>">گزارش ورودی</button>
										<br>
										بازده سفارش <label class="btn btn-sm btn-success"><?php echo per_number(100 * $row['fb_amount_get'] / $row['fb_quantity']); ?> ٪</label>
										
                                       
									</td>
								</tr>		
								<div id="stModal<?php echo $i; ?>" class="modal fade" role="dialog">
									<div class="modal-dialog">
										<div class="modal-content">
											<div class="modal-header">
												<button type="button" class="close" data-dismiss="modal">&times;</button>
												<h4 class="modal-title">گزارش ورودی</h4>
											</div>
											<div class="modal-body">
												
												<div class="table table-bordered">
													<ul>
													<?php
													$j = 1;
													$fb_id = $row['fb_id'];
													$sql_storage = "select * from bar_bring where fb_id = $fb_id";
													$res_storage = get_select_query($sql_storage);
													if(count($res_storage) > 0){ ?>
														
														<?php
														foreach($res_storage as $row_st){
															?>
															<li>
																<b>ردیف</b>: <?php echo per_number($j); ?> &nbsp&nbsp
																<b>انبار</b>: <?php echo per_number($row_st['st_id']); ?>&nbsp&nbsp
																<b>راننده</b>: <?php echo get_driver_name($row_st['dr_id']); ?>&nbsp&nbsp
																<b>وزن بار</b>: <?php echo per_number(number_format($row_st['bar_exited'])); ?>&nbsp&nbsp
																<b>تاریخ</b>: <?php echo per_number($row_st['bar_date']); ?>&nbsp&nbsp
																<b>ساعت</b>: <?php echo per_number($row_st['bar_time']); ?>&nbsp&nbsp
															</li><hr>
															<?php
															$j++;
														}
													} else {
														?>
														<li>
															<b class="text-center">ورودی بار این ردیف صفر می باشد</b>
														</li>
														<?php
													}
													?>
													</ul>
												</div>
												
											</div>
											<div class="modal-footer">
												<button type="button" class="btn btn-default" data-dismiss="modal">بستن</button>
											</div>
										</div>
									</div>
								</div>
								<?php
									$i++;
								}
								?>
							</tbody>
							<tfoot>
								<tr>
									<th>ردیف</th>
									<th>پیش فاکتور</th>
									<th>سطر</th>
									<th>محصول</th>
									<th>دانه بندی</th>
									<th>مقدار کل</th>
									<th>دریافت شده</th>
									<th>مقدار باقی مانده</th>
									<th>نوع خرید</th>
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
<script src="<?php get_url(); ?>/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php get_url(); ?>/plugins/datatables/dataTables.bootstrap.min.js"></script>
<script>
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
<?php include"../left-nav.php"; include"../footer.php"; ?>
