<?php include"../header.php"; include"../nav.php";
	$aru = new aru();
	$asb = $aru->get_list('hse_item','h_id');
?>
<div class="content-wrapper">
	
	<?php
		breadcrumb();
		if(isset($_POST['add-hse_item'])) {
			$h_name = $_POST['h_name'];
			$aru->add_if_not_exists("hse_item", $_POST, "h_name", $h_name, "string", "h_id");
		}
		if(isset($_POST['update-hse_item'])) {
			$h_id = $_POST['update-hse_item'];
			$aru->update('hse_item',$_POST,'h_id', $h_id);
		}
		if(isset($_POST['delete_hse_item'])){
			$h_id = $_POST['delete-text'];
			$aru->remove('hse_item','h_id', $h_id ,'int');
		}
		?>
	
	<section class="content">
		<section class="box box-info">
			<div class="box-header with-border">
				<div class="box-body">
					<div id="details" class="col-xs-12">	
						<div class="row">
							<form action="" method="post">
								<div class="row">
									<div class="item col-md-5">
										<div class="margin-tb input-group-prepend">
											<span class="input-group-text">نام آیتم</span>
										</div>
										<input type="text" name="h_name" placeholder="نام آیتم" class="form-control">
									</div>
									<div class="item col-md-5">
										<div class="margin-tb input-group-prepend">
											<span class="input-group-text">وضعیت</span>
										</div>
										<select name="h_status" class="form-control">
											<option value="1">فعال</option>
											<option value="0">غیرفعال</option>
										</select>
									</div>
									<div class="item col-md-2 text-left" style="margin-top:10px;">
										<br>
										<button type="submit"  class="btn btn-success w-100" name="add-hse_item">اضافه کردن</button>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</section>
		<table id="example1" class="table table-striped table-bordered table-responsive group_save_table">
			<thead>
				<tr>
					<th>ردیف</th>
					<th>نام آیتم</th>
					<th>وضعیت</th>
					<th>عملیات</th>
				</tr>
			</thead>
			<tbody>
				<?php
				if($asb){
					$row = 1;
					foreach ($asb as $a ) {
						$h_id = $a['h_id'];
						?>
						<tr>
							<td><?php echo $row; ?></td>
							<td><?php echo $a['h_name']; ?></td>
							<td><?php if($a['h_status']==1) echo "فعال"; else echo "غیرفعال"; ?></td>
							<td>
								<div class="modal fade text-xs-left" id="edit_modal<?php echo $h_id; ?>" tabindex="-1" role="dialog" aria-labelledby="#edit_modal<?php echo $h_id; ?>" style="display: none;" aria-hidden="true">
									<div class="modal-dialog" role="document" id="hse_item_edit">
										<form action="" method="post">
											<div class="modal-content">
												<div class="modal-header">
													<button type="button" class="close" data-dismiss="modal" aria-label="Close">
														<span aria-hidden="true">×</span>
													</button>
													<h4 class="modal-title" id="myModalLabel3">ویرایش اطلاعات</h4>
												</div>
												<div class="modal-body">
													<div class="row">
														<div class="item col-md-12">
															<label for="h_name">نام آیتم</label>
															<input type="text" id="h_name" name="h_name" placeholder="نام آیتم" class="form-control" value="<?php echo $a['h_name']; ?>">
														</div>
														<div class="item col-md-12">
															<label for="h_status">وضعیت</label>
															<select id="h_status" name="h_status" class="form-control">
																<option <?php if($a['h_status']==1) echo "selected"; ?> value="1">فعال</option>
																<option <?php if($a['h_status']==0) echo "selected"; ?> value="0">غیرفعال</option>
															</select>
														</div>
													</div>
												</div>
												<div class="modal-footer">
													<center>
														<button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">انصراف</button>
														<button class="btn btn-primary btn-sm" name="update-hse_item" value="<?php echo $a['h_id']; ?>" type="submit">ذخیره</button>
													</center>
												</div>
											</div>
										</form>
									</div>
								</div>
								<form action="" method="post" onSubmit="if(!confirm('آیا از انجام این عملیات اطمینان دارید؟')){return false;}">
									<button class="btn btn-primary btn-sm" type="button" data-toggle="modal" data-keyboard="false" data-target="#edit_modal<?php echo $h_id; ?>">ویرایش</button>
									<button class="btn btn-danger btn-sm" type="submit" name="delete_hse_item">حذف</button>
									<input class="hidden" type="text" name="delete-text" value="<?php echo $a['h_id']; ?>">
								</form>
							</td>
						</tr>
						<?php
					$row++;
					}
				} else {
					?>
					<tr>
						<td colspan="8">داده ای موجود نیست!</td>
					</tr>
					<?php
				}
				?>
			</tbody>
			<tfoot>
				<tr>
					<th>ردیف</th>
					<th>نام آیتم</th>
					<th>وضعیت</th>
					<th>عملیات</th>
				</tr>
			</tfoot>
		</table>
	</section>
</div>
<script src="<?php get_url(); ?>/group/js/script.js"></script>
<script src="<?php get_url(); ?>/group/js/jquery-print.js"></script>
<?php include"../left-nav.php"; include"../footer.php"; ?>