<?php include"../header.php"; include"../nav.php";
	$aru = new aru();
	$asb = $aru->get_list('category','cat_id');
	if(isset($_POST['add-category'])) {
		$aru->add("category", $_POST);
	}
?> 
<div class="content-wrapper">
	
	<?php breadcrumb("" , "index.php"); ?>
	
	<section class="content pd-btm">
		<section class="box box-info">
			<div class="box-header with-border">
				<div class="box-body pd-btm pd-top">
					<form action="" method="post">
						<div id="details" class="col-xs-12 no-padd">
							<div class="row">
								<div class="item col-xs-9">
									<div class="margin-tb input-group-prepend">
										<span class="input-group-text">نام دانه بندی</span>
									</div>
									<input id="cat_name" type="text" name="cat_name" placeholder="نام دانه بندی" class="form-control">
								</div></br>
								</br>
								<div class="col-xs-3 text-left">
									<button type="submit" class="btn btn-success w-100" id="cat_submit" name="add-category">اضافه کردن</button>
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
						<h3 class="box-title">لیست دانه بندی ها</h3>
					</div>
					<div class="box-body">
						<table id="example1" class="table table-bordered table-striped">
							<thead>
								<tr>
									<th>ردیف</th>
									<th>کد دانه بندی</th>
									<th>نام دانه بندی</th>
									<th>عملیات</th>
								</tr>
							</thead>
							<tbody>
								<?php
									$i = 1;
									if(isset($_POST['update-category'])) {
										$cat_id = $_POST['update-category'];
										$aru->update('category',$_POST,'cat_id', $cat_id);
									}
									if(count($asb) >0){
										foreach ($asb as $a){ ?>
										<tr>
											<td><?php echo per_number($i); ?></td>
											<td><?php echo per_number($a['cat_id']); ?></td>
											<td><?php echo per_number($a['cat_name']); ?></td>
											<td>
												<div id="myModal<?php echo $a['cat_id']; ?>" class="modal fade" role="dialog">
													<div class="modal-dialog">
														<!-- Modal content-->
														<div class="modal-content">
															<form action="" method="post" >
																
																<div class="modal-header">
																	<button type="button" class="close" data-dismiss="modal">&times;</button>
																	<h4 class="modal-title">ویرایش دسته بندی</h4>
																</div>
																<div class="modal-body">
																	<?php echo  $a['cat_id']; ?>
																	<div class="row">
																		<div class="item col-xs-12">
																			<input type="text" name="cat_name" value="<?php echo $a['cat_name']; ?>" class="form-control">
																		</div>
																	</div>
																</div>
																<div class="modal-footer">
																	<center>
																		<button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">انصراف</button>
																		<button class="btn btn-primary btn-sm" name="update-category" value="<?php echo $a['cat_id']; ?>" type="submit">ذخیره</button>
																	</center>
																</div>
															</form>
														</div>
													</div>
												</div>
												<form action="" method="post" onSubmit="if(!confirm('آیا از انجام این عملیات اطمینان دارید؟')){return false;}">
												<button type="button" class="btn btn-warning btn-xs" data-toggle="modal" data-target="#myModal<?php echo $a['cat_id']; ?>">ویرایش</button>
													<button class="btn btn-danger btn-xs" type="submit" name="delete-list" id="delete-list">حذف</button>
													<input class="hidden" type="text" name="delete-text" id="delete-text" value="<?php echo $a['cat_id']; ?>">
													<?php
														if(isset($_POST['delete-list'])){
															$cat_id = $_POST['delete-text'];
															$aru->remove('category','cat_id', $cat_id	 ,'int');
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
						</table>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>
<div class="control-sidebar-bg"></div>
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