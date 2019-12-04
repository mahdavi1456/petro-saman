<?php $title = "ثبت فاکتور جدید"; include"../header.php"; include"../nav.php"; ?>
<div class="wrapper">
	<div class="content-wrapper">
		<div class="container-fluid">
			<section class="content-header">
				<div id="page-wrapper">
					<div class="row">
						<div class="col-lg-12">
							<h1 class="page-header">ثبت فاکتور جدید</h1>
						</div>
					</div>
				</div>
				<ol class="breadcrumb">
					<li><a href="<?php get_url(); ?>index.php"><i class="fa fa-dashboard"></i> خانه</a></li>
					<li><a href="#">محصولات</a></li>
					<li class="active">ثبت محصول</li>
				</ol>
			</section>
			<!-- Main content -->
			<section class="content">
				<form action="" method="post">
					<div id="details" class="col-xs-12">
						<div class="row">
							<h3 class="col-md-12">سرفاکتور</h3>
							<div class="item col-md-4">
								<div class="margin-tb input-group-prepend">
									<span class="input-group-text">نام  مشتری</span>
								</div>
								<input id="p_name" type="text" name="p_name" placeholder="نام  محصول" class="form-control" required>
							</div>
							<div class="item col-md-4">
								<div class="margin-tb input-group-prepend">
									<span class="input-group-text">تاریخ صدور</span>
								</div>
								<input id="p_cat" type="text" name="p_cat" placeholder="کد دسته بندی" class="form-control" required>
							</div>
							<div class="col-md-12 text-center">
								<button type="submit" class="btn btn-success btn-lg" id="_submit" name="r_submit">ساخت سر فاکتور</button>
							</div>
						</div><br>

						<div class="row">
							<div class="col-md-12">
								<div class="box">
									<div class="box-header">
										<h3 class="box-title">جدول بدنه فاکتور</h3>
									</div>
									<div class="box-body table-responsive no-padding">
										<table class="table table-hover">
											<tbody>
												<tr>
													<th>#</th>
													<th>نام محصول</th>
													<th>دسته بندی</th>
													<th>مقدار</th>
													<th>قیمت</th>
												</tr>
												<tr>
													<td>1</td>
													<td>کک کلسینه شده</td>
													<td>80 تا 100</td>
													<td><span class="label label-warning">1000 گیلوگرم</span></td>
													<td>250.000.000</td>
												</tr>
											</tbody>
										</table>
									</div>
								</div>
							</div>
						</div>


						<div class="row">
							<h3 class="col-md-12">بدنه فاکتور</h3>
							<div class="item col-md-3">
								<div class="margin-tb input-group-prepend">
									<span class="input-group-text">نام  محصول</span>
								</div>
								<input id="p_name" type="text" name="p_name" placeholder="نام  محصول" class="form-control" required>
							</div>
							<div class="item col-md-3">
								<div class="margin-tb input-group-prepend">
									<span class="input-group-text">دسته بندی</span>
								</div>
								<select class="form-control">
									<option>10 تا 20</option>
									<option>20 تا 30</option>
									<option>30 تا 40</option>
								</select>
							</div>
							<div class="item col-md-3">
								<div class="margin-tb input-group-prepend">
									<span class="input-group-text">مقدار</span>
								</div>
								<input id="p_name" type="text" name="p_name" placeholder="مقدار" class="form-control" required>
							</div>
							<div class="item col-md-3">
								<div class="margin-tb input-group-prepend">
									<span class="input-group-text">قیمت</span>
								</div>
								<input id="p_name" type="text" name="p_name" placeholder="قیمت واحد محصول" class="form-control" required>
							</div>
							<div class="col-md-12 text-center">
								<button type="submit" class="btn btn-success btn-lg" id="_submit" name="r_submit">ثبت ردیف</button>
							</div>
						</div>

						<div style="text-align: center; margin: 20px 0;" class="col-xs-12">
							<?php
								if(isset($_POST['r_submit'])) {

									if(isset($_POST['c_name'])){
										$c_name = $_POST['c_name'];
									}else {
										$c_name = "ندارد";
									}

									if(isset($_POST['c_family'])){
										$c_family = $_POST['c_family'];
									}else {
										$c_family = "ندارد";
									}

									if(isset($_POST['c_company'])){
										$c_company = $_POST['c_company'];
									}else {
										$c_company = "ندارد";
									}

									if(isset($_POST['c_national'])){
										$c_national = $_POST['c_national'];
									}else {
										$c_national = "ندارد";
									}

									if(isset($_POST['c_economic'])){
										$c_economic = $_POST['c_economic'];
									}else {
										$c_economic = "ندارد";
									}

									if(isset($_POST['c_phone'])){
										$c_phone = $_POST['c_phone'];
									}else {
										$c_phone = "ندارد";
									}

									if(isset($_POST['c_fax'])){
										$c_fax = $_POST['c_fax'];
									}else {
										$c_fax = "ندارد";
									}

									if(isset($_POST['c_mobile'])){
										$c_mobile = $_POST['c_mobile'];
									}else {
										$c_mobile = "ندارد";
									}

									if(isset($_POST['c_oaddress'])){
										$c_oaddress = $_POST['c_oaddress'];
									}else {
										$c_oaddress = "ندارد";
									}

									if(isset($_POST['c_faddress'])){
										$c_faddress = $_POST['c_faddress'];
									}else {
										$c_faddress = "ندارد";
									}

									if(isset($_POST['c_email'])){
										$c_email = $_POST['c_email'];
									}else {
										$c_email = "ندارد";
									}

									if($_POST['c_vat'] == "yes"){
										$c_vat = $_POST['c_vat'];
										$c_dvat = $_POST['c_dvat'];
										$c_mvat = $_POST['c_mvat'];
										$c_yvat = $_POST['c_yvat'];
									}else {
										$c_vat = $_POST['c_vat'];
										$c_dvat = "";
										$c_mvat = "";
										$c_yvat = "";
									}

									if(isset($_POST['c_customertype'])){
										$c_customertype = $_POST['c_customertype'];
									}else {
										$c_customertype = "ندارد";
									}

									$sql_c = "insert into customer (c_name, c_family, c_company, c_national, c_economic, c_phone, c_fax, c_mobile, c_oaddress, c_faddress, c_email, c_vat, c_dvat, c_mvat, c_yvat, c_customertype) values ('$c_name', '$c_family', '$c_company', '$c_national', '$c_economic', '$c_phone', '$c_fax', '$c_mobile', '$c_oaddress', '$c_faddress', '$c_email', '$c_vat', '$c_dvat', '$c_mvat', '$c_yvat', '$c_customertype')";
									ex_query($sql_c);
								}
							?>
						</div>
					</div>
				</form>
			</section>
		</div>
	</div>
</div>
<script src="<?php get_url(); ?>product/js/product.js"></script>
 <?php include"../left-nav.php"; include"../footer.php"; ?>
