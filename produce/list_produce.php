<?php
include"../header.php";
include"../nav.php";
$u_level = get_current_user_level();
$aru = new aru();
$prc_type = $_GET['prc_type'];
?>
	<div class="content-wrapper">
	
		<?php 
		if($prc_type == "کلسیناسیون") { breadcrumb("تولیدات کلسیناسیون" , "index.php"); }
		if($prc_type == "گرانول سازی") { breadcrumb("تولیدات گرانول سازی" , "index.php"); }
		if($prc_type == "خردایش") { breadcrumb("تولیدات خردایش" , "index.php"); }
		if($prc_type == "سرند") { breadcrumb("تولیدات سرند" , "index.php"); }
		
		
		?>

		<section class="content">
			<div class="row">
				<div class="col-xs-12">
			  		<div class="box">
						<div class="box-header">
				  			<h3 class="box-title">لیست تولیدات <?php echo $prc_type; ?></h3>
						</div>
						<div class="box-body">
							<form action="" method="post">
								<input type="hidden" name="prc_st_id" value="0">
								<input type="hidden" name="prc_status" value="0">
								<input type="hidden" name="prc_type" value="<?php echo $prc_type; ?>">
								<div id="details" class="col-xs-12">
									<div class="row">
										<div class="item col-md-3">
											<label>تاریخ</label>
											<input id="f_date" autocomplete="off" type="text" name="prc_date" placeholder="تاریخ" class="form-control">
										</div>
										<div class="item col-md-3">
											<label>شیفت</label>
											<select name="prc_sh_id" class="form-control select2">
												<?php
												$shifts = list_shifts();
												foreach($shifts as $shift){
													$sh_name = $shift['sh_name'];
													$sh_id = $shift['sh_id'];
													echo "<option value='$sh_id'>$sh_name</option>";
												}
												?>
											</select>
										</div>
										<div class="item col-md-3">
											<label>محصول ورودی</label>
											<select name="inp_p_id" class="form-control select2">
												<?php
												$products = list_product();
												foreach($products as $product){
													$p_name = $product['p_name'];
													$p_id = $product['p_id']; ?>
													<option value='$p_id'><?php echo per_number($p_name); ?></option>
													<?php
												}
												?>
											</select>
										</div>
										<div class="item col-md-3">
											<label>دانه بندی ورودی</label>
											<select name="inp_cat_id" class="form-control select2">
												<?php
												$categories = list_category();
												foreach($categories as $category){
													$cat_name = $category['cat_name'];
													$cat_id = $category['cat_id']; ?>
													<option value='$cat_id'><?php echo per_number($cat_name); ?></option>
													<?php
												}
												?>
											</select>
										</div>
									</div>
									<div class="row">
										<div class="item col-md-3">
											<label>محصول خروجی</label>
											<select name="prc_p_id" class="form-control select2">
												<?php
												$products = list_product();
												foreach($products as $product){
													$p_name = $product['p_name'];
													$p_id = $product['p_id']; ?>
													<option value='$p_id'><?php echo per_number($p_name); ?></option>
													<?php
												}
												?>
											</select>
										</div>
										<div class="item col-md-3">
											<label>دانه بندی خروجی</label>
											<select name="prc_cat_id" class="form-control select2">
												<?php
												$categories = list_category();
												foreach($categories as $category){
													$cat_name = $category['cat_name'];
													$cat_id = $category['cat_id']; ?>
													<option value='$cat_id'><?php echo per_number($cat_name); ?></option>
													<?php
												}
												?>
											</select>
										</div>
										<div class="item col-md-3">
											<label>مقدار</label>
											<input id="prc_val" type="text" name="prc_val" onkeyup="javascript:FormatNumber('prc_val', 'prc_val2'); calculate()" placeholder="مقدار" class="form-control" autocomplete="off" required>
											<input id="prc_val2" type="text" class="form-control" disabled="disabled" style="margin: 0;">
										</div>
									</div>
									<div class="row">
										<div class="item col-md-4">
											<button type="submit" class="btn btn-success" name="add-produce">اضافه کردن</button>
											<?php
											if(isset($_POST['add-produce'])) {
												$aru->add('produce', $_POST);
											}
											?>
										</div>
									</div>
								</div>
							</form>

				  			<table id="example1" class="table table-bordered table-striped">
								<thead>
					  				<tr>
					  					<th>#</th>
					  					<th>تاریخ</th>
										<th>شبفت</th>
										<th>محصول ورودی</th>
										<th>دانه بندی ورودی</th>
										<th>مقدار</th>
										<th>محصول خروجی</th>
										<th>دانه بندی خروجی</th>
										<th>آزمون</th>
										<th>تایید نهایی</th>
										<th>عمیلات</th>
					  				</tr>
								</thead>
								<tbody>
								<?php
								if(isset($_POST['prc_edit'])) {
									$array = array();
									array_push($array, $_POST['prc_id']);
									array_push($array, $_POST['prc_date']);
									array_push($array, $_POST['prc_sh_id']);
									array_push($array, $_POST['prc_p_id']);
									array_push($array, $_POST['prc_cat_id']);
									array_push($array, $_POST['prc_val']);
									update_produce($array);
									echo "<meta http-equiv='refresh' content='0'/>";
								}

								$produces = get_select_query("select * from produce where prc_type = '$prc_type'");
								if($produces){
								$row1 = 1;
								foreach ($produces as $produce) {
									$prc_id = $produce['prc_id'];
								
									$prc_p_name = get_product_name($produce['prc_p_id']);
									$prc_cat_name = get_category_name($produce['prc_cat_id']);
									?>
						  			<tr>
						  				<td><?php echo per_number($row1); ?></td>
										<td><?php echo per_number($produce['prc_date']); ?></td>
										<td><?php echo get_shift_name($produce['prc_sh_id']); ?></td>
										<td><?php echo per_number(get_product_name($produce['inp_p_id'])); ?></td>
										<td><?php echo per_number(get_category_name($produce['inp_cat_id'])); ?></td>
										<td><?php echo per_number(number_format($produce['prc_val'])); ?></td>
										<td><?php echo per_number(get_product_name($produce['prc_p_id'])); ?></td>
										<td><?php echo per_number(get_category_name($produce['prc_cat_id'])); ?></td>
										<td>
											<?php
											$prc_status = $produce['prc_status'];
											$cycle = "produce";
											$cycle_id = $produce['prc_id'];
											$check_analyze = get_var_query("select count(analyze_id) from analyze_form where cycle = '$cycle' and cycle_id = $cycle_id");
											//if($prc_status != 0){
											if($check_analyze > 0){
												?>
												<a class="btn btn-success btn-sm" href="<?php if($u_level=="مدیر" || $u_level=="آزمایشگاه"){ ?>../lab/report-analyze.php?cycle=<?php echo $cycle; ?>&cycle_id=<?php echo $cycle_id; ?><?php }else{echo "#";} ?>">گزارش آزمون</a>
												<?php
											}else{
												?>
												<a class="btn btn-info btn-sm" href="<?php if($u_level=="مدیر" || $u_level=="آزمایشگاه"){ ?>../lab/form-analyze.php?cycle=<?php echo $cycle; ?>&cycle_id=<?php echo $cycle_id; ?><?php }else{echo "#";} ?>">فرم آزمایشگاه</a>
												<?php
											}
											?>
										</td>
										<td>
											<?php
											$prc_status = $produce['prc_status'];
											$cycle = "produce";
											$cycle_id = $produce['prc_id'];
											$analyze_status = get_var_query("select count(analyze_id) from analyze_form where cycle = '$cycle' and cycle_id = $cycle_id");
												if($prc_status != 0){ ?>
													<span class="btn btn-sm btn-success">اضافه شده</span>
													<?php
												}else{ ?>
													<button class="btn btn-warning btn-sm" type="button" data-toggle="modal" data-keyboard="false" data-target="#stock_modal<?php echo $prc_id; ?>">اضافه به موجودی</button>
													<div class="modal fade text-xs-left" id="stock_modal<?php echo $prc_id; ?>" tabindex="-1" role="dialog" aria-labelledby="#stock_modal<?php echo $prc_id; ?>" style="display: none;" aria-hidden="true">
														<div class="modal-dialog" role="document" id="user_edit">
															<form action="" method="post">
															<input type="hidden" name="prc_status" value="1">
															<div class="modal-content">
																<div class="modal-header">
																	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																		<span aria-hidden="true">×</span>
																	</button>
																	<h4 class="modal-title" id="myModalLabel3">اضافه به موجودی</h4>
																</div>
																<div class="modal-body">
																	<div class="row">
																		<div class="item col-md-12">
																			<div class="margin-tb input-group-prepend">
																				<span class="input-group-text">انبار</span>
																			</div>
																			<select name="prc_st_id" class="form-control select2">
																			<?php
																			$res = get_select_query("select * from storage_list where st_type = 'storage'");
																			if(count($res)>0){
																				foreach($res as $row){ ?>
																				<option value="<?php echo $row['st_id']; ?>"><?php echo $row['st_name']; ?></option>
																				<?php
																				}
																			}
																			?>
																			</select>
																		</div>
																	</div>
																</div>
																<div class="modal-footer">
																	<button class="btn btn-warning btn-sm" type="submit" name="update-produce" value="<?php echo $prc_id; ?>">اضافه به موجودی</button>
																	<?php
																	if(isset($_POST['update-produce'])){
																		$prc_id = $_POST['update-produce'];
																		$aru -> update("produce", $_POST, "prc_id", $prc_id);
																	}
																	?>
																</div>
															</div>
															</form>
														</div>
													</div>
													<?php
												}
											?>
										</td>
										<td>
											<button class="btn btn-primary btn-xs inline-btn-operation" type="button" data-toggle="modal" data-keyboard="false" data-target="#edit_modal<?php echo $prc_id; ?>">ویرایش</button>
											<div class="modal fade text-xs-left" id="edit_modal<?php echo $prc_id; ?>" tabindex="-1" role="dialog" aria-labelledby="#edit_modal<?php echo $prc_id; ?>" style="display: none;" aria-hidden="true">
												<div class="modal-dialog" role="document" id="user_edit">
													<form action="" method="post">
													<input type="hidden" name="prc_id" value="<?php echo $prc_id; ?>">
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
																			<span class="input-group-text">تاریخ</span>
																		</div>
																		<input id="f_date" autocomplete="off" type="text" name="prc_date" placeholder="تاریخ" class="form-control" value="<?php echo $produce['prc_date']; ?>">
																	</div>
																	<div class="item col-md-4">
																		<div class="margin-tb input-group-prepend">
																			<span class="input-group-text">شیفت</span>
																		</div>
																		<select name="prc_sh_id" class="form-control select2">
																			<?php
																			$shifts = list_shifts();
																			foreach($shifts as $shift){
																				$sh_name = $shift['sh_name'];
																				$sh_id = $shift['sh_id'];
																				?><option <?php if($produce['prc_sh_id']==$sh_id){echo "selected";} ?> value='<?php echo $sh_id; ?>'><?php echo $sh_name; ?></option><?php
																			}
																			?>
																		</select>
																	</div>
																	<div class="item col-md-4">
																		<div class="margin-tb input-group-prepend">
																			<span class="input-group-text">محصول</span>
																		</div>
																		<select name="prc_p_id" class="form-control select2">
																			<?php
																			$products = list_product();
																			foreach($products as $product){
																				$p_name = $product['p_name'];
																				$p_id = $product['p_id'];
																				?><option <?php if($produce['prc_p_id']==$p_id){echo "selected";} ?> value='<?php echo $p_id; ?>'><?php echo per_number($p_name); ?></option><?php
																			}
																			?>
																		</select>
																	</div>
																</div>
																<div class="row">
																	<div class="item col-md-4">
																		<div class="margin-tb input-group-prepend">
																			<span class="input-group-text">محصول</span>
																		</div>
																		<select name="prc_cat_id" class="form-control select2">
																			<?php
																			$categories = list_category();
																			foreach($categories as $category){
																				$cat_name = $category['cat_name'];
																				$cat_id = $category['cat_id'];
																				?><option <?php if($produce['prc_cat_id']==$cat_id){echo "selected";} ?> value='<?php echo $cat_id; ?>'><?php echo per_number($cat_name); ?></option><?php
																			}
																			?>
																		</select>
																	</div>
																	<div class="item col-md-4">
																		<div class="margin-tb input-group-prepend">
																			<span class="input-group-text">مقدار</span>
																		</div>
																		<input type="text" name="prc_val" placeholder="مقدار" class="form-control" value="<?php echo $produce['prc_val']; ?>">
																	</div>
																</div>
															</div>
														</div>
														<div class="modal-footer">
															<button type="submit" class="btn btn-primary" name="prc_edit">ویرایش</button>
														</div>
													</div>
													</form>
												</div>
											</div>
											<form class="inline-btn-operation" action="" method="post" onSubmit="if(!confirm('آیا از انجام این عملیات اطمینان دارید؟')){return false;}">
												<button class="btn btn-danger btn-xs" type="submit" name="delete_produce">حذف</button>
												<input class="hidden" type="text" name="prc_id" value="<?php echo $prc_id; ?>">
												<?php
												if(isset($_POST['delete_produce'])){
													$prc_id = $_POST['prc_id'];
													delete_produce($prc_id);
													echo "<meta http-equiv='refresh' content='0'/>";
													exit();
												}
												?>
											</form>
										</td>
						  			</tr>
						  		<?php $row1++; ?>
								<?php }
								} else { ?>
								<tr>
									<td colspan="11">داده ای موجود نیست.</td>
								</tr>
								<?php
								}
								?>
								</tbody>
								<tfoot>
					  				<tr>
					  					<th>#</th>
					  					<th>تاریخ</th>
										<th>شبفت</th>
										<th>محصول ورودی</th>
										<th>دانه بندی ورودی</th>
										<th>مقدار</th>
										<th>محصول خروجی</th>
										<th>دانه بندی خروجی</th>
										<th>آزمون</th>
										<th>تایید نهایی</th>
										<th>عمیلات</th>
					  				</tr>
								</tfoot>
				  			</table>
						</div>
			  		</div>
				</div>
		  	</div>
		</section>
	</div>
<?php include"../left-nav.php"; include"../footer.php"; ?>