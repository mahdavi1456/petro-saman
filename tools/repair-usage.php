<?php $title = 'تعمیر قطعات'; include"../header.php"; include"../nav.php"; include"functions.php"; 
    if(isset($_POST['add-tools_repairs'])) {
        $us_id = $_POST['us_id'];
        $r_notrepaired = get_var_query("select r_notrepaired from tools_repairs where us_id = $us_id ");
        $r_repaired = $_POST['r_repaired'];
        if($r_notrepaired < $r_repaired)
        {
			?>
			<script>
				alertify.set('notifier','position', 'bottom-right');
 				alertify.error('مقدار وارد شده مجاز نمی باشد');
			</script>
			<?php
            echo '<meta http-equiv="refresh" content="2"/>';
        }
        else{
            $r_repaired_old = get_var_query("select r_repaired from tools_repairs where us_id = $us_id ");
            $r_repaired_new = $r_repaired_old + $r_repaired;
            $r_notrepaired_new = $r_notrepaired - $r_repaired;
            $res2 = ex_query("update tools_repairs set r_repaired = '$r_repaired_new' , r_notrepaired = '$r_notrepaired_new' where us_id = $us_id");
        }
    }
    ?> 
<div class="content-wrapper">
	<?php breadcrumb(); ?>
    <section class="content pd-btm">
		<section class="box box-info">
            <div class="box-header">
				<h3 class="box-title">ثبت درخواست تعمیر</h3>
			</div>
			<div class="box-body pd-btm pd-top">
				<form action="" method="post">
					<div id="details" class="col-xs-12 no-padd">
						<div class="row">
							<div class="item col-md-6">
								<div class="margin-tb input-group-prepend">
									<span class="input-group-text">کد آیتم</span>
								</div>
								<select class="form-control" id="us_id" name="us_id">
                                	<?php
                                    $res = get_select_query("select * from tools_repairs where r_notrepaired<>0 ");
                                    if(count($res) >0){
                                        foreach($res as $row){ ?>
                                        <option value="<?php echo $row['us_id']; ?>"><?php echo $row['us_id']; ?></option>
                                        <?php
                                       	}
                                    }
                                    ?>
								</select>
							</div>
							<div class="item col-md-6">
								<div class="margin-tb input-group-prepend">
									<span class="input-group-text">مقدار تعمیری</span>
								</div>
                                <input id="r_repaired" type="text" name="r_repaired" placeholder="مقدار تعمیری" class="form-control">
							</div>
							<div class="item col-md-2 text-left">
								<input type="submit" class="btn btn-success" name="add-tools_repairs" value="اضافه کردن" style="width:100%;">
							</div>
						</div>
					</div>
				</form>
			</div>
		</section>
	</section>
	
	<section class="content">
		<div class="col-xs-12 no-padd">
			<div class="box">
				<div class="box-header">
					<h3 class="box-title">لیست درخواست های تعمیر</h3>
				</div>
				<div class="box-body">
					<table id="example1" class="table table-bordered table-striped dataTable">
						<thead>
							<tr>
								<th>ردیف</th>
								<th>نام قطعه</th>
                                <th>شماره آیتم</th>
								<th>مقدار تعمیر شده</th>
								<th>مقدار تعمیر نشده</th>
							</tr>
						</thead>
						<tbody>
						<?php
							$i = 1;
                            $res1 = get_select_query("select * from tools_repairs tr inner join usage_tools ut on tr.us_id = ut.us_id inner join tools t on ut.t_id=t.t_id  order by tr.r_id DESC ");
							if(count($res1) >0 ) {
								foreach ($res1 as $row) { ?>
								<tr>
									<td><?php echo per_number($i); ?></td>
									<td><?php echo $row['t_name']; ?></td>
									<td><?php echo per_number($row['us_id']); ?></td>
									<td><?php echo per_number(number_format($row['r_repaired'])); ?></td>
									<td><?php echo per_number(number_format($row['r_notrepaired'])); ?></td>
								</tr>
								<?php
								$i++;
								} 
							} ?>
						</tbody>
						<tfoot>
							<tr>
                             	<th>ردیف</th>
								<th>نام قطعه</th>
                                <th>شماره آیتم</th>
								<th>مقدار تعمیر شده</th>
								<th>مقدار تعمیر نشده</th>
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