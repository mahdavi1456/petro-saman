<?php include"../header.php"; include"../nav.php"; ?> 
	<div class="content-wrapper">
		<section class="content-header">
			<ol class="breadcrumb">
				<li><a href="<?php get_url(); ?>index.php"><i class="fa fa-dashboard"></i> خانه</a></li>
				<li><a href="#">انبار</a></li>
				<li class="active">چاپ فرم حواله خروج</li>
			</ol>
		</section>
		<?php 
		require_once"../customer/functions.php";
		require_once"../product/functions.php";
		$bar_id = $_GET['bar_id']; 
		$sql = "select * from bar_bring ba inner join factor_body fb on ba.fb_id = fb.fb_id inner join factor f on fb.f_id = f.f_id where ba.bar_id = $bar_id";
		$res = get_select_query($sql);
		?>
		<section class="content-header">
			<div id="page-wrapper">
				<div class="row">
					<div class="col-lg-12">
						<h1 class="page-header">چاپ فرم حواله خروج</h1>
					</div>
				</div>
			</div>
		</section>
		<div class="col-xs-2 left"></div>
		<section class="col-xs-8" id="trasfer-form">	
			<div class="box" id="trasfer_form_print">
				<div class="box-header">
					<h3 class="box-title">
						<img src="<?php get_url(); ?>/dist/img/azar-logo.png">
					</h3>
				</div>
				<div class="box-body no-padding">
					<?php
					$i=1;
					foreach ($res as $row) {
						$fb_id = $row["fb_id"];
						?>
						<table class="col-xs-12 table-responsive sch_save_table sc_table_center tbl-bar-bring">
							<tr>
								<th style="background: #f9f9f9" colspan="2" class="bold">مجوز ترخیص بار</th>
								<th style="background: #f9f9f9" colspan="2" class="bold">شماره: <?php echo per_number($bar_id); ?></th>
							</tr>
							<tr>
								<td class="bold" colspan="2">مشتری: <?php echo get_customer_name($row['c_id']); ?></td>
								<td class="bold" colspan="2">تاریخ: <?php echo per_number(jdate('Y/m/d H:i')); ?></td>
							</tr>
							<tr>
								<th class="bold">ردیف</th>
								<th class="bold">شرح کالا</th>
								<th class="bold">وزن</th>
								<th class="bold">بسته بندی</th>
							</tr>
							<tr>
								<td><?php echo per_number($i); ?></td>
								<td><?php echo get_product_name($row['p_id']) . " " . per_number(get_category_name($row['cat_id'])); ?></td>
								<td><?php echo per_number(number_format($row['bar_exited'])); ?></td>
								<td>
									<select class="no-border-select">
										<option>جامبو</option>
										<option>کیسه</option>
										<option>فله</option>
									</select>
								</td>
							</tr>
							<tr>
								<th style="background: #f9f9f9" colspan="4">مشخصات تحویل گیرنده</th>
							</tr>
							<tr>
								<th>نام:</th>
								<td colspan="3"><?php echo get_driver_name($row['dr_id']); ?></td>
							</tr>
							<tr>
								<th>خودرو:</th>
								<td><?php echo per_number(get_driver_car($row['dr_id'])); ?></td>
								<th>پلاک:</th>
								<td><?php echo per_number(get_driver_plaque($row['dr_id'])); ?></td>
							</tr>
							<tr>
								<th>کد ملی:</th>
								<td><?php echo per_number(get_driver_national($row['dr_id'])); ?></td>
								<th>تلفن:</th>
								<td><?php echo per_number(get_driver_mobile($row['dr_id'])); ?></td>
							</tr>
							<tr>
								<td colspan="4">کالاهای فوق صحیح و سالم و به صورت کامل تحویل داده شد.</td>
							</tr>
						</table>
						<br>
						<table class="col-xs-12 table-responsive sch_save_table sc_table_center">
							<tr>
								<td>
									تایید بازرگانی 
									<?php get_factor_signature("fb_verify_customer", "factor_body", $fb_id); ?>
								</td>
								<td>
									تایید مالی 
									<?php get_factor_signature("fb_verify_finan", "factor_body", $fb_id); ?>
								</td>
								<td>
									تایید مدیریت 
									<?php get_factor_signature("fb_verify_admin1", "factor_body", $fb_id); ?>
								</td>
							</tr>
						</table>
						<?php
						$i++;
					}
					?>
				</div>
			</div>
			<div>
				<input type="button" id="trasfer_form_printer" value="چاپ" class="btn btn-sm btn-primary">
			</div>
		</section>
		<div class="col-xs-2"></div>
	</div>

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
<script src="<?php get_url(); ?>/storage/js/storage.js"></script>
<script src="<?php get_url(); ?>/storage/js/jquery-print.js"></script>
<?php include"../left-nav.php"; include"../footer.php"; ?>