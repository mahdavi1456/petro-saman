<?php $title = 'ویرایش کاربر'; include"../header.php"; include"../nav.php";
	$u_id = $_GET['u_id'];
	$row = select_a_user($u_id);
?>  
	<div class="content-wrapper">

		<section class="content-header">
		  <ol class="breadcrumb">
			<li><a href="<?php get_url(); ?>index.php"><i class="fa fa-dashboard"></i> خانه</a></li>
			<li><a href="#">کاربران</a></li>
			<li class="active">ویرایش کاربر</li>
		  </ol>
		</section>

		<section class="content-header">
			<h1>مشاهده کاربر</h1>
		</section>

		<section class="content">
			<div class="row">
				<div class="col-xs-12">
			  		<div class="box">
						<div class="box-header">
				  			<h3 class="box-title">مکشاهده و ویرایش کاربر</h3>
						</div>
						<div class="box-body">
							<form action="" method="post">
								<div id="details" class="col-xs-12">
									<div class="row">
										<div class="item col-md-4">
											<div class="margin-tb input-group-prepend">
												<span class="input-group-text">نام</span>
												<?php var_dump($row); ?>
											</div>
											<input type="text" name="u_name" placeholder="نام" class="form-control" value="<?php echo $row['u_name']; ?>">
										</div>
										<div class="item col-md-4">
											<div class="margin-tb input-group-prepend">
												<span class="input-group-text">نام خانوادگی</span>
											</div>
											<input type="text" name="u_family" placeholder="نام خانوادگی" class="form-control" value="<?php echo $row[0]['u_family']; ?>">
										</div>
										<div class="item col-md-4">
											<div class="margin-tb input-group-prepend">
												<span class="input-group-text">سطح دسترسی</span>
											</div>
											<select name="u_level" class="form-control">
												<option value="<?php echo $row[0]['u_level']; ?>"></option>
												<option>مدیر</option>
												<option>فروش</option>
												<option>مالی</option>
												<option>انبار</option>
											</select>
										</div>
										<div class="item col-md-6">
											<div class="margin-tb input-group-prepend">
												<span class="input-group-text">نام خانوادگی</span>
											</div>
											<input type="text" name="u_username" placeholder="نام کاربری" class="form-control" value="<?php echo $row[0]['u_username']; ?>">
										</div>
										<div class="item col-md-6">
											<div class="margin-tb input-group-prepend">
												<span class="input-group-text">نام خانوادگی</span>
											</div>
											<input type="text" name="u_password" placeholder="رمز ورود" class="form-control" value="<?php echo $row[0]['u_password']; ?>">
										</div>
										<div class="item col-md-4">
											<button type="submit" class="btn btn-success btn-lg" name="u_sub">ویرایش</button>
										<?php 
										if(isset($_POST['u_sub'])) {
											$array = array();
											array_push($array, $_GET['u_id']);
											array_push($array, $_POST['u_name']);
											array_push($array, $_POST['u_family']);
											array_push($array, $_POST['u_level']);
											array_push($array, $_POST['u_username']);
											array_push($array, $_POST['u_password']);
											update_user($array);
											echo "<meta http-equiv='refresh' content='0'/>";
										}
										?>
										</div>
									</div>
								</div>
							</form>
						</div><!-- /.box-body -->
			  		</div><!-- /.box -->
				</div><!-- /.col -->
		  	</div><!-- /.row -->
		</section><!-- /.content -->
	</div><!-- /.content-wrapper -->
	<div class="control-sidebar-bg"></div>
	</div><!-- ./wrapper -->

	<script src="../plugins/datatables/jquery.dataTables.min.js"></script>
	<script src="../plugins/datatables/dataTables.bootstrap.min.js"></script>
	
	<script>
		$(function () {
			$("#example1").DataTable();
			$('#example2').DataTable({
		  		"paging": true,
		  		"lengthChange": false,
		  		"searching": false,
		  		"ordering": true,
		  		"info": true,
		  		"autoWidth": false
			});
	  	});
	</script>
<?php include"../left-nav.php"; include"../footer.php"; ?>