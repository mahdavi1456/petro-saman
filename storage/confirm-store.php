<?php $title = "ورودی انبار"; include"../header.php"; include"../nav.php"; ?>
<div class="content-wrapper">
	<?php
	breadcrumb("تایید ورودی انبار");
	$s_id = $_GET['s_id'];
	$type_confirm = $_GET['typee'];
	$typee = "";

	if(isset($_POST['delete-img'])){
		$filename1 = $_POST['filename'];
		$image_id = $_POST['image_id'];
		
		$path = str_replace($_SERVER['DOCUMENT_ROOT'], '', "uploads/" . $filename1);
		
		if(unlink($path)){
			$sql = "delete from media where m_id = $image_id";
			ex_query($sql);
		}
		$url = 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
		echo $url;
		?>
		<script type="text/javascript">
			window.location.href = "<?php echo $url; ?>";
		</script>
		<?php
	}

	if(isset($_POST['up_file'])){
		$type = $_POST['typee'];
		$s_id = $_POST['s_id'];
		$filename = $_FILES['fileToUpload']['name'];
		$tmp_name = $_FILES['fileToUpload']['tmp_name'];
		$size = $_FILES['fileToUpload']['size'];
		upload_file($filename, $tmp_name, $size, $type, $s_id);
		if($type=="waybill"){
			$sql1 = "update store set s_scan_b = 1 where s_id = $s_id";
		}else if($type=="bill"){
			$sql1 = "update store set 	s_scan_gh = 1 where s_id = $s_id";
		}
		ex_query($sql1);
	}	
	
	if(isset($_POST['verify_fiscal'])){
		$value = $_POST['verify_fiscal'];
		$s_id = $_POST['s_id'];
		ex_query("update store set s_verify_fiscal = $value where s_id = $s_id");
	}
	if(isset($_POST['verify_admin'])){
		$value = $_POST['verify_admin'];
		$s_id = $_POST['s_id'];
		ex_query("update store set s_verify_admin = $value where s_id = $s_id");
	}
	if(isset($_POST['verify_admin_Quality'])){
		$value = $_POST['verify_admin_Quality'];
		$s_id = $_POST['s_id'];
		ex_query("update store set s_verify_admin_Quality = $value where s_id = $s_id");
	}
	?>
	<section class="content">
		<div id="details">		
			<div class="box">
				<div class="box-body">
					<?php
					load_store($s_id);
					if($type_confirm == 's_scan_b') { ?>
						<form action="" method="post" enctype="multipart/form-data">
							<br>
							<div class="row">
								<div class="col-md-6">
									<h4>بارگزاری بارنامه اسکن شده</h4><br>
									<input type="file" accept="image/*" onchange="loadFile(event)" name="fileToUpload" id="verify_file"><br>
									<input type="hidden" name="typee" value="waybill">
									<button type="submit" class="btn btn-success" name="up_file">بارگزاری فایل</button>
									<input type="hidden" name="s_id" value="<?php echo $_GET['s_id']; ?>">
								</div>
								<div class="col-md-6">
									<img class="img-responsive" id="output">
								</div>
							</div>
						</form>
						<hr>
						<div class="row">
							<div class="col-md-12">
								<h4>نمایش بارنامه اسکن شده</h4>
								<?php get_waybill_files($s_id); ?>
							</div>
						</div>
						<script>
				  			var loadFile = function(event) {
						    	var output = document.getElementById('output');
					    		output.src = URL.createObjectURL(event.target.files[0]);
				  			};
						</script>
						<?php
					}else if($type_confirm == 's_verify_fiscal') { ?>
							<br>
							<div class="row">
								<div class="col-md-12">
									<h4>نمایش بارنامه اسکن شده</h4>
									<?php get_waybill_files($s_id); ?>
								</div>
							</div>
							<br>
							<div class="row">
								<form action="" method="post">
									<div class="col-md-12"><h4>تاییدیه ورودی انبار توسط واحد مالی</h4></div>
									<div class="col-md-6">
										<textarea class="form-control" name="l_details" placeholder="در صورتی که توضیح خاصی نیاز است وارد کنید..." rows="4" cols="50"></textarea>
										<input type="hidden" name="s_id" value="<?php echo $s_id; ?>">
										<input type="hidden" name="type_confirm" value="<?php echo $type_confirm; ?>">
									</div>
									<div class="col-md-6">
										<button type="submit" name="verify_fiscal" value="1" class="btn btn-success">مورد تایید است</button>
										<button type="submit" name="verify_fiscal" value="0" class="btn btn-danger">مورد تایید نیست</button>
									</div>
								</form>
							</div>
							<script>
								var loadFile = function(event) {
									var output2 = document.getElementById('output2');
									output2.src = URL.createObjectURL(event.target.files[0]);
								};
							</script>
						<?php
					}else if($type_confirm=='s_verify_admin') { ?>
							<br>
							<div class="row">
								<div class="col-md-12">
									<h4>نمایش بارنامه اسکن شده</h4>
									<?php get_waybill_files($s_id); ?>
								</div>
							</div>
							<br>
							<div class="row">
								<form action="" method="post">
									<div class="col-md-12"><h4>تایید بارنامه توسط مدیر</h4></div>
									<div class="col-md-6">
										<textarea class="form-control" name="l_details" placeholder="در صورتی که توضیح خاصی نیاز است وارد کنید..." rows="4" cols="50"></textarea>
										<input type="hidden" name="s_id" value="<?php echo $s_id; ?>">
										<input type="hidden" name="type_confirm" value="<?php echo $type_confirm; ?>">
									</div>
									<div class="col-md-6">
										<button type="submit" name="verify_admin" value="1" class="btn btn-success">مورد تایید است</button>
										<button type="submit" name="verify_admin" value="0" class="btn btn-danger">مورد تایید نیست</button>
									</div>
								</form>
							</div>
							<script>
								var loadFile3 = function(event) {
									var output3 = document.getElementById('output3');
									output3.src = URL.createObjectURL(event.target.files[0]);
								};
							</script>
					<?php
					}else if($type_confirm == 's_verify_admin_Quality') { ?>
						<form action="" method="post" enctype="multipart/form-data">
							<br>
							<div class="row">
								<div class="col-md-12">
									<h4>نمایش بارنامه اسکن شده</h4>
									<?php get_waybill_files($s_id); ?>
								</div>
							</div>
							<br>
							<div class="row">
								<form action="" method="post">
									<div class="col-md-12"><h4>تایید بارنامه توسط مدیر کیفی</h4></div>
									<div class="col-md-6">
										<textarea class="form-control" name="l_details" placeholder="در صورتی که توضیح خاصی نیاز است وارد کنید..." rows="4" cols="50"></textarea>
										<input type="hidden" name="s_id" value="<?php echo $s_id; ?>">
										<input type="hidden" name="type_confirm" value="<?php echo $type_confirm; ?>">
									</div>
									<div class="col-md-6">
										<button type="submit" name="verify_admin_Quality" value="1" class="btn btn-success">مورد تایید است</button>
										<button type="submit" name="verify_admin_Quality" value="0" class="btn btn-danger">مورد تایید نیست</button>
									</div>
								</form>
							</div>
						<script>
				  			var loadFile = function(event) {
						    	var output4 = document.getElementById('output4');
					    		output4.src = URL.createObjectURL(event.target.files[0]);
				  			};
						</script>
					<?php
					}else if($type_confirm=='s_scan_gh') { ?>
							<br>
							<div class="row">
								<div class="col-md-12">
									<h4>نمایش بارنامه اسکن شده</h4>
									<?php get_waybill_files($s_id); ?>
								</div>
							</div>
							<br>
							<div class="row">
								<div class="col-md-12">
									<h4>نمایش قبض بارنامه اسکن شده</h4>
									<?php get_bill_files($s_id); ?>
								</div>
							</div>
							<div class="row">
								<form action="" method="post" enctype="multipart/form-data">
									<div class="col-md-6">
										<h4>بارگذاری قبض بارنامه اسکن شده</h4><br>
										<input type="file" accept="image/*" onchange="loadFile3(event)" name="fileToUpload" id="verify_file"><br>
										<input type="hidden" name="typee" value="bill">
										<button type="submit" class="btn btn-success" name="up_file">بارگزاری فایل</button>
										<input type="hidden" name="s_id" value="<?php echo $_GET['s_id']; ?>">
									</div>
									<div class="col-md-6">
										<img class="img-responsive" id="output3">
									</div>
								</form>
							</div>
							<script>
								var loadFile3 = function(event) {
									var output3 = document.getElementById('output3');
									output3.src = URL.createObjectURL(event.target.files[0]);
								};
							</script>	
					<?php
					}
					?>
				</div>
			</div>
		</div>
	</section>
</div>
<script src="<?php get_url(); ?>product/js/product.js"></script>
<?php include"../left-nav.php"; include"../footer.php"; ?>