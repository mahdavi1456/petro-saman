<?php $title = "ثبت فاکتور جدید"; include"../header.php"; include"../nav.php";
include"back.php";
require_once"../customer/functions.php";
require_once"../product/functions.php";
require_once"../category/functions.php";
$user = new user();
//$f_type="";
//$aru = new aru();
//$aru->field_by_type("raw_material", "rm_name", "rm_id", $l['rm_id'], "int");
if(isset($_GET['fb_id'])){
	$fb_id = $_GET['fb_id'];
	$res4 = get_select_query("select * from  factor_body  where fb_id=$fb_id");
	$fd_id = $res4[0]['fd_id'];
	$fb_quantity = $res4[0]['fb_quantity'];
	$fb_price = $res4[0]['fb_price'];
	$total_price = $res4[0]['total_price'];
	$p_id = $res4[0]['p_id'];
	$cat_id = $res4[0]['cat_id'];
	$delivery_time = $res4[0]['delivery_time'];
}else{
	$fd_id = "";
	$fb_quantity = "";
	$fb_price = "";
	$total_price = "";
	$p_id = "";
	$cat_id = "";
	$delivery_time = "";
}
?>
	<script type="text/javascript" src="<?php get_url(); ?>factor/js/factor.js"></script>
		<div class="content-wrapper">	
			<?php breadcrumb("پیشنهاد فروش"); ?>
			<section class="content">
				<div class="row">
					<div id="details" class="col-md-12">	
						<div class="box">
							<div class="box-header">
								<h3 class="box-title">ثبت پیشنهاد فروش</h3>
							</div>
							<div class="box-body">
								<?php
								if(isset($_POST['del-fb'])){
									$fb_id = $_POST['del-fb'];
									delete_factor_body($fb_id);
									alert("success", "آیتم با موفقیت حذف شد");
									$l_details = "حذف فاکتور فروش";
									update_a_row_log_factor( $fb_id ,  $l_details );	
								}
								if(isset($_POST['update_fb'])){
									$fb_id = $_GET['fb_id'];
									$f_id = $_GET['f_id'];
									$p_id = $_POST['p_id'];
									$cat_id = $_POST['cat_id'];
									$fb_quantity = $_POST['fb_quantity'];
									$fb_price = $_POST['fb_price'];
									$total_price = $_POST['total_price'];
									$fd_text = $_POST['fd_text'];
									$delivery_time = $_POST['delivery_time'];
									$sql = "update factor_body set delivery_time = '$delivery_time' , cat_id = '$cat_id' , f_id= '$f_id' , p_id= '$p_id' , cat_id='$cat_id' , fb_quantity='$fb_quantity', fb_price='$fb_price', total_price='$total_price' , fd_id='$fd_text'    where fb_id = $fb_id";
									$res = ex_query($sql);
									$l_details = "ویرایش فاکتور فروش";
									update_a_row_log_factor( $fb_id ,  $l_details );	
									echo "<meta http-equiv='refresh' content='0'/>";
								}
								if(isset($_POST['update-factor'])){
									$f_id = $_GET['f_id'];
									$c_id = $_POST['c_id'];
									$f_date = $_POST['f_date'];
									$u_id = $_POST['u_id'];
									$f_VAT_status = $_POST['f_VAT_status'];
									$f_payment = $_POST['f_payment'];
									$sql = "update factor set c_id = '$c_id' , f_date= '$f_date' , u_id='$u_id' , f_VAT_status='$f_VAT_status', f_payment='$f_payment'    where f_id = $f_id";
									$res = ex_query($sql);
									echo "<meta http-equiv='refresh' content='0'/>";
								}
								if(isset($_POST['set_fb'])){
									$f_id = $_GET['f_id'];
									$p_id = $_POST['p_id'];
									$cat_id = $_POST['cat_id'];
									$fb_quantity = $_POST['fb_quantity'];
									$fb_price = $_POST['fb_price'];
									$total_price = $_POST['total_price'];
									$fd_text = $_POST['fd_text'];
									$delivery_time = $_POST['delivery_time'];
									$array = array();
									array_push($array, $f_id);
									array_push($array, $p_id);
									array_push($array, $cat_id);						
									array_push($array, $fb_quantity);
									array_push($array, $fb_price);
									array_push($array, $total_price);
									array_push($array, $fd_text);
									array_push($array, $delivery_time);
									$fb_id = insert_factor_body($array);
									$type = "financial1";
									//send_sms_confirm($fb_id, $type);
									$l_details = "افزودن فاکتور فروش";
									update_a_row_log_factor( $fb_id ,  $l_details );	
									alert("success", "ردیف کالا با موفقیت ثبت شد");
								}
								if(isset($_POST['add-factor'])){
									$c_id = $_POST['c_id'];
									$f_date = $_POST['f_date'];
									$u_id = $_POST['u_id'];
									$f_type = $_POST['f_type'];
									$f_VAT_status = $_POST['f_VAT_status'];
									$f_payment = $_POST['f_payment'];
									$st_id_to = $_POST['st_id_to'];
									$list = array();
									array_push($list, $c_id);
									array_push($list, $f_date);
									array_push($list, $u_id);
									array_push($list, $f_type);
									array_push($list, $f_payment);
									array_push($list, $st_id_to);
									if($f_VAT_status == 1){
										$f_id = insert_VAT_factor_factor($list);
										$url = get_url() . "reg-factor.php?f_id=" . $f_id;
									} else {
										$f_id = insert_factor_factor($list);
										$url = get_url() . "reg-factor.php?f_id=" . $f_id;
									}
									?>
									<script type="text/javascript">
										window.location.href = "<?php echo $url; ?>";
									</script>
								<?php
								}
					
								if(isset($_GET['f_id'])){
									$f_id = $_GET['f_id'];
									$list = get_select_query("select * from factor where f_id = $f_id");
									if(count($list)>0){
										$f_date = $list[0]['f_date'];
										$c_id = $list[0]['c_id'];
									}									
								} else {
									$f_date = "";
									$c_id = "";									
								}
				
								if(isset($_GET['f_id'])){
									$f_id = $_GET['f_id'];
									$sql1 = "select * from factor where f_id = $f_id";
									$res1 = get_select_query($sql1);
									if(count($res1) > 0){
										$f_type = $res1[0]['f_type'];
										$c_id = $res1[0]['c_id'];
										$f_date = $res1[0]['f_date'];
										$st_id = $res1[0]['st_id'];
									}
								} else {
									$f_type = 0;
									$c_id = 0;
									$f_date = 0;
									$st_id = 0;
								}
								?>
								<form action="" method="post">
									<input type="hidden" name="u_id" value="<?php echo $_SESSION['user_id']; ?>">
									<div class="row">
									<?php
									if(isset($_GET['fb_id'])){
										
									} else { ?>
										<div class="item col-md-2">
											<label>نوع محصول</label>
											<select class="form-control" name="f_type">
												<option <?php if($f_type == 'محصول جانبی') { echo ' selected'; } ?> value="محصول جانبی">محصول جانبی</option>
												<option <?php if($f_type == 'ماده اولیه') { echo ' selected'; } ?> value="ماده اولیه">ماده اولیه</option>
												<option <?php if($f_type == 'محصول') { echo ' selected'; } ?> value="محصول">محصول</option>
											</select>
										</div>
									<?php
									} ?>
										<div class="item col-md-2">
											<label>نام مشتری</label>
											<select name="c_id" class="form-control select2" id="customer_id">
												<?php
												$res = 0;
												$res = get_select_query("select * from customer");
												if(count($res) > 0){
													foreach($res as $row){ ?>
														<option <?php if($row['c_id']==$c_id) echo "selected"; ?> value="<?php echo $row['c_id']; ?>"><?php echo get_customer_name($row['c_id']); ?></option>
													<?php
													}
												}
												?>
											</select>
										</div>
										<div class="item col-md-2">
											<label>انبار</label>
											<select class="form-control" name="st_id_to" id="storage_change">
												<?php
												$res_st = get_select_query("select * from storage_list");
												if(count($res_st) >0){
													foreach($res_st as $row_st){
														?>
														<option <?php if($row_st['st_id'] == $st_id) echo "selected"; ?> value="<?php echo $row_st['st_id']; ?>"><?php echo $row_st['st_name']; ?></option>
														<?php
													}
												}
												?>
											</select>
										</div>
										<div class="item col-md-2">
											<label>تاریخ صدور</label>
											<input value="<?php if(isset($_GET['f_id'])){ echo $f_date; } else{ echo jdate("Y/n/j"); } ?>" autocomplete="off" type="text" id="f_date" name="f_date" placeholder="تاریخ صدور" class="form-control" required>
										</div>
										<div class="item col-md-2">
											<label>ارزش افزوده</label>
											<select class="form-control" name="f_VAT_status">
												<option <?php if(isset($_GET['f_id'])){ if($res1[0]['f_VAT_status'] == 1) { echo 'selected';} }?> value="1">دارد</option>
												<option <?php if(isset($_GET['f_id'])){ if($res1[0]['f_VAT_status'] == 0) { echo 'selected';} }?> value="0">ندارد</option>
											</select>
										</div>
										<div class="item col-md-2">
											<label>نحوه پرداخت</label>
											<select class="form-control" name="f_payment">
												<option value="نقدی" <?php if(isset($_GET['f_id'])){ if($res1[0]['f_payment'] == 'نقدی') { echo 'selected';} }?> >نقدی</option>
												<option value="غیر نقدی" <?php if(isset($_GET['f_id'])){ if($res1[0]['f_payment'] == 'غیر نقدی') { echo 'selected';} }?> >غیر نقدی</option>
											</select>
										</div>
										<?php
										$u_level = $user->get_current_user_level();
										if(isset($_GET['fb_id'])) { ?>
											<div class="col-md-12 text-center">
											<?php
												if($u_level == "بازرگانی" || $u_level == "مدیریت"){ ?>
												<button type="submit" class="btn btn-success btn-lg" name="update-factor">ویرایش سر فاکتور</button>
												<?php }
												else{ ?>
													<button type="submit" class="btn btn-success btn-lg"  disabled>ویرایش سر فاکتور</button>
												<?php } ?>
											</div>
										<?php
										} else { ?>
											<div class="col-md-12 text-center">
											<?php 
											if($u_level == "بازرگانی" || $u_level == "مدیریت"){ ?>
												<button type="submit" class="btn btn-success btn-lg" name="add-factor">ساخت سر فاکتور</button>
												<?php }
											else{ ?>
												<button type="submit" class="btn btn-success btn-lg"  disabled>ساخت سر فاکتور</button>
											<?php } ?>
											</div>
										<?php
										} ?>
									</div><br>
								</form>
								<script src="<?php get_url(); ?>include/media/script.js"></script>
								<?php
								if(isset($_GET['f_id'])){
									$f_id = $_GET['f_id']; ?>
										<form action="" method="post">
										<input type="hidden" name="u_id" value="<?php echo $_SESSION['user_id']; ?>">
											<div class="row">
												<div class="box-header">
													<h3 class="col-md-12">بدنه فاکتور</h3>
												</div>
												<div class="item col-md-3">
													<label>نام  محصول</label>
													<select class="form-control" id="p_id" name="p_id">
														<?php
														$f_type=$res1[0]['f_type'];
															$sql = "select * from product";
															$res = get_select_query($sql);
															if(count($res) > 0) {
																foreach($res as $row) { ?>
																	<option value="<?php echo $row['p_id']; ?>"  <?php if(isset($_GET['fb_id'])){ if($p_id==$row['p_id']){ echo 'selected'; } } ?>><?php echo $row['p_name']; ?></option>
																<?php
																}
															}
														?>
													</select>
												</div>
												<div class="item col-md-2">
													<label>دانه بندی</label>
													<?php show_category_as_select($cat_id); ?>
													<div id="cat_id_result"></div>
												</div>		
												<div class="item col-md-2">
													<label>مقدار</label>
													<input value="<?php echo $fb_quantity; ?>"  id="fb_quantity" type="text" name="fb_quantity" onkeyup="javascript:FormatNumber('fb_quantity','fb_quantity2'); calculate()" placeholder="مقدار" class="form-control" autocomplete="off" required>
													<input id="fb_quantity2" type="text" class="form-control" disabled="disabled" style="margin: 0;" />
												</div>
												<div class="item col-md-2">
													<label>قیمت به ریال</label>
													<input value="<?php echo $fb_price;  ?>"  id="fb_price" type="text" name="fb_price" onkeyup="javascript:FormatNumber('fb_price','fb_price2'); calculate()" placeholder="قیمت به ریال" class="form-control" autocomplete="off" required>
													<input id="fb_price2" type="text" class="form-control" disabled="disabled" style="margin: 0;" />
												</div>
												<div class="item col-md-3">
													<label>قیمت کل</label>
													<input  value="<?php echo $total_price;  ?>"  id="total_price" type="text" name="total_price" onkeyup="javascript:FormatNumber('total_price','total_price2');" placeholder="قیمت کل" class="form-control" autocomplete="off" readonly>
													<input id="total_price2" type="text" class="form-control" disabled="disabled" style="margin: 0;" />
												</div>
											</div>
											<div class="row">						
												<div class="item col-md-6">
													<label>توضیحات</label>
													<select class="form-control" name="fd_text">
														<option value="0"></option>
														<?php
														$res5 = get_select_query("select * from factor_description");
														if(count($res5) > 0){
															foreach($res5 as $row5){ ?>
																<option value="<?php echo $row5['fd_id']; ?>" <?php if($fd_id == $row5['fd_id']) { echo 'selected'; } ?> ><?php echo $row5['fd_text']; ?></option>
															<?php
															}
														}
														?>
													</select> 
												</div>
												<div class="item col-md-6">
													<label>مدت زمان تحویل</label>
													<input value="<?php echo $delivery_time; ?>" id="delivery_time" type="text" name="delivery_time"  placeholder="مدت زمان تحویل" class="form-control" autocomplete="off">
												</div>
											</div>
											<div class="row">
												<div class="col-md-12 text-center">
													<?php
													if(isset($_GET['fb_id'])) { 
														if($u_level == "بازرگانی" || $u_level == "مدیریت"){ ?>
															<button type="submit" class="btn btn-success btn-lg" name="update_fb">ویرایش بدنه فاکتور</button>
														<?php }
														else{ ?>
															<button type="submit" class="btn btn-success btn-lg" disabled>ویرایش بدنه فاکتور</button>
														<?php }
														} 
													else { ?>
														<button type="submit" class="btn btn-success btn-lg" name="set_fb">ثبت ردیف</button>
													<?php
													} ?>
												</div>
											</div>
										</div>
									</form>
									<?php
									if(isset($_GET['fb_id'])) {
									} else { ?>
										<div class="row">
											<div class="col-md-12">
												<div class="box">
													<div class="box-header">
														<h3 class="box-title">بدنه فاکتور</h3>
													</div>
													<div class="box-body table-responsive no-padding">
														<table class="table table-hover">
															<tbody>
																<tr>
																	<th>ردیف</th>
																	<th>نوع محصول</th>
																	<th>نام محصول</th>
																	<th>دانه بندی</th>
																	<th>مقدار</th>
																	<th>قیمت</th>
																	<th>قیمت کل</th>
																	<th>حذف</th>
																</tr>
																<?php
																$i = 1;
																$list = get_factor_body_factor($f_id);
																if(count($list)){
																	foreach($list as $l){ ?>
																	<tr>                   
																		<td><?php echo per_number($i);?></td>
																		<td><?php echo $f_type; ?></td>
																		<td>
																			<?php
																			if($f_type=="مواد اولیه"){
																				echo get_material_name($l['p_id']);
																			} else {
																				echo get_product_name($l['p_id']);
																			} ?>
																		</td>
																		<td><?php echo per_number(get_category_name($l['cat_id'])); ?></td>
																		<td><?php echo per_number(number_format($l['fb_quantity'])); ?></td>
																		<td><?php echo per_number(number_format($l['fb_price'])); ?></td>
																		<td><?php echo per_number(number_format($l['total_price'])); ?></td>
																		<td>
																			<form onSubmit="if(!confirm('آیا از انجام این عملیات اطمینان دارید؟')){return false;}" action="" method="post">
																				<input type="hidden" name="u_id" value="<?php echo $_SESSION['user_id']; ?>">
																				<button name="del-fb" value="<?php echo $l['fb_id']; ?>" class="btn btn-danger btn-xs"><i class="fa fa-remove"></i></button>
																			</form>
																		</td>
																	</tr>
																	<?php
																	$i++;
																	}
																} else { ?>
																	<tr>                   
																		<td colspan="8" class="text-center">موردی جهت نمایش موجود نیست</td>
																	</tr>
																<?php												
																}
															}
																?>
															</tbody>
														</table>
													</div>
												</div>
											</div>
										</div>
								<?php
								} ?>
						</div>
					</div>
				</div>	
			</section>
		</div>
<?php include"../left-nav.php"; include"../footer.php"; ?>