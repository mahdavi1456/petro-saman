<?php include 'header.php'; include 'nav.php'; require_once("customer/functions.php"); 
$user = new user();
$u_level = $user->get_current_user_level();
?>
<div class="content-wrapper">
    <section class="content">
		<div class="row">
			<div class="col-lg-3 col-sm-3 col-xs-6">
				<div class="small-box bg-aqua">
					<div class="inner">
						<h3><?php echo per_number(get_var_query("select count(fb_id) from factor_body where fb_verify_admin1 > 0")); ?></h3>
						<p>سفارش فروش</p>
					</div>
					<div class="icon">
						<i class="ion ion-bag"></i>
					</div>
					<a href="#" class="small-box-footer">اطلاعات بیشتر <i class="fa fa-arrow-circle-left"></i></a>
				</div>
			</div>
			<div class="col-lg-3 col-sm-3 col-xs-6">
				<div class="small-box bg-green">
					<div class="inner">
						<h3><?php echo per_number(get_var_query("select count(fb_id) from factor_buy_body where fb_verify_admin1 > 0")); ?></h3>
						<p>سفارش خرید</p>
					</div>
					<div class="icon">
						<i class="ion ion-stats-bars"></i>
					</div>
					<a href="#" class="small-box-footer">اطلاعات بیشتر <i class="fa fa-arrow-circle-left"></i></a>
				</div>
			</div>
			<div class="col-lg-3 col-sm-3 col-xs-6">
				<div class="small-box bg-yellow">
					<div class="inner">
						<h3><?php echo per_number(get_var_query("select count(c_id) from customer")); ?></h3>
						<p>مشتری فعال</p>
					</div>
					<div class="icon">
						<i class="ion ion-person-add"></i>
					</div>
					<a href="<?php get_url(); ?>customer/list-customer.php?action=customer" class="small-box-footer">اطلاعات بیشتر <i class="fa fa-arrow-circle-left"></i></a>
				</div>
			</div>
			<div class="col-lg-3 col-sm-3 col-xs-6">
				<div class="small-box bg-red">
					<div class="inner">
						<h3><?php echo per_number(customer_expire_count()); ?></h3>
						<p>ارزش افزوده منقضی</p>
					</div>
					<div class="icon">
						<i class="ion ion-pie-graph"></i>
					</div>
					<a href="<?php get_url(); ?>customer/list-customer.php?action=expire" class="small-box-footer">اطلاعات بیشتر <i class="fa fa-arrow-circle-left"></i></a>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="box box-info">
					<div class="box-header with-border">
						<h3 class="box-title">کارتابل شما</h3>
						<div class="box-tools pull-right">
							<button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
							<button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
						</div>
					</div>
					<div class="box-body">
						<div class="table-responsive">
							<table class="table no-margin">
								<thead>
									<tr>
                                 		<th>ردیف</th>
										<th>شماره آیتم</th>
                                 		<th>تاریخ ثبت</th>
										<th>عنوان آیتم</th>
										<th>وضعیت فعلی</th>
                                 		<th>لینک</th>
                              		</tr>
								</thead>
								<tbody>
                              	<?php
                              	$cartable = new Cartable();
                              	$u_id = $_SESSION['user_id'];
                              	$level = get_var_query("select u_level from user where u_id = $u_id");
                              	if($level=='مدیریت'){
                                	$cartable->get_works_manager();
                              	}
                              	if($level=='بازرگانی'){
                                	$cartable->get_works_seller();
                              	}
                              	if($level=='امور مالی'){
                                	$cartable->get_works_finan();
                              	}
                              	?>
								</tbody>
							</table>
						</div>
					</div>
					<div class="box-footer clearfix"></div>
				</div>
			</div>
			<?php
			if($u_level == "مدیریت" || $u_level == "منابع انسانی") { ?>
				<div class="col-md-12">
					<div class="box box-info">
						<div class="box-header with-border">
							<h3 class="box-title">کارتابل مرخصی ساعتی</h3>
							<div class="box-tools pull-right">
								<button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
								<button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
							</div>
						</div>
						<div class="box-body">
							<div class="table-responsive">
								<table class="table no-margin">
									<thead>
										<tr>
											<th>ردیف</th>
											<th>درخواست دهنده</th>
											<th>تاریخ</th>
											<th>از ساعت</th>
											<th>تا ساعت</th>
											<th>به مدت</th>
											<th>توضیحات</th>
											<th>تایید مدیر</th>
											<th>تاریخ</th>
											<th>تایید HR</th>
											<th>تاریخ</th>
											<th>عملیات</th>
										</tr>
									</thead>
									<tbody>
									<?php
									$cartable->rest_hour();
									?>
									</tbody>
								</table>
							</div>
						</div>
						<div class="box-footer clearfix"></div>
					</div>
				</div>
				<?php
			} 
			if($u_level == "مدیریت" || $u_level == "منابع انسانی") { ?>
				<div class="col-md-12">
					<div class="box box-info">
						<div class="box-header with-border">
							<h3 class="box-title">کارتابل مرخصی روزانه</h3>
							<div class="box-tools pull-right">
								<button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
								<button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
							</div>
						</div>
						<div class="box-body">
							<div class="table-responsive">
								<table class="table no-margin">
									<thead>
										<tr>
											<th>ردیف</th>
											<th>درخواست دهنده</th>
											<th>از تاریخ</th>
											<th>تا تاریخ</th>
											<th>به مدت</th>
											<th>توضیحات</th>
											<th>تایید مدیر</th>
											<th>تاریخ</th>
											<th>تایید HR</th>
											<th>تاریخ</th>
											<th>عملیات</th>
										</tr>
									</thead>
									<tbody>
									<?php
									$cartable->rest_day();
									?>
									</tbody>
								</table>
							</div>
						</div>
						<div class="box-footer clearfix"></div>
					</div>
				</div>
				<?php
			}
			if($u_level == "مدیریت" || $u_level == "منابع انسانی") { ?>
				<div class="col-md-12">
					<div class="box box-info">
						<div class="box-header with-border">
							<h3 class="box-title">کارتابل درخواست مساعده</h3>
							<div class="box-tools pull-right">
								<button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
								<button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
							</div>
						</div>
						<div class="box-body">
							<div class="table-responsive">
								<table class="table no-margin">
									<thead>
										<tr>
											<th>ردیف</th>
											<th>درخواست دهنده</th>
											<th>تاریخ درخواست</th>
											<th>مبلغ درخواست</th>
											<th>توضیحات</th>
											<th>تایید مدیر</th>
											<th>تاریخ تایید</th>
											<th>تایید HR</th>
											<th>تاریخ</th>
											<th>عملیات</th>
										</tr>
									</thead>
									<tbody>
									<?php
									$cartable->apply_loan();
									?>
									</tbody>
								</table>
							</div>
						</div>
						<div class="box-footer clearfix"></div>
					</div>
				</div>
				<?php
			}
			if($u_level == "مدیریت") { ?>
				<div class="col-md-12">
					<div class="box box-info">
						<div class="box-header with-border">
							<h3 class="box-title">کارتابل نامه های ارسالی</h3>
							<div class="box-tools pull-right">
								<button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
								<button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
							</div>
						</div>
						<div class="box-body">
							<div class="table-responsive">
								<table class="table no-margin">
									<thead>
										<tr>
											<th>ردیف</th>
											<th>گیرنده</th>
											<th>تاریخ ارسال</th>
											<th>شرح نامه</th>
											<th>توضیحات</th>
											<th>تایید مدیر</th>
											<th>تاریخ تایید</th>
											<th>نویسنده</th>
											<th>عملیات</th>
										</tr>
									</thead>
									<tbody>
									<?php
									$cartable->sender_indicator();
									?>
									</tbody>
								</table>
							</div>
						</div>
						<div class="box-footer clearfix"></div>
					</div>
				</div>
				<?php
			} ?>
			<div class="col-md-12">
				<div class="box box-info">
					<div class="box-header with-border">
						<h3 class="box-title">کارتابل نامه های ارجاع شده</h3>
						<div class="box-tools pull-right">
							<button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
							<button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
						</div>
					</div>
					<div class="box-body">
						<div class="table-responsive">
							<table class="table no-margin">
								<thead>
									<tr>
										<th>ردیف</th>
										<th>شماره نامه</th>
										<th>تاریخ نامه</th>
										<th>فرستنده</th>
										<th>شرح نامه</th>
										<th>تاریخ دریافت</th>
										<th>تاریخ ارجاع</th>
										<th>عملیات</th>
                              		</tr>
								</thead>
								<tbody>
                              	<?php
                  				$cartable->received_indicator();
                              	?>
								</tbody>
							</table>
						</div>
					</div>
					<div class="box-footer clearfix"></div>
				</div>
			</div>
        </div>	
    </section>
</div>
<?php include 'left-nav.php'; include 'footer.php'; ?>