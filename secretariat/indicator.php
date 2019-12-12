<?php $title = "مکاتبات"; include"../header.php"; include"../nav.php"; 
	$aru = new aru();
	$user = new user();
	$u_level = $user->get_current_user_level();
	$user = $aru->get_list("user", "u_id");
	$asb1 = $aru->get_list("sender_indicator", "si_id");
	$asb2 = $aru->get_list("received_indicator", "ri_id");
	$media = $aru->get_list("media_received_indicator", "mri_id");
	$media_sender = $aru->get_list("media_sender_indicator", "msi_id");
	if(isset($_GET['indicator_type'])) {
		$indicator_type = $_GET['indicator_type'];
	} else {
		$indicator_type = "";
	}

?>

<div class="content-wrapper">
	<?php breadcrumb("مکاتبات");

	if(isset($_POST['add-received_indicator'])) {
		$aru->add("received_indicator", $_POST);
	}

	if(isset($_POST['add-sender_indicator'])) {
			$si_receiver = $_POST['si_receiver'];
			$si_send_date = $_POST['si_send_date'];
			$si_description = $_POST['si_description'];
			$si_details = $_POST['si_details'];
			$sql="insert into sender_indicator (si_receiver, si_send_date, si_description, si_details) values ('$si_receiver', '$si_send_date', '$si_description', '$si_details')";
			ex_query($sql);	
			?>
			<script>
				alertify.set('notifier','position', 'bottom-right');
				alertify.success('مورد با موفقیت ثبت شد');
			</script>
			<?php
			echo "<meta http-equiv='refresh' content='2'>";
	} ?>
	<section class="content">
		<form action="" method="get">
			<section class="box box-info">
				<div class="box-header with-border">
					<h3 class="box-title">ثبت نامه</h3>
				</div>
				<div class="box-body">
					<div class="row">
						<div class="item col-md-4">
							<div class="input-group-prepend">
								<label for="indicator_type">نوع نامه</label>
							</div>
							<select class="form-control" id="indicator_type" name="indicator_type" onchange="this.form.submit()">
								<option>نوع نامه را انتخاب کنید</option>
								<option <?php if($indicator_type == "send") echo "selected"; ?> value="send">ارسالی</option>
								<option <?php if($indicator_type == "receive") echo "selected"; ?> value="receive">دریافتی</option>
							</select>
						</div>
					</div>
				</div>
			</section>
		</form>
		<?php
		if($indicator_type=="send") 
		{ ?>
			<form action="" method="post" id="myForm" enctype='multipart/form-data'>
				<section class="box box-info">
					<div class="box-header with-border">
						<h3 class="box-title">ثبت نامه ارسالی</h3>
					</div>
					<div class="box-body">	
						<div class="row">
							<div class="item col-md-6 col-xs-12">
								<div class="margin-tb input-group-prepend">
									<span class="input-group-text">گیرنده نامه </span><span class="necessary">*</span>
								</div>
								<input type="text" name="si_receiver" id="si_receiver" placeholder="گیرنده نامه" class="form-control" required>
							</div>
							
							<div class="item col-md-6 col-xs-12">
								<div class="input-group-prepend">
									<span class="input-group-text">تاریخ ارسال نامه </span><span class="necessary">*</span>
								</div>
								<input type="text" autocomplete="off" class="form-control datepickerClass" placeholder="تاریخ ارسال نامه" id="si_send_date" name="si_send_date" value="<?php echo jdate('Y/n/j'); ?>" required>
							</div>
							<div class="item col-md-12">
								<div class="margin-tb input-group-prepend">
									<span class="input-group-text">شرح نامه ارسالی</span>
								</div>
								<textarea class="form-control" rows="3" id="si_description" type="text" name="si_description" class="form-control" placeholder="شرح نامه ارسالی" data-required="1"></textarea>
								<span></span>
							</div>
							<div class="item col-md-12 col-xs-12">
								<div class="input-group-prepend">
									<span class="input-group-text">توضیحات</br></span>
								</div>
								<textarea class="form-control" rows="3"  id="si_details" name="si_details" placeholder="توضیحات" ></textarea>
							</div>
						</div>
						<div class="item col-md-12 text-left">
							<button type="submit" class="btn btn-success btn-sm" name="add-sender_indicator">ایجاد نامه</button>
						</div>	
                    </div>
				</section>
			</form>
			<?php
		} 
		if($indicator_type=="receive") 
		{ ?>		
			<form action="" method="post" id="myForm" enctype='multipart/form-data'>
				<section class="box box-info">
					<div class="box-header with-border">
						<h3 class="box-title">ثبت نامه دریافتی</h3>
					</div>
					<div class="box-body">	
						<div class="row">
							<div  class="item col-md-4 col-xs-12">
								<div class="margin-tb input-group-prepend">
									<span class="input-group-text">شماره نامه دریافتی </span><span class="necessary">*</span>
								</div>
								<input type="text" name="ri_number" id="ri_number" placeholder="شماره نامه دریافتی" class="form-control" required>
							</div>
							<div class="item col-md-4 col-xs-12">
								<div class="input-group-prepend">
									<span class="input-group-text">تاریخ نامه دریافتی </span><span class="necessary">*</span>
								</div>
								<input type="text" autocomplete="off" class="form-control datepickerClass" placeholder="تاریخ نامه دریافتی" id="ri_reg_date" name="ri_reg_date" required>
							</div>
							<div class="item col-md-4 col-xs-12">
								<div class="margin-tb input-group-prepend">
									<span class="input-group-text">فرستنده نامه </span><span class="necessary">*</span>
								</div>
								<input type="text" name="ri_sender" id="ri_sender" placeholder="فرستنده نامه" class="form-control" required>
							</div>
							
							<div class="item col-md-4 col-xs-12">
								<div class="input-group-prepend">
									<span class="input-group-text">تاریخ دریافت نامه</span>
								</div>
								<input type="text" autocomplete="off" class="form-control datepickerClass" placeholder="تاریخ دریافت نامه" id="ri_receive_date" name="ri_receive_date" value="<?php echo jdate('Y/n/j'); ?>">
							</div>
							<div  class="item col-md-4 col-xs-12">
								<div class="input-group-prepend">
									<span class="input-group-text">ارجاع به:</span>
								</div>
								<select name="u_id" id="u_id" class="form-control">
									<?php
										if(count($user) >0)
										{
											
											foreach ($user as $b ) 
											{
												$u_id = $b['u_id'];
											?>
											<option value="<?php echo $u_id; ?>"><?php echo $b['u_name'] . " " .$b['u_family'] ; ?></option>
											<?php
												
											}
										}
									?>
								</select>
							</div>
							<div class="item col-md-4 col-xs-12">
								<div class="input-group-prepend">
									<span class="input-group-text">تاریخ ارجاع</span>
								</div>
								<input type="text" autocomplete="off" class="form-control datepickerClass" placeholder="تاریخ ارجاع" id="ri_reference_date" name="ri_reference_date" value="<?php echo jdate('Y/n/j'); ?>">
								</div>
							<div class="item col-md-12">
								<div class="margin-tb input-group-prepend">
									<span class="input-group-text">شرح نامه دریافتی</span>
								</div>
								<textarea class="form-control" rows="3" id="ri_description" type="text" name="ri_description" class="form-control" placeholder="شرح نامه دریافتی" data-required="1"></textarea>
								<span></span>
							</div>
						</div>
						<div class="item col-md-12 text-left">
							<button type="submit" class="btn btn-success btn-sm" name="add-received_indicator">ذخیره</button>
						</div>
                    </div>
				</section>
			</form>
			<?php
		} ?>
	</section>
</div>
<script>

</script>
<script src="<?php get_url(); ?>secretariat/js/secretariat.js"></script>
<?php include"../left-nav.php"; include"../footer.php"; ?>																							