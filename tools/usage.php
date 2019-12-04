<?php include"../header.php"; include"../nav.php";
    include"functions.php"; 
	$aru = new aru();
    $asb = $aru->get_list('usage_tools','us_id');
    $us_type = $_GET['us_type'];
    $u_id = $_SESSION['user_id'];

    if(isset($_POST['add-usage_tools'])) {
        $stock = get_stock($_POST['t_id']);
        $us_quantity = $_POST['us_quantity']; 
        if($us_quantity > $stock) {
			echo "<div class='alert-aru col-xs-12'><div class='alert alert-success col-xs-6'><img src='$home_dir/dist/img/check4.gif'>مقدار وارد شده بیشتر از موجودی انبار می باشد.</div></div>";
            echo '<meta http-equiv="refresh" content="2"/>';
        }
        else{
            $aru->add("usage_tools", $_POST);
        }
    }
    ?>
<div class="content-wrapper">
    <?php if($us_type == "مصرفی"){ breadcrumb("قطعات مصرفی"); }
    if($us_type == "امانتی"){ breadcrumb("قطعات امانتی"); }?>
	<section class="content pd-btm">
		<section class="box box-info">
            <div class="box-header">
				<h3 class="box-title">ثبت قطعه <?php echo $us_type; ?></h3>
			</div>
			<div class="box-body pd-btm pd-top">
				<form action="" method="post">
					<div id="details" class="col-xs-12 no-padd">
						<div class="row">
							<div class="item col-md-6">
								<label>نام قطعه</label>
								<select class="form-control" id="t_id" name="t_id">
                                    <?php
                                    $res_st = get_select_query("select * from tools");
                                    if(count($res_st) > 0){
                                        foreach($res_st as $row_st){ ?>
                                        <option value="<?php echo $row_st['t_id']; ?>"><?php echo $row_st['t_name']; ?></option>
                                        <?php
                                        }
                                    }
                                    ?>
								</select>
							</div>
							<div class="item col-md-6">
								<label>تاریخ خروج قطعه</label>
                                <input id="f_date" autocomplete="off" type="text" name="us_date" placeholder="تاریخ خروج قطعه" class="form-control">
							</div>
                            <div class="item col-md-6">
								<label>مقدار خروجی</label>
								<input id="us_quantity" type="text" name="us_quantity" placeholder="مقدار" class="form-control">
							</div>
                            <div class="item col-md-6">
								<label>توضیحات</label>
								<input id="us_details" type="text" name="us_details" placeholder="توضیحات" class="form-control">
							</div><br>
							<div class="item col-md-2 text-left">
								<input type="submit" class="btn btn-success" name="add-usage_tools" value="اضافه کردن">
							</div>
						</div>
					</div>
                    <input type="hidden" name="us_type" value="<?php echo $us_type; ?>">
                    <input type="hidden" name="u_id" value="<?php echo $u_id; ?>">
				</form>
			</div>
		</section>
	</section>
	
	<section class="content pd-top">
		<div class="row">
			<div class="col-xs-12">
				<div class="box">
					<div class="box-header">
						<h3 class="box-title">لیست قطعات <?php echo $us_type; ?></h3>
					</div>
					<div class="box-body">
						<table id="example1" class="table table-bordered table-striped">
							<thead>
								<tr>
									<th>ردیف</th>
									<th>کد قطعه <?php echo $us_type; ?></th>
									<th>نام قطعه</th>
									<th>نام کاربر</th>
									<th>توضیحات</th>
                                    <th>تاریخ خروج قطعه</th>
                                    <th>مقدار خروجی</th>
                                    <th>مقدار بازگشتی</th>
									<th>عملیات</th>
								</tr>
							</thead>
							<tbody>
								<?php
								$i = 1;
								if(isset($_POST['add-tools_returned'])) {
                                    $us_id = $_POST['us_id'];
                                    $remaining = $_POST['remaining'];
                                    $tr_quantity = $_POST['tr_quantity'];
                                    $tr_date = $_POST['tr_date'];
                                    $tr_details = $_POST['tr_details'];
                                    if($remaining < $tr_quantity) {
                                        echo "<div class='alert-aru col-xs-12'><div class='alert alert-success col-xs-6'><img src='$home_dir/dist/img/check4.gif'>مقدار وارد شده بیشتر از مقدار خروجی می باشد.</div></div>";
                                        echo '<meta http-equiv="refresh" content="2"/>';
                                    } else {
                                        if($us_type=="مصرفی"){
                                            $tr_condition = $_POST['tr_condition'];
                                            $res1 = ex_query("insert into tools_returned (us_id ,tr_quantity ,tr_date ,tr_details , tr_condition) values ('$us_id' , '$tr_quantity' , '$tr_date'  ,'$tr_details' , '$tr_condition') ");
                                            if($tr_condition==1){
                                                $res_us = get_select_query("select * from tools_repairs where us_id = $us_id ");
                                                if(count($res_us) > 0){
                                                    $r_notrepaired = $res_us[0]['r_notrepaired'];
                                                    $r_notrepaired_new = $tr_quantity + $r_notrepaired ;
                                                    $res2 = ex_query("update tools_repairs set r_notrepaired = '$r_notrepaired_new' where us_id = $us_id");
                                                } else {
                                                    $res4 = ex_query("insert into tools_repairs (us_id ,r_notrepaired ) values ('$us_id' , '$tr_quantity') ");
                                                }
                                            }
                                        } else{
                                            $res3 = ex_query("insert into tools_returned (us_id ,tr_quantity ,tr_date ,tr_details ) values ('$us_id' , '$tr_quantity' , '$tr_date'  ,'$tr_details') ");
                                        }
                                    }
                                }

                                if(isset($_POST['update-usage_tools'])) {
                                    $us_id = $_POST['update-usage_tools'];
                                    $us_quantity = $_POST['us_quantity'];
                                    if($us_quantity <  $us_quantity_back){
                                        echo "<div class='alert-aru col-xs-12'><div class='alert alert-success col-xs-6'><img src='$home_dir/dist/img/check4.gif'>مقدار وارد شده بیشتر از مقدار خروجی می باشد.</div></div>";
                                        echo '<meta http-equiv="refresh" content="2"/>';
                                    } else {
                                        $aru->update('usage_tools',$_POST,'us_id', $us_id);
                                    }
                                }

                                if(count($asb) >0){
                                    foreach($asb as $a) {
                                        if($a['us_type'] == $us_type){
                                            $t_id = $a['t_id'];
                                            $us_id = $a['us_id'];
                                            $t_name = get_var_query("select t_name from tools where t_id = $t_id ");
                                            $u_name = get_var_query("select u_name from user where u_id = $u_id");
                                            $u_family = get_var_query("select u_family from user where u_id = $u_id");
                                            $quantity_back = get_var_query("select sum(tr_quantity) from tools_returned where us_id = $us_id ");
                                            ?>
                                            <tr>
                                                <td><?php echo per_number($i); ?></td>
                                                <td><?php echo per_number($a['us_id']); ?></td>
                                                <td><?php echo per_number($t_name); ?></td>
                                                <td><?php echo $u_name." ".$u_family; ?></td>
                                                <td><?php echo $a['us_details']; ?></td>
                                                <td><?php echo per_number($a['us_date']); ?></td>
                                                <td><?php echo per_number($a['us_quantity']); ?></td>
                                                <td><?php echo per_number($quantity_back); ?></td>
                                                <td>
                                                    <div id="myModal<?php echo $a['us_id']; ?>" class="modal fade" role="dialog">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <form action="" method="post" >
                                                                    <div class="modal-header">
                                                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                                        <h4 class="modal-title">ویرایش قطعه<?php echo $us_type; ?></h4>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <div class="row">
                                                                            <div class="item col-md-6 col-lg-6 col-sm-6 col-xs-6">
                                                                                <div class="margin-tb input-group-prepend">
                                                                                    <span class="input-group-text">نام قطعه</span>
                                                                                </div>
                                                                                <select name="t_id" class="form-control">
                                                                                    <?php
                                                                                    if(count($res_st) >0){
                                                                                        foreach($res_st as $row_st){
                                                                                                ?>
                                                                                            <option <?php if($row_st['t_id'] == $a['t_id']) echo "selected"; ?> value="<?php echo $row_st['t_id']; ?>"><?php echo $row_st['t_name']; ?></option>
                                                                                                <?php
                                                                                        }
                                                                                    }
                                                                                    ?>
                                                                                </select>
                                                                            </div>
                                                                            <div class="item col-md-6 col-lg-6 col-sm-6 col-xs-6">
                                                                                <div class="margin-tb input-group-prepend">
                                                                                    <span class="input-group-text">تاریخ خروج قطعه</span>
                                                                                </div>
                                                                                <input id="f_date" autocomplete="off" type="text" name="us_date" placeholder="تاریخ خروج قطعه" class="form-control" value="<?php echo $a['us_date']; ?>">
                                                                            </div>
                                                                            <div class="item col-md-6 col-lg-6 col-sm-6 col-xs-6">
                                                                                <div class="margin-tb input-group-prepend">
                                                                                    <span class="input-group-text">مقدار خروجی</span>
                                                                                </div>
                                                                                <input id="us_quantity" type="text" name="us_quantity" placeholder="مقدار" class="form-control"  value="<?php echo $a['us_quantity']; ?>" >
                                                                            </div>
                                                                            <div class="item col-md-6 col-lg-6 col-sm-6 col-xs-6">
                                                                                <div class="margin-tb input-group-prepend">
                                                                                    <span class="input-group-text">توضیحات</span>
                                                                                </div>
                                                                                <input id="us_details" type="text" name="us_details" placeholder="توضیحات" class="form-control"  value="<?php echo $a['us_details']; ?>">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <center>
                                                                            <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">انصراف</button>
                                                                            <button class="btn btn-primary btn-sm" name="update-usage_tools" value="<?php echo $a['us_id']; ?>" type="submit">ذخیره</button>
                                                                        </center>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div id="myModal_back<?php echo $a['us_id']; ?>" class="modal fade" role="dialog">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <form action="" method="post" >
                                                                    <div class="modal-header">
                                                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                                        <h4 class="modal-title">بازگشت قطعه <?php echo $us_type; ?></h4>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <div class="row">
                                                                            <div class="item col-md-4 col-lg-4 col-sm-4 col-xs-4">
                                                                                <div class="margin-tb input-group-prepend">
                                                                                    <span class="input-group-text">تاریخ بازگشت قطعه</span>
                                                                                </div>
                                                                                <input id="f_date" autocomplete="off" type="text" name="tr_date" placeholder="تاریخ بازگشت قطعه" class="form-control">
                                                                            </div>
                                                                            <div class="item col-md-4 col-lg-4 col-sm-4 col-xs-4">
                                                                                <div class="margin-tb input-group-prepend">
                                                                                    <span class="input-group-text">مقدار بازگشتی</span>
                                                                                </div>
                                                                                <input id="tr_quantity" type="text" name="tr_quantity" placeholder="مقدار بازگشتی" class="form-control">
                                                                            </div>
                                                                            <?php 
                                                                            if($us_type=="مصرفی"){ ?>
                                                                                <div class="item col-md-4 col-lg-4 col-sm-4 col-xs-4">
                                                                                    <div class="input-group-prepend">
                                                                                        <span class="input-group-text">تعمیر</span>
                                                                                    </div>
                                                                                    <select class="form-control" id="tr_condition" name="tr_condition">
                                                                                        <option value="<?php echo "1" ; ?>">قابل تعمیر</option>
                                                                                        <option value="<?php echo "-1" ; ?>">غیر قابل تعمیر</option>
                                                                                    </select>
                                                                                </div>
                                                                            <?php
                                                                            }
                                                                            ?>
                                                                            <div class="item col-md-12 col-lg-12 col-sm-12 col-xs-12">
                                                                                <div class="margin-tb input-group-prepend">
                                                                                    <span class="input-group-text">توضیحات بازگشت</span>
                                                                                </div>
                                                                                <input id="tr_details" type="text" name="tr_details" placeholder="توضیحات بازگشت" class="form-control">
                                                                            </div>
                                                                            <input type="hidden" name="remaining" value="<?php  $remaining = $a['us_quantity'] - $quantity_back; echo $remaining; ?>">
                                                                            <input type="hidden" name="us_id" value="<?php echo $a['us_id'];  ?>">
                                                                        </div>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <center>
                                                                            <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">انصراف</button>
                                                                            <button class="btn btn-primary btn-sm" name="add-tools_returned" type="submit">ذخیره</button>
                                                                        </center>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <form action="" method="post" onSubmit="if(!confirm('آیا از انجام این عملیات اطمینان دارید؟')){return false;}">
                                                        <button type="button" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#myModal_back<?php echo $a['us_id']; ?>">بازگشت</button>
                                                        <!-- button type="button" class="btn btn-warning btn-xs" data-toggle="modal" data-target="#myModal<?php echo $a['us_id']; ?>">ویرایش</button!-->
                                                        <button class="btn btn-danger btn-xs" type="submit" name="delete-list" id="delete-list">حذف</button>
                                                        <input class="hidden" type="text" name="delete-text" id="delete-text" value="<?php echo $a['us_id']; ?>">
                                                        <?php
                                                        if(isset($_POST['delete-list'])){
                                                            $us_id = $_POST['delete-text'];
                                                            $aru->remove('usage_tools','us_id', $us_id ,'int');
                                                            $res = ex_query("delete from tools_returned where us_id = $us_id ");        
                                                            exit();
                                                        }
                                                        ?>
                                                    </form>
                                                </td>
                                            </tr>
                                            <?php
                                            $i++;
                                        }
                                    } 
                                } ?>
							</tbody>
							<tfoot>
								<tr>
                                    <th>ردیف</th>
									<th>کد قطعه <?php echo $us_type; ?></th>
									<th>نام قطعه</th>
									<th>نام کاربر</th>
									<th>توضیحات</th>
                                    <th>تاریخ خروج قطعه</th>
                                    <th>مقدار خروجی</th>
                                    <th>مقدار بازگشتی</th>
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
			"searching": false,
			"ordering": false,
			"info": true,
			"autoWidth": false
		});
	});
</script>
<?php include"../left-nav.php"; include"../footer.php"; ?>