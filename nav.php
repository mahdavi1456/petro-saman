<?php $filename = basename($_SERVER['PHP_SELF']); 
	$u_id = $_SESSION['user_id'];
	$media = new media();
	$user = new user();
	$u_level = $user->get_current_user_level();
?>
<div class="wrapper">
	<?php include"top-nav.php"; ?>
	<aside class="main-sidebar">
		<section class="sidebar">
		  	<div class="user-panel">
				<div class="pull-right image">
					<img src="<?php echo $media->get_user_avatar($u_id); ?>" class="img-circle">
				</div>
				<div class="pull-left info">
			  		<p><?php echo $_SESSION['name'] . " " . $_SESSION['family']; ?></p>
			  		<a href="#"><i class="fa fa-circle text-success"></i> آنلاین</a>
				</div>
		  	</div>
		  	<form action="#" method="get" class="sidebar-form">
				<div class="input-group">
			  		<input type="text" name="q" class="form-control" placeholder="جستجو...">
			  		<span class="input-group-btn">
						<button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i></button>
			  		</span>
				</div>
		  	</form>

			<ul class="sidebar-menu">
				<li class="<?php check_active('index.php'); ?> treeview">
					<li class="<?php check_active('index.php'); ?>">
						<a href="<?php get_url(); ?>index.php"><i class="fa fa-bank"></i> پیشخوان</a>
					</li>
				</li>
				<?php 
				if($u_level == "مدیریت" || $u_level == "بازرگانی"){ ?>
					<li class="<?php check_active('list-customer.php'); check_active('new-customer.php'); check_active('show-customer.php'); check_active('list-product.php'); check_active('list-category.php'); check_active('list-material.php'); check_active('new-storage.php'); check_active('tools_cat.php'); check_active('new-tools.php');?> treeview">
						<a href="#"><i class="fa fa-database"></i><span>تعاریف اولیه</span></a>
						<ul class="treeview-menu">
							<li class="<?php check_active('list-customer.php'); ?>"><a href="<?php get_url(); ?>customer/list-customer.php"><i class="fa fa-circle-o"></i> مدیریت حساب ها</a></li>
							<li class="<?php check_active('list-product.php'); ?>"><a href="<?php get_url(); ?>product/list-product.php"><i class="fa fa-circle-o"></i> مدیریت مواد</a></li>
							<li class="<?php check_active('list-category.php'); ?>"><a href="<?php get_url(); ?>category/list-category.php"><i class="fa fa-circle-o"></i> مدیریت دانه بندی ها</a></li>
							<li class="<?php check_active('new-storage.php'); ?>"><a href="<?php get_url(); ?>storage/new-storage.php"><i class="fa fa-circle-o"></i> مدیریت انبارها</a></li>
						</ul>
					</li>
					<?php
				}
				if($u_level == "مدیریت" || $u_level == "بازرگانی"  || $u_level == "امور مالی"){ ?>
					<li class="<?php check_active('confirm-factor.php'); check_active('reg-factor.php'); check_active('list-factor.php'); check_active('log-factor.php'); ?> treeview">
						<a href="#"><i class="fa fa-euro"></i><span>فاکتور فروش</span></a>
						<ul class="treeview-menu">
							<li class="<?php check_active('reg-factor.php'); ?>"><a href="<?php get_url(); ?>factor/reg-factor.php"><i class="fa fa-circle-o"></i>ثبت فاکتور</a></li>
							<li class="<?php check_active('list-factor.php'); ?>"><a href="<?php get_url(); ?>factor/list-factor.php"><i class="fa fa-circle-o"></i>لیست فاکتورها</a></li>
						</ul>
					</li>
					<?php
				}
				if($u_level == "مدیریت" || $u_level == "بازرگانی"  || $u_level == "امور مالی"){ ?>
					<li class="<?php check_active('log-factor-buy.php'); check_active('reg-buy.php'); check_active('list-buy.php'); ?> treeview">
						<a href="#"><i class="fa fa-shopping-cart"></i><span>درخواست خرید</span></a>
						<ul class="treeview-menu">
							<li class="<?php check_active('reg-buy.php'); ?>"><a href="<?php get_url(); ?>buy/reg-buy.php"><i class="fa fa-circle-o"></i>ثبت درخواست</a></li>
							<li class="<?php check_active('list-buy.php'); ?>"><a href="<?php get_url(); ?>buy/list-buy.php"><i class="fa fa-circle-o"></i>لیست پیشنهادات خرید</a></li>
						</ul>
					</li>
				<?php
				}
				if($u_level == "مدیریت" || $u_level == "بازرگانی"){ ?>
					<li class="<?php check_active('list-buy-request.php'); check_active('print-transfer-form.php'); check_active('input-store.php'); check_active('bar-list.php'); check_active('list-checkout.php'); check_active('waiting-mine.php'); check_active('waiting-outsourcer.php'); ?> treeview">
						<a href="#"><i class="fa fa-random"></i><span>ورود کالا</span></a>
						<ul class="treeview-menu">
							<li class="<?php check_active('input-store.php'); ?>"><a href="<?php get_url(); ?>storage/input-store.php"><i class="fa fa-circle-o"></i>ورودی انبار</a></li>
							<li class="<?php check_active('waiting-mine.php'); ?>"><a href="<?php get_url(); ?>storage/waiting-mine.php"><i class="fa fa-circle-o"></i>بارهای خرید مستقیم</a></li>
							<li class="<?php check_active('waiting-outsourcer.php'); ?>"><a href="<?php get_url(); ?>storage/waiting-outsourcer.php"><i class="fa fa-circle-o"></i>بارهای برون سپاری</a></li>
						</ul>
					</li>
					<?php
				} 
				if($u_level == "مدیریت" || $u_level == "بازرگانی"){ ?>
					<li class="<?php check_active('list-storage.php'); check_active('landing.php'); check_active('bar-list.php'); check_active('list-checkout.php'); ?> treeview">
						<a href="#"><i class="fa fa-random"></i><span>خروج کالا</span></a>
						<ul class="treeview-menu">
							<li class="<?php check_active('list-storage.php'); ?>"><a href="<?php get_url(); ?>storage/list-storage.php"><i class="fa fa-circle-o"></i>صدور حواله خروج</a></li>
							<li class="<?php check_active('landing.php'); ?>"><a href="<?php get_url(); ?>storage/landing.php"><i class="fa fa-circle-o"></i>خروجی انبار</a></li>
						</ul>
					</li>
					<?php
				} 
				if($u_level == "مدیریت" || $u_level == "آزمایشگاه"){ ?>
					<li class="<?php check_active('list-analyze.php'); check_active('form-analyze.php'); check_active('report-analyze.php'); ?> treeview">
						<a href="#"><i class="fa fa-check-square"></i><span>آزمایشگاه</span></a>
						<ul class="treeview-menu">
							<li class="<?php check_active('list-analyze.php'); ?>"><a href="<?php get_url(); ?>lab/list-analyze.php"><i class="fa fa-circle-o"></i>لیست آزمون ها</a></li>
						</ul>
					</li>
					<?php
				} 
				if($u_level == "مدیریت" || $u_level == "بازرگانی"){ ?>
					<li class="<?php check_active('list-perfomance.php'); check_active('storages-stock.php'); check_active('miners-stock.php'); ?> treeview">
						<a href="#"><i class="fa fa-tasks"></i><span>موجودی انبارها</span></a>
						<ul class="treeview-menu">
							<li class="<?php check_active('list-perfomance.php'); ?>"><a href="<?php get_url(); ?>stock/list-perfomance.php"><i class="fa fa-circle-o"></i>عملکرد برون سپاری</a></li>
							<li class="<?php check_active('storages-stock.php'); ?>"><a href="<?php get_url(); ?>stock/storages-stock.php"><i class="fa fa-circle-o"></i>انبارهای شرکت</a></li>
							<li class="<?php check_active('miners-stock.php'); ?>"><a href="<?php get_url(); ?>stock/miners-stock.php"><i class="fa fa-circle-o"></i>انبار معادن</a></li>
						</ul>
					</li>
					<?php
				}
				include_once ('includes.php');
				$myDate = jdate('Y/n/j');
				$myDataArray = explode('/', $myDate);
				$myYear = $myDataArray[0];
				$myMonth = $myDataArray[1];
				$group_array = get_select_query("SELECT * FROM group_info");
				if($group_array){
					$group_name = $group_array[0]['g_name'];
				}else{
					$group_name = 'A';
				}
				if($u_level == "مدیریت" || $u_level == "انباردار"){ ?>
					<li class="<?php check_active('tools_cat.php'); check_active('new-tools.php'); check_active('usage.php'); check_active('log-usage.php'); check_active('returned-usage.php');  check_active('repair-usage.php'); ?> treeview">
						<a href="#"><i class="fa fa-wrench"></i><span>ابزارآلات</span></a>
						<ul class="treeview-menu">
							<li class="<?php check_active('tools_cat.php'); ?>"><a href="<?php get_url(); ?>tools/tools_cat.php"><i class="fa fa-circle-o"></i> دسته بندی قطعات</a></li>
							<li class="<?php check_active('new-tools.php'); ?>"><a href="<?php get_url(); ?>tools/new-tools.php"><i class="fa fa-circle-o"></i> مدیریت قطعات</a></li>
							<li class="<?php check_active('usage.php?us_type=مصرفی'); ?>"><a href="<?php get_url(); ?>tools/usage.php?us_type=مصرفی"><i class="fa fa-circle-o"></i>ثبت مصرف</a></li>
							<li class="<?php check_active('usage.php?us_type=امانتی'); ?>"><a href="<?php get_url(); ?>tools/usage.php?us_type=امانتی"><i class="fa fa-circle-o"></i>ثبت امانت</a></li>
							<li class="<?php check_active('log-usage.php'); ?>"><a href="<?php get_url(); ?>tools/log-usage.php"><i class="fa fa-circle-o"></i>گزارش قطعات</a></li>
							<li class="<?php check_active('returned-usage.php'); ?>"><a href="<?php get_url(); ?>tools/returned-usage.php"><i class="fa fa-circle-o"></i>گزارش قطعات بازگشتی</a></li>
							<li class="<?php check_active('repair-usage.php'); ?>"><a href="<?php get_url(); ?>tools/repair-usage.php"><i class="fa fa-circle-o"></i>تعمیر قطعات</a></li>
						</ul>
					</li>
					<?php
				} 
				if($u_level == "مدیریت" || $u_level == "منابع انسانی"){?>
					<li class="<?php check_active('list-user.php'); check_active('set_schedule.php'); check_active('get_schedule.php'); check_active('add_group.php'); check_active('edit_group.php'); check_active('raw_rights.php');  check_active('new_shift.php'); ?> treeview">
						<a href="#"><i class="fa fa-users"></i><span>کاربران</span></a>
						<ul class="treeview-menu">
							<li class="<?php check_active('list-user.php'); ?>"><a href="<?php get_url(); ?>user/list-user.php"><i class="fa fa-circle-o"></i>لیست کاربران</a></li>
							<li class="<?php check_active('add_group.php'); ?>"><a href="<?php get_url(); ?>group/add_group.php"><i class="fa fa-circle-o"></i>تعریف گروه</a></li>
							<li class="<?php check_active('new_shift.php'); ?>"><a href="<?php get_url(); ?>group/new_shift.php"><i class="fa fa-circle-o"></i>تعریف شیفت</a></li>
							<li class="<?php check_active('set_schedule.php'); ?>"><a href="<?php get_url(); ?>group/set_schedule.php?group=<?php echo $group_name; ?>&month=<?php echo $myYear . "_" . $myMonth; ?>&sch_submit=1"><i class="fa fa-circle-o"></i>برنامه ریزی شیفت ها</a></li>
							<li class="<?php check_active('get_schedule.php'); ?>"><a href="<?php get_url(); ?>group/get_schedule.php?group=A&sch_submit=1"><i class="fa fa-circle-o"></i>مشاهده گروه ها</a></li>
							<li class="<?php check_active('raw_rights.php'); ?>"><a href="<?php get_url(); ?>user/raw_rights.php?month=<?php echo $myYear . "_" . $myMonth; ?>"><i class="fa fa-circle-o"></i>محاسبه حقوق</a></li>
						</ul>
					</li>
					<?php
				} 
				if($u_level == "مدیریت" || $u_level == "تولید"){?>
					<li class="<?php check_active('list_produce.php'); ?> treeview">
						<a href="#"><i class="fa fa-refresh"></i><span>تولید</span></a>
						<ul class="treeview-menu">
							<li class="<?php check_active('list_produce.php?prc_type=کلسیناسیون'); ?>"><a href="<?php get_url(); ?>produce/list_produce.php?prc_type=کلسیناسیون"><i class="fa fa-circle-o"></i>کلسیناسیون</a></li>
							<li class="<?php check_active('list_produce.php?prc_type=گرانول سازی'); ?>"><a href="<?php get_url(); ?>produce/list_produce.php?prc_type=گرانول سازی"><i class="fa fa-circle-o"></i>گرانول سازی</a></li>
							<li class="<?php check_active('list_produce.php?prc_type=خردایش'); ?>"><a href="<?php get_url(); ?>produce/list_produce.php?prc_type=خردایش"><i class="fa fa-circle-o"></i>خردایش</a></li>
							<li class="<?php check_active('list_produce.php?prc_type=خردایش'); ?>"><a href="<?php get_url(); ?>produce/list_produce.php?prc_type=سرند"><i class="fa fa-circle-o"></i>سرند</a></li>
						</ul>
					</li>
					<?php
				} 
				if($u_level == "مدیریت" || $u_level == "ارزیابی"){?>
					<li class="<?php check_active('list_hse_item.php'); check_active('hse_rates.php'); ?> treeview">
						<a href="#"><i class="fa fa-bolt"></i><span>HSE</span></a>
						<ul class="treeview-menu">
							<li class="<?php check_active('list_hse_item.php'); ?>"><a href="<?php get_url(); ?>hse/list_hse_item.php"><i class="fa fa-circle-o"></i>لیست آیتم ایمنی</a></li>
							<li class="<?php check_active('hse_rates.php'); ?>"><a href="<?php get_url(); ?>hse/hse_rates.php"><i class="fa fa-circle-o"></i>امتیاز دهی</a></li>
						</ul>
					</li>.
					<?php
				} 
				if($u_level == "مدیریت" || $u_level == "ارزیابی"){?>
					<li class="<?php check_active('indexes.php');  check_active('performance-indexes.php'); check_active('performance-indexes-report.php'); ?> treeview">
						<a href="#"><i class="fa fa-wrench"></i><span>ارزیابی و عملکرد</span></a>
						<ul class="treeview-menu">
							<li class="<?php check_active('indexes.php'); ?>"><a href="<?php get_url(); ?>performance/indexes.php"><i class="fa fa-circle-o"></i>تعریف شاخص</a></li>
							<li class="<?php check_active('performance-indexes.php'); ?>"><a href="<?php get_url(); ?>performance/performance-indexes.php"><i class="fa fa-circle-o"></i>فرم ارزیابی</a></li>
							<li class="<?php check_active('performance-indexes-report.php'); ?>"><a href="<?php get_url(); ?>performance/performance-indexes-report.php"><i class="fa fa-circle-o"></i>گزارش ارزیابی</a></li>
						</ul>
					</li>
					<?php 
				}
				if($u_level == "مدیریت" || $u_level == "دبیرخانه"){ ?>
					<li class="<?php check_active('indicator.php'); check_active('list_customs.php'); ?> treeview">
						<a href="#"><i class="fa fa-folder-open"></i><span>دبیرخانه</span></a>
						<ul class="treeview-menu">
							<li class="<?php check_active('list_customs.php'); ?>"><a href="<?php get_url(); ?>secretariat/list_customs.php"><i class="fa fa-circle-o"></i>مرسولات</a></li>
							<li class="<?php check_active('indicator.php'); ?>"><a href="<?php get_url(); ?>secretariat/indicator.php"><i class="fa fa-circle-o"></i>مکاتبات</a></li>
						</ul>
					</li>
					<?php 
				} 
				if($u_level == "مدیریت" || $u_level == "منابع انسانی" || $u_level == "دبیرخانه"){?>
					<li class="<?php check_active('doc_type.php'); check_active('list_meeting.php'); check_active('list_rule.php'); ?> treeview">
						<a href="#"><i class="fa fa-folder-open"></i><span>بایگانی</span></a>
						<ul class="treeview-menu">
							<li class="<?php check_active('doc_type.php'); ?>"><a href="<?php get_url(); ?>archive/doc_type.php"><i class="fa fa-circle-o"></i>نوع سند</a></li>
							<li class="<?php check_active('list_meeting.php'); ?>"><a href="<?php get_url(); ?>archive/list_meeting.php"><i class="fa fa-circle-o"></i>صورت جلسه</a></li>
							<li class="<?php check_active('list_rule.php'); ?>"><a href="<?php get_url(); ?>archive/list_rule.php"><i class="fa fa-circle-o"></i>اساس نامه</a></li>
						</ul>
					</li>
					<?php 
				} 
				if($u_level == "مدیریت" || $u_level == "بازرگانی"){?>
					<li class="<?php check_active('list-driver.php'); ?> treeview">
						<a href="#"><i class="fa fa-truck"></i><span>راننده ها</span></a>
						<ul class="treeview-menu">
							<li class="<?php check_active('list-driver.php'); ?>"><a href="<?php get_url(); ?>driver/list-driver.php"><i class="fa fa-circle-o"></i>لیست راننده ها</a></li>
						</ul>.
					</li>
					<?php 
				} ?>
				<li class="<?php check_active('list-user.php'); check_active('rest.php'); check_active('apply-loan.php'); check_active('payroll.php'); ?> treeview">
					<a href="#"><i class="fa fa-gear"></i><span>پرسنل</span></a>
					<ul class="treeview-menu">
						<li class="<?php check_active('list-user.php'); ?>"><a href="<?php get_url(); ?>user/list-user.php?type=profile"><i class="fa fa-circle-o"></i>پروفایل</a></li>
						<li class="<?php check_active('rest.php'); ?>"><a href="<?php get_url(); ?>user/rest.php"><i class="fa fa-circle-o"></i>مدیریت مرخصی</a></li>
						<li class="<?php check_active('apply-loan.php'); ?>"><a href="<?php get_url(); ?>user/apply-loan.php"><i class="fa fa-circle-o"></i>درخواست مساعده</a></li>
						<li class="<?php check_active('payroll.php'); ?>"><a href="<?php get_url(); ?>user/payroll.php?month=<?php echo $myYear . "_" . $myMonth; ?>"><i class="fa fa-circle-o"></i>فیش حقوق</a></li>

					</ul>.
				</li>
				<?php
				if($u_level == "مدیریت"){?>
					<li class="<?php check_active('edit_options.php'); check_active('factor_description.php'); check_active('points-ceiling.php'); check_active('header-loading.php'); ?> treeview">
						<a href="#"><i class="fa fa-gear"></i><span>تنظیمات</span></a>
						<ul class="treeview-menu">
							<li class="<?php check_active('edit_options.php'); ?>"><a href="<?php get_url(); ?>options/edit_options.php"><i class="fa fa-circle-o"></i>ویرایش اطلاعات</a></li>
							<li class="<?php check_active('factor_description.php'); ?>"><a href="<?php get_url(); ?>options/factor_description.php"><i class="fa fa-circle-o"></i>توضیحات پیش فاکتور</a></li>
							<li class="<?php check_active('points-ceiling.php'); ?>"><a href="<?php get_url(); ?>options/points-ceiling.php"><i class="fa fa-circle-o"></i>تعریف سقف امتیازات</a></li>
							<li class="<?php check_active('header-loading.php'); ?>"><a href="<?php get_url(); ?>options/header-loading.php"><i class="fa fa-circle-o"></i>بارگزاری سربرگ</a></li>
						</ul>.
					</li>
					<?php
				}

				if($u_level == "مدیریت"){?>
					<li class="<?php check_active('login-log.php'); ?> treeview">
						<a href="#"><i class="fa fa-gear"></i><span>گزارشات سیستم</span></a>
						<ul class="treeview-menu">
							<li class="<?php check_active('login-log.php'); ?>"><a href="<?php get_url(); ?>system/login-log.php"><i class="fa fa-circle-o"></i>سوابق ورود</a></li>
						</ul>
					</li>
					<?php
				} ?>

		  	</ul>
		</section>
	</aside>
