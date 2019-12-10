<?php include"../header.php"; include"../nav.php"; 
	$u_id = $_SESSION['user_id']; 
	$media = new media(); $user = new user();
	$u_level = $user->get_current_user_level();
	$aru = new aru();
	if($u_level == "منابع انسانی"){
		$person_select = get_select_query("select * from user");
	}
	else{
		$person_select = get_select_query("select * from user where u_id = $u_id ");
	}
	if(isset($_POST['add-rest_day'])){
		$aru->add('rest_day', $_POST);
	}
	if(isset($_POST['add-rest_hour'])){
		$aru->add('rest_hour', $_POST);
	}
	?>
	<div class="content-wrapper">
		<?php breadcrumb(); ?>
		<section class="content">
			<section class="box box-info">
				<div class="box-header with-border">
					<h3 class="box-title">مدیریت مرخصی</h3>
				</div>
				<div class="box-body" id="details">
					<div class="row">
						<div class="col-md-3">
							<label>نوع مرخصی</label>
							<select id="rest-type" class="form-control">
								<option>روزانه</option>
								<option>ساعتی</option>
							</select>
						</div>
					</div>
				</div>
			</section>

			<section class="box box-info">
				<div class="box-header with-border">
					<h3 class="box-title">مدیریت مرخصی</h3>
				</div>
				<div class="box-body">	
					<form action="" method="post" id="daily-form">
						<div class="row">
							<div class="item col-md-3">
								<label>نوع مرخصی</label>
								<select name="r_type" class="form-control">
									<option value="استحقاقی">استحقاقی</option>
									<option value="استعلاجی">استعلاجی</option>
									<option value="بدون حقوق">بدون حقوق</option>
								</select>
							</div>
							<div class="item col-md-3">
								<label>درخواست دهنده</label>
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
							<div class="item col-md-2">
								<label>از تاریخ</label>
								<input type="text" name="r_fromdate" placeholder="از تاریخ" class="date_picker form-control" autocomplete="off">
							</div>
							<div class="item col-md-2">
								<label>تا تاریخ</label>
								<input type="text" name="r_todate" placeholder="تا تاریخ" class="date_picker form-control" autocomplete="off">
							</div>
							<div class="item col-md-2">
								<label>به مدت</label>
								<input type="text" name="r_total" placeholder="به مدت" class="form-control">
							</div>
						</div>
						<div class="row">
							<div class="col-md-6">
								<label>مقصد</label>
								<textarea rows="3" name="r_destination" class="form-control" placeholder="مقصد"></textarea>
							</div>
							<div class="col-md-6">
								<label>توضیحات</label>
								<textarea rows="3" name="r_details" class="form-control" placeholder="توضیحات"></textarea>
							</div>
						</div>
						<div class="row">
							<div class="col-md-12 text-center"><br>
								<button class="btn btn-success" name="add-rest_day">ثبت مرخصی</button>
							</div>
						</div>
					</form>

					<form action="" method="post" id="hourly-form" style="display: none">
						<div class="row">
							<div class="item col-md-2">
								<label>نوع مرخصی</label>
								<select name="r_type" class="form-control">
									<option value="ساعتی">ساعتی</option>
								</select>
							</div>
							<div class="item col-md-2">
								<label>درخواست دهنده</label>
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
							<div class="item col-md-2">
								<label>تاریخ</label>
								<input type="text" name="r_date" placeholder="تاریخ" class="date_picker form-control" autocomplete="off"  value="<?php echo jdate('Y/n/j'); ?>">
							</div>
							<div class="item col-md-2">
								<label>از ساعت</label>
								<input type="time" name="r_fromtime" placeholder="از ساعت" class="form-control" autocomplete="off">
							</div>
							<div class="item col-md-2">
								<label>تا ساعت</label>
								<input type="time" name="r_totime" placeholder="تا ساعت" class="form-control" autocomplete="off">
							</div>
							<div class="item col-md-2">
								<label>به مدت</label>
								<input type="time" name="r_total" placeholder="به مدت" class="form-control">
							</div>
						</div>
						<div class="row">
							<div class="col-md-12">
								<label>توضیحات</label>
								<textarea rows="3" name="r_details" class="form-control" placeholder="توضیحات"></textarea>
							</div>
						</div>
						<div class="row">
							<div class="col-md-12 text-center"><br>
								<button class="btn btn-success" name="add-rest_hour">ثبت مرخصی</button>
							</div>
						</div>
					</form>
				</div>
			</section>
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