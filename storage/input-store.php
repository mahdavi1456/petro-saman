<?php
include"../header.php"; include"../nav.php";
require_once"../driver/functions.php";
require_once"../buy/functions.php";
$aru = new aru();
$media = new media();
$user = new user();
?>
<?php 
	$u_level = $user->get_current_user_level();
	if(isset($_POST['delete-bar_bring'])){
		$type = "bar_bring_media";
		$bar_id = $_POST['delete-bar_bring'];
		$res2 = get_select_query("select * from bar_bring where bar_id = $bar_id ");
		if(count($res2)>0){
			foreach($res2 as $row2){
				if($row2['bar_pic_doc']!=null){
				$media->delete_media($row2['bar_pic_doc'] , $type);
				}
				if($row2['bar_pic_gh']!=null){
				$media->delete_media($row2['bar_pic_gh'] , $type);
				}
			}
		}
		$aru->remove('bar_bring','bar_id', $bar_id ,'int');
		$l_details = "حذف ورودی انبار";
		update_a_row_buy_log_factor($_POST['fb_id'] , $l_details);
	}

	if(isset($_POST['add-bar_bring'])) {
		$arry = $_POST;
		$bar_pic_doc = "";
		$bar_pic_gh = "";
		$type = "bar_bring_media";
		if(isset($_FILES['bar_pic_doc']) && $_FILES['bar_pic_doc']['size']>0){
			$file = $_FILES['bar_pic_doc'];
			$bar_pic_doc = $media->upload_media($file , $type);
		}
		if(isset($_FILES['bar_pic_gh']) && $_FILES['bar_pic_gh']['size']>0){
			$file = $_FILES['bar_pic_gh'];
			$bar_pic_gh = $media->upload_media($file , $type);
		}
		$arry['bar_pic_doc'] = $bar_pic_doc;
		$arry['bar_pic_gh'] = $bar_pic_gh;
		$fb_id = $_POST["fb_id"];
		$fb_id_exists = get_var_query("select count(fb_id) from factor_buy_body where fb_id = $fb_id");
		if($fb_id == ""){
			?>
			<script>
				alertify.set('notifier','position', 'bottom-right');
 				alertify.warning('کد فاکتور خرید را وارد کنید');
			</script>
			<?php
				echo '<meta http-equiv="refresh" content="2"/>';
			//$aru->add("bar_bring", $arry);
			//$l_details = "ثبت ورودی انبار";
			//update_a_row_buy_log_factor($fb_id, $l_details);
		}else{
			if($fb_id_exists > 0){
				$aru->add("bar_bring", $arry);
				$l_details = "ثبت ورودی انبار";
				update_a_row_buy_log_factor($fb_id, $l_details);
			}else{
				?>
				<script>
					alertify.set('notifier','position', 'bottom-right');
					alertify.error('فاکتور خرید با این کد موجود نمی باشد');
				</script>
				<?php
				echo '<meta http-equiv="refresh" content="2"/>';
			}
		}
	}

	if(isset($_GET['fb_id'])){
		$fb_id = $_GET['fb_id'];
		$st_id_from = get_var_query("select st_id from factor_buy fb inner join factor_buy_body fbb on fb.f_id = fbb.f_id where fbb.fb_id = $fb_id");
		$p_id = get_var_query("select p_id from factor_buy fb inner join factor_buy_body fbb on fb.f_id = fbb.f_id where fbb.fb_id = $fb_id");
		$cat_id = get_var_query("select cat_id from factor_buy fb inner join factor_buy_body fbb on fb.f_id = fbb.f_id where fbb.fb_id = $fb_id");
	} else {
		$fb_id = "";
		$st_id_from = "";
		$p_id = "";
		$cat_id = "";
	}
	?>
<div class="content-wrapper">

<?php breadcrumb("" , "index.php"); ?>
	<script type="text/javascript" src="<?php get_url(); ?>storage/js/storage.js"></script>
	<section class="content">
		<div class="row">
			<div class="col-xs-12">
				<div class="box">
					<div class="box-body">
						<form action="" method="post" enctype='multipart/form-data'>
							<input type="hidden" name="fb_type" value="buy" />
							<div id="details" class="col-xs-12">
								<div class="row">
									<div class="item col-md-3">
										<div class="margin-tb input-group-prepend">
											<span class="input-group-text">کد ردیف فاکتور</span>
										</div>
										<input type="text" id="fb_id" class="form-control" placeholder="کد ردیف فاکتور" name="fb_id" value="<?php echo $fb_id; ?>">
									</div>
									<div class="item col-md-3">
										<div class="margin-tb input-group-prepend">
											<span class="input-group-text">از</span>
										</div>
										<select name="st_id_from" id="st_id_from" class="form-control">
											<option value="0">مرجوعی</option>
											<?php
											$res = get_select_query("select * from storage_list");
											if(count($res)>0){
												foreach($res as $row){ ?>
												<option <?php if($st_id_from == $row['st_id']) echo "selected"; ?> value="<?php echo $row['st_id']; ?>"><?php echo per_number($row['st_name']); ?></option>
												<?php
												}
											}
											?>
										</select>
									</div>
									<div class="item col-md-3">
										<div class="margin-tb input-group-prepend">
											<span class="input-group-text">ماده</span>
										</div>
										<?php
										$res = list_product();
										?>
										<select name="p_id" class="form-control">
											<?php
											foreach($res as $row){
											?>
											<option <?php if($p_id == $row['p_id']) echo "selected"; ?> value="<?php echo $row['p_id']; ?>"><?php echo per_number($row['p_name']); ?></option>
											<?php 
											} ?>
										</select>
									</div>
									<div class="item col-md-3">
										<div class="margin-tb input-group-prepend">
											<span class="input-group-text">دانه بندی</span>
										</div>
										<?php
										$res = list_category();
										?>
										<select name="cat_id" class="form-control">
											<?php
											foreach($res as $row){
											?>
											<option <?php if($cat_id == $row['cat_id']) echo "selected"; ?> value="<?php echo $row['cat_id']; ?>"><?php echo per_number($row['cat_name']); ?></option>
											<?php 
											} ?>
										</select>
									</div>
								</div>
								<div class="row">	
									<div class="item col-md-3">
										<div class="margin-tb input-group-prepend">
											<span class="input-group-text">به</span>
										</div>
										<select name="st_id_to" class="form-control">
											<?php
											$res = get_select_query("select * from storage_list");
											if(count($res)>0){
												foreach($res as $row){ ?>
												<option value="<?php echo $row['st_id']; ?>"><?php echo per_number($row['st_name']); ?></option>
												<?php
												}
											}
											?>
										</select>
									</div>
									<div class="item col-md-3">
										<div class="margin-tb input-group-prepend">
											<span class="input-group-text">تاریخ ورود</span>
										</div>
										<input type="text" id="f_date" name="bar_date"  class="form-control" autocomplete="off" value="<?php echo jdate('Y/n/j'); ?>">
									</div>
									<div class="item col-md-3">
										<div class="margin-tb input-group-prepend">
											<span class="input-group-text">زمان ورود</span>
										</div>
										<input type="text" name="bar_time" class="form-control" value="<?php echo jdate('H:i:s'); ?>">
									</div>
									<div class="item col-md-3">
										<div class="margin-tb input-group-prepend">
											<span class="input-group-text">راننده</span>
										</div>
										<?php
										$res = list_driver();
										?>
										<select name="dr_id" class="form-control select2">
											<?php
											foreach($res as $row){ ?>
											<option value="<?php echo $row['dr_id']; ?>"><?php echo $row['dr_name']; ?></option>
											<?php 
											} ?>
										</select>
									</div>
								</div>
								<div class="row">
									<div class="item col-md-3">
										<div class="margin-tb input-group-prepend">
											<span class="input-group-text">کد بارنامه</span>
										</div>
										<input type="text" class="form-control" placeholder="کد بارنامه" name="barname_code">
									</div>
									<div class="item col-md-3">
										<div class="margin-tb input-group-prepend">
											<span class="input-group-text">وزن بار</span>
										</div>
										<input id="bar_quantity" type="text" name="bar_quantity" onkeyup="javascript:FormatNumber('bar_quantity','bar_quantity2');" placeholder="وزن بار" class="form-control" autocomplete="off" required>
										<input id="bar_quantity2" type="text" class="form-control" disabled="disabled" style="margin: 0;" />
									</div>
									<div class="item col-md-6">
										<div class="margin-tb input-group-prepend">
											<span class="input-group-text">توضیحات</span>
										</div>
										<textarea class="form-control" name="description" placeholder="توضیحات"></textarea>
									</div>
								</div>
								<div class="row">
									<div class="item col-md-6 col-xs-12">
										<input type="file" id="bar_pic_doc" name="bar_pic_doc" class="hidden" />
										<label for="bar_pic_doc">تصویر بارنامه</label>
										<img src="<?php get_url();?>dist/img/no-img.png" class="img-responsive">
									</div>
									<div class="item col-md-6 col-xs-12">
										<input type="file" id="bar_pic_gh" name="bar_pic_gh" class="hidden" />
										<label for="bar_pic_gh">تصویر قبض باسکول</label>
										<img src="<?php get_url();?>dist/img/no-img.png" class="img-responsive">
									</div>
								</div>
								<script src="<?php get_url(); ?>include/media/script.js"></script>
								<div class="row">
									<div class="col-md-5"></div>
									<div class="item col-md-2">
									<?php
									if($u_level=="مدیریت" || $u_level=="بازرگانی"){ ?>
										<input type="submit" class="btn btn-success" name="add-bar_bring" value="اضافه کردن" style="width:100%;">
										<?php }
									else {?>
										<input type="submit" class="btn btn-success" value="اضافه کردن" style="width:100%;" disabled>
										<?php } ?>
									</div>
									<div class="col-md-5"></div>
								</div>
							</div>
						</form>
						<table id="example1" class="table table-bordered table-striped table_pagination">
							<thead>
								<tr>
								    <th>ردیف</th>
									<th>از</th>
									<th>به</th>
									<th>کد فاکتور</th>
									<th>کد بارنامه</th>
									<th>وزن</th>
									<th>تاریخ ورود</th>
									<th>زمان ورود</th>
									<th>آزمایشگاه</th>
									<th>عملیات</th>
								</tr>
							</thead>
							<tbody>
							<?php
							$list_bar_bring = 0;
							$list_bar_bring = $aru->get_list('bar_bring','bar_id');
							$i=1;
							if($list_bar_bring){
							foreach ($list_bar_bring as $row) {
								$bar_id = $row['bar_id'];

								$p_name = " ";
								$cat_name = " ";
								$st_name = " ";
								
								$p_id = $row['p_id'];
								$p_name = get_var_query("select p_name from product where p_id = $p_id");
								$cat_id = $row['cat_id'];
								$cat_name = get_var_query("select cat_name from category where cat_id = $cat_id");
								$st_id_from = $row['st_id_from'];

								if($st_id_from != 0){
									$st_name_from = get_var_query("select st_name from storage_list where st_id = $st_id_from");
								}else{
									$st_name_from = "مرجوعی";
								}

								$st_id_to = $row['st_id_to'];
								$st_name_to = get_var_query("select st_name from storage_list where st_id = $st_id_to");
								?>
								<tr>
								    <td><?php echo per_number($i); ?></td>
									<td><?php echo per_number($st_name_from); ?></td>
									<td><?php echo per_number($st_name_to); ?></td>
								    <td><?php echo per_number($row['fb_id']); ?></td>
									<td><?php echo per_number($row['barname_code']); ?></td>
								    <td><?php echo per_number(number_format($row['bar_quantity'])); ?></td>
									<td><?php echo per_number(str_replace("-", "/", $row['bar_date']));?></td>
									<td><?php echo per_number($row['bar_time']); ?></td>
									<td>
										<?php
										$cycle = "buy";
										$cycle_id = $row['bar_id'];
										$check_analyze = get_var_query("select count(analyze_id) from analyze_form where cycle = '$cycle' and cycle_id = $cycle_id");
										if($check_analyze > 0){ ?>
											<a class="btn btn-success btn-sm" href="<?php if($u_level=="مدیریت" || $u_level=="آزمایشگاه"){ ?>../lab/report-analyze.php?cycle=<?php echo $cycle; ?>&cycle_id=<?php echo $cycle_id; ?><?php }else{echo "#";} ?>">گزارش آزمون</a>
											<?php
										}else{
											?>
											<a class="btn btn-info btn-sm" href="<?php if($u_level=="مدیریت" || $u_level=="آزمایشگاه"){ ?>../lab/form-analyze.php?cycle=<?php echo $cycle; ?>&cycle_id=<?php echo $cycle_id; ?><?php }else{echo "#";} ?>">فرم آزمایشگاه</a>
											<?php
										}
										?>
									</td>
									<td>
										<button type="button" class="btn btn-info btn-xs" data-toggle="modal" data-target="#myModal<?php echo $bar_id; ?>_1">مشاهده مدارک</button>
										<div id="myModal<?php echo $bar_id; ?>_1" class="modal fade" role="dialog">
    										<div class="modal-dialog">
    											<div class="modal-content">
    												<form action="" method="post" >
    													<div class="modal-header">
    														<button type="button" class="close" data-dismiss="modal">&times;</button>
    														<h4 class="modal-title">ویرایش مدارک</h4>
    													</div>
    													<div class="modal-body">
															<div>
															تصویر بارنامه :
																<?php if($row["bar_pic_doc"]){ ?>
																<a target="_blank" href="<?php echo get_url() . "/uploads/bar_bring_media/" . $row["bar_pic_doc"]; ?>"><img src="<?php get_url(); ?>uploads/bar_bring_media/<?php echo $row["bar_pic_doc"]; ?>" style="width:20px;heigh:20px"></a>
																<?php }else{ ?>
																<label>موجود نیست!</label>
																<?php } ?>
															</div>
															<div>
															تصویر قبض باسکول :
																<?php if($row["bar_pic_gh"]){ ?>
																<a target="_blank" href="<?php echo get_url() . "/uploads/bar_bring_media/" . $row["bar_pic_gh"]; ?>"><img src="<?php get_url(); ?>uploads/bar_bring_media/<?php echo $row["bar_pic_gh"]; ?>" style="width:20px;heigh:20px"></a>
																<?php }else{ ?>
																<label>موجود نیست!</label>
																<?php } ?>
															</div>
    													</div>
    													<div class="modal-footer">
    													</div>
    												</form>
    											</div>
    										</div>
    									</div>

										<form action="" method="post" onSubmit="if(!confirm('آیا از انجام این عملیات اطمینان دارید؟')){return false;}">
										<?php 
										if($u_level=="مدیریت" ){ ?>
											<button class="btn btn-danger btn-xs" type="submit" name="delete-bar_bring" value="<?php echo $row['bar_id'];?>">حذف</button>
											<?php } 
										else {?>
												<button class="btn btn-danger btn-sm" disabled>حذف</button>
											<?php } ?>
											<input type="hidden" name="fb_id" value="<?php echo $row['fb_id']; ?>">
										</form>
									</td>
								</tr>
							<?php $i++; } } ?>
							</tbody>
							<tfoot>
								<tr>
									<th>ردیف</th>
									<th>از</th>
									<th>به</th>
									<th>کد فاکتور</th>
									<th>کد بارنامه</th>
									<th>وزن</th>
									<th>تاریخ ورود</th>
									<th>زمان ورود</th>
									<th>آزمایشگاه</th>
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