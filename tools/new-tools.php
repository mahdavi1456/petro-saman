<?php include"../header.php"; include"../nav.php";
	$aru = new aru();
	$asb = $aru->get_list('tools','t_id');
?>
<div class="content-wrapper">
	<?php breadcrumb(); ?>
	<section class="content pd-btm">
		<section class="box box-info">
			<div class="box-header">
				<h3 class="box-title">ثبت قطعه جدید</h3>
			</div>
			<div class="box-body pd-btm pd-top">
				<form action="" method="post">
					<div id="details" class="col-xs-12 no-padd">
						<div class="row">
							<div class="item col-md-3">
								<div class="margin-tb input-group-prepend">
									<span class="input-group-text">دسته بندی</span>
								</div>
								<select class="form-control" id="tc_id" name="tc_id">
                                    <?php
                                    $res_st = get_select_query("select * from tools_cat");
                                    if(count($res_st) >0){
                                        foreach($res_st as $row_st){
                                            ?>
                                            <option value="<?php echo $row_st['tc_id']; ?>"><?php echo $row_st['cat_name']; ?></option>
                                                <?php
                                        }
                                    }
                                    ?>
								</select>
							</div>
							<div class="item col-md-3">
								<div class="margin-tb input-group-prepend">
									<span class="input-group-text">نام قطعه</span>
								</div>
								<input id="t_name" type="text" name="t_name" placeholder="نام قطعه" class="form-control">
							</div>
							<div class="item col-md-3">
								<div class="margin-tb input-group-prepend">
									<span class="input-group-text">واحد قطعه</span>
								</div>
								<select name="t_unit" class="form-control">
									<option value="متر">متر</option>
									<option value="کیلوگرم">کیلوگرم</option>
                                    <option value="تعداد">تعداد</option>
								</select>
							</div>
                            <div class="item col-md-3">
								<div class="margin-tb input-group-prepend">
									<span class="input-group-text">موجودی اولیه</span>
								</div>
								<input id="t_stock" type="text" name="t_stock" onkeyup="javascript:FormatNumber('t_stock','t_stock2'); calculate()" placeholder="موجودی اولیه" class="form-control" autocomplete="off" required>
								<input id="t_stock2" type="text" class="form-control" disabled="disabled" style="margin: 0;" />
							</div>
                            <br>
							<?php 
							if(isset($_POST['add-tools'])) {
								$aru->add("tools", $_POST);
							}
							?>
							<div class="item col-md-2 text-left">
								<input type="submit" class="btn btn-success" name="add-tools" value="اضافه کردن" style="width:100%;">
							</div>
						</div>
					</div>
				</form>
			</div>
		</section>
	</section>
	
	<section class="content pd-top">
		<div class="row">
			<div class="col-xs-12">
				<div class="box">
					<div class="box-header">
						<h3 class="box-title">مدیریت قطعات</h3>
					</div>
					<div class="box-body">
						<table id="example1" class="table table-bordered table-striped">
							<thead>
								<tr>
									<th>ردیف</th>
									<th>دسته</th>
									<th>کد قطعه</th>
									<th>نام قطعه</th>
									<th>واحد قطعه</th>
                                    <th>موجودی</th>
									<th>عملیات</th>
								</tr>
							</thead>
							<tbody>
								<?php
								$i = 1;
								if(isset($_POST['update-tools'])) {
									$t_id = $_POST['update-tools'];
									$aru->update('tools',$_POST,'t_id', $t_id);
									echo "<meta http-equiv='refresh' content='0'/>";
                                }
                                if(count($asb) >0){
                                    foreach($asb as $a) { 
                                        $tc_id = $a['tc_id'];
                                        $cat_name = get_var_query("select cat_name from tools_cat where tc_id = $tc_id ");
                                            ?>
                                    <tr>
                                        <td><?php echo per_number($i); ?></td>
                                        <td><?php echo $cat_name; ?></td>
                                        <td><?php echo per_number($a['t_id']); ?></td>
                                        <td><?php echo per_number($a['t_name']); ?></td>
                                        <td><?php echo $a['t_unit']; ?></td>
                                        <td><?php echo per_number(number_format($a['t_stock'])); ?></td>
                                        <td>
                                            <div id="myModal<?php echo $a['t_id']; ?>" class="modal fade" role="dialog">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <form action="" method="post" >
                                                            <div class="modal-header">
                                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                                <h4 class="modal-title">ویرایش قطعات</h4>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="row">
                                                                    <div class="item col-md-4 col-lg-4 col-sm-4 col-xs-4">
                                                                        <div class="margin-tb input-group-prepend">
                                                                            <span class="input-group-text">دسته بندی</span>
                                                                        </div>
                                                                        <select name="tc_id" class="form-control">
                                                                            <?php
                                                                            if(count($res_st) >0){
                                                                                foreach($res_st as $row_st){
                                                                                    ?>
                                                                                <option <?php if($row_st['tc_id'] == $a['tc_id']) echo "selected"; ?> value="<?php echo $row_st['tc_id']; ?>"><?php echo $row_st['cat_name']; ?></option>
                                                                                <?php
                                                                                }
                                                                            }
                                                                            ?>
                                                                        </select>
                                                                    </div>
                                                                    <div class="item col-md-4">
                                                                        <div class="margin-tb input-group-prepend">
                                                                            <span class="input-group-text">نام قطعه</span>
                                                                        </div>
                                                                        <input type="text" name="t_name" value="<?php echo $a['t_name']; ?>" class="form-control">
                                                                    </div>
                                                                    <div class="item col-md-4 col-lg-4 col-sm-4 col-xs-4">
                                                                        <div class="margin-tb input-group-prepend">
                                                                            <span class="input-group-text">واحد قطعه</span>
                                                                        </div>
                                                                        <select name="t_unit" class="form-control">
                                                                            <option <?php if($a['t_unit'] == 'کیلوگرم') { echo 'selected';} ?> value="کیلوگرم">کیلوگرم</option>
                                                                                <option <?php if($a['t_unit'] == 'متر') { echo 'selected';} ?> value="متر">متر</option>
                                                                                <option <?php if($a['t_unit'] == 'تعداد') { echo 'selected';} ?> value="تعداد">تعداد</option>
                                                                        </select>
                                                                    </div>
                                                                </div>        
                                                            </div>
                                                            <div class="modal-footer">
                                                                <center>
                                                                   	<button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">انصراف</button>
                                                                    <button class="btn btn-primary btn-sm" name="update-tools" value="<?php echo $a['t_id']; ?>" type="submit">ذخیره</button>
                                                                </center>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                            <form action="" method="post" onSubmit="if(!confirm('آیا از انجام این عملیات اطمینان دارید؟')){return false;}">
                                                <button type="button" class="btn btn-warning btn-xs" data-toggle="modal" data-target="#myModal<?php echo $a['t_id']; ?>">ویرایش</button>
                                                <button class="btn btn-danger btn-xs" type="submit" name="delete-list" id="delete-list">حذف</button>
                                                <input class="hidden" type="text" name="delete-text" id="delete-text" value="<?php echo $a['t_id']; ?>">
                                                <?php
                                                if(isset($_POST['delete-list'])){
                                                    $t_id = $_POST['delete-text'];
                                                    $aru->remove('tools','t_id', $t_id ,'int');
                                                    exit();
                                                }
                                                ?>
                                            </form>
                                        </td>
                                    </tr>
                                   	<?php
                                        $i++;
                                    } 
                                } ?>
							</tbody>
							<tfoot>
								<tr>
									<th>ردیف</th>
									<th>دسته</th>
									<th>کد قطعه</th>
									<th>نام قطعه</th>
									<th>واحد قطعه</th>
                                    <th>موجودی</th>
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
<div class="control-sidebar-bg"></div>
<script src="../plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../plugins/datatables/dataTables.bootstrap.min.js"></script>
<script>
	$(function () {
		$('#example1').DataTable({
			"paging": true,
			"lengthChange": false,
			"searching": true,
			"ordering": true,
			"info": true,
			"autoWidth": false
		});
	});
</script>
<?php include"../left-nav.php"; include"../footer.php"; ?>								