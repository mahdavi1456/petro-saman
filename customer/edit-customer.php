<?php $title = "ویرایش مشتری"; include"../header.php"; include"../nav.php"; $aru = new aru();
	$c_id = $_GET['id'];
	$customer = a_customer($c_id);
	$c_account = $customer[0]['c_account'];
	
	if(isset($_POST['update-customer'])) {
		$c_id = $_POST['c_id'];
		/*
		$c_stamp = "0";
		$c_signaturep = "0";
		$c_signaturep2 = "0";
		$c_pic_national = "0";
		$c_pic_draft = "0";
		$c_pic_taxes = "0";
		$c_founded_ad = "0";
		$c_pic_manager = "0";
		$c_last_change = "0";
		*/
		if($customer[0]['c_stamp']==""){ $c_stamp = ""; } else{ $c_stamp = $customer[0]['c_stamp']; }
		if($customer[0]['c_signaturep']==""){$c_signaturep = "";}
		else{ $c_signaturep =$customer[0]['c_signaturep']; }
		if($customer[0]['c_signaturep2']==""){$c_signaturep2 = "";}
		else{ $c_signaturep2 =$customer[0]['c_signaturep2']; }
		if($customer[0]['c_pic_national']==""){$c_pic_national = "";}
		else{ $c_pic_national =$customer[0]['c_pic_national']; }
		if($customer[0]['c_pic_draft']==""){$c_pic_draft = "";}
		else{ $c_pic_draft =$customer[0]['c_pic_draft']; }
		if($customer[0]['c_pic_taxes']==""){$c_pic_taxes = "";}
		else{ $c_pic_taxes =$customer[0]['c_pic_taxes']; }
		if($customer[0]['c_founded_ad']==""){$c_founded_ad = "";}
		else{ $c_founded_ad = $customer[0]['c_founded_ad']; }
		if($customer[0]['c_pic_manager']==""){$c_pic_manager = "";}
		else{ $c_pic_manager =$customer[0]['c_pic_manager']; }
		if($customer[0]['c_last_change']==""){$c_last_change = "";}
		else{ $c_last_change =$customer[0]['c_last_change']; }
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
		$aru->update("customer", $ary, "c_id" , $c_id);
		echo '<meta http-equiv="refresh" content="2"/>';
	}
?>
<div class="content-wrapper">
	<?php breadcrumb("" , "customer/show-customer.php?id=$c_id"); ?>
	<form action="" method="post" enctype='multipart/form-data'>
		<input class="hidden" type="text" id="c_id" name="c_id" value="<?php echo $c_id; ?>">
		<section class="content">
			<div id="details" class="col-xs-12">
				<section class="box box-info">
					<div class="box-header with-border">
						<h3 class="box-title">ویرایش اطلاعات مشتری <span> شماره: <?php echo per_number($customer[0]['c_id']); ?> </span></h3>
					</div>
					<div class="box-body">
					<div class="row">
						<div class="item col-md-4">
							<div class="margin-tb input-group-prepend">
								<span class="input-group-text">نوع حساب</span>
							</div>
							<select class="form-control" id="c_account" name="c_account">
								<option <?php if($customer[0]['c_account'] == 'real_person') { echo 'selected'; } ?>  value="real_person">شخص حقیقی</option>
								<option <?php if($customer[0]['c_account'] == 'legal_person') { echo 'selected'; } ?> value="legal_person">شخص حقوقی</option>
							</select>
						</div>
						<div class="item col-md-4">
							<div class="input-group-prepend">
								<span class="input-group-text">نوع مشتری</span>
							</div>
							<select class="form-control" id="c_type" name="c_type">
								<option <?php if($customer[0]['c_type'] == 'مشتری') { echo 'selected'; } ?> value="مشتری">مشتری</option>
								<option <?php if($customer[0]['c_type'] == 'تامین کننده') { echo 'selected'; } ?> value="تامین کننده">تامین کننده</option>
								<option <?php if($customer[0]['c_type'] == 'همکار') { echo 'selected'; } ?> value="همکار">همکار</option>
							</select>
						</div>
						<?php
						if($c_account=='real_person'){ ?>
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
							<?php
						} ?>
						<div class="item col-md-4">
							<div class="margin-tb input-group-prepend">
								<span class="input-group-text">نام شرکت</span>
							</div>
							<input id="c_company" type="text" name="c_company" placeholder="نام شرکت" class="form-control" value="<?php echo $customer[0]['c_company']; ?>">
						</div>
						<?php 
						if($c_account=='real_person'){ ?>
							<div class="item col-md-4">
								<div class="margin-tb input-group-prepend">
									<span class="input-group-text">کد ملی</span>
								</div>
								<input id="c_national" type="text" name="c_national" placeholder="کد ملی" class="form-control" value="<?php echo $customer[0]['c_national']; ?>">
							</div>
							<div class="item col-md-4">
								<div class="margin-tb input-group-prepend">
									<span class="input-group-text">شماره شناسنامه</span>
								</div>
								<input id="c_certificate" type="text" name="c_certificate" placeholder="شماره شناسنامه" class="form-control" value="<?php echo $customer[0]['c_certificate']; ?>">
							</div>
						<?php } 
						else{ ?>	
							<input class="hidden" type="text" id="c_certificate" name="c_certificate" value="0"> 
							<input class="hidden" type="text" id="c_national" name="c_national" value="0"> 
							<?php 
						}
						if($c_account=='legal_person'){ ?>
							<div class="item col-md-4">
								<div class="margin-tb input-group-prepend">
									<span class="input-group-text">شناسه ملی</span>
								</div>
								<input id="c_national_id" type="text" name="c_national_id" placeholder="شناسه ملی" class="form-control" value="<?php echo $customer[0]['c_national_id']; ?>">
							</div>
						<?php } 
						else{ ?>	
							<input class="hidden" type="text" id="c_certificate" name="c_certificate" value="0"> 
							<?php 
						}?>
							<div class="item col-md-4">
								<div class="margin-tb input-group-prepend">
									<span class="input-group-text">شماره تماس</span>
								</div>
								<input id="c_phone" type="text" name="c_phone" placeholder="شماره تماس" class="form-control" value="<?php echo $customer[0]['c_phone']; ?>">
							</div>
							<div class="item col-md-4">
								<div class="margin-tb input-group-prepend">
									<span class="input-group-text">تلفن همراه</span>
								</div>
								<input id="c_mobile" type="text" name="c_mobile" placeholder="تلفن همراه" class="form-control" value="<?php echo $customer[0]['c_mobile']; ?>">
							</div>
							<div class="item col-md-4">
								<div class="margin-tb input-group-prepend">
									<span class="input-group-text">آدرس پست الکترونیک </span>
								</div>
								<input id="c_email" type="text" name="c_email" placeholder="آدرس پست الکترونیک" class="form-control" value="<?php echo $customer[0]['c_email']; ?>">
							</div>
							<?php if($c_account=='legal_person'){ ?>
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
								<?php }
								else{ ?>
								<input class="hidden" type="text" id="c_managername" name="c_managername" value="0"> 
								<input class="hidden" type="text" id="c_managercode" name="c_managercode" value="0"> 
								
								<?php }
							?>
							<div class="item col-md-4">
								<div class="margin-tb input-group-prepend">
									<span class="input-group-text">نوع فعالیت</span>
								</div>
								<input id="c_activity" type="text" name="c_activity" placeholder="نوع فعالیت" value="<?php echo $customer[0]['c_activity']; ?>" class="form-control">
							</div>
							<div class="item col-md-4">
								<div class="margin-tb input-group-prepend">
									<span class="input-group-text">شماره اقتصادی</span>
								</div>
								<input id="c_economic" type="text" name="c_economic" placeholder="شماره اقتصادی" class="form-control" value="<?php echo $customer[0]['c_economic']; ?>" data-required="1">
								<span><span>
							</div>
								<div class="item col-md-4">
									<div class="margin-tb input-group-prepend">
										<span class="input-group-text">ارزش افزوده </span>
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
								<?php if($c_account=='legal_person'){ ?>
									<div id="c_registernumber" class="item col-md-4 col-xs-12">
										<div class="input-group-prepend">
											<span class="input-group-text">شماره ثبت</span>
										</div>
										<input type="text" class="form-control" placeholder="شماره ثبت" id="c_registernumber" name="c_registernumber" value="<?php echo $customer[0]['c_registernumber']; ?>">
									</div>
									<?php } 
									else{
									?>
									<input class="hidden" type="text" id="c_registernumber" name="c_registernumber" value="0"> 
								<?php }?>
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
							</div>
							<div class="row">
								<div class="item col-md-4">
									<div class="margin-tb input-group-prepend">
										<span class="input-group-text">استان</span>
									</div>
									<input id="c_state" type="text" name="c_state" placeholder="استان" value="<?php echo $customer[0]['c_state']; ?>" class="form-control">
								</div>
								<div class="item col-md-4">
									<div class="margin-tb input-group-prepend">
										<span class="input-group-text">شهرستان</span>
									</div>
									<input id="c_county" type="text" name="c_county" placeholder="شهرستان" value="<?php echo $customer[0]['c_county']; ?>" class="form-control">
								</div>
								<div class="item col-md-4">
									<div class="margin-tb input-group-prepend">
										<span class="input-group-text">شهر</span>
									</div>
									<input id="c_city" type="text" name="c_city" placeholder="شهر" value="<?php echo $customer[0]['c_city']; ?>" class="form-control">
								</div>
							</div>
								<div class="item col-md-12">
									<div class="margin-tb input-group-prepend">
										<?php if($c_account=='real_person'){ ?>
											<span class="input-group-text">آدرس دفتر قانونی شخص</span>
											<?php } 
											if($c_account=='legal_person'){ ?>
											<span class="input-group-text">آدرس دفتر قانونی شرکت</span>
										<?php } ?>
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
								<div class="item col-md-12 col-xs-12">
									<div class="input-group-prepend">
										<span class="input-group-text">آدرس محل تخیله بار</br></span>
									</div>
									<textarea class="form-control" rows="3"  id="c_discharge" name="c_discharge"><?php echo $customer[0]['c_discharge']; ?></textarea>
								</div>
								<center>
									<div class="row">
										<div class="item col-md-4 col-xs-12">
											<input type="file" id="c_stamp" name="c_stamp" />
											<label for="c_stamp">مهر شرکت</label>
											<?php if($customer[0]['c_stamp']!= ""){ ?>
												<img src="<?php get_url(); ?>uploads/<?php echo $customer[0]['c_stamp']; ?>" class="img-responsive">
												<?php } 
												else{
												?>
												<img src="<?php get_url();?>dist/img/no-img.png" class="img-responsive">
												<?php	}
											?>
										</div>
										<div id="c_discharge" class="item col-md-4 col-xs-12">
											<input type="file" id="c_signaturep" name="c_signaturep" />
											<label for="c_signaturep">امضای صاحب حساب</label>
											<?php if($customer[0]['c_signaturep']!= ""){ ?>
												<img src="<?php get_url(); ?>uploads/<?php echo $customer[0]['c_signaturep']; ?>" class="img-responsive">
												<?php }
												else{
												?>
												<img src="<?php get_url();?>dist/img/no-img.png" class="img-responsive">
												<?php	}
											?>
										</div>
										<div class="item col-md-4 col-xs-12">
											<input type="file" id="c_signaturep2" name="c_signaturep2" />
											<label for="c_signaturep2">امضای صاحب حساب</label>
											<?php if($customer[0]['c_signaturep2']!= ""){ ?>
												<img src="<?php get_url(); ?>uploads/<?php echo $customer[0]['c_signaturep2']; ?>" class="img-responsive">
												<?php }
												else{
												?>
												<img src="<?php get_url();?>dist/img/no-img.png" class="img-responsive">
												<?php	}
											?>
										</div>
									</div>
									<?php if($c_account=='legal_person'){ ?>
										<div class="row">
											<div class="item col-md-4 col-xs-12">
												<input type="file" id="c_last_change" name="c_last_change" />
												<label for="c_last_change">تصویر آخرین تغییرات روزنامه رسمی اعضای هیات مدیره</label>
												<?php if($customer[0]['c_last_change']!= ""){ ?>
													<img src="<?php get_url(); ?>uploads/<?php echo $customer[0]['c_last_change']; ?>" class="img-responsive">
													<?php } 
													else{
													?>
													<img src="<?php get_url();?>dist/img/no-img.png" class="img-responsive">
													<?php	}
												?>
											</div>
											<div class="item col-md-4 col-xs-12">
												<input type="file" id="c_pic_manager" name="c_pic_manager" />
												<label for="c_pic_manager">تصویر کارت ملی مدیرعامل یا هیات مدیره</label>
												<?php if($customer[0]['c_pic_manager']!= ""){ ?>
													<img src="<?php get_url(); ?>uploads/<?php echo $customer[0]['c_pic_manager']; ?>" class="img-responsive">
													<?php } 
													else{
													?>
													<img src="<?php get_url();?>dist/img/no-img.png" class="img-responsive">
													<?php	}
												?>
											</div>
											<div class="item col-md-4 col-xs-12">
												<input type="file" id="c_founded_ad" name="c_founded_ad" />
												<label for="c_founded_ad">تصویر روزنامه رسمی آگهی تاسیس</label>
												<?php if($customer[0]['c_founded_ad']!= ""){ ?>
													<img src="<?php get_url(); ?>uploads/<?php echo $customer[0]['c_founded_ad']; ?>" class="img-responsive">
													<?php } 
													else{
													?>
													<img src="<?php get_url();?>dist/img/no-img.png" class="img-responsive">
													<?php	}
												?>
											</div>
										</div>
										<?php } 
										if($c_account=='real_person'){ ?>
										<div class="row">
											<div class="item col-md-4 col-xs-12">
												<input type="file" id="c_pic_national" name="c_pic_national" />
												<label for="c_pic_national">تصویر کارت ملی</label>
												<?php if($customer[0]['c_pic_national']!= ""){ ?>
													<img src="<?php get_url(); ?>uploads/<?php echo $customer[0]['c_pic_national']; ?>" class="img-responsive">
													<?php } 
													else{
													?>
													<img src="<?php get_url();?>dist/img/no-img.png" class="img-responsive">
													<?php	}
												?>
											</div>
											<div class="item col-md-4 col-xs-12">
												<input type="file" id="c_pic_draft" name="c_pic_draft" />
												<label for="c_pic_draft">تصویر کارت پایان خدمت</label>
												<?php if($customer[0]['c_pic_draft']!= ""){ ?>
													<img src="<?php get_url(); ?>uploads/<?php echo $customer[0]['c_pic_draft']; ?>" class="img-responsive">
													<?php } 
													else{
													?>
													<img src="<?php get_url();?>dist/img/no-img.png" class="img-responsive">
													<?php	}
												?>
											</div>
										</div>
									<?php } ?>
									<div class="item col-md-4 col-xs-12">
												<input type="file" id="c_pic_taxes" name="c_pic_taxes" />
												<label for="c_pic_taxes">تصویر گواهی ثبت نام مودیان مالیاتی</label>
												<?php if($customer[0]['c_pic_taxes']!= ""){ ?>
													<img src="<?php get_url(); ?>uploads/<?php echo $customer[0]['c_pic_taxes']; ?>" class="img-responsive">
													<?php } 
													else{
													?>
													<img src="<?php get_url();?>dist/img/no-img.png" class="img-responsive">
													<?php	}
												?>
											</div>
								</center>
								<script src="<?php get_url(); ?>include/media/script.js"></script>
								</div>
							</section>
							<div style="text-align: center; margin: 20px 0;" class="col-xs-12">
								<button type="submit" class="btn btn-success btn-lg" id="edit_customer" name="update-customer">ذخیره</button>
							</div>	
					</div>
					</section>
					</form>
							</div>
							<div class="control-sidebar-bg"></div>
							<script type="text/javascript" src="js/customer.js"></script>
		<?php include"../left-nav.php"; include"../footer.php"; ?>																																																																																		