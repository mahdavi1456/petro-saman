<?php $title = "نمایش مشتری"; include"../header.php"; include"../nav.php"; ?>
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>نمایش مشتری</h1>
          <ol class="breadcrumb">
            <li><a href="<?php get_url(); ?>index.php"><i class="fa fa-dashboard"></i> خانه</a></li>
            <li><a href="#">مشتریان</a></li>
            <li class="active">نمایش مشتری</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <div id="details-show" class="col-xs-12">
            <div class="row">
              <div class="item col-md-4">
                <div class="margin-tb input-group-prepend">
                  <span class="input-group-text">نام </span>
                </div>
              </div>
              <div class="item col-md-4">
                <div class="margin-tb input-group-prepend">
                  <span class="input-group-text">نام خانوادگی</span>
                </div>
              </div>
              <div class="item col-md-4">
                <div class="margin-tb input-group-prepend">
                  <span class="input-group-text">نام شرکت</span>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="item col-md-6">
                <div class="margin-tb input-group-prepend">
                  <span class="input-group-text">شماره ملی</span>
                </div>
              </div>
              <div class="item col-md-6">
                <div class="margin-tb input-group-prepend">
                  <span class="input-group-text">کد اقتصادی</span>
                </div>
              </div>
              <div class="item col-md-4">
                <div class="margin-tb input-group-prepend">
                  <span class="input-group-text">تلفن</span>
                </div>
              </div>
              <div class="item col-md-4">
                <div class="margin-tb input-group-prepend">
                  <span class="input-group-text">فکس</span>
                </div>
              </div>
              <div class="item col-md-4">
                <div class="margin-tb input-group-prepend">
                  <span class="input-group-text">موبایل</span>
                </div>
              </div>
              <div class="item col-md-4">
                <div class="margin-tb input-group-prepend">
                  <span class="input-group-text">آدرس دفتر</span>
                </div>
              </div>
              <div class="item col-md-4">
                <div class="margin-tb input-group-prepend">
                  <span class="input-group-text">آدرس کارخانه</span>
                </div>
              </div>
              <div class="item col-md-4">
                <div class="margin-tb input-group-prepend">
                  <span class="input-group-text">آدرس پست الکترونیک</span>
                </div>
              </div>
              <div class="item col-md-4">
                <div class="margin-tb input-group-prepend">
                  <span class="input-group-text">ارزش افزوده</span>
                </div>
              </div>
              <div id="vatdate" class="item col-md-4 col-xs-12">
                <div class="input-group-prepend">
                  <span class="input-group-text">تاریخ انقضا</span>
                </div>
              </div>
              <div class="item col-md-4">
                <div class="input-group-prepend">
                  <span class="input-group-text">نوع مشتری</span>
                </div>
              </div>
              <div style="text-align: center; margin: 20px 0;" class="col-xs-12">
                <button type="submit" class="btn btn-success btn-lg" id="r_submit" name="r_submit">ویرایش</button>
                </div>
              </div>
            </div><!-- /.box -->
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
      <!-- Control Sidebar -->
      <!-- /.control-sidebar -->
      <!-- Add the sidebar's background. This div must be placed immediately after the control sidebar -->
      <div class="control-sidebar-bg"></div>
    </div><!-- ./wrapper -->
<?php include"../left-nav.php"; include"../footer.php"; ?>
