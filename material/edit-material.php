<?php $title = "ویرایش مشتری"; include"../header.php"; include"../nav.php";
	$c_id = $_GET['id'];
	$customer = a_customer($c_id);
?>
<div class="content-wrapper">
	<?php breadcrumb("ویرایش مشتری"); ?>
	<form action="list-customer.php" method="post">
		<section class="content">
			<div id="details" class="col-xs-12">
				<section class="box box-info">
					<div class="box-header with-border">
						<h3 class="box-title"> ویرایش اطلاعات مشتری <span> شماره : <?php echo per_number($customer[0]['c_id']); ?> </span></h3>
					</div>
					<div class="box-body">
						
						<div class="item col-md-4">
							<div class="margin-tb input-group-prepend">
								<span class="input-group-text">نام</span>
							</div>
							<input id="c_name" type="text" name="c_name" placeholder="نام " class="form-control" value="<?php echo $customer[0]['c_name']; ?>">
						</div>
						<div class="item col-md-4">
							<div class="margin-tb input-group-prepend">
								<span class="input-group-text">نام خانوادگی</span>
							</div>
							<input id="c_family" type="text" name="c_family" placeholder="نام خانوادگی" class="form-control" value="<?php echo $customer[0]['c_family']; ?>">
						</div>
						<div class="item col-md-4">
							<div class="margin-tb input-group-prepend">
								<span class="input-group-text">نام شرکت</span>
							</div>
							<input id="c_company" type="text" name="c_company" placeholder="نام شرکت" class="form-control" value="<?php echo $customer[0]['c_company']; ?>">
						</div>
						<div class="item col-md-4">
							<div class="margin-tb input-group-prepend">
								<span class="input-group-text">شماره ملی</span>
							</div>
							<input id="c_national" type="text" name="c_national" placeholder="شماره ملی" class="form-control" value="<?php echo $customer[0]['c_national']; ?>">
						</div>
						
						<div class="item col-md-4">
							<div class="margin-tb input-group-prepend">
								<span class="input-group-text">تلفن</span>
							</div>
							<input id="c_phone" type="text" name="c_phone" placeholder="تلفن" class="form-control" value="<?php echo $customer[0]['c_phone']; ?>">
						</div>
						<div class="item col-md-4">
							<div class="margin-tb input-group-prepend">
								<span class="input-group-text">موبایل</span>
							</div>
							<input id="c_mobile" type="text" name="c_mobile" placeholder="موبایل" class="form-control" value="<?php echo $customer[0]['c_mobile']; ?>">
						</div>
						<div class="item col-md-4">
							<div class="margin-tb input-group-prepend">
								<span class="input-group-text">آدرس پست الکترونیک </span>
							</div>
							<input id="c_email" type="text" name="c_email" placeholder="آدرس پست الکترونیک" class="form-control" value="<?php echo $customer[0]['c_email']; ?>">
						</div>
						
						
						<div id="c_managername" class="item col-md-4 col-xs-12">
							<div class="input-group-prepend">
								<span class="input-group-text">نام مدیر عامل</span>
							</div>
							<input type="text" class="form-control" placeholder="نام مدیر عامل" id="c_managername" name="c_managername" value="<?php echo $customer[0]['c_managername']; ?>">
						</div>
						<div id="c_managercode" class="item col-md-4 col-xs-12">
							<div class="input-group-prepend">
								<span class="input-group-text">کد ملی مدیر عامل</span>
							</div>
							<input type="text" class="form-control" placeholder="کد ملی مدیر عامل" id="c_managercode" name="c_managercode" value="<?php echo $customer[0]['c_managercode']; ?>">
						</div>	
						<div class="item col-md-4">
							<div class="margin-tb input-group-prepend">
								<span class="input-group-text">نوع فعالیت</span>
							</div>
							<input id="c_activity" type="text" name="c_activity" placeholder="نوع فعالیت" value="<?php echo $customer[0]['c_activity']; ?>" class="form-control">
						</div>
						<div class="item col-md-4">
							<div class="margin-tb input-group-prepend">
								<span class="input-group-text">کد اقتصادی</span>
							</div>
							<input id="c_economic" type="text" name="c_economic" placeholder="کد اقتصادی" class="form-control" value="<?php echo $customer[0]['c_economic']; ?>" data-required="1">
							<span><span>
							</div>
							<div class="item col-md-4">
								<div class="margin-tb input-group-prepend">
									<span class="input-group-text">ارزش افزوده: </span>
								</div>
								<select class="form-control" id="c_vat" name="c_vat">
									<option <?php if($customer[0]['c_vat'] == 'yes') { echo 'selected';} ?>	 value="yes">دارد</option>
									<option <?php if($customer[0]['c_vat'] == 'no') { echo 'selected';} ?>	 value="no">ندارد</option>
								</select>
							</div>
							<div id="vatdate" class="item col-md-4 <?php if($customer[0]['c_vat'] == 'no') { echo 'hidden-obj';}?>">
								<div class="input-group-prepend">
									<span class="input-group-text">تاریخ انقضاء گواهی ارزش افزوده</span>
								</div>
								<input type="text" autocomplete="off" class="form-control" placeholder="تاریخ انقضاء گواهی ارزش افزوده" id="c_date" name="c_expire_vat" value="<?php echo $customer[0]['c_expire_vat']; ?>">
							</div>
							<div class="item col-md-4">
								<div class="input-group-prepend">
									<span class="input-group-text">نوع مشتری: </span>
								</div>
								<select class="form-control" id="c_customertype" name="c_customertype">
									<option <?php if($customer[0]['c_customertype'] == 'مشتری') { echo 'selected';} ?>  value="مشتری">مشتری</option>
									<option <?php if($customer[0]['c_customertype'] == 'تامین کننده') { echo 'selected';} ?> value="تامین کننده">تامین کننده</option>
								</select>
							</div>
							<div id="c_registernumber" class="item col-md-4 col-xs-12">
								<div class="input-group-prepend">
									<span class="input-group-text">شماره ثبت</span>
								</div>
								<input type="text" class="form-control" placeholder="شماره ثبت" id="c_registernumber" name="c_registernumber" value="<?php echo $customer[0]['c_registernumber']; ?>">
							</div>
							<div id="c_postalcode" class="item col-md-4 col-xs-12">
								<div class="input-group-prepend">
									<span class="input-group-text">کد پستی</span>
								</div>
								<input type="text" class="form-control" placeholder="کد پستی" value="<?php echo $customer[0]['c_postalcode']; ?>" id="c_postalcode" name="c_postalcode">
							</div>
							<div id="c_businessinterface" class="item col-md-4 col-xs-12">
								<div class="input-group-prepend">
									<span class="input-group-text">تلفن رابط بازرگانی</span>
								</div>
								<input type="text" class="form-control" placeholder="تلفن رابط بازرگانی" value="<?php echo $customer[0]['c_businessinterface']; ?>" id="c_businessinterface" name="c_businessinterface">
							</div>
							<div id="c_financialinterface" class="item col-md-4 col-xs-12">
								<div class="input-group-prepend">
									<span class="input-group-text">تلفن رابط مالی</span>
								</div>
								<input type="text" class="form-control" placeholder="تلفن رابط مالی" id="c_financialinterface" value="<?php echo $customer[0]['c_financialinterface']; ?>" name="c_financialinterface">
							</div>
							
							<div id="c_dischargephone" class="item col-md-4 col-xs-12">
								<div class="input-group-prepend">
									<span class="input-group-text">تلفن مسئول تخیله بار</span>
								</div>
								<input type="text" class="form-control" placeholder="تلفن مسئول تخیله بار" id="c_dischargephone" value="<?php echo $customer[0]['c_dischargephone']; ?>" name="c_dischargephone">
							</div>
							<div class="item col-md-4">
								<div class="margin-tb input-group-prepend">
									<span class="input-group-text">فکس</span>
								</div>
								<input id="c_fax" type="text" name="c_fax" placeholder="فکس" value="<?php echo $customer[0]['c_fax']; ?>" class="form-control">
							</div>
							<div class="item col-md-12">
								<div class="margin-tb input-group-prepend">
									<span class="input-group-text">آدرس دفتر </br></span>
								</div>
								<textarea class="form-control" rows="3" id="c_oaddress" type="text" name="c_oaddress" class="form-control" data-required="1"><?php echo $customer[0]['c_oaddress']; ?></textarea>
								<span></span>
							</div>
							<div class="item col-md-12">
								<div class="margin-tb input-group-prepend">
									<span class="input-group-text">آدرس کارخانه</span>
								</div>
								<textarea class="form-control" rows="3" id="c_faddress" type="text" name="c_faddress" class="form-control" data-required="1"><?php echo $customer[0]['c_faddress']; ?></textarea>
								<span></span>
							</div>
							<div id="c_discharge" class="item col-md-12 col-xs-12">
								<div class="input-group-prepend">
									<span class="input-group-text">آدرس محل تخیله بار</br></span>
								</div>
								<textarea class="form-control" rows="3"  id="c_discharge" name="c_discharge"><?php echo $customer[0]['c_discharge']; ?></textarea>
							</div>
							
							</div>
						</section>
						<input class="hidden" type="text" id="c_id" name="c_id" value="<?php echo $c_id; ?>">
						<div style="text-align: center; margin: 20px 0;" class="col-xs-12">
							<button type="submit" class="btn btn-success btn-lg" id="edit_customer" name="edit_customer">ذخیره</button>
						</div>	
					</div>
				</section>
			</form>
			</div>
			<div class="control-sidebar-bg"></div>
			<script type="text/javascript" src="js/customer.js"></script>
		<?php include"../left-nav.php"; include"../footer.php"; ?>										