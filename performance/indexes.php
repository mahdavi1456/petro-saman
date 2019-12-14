<?php include"../header.php"; include"../nav.php";
	$aru = new aru();
	$asb = $aru->get_list('performance_indexes','pi_id');
	if(isset($_POST['add-performance_indexes'])) {
		$aru->add("performance_indexes", $_POST);
	}
?> 
<div class="content-wrapper">
	
	<?php breadcrumb("شاخص ارزیابی" , "index.php"); ?>
	
	<section class="content pd-btm">
		<section class="box box-info">
			<div class="box-header">
				<h3 class="box-title">شاخص ارزیابی</h3>
			</div>
			<div class="box-header with-border">
				<div class="box-body pd-btm pd-top">
					<form action="" method="post">
						<div id="details" class="col-xs-12 no-padd">
							<div class="row">
								<div class="item col-xs-9">
									<div class="margin-tb input-group-prepend">
										<span class="input-group-text">نام شاخص</span>
									</div>
									<input id="pi_name" type="text" name="pi_name" placeholder="نام شاخص" class="form-control">
								</div></br>
								</br>
								<div class="col-xs-3 text-left">
									<button type="submit" class="btn btn-success w-100" id="pi_submit" name="add-performance_indexes">اضافه کردن</button>
								</div>
							</div>
						</div>
					</form>
				</div>
			</div>
		</section>
	</section>
	
	<section class="content pd-top">
		<div class="row">
			<div class="col-xs-12">
				<div class="box">
					<div class="box-header">
						<h3 class="box-title">لیست شاخص های ارزیابی</h3>
					</div>
					<div class="box-body">
						<table id="example1" class="table table-bordered table-striped">
							<thead>
								<tr>
									<th>ردیف</th>
									<th>کد شاخص ارزیابی</th>
									<th>نام شاخص ارزیابی</th>
									<th>عملیات</th>
								</tr>
							</thead>
							<tbody>
								<?php
									$i = 1;
									if(isset($_POST['update-performance_indexes'])) {
										$pi_id = $_POST['update-performance_indexes'];
										$aru->update('performance_indexes',$_POST,'pi_id', $pi_id);
                                    }
                                    if(count($asb) > 0){
                                        foreach ($asb as $a){ ?>
                                        <tr>
                                            <td><?php echo per_number($i); ?></td>
                                            <td><?php echo per_number($a['pi_id']); ?></td>
                                            <td><?php echo per_number($a['pi_name']); ?></td>
                                            <td>
                                                <div id="myModal<?php echo $a['pi_id']; ?>" class="modal fade" role="dialog">
                                                    <div class="modal-dialog">
                                                        <!-- Modal content-->
                                                        <div class="modal-content">
                                                            <form action="" method="post" >
                                                                
                                                                <div class="modal-header">
                                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                                    <h4 class="modal-title">ویرایش شاخص ارزیابی</h4>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <?php echo per_number($a['pi_id']); ?>
                                                                    <div class="row">
                                                                        <div class="item col-xs-12">
                                                                            <input type="text" name="pi_name" value="<?php echo $a['pi_name']; ?>" class="form-control">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <center>
                                                                        <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">انصراف</button>
                                                                        <button class="btn btn-primary btn-sm" name="update-performance_indexes" value="<?php echo $a['pi_id']; ?>" type="submit">ذخیره</button>
                                                                    </center>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                                <form action="" method="post" onSubmit="if(!confirm('آیا از انجام این عملیات اطمینان دارید؟')){return false;}">
                                                <button type="button" class="btn btn-warning btn-xs" data-toggle="modal" data-target="#myModal<?php echo $a['pi_id']; ?>">ویرایش</button>
                                                    <button class="btn btn-danger btn-xs" type="submit" name="delete-list" id="delete-list">حذف</button>
                                                    <input class="hidden" type="text" name="delete-text" id="delete-text" value="<?php echo $a['pi_id']; ?>">
                                                    <?php
                                                        if(isset($_POST['delete-list'])){
                                                            $pi_id = $_POST['delete-text'];
                                                            $aru->remove('performance_indexes','pi_id', $pi_id,'int');
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
						</table>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>
<div class="control-sidebar-bg"></div>
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