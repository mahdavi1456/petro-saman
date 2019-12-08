<?php include"../header.php"; include"../nav.php";
    $aru = new aru();
    $media = new media();
	$asb = $aru->get_list('header_loading','hl_id');
?> 
<div class="content-wrapper">
	
    <?php breadcrumb("بارگزاری سربرگ"); 
    if(isset($_POST['update-header_loading'])) {
        $hl_id = $_POST['update-header_loading'];
        $hl_name =  $_POST['hl_name'];
        if($hl_name == "سربرگ نامه ارسالی (a4)"){
            $media_name = "letter-a4";
        }
        else if($hl_name == "سربرگ نامه ارسالی (a5)"){
            $media_name = "letter-a5";
        }
        else if($hl_name == "سربرگ آزمایشگاه(a4)"){
            $media_name = "lab-a4";
        }
        else if($hl_name == "سربرگ مرخصی (a5)"){
            $media_name = "rest-a5";
        }
        if(isset($_FILES['hl_link']) && $_FILES['hl_link']['size']>0){
            $file = $_FILES['hl_link'];
            $hl_link = $media->upload_media_header($file , $media_name);
            echo $hl_link;
            if($hl_link != '0'){
                $res2 = ex_query("update header_loading set hl_link = '$hl_link'  where hl_id = $hl_id");
            }
            echo "<meta http-equiv='refresh' content='0'/>";
        }
    }
    ?>
	
	<section class="content pd-top">
		<div class="row">
			<div class="col-xs-12">
				<div class="box">
					<div class="box-header">
						<h3 class="box-title">بارگزاری سربرگ</h3>
					</div>
					<div class="box-body">
						<table id="example1" class="table table-bordered table-striped">
							<thead>
								<tr>
									<th>ردیف</th>
									<th>نام</th>
									<th>سربرگ</th>
									<th>عملیات</th>
								</tr>
							</thead>
							<tbody>
								<?php
									$i = 1;
                                    if(count($asb) > 0){
                                        foreach ($asb as $a){ ?>
                                            <tr>
                                                <td><?php echo per_number($i); ?></td>
                                                <td><?php echo per_number($a['hl_name']); ?></td>
                                                <td><?php if($a['hl_link'] != null) { ?><a target="_blank" href="<?php get_url(); ?>dist/img/set/<?php echo $a['hl_link']; ?>" ><img src="<?php get_url(); ?>dist/img/set/<?php echo $a['hl_link']; ?>" style="width:20px;heigh:20px"></a> <?php } ?></td>
                                                <td>
                                                    <div id="myModal<?php echo $a['hl_id']; ?>" class="modal fade" role="dialog">
                                                        <div class="modal-dialog">
                                                            <!-- Modal content-->
                                                            <div class="modal-content">
                                                                <form action="" method="post" enctype="multipart/form-data">
                                                                    <input type="hidden" name="hl_name" value="<?php echo $a['hl_name']; ?>">
                                                                    <div class="modal-header">
                                                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                                        <h4 class="modal-title">بارگزاری سربرگ</h4>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <?php echo per_number($a['hl_name']); ?>
                                                                        <div class="row">
                                                                            <div class="item col-xs-12">
                                                                                <input type="file" name="hl_link" data-required="1">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <center>
                                                                            <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">انصراف</button>
                                                                            <button class="btn btn-primary btn-sm" name="update-header_loading" value="<?php echo $a['hl_id']; ?>" type="submit">ذخیره</button>
                                                                        </center>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <form action="" method="post" onSubmit="if(!confirm('آیا از انجام این عملیات اطمینان دارید؟')){return false;}">
                                                    <button type="button" class="btn btn-warning btn-xs" data-toggle="modal" data-target="#myModal<?php echo $a['hl_id']; ?>">بارگزاری</button>
                                                        <button class="btn btn-danger btn-xs" type="submit" name="delete-list" id="delete-list">حذف سربرگ</button>
                                                        <input class="hidden" type="text" name="delete-text" id="delete-text" value="<?php echo $a['hl_id']; ?>">
                                                        <?php
                                                            if(isset($_POST['delete-list'])){
                                                                $hl_id = $_POST['delete-text'];
                                                                $hl_link = get_var_query("select hl_link from header_loading where hl_id = $hl_id");
                                                                $path = str_replace($_SERVER['DOCUMENT_ROOT'], '', "../dist/img/set/". $hl_link);
                                                                if($path != "../dist/img/set/"){
                                                                    if(unlink($path)){
                                                                        $res = ex_query("update header_loading set hl_link =''  where hl_id = $hl_id");
                                                                    }
                                                                    $url = 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
                                                                    ?>
                                                                    <script type="text/javascript">
                                                                        window.location.href = "<?php echo $url; ?>";
                                                                    </script>
                                                                    <?php 
                                                                }
                                                                    echo "<meta http-equiv='refresh' content='0'/>";
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