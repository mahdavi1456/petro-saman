<?php include"../header.php"; include"../nav.php"; $aru = new aru(); $sms = new sms(); 	
$media = new media();
$user = new user();
	require_once"../customer/functions.php";

	$u_level = $user->get_current_user_level();
	if(isset($_POST['delete-list'])){
		$fb_id = $_POST['delete-text'];
		$aru->remove("factor_buy_body", "fb_id", $fb_id, "int");
		$aru->remove("factor_buy_log", "fb_id", $fb_id, "int");
		$sql2 = "select * from media_factor where fb_id = $fb_id and mf_type = 'buy' and mf_name <> 'pre_invoice_buy' ";
		$res2 = get_select_query($sql2);
		if(count($res2)>0) {
			foreach($res2 as $row2){
				$media->delete_factor_media($row2['mf_id'] , $row2['mf_link']);
			}
		}
		$l_details = "حذف فاکتور خرید";
		update_a_row_buy_log_factor($fb_id, $l_details);
		$verify = "fb_buy_delete";
		$sms->send_sms_confirm_buy($fb_id, $verify);
		echo "<meta http-equiv='refresh' content='0'/>";
		exit();
	}


	if(isset($_POST['add-returned_factor'])) {
		$aru->add("returned_factor", $_POST);
		echo "<meta http-equiv='refresh' content='0'/>";
	}
	
	if(isset($_POST['verify_submit'])) {
		$verify = $_POST['type_confirm'];
		$fb_id_verify = $_POST['fb_id'];
		$l_details = $_POST['l_details'];
		$echo_type = $_POST['echo_type'];
		update_a_row_fb_buy_factor($verify, $fb_id_verify);
		update_a_row_buy_log_factor($fb_id_verify, $l_details);
		$l_details = "ویرایش فاکتور خرید";
		update_a_row_buy_log_factor($fb_id_verify, $echo_type);
		$sms->send_sms_confirm_buy($fb_id_verify, $verify);
	}


	if(isset($_POST['update-factor_buy_body_buying'])){
		$fb_id = $_POST['update-factor_buy_body_buying'];
		ex_query("update factor_buy_body set fb_outsourcing = 'no' where fb_id = $fb_id");
		
		$verify = "fb_buy_cycle";
		$sms->send_sms_confirm_buy($fb_id, $verify);
		$l_details = "خرید مستقیم";
		update_a_row_buy_log_factor($fb_id, $l_details);
		echo "<meta http-equiv='refresh' content='0'>";
	}
	


	if(isset($_POST['update-factor_buy_body_outsourcing'])){
		$fb_id = $_POST['update-factor_buy_body_outsourcing'];
		ex_query("update factor_buy_body set fb_outsourcing = 'yes' where fb_id = $fb_id");
		
		$verify = "fb_outsourcing_cycle";
		$sms->send_sms_confirm_buy($fb_id, $verify);
		$l_details = "برون سپاری";
		update_a_row_buy_log_factor($fb_id, $l_details);
		echo "<meta http-equiv='refresh' content='0'>";
	}


	$u_level = get_current_user_level();
?>
<div class="content-wrapper">

	<?php breadcrumb("لیست پیشنهادات خرید"); ?>

	<section class="content">
		<div class="row">
			<div class="col-xs-12">
				<div class="box">
					<div class="box-header">
						<h3 class="box-title">لیست پیشنهادات خرید</h3>
					</div>
					<div class="box-body">
						<table id="example1" class="table table-bordered table-striped">
							<thead>
								<tr>
									<th>ردیف</th>
									<th>فاکتور</th>
									<th>ردیف فاکتور</th>
									<th>تامین کننده</th>
									<th>پیش فاکتور</th>
									<th>تایید مدیر</th>
									<th>تایید مالی</th>
                                    <th>برون سپاری / خرید</th>
									<th>عملیات</th>
								</tr>
							</thead>
							<tbody>
							<?php
							$i = 1;
								$res = list_factor_buy_body();
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
										<a class="btn btn-primary btn-xs" href="reg-buy.php?f_id=<?php echo $f_id; ?>&c_id=<?php echo $row['c_id']; ?>&fb_id=<?php echo $fb_id; ?>">ویرایش</a>
									</td>
									<td>
									<?php
									if($u_level=="مدیریت"){
										show_btn_list_factor($row['fb_verify_admin1'], "confirm-buy.php?fb_id=" . $fb_id . "&typee=fb_verify_admin1");
									}else{
										show_btn_list_factor($row['fb_verify_admin1'], "#");
									} ?>
									</td>
									<td>
									<?php
									if($row['fb_verify_admin1'] != 0) {
										if($u_level=="مدیریت" || $u_level=="امور مالی"){
											show_btn_list_factor($row['fb_verify_finan'], "confirm-buy.php?fb_id=" . $fb_id . "&typee=fb_verify_finan");
										}else{
											show_btn_list_factor($row['fb_verify_finan'], "#");
										}
									} else { ?>
										<button class="btn btn-dark btn-xs" disabled>منتظر</button>
									<?php
									}
									?>
									</td>
                                    <td class="force-inline-text">
                                        <?php
										
                                        if($row['fb_verify_finan'] != 0 && $row['fb_verify_admin1'] != 0) {
											if($u_level=="مدیریت" || $u_level=="بازرگانی"){
											if($row['fb_outsourcing'] == 'yes')
											{ ?>
												<button class="btn btn-dark btn-xs" disabled>برون سپاری شده</button>
											<?php }
											else if( $row['fb_outsourcing'] == 'no')
											{ ?>
												<button class="btn btn-dark btn-xs" disabled>خرید مستقیم شده</button>
											<?php }
											else{
                                                ?>
                                                <form action="" method="post" onSubmit="if(!confirm('برون سپاری شود؟')){return false;}">
													<?php 
													if($u_level=="مدیریت" || $u_level=="بازرگانی"){ ?>
												   	 	<button class="btn btn-warning btn-xs" type="submit" name="update-factor_buy_body_outsourcing" value="<?php echo $row['fb_id']; ?>">برون سپاری</button>
													<?php }
													else {?>
												   	 	<button class="btn btn-warning btn-xs" type="submit" disabled>برون سپاری</button>
													<?php } ?>
											    </form>
                                                <form action="" method="post" onSubmit="if(!confirm('خریداری شود؟')){return false;}">
												<?php 
													if($u_level=="مدیریت" || $u_level=="بازرگانی"){ ?>
                                                   		<button class="btn btn-primary btn-xs" type="submit" name="update-factor_buy_body_buying" value="<?php echo $row['fb_id']; ?>">خرید مستقیم</button>
													<?php }
													else {?>
												   	 	<button class="btn btn-primary btn-xs" type="submit" disabled>خرید مستقیم</button>
													<?php } ?>
												</form>
                                                <?php
											}
                                            }else{
                                                ?><button class="btn btn-sm btn-dark" disabled>عدم مجوز دسترسی</button><?php
                                            }
                                        }else{ ?>
                                            <button class="btn btn-dark btn-xs" disabled>منتظر</button>
                                        <?php
                                        }
                                        ?>
									</td>
									<td>
										<form style="display: inline-block;" action="" method="post" onSubmit="if(!confirm('آیا از انجام این عملیات اطمینان دارید؟')){return false;}">
											<!--a class="btn btn-info btn-xs" href="edit-factor.php?id=<?php //echo $row['fb_id']; ?>">ویرایش</a-->
											<a class="btn btn-info btn-xs" href="log-factor-buy.php?fb_id=<?php echo $row['fb_id']; ?>">تاریخچه</a>
											<?php 
											if($u_level=="مدیریت" ){ ?>
												<button class="btn btn-danger btn-xs" type="submit" name="delete-list" id="delete-list">حذف</button>
												<?php }
											else {?>
												<button class="btn btn-danger btn-xs" type="submit" disabled>حذف</button>
											<?php } ?>
											<input class="hidden" type="text" name="delete-text" id="delete-text" value="<?php echo $row['fb_id']; ?>">
										</form>


										<?php 
											$res1 = $aru->list_by_type("returned_factor", "fb_id", $row['fb_id'], "int", "fb_id");
											if($res1){?>
												<button class="btn btn-dark btn-xs" disabled>مرجوع شده</button>
											<?php	}
											else{
												if($u_level=="مدیریت" || $u_level=="بازرگانی"){ ?>
											<button class="btn btn-warning btn-xs" type="button" data-toggle="modal" data-keyboard="false" data-target="#doc_modal<?php echo $row['fb_id']; ?>">مرجوع بار</button>
												<?php }
											else {?>
												<button class="btn btn-warning btn-xs" type="submit" disabled>مرجوع بار</button>
											<?php } ?>
											<div class="modal fade text-xs-left" id="doc_modal<?php echo $row['fb_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="#doc_modal<?php echo $row['fb_id']; ?>" style="display: none;" aria-hidden="true">
												<div class="modal-dialog" role="document" id="hse_item_edit">
													<form action="" method="post" enctype="multipart/form-data">
														<input class="hidden" type="text" name="fb_id" id="fb_id" value="<?php echo $row['fb_id']; ?>">
														<input class="hidden" type="text" name="re_type" id="re_type" value="خرید">
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
																			<span class="input-group-text">تاریخ مرجوعی</span>
																		</div>
																		<input value="<?php echo jdate("Y/n/j"); ?>" autocomplete="off" type="text" id="re_date" name="re_date" placeholder="تاریخ مرجوع" class="form-control datepickerClass" required>
																	</div>
																	<div class="item col-md-6">
																		<div class="margin-tb input-group-prepend">
																			<span class="input-group-text">وزن مجوعی</span>
																		</div>
																		<input id="re_weight" class="form-control" type="text" name="re_weight" id="re_weight" value="<?php echo $row['fb_quantity']; ?>" onkeyup="javascript:FormatNumber('re_weight','re_weight2');">
																		<input id="re_weight2" type="text" class="form-control" disabled="disabled" style="margin: 0;" value="<?php echo number_format($row['fb_quantity']); ?>" />
																	</div>
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
															<div class="modal-footer">
																<button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">انصراف</button>
																<button class="btn btn-primary btn-sm" name="add-returned_factor" type="submit">ذخیره</button>
															</div>
														</div>
													</form>
												</div>
											</div>
										<?php 
											}
											?>

									</td>
								</tr>
								<?php
									$i++;
								} 
							}
							else { ?>
								<tr>
									<td colspan=12>موردی یافت نشد</td>
								</tr>
							<?php }
							?>
							</tbody>
							<tfoot>
								<tr>
									<th>ردیف</th>
									<th>فاکتور</th>
									<th>ردیف فاکتور</th>
									<th>تامین کننده</th>
									<th>پیش فاکتور</th>
									<th>تایید مدیر</th>
									<th>تایید مالی</th>
                                    <th>برون سپاری / خرید</th>
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
