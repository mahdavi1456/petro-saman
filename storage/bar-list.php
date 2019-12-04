<?php include"../header.php"; include"../nav.php";
	require_once"../customer/functions.php";
?> 
<div class="content-wrapper">
	
	<?php breadcrumb("لیست بارها"); ?>

	<section class="content">
		<div class="row">
			<div class="col-xs-12">
				<div class="box">
					<div class="box-body">
						<h3>لیست بار های فروخته شده</h3>
						<table id="example1" class="table table-bordered table-striped">
							<thead>
								<tr>
									<th>#</th>
									<th>شماره فاکتور</th>
									<th>نوع فاکتور</th>
									<th>مشتری</th>
									<th>راننده</th>
									<th>وزن بار</th>
									<th>تاریخ و زمان</th>
								</tr>
							</thead>
							<tbody>
							<?php
							$i = 1;
								$res = bar_list_sale();
								foreach ($res as $row) {
									$fb_id = $row['fx_id'];
									?>
								<tr>
									<td><?php echo per_number($i); ?></td>
									<td><?php echo per_number($row['fx_id']); ?></td>
									<td><?php if($row['fx_type'] == 1) { echo "خرید"; } else { echo "فروش"; } ?></td>
									<td><?php echo get_customer_name_fx($row['fx_id'], $row['fx_type']); ?></td>
									<td><?php echo get_driver_name_fx($row['fx_id'], $row['fx_type']); ?></td>
									<td><?php echo per_number(number_format($row['bar_quantity'])); ?></td>
									<td><?php echo per_number($row['bar_time']); ?></td>
								</tr>
								<?php
									$i++;
								} ?>
							</tbody>
							<tfoot>
								<tr>
									<th>#</th>
									<th>شماره فاکتور</th>
									<th>نوع فاکتور</th>
									<th>مشتری</th>
									<th>راننده</th>
									<th>وزن بار</th>
									<th>تاریخ و زمان</th>
								</tr>
							</tfoot>
						</table>
					</div>
				</div>
			</div>
		</div>
	</section>


	<section class="content">
		<div class="row">
			<div class="col-xs-12">
				<div class="box">
					<div class="box-body">
						<h3>لیست بار های خریداری شده</h3>
						<table id="example2" class="table table-bordered table-striped">
							<thead>
								<tr>
									<th>#</th>
									<th>شماره فاکتور</th>
									<th>نوع فاکتور</th>
									<th>مشتری</th>
									<th>راننده</th>
									<th>وزن بار</th>
									<th>تاریخ و زمان</th>
								</tr>
							</thead>
							<tbody>
							<?php
							$i = 1;
								$res = bar_list_buy();
								foreach ($res as $row) {
									$fb_id = $row['fx_id'];
									?>
								<tr>
									<td><?php echo per_number($i); ?></td>
									<td><?php echo per_number($row['fx_id']); ?></td>
									<td><?php if($row['fx_type'] == 1) { echo "خرید"; } else { echo "فروش"; } ?></td>
									<td><?php echo get_customer_name_fx($row['fx_id'], $row['fx_type']); ?></td>
									<td><?php echo get_driver_name_fx($row['fx_id'], $row['fx_type']); ?></td>
									<td><?php echo per_number(number_format($row['bar_quantity'])); ?></td>
									<td><?php echo per_number($row['bar_time']); ?></td>
								</tr>
								<?php
									$i++;
								} ?>
							</tbody>
							<tfoot>
								<tr>
									<th>#</th>
									<th>شماره فاکتور</th>
									<th>نوع فاکتور</th>
									<th>مشتری</th>
									<th>راننده</th>
									<th>وزن بار</th>
									<th>تاریخ و زمان</th>
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

<script src="<?php get_url(); ?>/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php get_url(); ?>/plugins/datatables/dataTables.bootstrap.min.js"></script>
<script type="text/javascript">
	$(function () {
		$("#example1").DataTable({
			"paging": true,
			"lengthChange": true,
			"searching": true,
			"ordering": true,
			"info": true,
			"autoWidth": false
		});
		$('#example2').DataTable({
			"paging": true,
			"lengthChange": true,
			"searching": true,
			"ordering": true,
			"info": true,
			"autoWidth": false
		});
	});
</script>
<?php include"../left-nav.php"; include"../footer.php"; ?>