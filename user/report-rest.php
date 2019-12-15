<?php include"../header.php"; include"../nav.php"; 
	$u_id = $_SESSION['user_id']; 
	$media = new media(); $user = new user();
	$u_level = $user->get_current_user_level();
	$aru = new aru();
	if($u_level == "مدیریت" || $u_level == "منابع انسانی"  || $u_level == "امور مالی"){
		$person_select = get_select_query("select * from user");
	}
	else{
		$person_select = get_select_query("select * from user where u_id = $u_id ");
	}
	?>
	<div class="content-wrapper">
		<?php breadcrumb("گزارش مرخصی ها" , "index.php"); ?>
		<section class="content">
			<div class="row">
				<div class="col-xs-12">
			  		<?php
			  		if(isset($_POST['add-rest_day'])){
			  			$aru->add('rest_day', $_POST);
			  		}
			  		if(isset($_POST['add-rest_hour'])){
			  			$aru->add('rest_hour', $_POST);
			  		}
			  		?>
			  		<div class="box">
			  			<div class="box-header with-border">
                            <h3 class="box-title">لیست درخواست های مرخصی</h3>
                        </div>
			  			<div class="box-body">
			  				<form action="" method="post">
				  				<div class="row">
				  					<div class="item col-md-3">
					  					<label>انتخاب شخص</label>
										<select name="u_id" class="form-control select2">
											<?php
											if(count($person_select) > 0) {
												foreach($person_select as $ps) { ?>
													<option value="<?php echo $ps['u_id']; ?>"><?php echo $ps['u_name'] . " " . $ps['u_family']; ?></option>
												<?php
												}
											}
											?>
										</select>
				  					</div>
				  					<div class="item col-md-3">
				  						<label>نوع مرخصی</label>
				  						<select name="r_type" class="form-control">
				  							<option value="ساعتی">ساعتی</option>
				  							<option value="روزانه">روزانه</option>
				  						</select>
				  					</div>
				  					<div class="item col-md-3">
										<label>از تاریخ</label>
										<input type="text" name="r_fromdate" placeholder="از تاریخ" class="date_picker form-control" autocomplete="off">
									</div>
									<div class="item col-md-3">
										<label>تا تاریخ</label>
										<input type="text" name="r_todate" placeholder="تا تاریخ" class="date_picker form-control" autocomplete="off">
									</div>
				  					<div class="col-md-12 text-center">
				  						<button name="search" class="btn btn-success">گزارش گیری</button>
				  					</div>
				  				</div>
			  				</form>
			  				<hr>
			  				<?php
			  				if(isset($_POST['search'])){
			  					$i = 1;
			  					$u_id = $_POST['u_id'];
			  					$r_type = $_POST['r_type'];
			  					$r_fromdate = $_POST['r_fromdate'];
			  					$r_todate = $_POST['r_todate'];
			  					if($r_type == "ساعتی"){
			  						$sql = "select * from rest_hour where u_id = $u_id ";
			  						if($r_fromdate != "" && $r_todate !="") {
			  							$sql .= "and r_date > '$r_fromdate' and r_date < '$r_todate'";
			  						}
			  						$person_list = get_select_query($sql);
			  						?>
			  						<table class="table table-bordered table-striped">
			  							<thead>
				  							<tr>
												<th>ردیف</th>
												<th>درخواست دهنده</th>
												<th>تاریخ</th>
												<th>از ساعت</th>
												<th>تا ساعت</th>
												<th>به مدت</th>
												<th>توضیحات</th>
												<th>نام مدیر</th>
												<th>وضعیت</th>
												<th>تاریخ</th>
												<th>نام منابع انسانی</th>
												<th>وضعیت</th>
												<th>تاریخ</th>
												<th>عملیات</th>
				  							</tr>
			  							</thead>
			  							<tbody>
			  							<?php
			  							if(count($person_list) > 0) {
			  								foreach($person_list as $row) { ?>
				  								<tr>
												  	<td><?php echo per_number($i); ?></td>
													<td><?php echo get_user_name($row['u_id']); ?></td>
													<td><?php echo per_number(str_replace("-", "/", $row['r_date'])); ?></td>
													<td><?php echo per_number($row['r_fromtime']); ?></td>
													<td><?php echo per_number($row['r_totime']); ?></td>
													<td><?php echo per_number($row['r_total']); ?></td>
													<td><?php echo per_number($row['r_details']); ?></td>
													<td><?php $r_admin_verify = abs($row['r_admin_verify']); echo get_user_name($r_admin_verify); ?></td>
													<td><?php if($row['r_admin_verify'] > 0 ) { echo "تایید شد"; } else if($row['r_admin_verify'] < 0 ){  echo "تایید نشد"; } else { echo "نامعتبر"; } ?></td>
													<td><?php echo per_number(str_replace("-", "/", $row['r_admin_date'])); ?></td>
													<td><?php $r_hr_verify = abs($row['r_hr_verify']); echo get_user_name($r_hr_verify); ?></td>
													<td><?php if($row['r_hr_verify'] > 0 ) { echo "تایید شد"; } else if($row['r_hr_verify'] < 0 ){  echo "تایید نشد"; } else { echo "نامعتبر"; } ?></td>
													<td><?php echo per_number(str_replace("-", "/", $row['r_hr_date'])); ?></td>
													<td>
														<button class="btn btn-warning btn-xs" type="button" data-toggle="modal" data-keyboard="false" data-target="#rest_hour_modal<?php echo $row['r_id']; ?>" >تایید مرخصی</button>
														<div class="modal fade text-xs-left" id="rest_hour_modal<?php echo $row['r_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="#rest_hour_modal<?php echo $row['r_id']; ?>" style="display: none;" aria-hidden="true">
															<div class="modal-dialog" role="document">
																<form action="" method="post" enctype="multipart/form-data">
																	<input class="hidden" type="text" name="r_id" id="r_id" value="<?php echo $row['r_id']; ?>">
																	<div class="modal-content">
																		<div class="modal-header">
																			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																				<span aria-hidden="true">×</span>
																			</button>
																			<h4 class="modal-title" id="myModalLabel3">تایید مرخصی</h4>
																		</div>
																		<div class="modal-body">
																			<div class="row">
																				<div class="item col-md-12">
																					<div class="margin-tb input-group-prepend">
																						<span class="input-group-text">توضیحات مدیر</span>
																					</div>
																					<input class="form-control" type="text" id="r_admin_details" name="r_admin_details" placeholder="توضیحات مدیر" value="<?php echo per_number($row['r_admin_details']); ?>">
																				</div>
																				<div class="item col-md-12">
																					<div class="margin-tb input-group-prepend">
																						<span class="input-group-text">توضیحات منابع انسانی</span>
																					</div>
																					<input class="form-control" type="text" id="r_hr_details" name="r_hr_details" placeholder="توضیحات منابع انسانی" value="<?php echo per_number($row['r_hr_details']); ?>">
																				</div>
																			</div>
																		</div>
																	</div>
																</form>
															</div>
														</div>
													</td>
				  								</tr>
				  								<?php
				  								$i++;
				  							} 
				  						} ?>
			  							</tbody>
			  						</table>
			  					<?php
			  					} else {
			  						$sql = "select * from rest_day where u_id = $u_id ";
			  						if($r_fromdate != "" && $r_todate != "") {
			  							$sql .= "and (r_fromdate > '$r_fromdate' and r_fromdate < '$r_todate') or (r_todate > '$r_frodate' and r_todate < '$r_todate')";
			  						}
			  						$person_list = get_select_query($sql); ?>
			  						<table class="table table-bordered table-striped">
			  							<thead>
				  							<tr>
											 	<th>ردیف</th>
												<th>درخواست دهنده</th>
												<th>از تاریخ</th>
												<th>تا تاریخ</th>
												<th>به مدت</th>
												<th>توضیحات</th>
												<th>نام مدیر</th>
												<th>وضعیت</th>
												<th>تاریخ</th>
												<th>نام منابع انسانی</th>
												<th>وضعیت</th>
												<th>تاریخ</th>
												<th>عملیات</th>
				  							</tr>
			  							</thead>
			  							<tbody>
			  							<?php
			  							if(count($person_list) > 0) {
			  								foreach($person_list as $row) { ?>
				  							<tr>
											  	<td><?php echo per_number($i); ?></td>
												<td><?php echo get_user_name($row['u_id']); ?></td>
												<td><?php echo per_number(str_replace("-", "/", $row['r_fromdate'])); ?></td>
												<td><?php echo per_number(str_replace("-", "/", $row['r_todate'])); ?></td>
												<td><?php echo per_number($row['r_total']); ?></td>
												<td><?php echo per_number($row['r_details']); ?></td>
												<td><?php $r_admin_verify = abs($row['r_admin_verify']); echo get_user_name($r_admin_verify); ?></td>
												<td><?php if($row['r_admin_verify'] > 0 ) { echo "تایید شد"; } else if($row['r_admin_verify'] < 0 ){  echo "تایید نشد"; } else { echo "نامعتبر"; } ?></td>
												<td><?php echo per_number(str_replace("-", "/", $row['r_admin_date'])); ?></td>
												<td><?php $r_hr_verify = abs($row['r_hr_verify']); echo get_user_name($row['r_hr_verify']); ?></td>
												<td><?php if($row['r_hr_verify'] > 0 ) { echo "تایید شد"; } else if($row['r_hr_verify'] < 0 ){  echo "تایید نشد"; } else { echo "نامعتبر"; } ?></td>
												<td><?php echo per_number(str_replace("-", "/", $row['r_hr_date'])); ?></td>
												<td>
													<button class="btn btn-warning btn-xs" type="button" data-toggle="modal" data-keyboard="false" data-target="#rest_day_modal<?php echo $row['r_id']; ?>" >تایید مرخصی</button>
													<div class="modal fade text-xs-left" id="rest_day_modal<?php echo $row['r_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="#rest_day_modal<?php echo $row['r_id']; ?>" style="display: none;" aria-hidden="true">
														<div class="modal-dialog" role="document">
															<form action="" method="post" enctype="multipart/form-data">
																<input class="hidden" type="text" name="r_id" id="r_id" value="<?php echo $row['r_id']; ?>">
																<div class="modal-content">
																	<div class="modal-header">
																		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																			<span aria-hidden="true">×</span>
																		</button>
																		<h4 class="modal-title" id="myModalLabel3">تایید مرخصی</h4>
																	</div>
																	<div class="modal-body">
																		<div class="row">
																			<div class="item col-md-12">
																				<div class="margin-tb input-group-prepend">
																					<span class="input-group-text">توضیحات مدیر</span>
																				</div>
																				<input class="form-control" type="text" id="r_admin_details" name="r_admin_details" placeholder="توضیحات مدیر" value="<?php echo per_number($row['r_admin_details']); ?>">
																			</div>
																			<div class="item col-md-12">
																				<div class="margin-tb input-group-prepend">
																					<span class="input-group-text">توضیحات منابع انسانی</span>
																				</div>
																				<input class="form-control" type="text" id="r_hr_details" name="r_hr_details" placeholder="توضیحات منابع انسانی" value="<?php echo per_number($row['r_hr_details']); ?>">
																			</div>
																		</div>
																	</div>
																</div>
															</form>
														</div>
													</div>
													<a class="btn btn-success btn-xs" href="<?php get_url(); ?>user/rest_print.php?r_id=<?php echo $row['r_id']; ?>">چاپ مرخصی</a>
												</td>
				  							</tr>
				  								<?php
				  								$i++;
				  							} 
				  						} ?>
			  							</tbody>
			  						</table>
			  						<?php
			  					}	
			  				}
			  				?>
			  			</div>
			  		</div>
				</div>
		  	</div>
		</section>
	</div>
	<script type="text/javascript">
		$(document).ready(function(){
			$('#rest-type').change(function(){
				var v = $(this).find('option:selected').val();
				if(v == "ساعتی"){
					$('#hourly-form').show();
					$('#daily-form').hide();
				} else {
					$('#hourly-form').hide();
					$('#daily-form').show();
				}
			});
		});
	</script>
<?php include"../left-nav.php"; include"../footer.php"; ?>