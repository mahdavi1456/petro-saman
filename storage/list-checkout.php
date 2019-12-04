<?php include"../header.php"; include"../nav.php";
	require_once"../customer/functions.php";
	$res = list_checkout();

	if(isset($_POST['verify_admin'])) {
		$bar_id = $_POST['verify_admin'];
		verify_admin_bar($bar_id);
		echo "<meta http-equiv='refresh' content='0'/>";
	}
?>
<div class="content-wrapper">

	<?php breadcrumb("تایید بار"); ?>

	<section class="content">
		<div class="row">
			<div class="col-xs-12">
				<div class="box">
					<div class="box-body">
						<table id="example1" class="table table-bordered table-striped">
							<thead>
								<tr>
									<th>#</th>
									<th>شماره ردیف فاکتور</th>
									<th>نوع فاکتور</th>
									<th>مشتری</th>
									<th>راننده</th>
									<th>وزن بار</th>
									<th>تاریخ و زمان</th>
									<th>تایید مدیریت</th>
								</tr>
							</thead>
							<tbody>
							<?php
							$i = 1;

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
									<td><?php
									if($row['bar_verify_admin'] == 0) {
									?>
										<form action="" method="post" onSubmit="if(!confirm('آیا از انجام این عملیات اطمینان دارید؟')){return false;}">
											<button class="btn btn-success btn-xs" type="submit" name="verify_admin" id="verify_admin" value="<?php echo $row['bar_id'] ?>">تایید مدیریت</button>
										</form>
									<?php
									} else { ?>
										<button class="btn btn-success btn-xs disabled">تایید شده</button>
									<?php }
									?>
									</td>
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
									<th>تایید مدیریت</th>
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
