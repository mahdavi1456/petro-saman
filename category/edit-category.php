<?php $title = "ثبت مشتری"; include"../header.php"; include"../nav.php";
	$cat_id = $_GET['id'];
	$cat_name = a_category($cat_id);
?>
<div class="wrapper">
	<div class="content-wrapper">
		<div class="container">
		  <!-- Content Header (Page header) -->
			<section class="content-header">
				<div id="page-wrapper">
					<div class="row">
						<div class="col-lg-12">
							<h1 class="page-header">ویرایش دسته بندی </h1>
						</div>
					 	<!-- /.col-lg-12 -->
					</div>
				</div>
				<ol class="breadcrumb">
					<li><a href="<?php get_url(); ?>index.php"><i class="fa fa-dashboard"></i> خانه</a></li>
					<li><a href="#">دسته بندی </a></li>
					<li class="active">ویرایش دسته بندی</li>
				</ol>
			</section>
			<!-- Main content -->
			<section class="content">
				<form action="" method="post">
					<div id="details" class="col-xs-12">
						<div class="row">
							<div class="item col-md-4">
								<div class="margin-tb input-group-prepend">
									<span class="input-group-text">شماره دسته بندی: </span>
									<span>  <?php echo $cat_id; ?></span>
								</div>
							</div>
							<div class="item col-md-4">
								<div class="margin-tb input-group-prepend">
									<span class="input-group-text">نام دسته بندی</span>
								</div>
								<input id="cat_name" type="text" name="cat_name" placeholder="نام دسته بندی" class="form-control" value="<?php echo $cat_name[0]['cat_name']; ?>">
							</div>
							<div class="item col-md-4">
								<form action="" method="post">
									<button type="submit" class="btn btn-success btn-lg" id="cat_update" name="cat_update">ذخیره</button>
									<?php 
										if(isset($_POST['cat_update'])) {

											if(isset($_POST['cat_name'])){
												$cat_name = $_POST['cat_name'];
												update_category($cat_id,$cat_name);
												echo "<meta http-equiv='refresh' content='0'/>";
											}
										}
									?>
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