<?php include"../header.php"; include"../nav.php";
$user = new user();
?>
<div class="content-wrapper">

	<?php breadcrumb(); ?>

	<?php
	$u_level = $user->get_current_user_level();
	require_once"../product/functions.php";
	if(isset($_POST['tl_submit'])) {
		$user_id = $_SESSION['user_id'];
		$bar_id = $_POST['bar_id'];
		$dr_id = $_POST['dr_id'];
		$sql = "update bar_bring set dr_id = $dr_id where bar_id = $bar_id";
		ex_query($sql);
		$home_dir = get_the_url();
		?>
		<script>
			alertify.set('notifier','position', 'bottom-right');
			alertify.success('عملیات با موفقیت شد');
		</script>
		<?php
		echo '<meta http-equiv="refresh" content="2"/>';
		//send_sms_confirm($fb_id, $type);
	}

	if(isset($_POST['confirm_bar'])) {
		$l_id = $_POST['confirm_bar'];
		
		$sql = "update factor_log set fl_exit_bar = '1' where l_id = $l_id";
		ex_query($sql);
		insert_bar_bring_factor_v2($l_id);
		
		$type = "lab1";
		//send_sms_confirm($l_id, $type);
	}
	
	if(isset($_POST['save_exit_bar'])) {
		$exited_bar = $_POST['exited_bar'];
		$bar_id = $_POST['bar_id'];
		$sql = "update bar_bring set bar_exited = $exited_bar where bar_id = $bar_id";
		ex_query($sql);
		$l_details = "ثبت وزن نهایی";
		update_a_row_log_factor( $_POST['fb_id'] ,  $l_details );	
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
						<h3 class="box-title">خروجی انبار</h3>
					</div>
					<div class="box-body">
						<table id="example1" class="table table-bordered table-striped">
							<thead>
								<tr>
									<th>#</th>
									<th>شماره فاکتور</th>
									<th>شماره ردیف</th>
									<th>محصول</th>
									<th>دانه بندی</th>
									<th>مقدار</th>
									<th>راننده</th>
									<th>بارگیری</th>
									<th>آزمایشگاه</th>
								</tr>
							</thead>
							<tbody>
							<?php
							$i = 1;
							$status_final = 1;
							$sql = "select * from bar_bring ba inner join factor_body fb on ba.fb_id = fb.fb_id order by ba.bar_id DESC";
							$res = get_select_query($sql);
							foreach ($res as $row) { ?>
								<tr>
									<td><?php echo per_number($i); ?></td>
									<td><?php echo per_number($row['f_id']); ?></td>
									<td><?php echo per_number($row['fb_id']); ?></td>
									<td><?php echo per_number(get_product_name($row['p_id'])); ?></td>
									<td><?php echo per_number(get_category_name($row['cat_id'])); ?></td>
									<td><?php echo per_number(number_format($row['bar_quantity'])); ?></td>
									<td>
									<?php
									$driver_choose = $row['dr_id'];
									$fl_exit_bar = $row['bar_exited'];
									if($driver_choose > 0){
										if($fl_exit_bar > 0){
											?>
											<button class="btn btn-sm btn-success disabled">راننده انتخاب شده</button>
											<?php
										}else{
											?>
											<button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#selectdriver<?php echo $i; ?>">
												راننده انتخاب شده
											</button>
											<?php
										}
									}else{
										
										if($u_level=="مدیریت" || $u_level=="بازرگانی"){ ?>
											<button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#selectdriver<?php echo $i; ?>">انتخاب راننده</button>
										<?php } 
										else {?>
										<button class="btn btn-warning btn-sm" disabled>انتخاب راننده</button>
										<?php }
									}
									?>
									</td>
									<td>
										<?php
										$fl_exit_bar = $row['bar_exited'];
										$fb_id = $row['fb_id'];
										$selected_driver = $row['dr_id'];

										if($selected_driver == 0){
											?>
											<button class="btn btn-danger btn-sm" disabled">راننده انتخاب نشده </button>
											<?php
										}else{
											if($fl_exit_bar > 0){
												?>
												<button class="btn btn-success btn-sm disabled">بار خارج شده</button>
												<a class="btn btn-info btn-sm" href="print-transfer-form.php?bar_id=<?php echo $row['bar_id']; ?>">چاپ حواله خروج</a>
												<?php
											}else{
												?>
												<form style="display: inline-block" onSubmit="if(!confirm('آیا از انجام این عملیات اطمینان دارید؟')){return false;}" action="" method="post">
												<?php 
												if($u_level=="مدیریت" || $u_level=="بازرگانی"){ ?>
													<button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#exit_bar_modal<?php echo $row['bar_id']; ?>">ثبت وزن نهایی</button>
													<?php } 
												else { ?>
													<button class="btn btn-info btn-sm" disabled> ثبت وزن نهایی</button>
														<?php } ?>
												
													<div id="exit_bar_modal<?php echo $row['bar_id']; ?>" class="modal fade" role="dialog">
														<div class="modal-dialog">
															<div class="modal-content">
																<div class="modal-header">
																	<button type="button" class="close" data-dismiss="modal">&times;</button>
																	<h4 class="modal-title">ثبت وزن نهایی</h4>
																</div>
																<div class="modal-body">
																	<div class="row">
																		<form action="" method="post">
																			<input type="hidden" name="fb_id" value="<?php echo $fb_id; ?>">
																			<input type="hidden" name="bar_id" value="<?php echo $row['bar_id']; ?>">
																			<div class="col-xs-12">
																				<p>وزن نهایی بار شماره ردیف <?php echo per_number($fb_id); ?></p>
																			</div>
																			<div class="col-xs-12">
																				<input id="exited_bar" name="exited_bar" type="text" class="form-control" onkeyup="javascript:FormatNumber('exited_bar','exited_bar2');">
																				<input id="exited_bar2" type="text" class="form-control" disabled="disabled" style="margin: 0;" />
																			</div>
																			<div class="col-xs-12">
																				<br>
																				<button name="save_exit_bar" class="btn btn-success btn-sm">ذخیره</button>
																			</div>
																		</form>
																	</div>
																</div>
																<div class="modal-footer">
																	<button type="button" class="btn btn-default" data-dismiss="modal">بستن</button>
																</div>
															</div>
														</div>
													</div>
												</form>
												<?php
											}
										}
										?>
									</td>
									<td>
										<?php
										$bar_exited = $row['bar_exited'];
										$cycle_id = $row["bar_id"];
										$cycle = "sell";
										if($bar_exited != 0){ 
											$check_analyze = get_var_query("select count(analyze_id) from analyze_form where cycle = '$cycle' and cycle_id = $cycle_id");
											if($check_analyze > 0){ ?>
												<a class="btn btn-success btn-sm" href="<?php if($u_level=="مدیریت" || $u_level=="آزمایشگاه"){ ?>../lab/report-analyze.php?cycle=<?php echo $cycle; ?>&cycle_id=<?php echo $cycle_id; ?><?php }else{echo "#";} ?>">گزارش آزمون</a>
												<?php
											}
											else { ?>
												<a class="btn btn-info btn-sm" href="<?php if($u_level=="مدیریت" || $u_level=="آزمایشگاه"){ ?>../lab/form-analyze.php?cycle=<?php echo $cycle; ?>&cycle_id=<?php echo $cycle_id; ?><?php }else{echo "#";} ?>">فرم آزمایشگاه</a>
											<?php
											}
										}else{
											?>
											<button class="btn btn-danger btn-sm disabled">در انتظار تایید</button>
											<?php
										}
										?>
									</td>
								</tr>
								<?php if($u_level=="مدیریت" || $u_level=="بازرگانی"){ ?>
								<div class="modal fade" role="dialog" id="selectdriver<?php echo $i; ?>">
									<div class="modal-dialog">
										<div class="modal-content">
											<form action="" method="post">
												<div class="modal-header">
													<h4 class="modal-title">مشخصات راننده</h4>
													<button type="button" class="close" data-dismiss="modal">&times;</button>
												</div>
												<div class="modal-body">
													<div class="row">
														<div class="col-xs-12">
															<label>لیست راننده ها</label>
															<select dir="rtl" class="select2" name="dr_id">
																<?php
																$selected_driver = $row["dr_id"];
																$res1 = drivers();
																if(count($res1) > 0){
																	if($selected_driver == 0){
																		?>
																		<option selected value="0">انتخاب راننده...</option>
																		<?php
																	}
																	foreach ($res1 as $row1) {
																		$dr_plaque = $row1['dr_plaque'];
																		$dr_plaque_arr = explode(" ", $dr_plaque);
																		$dr_plaque_1 = $dr_plaque_arr[0];
																		$dr_plaque_2 = $dr_plaque_arr[1];
																		$dr_plaque_3 = $dr_plaque_arr[2];
																		$dr_plaque_4 = $dr_plaque_arr[3];
																		?>
																		<option <?php if($row1['dr_id'] == $selected_driver) echo "selected"; ?> value="<?php echo $row1['dr_id']; ?>"><?php echo $row1['dr_name'] . " " . $row1['dr_family'] . " (" . per_number($row1['dr_car']) . " (" . "<span>" .  per_number($dr_plaque_4) . "</span>&nbsp;-&nbsp;<span>" . per_number($dr_plaque_3) . "</span>&nbsp;<span>" . per_number($dr_plaque_2) . "</span>&nbsp;<span>" . per_number($dr_plaque_1) . "</span>" . ")) "; ?></option>
																		<?php
																	}
																} else { ?>
																	<option class="bg-danger">راننده ای در لیست وجود ندارد</option>
																<?php
																}
																?>
															</select>
														</div>		
													</div>
													<br>
													<div class="row">
														<div class="col-xs-12">
															<a class="btn btn-primary btn-sm" href="<?php echo get_url(); ?>driver/list-driver.php?cycle=factor">تعریف راننده جدید</a>
															<input type="hidden" name="bar_id" value="<?php echo $row['bar_id']; ?>"/>
														</div>
													</div>
												</div>
												<div class="modal-footer">
													<?php if($driver_choose > 0) {  ?>
													<input type="submit" class="btn btn-success" name="tl_submit" value="ویرایش">
													<?php } else { ?>
													<input type="submit" class="btn btn-success" name="tl_submit" value="انتخاب">
													<?php } ?>
													<button type="button" class="btn btn-default" data-dismiss="modal">بستن</button>
												</div>
											</form>
										</div>
									</div>
								</div>
								<?php } ?>
								<?php
									$i++;
								}
								?>
							</tbody>
							<tfoot>
								<tr>
									<th>#</th>
									<th>شماره فاکتور</th>
									<th>شماره ردیف</th>
									<th>محصول</th>
									<th>دانه بندی</th>
									<th>مقدار</th>
									<th>راننده</th>
									<th>عملیات</th>
									<th>آزمایشگاه</th>
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
