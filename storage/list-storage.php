<?php include"../header.php"; include"../nav.php";  
require_once"../factor/functions.php";
$aru = new aru(); 
$user = new user();
?>
<div class="content-wrapper">

	<?php
	breadcrumb();
	require_once"../product/functions.php";
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
	
	if(isset($_POST["update-factor_body"])){
		$fb_id_fininsh_row = $_POST["update-factor_body"];
		$aru->update("factor_body", $_POST, "fb_id", $fb_id_fininsh_row);
		$l_details = "اتمام سفارش";
		update_a_row_log_factor( $fb_id_fininsh_row ,  $l_details );	
	}

	


	if(isset($_POST["export_res"])){
		$export_to = 0;
		$export_to = $_POST["export_to"];
		if($_POST["export_to"]){
			$export_quantity = $_POST["export_quantity"];
			$export_from = $_POST["export_res"];
			$export_to = $_POST["export_to"];

			$old_quantity_from = get_var_query("select fb_quantity from factor_body where fb_id = $export_from");
			$old_quantity_to = get_var_query("select fb_quantity from factor_body where fb_id = $export_to");

			$new_quantity_from = $old_quantity_from - $export_quantity;
			$new_quantity_to = $old_quantity_to + $export_quantity;

			ex_query("update factor_body set fb_quantity = $new_quantity_from where fb_id = $export_from");
			ex_query("update factor_body set fb_quantity = $new_quantity_to where fb_id = $export_to");

			$home_dir = get_the_url();
			$l_details = "انتقال باقیمانده به فاکتور دیگر" ;
			update_a_row_log_factor( $export_from ,  $l_details );
			?>
			<script>
				alertify.set('notifier','position', 'bottom-right');
 				alertify.success('عملیات با موفقیت انجام شد');
			</script>
			<?php
			echo '<meta http-equiv="refresh" content="2"/>';

		}else{
			?>
			<script>
				alertify.set('notifier','position', 'bottom-right');
 				alertify.warning('لطفا ردیف فاکتور را انتخاب کنید');
			</script>
			<?php
			echo '<meta http-equiv="refresh" content="2"/>';
		}
	}
	?>

	<section class="content">
		<div class="row">
			<div class="col-xs-12">
				<div class="box">
					<div class="box-header">
						<h3 class="box-title">صدور حواله خروج</h3>
					</div>
					<div class="box-body">
						<table id="example1" class="table table-bordered table-striped">
							<thead>
								<tr>
									<th>#</th>
									<th>شماره فاکتور</th>
									<th>شماره ردیف</th>
									<th>نوع محصول</th>
									<th>نام محصول</th>
									<th>نام دسته بندی</th>
									<th>مقدار کل</th>
									<th>مقدار حواله شده</th>
									<th>مقدار ارسال شده</th>
									<th>مقدار باقی مانده</th>
									<th>عملیات</th>
								</tr>
							</thead>
							<tbody>
							<?php
							$u_level = $user->get_current_user_level();
							$i = 1;
							$status_final = 0;
							$sql = "select * from factor_body inner join factor on factor_body.f_id = factor.f_id where factor_body.fb_verify_finan != 0 order by fb_id DESC";
							$res = get_select_query($sql);
							foreach ($res as $row) { ?>
								<tr>
									<td><?php echo per_number($i); ?></td>
									<td><?php echo per_number($row['f_id']); ?></td>
									<td><?php echo per_number($row['fb_id']); ?></td>
									<td><?php echo $row['f_type']; ?></td>
									<td>
										<?php
										if($row['f_type']=="مواد اولیه"){
											echo get_material_name($row['p_id']);
										} else {
											echo per_number(get_product_name($row['p_id']));
										} ?>
									</td>
									<td><?php echo per_number(get_category_name($row['cat_id'])); ?></td>
									<td><?php echo per_number(number_format($row['fb_quantity'])); ?></td>
									<td><?php echo per_number(number_format($row['fb_amount_sent'])); ?></td>
									<td>
										<?php 
										$fb_id = $row['fb_id'];
										$sql1 = "select * from bar_bring where fb_id = $fb_id ";
										$res1 = get_select_query($sql1);
										$b = 0;
										if(count($res1)>0)
										{
											foreach($res1 as $row1)
											{
												$b += $row1['bar_exited'];
											}
										}
											echo per_number(number_format($b));
										?>
									</td>
									<td><?php echo per_number(number_format($row['fb_quantity']-$row['fb_amount_sent'])); ?></td>
									<td class="force-inline-text">
										<?php
										$fb_status = get_fb_status($row['fb_id']);
										if($fb_status){
										?>
										<button class="btn btn-sm btn-success disabled">سفارش کامل شد</button>
										<?php
										if($row['fb_quantity']-$row['fb_amount_sent'] > 0){
										?>
										<form action="" method="post" onSubmit="if(!confirm('آیا از انجام این عملیات اطمینان دارید؟')){return false;}">
											<input type="text" name="export_to" class="form-control" style="width: 100px; display: inline;" placeholder="ردیف فاکتور">
											<?php
											if($u_level=="مدیریت" || $u_level=="بازرگانی"){ ?>
												<button class="btn btn-warning btn-sm" name="export_res" value="<?php echo $row["fb_id"]; ?>">انتقال باقیمانده به فاکتور دیگر</button>
											<?php } 
											else {?>
												<button class="btn btn-warning btn-sm" disabled>انتقال باقیمانده به فاکتور دیگر</button>
											<?php } ?>
											<input type="hidden" name="export_quantity" value="<?php echo $row['fb_quantity']-$row['fb_amount_sent']; ?>">
										</form>
										<?php
										}
										?>
										<?php }
										else{ 
											if($u_level=="مدیریت" || $u_level=="بازرگانی"){ ?>
											<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#separate<?php echo $i; ?>">	تفکیک بار و صدور حواله خروج </button>
											<?php } 
											else { ?>
												<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" disabled >	تفکیک بار و صدور حواله خروج </button>
											<?php } ?>
										<form action="" method="post">
										<?php
										if($u_level=="مدیریت" || $u_level=="بازرگانی"){ ?>
											<button class="btn btn-sm btn-warning" name="update-factor_body" value="<?php echo $row["fb_id"]; ?>">اتمام سفارش</button>
										<?php }
										else { ?>
											<button class="btn btn-sm btn-warning" disabled>اتمام سفارش</button>
										<?php } ?>
											<input type="hidden" name="fb_status" value="1">
										</form>
										<?php } ?>
									</td>
								</tr>
								<?php
								$fb_status = get_fb_status($row['fb_id']);
								if(!$fb_status){
								?>
								<?php if($u_level=="مدیریت" || $u_level=="بازرگانی"){ ?>
								<div class="modal fade" role="dialog" id="separate<?php echo $i; ?>">
									<div class="modal-dialog">
										<div class="modal-content">
											<div class="modal-header">
												<h4 class="modal-title">تفکیک بار</h4>
												<button type="button" class="close" data-dismiss="modal">&times;</button>
											</div>
											<div class="modal-body">
												<div class="row">
												<form action="" method="post">
													<input type="hidden" name="fb_id" value="<?php echo $row['fb_id']; ?>">
													<div class="col-xs-12 invoice-col invoice-col-fixer">
														<span>مقدار فرستاده شده تاکنون : </span>
														<span class="label label-warning"><?php echo per_number(number_format(get_fb_amount_sent($row['fb_id']))); ?></span>
													</div>
													<div class="col-xs-12 invoice-col invoice-col-fixer">
														<span>چه مقدار فرستاده شود ؟ </span>
														<input id="add_to_fb_amount_sent<?php echo $i; ?>" type="text" name="add_to_fb_amount_sent" value="0" onkeyup="javascript:FormatNumber('add_to_fb_amount_sent<?php echo $i; ?>','add_to_fb_amount_sent2<?php echo $i; ?>');" placeholder="چه مقدار فرستاده شود ؟" class="form-control">
														<input id="add_to_fb_amount_sent2<?php echo $i; ?>" type="text" class="form-control" disabled="disabled" style="margin: 0;" />
													</div>
													<div class="col-xs-12 invoice-col invoice-col-fixer">
														<span>از کدام انبار فرستاده شود ؟</span>
														<select name="st_id_from" class="form-control">
															<?php
															$res = get_select_query("select * from storage_list where st_type = 'storage'");
															if(count($res)>0){
																foreach($res as $rowq){ ?>
																<option value="<?php echo $rowq['st_id']; ?>"><?php echo $rowq['st_name']; ?></option>
																<?php
																}
															}
															?>
														</select>
													</div>
													<input type="hidden" name="st_id_to" value="<?php echo $row["st_id_to"]; ?>">
													<div class="col-xs-12 invoice-col invoice-col-fixer">
														<button type="submit" class="btn btn-success" name="fb_separate<?php echo $i; ?>">تفکیک</button>
													</div>
													<?php
													if(isset($_POST['fb_separate' . $i])) {
														$cat_id = $row["cat_id"];
														$p_id = $row["p_id"];
														$fb_id = $_POST['fb_id'];
														$st_id_from = $_POST['st_id_from'];
														$st_id_to = $_POST['st_id_to'];
														$new_amount = $_POST['add_to_fb_amount_sent'];
														$old_amount = get_fb_amount_sent($fb_id);
														$update_amount = $old_amount + $new_amount;		
														$fb_type = "sale";
	
														if($update_amount > $row['fb_quantity']){
															?>
															<script>
																alertify.set('notifier','position', 'bottom-right');
																alertify.error('مقدار مجاز رعایت نشده است');
															</script>
															<?php
															echo "<meta http-equiv='refresh' content='0'/>";
														}else{
															update_amount_fb_factor($update_amount, $fb_id);
															insert_log_factor_amount($fb_id, $new_amount);
															
															$sql1 = "insert into bar_bring(fb_id, fb_type, bar_quantity, st_id_from, st_id_to, cat_id, p_id) values($fb_id, '$fb_type', $new_amount , $st_id_from, $st_id_to, $cat_id, $p_id)";
															ex_query($sql1);
														
															if($row['bar_quantity']==$update_amount){
																update_status_fb_factor($fb_id);
															}
															$l_details = "تفکیک بار";
															update_a_row_log_factor( $fb_id ,  $l_details );	
															$type = "sale3_driver";
															//send_sms_confirm($fb_id, $type);
															echo "<meta http-equiv='refresh' content='0'/>";
														}
													} ?>

												</form>
												</div>
											</div>
											<div class="modal-footer">
												<button type="button" class="btn btn-default" data-dismiss="modal">بستن</button>
											</div>
										</div>
									</div>
								</div>
								<?php } ?>
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
									<th>نوع محصول</th>
									<th>نام محصول</th>
									<th>نام دسته بندی</th>
									<th>مقدار کل</th>
									<th>مقدار حواله شده</th>
									<th>مقدار ارسال شده</th>
									<th>مقدار باقی مانده</th>
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
			$('#example2').DataTable({
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
