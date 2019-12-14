<?php include"../header.php"; include"../nav.php";
	$aru = new aru();
	$asb = $aru->get_list("doc_type", "dt_id");
?>
<?php 
		if(isset($_POST['add-doc_type'])) {
			$aru->add("doc_type", $_POST);
		}
		if(isset($_POST['update-doc_type'])) {
			$dt_id = $_POST['update-doc_type'];
			$aru->update('doc_type',$_POST,'dt_id', $dt_id);
		}
		if(isset($_POST['delete-doc_type'])){
			$dt_id = $_POST['delete-doc_type'];
			$aru->remove('doc_type','dt_id', $dt_id ,'int');
		}
		?>
<div class="content-wrapper">
	
	<?php  breadcrumb("" , "index.php"); ?>
	
	<section class="content">
		<section class="box box-info">
			<div class="box-header with-border">
                <h3 class="box-title">تعریف نوع سند</h3>
			</div>
				<div class="box-body">
					<form action="" method="post">
						<div class="row">
							<div class="item col-xs-9">
								<div class="margin-tb input-group-prepend">
									<span class="input-group-text">نوع سند </span><span class="necessary">*</span>
								</div>
								<input id="dt_type" type="text" name="dt_type" placeholder="نوع سند" class="form-control" required>
							</div></br>
							</br>
							<div class="col-xs-3 text-left">
								<button type="submit" class="btn btn-success w-100" name="add-doc_type">اضافه کردن</button>
							</div>
						</div>
					</form>
				</div>
		</section>
		<section class="box box-info">
			<div class="box-header with-border">
                <h3 class="box-title">لیست انواع سند</h3>
            </div>
            <div class="box-body">
				<table id="example1" class="table table-striped table-bordered table-responsive group_save_table">
					<thead>
						<tr>
							<th>ردیف</th>
							<th>نوع سند</th>
							<th>عملیات</th>
						</tr>
					</thead>
					<tbody>
						<?php
						if($asb){
							$row = 1;
							foreach ($asb as $a ) {
								$dt_id = $a['dt_id'];
								?>
								<tr>
									<td><?php echo $row; ?></td>
									<td><?php echo $a["dt_type"]; ?></td>
									
									<td class="force-inline-text">
										<button class="btn btn-primary btn-sm" type="button" data-toggle="modal" data-keyboard="false" data-target="#edit_modal<?php echo $dt_id; ?>">ویرایش</button>
										<div class="modal fade text-xs-left" id="edit_modal<?php echo $dt_id; ?>" tabindex="-1" role="dialog" aria-labelledby="#edit_modal<?php echo $dt_id; ?>" style="display: none;" aria-hidden="true">
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
																	<label for="dt_type">نوع سند</label><span class="necessary"> *</span>
																	<input type="text" name="dt_type" id="dt_type" placeholder="نوع سند" value="<?php echo $a["dt_type"]; ?>" class="form-control" required>
																</div>
															</div>
											
														</div>
														<div class="modal-footer">
															<center>
																<button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">انصراف</button>
																<button class="btn btn-primary btn-sm" name="update-doc_type" value="<?php echo $a['dt_id']; ?>" type="submit">ذخیره</button>
															</center>
														</div>
													</div>
												</form>
											</div>
										</div>
										<form action="" method="post" onSubmit="if(!confirm('آیا از انجام این عملیات اطمینان دارید؟')){return false;}">
											<button class="btn btn-danger btn-sm" type="submit" name="delete-doc_type" value="<?php echo $dt_id; ?>">حذف</button>
										</form>
									</td>
								</tr>
								<?php
							$row++;
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
							<th>نوع سند</th>
							<th>عملیات</th>
						</tr>
					</tfoot>
				</table>
			</div>
		</section>
	</section>
</div>
<?php include"../left-nav.php"; include"../footer.php"; ?>