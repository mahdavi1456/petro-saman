<?php
function get_text_url($text2){
	$text = explode("?",$text2)[0];
	switch ($text) {
    case "material":
        return "مواد اولیه";
	case "list_material":
		return "مدیریت مواد اولیه";
	case "list-product":
		return "مدیریت محصولات";
    case "product":
        return "محصولات";
    case "category":
        return "دانه بندی";
	case "list-category":
        return "مدیریت دانه بندی ها";
	case "customer":
        return "مشتریان";	
	case "list-customer":
        return "مدیریت مشتریان";
	case "new-customer":
		return "افزودن مشتری";
	case "show-customer":
		return "نمایش مشخصات مشتری";
	case "report_user_group":
        return "گزارشات گروه";
	case "hse":
        return "HSE";
	case "list_hse_item":
	return "لیست آیتم ایمنی";
	case "hse_rates":
        return "امتیاز دهی";
	case "stock":
		return "موجودی";
	case "list-perfomance":
		return "عملکرد برون سپاری";
	case "storages-stock":
		return "انبارهای شرکت";
	case "miners-stock":
		return "انبار معادن";
	case "list-stock":
        return "موجودی محصولات";
	case "secretariat":
		return "دبیرخانه";
	case "doc_type":
        return "نوع سند";
	case "list_customs":
        return "ثبت مرسوله";
	case "list_meeting":
        return "صورت جلسه";
	case "list_rule":
		return "اساس نامه";
	case "write_letter":
			return "محتوای نامه ارسالی";
	case "amount-material":
        return "موجودی مواد اولیه";
	case "factor":
        return "فاکتور فروش";
	case "list-factor":
        return "لیست فاکتور فروش";
	case "log-factor":
        return "گزارشات فاکتور فروش";
	case "buy":
        return "فاکتور خرید";
	case "list-buy":
        return "لیست فاکتور خرید";
	case "log-factor-buy":
        return "گزارشات فاکتور خرید";
	case "storage":
		return "انبار";
	case "new-storage":
		return "مدیریت انبارها";
	case "input-store";
		return "ورودی انبار";
	case "waiting-mine";
		return "بارهای خرید مستقیم";
	case "waiting-outsourcer";
		return "بارهای برون سپاری";
	case "list-storage":
		return "حواله خروج";
	case "print-transfer-form":
		return "چاپ فرم حواله خروج";
	case "landing":
		return "خروجی انبار";
	case "bar-list";
		return "لیست بار های خارج شده";
	case "list-checkout";
		return "لیست تایید بار";
	case "list-buy-request":
        return "پیشنهاد خرید";
	case "driver":
        return "راننده ها";
	case "list-driver":
        return "مدیریت راننده ها";
	case "edit-customer";
		return "ویرایش مشتری";
	case "user";
		return "کاربران";
	case "payroll";
		return " فیش حقوق";
	case "list-user";
		return "مدیریت کاربران";
	case "rest";
		return "مدیریت مرخصی";
	case "apply-loan";
		return "درخواست مساعده";
	case "raw_rights";
		return "محاسبه حقوق";
	case "group";
		return "گروه";
	case "add_group";
		return "مدیریت گروه";
	case "set_schedule":
		return "برنامه ریزی شیفت ها";
	case "get_schedule":
		return "مشاهده گروه ها";
	case "new_shift";
		return "مدیریت شیفت ";
	case "lab";
		return "آزمایشگاه";
	case "list-analyze";
		return "لیست آزمون ها";
	case "form-analyze";
		return "فرم آزمایشگاه";
	case "report-analyze";
        return "گزارش آزمون";
    case "new-analyze";
		return "آزمون جدید";
	case "produce";
		return "تولید";
	case "list-produce";
		return "لیست تولیدات";
	case "edit_settings";
		return "ویرایش اطلاعات";
	case "tools";
		return "قطعات";
	case "tools_cat";
		return "دسته بندی قطعات";
	case "new-tools";
		return "مدیریت قطعات";
	case "new-tools";
		return "مدیریت قطعات";
	case "log-usage";
		return "گزارش قطعات";
	case "returned-usage";
		return "گزارش قطعات بازگشتی";
	case "repair-usage";
		return "تعمیر قطعات";
	case "performance";
		return "ارزیابی و عملکرد";
	case "indexes";
		return "شاخص ارزیابی";
	case "performance-indexes";
		return "فرم ارزیابی";
	case "performance-indexes-report";
		return "گزارش ارزیابی";
	case "options";
		return "تنظیمات";
	case "edit_options";
		return "ویرایش اطلاعات";
	case "factor_description";
		return "توضیحات پیش فاکتور";
	case "points-ceiling";
		return "تعریف سقف امتیازات";
	case "header-loading";
		return "بارگزاری سربرگ";
	case "system";
		return "سیستم";
	case "Petrosaman";
		return "پتروسامان";
    default:
        return "include-theme-breadcrumb.php";
	}
}
function breadcrumb($name ="" , $link =""){ ?>
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<ol class="breadcrumbb">
			<li><a href="/">خانه</a></li>
			<?php
				$crumbs = explode("/",$_SERVER["REQUEST_URI"]);
				$count = count($crumbs);
				$linkPath = get_the_url();
				for($i=2;$i<$count;$i++){
					$word = str_replace(".php","",$crumbs[$i]);
					$text = get_text_url($word);
					if($text == "include-theme-breadcrumb.php"){ $text = $name; }
					if($i != 3){
					echo '<li><a href="#" >' . $text . '</a></li>';
					}
					else{
						echo '<li><a href=' . $linkPath . $word . '.php >' . $text . '</a></li>';
					}
					$linkPath = $linkPath . $word . '/';
					
				}
			?>
			<a class="reload-btn" href="<?php echo $_SERVER["REQUEST_URI"]; ?>">بروز رسانی</a>
			<a class="back-btn" href="<?php  echo get_url() . $link; ?>">بازگشت</a>
		</ol>
	</div>
<?php
}