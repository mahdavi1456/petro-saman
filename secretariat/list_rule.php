<?php include"../header.php"; include"../nav.php"; include('function.php');
	$aru = new aru();
	$asb = $aru->list_by_type("secretariat", "s_category", "rule", "string", "s_id");
	$type = $aru->list_by_type("doc_type", "s_category", "rule", "string", "d_id");
	$am = $aru->get_list("media_secretariat", "ms_id");
	
?>
<div class="content-wrapper">
	
	<?php breadcrumb(); ?>
	
	<section class="content">
		<?php 
			if(isset($_POST['add-secretariat'])) {
				$aru->add("secretariat", $_POST);
			}
			if(isset($_POST['update-secretariat'])) {
				$s_id = $_POST['update-secretariat'];
				$aru->update('secretariat',$_POST,'s_id', $s_id);
			}
			if(isset($_POST['delete-secretariat'])){
				$s_id = $_POST['delete-secretariat'];
				$aru->remove('secretariat','s_id', $s_id ,'int');
			}
			if(isset($_POST['update-media']))
			{
				$i=0;
				$ary;
				$ary=uploader($_POST['date'],$_FILES['uploader1']);
				$s_id=$_POST['update-media'];
				$date=$_POST['date'];
				while(!empty($ary[$i]))
				{
					
					$sql="insert into media_secretariat (s_id,ms_link,ms_date) values ('$s_id','$ary[$i]','$date')";
					ex_query($sql);
					$i++;
				}
				echo "<meta http-equiv='refresh' content='0'>";
			}
			if(isset($_POST['delete-media']))
			{
				$ms_id = $_POST['delete-media'];
				$aru->remove('media_secretariat','ms_id', $ms_id ,'int');
			}
		?>
	</section>
	
	<section class="content">
		<section class="box box-info">
			<div class="box-header with-border">
				<div class="box-body">
					<form action="" method="post">
						<input type="hidden" name="s_category" value="rule">
						<div class="row">
							<div class="item col-md-4">
								<label for="s_type0">نوع آیتم</label>
								<select name="s_type" id="s_type0" class="form-control">
									<?php
										if($type)
										{
											
											foreach ($type as $b ) 
											{
												$d_id = $b['d_id'];
											?>
											<option value="<?php echo $d_id; ?>"><?php echo per_number($b['s_type']); ?></option>
											<?php
												
											}
										}
									?>
								</select>
							</div>
							<div class="item col-md-4">
								<label for="s_name0">نام آیتم</label>
								<input type="text" name="s_name" id="s_name0" placeholder="نام آیتم" class="form-control">
							</div>
							<div class="item col-md-4">
								<label for="s_subject0">موضوع</label>
								<input type="text" name="s_subject" id="s_subject0" placeholder="موضوع" class="form-control">
							</div>
						</div>
						<div class="row">
							<div class="item col-md-4">
								<label for="s_date0">تاریخ</label>
								<input type="text" name="s_date" id="s_date0" placeholder="تاریخ" class="form-control datepickerClass" autocomplete="off">
							</div>
							
						</div>
						<div class="row">
							<div class="item col-md-12 text-left">
								<button type="submit"  class="btn-add" name="add-secretariat">اضافه کردن</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</section>
		<table id="example1" class="table table-striped table-bordered table-responsive group_save_table">
			<thead>
				<tr>
					<th>ردیف</th>
					<th>نوع</th>
					<th>نام</th>
					<th>موضوع</th>
					<th>تاریخ</th>
					<th>عملیات</th>
				</tr>
			</thead>
			<tbody>
				<?php
					if($asb){
						$row = 1;
						foreach ($asb as $a ) {
							$s_id = $a['s_id'];
							$s_type = $a['s_type'];
						?>
						<tr>
							<td><?php echo per_number($row); ?></td>
							<td><?php echo $aru->field_by_type("doc_type","s_type","d_id",$s_type,"int"); ?></td>
							<td><?php echo per_number($a["s_name"]); ?></td>
							<td><?php echo per_number($a["s_subject"]); ?></td>
							<td><?php echo per_number($a["s_date"]); ?></td>
							<td class="force-inline-text">
								<button class="btn btn-primary btn-sm" type="button" data-toggle="modal" data-keyboard="false" data-target="#edit_modal<?php echo $s_id; ?>">ویرایش</button>
								<div class="modal fade text-xs-left" id="edit_modal<?php echo $s_id; ?>" tabindex="-1" role="dialog" aria-labelledby="#edit_modal<?php echo $s_id; ?>" style="display: none;" aria-hidden="true">
									<div class="modal-dialog" role="document" id="hse_item_edit">
										<form action="" method="post">
											<div class="modal-content">
												<div class="modal-header">
													<button type="button" class="close" data-dismiss="modal" aria-label="Close">
														<span aria-hidden="true">×</span>
													</button>
													<h4 class="modal-title" id="myModalLabel3">ویرایش اطلاعات</h4>
												</div>
												<div class="modal-body">
													<div class="row">
														<div class="item col-md-6">
															<label for="s_type">نوع آیتم</label>
															<select name="s_type" id="s_type" class="form-control">
																<?php
																	if($type)
																	{
																		
																		foreach ($type as $b ) 
																		{
																			$d_id = $b['d_id'];
																		?>
																		<option <?php if($d_id==$s_type) echo "selected"; ?> value="<?php echo $d_id; ?>"><?php echo per_number($b['s_type']); ?></option>
																		<?php
																			
																		}
																	}
																?>
															</select>
														</div>
														<div class="item col-md-6">
															<label for="s_name">نام آیتم</label>
															<input type="text" name="s_name" id="s_name" placeholder="نام آیتم" value="<?php echo $a["s_name"]; ?>" class="form-control">
														</div>
													</div>
													<div class="row">
														<div class="item col-md-6">
															<label for="s_subject">موضوع</label>
															<input type="text" name="s_subject" id="s_subject" placeholder="موضوع" value="<?php echo $a["s_subject"]; ?>" class="form-control">
														</div>
														<div class="item col-md-6">
															<label for="s_date">تاریخ</label>
															<input type="text" name="s_date" id="s_date" placeholder="تاریخ" value="<?php echo $a["s_date"]; ?>" class="form-control datepickerClass" autocomplete="off">
														</div>
													</div>
												</div>
												<div class="modal-footer">
													<center>
														<button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">انصراف</button>
														<button class="btn btn-primary btn-sm" name="update-secretariat" value="<?php echo $a['s_id']; ?>" type="submit">ذخیره</button>
													</center>
												</div>
											</div>
										</form>
									</div>
								</div>
								<form action="" method="post" onSubmit="if(!confirm('آیا از انجام این عملیات اطمینان دارید؟')){return false;}">
									<button class="btn btn-danger btn-sm" type="submit" name="delete-secretariat" value="<?php echo $s_id; ?>">حذف</button>
								</form>
								<button class="btn btn-info btn-sm" type="button" data-toggle="modal" data-keyboard="false" data-target="#doc_modal<?php echo $s_id; ?>">ویرایش اسناد</button>
								<div class="modal fade text-xs-left" id="doc_modal<?php echo $s_id; ?>" tabindex="-1" role="dialog" aria-labelledby="#doc_modal<?php echo $s_id; ?>" style="display: none;" aria-hidden="true">
									<div class="modal-dialog" role="document" id="hse_item_edit">
										<form action="" method="post" enctype="multipart/form-data">
											<input type="hidden" name="date" value="<?php echo jdate("Y/n/j"); ?>">
											<div class="modal-content">
												<div class="modal-header">
													<button type="button" class="close" data-dismiss="modal" aria-label="Close">
														<span aria-hidden="true">×</span>
													</button>
													<h4 class="modal-title" id="myModalLabel3">ویرایش اسناد</h4>
												</div>
												<div class="modal-body">
													<div class="row">
														<div class="item col-md-8">
															<input type="file" name="uploader1[]" multiple/>
														</div>
													</div>
													<div class="row">
														<table id="example1" class="table table-striped table-bordered table-responsive group_save_table">
															<thead>
																<tr>
																	<th>ردیف</th>
																	<th>تاریخ آپلود عکس</th>
																	<th>لینک عکس</th>
																	<th>عملیات</th>
																</tr>
															</thead>
															<tbody>
																<?php
																	$roww=1;
																	if($am)
																	{
																		
																		foreach ($am as $c ) 
																		{
																			$ss_id = $c['s_id'];
																			$ms_id=$c['ms_id'];
																			if($s_id==$ss_id)
																			{
																			?>
																			<tr>
																				<td><?php echo per_number($roww); ?></td>
																				<td><?php echo per_number($c['ms_date']); ?></td>
																				<td><a target="_blank" href="<?php echo $c['ms_link']; ?>"><img src="<?php echo $c['ms_link']; ?>" style="width:20px;heigh:20px"></a></td>
																				<td class="force-inline-text">
																					<form action="" method="post" onSubmit="if(!confirm('آیا از انجام این عملیات اطمینان دارید؟')){return false;}">
																						<button class="btn btn-danger btn-sm" type="submit" name="delete-media" value="<?php echo $ms_id; ?>">حذف</button>
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
																	<th>تاریخ آپلود عکس</th>
																	<th>لینک عکس</th>
																	<th>عملیات</th>
																</tr>
																
															</tfoot>
														</table>
													</div>
												</div>
												<div class="modal-footer">
													<center>
														<button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">انصراف</button>
														<button class="btn btn-primary btn-sm" name="update-media" value="<?php echo $a['s_id']; ?>" type="submit">ذخیره</button>
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
					<th>نوع</th>
					<th>نام</th>
					<th>موضوع</th>
					<th>تاریخ</th>
					<th>عملیات</th>
				</tr>
			</tfoot>
		</table>
	</section>
</div>
<?php include"../left-nav.php"; include"../footer.php"; ?>