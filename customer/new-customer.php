<?php $title = "ثبت حساب"; include"../header.php"; include"../nav.php"; 
	$aru = new aru();
?>

<div class="content-wrapper">
	<?php breadcrumb("افزودن مشتری" , "customer/list-customer.php");
		if(isset($_POST['add-customer'])) {				
			$c_stamp = "";
			$c_signaturep = "";
			$c_signaturep2 = "";
			$c_pic_national = "";
			$c_pic_draft = "";
			$c_pic_taxes = "";
			$c_founded_ad = "";
			$c_pic_manager = "";
			$c_last_change = "";
			$ary = $_POST;
				if(isset($_FILES['c_founded_ad']) && $_FILES['c_founded_ad']['size']>0){
					$filename = $_FILES['c_founded_ad']['name'];
					$tmp_name = $_FILES['c_founded_ad']['tmp_name'];
					$size = $_FILES['c_founded_ad']['size'];
					$type = "c_founded_ad";
					$c_founded_ad = upload_file($filename, $tmp_name, $size, $type, "0");
				}
				if(isset($_FILES['c_pic_manager']) && $_FILES['c_pic_manager']['size']>0){
					$filename = $_FILES['c_pic_manager']['name'];
					$tmp_name = $_FILES['c_pic_manager']['tmp_name'];
					$size = $_FILES['c_pic_manager']['size'];
					$type = "c_pic_manager";
					$c_pic_manager = upload_file($filename, $tmp_name, $size, $type, "0");
				}
				if(isset($_FILES['c_last_change']) && $_FILES['c_last_change']['size']>0){
					$filename = $_FILES['c_last_change']['name'];
					$tmp_name = $_FILES['c_last_change']['tmp_name'];
					$size = $_FILES['c_last_change']['size'];
					$type = "c_last_change";
					$c_last_change = upload_file($filename, $tmp_name, $size, $type, "0");
				}
				if(isset($_FILES['c_stamp']) && $_FILES['c_stamp']['size']>0){
					$filename = $_FILES['c_stamp']['name'];
					$tmp_name = $_FILES['c_stamp']['tmp_name'];
					$size = $_FILES['c_stamp']['size'];
					$type = "c_stamp";
					$c_stamp = upload_file($filename, $tmp_name, $size, $type, "0");
				}
				if(isset($_FILES['c_signaturep']) && $_FILES['c_signaturep']['size']>0){
					$filename = $_FILES['c_signaturep']['name'];
					$tmp_name = $_FILES['c_signaturep']['tmp_name'];
					$size = $_FILES['c_signaturep']['size'];
					$type = "c_signaturep";
					$c_signaturep = upload_file($filename, $tmp_name, $size, $type, "0");
				}
				if(isset($_FILES['c_signaturep2']) && $_FILES['c_signaturep2']['size']>0){
					$filename = $_FILES['c_signaturep2']['name'];
					$tmp_name = $_FILES['c_signaturep2']['tmp_name'];
					$size = $_FILES['c_signaturep2']['size'];
					$type = "c_signaturep2";
					$c_signaturep2 = upload_file($filename, $tmp_name, $size, $type, "0");
				}
				if(isset($_FILES['c_pic_national']) && $_FILES['c_pic_national']['size']>0){
					$filename = $_FILES['c_pic_national']['name'];
					$tmp_name = $_FILES['c_pic_national']['tmp_name'];
					$size = $_FILES['c_pic_national']['size'];
					$type = "c_pic_national";
					$c_pic_national = upload_file($filename, $tmp_name, $size, $type, "0");
				}
				if(isset($_FILES['c_pic_draft']) && $_FILES['c_pic_draft']['size']>0){
					$filename = $_FILES['c_pic_draft']['name'];
					$tmp_name = $_FILES['c_pic_draft']['tmp_name'];
					$size = $_FILES['c_pic_draft']['size'];
					$type = "c_pic_draft";
					$c_pic_draft = upload_file($filename, $tmp_name, $size, $type, "0");
				}
				if(isset($_FILES['c_pic_taxes']) && $_FILES['c_pic_taxes']['size']>0){
					$filename = $_FILES['c_pic_taxes']['name'];
					$tmp_name = $_FILES['c_pic_taxes']['tmp_name'];
					$size = $_FILES['c_pic_taxes']['size'];
					$type = "c_pic_taxes";
					$c_pic_taxes = upload_file($filename, $tmp_name, $size, $type, "0");
				}
				$ary['c_stamp'] = $c_stamp;
				$ary['c_signaturep'] = $c_signaturep;
				$ary['c_signaturep2'] = $c_signaturep2;
				$ary['c_pic_national'] = $c_pic_national;
				$ary['c_pic_draft'] = $c_pic_draft;
				$ary['c_pic_taxes'] = $c_pic_taxes;
				$ary['c_founded_ad'] = $c_founded_ad;
				$ary['c_pic_manager'] = $c_pic_manager;
				$ary['c_last_change'] = $c_last_change;
				$mobile = $_POST['c_mobile'];
				$mellicode = $_POST['c_national'];
				$aru->add("customer", $ary);
				//send_sms($mobile, "حساب کاربری شما در شرکت پتروسامان با موفقیت ایجاد شد \n نام کاربری: $mellicode \n رمز عبور: $mobile \n آدرس سامانه: http://crm.petrocoke.ir");
				echo '<meta http-equiv="refresh" content="2"/>';
			}
		?>
	<section class="content">
		<form action="" method="post">
			<section class="box box-info">
				<div class="box-header with-border">
					<div class="box-body">
						<div class="row">
							<div class="item col-md-4">
								<div class="input-group-prepend">
									<label for="person_select">نوع حساب</label>
								</div>
								<select class="form-control" id="person_select" name="person">
									<option>نوع حساب را انتخاب کنید</option>
									<option value="real_person">شخصیت حقیقی</option>
									<option value="legal_person">شخصیت حقوقی</option>
								</select>
							</div>
						</div>
					</div>
				</div>
			</section>
		</form>
		<div id="form1">
			<form action="" method="post" id="myForm" enctype='multipart/form-data'>
				<input type="hidden" name="c_account" value="real_person">
				<input type="hidden" name="c_national_id" value="0">
				<input type="hidden" name="c_registernumber" value="0">
				<input type="hidden" name="c_managername" value="0">
				<input type="hidden" name="c_managercode" value="0">
				<input type="hidden" name="c_last_change" value="0">
				<input type="hidden" name="c_pic_manager" value="0">
				<input type="hidden" name="c_founded_ad" value="0">				
				<section class="box box-info">
					<div class="box-header with-border">
						<h3 class="box-title">اطلاعات شخص حقیقی</h3>
					</div>
					<div class="box-body">	
						<div class="row">
							<div class="item col-md-4">
								<div class="margin-tb input-group-prepend">
									<span class="input-group-text">نوع</span>
								</div>
								<select class="form-control" id="c_type" name="c_type">
									<option value="مشتری">مشتری</option>
									<option value="تامین کننده">تامین کننده</option>
									<option value="همکار">همکار</option>
								</select>
							</div>
							<div class="item col-md-4">
								<div class="margin-tb input-group-prepend">
									<span class="input-group-text">نام</span>
								</div>
								<input id="c_name" type="text" name="c_name" placeholder="نام" class="form-control" data-required="1">
								<span></span>
							</div>
							<div class="item col-md-4">
								<div class="margin-tb input-group-prepend">
									<span class="input-group-text">نام خانوادگی</span>
								</div>
								<input id="c_family" type="text" name="c_family" placeholder="نام خانوادگی" class="form-control" data-required="1">
								<span></span>
							</div>
						</div>
						<div class="row">
							<div class="item col-md-4">
								<div class="margin-tb input-group-prepend">
									<span class="input-group-text">نام شرکت</span>
								</div>
								<input id="c_company" type="text" name="c_company" placeholder="نام شرکت" class="form-control" data-required="1">
								<span></span>
							</div>
							<div class="item col-md-4">
								<div class="margin-tb input-group-prepend">
									<span class="input-group-text">کد ملی</span>
								</div>
								<input id="c_national" type="text" name="c_national" placeholder="کد ملی" class="form-control" data-required="1">
								<span></span>
							</div>
							<div class="item col-md-4">
								<div class="margin-tb input-group-prepend">
									<span class="input-group-text">شماره شناسنامه</span>
								</div>
								<input id="c_certificate" type="text" name="c_certificate" placeholder="شماره شناسنامه" class="form-control" data-required="1">
								<span></span>
							</div>
						</div>
						<div class="row">
							<div class="item col-md-4">
								<div class="margin-tb input-group-prepend">
									<span class="input-group-text">شماره تماس</span>
								</div>
								<input id="c_phone" type="text" name="c_phone" placeholder="شماره تماس" class="form-control" data-required="1">
								<span></span>
							</div>
							<div class="item col-md-4">
								<div class="margin-tb input-group-prepend">
									<span class="input-group-text">تلفن همراه</span>
								</div>
								<input id="c_mobile" type="text" name="c_mobile" placeholder="تلفن همراه" class="form-control">
								<span></span>
							</div>
							<div class="item col-md-4">
								<div class="margin-tb input-group-prepend">
									<span class="input-group-text">آدرس پست الکترونیک</span>
								</div>
								<input id="c_email" type="text" name="c_email" placeholder="آدرس پست الکترونیک" class="form-control">
								<span></span>
							</div>
						</div>
					</div>
				</section>
				
				<section class="box box-warning">
					<div class="box-header with-border">
						<h3 class="box-title">اطلاعات واحد تولیدی</h3>
					</div>
					<div class="box-body">
						<div class="row">
							<div class="item col-md-4">
								<div class="margin-tb input-group-prepend">
									<span class="input-group-text">نوع فعالیت</span>
								</div>
								<input id="c_activity" type="text" name="c_activity" placeholder="نوع فعالیت" class="form-control">
							</div>
							<div class="item col-md-4">
								<div class="margin-tb input-group-prepend">
									<span class="input-group-text">شماره اقتصادی</span>
								</div>
								<input id="c_economic" type="text" name="c_economic" placeholder="شماره اقتصادی" class="form-control" data-required="1">
								<span><span>
							</div>
							
							<div class="item col-md-4">
								<div class="margin-tb input-group-prepend">
									<span class="input-group-text">ارزش افزوده</span>
								</div>
								<select class="form-control" id="c_vat" name="c_vat">
									<option value="yes">دارد</option>
									<option value="no">ندارد</option>
								</select>
							</div>
							<div id="vatdate" class="item col-md-4 col-xs-12">
								<div class="input-group-prepend">
									<span class="input-group-text">تاریخ انقضاء گواهی ارزش افزوده</span>
								</div>
								<input type="text" autocomplete="off" class="form-control" placeholder="تاریخ انقضاء گواهی ارزش افزوده" id="c_date" name="c_expire_vat">
							</div>
							<div id="c_postalcode" class="item col-md-4 col-xs-12">
								<div class="input-group-prepend">
									<span class="input-group-text">کد پستی</span>
								</div>
								<input type="text" class="form-control" placeholder="کد پستی" id="c_postalcode" name="c_postalcode">
							</div>
						</div>
							
					</div>
				</section>
						<section class="box box-success">
							<div class="box-header with-border">
								<h3 class="box-title">اطلاعات تماس و آدرس</h3>
							</div>
							<div class="box-body">
							    <div class="row">
    								<div id="c_businessinterface" class="item col-md-4 col-xs-12">
    									<div class="input-group-prepend">
    										<span class="input-group-text">تلفن رابط بازرگانی</span>
    									</div>
    									<input type="text" class="form-control" placeholder="تلفن رابط بازرگانی" id="c_businessinterface" name="c_businessinterface">
    								</div>
    								<div id="c_financialinterface" class="item col-md-4 col-xs-12">
    									<div class="input-group-prepend">
    										<span class="input-group-text">تلفن رابط مالی</span>
    									</div>
    									<input type="text" class="form-control" placeholder="تلفن رابط مالی" id="c_financialinterface" name="c_financialinterface">
    								</div>
    								
    								<div id="c_dischargephone" class="item col-md-4 col-xs-12">
    									<div class="input-group-prepend">
    										<span class="input-group-text">تلفن مسئول تخیله بار</span>
    									</div>
    									<input type="text" class="form-control" placeholder="تلفن مسئول تخیله بار" id="c_dischargephone" name="c_dischargephone">
    								</div>
    								<div class="item col-md-4">
    									<div class="margin-tb input-group-prepend">
    										<span class="input-group-text">شماره فکس</span>
    									</div>
    									<input id="c_fax" type="text" name="c_fax" placeholder="شماره فکس" class="form-control">
    								</div>
							    </div>
    							<div class="row">
    								<div class="item col-md-4">
    									<div class="margin-tb input-group-prepend">
    										<span class="input-group-text">استان</span>
    									</div>
    									<input id="c_state" type="text" name="c_state" placeholder="استان" class="form-control">
    								</div>
    								<div class="item col-md-4">
    									<div class="margin-tb input-group-prepend">
    										<span class="input-group-text">شهرستان</span>
    									</div>
    									<input id="c_county" type="text" name="c_county" placeholder="شهرستان" class="form-control">
    								</div>
    								<div class="item col-md-4">
    									<div class="margin-tb input-group-prepend">
    										<span class="input-group-text">شهر</span>
    									</div>
    									<input id="c_city" type="text" name="c_city" placeholder="شهر" class="form-control">
    								</div>
    						    </div>
								<div class="row">
									<div class="item col-md-12">
										<div class="margin-tb input-group-prepend">
											<span class="input-group-text">آدرس دفتر قانونی شخص</br></span>
										</div>
										<textarea class="form-control" rows="3" id="c_oaddress" type="text" name="c_oaddress" class="form-control" data-required="1"></textarea>
										<span></span>
									</div>
									<div class="item col-md-12">
										<div class="margin-tb input-group-prepend">
											<span class="input-group-text">آدرس کارخانه</span>
										</div>
										<textarea class="form-control" rows="3" id="c_faddress" type="text" name="c_faddress" class="form-control" data-required="1"></textarea>
										<span></span>
									</div>
									<div id="c_discharge" class="item col-md-12 col-xs-12">
										<div class="input-group-prepend">
											<span class="input-group-text">آدرس محل تخیله بار</br></span>
										</div>
										<textarea class="form-control" rows="3"  id="c_discharge" name="c_discharge"></textarea>
									</div>
								</div>
							</div>
						</section>
						<section class="box box-danger">
							<div class="box-header with-border">
								<h3 class="box-title">مدارک</h3>
							</div>
							<div class="box-body text-center">
								<div class="row">
									<div id="c_discharge" class="item col-md-4 col-xs-12">
										<input type="file" id="c_stamp" name="c_stamp" />
										<label for="c_stamp">درج مهر</label>
										<img src="<?php get_url();?>dist/img/no-img.png" class="img-responsive">
									</div>
									<div id="c_discharge" class="item col-md-4 col-xs-12">
										<input type="file" id="c_signaturep" name="c_signaturep" />
										<label for="c_signaturep">امضای صاحب حساب</label>
										<img src="<?php get_url();?>dist/img/no-img.png" class="img-responsive">
									</div>
									<div id="c_discharge" class="item col-md-4 col-xs-12">
										<input type="file" id="c_signaturep2" name="c_signaturep2" />
										<label for="c_signaturep2">امضای صاحب حساب</label>
										<img src="<?php get_url();?>dist/img/no-img.png" class="img-responsive">
									</div>
								</div>
								<div class="row">
									<div id="c_discharge" class="item col-md-4 col-xs-12">
										<input type="file" id="c_pic_national" name="c_pic_national" />
										<label for="c_pic_national">تصویر کارت ملی</label>
										<img src="<?php get_url();?>dist/img/no-img.png" class="img-responsive">
									</div>
									<div id="c_discharge" class="item col-md-4 col-xs-12">
										<input type="file" id="c_pic_draft" name="c_pic_draft" />
										<label for="c_pic_draft">تصویر کارت پایان خدمت</label>
										<img src="<?php get_url();?>dist/img/no-img.png" class="img-responsive">
									</div>
									<div id="c_discharge" class="item col-md-4 col-xs-12">
										<input type="file" id="c_pic_taxes" name="c_pic_taxes" />
										<label for="c_pic_taxes">تصویر گواهی ثبت نام مودیان مالیاتی</label>
										<img src="<?php get_url();?>dist/img/no-img.png" class="img-responsive">
									</div>
								</div>
								<script src="<?php get_url(); ?>include/media/script.js"></script>
							</div>
							
						</section>
						
				<div style="text-align: center; margin: 20px 0;" class="col-xs-12">
					<button type="submit" class="btn btn-success btn-sm" name="add-customer">ذخیره</button>
				</div>			
			</form>
		</div>
		
		<div id="form2">
			<form action="" method="post" id="myForm" enctype='multipart/form-data'>
				<input type="hidden" name="c_account" value="legal_person">
				<input type="hidden" name="c_certificate" value="0">
				<input type="hidden" name="c_pic_national" value="0">
				<input type="hidden" name="c_pic_draft" value="0">
				<section class="box box-info">
					<div class="box-header with-border">
						<h3 class="box-title">اطلاعات شخصیت حقوقی</h3>
					</div>
					<div class="box-body">
						<div class="row">
							<div class="item col-md-4">
								<div class="margin-tb input-group-prepend">
									<span class="input-group-text">نوع</span>
								</div>
								<select class="form-control" id="c_type" name="c_type">
									<option value="مشتری">مشتری</option>
									<option value="تامین کننده">تامین کننده</option>
									<option value="همکار">همکار</option>
								</select>
							</div>
							<input id="c_name" type="hidden" name="c_name" placeholder="نام " class="form-control" data-required="1">	
							<input id="c_family" type="hidden" name="c_family" placeholder="نام خانوادگی" class="form-control" data-required="1">
							<div class="item col-md-4">
								<div class="margin-tb input-group-prepend">
									<span class="input-group-text">نام شرکت</span>
								</div>
								<input id="c_company" type="text" name="c_company" placeholder="نام شرکت" class="form-control" data-required="1">
								<span></span>
							</div>
							<div id="c_registernumber" class="item col-md-4 col-xs-12">
								<div class="input-group-prepend">
									<span class="input-group-text">شماره ثبت</span>
								</div>
								<input type="text" class="form-control" placeholder="شماره ثبت" id="c_registernumber" name="c_registernumber">
							</div>
						</div>
						<div class="row">		
							<input id="c_national" type="hidden" name="c_national" value="0" placeholder="کد ملی" class="form-control" data-required="1">
							<div class="item col-md-4">
								<div class="margin-tb input-group-prepend">
									<span class="input-group-text">شناسه ملی</span>
								</div>
								<input id="c_national" type="text" name="c_national_id" placeholder="شناسه ملی" class="form-control" data-required="1">
								<span></span>
							</div>
							<div class="item col-md-4">
								<div class="margin-tb input-group-prepend">
									<span class="input-group-text">نوع فعالیت</span>
								</div>
								<input id="c_activity" type="text" name="c_activity" placeholder="نوع فعالیت" class="form-control">
							</div>
							<div id="c_postalcode" class="item col-md-4 col-xs-12">
								<div class="input-group-prepend">
									<span class="input-group-text">کد پستی</span>
								</div>
								<input type="text" class="form-control" placeholder="کد پستی" id="c_postalcode" name="c_postalcode">
							</div>
						</div>
						<div class="row">
							<div class="item col-md-4">
								<div class="margin-tb input-group-prepend">
									<span class="input-group-text">شماره تماس دفتر</span>
								</div>
								<input id="c_phone" type="text" name="c_phone" placeholder="شماره تماس دفتر" class="form-control" data-required="1">
								<span></span>
							</div>
							<div class="item col-md-4">
								<div class="margin-tb input-group-prepend">
									<span class="input-group-text">تلفن همراه</span>
								</div>
								<input id="c_mobile" type="text" name="c_mobile" placeholder="تلفن همراه" class="form-control">
								<span></span>
							</div>
							<div class="item col-md-4">
								<div class="margin-tb input-group-prepend">
									<span class="input-group-text">آدرس پست الکترونیک</span>
								</div>
								<input id="c_email" type="text" name="c_email" placeholder="آدرس پست الکترونیک" class="form-control">
								<span></span>
							</div>
						</div>
					</div>
				</section>		
				<section class="box box-warning">
					<div class="box-header with-border">
						<h3 class="box-title">اطلاعات شرکت</h3>
					</div>
					<div class="box-body">
						<div class="row">
							<div id="c_managername" class="item col-md-4 col-xs-12">
								<div class="input-group-prepend">
									<span class="input-group-text">نام و نام خانوادگی مدیرعامل</span>
								</div>
								<input type="text" class="form-control" placeholder="نام و نام خانوادگی مدیرعامل" id="c_managername" name="c_managername">
							</div>
							<div id="c_managercode" class="item col-md-4 col-xs-12">
								<div class="input-group-prepend">
									<span class="input-group-text">کد ملی مدیر عامل</span>
								</div>
								<input type="text" class="form-control" placeholder="کد ملی مدیر عامل" id="c_managercode" name="c_managercode">
							</div>	
							
							<div class="item col-md-4">
								<div class="margin-tb input-group-prepend">
									<span class="input-group-text">شماره اقتصادی</span>
								</div>
								<input id="c_economic" type="text" name="c_economic" placeholder="شماره اقتصادی" class="form-control" data-required="1">
								<span></span>
							</div>									
							<div class="item col-md-4">
								<div class="margin-tb input-group-prepend">
									<span class="input-group-text">ارزش افزوده</span>
								</div>
								<select class="form-control" id="c_vat" name="c_vat">
									<option value="yes">دارد</option>
									<option value="no">ندارد</option>
								</select>
							</div>
							<div id="vatdate" class="item col-md-4 col-xs-12">
								<div class="input-group-prepend">
									<span class="input-group-text">تاریخ انقضاء گواهی ارزش افزوده</span>
								</div>
								<input type="text" autocomplete="off" class="form-control" placeholder="تاریخ انقضاء گواهی ارزش افزوده" id="c_date" name="c_expire_vat">
							</div>	
						</div>								
					</div>
				</section>
				<section class="box box-success">
					<div class="box-header with-border">
						<h3 class="box-title">اطلاعات تماس و آدرس</h3>
					</div>
					<div class="box-body">
    					<div class="row">
    						<div id="c_businessinterface" class="item col-md-4 col-xs-12">
    							<div class="input-group-prepend">
    								<span class="input-group-text">تلفن رابط بازرگانی</span>
    							</div>
    							<input type="text" class="form-control" placeholder="تلفن رابط بازرگانی" id="c_businessinterface" name="c_businessinterface">
    						</div>
    						<div id="c_financialinterface" class="item col-md-4 col-xs-12">
    							<div class="input-group-prepend">
    								<span class="input-group-text">تلفن رابط مالی</span>
    							</div>
    							<input type="text" class="form-control" placeholder="تلفن رابط مالی" id="c_financialinterface" name="c_financialinterface">
    						</div>				
    						<div id="c_dischargephone" class="item col-md-4 col-xs-12">
    							<div class="input-group-prepend">
    								<span class="input-group-text">تلفن مسئول تخیله بار</span>
    							</div>
    							<input type="text" class="form-control" placeholder="تلفن مسئول تخیله بار" id="c_dischargephone" name="c_dischargephone">
    						</div>
    						<div class="item col-md-4">
    							<div class="margin-tb input-group-prepend">
    								<span class="input-group-text">شماره فکس</span>
    							</div>
    							<input id="c_fax" type="text" name="c_fax" placeholder="شماره فکس" class="form-control">
    						</div>
    					</div>
        				<div class="row">
            				<div class="item col-md-4">
            					<div class="margin-tb input-group-prepend">
            						<span class="input-group-text">استان</span>
            					</div>
            					<input id="c_state" type="text" name="c_state" placeholder="استان" class="form-control">
            				</div>
            				<div class="item col-md-4">
            					<div class="margin-tb input-group-prepend">
            						<span class="input-group-text">شهرستان</span>
            					</div>
            					<input id="c_county" type="text" name="c_county" placeholder="شهرستان" class="form-control">
            				</div>
							<div class="item col-md-4">
								<div class="margin-tb input-group-prepend">
									<span class="input-group-text">شهر</span>
								</div>
								<input id="c_city" type="text" name="c_city" placeholder="شهر" class="form-control">
							</div>
						</div>
						<div class="row">
							<div class="item col-md-12">
								<div class="margin-tb input-group-prepend">
									<span class="input-group-text">آدرس دفتر قانونی شرکت</br></span>
								</div>
								<textarea class="form-control" rows="3" id="c_oaddress" type="text" name="c_oaddress" class="form-control" data-required="1"></textarea>
								<span></span>
							</div>
							<div class="item col-md-12">
								<div class="margin-tb input-group-prepend">
									<span class="input-group-text">آدرس کارخانه</span>
								</div>
								<textarea class="form-control" rows="3" id="c_faddress" type="text" name="c_faddress" class="form-control" data-required="1"></textarea>
								<span></span>
							</div>
							<div id="c_discharge" class="item col-md-12 col-xs-12">
								<div class="input-group-prepend">
									<span class="input-group-text">آدرس محل تخیله بار</br></span>
								</div>
								<textarea class="form-control" rows="3" id="c_discharge" name="c_discharge"></textarea>
							</div>
						</div>
    				</div>
				</section>
				<section class="box box-danger">
					<div class="box-header with-border">
						<h3 class="box-title">مدارک</h3>
					</div>
					<div class="box-body text-center">
						<div class="row">
							<div id="c_discharge" class="item col-md-4 col-xs-12">
								<input type="file" id="c_stamp" name="c_stamp" />
								<label for="c_stamp">مهر شرکت</label>
								<img src="<?php get_url();?>dist/img/no-img.png" class="img-responsive">
							</div>
							<div id="c_discharge" class="item col-md-4 col-xs-12">
								<input type="file" id="c_signaturep" name="c_signaturep" />
								<label for="c_signaturep">امضای صاحب حساب</label>
								<img src="<?php get_url();?>dist/img/no-img.png" class="img-responsive">
							</div>
							<div id="c_discharge" class="item col-md-4 col-xs-12">
								<input type="file" id="c_signaturep2" name="c_signaturep2" />
								<label for="c_signaturep2">امضای صاحب حساب</label>
								<img src="<?php get_url();?>dist/img/no-img.png" class="img-responsive">
							</div>
						</div>
						<div class="row">
							<div id="c_discharge" class="item col-md-4 col-xs-12">
								<input type="file" id="c_last_change" name="c_last_change" />
								<label for="c_last_change">تصویر آخرین آگهی تغییرات</label>
								<img src="<?php get_url();?>dist/img/no-img.png" class="img-responsive">
							</div>
							<div id="c_discharge" class="item col-md-4 col-xs-12">
								<input type="file" id="c_pic_manager" name="c_pic_manager" />
								<label for="c_pic_manager">تصویر کارت ملی مدیرعامل یا هیات مدیره</label>
								<img src="<?php get_url();?>dist/img/no-img.png" class="img-responsive">
							</div>
							<div id="c_discharge" class="item col-md-4 col-xs-12">
								<input type="file" id="c_founded_ad" name="c_founded_ad" />
								<label for="c_founded_ad">تصویر روزنامه رسمی آگهی تاسیس</label>
								<img src="<?php get_url();?>dist/img/no-img.png" class="img-responsive">
							</div>
						</div>
						<div class="row">
							<div id="c_discharge" class="item col-md-4 col-xs-12">
								<input type="file" id="c_pic_taxes" name="c_pic_taxes" />
								<label for="c_pic_taxes">تصویر گواهی ارزش افزوده</label>
								<img src="<?php get_url();?>dist/img/no-img.png" class="img-responsive">
							</div>
						</div>
						<script src="<?php get_url(); ?>include/media/script.js"></script>
					</div>					
				</section>				
				<div style="text-align: center; margin: 20px 0;" class="col-xs-12">
					<button type="submit" class="btn btn-success btn-sm" name="add-customer">ذخیره</button>
				</div>
			</div>
			</form>
					</div>
				</section>
			</div>
			<script>
				
			</script>
			<script src="<?php get_url(); ?>customer/js/customer.js"></script>
		<?php include"../left-nav.php"; include"../footer.php"; ?>																							