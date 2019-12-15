<?php include"../header.php"; include"../nav.php";
    $aru = new aru();
    $media = new media();
    $asb = $aru->get_list("doc_type", "dt_id");
    $media  = get_select_query("select * from doc_loading");
    if(isset($_POST['delete'])){
        $dl_id = $_POST['delete'];
        $res2 = get_select_query("select * from doc_loading where dl_id = $dl_id ");
        if(count($res2)>0){
            foreach ($res2 as $c ) {
                if($c['dl_link'] !=null){
                    $dl_link = $c['dl_link'] ;
                    $media->delete_media(" " , $dl_link);
                }
            }
        }
        exit();
    }
?>

<div class="content-wrapper">
    <?php breadcrumb("مشاهده اسناد" , "index.php"); 
    if($asb){
        $row = 1;
        foreach ($asb as $a ) {
            $dt_id = $a["dt_id"]; ?>
            <section class="content">
                <section class="box box-info">
                    <div class="box-header with-border">
                        <h3 class="box-title">اسناد <?php echo $a["dt_type"]; ?></h3>
                    </div>
                    <div class="box-body">
                        <?php
                        if($media) { 
                            foreach ($media as $b ) {
                                if($b["dt_id"] == $dt_id) { 
                                    $dl_link = $b["dl_link"]; ?>
                                        <div class="item col-md-3 col-xs-12">
                                            <label><?php echo $b["dl_name"] ; ?></label>
                                            <a target="_blank" href="<?php echo  $dl_link ; ?>" ><img src="<?php echo  $dl_link ; ?>" class="img-responsive list-user-up-img"></a>
                                        </div>
                                        <div class="item col-md-3 col-xs-12">
                                            <form action="" method="post" onSubmit="if(!confirm('آیا از انجام این عملیات اطمینان دارید؟')){return false;}">
                                                <button class="btn btn-danger btn-sm" type="submit" name="delete" value="<?php echo $b['dl_id']; ?>">حذف</button>
                                            </form>
                                        </div>
                                    <?php
                                }
                            }
                        } ?>
                    </div>
                </section>
            </section>
            <?php
        }
    } ?>
</div>
<?php include"../left-nav.php"; include"../footer.php"; ?>