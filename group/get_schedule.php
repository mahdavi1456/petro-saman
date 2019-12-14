<?php include"../header.php"; include"../nav.php"; ?>
	<div class="content-wrapper">

		<?php breadcrumb("مشاهده گروه ها" , "index.php"); ?>

		<section class="content">
			<div id="details" class="col-xs-12">
				<div class="row">
					<form action="" method="get">
						<div class="item col-md-4">
							<div class="margin-tb input-group-prepend">
								<span class="input-group-text">انتخاب گروه</span>
								<select name="group" class="form-control">
									<?php
									$all_groups = list_group();
									foreach ($all_groups as $a_group) {
										?>
										<option <?php if(isset($_GET['group']) && $_GET['group']==$a_group['g_name']){echo "selected";} ?>><?php echo $a_group['g_name']; ?></option>
										<?php
									}
									?>
								</select>
							</div>
						</div>
						<div class="sch_submit_c item col-md-1">
							<button type="submit" class="btn btn-success btn-sm" name="sch_submit" value="1">انتخاب</button>
						</div>
					</form>
					<?php
					if ( isset ( $_GET["sch_submit"] ) ) {
						if ( ( isset( $_GET["group"] ) && $_GET["group"] != ""  ) ) {
					?>
					<div class="sch_submit_c item col-md-2">
						<button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-keyboard="false" data-target="#sch_modal">مشاهده و چاپ برنامه</button>
						<div class="modal fade text-xs-left" id="sch_modal" tabindex="-1" role="dialog" aria-labelledby="#sch_modal" style="display: none;" aria-hidden="true">
							<div class="modal-dialog" role="document" id="user_edit">
								<input type="hidden" name="uid" value="<?php echo $u_id; ?>">
								<div class="modal-content">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal" aria-label="Close">
											<span aria-hidden="true">×</span>
										</button>
										<h4 class="modal-title" id="myModalLabel3">برنامه گروه <?php echo $_GET["group"]; ?></h4>
									</div>
									<div class="modal-body">
										<div class="col-xs-12 no-padd">
											<table class="col-xs-12 table-responsive sch_save_table sc_table_center" id="sch_print">
												<thead>
														<tr>
															<th colspan="4" class="text-center">برنامه شیفت پرسنل شرکت پتروسامان آذر تتیس</th>
										     		</tr>
										     		<tr>
															<th>گروه</th>
															<th><?php echo $_GET["group"]; ?></th>
															<th>ماه</th>
															<th><?php echo name_month($myMonth); ?></th>
										     		</tr>
										     		<tr>
										     			<?php $group_name = $_GET['group']; ?>
															<th>سرپرست ۱(کوره)</th>
															<th><?php echo get_var_query("SELECT g_sup_1 FROM group_info WHERE g_name = '$group_name'"); ?></th>
															<th>سرپرست ۲(دانه بندی)</th>
															<th><?php echo get_var_query("SELECT g_sup_2 FROM group_info WHERE g_name = '$group_name'"); ?></th>
										     		</tr>
														<tr>
															<th>تاریخ / شیفت</th>
															<?php
															$shifts_arr = get_shifts();
															foreach ($shifts_arr as $shift) {
																$shift_name = $shift['sh_name'];
																echo "<th>$shift_name</th>";
															}
															?>
															<th>استراحت</th>
														</tr>
											    </thead>
											    <tbody>
											    	<?php
											    	$myDate = jdate('Y/n/j');
													$myDataArray = explode('/', $myDate);

													$myYear = $myDataArray[0];
													$myMonth = $myDataArray[1];

											    	$sc_month = $myMonth;
													$sc_group = $_GET["group"];

											    	$sql3 = "SELECT sc_schedule FROM schedule WHERE sc_month = '$sc_month' AND sc_group = '$sc_group'";
													$mySchedule = get_var_query($sql3);
													$myScheduleArray = explode('.', $mySchedule);

													if ( $myMonth == 1 || $myMonth == 2 || $myMonth == 3 || $myMonth == 4 || $myMonth == 5 || $myMonth == 6 ) {
														$limit = 31;
													} else if ( $myMonth == 7 || $myMonth == 8 || $myMonth == 9 || $myMonth == 10 || $myMonth == 11 ) {
														$limit = 30;
													} else if ( $myMonth == 12 ) {
														$limit = 29;
													}

											    	for ($i=1; $i <= $limit ; $i++) {
											    		$j = $i-1;
											    		?>
											    		<tr>
															<th><?php echo per_number( $myYear . "/" . $myMonth . "/" . $i ); ?></th>
															<?php
															$shifts_arr = get_shifts();
															foreach ($shifts_arr as $shift) {
																$shift_name = $shift['sh_name'];
																$shift_id = $shift['sh_id'];
																?><td><?php if ( !is_null( $mySchedule ) ) { if( $myScheduleArray[$j] == $shift_id ) { echo "*"; } else { echo "-"; } } ?></td><?php
															}
															?>
															<td><?php if ( !is_null( $mySchedule ) ) { if( $myScheduleArray[$j] == "0" ) { echo "*"; } else { echo "-"; } } ?></td>
														</tr>
											    		<?php
											    	}
											    	?>
											    </tbody>
											    <tfoot>
														<tr>
															<th>تاریخ / شیفت</th>
															<?php
															$shifts_arr = get_shifts();
															foreach ($shifts_arr as $shift) {
																$shift_name = $shift['sh_name'];
																echo "<th>$shift_name</th>";
															}
															?>
															<th>استراحت</th>
														</tr>
											    </tfoot>
											</table>
										</div>
									</div>
									<div class="modal-footer">
										<button type="submit" class="btn btn-primary" id="sch_printer">چاپ برنامه</button>
									</div>
								</div>
							</div>
						</div>
					</div>
					<?php
						}
					}
					?>
				</div>

				<?php
				if ( isset( $_GET["group"] ) && $_GET["group"] != "" ) {
				?>

				<div class="row">
					<table id="example1" class="table table-striped table-bordered table-responsive sch_save_table">
						<thead>
			  				<tr>
			  					<th>ردیف</th>
								<th>نام</th>
								<th>نام خانوادگی</th>
								<th>نام دسترسی</th>
								<th>نام کاربری</th>
								<th>رمز ورود</th>
								<th>گروه</th>
								<th>مشاهده</th>
			  				</tr>
						</thead>
						<tbody>
						<?php
						$asb = list_user($_GET["group"]);
						if ( $asb ) {
						$row = 1;
						foreach ($asb as $a ) {
							$u_id = $a['u_id'];
							$asd = select_a_user($u_id);
							?>
				  			<tr>
				  				<td><?php echo $row; ?></td>
								<td><?php echo $a['u_name']; ?></td>
								<td><?php echo $a['u_family']; ?></td>
								<td><?php echo $a['u_level']; ?></td>
								<td><?php echo per_number($a['u_username']); ?></td>
								<td>***</td>
								<td><?php echo per_number($a['u_group']); ?></td>
								<td>
									<button class="btn btn-info btn-sm" type="button" data-toggle="modal" data-keyboard="false" data-target="#view_modal<?php echo $u_id; ?>">مشاهده</button>
									<div class="modal fade text-xs-left" id="view_modal<?php echo $u_id; ?>" tabindex="-1" role="dialog" aria-labelledby="#view_modal<?php echo $u_id; ?>" style="display: none;" aria-hidden="true">
										<div class="modal-dialog" role="document" id="user_view">
											<form action="" method="post">
											<div class="modal-content">
												<div class="modal-header">
													<button type="button" class="close" data-dismiss="modal" aria-label="Close">
														<span aria-hidden="true">×</span>
													</button>
													<h4 class="modal-title" id="myModalLabel3">اطلاعات کاربر</h4>
												</div>
												<div class="modal-body">
													<div class="col-xs-12 no-padd">
                                                        <table id="example1" class="table table-bordered table-striped">
                                                            <tr>
                                                                <td>نام</td>
                                                                <td><?php echo $asd[0]['u_name']; ?></td>
                                                            </tr>
                                                            <tr>
                                                                <td>نام خانوادگی</td>
                                                                <td><?php echo $asd[0]['u_family']; ?></td>
                                                            </tr>
                                                            <tr>
                                                                <td>سطح دسترسی</td>
                                                                <td><?php echo $asd[0]['u_level']; ?></td>
                                                            </tr>
                                                            <tr>
                                                                <td>نام کاربری</td>
                                                                <td><?php echo per_number($asd[0]['u_username']); ?></td>
                                                            </tr>
                                                            <tr>
                                                                <td>رمز ورود</td>
                                                                <td>***</td>
                                                            </tr>
                                                            <tr>
                                                                <td>نام پدر</td>
                                                                <td><?php echo $asd[0]['u_father']; ?></td>
                                                            </tr>
                                                            <tr>
                                                                <td>کد ملی</td>
                                                                <td><?php echo per_number( $asd[0]['u_meli'] ); ?></td>
                                                            </tr>
                                                            <tr>
                                                                <td>تاریخ تولد</td>
                                                                <td><?php echo per_number( $asd[0]['u_birth'] ); ?></td>
                                                            </tr>
                                                            <tr>
                                                                <td>شهر محل سکونت</td>
                                                                <td><?php echo $asd[0]['u_live_city']; ?></td>
                                                            </tr>
                                                            <tr>
                                                                <td>مسافت تا کارخانه</td>
                                                                <td><?php echo per_number( $asd[0]['u_destination'] ); ?></td>
                                                            </tr>
                                                            <tr>
                                                                <td>موبایل</td>
                                                                <td><?php echo per_number( $asd[0]['u_mobile'] ); ?></td>
                                                            </tr>
                                                            <tr>
                                                                <td>تلفن ثابت</td>
                                                                <td><?php echo per_number( $asd[0]['u_tell'] ); ?></td>
                                                            </tr>
                                                            <tr>
                                                                <td>آدرس</td>
                                                                <td><?php echo ($asd[0]['u_address']); ?></td>
                                                            </tr>
                                                            <tr>
                                                                <td>سنوات</td>
                                                                <td><?php echo per_number($asd[0]['u_pre']); ?></td>
                                                            </tr>
                                                            <tr>
                                                                <td>توضیحات</td>
                                                                <td><?php echo per_number($asd[0]['u_description']); ?></td>
                                                            </tr>
                                                            <tr>
                                                                <td>کد گروه</td>
                                                                <td><?php echo per_number($asd[0]['u_group']); ?></td>
                                                            </tr>
                                                            <tr>
                                                                <td>شماره پرسنل</td>
                                                                <td><?php echo per_number($asd[0]['u_pcode']); ?></td>
                                                            </tr>
                                                            <tr>
                                                                <td>سمت</td>
                                                                <td><?php echo per_number($asd[0]['u_wtype']); ?></td>
                                                            </tr>
                                                            <tr>
                                                                <td>وضعیت تاهل</td>
                                                                <td><?php echo $asd[0]['u_marital']; ?></td>
                                                            </tr>
                                                            <tr>
                                                                <td>تعداد فرزند</td>
                                                                <td><?php echo per_number($asd[0]['u_child_count']); ?></td>
                                                            </tr>
                                                            <tr>
                                                                <td>مدرک</td>
                                                                <td><?php echo $asd[0]['u_evidence']; ?></td>
                                                            </tr>
                                                            <tr>
                                                                <td>دستمزد روزانه</td>
                                                                <td><?php echo per_number(number_format($asd[0]['u_daily_wage'])); ?></td>
                                                            </tr>
                                                            <tr>
                                                                <td>اضافه ثابت حقوق</td>
                                                                <td><?php echo per_number(number_format($asd[0]['u_fix_right'])); ?></td>
                                                            </tr>
                                                            <tr>
                                                                <td>تاریخ انقضای قرارداد</td>
                                                                <td><?php echo per_number($asd[0]['u_fin_contract']); ?></td>
                                                            </tr>
                                                            <tr>
                                                                <td>شماره کارت</td>
                                                                <td><?php echo per_number($asd[0]['u_cart']); ?></td>
                                                            </tr>
                                                            <tr>
                                                                <td>شماره حساب</td>
                                                                <td><?php echo per_number($asd[0]['u_hesab']); ?></td>
                                                            </tr>
                                                            <tr>
                                                                <td>شماره شبا</td>
                                                                <td><?php echo per_number($asd[0]['u_shaba']); ?></td>
                                                            </tr>
                                                            <tr>
                                                                <td>محل تولد</td>
                                                                <td><?php echo per_number($asd[0]['u_birth_city']); ?></td>
                                                            </tr>
                                                            <tr>
                                                                <td>شماره شناسنامه</td>
                                                                <td><?php echo per_number($asd[0]['u_cert_number']); ?></td>
                                                            </tr>
                                                            <tr>
                                                                <td>محل صدور</td>
                                                                <td><?php echo per_number($asd[0]['u_cert_city']); ?></td>
                                                            </tr>
                                                            <tr>
                                                                <td>تاریخ شروع به کار</td>
                                                                <td><?php echo per_number($asd[0]['u_start_work']); ?></td>
                                                            </tr>
                                                            <tr>
                                                                <td>تاریخ ترک کار</td>
                                                                <td><?php echo per_number($asd[0]['u_end_work']); ?></td>
                                                            </tr>
                                                            <tr>
                                                                <td>کارت ملی</td>
                                                                <td>
                                                                    <?php
                                                                    $melicart_url = user_get_media($u_id, 'melicart');
                                                                    if($melicart_url == ""){
                                                                        echo "موجود نیست!";
                                                                    }else{
                                                                        ?>
                                                                        <a target="_blank" href="<?php echo user_get_media($u_id, 'melicart'); ?>">مشاهده</a>
                                                                        <?php
                                                                    }
                                                                    ?>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>شناسنامه ۱</td>
                                                                <td>
                                                                    <?php
                                                                    $identify_1_url = user_get_media($u_id, 'identify_1');
                                                                    if($identify_1_url == ""){
                                                                        echo "موجود نیست!";
                                                                    }else{
                                                                        ?>
                                                                        <a target="_blank" href="<?php echo user_get_media($u_id, 'identify_1'); ?>">مشاهده</a>
                                                                        <?php
                                                                    }
                                                                    ?>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>شناسنامه ۲</td>
                                                                <td>
                                                                    <?php
                                                                    $identify_2_url = user_get_media($u_id, 'identify_2');
                                                                    if($identify_2_url == ""){
                                                                        echo "موجود نیست!";
                                                                    }else{
                                                                        ?>
                                                                        <a target="_blank" href="<?php echo user_get_media($u_id, 'identify_2'); ?>">مشاهده</a>
                                                                        <?php
                                                                    }
                                                                    ?>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>شناسنامه ۳</td>
                                                                <td>
                                                                    <?php
                                                                    $identify_3_url = user_get_media($u_id, 'identify_3');
                                                                    if($identify_3_url == ""){
                                                                        echo "موجود نیست!";
                                                                    }else{
                                                                        ?>
                                                                        <a target="_blank" href="<?php echo user_get_media($u_id, 'identify_3'); ?>">مشاهده</a>
                                                                        <?php
                                                                    }
                                                                    ?>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>شناسنامه ۴</td>
                                                                <td>
                                                                    <?php
                                                                    $identify_4_url = user_get_media($u_id, 'identify_4');
                                                                    if($identify_4_url == ""){
                                                                        echo "موجود نیست!";
                                                                    }else{
                                                                        ?>
                                                                        <a target="_blank" href="<?php echo user_get_media($u_id, 'identify_4'); ?>">مشاهده</a>
                                                                        <?php
                                                                    }
                                                                    ?>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>تصویر برگ قرارداد</td>
                                                                <td>
                                                                    <?php
                                                                    $u_contract_url = user_get_media($u_id, 'u_contract');
                                                                    if($u_contract_url == ""){
                                                                        echo "موجود نیست!";
                                                                    }else{
                                                                        ?>
                                                                        <a target="_blank" href="<?php echo user_get_media($u_id, 'u_contract'); ?>">مشاهده</a>
                                                                        <?php
                                                                    }
                                                                    ?>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>تصویر دفترچه بیمه</td>
                                                                <td>
                                                                    <?php
                                                                    $u_insurance_url = user_get_media($u_id, 'u_insurance');
                                                                    if($u_insurance_url == ""){
                                                                        echo "موجود نیست!";
                                                                    }else{
                                                                        ?>
                                                                        <a target="_blank" href="<?php echo user_get_media($u_id, 'u_insurance'); ?>">مشاهده</a>
                                                                        <?php
                                                                    }
                                                                    ?>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>تصویر صفحه ضمانت انجام کار</td>
                                                                <td>
                                                                    <?php
                                                                    $u_guarantee_url = user_get_media($u_id, 'u_guarantee');
                                                                    if($u_guarantee_url == ""){
                                                                        echo "موجود نیست!";
                                                                    }else{
                                                                        ?>
                                                                        <a target="_blank" href="<?php echo user_get_media($u_id, 'u_guarantee'); ?>">مشاهده</a>
                                                                        <?php
                                                                    }
                                                                    ?>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>برگ تعهدنامه حسن انجام کار</td>
                                                                <td>
                                                                    <?php
                                                                    $u_recognizance_url = user_get_media($u_id, 'u_recognizance');
                                                                    if($u_recognizance_url == ""){
                                                                        echo "موجود نیست!";
                                                                    }else{
                                                                        ?>
                                                                        <a target="_blank" href="<?php echo user_get_media($u_id, 'u_recognizance'); ?>">مشاهده</a>
                                                                        <?php
                                                                    }
                                                                    ?>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>امضای الکترونیکی</td>
                                                                <td>
                                                                    <?php
                                                                    $u_signature_url = user_get_media($u_id, 'u_signature');
                                                                    if($u_signature_url == ""){
                                                                        echo "موجود نیست!";
                                                                    }else{
                                                                        ?>
                                                                        <a target="_blank" href="<?php echo user_get_media($u_id, 'u_signature'); ?>">مشاهده</a>
                                                                        <?php
                                                                    }
                                                                    ?>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>تصویر سوابق بیمه</td>
                                                                <td>
                                                                    <?php
                                                                    $u_preinsurance_url = user_get_media($u_id, 'u_preinsurance');
                                                                    if($u_preinsurance_url == ""){
                                                                        echo "موجود نیست!";
                                                                    }else{
                                                                        ?>
                                                                        <a target="_blank" href="<?php echo user_get_media($u_id, 'u_preinsurance'); ?>">مشاهده</a>
                                                                        <?php
                                                                    }
                                                                    ?>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>تصویر گواهی عدم اعتیاد</td>
                                                                <td>
                                                                    <?php
                                                                    $u_noaddict_url = user_get_media($u_id, 'u_noaddict');
                                                                    if($u_noaddict_url == ""){
                                                                        echo "موجود نیست!";
                                                                    }else{
                                                                        ?>
                                                                        <a target="_blank" href="<?php echo user_get_media($u_id, 'u_noaddict'); ?>">مشاهده</a>
                                                                        <?php
                                                                    }
                                                                    ?>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>تصویر گواهی سو پیشینه</td>
                                                                <td>
                                                                    <?php
                                                                    $u_nocrime_url = user_get_media($u_id, 'u_nocrime');
                                                                    if($u_nocrime_url == ""){
                                                                        echo "موجود نیست!";
                                                                    }else{
                                                                        ?>
                                                                        <a target="_blank" href="<?php echo user_get_media($u_id, 'u_nocrime'); ?>">مشاهده</a>
                                                                        <?php
                                                                    }
                                                                    ?>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>تصویر کارت پایان خدمت / معافیت</td>
                                                                <td>
                                                                    <?php
                                                                    $u_nocrime_url = user_get_media($u_id, 'u_nocrime');
                                                                    if($u_nocrime_url == ""){
                                                                        echo "موجود نیست!";
                                                                    }else{
                                                                        ?>
                                                                        <a target="_blank" href="<?php echo user_get_media($u_id, 'u_nocrime'); ?>">مشاهده</a>
                                                                        <?php
                                                                    }
                                                                    ?>
                                                                </td>
                                                            </tr>
                                                        </table>
													</div>
												</div>
											</div>
											</form>
										</div>
									</div>
								</td>
				  			</tr>
				  		<?php $row++; ?>
						<?php
							}
						} else {
							?>
							<tr>
								<th colspan="7">موردی برای نمایش موجود نیست</th>
							</tr>
							<?php
						}
						?>
						</tbody>
						<tfoot>
			  				<tr>
			  					<th>ردیف</th>
								<th>نام</th>
								<th>نام خانوادگی</th>
								<th>نام دسترسی</th>
								<th>نام کاربری</th>
								<th>رمز ورود</th>
								<th>گروه</th>
								<th>مشاهده</th>
			  				</tr>
						</tfoot>
		  			</table>
				</div>
				<?php
				}
				?>
			</div>
		</section>
	</div>
<script src="<?php get_url(); ?>/group/js/script.js"></script>
<script src="<?php get_url(); ?>/group/js/jquery-print.js"></script>
<?php include"../left-nav.php"; include"../footer.php"; ?>
