<?php include"../header.php"; include"../nav.php";
	$aru = new aru();
	$asb = $aru->get_list('product','p_id');
?>
<div class="content-wrapper">
	<?php breadcrumb(); ?>
	<section class="content pd-btm">
		<section class="box box-info">
			<div class="box-header with-border">
				<div class="box-body pd-btm pd-top">
					<form action="" method="post">
						<div id="details" class="col-xs-12 no-padd">
							<div class="row">
								<div class="item col-md-3">
									<div class="margin-tb input-group-prepend">
										<span class="input-group-text">نوع ماده</span>
									</div>
									<select class="form-control" id="p_type" name="p_type">
										<option value="محصول">محصول</option>
										<option value="محصول جانبی">محصول جانبی</option>
										<option value="ماده اولیه">ماده اولیه</option>
									</select>
								</div>
								<div class="item col-md-4">
									<div class="margin-tb input-group-prepend">
										<span class="input-group-text">نام ماده</span>
									</div>
									<input id="p_name" type="text" name="p_name" placeholder="نام ماده" class="form-control">
								</div>
								<div class="item col-md-3">
									<div class="margin-tb input-group-prepend">
										<span class="input-group-text">واحد</span>
									</div>
									<select name="p_unit" class="form-control">
										<option value="کیلوگرم">کیلوگرم</option>
										<option value="تن">تن</option>
									</select>
								</div></br>
								<?php 
								if(isset($_POST['add-product'])) {
									$aru->add("product", $_POST);
								}
								?>
								<div class="item col-md-2 text-left">
									<input type="submit" class="btn btn-success" name="add-product" value="اضافه کردن" style="width:100%;">
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
						<h3 class="box-title">لیست محصولات</h3>
					</div>
					<div class="box-body">
						<table id="example1" class="table table-bordered table-striped">
							<thead>
								<tr>
									<th>ردیف</th>
									<th>نوع ماده</th>
									<th>کد محصول</th>
									<th>نام ماده</th>
									<th>واحد کالا</th>
									<th>عملیات</th>
								</tr>
							</thead>
							<tbody>
								<?php
									$i = 1;
									if(isset($_POST['update-product'])) {
										$p_id = $_POST['update-product'];
										$aru->update('product',$_POST,'p_id', $p_id);
										echo "<meta http-equiv='refresh' content='0'/>";
									}
									foreach($asb as $a) { ?>
									<tr>
										<td><?php echo per_number($i); ?></td>
										<td><?php echo per_number($a['p_type']); ?></td>
										<td><?php echo per_number($a['p_id']); ?></td>
										<td><?php echo per_number($a['p_name']); ?></td>
										<td><?php echo $a['p_unit']; ?></td>
										<td>
											<div id="myModal<?php echo $a['p_id']; ?>" class="modal fade" role="dialog">
												<div class="modal-dialog">
													<!-- Modal content-->
													<div class="modal-content">
														<form action="" method="post" >
															<div class="modal-header">
																<button type="button" class="close" data-dismiss="modal">&times;</button>
																<h4 class="modal-title">ویرایش محصول</h4>
															</div>
															<div class="modal-body">
																<?php echo $a['p_id'];  ?>
																<div class="row">
																	<div class="item col-md-4 col-lg-4 col-sm-4 col-xs-4">
																		<div class="margin-tb input-group-prepend">
																			<span class="input-group-text">نوع ماده</span>
																		</div>
																		<select name="p_type" class="form-control">
																			<option <?php if($a['p_type'] == 'محصول جانبی') { echo 'selected';} ?> value="محصول جانبی">محصول جانبی</option>
																			<option <?php if($a['p_type'] == 'محصول') { echo 'selected';} ?> value="محصول">محصول</option>
																			<option <?php if($a['p_type'] == 'ماده اولیه') { echo 'selected';} ?> value="ماده اولیه">ماده اولیه</option>
																		</select>
																	</div>
																	<div class="item col-md-4">
																		<div class="margin-tb input-group-prepend">
																			<span class="input-group-text">نام ماده</span>
																		</div>
																		<input type="text" name="p_name" value="<?php echo $a['p_name']; ?>" class="form-control">
																	</div>
																	<div class="item col-md-4 col-lg-4 col-sm-4 col-xs-4">
																		<div class="margin-tb input-group-prepend">
																			<span class="input-group-text">واحد</span>
																		</div>
																		<select name="p_unit" class="form-control">
																			<option <?php if($a['p_unit'] == 'کیلوگرم') { echo 'selected';} ?> value="کیلوگرم">کیلوگرم</option>
																			<option <?php if($a['p_unit'] == 'تن') { echo 'selected';} ?> value="تن">تن</option>
																		</select>
																	</div>
																</div>
																
															</div>
															<div class="modal-footer">
																<center>
																	<button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">انصراف</button>
																	<button class="btn btn-primary btn-sm" name="update-product" value="<?php echo $a['p_id']; ?>" type="submit">ذخیره</button>
																</center>
															</div>
														</form>
													</div>
												</div>
											</div>
											<form action="" method="post" onSubmit="if(!confirm('آیا از انجام این عملیات اطمینان دارید؟')){return false;}">
												<button type="button" class="btn btn-warning btn-xs" data-toggle="modal" data-target="#myModal<?php echo $a['p_id']; ?>">ویرایش</button>
												<button class="btn btn-danger btn-xs" type="submit" name="delete-list" id="delete-list">حذف</button>
												<input class="hidden" type="text" name="delete-text" id="delete-text" value="<?php echo $a['p_id']; ?>">
												<?php
													if(isset($_POST['delete-list'])){
														$p_id = $_POST['delete-text'];
														$aru->remove('product','p_id', $p_id ,'int');
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
									<th>نوع ماده</th>
									<th>کد محصول</th>
									<th>نام ماده</th>
									<th>واحد کالا</th>
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