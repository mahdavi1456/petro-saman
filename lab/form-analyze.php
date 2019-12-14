<?php include"../header.php"; include"../nav.php"; $aru = new aru(); ?> 
	<div class="content-wrapper">
		<?php
		breadcrumb("" , "lab/list-analyze.php");
		if(isset($_GET['cycle']) && isset($_GET['cycle_id'])){
			$analyze_form = 0;
			$cycle = $_GET['cycle'];
			$cycle_id = $_GET['cycle_id'];
			$cat_id = "";
			$af_category = "";
			$fb_id ="";
			if($cycle == "sell"){
				$fb_id = get_var_query("select fb_id from bar_bring where bar_id = $cycle_id");
			
				//$cat_id = $aru->field_by_type("factor_body", "cat_id", "fb_id", $fb_id, "int");
				$cat_id = get_var_query("select cat_id from factor_body where fb_id = $fb_id");
				$f_id = get_var_query("select f_id from factor_body where fb_id = $fb_id");
				$c_id = get_var_query("select c_id from factor where f_id = $f_id");
				
				$c_name = get_var_query("select c_company from customer where c_id = $c_id");
				$c_family = get_var_query("select c_family from customer where c_id = $c_id");
				
				$c_fullname = $c_name . " " . $c_family;
			}else if($cycle == "produce"){
				//$cat_id = $aru->field_by_type("produce", "prc_cat_id", "prc_id", $cycle_id, "int");	
				$cat_id = get_var_query("select prc_cat_id from produce where prc_id = $cycle_id");
			}else if($cycle == "buy"){
				$fb_id = get_var_query("select fb_id from bar_bring where bar_id = $cycle_id");
				$cat_id = get_var_query("select cat_id from factor_buy_body where fb_id = $fb_id");
				//$cat_id = $aru->field_by_type("produce", "prc_cat_id", "prc_id", $cycle_id, "int");	
			}else if($cycle == "other"){
				$cat_id = get_var_query("select cat_id from other_analyze where oa_id = $cycle_id");
				//$cat_id = $aru->field_by_type("produce", "prc_cat_id", "prc_id", $cycle_id, "int");	
			}
			if($cat_id !="" ){
			$af_category = get_var_query("select cat_name from category where cat_id = $cat_id");
			//$af_category = $aru->field_by_type("category", "cat_name", "cat_id", $cat_id, "int");
			}
			
			$analyze_form_res = get_select_query("select * from analyze_form where cycle = '$cycle' and cycle_id = $cycle_id order by cycle_id desc");
			if(count($analyze_form_res) > 0){
				
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
				
				$carbon_percent = 100 - $ash_percent - $humidity_percent - $escape_percent;
				
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

			if(isset($_POST['add-analyze_form'])){
				$analyze_id = get_fl_analyze_id($_POST['cycle_id']);
				set_fl_analyze_id($analyze_id, $_POST['cycle_id']);
				$l_details = "فرم آزمایشگاه";
				if($fb_id != "" && $cycle == "sell"){
				update_a_row_log_factor( $fb_id ,  $l_details );
				}
				if($fb_id != "" && $cycle == "buy"){
				update_a_row_buy_log_factor( $fb_id ,  $l_details );
				}
			}
			if(isset($_POST['update-analyze_form'])){
				$analyze_id = get_fl_analyze_id($_POST['cycle_id']);
				set_fl_analyze_id($analyze_id, $_POST['cycle_id']);
				$aru->update("analyze_form", $_POST, "cycle_id", $cycle_id);
				$l_details = "ویرایش فرم آزمایشگاه";
				if($fb_id != ""  && $cycle == "sell"){
					update_a_row_log_factor( $fb_id ,  $l_details );	
					}
					if($fb_id != "" && $cycle == "buy"){
						update_a_row_buy_log_factor( $fb_id ,  $l_details );
					}
			}
		}
		?>
		<section class="content">
		<form action="" method="post" id="print_lab_table">
			<input type="hidden" name="cycle" value="<?php echo $cycle; ?>">
			<input type="hidden" name="cycle_id" value="<?php echo $cycle_id; ?>">
			<section class="col-xs-12 no-padd" id="trasfer-form">
				<div class="box" id="trasfer_form_print">
					<div class="box-body no-padding">
						<table class="col-xs-12 table-responsive analyze_table">
							<thead>
								<tr>
									<th style="background: #f9f9f9" colspan="4" class="bold">اطلاعات کلی آزمون</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<th class="bold">تاریخ دریافت نمونه</th>
									<td class="editable"><input type="text" tabindex="1" autocomplete="off" id="sample_in_date" name="sample_in_date" class="analyze_table_in date_picker_class" value="<?php if($analyze_form) echo $analyze_form['sample_in_date']; ?>"></td>
									<th class="bold">دمای محیط</th>
									<td class="editable"><input type="text" tabindex="4" id="temprature" name="temprature" class="analyze_table_in" value="<?php if($analyze_form) echo $analyze_form['temprature']; ?>"></td>
								</tr>
								<tr>
									<th class="bold">تاریخ انجام آزمون</th>
									<td class="editable"><input type="text" tabindex="2" autocomplete="off" id="analyze_date" name="analyze_date" class="analyze_table_in date_picker_class" value="<?php if($analyze_form) echo $analyze_form['analyze_date']; ?>"></td>
									<th class="bold">رطوبت محیط</th>
									<td class="editable"><input type="text" tabindex="5" id="humidity" name="humidity" class="analyze_table_in" value="<?php if($analyze_form) echo $analyze_form['humidity']; ?>"></td>
								</tr>
								<tr>
									<th class="bold">نمونه گیری توسط</th>
									<td class="editable"><input type="text" tabindex="3" id="analyzer" name="analyzer" class="analyze_table_in" value="<?php if($analyze_form) echo $analyze_form['analyzer']; ?>"></td>
									<?php
									if($cycle == "sell"){
										?>
										<th class="bold">نام مشتری</th>
										<td class="editable"><input readonly type="text" class="analyze_table_in" value="<?php echo $c_fullname; ?>"></td>
										<?php
									}
									?>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
			</section>
			<section class="col-xs-12 no-padd" id="trasfer-form">
				<div class="box" id="trasfer_form_print">
					<div class="box-body no-padding">
						<table class="col-xs-12 table-responsive analyze_table">
							<thead>
								<tr>
									<th style="background: #f9f9f9" colspan="9" class="bold">درصد خاکستر</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<th rowspan="2" class="bold">توزین قبل کوره</th>
									<th class="bold">وزن خالی ناسل</th>
									<td colspan="2" class="editable"><input type="text" tabindex="6" id="an_empty_weight" name="an_empty_weight" class="analyze_table_in" value="<?php if($analyze_form) echo $analyze_form['an_empty_weight']; ?>"></td>
									<th rowspan="2" class="bold">توزین بعد از کوره</th>
									<th class="bold">وزن پر ناسل</th>
									<td class="editable"><input type="text" tabindex="8" id="an_full_weight" name="an_full_weight" class="analyze_table_in" value="<?php if($analyze_form) echo $analyze_form['an_full_weight']; ?>"></td>
									<th rowspan="2" class="bold">درصد خاکستر</th>
									<td rowspan="2"><input readonly type="text" id="ash_percent" class="analyze_table_in" value="<?php if($analyze_form) echo $ash_percent; ?>"></td>
								</tr>
								<tr>
									<th class="bold">وزن خالص مواد</th>
									<td colspan="2" class="editable"><input type="text" tabindex="7" id="am_empty_weight" name="am_empty_weight" class="analyze_table_in" value="<?php if($analyze_form) echo $analyze_form['am_empty_weight']; ?>"></td>
									<th class="bold">وزن خالص مواد</th>
									<td><input readonly type="text" id="am_full_weight" class="analyze_table_in" value="<?php if($analyze_form) echo $am_full_weight; ?>"></td>
								</tr>
							</tbody>
							<thead>
								<tr>
									<th style="background: #f9f9f9" colspan="9" class="bold">درصد رطوبت</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<th rowspan="2" class="bold">توزین قبل Oven</th>
									<th class="bold">وزن خالی بیوکس</th>
									<td colspan="2" class="editable"><input type="text" tabindex="9" id="hb_empty_weight" name="hb_empty_weight" class="analyze_table_in" value="<?php if($analyze_form) echo $analyze_form['hb_empty_weight']; ?>"></td>
									<th rowspan="2" class="bold">توزین بعد از Oven</th>
									<th class="bold">وزن پر بیوکس</th>
									<td class="editable"><input type="text" tabindex="11" id="hb_full_weight" name="hb_full_weight" class="analyze_table_in" value="<?php if($analyze_form) echo $analyze_form['hb_full_weight']; ?>"></td>
									<th rowspan="2" class="bold">درصد رطوبت</th>
									<td rowspan="2"><input readonly type="text" id="humidity_percent" class="analyze_table_in" value="<?php if($analyze_form) echo $humidity_percent; ?>"></td>
								</tr>
								<tr>
									<th class="bold">وزن خالص مواد</th>
									<td colspan="2" class="editable"><input type="text" tabindex="10" id="hm_empty_weight" name="hm_empty_weight" class="analyze_table_in" value="<?php if($analyze_form) echo $analyze_form['hm_empty_weight']; ?>"></td>
									<th class="bold">وزن خالص مواد</th>
									<td><input readonly type="text" id="hm_pure_weight" class="analyze_table_in" value="<?php if($analyze_form) echo $hm_pure_weight; ?>"></td>
								</tr>
							</tbody>
							<thead>
								<tr>
									<th style="background: #f9f9f9" colspan="9" class="bold">درصد مواد فرار</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<th rowspan="2" class="bold">توزین قبل کوره</th>
									<th class="bold">وزن خالی کروزه</th>
									<td colspan="2" class="editable"><input type="text" tabindex="12" id="ec_empty_weight" name="ec_empty_weight" class="analyze_table_in" value="<?php if($analyze_form) echo $analyze_form['ec_empty_weight']; ?>"></td>
									<th rowspan="2" class="bold">توزین بعد از کوره</th>
									<th class="bold">وزن پر کروزه</th>
									<td class="editable"><input type="text" tabindex="14" id="ec_full_weight" name="ec_full_weight" class="analyze_table_in" value="<?php if($analyze_form) echo $analyze_form['ec_full_weight']; ?>"></td>
									<th rowspan="2" class="bold">درصد مواد فرار</th>
									<td rowspan="2"><input readonly type="text" id="escape_percent" class="analyze_table_in" value="<?php if($analyze_form) echo $escape_percent; ?>"></td>
								</tr>
								<tr>
									<th class="bold">وزن خالص مواد</th>
									<td colspan="2" class="editable"><input type="text" tabindex="13" id="em_empty_weight" name="em_empty_weight" class="analyze_table_in" value="<?php if($analyze_form) echo $analyze_form['em_empty_weight']; ?>"></td>
									<th class="bold">وزن خالص مواد</th>
									<td><input readonly type="text" id="em_pure_weight" class="analyze_table_in" value="<?php if($analyze_form) echo $em_pure_weight; ?>"></td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
			</section>
			<section class="col-xs-12 no-padd" id="trasfer-form">
				<div class="col-xs-6">
					<div class="box" id="trasfer_form_print">
						<div class="box-body no-padding">
							<table class="col-xs-12 table-responsive analyze_table">
								<tbody>
									<tr>
										<th class="bold">درصد گوگرد</th>
										<td class="editable"><input type="text" tabindex="15" id="sulfur_percent" name="sulfur_percent" class="analyze_table_in" value="<?php if($analyze_form) echo $analyze_form['sulfur_percent']; ?>"></td>
									</tr>
									<tr>
										<th class="bold">درصد کربن</th>
										<td><input readonly type="text" id="carbon_percent" class="analyze_table_in" value="<?php if($analyze_form) echo $carbon_percent; ?>"></td>
									</tr>
								</tbody>
							</table>
						</div>
						<div class="box-body no-padding">
							<?php $check = get_var_query("select count(analyze_id) from analyze_form where cycle = '$cycle' and cycle_id = $cycle_id"); ?>
							<?php if($check > 0){ ?>
							<input type="submit" class="btn btn-sm btn-primary" name="update-analyze_form" value="ویرایش">
							<?php }else{ ?>
							<input type="submit" class="btn btn-sm btn-primary" name="add-analyze_form" value="ذخیره">
							<?php } ?>
							<input type="button" class="btn btn-sm btn-default" id="printer_lab_table" value="چاپ">
						</div>
					</div>
				</div>
				<div class="col-xs-6">
					<div class="box" id="trasfer_form_print">
						<div class="box-body no-padding">
							<table class="col-xs-12 table-responsive analyze_table">
								<tbody>
									<tr>
										<th rowspan="2" class="bold">دانه بندی</th>
										<th class="bold">وزن مواد</th>
										<th dir="ltr" class="bold"><?php echo $af_category; ?> <</th>
										<th dir="ltr" class="bold"><?php echo $af_category; ?> .</th>
										<th dir="ltr" class="bold"><?php echo $af_category; ?> ></th>
									</tr>
									<tr>
										<td class="editable"><input type="text" tabindex="16" id="gm_weight" name="gm_weight" class="analyze_table_in" value="<?php if($analyze_form) echo $analyze_form['gm_weight']; ?>"></td>
										<td class="editable"><input type="text" tabindex="17" id="gm_less_weight" name="gm_less_weight" class="analyze_table_in" value="<?php if($analyze_form) echo $analyze_form['gm_less_weight']; ?>"></td>
										<td class="editable"><input type="text" tabindex="18" id="gm_dot_weight" name="gm_dot_weight" class="analyze_table_in" value="<?php if($analyze_form) echo $analyze_form['gm_dot_weight']; ?>"></td>
										<td class="editable"><input type="text" tabindex="19" id="gm_more_weight" name="gm_more_weight" class="analyze_table_in" value="<?php if($analyze_form) echo $analyze_form['gm_more_weight']; ?>"></td>
									</tr>
									<tr>
										<th class="bold"><?php echo $af_category; ?></th>
										<th class="bold">درصد</th>
										<th class="bold">درصد مواد بالا</th>
										<th class="bold">درصد مواد محدوده</th>
										<th class="bold">درصد مواد پایین</th>
									</tr>
									<tr>
										<td></td>
										<td><input readonly type="text" id="g_percent" class="analyze_table_in" value="100"></td>
										<td><input readonly type="text" id="gm_up_percent" class="analyze_table_in" value="<?php if($analyze_form) echo $gm_up_percent; ?>"></td>
										<td><input readonly type="text" id="gm_area_percent" class="analyze_table_in" value="<?php if($analyze_form) echo $gm_area_percent; ?>"></td>
										<td><input readonly type="text" id="gm_down_percent" class="analyze_table_in" value="<?php if($analyze_form) echo $gm_down_percent; ?>"></td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</section>
		</form>
		</section>
		
	</div>
<script src="<?php get_url(); ?>user/jquery-print.js"></script>
<script src="<?php get_url(); ?>/lab/js/analyze.js"></script>
<?php include"../left-nav.php"; include"../footer.php"; ?>