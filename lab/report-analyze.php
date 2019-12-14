<?php include"../header.php"; include"../nav.php"; $aru = new aru(); ?> 
	<div class="content-wrapper">
	
		<?php breadcrumb("" , "lab/list-analyze.php"); ?>

		<section class="content">
			<div id="analyze_report-print" class="a4">
				<div class="inline-lab-print-form">
					<?php
					$cycle = $_GET['cycle'];
					$cycle_id = $_GET['cycle_id'];
					$analyze_form = 0;
					$cat_id = "";
					$af_category = "";
					if($cycle && $cycle_id){
						if($cycle == "sell"){
							$fb_id = get_var_query("select fb_id from bar_bring where bar_id = $cycle_id");
				
							//$cat_id = $aru->field_by_type("factor_body", "cat_id", "fb_id", $fb_id, "int");
							$cat_id = get_var_query("select cat_id from factor_body where fb_id = $fb_id");
				
							$f_id = get_var_query("select f_id from factor_body where fb_id = $fb_id ");
							$c_id = get_var_query("select c_id from factor where f_id = $f_id");
				
							$c_name = get_var_query("select c_company from customer where c_id = $c_id");
							$c_family = get_var_query("select c_family from customer where c_id = $c_id");
				
							$c_fullname = $c_name . " " . $c_family;
						}
						if($cycle == "buy"){
							$c_fullname = "شرکت پتروسامان آذرتتیس";
							$fb_id = get_var_query("select fb_id from  bar_bring where bar_id = $cycle_id ");
							$cat_id = get_var_query("select cat_id from factor_buy_body where fb_id = $fb_id");
							//$cat_id = $aru->field_by_type("factor_buy_body", "cat_id", "fb_id", $fb_id, "int ");
						}
						else if($cycle == "produce"){
							$cat_id = get_var_query("select prc_cat_id from produce where prc_id = $cycle_id");
							//$cat_id = $aru->field_by_type("produce", "prc_cat_id", "prc_id", $cycle_id, "int");
						}
						else if($cycle == "other"){
							$cat_id = get_var_query("select cat_id from other_analyze where oa_id = $cycle_id");
						}
						if($cat_id !="" ){
							//$af_category = $aru->field_by_type("category", "cat_name", "cat_id", $cat_id, "int");
							$af_category = get_var_query("select cat_name from category where cat_id = $cat_id");
						}
			
						$analyze_form_res = get_select_query("select * from analyze_form where cycle = '$cycle' and cycle_id = $cycle_id order by cycle_id desc");
						if($analyze_form_res){
							$analyze_form = $analyze_form_res[0];
							$am_full_weight = $analyze_form['an_full_weight'] - $analyze_form['an_empty_weight'];
							$hm_pure_weight = $analyze_form['hb_full_weight'] - $analyze_form['hb_empty_weight'];
							$em_pure_weight = $analyze_form['ec_full_weight'] - $analyze_form['ec_empty_weight'];
							$em_empty_weight = $analyze_form['em_empty_weight'];

							if($analyze_form['am_empty_weight'])
								$ash_percent = ( $am_full_weight / $analyze_form['am_empty_weight'] ) * 100;
							else
								$ash_percent = "error";

							if($analyze_form['hm_empty_weight'])
								$humidity_percent = 100 - ( ( $hm_pure_weight / $analyze_form['hm_empty_weight'] ) * 100 );
							else
								$humidity_percent = "error";

							if($analyze_form['em_empty_weight'])
								$escape_percent = 100 - ( ( $em_pure_weight / $em_empty_weight ) * 100 );
								//$escape_percent = 100 - ( ( ( $em_pure_weight - $ash_percent/100 ) / $analyze_form['em_empty_weight'] ) * 100 );
							else
								$escape_percent = "error";
				
							if($ash_percent != "error" && $humidity_percent != "error" && $escape_percent != "error")
								$carbon_percent = 100 - $ash_percent - $humidity_percent - $escape_percent;
							else
								$carbon_percent = "error";
				
							if($analyze_form['gm_weight'])
								$gm_up_percent = round($analyze_form['gm_less_weight'] / $analyze_form['gm_weight'] * 100, 2);
							else
								$gm_up_percent = "error";

							if($analyze_form['gm_weight'])
								$gm_area_percent = round($analyze_form['gm_dot_weight'] / $analyze_form['gm_weight'] * 100, 2);
							else
								$gm_area_percent = "error";

							if($analyze_form['gm_weight'])
								$gm_down_percent = round($analyze_form['gm_more_weight'] / $analyze_form['gm_weight'] * 100, 2);
							else
								$gm_down_percent = "error";
						}
					}
					?>
					<table class="ptable table-responsive text-center">
						<tr>
							<td colspan="2" style="font-size: 18px!important; padding: 5px 0; border-left: none!important">گزارش آزمون کنترل کیفیت</td>
							<td colspan="2" style="font-size: 18px!important; padding: 5px 0; border-right: none!important">Quality Control Analysis Report</td>
						</tr>
					</table>
					<br>
					<table class="ptable table-responsive text-center">
						<tr>
							<td>شماره آزمون:</td>
							<td><?php if($analyze_form) echo per_number($analyze_form['analyze_id']); ?></td>
							<td>نام مشتری:</td>
							<td><?php if($cycle == "sell" || $cycle == "buy") echo $c_fullname; else echo "-"; ?></td>
						</tr>
						<tr>
							<td>تاریخ دریافت نمونه:</td>
							<td><?php if($analyze_form) echo per_number($analyze_form['sample_in_date']); ?></td>
							<td>کد بار</td>
							<td><?php if($cycle == "sell" || $cycle == "buy") echo per_number($cycle_id); else echo "-"; ?></td>
						</tr>
						<tr>
							<td>تاریخ انجام آزمون:</td>
							<td><?php if($analyze_form) echo per_number($analyze_form['analyze_date']); ?></td>
							<td>دما محیط:</td>
							<td><?php if($analyze_form) echo per_number($analyze_form['temprature']); ?></td>
						</tr>
						<tr>
							<td>شماره درخواست:</td>
							<td><?php if($analyze_form) echo per_number($analyze_form['analyze_id']); ?></td>
							<td>رطوبت محیط:</td>
							<td><?php if($analyze_form) echo per_number($analyze_form['humidity']); ?></td>
						</tr>
						<tr>
							<td>تاریخ درخواست:</td>
							<td><?php if($analyze_form) echo per_number($analyze_form['sample_in_date']); ?></td>
							<td>نمونه گیری توسط:</td>
							<td><?php if($analyze_form) echo per_number($analyze_form['analyzer']); ?></td>
						</tr>
					</table>
					<br>			
					<section class="col-xs-12 text-right">
						<h4>آنالیز (صرفا جهت اطلاع)</h4>
						<p style="font-size: 14px!important; font-weight: bold;">نتایج آزمون به شرح زیر می باشد:</p>
					</section>
					<br>
					<table class="ptable table-responsive table-center">
						<tr>
							<th dir="ltr" scope="col" colspan="4" class="active">Composition %</th>
						</tr>
						<tr>
							<td>آزمون</td>
							<td>نام استاندارد</td>
							<td>واحد</td>
							<td>نتیجه</td>
						</tr>
						<tr>
							<td scope="col">C fixed</td>
							<td>ASTM D 3172-12</td>
							<td>درصد</td>
							<td dir="ltr"><?php if($analyze_form) echo per_number(round($carbon_percent, 2)); ?></td>
						</tr>
						<tr>
							<td scope="col">مواد فرار</td>
							<td>ASTM D 3175-17</td>
							<td>درصد</td>
							<td dir="ltr"><?php if($analyze_form) echo per_number(round($escape_percent, 2)); ?></td>
						</tr>
						<tr>
							<td>رطوبت</td>
							<td>ASTM D 3173-11</td>
							<td>درصد</td>
							<td dir="ltr"><?php if($analyze_form) echo per_number(round($humidity_percent, 2)); ?></td>
						</tr>
						<tr>
							<td>خاکستر</td>
							<td>ASTM D 3173-12</td>
							<td>درصد</td>
							<td dir="ltr"><?php if($analyze_form) echo per_number(round($ash_percent, 2)); ?></td>
						</tr>
						<tr>
							<td>گوگرد</td>
							<td>ASTM D 5373-02</td>
							<td>درصد</td>
							<td dir="ltr"><?php if($analyze_form) echo per_number(round($analyze_form['sulfur_percent'], 2)); ?></td>
						</tr>
					</table>
					<br>
					<table class="ptable table-responsive text-center">
						<tr>
							<th dir="ltr" colspan="4" class="active">Size Distribution %</th>
						</tr>
						<tr>
							<td>دانه بندی</td>
							<td dir="ltr"><?php echo $af_category; ?> <</td>
							<td dir="ltr"><?php echo $af_category; ?> .</td>
							<td dir="ltr"><?php echo $af_category; ?> ></td>
						</tr>
						<tr>
							<td dir="ltr"><?php echo $af_category; ?></td>
							<td dir="ltr"><?php if($analyze_form) echo per_number(round($gm_up_percent, 2)); ?> ٪</td>
							<td dir="ltr"><?php if($analyze_form) echo per_number(round($gm_area_percent, 2)); ?> ٪</td>
							<td dir="ltr"><?php if($analyze_form) echo per_number(round($gm_down_percent, 2)); ?> ٪</td>
						</tr>
					</table>
					<br>
					<table class="ptable table-responsive">
						<tr>
							<td>
								* به دلیل اینکه مقدار گوگرد در مقدار مواد فرار و خاکستر لحاظ شده است، در مقدار کربن ثابت به حساب نمی آید.
								<br>
								* باقیمانده نمونه تنها یک هفته نگه داری خواهد شد.
								<br>*نتایج فوق فقط برای نمونه های مورد آزمون قابل استناد است.
							</td>
						</tr>
					</table>
					<br><br>
					<p style="font-size: 16px!important; font-weight: bold; float: left;">واحد کنترل کیفیت شرکت پتروسامان&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</p>
					<section class="col-xs-12 no-print">
						<input type="button" value="چاپ" id="analyze_report-printer" class="btn btn-sm btn-default">
					</section>

				</div>
			</div>
		</section>
	</div>
	<script src="<?php get_url(); ?>user/jquery-print.js"></script>
	<script>
	$(document).ready(function(){
		$('#analyze_report-printer').on('click', function() {
			$.print('#analyze_report-print');
		});
	});
	</script>
	<script src="<?php get_url(); ?>/lab/js/analyze.js"></script>
<?php include"../left-nav.php"; include"../footer.php"; ?>