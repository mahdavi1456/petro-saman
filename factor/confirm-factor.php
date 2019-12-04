<?php $title = "تایید فاکتور"; include"../header.php"; include"../nav.php"; $view = "sell"; $level = "factor";
$media = new media();
?>
<div class="content-wrapper">
	<?php
	if(isset($_GET['fb_id'])){
		$fb_id = $_GET['fb_id'];
		$f_id = get_var_query("select f_id from factor_body where fb_id = $fb_id");
	}
	$type_confirm = $_GET['typee'];
	if($type_confirm == 'fb_pre_invoice_scan') {
		$echo_type = "تایید مسول مالی";
	}elseif($type_confirm == 'fb_verify_admin1') {
		$echo_type = "تایید مدیر";
	}elseif($type_confirm == 'fb_send_customer') {
		$echo_type = "تایید مسئول فروش";
	}elseif($type_confirm == 'fb_verify_customer') {
		$echo_type = "تایید مسئول فروش";
	}elseif($type_confirm == 'fb_verify_docs') {
		$echo_type = "تایید اسناد";
	}elseif($type_confirm == 'fb_verify_finan') {
		$echo_type = "تایید مالی";
	}

	breadcrumb("تایید پیشنهاد فروش" . " (" . $echo_type . ")");

	$fb_id = $_GET['fb_id'];
	$type_confirm = $_GET['typee'];

	if(isset($_POST['up_file_check'])){
		$file = $_FILES['fileToUpload'];
		$fb_id = $_POST['fb_id'];
		$mf_type = "sale";
		$mf_name = $_POST['name_f'];
		if(isset($_FILES['fileToUpload']) && $_FILES['fileToUpload']['size'] > 0) {
		$media->upload_factor_media($fb_id, $mf_type , $mf_name, $file);
		$l_details =  $_POST['l_details'];
		update_a_row_log_factor($fb_id, $l_details );	
		}
		else{
			alert("alert-warning", "فایلی انتخاب نشده است");
		}
	}

	if(isset($_POST['delete-img']))
	{
		$mf_link = $_POST['mf_link'];
		$mf_id = $_POST['mf_id'];
		$media->delete_factor_media($mf_id , $mf_link);
		update_a_row_log_factor($_POST['fb_id'] ,  $_POST['l_details'] );	
	}?>
	
	<section class="content no-padd">
		<div id="details" class="col-xs-12">
			<?php
			$res = get_factor_body_confirm_factor($fb_id);
			?>
			<form action="list-factor.php" method="post">
				<section class="invoice" id="confirm-factor-print">
					<div class="row">
						<div class="col-xs-12">
							<?php pre_invoice_table($f_id); ?>
						</div>
					</div>
				</section>
			</form>
			<?php
			if($type_confirm == 'fb_verify_admin1') { ?>
				<form action="list-factor.php" method="post">
					<section class="invoice" id="confirm-factor-print">
						<div class="row no-print">
							<div class="col-xs-12 invoice-col invoice-col-fixer">
								<textarea class="form-control" name="l_details" placeholder="توضیحات لازم را اینجا بنویسید..." rows="4" cols="50"></textarea>
							</div>
							<div class="col-xs-12 invoice-col invoice-col-fixer">
								<input type="hidden" name="fb_id" value="<?php echo $fb_id; ?>">
								<input type="hidden" name="echo_type" value="<?php echo $echo_type; ?>">
								<input type="hidden" name="type_confirm" value="<?php echo $type_confirm; ?>">
								<button type="submit" class="btn btn-success pull-right" name="verify_submit" id="verify_submit">تایید</button>
								<a href="<?php get_view("factor"); ?>list-factor.php" style="margin-right: 5px;" class="btn btn-primary pull-right">بازگشت</a>
							</div>
						</div>
					</section>
				</form>
			<?php
			}else if($type_confirm=='fb_send_customer') { ?>
				<form action="list-factor.php" method="post">
					<section class="invoice" id="confirm-factor-print">
						<div class="row no-print">
							<div class="col-xs-12 invoice-col invoice-col-fixer">
								<textarea class="form-control" name="l_details" placeholder="توضیحات لازم را اینجا بنویسید..." rows="4" cols="50"></textarea>
							</div>
							<div class="col-xs-12 invoice-col invoice-col-fixer">
								<input type="hidden" name="fb_id" value="<?php echo $fb_id; ?>">
								<input type="hidden" name="echo_type" value="<?php echo $echo_type; ?>">
								<input type="hidden" name="type_confirm" value="<?php echo $type_confirm; ?>">
								<button type="submit" class="btn btn-success pull-right" name="verify_submit" id="verify_submit">تایید</button>
								<a href="<?php get_view("factor"); ?>list-factor.php" style="margin-right: 5px;" class="btn btn-primary pull-right">بازگشت</a>
							</div>
						</div>
					</section>
				</form>
			<?php
			}else if($type_confirm == 'fb_verify_customer') { ?>
					<section class="invoice" id="confirm-factor-print">
						<div class="row">
							<form action="" method="post" enctype="multipart/form-data">
								<div class="col-md-6 invoice-col invoice-col-fixer">
									<h4>بارگزاری پیش فاکتور امضا شده ی مشتری</h4><br>
									<input type="file" accept="image/*" onchange="loadFile(event)" name="fileToUpload" id="verify_file"><br>
									<input type="hidden" name="name_f" value="signed_customer">
									<input type="hidden" name="l_details" value="<?php echo "بارگزاری پیش فاکتور امضا شده ی مشتری"; ?>">
									<input type="hidden" name="typee" value="invoice">
									<input type="hidden" name="fb_id" value="<?php echo $_GET['fb_id']; ?>">
									<button type="submit" class="btn btn-success" name="up_file_check">بارگزاری فایل</button>
								</div>
								<div class="col-md-6 invoice-col invoice-col-fixer">
									<img class="img-responsive" id="output">
								</div>
							</form>
						</div>
						<div class="row">
							<div class="col-md-12 invoice-col invoice-col-fixer">
								<h4>نمایش پیش فاکتور امضا شده ی مشتری</h4>
								<?php singed_pre_invoice_scan($fb_id , "signed_customer"); ?>
							</div>
						</div>
						<div class="row">
							<form action="" method="post" enctype="multipart/form-data">
								<div class="col-md-6 invoice-col invoice-col-fixer">
									<h4>بارگزاری اسکن چک/سفته ها</h4><br>
									<input type="file" accept="image/*" onchange="loadFile(event)" name="fileToUpload" id="verify_file"><br>
									<input type="hidden" name="name_f" value="check">
									<input type="hidden" name="l_details" value="<?php echo "بارگزاری اسکن چک/سفته ها"; ?>">
									<input type="hidden" name="typee" value="invoice">
									<input type="hidden" name="fb_id" value="<?php echo $_GET['fb_id']; ?>">
									<button type="submit" class="btn btn-success" name="up_file_check">بارگزاری فایل</button>
								</div>
								<div class="col-md-6 invoice-col invoice-col-fixer">
									<img class="img-responsive" id="output">
								</div>
							</form>
						</div>
						<div class="row">
							<div class="col-md-12 invoice-col invoice-col-fixer">
								<h4>نمایش چک/سفته ها</h4>
								<?php singed_pre_invoice_scan($fb_id, "check"); ?>
							</div>
						</div>
						<div class="row">
							<form action="list-factor.php" method="post">
								<div class="col-xs-12 invoice-col invoice-col-fixer">
									<textarea class="form-control" name="l_details" id="l_details" placeholder="توضیحات لازم را اینجا بنویسید ..." rows="4" cols="50"></textarea>
									<input type="hidden" name="fb_id" value="<?php echo $fb_id; ?>">
									<input type="hidden" name="echo_type" value="<?php echo $echo_type; ?>">
									<input type="hidden" name="type_confirm" id="type_confirm" value="<?php echo $type_confirm; ?>">
								</div>
								<div class="col-xs-12 invoice-col invoice-col-fixer">
									<button type="submit" class="btn btn-success" name="verify_submit" id="verify_submit">تایید</button>
									<a href="list-factor.php" class="btn btn-primary">بازگشت</a>
								</div>
							</form>
						</div>
					</section>
				<?php
				} elseif ($type_confirm == 'fb_verify_finan') { ?>
				<section class="invoice" id="confirm-factor-print">
					<div class="row">
						<div class="col-md-12 invoice-col invoice-col-fixer">
							<h4>نمایش پیش فاکتور امضا شده ی مشتری</h4>
							<?php show_singed_pre_invoice_scan($fb_id , "signed_customer"); ?>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12 invoice-col invoice-col-fixer">
							<h4>نمایش چک/سفته ها</h4>
							<?php show_singed_pre_invoice_scan($fb_id , "check"); ?>
						</div>
					</div>
					<div class="row">
						<form action="list-factor.php" method="post">
							<div class="item col-md-4">
								<div class="margin-tb input-group-prepend">
									<span class="input-group-text">تاریخ تایید</span>
								</div>
								<?php
								$sql = "select * from factor_body where fb_id = $fb_id";
								$res = get_select_query($sql); ?>
								<input value="<?php if($res[0]['date_verify_finan']!=null){echo $res[0]['date_verify_finan']; }  else{ echo jdate("Y/n/j");} ?>" autocomplete="off" type="text" id="date_verify_finan" name="date_verify_finan" placeholder="تاریخ تایید" class="form-control " readonly>
							</div>
							<div class="col-xs-12 invoice-col invoice-col-fixer">
								<textarea class="form-control" name="l_details" id="l_details" placeholder="توضیحات لازم را اینجا بنویسید ..." rows="4" cols="50"></textarea>
								<input type="hidden" name="fb_id" value="<?php echo $fb_id; ?>">
								<input type="hidden" name="echo_type" value="<?php echo $echo_type; ?>">
								<input type="hidden" name="type_confirm" id="type_confirm" value="<?php echo $type_confirm; ?>">
							</div>
							<div class="col-xs-12 invoice-col invoice-col-fixer">
								<button type="submit" class="btn btn-success" name="verify_submit" id="verify_submit">تایید</button>
								<a href="list-factor.php" class="btn btn-primary">بازگشت</a>
							</div>
						</form>
					</div>
				</section>
			<?php } ?>
		</div>
	</section>
</div>
<script src="<?php get_url(); ?>product/js/product.js"></script>
<script src="<?php get_url(); ?>factor/js/jquery-print.js"></script>
<script src="<?php get_url(); ?>factor/js/print.js" type="text/javascript"></script>
<?php include"../left-nav.php"; include"../footer.php"; ?>