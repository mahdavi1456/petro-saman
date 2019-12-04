<?php $title = 'تاریخچه فاکتور ها'; include"../header.php"; include"../nav.php";
	
?> 
	<div class="content-wrapper">
		<section class="content-header">
			<ol class="breadcrumb">
				<li><a href="<?php get_url(); ?>index.php"><i class="fa fa-dashboard"></i> خانه</a></li>
				<li><a href="#">فاکتور </a></li>
				<li class="active">تاریخچه فاکتور ها</li>
			</ol>
		</section>
		
		<section class="content-header">
			<div id="page-wrapper">
				<div class="row">
					<div class="col-lg-12">
						<h1 class="page-header">لیست تاریخچه فاکتور ها</h1>
					</div>
				</div>
			</div>
		</section>

		<section class="content">
			<div class="row">
				<div class="col-xs-12">
					<div class="box">
						<div class="box-body">
							<table id="example1" class="table table-bordered table-striped">
								<thead>
									<tr>
										<th>#</th>
										<th>کد تاریخچه</th>
										<th>نام و نام خانوادگی کاربر</th>
										<th>زمان انجام عملیات</th>
										<th>شماره فاکتور</th>
										<th>توضیحات تاریخچه</th>
										<th>عملیات</th>
									</tr>
								</thead>
								<tbody>
									<?php
									$i = 1;
									$res = list_factor_log();
									foreach ($res as $row) { ?>
									<tr>
										<td><?php echo $i; ?></td>
										<td><?php echo $row['l_id']; ?></td>
										<td><?php echo $row['u_name'] . " " . $row['u_family']; ?></td>
										<td><?php echo $row['l_date']; ?></td>
										<td><?php echo $row['f_id']; ?></td>
										<td><?php if($row['l_details'] == "") { echo "(بدون توضیح)"; } else { echo $row['l_details']; } ; ?></td>
										<td>
											<form action="" method="post" onSubmit="if(!confirm('آیا از انجام این عملیات اطمینان دارید؟')){return false;}">
												&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
												<button class="btn btn-danger" type="submit" name="delete-list" id="delete-list">حذف</button>
												<input class="hidden" type="text" name="delete-text" id="delete-text" value="<?php echo $row['l_id']; ?>">
												<?php
												if(isset($_POST['delete-list'])){
													$l_id = $_POST['delete-text'];
													delete_factor_log($l_id);
													echo "<meta http-equiv='refresh' content='0'/>";
													exit();
												}
												?>
											</form>
										</td>
									</tr>
									<?php
										$i++;
									} ?>
								</tbody>
								<tfoot>
									<tr>
										<th>#</th>
										<th>کد تاریخچه</th>
										<th>کد کاربر</th>
										<th>تاریخ انجام عملیات</th>
										<th>ساعت انجام عملیات</th>
										<th>شماره فاکتور</th>
										<th>توضیحات تاریخچه</th>
										<th>عملیات</th>
									</tr>
								</tfoot>
							</table>
						</div>
					</div>
				</div>
			</div>
		</section>
	</div>
	<div class="control-sidebar-bg"></div>

	<!-- jQuery 2.1.4 -->
	<script src="<?php get_url(); ?>/plugins/jQuery/jQuery-2.1.4.min.js"></script>
	<!-- Bootstrap 3.3.4 -->
	<script src="<?php get_url(); ?>/bootstrap/js/bootstrap.min.js"></script>
	<!-- DataTables -->
	<script src="<?php get_url(); ?>/plugins/datatables/jquery.dataTables.min.js"></script>
	<script src="<?php get_url(); ?>/plugins/datatables/dataTables.bootstrap.min.js"></script>
	<!-- SlimScroll -->
	<script src="<?php get_url(); ?>/plugins/slimScroll/jquery.slimscroll.min.js"></script>
	<!-- FastClick -->
	<script src="<?php get_url(); ?>/plugins/fastclick/fastclick.min.js"></script>
	<!-- AdminLTE App -->
	<script src="<?php get_url(); ?>/dist/js/app.min.js"></script>
	<!-- AdminLTE for demo purposes -->
	<script src="<?php get_url(); ?>/dist/js/demo.js"></script>
	<!-- page script -->
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