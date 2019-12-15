<?php include"../header.php"; include"../nav.php";
	$aru = new aru();
	$asb = $aru->get_list('loan_points_ceiling','lpc_id');
	$home_dir = get_the_url();
?>
<div class="content-wrapper">
	<?php breadcrumb("" , "index.php"); ?>
	<section class="content pd-btm">
		<section class="box box-info">
			<div class="box-header with-border">
                <h3 class="box-title">تعریف سقف امتیاز وام</h3>
            </div>
            <div class="box-body pd-btm pd-top">
                <form action="" method="post">
                    <div id="details" class="col-xs-12 no-padd">
                        <div class="row">
                            <div class="item col-md-4">
                                <div class="margin-tb input-group-prepend">
                                    <span class="input-group-text">مبلغ وام (ریال)</span>
                                </div>
								<input id="lpc_amount" type="text" name="lpc_amount" onkeyup="javascript:FormatNumber('lpc_amount','lpc_amount2'); calculate()" placeholder="مبلغ وام" class="form-control" autocomplete="off" required>
								<input id="lpc_amount2" type="text" class="form-control" disabled="disabled" style="margin: 0;" />
							</div>
                            <div class="item col-md-3">
                                <div class="margin-tb input-group-prepend">
                                    <span class="input-group-text">تعداد اقساط</span>
                                </div>
                                <input id="lpc_number" type="text" name="lpc_number" placeholder="تعداد اقساط" class="form-control">
                            </div> 
                            <div class="item col-md-3">
                                <div class="margin-tb input-group-prepend">
                                    <span class="input-group-text">امتیاز مورد نیاز (برحسب درصد)</span>
                                </div>
                                <input id="lpc_points_needed" type="text" name="lpc_points_needed" placeholder="بین 0 تا 100" class="form-control">
                            </div> <br>
                            <?php 
                            if(isset($_POST['add-loan_points_ceiling'])) {
								$points = $_POST['lpc_points_needed'];
								if(0 <= $points && $points <= 100) {
									$aru->add("loan_points_ceiling", $_POST);
								}
								else {
									?>
									<script>
										alertify.set('notifier','position', 'bottom-right');
										alertify.error('امتیاز وارد شده صحیح نمی باشد');
									</script>
									<?php
                                    echo '<meta http-equiv="refresh" content="2"/>';
								}
                            }
                            ?>
                            <div class="item col-md-2 text-left">
                                <input type="submit" class="btn btn-success" name="add-loan_points_ceiling" value="اضافه کردن" style="width:100%;">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
		</section>
	</section>

	<section class="content pd-top">
		<div class="row">
			<div class="col-xs-12">
				<div class="box">
					<div class="box-header">
						<h3 class="box-title">لیست سقف امتیازات وام</h3>
					</div>
					<div class="box-body">
						<table id="example1" class="table table-bordered table-striped">
							<thead>
								<tr>
									<th>ردیف</th>
									<th>مبلغ وام (ریال)</th>
                                    <th>تعداد اقساط</th>
									<th>امتیاز مورد نیاز</th>
                                    <th>عملیات</th>
								</tr>
							</thead>
							<tbody>
								<?php
								$i = 1;
								if(isset($_POST['update-loan_points_ceiling'])) {
									$lpc_id = $_POST['update-loan_points_ceiling'];
									$points = $_POST['lpc_points_needed'];
									if(0 <= $points && $points <= 100) {
										$aru->update('loan_points_ceiling',$_POST,'lpc_id', $lpc_id);
									}
									else {
										?>
										<script>
											alertify.set('notifier','position', 'bottom-right');
											alertify.error('امتیاز وارد شده صحیح نمی باشد');
										</script>
										<?php											
										echo '<meta http-equiv="refresh" content="2"/>';
									}
								}
								if(count($asb) > 0){
									foreach($asb as $a) { ?>
										<tr>
											<td><?php echo per_number($i); ?></td>
											<td><?php echo per_number(number_format($a['lpc_amount'])); ?></td>
                                            <td><?php echo per_number($a['lpc_number']); ?></td>
											<td><?php echo per_number($a['lpc_points_needed']); ?> درصد</td>
											<td>
												<div id="myModal<?php echo $a['lpc_id']; ?>" class="modal fade" role="dialog">
													<div class="modal-dialog">
														<!-- Modal content-->
														<div class="modal-content">
															<form action="" method="post" >
																<div class="modal-header">
																	<button type="button" class="close" data-dismiss="modal">&times;</button>
																	<h4 class="modal-title">ویرایش سقف امتیاز وام</h4>
																</div>
																<div class="modal-body">
																	<div class="row">
																		<div class="item col-md-4">
																			<div class="margin-tb input-group-prepend">
																				<span class="input-group-text">مبلغ وام</span>
																			</div>
                                                                            <input value="<?php echo $a['lpc_amount']; ?>"  id="lpc_amount" type="text" name="lpc_amount" onkeyup="javascript:FormatNumber('lpc_amount','lpc_amount2'); calculate()" placeholder="مبلغ وام" class="form-control" autocomplete="off" required>
								                                            <input id="lpc_amount2" type="text" class="form-control" disabled="disabled" style="margin: 0;" />
																		</div>
                                                                        <div class="item col-md-4">
																			<div class="margin-tb input-group-prepend">
																				<span class="input-group-text">تعداد اقساط</span>
																			</div>
																			<input type="text" name="lpc_number" placeholder="تعداد اقساط" value="<?php echo $a['lpc_number']; ?>" class="form-control">
																		</div>
																		<div class="item col-md-4">
																			<div class="margin-tb input-group-prepend">
																				<span class="input-group-text">امتیاز مورد نیاز (برحسب درصد)</span>
																			</div>
																			<input type="text" name="lpc_points_needed" placeholder="بین 0 تا 100" value="<?php echo $a['lpc_points_needed']; ?>" class="form-control">
																		</div>
																	</div>
																	
																</div>
																<div class="modal-footer">
																	<center>
																		<button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">انصراف</button>
																		<button class="btn btn-primary btn-sm" name="update-loan_points_ceiling" value="<?php echo $a['lpc_id']; ?>" type="submit">ذخیره</button>
																	</center>
																</div>
															</form>
														</div>
													</div>
												</div>
												<form action="" method="post" onSubmit="if(!confirm('آیا از انجام این عملیات اطمینان دارید؟')){return false;}">
													<button type="button" class="btn btn-warning btn-xs" data-toggle="modal" data-target="#myModal<?php echo $a['lpc_id']; ?>">ویرایش</button>
													<button class="btn btn-danger btn-xs" type="submit" name="delete-list" id="delete-list">حذف</button>
													<input class="hidden" type="text" name="delete-text" id="delete-text" value="<?php echo $a['lpc_id']; ?>">
													<?php
														if(isset($_POST['delete-list'])){
															$lpc_id = $_POST['delete-text'];
															$aru->remove('loan_points_ceiling','lpc_id', $lpc_id ,'int');
															exit();
														}
													?>
												</form>
											</td>
										</tr>
										<?php
										$i++;
									} 
								} else {
                                    ?>
                                    <tr>
                                        <td colspan="9">داده ای موجود نیست!</td>
                                    </tr>
                                    <?php
                                    }
                                ?>
							</tbody>
							<tfoot>
								<tr>
                                    <th>ردیف</th>
									<th>مبلغ وام (ریال)</th>
                                    <th>تعداد اقساط</th>
									<th>امتیاز مورد نیاز</th>
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