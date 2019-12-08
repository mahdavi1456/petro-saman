<?php 
    $title = 'گزارش قطعات بازگشتی'; include"../header.php"; include"../nav.php";
	include"functions.php"; ?> 
	<div class="content-wrapper">
	<?php breadcrumb(); ?>
		<section class="content">

				<div class="col-xs-12 no-padd">
					<div class="box">
						<div class="box-header">
							<h3 class="box-title">گزارش قطعات بازگشتی</h3>
						</div>
						<div class="box-body">
							<table id="example1" class="table table-bordered table-striped dataTable">
								<thead>
									<tr>
										<th>ردیف</th>
										<th>مصرفی/ امانتی</th>
                                        <th>شماره آیتم</th>
										<th>مقدار بازگشتی</th>
										<th>تاریخ بازگشتی</th>
                                        <th>وضعیت</th>
										<th>توضیحات</th>
									</tr>
								</thead>
								<tbody>
									<?php
									$i = 1;
									$res1 = get_tools_returned();
									if(count($res1) >0 ) {
										foreach ($res1 as $row) {
											 ?>
											<tr>
												<td><?php echo per_number($i); ?></td>
												<td><?php echo $row['us_type']; ?></td>
												<td><?php echo per_number($row['us_id']); ?></td>
												<td><?php echo per_number(number_format($row['tr_quantity'])); ?></td>
												<td><?php echo per_number(str_replace("-", "/", $row['tr_date'])); ?></td>
                                                <td><?php 
                                                    if($row['us_type']=="مصرفی"){
                                                    	if($row['tr_condition']== 1){ echo "قابل تعمیر"; }   
                                                        else { echo "غیر قابل تعمیر"; } 
                                                    }
                                                    else { echo "---"; } ?>
                                                </td>
                                                <td><?php echo per_number($row['tr_details']); ?></td>
											</tr>
											<?php
											$i++;
										} 
									}?>
								</tbody>
								<tfoot>
									<tr>
									    <th>ردیف</th>
										<th>مصرفی/ امانتی</th>
                                        <th>شماره آیتم</th>
										<th>مقدار بازگشتی</th>
										<th>تاریخ بازگشتی</th>
                                        <th>وضعیت</th>
										<th>توضیحات</th>
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