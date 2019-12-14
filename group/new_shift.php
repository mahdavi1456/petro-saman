<?php include"../header.php"; include"../nav.php";
	$asb = list_Shifts();
	?>
	<div class="content-wrapper">

		<?php breadcrumb("" , "index.php"); ?>

		<section class="content">
			<div id="details" class="col-xs-12">
				<div class="row">
					<form action="" method="post">
						<div id="details" class="col-xs-12">
							<div class="row">
								<div class="item col-md-4">
									<div class="margin-tb input-group-prepend">
										<span class="input-group-text">نام شیفت</span>
									</div>
									<input type="text" name="sh_name" placeholder="نام شیفت" class="form-control">
								</div>
								<div class="item col-md-4">
									<div class="margin-tb input-group-prepend">
										<span class="input-group-text">ساعت ورود</span>
									</div>
									<input type="text" name="sh_checkin" placeholder="ساعت ورود" class="form-control">
								</div>
								<div class="item col-md-4">
									<div class="margin-tb input-group-prepend">
										<span class="input-group-text">ساعت خروج</span>
									</div>
									<input type="text" name="sh_checkout" placeholder="ساعت خروج" class="form-control">
								</div>
								<div class="item col-md-4">
									<button type="submit" class="btn btn-success btn-lg" name="sh_submit">اضافه کردن</button>
								<?php
								if(isset($_POST['sh_submit'])) {
									$array = array();
									array_push($array, $_POST['sh_name']);
									array_push($array, $_POST['sh_checkin']);
									array_push($array, $_POST['sh_checkout']);
									insert_shifts($array);
									echo "<meta http-equiv='refresh' content='0'/>";
								}
								?>
								</div>
							</div>
						</div>
					</form>

					<table id="example1" class="table table-striped table-bordered table-responsive group_save_table">
						<thead>
			  				<tr>
			  					<th>ردیف</th>
  								<th>نام شیفت</th>
  								<th>ساعت ورود</th>
  								<th>ساعت خروج</th>
                  <th>عملیات</th>
			  				</tr>
						</thead>
						<tbody>
						<?php
						if(isset($_POST['sh_edit'])) {

							$array = array();
							array_push($array, $_POST['sh_id']);
							array_push($array, $_POST['sh_name']);
							array_push($array, $_POST['sh_checkin']);
              array_push($array, $_POST['sh_checkout']);

							update_shifts($array);

							echo "<meta http-equiv='refresh' content='0'/>";
						}

						if($asb){
						$row = 1;
						foreach ($asb as $a ) {
							$sh_id = $a['sh_id'];
							?>
				  			<tr>
				  				<td><?php echo $row; ?></td>
  								<td><?php echo $a['sh_name']; ?></td>
  								<td><?php echo per_number($a['sh_checkin']); ?></td>
  								<td><?php echo per_number($a['sh_checkout']); ?></td>
  								<td>
  									<button class="btn btn-primary btn-sm" type="button" data-toggle="modal" data-keyboard="false" data-target="#edit_modal<?php echo $sh_id; ?>">ویرایش</button>
  									<div class="modal fade text-xs-left" id="edit_modal<?php echo $sh_id; ?>" tabindex="-1" role="dialog" aria-labelledby="#edit_modal<?php echo $sh_id; ?>" style="display: none;" aria-hidden="true">
  										<div class="modal-dialog" role="document" id="user_edit">
  											<form action="" method="post">
  											<input type="hidden" name="sh_id" value="<?php echo $sh_id; ?>">
  											<div class="modal-content">
  												<div class="modal-header">
  													<button type="button" class="close" data-dismiss="modal" aria-label="Close">
  														<span aria-hidden="true">×</span>
  													</button>
  													<h4 class="modal-title" id="myModalLabel3">ویرایش اطلاعات</h4>
  												</div>
  												<div class="modal-body">
  													<div class="col-xs-12 no-padd">
  														<div class="row">
  															<div class="item col-md-4">
  																<div class="margin-tb input-group-prepend">
  																	<span class="input-group-text">نام شیفت</span>
  																</div>
  																<input type="text" name="sh_name" placeholder="نام شیفت" class="form-control" value="<?php echo $a['sh_name']; ?>">
  															</div>
  															<div class="item col-md-4">
  																<div class="margin-tb input-group-prepend">
  																	<span class="input-group-text">ساعت ورود</span>
  																</div>
  																<input type="text" name="sh_checkin" placeholder="ساعت ورود" class="form-control" value="<?php echo $a['sh_checkin']; ?>">
  															</div>
  															<div class="item col-md-4">
  																<div class="margin-tb input-group-prepend">
  																	<span class="input-group-text">ساعت خروج</span>
  																</div>
  																<input type="text" name="sh_checkout" placeholder="ساعت خروج" class="form-control" value="<?php echo $a['sh_checkout']; ?>">
  															</div>
  														</div>
  													</div>
  												</div>
  												<div class="modal-footer">
  													<button type="submit" class="btn btn-primary" name="sh_edit">ویرایش</button>
  												</div>
  											</div>
  											</form>
  										</div>
  									</div>
  								</td>
  								<td>
  									<form action="" method="post" onSubmit="if(!confirm('آیا از انجام این عملیات اطمینان دارید؟')){return false;}">
  										<button class="btn btn-danger btn-sm" type="submit" name="delete_shift">حذف</button>
  										<input class="hidden" type="text" name="delete-text" value="<?php echo $a['sh_id']; ?>">
  										<?php
  										if(isset($_POST['delete_shift'])){
  											$sh_id = $_POST['delete-text'];
  											delete_shift($sh_id);
  											echo "<meta http-equiv='refresh' content='0'/>";
  											exit();
  										}
  										?>
  									</form>
  								</td>
				  			</tr>
				  		<?php $row++; ?>
						<?php }
						} else {
							?>
							<tr>
								<td colspan="5">داده ای موجود نیست!</td>
			  				</tr>
							<?php
						}
						?>
						</tbody>
						<tfoot>
							<tr>
								<th>ردیف</th>
								<th>نام شیفت</th>
								<th>ساعت ورود</th>
								<th>ساعت خروج</th>
								<th>عملیات</th>
							</tr>
						</tfoot>
		  			</table>
				</div>
			</div>
		</section>
	</div>
<script src="<?php get_url(); ?>/group/js/script.js"></script>
<script src="<?php get_url(); ?>/group/js/jquery-print.js"></script>
<?php include"../left-nav.php"; include"../footer.php"; ?>
