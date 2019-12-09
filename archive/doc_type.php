<?php include"../header.php"; include"../nav.php";
	$aru = new aru();
	$asb = $aru->get_list("doc_type", "d_id");
?>
<div class="content-wrapper">
	
	<?php breadcrumb(); ?>
	
	<section class="content">
		<?php 
		if(isset($_POST['add-doc_type'])) {
			$aru->add("doc_type", $_POST);
		}
		if(isset($_POST['update-doc_type'])) {
			$d_id = $_POST['update-doc_type'];
			$aru->update('doc_type',$_POST,'d_id', $d_id);
		}
		if(isset($_POST['delete-doc_type'])){
			$d_id = $_POST['delete-doc_type'];
			$aru->remove('doc_type','d_id', $d_id ,'int');
		}
		?>
	</section>
	
	<section class="content">
		<section class="box box-info">
			<div class="box-header with-border">
				<div class="box-body">
					<form action="" method="post">
						
						<div class="row">
							<div class="item col-md-6">
								<label for="s_category">دسته بندی</label>
								<select name="s_category" id="s_category" class="form-control">
									<option value="letter">نامه و مرسوله</option>
									<option value="meeting">صورت جلسه</option>
									<option value="rule">اساس نامه</option>
								</select>
							</div>
							<div class="item col-md-6">
								<label for="s_type0">نوع آیتم</label>
								<input type="text" name="s_type" id="s_type0" placeholder="نوع آیتم" class="form-control">
							</div>
							
						</div>
						
						<div class="row">
							<div class="item col-md-12 text-left">
								<button type="submit"  class="btn-add" name="add-doc_type">اضافه کردن</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</section>
		<table id="example1" class="table table-striped table-bordered table-responsive group_save_table">
			<thead>
				<tr>
					<th>ردیف</th>
					<th>دسته بندی</th>
					<th>نوع</th>
				</tr>
			</thead>
			<tbody>
				<?php
				if($asb){
					$row = 1;
					foreach ($asb as $a ) {
						$d_id = $a['d_id'];
						?>
						<tr>
							<td><?php echo $row; ?></td>
							<td><?php echo $a["s_category"]; ?></td>
							<td><?php echo $a["s_type"]; ?></td>
							
							<td class="force-inline-text">
								<button class="btn btn-primary btn-sm" type="button" data-toggle="modal" data-keyboard="false" data-target="#edit_modal<?php echo $d_id; ?>">ویرایش</button>
								<div class="modal fade text-xs-left" id="edit_modal<?php echo $d_id; ?>" tabindex="-1" role="dialog" aria-labelledby="#edit_modal<?php echo $d_id; ?>" style="display: none;" aria-hidden="true">
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
													
														<div class="item col-md-6">
															<label for="s_category">دسته بندی</label>
															<select name="s_category" id="s_category" class="form-control">
																<option <?php if($a["s_category"]=="letter") echo "selected"; ?> value="letter">نامه و مرسوله</option>
																<option <?php if($a["s_category"]=="meeting") echo "selected"; ?> value="meeting">صورت جلسه</option>
																<option <?php if($a["s_category"]=="rule") echo "selected"; ?> value="rule">اساس نامه</option>
															</select>
														</div>
														<div class="item col-md-6">
															<label for="s_type">نوع آیتم</label>
															<input type="text" name="s_type" id="s_type" placeholder="نوع آیتم" value="<?php echo $a["s_type"]; ?>" class="form-control">
														</div>
													</div>
									
												</div>
												<div class="modal-footer">
													<center>
														<button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">انصراف</button>
														<button class="btn btn-primary btn-sm" name="update-doc_type" value="<?php echo $a['d_id']; ?>" type="submit">ذخیره</button>
													</center>
												</div>
											</div>
										</form>
									</div>
								</div>
								<form action="" method="post" onSubmit="if(!confirm('آیا از انجام این عملیات اطمینان دارید؟')){return false;}">
									<button class="btn btn-danger btn-sm" type="submit" name="delete-doc_type" value="<?php echo $d_id; ?>">حذف</button>
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
					<th>دسته بندی</th>
					<th>نوع</th>
				</tr>
			</tfoot>
		</table>
	</section>
</div>
<?php include"../left-nav.php"; include"../footer.php"; ?>