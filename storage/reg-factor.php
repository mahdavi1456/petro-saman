<?php $title = "ثبت فاکتور جدید"; include"../header.php"; include"../nav.php";
include"back.php";
require_once"../customer/functions.php";
require_once"../product/functions.php";
require_once"../category/functions.php";
?>
<script type="text/javascript" src="<?php get_url(); ?>/factor/js/factor.js"></script>
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
			<section class="content">
				<div id="details" class="col-xs-12">	
					<?php
					if(isset($_POST['set_fb'])){
						$f_id = $_GET['f_id'];
						$p_id = $_POST['p_id'];
						$cat_id = $_POST['cat_id'];
						$fb_quantity = $_POST['fb_quantity'];
						$fb_price = $_POST['fb_price'];
						$array = array();
						array_push($array, $f_id);
						array_push($array, $p_id);
						array_push($array, $cat_id);						
						array_push($array, $fb_quantity);
						array_push($array, $fb_price);
						insert_factor_body($array);
						?>
						<div class="alert alert-success">
							ردیف کالا با موفقیت ثبت شد
						</div>
						<?php
					}
						
					if(isset($_POST['f_submit'])){
						$c_id = $_POST['c_id'];
						$f_date = $_POST['f_date'];
						$u_id = 1;
						$list = array();
						array_push($list, $c_id);
						array_push($list, $f_date);
						array_push($list, $u_id);
						$f_id = insert_factor($list);
						$url = get_url() . "reg-factor.php?f_id=" . $f_id;
						?>
						<script type="text/javascript">
							window.location.href = "<?php echo $url; ?>";
						</script>
					<?php
					}
					
					if(isset($_GET['f_id'])){
						$f_id = $_GET['f_id'];
						$list = get_select_query("select * from factor where f_id = $f_id");
						$f_date = $list[0]['f_date'];
						$c_id = $list[0]['c_id'];
					} else {
						$f_date = "";
						$c_id = "";
					}						
					?>
					<form action="" method="post">
						<div class="row">
							<h3 class="col-md-12">سرفاکتور</h3>
							<div class="item col-md-4">
								<div class="margin-tb input-group-prepend">
									<span class="input-group-text">نام  مشتری</span>
									<?php show_customer_as_select($c_id); ?>
								</div>
							</div>
							<div class="item col-md-4">
								<div class="margin-tb input-group-prepend">
									<span class="input-group-text">تاریخ صدور</span>
								</div>	
								<input value="<?php echo $f_date; ?>" autocomplete="off" type="text" id="f_date" name="f_date" placeholder="تاریخ صدور" class="form-control" required>
							</div>
							<div class="col-md-12 text-center">
								<button type="submit" class="btn btn-success btn-lg" name="f_submit">ساخت سر فاکتور</button>
							</div>
						</div><br>
					</form>
					
					<?php
					if(isset($_GET['f_id'])){
						$f_id = $_GET['f_id']; ?>
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
											<?php
											$i = 1;
											$list = get_factor_body($f_id);
											if(count($list)){
												foreach($list as $l){
													?>
													<tr>                   
														<td><?php echo $i; ?></td>
														<td><?php echo $l['p_id']; ?></td>
														<td><?php echo $l['cat_id']; ?></td>
														<td><span class="label label-warning"><?php echo $l['fb_quantity']; ?></span></td>
														<td><?php echo $l['fb_price']; ?></td>
													</tr>
													<?php
													$i++;
												}
											} else {
												?>
												<tr>                   
													<td colspan="5" class="text-center">موردی جهت نمایش موجود نیست</td>
												</tr>
												<?php												
											}
											?>
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
					
					<form action="" method="post">
					<div class="row">
						<h3 class="col-md-12">بدنه فاکتور</h3>
						<div class="item col-md-3">
							<div class="margin-tb input-group-prepend">
								<span class="input-group-text">نام  محصول</span>
							</div>
							<?php show_product_as_select(); ?>
						</div>
						<div class="item col-md-3">
							<div class="margin-tb input-group-prepend">
								<span class="input-group-text">دسته بندی</span>
							</div>
							<?php show_category_as_select(); ?>
							
							<div id="cat_id_result"></div>
						</div>
						<div class="item col-md-3">
							<div class="margin-tb input-group-prepend">
								<span class="input-group-text">مقدار</span>
							</div>
							<input type="text" name="fb_quantity" placeholder="مقدار" class="form-control" required>
						</div>
						<div class="item col-md-3">
							<div class="margin-tb input-group-prepend">
								<span class="input-group-text">قیمت</span>
							</div>
							<input type="text" name="fb_price" placeholder="قیمت واحد محصول" class="form-control" required>
						</div>
						<div class="col-md-12 text-center">
							<button type="submit" class="btn btn-success btn-lg" name="set_fb">ثبت ردیف</button>
						</div>
					</div>
					</form>
					
					
					
					<?php
					} ?>
				</div>
			</section>
		</div>
	</div>
</div>
<?php include"../left-nav.php"; include"../footer.php"; ?>