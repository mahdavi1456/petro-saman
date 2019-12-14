<?php $title = "تنظیمات"; include"../header.php"; include"../nav.php";
	$aru = new aru();
	$asb = $aru->get_list('factor_description','fd_id');
	if(isset($_POST['add-factor_description'])) {
		$aru->add("factor_description", $_POST);
	}
	if(isset($_POST['update-factor_description'])) {
		$fd_id = $_POST['update-factor_description'];
		$aru->update('factor_description',$_POST,'fd_id', $fd_id);
		echo "<meta http-equiv='refresh' content='0'/>";
	}
	if(isset($_POST['delete-list'])){
		$fd_id = $_POST['delete-text'];
		$aru->remove('factor_description','fd_id', $fd_id ,'int');
		exit();
	}
?>
<div class="content-wrapper">
<?php breadcrumb("" , "index.php"); ?>
	<section class="content">
	    <div class="row">
			<div class="col-xs-12">
				<form action="" method="post">
					<div class="box">
						<div class="box-header">
							<h3 class="box-title">توضیحات پیش فاکتور</h3>
						</div>
						<div class="box-body">
							<div class="row">
								<div class="item col-md-12">
									<span>توضیحات</span>
									<textarea class="form-control" name="fd_text" placeholder="توضیحات" rows="4" cols="50"></textarea>
								</div>
							</div>						
							<div class="row">
								<div class="col-md-12">
									<button class="btn btn-success" name="add-factor_description">افزودن</button>
								</div>
							</div>
						</div>
				    </div>
				</form>
			</div>
		</div>
	</section>
	<section class="content pd-top">
		<div class="row">
			<div class="col-xs-12">
				<div class="box">
					<div class="box-header">
						<h3 class="box-title">لیست توضیحات</h3>
					</div>
					<div class="box-body">
						<table id="example1" class="table table-bordered table-striped">
							<thead>
								<tr>
									<th>ردیف</th>
									<th>توضیحات</th>
									<th>عملیات</th>
								</tr>
							</thead>
							<tbody>
								<?php
									$i = 1;
									if(count($asb)>0){
									foreach($asb as $a) { ?>
									<tr>
										<td><?php echo per_number($i); ?></td>
										<td><?php echo per_number($a['fd_text']); ?></td>
										<td>
											<div id="myModal<?php echo $a['fd_id']; ?>" class="modal fade" role="dialog">
												<div class="modal-dialog">
													<div class="modal-content">
														<form action="" method="post" >
															
															<div class="modal-header">
																<button type="button" class="close" data-dismiss="modal">&times;</button>
																<h4 class="modal-title">ویرایش توضیحات</h4>
															</div>
															<div class="modal-body">
																<div class="row">
																	<div class="item col-md-12">
																		<input type="text" name="fd_text" value="<?php echo $a['fd_text']; ?>" class="form-control">
																	</div>
																</div>
																
															</div>
															<div class="modal-footer">
																<center>
																	<button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">انصراف</button>
																	<button class="btn btn-primary btn-sm" name="update-factor_description" value="<?php echo $a['fd_id']; ?>" type="submit">ذخیره</button>
																</center>
															</div>
														</form>
													</div>
												</div>
											</div>
											<form action="" method="post" onSubmit="if(!confirm('آیا از انجام این عملیات اطمینان دارید؟')){return false;}">
												<button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#myModal<?php echo $a['fd_id']; ?>">ویرایش</button>
												<button class="btn btn-danger btn-sm" type="submit" name="delete-list" id="delete-list">حذف</button>
												<input class="hidden" type="text" name="delete-text" id="delete-text" value="<?php echo $a['fd_id'];?>">
											</form>
										</td>
									</tr>
									<?php
										$i++;
									} 
								}?>
							</tbody>
							<tfoot>
								<tr>
									<th>ردیف</th>
									<th>توضیحات</th>
									<th>عملیات</th>
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