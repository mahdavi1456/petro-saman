<?php
function singed_pre_invoice_scan($fb_id, $mf_name) {
	$sql = "select mf_id, mf_link from media_factor where fb_id = $fb_id and mf_type = 'sale' and mf_name = '$mf_name'";
	$out = get_select_query($sql);
	$c = count($out);
	if($c>0){
	foreach($out as $o){
		if($o!=""){
			$src = get_the_url() . "uploads/factor_media/" . $o['mf_link'];
		}else{
			$src = get_the_url() . "dist/img/no-img.jpg";
		}
		?>
		<form action="" method="post" onclick="if(!confirm('آیا از انجام این عملیات اطمینان دارید؟')){return false;}">
			<div style="border: 1px dashed #eee; border-radius: 4px; padding: 10px; text-align: center; background: #f9f9f9">
				<img class="img-responsive" src="<?php echo $src; ?>"><br>
				<input type="hidden" name="mf_link" value="<?php echo $o['mf_link']; ?>">
				<input type="hidden" name="mf_link" value="<?php echo $fb_id ; ?>">
				<input type="hidden" name="mf_id" value="<?php echo $o['mf_id']; ?>">
				<?php if($mf_name == "signed_customer"){ ?>
				<input type="hidden" name="l_details" value="<?php echo "حذف پیش فاکتور امضا شده ی مشتری"; ?>">
				<?php }
				else if($mf_name == "check") { ?>
				<input type="hidden" name="l_details" value="<?php echo "حذف اسکن چک/سفته ها"; ?>">
				<?php }
				?>
				<button name="delete-img" class="btn btn-danger btn-sm">حذف</button>
			</div>
		</form>
		<br>
		<?php
	}
	}else{
		echo "<div class='alert alert-danger'>موردی یافت نشد!</div>";
	}
}

function show_singed_pre_invoice_scan($fb_id , $mf_name) {
	$sql = "select mf_id, mf_link from media_factor where fb_id = $fb_id and mf_type = 'sale' and mf_name = '$mf_name' ";
	$out = get_select_query($sql);
	$c = count($out);
	if($c>0){
		foreach($out as $o){
			if($o!=""){
				$src = get_the_url() . "uploads/factor_media/" . $o['mf_link'];
			}else{
				$src = get_the_url() . "dist/img/no-img.jpg";
			}
			?>
			<div style="border: 1px dashed #eee; border-radius: 4px; padding: 10px; text-align: center; background: #f9f9f9">
				<img class="img-responsive" src="<?php echo $src; ?>"><br>
			</div>
			<br>
			<?php
		}
	}else{
		echo "<div class='alert alert-danger'>موردی یافت نشد!</div>";
	}
}

function show_pre_invoice_scan($fb_id) {
	$sql = "select m_id, m_name from media where bu_id = $fb_id and m_type = 'pre_invoice_sale' and m_name_file = 'no_signed'";
	$out = get_select_query($sql);
	$c = count($out);
	if($c>0){
	foreach($out as $o){
		if($o!=""){
			$src = get_the_url() . "uploads/" . $o['m_name'];
		}else{
			$src = get_the_url() . "dist/img/no-img.jpg";
		}
		?>
		<div style="border: 1px dashed #eee; border-radius: 4px; padding: 10px; text-align: center; background: #f9f9f9">
			<img class="img-responsive" src="<?php echo $src; ?>"><br>
		</div>
		<br>
		<?php
	}
	}else{
		echo "<div class='alert alert-danger'>هیچ پیش فاکتوری در سیستم بارگزاری نشده است</div>";
	}
}

function pre_invoice_scan($fb_id){
	$sql = "select m_id, m_name from media where bu_id = $fb_id and m_type = 'pre_invoice_sale' and m_name_file = 'no_signed'";
	$out = get_select_query($sql);
	$c = count($out);
	if($c>0){
	foreach($out as $o){
		if($o!=""){
			$src = get_the_url() . "uploads/" . $o['m_name'];
		}else{
			$src = get_the_url() . "dist/img/no-img.jpg";
		}
		?>
		<form action="" method="post" onclick="if(!confirm('آیا از انجام این عملیات اطمینان دارید؟')){return false;}">
			<div style="border: 1px dashed #eee; border-radius: 4px; padding: 10px; text-align: center; background: #f9f9f9">
				<img class="img-responsive" src="<?php echo $src; ?>"><br>
				<input type="hidden" name="filename" value="<?php echo $o['m_name']; ?>">
				<input type="hidden" name="image_id" value="<?php echo $o['m_id']; ?>">
				<button name="delete-img" class="btn btn-danger btn-sm">حذف</button>
			</div>
		</form>
		<br>
		<?php
	}
	}else{
		echo "<div class='alert alert-danger'>هیچ پیش فاکتوری در سیستم بارگزاری نشده است</div>";
	}
}

function load_factor_body($fb_id){
	$res = get_factor_body_confirm_factor($fb_id);
	?>
	<table class="table table-bordered table-striped">
		<thead>
			<tr>
				<th>ردیف</th>
				<th>نام محصول</th>
				<th>دسته بندی</th>
				<th>مقدار</th>
				<th>قیمت واحد</th>
				<th>قیمت کل</th>
			</tr>
		</thead>
		<tbody>
			<?php
			$i = 1;
			foreach($res as $row){ ?>
				<tr>
					<td><?php echo per_number($i); ?></td>
					<td><?php echo per_number($row['p_name']); ?></td>
					<td><?php echo per_number($row['cat_name']); ?></td>
					<td><?php echo per_number(number_format($row['fb_quantity'])); ?></td>
					<td><?php echo per_number(number_format($row['fb_price'])); ?></td>
					<td><?php echo per_number(number_format($row['fb_quantity'] * $row['fb_price'])); ?></td>
				</tr>
			<?php
			$i++;
			} ?>
		</tbody>
	</table>
<?php
}

function load_factor_body_total_tabel($fb_id){
	$res = get_factor_body_confirm_factor($fb_id);
	$total = 0;
	foreach($res as $row){
		$total += ($row['fb_quantity'] * $row['fb_price']);
	}
	$f_id = $res[0]['f_id'];
	$f_VAT_status = get_var_query("select f_VAT_status from factor where f_id = $f_id");
	if($f_VAT_status){
		$tax = $total * (9/100);
		$final_price = $total + $tax;
		?>
		<div class="table-responsive">
			<p>جمع</p>
			<table class="table">
				<tr>
					<th style="width:50%">جمع:</th>
					<td><?php echo per_number(number_format($total)); ?> تومان</td>
				</tr>
				<tr>
					<th>مالیات (<?php echo per_number('9'); ?> درصد):</th>
					<td><?php echo per_number(number_format($tax)); ?> تومان</td>
				</tr>
				<tr>
					<th>قابل پرداخت:</th>
					<td><?php echo per_number(number_format($final_price)); ?> تومان</td>
				</tr>
			</table>
		</div>
		<?php
	}else{
		$tax = 0;
		$final_price = $total;
		?>
		<div class="table-responsive">
			<p>جمع</p>
			<table class="table">
				<tr>
					<th style="width:50%">جمع:</th>
					<td><?php echo per_number(number_format($total)); ?> تومان</td>
				</tr>
				<tr>
					<th>مالیات (<?php echo per_number('9'); ?> درصد):</th>
					<td>ندارد</td>
				</tr>
				<tr>
					<th>قابل پرداخت:</th>
					<td><?php echo per_number(number_format($final_price)); ?> تومان</td>
				</tr>
			</table>
		</div>
		<?php
	}
}

function insert_factor_factor($array){
	$c_id = $array[0];
	$f_date = $array[1];
	$u_id = $array[2];
	$f_type = $array[3];
	$f_payment = $array[4];
	$st_id_to = $array[5];
	$sql = "insert into factor(f_payment, f_type, c_id, f_date, u_id, st_id_to) values('$f_payment', '$f_type', $c_id, '$f_date', $u_id, $st_id_to)";
	$res = ex_query($sql);
	return $res;
}

function insert_VAT_factor_factor($array){
	$c_id = $array[0];
	$f_date = $array[1];
	$u_id = $array[2];
	$f_type = $array[3];
	$f_payment = $array[4];
	$st_id_to = $array[5];
	$f_VAT_status = 1;
	$sql = "insert into factor(f_payment, f_type, c_id, f_date, u_id, f_VAT_status, st_id_to) values('$f_payment', '$f_type', $c_id, '$f_date',  $u_id, $f_VAT_status, $st_id_to)";
	$res = ex_query($sql);
	return $res;
}

function insert_factor_body($array){
	$f_id = $array[0];
	$p_id = $array[1];
	$cat_id = $array[2];
	$fb_quantity = $array[3];
	$fb_price = $array[4];
	$total_price = $array[5];
	$fd_text = $array[6];
	$delivery_time = $array[7];
	$sql = "insert into factor_body(f_id, p_id, cat_id, fb_quantity, fb_price , total_price , fd_id , delivery_time) ";
	$sql .= "values ($f_id, $p_id, $cat_id, $fb_quantity, $fb_price , $total_price , $fd_text , '$delivery_time')";
	$res = ex_query($sql);
	return $res;
}

function list_factor_log_factor() {
	$sql = "select * from factor_log inner join factor_body on factor_body.fb_id = factor_log.fb_id inner join user on user.u_id = factor_log.u_id order by factor_log.l_id desc";
	$res = get_select_query($sql);
	return $res;
}

function insert_factor_log_factor($array){
	$u_id = $array[0];
	$l_date = $array[1];
	$fb_id = $array[2];
	$l_details = $array[3];
	$sql = "insert into factor_log(u_id, l_date, fb_id, l_details) values($u_id, '$l_date', $fb_id, '$l_details')";
	$res = ex_query($sql);
	return $res;	
}

function delete_factor_log_factor ($l_id){
	$sql = "delete from factor_log where l_id = $l_id";
	$res = ex_query($sql);
	return $res;	
}

function delete_factor_body ($fb_id){
	$sql = "delete from factor_body where fb_id = $fb_id";
	$res = ex_query($sql);
	return $res;	
}


//factor_body
function list_factor_body() {
	$sql = "select * from factor_body inner join factor on factor_body.f_id = factor.f_id order by factor_body.fb_id DESC";
	$res = get_select_query($sql);
	return $res;
}

function get_factor_body_factor($f_id) {
	$sql = "select * from factor_body inner join factor on factor_body.f_id = factor.f_id where factor_body.f_id = $f_id";
	$res = get_select_query($sql);
	return $res;
}

function get_factor_log($fb_id) {
	$sql = "select * from factor_log where fb_id = $fb_id";
	$res = get_select_query($sql);
	return $res;
}

function get_factor_body_confirm_factor($fb_id) {
	$sql = "select * from factor_body inner join factor on factor.f_id = factor_body.f_id inner join customer on customer.c_id = factor.c_id inner join category on category.cat_id = factor_body.cat_id inner join product on product.p_id = factor_body.p_id where fb_id = $fb_id";
	$res = get_select_query($sql);
	return $res;
}

function update_a_row_fb_factor($verify,$fb_id_verify) {
	$u_id = get_current_user_id();
	$sql = "update factor_body set $verify = '$u_id' where fb_id = $fb_id_verify";
	$res = ex_query($sql);
	return $res;
}

function update_a_row_log_factor($fb_id, $l_details) {
	$date = jdate('Y/m/d H:i');
	$u_id = $_SESSION['user_id'];
	$sql = "insert into factor_log(u_id, l_date, fb_id, l_details) values($u_id, '$date', $fb_id, '$l_details')";
	$res = ex_query($sql);
	return $res;
}

function exe_result_analyze($fb_id, $fb_result_analyze){
	$sql = "update factor_body set fb_result_analyze = $fb_result_analyze where fb_id = $fb_id";
	$res = ex_query($sql);
	return $res;
}

function select_a_factor($fb_id){
	$sql = "select * from factor_body inner join factor on factor.f_id = factor_body.f_id inner join product on product.p_id = factor_body.p_id inner join category on category.cat_id = factor_body.cat_id inner join customer on customer.c_id = factor.c_id where fb_id = $fb_id";
	$res = get_select_query($sql);
	return $res;
}

function show_btn_list_factor($st, $url){
	if($st==0){ ?>
		<a href="<?php echo $url; ?>" class="btn btn-warning btn-xs">خیر</a>
	<?php
	} else { ?>
		<a href="<?php echo $url; ?>" class="btn btn-success btn-xs">بله</a>
	<?php
	}
}

function pre_factor_v2_header($fb_id){
	$res = get_factor_body_confirm_factor($fb_id);
	?>
	<div class="row">
		<div class="col-xs-12">
			<h2 class="page-header">
				<img src="<?php get_url(); ?>/dist/img/azar-logo.png">
				<small class="pull-left">تاریخ: <?php if($res && isset($res[0]['f_date'])) echo per_number($res[0]['f_date']); ?></small>
			</h2>
		</div>
	</div>
	<div class="row invoice-info" dir="rtl">
		<div class="col-sm-4 invoice-col invoice-col-fixer">
			<strong>پیش فاکتور فروش شرکت</strong><br>
			پتروسامان آذرتتیس<br>
			<strong>آدرس دفتر: </strong><br>
			<address></address>
		</div>
		<div class="col-sm-4 invoice-col invoice-col-fixer">
			<strong>نام مشتری:‌</strong> <?php if($res && isset($res[0]['c_name']) && isset($res[0]['c_family'])) echo $res[0]['c_name'] . " " . $res[0]['c_family']; ?><br>
			<strong>نام شرکت:</strong> <?php if($res && isset($res[0]['c_company'])) echo $res[0]['c_company']; ?><br>
			<strong>آدرس دفتر: </strong><br>
			<address><?php if($res && isset($res[0]['c_oaddress'])) echo $res[0]['c_oaddress']; ?></address>
		</div>
	</div>
	<?php
}

function get_fb_amount_sent($fb_id){
	$amount = get_var_query("select fb_amount_sent from factor_body where fb_id = $fb_id");
	return $amount;
}

function update_amount_fb_factor($update_amount, $fb_id) {
	$sql = "update factor_body set fb_amount_sent = $update_amount where fb_id = $fb_id";
	$res = ex_query($sql);
	return $res;
}

function insert_log_factor_amount($fb_id, $l_amount) {
	$date = jdate('Y/m/d H:i');
	$u_id = $_SESSION['user_id'];
	$sql = "insert into factor_log(u_id, l_date, fb_id, l_amount) values($u_id, '$date', $fb_id, $l_amount)";
	$res = ex_query($sql);
	return $res;
}

function update_status_fb_factor($fb_id) {
	$status = 1;
	$sql = "update factor_body set fb_status = $status where fb_id = $fb_id";
	$res = ex_query($sql);
	return $res;
}

function get_fb_status($fb_id) {
	$sql = "select fb_status from factor_body where fb_id = $fb_id";
	$res = get_var_query($sql);
	return $res;
}

function pre_invoice_table($f_id){
	$sql1 = "select * from factor inner join factor_body on factor.f_id = factor_body.f_id";
	$res1 = get_select_query($sql1);
	$fb_id = $_GET['fb_id'];
	$res2 = get_select_query("select * from factor_body where fb_id = $fb_id");
	$fd_id = $res2[0]['fd_id'];
	$res3 = get_select_query("select * from factor inner join factor_body on factor.f_id = factor_body.f_id  where fb_id = $fb_id");
	$c_id = $res3[0]['c_id'];
	$f_type = $res3[0]['f_type'];
	$res4 = get_select_query("select * from customer where c_id = $c_id");
	if(count($res4)>0)
	{}
	else
	{$res4[0]=0;}
	$res5 = get_select_query("select * from  factor_description where fd_id=$fd_id ");
	?>
		<table class="table tbl-pre-factor">
			<tbody>
				<tr>
					<td colspan="22" class="title-tbl center">مشخصات فروشنده</td>
				</tr>
				<tr>
					<td colspan="12">
						<li><strong>نام شخص حقیقی / حقوقی: </strong><?php echo get_option('com_name'); ?></li>
						<li><strong>استان: </strong><?php echo get_option('State'); ?> &nbsp; <strong>شهرستان: </strong><?php echo get_option('county'); ?></li>
						<li><strong>نشانی: </strong><?php echo get_option('fact_address'); ?></li>
					</td>
					<td colspan="5">
						<li><strong>شماره اقتصادی: </strong><?php echo get_option('eco_number'); ?></li>
						<li><strong>کد پستی ۱۰ رقمی: </strong><?php echo get_option('code_postal'); ?></li>
						<li><strong>شماره ملی: </strong><?php echo get_option('National_ID'); ?></li>
					</td>
					<td colspan="5">
						<li><strong>شماره ثبت: </strong><?php echo get_option('reg_number'); ?></li>
						<li><strong>شهر: </strong><?php echo get_option('city'); ?></li>
						<li><strong>تلفن: </strong><?php echo get_option('Phone'); ?> &nbsp; <strong>نمابر: </strong><?php echo get_option('Fax'); ?></li>
					</td>
				</tr>
				<tr>
					<td colspan="22" class="title-tbl center"> مشخصات خریدار</td>
				</tr>
				<tr>
					<td colspan="12">
						<li><strong>نام شخص حقیقی / حقوقی: </strong><?php echo $res4[0]['c_name']." ".$res4[0]['c_family']; ?></li>
						<li><strong>استان: </strong><?php echo $res4[0]['c_state']; ?> &nbsp; <strong>شهرستان: </strong><?php echo $res4[0]['c_county']; ?></li>
						<li><strong>نشانی: </strong> <?php echo $res4[0]['c_oaddress']; ?></li>
					</td>
					<td colspan="5">
						<li><strong>شماره اقتصادی: </strong> <?php echo per_number($res4[0]['c_economic']); ?></li>
						<li><strong>کد پستی ۱۰ رقمی: </strong> <?php echo per_number($res4[0]['c_postalcode']); ?></li>
						<li><strong>شماره ملی: </strong> <?php echo per_number($res4[0]['c_national']); ?></li>
					</td>
					<td colspan="5">
						<?php
						if($res4[0]['c_account']=="legal_person"){ ?>
						<li><strong>شماره ثبت: </strong> <?php echo per_number($res4[0]['c_registernumber']); ?></li>
						<?php
						} ?>
						<li><strong>شهر: </strong><?php echo per_number($res4[0]['c_city']); ?></li>
						<li><strong>تلفن: </strong><?php echo per_number($res4[0]['c_phone']); ?> &nbsp; <strong>نمابر: </strong><?php echo per_number($res4[0]['c_fax']); ?></li>
					</td>
				</tr>
				<tr>
					<td colspan="22" class="title-tbl center"> مشخصات کالا یا خدمات</td>
				</tr>
				<tr class="title-fact center">
					<td colspan="1"><strong>ردیف</strong></td>
					<td colspan="3"><strong>شرح کالا یا خدمات</strong></td>
					<td colspan="2"><strong>دانه بندی</strong></td>
					<td colspan="2"><strong>مقدار</strong></td>
					<td colspan="2"><strong>واحد</strong></td>
					<td colspan="2"><strong>مبلغ واحد (ریال)</strong></td>
					<td colspan="2"><strong>مبلغ کل (ریال)</strong></td>
					<td colspan="2"><strong>مبلغ تخفیف</strong></td>
					<td colspan="2"><strong>مبلغ کل پس از تخفیف (ریال)</strong></td>
					<td colspan="2"><strong>جمع مالیات و عوارض (ریال)</strong></td>
					<td colspan="2"><strong>جمع مبلغ کل بعلاوه مالیات و عوارض (ریال)</strong></td>
				</tr>
				<?php
				$i = 1;
				$total = 0;
				$tax = 0;
				$a = 0;
				if(count($res2)>0){
					foreach($res2 as $row2){ ?>
				<tr class="center">
					<td colspan="1"><?php echo per_number($i); ?></td>
					<td colspan="3"><?php if($f_type=='مواد اولیه') { echo per_number(get_material_name($row2['p_id'])); } else{ echo per_number(get_product_name($row2['p_id'])); } ?></td>
					<td colspan="2"><?php echo per_number(get_category_name($row2['cat_id'])); ?></td>
					<td colspan="2"><?php echo per_number(number_format($row2['fb_quantity'])); ?></td>
					<td colspan="2"><?php if($f_type=='مواد اولیه') { echo get_material_unit($row2['p_id']); } else{ echo get_product_unit($row2['p_id']); } ?></td>
					<td colspan="2"><?php echo per_number(number_format($row2['fb_price'])); ?></td>
					<td colspan="2"><?php echo per_number(number_format($row2['total_price'])); ?></td>
					<td colspan="2">0</td>
					<td colspan="2"><?php echo per_number(number_format($row2['total_price'])); ?></td>
					<td colspan="2">
						<?php
						if($res3[0]['f_VAT_status']==1){
							$tax += $a;
							$a = value_added_calculation($row2['total_price']);
							echo per_number(number_format($a));
						} else{
							echo "ندارد";
						}
						?>
					</td>
					<td colspan="2">
						<?php
						$b = $a + $row2['total_price'];
						$total += $b;
						echo per_number(number_format($b)); ?>
					</td>
				</tr>
				<?php
				} ?>
				<tr class="center">
					<td colspan="12"class="left">جمع کل قابل پرداخت</td>
					<td colspan="2"><?php echo per_number(number_format($row2['total_price'])); ?></td>
					<td colspan="2"><?php echo per_number(0); ?></td>
					<td colspan="2"></td>
					<td colspan="2"><?php echo per_number(number_format($tax)); ?></td>
					<td colspan="2" style="font-weight:bold;font-size:14pt;"><?php echo per_number(number_format($b)); ?></td>
				</tr>		
				<tr>
					<td colspan="12"><strong>شرایط و نحوه فروش: </strong> <?php echo $res3[0]['f_payment']; ?> </td>
					<td colspan="12" rowspan="3"  class="center"><strong>مدت زمان تحویل کالا: </strong><?php echo per_number($row2['delivery_time']); ?> </td>
				</tr>
				<tr>
					<td colspan="12" rowspan="2"><strong>توضیحات: </strong> <?php if(count($res5)>0){ echo $res5[0]['fd_text']; } else { echo "ندارد";} ?> </td>		
				</tr>
			</tbody>
		</table>
		<div class="row">
		
		
			<div class="col-xs-12">
				<div class="table-responsive">
					<table class="tbl-Signature center">
						<tr>
							<th style="width:34%">امضای مسئول فروش</th>
							<th style="width:33%">امضای مسئول مالی</th>
							<th style="width:33%">امضای مدیر</th>
						</tr>
						<tr>
							<td style="height:100px"><?php get_factor_signature("fb_verify_customer", "factor_body", $fb_id); ?></td>
							<td style="height:100px"><?php get_factor_signature("fb_verify_finan", "factor_body", $fb_id); ?></td>
							<td style="height:100px"><?php get_factor_signature("fb_verify_admin1", "factor_body", $fb_id); ?></td>
						</tr>
					</table>
				</div>
			</div>
		</div>
		<div class="row no-print">
			<div class="col-xs-12 invoice-col invoice-col-fixer">
				<button type="button" class="btn btn-default pull-right" id="confirm-factor-printer"><i class="fa fa-print"></i> چاپ پیش فاکتور</button>
			</div>
		</div>
		<?php
	}
}

function value_added_calculation($number){
	$num1 = $number*9;
	$num2 = $num1/100;
	return $num2;
}