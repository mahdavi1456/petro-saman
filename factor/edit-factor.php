<?php $title = "مشاده فاکتور"; include"../header.php"; include"../nav.php";
	$fb_id = $_GET['fb_id'];
	$res = select_a_factor($fb_id);
?>
<div class="wrapper">
	<div class="content-wrapper">
		<div class="container">
		  <!-- Content Header (Page header) -->
			<section class="content-header">
				<div id="page-wrapper">
					<div class="row">
						<div class="col-lg-12">
							<h1 class="page-header">مشاهده فاکتور</h1>
						</div>
					 	<!-- /.col-lg-12 -->
					</div>
				</div>
				<ol class="breadcrumb">
					<li><a href="<?php get_url(); ?>index.php"><i class="fa fa-dashboard"></i> خانه</a></li>
					<li><a href="#">فاکتور</a></li>
					<li class="active">مشاهده فاکتور</li>
				</ol>
			</section>
			<!-- Main content -->
			<section class="content">
				<form action="list-factor.php" method="post">
					<div id="details" class="col-xs-12">
						<div class="row">
							<div class="item col-md-4">
								<div class="margin-tb input-group-prepend">
									<span class="input-group-text">نام مشتری</span>
									<span>  <?php echo $asd[0]['c_name']; ?></span>
								</div>
							</div>
							<div class="item col-md-4">
								<div class="margin-tb input-group-prepend">
									<span class="input-group-text">نام محصول: </span>
									<span>  <?php echo $asd[0]['p_name']; ?></span>
								</div>
							</div>
							<div class="item col-md-4">
								<div class="margin-tb input-group-prepend">
									<span class="input-group-text">دسته بندی: </span>
									<span>  <?php echo $asd[0]['cat_name']; ?></span>
								</div>
							</div>
							<div class="item col-md-4">
								<div class="margin-tb input-group-prepend">
									<span class="input-group-text">مقدار: </span>
									<span>  <?php echo $asd[0]['fb_quantity']; ?></span>
								</div>
							</div>
							<div class="item col-md-4">
								<div class="margin-tb input-group-prepend">
									<span class="input-group-text">مبلغ: </span>
									<span>  <?php echo $asd[0]['fb_price']; ?></span>
								</div>
							</div>
							<div class="item col-md-4">
									<button type="submit" class="btn btn-success btn-lg" id="f_update" name="f_update">ذخیره</button>
							</div>
						</div>
						<div style="text-align: center; margin: 20px 0;" class="col-xs-12">
							
						</div>
					</div>
				</form>
			</section><!-- /.content -->
		</div><!-- /.container -->
	</div><!-- /.content-wrapper -->
</div><!-- ./wrapper -->
<script src="<?php get_url(); ?>customers/js/customers.js"></script>
 <?php include"../left-nav.php"; include"../footer.php"; ?>