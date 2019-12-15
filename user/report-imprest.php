<?php include"../header.php"; include"../nav.php";
	
    $aru = new aru();
    $media = new media();
	$asb = $aru->get_list("apply_imprest", "ai_id");
    $res3 = get_select_query("select * from max_loan");
    if(count($res3) > 0) {
        $mi_amount = $res3[0]['mi_amount'];
    }
?>
<div class="content-wrapper">
	
    <?php breadcrumb("گزارش مساعده ها" , "index.php");
    
    ?>
    
	<section class="content pd-btm">
        <section class="box box-info">
			<div class="box-header with-border">
                <h3 class="box-title">گزارش مساعده ها</h3>
            </div>
            <div class="box-body">
                <div class="table-responsive">
                    <table id="example1" class="table table-striped table-bordered table-responsive group_save_table">
                        <thead>
                            <tr>
                                <th>ردیف</th>
                                <th>درخواست دهنده</th>
                                <th>تاریخ درخواست</th>
                                <th>مبلغ درخواست</th>
                                <th>توضیحات</th>
                                <th>نام مدیر</th>
                                <th>وضعیت</th>
                                <th>تاریخ</th>
                                <th>نام منابع انسانی</th>
                                <th>وضعیت</th>
                                <th>تاریخ</th>
                                <th>نام امور مالی</th>
                                <th>تاریخ</th>
                                <th>وضعیت</th>
                                <th>عملیات</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                if($asb){
                                    $i = 1;
                                    foreach ($asb as $row ) {
                                    ?>
                                    <tr>
                                        <td><?php echo per_number($i); ?></td>
                                        <td><?php echo get_user_name($row['u_id']); ?></td>
                                        <td><?php echo per_number(str_replace("-", "/", $row['ai_date'])); ?></td>
                                        <td><?php echo per_number(number_format($row['ai_amount'])); ?></td>
                                        <td><?php echo per_number($row['ai_details']); ?></td>
                                        <td><?php if($row['ai_amount'] <= $mi_amount){ echo "نیاز ندارد"; } else { 	$ai_admin_verify = abs($row['ai_admin_verify']);  echo get_user_name($ai_admin_verify); } ?></td>
                                        <td><?php if($row['ai_admin_verify'] > 0 ) { echo "تایید شد"; } else if($row['ai_admin_verify'] < 0 ){  echo "تایید نشد"; } else { echo "نامعتبر"; } ?></td>
                                        <td><?php echo per_number(str_replace("-", "/", $row['ai_admin_date'])); ?></td>
                                        <td><?php $ai_hr_verify = abs($row['ai_hr_verify']); echo get_user_name($ai_hr_verify); ?></td>
                                        <td><?php if($row['ai_hr_verify'] > 0 ) { echo "تایید شد"; } else if($row['ai_hr_verify'] < 0 ){  echo "تایید نشد"; } else { echo "نامعتبر"; } ?></td>
                                        <td><?php echo per_number(str_replace("-", "/", $row['ai_hr_date'])); ?></td>
                                        <td><?php $ai_finan_verify = abs($row['ai_finan_verify']);  echo  get_user_name($ai_finan_verify); ?></td>
                                        <td><?php echo per_number(str_replace("-", "/", $row['ai_finan_date'])); ?></td>
                                        <td><?php if($row['ai_finan_verify'] > 0 ) { echo "تایید شد"; } else if($row['ai_finan_verify'] < 0 ){  echo "تایید نشد"; } else { echo "نامعتبر"; } ?></td>
                                        <td> 
                                            <button class="btn btn-warning btn-xs" type="button" data-toggle="modal" data-keyboard="false" data-target="#apply_loan_modal<?php echo $row['ai_id']; ?>" >توضیحات</button>
                                            <div class="modal fade text-xs-left" id="apply_loan_modal<?php echo $row['ai_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="#apply_loan_modal<?php echo $row['ai_id']; ?>" style="display: none;" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <form action="" method="post" enctype="multipart/form-data">
                                                        <input class="hidden" type="text" name="al_id" id="al_id" value="<?php echo $row['ai_id']; ?>">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">×</span>
                                                                </button>
                                                                <h4 class="modal-title" id="myModalLabel3">توضیحات مساعده</h4>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="row">
                                                                    <?php
                                                                    if($row['ai_amount'] <= $mi_amount) {
                                                                    } 
                                                                    else {?>
                                                                        <div class="item col-md-12">
                                                                            <div class="margin-tb input-group-prepend">
                                                                                <span class="input-group-text">توضیحات مدیر</span>
                                                                            </div>
                                                                            <input class="form-control" type="text" id="ai_admin_details" name="ai_admin_details" placeholder="توضیحات مدیر" value="<?php echo per_number($row['ai_admin_details']); ?>">
                                                                        </div>
                                                                        <?php
                                                                    } ?>
                                                                    <div class="item col-md-12">
                                                                        <div class="margin-tb input-group-prepend">
                                                                            <span class="input-group-text">توضیحات منابع انسانی</span>
                                                                        </div>
                                                                        <input class="form-control" type="text" id="ai_hr_details" name="ai_hr_details" placeholder="توضیحات منابع انسانی" value="<?php echo per_number($row['ai_hr_details']); ?>">
                                                                    </div>
                                                                    <div class="item col-md-12">
                                                                        <div class="margin-tb input-group-prepend">
                                                                            <span class="input-group-text">توضیحات امور مالی</span>
                                                                        </div>
                                                                        <input class="form-control" type="text" id="ai_finan_details" name="ai_finan_details" placeholder="توضیحات امور مالی" value="<?php echo per_number($row['ai_finan_details']); ?>">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <?php
                                        $i++;
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
                                <th>درخواست دهنده</th>
                                <th>تاریخ درخواست</th>
                                <th>مبلغ درخواست</th>
                                <th>توضیحات</th>
                                <th>نام مدیر</th>
                                <th>وضعیت</th>
                                <th>تاریخ</th>
                                <th>نام منابع انسانی</th>
                                <th>وضعیت</th>
                                <th>تاریخ</th>
                                <th>نام امور مالی</th>
                                <th>تاریخ</th>
                                <th>وضعیت</th>
                                <th>عملیات</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </section>
	</section>
</div>
<?php include"../left-nav.php"; include"../footer.php"; ?>