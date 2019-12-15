<?php include"../header.php"; include"../nav.php";
	
    $aru = new aru();
    $media = new media();
	$asb = $aru->get_list("apply_loan", "al_id");

?>
<div class="content-wrapper">
	
    <?php breadcrumb("گزارش وام ها" , "index.php");
    
    ?>
    
	<section class="content pd-btm">
        <section class="box box-info">
			<div class="box-header with-border">
                <h3 class="box-title">گزارش وام ها</h3>
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
                                        $lpc_id = $row['lpc_id'] ;
                                        $lpc_amount = get_var_query("select lpc_amount from loan_points_ceiling  where lpc_id = $lpc_id ");
                                    ?>
                                    <tr>
                                        <td><?php echo per_number($i); ?></td>
                                        <td><?php echo get_user_name($row['u_id']); ?></td>
                                        <td><?php echo per_number(str_replace("-", "/", $row['al_date'])); ?></td>
                                        <td><?php echo per_number(number_format($lpc_amount)); ?></td>
                                        <td><?php echo per_number($row['al_details']); ?></td>
                                        <td><?php $al_admin_verify = abs($row['al_admin_verify']);  echo get_user_name($al_admin_verify);  ?></td>
                                        <td><?php if($row['al_admin_verify'] > 0 ) { echo "تایید شد"; } else if($row['al_admin_verify'] < 0 ){  echo "تایید نشد"; } else { echo "نامعتبر"; } ?></td>
                                        <td><?php echo per_number(str_replace("-", "/", $row['al_admin_date'])); ?></td>
                                        <td><?php $al_hr_verify = abs($row['al_hr_verify']); echo get_user_name($al_hr_verify); ?></td>
                                        <td><?php if($row['al_hr_verify'] > 0 ) { echo "تایید شد"; } else if($row['al_hr_verify'] < 0 ){  echo "تایید نشد"; } else { echo "نامعتبر"; } ?></td>
                                        <td><?php echo per_number(str_replace("-", "/", $row['al_hr_date'])); ?></td>
                                        <td><?php $al_finan_verify = abs($row['al_finan_verify']);  echo  get_user_name($al_finan_verify); ?></td>
                                        <td><?php echo per_number(str_replace("-", "/", $row['al_finan_date'])); ?></td>
                                        <td><?php if($row['al_finan_verify'] > 0 ) { echo "تایید شد"; } else if($row['al_finan_verify'] < 0 ){  echo "تایید نشد"; } else { echo "نامعتبر"; } ?></td>
                                        <td> 
                                            <button class="btn btn-warning btn-xs" type="button" data-toggle="modal" data-keyboard="false" data-target="#apply_loan_modal<?php echo $row['al_id']; ?>" >توضیحات</button>
                                            <div class="modal fade text-xs-left" id="apply_loan_modal<?php echo $row['al_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="#apply_loan_modal<?php echo $row['al_id']; ?>" style="display: none;" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <form action="" method="post" enctype="multipart/form-data">
                                                        <input class="hidden" type="text" name="al_id" id="al_id" value="<?php echo $row['al_id']; ?>">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">×</span>
                                                                </button>
                                                                <h4 class="modal-title" id="myModalLabel3">توضیحات مساعده</h4>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="row">
                                                                    <div class="item col-md-12">
                                                                        <div class="margin-tb input-group-prepend">
                                                                            <span class="input-group-text">توضیحات مدیر</span>
                                                                        </div>
                                                                        <input class="form-control" type="text" id="al_admin_details" name="al_admin_details" placeholder="توضیحات مدیر" value="<?php echo per_number($row['al_admin_details']); ?>">
                                                                    </div>
                                                                       
                                                                    <div class="item col-md-12">
                                                                        <div class="margin-tb input-group-prepend">
                                                                            <span class="input-group-text">توضیحات منابع انسانی</span>
                                                                        </div>
                                                                        <input class="form-control" type="text" id="al_hr_details" name="al_hr_details" placeholder="توضیحات منابع انسانی" value="<?php echo per_number($row['al_hr_details']); ?>">
                                                                    </div>
                                                                    <div class="item col-md-12">
                                                                        <div class="margin-tb input-group-prepend">
                                                                            <span class="input-group-text">توضیحات امور مالی</span>
                                                                        </div>
                                                                        <input class="form-control" type="text" id="al_finan_details" name="al_finan_details" placeholder="توضیحات امور مالی" value="<?php echo per_number($row['al_finan_details']); ?>">
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