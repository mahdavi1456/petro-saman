<?php include"../header.php"; include"../nav.php"; ?>
	<div class="content-wrapper">

		<?php breadcrumb("برنامه ریزی شیفت ها"); ?>

		<section class="content">
			<div id="details" class="col-xs-12">
				<form action="" method="get">
					<div class="row">
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
						<div class="item col-md-4">
							<div class="margin-tb input-group-prepend">
								<span class="input-group-text">انتخاب ماه</span>
								<select name="month" class="form-control">
									<?php
									$myDate = jdate('Y/n/j');
									$myDataArray = explode('/', $myDate);
									$myYear = $myDataArray[0];
									$myMonth = $myDataArray[1];

									$y1 = $myYear;
									$y2 = $myYear;
									$y3 = $myYear;
									$m1 = $myMonth;

									$scm1 = $y1 . "_" . $m1;

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
									<option <?php if(isset($_GET['month']) && $_GET['month']==$scm1){echo "selected";} ?> value="<?php echo $scm1; ?>"><?php echo name_month($m1); ?></option>
									<option <?php if(isset($_GET['month']) && $_GET['month']==$scm2){echo "selected";} ?> value="<?php echo $scm2; ?>"><?php echo name_month($m2); ?></option>
									<option <?php if(isset($_GET['month']) && $_GET['month']==$scm3){echo "selected";} ?> value="<?php echo $scm3; ?>"><?php echo name_month($m3); ?></option>
								</select>
							</div>
						</div>
						<div class="sch_submit_c item col-md-2">
							<button type="submit" class="btn btn-success btn-sm" name="sch_submit" value="1">انتخاب</button>
						</div>
					</div>
				</form>

				<div class="col-xs-12">
					<?php
					if ( ( isset( $_GET["group"] ) && $_GET["group"] != ""  ) && ( isset( $_GET["month"] ) && $_GET["month"] != ""  ) ) {
						$lmonth = explode('_', $_GET["month"])[1];
						if ( $lmonth == 1 || $lmonth == 2 || $lmonth == 3 || $lmonth == 4 || $lmonth == 5 || $lmonth == 6 ) {
							$limit = 31;
						} else if ( $lmonth == 7 || $lmonth == 8 || $lmonth == 9 || $lmonth == 10 || $lmonth == 11 ) {
							$limit = 30;
						} else if ( $lmonth == 12 ) {
							$limit = 29;
						}
						$myYear = $myDataArray[0];

						$sc_month = $lmonth;
						$sc_group = $_GET["group"];

						if ( isset( $_POST["sch_save"] ) ) {
							$error_flag = 0;
							for ($i=1; $i <= $limit ; $i++) {
								if( !isset ( $_POST[ "type" . $i ] ) || $_POST[ "type" . $i ] == "" ) {
									$error_flag = 1;
								}
							}

							if ( $error_flag == 0 ) {
								$sc_schedule = "";
								for ($i=1; $i <= $limit ; $i++) {
									if ( $i == $limit ) {
										$sc_schedule .= $_POST[ "type" . $i ];
									} else {
										$sc_schedule .= ( $_POST[ "type" . $i ] . "." );
									}
								}

								$sql1 = "SELECT count(sc_id) FROM schedule WHERE sc_month = '$sc_month' AND sc_group = '$sc_group'";
								$check = get_var_query($sql1);

								if ( $check > 0 ) {
									$sql2 = "UPDATE schedule SET sc_schedule = '$sc_schedule' WHERE sc_month = '$sc_month' AND sc_group = '$sc_group'";
								} else {
									$sql2 = "INSERT INTO schedule(sc_month, sc_group, sc_schedule) VALUES('$sc_month', '$sc_group', '$sc_schedule')";
								}
								$res = ex_query($sql2);
								?>
								<div class="sch_save_c col-xs-12 no-padd sch_submit_c_green">
									عملیات با موفقیت انجام شد.
								</div>
								<meta http-equiv='refresh' content='2'/>

								<?php

							} else {
								?>
								<div class="sch_save_c col-xs-12 no-padd sch_submit_c_red">
									لطفا همه ی فیلد ها را پر کنید.
								</div>
								<?php
							}
						}
					}
					?>
				</div>

				<?php
				if ( isset ( $_GET["sch_submit"] ) ) {
					if ( ( isset( $_GET["group"] ) && $_GET["group"] != ""  ) && ( isset( $_GET["month"] ) && $_GET["month"] != ""  ) ) {
						$lmonth = explode('_', $_GET["month"])[1];
						if ( $lmonth == 1 || $lmonth == 2 || $lmonth == 3 || $lmonth == 4 || $lmonth == 5 || $lmonth == 6 ) {
							$limit = 31;
						} else if ( $lmonth == 7 || $lmonth == 8 || $lmonth == 9 || $lmonth == 10 || $lmonth == 11 ) {
							$limit = 30;
						} else if ( $lmonth == 12 ) {
							$limit = 29;
						}
						$myYear = $myDataArray[0];
						?>
						<form action="" method="post">
							<div class="row">
								<div class="col-xs-12">
									<table class="col-xs-12 table table-striped table-bordered table-responsive sch_save_table">
										<thead>
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
												$sc_month = $lmonth;
												$sc_group = $_GET["group"];
												$sql3 = "SELECT sc_schedule FROM schedule WHERE sc_month = '$sc_month' AND sc_group = '$sc_group'";
												$mySchedule = get_var_query($sql3);
												$myScheduleArray = explode('.', $mySchedule);
												for ($i=1; $i <= $limit ; $i++) {
													$j = $i-1;
													?>
													<tr>
													<td><?php echo per_number( $myYear . "/" . $lmonth . "/" . $i ); ?></td>
													<?php
													$shifts_arr = get_shifts();
													foreach ($shifts_arr as $shift) {
														$shift_name = $shift['sh_name'];
														$shift_id = $shift['sh_id'];
														?><td><input type="radio" name="type<?php echo $i; ?>" value="<?php echo $shift_id; ?>" <?php if ( !is_null( $mySchedule ) ) { if( $myScheduleArray[$j] == $shift_id ) { echo "checked"; } } ?>></td><?php
													}
													?>
													<td><input type="radio" name="type<?php echo $i; ?>" value="0" <?php if ( !is_null( $mySchedule ) ) { if( $myScheduleArray[$j] == 0 ) { echo "checked"; } } ?>></td>
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
								<div class="sch_save_c col-xs-12">
									<button type="submit" class="btn btn-success btn-sm" name="sch_save" value="1">ذخیره شود</button>
								</div>
							</div>
						</form>
						<?php
					}
				}
				?>
			</div>
		</section>
	</div>
<?php include"../left-nav.php"; include"../footer.php"; ?>
