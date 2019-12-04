<?php include"../header.php"; include"../nav.php"; $aru = new aru(); 
    $fact_address = get_var_query("select o_value from options where o_key = 'fact_address' ");
    $com_name = get_var_query("select o_value from options where o_key = 'com_name' ");
    $media_sender = $aru->get_list("media_sender_indicator", "msi_id");
    $si_id = $_GET['si_id'];
    if(isset($_GET['letter_type'])) {
        $letter_type = $_GET['letter_type'];
        $si_id = $_GET['si_id'];
        $sql = get_select_query("select * from sender_indicator where si_id = $si_id");
        $media_sender = get_select_query("select * from media_sender_indicator where si_id = $si_id");
    } else {
        $letter_type = "";
    }

    if(isset($_POST['add-sender_indicator'])) {
        $si_writer = $_POST['add-sender_indicator'];
        $si_text = $_POST['si_text'];
        $sql1="update sender_indicator set  si_text = '$si_text' , 	si_writer = ' $si_writer' where si_id = $si_id";
        ex_query($sql1);
        echo '<meta http-equiv="refresh" content="2"/>';
    }

    if(isset($_POST['update-media_sender']))
	{
		$i=0;
		$ary;
		$file = $_FILES['uploader1'];
		$si_id = $_POST['update-media_sender'];
		$date = $_POST['date'];
		$msi_name = $_POST['msi_name'];
		while(!empty($file['name'][$i]))
		{
			$filename = $file['name'][$i];
			$tmp_name = $file['tmp_name'][$i];
			$size = $file['size'][$i];
			$link = upload_file($filename, $tmp_name, $size, "0" , "0" , "media_sender_indicator");
			if($link != '0'){
				$sql3="insert into media_sender_indicator (si_id, msi_link, msi_date, msi_name) values ('$si_id', '$link', '$date', '$msi_name')";
				ex_query($sql3);
			}
			$i++;
		}
		//echo "<meta http-equiv='refresh' content='0'>";
    }
    

    if(isset($_POST['delete-media_sender']))
	{
		$msi_id = $_POST['delete-media_sender'];
		$msi_link =get_var_query("select msi_link from media_sender_indicator where msi_id = $msi_id ");
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


    ?> 
	<div class="content-wrapper">
	
        <?php breadcrumb(); ?>

		<section class="content">
            <form action="" method="get">
                <input type="hidden" name="si_id" value="<?php echo $_GET['si_id']; ?>">
                <section class="box box-info">
                    <div class="box-header with-border">
                        <div class="box-body">
                            <div class="row">
                                <div class="item col-md-4">
                                    <div class="input-group-prepend">
                                        <label for="letter_type">نوع برگه</label>
                                    </div>
                                    <select class="form-control" id="letter_type" name="letter_type" onchange="this.form.submit()">
                                        <option>نوع برگه را انتخاب کنید</option>
                                        <option <?php if($letter_type == "a4") echo "selected"; ?> value="a4">a4</option>
                                        <option <?php if($letter_type == "a5") echo "selected"; ?> value="a5">a5</option>
                                    </select>
                                </div>
                                <div class="item col-md-2">
                                </div>
                                <div class="item col-md-4">
                                    <div class="input-group-prepend">
                                    </div><br>
                                    <button class="btn btn-info btn-lg" type="button" data-toggle="modal" data-keyboard="false" data-target="#doc_modal<?php echo $si_id; ?>">پیوست ها</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </form>
            <div class="modal fade text-xs-left" id="doc_modal<?php echo $si_id; ?>" tabindex="-1" role="dialog" aria-labelledby="#doc_modal<?php echo $si_id; ?>" style="display: none;" aria-hidden="true">
                <div class="modal-dialog" role="document" id="hse_item_edit">
                    <form action="" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="date" value="<?php echo jdate("Y/n/j"); ?>">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                                <h4 class="modal-title" id="myModalLabel3">پیوست ها</h4>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="item col-md-8">
                                        <label for="uploader1[]">انتخاب پیوست</label>
                                        <input type="file" name="uploader1[]" multiple/>
                                    </div>
                                    <div class="item col-md-4">
                                        <label for="msi_name">عنوان پیوست</label>
                                        <input type="text" name="msi_name" id="msi_name" placeholder="عنوان پیوست" class="form-control" >
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
                                                if($media_sender)
                                                {
                                                    
                                                    foreach ($media_sender as $c ) 
                                                    {
                                                        $ssi_id = $c['si_id'];
                                                        $msi_id = $c['msi_id'];
                                                        if($si_id==$ssi_id)
                                                        {
                                                        ?>
                                                        <tr>
                                                            <td><?php echo $roww; ?></td>
                                                            <td><?php echo $c['msi_name']; ?></td>
                                                            <td><?php echo $c['msi_date']; ?></td>
                                                            <td><a target="_blank" href="<?php get_url(); ?>uploads/media_sender_indicator/<?php echo $c['msi_link']; ?>" ><img src="<?php get_url(); ?>uploads/media_sender_indicator/<?php echo $c['msi_link']; ?>" style="width:20px;heigh:20px"></a></td>
                                                            <td class="force-inline-text">
                                                                <form action="" method="post" onSubmit="if(!confirm('آیا از انجام این عملیات اطمینان دارید؟')){return false;}">
                                                                    <button class="btn btn-danger btn-sm" type="submit" name="delete-media_sender" value="<?php echo $msi_id; ?>">حذف</button>
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
                                    <button class="btn btn-primary btn-sm" name="update-media_sender" value="<?php echo $si_id; ?>" type="submit">ذخیره</button>
                                </center>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <?php
            if($letter_type=="a4") { ?>
                <div class="letter-a4">
                    <div class="inline-lab-print-form2" id="letter">
                        <form action="" method="post">
                            <?php
                            if(count($sql) > 0) {
                                foreach($sql as $row) { ?>
                                    <div class="col-md-3 letter-details">
                                        <p style="font-size: 14px!important;">تاریخ: <?php echo  $row['si_send_date']; ?></p>
                                        <p style="font-size: 14px!important;">شماره: <?php echo  $row['si_id']; ?></p>
                                        <p style="font-size: 14px!important;">
                                            <div class="col-md-3 no-padd">پیوست: </div>
                                            <div class="col-md-9 no-padd letter-details-attch">
                                                <?php if(count($media_sender) >0 ){ echo "دارد"; } else { echo "ندارد"; } ?>
                                            </div>
                                        </p>
                                    </div>
                                    <div class="letter-content col-md-12">
                                        <h4><?php echo $row['si_receiver']; ?></h4></br>
                                        <div class="item col-md-12 no-padd">
                                            <textarea class="form-control" rows="19" id="si_text" type="text" name="si_text" class="form-control" placeholder="متن نامه" data-required="1"><?php echo $row['si_text']; ?></textarea>
                                            <span></span>
                                        </div>        
                                        <div class="item col-md-4">
                                        </div>
                                        <div class="item col-md-4">
                                            <div class="margin-tb input-group-prepend">
                                                <p style="font-size: 14px!important;"><?php if($row['si_admin_verify'] != 0){ $user = new user(); echo $user->get_user_name($row['si_admin_verify']); } ?></p>
                                            </div>
                                            <div class="rest-signature">
                                                <?php get_signature($row['si_admin_verify']); ?>
                                            </div>
                                        </div>
                                        <div style="text-align: center; margin: 20px 0;" class="col-xs-12">
                                            <button type="submit" class="btn btn-success btn-sm" name="add-sender_indicator" value="<?php $u_id = $_SESSION['user_id']; echo $u_id; ?>">ذخیره</button>
                                        </div>	
                                    </div>
                                    <?php
                                }
                        } else {
                            echo "eysdas";
                        } ?>
                        </form>
                    </div>
                </div>
                <?php 
            } ?>

            <?php if($letter_type=="a5") { ?>
                <div class="letter-a5">
                    <div class="inline-lab-print-form2" id="letter">
                        <form action="" method="post" id="myForm" enctype='multipart/form-data'>
                            <?php
                            if(count($sql) >0) {
                                foreach($sql as $row) { ?>
                                    <div class="col-md-3 letter-details">
                                        <p style="font-size: 14px!important;">تاریخ: <?php echo  $row['si_send_date']; ?></p>
                                        <p style="font-size: 14px!important;">شماره: <?php echo  $row['si_id']; ?></p>
                                        <p style="font-size: 14px!important;">
                                            <div class="col-md-3 no-padd">
                                            پیوست:
                                            </div>
                                            <div class="col-md-9 no-padd letter-details-attch-a5">
                                                <?php if(count($media_sender) >0 ){ echo "دارد"; } else { echo "ندارد"; } ?>
                                            </div>
                                    </div>
                                    <div class="letter-content col-md-12">
                                        <h4><?php echo $row['si_receiver']; ?></h4></br>
                                        <div class="item col-md-12 no-padd">
                                            <textarea class="form-control" rows="10" id="si_text" type="text" name="si_text" class="form-control" placeholder="متن نامه" data-required="1"><?php echo $row['si_text']; ?></textarea>
                                            <span></span>
                                        </div>        
                                        <div class="item col-md-4">
                                        </div>
                                        <div class="item col-md-4">
                                            <div class="margin-tb input-group-prepend">
                                                <p style="font-size: 14px!important;"><?php if($row['si_admin_verify'] != 0){ $user = new user(); echo $user->get_user_name($row['si_admin_verify']); } ?></p>
                                            </div>
                                            <div class="rest-signature">
                                                <?php get_signature($row['si_admin_verify']); ?>
                                            </div>
                                        </div>
                                        <div style="text-align: center; margin: 20px 0;" class="col-xs-12">
                                            <button type="submit" class="btn btn-success btn-sm" name="add-sender_indicator" value="<?php $u_id = $_SESSION['user_id']; echo $u_id; ?>">ذخیره</button>
                                        </div>	
                                    </div>
                                    <?php
                                }
                            } ?>
                        </form>
                    </div>
                </div>
                <?php 
            } ?>

		</section>
	</div>
<script src="<?php get_url(); ?>secretariat/js/secretariat.js"></script>
<?php include"../left-nav.php"; include"../footer.php"; ?>