<?php $title = "لیست راننده ها"; include"../header.php"; include"../nav.php";
	$asb = list_driver();
	if(isset($_GET['dr_id'])){
		$dr_id = $_GET['dr_id'];
		$asd = select_a_driver($dr_id);
	}
?>
	<div class="content-wrapper">
	
		<?php breadcrumb();  ?>


		<section class="content">
			<div class="row">
				<div class="col-xs-12">
			  		<div class="box">
						<div class="box-header">
				  			<h3 class="box-title">لیست راننده ها</h3>
						</div>
						<div class="box-body">
							<form action="" method="post" enctype="multipart/form-data">
								<div id="details" class="col-xs-12">
									<div class="row">
										<div class="item col-md-4">
											<div class="margin-tb input-group-prepend">
												<span class="input-group-text">نام</span>
											</div>
											<input type="text" name="dr_name" placeholder="نام" class="form-control" value="<?php if(isset($_GET['dr_id'])) { echo $asd[0]['dr_name'];}else{ echo ''; } ?>">
										</div>
										<div class="item col-md-4">
											<div class="margin-tb input-group-prepend">
												<span class="input-group-text">نام خانوادگی</span>
											</div>
											<input type="text" name="dr_family" placeholder="نام خانوادگی" class="form-control" value="<?php if(isset($_GET['dr_id'])) { echo $asd[0]['dr_family'];}else{ echo ''; } ?>">
										</div>
										<div class="item col-md-4">
											<div class="margin-tb input-group-prepend">
												<span class="input-group-text">کد ملی</span>
											</div>
											<input type="text" name="dr_national" class="form-control" value="<?php if(isset($_GET['dr_id'])) { echo $asd[0]['dr_national'];}else{ echo ''; } ?>">
										</div>
										<div class="item col-md-4">
											<div class="margin-tb input-group-prepend">
												<span class="input-group-text">نوع ماشین</span>
											</div>
											<input type="text" name="dr_car"  class="form-control" value="<?php if(isset($_GET['dr_id'])) { echo $asd[0]['dr_car'];}else{ echo ''; } ?>">
										</div>
										<div class="item col-md-6" dir="ltr">
											<div class="margin-tb input-group-prepend">
												<span class="input-group-text">پلاک ماشین</span>
											</div>
											<?php
											if(isset($_GET['dr_id'])){
												$dr_plaque = $asd[0]['dr_plaque'];
												$dr_plaque_arr = explode(" ", $dr_plaque);
												$dr_plaque_1 = $dr_plaque_arr[0];
												$dr_plaque_2 = $dr_plaque_arr[1];
												$dr_plaque_3 = $dr_plaque_arr[2];
												$dr_plaque_4 = $dr_plaque_arr[3];
											}
											?>
											<input type="text" name="dr_plaque_1" class="form-control dr_plaque_1" value="<?php if(isset($_GET['dr_id'])) echo $dr_plaque_1; ?>">
											<input type="text" name="dr_plaque_2" class="form-control dr_plaque_2" value="<?php if(isset($_GET['dr_id'])) echo $dr_plaque_2; ?>">
											<input type="text" name="dr_plaque_3" class="form-control dr_plaque_3" value="<?php if(isset($_GET['dr_id'])) echo $dr_plaque_3; ?>">
											-
											<input type="text" name="dr_plaque_4" class="form-control dr_plaque_4" value="<?php if(isset($_GET['dr_id'])) echo $dr_plaque_4; ?>">
										</div>
										<div class="item col-md-6">
											<div class="margin-tb input-group-prepend">
												<span class="input-group-text">موبایل</span>
											</div>
											<input type="text" name="dr_mobile"  class="form-control" value="<?php if(isset($_GET['dr_id'])) { echo $asd[0]['dr_mobile'];}else{ echo ''; } ?>">
											<input type="hidden" name="dr_id" class="form-control" value="<?php if(isset($_GET['dr_id'])) { echo $asd[0]['dr_id'];}else{ echo ''; } ?>">
										</div>
										<div class="item col-md-6">
											<div class="margin-tb input-group-prepend">
												<span class="input-group-text">وضعیت</span>
											</div>
											<select name="dr_status" class="form-control">
												<?php
												if(isset($_GET['dr_id'])) { ?>
													<option value="<?php echo $asd[0]['dr_status']; ?>"><?php if($asd[0]['dr_status'] == 1) { echo "فعال"; } else { echo "غیر فعال"; } ?></option>
												<?php
												}
												?>
												<option value="1" class="bg-success">فعال</option>
												<option value="0" class="bg-danger">غیر فعال</option>
											</select>
										</div>
										<div class="item col-md-6">
											<div class="margin-tb input-group-prepend">
												<span class="input-group-text">کارت ملی</span>
											</div>
											<input class="form-control" type="file" name="dr_melicart_img" accept="image/*">
											<img src="<?php if(isset($_GET['dr_id'])) echo get_url() . "uploads/" . $asd[0]['dr_melicart_img']; ?>" class="img-responsive list-user-up-img">
										</div>
										<div class="item col-md-6">
											<div class="margin-tb input-group-prepend">
												<span class="input-group-text">گواهینامه</span>
											</div>
											<input class="form-control" type="file" name="dr_certificate_img" accept="image/*">
											<img src="<?php if(isset($_GET['dr_id'])) echo get_url() . "uploads/" . $asd[0]['dr_certificate_img']; ?>" class="img-responsive list-user-up-img">
										</div>
										<div class="item col-md-6">
											<div class="margin-tb input-group-prepend">
												<span class="input-group-text">کارت ماشین</span>
											</div>
											<input class="form-control" type="file" name="dr_car_cart_img" accept="image/*">
											<img src="<?php if(isset($_GET['dr_id'])) echo get_url() . "uploads/" . $asd[0]['dr_car_cart_img']; ?>" class="img-responsive list-user-up-img">
										</div>
										<script src="<?php get_url(); ?>include/media/script.js"></script>
										<div class="item col-md-4">
											<?php if(isset($_GET['dr_id'])){
												?>
												<button type="submit" class="btn btn-warning" name="dr_edit">ویرایش</button>
												<?php
											}else{ ?>
											<button type="submit" class="btn btn-success btn-sm" name="dr_submit">اضافه کردن</button>
											 <?php } ?>
										<?php 
										if(isset($_POST['dr_submit'])) {
											$array = array();
											array_push($array, $_POST['dr_name']);
											array_push($array, $_POST['dr_family']);
											array_push($array, $_POST['dr_national']);
											array_push($array, $_POST['dr_car']);
											$dr_plaque = $_POST['dr_plaque_1'] . " " . $_POST['dr_plaque_2'] . " " . $_POST['dr_plaque_3'] . " " . $_POST['dr_plaque_4'];
											array_push($array, $dr_plaque);
											array_push($array, $_POST['dr_mobile']);
											array_push($array, $_POST['dr_status']);
											
											$driver_id_insert = insert_driver($array);

											if(isset($_FILES['dr_melicart_img']) && $_FILES['dr_melicart_img']['size']>0){
												$filename_1 = $_FILES['dr_melicart_img']['name'];
												$tmp_name_1 = $_FILES['dr_melicart_img']['tmp_name'];
												$size_1 = $_FILES['dr_melicart_img']['size'];
												$type_1 = "dr_melicart";
												$bu_id_1 = "0";
												$dr_melicart_img = upload_file($filename_1, $tmp_name_1, $size_1, $type_1, $bu_id_1);

												$array = array();
												array_push($array, $driver_id_insert);
												array_push($array, "dr_melicart_img");
												array_push($array, $dr_melicart_img);
												update_driver_media($array);
											}

											if(isset($_FILES['dr_certificate_img']) && $_FILES['dr_certificate_img']['size']>0){
												$filename_2 = $_FILES['dr_certificate_img']['name'];
												$tmp_name_2 = $_FILES['dr_certificate_img']['tmp_name'];
												$size_2 = $_FILES['dr_certificate_img']['size'];
												$type_2 = "dr_certificate";
												$bu_id_2 = "0";
												$dr_certificate_img = upload_file($filename_2, $tmp_name_2, $size_2, $type_2, $bu_id_2);

												$array = array();
												array_push($array, $driver_id_insert);
												array_push($array, "dr_certificate_img");
												array_push($array, $dr_certificate_img);
												update_driver_media($array);
											}

											if(isset($_FILES['dr_car_cart_img']) && $_FILES['dr_car_cart_img']['size']>0){
												$filename_3 = $_FILES['dr_car_cart_img']['name'];
												$tmp_name_3 = $_FILES['dr_car_cart_img']['tmp_name'];
												$size_3 = $_FILES['dr_car_cart_img']['size'];
												$type_3 = "dr_car_cart";
												$bu_id_3 = "0";
												$dr_car_cart_img = upload_file($filename_3, $tmp_name_3, $size_3, $type_3, $bu_id_3);

												$array = array();
												array_push($array, $driver_id_insert);
												array_push($array, "dr_car_cart_img");
												array_push($array, $dr_car_cart_img);
												update_driver_media($array);
											}

											if(isset($_GET['cycle']) && $_GET['cycle'] == "factor"){
												$header_url = get_the_url() . "storage/list-storage.php";
												?><script type="text/javascript">
													//window.location.href = "<?php echo $header_url; ?>";
												</script><?php
											} else {
												//echo "<meta http-equiv='refresh' content='0'/>";
											}
										}
										if(isset($_POST['dr_edit'])) {
											$array = array();
											array_push($array, $_POST['dr_id']);
											array_push($array, $_POST['dr_name']);
											array_push($array, $_POST['dr_family']);
											array_push($array, $_POST['dr_national']);
											array_push($array, $_POST['dr_car']);
											$dr_plaque = $_POST['dr_plaque_1'] . " " . $_POST['dr_plaque_2'] . " " . $_POST['dr_plaque_3'] . " " . $_POST['dr_plaque_4'];
											array_push($array, $dr_plaque);
											array_push($array, $_POST['dr_mobile']);
											array_push($array, $_POST['dr_status']);
											echo $_POST['dr_status'];
											update_driver($array);

											if(isset($_FILES['dr_melicart_img']) && $_FILES['dr_melicart_img']['size']>0){
												$filename_1 = $_FILES['dr_melicart_img']['name'];
												$tmp_name_1 = $_FILES['dr_melicart_img']['tmp_name'];
												$size_1 = $_FILES['dr_melicart_img']['size'];
												$type_1 = "dr_melicart";
												$bu_id_1 = "0";
												$dr_melicart_img = upload_file($filename_1, $tmp_name_1, $size_1, $type_1, $bu_id_1);

												$array = array();
												array_push($array, $_POST['dr_id']);
												array_push($array, "dr_melicart_img");
												array_push($array, $dr_melicart_img);
												update_driver_media($array);
											}

											if(isset($_FILES['dr_certificate_img']) && $_FILES['dr_certificate_img']['size']>0){
												$filename_2 = $_FILES['dr_certificate_img']['name'];
												$tmp_name_2 = $_FILES['dr_certificate_img']['tmp_name'];
												$size_2 = $_FILES['dr_certificate_img']['size'];
												$type_2 = "dr_certificate";
												$bu_id_2 = "0";
												$dr_certificate_img = upload_file($filename_2, $tmp_name_2, $size_2, $type_2, $bu_id_2);

												$array = array();
												array_push($array, $_POST['dr_id']);
												array_push($array, "dr_certificate_img");
												array_push($array, $dr_certificate_img);
												update_driver_media($array);
											}

											if(isset($_FILES['dr_car_cart_img']) && $_FILES['dr_car_cart_img']['size']>0){
												$filename_3 = $_FILES['dr_car_cart_img']['name'];
												$tmp_name_3 = $_FILES['dr_car_cart_img']['tmp_name'];
												$size_3 = $_FILES['dr_car_cart_img']['size'];
												$type_3 = "dr_car_cart";
												$bu_id_3 = "0";
												$dr_car_cart_img = upload_file($filename_3, $tmp_name_3, $size_3, $type_3, $bu_id_3);

												$array = array();
												array_push($array, $_POST['dr_id']);
												array_push($array, "dr_car_cart_img");
												array_push($array, $dr_car_cart_img);
												update_driver_media($array);
											}

											if(isset($_GET['cycle']) && $_GET['cycle'] == "factor"){
												$header_url = get_the_url() . "storage/list-storage.php";
												?><script type="text/javascript">
													window.location.href = "<?php echo $header_url; ?>";
												</script><?php
											} else {
												echo "<meta http-equiv='refresh' content='0'/>";
											}
										}
										?>
										</div>
									</div>
								</div>
							</form>

				  			<table id="example1" class="table table-bordered table-striped">
								<thead>
					  				<tr>
										<th>نام</th>
										<th>نام خانوادگی</th>
										<th>کدملی</th>
										<th>نوع ماشین</th>
										<th>پلاک ماشین</th>
										<th>شماره همراه</th>
										<th>وضعیت</th>
					  				</tr>
								</thead>
								<tbody>
								<?php 
								$asb = get_select_query("select * from driver");
								foreach ($asb as $a ) { ?>
						  			<tr>
										<td><?php echo $a['dr_name']; ?></td>
										<td><?php echo $a['dr_family']; ?></td>
										<td><?php echo $a['dr_national']; ?></td>
										<td><?php echo $a['dr_car']; ?></td>
										<?php
										$dr_plaque = $a['dr_plaque'];
										$dr_plaque_arr = explode(" ", $dr_plaque);
										$dr_plaque_1 = $dr_plaque_arr[0];
										$dr_plaque_2 = $dr_plaque_arr[1];
										$dr_plaque_3 = $dr_plaque_arr[2];
										$dr_plaque_4 = $dr_plaque_arr[3];
										?>
										<td dir="rtl"><span><?php echo $dr_plaque_4; ?></span>&nbsp;-&nbsp;<span><?php echo $dr_plaque_3; ?></span>&nbsp;<span><?php echo $dr_plaque_2; ?></span>&nbsp;<span><?php echo $dr_plaque_1; ?></span></td>
										<td><?php echo $a['dr_mobile']; ?></td>
										<td><?php if($a['dr_status'] == 1) { echo "فعال"; } else { echo "غیر فعال"; } ?></td>
										<td>
											<form action="" method="post" onSubmit="if(!confirm('آیا از انجام این عملیات اطمینان دارید؟')){return false;}">
												<a class="btn btn-info btn-sm" href="list-driver.php?dr_id=<?php echo $a['dr_id']; ?>">مشاهده</a>
												<button class="btn btn-danger btn-sm" type="submit" name="delete-driver">حذف</button>
												<input class="hidden" type="text" name="delete-text" value="<?php echo $a['dr_id']; ?>">
												<?php
												if(isset($_POST['delete-driver'])){
													$dr_id = $_POST['delete-text'];
													delete_driver($dr_id);
													echo "<meta http-equiv='refresh' content='0'/>";
													exit();
												}
												?>
											</form>
										</td>
						  			</tr>
								<?php } ?>
								</tbody>
								<tfoot>
					  				<tr>
										<th>نام</th>
										<th>نام خانوادگی</th>
										<th>کدملی</th>
										<th>نوع ماشین</th>
										<th>پلاک ماشین</th>
										<th>شماره همراه</th>
										<th>وضعیت</th>
					  				</tr>
								</tfoot>
				  			</table>
						</div>
			  		</div>
				</div>
		  	</div>
		</section>
	</div>
<?php include"../left-nav.php"; include"../footer.php"; ?>