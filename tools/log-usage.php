<?php $title = 'گزارش قطعات'; include"../header.php"; include"../nav.php"; include"functions.php"; ?> 
<div class="content-wrapper">
	<?php breadcrumb(); ?>
	<section class="content">
		<div class="col-xs-12 no-padd">
			<div class="box">
				<div class="box-header">
					<h3 class="box-title">کاردکس</h3>
				</div>
				<div class="box-body">
					<table id="example1" class="table table-bordered table-striped dataTable text-center">
						<thead>
							<tr>
								<th>ردیف</th>
								<th>کد قطعه</th>
								<th>نام قطعه</th>
								<th>موجودی انبار</th>
								<th>امانتی</th>
								<th>مصرفی</th>
							</tr>
						</thead>
						<tbody>
							<?php
							$i = 1;
							$res1 = get_tools();
							if(count($res1) >0 ) {
								foreach ($res1 as $row) {
									$usage_tools = get_usage_tools($row['t_id']);
									$trustee_tools = get_trustee_tools($row['t_id']);
									$stock = get_stock($row['t_id']);
									//$stock = 0;
									?>
									<tr>
										<td><?php echo per_number($i); ?></td>
										<td><?php echo per_number($row['t_id']); ?></td>
										<td><?php echo per_number($row['t_name']); ?></td>
										<td><?php echo per_number(number_format($stock)); ?></td>
										<td><?php echo per_number(number_format($trustee_tools)); ?></td>
										<td><?php echo per_number(number_format($usage_tools)); ?></td>
									</tr>
									<?php
									$i++;
								} 
							} ?>
						</tbody>
						<tfoot>
							<tr>
								<th>ردیف</th>
								<th>کد قطعه</th>
								<th>نام قطعه</th>
								<th>موجودی انبار</th>
								<th>امانتی</th>
								<th>مصرفی</th>
							</tr>
						</tfoot>
					</table>
				</div>
			</div>
		</div>
	</section>
</div>
	<div class="control-sidebar-bg"></div>
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
			$('#example1').DataTable({
				"paging": true,
				"lengthChange": false,
				"searching": true,
				"ordering": true,
				"info": true,
				"autoWidth": false
			});
	  	});
	</script>
<?php include"../left-nav.php"; include"../footer.php"; ?>