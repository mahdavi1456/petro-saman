<?php include"../header.php"; include"../nav.php";
	
    $aru = new aru();
    $media = new media();
	$asb = $aru->get_list("list_customs", "lc_id");
	$media = $aru->get_list("customs_media", "cm_id");
	$company = $aru->get_list("customer", "c_id");
	
?>
<div class="content-wrapper">
	
	<?php breadcrumb(); ?>
	
	<section class="content">
		<?php 
			if(isset($_POST['add-list_customs'])) {
				$aru->add("list_customs", $_POST);
			}
			if(isset($_POST['update-list_customs'])) {
				$lc_id = $_POST['update-list_customs'];
				$aru->update('list_customs',$_POST,'lc_id', $lc_id);
			}
			if(isset($_POST['delete-list_customs'])){
				$lc_id = $_POST['delete-list_customs'];
                $aru->remove('list_customs','lc_id', $lc_id ,'int');
                $sql = get_select_query("select * from customs_media where lc_id = $lc_id ");
                if(count($sql)>0) {
                    foreach($sql as $row2){
                        $cm_id = $row2['cm_id'];
                        $cm_link = $row2['cm_link'];
                        $path = str_replace($_SERVER['DOCUMENT_ROOT'], '', "../uploads/customs_media/" . $cm_link);
                        if(unlink($path)){
                            $sql2 = "delete from customs_media where cm_id = $cm_id";
                        }
                        $url = 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
                        ?>
                        <?php
                    }
                }
			}
			if(isset($_POST['update-media']))
			{
				$i=0;
                $ary;
                $file = $_FILES['uploader1'];
				$lc_id = $_POST['update-media'];
                $date = $_POST['date'];
                $cm_name = $_POST['cm_name'];
                if (empty($file['name'][$i])){
                    //$home_dir = get_the_url();
                    ?>
                    <script>
                        alertify.set('notifier','position', 'bottom-right');
                        alertify.warning('فایللی انتخاب نشده است');
                    </script>
                    <?php
                }
                else {
                    if($cm_name) {
                        while(!empty($file['name'][$i]))
                        {
                            $filename = $file['name'][$i];
                            $tmp_name = $file['tmp_name'][$i];
                            $size = $file['size'][$i];
                            $link = upload_file($filename, $tmp_name, $size, "0" , "0" , "customs_media");
                            if($link != '0'){
                                $sql="insert into customs_media (lc_id, cm_link, cm_date, cm_name) values ('$lc_id', '$link', '$date', '$cm_name')";
                                ex_query($sql);
                            }
                            $i++;
                            
                        }
                    }
                    else {
                        $home_dir = get_the_url();
                        ?>
                        <script>
                            alertify.set('notifier','position', 'bottom-right');
                            alertify.warning('عنوان وارد نشده است');
                        </script>
                        <?php
                    }
                }
                echo '<meta http-equiv="refresh" content="2"/>';
			}
			if(isset($_POST['delete-media']))
			{
                $cm_id = $_POST['delete-media'];
                $cm_link =get_var_query("select cm_link from customs_media where cm_id = $cm_id ");
                $path = str_replace($_SERVER['DOCUMENT_ROOT'], '', "../uploads/customs_media/" . $cm_link);
                if(unlink($path)){
                    $aru->remove('customs_media','cm_id', $cm_id ,'int');
                }
                $url = 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
                ?>
                <?php
			}
		?>
	</section>
	
	<section class="content pd-btm">
		<section class="box box-info">
			<div class="box-header with-border">
                <h3 class="box-title">مرسوله</h3>
            </div>
            <div class="box-body">
                <form action="" method="post">
                    <div class="row">
                        <div class="item col-md-3">
                            <label for="lc_type">نوع مرسوله</label>
                            <select name="lc_type" id="lc_type" class="form-control">
                                <option value="ارسالی">ارسالی</option>
                                <option value="دریافتی">دریافتی</option>
                            </select>
                        </div>
                        <div class="item col-md-3">
                            <label for="lc_company">نام شرکت</label>
                            <input type="text" name="lc_company" id="lc_company" placeholder="نام شرکت" class="form-control">
                        </div>
                        <div class="item col-md-3">
                            <label for="lc_code">کد رهگیری</label>
                            <input type="text" name="lc_code" id="lc_code" placeholder="کد رهگیری" class="form-control">
                        </div>
                        <div class="item col-md-3">
                            <label for="fb_id">شماره فاکتور</label>
                            <input type="text" name="fb_id" id="fb_id" placeholder="شماره فاکتور" class="form-control">
                        </div>
                    </div>
                    <div class="row">
                        <div  class="item col-md-12">
                            <label for="lc_details">توضیحات</label>
                            <textarea name="lc_details" id="lc_details" placeholder="توضیحات" class="form-control"></textarea>
                        </div>
                    </div>
                    <div class="row">
                        <div class="item col-md-12 text-left">
                            <button type="submit"  class="btn-add" name="add-list_customs">اضافه کردن</button>
                        </div>
                    </div>
                </form>
            </div>
		</section>
    </section>
    
	<section class="content pd-top">
        <section class="box box-info">
			<div class="box-header with-border">
                <h3 class="box-title">لیست مرسولات</h3>
            </div>
            <div class="box-body">
                <table id="example1" class="table table-striped table-bordered table-responsive group_save_table">
                    <thead>
                        <tr>
                            <th>ردیف</th>
                            <th>نوع</th>
                            <th>نام شرکت</th>
                            <th>توضیحات</th>
                            <th>شماره فاکتور</th>
                            <th>کد رهگیری</th>
                            <th>عملیات</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            if($asb){
                                $row = 1;
                                foreach ($asb as $a ) {
                                    $lc_id = $a['lc_id'];
                                ?>
                                <tr>
                                    <td><?php echo per_number($row); ?></td>
                                    <td><?php echo $a['lc_type'];  ?></td>
                                    <td><?php echo $a['lc_company']; ?></td>
                                    <td><?php echo $a['lc_details']; ?></td>
                                    <td><?php echo per_number($a['fb_id']); ?></td>
                                    <td><?php echo per_number($a['lc_code']); ?></td>
                                    <td class="force-inline-text">
                                        <button class="btn btn-primary btn-sm" type="button" data-toggle="modal" data-keyboard="false" data-target="#edit_modal<?php echo $lc_id; ?>">ویرایش</button>
                                        <div class="modal fade text-xs-left" id="edit_modal<?php echo $lc_id; ?>" tabindex="-1" role="dialog" aria-labelledby="#edit_modal<?php echo $lc_id; ?>" style="display: none;" aria-hidden="true">
                                            <div class="modal-dialog" role="document" id="hse_item_edit">
                                                <form action="" method="post">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">×</span>
                                                            </button>
                                                            <h4 class="modal-title" id="myModalLabel3">ویرایش اطلاعات مرسوله</h4>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="row">
                                                                <div class="item col-md-6">
                                                                    <label for="lc_type">نوع مرسوله</label>
                                                                    <select name="lc_type" id="lc_type" class="form-control">
                                                                        <option  <?php if($a['lc_type']=="ارسالی") echo "selected"; ?> value="ارسالی">ارسالی</option>
                                                                        <option  <?php if($a['lc_type']=="دریافتی") echo "selected"; ?> value="دریافتی">دریافتی</option>
                                                                    </select>
                                                                </div>
                                                                <div class="item col-md-6">
                                                                    <label for="c_id">نام شرکت</label>
                                                                    <input type="text" name="lc_company" id="lc_company" placeholder="نام شرکت" class="form-control" value="<?php echo  $a['lc_company']; ?>">
                                                                </div>
                                                                <div class="item col-md-6">
                                                                    <label for="lc_code">کد رهگیری</label>
                                                                    <input type="text" name="lc_code" id="lc_code" placeholder="کد رهگیری" class="form-control" value="<?php echo $a['lc_code']; ?>" >
                                                                </div>
                                                                <div class="item col-md-6">
                                                                    <label for="fb_id">شماره فاکتور</label>
                                                                    <input type="text" name="fb_id" id="fb_id" placeholder="شماره فاکتور" class="form-control" value="<?php echo $a['fb_id']; ?>" >
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div  class="item col-md-12">
                                                                    <label for="lc_details">توضیحات</label>
                                                                    <input name="lc_details" id="lc_details" placeholder="توضیحات" class="form-control"  value="<?php echo $a['lc_details']; ?>" >
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <center>
                                                                <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">انصراف</button>
                                                                <button class="btn btn-primary btn-sm" name="update-list_customs" value="<?php echo $a['lc_id']; ?>" type="submit">ذخیره</button>
                                                            </center>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                        
                                        <button class="btn btn-info btn-sm" type="button" data-toggle="modal" data-keyboard="false" data-target="#doc_modal<?php echo $lc_id; ?>">ویرایش اسناد</button>
                                        <div class="modal fade text-xs-left" id="doc_modal<?php echo $lc_id; ?>" tabindex="-1" role="dialog" aria-labelledby="#doc_modal<?php echo $lc_id; ?>" style="display: none;" aria-hidden="true">
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
                                                                    <label for="cm_name">انتخاب سند</label>
                                                                    <input type="file" name="uploader1[]" multiple/>
                                                                </div>
                                                                <div class="item col-md-4">
                                                                    <label for="cm_name">عنوان سند</label>
                                                                    <input type="text" name="cm_name" id="cm_name" placeholder="عنوان سند" class="form-control" >
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <table id="example1" class="table table-striped table-bordered table-responsive group_save_table">
                                                                    <thead>
                                                                        <tr>
                                                                            <th>ردیف</th>
                                                                            <th>عنوان سند</th>
                                                                            <th>تاریخ آپلود سند</th>
                                                                            <th>لینک سند</th>
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
                                                                                    $llc_id = $c['lc_id'];
                                                                                    $cm_id = $c['cm_id'];
                                                                                    if($lc_id==$llc_id)
                                                                                    {
                                                                                    ?>
                                                                                    <tr>
                                                                                        <td><?php echo per_number($roww); ?></td>
                                                                                        <td><?php echo per_number($c['cm_name']); ?></td>
                                                                                        <td><?php echo per_number(str_replace("-", "/", $c['cm_date'])); ?></td>
                                                                                        <td><a target="_blank" href="<?php get_url(); ?>uploads/customs_media/<?php echo $c['cm_link']; ?>" ><img src="<?php get_url(); ?>uploads/customs_media/<?php echo $c['cm_link']; ?>" style="width:20px;heigh:20px"></a></td>
                                                                                        <td class="force-inline-text">
                                                                                            <form action="" method="post" onSubmit="if(!confirm('آیا از انجام این عملیات اطمینان دارید؟')){return false;}">
                                                                                                <button class="btn btn-danger btn-sm" type="submit" name="delete-media" value="<?php echo $cm_id; ?>">حذف</button>
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
                                                                            <th>عنوان سند</th>
                                                                            <th>تاریخ آپلود سند</th>
                                                                            <th>لینک سند</th>
                                                                            <th>عملیات</th>
                                                                        </tr>
                                                                        
                                                                    </tfoot>
                                                                </table>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <center>
                                                                <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">انصراف</button>
                                                                <button class="btn btn-primary btn-sm" name="update-media" value="<?php echo $a['lc_id']; ?>" type="submit">ذخیره</button>
                                                            </center>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                        <form action="" method="post" onSubmit="if(!confirm('آیا از انجام این عملیات اطمینان دارید؟')){return false;}">
                                            <button class="btn btn-danger btn-sm" type="submit" name="delete-list_customs" value="<?php echo $lc_id; ?>">حذف</button>
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
                            <th>نوع</th>
                            <th>نام شرکت</th>
                            <th>توضیحات</th>
                            <th>شماره فاکتور</th>
                            <th>کد رهگیری</th>
                            <th>عملیات</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </section>
	</section>
</div>
<?php include"../left-nav.php"; include"../footer.php"; ?>