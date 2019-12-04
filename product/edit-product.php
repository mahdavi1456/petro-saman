<?php $title = "ویرایش محصول"; include"../header.php"; include"../nav.php";
	$p_id = $_GET['id'];
	$product_name = a_product($p_id);
?>
<div class="wrapper">
	<div class="content-wrapper">
		<div class="container">
		  <!-- Content Header (Page header) -->
			<section class="content-header">
				<div id="page-wrapper">
					<div class="row">
						<div class="col-lg-12">
							<h1 class="page-header">ویرایش محصول</h1>
						</div>
					 	<!-- /.col-lg-12 -->
					</div>
				</div>
				<ol class="breadcrumb">
					<li><a href="<?php get_url(); ?>index.php"><i class="fa fa-dashboard"></i> خانه</a></li>
					<li><a href="#">کحصولات</a></li>
					<li class="active">ویرایش محصول</li>
				</ol>
			</section>
			<!-- Main content -->
			<section class="content">
				<form action="list-product.php" method="post">
					<div id="details" class="col-xs-12">
						<div class="row">
							<div class="item col-md-4">
								<div class="margin-tb input-group-prepend">
									<span class="input-group-text">شماره محصول</span>
									<span><?php echo $p_id; ?></span>
								</div>
							</div>
							<div class="item col-md-4">
								<div class="margin-tb input-group-prepend">
									<span class="input-group-text">نام محصول</span>
								</div>
								<input type="text" name="p_id" id="p_id" class="hidden" value="<?php echo $p_id; ?>">
								<input id="p_name" type="text" name="p_name" placeholder="نام محصول" class="form-control" value="<?php echo $product_name[0]['p_name']; ?>">
							</div>
							<div class="item col-md-4">
								<div class="margin-tb input-group-prepend">
									<span class="input-group-text">کد دسته بندی</span>
								</div>
								<input id="p_cat" type="text" name="p_cat" placeholder="کد دسته بندی" class="form-control" value="<?php echo $product_name[0]['cat_id']; ?>">
							</div>
							<div class="item col-md-4">
								<div class="margin-tb input-group-prepend">
									<span class="input-group-text">واحد کالا</span>
								</div>
								<input id="p_unit" type="text" name="p_unit" placeholder="واحد کالا" class="form-control" value="<?php echo $product_name[0]['p_unit']; ?>">
							</div>
							<div class="item col-md-4">
								<form action="" method="post">
									<button type="submit" class="btn btn-success btn-lg" id="p_update" name="p_update">ذخیره</button>
								</form>
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