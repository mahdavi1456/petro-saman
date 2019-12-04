<?php include"../header.php"; include"../nav.php";
	require_once"../customer/functions.php";
	$aru = new aru();
	$sms = new sms();
	$media = new media();
	$user = new user();
	$res = list_factor_body();

	if(isset($_POST['add-returned_factor'])) {
	    if ($_POST['re_weight'] > $_POST['add-returned_factor']) {
        	echo "<div class='alert-aru col-xs-12'><div class='alert alert-danger col-xs-6'><img src='$home_dir/dist/img/check4.gif'>وزن بیش از حد مجاز است</div></div>";
			echo '<meta http-equiv="refresh" content="2"/>';
	    }
	    else {
		$aru->add("returned_factor", $_POST);
		$l_details = "مرجوع بار";
		update_a_row_log_factor($_POST['fb_id'], $l_details);
		echo "<meta http-equiv='refresh' content='0'/>"; 
	    }
	}
	if(isset($_POST['verify_submit'])) {
		$array2 = array();
		$verify = $_POST['type_confirm'];
		$fb_id_verify = $_POST['fb_id'];
		$l_details = $_POST['l_details'];
		$echo_type =  $_POST['echo_type'];
		$date_verify_finan = $_POST['date_verify_finan'];
		if ($verify=="fb_verify_finan"){
			$u_id = get_current_user_id();
			$sql = "update factor_body set $verify = '$u_id' , 	date_verify_finan='$date_verify_finan' where fb_id = $fb_id_verify  ";
			$res = ex_query($sql);
		}
		else {
		    update_a_row_fb_factor($verify, $fb_id_verify);
		   // update_a_row_log_factor($fb_id_verify, $l_details);
		}
		update_a_row_log_factor($fb_id_verify, $l_details);
		update_a_row_log_factor($fb_id_verify, $echo_type );
		$sms->send_sms_confirm($fb_id_verify, $verify);
	}

	if(isset($_POST['f_update'])) {
		$array = array();
		array_push($array, $_POST['p_id']);
		array_push($array, $_POST['p_name']);
		array_push($array, $_POST['p_cat']);
		array_push($array, $_POST['p_unit']);
		update_factor($array);
		echo "<meta http-equiv='refresh' content='0'/>";
	}
	
	$u_level = $user->get_current_user_level();
?>
<div class="content-wrapper">

	<?php breadcrumb("لیست پیشنهادات فروش"); ?>

	<section class="content">
		<div class="row">
			<div class="col-xs-12">
				<div class="box">
					<div class="box-body">
						<table id="example1" class="table table-bordered table-striped">
							<thead>
								<tr>
									<th>ردیف</th>
									<th>فاکتور</th>
									<th>شماره آیتم</th>
									<th>مشتری</th>
									<th>پیش فاکتور</th>
									<th>تایید مدیر</th>
									<th>تایید مسئول فروش</th>
									<th>تایید مالی</th>
									<th>عملیات</th>
								</tr>
							</thead>
							<tbody>
							<?php
							$i = 1;
								$res = list_factor_body();
								if($res){
								foreach ($res as $row) {
									$fb_id = $row['fb_id'];
									$f_id = $row['f_id'];
									?>
								<tr>
									<td><?php echo per_number($i); ?></td>
									<td><?php echo per_number($row['f_id']); ?></td>
									<td><?php echo per_number($row['fb_id']); ?></td>
									<td><?php echo get_customer_name($row['c_id']); ?></td>
									<td>
										<a class="btn btn-primary btn-xs" href="reg-factor.php?f_id=<?php echo $f_id; ?>&c_id=<?php echo $row['c_id']; ?>&fb_id=<?php echo $fb_id; ?>">ویرایش</a>
									</td>
									<td>
									<?php
										if($u_level=="مدیریت"){ 
											show_btn_list_factor($row['fb_verify_admin1'], "confirm-factor.php?fb_id=" . $fb_id . "&typee=fb_verify_admin1");
										}else{
											show_btn_list_factor($row['fb_verify_admin1'], "#");
										} ?>
									</td>
									<td>
									<?php
									if($row['fb_verify_admin1'] != 0) {
										if($u_level=="مدیریت" || $u_level=="بازرگانی"){
											show_btn_list_factor($row['fb_verify_customer'], "confirm-factor.php?fb_id=" . $fb_id . "&typee=fb_verify_customer");
										}else{
											show_btn_list_factor($row['fb_verify_customer'], "#");
										}
									} else { ?>
										<button class="btn btn-xs btn-dark" disabled>منتظر</button>
									<?php
									}
									?>
									</td>
									<td>
									<?php
									$fb_id = $row['fb_id'];
									$m_type = "pre_invoice_sale";
									$m_name_file = "check";
									$sql = "select * from media where bu_id = $fb_id and m_type = '$m_type' and m_name_file = '$m_name_file'";
									$ok = count(get_select_query($sql));
									if($row['fb_verify_customer'] != 0) {
										if($u_level=="مدیریت" || $u_level=="امور مالی"){
											show_btn_list_factor($row['fb_verify_finan'], "confirm-factor.php?fb_id=" . $fb_id . "&typee=fb_verify_finan");
										}else{
											show_btn_list_factor($row['fb_verify_finan'], "#");
										}
									}else{ ?>
										<button class="btn btn-xs btn-dark" disabled>منتظر</button>
									<?php
									}
									?>
									</td>
									<td>
										<form style="display: inline-block" action="" method="post" onSubmit="if(!confirm('آیا از انجام این عملیات اطمینان دارید؟')){return false;}">
											<!--a class="btn btn-info btn-xs" href="edit-factor.php?id=<?php //echo $row['fb_id']; ?>">ویرایش</a-->
											<a class="btn btn-info btn-xs" href="log-factor.php?fb_id=<?php echo $row['fb_id']; ?>">تاریخچه</a>
											<?php 
											if($u_level == "مدیریت"){ ?>
												<button class="btn btn-danger btn-xs" type="submit" name="delete-list" id="delete-list">حذف</button>
											<?php } 
											else {?>
												<button class="btn btn-danger btn-xs" type="submit" id="delete-list" disabled>حذف</button>
											<?php 
											}?>
											<input class="hidden" type="text" name="delete-text" id="delete-text" value="<?php echo $row['fb_id']; ?>">
											<?php
											$aru = new aru();
											if(isset($_POST['delete-list'])){
												$fb_id = $_POST['delete-text'];
												$sms->send_sms_confirm($fb_id, "fb_sale_delete");
												$aru->remove("factor_body", "fb_id", $fb_id, "int");
												$aru->remove("factor_log", "fb_id", $fb_id, "int");
												$sql2 = "select * from media_factor where fb_id = $fb_id and mf_type = 'sale' ";
												$res2 = get_select_query($sql2);
												if(count($res2)>0) {
													foreach($res2 as $row2){
														$media->delete_factor_media($row2['mf_id'] , $row2['mf_link']);
													}
												}
												$l_details = "حذف فاکتور فروش";
												update_a_row_log_factor($fb_id, $l_details );
												echo "<meta http-equiv='refresh' content='0'/>";
												exit();
											}
											?>
										</form>

										
										<?php 
										$g = new gt_date();
										$date1 = $row['date_verify_finan'];
										$date2 = jdate("Y-m-j");
										$b = 0;
										$diff = $g->time_diff($date2, $date1);
										if($diff <= 7) {
											$res1 = $aru->list_by_type("returned_factor", "fb_id", $row['fb_id'], "int", "fb_id");
											if($res1){
											    foreach($res1 as $row1)
											    {
											      $a = $row1['re_weight'];
											        $b += $a;
											    }
											}
											if($row['fb_quantity']==$b){ ?>
												<button class="btn btn-xs btn-dark" disabled>کل بار مرجوع شد</button>
											<?php
											}
											
											else{ 
											if($u_level == "بازرگانی" || $u_level == "مدیریت"){ ?>
												<button class="btn btn-success btn-xs" type="button" data-toggle="modal" data-keyboard="false" data-target="#doc_modal<?php echo $row['fb_id']; ?>">مرجوع بار</button>
											<?php } 
											else {?>
												<button class="btn btn-success btn-xs" type="button" data-toggle="modal" data-keyboard="false" disabled>مرجوع بار</button>
											<?php } ?>
											<div class="modal fade text-xs-left" id="doc_modal<?php echo $row['fb_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="#doc_modal<?php echo $row['fb_id']; ?>" style="display: none;" aria-hidden="true">
												<div class="modal-dialog" role="document" id="hse_item_edit">
													<form action="" method="post" enctype="multipart/form-data">
														<input class="hidden" type="text" name="fb_id" id="fb_id" value="<?php echo $row['fb_id']; ?>">
														<input class="hidden" type="text" name="re_type" id="re_type" value="فروش">
														<div class="modal-content">
															<div class="modal-header">
																<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																	<span aria-hidden="true">×</span>
																</button>
																<h4 class="modal-title" id="myModalLabel3">مرجوع بار</h4>
															</div>
															<div class="modal-body">
																<div class="row">
																     <div class="item col-md-6">
    																    <div class="margin-tb input-group-prepend">
    																			<span class="input-group-text">وزن کل</span>
    																	</div>
    																    <input type="text" value="<?php echo number_format($row['fb_quantity']); ?>" disabled>
    																</div>
    																 <div class="item col-md-6">
    																    <div class="margin-tb input-group-prepend">
    																			<span class="input-group-text">وزن مرجوع شده</span>
    																	</div>
    																    <input type="text" value="<?php echo number_format($b); ?>" disabled>
    																</div>
																	<div class="item col-md-6">
																		<div class="margin-tb input-group-prepend">
																			<span class="input-group-text">تاریخ مرجوعی</span>
																		</div>
																		<input value="<?php echo jdate("Y/n/j"); ?>" autocomplete="off" type="text" id="re_date" name="re_date" placeholder="تاریخ مرجوع" class="form-control ; datepickerClass" required>
																	</div>
																	<div class="item col-md-6">
																		<div class="margin-tb input-group-prepend">
																			<span class="input-group-text">وزن مرجوعی</span>
																		</div>
																		<input id="re_weight" class="form-control" type="text" name="re_weight" id="re_weight" value="<?php $c = $row['fb_quantity']-$b; echo $c; ?>" onkeyup="javascript:FormatNumber('re_weight','re_weight2');">
																		<input id="re_weight2" type="text" class="form-control" disabled="disabled" style="margin: 0;" value="<?php echo number_format($c); ?>" />
																	</div>
																	<div class="row">
																		<div class="item col-md-12">
																			<div class="margin-tb input-group-prepend">
																				<span class="input-group-text">علت مرجوعی</span>
																			</div>
																			<select class="form-control" name="re_reason" id="re_reason">
																				<option>کیفیت نا مطلوب</option>
																				<option>قیمت</option>
																				<option>تاخیر در ارسال بار</option>
																			</select>
																		</div>
																	</div>
																</div>		
															</div>
															<div class="modal-footer">
																<center>
																	<button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">انصراف</button>
																	<button class="btn btn-primary btn-sm" name="add-returned_factor" type="submit" value="<?php echo $c; ?>">ذخیره</button>
																</center>
															</div>
														</div>
													</form>
												</div>
											</div>
											<?php 
											}
										}
										?>
									</td>
								</tr>
								<?php
									$i++;
								}
							 }
							 else{?>
								<tr>
									<td colspan="8">موردی یافت نشد</td>
								</tr>
							<?php } ?>
							</tbody>
							<tfoot>
								<tr>
									<th>ردیف</th>
									<th>فاکتور</th>
									<th>مشتری</th>
									<th>پیش فاکتور</th>
									<th>شماره آیتم</th>
									<th>تایید مدیر</th>
									<th>تایید مسئول فروش</th>
									<th>تایید مالی</th>
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
<?php include"../left-nav.php"; include"../footer.php"; ?>