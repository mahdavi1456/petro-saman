<?php include"../header.php"; include"../nav.php";
	
    $aru = new aru();
    $media = new media();
	$asb = $aru->get_list("list_customs", "lc_id");
	$media = $aru->get_list("customs_media", "cm_id");
    $company = $aru->get_list("customer", "c_id");
    if(isset($_POST['add-list_customs'])) {
        $aru->add("list_customs", $_POST);
    }
	
?>
<div class="content-wrapper">
	
	<?php breadcrumb(); ?>
	
	<section class="content pd-btm">
		<section class="box box-info">
			<div class="box-header with-border">
                <h3 class="box-title">ثبت مرسوله</h3>
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
                            <button type="submit"  class="btn btn-success" name="add-list_customs">اضافه کردن</button>
                        </div>
                    </div>
                </form>
            </div>
		</section>
    </section>

</div>
<?php include"../left-nav.php"; include"../footer.php"; ?>