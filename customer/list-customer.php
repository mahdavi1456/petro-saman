<?php include"../header.php"; include"../nav.php";
	$aru = new aru();
	if(isset($_GET['action']) && $_GET['action']=="expire"){
		$asb = list_customer_expire();
	}else if(isset($_GET['action']) && $_GET['action']=="customer"){
		$asb = list_just_customer();
	}else{
		$asb = $aru->get_list('customer','c_id');
	}
	?>
	<div class="content-wrapper">
		<?php breadcrumb("مدیریت حساب ها"); ?>
		<section class="content">
			<div class="row">
				<div class="col-xs-12">
					<div class="box">
						<div class="box-header">
							<h3 class="box-title">مدیریت حساب ها</h3>
						</div>
						<div class="box-header">
							<a href="<?php echo get_url(); ?>customer/new-customer.php" class="btn btn-sm btn-primary">ثبت حساب</a>
						</div>
						<div class="box-body">
							<table id="example1" class="table table-bordered table-striped">
								<thead>
									<tr>
										<th>ردیف</th>
										<th>کد حساب</th>
										<th>نوع حساب</th>
										<th>نام شرکت</th>
										<th>نام و نام خانوادگی</th>
										<th>اعتبار گواهی ارزش افزوده</th>
										<th>عملیات</th>
									</tr>
								</thead>
								<tbody>
								<?php
								$i = 1;
								if($asb){
								foreach($asb as $a){ ?>
									<tr>
										<td><?php echo per_number($i); ?></td>
										<td><?php echo per_number($a['c_id']); ?></td>
										<td><?php echo $a['c_type']; ?></td>
										<td><?php echo $a['c_company']; ?></td>
										<td><?php echo $a['c_name'] . " " . $a['c_family']; ?></td>
										<td><?php if($a['c_vat']=="yes") echo get_expire_time($a['c_id']); else echo "انقضا ندارد"; ?></td>
										<td>
											<form action="" method="post" onSubmit="if(!confirm('آیا از انجام این عملیات اطمینان دارید؟')){return false;}">
												<a class="btn btn-warning btn-xs" href="show-customer.php?id=<?php echo $a['c_id']; ?>">مشاهده</a>
												<button class="btn btn-danger btn-xs" type="submit" name="delete-list" id="delete-list">حذف</button>
												<input class="hidden" type="text" name="delete-text" id="delete-text" value="<?php echo $a['c_id']; ?>">
												<?php
												if(isset($_POST['delete-list'])){
													$c_id = $_POST['delete-text'];
													delete_customer($c_id);
													echo "<meta http-equiv='refresh' content='0'/>";
													exit();
												}
												?>
											</form>
										</td>
									</tr>
								<?php
									$i++;
								}
								}
								?>
								</tbody>
								<tfoot>
									<tr>
										<th>ردیف</th>
										<th>کد حساب</th>
										<th>نوع حساب</th>
										<th>نام شرکت</th>
										<th>نام و نام خانوادگی</th>
										<th>اعتبار گواهی ارزش افزوده</th>
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
	<script src="../plugins/datatables/jquery.dataTables.min.js"></script>
	<script src="../plugins/datatables/dataTables.bootstrap.min.js"></script>
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