<?php $title = 'گزارش ارزیابی'; include"../header.php"; include"../nav.php"; ?> 
<div class="content-wrapper">
    <?php breadcrumb(); 
    $aru = new aru();
        ?>
	<section class="content">
		<div class="col-xs-12 no-padd">
			<div class="box">
				<div class="box-header">
					<h3 class="box-title">گزارش ارزیابی</h3>
				</div>
				<div class="box-body">
					<table id="example1" class="table table-bordered table-striped dataTable">
						<thead>
							<tr>
								<th>ردیف</th>
								<th>نام و نام خانوادگی</th>
								<th>دوره</th>
								<th>مجموع امتیاز مدیر</th>
                                <th>مجموع امتیاز منابع انسانی</th>
							</tr>
						</thead>
						<tbody>
							<?php
                            $i = 1;
                            $asb = get_select_query("select DISTINCT pr_fromdate,pr_todate, u_id, pi_id, sum(pr_hr_rate), sum(pr_admin_rate) FROM performance_rates GROUP BY u_id ");
                            if(count($asb) >0 ) {
                                foreach ($asb as $row){
                                    $u_id = $row['u_id'] ;
                                    $user = get_select_query("select * from user where u_id = $u_id ");
                                    ?>
                                    <tr>
                                        <td><?php echo per_number($i); ?></td>
                                        <td><?php echo $user[0]['u_name'] . " " . $user[0]['u_family']; ?></td>
                                        <td><?php echo "از ".per_number($row['pr_fromdate'])." تا ".per_number($row['pr_todate']); ?></td>
                                        <td><?php echo per_number($row['sum(pr_admin_rate)']); ?></td>
                                        <td><?php echo per_number($row['sum(pr_hr_rate)']); ?></td>
                                    <?php
                                    $i++;
								} 
							} ?>
						</tbody>
						<tfoot>
							<tr>
                            <th>ردیف</th>
								<th>نام و نام خانوادگی</th>
								<th>دوره</th>
                                <th>مجموع امتیاز مدیر</th>
                                <th>مجموع امتیاز منابع انسانی</th>
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
				"searching": false,
				"ordering": false,
				"info": true,
				"autoWidth": false
			});
	  	});
	</script>
<?php include"../left-nav.php"; include"../footer.php"; ?>