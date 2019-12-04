<?php include"../header.php"; include"../nav.php";
	$aru = new aru();
	$asb = $aru->get_list('group_info','g_id');
	$asc = $aru->get_list('user','u_id');
	$asd = $aru->get_list('driver','dr_id');
?>
<div class="content-wrapper">
	
	<?php breadcrumb("تعریف گروه"); ?>
	
	<section class="content">
		<section class="box box-info">
			<div class="box-header with-border">
				<div class="box-body">
					<div id="details" class="col-xs-12">	
						<div class="row">
							<form action="" method="post">
								<div id="details" class="col-xs-12">
									<div class="row">
										<div class="item col-md-4">
											<div class="margin-tb input-group-prepend">
												<span class="input-group-text">نام گروه</span>
											</div>
											<input type="text" name="g_name" placeholder="نام گروه" class="form-control">
										</div>
										<div class="item col-md-4">
											<div class="margin-tb input-group-prepend">
												<span class="input-group-text">سرپرست ۱</span>
											</div>
											<select id="g_sup_1" name="g_sup_1" class="form-control select2">
												<?php
													if(count($asc)>0){
														foreach($asc as $row){
														?>
														<option <?php if($row['u_id']==$rm_id)echo "selected"; ?> value="<?php echo $row['u_id']; ?>"><?php echo $row['u_name']; ?></option>								
														<?php
														} 
													} ?>
											</select>
										</div>
										<div class="item col-md-4">
											<div class="margin-tb input-group-prepend">
												<span class="input-group-text">سرپرست ۲</span>
											</div>
											<select id="g_sup_2" name="g_sup_2" class="form-control select2">
												<?php
													if(count($asc)>0){
														foreach($asc as $row){
														?>
														<option <?php if($row['u_id']==$rm_id)echo "selected"; ?> value="<?php echo $row['u_id']; ?>"><?php echo $row['u_name']; ?></option>								
														<?php
														} 
													} ?>
											</select>
										</div>
										<div class="item col-md-4">
											<div class="margin-tb input-group-prepend">
												<span class="input-group-text">سرپرست ۳</span>
											</div>
											<select id="g_sup_3" name="g_sup_3" class="form-control select2">
												<?php
													if(count($asc)>0){
														foreach($asc as $row){
														?>
														<option <?php if($row['u_id']==$rm_id)echo "selected"; ?> value="<?php echo $row['u_id']; ?>"><?php echo $row['u_name']; ?></option>								
														<?php
														} 
													} ?>
											</select>
										</div>
										<div class="item col-md-4">
											<div class="margin-tb input-group-prepend">
												<span class="input-group-text">سرپرست ۴</span>
											</div>
											<select id="g_sup_4" name="g_sup_4" class="form-control select2">
												<?php
													if(count($asc)>0){
														foreach($asc as $row){
														?>
														<option <?php if($row['u_id']==$rm_id)echo "selected"; ?> value="<?php echo $row['u_id']; ?>"><?php echo $row['u_name']; ?></option>								
														<?php
														} 
													} ?>
											</select>
										</div>
										<div class="item col-md-4">
											<div class="margin-tb input-group-prepend">
												<span class="input-group-text">سرپرست ۵</span>
											</div>
											<select id="g_sup_5" name="g_sup_5" class="form-control select2">
												<?php
													if(count($asc)>0){
														foreach($asc as $row){
														?>
														<option <?php if($row['u_id']==$rm_id)echo "selected"; ?> value="<?php echo $row['u_id']; ?>"><?php echo $row['u_name']; ?></option>								
														<?php
														} 
													} ?>
											</select>
										</div>
										<div class="item col-md-4">
											<div class="margin-tb input-group-prepend">
												<span class="input-group-text">راننده ۱</span>
											</div>
											<select id="g_driver_1" name="g_driver_1" class="form-control select2">
												<?php
													if(count($asd)>0){
														foreach($asd as $row){
														?>
														<option <?php if($row['dr_id']==$rm_id)echo "selected"; ?> value="<?php echo $row['dr_id']; ?>"><?php echo $row['dr_name']; ?></option>								
														<?php
														} 
													} ?>
											</select>
										</div>
										<div class="item col-md-4">
											<div class="margin-tb input-group-prepend">
												<span class="input-group-text">راننده ۲</span>
											</div>
											<select id="g_driver_2" name="g_driver_2" class="form-control select2">
												<?php
													if(count($asd)>0){
														foreach($asd as $row){
														?>
														<option <?php if($row['dr_id']==$rm_id)echo "selected"; ?> value="<?php echo $row['dr_id']; ?>"><?php echo $row['dr_name']; ?></option>								
														<?php
														} 
													} ?>
											</select>
										</div>
										<div class="item col-md-4">
											<button type="submit" class="btn btn-success btn-lg" name="g_submit">اضافه کردن</button>
											<?php 
												if(isset($_POST['g_submit'])) {
													$array = array();
													array_push($array, $_POST['g_name']);
													array_push($array, $_POST['g_sup_1']);
													array_push($array, $_POST['g_sup_2']);
													array_push($array, $_POST['g_sup_3']);
													array_push($array, $_POST['g_sup_4']);
													array_push($array, $_POST['g_sup_5']);
													array_push($array, $_POST['g_driver_1']);
													array_push($array, $_POST['g_driver_2']);
													insert_group($array);
													echo "<meta http-equiv='refresh' content='0'/>";
												}
											?>
										</div>
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
					<th>نام گروه</th>
					<th>سرپرست ۱</th>
					<th>سرپرست ۲</th>
					<th>سرپرست ۳</th>
					<th>سرپرست ۴</th>
					<th>سرپرست ۵</th>
					<th>راننده ۱</th>
					<th>راننده ۲</th>
				</tr>
			</thead>
			<tbody>
				<?php
					if(isset($_POST['g_edit'])) {
						
						$array = array();
						array_push($array, $_POST['g_id']);
						array_push($array, $_POST['g_name']);
						array_push($array, $_POST['g_sup_1']);
						array_push($array, $_POST['g_sup_2']);
						array_push($array, $_POST['g_sup_3']);
						array_push($array, $_POST['g_sup_4']);
						array_push($array, $_POST['g_sup_5']);
						array_push($array, $_POST['g_driver_1']);
						array_push($array, $_POST['g_driver_2']);
						
						update_group($array);
						
						echo "<meta http-equiv='refresh' content='0'/>";
					}
					
					if($asb){
						$row = 1;
						foreach ($asb as $a ) {
							$g_id = $a['g_id'];
						?>
						<tr>
							<td><?php echo $row; ?></td>
							<td><?php echo $a['g_name']; ?></td>
							<td><?php echo $a['g_sup_1']; ?></td>
							<td><?php echo $a['g_sup_2']; ?></td>
							<td><?php echo $a['g_sup_3']; ?></td>
							<td><?php echo $a['g_sup_4']; ?></td>
							<td><?php echo $a['g_sup_5']; ?></td>
							<td><?php echo $a['g_driver_1']; ?></td>
							<td><?php echo $a['g_driver_2']; ?></td>
							<td>
								<button class="btn btn-primary btn-sm" type="button" data-toggle="modal" data-keyboard="false" data-target="#edit_modal<?php echo $g_id; ?>">ویرایش</button>
								<div class="modal fade text-xs-left" id="edit_modal<?php echo $g_id; ?>" tabindex="-1" role="dialog" aria-labelledby="#edit_modal<?php echo $g_id; ?>" style="display: none;" aria-hidden="true">
									<div class="modal-dialog" role="document" id="user_edit">
										<form action="" method="post">
											<input type="hidden" name="g_id" value="<?php echo $g_id; ?>">
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
																	<span class="input-group-text">نام گروه</span>
																</div>
																<input type="text" name="g_name" placeholder="نام گروه" class="form-control" value="<?php echo $a['g_name']; ?>">
															</div>
															<div class="item col-md-4">
																<div class="margin-tb input-group-prepend">
																	<span class="input-group-text">سرپرست ۱</span>
																</div>
																<input type="text" name="g_sup_1" placeholder="سرپرست ۱" class="form-control" value="<?php echo $a['g_sup_1']; ?>">
															</div>
															<div class="item col-md-4">
																<div class="margin-tb input-group-prepend">
																	<span class="input-group-text">سرپرست ۲</span>
																</div>
																<input type="text" name="g_sup_2" placeholder="سرپرست ۲" class="form-control" value="<?php echo $a['g_sup_2']; ?>">
															</div>
															<div class="item col-md-4">
																<div class="margin-tb input-group-prepend">
																	<span class="input-group-text">سرپرست ۳</span>
																</div>
																<input type="text" name="g_sup_3" placeholder="سرپرست ۳" class="form-control" value="<?php echo $a['g_sup_3']; ?>">
															</div>
															<div class="item col-md-4">
																<div class="margin-tb input-group-prepend">
																	<span class="input-group-text">سرپرست ۴</span>
																</div>
																<input type="text" name="g_sup_4" placeholder="سرپرست ۴" class="form-control" value="<?php echo $a['g_sup_4']; ?>">
															</div>
															<div class="item col-md-4">
																<div class="margin-tb input-group-prepend">
																	<span class="input-group-text">سرپرست ۵</span>
																</div>
																<input type="text" name="g_sup_5" placeholder="سرپرست ۵" class="form-control" value="<?php echo $a['g_sup_5']; ?>">
															</div>
															<div class="item col-md-4">
																<div class="margin-tb input-group-prepend">
																	<span class="input-group-text">راننده ۱</span>
																</div>
																<input type="text" name="g_driver_1" placeholder="راننده ۱" class="form-control" value="<?php echo $a['g_driver_1']; ?>">
															</div>
															<div class="item col-md-4">
																<div class="margin-tb input-group-prepend">
																	<span class="input-group-text">راننده ۲</span>
																</div>
																<input type="text" name="g_driver_2" placeholder="راننده ۲" class="form-control" value="<?php echo $a['g_driver_2']; ?>">
															</div>
														</div>
													</div>
												</div>
												<div class="modal-footer">
													<button type="submit" class="btn btn-primary" name="g_edit">ویرایش</button>
												</div>
											</div>
										</form>
									</div>
								</div>
							</td>
							<td>
								<form action="" method="post" onSubmit="if(!confirm('آیا از انجام این عملیات اطمینان دارید؟')){return false;}">
									<button class="btn btn-danger btn-sm" type="submit" name="delete_group">حذف</button>
									<input class="hidden" type="text" name="delete-text" value="<?php echo $a['g_id']; ?>">
									<?php
										if(isset($_POST['delete_group'])){
											$g_id = $_POST['delete-text'];
											delete_group($g_id);
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
						<td colspan="8">داده ای موجود نیست!</td>
					</tr>
					<?php
					}
				?>
			</tbody>
			<tfoot>
				<tr>
					<th>ردیف</th>
					<th>نام گروه</th>
					<th>سرپرست ۱</th>
					<th>سرپرست ۲</th>
					<th>سرپرست ۳</th>
					<th>سرپرست ۴</th>
					<th>سرپرست ۵</th>
					<th>راننده ۱</th>
					<th>راننده ۲</th>
				</tr>
			</tfoot>
		</table>
	</section>
</div>
<script src="<?php get_url(); ?>/group/js/script.js"></script>
<script src="<?php get_url(); ?>/group/js/jquery-print.js"></script>
<?php include"../left-nav.php"; include"../footer.php"; ?>