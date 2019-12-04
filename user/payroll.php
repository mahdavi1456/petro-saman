<?php include"../header.php"; include"../nav.php"; ?>
	<div class="content-wrapper">
		
		<?php breadcrumb("فیش حقوق"); ?>
		
		<section class="content">
			<div id="details" class="col-xs-12">	
				<form action="" method="get">
					<div class="row">
						<div class="item col-md-4">
							<div class="margin-tb input-group-prepend">
								<span class="input-group-text">شماره پرسنل</span>
								<input type="text" name="pcode" placeholder="شماره پرسنل" value="<?php if(isset($_GET['pcode'])){ echo $_GET['pcode']; } ?>" class="form-control">
							</div>
						</div>
						<div class="item col-md-4">
							<div class="margin-tb input-group-prepend">
								<span class="input-group-text">انتخاب ماه</span>
								<select name="month" class="form-control">
									<?php
									//$myDate = jdate('Y/n/j');
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
						</div>
						<div class="sch_submit_c item col-md-2">
							<button type="submit" class="btn btn-success btn-sm">انتخاب</button>
							<button type="button" class="btn btn-primary btn-sm" id="payrol_printer">چاپ</button>
						</div>
					</div>
				</form>
				<div class="row">
					<?php
					if( isset($_GET['month']) && $_GET['month'] !="" && isset($_GET['pcode']) && $_GET['pcode'] !="" ) {
						$uid = get_uid_with_pcode($_GET['pcode']);
						$month = $_GET['month'];

						$array = array();
						array_push($array, $uid);
						array_push($array, $month);
						$payrolls = select_payroll_joined($array);

						if ( $payrolls ) {
						$payroll = $payrolls[0];
						?>
			  			<table class="col-xs-12 table-responsive sch_save_table sc_table_center" id="payrol_print">
							<thead>
				  				<tr>
									<th colspan="8">فیش حقوقی کارکنان شرکت پتروسامان آذر تتیس</th>
				  				</tr>
				  				<tr>
									<th colspan="8">مشخصات پرسنل</th>
				  				</tr>
				  				<tr>
									<th colspan="2">شماره پرسنل</th>
									<td colspan="2"><?php echo per_number($_GET['pcode']); ?></td>
									<th colspan="2">تاریخ صدور</th>
									<td colspan="2"><?php echo per_number($payroll['prl_date']); ?></td>
				  				</tr>
				  				<tr>
									<th colspan="2">نام و نام خانوادگی</th>
									<th>سمت</th>
									<td><?php echo $payroll['u_wtype']; ?></td>
									<th>وضعیت تاهل</th>
									<td><?php echo $payroll['u_marital']; ?></td>
									<th>ساعت کاری</th>
									<td></td>
				  				</tr>
				  				<tr>
									<td colspan="2"><?php echo $payroll['u_name'] . " " . $payroll['u_family']; ?></td>
									<th>مدرک</th>
									<td><?php echo $payroll['u_evidence']; ?></td>
									<th>تعداد فرزند</th>
									<td><?php echo per_number($payroll['u_child_count']); ?></td>
									<th>ساعت اضافه کار</th>
									<td><?php echo per_number($payroll['prl_overtime_hours']); ?></td>
				  				</tr>
				  				<tr>
									<th colspan="4">دریافتی ها :</th>
									<th colspan="4">کسورات :</th>
				  				</tr>
							</thead>
							<tbody>
								<tr>
									<th colspan="2">پایه حقوق</th>
									<td colspan="2"><?php echo per_number($payroll['prl_monthly_right']); ?></td>
									<th colspan="2">بیمه تامین اجتماعی	</th>
									<td colspan="2"><?php echo per_number($payroll['prl_insure']); ?></td>
				  				</tr>
				  				<tr>
									<th colspan="2">اضافه ثابت</th>
									<td colspan="2"><?php echo per_number($payroll['u_fix_right']); ?></td>
									<th colspan="2">مالیات</th>
									<td colspan="2"><?php echo per_number($payroll['prl_tax']); ?></td>
				  				</tr>
				  				<tr>
									<th colspan="2">بن و خوار و بار</th>
									<td colspan="2"><?php echo per_number($payroll['prl_bon']); ?></td>
									<th colspan="2">مساعده</th>
									<td colspan="2"><?php echo per_number($payroll['prl_help']); ?></td>
				  				</tr>
				  				<tr>
									<th colspan="2">حق مسکن</th>
									<td colspan="2"><?php echo per_number($payroll['prl_home_right']); ?></td>
									<th colspan="2">قسط وام</th>
									<td colspan="2"><?php echo per_number($payroll['prl_debt']); ?></td>
				  				</tr>
				  				<tr>
									<th colspan="2">عایله مندی</th>
									<td colspan="2"><?php echo per_number($payroll['prl_child_right']); ?></td>
									<th colspan="2">کسر از حقوق</th>
									<td colspan="2"><?php echo per_number($payroll['prl_deficit']); ?></td>
				  				</tr>
				  				<tr>
									<th colspan="2">اضافه کاری</th>
									<td colspan="2"><?php echo per_number($payroll['prl_overtime_right']); ?></td>
									<th colspan="2">پس انداز</th>
									<td colspan="2"><?php echo per_number($payroll['prl_saving']); ?></td>
				  				</tr>
				  				<tr>
									<th colspan="2">کارانه / جریمه</th>
									<td colspan="2"><?php echo per_number($payroll['prl_penalty']); ?></td>
									<th colspan="2">سایر</th>
									<td colspan="2"><?php echo per_number($payroll['prl_other']); ?></td>
				  				</tr>
				  				<tr>
									<th colspan="2">حق شیفت</th>
									<td colspan="2"><?php echo per_number($payroll['prl_shift_right']); ?></td>
									<th colspan="2">اصلاح حساب</th>
									<td colspan="2" dir="ltr"><?php echo per_number($payroll['prl_modifier']); ?></td>
				  				</tr>
				  				<tr>
									<th colspan="2">شب کاری</th>
									<td colspan="2"><?php echo per_number($payroll['prl_night_work_right']); ?></td>
									<th colspan="2">-</th>
									<td colspan="2"></td>
				  				</tr>
				  				<tr>
									<th colspan="2">ایاب و ذهاب</th>
									<td colspan="2"><?php echo per_number($payroll['prl_traffic']); ?></td>
									<th colspan="2">-</th>
									<td colspan="2"></td>
				  				</tr>
				  				<tr>
									<th colspan="2">جمع دریافتی</th>
									<td colspan="2"><?php echo per_number($payroll['prl_total_income']); ?></td>
									<th colspan="2">جمع کسورات</th>
									<td colspan="2"><?php echo per_number($payroll['prl_total_expends']); ?></td>
				  				</tr>
				  				<tr>
									<th colspan="2">جمع دریافتی</th>
									<td colspan="2"><?php echo per_number($payroll['prl_total']); ?></td>
									<td colspan="4"></td>
				  				</tr>
							</tbody>
			  			</table>
			  			<?php
			  			} else {
						echo "<div class='col-xs-12'>فیش حقوق هنوز صادر نشده است.</div>";
						}
		  			}
		  			?>
				</div>
			</div>
		</section>
	</div>
<script src="<?php get_url(); ?>user/jquery-print.js"></script>
<script src="<?php get_url(); ?>user/script.js" type="text/javascript"></script>
<?php include"../left-nav.php"; include"../footer.php"; ?>