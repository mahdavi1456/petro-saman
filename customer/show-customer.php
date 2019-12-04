<?php $title = "نمایش مشتری"; include"../header.php"; include"../nav.php";
	$c_id = $_GET['id'];
	$customer = a_customer($c_id);
	$c_account = $customer[0]['c_account'];
?>
<div class="content-wrapper">
	<?php breadcrumb(); ?>
	<section class="content">
		<div id="details-show" class="col-xs-12">
			<div class="row">
			  	<div class="item col-md-4">
					<div class="margin-tb input-group-prepend">
				  		<span class="input-group-text">شماره مشتری:</span>
				  		<span class="bold"><?php echo per_number($customer[0]['c_id']); ?></span>
					</div>
				</div>
				<div class="item col-md-4">
					<div class="margin-tb input-group-prepend">
						<span class="input-group-text">نوع شخصیت:</span>
						<span class="bold"><?php if($c_account=='real_person'){echo "شخص حقیقی";} else{ echo "شخص حقوقی"; } ?></span>
					</div>
				</div>
				<div class="item col-md-4">
					<div class="input-group-prepend">
						<span class="input-group-text">نوع حساب:</span>
						<span class="bold"><?php echo $customer[0]['c_type']; ?></span>
					</div>
				</div>
				<?php if($c_account=='real_person'){ ?>
					<div class="item col-md-4">
						<div class="margin-tb input-group-prepend">
							<span class="input-group-text">نام:</span>
							<span class="bold"><?php echo $customer[0]['c_name']; ?></span>
						</div>
					</div>
					<div class="item col-md-4">
						<div class="margin-tb input-group-prepend">
							<span class="input-group-text">نام خانوادگی:</span>
							<span class="bold"><?php echo $customer[0]['c_family']; ?></span>
						</div>
					</div>
					<?php
				} ?>
				<div class="item col-md-4">
					<div class="margin-tb input-group-prepend">
						<span class="input-group-text">نام شرکت:</span>
						<span class="bold"><?php echo $customer[0]['c_company']; ?></span>
					</div>
				</div>
				<?php if($c_account=='real_person'){ ?>
					<div class="item col-md-4">
						<div class="margin-tb input-group-prepend">
							<span class="input-group-text">کد ملی:</span>
							<span class="bold"><?php echo per_number($customer[0]['c_national']); ?></span>
						</div>
					</div>
					<div class="item col-md-4">
						<div class="margin-tb input-group-prepend">
							<span class="input-group-text">شماره شناسنامه:</span>
							<span class="bold"><?php echo per_number($customer[0]['c_certificate']); ?></span>
						</div>
					</div>
					<?php } 
					if($c_account=='legal_person'){ ?>
					<div class="item col-md-4">
						<div class="margin-tb input-group-prepend">
							<span class="input-group-text">شناسه ملی:</span>
							<span class="bold"><?php echo per_number($customer[0]['c_national_id']); ?></span>
						</div>
					</div>
				<?php } ?>
				<div class="item col-md-4">
					<div class="margin-tb input-group-prepend">
						<span class="input-group-text">شماره تماس:</span>
						<span class="bold"><?php echo per_number($customer[0]['c_phone']); ?></span>
					</div>
				</div>
				<div class="item col-md-4">
					<div class="margin-tb input-group-prepend">
						<span class="input-group-text">تلفن همراه:</span>
						<span class="bold"><?php echo per_number($customer[0]['c_mobile']); ?></span>
					</div>
				</div>
				<div class="item col-md-4">
					<div class="margin-tb input-group-prepend">
						<span class="input-group-text">آدرس پست الکترونیک:</span>
						<span class="bold"><?php echo $customer[0]['c_email']; ?></span>
					</div>
				</div>
				<?php if($c_account=='legal_person'){ ?>
					<div class="item col-md-4">
						<div class="input-group-prepend">
							<span class="input-group-text">نام و نام خانوادگی مدیرعامل:</span>
							<span class="bold"><?php echo $customer[0]['c_managername']; ?></span>
						</div>
					</div>	
					<div class="item col-md-4">
						<div class="input-group-prepend">
							<span class="input-group-text">کد ملی مدیر عامل : </span>
							<span class="bold"><?php echo per_number($customer[0]['c_managercode']); ?></span>
						</div>
					</div>	
				<?php } ?>
				<div class="item col-md-4">
					<div class="input-group-prepend">
						<span class="input-group-text">نوع فعالیت : </span>
						<span class="bold"><?php echo $customer[0]['c_activity']; ?></span>
					</div>
				</div>
				<div class="item col-md-4">
					<div class="margin-tb input-group-prepend">
						<span class="input-group-text">شماره اقتصادی:</span>
						<span class="bold"><?php echo per_number($customer[0]['c_economic']); ?></span>
					</div>
				</div>
				<div class="item col-md-4">
					<div class="margin-tb input-group-prepend">
						<span class="input-group-text">ارزش افزوده:</span>
						<span class="bold">
							<?php
								if($customer[0]['c_vat'] == 'yes'){
									echo "دارد";
									}else{
									echo "ندارد";
								}
							?>	
						</span>
					</div>
				</div>
				<div id="vatdate" class="item col-md-4 col-xs-12">
					<div class="input-group-prepend">
						<span class="input-group-text">تاریخ انقضا:</span>
						<span class="bold">
							<?php
								if($customer[0]['c_vat'] == 'yes'){
									echo per_number($customer[0]['c_expire_vat']);
									}else{
									echo "ندارد";
								}
							?>	</span>
					</div>
				</div>
				
				<?php if($c_account=='legal_person'){ ?>
					<div class="item col-md-4">
						<div class="input-group-prepend">
							<span class="input-group-text">شماره ثبت : </span>
							<span class="bold"><?php echo per_number($customer[0]['c_registernumber']); ?></span>
						</div>
					</div>
				<?php } ?>
				<div class="item col-md-4">
					<div class="input-group-prepend">
						<span class="input-group-text">کد پستی : </span>
						<span class="bold"><?php echo per_number($customer[0]['c_postalcode']); ?></span>
					</div>
				</div>
				<div class="item col-md-4">
					<div class="input-group-prepend">
						<span class="input-group-text">تلفن رابط بازرگانی : </span>
						<span class="bold"><?php echo per_number($customer[0]['c_businessinterface']); ?></span>
					</div>
				</div>
				<div class="item col-md-4">
					<div class="input-group-prepend">
						<span class="input-group-text">تلفن رابط مالی : </span>
						<span class="bold"><?php echo per_number($customer[0]['c_financialinterface']); ?></span>
					</div>
				</div>
				<div class="item col-md-4">
					<div class="input-group-prepend">
						<span class="input-group-text">تلفن مسئول تخیله بار : </span>
						<span class="bold"><?php echo per_number($customer[0]['c_dischargephone']); ?></span>
					</div>
				</div>	
				<div class="item col-md-4">
					<div class="margin-tb input-group-prepend">
						<span class="input-group-text">فکس:</span>
						<span class="bold"><?php echo per_number($customer[0]['c_fax']); ?></span>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="item col-md-4">
					<div class="margin-tb input-group-prepend">
						<span class="input-group-text">استان:</span>
						<span class="bold"><?php echo per_number($customer[0]['c_state']); ?></span>
					</div>
				</div>
					<div class="item col-md-4">
						<div class="margin-tb input-group-prepend">
							<span class="input-group-text">شهرستان:</span>
							<span class="bold"><?php echo per_number($customer[0]['c_county']); ?></span>
						</div>
					</div>
					<div class="item col-md-4">
						<div class="margin-tb input-group-prepend">
							<span class="input-group-text">شهر:</span>
							<span class="bold"><?php echo per_number($customer[0]['c_city']); ?></span>
						</div>
					</div>
			</div>
			<div class="row">
				<div class="item col-md-12">
					<div class="margin-tb input-group-prepend">
						<?php if($c_account=='real_person'){ ?>
							<span class="input-group-text">آدرس دفتر قانونی شخص:</span>
							<?php } 
							else { ?>
							<span class="input-group-text">آدرس دفتر قانونی شرکت:</span>
						<?php } ?>
						<span class="bold"><?php echo per_number($customer[0]['c_oaddress']); ?></span>
					</div>
				</div>
				<div class="item col-md-12">
					<div class="margin-tb input-group-prepend">
						<span class="input-group-text">آدرس کارخانه:</span>
						<span class="bold"><?php echo per_number($customer[0]['c_faddress']); ?></span>
					</div>
				</div>
				<div class="item col-md-12">
					<div class="input-group-prepend">
						<span class="input-group-text">آدرس محل تخیله بار : </span>
						<span class="bold"><?php echo $customer[0]['c_discharge']; ?></span>
					</div>
				</div>
			</div>
			<div class="row">
				<?php 
					if($customer[0]['c_stamp'] != ""){ 
					?>
					<div class="item col-md-4">
						<div class="input-group-prepend">
							<span class="input-group-text">مهر شرکت </span><br>
							<a target="_blank" href="<?php get_url(); ?>uploads/<?php echo $customer[0]['c_stamp']; ?>"><img src="<?php get_url(); ?>uploads/<?php echo $customer[0]['c_stamp']; ?>" class="img-responsive"></a>
						</div>
					</div>
					<?php  }
					if($customer[0]['c_signaturep'] != ""){
					?>
					<div class="item col-md-4">
						<div class="input-group-prepend">
							<span class="input-group-text">امضای صاحب حساب</span><br>
							<a target="_blank" href="<?php get_url(); ?>uploads/<?php echo $customer[0]['c_signaturep']; ?>"><img src="<?php get_url(); ?>uploads/<?php echo $customer[0]['c_signaturep']; ?>" class="img-responsive"></a>
						</div>
					</div>
					<?php  }
					if($customer[0]['c_signaturep2'] != ""){
					?>
					<div class="item col-md-4">
						<div class="input-group-prepend">
							<span class="input-group-text">امضای صاحب حساب</span><br>
							<a target="_blank" href="<?php get_url(); ?>uploads/<?php echo $customer[0]['c_signaturep2']; ?>"><img src="<?php get_url(); ?>uploads/<?php echo $customer[0]['c_signaturep2']; ?>" class="img-responsive"></a>
						</div>
					</div>
					<?php
					} 
				?>
				<?php if($c_account=='legal_person'){ 
					
					if($customer[0]['c_last_change'] != ""){ 
					?>
					<div class="item col-md-4">
						<div class="input-group-prepend">
							<span class="input-group-text">تصویر آخرین تغییرات روزنامه رسمی اعضای هیات مدیره</span><br>
							<a target="_blank" href="<?php get_url(); ?>uploads/<?php echo $customer[0]['c_last_change']; ?>"><img src="<?php get_url(); ?>uploads/<?php echo $customer[0]['c_last_change']; ?>" class="img-responsive"></a>
						</div>
					</div>
					<?php  } 
					if($customer[0]['c_pic_manager'] != ""){ 
					?>
					<div class="item col-md-4">
						<div class="input-group-prepend">
							<span class="input-group-text">تصویر کارت ملی مدیرعامل یا هیات مدیره</span><br>
							<a target="_blank" href="<?php get_url(); ?>uploads/<?php echo $customer[0]['c_pic_manager']; ?>"><img src="<?php get_url(); ?>uploads/<?php echo $customer[0]['c_pic_manager']; ?>" class="img-responsive"></a>
						</div>
					</div>
					<?php  } 
					if($customer[0]['c_founded_ad'] != ""){ 
					?>
					<div class="item col-md-4">
						<div class="input-group-prepend">
							<span class="input-group-text">تصویر روزنامه رسمی آگهی تاسیس</span><br>
							<a target="_blank" href="<?php get_url(); ?>uploads/<?php echo $customer[0]['c_founded_ad']; ?>"><img src="<?php get_url(); ?>uploads/<?php echo $customer[0]['c_founded_ad']; ?>" class="img-responsive"></a>
						</div>
					</div>
					<?php  } 
					
				} ?>
				<?php
					if($c_account=='real_person'){ 
						
						if($customer[0]['c_pic_national'] != ""){ 
						?>
						<div class="item col-md-4">
							<div class="input-group-prepend">
								<span class="input-group-text">تصویر کارت ملی</span><br>
								<a target="_blank" href="<?php get_url(); ?>uploads/<?php echo $customer[0]['c_pic_national']; ?>"><img src="<?php get_url(); ?>uploads/<?php echo $customer[0]['c_pic_national']; ?>" class="img-responsive"></a>
							</div>
						</div>
						<?php  } 
						if($customer[0]['c_pic_draft'] != ""){ 
						?>
						<div class="item col-md-4">
							<div class="input-group-prepend">
								<span class="input-group-text">تصویر کارت پایان خدمت</span><br>
								<a target="_blank" href="<?php get_url(); ?>uploads/<?php echo $customer[0]['c_pic_draft']; ?>"><img src="<?php get_url(); ?>uploads/<?php echo $customer[0]['c_pic_draft']; ?>" class="img-responsive"></a>
							</div>
						</div>
						<?php  } 
					} ?>
					<?php
						if($customer[0]['c_pic_taxes'] != ""){ 
						?>
						<div class="item col-md-4">
							<div class="input-group-prepend">
								<span class="input-group-text">تصویر گواهی ارزش افزوده</span><br>
								<a target="_blank" href="<?php get_url(); ?>uploads/<?php echo $customer[0]['c_pic_taxes']; ?>"><img src="<?php get_url(); ?>uploads/<?php echo $customer[0]['c_pic_taxes']; ?>" class="img-responsive"></a>
							</div>
						</div>
					<?php  } ?>
					<div style="text-align: center; margin: 20px 0;" class="col-xs-12">
						<a href="edit-customer.php?id=<?php echo $customer[0]['c_id']; ?>" class="btn btn-success btn-lg" id="editc_submit">ویرایش</a>
					</div>
					
			</div>
		</section>
	</div>
	<div class="control-sidebar-bg"></div>
<?php include"../left-nav.php"; include"../footer.php"; ?>							