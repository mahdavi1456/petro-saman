<?php include"../header.php"; include"../nav.php";
	$aru = new aru();
	$asb = $aru->get_list('material','ma_id');
?>
<div class="content-wrapper">
	<?php breadcrumb(); ?>
	<section class="content pd-btm">
		<section class="box">
			<div class="box-header with-border">
				<div class="box-body no-padd">
					<form action="" method="post">
						<div id="details" class="col-xs-12 col-lg-12 col-md-12 col-sm-12">
							<div class="row">
								<div class="item col-md-5">
									<div class="margin-tb input-group-prepend">
										<span class="input-group-text">نام مواد اولیه</span>
									</div>
									<input type="text" name="ma_name" placeholder="نام مواد اولیه" class="form-control">
								</div>
								<div class="item col-md-5">
									<div class="margin-tb input-group-prepend">
										<span class="input-group-text">واحد</span>
									</div>
									<select name="ma_unit" class="form-control">
										<option value="کیلوگرم">کیلوگرم</option>
										<option value="تن">تن</option>
									</select>
								</div></br>
								<div class="item col-md-2 text-left">
									<input type="submit" class="btn btn-success" name="add-material" value="اضافه کردن" style="width:100%;">
									<?php 
										if(isset($_POST['add-material'])) {
											$aru->add("material", $_POST);
										}
									?>
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
						<h3 class="box-title">لیست موجودی</h3>
					</div>
					<div class="box-body">
						<table id="example1" class="table table-bordered table-striped">
							<thead>
								<tr>
									<th>ردیف</th>
									<th>کد</th>
									<th>نام مواد اولیه</th>
									<th>واحد</th>
									<th>عملیات</th>
								</tr>
							</thead>
							<tbody>
								<?php
									$i = 1;
									if(isset($_POST['update-material'])) {
										$ma_id = $_POST['update-material'];
										$aru->update('material',$_POST,'ma_id', $ma_id);
										echo "<meta http-equiv='refresh' content='0'/>";
									}
									if(count($asb)>0){
									foreach($asb as $a) { ?>
									<tr>
										<td><?php echo per_number($i); ?></td>
										<td><?php echo per_number($a['ma_id']); ?></td>
										<td><?php echo $a['ma_name']; ?></td>
										<td><?php echo $a['ma_unit']; ?></td>
										<td>
											<div id="myModal<?php echo $a['ma_id']; ?>" class="modal fade" role="dialog">
												<div class="modal-dialog">
													<div class="modal-content">
														<form action="" method="post" >
															
															<div class="modal-header">
																<button type="button" class="close" data-dismiss="modal">&times;</button>
																<h4 class="modal-title">ویرایش مواد اولیه</h4>
															</div>
															<div class="modal-body">
																<div class="row">
																	<div class="item col-md-12">
																		<input type="text" name="ma_name" value="<?php echo $a['ma_name']; ?>" class="form-control">
																	</div>
																	<div class="item col-md-12 col-lg-12 col-sm-12 col-xs-12">
																		<select name="ma_unit" class="form-control">
																			<option <?php if($a['ma_unit'] == 'کیلوگرم') { echo 'selected';} ?> value="کیلوگرم">کیلوگرم</option>
																			<option <?php if($a['ma_unit'] == 'تن') { echo 'selected';} ?> value="تن">تن</option>
																		</select>
																	</div>
																</div>
																
															</div>
															<div class="modal-footer">
																<center>
																	<button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">انصراف</button>
																	<button class="btn btn-primary btn-sm" name="update-material" value="<?php echo $a['ma_id']; ?>" type="submit">ذخیره</button>
																</center>
															</div>
														</form>
													</div>
												</div>
											</div>
											<form action="" method="post" onSubmit="if(!confirm('آیا از انجام این عملیات اطمینان دارید؟')){return false;}">
												<button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#myModal<?php echo $a['ma_id']; ?>">ویرایش</button>
												<button class="btn btn-danger btn-sm" type="submit" name="delete-list" id="delete-list">حذف</button>
												<input class="hidden" type="text" name="delete-text" id="delete-text" value="<?php echo $a['ma_id'];?>">
												<?php
													if(isset($_POST['delete-list'])){
														$ma_id = $_POST['delete-text'];
														$aru->remove('material','ma_id', $ma_id ,'int');
														exit();
													}
												?>
											</form>
										</td>
									</tr>
									<?php
										$i++;
									} 
								}?>
							</tbody>
							<tfoot>
								<tr>
									<th>ردیف</th>
									<th>کد</th>
									<th>نام مواد اولیه</th>
									<th>واحد</th>
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
		$("#example1").DataTable();
		$('#example2').DataTable({
			"paging": true,
			"lengthChange": false,
			"searching": false,
			"ordering": true,
			"info": true,
			"autoWidth": false
		});
	});
</script>
<?php include"../left-nav.php"; include"../footer.php"; ?>