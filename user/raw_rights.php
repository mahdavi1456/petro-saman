<?php include"../header.php"; include"../nav.php";
	$asb = list_user();
	?>
	<div class="content-wrapper">
	
		<?php breadcrumb(); ?>

		<section class="content">
			<div class="row">
				<div class="col-xs-12">
			  		<div class="box">
						<div class="box-header">
				  			<h3 class="box-title">محاسبه حقوق<?php if(isset($_GET['uid'])){ $uid = $_GET['uid'] ?> کاربر <?php echo get_select_query("SELECT * FROM user WHERE u_id = $uid")[0]['u_name'] . " " . get_select_query("SELECT * FROM user WHERE u_id = $uid")[0]['u_family']; } ?></h3>
						</div>
						<div class="box-body">
							<form action="" method="get">
								<div class="col-xs-12">
									<div class="row">
										<div class="item col-md-4">
											<div class="margin-tb input-group-prepend">
												<span class="input-group-text">انتخاب ماه</span>
												<select name="month" class="form-control">
													<?php
													$myDate = jdate('Y/n/j');
													$myDataArray = explode('/', $myDate);
													$myYear = $myDataArray[0];
													$myMonth = $myDataArray[1];

													$y0 = $myYear;
													$y1 = $myYear;
													$y2 = $myYear;
													$y3 = $myYear;
													$m1 = $myMonth;

													$scm1 = $y1 . "_" . $m1;

													$m0 = $myMonth -1;
													$scm0 = $y0 . "_" . $m0;
													if( $m0 < 1 ){
														$m0 = 12;
														$y0 = $y2 - 1;
														$scm0 = $y0 . "_" . $m0;
													}

													$m2 = $myMonth +1;
													$scm2 = $y2 . "_" . $m2;
													if( $m2 > 12 ){
														$m2 = $m2 - 12;
														$y2 = $y2 + 1;
														$scm2 = $y2 . "_" . $m2;
													}

													$m3 = $myMonth +2;
													$scm3 = $y3 . "_" . $m3;
													if( $m3 > 12 ){
														$m3 = $m3 - 12;
														$y3 = $y3 + 1;
														$scm3 = $y3 . "_" . $m3;
													}
													?>
													<option <?php if(isset($_GET['month']) && $_GET['month']==$scm0){echo "selected";} ?> value="<?php echo $scm0; ?>"><?php echo name_month($m0); ?></option>
													<option <?php if(isset($_GET['month']) && $_GET['month']==$scm1){echo "selected";} ?> value="<?php echo $scm1; ?>"><?php echo name_month($m1); ?></option>
													<option <?php if(isset($_GET['month']) && $_GET['month']==$scm2){echo "selected";} ?> value="<?php echo $scm2; ?>"><?php echo name_month($m2); ?></option>
													<option <?php if(isset($_GET['month']) && $_GET['month']==$scm3){echo "selected";} ?> value="<?php echo $scm3; ?>"><?php echo name_month($m3); ?></option>
												</select>
												<?php if( isset ( $_GET['uid'] ) ) { ?><input type="hidden" name="uid" value="<?php echo $_GET['uid']; ?>"> <?php } ?>
											</div>
										</div>
										<div class="sch_submit_c item col-md-8">
											<button type="submit" class="btn btn-success btn-sm">انتخاب</button>
											<button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-keyboard="false" data-target="#calc_modal">جدول خام محاسبه حقوق و مزایای <?php echo name_month(explode('_', $_GET['month'])[1]) . " " . per_number(explode('_', $_GET['month'])[0]); ?></button>
											<button type="button" class="btn btn-default btn-sm" data-toggle="modal" data-keyboard="false" data-target="#rights_modal">جدول حقوق و کارانه <?php echo name_month(explode('_', $_GET['month'])[1]) . " " . per_number(explode('_', $_GET['month'])[0]); ?></button>
											<button type="button" class="btn btn-warning btn-sm" id="payroll_send">صدور فیش حقوق <?php echo name_month(explode('_', $_GET['month'])[1]) . " " . per_number(explode('_', $_GET['month'])[0]); ?></button>
											<div class="modal fade text-xs-left" id="calc_modal" tabindex="-1" role="dialog" aria-labelledby="#calc_modal" style="display: none;" aria-hidden="true">
												<div class="modal-dialog modal-lg" role="document" id="user_edit">
													<div class="modal-content">
														<div class="modal-header">
															<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																<span aria-hidden="true">×</span>
															</button>
															<h4 class="modal-title" id="myModalLabel3">جدول خام محاسبه حقوق و مزایای <?php echo name_month(explode('_', $_GET['month'])[1]) . " " . per_number(explode('_', $_GET['month'])[0]); ?></h4>
														</div>
														<div class="modal-body calc_modal" id="raw_rights_print">
															<div class="col-xs-12 no-padd">
																<table id="example1" class="table table-bordered table-striped">
																	<thead>
																		<tr>
																			<th>ردیف</th>
																			<th>نام و نام خانوادگی</th>
																			<th>دستمزد روزانه</th>
																			<th>روزهای کارکرد</th>
																			<th>حقوق ماهیانه</th>
																			<th>ساعت اضافه کاری</th>
																			<th>اضافه کاری</th>
																			<th>حق مسکن</th>
																			<th>بن و خواروبار</th>
																			<th>تعداد فرزند</th>
																			<th>حق اولاد</th>
																			<th>شیفت</th>
																			<th>حق شیفت</th>
																			<th>ساعت شب</th>
																			<th>شب کاری</th>
																			<th>جمع حقوق و مزایا</th>
																			<th>مشمول بیمه</th>
																			<th>حق بیمه  7%</th>
																			<th>مشمول مالیات</th>
																			<th>قابل پرداخت</th>
																			<th>23% سهم کار فرما</th>
																		</tr>
																	</thead>
																	<tbody>
																		<?php
																		$raw_rights_joined = list_raw_rights_joined();
																		if($raw_rights_joined){
																			$row = 1;
																			foreach ($raw_rights_joined as $raw_right ) {
																			$uid = $raw_right['rr_uid'];
																			$fullname = $raw_right['u_name'] . " " . $raw_right['u_family'];
																			$daily_wage = $raw_right['u_daily_wage'];
																			$work_days = $raw_right['rr_work_days'];
																			$monthly_right = $daily_wage * $work_days;
																			$overtime_hours = $raw_right['rr_overtime_hours'];
																			$overtime_right = ($daily_wage / 7.33) * $overtime_hours * 1.4;
																			$home_right = 33333.333 * $work_days + 0.001 - 33333;
																			$bon = 63333.333 * $work_days - 63333;
																			$child_count = $raw_right['u_child_count'];
																			$child_right_ratio = $raw_right['rr_child_right_ratio'];
																			$child_right = $child_count * (15168810 * 0.1) * $child_right_ratio;
																			$shift = $raw_right['rr_shift'];
																			if($shift){
																				$shift_right = $monthly_right * (22.5/100);
																			}else{
																				$shift_right = 0;
																			}
																			$night_work_hours = $raw_right['rr_night_work_hours'];
																			$night_work_right = ($daily_wage/7.33) * $night_work_hours * (35/100);
																			$sum_rights = $night_work_right + $home_right + $bon + $overtime_right + $monthly_right + $shift_right + $child_right;
																			$sum_insure = $bon + $home_right + $monthly_right;
																			$insure = $sum_insure * (7/100);
																			$sum_taxes = $bon + $home_right + $monthly_right + $child_right;
																			$to_payment = $sum_rights - $insure;
																			$employer_right = $sum_insure * (23/100);
																			?>
																			<tr>
																				<td><?php echo per_number($row); ?></td>
																				<td><?php echo $fullname; ?></td>
																				<td><?php echo per_number(number_format($daily_wage)); ?></td>
																				<td><?php echo per_number($work_days); ?></td>
																				<td><?php echo per_number(number_format($monthly_right)); ?></td>
																				<td><?php echo per_number($overtime_hours); ?></td>
																				<td><?php echo per_number(number_format($overtime_right)); ?></td>
																				<td><?php echo per_number(number_format($home_right)); ?></td>
																				<td><?php echo per_number(number_format($bon)); ?></td>
																				<td><?php echo per_number($child_count); ?></td>
																				<td><?php echo per_number(number_format($child_right)); ?></td>
																				<td><?php echo per_number($shift); ?></td>
																				<td><?php echo per_number(number_format($shift_right)); ?></td>
																				<td><?php echo per_number($night_work_hours); ?></td>
																				<td><?php echo per_number(number_format($night_work_right)); ?></td>
																				<td><?php echo per_number(number_format($sum_rights)); ?></td>
																				<td><?php echo per_number(number_format($sum_insure)); ?></td>
																				<td><?php echo per_number(number_format($insure)); ?></td>
																				<td><?php echo per_number(number_format($sum_taxes)); ?></td>
																				<td><?php echo per_number(number_format($to_payment)); ?></td>
																				<td><?php echo per_number(number_format($employer_right)); ?></td>
																			</tr>
																			<?php
																			$row++;
																			}
																		}else{
																		?>
																		<tr>
																			<th colspan="21">داده ای موجود نیست...</th>
																		</tr>
																		<?php
																		} 
																		?>
																	</tbody>
																	<tfoot>
																		<tr>
																			<th>ردیف</th>
																			<th>نام و نام خانوادگی</th>
																			<th>دستمزد روزانه</th>
																			<th>روزهای کارکرد</th>
																			<th>حقوق ماهیانه</th>
																			<th>ساعت اضافه کاری</th>
																			<th>اضافه کاری</th>
																			<th>حق مسکن</th>
																			<th>بن و خواروبار</th>
																			<th>تعداد فرزند</th>
																			<th>حق اولاد</th>
																			<th>شیفت</th>
																			<th>حق شیفت</th>
																			<th>ساعت شب</th>
																			<th>شب کاری</th>
																			<th>جمع حقوق و مزایا</th>
																			<th>مشمول بیمه</th>
																			<th>حق بیمه  7%</th>
																			<th>مشمول مالیات</th>
																			<th>قابل پرداخت</th>
																			<th>23% سهم کار فرما</th>
																		</tr>
																	</tfoot>
																</table>
															</div>
														</div>
														<div class="modal-footer">
															<button type="button" class="btn btn-primary" id="raw_rights_printer">چاپ</button>
														</div>
													</div>
												</div>
											</div>
											<div class="modal fade text-xs-left" id="rights_modal" tabindex="-1" role="dialog" aria-labelledby="#rights_modal" style="display: none;" aria-hidden="true">
												<div class="modal-dialog modal-lg" role="document" id="user_edit">
													<div class="modal-content">
														<div class="modal-header">
															<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																<span aria-hidden="true">×</span>
															</button>
															<h4 class="modal-title" id="myModalLabel3">جدول حقوق و کارانه <?php echo name_month(explode('_', $_GET['month'])[1]) . " " . per_number(explode('_', $_GET['month'])[0]); ?></h4>
														</div>
														<div class="modal-body rights_modal" id="rights_print">
															<div class="col-xs-12 no-padd">
																<table id="example1" class="table table-bordered table-striped">
																	<thead>
																		<tr>
																			<th>ردیف</th>
																			<th>نام و نشان</th>
																			<th>مرحله ۱ پرداخت</th>
																			<th>اصلاح حساب</th>
																			<th>اضافه ثابت</th>
																			<th>کارانه / جریمه</th>
																			<th>ایاب و ذهاب</th>
																			<th>مساعده</th>
																			<th>قسط وام</th>
																			<th>اضافه کاری</th>
																			<th>مرحله ۲ پرداخت</th>
																			<th>جمع قابل پرداخت</th>
																		</tr>
																	</thead>
																	<tbody>
																		<?php
																		$raw_rights_joined = list_raw_rights_joined();
																		if($raw_rights_joined){
																			$row = 1;
																			foreach ($raw_rights_joined as $raw_right ) {
																			$uid = $raw_right['rr_uid'];
																			$fullname = $raw_right['u_name'] . " " . $raw_right['u_family'];
																			$daily_wage = $raw_right['u_daily_wage'];
																			$work_days = $raw_right['rr_work_days'];
																			$monthly_right = $daily_wage * $work_days;
																			$overtime_hours = $raw_right['rr_overtime_hours'];
																			$overtime_right = ($daily_wage / 7.33) * $overtime_hours * 1.4;
																			$home_right = 33333.333 * $work_days + 0.001 - 33333;
																			$bon = 63333.333 * $work_days - 63333;
																			$child_count = $raw_right['u_child_count'];
																			$child_right_ratio = $raw_right['rr_child_right_ratio'];
																			$child_right = $child_count * (15168810 * 0.1) * $child_right_ratio;
																			$shift = $raw_right['rr_shift'];
																			if($shift){
																				$shift_right = $monthly_right * (22.5/100);
																			}else{
																				$shift_right = 0;
																			}
																			$night_work_hours = $raw_right['rr_night_work_hours'];
																			$night_work_right = ($daily_wage/7.33) * $night_work_hours * (35/100);
																			$sum_rights = $night_work_right + $home_right + $bon + $overtime_right + $monthly_right + $shift_right + $child_right;
																			$sum_insure = $bon + $home_right + $monthly_right;
																			$insure = $sum_insure * (7/100);
																			$sum_taxes = $bon + $home_right + $monthly_right + $child_right;
																			$to_payment = $sum_rights - $insure;
																			$employer_right = $sum_insure * (23/100);

																			$to_payment_level_1 = $to_payment - $overtime_right;
																			$modifier = $raw_right['rr_modifier'];
																			$fix_right = $raw_right['u_fix_right'];
																			$penalty = $raw_right['rr_penalty'];
																			$traffic = $raw_right['rr_traffic'];
																			$help = $raw_right['rr_help'];
																			$debt = $raw_right['rr_debt'];
																			$to_payment_final = $to_payment_level_1 + $modifier + $fix_right + $penalty + $traffic + $overtime_right - $help - $debt;
																			$to_payment_level_2 = $to_payment_final - $to_payment_level_1;

																			$total_income = $monthly_right + $bon + $home_right + $child_right + $overtime_right + $penalty + $shift_right + $night_work_right + $traffic;
																			$tax = 0;
																			$deficit = 0;
																			$saving = 0;
																			$other = 0;
																			$total_expends = $insure + $tax + $help + $debt + $deficit + $saving + $other + $modifier;
																			$total = $total_income - $total_expends;
																			?>

																			<input type="hidden" id="prl_uid<?php echo $row; ?>" value="<?php echo $uid; ?>">
																			<input type="hidden" id="prl_month<?php echo $row; ?>" value="<?php echo $_GET['month']; ?>">
																			<input type="hidden" id="prl_monthly_right<?php echo $row; ?>" value="<?php echo $monthly_right; ?>">
																			<input type="hidden" id="prl_bon<?php echo $row; ?>" value="<?php echo $bon; ?>">
																			<input type="hidden" id="prl_home_right<?php echo $row; ?>" value="<?php echo $home_right; ?>">
																			<input type="hidden" id="prl_child_right<?php echo $row; ?>" value="<?php echo $child_right; ?>">
																			<input type="hidden" id="prl_overtime_hours<?php echo $row; ?>" value="<?php echo $overtime_hours; ?>">
																			<input type="hidden" id="prl_overtime_right<?php echo $row; ?>" value="<?php echo $overtime_right; ?>">
																			<input type="hidden" id="prl_penalty<?php echo $row; ?>" value="<?php echo $penalty; ?>">
																			<input type="hidden" id="prl_shift_right<?php echo $row; ?>" value="<?php echo $shift_right; ?>">
																			<input type="hidden" id="prl_night_work_right<?php echo $row; ?>" value="<?php echo $night_work_right; ?>">
																			<input type="hidden" id="prl_traffic<?php echo $row; ?>" value="<?php echo $traffic; ?>">
																			<input type="hidden" id="prl_total_income<?php echo $row; ?>" value="<?php echo $total_income; ?>">

																			<input type="hidden" id="prl_insure<?php echo $row; ?>" value="<?php echo $insure; ?>">
																			<input type="hidden" id="prl_tax<?php echo $row; ?>" value="<?php echo $tax; ?>">
																			<input type="hidden" id="prl_help<?php echo $row; ?>" value="<?php echo $help; ?>">
																			<input type="hidden" id="prl_debt<?php echo $row; ?>" value="<?php echo $debt; ?>">
																			<input type="hidden" id="prl_deficit<?php echo $row; ?>" value="<?php echo $deficit; ?>">
																			<input type="hidden" id="prl_saving<?php echo $row; ?>" value="<?php echo $saving; ?>">
																			<input type="hidden" id="prl_other<?php echo $row; ?>" value="<?php echo $other; ?>">
																			<input type="hidden" id="prl_modifier<?php echo $row; ?>" value="<?php echo $modifier; ?>">
																			<input type="hidden" id="prl_total_expends<?php echo $row; ?>" value="<?php echo $total_expends; ?>">

																			<input type="hidden" id="prl_total<?php echo $row; ?>" value="<?php echo $total; ?>">

																			<tr>
																				<td><?php echo per_number($row); ?></td>
																				<td><?php echo $fullname; ?></td>
																				<td><?php echo per_number(number_format($to_payment_level_1)); ?></td>
																				<td dir="ltr"><?php echo per_number(number_format($modifier)); ?></td>
																				<td><?php echo per_number(number_format($fix_right)); ?></td>
																				<td><?php echo per_number(number_format($penalty)); ?></td>
																				<td><?php echo per_number(number_format($traffic)); ?></td>
																				<td><?php echo per_number(number_format($help)); ?></td>
																				<td><?php echo per_number(number_format($debt)); ?></td>
																				<td><?php echo per_number(number_format($overtime_right)); ?></td>
																				<td><?php echo per_number(number_format($to_payment_level_2)); ?></td>
																				<td><?php echo per_number(number_format($to_payment_final)); ?></td>
																			</tr>
																			<?php
																			$row++;
																			}

																			?>
																			<input type="hidden" id="prl_rows" value="<?php echo $row-1; ?>">
																			<input type="hidden" id="prl_date" value="<?php echo jdate('Y/n/j'); ?>">
																			<?php

																		}else{
																		?>
																		<tr>
																			<th colspan="12">داده ای موجود نیست...</th>
																		</tr>
																		<?php
																		} 
																		?>
																	</tbody>
																	<tfoot>
																		<tr>
																			<th>ردیف</th>
																			<th>نام و نشان</th>
																			<th>مرحله ۱ پرداخت</th>
																			<th>اصلاح حساب</th>
																			<th>اضافه ثابت</th>
																			<th>کارانه / جریمه</th>
																			<th>ایاب و ذهاب</th>
																			<th>مساعده</th>
																			<th>قسط وام</th>
																			<th>اضافه کاری</th>
																			<th>مرحله ۲ پرداخت</th>
																			<th>جمع قابل پرداخت</th>
																		</tr>
																	</tfoot>
																</table>
															</div>
														</div>
														<div class="modal-footer">
															<button type="button" class="btn btn-primary" id="rights_printer">چاپ</button>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</form>
							<?php
							if( isset ( $_GET['uid'] ) && isset ( $_GET['month'] ) ) {
							?>
							<form action="" method="post">
								<input type="hidden" name="rr_uid" value="<?php echo $_GET['uid']; ?>">
								<input type="hidden" name="rr_month" value="<?php echo $_GET['month']; ?>">
								<div id="details" class="col-xs-12">
									<div class="row">
										<div class="item col-md-4">
											<div class="margin-tb input-group-prepend">
												<span class="input-group-text">روزهای کارکرد</span>
											</div>
											<input type="text" name="rr_work_days" placeholder="روزهای کارکرد" class="form-control">
										</div>
										<div class="item col-md-4">
											<div class="margin-tb input-group-prepend">
												<span class="input-group-text">ساعت اضافه کاری</span>
											</div>
											<input type="text" name="rr_overtime_hours" placeholder="ساعت اضافه کاری" class="form-control">
										</div>
										<div class="item col-md-4">
											<div class="margin-tb input-group-prepend">
												<span class="input-group-text">ضریب حق اولاد</span>
											</div>
											<input type="text" name="rr_child_right_ratio" placeholder="ضریب حق اولاد" class="form-control">
										</div>
									</div>
									<div class="row">
										<div class="item col-md-4">
											<div class="margin-tb input-group-prepend">
												<span class="input-group-text">شیفت</span>
											</div>
											<select name="rr_shift" class="form-control">
												<option value="0" selected>0</option>
												<option value="1">1</option>
											</select>
										</div>
										<div class="item col-md-4">
											<div class="margin-tb input-group-prepend">
												<span class="input-group-text">ساعت شب</span>
											</div>
											<input type="text" name="rr_night_work_hours" placeholder="ساعت شب" class="form-control">
										</div>
									</div>
									<div class="row">
										<div class="item col-md-4">
											<button type="submit" class="btn btn-success btn-sm" name="rr_submit">اضافه کردن</button>
										</div>
									</div>
									<?php 
									if(isset($_POST['rr_submit'])) {
										$array = array();
										array_push($array, $_POST['rr_uid']);
										array_push($array, $_POST['rr_month']);
										array_push($array, $_POST['rr_work_days']);
										array_push($array, $_POST['rr_overtime_hours']);
										array_push($array, $_POST['rr_child_right_ratio']);
										array_push($array, $_POST['rr_shift']);
										array_push($array, $_POST['rr_night_work_hours']);
										insert_raw_rights($array);
										echo "<meta http-equiv='refresh' content='0'/>";
									}
									?>
								</div>
							</form>
							<?php
							} 
							if( isset ( $_GET['month'] ) ) {
							?>
				  			<table id="example1" class="table table-bordered table-striped">
								<thead>
					  				<tr>
					  					<th>ردیف</th>
										<th>نام و نام خانوادگی کاربر</th>
										<th>شماره پرسنل</th>
										<th>ماه</th>
										<th>روزهای کارکرد</th>
										<th>ساعت اضافه کاری</th>
										<th>ضریب حق اولاد</th>
										<th>شیفت</th>
										<th>ساعت شب</th>
										<th>ویرایش و تکمیل اطلاعات</th>
										<th>حذف</th>
					  				</tr>
								</thead>
								<tbody>
								<?php
								if(isset($_POST['rr_edit'])) {
									$uid = $_POST['uid'];

									$array = array();
									array_push($array, $uid);
									array_push($array, $_POST['rr_month']);
									array_push($array, $_POST['rr_work_days']);
									array_push($array, $_POST['rr_overtime_hours']);
									array_push($array, $_POST['rr_child_right_ratio']);
									array_push($array, $_POST['rr_shift']);
									array_push($array, $_POST['rr_night_work_hours']);
									array_push($array, $_POST['rr_modifier']);
									array_push($array, $_POST['rr_penalty']);
									array_push($array, $_POST['rr_traffic']);
									array_push($array, $_POST['rr_help']);
									array_push($array, $_POST['rr_debt']);
									update_raw_rights($array);
									echo "<meta http-equiv='refresh' content='0'/>";
								}

								$raw_rights = list_raw_rights();
								if($raw_rights){
								$row = 1;
								foreach ($raw_rights as $raw_right ) {
									$uid = $raw_right['rr_uid'];
									?>
						  			<tr>
						  				<td><?php echo $row; ?></td>
										<td><?php echo get_select_query("SELECT * FROM user WHERE u_id = $uid")[0]['u_name'] . " " . get_select_query("SELECT * FROM user WHERE u_id = $uid")[0]['u_family']; ?></td>
										<td><?php echo per_number(get_select_query("SELECT * FROM user WHERE u_id = $uid")[0]['u_pcode']); ?></td>
										<td><?php echo name_month(explode('_', $raw_right['rr_month'])[1]) . " " . per_number(explode('_', $raw_right['rr_month'])[0]); ?></td>
										<td><?php echo per_number($raw_right['rr_work_days']); ?></td>
										<td><?php echo per_number($raw_right['rr_overtime_hours']); ?></td>
										<td><?php echo per_number($raw_right['rr_child_right_ratio']); ?></td>
										<td><?php echo per_number($raw_right['rr_shift']); ?></td>
										<td><?php echo per_number($raw_right['rr_night_work_hours']); ?></td>
										<td>
											<button class="btn btn-primary btn-sm" type="button" data-toggle="modal" data-keyboard="false" data-target="#edit_modal<?php echo $uid; ?>">ویرایش و تکمیل اطلاعات</button>
											<div class="modal fade text-xs-left" id="edit_modal<?php echo $uid; ?>" tabindex="-1" role="dialog" aria-labelledby="#edit_modal<?php echo $uid; ?>" style="display: none;" aria-hidden="true">
												<div class="modal-dialog" role="document" id="user_edit">
													<form action="" method="post">
													<input type="hidden" name="uid" value="<?php echo $uid; ?>">
													<div class="modal-content modal-raw-rights">
														<div class="modal-header">
															<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																<span aria-hidden="true">×</span>
															</button>
															<h4 class="modal-title" id="myModalLabel3">ویرایش و تکمیل اطلاعات</h4>
														</div>
														<div class="modal-body">
															<div class="col-xs-12 no-padd">
																<div class="row">
																	<div class="item col-md-4">
																		<div class="margin-tb input-group-prepend">
																			<span class="input-group-text">انتخاب ماه</span>
																		</div>
																		<select name="rr_month" class="form-control">
																			<?php
																			$myDate = jdate('Y/n/j');
																			$myDataArray = explode('/', $myDate);
																			$myYear = $myDataArray[0];
																			$myMonth = $myDataArray[1];

																			$y0 = $myYear;
																			$y1 = $myYear;
																			$y2 = $myYear;
																			$y3 = $myYear;
																			$m1 = $myMonth;

																			$scm1 = $y1 . "_" . $m1;

																			$m0 = $myMonth -1;
																			$scm0 = $y0 . "_" . $m0;
																			if( $m0 < 1 ){
																				$m0 = 12;
																				$y0 = $y2 - 1;
																				$scm0 = $y0 . "_" . $m0;
																			}

																			$m2 = $myMonth +1;
																			$scm2 = $y2 . "_" . $m2;
																			if( $m2 > 12 ){
																				$m2 = $m2 - 12;
																				$y2 = $y2 + 1;
																				$scm2 = $y2 . "_" . $m2;
																			}

																			$m3 = $myMonth +2;
																			$scm3 = $y3 . "_" . $m3;
																			if( $m3 > 12 ){
																				$m3 = $m3 - 12;
																				$y3 = $y3 + 1;
																				$scm3 = $y3 . "_" . $m3;
																			}
																			?>
																			<option <?php if(isset($_GET['month']) && $_GET['month']==$scm0){echo "selected";} ?> value="<?php echo $scm0; ?>"><?php echo name_month($m0); ?></option>
																			<option <?php if(isset($_GET['month']) && $_GET['month']==$scm1){echo "selected";} ?> value="<?php echo $scm1; ?>"><?php echo name_month($m1); ?></option>
																			<option <?php if(isset($_GET['month']) && $_GET['month']==$scm2){echo "selected";} ?> value="<?php echo $scm2; ?>"><?php echo name_month($m2); ?></option>
																			<option <?php if(isset($_GET['month']) && $_GET['month']==$scm3){echo "selected";} ?> value="<?php echo $scm3; ?>"><?php echo name_month($m3); ?></option>
																		</select>
																	</div>
																	<div class="item col-md-4">
																		<div class="margin-tb input-group-prepend">
																			<span class="input-group-text">روزهای کارکرد</span>
																		</div>
																		<input type="text" name="rr_work_days" value="<?php echo $raw_right['rr_work_days']; ?>" placeholder="روزهای کارکرد" class="form-control">
																	</div>
																	<div class="item col-md-4">
																		<div class="margin-tb input-group-prepend">
																			<span class="input-group-text">ساعت اضافه کاری</span>
																		</div>
																		<input type="text" name="rr_overtime_hours" value="<?php echo $raw_right['rr_overtime_hours']; ?>" placeholder="ساعت اضافه کاری" class="form-control">
																	</div>
																</div>
																<div class="row">
																	<div class="item col-md-4">
																		<div class="margin-tb input-group-prepend">
																			<span class="input-group-text">ضریب حق اولاد</span>
																		</div>
																		<input type="text" name="rr_child_right_ratio" value="<?php echo $raw_right['rr_child_right_ratio']; ?>" placeholder="ضریب حق اولاد" class="form-control">
																	</div>
																	<div class="item col-md-4">
																		<div class="margin-tb input-group-prepend">
																			<span class="input-group-text">شیفت</span>
																		</div>
																		<select name="rr_shift" class="form-control">
																			<option <?php if($raw_right['rr_shift']==0) echo "selected"; ?> value="0">0</option>
																			<option <?php if($raw_right['rr_shift']==1) echo "selected"; ?> value="1">1</option>
																		</select>
																	</div>
																	<div class="item col-md-4">
																		<div class="margin-tb input-group-prepend">
																			<span class="input-group-text">ساعت شب</span>
																		</div>
																		<input type="text" name="rr_night_work_hours" value="<?php echo $raw_right['rr_night_work_hours']; ?>" placeholder="ساعت شب" class="form-control">
																	</div>
																</div>
																<div class="row">
																	<div class="item col-xs-12">
																		<hr>
																		<span class="input-group-text"><b>اطلاعات تکمیلی</b></span>
																	</div>
																</div>
																<div class="row">
																	<div class="item col-md-4">
																		<div class="margin-tb input-group-prepend">
																			<span class="input-group-text">اصلاح حساب</span>
																		</div>
																		<input type="text" name="rr_modifier" value="<?php echo $raw_right['rr_modifier']; ?>" placeholder="اصلاح حساب" class="form-control">
																	</div>
																	<div class="item col-md-4">
																		<div class="margin-tb input-group-prepend">
																			<span class="input-group-text">جریمه / کارانه</span>
																		</div>
																		<input type="text" name="rr_penalty" value="<?php echo $raw_right['rr_penalty']; ?>" placeholder="جریمه / کارانه" class="form-control">
																	</div>
																	<div class="item col-md-4">
																		<div class="margin-tb input-group-prepend">
																			<span class="input-group-text">ایاب و ذهاب</span>
																		</div>
																		<input type="text" name="rr_traffic" value="<?php echo $raw_right['rr_traffic']; ?>" placeholder="ایاب و ذهاب" class="form-control">
																	</div>
																</div>
																<div class="row">
																	<div class="item col-md-4">
																		<div class="margin-tb input-group-prepend">
																			<span class="input-group-text">مساعده</span>
																		</div>
																		<input type="text" name="rr_help" value="<?php echo $raw_right['rr_help']; ?>" placeholder="مساعده" class="form-control">
																	</div>
																	<div class="item col-md-4">
																		<div class="margin-tb input-group-prepend">
																			<span class="input-group-text">قسط وام</span>
																		</div>
																		<input type="text" name="rr_debt" value="<?php echo $raw_right['rr_debt']; ?>" placeholder="قسط وام" class="form-control">
																	</div>
																</div>
															</div>
														</div>
														<div class="modal-footer">
															<button type="submit" class="btn btn-primary" name="rr_edit">ویرایش</button>
														</div>
													</div>
													</form>
												</div>
											</div>
										</td>
										<td>
											<form action="" method="post" onSubmit="if(!confirm('آیا از انجام این عملیات اطمینان دارید؟')){return false;}">
												<button class="btn btn-danger btn-sm" type="submit" name="rr_delete">حذف</button>
												<input class="hidden" type="text" name="rr_del_uid" value="<?php echo $uid; ?>">
												<?php
												if(isset($_POST['rr_delete'])){
													$u_id = $_POST['rr_del_uid'];
													delete_raw_rights($u_id);
													echo "<meta http-equiv='refresh' content='0'/>";
													exit();
												}
												?>
											</form>
										</td>
						  			</tr>
						  		<?php $row++; ?>
								<?php } }else{ ?>
									<td colspan="12">داده ای موجود نیست...</td>
								<?php } ?>
								</tbody>
								<tfoot>
					  				<tr>
					  					<th>ردیف</th>
										<th>نام و نام خانوادگی کاربر</th>
										<th>شماره پرسنل</th>
										<th>ماه</th>
										<th>روزهای کارکرد</th>
										<th>ساعت اضافه کاری</th>
										<th>ضریب حق اولاد</th>
										<th>شیفت</th>
										<th>ساعت شب</th>
										<th>ویرایش</th>
										<th>حذف</th>
					  				</tr>
								</tfoot>
				  			</table>
				  			<?php } ?>
						</div>
			  		</div>
				</div>
		  	</div>
		  	<input type="hidden" id="prl_url_container" value="<?php echo get_url() . "user/inc/back.php"; ?>">
		</section>
	</div>
<script src="<?php get_url(); ?>user/jquery-print.js"></script>
<script src="<?php get_url(); ?>user/script.js" type="text/javascript"></script>
<?php include"../left-nav.php"; include"../footer.php"; ?>