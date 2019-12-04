<?php $title = "اندیکاتور"; include"../header.php"; include"../nav.php"; 
	$aru = new aru();
	$user = new user();
	$u_level = $user->get_current_user_level();
	$user = $aru->get_list("user", "u_id");
	$asb1 = $aru->get_list("sender_indicator", "si_id");
	$asb2 = $aru->get_list("received_indicator", "ri_id");
	$media = $aru->get_list("media_received_indicator", "mri_id");
	$media_sender = $aru->get_list("media_sender_indicator", "msi_id");
	if(isset($_GET['indicator_type'])) {
		$indicator_type = $_GET['indicator_type'];
	} else {
		$indicator_type = "";
	}

?>

<div class="content-wrapper">
	<?php breadcrumb("اندیکاتور");

	if(isset($_POST['save_admin_verify'])){
		$si_id = $_POST['si_id'];
		$si_admin_details = $_POST['si_admin_details'];
		$verify =  $_POST['verify'];
		$date = jdate('Y/n/j');
		//$u_level = $user->get_current_user_level();
		if($verify == 0)
		{
			if($u_level=='مدیریت'){
				$res2 = ex_query("update sender_indicator set si_admin_details = null , si_admin_verify = '$verify' , si_admin_date = '0000-00-00'  where si_id = $si_id");
			}
		}
		else
		{
			if($u_level=='مدیریت'){
				$res2 = ex_query("update sender_indicator set si_admin_details = '$si_admin_details' , si_admin_verify = '$verify' , si_admin_date = '$date'  where si_id = $si_id");
			}
		}
		echo '<meta http-equiv="refresh" content="2"/>';
	}

	if(isset($_POST['add-received_indicator'])) {
		$aru->add("received_indicator", $_POST);
	}

	if(isset($_POST['add-sender_indicator'])) {
		$si_receiver = $_POST['si_receiver'];
		$si_send_date = $_POST['si_send_date'];
		$si_description = $_POST['si_description'];
		$si_details = $_POST['si_details'];
		$sql="insert into sender_indicator (si_receiver, si_send_date, si_description, si_details) values ('$si_receiver', '$si_send_date', '$si_description', '$si_details')";
		ex_query($sql);	
		echo "<meta http-equiv='refresh' content='0'>";
	}

	if(isset($_POST['update-received_indicator'])) {
		$ri_id = $_POST['update-received_indicator'];
		$aru->update('received_indicator',$_POST,'ri_id', $ri_id);
	}

	if(isset($_POST['update-sender_indicator'])) {
		$si_id = $_POST['update-sender_indicator'];
		$aru->update('sender_indicator',$_POST,'si_id', $si_id);
	}
	if(isset($_POST['delete-received_indicator'])){
		$ri_id = $_POST['delete-received_indicator'];
		$aru->remove('received_indicator','ri_id', $ri_id ,'int');
		$sql = get_select_query("select * from media_received_indicator where ri_id = $ri_id ");
		if(count($sql)>0) {
			foreach($sql as $row2){
				$mri_id = $row2['mri_id'];
				$mri_link = $row2['mri_link'];
				$path = str_replace($_SERVER['DOCUMENT_ROOT'], '', "../uploads/media_received_indicator/" . $mri_link);
				if(unlink($path)){
					$aru->remove('media_received_indicator','mri_id', $mri_id ,'int');
				}
				$url = 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
				?>
				<script type="text/javascript">
					window.location.href = "<?php echo $url; ?>";
				</script>
				<?php
			}
		}
	}


	if(isset($_POST['delete-sender_indicator'])){
		$si_id = $_POST['delete-sender_indicator'];
		$aru->remove('sender_indicator','si_id', $si_id ,'int');
		$sql = get_select_query("select * from media_sender_indicator where si_id = $si_id ");
		if(count($sql)>0) {
			foreach($sql as $row2){
				$msi_id = $row2['msi_id'];
				$msi_link = $row2['msi_link'];
				$path = str_replace($_SERVER['DOCUMENT_ROOT'], '', "../uploads/media_sender_indicator/" . $msi_link);
				if(unlink($path)){
					$aru->remove('media_sender_indicator','msi_id', $msi_id ,'int');
				}
				$url = 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
				?>
				<script type="text/javascript">
					window.location.href = "<?php echo $url; ?>";
				</script>
				<?php
			}
		}
	}
	if(isset($_POST['update-media']))
	{
		$i=0;
		$ary;
		$file = $_FILES['uploader1'];
		$ri_id = $_POST['update-media'];
		$date = $_POST['date'];
		$mri_name = $_POST['mri_name'];
		while(!empty($file['name'][$i]))
		{
			$filename = $file['name'][$i];
			$tmp_name = $file['tmp_name'][$i];
			$size = $file['size'][$i];
			$link = upload_file($filename, $tmp_name, $size, "0" , "0" , "media_received_indicator");
			if($link != '0'){
				$sql="insert into media_received_indicator (ri_id, mri_link, mri_date, mri_name) values ('$ri_id', '$link', '$date', '$mri_name')";
				ex_query($sql);
			}
			$i++;
		}
		echo "<meta http-equiv='refresh' content='0'>";
	}


	if(isset($_POST['delete-media']))
	{
		$mri_id = $_POST['delete-media'];
		$mri_link =get_var_query("select mri_link from media_received_indicator where mri_id = $mri_id ");
		$path = str_replace($_SERVER['DOCUMENT_ROOT'], '', "../uploads/media_received_indicator/" . $mri_link);
		if(unlink($path)){
			$aru->remove('media_received_indicator','mri_id', $mri_id ,'int');
		}
		$url = 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
		?>
		<script type="text/javascript">
			window.location.href = "<?php echo $url; ?>";
		</script>
		<?php
	}


		?>
	<section class="content">
		<form action="" method="get">
			<section class="box box-info">
				<div class="box-header with-border">
					<div class="box-body">
						<div class="row">
							<div class="item col-md-4">
								<div class="input-group-prepend">
									<label for="indicator_type">نوع نامه</label>
								</div>
								<select class="form-control" id="indicator_type" name="indicator_type" onchange="this.form.submit()">
									<option>نوع نامه را انتخاب کنید</option>
									<option <?php if($indicator_type == "send") echo "selected"; ?> value="send">ارسالی</option>
									<option <?php if($indicator_type == "receive") echo "selected"; ?> value="receive">دریافتی</option>
								</select>
							</div>
						</div>
					</div>
				</div>
			</section>
		</form>
		<?php
		if($indicator_type=="send") 
		{ ?>
			<form action="" method="post" id="myForm" enctype='multipart/form-data'>
				<section class="box box-info">
					<div class="box-header with-border">
						<h3 class="box-title">نامه ارسالی</h3>
					</div>
					<div class="box-body">	
						<div class="row">
							<div class="item col-md-6 col-xs-12">
								<div class="margin-tb input-group-prepend">
									<span class="input-group-text">گیرنده نامه</span>
								</div>
								<input type="text" name="si_receiver" id="si_receiver" placeholder="گیرنده نامه" class="form-control">
							</div>
							
							<div class="item col-md-6 col-xs-12">
								<div class="input-group-prepend">
									<span class="input-group-text">تاریخ ارسال نامه</span>
								</div>
								<input type="text" autocomplete="off" class="form-control datepickerClass" placeholder="تاریخ ارسال نامه" id="si_send_date" name="si_send_date">
							</div>
							<div class="item col-md-12">
								<div class="margin-tb input-group-prepend">
									<span class="input-group-text">شرح نامه ارسالی</span>
								</div>
								<textarea class="form-control" rows="3" id="si_description" type="text" name="si_description" class="form-control" placeholder="شرح نامه ارسالی" data-required="1"></textarea>
								<span></span>
							</div>
							<div class="item col-md-12 col-xs-12">
								<div class="input-group-prepend">
									<span class="input-group-text">توضیحات</br></span>
								</div>
								<textarea class="form-control" rows="3"  id="si_details" name="si_details" placeholder="توضیحات" ></textarea>
							</div>
						</div>
						<div style="text-align: center; margin: 20px 0;" class="col-xs-12">
							<button type="submit" class="btn btn-success btn-sm" name="add-sender_indicator">ذخیره</button>
						</div>	
                    </div>
				</section>
			</form>
			<section class="box box-info">
				<div class="box-header with-border">
					<h3 class="box-title">لیست نامه های ارسالی</h3>
				</div>
				<div class="box-body">
					<table id="example1" class="table table-striped table-bordered table-responsive group_save_table">
						<thead>
							<tr>
								<th>ردیف</th>
								<th>گیرنده نامه</th>
								<th>تاریخ ارسال نامه</th>
								<th>شرح نامه ارسالی</th>
								<th>توضیحات</th>
								<th>تایید مدیر</th>
								<th>تاریخ تایید مدیر</th>
								<th>نویسنده نامه</th>
								<th>عملیات</th>
							</tr>
						</thead>
						<tbody>
							<?php
								if($asb1){
									$row = 1;
									foreach ($asb1 as $a ) {
										$si_id = $a['si_id'];

									?>
									<tr>
										<td><?php echo per_number($row); ?></td>
										<td><?php echo $a['si_receiver'];  ?></td>
										<td><?php echo per_number($a['si_send_date']); ?></td>
										<td><?php echo per_number($a['si_description']); ?></td>
										<td><?php echo per_number($a['si_details']); ?></td>
										<td><?php 	$user = new user(); echo $user->get_user_name($a['si_admin_verify']); ?></td>
										<td><?php echo per_number($a['si_admin_date']); ?></td>
										<td><?php 	$user = new user(); echo $user->get_user_name($a['si_writer']); ?></td>
										<td class="force-inline-text">
											<a class="btn btn-success btn-xs" href="<?php get_url(); ?>secretariat/write_letter.php?si_id=<?php echo $si_id; ?>">نوشتن نامه</a>
											<button class="btn btn-warning btn-xs" type="button" data-toggle="modal" data-keyboard="false" data-target="#admin_verify<?php echo $si_id; ?>" >تایید مدیر</button>
											<button class="btn btn-primary btn-xs" type="button" data-toggle="modal" data-keyboard="false" data-target="#edit_modal<?php echo $si_id; ?>">ویرایش</button>
											<div class="modal fade text-xs-left" id="edit_modal<?php echo $si_id; ?>" tabindex="-1" role="dialog" aria-labelledby="#edit_modal<?php echo $si_id; ?>" style="display: none;" aria-hidden="true">
												<div class="modal-dialog" role="document" id="hse_item_edit">
													<form action="" method="post">
														<div class="modal-content">
															<div class="modal-header">
																<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																	<span aria-hidden="true">×</span>
																</button>
																<h4 class="modal-title" id="myModalLabel3">ویرایش نامه ارسالی</h4>
															</div>
															<div class="modal-body">
																<div class="row">
																	<div class="item col-md-6 col-xs-12">
																		<div class="margin-tb input-group-prepend">
																			<span class="input-group-text">گیرنده نامه</span>
																		</div>
																		<input type="text" name="si_receiver" id="si_receiver" placeholder="گیرنده نامه" class="form-control"  value="<?php echo $a['si_receiver']; ?>">
																	</div>
																	<div class="item col-md-6 col-xs-12">
																		<div class="input-group-prepend">
																			<span class="input-group-text">تاریخ ارسال نامه</span>
																		</div>
																		<input type="text" autocomplete="off" class="form-control datepickerClass" placeholder="تاریخ ارسال نامه" id="si_send_date" name="si_send_date" value="<?php echo $a['si_send_date']; ?>">
																	</div>
																	<div class="item col-md-12">
																		<div class="margin-tb input-group-prepend">
																			<span class="input-group-text">شرح نامه ارسالی</span>
																		</div>
																		<input class="form-control" rows="3" id="si_description" type="text" name="si_description" class="form-control" placeholder="شرح نامه ارسالی" data-required="1" value="<?php echo $a['si_description']; ?>">
																		<span></span>
																	</div>
																	<div class="item col-md-12 col-xs-12">
																		<div class="input-group-prepend">
																			<span class="input-group-text">توضیحات</br></span>
																		</div>
																		<input class="form-control" rows="3"  id="si_details" name="si_details" placeholder="توضیحات"  value="<?php echo $a['si_details']; ?>" >
																	</div>
																</div>
															</div>
															<div class="modal-footer">
																<center>
																	<button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">انصراف</button>
																	<button class="btn btn-primary btn-sm" name="update-sender_indicator" value="<?php echo $a['si_id']; ?>" type="submit">ذخیره</button>
																</center>
															</div>
														</div>
													</form>
												</div>
											</div>
											<div class="modal fade text-xs-left" id="admin_verify<?php echo $si_id; ?>" tabindex="-1" role="dialog" aria-labelledby="#admin_verify<?php echo $si_id; ?>" style="display: none;" aria-hidden="true">
												<div class="modal-dialog" role="document">
													<form action="" method="post" enctype="multipart/form-data">
														<input class="hidden" type="text" name="si_id" id="si_id" value="<?php echo $si_id; ?>">
														<div class="modal-content">
															<div class="modal-header">
																<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																	<span aria-hidden="true">×</span>
																</button>
																<h4 class="modal-title" id="myModalLabel3">تایید مدیر</h4>
															</div>
															<div class="modal-body">
																<div class="row">
																	<div class="item col-md-12">
																		<div class="margin-tb input-group-prepend">
																			<span class="input-group-text">توضیحات مدیر</span>
																		</div>
																		<input type="text" id="si_admin_details" name="si_admin_details" placeholder="توضیحات مدیر" value="<?php echo $a['si_admin_details']; ?>">
																	</div>
																</div>
																<div class="row">
																	<div class="item col-md-6">
																		<div class="margin-tb input-group-prepend">
																			<span class="input-group-text">وضعیت</span>
																		</div>
																		<select class="form-control" name="verify" id="verify">
																			<option value="<?php $u_id = $_SESSION['user_id']; echo $u_id; ?>">تایید</option>
																			<option value="0">عدم تایید</option>
																		</select>
																	</div>
																</div>
															</div>
															<div class="modal-footer">
																<button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">انصراف</button>
																<button class="btn btn-primary btn-sm" name="save_admin_verify" type="submit">ذخیره</button>
															</div>
														</div>
													</form>
												</div>
											</div>
											<form action="" method="post" onSubmit="if(!confirm('آیا از انجام این عملیات اطمینان دارید؟')){return false;}">
												<button class="btn btn-danger btn-xs" type="submit" name="delete-sender_indicator" value="<?php echo $si_id; ?>">حذف</button>
											</form>
										</td>
									</tr>
									<?php
										$row++;
									}
									} else {
								?>
								<tr>
									<td colspan="9">داده ای موجود نیست!</td>
								</tr>
								<?php
								}
							?>
						</tbody>
						<tfoot>
							<tr>
								<th>ردیف</th>
								<th>گیرنده نامه</th>
								<th>تاریخ ارسال نامه</th>
								<th>شرح نامه ارسالی</th>
								<th>توضیحات</th>
								<th>تایید مدیر</th>
								<th>تاریخ تایید مدیر</th>
								<th>نویسنده نامه</th>
								<th>عملیات</th>
							</tr>
						</tfoot>
					</table>
				</div>
			</section>
			<?php
		} 
		if($indicator_type=="receive") 
		{ ?>		
			<form action="" method="post" id="myForm" enctype='multipart/form-data'>
				<section class="box box-info">
					<div class="box-header with-border">
						<h3 class="box-title">نامه دریافتی</h3>
					</div>
					<div class="box-body">	
						<div class="row">
							<div  class="item col-md-4 col-xs-12">
								<div class="margin-tb input-group-prepend">
									<span class="input-group-text">شماره نامه دریافتی</span>
								</div>
								<input type="text" name="ri_number" id="ri_number" placeholder="شماره نامه دریافتی" class="form-control">
							</div>
							<div class="item col-md-4 col-xs-12">
								<div class="input-group-prepend">
									<span class="input-group-text">تاریخ نامه دریافتی</span>
								</div>
								<input type="text" autocomplete="off" class="form-control datepickerClass" placeholder="تاریخ نامه دریافتی" id="ri_reg_date" name="ri_reg_date">
							</div>
							<div class="item col-md-4 col-xs-12">
								<div class="margin-tb input-group-prepend">
									<span class="input-group-text">فرستنده نامه</span>
								</div>
								<input type="text" name="ri_sender" id="ri_sender" placeholder="فرستنده نامه" class="form-control">
							</div>
							
							<div class="item col-md-4 col-xs-12">
								<div class="input-group-prepend">
									<span class="input-group-text">تاریخ دریافت نامه</span>
								</div>
								<input type="text" autocomplete="off" class="form-control datepickerClass" placeholder="تاریخ دریافت نامه" id="ri_receive_date" name="ri_receive_date">
							</div>
							<div  class="item col-md-4 col-xs-12">
								<div class="input-group-prepend">
									<span class="input-group-text">ارجاع به:</span>
								</div>
								<select name="u_id" id="u_id" class="form-control">
									<?php
										if(count($user) >0)
										{
											
											foreach ($user as $b ) 
											{
												$u_id = $b['u_id'];
											?>
											<option value="<?php echo $u_id; ?>"><?php echo $b['u_name'] . " " .$b['u_family'] ; ?></option>
											<?php
												
											}
										}
									?>
								</select>
							</div>
							<div class="item col-md-4 col-xs-12">
								<div class="input-group-prepend">
									<span class="input-group-text">تاریخ ارجاع</span>
								</div>
								<input type="text" autocomplete="off" class="form-control datepickerClass" placeholder="تاریخ ارجاع" id="ri_reference_date" name="ri_reference_date">
								</div>
							<div class="item col-md-12">
								<div class="margin-tb input-group-prepend">
									<span class="input-group-text">شرح نامه دریافتی</span>
								</div>
								<textarea class="form-control" rows="3" id="ri_description" type="text" name="ri_description" class="form-control" placeholder="شرح نامه دریافتی" data-required="1"></textarea>
								<span></span>
							</div>
						</div>
						<div style="text-align: center; margin: 20px 0;" class="col-xs-12">
							<button type="submit" class="btn btn-success btn-sm" name="add-received_indicator">ذخیره</button>
						</div>
                    </div>
				</section>
			</form>
			<section class="box box-info">
				<div class="box-header with-border">
					<h3 class="box-title">لیست نامه های دریافتی</h3>
				</div>
				<div class="box-body">
					<table id="example1" class="table table-striped table-bordered table-responsive group_save_table">
						<thead>
							<tr>
								<th>ردیف</th>
								<th>شماره نامه</th>
								<th>تاریخ نامه دریافتی</th>
								<th>فرستنده نامه</th>
								<th>شرح نامه دریافتی</th>
								<th>تاریخ دریافت نامه</th>
								<th>ارجاع به</th>
								<th>تاریخ ارجاع</th>
								<th>عملیات</th>
							</tr>
						</thead>
						<tbody>
							<?php
								if($asb2){
									$row = 1;
									foreach ($asb2 as $a ) {
										$ri_id = $a['ri_id'];
										$u_id1 =  $a['u_id'];
										$user1 =get_select_query("select * from user where u_id = $u_id1 ");


									?>
									<tr>
										<td><?php echo per_number($row); ?></td>
										<td><?php echo per_number($a['ri_number']);  ?></td>
										<td><?php echo per_number($a['ri_reg_date']); ?></td>
										<td><?php echo $a['ri_sender']; ?></td>
										<td><?php echo per_number($a['ri_description']); ?></td>
										<td><?php echo per_number($a['ri_receive_date']); ?></td>
										<td><?php if(count($user1) >0){ echo $user1[0]['u_name'] . " " .$user1[0]['u_family'] ; } ?></td>
										<td><?php echo per_number($a['ri_reference_date']); ?></td>
										<td class="force-inline-text">
											<button class="btn btn-primary btn-xs" type="button" data-toggle="modal" data-keyboard="false" data-target="#edit_modal<?php echo $ri_id; ?>">ویرایش</button>
											<div class="modal fade text-xs-left" id="edit_modal<?php echo $ri_id; ?>" tabindex="-1" role="dialog" aria-labelledby="#edit_modal<?php echo $ri_id; ?>" style="display: none;" aria-hidden="true">
												<div class="modal-dialog" role="document" id="hse_item_edit">
													<form action="" method="post">
														<div class="modal-content">
															<div class="modal-header">
																<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																	<span aria-hidden="true">×</span>
																</button>
																<h4 class="modal-title" id="myModalLabel3">ویرایش نامه دریافتی</h4>
															</div>
															<div class="modal-body">
																<div class="row">
																	<div  class="item col-md-4 col-xs-12">
																		<div class="margin-tb input-group-prepend">
																			<span class="input-group-text">شماره نامه دریافتی</span>
																		</div>
																		<input type="text" name="ri_number" id="ri_number" placeholder="شماره نامه دریافتی" class="form-control" value="<?php echo $a['ri_number']; ?>">
																	</div>
																	<div class="item col-md-4 col-xs-12">
																		<div class="input-group-prepend">
																			<span class="input-group-text">تاریخ نامه دریافتی</span>
																		</div>
																		<input type="text" autocomplete="off" class="form-control datepickerClass" placeholder="تاریخ نامه دریافتی" id="ri_reg_date" name="ri_reg_date" value="<?php echo $a['ri_reg_date']; ?>">
																	</div>
																	<div class="item col-md-4 col-xs-12">
																		<div class="margin-tb input-group-prepend">
																			<span class="input-group-text">فرستنده نامه</span>
																		</div>
																		<input type="text" name="ri_sender" id="ri_sender" placeholder="فرستنده نامه" class="form-control"  value="<?php echo $a['ri_sender']; ?>">
																	</div>
																	
																	<div class="item col-md-4 col-xs-12">
																		<div class="input-group-prepend">
																			<span class="input-group-text">تاریخ دریافت نامه</span>
																		</div>
																		<input type="text" autocomplete="off" class="form-control datepickerClass" placeholder="تاریخ دریافت نامه" id="ri_receive_date" name="ri_receive_date"  value="<?php echo $a['ri_receive_date']; ?>">
																	</div>
																	<div  class="item col-md-4 col-xs-12">
																		<div class="input-group-prepend">
																			<span class="input-group-text">ارجاع به:</span>
																		</div>
																		<select name="u_id" id="u_id" class="form-control">
																			<?php
																				if(count($user) >0)
																				{
																					
																					foreach ($user as $b ) 
																					{
																						$u_id = $b['u_id'];
																					?>
																					<option <?php if($u_id==$a['u_id']) echo "selected"; ?> value="<?php echo $u_id; ?>"><?php echo $b['u_name'] . " " .$b['u_family'] ; ?></option>
																					<?php
																						
																					}
																				}
																			?>
																		</select>
																	</div>
																	<div class="item col-md-4 col-xs-12">
																		<div class="input-group-prepend">
																			<span class="input-group-text">تاریخ ارجاع</span>
																		</div>
																		<input type="text" autocomplete="off" class="form-control datepickerClass" placeholder="تاریخ ارجاع" id="ri_reference_date" name="ri_reference_date" value="<?php echo $a['ri_reference_date']; ?>">
																	</div>
																	<div class="item col-md-12">
																		<div class="margin-tb input-group-prepend">
																			<span class="input-group-text">شرح نامه دریافتی</span>
																		</div>
																		<input class="form-control" rows="3" id="ri_description" type="text" name="ri_description" class="form-control" placeholder="شرح نامه دریافتی" data-required="1" value="<?php echo $a['ri_description']; ?>">
																	</div>
																</div>
															</div>
															<div class="modal-footer">
																<center>
																	<button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">انصراف</button>
																	<button class="btn btn-primary btn-sm" name="update-received_indicator" value="<?php echo $a['ri_id']; ?>" type="submit">ذخیره</button>
																</center>
															</div>
														</div>
													</form>
												</div>
											</div>
											<form action="" method="post" onSubmit="if(!confirm('آیا از انجام این عملیات اطمینان دارید؟')){return false;}">
												<button class="btn btn-danger btn-xs" type="submit" name="delete-received_indicator" value="<?php echo $ri_id; ?>">حذف</button>
											</form>
											
											<button class="btn btn-info btn-xs" type="button" data-toggle="modal" data-keyboard="false" data-target="#doc_modal<?php echo $ri_id; ?>">ویرایش پیوست ها</button>
											<div class="modal fade text-xs-left" id="doc_modal<?php echo $ri_id; ?>" tabindex="-1" role="dialog" aria-labelledby="#doc_modal<?php echo $ri_id; ?>" style="display: none;" aria-hidden="true">
												<div class="modal-dialog" role="document" id="hse_item_edit">
													<form action="" method="post" enctype="multipart/form-data">
														<input type="hidden" name="date" value="<?php echo jdate("Y/n/j"); ?>">
														<div class="modal-content">
															<div class="modal-header">
																<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																	<span aria-hidden="true">×</span>
																</button>
																<h4 class="modal-title" id="myModalLabel3">ویرایش پیوست ها</h4>
															</div>
															<div class="modal-body">
																<div class="row">
																	<div class="item col-md-8">
																		<label for="uploader1[]">انتخاب پیوست</label>
																		<input type="file" name="uploader1[]" multiple/>
																	</div>
																	<div class="item col-md-4">
																		<label for="mri_name">عنوان پیوست</label>
																		<input type="text" name="mri_name" id="mri_name" placeholder="عنوان پیوست" class="form-control" >
																	</div>
																</div>
																<div class="row">
																	<table id="example1" class="table table-striped table-bordered table-responsive group_save_table">
																		<thead>
																			<tr>
																				<th>ردیف</th>
																				<th>عنوان پیوست</th>
																				<th>تاریخ آپلود پیوست</th>
																				<th>لینک پیوست</th>
																				<th>عملیات</th>
																			</tr>
																		</thead>
																		<tbody>
																			<?php
																				$roww=1;
																				if($media)
																				{
																					
																					foreach ($media as $c ) 
																					{
																						$rri_id = $c['ri_id'];
																						$mri_id = $c['mri_id'];
																						if($ri_id==$rri_id)
																						{
																						?>
																						<tr>
																							<td><?php echo $roww; ?></td>
																							<td><?php echo $c['mri_name']; ?></td>
																							<td><?php echo $c['mri_date']; ?></td>
																							<td><a target="_blank" href="<?php get_url(); ?>uploads/media_received_indicator/<?php echo $c['mri_link']; ?>" ><img src="<?php get_url(); ?>uploads/media_received_indicator/<?php echo $c['mri_link']; ?>" style="width:20px;heigh:20px"></a></td>
																							<td class="force-inline-text">
																								<form action="" method="post" onSubmit="if(!confirm('آیا از انجام این عملیات اطمینان دارید؟')){return false;}">
																									<button class="btn btn-danger btn-sm" type="submit" name="delete-media" value="<?php echo $mri_id; ?>">حذف</button>
																								</form>
																							</td>
																						</tr>
																						<?php
																							$roww++;
																						}
																					}
																					} else {
																				?>
																				<tr>
																					<td colspan="9">داده ای موجود نیست!</td>
																				</tr>
																				<?php
																				}
																			?>
																		</tbody>
																		<tfoot>
																			<tr>
																				<th>ردیف</th>
																				<th>عنوان پیوست</th>
																				<th>تاریخ آپلود پیوست</th>
																				<th>لینک پیوست</th>
																				<th>عملیات</th>
																			</tr>
																			
																		</tfoot>
																	</table>
																</div>
															</div>
															<div class="modal-footer">
																<center>
																	<button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">انصراف</button>
																	<button class="btn btn-primary btn-sm" name="update-media" value="<?php echo $a['ri_id']; ?>" type="submit">ذخیره</button>
																</center>
															</div>
														</div>
													</form>
												</div>
											</div>
										</td>
									</tr>
									<?php
										$row++;
									}
									} else {
								?>
								<tr>
									<td colspan="9">داده ای موجود نیست!</td>
								</tr>
								<?php
								}
							?>
						</tbody>
						<tfoot>
							<tr>
								<th>ردیف</th>
								<th>شماره نامه</th>
								<th>تاریخ نامه دریافتی</th>
								<th>فرستنده نامه</th>
								<th>شرح نامه دریافتی</th>
								<th>تاریخ دریافت نامه</th>
								<th>ارجاع به</th>
								<th>تاریخ ارجاع</th>
								<th>عملیات</th>
							</tr>
						</tfoot>
					</table>
				</div>
			</section>
			<?php
		} ?>
	</section>
</div>
<script>

</script>
<script src="<?php get_url(); ?>secretariat/js/secretariat.js"></script>
<?php include"../left-nav.php"; include"../footer.php"; ?>																							