<?php include"../header.php"; include"../nav.php";
	$aru = new aru();
	$asb = $aru->get_list('points_ceiling','pc_id');
	$home_dir = get_the_url();
?>
<div class="content-wrapper">
	<?php breadcrumb(); ?>
	<section class="content pd-btm">
		<section class="box box-info">
			<div class="box-header with-border">
                <h3 class="box-title">تعریف سقف امتیاز</h3>
            </div>
            <div class="box-body pd-btm pd-top">
                <form action="" method="post">
                    <div id="details" class="col-xs-12 no-padd">
                        <div class="row">
                            <div class="item col-md-4">
                                <div class="margin-tb input-group-prepend">
                                    <span class="input-group-text">مبلغ وام (ریال)</span>
                                </div>
								<input id="pc_amount" type="text" name="pc_amount" onkeyup="javascript:FormatNumber('pc_amount','pc_amount2'); calculate()" placeholder="مبلغ وام" class="form-control" autocomplete="off" required>
								<input id="pc_amount2" type="text" class="form-control" disabled="disabled" style="margin: 0;" />
							</div>
                            <div class="item col-md-4">
                                <div class="margin-tb input-group-prepend">
                                    <span class="input-group-text">امتیاز مورد نیاز (برحسب درصد)</span>
                                </div>
                                <input id="pc_points_needed" type="text" name="pc_points_needed" placeholder="بین 0 تا 100" class="form-control">
                            </div></br>
                            <?php 
                            if(isset($_POST['add-points_ceiling'])) {
								$points = $_POST['pc_points_needed'];
								if(0 <= $points && $points <= 100) {
									$aru->add("points_ceiling", $_POST);
								}
								else {
									echo "<div class='alert-aru col-xs-12'><div class='alert alert-success col-xs-6'><img src='$home_dir/dist/img/check4.gif'>امتیاز وارد شده صحیح نمی باشد.</div></div>";
                                    echo '<meta http-equiv="refresh" content="2"/>';
								}
                            }
                            ?>
                            <div class="item col-md-2 text-left">
                                <input type="submit" class="btn btn-success" name="add-points_ceiling" value="اضافه کردن" style="width:100%;">
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
						<h3 class="box-title">لیست سقف امتیازات</h3>
					</div>
					<div class="box-body">
						<table id="example1" class="table table-bordered table-striped">
							<thead>
								<tr>
									<th>ردیف</th>
									<th>مبلغ وام (ریال)</th>
									<th>امتیاز مورد نیاز</th>
                                    <th>عملیات</th>
								</tr>
							</thead>
							<tbody>
								<?php
									$i = 1;
									if(isset($_POST['update-points_ceiling'])) {
										$pc_id = $_POST['update-points_ceiling'];
										$points = $_POST['pc_points_needed'];
										if(0 <= $points && $points <= 100) {
											$aru->update('points_ceiling',$_POST,'pc_id', $pc_id);
											echo "<meta http-equiv='refresh' content='0'/>";
										}
										else {
											echo "<div class='alert-aru col-xs-12'><div class='alert alert-success col-xs-6'><img src='$home_dir/dist/img/check4.gif'>امتیاز وارد شده صحیح نمی باشد.</div></div>";
											echo '<meta http-equiv="refresh" content="2"/>';
										}
									}
									foreach($asb as $a) { ?>
									<tr>
										<td><?php echo per_number($i); ?></td>
										<td><?php echo per_number(number_format($a['pc_amount'])); ?></td>
										<td><?php echo per_number($a['pc_points_needed']); ?> درصد</td>
										<td>
											<div id="myModal<?php echo $a['pc_id']; ?>" class="modal fade" role="dialog">
												<div class="modal-dialog">
													<!-- Modal content-->
													<div class="modal-content">
														<form action="" method="post" >
															<div class="modal-header">
																<button type="button" class="close" data-dismiss="modal">&times;</button>
																<h4 class="modal-title">ویرایش سقف امتیاز</h4>
															</div>
															<div class="modal-body">
																<?php echo per_number($a['pc_id']);  ?>
																<div class="row">
																	<div class="item col-md-6">
																		<div class="margin-tb input-group-prepend">
																			<span class="input-group-text">مبلغ وام</span>
																		</div>
																		<input type="text" name="pc_amount" placeholder="مبلغ وام" value="<?php echo $a['pc_amount']; ?>" class="form-control">
																	</div>
																	<div class="item col-md-6">
																		<div class="margin-tb input-group-prepend">
																			<span class="input-group-text">امتیاز مورد نیاز (برحسب درصد)</span>
																		</div>
																		<input type="text" name="pc_points_needed" placeholder="بین 0 تا 100" value="<?php echo $a['pc_points_needed']; ?>" class="form-control">
																	</div>
																</div>
																
															</div>
															<div class="modal-footer">
																<center>
																	<button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">انصراف</button>
																	<button class="btn btn-primary btn-sm" name="update-points_ceiling" value="<?php echo $a['pc_id']; ?>" type="submit">ذخیره</button>
																</center>
															</div>
														</form>
													</div>
												</div>
											</div>
											<form action="" method="post" onSubmit="if(!confirm('آیا از انجام این عملیات اطمینان دارید؟')){return false;}">
												<button type="button" class="btn btn-warning btn-xs" data-toggle="modal" data-target="#myModal<?php echo $a['pc_id']; ?>">ویرایش</button>
												<button class="btn btn-danger btn-xs" type="submit" name="delete-list" id="delete-list">حذف</button>
												<input class="hidden" type="text" name="delete-text" id="delete-text" value="<?php echo $a['pc_id']; ?>">
												<?php
													if(isset($_POST['delete-list'])){
														$pc_id = $_POST['delete-text'];
														$aru->remove('points_ceiling','pc_id', $pc_id ,'int');
														exit();
													}
												?>
											</form>
										</td>
									</tr>
									<?php
										$i++;
									} ?>
							</tbody>
							<tfoot>
								<tr>
                                    <th>ردیف</th>
									<th>مبلغ وام (ریال)</th>
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