<?php $title = 'تاریخچه فاکتور ها'; include"../header.php"; include"../nav.php";
	$user = new user(); ?> 
	<div class="content-wrapper">
	<?php breadcrumb("" , "factor/list-factor.php"); ?>
		<section class="content">

				<div class="col-xs-12 no-padd">
					<div class="box">
						<div class="box-body">
							<table id="example1" class="table table-bordered table-striped dataTable">
								<thead>
									<tr>
										<th>ردیف</th>
										<th>کاربر</th>
										<th>زمان انجام عملیات</th>
										<th>ردیف فاکتور</th>
										<th>توضیحات</th>
										<th>عملیات</th>
									</tr>
								</thead>
								<tbody>
									<?php
									$u_level = $user->get_current_user_level();
									$i = 1;
									if(isset($_GET['fb_id'])){
										$fb_id = $_GET['fb_id'];
										$res = get_select_query (	$sql = "select * from factor_log inner join factor_body on factor_body.fb_id = factor_log.fb_id inner join user on user.u_id = factor_log.u_id where factor_log.fb_id = $fb_id order by factor_log.l_id desc");
									}
									else {
										$res = list_factor_log_factor();
									}
									foreach ($res as $row) { ?>
									<tr>
										<td><?php echo per_number($i); ?></td>
										<td><?php echo $row['u_name'] . " " . $row['u_family']; ?></td>
										<td><?php echo per_number($row['l_date']); ?></td>
										<td><?php echo per_number($row['fb_id']); ?></td>
										<td><?php if($row['l_details'] == "") { echo "(بدون توضیح)"; } else { echo $row['l_details']; } ?></td>
										<td>
											<form action="" method="post" onSubmit="if(!confirm('آیا از انجام این عملیات اطمینان دارید؟')){return false;}">
											<?php 
											if($u_level=="مدیریت"){ ?>
												<button class="btn btn-danger btn-xs" type="submit" name="delete-list" id="delete-list">حذف</button>
											<?php }
											else {?>
												<button class="btn btn-danger btn-xs" type="submit" disabled>حذف</button>
											<?php }?>
												<input class="hidden" type="text" name="delete-text" id="delete-text" value="<?php echo $row['l_id']; ?>">
												<?php
												if(isset($_POST['delete-list'])){
													$l_id = $_POST['delete-text'];
													delete_factor_log_factor($l_id);
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
										<th>ردیف</th>
										<th>کاربر</th>
										<th>زمان انجام عملیات</th>
										<th>ردیف فاکتور</th>
										<th>توضیحات</th>
										<th>عملیات</th>
									</tr>
								</tfoot>
							</table>
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