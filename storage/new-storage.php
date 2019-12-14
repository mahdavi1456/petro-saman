<?php include"../header.php"; include"../nav.php";
	$aru = new aru();
	$asb = $aru->get_list('storage_list','st_id');
?>
<div class="content-wrapper">
	<?php breadcrumb("" , "index.php"); ?>
	<section class="content pd-btm">
		<section class="box">
			<div class="box-header with-border">
				<div class="box-body no-padd">
					<form action="" method="post">
						<div id="details" class="col-xs-12 col-lg-12 col-md-12 col-sm-12">
							<div class="row">
								<div class="item col-md-4">
									<div class="margin-tb input-group-prepend">
										<span class="input-group-text">نام انبار</span>
									</div>
									<input type="text" name="st_name" placeholder="نام انبار" class="form-control">
								</div>
								<div class="item col-md-4">
									<div class="margin-tb input-group-prepend">
										<span class="input-group-text">نوع انبار</span>
									</div>
									<select name="st_type" class="form-control">
										<option value="outsourcer">برون سپار</option>
										<option value="storage">انبار</option>
										<option value="miner">معدن</option>
									</select>
								</div>
								<div class="item col-md-4">
									<div class="margin-tb input-group-prepend">
										<span class="input-group-text">طرف حساب ها</span>
									</div>
									<select name="c_id" class="form-control select2">
										<?php
										$res = 0;
										$res = get_select_query("select * from customer");
										if($res){
											foreach($res as $row){
												if($row['c_account']=="real_person"){
													$name = $row['c_name'] . " " . $row['c_family'];
												} else {
													$name = $row['c_company'];
												}
											?>
											<option value="<?php echo $row['c_id']; ?>"><?php echo $name; ?></option>
											<?php
											}
										}
										?>
									</select>
								</div>
								<div class="item col-md-12">
									<div class="margin-tb input-group-prepend">
										<span class="input-group-text">آدرس انبار</span>
									</div>
									<textarea width="100%" name="st_address" class="form-control" placeholder="آدرس انبار"></textarea>
								</div>
								
								<div class="item col-md-2 text-left">
									<input type="submit" class="btn btn-success" name="add-storage_list" value="اضافه کردن" style="width:100%;">
									<?php 
										if(isset($_POST['add-storage_list'])) {
											$aru->add("storage_list", $_POST);
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
									<th>نام انبار</th>
									<th>نوع انبار</th>
									<th>طرف حساب</th>
									<th>آدرس</th>
									<th>عملیات</th>
								</tr>
							</thead>
							<tbody>
								<?php
									$i = 1;
									if(isset($_POST['update-storage_list'])) {
										$st_id = $_POST['update-storage_list'];
										$aru->update('storage_list',$_POST,'st_id', $st_id);
									}
									if(count($asb) > 0){
									    foreach($asb as $a) { ?>
        								<tr>
        									<td><?php echo per_number($i); ?></td>
        									<td><?php echo per_number($a['st_id']); ?></td>
        									<td><?php echo per_number($a['st_name']); ?></td>
											<td><?php if ( $a["st_type"] == "outsourcer" ) { echo "برون سپار"; } elseif ( $a["st_type"] == "storage" ) { echo "انبار"; } elseif (  $a["st_type"] == "miner" ) { echo "معدن"; } ?></td>
											<td><?php echo get_customer_name($a["c_id"]); ?></td>
        									<td><?php echo $a['st_address']; ?></td>
        									<td>
        										<div id="myModal<?php echo $a['st_id']; ?>" class="modal fade" role="dialog">
        											<div class="modal-dialog">
        												<div class="modal-content">
        													<form action="" method="post" class="edit_storage_item">
        														<div class="modal-header">
        															<button type="button" class="close" data-dismiss="modal">&times;</button>
        															<h4 class="modal-title">ویرایش انبار</h4>
        														</div>
        														<div class="modal-body">
																	<div class="row">
																		<div class="item col-md-6">
																			<div class="margin-tb input-group-prepend">
																				<span class="input-group-text">نام انبار</span>
																			</div>
																			<input type="text" name="st_name" placeholder="نام انبار" value="<?php echo $a['st_name']; ?>" class="form-control">
																		</div>
																		<div class="item col-md-6">
																			<div class="margin-tb input-group-prepend">
																				<span class="input-group-text">نوع انبار</span>
																			</div>
																			<select name="st_type" class="form-control">
																				<option <?php if( $a["st_type"] == "outsourcer" ){ echo "selected"; } ?> value="outsourcer">برون سپار</option>
																				<option <?php if( $a["st_type"] == "storage" ){ echo "selected"; } ?> value="storage">انبار</option>
																				<option <?php if( $a["st_type"] == "miner" ){ echo "selected"; } ?> value="miner">معدن</option>
																			</select>
																		</div>
																		<div class="item col-md-6">
																			<div class="margin-tb input-group-prepend">
																				<span class="input-group-text">طرف حساب</span>
																			</div>
																			<select name="c_id" class="form-control select2">
																				<?php
																				$res = 0;
																				$res = get_select_query("select * from customer");
																				if($res){
																					foreach($res as $row){
																					?>
																					<option <?php if($row['c_id']==$a['c_id'])echo "selected"; ?> value="<?php echo $row['c_id']; ?>"><?php echo get_customer_name($row['c_id']); ?></option>
																					<?php
																					}
																				}
																				?>
																			</select>
																		</div>
																	</div>
																	<div class="row">
																		<div class="item col-md-12">
																			<div class="margin-tb input-group-prepend">
																				<span class="input-group-text">آدرس انبار</span>
																			</div>
																			<textarea width="100%" name="st_address" class="form-control" placeholder="آدرس انبار"><?php echo $a["st_address"]; ?></textarea>
																		</div>
																	</div>
        														</div>
        														<div class="modal-footer">
        															<center>
        																<button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">انصراف</button>
        																<button class="btn btn-primary btn-sm" name="update-storage_list" value="<?php echo $a['st_id']; ?>" type="submit">ذخیره</button>
        															</center>
        														</div>
        													</form>
        												</div>
        											</div>
        										</div>
        										<form action="" method="post" onSubmit="if(!confirm('آیا از انجام این عملیات اطمینان دارید؟')){return false;}">
        											<button type="button" class="btn btn-warning btn-xs" data-toggle="modal" data-target="#myModal<?php echo $a['st_id']; ?>">ویرایش</button>
        											<button class="btn btn-danger btn-xs" type="submit" name="delete-list" id="delete-list">حذف</button>
        											<input class="hidden" type="text" name="delete-text" id="delete-text" value="<?php echo $a['st_id'];?>">
        											<?php
        												if(isset($_POST['delete-list'])){
        													$st_id = $_POST['delete-text'];
        													$aru->remove('storage_list','st_id', $st_id ,'int');
        													exit();
        												}
        											?>
        										</form>
        									</td>
        								</tr>
        								<?php
        									$i++;
        								}   
									} ?>
							</tbody>
							<tfoot>
								<tr>
									<th>ردیف</th>
									<th>کد</th>
									<th>نام انبار</th>
									<th>نوع انبار</th>
									<th>طرف حساب</th>
									<th>آدرس</th>
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