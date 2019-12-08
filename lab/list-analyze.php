<?php include"../header.php"; include"../nav.php"; $u_level = get_current_user_level(); $aru = new aru(); ?>
<div class="content-wrapper">

	<?php breadcrumb(); ?>

	<section class="content">
		<div class="row">
			<div class="col-xs-12">
				<div class="box">
				    <div class="box-header">
			  			<h3 class="box-title">ایجاد آزمون جدید</h3>
					</div>
					<div class="box-body">
    					<form action="" method="post" id="myForm">
							<div id="details" class="col-xs-12">
								<div class="row">
									<div class="item col-md-6">
										<div class="margin-tb input-group-prepend">
											<span class="input-group-text">تاریخ دریافت آزمون</span>
										</div>
										<input type="text" name="oa_date" placeholder="تاریخ دریافت آزمون" class="form-control datepickerClass" data-required="1">
										<span></span>
									</div>
									<div class="item col-md-6">
										<div class="margin-tb input-group-prepend">
											<span class="input-group-text">نام محصول</span>
										</div>
											<select class="form-control" name="p_id">
												<?php $sql = "select * from product";
													$res = get_select_query($sql);
													if(count($res) > 0) {
														foreach($res as $row) { ?>
															<option value="<?php echo $row['p_id']; ?>" ><?php echo per_number($row['p_name']); ?></option>
														<?php
														}
													}
													?>
											</select>
										<span></span>
									</div>
									<div class="item col-md-6">
										<div class="margin-tb input-group-prepend">
											<span class="input-group-text">دانه بندی بندی</span>
										</div>
										<select class="form-control" name="cat_id">
											<?php $sql = "select * from category";
												$res = get_select_query($sql);
												if(count($res) > 0) {
													foreach($res as $row) { ?>
														<option value="<?php echo $row['cat_id']; ?>" ><?php echo per_number($row['cat_name']); ?></option>
													<?php
													}
												}
												?>
										</select>										<span></span>
									</div>
									<div class="item col-md-6">
										<div class="margin-tb input-group-prepend">
											<span class="input-group-text">توضیحات</span>
										</div>
										<input type="text" name="oa_description" placeholder="توضیحات" class="form-control" data-required="1">
										<span></span>
									</div>
									<div class="item col-md-4" style="margin-top:10px;">
									    <br>
										<button type="submit" class="btn btn-success btn-sm " name="add-other_analyze">اضافه کردن</button>
										<?php 
										if(isset($_POST["add-other_analyze"])) {
											$aru->add("other_analyze", $_POST);
										}
										?>
									</div>
								</div>
							</div>
						</form>
					</div>
				</div>

				<div class="box">
					<div class="box-header">
			  			<h3 class="box-title">لیست آزمون های خرید</h3>
					</div>
					<div class="box-body">
						<table class="table table-bordered table-striped table_pagination">
							<thead>
								<tr>
                                    <th>ردیف</th>
									<th>کد فاکتور خرید</th>
									<th>کد ردیف فاکتور</th>
									<th>محصول و دانه بندی</th>
									<th>عملیات</th>
								</tr>
							</thead>
							<tbody>
							<?php
							$i = 1;
                            $sql = "select * from analyze_form af inner join bar_bring bb on bb.bar_id = af.cycle_id inner join factor_buy_body fbb on bb.fb_id = fbb.fb_id where af.cycle = 'buy'";
							$res = get_select_query($sql);
							foreach ($res as $row) {
								//$ma_name = $aru->field_by_type("product", "p_name", "p_id", $row["ma_id"], "int");
								$ma_id = $row["ma_id"] ;
								$cat_id = $row["cat_id"] ;
								$ma_name = get_var_query("select p_name from product where p_id = $ma_id ");
								$cat_name = get_var_query("select cat_name from category where cat_id = $cat_id ");
								//$cat_name = $aru->field_by_type("category", "cat_name", "cat_id", $row["cat_id"], "int");
                                ?>
								<tr>
                                    <td><?php echo per_number($i); ?></td>
									<td><?php echo per_number($row['f_id']); ?></td>
									<td><?php echo per_number($row['fb_id']); ?></td>
									<td><?php echo $ma_name . " و " . per_number($cat_name); ?></td>
									<td>
										<?php
										$cycle = "buy";
										$cycle_id = $row['bar_id'];
										$check_analyze = get_var_query("select count(analyze_id) from analyze_form where cycle = '$cycle' and cycle_id = $cycle_id");
										if($check_analyze > 0){
											?>
											<a class="btn btn-success btn-sm" href="<?php if($u_level=="مدیریت" || $u_level=="آزمایشگاه"){ ?>../lab/report-analyze.php?cycle=<?php echo $cycle; ?>&cycle_id=<?php echo $cycle_id; ?><?php }else{echo "#";} ?>">گزارش آزمون</a>
											<?php
										}else{
											?>
											<a class="btn btn-info btn-sm" href="<?php if($u_level=="مدیریت" || $u_level=="آزمایشگاه"){ ?>../lab/form-analyze.php?cycle=<?php echo $cycle; ?>&cycle_id=<?php echo $cycle_id; ?><?php }else{echo "#";} ?>">فرم آزمایشگاه</a>
											<?php
										}
										?>
									</td>
								</tr>
                                <?php
                                $i++;
                            }
                            ?>
							</tbody>
							<tfoot>
								<tr>
                                    <th>ردیف</th>
									<th>کد فاکتور خرید</th>
									<th>کد ردیف فاکتور</th>
									<th>محصول و دانه بندی</th>
									<th>عملیات</th>
								</tr>
							</tfoot>
						</table>
					</div>
				</div>
				
				<div class="box">
					<div class="box-header">
			  			<h3 class="box-title">لیست آزمون های فروش</h3>
					</div>
					<div class="box-body">
						<table class="table table-bordered table-striped table_pagination">
							<thead>
								<tr>
                                    <th>ردیف</th>
									<th>کد فاکتور فروش</th>
									<th>کد ردیف فاکتور</th>
									<th>محصول و دانه بندی</th>
									<th>عملیات</th>
								</tr>
							</thead>
							<tbody>
							<?php
							$i = 1;
							$sql = "select * from analyze_form af inner join bar_bring bb on bb.bar_id = af.cycle_id inner join factor_body fbb on bb.fb_id = fbb.fb_id where af.cycle = 'sell'";
							$res = get_select_query($sql);
							if(count($res)>0){
								foreach ($res as $row) {
									$p_id = $row["p_id"] ;
									$cat_id = $row["cat_id"] ;
									$p_name = get_var_query("select p_name from product where p_id = $p_id ");
									$cat_name = get_var_query("select cat_name from category where cat_id = $cat_id ");
									//$p_name = $aru->field_by_type("product", "p_name", "p_id", $row["p_id"], "int");
									//$cat_name = $aru->field_by_type("category", "cat_name", "cat_id", $row["cat_id"], "int");
									?>
									<tr>
										<td><?php echo per_number($i); ?></td>
										<td><?php echo per_number($row['f_id']); ?></td>
										<td><?php echo per_number($row['fb_id']); ?></td>
										<td><?php echo $p_name . " و " . per_number($cat_name); ?></td>
										<td>
											<?php /*
											$fl_exit_bar = $row['fl_exit_bar'];
											$cycle = "sell";
											$cycle_id = $row['l_id'];
											if($row['fl_admin_confirm'] != 0){
												?>
												<a class="btn btn-success btn-sm" href="<?php if($u_level=="مدیر" || $u_level=="آزمایشگاه"){ ?>../lab/report-analyze.php?cycle=<?php echo $cycle; ?>&cycle_id=<?php echo $cycle_id; ?><?php }else{echo "#";} ?>">گزارش آزمون</a>
												<?php
											}else{
												?>
												<a class="btn btn-info btn-sm" href="<?php if($u_level=="مدیر" || $u_level=="آزمایشگاه"){ ?>../lab/form-analyze.php?cycle=<?php echo $cycle; ?>&cycle_id=<?php echo $cycle_id; ?><?php }else{echo "#";} ?>">فرم آزمایشگاه</a>
												<?php
											}*/
											?>

											<?php
											$cycle = "sell";
											$cycle_id = $row['bar_id'];
											$check_analyze = get_var_query("select count(analyze_id) from analyze_form where cycle = '$cycle' and cycle_id = $cycle_id");
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
									</tr>
									<?php
									$i++;
								}
							}
                            ?>
							</tbody>
							<tfoot>
								<tr>
                                    <th>ردیف</th>
									<th>کد فاکتور فروش</th>
									<th>کد ردیف فاکتور</th>
									<th>محصول و دانه بندی</th>
									<th>عملیات</th>
								</tr>
							</tfoot>
						</table>
					</div>
				</div>
				
				<div class="box">
					<div class="box-header">
			  			<h3 class="box-title">لیست آزمون های تولید</h3>
					</div>
					<div class="box-body">
						<table class="table table-bordered table-striped table_pagination">
							<thead>
								<tr>
                                    <th>ردیف</th>
									<th>کد تولید</th>
									<th>تاریخ تولید</th>
									<th>محصول و دانه بندی</th>
									<th>عملیات</th>
								</tr>
							</thead>
							<tbody>
							<?php
							$i = 1;
							$sql = "select * from analyze_form af inner join produce p on p.prc_id = af.cycle_id  where af.cycle = 'produce'";
							$res = get_select_query($sql);
							foreach ($res as $row) {
								$p_id = $row["prc_p_id"] ;
								$cat_id = $row["prc_cat_id"] ;
								$p_name = get_var_query("select p_name from product where p_id = $p_id ");
								$cat_name = get_var_query("select cat_name from category where cat_id = $cat_id ");
								//$p_name = $aru->field_by_type("product", "p_name", "p_id", $row["prc_p_id"], "int");
								//$cat_name = $aru->field_by_type("category", "cat_name", "cat_id", $row["prc_cat_id"], "int");
                                ?>
								<tr>
                                    <td><?php echo per_number($i); ?></td>
									<td><?php echo per_number($row['prc_id']); ?></td>
									<td><?php echo per_number($row['prc_date']); ?></td>
									<td><?php echo $p_name . " و " . per_number($cat_name); ?></td>
									<td>
										<?php
										$prc_status = $row['prc_status'];
										$cycle = "produce";
										$cycle_id = $row['prc_id'];
										//if($prc_status != 0){
											?>
											<a class="btn btn-success btn-sm" href="<?php if($u_level=="مدیر" || $u_level=="آزمایشگاه"){ ?>../lab/report-analyze.php?cycle=<?php echo $cycle; ?>&cycle_id=<?php echo $cycle_id; ?><?php }else{echo "#";} ?>">گزارش آزمون</a>
											<?php
										//}else{
											?>
											<?php
										//}
										?>
									</td>
								</tr>
                                <?php
                                $i++;
                            }
                            ?>
							</tbody>
							<tfoot>
								<tr>
                                    <th>ردیف</th>
									<th>کد فاکتور فروش</th>
									<th>کد ردیف فاکتور</th>
									<th>محصول و دانه بندی</th>
									<th>عملیات</th>
								</tr>
							</tfoot>
						</table>
					</div>
				</div>

				<div class="box">
					<div class="box-header">
			  			<h3 class="box-title">لیست آزمون های دلخواه</h3>
					</div>
					<div class="box-body">
						<table class="table table-bordered table-striped table_pagination">
							<thead>
								<tr>
                                    <th>ردیف</th>
									<th>تاریخ ثبت آزمون</th>
									<th>توضیحات</th>
									<th>عملیات</th>
								</tr>
							</thead>
							<tbody>
							<?php
							$i = 1;
                            $sql = "select * from other_analyze";
							$res = get_select_query($sql);
							foreach ($res as $row) {
                                ?>
								<tr>
                                    <td><?php echo per_number($i); ?></td>
									<td><?php echo per_number(str_replace("-", "/", $row['oa_date'])) ; ?></td>
									<td><?php echo $row['oa_description']; ?></td>
									<td>
										<?php
										$cycle = "other";
										$cycle_id = $row['oa_id'];
										$check_analyze = get_var_query("select count(analyze_id) from analyze_form where cycle = '$cycle' and cycle_id = $cycle_id");
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
								</tr>
                                <?php
                                $i++;
                            }
                            ?>
							</tbody>
							<tfoot>
								<tr>
                                    <th>ردیف</th>
									<th>تاریخ ثبت آزمون</th>
									<th>توضیحات</th>
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
<script src="<?php get_url(); ?>/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php get_url(); ?>/plugins/datatables/dataTables.bootstrap.min.js"></script>
<?php include"../left-nav.php"; include"../footer.php"; ?>