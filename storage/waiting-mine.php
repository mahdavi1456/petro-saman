<?php include"../header.php"; include"../nav.php"; $aru = new aru(); $sms = new sms(); 	
$media = new media();
$user = new user();
	require_once"../customer/functions.php";

	$u_level = $user->get_current_user_level();
	if(isset($_POST['delete-list'])){
		$fb_id = $_POST['delete-text'];
		$aru->remove("factor_buy_body", "fb_id", $fb_id, "int");
		$aru->remove("factor_buy_log", "fb_id", $fb_id, "int");
		$sql2 = "select * from media_factor where fb_id = $fb_id and mf_type = 'buy' and mf_name <> 'pre_invoice_buy' ";
		$res2 = get_select_query($sql2);
		if(count($res2)>0) {
			foreach($res2 as $row2){
				$media->delete_factor_media($row2['mf_id'] , $row2['mf_link']);
			}
		}
		$l_details = "حذف فاکتور خرید";
		update_a_row_buy_log_factor($fb_id, $l_details);
		$verify = "fb_buy_delete";
		$sms->send_sms_confirm_buy($fb_id, $verify);
		
		echo "<meta http-equiv='refresh' content='0'/>";
		exit();
	}


	if(isset($_POST['add-returned_factor'])) {
		$aru->add("returned_factor", $_POST);
		echo "<meta http-equiv='refresh' content='0'/>";
	}
	
	if(isset($_POST['verify_submit'])) {
		$verify = $_POST['type_confirm'];
		$fb_id_verify = $_POST['fb_id'];
		$l_details = $_POST['l_details'];
		$echo_type = $_POST['echo_type'];
		update_a_row_fb_buy_factor($verify, $fb_id_verify);
		update_a_row_buy_log_factor($fb_id_verify, $l_details);
		$l_details = "ویرایش فاکتور خرید";
		update_a_row_buy_log_factor($fb_id_verify, $echo_type);
		$sms->send_sms_confirm_buy($fb_id_verify, $verify);
	}


	if(isset($_POST['update-factor_buy_body_buying'])){
		$fb_id = $_POST['update-factor_buy_body_buying'];
		ex_query("update factor_buy_body set fb_outsourcing = 'no' where fb_id = $fb_id");
		
		$verify = "fb_buy_cycle";
		$sms->send_sms_confirm_buy($fb_id, $verify);
		$l_details = "خرید مستقیم";
		update_a_row_buy_log_factor($fb_id, $l_details);
		echo "<meta http-equiv='refresh' content='0'>";
	}
	


	if(isset($_POST['update-factor_buy_body_outsourcing'])){
		$fb_id = $_POST['update-factor_buy_body_outsourcing'];
		ex_query("update factor_buy_body set fb_outsourcing = 'yes' where fb_id = $fb_id");
		
		$verify = "fb_outsourcing_cycle";
		$sms->send_sms_confirm_buy($fb_id, $verify);
		$l_details = "برون سپاری";
		update_a_row_buy_log_factor($fb_id, $l_details);
		echo "<meta http-equiv='refresh' content='0'>";
	}


	$u_level = get_current_user_level();
?>
<div class="content-wrapper">

	<?php breadcrumb("" , "index.php"); ?>

	<section class="content">
		<div class="row">
			<div class="col-xs-12">
				<div class="box">
					<div class="box-header">
						<h3 class="box-title">منتظر معدن</h3>
					</div>
					<div class="box-body">
						<table id="example1" class="table table-bordered table-striped">
							<thead>
								<tr>
									<th>ردیف</th>
									<th>فاکتور</th>
									<th>ردیف فاکتور</th>
									<th>تامین کننده</th>
									<th>پیش فاکتور</th>
									<th>وزن بار</th>
									<th>مقدار دریافت شده</th>
									<th>عملیات</th>
								</tr>
							</thead>
							<tbody>
							<?php
							$i = 1;
							$res = get_select_query("select * from factor_buy_body fbb inner join factor_buy fb on fbb.f_id = fb.f_id where fbb.fb_outsourcing = 'no'");
							if(count($res) > 0){
							foreach ($res as $row) {
								$fb_id = $row['fb_id'];
								$f_id = $row['f_id'];
								$bar_bring = get_var_query("select sum(bar_quantity) from bar_bring where fb_id = $fb_id");
								?>
								<tr>
									<td><?php echo per_number($i); ?></td>
									<td><?php echo per_number($row['f_id']); ?></td>
									<td><?php echo per_number($row['fb_id']); ?></td>
									<td><?php echo get_customer_name($row['c_id']); ?></td>
									<td>
										<a class="btn btn-primary btn-xs" href="../buy/reg-buy.php?f_id=<?php echo $f_id; ?>&c_id=<?php echo $row['c_id']; ?>&fb_id=<?php echo $fb_id; ?>">ویرایش</a>
									</td>
									<td><?php echo per_number(number_format($row['fb_quantity'])); ?></td>
									<td><?php echo per_number(number_format($bar_bring)); ?></td>
									<td><a href="<?php get_url(); ?>storage/input-store.php?fb_id=<?php echo $fb_id; ?>" class="btn btn-info btn-xs">ثبت دریافت</a></td>
								</tr>
								<?php
									$i++;
								} 
							}
							else { ?>
								<tr>
									<td colspan="8">موردی یافت نشد</td>
								</tr>
							<?php }
							?>
							</tbody>
							<tfoot>
								<tr>
									<th>ردیف</th>
									<th>فاکتور</th>
									<th>ردیف فاکتور</th>
									<th>تامین کننده</th>
									<th>پیش فاکتور</th>
									<th>وزن بار</th>
									<th>مقدار دریافت شده</th>
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

<script src="<?php get_url(); ?>/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php get_url(); ?>/plugins/datatables/dataTables.bootstrap.min.js"></script>
<script type="text/javascript">
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
