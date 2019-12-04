<?php $title = "ویرایش موجودی"; include"../header.php"; include"../nav.php";
	$s_id = $_GET['id'];
	$stock_name = a_stock($s_id);
?>
<div class="wrapper">
	<div class="content-wrapper">
		<div class="container">
		  <!-- Content Header (Page header) -->
			<section class="content-header">
				<div id="page-wrapper">
					<div class="row">
						<div class="col-lg-12">
							<h1 class="page-header">ویرایش موجودی</h1>
						</div>
					 	<!-- /.col-lg-12 -->
					</div>
				</div>
				<ol class="breadcrumb">
					<li><a href="<?php get_url(); ?>index.php"><i class="fa fa-dashboard"></i> خانه</a></li>
					<li><a href="#">موجودی</a></li>
					<li class="active">ویرایش موجودی</li>
				</ol>
			</section>
			<!-- Main content -->
			<section class="content">
				<form action="list-stock.php" method="post">
					<div id="details" class="col-xs-12">
						<div class="row">
							<div class="item col-md-4">
								<div class="margin-tb input-group-prepend">
									<span class="input-group-text">شماره موجودی: </span>
									<span>  <?php echo $s_id; ?></span>
								</div>
							</div>
							<input type="text" name="s_id" id="s_id" class="hidden" value="<?php echo $s_id; ?>">
							<div class="item col-md-4">
								<div class="margin-tb input-group-prepend">
									<span class="input-group-text">کد محصول</span>
								</div>
								<input id="p_id" type="text" name="p_id" placeholder="کد محصول" class="form-control" value="<?php echo $stock_name[0]['p_id']; ?>">
							</div>
							<div class="item col-md-4">
								<div class="margin-tb input-group-prepend">
									<span class="input-group-text">مقدار</span>
								</div>
								<input id="s_amount" type="text" name="s_amount" placeholder="مقدار" class="form-control" value="<?php echo $stock_name[0]['s_amount']; ?>">
							</div>
							<div class="item col-md-4">
								<form action="" method="post">
									<button type="submit" class="btn btn-success btn-lg" id="s_update" name="s_update">ذخیره</button>
									<?php 
										
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