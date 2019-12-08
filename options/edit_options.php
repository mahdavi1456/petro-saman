<?php $title = "تنظیمات"; include"../header.php"; include"../nav.php";
?>
<div class="content-wrapper">
	<?php breadcrumb(); ?>
	<section class="content">
		<?php
		if(isset($_POST['save-option'])){
			$arr = $_POST;
			foreach($arr as $key => $value){
				if($key!="save-option"){
					$sql_check = "select * from options where o_key = '$key'";
					$res_check = get_select_query($sql_check);
					if(count($res_check)>0){
						$sql = "update options set o_key = '$key', o_value = '$value' where o_key = '$key'";
					}else{
						$sql = "insert into options(o_key, o_value) values('$key', '$value')";
					}
					ex_query($sql);
				}
			}
		}
		?>
		<div class="row">
			<div class="col-xs-12">
				<form action="" method="post">
					<div class="box">
						<div class="box-header">
							<h3 class="box-title">تنظیمات</h3>
						</div>
						<div class="box-body">
							<div class="row">
								<div class="item col-md-4">
									<span>شماره ثبت</span>
									<input type="text" class="form-control" placeholder="شماره ثبت" name="reg_number" value="<?php echo get_option('reg_number'); ?>">
								</div>
								<div class="item col-md-4">
									<span>نام شرکت</span>
									<input type="text" class="form-control" placeholder="نام شرکت" name="com_name" value="<?php echo get_option('com_name'); ?>">
								</div>
								<div class="item col-md-4">
									<span>نشانی کارخانه</span>
									<input type="text" class="form-control" placeholder="نشانی کارخانه" name="fact_address" value="<?php echo get_option('fact_address'); ?>">
								</div>
							</div>
							
							<div class="row">
								<div class="item col-md-4">
									<span>نشانی دفتر</span>
									<input type="text" class="form-control" placeholder="نشانی دفتر" name="Office_Address" value="<?php echo get_option('Office_Address'); ?>">
								</div>
								<div class="item col-md-4">
									<span>شماره اقتصادی</span>
									<input type="text" class="form-control" placeholder="شماره اقتصادی" name="eco_number" value="<?php echo get_option('eco_number'); ?>">
								</div>
								<div class="item col-md-4">
									<span>شماره ملی</span>
									<input type="text" class="form-control" placeholder="شماره ملی" name="National_ID" value="<?php echo get_option('National_ID'); ?>">
								</div>
							</div>
							
							<div class="row">
								<div class="item col-md-4">
									<span>تلفن</span>
									<input type="text" class="form-control" placeholder="تلفن" name="Phone" value="<?php echo get_option('Phone'); ?>">
								</div>
								<div class="item col-md-4">
									<span>نمابر</span>
									<input type="text" class="form-control" placeholder="نمابر" name="Fax" value="<?php echo get_option('Fax'); ?>">
								</div>
								<div class="item col-md-4">
									<span>کد پستی 10 رقمی</span>
									<input type="text" class="form-control" placeholder="کد پستی 10 رقمی" name="code_postal" value="<?php echo get_option('code_postal'); ?>">
								</div>
							</div>
							<div class="row">
								<div class="item col-md-4">
									<span>استان </span>
									<input type="text" class="form-control" placeholder="استان" name="State" value="<?php echo get_option('State'); ?>">
								</div>
								<div class="item col-md-4">
									<span>شهرستان</span>
									<input type="text" class="form-control" placeholder="شهرستان" name="county" value="<?php echo get_option('county'); ?>">
								</div>
								<div class="item col-md-4">
									<span>شهر</span>
									<input type="text" class="form-control" placeholder="شهر" name="city" value="<?php echo get_option('city'); ?>">
								</div>
							</div>						
							<div class="row">
								<div class="col-md-12">
									<button class="btn btn-success" name="save-option">ذخیره</button>
								</div>
							</div>
						</div>
				    </div>
				</form>
			</div>
		</div>
	</section>
</div>





<?php include"../left-nav.php"; include"../footer.php"; ?>