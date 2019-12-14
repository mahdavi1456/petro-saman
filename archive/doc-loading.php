<?php include"../header.php"; include"../nav.php"; include"function.php";
	$aru = new aru();
    $doc = $aru->get_list("doc_type", "dt_id");
?>
<?php 
    if(isset($_POST['add-doc_loading']))
    {
        $file = $_FILES['dl_link'];
        $dl_name = $_POST['dl_name'];
        $dt_id = $_POST['dt_id'];
        $date = jdate("Y/n/j");
        if (empty($file['name'])){
            ?>
            <script>
                alertify.set('notifier','position', 'bottom-right');
                alertify.warning('فایللی انتخاب نشده است');
            </script>
            <?php
        }
        else {
            $filename = $file['name'];
            $tmp_name = $file['tmp_name'];
            $size = $file['size'];
            $link = uploader_by_date($date,$file);
            if($link != '0'){
                $sql="insert into doc_loading (dt_id, dl_name, dl_link, dl_date) values ('$dt_id', '$dl_name', '$link', '$date')";
                ex_query($sql);
            }
        }
        echo '<meta http-equiv="refresh" content="2"/>';
    }
    ?>
<div class="content-wrapper">
	
	<?php  breadcrumb("بارگزاری سند" , "index.php"); ?>
	
	<section class="content pd-btm">
		<section class="box box-info">
			<div class="box-header with-border">
                <h3 class="box-title">بارگزاری سند</h3>
			</div>
            <div class="box-body">
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="item col-md-4 col-xs-12">
                            <div class="input-group-prepend">
                                <span class="input-group-text">نوع سند </span><span class="necessary">*</span>
                            </div>
                            <select name="dt_id" id="dt_id" class="form-control">
                                <?php
                                    if(count($doc) >0)
                                    {
                                        
                                        foreach ($doc as $b ) 
                                        {
                                            $dt_id = $b['dt_id'];
                                        ?>
                                        <option value="<?php echo $dt_id; ?>"><?php echo $b['dt_type'] ; ?></option>
                                        <?php
                                            
                                        }
                                    }
                                ?>
                            </select>
                        </div>
                        <div class="item col-md-4 col-xs-12">
                            <div class="margin-tb input-group-prepend">
                                <span class="input-group-text">نام سند </span><span class="necessary">*</span>
                            </div>
                            <input id="dl_name" type="text" name="dl_name" placeholder="نام سند" class="form-control" required>
                        </div>
                        <div class="item col-md-4 col-xs-12">
                            <div class="margin-tb input-group-prepend">
                                <span class="input-group-text">فایل </span><span class="necessary">*</span>
                            </div>
                            <input type="file" name="dl_link" data-required="1">
                        </div>
                    </div>
                    <div class="row">
                        <div class="item col-md-12 text-left">
                            <button type="submit"  class="btn btn-success" name="add-doc_loading">اضافه کردن</button>
                        </div>
                    </div>
                </form>
            </div>
		</section>
	</section>
</div>
<?php include"../left-nav.php"; include"../footer.php"; ?>