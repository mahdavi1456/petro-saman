<?php $title = "فاکتور خرید"; include"../header.php"; include"../nav.php"; include"back.php"; $aru = new aru(); $sms = new sms();
include"../secretariat/function.php";
$u_id = $_SESSION['user_id'];
$media = new media();
$user = new user();
?>
<div class="content-wrapper">
	<?php breadcrumb("پیشنهاد خرید"); ?>
	<section class="content">
		<div class="row">
			<div id="details" class="col-md-12">	
				<div class="box">
					<div class="box-header"><h3 class="box-title">ثبت فاکتور خرید</h3></div>
					<div class="box-body">
					<?php
					$u_level = $user->get_current_user_level();
					if(isset($_GET['fb_id'])) {
                		$fb_id = $_GET['fb_id'];
						$res4 = get_select_query("select * from factor_buy_body where fb_id = $fb_id");
						if(count($res4) > 0){
                			$fb_quantity = $res4[0]['fb_quantity'];
                			$fb_price = $res4[0]['fb_price'];
                			$total_price = $res4[0]['total_price'];
                			$ma_id = $res4[0]['ma_id'];
							$cat_id = $res4[0]['cat_id'];
							$delivery_time = $res4[0]['delivery_time'];
							$fd_id = $res4[0]['fd_id'];
						}
            		} else {
                		$fb_quantity = "";
                		$fb_price = "";
                		$total_price = "";
		                $ma_id = "";
						$cat_id="";
						$delivery_time = "";
						$fd_id = "";
						$fd_text = "";
		            }
		            
		            if(isset($_POST['update-factor_buy'])) {
					   	$f_id = $_GET['f_id'];
						$c_id = $_POST['c_id'];
						$f_date = $_POST['f_date'];
						$u_id = $_POST['u_id'];
						$f_VAT_status = $_POST['f_VAT_status'];
						$f_payment = $_POST['f_payment'];
				       	$sql = "update factor_buy set f_payment = '$f_payment' , f_VAT_status = '$f_VAT_status' , c_id = '$c_id' , f_date= '$f_date' , u_id='$u_id'   where f_id = $f_id";
						$res = ex_query($sql);	
					}
			
					if(isset($_POST['update-factor_buy_body'])) {
						$fb_id = $_GET['fb_id'];
						$f_id = $_GET['f_id'];
						$ma_id = $_POST['ma_id'];
						$cat_id = $_POST['cat_id'];
						$fb_quantity = $_POST['fb_quantity'];
						$fb_price = $_POST['fb_price'];
						$total_price = $_POST['total_price'];
						$fd_id = $_POST['fd_id'];
						$delivery_time =  $_POST['delivery_time'];
						$sql = "update factor_buy_body set delivery_time = '$delivery_time' , fd_id = '$fd_id' , cat_id = '$cat_id' , f_id= '$f_id' , ma_id= '$ma_id' , fb_quantity='$fb_quantity', fb_price='$fb_price', total_price='$total_price'   where fb_id = $fb_id";
						$res = ex_query($sql);
						$l_details = "ویرایش فاکتور خرید";
						update_a_row_buy_log_factor($fb_id, $l_details);
					}
			
					if(isset($_POST['update-media'])) {
						$fb_id = $_POST['update-media'];
						$mf_name = $_POST['name_f'];
						$mf_type = "buy";
						if(isset($_FILES['factor1']) && $_FILES['factor1']['size'] > 0) {
							$sql = "select * from media_factor where fb_id = $fb_id && mf_name = 'pre_invoice_buy' && mf_type='buy' ";
							$res = get_select_query($sql);
							if(count($res)>0) {
								$mf_link = $res[0]['mf_link'];
								$mf_id = $res[0]['mf_id'];
								$media->delete_factor_media($mf_id , $mf_link);
							}
							$file = $_FILES['factor1'];
							$media->upload_factor_media($fb_id, $mf_type , $mf_name, $file);
							$l_details = "آپلود پیش فاکتور خرید";
							update_a_row_buy_log_factor($fb_id, $l_details);
						} else {
							alert("alert-warning", "فایلی انتخاب نشده است");
						}
					}
				
					if(isset($_POST['delete-media'])){
						$fb_id = $_POST['fb_id'];
						$mf_link = $_POST['mf_link'];
						$mf_id = $_POST['delete-media'];
						$media->delete_factor_media($mf_id , $mf_link);
						$l_details = "حذف پیش فاکتور خرید";
						update_a_row_buy_log_factor($fb_id, $l_details);
					}

					if(isset($_POST['del-fb_buy'])){
						$fb_id = $_POST['del-fb_buy'];
	                    $aru->remove("factor_buy_body", "fb_id", $fb_id, "int");
					}
				
					if(isset($_POST['add-factor_buy_body'])){
	                    $fb_id = $aru->add("factor_buy_body", $_POST, 0);
	                    $type = "fb_verify_sale";
	                    $sms->send_sms_confirm_buy($fb_id, $type);	
						$home_dir = get_the_url();
						$l_details = "افزودن فاکتور خرید";
						update_a_row_buy_log_factor($fb_id, $l_details);
						echo "<div class='alert-aru col-xs-12'><div class='alert alert-success col-xs-6'><img src='$home_dir/dist/img/check4.gif'>مورد با موفقیت ثبت شد</div></div>";
						echo '<meta http-equiv="refresh" content="2"/>';
					}
				
					if(isset($_POST['add-factor_buy'])){
						$c_id=$_POST['c_id'];
						$f_id = $aru->add('factor_buy', $_POST, 0);
						$url = get_url() . "reg-buy.php?f_id=" . $f_id . "&c_id=" . $c_id;
						?><script type="text/javascript"> window.location.href = "<?php echo $url; ?>"; </script><?php
					}
				
					if(isset($_GET['f_id'])) {
						$f_id = $_GET['f_id'];
						$list = get_select_query("select * from factor_buy where f_id = $f_id");
						if(count($list)>0){
							$f_date = $list[0]['f_date'];
							$c_id = $list[0]['c_id'];
						}else{
							$f_date = "";
							$c_id = "";
						}
					} else {
						$f_date = jdate('Y/n/j');
						$c_id = "";
					}

					if(isset($_GET['c_id'])) {
						$f_id = $_GET['f_id'];
						$c_id = $_GET['c_id'];
						$st_id = get_var_query("select st_id from factor_buy where f_id = $f_id");
					} else {
						$c_id = 0;
						$st_id = 0;
					}
					?>
						<form action="" method="post">
							<div class="row">
                        		<input type="hidden" name="u_id" value="<?php echo $_SESSION['user_id']; ?>">
								<div class="item col-md-3">
									<label>نام تامین کننده</label>
									<select name="c_id" class="form-control select2" id="customer_id">
										<option value="0">انتخاب تامین کننده</option>
										<?php
										$res = 0;
										$res = get_select_query("select * from customer");
										if($res) {
											foreach($res as $row) { ?>
											<option <?php if($row['c_id'] == $c_id) echo "selected"; ?> value="<?php echo $row['c_id']; ?>"><?php echo get_customer_name($row['c_id']); ?></option>
											<?php
											}
										}
										?>
									</select>
								</div>
								<div class="item col-md-3">
									<label>انبار</label>
									<select class="form-control" name="st_id" id="storage_change">
										<?php
										if(isset($_GET['f_id'])){ ?>
										<option value="<?php echo $st_id; ?>"><?php echo get_storage_name($st_id); ?></option>
										<?php
										} else { ?>
											<option>تامین کننده را انتخاب کنید</option>
										<?php
										}
										?>
									</select>
								</div>
								<div class="item col-md-2">
									<div class="margin-tb input-group-prepend">
										<label>تاریخ درخواست</label>
									</div>
									<input value="<?php echo $f_date; ?>" autocomplete="off" type="text" id="f_date" name="f_date" placeholder="تاریخ درخواست" class="form-control" required>
								</div>
								<div class="item col-md-2">
									<label>ارزش افزوده</label>
									<select class="form-control" name="f_VAT_status">
										<option <?php if(isset($_GET['f_id'])){ if($list[0]['f_VAT_status'] == 1) { echo 'selected';} }?> value="1">دارد</option>
										<option <?php if(isset($_GET['f_id'])){ if($list[0]['f_VAT_status'] == 0) { echo 'selected';} }?> value="0">ندارد</option>
									</select>
								</div>
								<div class="item col-md-2">
									<label>نحوه پرداخت</label>
									<select class="form-control" name="f_payment">
										<option value="نقدی" <?php if(isset($_GET['f_id'])){ if($list[0]['f_payment'] == 'نقدی') { echo 'selected'; } }?> >نقدی</option>
										<option value="غیر نقدی" <?php if(isset($_GET['f_id'])){ if($list[0]['f_payment'] == 'غیر نقدی') { echo 'selected';} }?> >غیر نقدی</option>
									</select>
								</div>
								<div class="col-md-12 text-center">
									<?php 
									if(isset($_GET['fb_id'])){ 
										if($u_level=="مدیریت" || $u_level=="بازرگانی"){?>
											<button type="submit" class="btn btn-success btn-lg" name="update-factor_buy">ویرایش درخواست</button>
										<?php
										} else { ?>
											<button type="submit" class="btn btn-success btn-lg" disabled>ویرایش درخواست</button>
										<?php
										} 
							 		} else { 
										if($u_level=="مدیریت" || $u_level=="بازرگانی"){ ?>
											<button type="submit" class="btn btn-success btn-lg" name="add-factor_buy">ثبت درخواست</button>
										<?php
										} else { ?>
											<button type="submit" class="btn btn-success btn-lg" disabled>ثبت درخواست</button>
										<?php
										} 								
									} ?>
								</div>
							</div><br>
						</form>
						<?php
						if(isset($_GET['f_id'])) {
							$f_id = $_GET['f_id']; ?>
							<form action="" method="post">
								<input type="hidden" name="f_id" value="<?php echo $f_id; ?>">
								<input type="hidden" name="fb_verify_sale" value="<?php echo $u_id; ?>">
								<div class="row">
					    			<?php
					    			if(isset($_GET['fb_id'])) { ?>
										<h3 class="col-md-12">بدنه فاکتور</h3>
									<?php
									} else { ?>
										<h3 class="col-md-12">ثبت ردیف درخواست</h3>
									<?php
									} ?>
								</div>
								<div class="row">
									<div class="item col-md-3">
										<label>محصولات</label>
										<?php $list_products = $aru->get_list("product", "p_id"); ?>
                            			<select class="form-control" name="ma_id">
                            				<?php
                            				foreach($list_products as $list_product) { ?>
												<option value="<?php echo $list_product['p_id']; ?>" <?php if(isset($_GET['fb_id'])){ if($ma_id==$list_product['p_id']){ echo 'selected'; } } ?> ><?php echo per_number($list_product['p_name']); ?></option>
											<?php
                            				}
                            				?>
			                            </select>
									</div>
									<div class="item col-md-2">
										<label>دانه بندی</label>
										<?php $categories = $aru->get_list("category", "cat_id"); ?>
                            			<select class="form-control" name="cat_id">
                            				<?php
                            				foreach($categories as $category) { ?>
												<option value="<?php echo $category['cat_id']; ?>" <?php if(isset($_GET['fb_id'])){ if($cat_id == $category['cat_id']){ echo 'selected'; } } ?> ><?php echo per_number($category['cat_name']); ?></option>
											<?php 
                            				}
                            				?>
                            			</select>
									</div>
									<div class="item col-md-2">
										<label>وزن به کیلوگرم</label>
										<input value="<?php echo $fb_quantity; ?>"  id="fb_quantity" type="text" name="fb_quantity" onkeyup="javascript:FormatNumber('fb_quantity', 'fb_quantity2'); calculate()" placeholder="وزن به کیلوگرم" class="form-control" autocomplete="off" required>
										<input id="fb_quantity2" type="text" class="form-control" disabled="disabled" style="margin: 0;">
									</div>
									<div class="item col-md-2">
										<label>قیمت به ریال</label>
										<input value="<?php echo $fb_price; ?>"   id="fb_price" type="text" name="fb_price" onkeyup="javascript:FormatNumber('fb_price','fb_price2'); calculate()" placeholder="قیمت به ریال" class="form-control" autocomplete="off" required>
										<input id="fb_price2" type="text" class="form-control" disabled="disabled" style="margin: 0;" />
									</div>
									<div class="item col-md-3">
										<label>قیمت کل</label>
										<input value="<?php echo $total_price; ?>" id="total_price" type="text" name="total_price" onkeyup="javascript:FormatNumber('total_price','total_price2');" placeholder="قیمت کل" class="form-control" autocomplete="off" readonly>
										<input id="total_price2" type="text" class="form-control" disabled="disabled" style="margin: 0;" />
									</div>
									<div class="item col-md-6">
										<label>توضیحات</label>
										<select class="form-control" name="fd_id">
											<option value=""></option>
											<?php
											$res5 = get_select_query("select * from factor_description");
											if(count($res5) > 0){
												foreach($res5 as $row5){ ?>
													<option value="<?php echo $row5['fd_id']; ?>" <?php if($fd_id == $row5['fd_id']) { echo 'selected'; } ?> ><?php echo per_number($row5['fd_text']); ?></option>
												<?php
												}
											}
											?>
										</select> 
									</div>
									<div class="item col-md-6">
										<label>مدت زمان تحویل</label>
										<input value="<?php echo $delivery_time; ?>" id="delivery_time" type="text" name="delivery_time" placeholder="مدت زمان تحویل" class="form-control" autocomplete="off" >
									</div>
								</div>
								<div class="row">
									<div class="col-md-12 text-center">
									<?php 
									if(isset($_GET['fb_id'])){ 
										if($u_level=="مدیریت" || $u_level=="بازرگانی") { ?>
										<button type="submit" class="btn btn-success btn-lg" name="update-factor_buy_body">ویرایش بدنه فاکتور</button>
										<?php
										} else { ?>
											<button type="submit" class="btn btn-success btn-lg" disabled>ویرایش بدنه فاکتور</button>
										<?php
										}
									} else { ?>
										<button type="submit" class="btn btn-success btn-lg" name="add-factor_buy_body">ثبت ردیف</button>
									<?php
									} ?>
									</div>
								</div>
							</form>	

							<div class="row">
								<div class="col-md-12">
									<div class="box">
										<div class="box-header">
											<h3 class="box-title">پیش فاکتور</h3>
										</div>
										<div class="box-body table-responsive no-padding">
											<table class="table table-hover">
												<tbody>
													<tr>
                                            			<th>#</th>
														<th>نام محصول</th>
														<th>دانه بندی</th>
														<th>مقدار</th>
														<th>قیمت</th>
														<th>قیمت کل</th>
														<th>پیش فاکتور</th>
														<th>حذف</th>
													</tr>
													<?php
													$i = 1;
													if(isset($_GET['fb_id'])) {
														$fb_id = $_GET['fb_id'];
														$list = get_select_query("select * from factor_buy inner join factor_buy_body on factor_buy.f_id = factor_buy_body.f_id where factor_buy_body.fb_id = $fb_id");
													} else {
														$list = get_factor_buy($f_id);
													}
													if(count($list) > 0) {
														foreach($list as $l) { ?>
															<tr>
																<td><?php echo per_number($i); ?></td>
																<td><?php echo get_product_name($l['ma_id']); ?></td>
																<td><?php echo per_number(get_category_name($l['cat_id'])); ?></td>
                                                				<td><?php echo per_number(number_format($l['fb_quantity'])); ?></td>
																<td><?php echo per_number(number_format($l['fb_price'])); ?></td>
																<td><?php echo per_number(number_format($l['total_price'])); ?></td>
																<td>
																	<?php
																	if($u_level=="مدیریت" || $u_level=="بازرگانی"){ ?>
																		<button class="btn btn-warning btn-xs" type="button" data-toggle="modal" data-keyboard="false" data-target="#doc_modal<?php echo $l['fb_id']; ?>">پیش فاکتور</button>
																	<?php
																	} else { ?>
													   					<button class="btn btn-warning btn-xs" type="button" disabled>پیش فاکتور</button>
																	<?php
																	} ?>
																	<div class="modal fade text-xs-left" id="doc_modal<?php echo $l['fb_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="#doc_modal<?php echo $l['fb_id']; ?>" style="display: none;" aria-hidden="true">
																		<div class="modal-dialog" role="document" id="hse_item_edit">
																			<form action="" method="post" enctype="multipart/form-data">
																				<input type="hidden" name="name_f" value="pre_invoice_buy">
																				<h4>آپلود پیش فاکتور</h4>
																				<div class="row">
																					<div class="item col-md-8">
																						<input type="file" name="factor1" accept="image/*" onchange="loadFile(event)">
																						<img id="output"/>
																						<script>
																							var loadFile = function(event) {
																							var output = document.getElementById('output');
																							output.src = URL.createObjectURL(event.target.files[0]);
																							};
																						</script>
																					</div>
																				</div>
																				<div class="row">
																					<table class="table table-striped table-bordered table-responsive group_save_table">
																						<thead>
																							<tr>
																								<th>ردیف</th>
																								<th>تاریخ آپلود پیش فاکتور</th>
																								<th>لینک پیش فاکتور</th>
																								<th>عملیات</th>
																							</tr>
																						</thead>
																						<tbody>
																							<?php
																							$roww = 1;
																							$fb_id = $l['fb_id'] ;
																							$am = get_select_query("select * from media_factor where fb_id = $fb_id and mf_type = 'buy' and mf_name = 'pre_invoice_buy'");
																							if(count($am) > 0) {				
																								foreach ($am as $c) { ?>
																								<tr>
																									<td><?php echo $roww; ?></td>
																									<td><?php echo $c['mf_date']; ?></td>
																									<td><a target="_blank" href="<?php get_url(); ?>uploads/factor_media/<?php echo $c['mf_link']; ?>"><img src="<?php get_url(); ?>uploads/factor_media/<?php echo $c['mf_link']; ?>" style="width:20px;heigh:20px"></a></td>
																									<td class="force-inline-text">
																										<form action="" method="post" onSubmit="if(!confirm('آیا از انجام این عملیات اطمینان دارید؟')){return false;}">
																											<button class="btn btn-danger btn-sm" type="submit" name="delete-media" value="<?php echo $c['mf_id']; ?>">حذف</button>
																											<input type="hidden" name="mf_link" value="<?php echo $c['mf_link']; ?>">
																											<input type="hidden" name="fb_id" value="<?php echo $l['fb_id']; ?>">
																										</form>
																									</td>
																								</tr>
																									<?php
																									$roww++;	
																								}
																							} else { ?>
																								<tr>
																									<td colspan="9">داده ای موجود نیست!</td>
																								</tr>
																								<?php
																							} ?>
																						</tbody>
																					</table>
																					<button class="btn btn-primary btn-sm" name="update-media" value="<?php echo $l['fb_id']; ?>" type="submit">ذخیره</button>
																				</div>
																			</form> 
																		</div>
																	</div>
																</td>
																<td>
																	<form onSubmit="if(!confirm('آیا از انجام این عملیات اطمینان دارید؟')){return false;}" action="" method="post">
																	<?php
																	if($u_level=="مدیریت" || $u_level=="بازرگانی"){ ?>
																		<button name="del-fb_buy" value="<?php echo $l['fb_id']; ?>" class="btn btn-danger btn-xs"><i class="fa fa-remove"></i></button>
																	<?php
																	} else { ?>
												   	 					<button class="btn btn-danger btn-xs" type="submit" disabled><i class="fa fa-remove"></i></button>
																	<?php } ?>
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
		</div>
	</section>				
</div>

<script type="text/javascript" src="<?php get_url(); ?>buy/js/factor.js"></script>
	<script>
		$(function () {
			$('input').iCheck({
				checkboxClass: 'icheckbox_square-blue',
				radioClass: 'iradio_square-blue',
				increaseArea: '20%'
			});
		});
	</script>
<?php include"../left-nav.php"; include"../footer.php"; ?>