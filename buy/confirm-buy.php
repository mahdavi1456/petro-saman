<?php $title = "تایید فاکتور"; include"../header.php"; include"../nav.php";
$view = "buy"; $level = "factor"; 
$media = new media();
?>
<div class="content-wrapper">
	<?php
	$fb_id = $_GET['fb_id'];
	$f_id = get_var_query("select f_id from factor_buy_body where fb_id = $fb_id");

	if(isset($_GET['fb_id'])) $fb_id = $_GET['fb_id'];
	$type_confirm = $_GET['typee'];
	if($type_confirm == 'fb_pre_invoice_scan') {
		$echo_type = "تایید مسئول مالی بخش خرید";
	}elseif($type_confirm == 'fb_verify_admin1') {
		$echo_type = "تایید مدیر";
	}elseif($type_confirm == 'fb_send_customer') {
		$echo_type = "تایید مسول فروش";
	}elseif($type_confirm == 'fb_verify_customer') {
		$echo_type = "تایید مشتری";
	}elseif($type_confirm == 'fb_verify_docs') {
		$echo_type = "تایید اسناد";
	}elseif($type_confirm == 'fb_verify_finan') {
		$echo_type = "تایید مالی";
	}

	breadcrumb("تایید پیشنهاد خرید" . " (" . $echo_type . ")" , "buy/list-buy.php");

	$fb_id = $_GET['fb_id'];
	$type_confirm = $_GET['typee'];

	if(isset($_POST['up_file_check'])){
		$fb_id = $_POST['fb_id'];
		$mf_type = "buy";
		$mf_name = $_POST['name_f'];
		$file = $_FILES['fileToUpload'];
		if(isset($_FILES['fileToUpload']) && $_FILES['fileToUpload']['size'] > 0) {
			$media->upload_factor_media($fb_id, $mf_type , $mf_name, $file);
			update_a_row_buy_log_factor($fb_id, $_POST['l_details'] );
		}
		else{
			?>
			<script>
				alertify.set('notifier','position', 'bottom-right');
 				alertify.warning('فایلی انتخاب نشده است');
			</script>
			<?php
		}
	}

	if(isset($_POST['delete-img']))
	{
		$mf_link = $_POST['mf_link'];
		$mf_id = $_POST['mf_id'];
		$media->delete_factor_media($mf_id , $mf_link);
		update_a_row_buy_log_factor($fb_id, "حذف اسکن چک/سفته ها" );
	}
	?>

	<section class="content no-padd">
		<div id="details" class="col-xs-12 no-padd">
			<form action="list-factor.php" method="post">
				<section class="invoice" id="confirm-factor-print">
					<div class="row">
						<div class="col-xs-12">
							<?php buy_invoice_table($fb_id); ?>
						</div>
					</div>
				</section>
			</form>
			<?php
			if($type_confirm == 'fb_verify_admin1') { ?>
				<section class="invoice">

					<?php get_pre_invoice_file($fb_id); ?>

					<form action="list-buy.php" method="post">
					<div class="row no-print">
						<div class="col-xs-12 invoice-col invoice-col-fixer">
							<textarea class="form-control" name="l_details" placeholder="توضیحات لازم را اینجا بنویسید..." rows="4" cols="50"></textarea>
						</div>
						<div class="col-xs-12 invoice-col invoice-col-fixer">
							<input type="hidden" name="fb_id" value="<?php echo $fb_id; ?>">
							<input type="hidden" name="echo_type" value="<?php echo $echo_type; ?>">
							<input type="hidden" name="type_confirm" value="<?php echo $type_confirm; ?>">
							<button type="submit" class="btn btn-success pull-right" name="verify_submit" id="verify_submit">تایید</button>
							<a href="<?php get_view("buy"); ?>list-buy.php" style="margin-right: 5px;" class="btn btn-primary pull-right">بازگشت</a>
						</div>
					</div>
					</form>
				</section>
			<?php
			}


			if($type_confirm == 'fb_verify_finan') { ?>

				<section class="invoice">
					
					<?php get_pre_invoice_file($f_id); ?>
					
					<div class="row">
						<div class="col-md-12 invoice-col invoice-col-fixer">
							<h4>نمایش چک/سفته ها</h4>
							<?php show_singed_pre_invoice_scan_buy($fb_id); ?>
						</div>
					</div>
					<div class="row">
						


						<form action="" method="post" enctype="multipart/form-data">
							<div class="col-md-6 invoice-col invoice-col-fixer">
								<h4>بارگزاری اسکن چک/سفته ها</h4><br>
								<input type="file" accept="image/*" onchange="loadFile(event)" name="fileToUpload" id="verify_file"><br>
								<label class="btn btn-info" for="verify_file">اسکن</label>
								<input type="hidden" name="name_f" value="check">
								<input type="hidden" name="typee" value="invoice">
								<input type="hidden" name="l_details" value="<?php echo "بارگزاری اسکن چک/سفته ها"; ?>">
								<input type="hidden" name="fb_id" value="<?php echo $_GET['fb_id']; ?>">
								<button type="submit" class="btn btn-success" name="up_file_check">بارگزاری فایل</button>
							</div>
							<div class="col-md-6 invoice-col invoice-col-fixer">
								<img class="img-responsive" id="output">
							</div>
						</form>

					<script>
						var loadFile = function(event) {
							var output = document.getElementById('output');
						output.src = URL.createObjectURL(event.target.files[0]);
					};
				</script>

						<form action="list-buy.php" method="post">
							
							<div class="col-xs-12 invoice-col invoice-col-fixer">
								<textarea class="form-control" name="l_details" id="l_details" placeholder="توضیحات لازم را اینجا بنویسید ..." rows="4" cols="50"></textarea>
								<input type="hidden" name="fb_id" value="<?php echo $fb_id; ?>">
								<input type="hidden" name="echo_type" value="<?php echo $echo_type; ?>">
								<input type="hidden" name="type_confirm" id="type_confirm" value="<?php echo $type_confirm; ?>">
							</div>
							<div class="col-xs-12 invoice-col invoice-col-fixer">
								<button type="submit" class="btn btn-success" name="verify_submit" id="verify_submit">تایید</button>
								<a href="list-buy.php" class="btn btn-primary">بازگشت</a>
							</div>
						</form>
					</div>
				</section>
			<?php } 

			if($type_confirm == 'fb_pre_invoice_scan') { ?>
				
					<section class="invoice" id="confirm-factor-print">
						<?php pre_factor_buy_v2_header($fb_id) ?>
						<div class="row">
							<div class="col-xs-12 table-responsive">
								<?php load_factor_buy_body($fb_id); ?>
							</div>
						</div>
						<div class="row">
							<div class="col-xs-4">
								<?php load_factor_buy_body_total_tabel($fb_id); ?>
							</div>
							<div class="col-xs-8">
								<div class="table-responsive">
									<p>امضاها</p>
									<table class="table table-bordered table-bordered-fixer">
										<tr>
											<th style="width:33%">مسول مالی</th>
											<th style="width:33%">مدیر</th>
											<th style="width:34%">مسول فروش</th>
										</tr>
										<tr>
											<td style="height:100px"><?php get_factor_signature("fb_pre_invoice_scan", $fb_id, $view, $level); ?></td>
											<td style="height:100px"><?php get_factor_signature("fb_verify_admin1", $fb_id, $view, $level); ?></td>
											<td style="height:100px"><?php get_factor_signature("fb_send_customer", $fb_id, $view, $level); ?></td>
										</tr>
									</table>
								</div>
							</div>
						</div>
						<form action="list-buy.php" method="post">
						<div class="row no-print">
							<div class="col-xs-12 invoice-col invoice-col-fixer">
								<button type="button" class="btn btn-default pull-right" id="confirm-factor-printer"><i class="fa fa-print"></i> چاپ پیش فاکتور</button>
							</div>
							<div class="col-xs-12 invoice-col invoice-col-fixer">
								<textarea class="form-control" name="l_details" placeholder="توضیحات لازم را اینجا بنویسید..." rows="4" cols="50"></textarea>
							</div>
							<div class="col-xs-12 invoice-col invoice-col-fixer">
								<input type="hidden" name="fb_id" value="<?php echo $fb_id; ?>">
								<input type="hidden" name="type_confirm" value="<?php echo $type_confirm; ?>">
								<input type="hidden" name="echo_type" value="<?php echo $echo_type; ?>">
								<button type="submit" class="btn btn-success pull-right" name="verify_submit" id="verify_submit">تایید</button>
								<a href="<?php get_view("buy"); ?>list-buy.php" style="margin-right: 5px;" class="btn btn-primary pull-right">بازگشت</a>
							</div>
						</div>
					</form>
					</section>
			
			<?php
			} ?>

		</div>
	</section>
</div>
<script src="<?php get_url(); ?>product/js/product.js"></script>
<script src="<?php get_url(); ?>factor/js/jquery-print.js"></script>
<script src="<?php get_url(); ?>factor/js/print.js" type="text/javascript"></script>
<?php include"../left-nav.php"; include"../footer.php"; ?>
