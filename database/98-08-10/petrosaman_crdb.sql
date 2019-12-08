-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 31, 2019 at 10:11 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `petrosaman_crdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `analyze_form`
--

CREATE TABLE `analyze_form` (
  `analyze_id` int(11) NOT NULL,
  `cycle` varchar(10) DEFAULT NULL COMMENT 'سیکل',
  `cycle_id` int(11) NOT NULL DEFAULT 0 COMMENT 'کد مربوط به سیکل',
  `description` text DEFAULT NULL COMMENT 'توضیحات',
  `sample_in_date` varchar(16) DEFAULT NULL COMMENT 'تاریخ دریافت نمونه',
  `analyze_date` varchar(16) DEFAULT NULL COMMENT 'تاریخ انجام آزمون',
  `analyzer` varchar(50) DEFAULT NULL COMMENT 'نمونه گیری توسط',
  `temprature` varchar(50) DEFAULT NULL COMMENT 'دمای محیط',
  `humidity` varchar(50) DEFAULT NULL COMMENT 'رطوبت محیط',
  `an_empty_weight` int(11) NOT NULL DEFAULT 0,
  `am_empty_weight` int(11) NOT NULL DEFAULT 0,
  `an_full_weight` int(11) NOT NULL DEFAULT 0,
  `hb_empty_weight` int(11) NOT NULL DEFAULT 0,
  `hm_empty_weight` int(11) NOT NULL DEFAULT 0,
  `hb_full_weight` int(11) NOT NULL DEFAULT 0,
  `ec_empty_weight` int(11) NOT NULL DEFAULT 0,
  `em_empty_weight` int(11) NOT NULL DEFAULT 0,
  `ec_full_weight` int(11) NOT NULL DEFAULT 0,
  `sulfur_percent` int(11) NOT NULL DEFAULT 0,
  `gm_weight` int(11) NOT NULL DEFAULT 0,
  `gm_less_weight` int(11) NOT NULL DEFAULT 0,
  `gm_dot_weight` int(11) NOT NULL DEFAULT 0,
  `gm_more_weight` int(11) NOT NULL DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `analyze_form`
--

INSERT INTO `analyze_form` (`analyze_id`, `cycle`, `cycle_id`, `description`, `sample_in_date`, `analyze_date`, `analyzer`, `temprature`, `humidity`, `an_empty_weight`, `am_empty_weight`, `an_full_weight`, `hb_empty_weight`, `hm_empty_weight`, `hb_full_weight`, `ec_empty_weight`, `em_empty_weight`, `ec_full_weight`, `sulfur_percent`, `gm_weight`, `gm_less_weight`, `gm_dot_weight`, `gm_more_weight`) VALUES
(1, 'produce', 1, NULL, '', '', '', '', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(2, 'produce', 2, NULL, '', '', '', '', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(3, 'produce', 4, NULL, '', '', '', '', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(4, 'produce', 3, NULL, '', '', '', '', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(5, 'produce', 5, NULL, '', '', '', '', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(6, 'produce', 6, NULL, '', '', '', '', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(7, 'produce', 7, NULL, '', '', '', '', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(8, 'produce', 8, NULL, '', '', '', '', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(9, 'produce', 9, NULL, '', '', '', '', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(10, 'produce', 10, NULL, '', '', '', '', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `bar_bring`
--

CREATE TABLE `bar_bring` (
  `bar_id` int(11) NOT NULL COMMENT 'کد بار',
  `st_id_from` int(11) DEFAULT 0 COMMENT 'از',
  `st_id_to` int(11) DEFAULT 0 COMMENT 'به',
  `fb_id` int(11) DEFAULT 0 COMMENT 'کد فاکتور',
  `fb_type` varchar(11) DEFAULT NULL COMMENT 'نوع بار',
  `dr_id` int(11) DEFAULT 0 COMMENT 'کد راننده',
  `bar_quantity` int(11) DEFAULT 0 COMMENT 'وزن بار',
  `bar_exited` int(11) DEFAULT 0 COMMENT 'بار خارج شده',
  `bar_date` date DEFAULT current_timestamp() COMMENT 'تاریخ بار',
  `bar_time` time DEFAULT current_timestamp() COMMENT 'ساعت بار',
  `bar_pic_doc` text DEFAULT NULL COMMENT 'تصویر بارنامه',
  `bar_pic_gh` text DEFAULT NULL COMMENT 'تصویر قبض باسکول',
  `description` text DEFAULT NULL COMMENT 'توضیحات',
  `cat_id` int(11) NOT NULL COMMENT 'دانه بندی',
  `p_id` int(11) NOT NULL COMMENT 'محصول',
  `barname_code` int(11) NOT NULL COMMENT 'کد بارنامه'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `bar_bring`
--

INSERT INTO `bar_bring` (`bar_id`, `st_id_from`, `st_id_to`, `fb_id`, `fb_type`, `dr_id`, `bar_quantity`, `bar_exited`, `bar_date`, `bar_time`, `bar_pic_doc`, `bar_pic_gh`, `description`, `cat_id`, `p_id`, `barname_code`) VALUES
(1, 9, 10, 3, 'buy', 4, 25000, 0, '1398-08-06', '13:03:30', 'WhatsApp Image 2019-09-03 at 11.14.41 PM.jpeg', '', '', 11, 3, 45564),
(2, 9, 10, 3, 'buy', 6, 30000, 0, '1398-08-06', '13:03:22', 'حق تمبر دارائی.jpg', '', '', 11, 3, 876543),
(3, 9, 10, 3, 'buy', 6, 100000, 0, '1398-08-06', '13:05:08', '', '', '', 11, 3, 12345),
(4, 9, 10, 3, 'buy', 4, 340000, 0, '1398-08-06', '13:05:26', '', '', '', 11, 3, 11111112),
(5, 10, 12, 3, 'buy', 6, 345000, 0, '1398-08-06', '13:06:02', '', '', '', 20, 6, 12345622),
(6, 10, 12, 3, 'buy', 4, 40000, 0, '1398-08-06', '13:07:05', '', '', '', 7, 6, 876543),
(7, 9, 12, 1, 'buy', 4, 50000, 0, '1398-08-06', '13:09:06', '', '', '', 11, 3, 12345622),
(8, 11, 12, 2, 'buy', 4, 100000, 0, '1398-08-06', '13:11:16', '', '', '', 20, 6, 876543),
(9, 12, 11, 1, 'sale', 6, 2500, 2680, '2019-10-28', '13:42:11', NULL, NULL, NULL, 16, 4, 0),
(10, 12, 11, 1, 'sale', 4, 6000, 5850, '2019-10-28', '13:44:50', NULL, NULL, NULL, 16, 4, 0),
(11, 12, 11, 2, 'sale', 6, 20000, 19430, '2019-10-28', '13:46:49', NULL, NULL, NULL, 16, 4, 0),
(12, 0, 11, 0, 'buy', 4, 0, 0, '1398-08-09', '18:58:09', 'logo.png', '', '', 6, 3, 0);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `cat_id` int(11) NOT NULL,
  `cat_name` varchar(35) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cat_id`, `cat_name`) VALUES
(6, '0-0.2'),
(7, '0-1'),
(8, '0-5'),
(9, '0-10'),
(10, '0-30'),
(11, '0-150'),
(12, '10-30'),
(13, '30-150'),
(14, '0-37'),
(15, '1-5'),
(16, '1-3'),
(17, '0.2-3'),
(18, '5-8'),
(19, '1-10'),
(20, '1-30');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `c_id` int(11) NOT NULL,
  `c_account` varchar(20) NOT NULL COMMENT 'نوع شخص',
  `c_type` varchar(20) NOT NULL COMMENT 'نوع',
  `c_name` varchar(15) DEFAULT NULL COMMENT 'نام',
  `c_family` varchar(25) DEFAULT NULL COMMENT 'نام خانوادگی',
  `c_company` varchar(35) DEFAULT NULL COMMENT 'نام شرکت',
  `c_national` varchar(10) DEFAULT NULL COMMENT 'کد ملی',
  `c_certificate` varchar(10) DEFAULT NULL COMMENT 'شماره شناسنامه',
  `c_national_id` varchar(15) DEFAULT NULL COMMENT 'شناسه ملی',
  `c_economic` varchar(12) DEFAULT NULL COMMENT 'شماره اقتصادی',
  `c_phone` varchar(11) DEFAULT NULL COMMENT 'شماره تماس',
  `c_fax` varchar(11) DEFAULT NULL COMMENT 'شماره فکس',
  `c_mobile` varchar(11) DEFAULT NULL COMMENT 'تلفن همراه',
  `c_oaddress` text DEFAULT NULL COMMENT 'آدرس دفتر قانونی شخص/شرکت',
  `c_faddress` text DEFAULT NULL COMMENT 'آدرس کارخانه',
  `c_state` varchar(100) DEFAULT NULL COMMENT 'استان',
  `c_county` varchar(100) DEFAULT NULL COMMENT 'شهرستان',
  `c_city` varchar(100) CHARACTER SET utf32 DEFAULT NULL COMMENT 'شهر',
  `c_email` text DEFAULT NULL COMMENT 'آدرس پست الکترونیک',
  `c_vat` varchar(5) DEFAULT NULL COMMENT 'ارزش افزوده',
  `c_expire_vat` varchar(10) DEFAULT NULL COMMENT 'تاریخ انقضا ارزش افزوده',
  `c_activity` varchar(20) DEFAULT NULL COMMENT 'نوع فعالیت',
  `c_registernumber` varchar(20) DEFAULT NULL COMMENT 'شماره ثبت',
  `c_postalcode` varchar(20) DEFAULT NULL COMMENT 'کد پستی',
  `c_managername` varchar(20) DEFAULT NULL COMMENT 'نام مدیرعامل',
  `c_managercode` varchar(20) DEFAULT NULL COMMENT 'کدملی مدیرعامل',
  `c_businessinterface` varchar(20) DEFAULT NULL COMMENT 'تلفن رابط بازرگانی',
  `c_financialinterface` varchar(20) DEFAULT NULL COMMENT 'تلفن رابط مالی',
  `c_discharge` text DEFAULT NULL COMMENT 'آدرس محل تخلیه بار',
  `c_dischargephone` varchar(20) DEFAULT NULL COMMENT 'تلفن مسئول تخلیه بار',
  `c_stamp` varchar(20) DEFAULT NULL COMMENT 'مهر',
  `c_signaturep` varchar(20) DEFAULT NULL COMMENT 'امضای صاحب حساب',
  `c_signaturep2` varchar(20) DEFAULT NULL COMMENT 'امضای صاحب حساب',
  `c_pic_national` varchar(100) DEFAULT NULL COMMENT 'تصویر کارت ملی',
  `c_pic_draft` varchar(100) DEFAULT NULL COMMENT 'تصویر کارت پایان خدمت',
  `c_pic_taxes` varchar(100) DEFAULT NULL COMMENT 'تصویر گواهی ثبتنام مودیان مالیاتی',
  `c_last_change` varchar(100) DEFAULT NULL COMMENT 'تصویر آخرین تغیرات روزنامه رسمی اعضای هیتت مدیره',
  `c_pic_manager` varchar(100) DEFAULT NULL COMMENT 'تصویر کارت ملی مدیرعامل یا هییت مدیره',
  `c_founded_ad` varchar(100) DEFAULT NULL COMMENT 'تصویر روزنامه رسمی آگهی تاسیس'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`c_id`, `c_account`, `c_type`, `c_name`, `c_family`, `c_company`, `c_national`, `c_certificate`, `c_national_id`, `c_economic`, `c_phone`, `c_fax`, `c_mobile`, `c_oaddress`, `c_faddress`, `c_state`, `c_county`, `c_city`, `c_email`, `c_vat`, `c_expire_vat`, `c_activity`, `c_registernumber`, `c_postalcode`, `c_managername`, `c_managercode`, `c_businessinterface`, `c_financialinterface`, `c_discharge`, `c_dischargephone`, `c_stamp`, `c_signaturep`, `c_signaturep2`, `c_pic_national`, `c_pic_draft`, `c_pic_taxes`, `c_last_change`, `c_pic_manager`, `c_founded_ad`) VALUES
(12, 'legal_person', 'همکار', '', '', 'فراوران زغالسنگ پابدانا', '', '0', '2314576890-', '1234567754', '6543123456', '343456789', '9876543247', '', '', 'کرمان', 'زرند', 'پابدانا', 'info@midhco.ir', 'yes', '1399/5/6', 'تولیدی', '124', '1234560987', 'مسلم', 'زمانی', '3498765434', '34876543456', '', '', '1572190790577.jpg', '', '', '', '', '1572190790492.jpg', '', '', ''),
(13, 'real_person', 'مشتری', 'بهنام', 'کدخدایی', 'پارس مواد', '3040298765', '0', '0', '12345678902', '31987654321', '1098754323', '9122345678', 'شتالبیسلاس  اسزسبلاش لش لش طالش', ' صب یفب فشیرئ بشطر ل', 'اصفهان', 'اصفهان', 'اصفهان', 'info@parsmavad.ir', 'no', '1400/1/1', 'بازرگانی', '0', '134253671', '0', '0', '133987654321', '109876543', ' ینبتصفی بفشبف ضغف یض', '127654328765', '1572190980325.jpg', '', '', '1572190980235.jpg', '', '', '', '', ''),
(14, 'real_person', 'تامین کننده', 'آقای ', 'کثیریان', 'زغالسنگ دامغان', '123465789', '0', '0', '198765423456', '2354678', '2345678', '324567890', 'بلیسلتنذ  لف یدفی ', ' ق بلیقتیبز ', 'سمنان', '', '', '', 'yes', '1398/8/7', 'تولیدی', '0', '', '0', '0', '23456789', '9765432345', '  قفل یز قفل قب ت', '5432345678', '', '', '', '', '', '', '', '', ''),
(15, 'real_person', 'مشتری', 'خانم', 'مسعودی', 'آلیاژ گستر اهورا', '9876857463', '0', '0', '987685432', '98796546324', '67857463567', '76574325', 'بلادلبیسزطشیب یسلرث  بسز ثر رری', 'ث ر ییر ثل ر بی بث', '', '', '', 'khgfcx@khjgfdc.i', 'no', '', 'تولیدی', '0', '87654357654', '0', '0', '8657463546789', '89786576434567', ' ثبثلرص صی ز بث بثب ر لرثیرثب ب ش زص یر ', '97687546354678', '', '', '', '', '', '', '', '', ''),
(10, 'legal_person', 'تامین کننده', '', '', 'زغالسنگ کرمان', '', '0', '140076543212345', '1200322948', '3432156670', '21345678990', '', 'خیابان شهید صدوقی', '', 'کرمان', 'کرمان', 'زرند', 'info@coal.kr.ir', 'yes', '1399/4/17', 'تولیدی', '780', '1617181910', 'سامان مرتاض', '', '3432151617', '', '', '', '1572190119959.png', '', '', '', '', '', '', '', ''),
(11, 'legal_person', 'مشتری', '', '', 'مجتمع فولاد خراسان', '', '0', '14003765434', '14293886452', '5129747667', '', '9123627684', '', '', 'خراسان', 'مشهد', 'نیشابور', 'hp@ihsdiokhgvd.com', 'yes', '1399/1/12', 'تولیدی', '987', '192837746', 'کدخدا', 'مداح', '51642654345', '51256543762', '', '', '1572190549661.png', '', '', '', '', '1572190584426.jpg', '', '', ''),
(16, 'legal_person', 'همکار', '', '', 'پترو سامان آذر تتیس', '', '0', '', '', '', '', '', '', '', '', '', '', '', 'yes', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(17, 'legal_person', 'مشتری', '', '', 'ذوب آهن نطنز', '', '0', '12345678908', '123456789876', '21990097543', '98765432345', '9876543212', 'س بلس فلس فبس ا ', ' غبس فسب سفبس فف', 'اصفهان', 'نطنز', 'نطنز', 'jhbcvj@ihkbn.com', 'yes', '1399/5/14', 'تولیدی', '23456', '34578756789', 'جواد توکلی', '76545678975645', '75234567890', '876543456789', ' فسب سغفبس فس بس', '76543456789', '1572251268561.jpg', '', '', '', '', '1572251268896.jpg', '1572251268924.jpg', '1572251268633.jpg', '1572251268460.jpg'),
(18, 'real_person', 'مشتری', 'آقای ', 'اسماعیلی', 'متالورژی مصصم', '9835465789', '2354657890', '0', '14293886452', '345767899', '654768900', '35467899767', '', '', '', '', '', '', 'yes', '1398/5/14', 'تولیدی', '0', '65432567890765', '0', '0', '98765434567', '7645465768798', '', '345678997654', '', '', '', '1572251391184.jpg', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `doc_type`
--

CREATE TABLE `doc_type` (
  `d_id` int(11) NOT NULL,
  `s_category` varchar(20) CHARACTER SET utf8 NOT NULL,
  `s_type` varchar(20) CHARACTER SET utf8 NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `doc_type`
--

INSERT INTO `doc_type` (`d_id`, `s_category`, `s_type`) VALUES
(1, 'letter', 'داخلی'),
(3, 'meeting', 'ddhgdf'),
(4, 'meeting', 'fsd'),
(5, 'rule', 'اساس'),
(6, 'letter', 'نامه'),
(7, 'rule', 'ااا');

-- --------------------------------------------------------

--
-- Table structure for table `driver`
--

CREATE TABLE `driver` (
  `dr_id` int(11) NOT NULL COMMENT 'کد راننده',
  `dr_name` varchar(50) DEFAULT NULL COMMENT 'نام',
  `dr_family` varchar(50) DEFAULT NULL COMMENT 'نام خانوادگی',
  `dr_national` int(10) DEFAULT NULL COMMENT 'کد ملی',
  `dr_car` varchar(50) DEFAULT NULL COMMENT 'نوع ماشین',
  `dr_plaque` varchar(50) DEFAULT NULL COMMENT 'پلاک',
  `dr_mobile` int(11) DEFAULT NULL COMMENT 'شماره همراه',
  `dr_status` int(11) DEFAULT NULL COMMENT 'وضعیت',
  `dr_melicart_img` varchar(50) DEFAULT NULL COMMENT 'کارت ملی',
  `dr_certificate_img` varchar(50) DEFAULT NULL COMMENT 'گواهینامه',
  `dr_car_cart_img` varchar(50) DEFAULT NULL COMMENT 'کارت ماشین'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `driver`
--

INSERT INTO `driver` (`dr_id`, `dr_name`, `dr_family`, `dr_national`, `dr_car`, `dr_plaque`, `dr_mobile`, `dr_status`, `dr_melicart_img`, `dr_certificate_img`, `dr_car_cart_img`) VALUES
(4, 'علی', 'علیزادع', 2147483647, 'بنز', 'الف 65 ایران 96523', 2147483647, 1, NULL, NULL, NULL),
(6, 'مرتضی', 'مهدوی', 2147483647, 'تریلی', '44 ع 716 65', 918765432, 1, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `factor`
--

CREATE TABLE `factor` (
  `f_id` int(11) NOT NULL COMMENT 'کد ردیف',
  `c_id` int(11) NOT NULL COMMENT 'کد مشتری',
  `st_id_to` int(11) NOT NULL COMMENT 'به',
  `f_type` varchar(30) NOT NULL COMMENT 'نوع فروش',
  `f_date` varchar(16) NOT NULL COMMENT 'تاریخ صدور',
  `u_id` int(11) NOT NULL COMMENT 'کد کاربر',
  `f_VAT_status` tinyint(1) NOT NULL DEFAULT 0 COMMENT 'وضعیت گواهی ارزش افزوده',
  `f_payment` varchar(50) NOT NULL COMMENT 'نحوه پرداخت'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `factor`
--

INSERT INTO `factor` (`f_id`, `c_id`, `st_id_to`, `f_type`, `f_date`, `u_id`, `f_VAT_status`, `f_payment`) VALUES
(1, 14, 11, 'محصول', '1398/8/6', 41, 1, 'نقدی'),
(2, 14, 11, 'محصول', '1398/8/6', 41, 1, 'نقدی'),
(3, 12, 10, 'محصول', '1398/8/9', 1, 1, 'نقدی');

-- --------------------------------------------------------

--
-- Table structure for table `factor_body`
--

CREATE TABLE `factor_body` (
  `fb_id` int(11) NOT NULL COMMENT 'کد ردیف فاکتور فروش',
  `f_id` int(11) NOT NULL COMMENT 'کد فاکتور فروش',
  `p_id` int(11) NOT NULL COMMENT 'کد محصول',
  `cat_id` int(11) NOT NULL COMMENT 'کد دسته بندی',
  `fb_quantity` float NOT NULL COMMENT 'مقدار',
  `fb_price` double NOT NULL COMMENT 'مبلغ',
  `total_price` double NOT NULL COMMENT 'قیمت کل',
  `fb_verify_admin1` tinyint(1) DEFAULT 0 COMMENT 'تایید مدیر',
  `fb_send_customer` tinyint(1) DEFAULT 0 COMMENT 'تاید فروش ۱',
  `fb_verify_customer` tinyint(1) DEFAULT 0 COMMENT 'تایید مشتری',
  `fb_verify_finan` tinyint(1) DEFAULT 0 COMMENT 'تایید مالی ۲',
  `fb_amount_sent` int(11) NOT NULL DEFAULT 0 COMMENT 'مقدار ارسال شده',
  `fb_status` tinyint(1) NOT NULL DEFAULT 0 COMMENT 'پایان یافته؟',
  `date_verify_finan` date DEFAULT NULL COMMENT 'تاریخ تایید مالی',
  `fd_id` int(11) DEFAULT 0 COMMENT 'توضیحات پیش فاکتور',
  `delivery_time` varchar(50) DEFAULT NULL COMMENT 'مدت زمان تحویل کالا'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `factor_body`
--

INSERT INTO `factor_body` (`fb_id`, `f_id`, `p_id`, `cat_id`, `fb_quantity`, `fb_price`, `total_price`, `fb_verify_admin1`, `fb_send_customer`, `fb_verify_customer`, `fb_verify_finan`, `fb_amount_sent`, `fb_status`, `date_verify_finan`, `fd_id`, `delivery_time`) VALUES
(1, 1, 4, 16, 8500, 55000, 550000000, 41, 0, 41, 41, 8500, 1, '1398-08-06', 2, '3 روز'),
(2, 2, 4, 16, 21500, 55000, 1100000000, 41, 0, 41, 41, 20000, 1, '1398-08-06', 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `factor_buy`
--

CREATE TABLE `factor_buy` (
  `f_id` int(11) NOT NULL COMMENT 'کد فاکتور',
  `c_id` int(11) NOT NULL COMMENT 'کد تامین کننده',
  `st_id` int(11) NOT NULL COMMENT 'کد انبار',
  `f_date` varchar(16) NOT NULL COMMENT 'تاریخ ثبت فاکتور',
  `u_id` int(11) NOT NULL COMMENT 'کد کاربر',
  `f_VAT_status` tinyint(1) NOT NULL DEFAULT 0 COMMENT 'وضعیت گواهی ارزش افزوده',
  `f_payment` varchar(50) DEFAULT NULL COMMENT 'نحوه پرداخت'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `factor_buy`
--

INSERT INTO `factor_buy` (`f_id`, `c_id`, `st_id`, `f_date`, `u_id`, `f_VAT_status`, `f_payment`) VALUES
(1, 10, 9, '1398/8/6', 32, 1, 'نقدی'),
(2, 14, 11, '1398/8/6', 41, 0, 'غیر نقدی'),
(3, 10, 9, '1398/8/6', 32, 1, 'نقدی'),
(4, 10, 9, '1398/8/6', 32, 1, 'نقدی'),
(5, 12, 0, '1398/8/8', 1, 1, 'نقدی'),
(6, 12, 10, '1398/8/8', 1, 1, 'نقدی'),
(7, 12, 0, '1398/8/8', 1, 1, 'نقدی'),
(8, 12, 10, '1398/8/9', 1, 1, 'نقدی');

-- --------------------------------------------------------

--
-- Table structure for table `factor_buy_body`
--

CREATE TABLE `factor_buy_body` (
  `fb_id` int(11) NOT NULL COMMENT 'کد ردیف فاکتور خرید',
  `f_id` int(11) NOT NULL COMMENT 'کد فاکتور خرید',
  `ma_id` int(11) NOT NULL COMMENT 'کد ماده اولیه',
  `cat_id` int(11) NOT NULL COMMENT 'کد دسته بندی',
  `fb_quantity` float NOT NULL COMMENT 'مقدار',
  `fb_price` double NOT NULL COMMENT 'مبلغ',
  `total_price` double NOT NULL COMMENT 'قیمت کل',
  `fb_verify_admin1` tinyint(1) NOT NULL DEFAULT 0 COMMENT 'تایید مدیر',
  `fb_verify_finan` tinyint(1) NOT NULL DEFAULT 0 COMMENT 'تایید اسناد',
  `fb_verify_sale` tinyint(4) NOT NULL COMMENT 'تایید فروش',
  `fb_outsourcing` varchar(10) DEFAULT NULL COMMENT 'برون سپاری؟',
  `fb_amount_get` int(11) NOT NULL DEFAULT 0 COMMENT 'مقدار دریافت شده',
  `fb_status` tinyint(1) NOT NULL DEFAULT 0 COMMENT 'پایان یافته؟',
  `delivery_time` varchar(50) DEFAULT NULL COMMENT 'مدت زمان تحویل کالا',
  `fd_id` int(11) DEFAULT 0 COMMENT 'توضیحات'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='ردیف های فاکتور خرید';

--
-- Dumping data for table `factor_buy_body`
--

INSERT INTO `factor_buy_body` (`fb_id`, `f_id`, `ma_id`, `cat_id`, `fb_quantity`, `fb_price`, `total_price`, `fb_verify_admin1`, `fb_verify_finan`, `fb_verify_sale`, `fb_outsourcing`, `fb_amount_get`, `fb_status`, `delivery_time`, `fd_id`) VALUES
(1, 1, 3, 11, 300000, 7430, 2229000000, 1, 1, 32, 'no', 0, 0, '2 ماهه', 2),
(2, 2, 6, 20, 200000, 25000, 5000000000, 41, 41, 41, 'no', 0, 0, '30 ر.زه', 3),
(3, 3, 3, 11, 500000, 7430, 3715000000, 41, 41, 32, 'yes', 0, 0, '3 ماه', 2),
(4, 4, 3, 11, 200000, 7430, 1486000000, 41, 41, 32, NULL, 0, 0, '30 روز', 2),
(5, 6, 12, 20, 580, 120000, 69600000, 1, 1, 1, 'yes', 0, 0, '10 روزه', 2);

-- --------------------------------------------------------

--
-- Table structure for table `factor_buy_log`
--

CREATE TABLE `factor_buy_log` (
  `l_id` int(11) NOT NULL,
  `u_id` int(11) NOT NULL,
  `l_date` varchar(16) NOT NULL,
  `fb_id` int(11) NOT NULL,
  `l_details` text DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `factor_buy_log`
--

INSERT INTO `factor_buy_log` (`l_id`, `u_id`, `l_date`, `fb_id`, `l_details`) VALUES
(28, 41, '1398/08/06 13:02', 3, ''),
(21, 41, '1398/08/06 12:44', 12, ''),
(22, 1, '1398/08/06 12:46', 10, ''),
(23, 1, '1398/08/06 12:47', 12, ''),
(24, 1, '1398/08/06 12:58', 1, ''),
(25, 1, '1398/08/06 12:58', 1, ''),
(26, 41, '1398/08/06 13:01', 2, ''),
(27, 41, '1398/08/06 13:01', 2, ''),
(20, 41, '1398/08/06 12:44', 10, ''),
(29, 41, '1398/08/06 13:02', 3, ''),
(30, 41, '1398/08/06 16:20', 4, ''),
(31, 41, '1398/08/06 16:21', 4, ''),
(32, 1, '1398/08/08 12:42', 5, ''),
(33, 1, '1398/08/08 12:42', 5, '');

-- --------------------------------------------------------

--
-- Table structure for table `factor_description`
--

CREATE TABLE `factor_description` (
  `fd_id` int(11) NOT NULL,
  `fd_text` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `factor_description`
--

INSERT INTO `factor_description` (`fd_id`, `fd_text`) VALUES
(2, '30 درصد پیش پرداخت الباقی چک 1 ماهه'),
(3, '20 درصد پیش پرداخت الباقی طی 2 فقره چک یک ماهه');

-- --------------------------------------------------------

--
-- Table structure for table `factor_log`
--

CREATE TABLE `factor_log` (
  `l_id` int(11) NOT NULL,
  `u_id` int(11) DEFAULT NULL,
  `l_date` varchar(16) DEFAULT NULL,
  `fb_id` int(11) DEFAULT NULL,
  `l_details` text DEFAULT NULL,
  `l_amount` int(11) NOT NULL DEFAULT 0 COMMENT 'مقدار ارسال شده',
  `fl_driver_id` int(11) NOT NULL DEFAULT 0 COMMENT 'کد راننده',
  `fl_exit_bar` tinyint(1) NOT NULL DEFAULT 0 COMMENT 'خارج شده',
  `fl_analyze_id` int(11) NOT NULL DEFAULT 0 COMMENT 'کد آزمون',
  `fl_admin_confirm` tinyint(1) NOT NULL DEFAULT 0 COMMENT 'تایید مدیر'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `factor_log`
--

INSERT INTO `factor_log` (`l_id`, `u_id`, `l_date`, `fb_id`, `l_details`, `l_amount`, `fl_driver_id`, `fl_exit_bar`, `fl_analyze_id`, `fl_admin_confirm`) VALUES
(1, 1, '1398/08/04 21:08', 1, '', 0, 0, 0, 0, 0),
(2, 1, '1398/08/04 21:08', 1, '', 0, 0, 0, 0, 0),
(3, 1, '1398/08/04 21:09', 1, NULL, 200, 0, 0, 0, 0),
(4, 1, '1398/08/04 21:10', 2, '', 0, 0, 0, 0, 0),
(5, 1, '1398/08/04 21:10', 2, '', 0, 0, 0, 0, 0),
(6, 1, '1398/08/04 21:10', 2, NULL, 180, 0, 0, 0, 0),
(10, 41, '1398/08/05 10:54', 4, '', 0, 0, 0, 0, 0),
(11, 41, '1398/08/05 10:54', 4, '', 0, 0, 0, 0, 0),
(12, 41, '1398/08/05 10:54', 4, NULL, 9000, 0, 0, 0, 0),
(13, 41, '1398/08/06 13:40', 1, '', 0, 0, 0, 0, 0),
(14, 41, '1398/08/06 13:41', 1, '', 0, 0, 0, 0, 0),
(15, 41, '1398/08/06 13:42', 1, NULL, 2500, 0, 0, 0, 0),
(16, 41, '1398/08/06 13:44', 1, NULL, 6000, 0, 0, 0, 0),
(17, 41, '1398/08/06 13:46', 2, '', 0, 0, 0, 0, 0),
(18, 41, '1398/08/06 13:46', 2, '', 0, 0, 0, 0, 0),
(19, 41, '1398/08/06 13:46', 2, NULL, 20000, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `group_info`
--

CREATE TABLE `group_info` (
  `g_id` int(11) NOT NULL COMMENT 'کد جدول',
  `g_name` varchar(20) DEFAULT NULL COMMENT 'نام گروه',
  `g_sup_1` varchar(50) DEFAULT NULL COMMENT 'سرپرست ۱',
  `g_sup_2` varchar(50) DEFAULT NULL COMMENT 'سرپرست‌ ۲',
  `g_sup_3` varchar(50) DEFAULT NULL COMMENT 'سرپرست ۳',
  `g_sup_4` varchar(50) DEFAULT NULL COMMENT 'سرپرست ۴',
  `g_sup_5` varchar(50) DEFAULT NULL COMMENT 'سرپرست ۵',
  `g_driver_1` varchar(50) DEFAULT NULL COMMENT 'راننده ۱',
  `g_driver_2` varchar(50) DEFAULT NULL COMMENT 'راننده ۲'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `group_info`
--

INSERT INTO `group_info` (`g_id`, `g_name`, `g_sup_1`, `g_sup_2`, `g_sup_3`, `g_sup_4`, `g_sup_5`, `g_driver_1`, `g_driver_2`) VALUES
(1, 'گروه یک', 'تست', 'تست', 'تست', 'تست', 'تست', 'تست', 'تست'),
(2, 'گروه دو', 'تست 2 ', 'تست 2', 'تست 2', 'تست 2', 'تست', ' تست ', 'تست');

-- --------------------------------------------------------

--
-- Table structure for table `group_log`
--

CREATE TABLE `group_log` (
  `gl_id` int(11) NOT NULL COMMENT 'کد گزارش جابجایی',
  `u_id` int(11) NOT NULL COMMENT 'کد کاربر',
  `g_id` int(11) DEFAULT NULL COMMENT 'گروه کاربر',
  `gl_date` varchar(20) DEFAULT NULL COMMENT 'تاریخ جابجایی'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `group_log`
--

INSERT INTO `group_log` (`gl_id`, `u_id`, `g_id`, `gl_date`) VALUES
(5, 33, 1, '1398/6/13'),
(4, 33, 2, '1398/6/14'),
(6, 1, 2, '1398/6/13');

-- --------------------------------------------------------

--
-- Table structure for table `hse_item`
--

CREATE TABLE `hse_item` (
  `h_id` int(11) NOT NULL COMMENT 'کد ایتم ایمنی',
  `h_name` varchar(20) DEFAULT NULL,
  `h_status` tinyint(1) NOT NULL DEFAULT 1 COMMENT 'وضعیت'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `hse_item`
--

INSERT INTO `hse_item` (`h_id`, `h_name`, `h_status`) VALUES
(18, 'کلاه ایمنی', 1),
(19, 'لوازم کار', 1);

-- --------------------------------------------------------

--
-- Table structure for table `hse_rates`
--

CREATE TABLE `hse_rates` (
  `hr_id` int(11) NOT NULL,
  `u_id` int(11) NOT NULL,
  `h_id` int(11) NOT NULL,
  `hr_date` varchar(20) NOT NULL,
  `hr_rate` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `hse_rates`
--

INSERT INTO `hse_rates` (`hr_id`, `u_id`, `h_id`, `hr_date`, `hr_rate`) VALUES
(8, 1, 19, '1398/6/27', 1),
(7, 1, 19, '1398/6/4', 1),
(6, 33, 19, '1398/6/27', 1),
(9, 43, 19, '1398/8/6', 1),
(10, 42, 19, '1398/8/6', 1),
(11, 41, 19, '1398/8/6', 1),
(12, 1, 19, '1398/8/6', 1),
(13, 43, 18, '1398/8/6', 1),
(14, 42, 18, '1398/8/6', 1),
(15, 41, 18, '1398/8/6', 1),
(16, 1, 18, '1398/8/6', 1),
(17, 43, 19, '1398/8/7', 1),
(18, 42, 18, '1398/8/7', 1),
(19, 41, 19, '1398/8/7', 1),
(20, 1, 19, '1398/8/7', 1),
(21, 43, 19, '1398/8/21', 1),
(22, 42, 18, '1398/8/21', 1),
(23, 41, 18, '1398/8/21', 1),
(24, 1, 18, '1398/8/21', 1);

-- --------------------------------------------------------

--
-- Table structure for table `material`
--

CREATE TABLE `material` (
  `ma_id` int(11) NOT NULL,
  `ma_name` varchar(50) DEFAULT NULL COMMENT 'نام مواد اولیه',
  `ma_unit` varchar(20) DEFAULT NULL COMMENT 'واحد مواد اولیه'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `media`
--

CREATE TABLE `media` (
  `m_id` int(11) NOT NULL,
  `m_name` varchar(50) NOT NULL,
  `m_type` varchar(50) DEFAULT NULL,
  `m_name_file` varchar(50) NOT NULL,
  `bu_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `media`
--

INSERT INTO `media` (`m_id`, `m_name`, `m_type`, `m_name_file`, `bu_id`) VALUES
(1, 'melicart1569525873.jpg', 'user', 'melicart', 1),
(2, 'identify_11565181804.png', 'user', 'identify_1', 1),
(3, 'identify_21565181804.png', 'user', 'identify_2', 1),
(5, '1566112239254.png', 'buy_pre_invoice_sale', 'check', 5),
(6, '1570346217159.png', 'buy_pre_invoice_sale', 'check', 23),
(7, '1570376555958.png', 'pre_invoice_sale', 'check', 14),
(8, '1570376926886.png', 'pre_invoice_sale', 'check', 15),
(9, '1570516128120.jpg', 'pre_invoice_sale', 'check', 3),
(10, '1570517703498.png', 'pre_invoice_sale', 'check', 6),
(11, '1570517743790.jpg', 'pre_invoice_sale', 'signed_customer', 4),
(12, '1570518057456.jpg', 'pre_invoice_sale', 'signed_customer', 6),
(13, '1570518113794.jpg', 'pre_invoice_sale', 'check', 6),
(14, 'u_signature1570888798.jpg', 'user', 'u_signature', 1),
(15, '1570884532647.jpg', 'buy_pre_invoice_sale', 'check', 42),
(16, '1570884544615.png', 'buy_pre_invoice_sale', 'check', 42),
(17, 'u_signature1570889862.jpg', 'user', 'u_signature', 42),
(18, 'u_signature1570889031.png', 'user', 'u_signature', 43),
(19, '1570946695818.png', 'pre_invoice_sale', 'check', 9),
(20, '1570961572347.png', 'pre_invoice_sale', 'signed_customer', 12),
(21, '1570961590728.png', 'pre_invoice_sale', 'check', 12),
(22, '1570973249524.jpg', 'pre_invoice_sale', 'signed_customer', 13),
(23, '1570973266683.png', 'pre_invoice_sale', 'check', 13),
(24, '1570977924944.png', 'pre_invoice_sale', 'signed_customer', 16),
(25, '1570978242913.jpg', 'pre_invoice_sale', 'check', 16),
(26, '1570980048957.png', 'pre_invoice_sale', 'signed_customer', 16),
(27, '1570983560348.png', 'pre_invoice_sale', 'signed_customer', 1),
(28, '1570983571572.jpg', 'pre_invoice_sale', 'check', 1),
(29, '1571031664690.png', 'pre_invoice_sale', 'signed_customer', 2),
(30, 'u_signature1572250689.png', 'user', 'u_signature', 41),
(31, 'u_signature1572250739.jpeg', 'user', 'u_signature', 32),
(32, '1572254203398.jpg', 'buy_pre_invoice_sale', 'check', 10);

-- --------------------------------------------------------

--
-- Table structure for table `media_factor`
--

CREATE TABLE `media_factor` (
  `mf_id` int(11) NOT NULL,
  `fb_id` int(11) NOT NULL,
  `mf_link` text CHARACTER SET utf8 NOT NULL,
  `mf_date` varchar(12) CHARACTER SET utf8 NOT NULL,
  `mf_name` varchar(50) CHARACTER SET utf8 NOT NULL,
  `mf_type` varchar(50) CHARACTER SET utf8 NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `media_factor`
--

INSERT INTO `media_factor` (`mf_id`, `fb_id`, `mf_link`, `mf_date`, `mf_name`, `mf_type`) VALUES
(99, 5, '1572554453532.jpg', '1398/8/10', 'check', 'buy'),
(88, 1, '1572548848435.png', '1398/8/9', 'check', 'sale'),
(86, 1, '1572548616117.png', '1398/8/9', 'signed_customer', 'sale');

-- --------------------------------------------------------

--
-- Table structure for table `media_secretariat`
--

CREATE TABLE `media_secretariat` (
  `ms_id` int(11) NOT NULL COMMENT 'کد رسانه',
  `s_id` int(11) NOT NULL COMMENT 'کد دبیرخانه',
  `ms_link` text NOT NULL COMMENT 'لینک فایل',
  `ms_date` varchar(12) NOT NULL COMMENT 'تاریخ آپلود'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='رسانه دبیرخانه';

--
-- Dumping data for table `media_secretariat`
--

INSERT INTO `media_secretariat` (`ms_id`, `s_id`, `ms_link`, `ms_date`) VALUES
(1, 15, 'pictures/2019/09/68281569745446.png', '2019/09/29'),
(2, 11, 'pictures/2019/09/322871569745511.jpg', '2019/09/29'),
(3, 11, 'pictures/2019/09/218681569745511.jpg', '2019/09/29'),
(16, 14, 'pictures/1398/7/299791569768143.png', '1398/7/7'),
(5, 2, 'pictures/2019/09/60901569745556.jpg', '2019/09/29'),
(20, 12, 'pictures/1398/7/178321569768240.jpg', '1398/7/7'),
(7, 15, 'pictures/2019/09/236401569765508.jpg', '2019/09/29'),
(8, 15, 'pictures/2019/09/209131569765508.jpg', '2019/09/29'),
(12, 13, 'pictures/1398/7/225271569768001.png', '1398/7/7'),
(13, 13, 'pictures/1398/7/229881569768001.jpg', '1398/7/7'),
(25, 14, 'pictures/1398/7/65041570088935.png', '1398/7/11'),
(19, 12, 'pictures/1398/7/229871569768240.jpg', '1398/7/7'),
(22, 10, 'pictures/1398/7/97921569768259.jpg', '1398/7/7'),
(23, 2, 'pictures/1398/7/148301570085824.png', '1398/7/11'),
(24, 2, 'pictures/1398/7/33031570085843.png', '1398/7/11'),
(26, 13, 'pictures/1398/7/111191570088953.jpg', '1398/7/11'),
(27, 13, 'pictures/1398/7/1241570088953.png', '1398/7/11');

-- --------------------------------------------------------

--
-- Table structure for table `options`
--

CREATE TABLE `options` (
  `o_id` int(11) NOT NULL,
  `o_key` varchar(50) DEFAULT NULL,
  `o_value` text DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `options`
--

INSERT INTO `options` (`o_id`, `o_key`, `o_value`) VALUES
(28, 'com_name', 'شرکت پتروسامان'),
(27, 'reg_number', '787'),
(23, 'c_registernumber', ''),
(26, 'c_faddress', ''),
(25, 'c_businessinterface', ''),
(24, 'c_postalcode', ''),
(22, 'c_economic', ''),
(21, 'c_name', 'پتروسامان'),
(29, 'fact_address', 'کیلومتر 10 جاده اصفهان نطنز مقابل شهرک صنعتی شجاع آباد'),
(30, 'Office_Address', 'بلوار طالقانی'),
(31, 'eco_number', '411568463858 '),
(32, 'National_ID', '14007287390'),
(33, 'Phone', '031_54320520'),
(34, 'Fax', '34265250'),
(35, 'State', 'اصفهان'),
(36, 'code_postal', '8769168460'),
(37, 'county', 'نطنز'),
(38, 'city', 'نطنز');

-- --------------------------------------------------------

--
-- Table structure for table `other_analyze`
--

CREATE TABLE `other_analyze` (
  `oa_id` int(11) NOT NULL COMMENT 'کد جدول',
  `oa_date` date DEFAULT NULL COMMENT 'تاریخ آزمون',
  `oa_description` text DEFAULT NULL COMMENT 'توضیحات'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='آزمون های دلخواه';

-- --------------------------------------------------------

--
-- Table structure for table `payroll`
--

CREATE TABLE `payroll` (
  `prl_id` int(11) NOT NULL COMMENT 'کد جدول',
  `prl_uid` int(11) NOT NULL COMMENT 'کد کاربر',
  `prl_month` varchar(10) NOT NULL COMMENT 'ماه',
  `prl_monthly_right` int(11) DEFAULT 0 COMMENT 'پایه حقوق',
  `prl_bon` int(11) DEFAULT 0 COMMENT 'بن و خوار و بار',
  `prl_home_right` int(11) DEFAULT 0 COMMENT 'حق مسکن',
  `prl_child_right` int(11) DEFAULT 0 COMMENT 'عائله مندی',
  `prl_overtime_hours` varchar(15) DEFAULT NULL COMMENT 'کد ملی',
  `prl_overtime_right` int(11) NOT NULL COMMENT 'ساعت اضافه کار',
  `prl_penalty` int(11) DEFAULT 0 COMMENT 'کارانه/جریمه',
  `prl_shift_right` int(11) DEFAULT 0 COMMENT 'حق شیفت',
  `prl_night_work_right` int(11) DEFAULT 0 COMMENT 'شب کاری',
  `prl_traffic` int(11) DEFAULT 0 COMMENT 'ایاب و ذهاب',
  `prl_total_income` int(11) DEFAULT 0 COMMENT 'جمع دریافتی',
  `prl_insure` int(11) DEFAULT 0 COMMENT 'بیمه تامین اجتماعی',
  `prl_tax` int(11) DEFAULT 0 COMMENT 'مالیات',
  `prl_help` int(11) DEFAULT 0 COMMENT 'مساعده',
  `prl_debt` int(11) DEFAULT 0 COMMENT 'قسط وام',
  `prl_deficit` int(11) DEFAULT 0 COMMENT 'کسر از حقوق',
  `prl_saving` int(11) DEFAULT 0 COMMENT 'پس انداز',
  `prl_other` int(11) DEFAULT 0 COMMENT 'سایر',
  `prl_modifier` int(11) DEFAULT 0 COMMENT 'اصلاح حساب',
  `prl_total_expends` int(11) DEFAULT 0 COMMENT 'جمع کسورات',
  `prl_total` int(11) NOT NULL DEFAULT 0 COMMENT 'مبلغ خالص پرداختی',
  `prl_date` varchar(12) NOT NULL COMMENT 'تاریخ صدور'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `produce`
--

CREATE TABLE `produce` (
  `prc_id` int(11) NOT NULL COMMENT 'کد تولید',
  `prc_type` varchar(25) NOT NULL COMMENT 'نوع تولید',
  `prc_date` varchar(12) DEFAULT NULL COMMENT 'تاریخ تولید',
  `prc_sh_id` int(11) DEFAULT NULL COMMENT 'کد شیفت',
  `prc_st_id` int(11) NOT NULL DEFAULT 0 COMMENT 'کد انبار',
  `inp_p_id` int(11) NOT NULL COMMENT 'محصول ورودی',
  `inp_cat_id` int(11) NOT NULL COMMENT 'دانه بندی ورودی',
  `prc_p_id` int(11) DEFAULT NULL COMMENT 'کد محصول',
  `prc_cat_id` int(11) DEFAULT NULL COMMENT 'کد دانه بندی',
  `prc_val` bigint(20) NOT NULL DEFAULT 0 COMMENT 'مقدار',
  `prc_status` tinyint(1) NOT NULL DEFAULT 0 COMMENT 'وضعیت تایید'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `produce`
--

INSERT INTO `produce` (`prc_id`, `prc_type`, `prc_date`, `prc_sh_id`, `prc_st_id`, `inp_p_id`, `inp_cat_id`, `prc_p_id`, `prc_cat_id`, `prc_val`, `prc_status`) VALUES
(5, 'خردایش', '1398/8/6', 1, 12, 6, 12, 6, 19, 40000, 1),
(4, 'سرند', '1398/8/6', 2, 12, 6, 20, 6, 12, 40000, 1),
(3, 'سرند', '1398/8/6', 2, 12, 6, 20, 6, 19, 50000, 1),
(6, 'گرانول سازی', '1398/8/6', 1, 12, 6, 7, 11, 12, 35000, 1),
(7, 'کلسیناسیون', '1398/8/6', 2, 12, 6, 19, 4, 7, 6000, 1),
(8, 'کلسیناسیون', '1398/8/6', 2, 12, 6, 19, 4, 16, 12000, 1),
(9, 'کلسیناسیون', '1398/8/6', 1, 12, 6, 19, 5, 9, 72000, 1),
(10, 'خردایش', '1398/8/6', 1, 12, 11, 12, 6, 19, 20000, 1);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `p_id` int(11) NOT NULL,
  `p_name` varchar(35) DEFAULT NULL,
  `p_unit` varchar(15) DEFAULT NULL,
  `p_type` varchar(20) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`p_id`, `p_name`, `p_unit`, `p_type`) VALUES
(3, 'کربن +70', 'کیلوگرم', 'محصول'),
(4, 'کربن +90', 'کیلوگرم', 'محصول'),
(5, 'کربن +50', 'کیلوگرم', 'محصول'),
(6, 'کربن +80', 'کیلوگرم', 'محصول'),
(7, 'کربن +95', 'کیلوگرم', 'محصول'),
(8, 'کربن +60', 'کیلوگرم', 'محصول'),
(9, 'کربن +99', 'کیلوگرم', 'محصول'),
(10, 'آهن ضایعات', 'کیلوگرم', 'محصول جانبی'),
(11, 'کربن +80 گرانول شده', 'کیلوگرم', 'محصول'),
(12, 'زغال سنگ', 'تن', 'ماده اولیه'),
(13, 'زغال سنگ 2', 'کیلوگرم', 'ماده اولیه');

-- --------------------------------------------------------

--
-- Table structure for table `raw_rights`
--

CREATE TABLE `raw_rights` (
  `rr_id` int(11) NOT NULL COMMENT 'کد جدول',
  `rr_uid` int(11) NOT NULL COMMENT 'کد کاربر',
  `rr_month` varchar(10) NOT NULL COMMENT 'ماه',
  `rr_work_days` int(11) NOT NULL DEFAULT 0 COMMENT 'روزهای کارکرد',
  `rr_overtime_hours` int(11) NOT NULL DEFAULT 0 COMMENT 'ساعت اضافه کاری',
  `rr_child_right_ratio` double NOT NULL DEFAULT 1 COMMENT 'ضریب حق اولاد',
  `rr_shift` int(11) NOT NULL DEFAULT 0 COMMENT 'شیفت',
  `rr_night_work_hours` int(11) NOT NULL DEFAULT 0 COMMENT 'ساعت شب',
  `rr_modifier` int(11) DEFAULT 0 COMMENT 'اصلاح حساب',
  `rr_penalty` int(11) DEFAULT 0 COMMENT 'جریمه / کارانه',
  `rr_traffic` int(11) DEFAULT 0 COMMENT 'ایاب ذهاب',
  `rr_help` int(11) DEFAULT 0 COMMENT 'مساعده',
  `rr_debt` int(11) DEFAULT 0 COMMENT 'قسط وام'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `returned_factor`
--

CREATE TABLE `returned_factor` (
  `re_id` int(30) NOT NULL,
  `fb_id` int(15) NOT NULL,
  `re_type` varchar(20) NOT NULL,
  `re_weight` varchar(50) NOT NULL,
  `re_date` date NOT NULL,
  `re_reason` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `returned_factor`
--

INSERT INTO `returned_factor` (`re_id`, `fb_id`, `re_type`, `re_weight`, `re_date`, `re_reason`) VALUES
(1, 3, 'فروش', '12000', '1398-07-22', 'پایین بودن کیفیت'),
(2, 2, 'فروش', '12000', '1398-07-22', 'تاخیر در ارسال بار'),
(3, 2, 'فروش', '3000', '1398-07-23', 'کیفیت نا مطلوب'),
(4, 2, 'فروش', '108000', '1398-07-23', 'کیفیت نا مطلوب'),
(5, 1, 'فروش', '5000', '1398-07-23', 'کیفیت نا مطلوب'),
(7, 9, 'فروش', '500', '1398-07-24', 'کیفیت نا مطلوب'),
(8, 6, 'خرید', '20000', '1398-08-06', 'کیفیت نا مطلوب');

-- --------------------------------------------------------

--
-- Table structure for table `schedule`
--

CREATE TABLE `schedule` (
  `sc_id` int(11) NOT NULL COMMENT 'کد جدول',
  `sc_month` varchar(35) DEFAULT NULL,
  `sc_group` varchar(35) DEFAULT NULL,
  `sc_schedule` text DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `secretariat`
--

CREATE TABLE `secretariat` (
  `s_id` int(11) NOT NULL COMMENT 'کد دبیرخانه',
  `s_category` varchar(20) NOT NULL COMMENT 'دسته سند',
  `s_type` varchar(20) NOT NULL COMMENT 'نوع سند',
  `s_name` varchar(50) NOT NULL COMMENT 'نام سند',
  `s_subject` varchar(50) NOT NULL COMMENT 'کد رسید',
  `s_rescode` int(11) NOT NULL DEFAULT 0 COMMENT 'موضوع',
  `s_date` varchar(12) NOT NULL COMMENT 'تاریخ',
  `s_from` text DEFAULT NULL COMMENT 'از',
  `s_to` text DEFAULT NULL COMMENT 'به'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='دبیرخانه';

--
-- Dumping data for table `secretariat`
--

INSERT INTO `secretariat` (`s_id`, `s_category`, `s_type`, `s_name`, `s_subject`, `s_rescode`, `s_date`, `s_from`, `s_to`) VALUES
(2, 'letter', 'package', 'تست', '2', 3, '1', '4', '5'),
(15, 'letter', '6', '', '', 12, '', '', ''),
(14, 'meeting', '4', '', '', 0, '', NULL, NULL),
(13, 'meeting', '3', '', '', 0, '', NULL, NULL),
(10, 'rule', '7', 'لا', 'بب', 0, '1398/7/10', NULL, NULL),
(11, 'letter', '1', 'رسید', '', 12, '1398/7/3', '', ''),
(12, 'rule', '5', '', '', 0, '', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `shifts`
--

CREATE TABLE `shifts` (
  `sh_id` int(11) NOT NULL COMMENT 'کد شیفت',
  `sh_name` varchar(14) DEFAULT NULL COMMENT 'نام شیفت',
  `sh_checkin` int(11) DEFAULT NULL COMMENT 'ساعت ورود',
  `sh_checkout` int(11) DEFAULT NULL COMMENT 'ساعت خروج'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `shifts`
--

INSERT INTO `shifts` (`sh_id`, `sh_name`, `sh_checkin`, `sh_checkout`) VALUES
(1, 'شب', 20, 8),
(2, 'روز', 8, 20);

-- --------------------------------------------------------

--
-- Table structure for table `stock`
--

CREATE TABLE `stock` (
  `s_id` int(11) NOT NULL COMMENT 'کد ردیف',
  `p_id` int(11) DEFAULT NULL COMMENT 'کد محصول',
  `cat_id` int(11) NOT NULL COMMENT 'کد دسته بندی',
  `s_amount` int(11) DEFAULT NULL COMMENT 'مقدار',
  `s_eprice` double NOT NULL COMMENT 'قیمت تمام شده',
  `s_sprice` double NOT NULL COMMENT 'قیمت فروش'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `stock`
--

INSERT INTO `stock` (`s_id`, `p_id`, `cat_id`, `s_amount`, `s_eprice`, `s_sprice`) VALUES
(8, 3, 1, 6000, 5000, 6000),
(9, 2, 1, 8000, 5000, 6000),
(6, 3, 2, 600, 200000, 400000),
(11, 19, 2, 1000005, 10000, 10000);

-- --------------------------------------------------------

--
-- Table structure for table `stock_log`
--

CREATE TABLE `stock_log` (
  `p_id` int(6) UNSIGNED NOT NULL,
  `sl_amount` double DEFAULT NULL,
  `sl_type` varchar(10) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `stock_material`
--

CREATE TABLE `stock_material` (
  `sm_id` int(11) NOT NULL COMMENT 'ردیف',
  `rm_id` int(11) DEFAULT NULL COMMENT 'کد مواد اولیه',
  `cat_id` int(11) DEFAULT NULL COMMENT 'کد دسته بندی',
  `sm_amount` int(11) DEFAULT NULL COMMENT 'مقدار',
  `sm_eprice` double DEFAULT NULL COMMENT 'قیمت تمام شده',
  `sm_sprice` double DEFAULT NULL COMMENT 'قیمت فروش'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `stock_material`
--

INSERT INTO `stock_material` (`sm_id`, `rm_id`, `cat_id`, `sm_amount`, `sm_eprice`, `sm_sprice`) VALUES
(12, 10, 2, 900, 50000, 60000),
(25, 8, 4, 25000, 2000, 2700),
(24, 8, 1, 25000, 2000, 3000),
(23, 12, 0, 0, 0, 0),
(21, 10, 1, 100, 54, 35),
(22, 12, 1, 100, 54, 35),
(26, 8, 1, 200, 200000, 250000),
(27, 54, 4, 1111, 120000, 1000000);

-- --------------------------------------------------------

--
-- Table structure for table `storage_list`
--

CREATE TABLE `storage_list` (
  `st_id` int(11) NOT NULL,
  `st_name` varchar(255) DEFAULT NULL,
  `st_address` text DEFAULT NULL,
  `st_type` varchar(20) NOT NULL COMMENT 'نوع',
  `c_id` int(11) NOT NULL COMMENT 'تامین کننده'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `storage_list`
--

INSERT INTO `storage_list` (`st_id`, `st_name`, `st_address`, `st_type`, `c_id`) VALUES
(11, 'انبار دامغان', 'سمنان دامغان', 'miner', 14),
(10, 'انبار پابدانا', 'پابدانا خیابان طغرالجرد', 'outsourcer', 12),
(9, 'انبار معدن ابنیل', 'آبنیل بی بی حیات', 'miner', 10),
(12, 'انبار شماره 1 مرکزی (مواد اولیه)', 'کرمان محل مرکزی کارخانه', 'storage', 16),
(13, 'بنگاه حسینی فرد', 'تهران سه راه ایران ترانسفو', 'storage', 16),
(14, 'انبار شماره 2 مرکزی (مواد آماده کوره)', 'محل مرکزی کارخانه', 'storage', 16),
(15, 'انبار شماره 3 مرکزی (محصولات)', 'محل مرکزی کارخانه', 'storage', 16);

-- --------------------------------------------------------

--
-- Table structure for table `store`
--

CREATE TABLE `store` (
  `s_id` int(11) NOT NULL,
  `s_type` int(11) NOT NULL,
  `s_weight` varchar(35) DEFAULT NULL,
  `s_date` int(11) NOT NULL,
  `s_time` varchar(30) DEFAULT NULL,
  `dr_id` varchar(10) NOT NULL,
  `s_scan_b` int(11) DEFAULT NULL,
  `s_verify_fiscal` int(1) DEFAULT NULL,
  `s_verify_admin` int(1) DEFAULT NULL,
  `s_verify_admin_Quality` int(1) DEFAULT NULL,
  `s_scan_gh` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `transfer_list`
--

CREATE TABLE `transfer_list` (
  `tl_id` int(11) NOT NULL,
  `u_id` int(11) DEFAULT NULL,
  `fb_id` int(11) DEFAULT NULL,
  `dr_id` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `u_id` int(11) NOT NULL,
  `u_name` varchar(35) DEFAULT NULL,
  `u_family` varchar(35) DEFAULT NULL,
  `u_level` varchar(20) DEFAULT NULL,
  `u_username` varchar(30) DEFAULT NULL,
  `u_password` varchar(35) DEFAULT NULL,
  `u_father` varchar(40) DEFAULT NULL COMMENT 'نام پدر',
  `u_meli` varchar(15) DEFAULT NULL COMMENT 'کد ملی',
  `u_birth` varchar(15) DEFAULT NULL COMMENT 'تاریخ تولد',
  `u_live_city` varchar(40) DEFAULT NULL COMMENT 'شهر محل سکونت',
  `u_destination` varchar(10) DEFAULT NULL COMMENT 'مسافت تا کارخانه',
  `u_mobile` varchar(15) DEFAULT NULL COMMENT 'موبایل',
  `u_tell` varchar(15) DEFAULT NULL COMMENT 'تلفن ثابت',
  `u_address` text DEFAULT NULL COMMENT 'آدرس محل سکونت',
  `u_pre` text DEFAULT NULL COMMENT 'سنوات',
  `u_group` varchar(10) DEFAULT NULL COMMENT 'نام گروه',
  `u_description` text DEFAULT NULL COMMENT 'توضیحات',
  `u_pcode` varchar(20) DEFAULT NULL COMMENT 'شماره پرسنل',
  `u_wtype` varchar(20) DEFAULT NULL COMMENT 'سمت',
  `u_marital` varchar(20) DEFAULT NULL COMMENT 'وضعیت تاهل',
  `u_evidence` varchar(40) DEFAULT NULL COMMENT 'مدرک',
  `u_child_count` int(11) DEFAULT 0 COMMENT 'تعداد فرزند',
  `u_daily_wage` bigint(20) DEFAULT 0 COMMENT 'دستمزد روزانه',
  `u_fix_right` int(11) DEFAULT 0 COMMENT 'اضافه ثابت',
  `u_fin_contract` varchar(11) NOT NULL COMMENT 'تاریخ انقضای قرارداد',
  `u_cart` varchar(50) DEFAULT NULL COMMENT 'شماره کارت',
  `u_hesab` varchar(50) DEFAULT NULL COMMENT 'شماره حساب',
  `u_shaba` varchar(50) DEFAULT NULL COMMENT 'شماره شبا',
  `u_birth_city` varchar(40) DEFAULT NULL COMMENT 'محل تولد',
  `u_cert_number` varchar(20) DEFAULT NULL COMMENT 'شماره شناسنامه',
  `u_cert_city` varchar(40) DEFAULT NULL COMMENT 'محل صدور',
  `u_start_work` varchar(11) DEFAULT NULL COMMENT 'تاریخ شروع به کار',
  `u_end_work` varchar(11) DEFAULT NULL COMMENT 'تاریخ ترک کار'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`u_id`, `u_name`, `u_family`, `u_level`, `u_username`, `u_password`, `u_father`, `u_meli`, `u_birth`, `u_live_city`, `u_destination`, `u_mobile`, `u_tell`, `u_address`, `u_pre`, `u_group`, `u_description`, `u_pcode`, `u_wtype`, `u_marital`, `u_evidence`, `u_child_count`, `u_daily_wage`, `u_fix_right`, `u_fin_contract`, `u_cart`, `u_hesab`, `u_shaba`, `u_birth_city`, `u_cert_number`, `u_cert_city`, `u_start_work`, `u_end_work`) VALUES
(1, 'سید مرتضی', 'مهدوی', 'مدیر', 'gratech', '1456', '', '', '', '', '', '111111', '', '', '', '1', '', '', '', 'مجرد', '', 0, 0, 0, '', '', '', '', 'رفسنجان', '', '', '', ''),
(32, 'حسین', 'عباسی', 'فروش', 'abbasi', '123456', '', '', '', '', '', '0000000', '', '', '', '2', '', '', '', 'مجرد', '', 0, 0, 0, '', '', '', '', '', '', '', '', ''),
(33, 'محمود', 'ملاک', 'اسناد', 'mallak', '1234', '', '', '', '', '', '09139923053', '', '', '', '2', '', '', '', 'مجرد', '', 0, 0, 0, '', '', '', '', '', '', '', '', ''),
(40, 'مسول آزمایشگاه', '', 'آزمایشگاه', 'lab', 'lab', '', '', '', '', '', '', '', '', '', '', '', '', '', 'مجرد', '', 0, 0, 0, '', '', '', '', '', '', '', '', ''),
(41, 'حبیب الله', 'پیله وری', 'مدیر', 'habibpi', '123456', '', '', '', '', '', '22222222', '', '', '', '1', '', '', '', 'مجرد', '', 0, 0, 0, '', '', '', '', '', '', '', '', ''),
(42, 'محمد', 'اسماعیلی', 'مدیر', 'mrm', '12345', '', '', '', '', '', '2222222', '', '', '', '1', '', '', '', 'مجرد', '', 0, 0, 0, '', '', '', '', '', '', '', '', ''),
(43, 'کاوه', 'نوروزی', 'مالی', 'kaveh', '123456', '', '', '', '', '', '3333333', '', '', '', '1', '', '', '', 'مجرد', '', 0, 0, 0, '', '', '', '', '', '', '', '', ''),
(44, 'امین', 'حسنی', 'مدیر', 'amin', '123456', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `analyze_form`
--
ALTER TABLE `analyze_form`
  ADD PRIMARY KEY (`analyze_id`);

--
-- Indexes for table `bar_bring`
--
ALTER TABLE `bar_bring`
  ADD PRIMARY KEY (`bar_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `doc_type`
--
ALTER TABLE `doc_type`
  ADD PRIMARY KEY (`d_id`);

--
-- Indexes for table `driver`
--
ALTER TABLE `driver`
  ADD PRIMARY KEY (`dr_id`);

--
-- Indexes for table `factor`
--
ALTER TABLE `factor`
  ADD PRIMARY KEY (`f_id`);

--
-- Indexes for table `factor_body`
--
ALTER TABLE `factor_body`
  ADD PRIMARY KEY (`fb_id`);

--
-- Indexes for table `factor_buy`
--
ALTER TABLE `factor_buy`
  ADD PRIMARY KEY (`f_id`);

--
-- Indexes for table `factor_buy_body`
--
ALTER TABLE `factor_buy_body`
  ADD PRIMARY KEY (`fb_id`);

--
-- Indexes for table `factor_buy_log`
--
ALTER TABLE `factor_buy_log`
  ADD PRIMARY KEY (`l_id`);

--
-- Indexes for table `factor_description`
--
ALTER TABLE `factor_description`
  ADD PRIMARY KEY (`fd_id`);

--
-- Indexes for table `factor_log`
--
ALTER TABLE `factor_log`
  ADD PRIMARY KEY (`l_id`);

--
-- Indexes for table `group_info`
--
ALTER TABLE `group_info`
  ADD PRIMARY KEY (`g_id`);

--
-- Indexes for table `group_log`
--
ALTER TABLE `group_log`
  ADD PRIMARY KEY (`gl_id`);

--
-- Indexes for table `hse_item`
--
ALTER TABLE `hse_item`
  ADD PRIMARY KEY (`h_id`);

--
-- Indexes for table `hse_rates`
--
ALTER TABLE `hse_rates`
  ADD PRIMARY KEY (`hr_id`);

--
-- Indexes for table `material`
--
ALTER TABLE `material`
  ADD PRIMARY KEY (`ma_id`);

--
-- Indexes for table `media`
--
ALTER TABLE `media`
  ADD PRIMARY KEY (`m_id`);

--
-- Indexes for table `media_factor`
--
ALTER TABLE `media_factor`
  ADD PRIMARY KEY (`mf_id`);

--
-- Indexes for table `media_secretariat`
--
ALTER TABLE `media_secretariat`
  ADD PRIMARY KEY (`ms_id`);

--
-- Indexes for table `options`
--
ALTER TABLE `options`
  ADD PRIMARY KEY (`o_id`);

--
-- Indexes for table `other_analyze`
--
ALTER TABLE `other_analyze`
  ADD PRIMARY KEY (`oa_id`);

--
-- Indexes for table `payroll`
--
ALTER TABLE `payroll`
  ADD PRIMARY KEY (`prl_id`);

--
-- Indexes for table `produce`
--
ALTER TABLE `produce`
  ADD PRIMARY KEY (`prc_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `raw_rights`
--
ALTER TABLE `raw_rights`
  ADD PRIMARY KEY (`rr_id`);

--
-- Indexes for table `returned_factor`
--
ALTER TABLE `returned_factor`
  ADD PRIMARY KEY (`re_id`);

--
-- Indexes for table `schedule`
--
ALTER TABLE `schedule`
  ADD PRIMARY KEY (`sc_id`);

--
-- Indexes for table `secretariat`
--
ALTER TABLE `secretariat`
  ADD PRIMARY KEY (`s_id`);

--
-- Indexes for table `shifts`
--
ALTER TABLE `shifts`
  ADD PRIMARY KEY (`sh_id`);

--
-- Indexes for table `stock`
--
ALTER TABLE `stock`
  ADD PRIMARY KEY (`s_id`);

--
-- Indexes for table `stock_log`
--
ALTER TABLE `stock_log`
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `stock_material`
--
ALTER TABLE `stock_material`
  ADD PRIMARY KEY (`sm_id`);

--
-- Indexes for table `storage_list`
--
ALTER TABLE `storage_list`
  ADD PRIMARY KEY (`st_id`);

--
-- Indexes for table `store`
--
ALTER TABLE `store`
  ADD PRIMARY KEY (`s_id`);

--
-- Indexes for table `transfer_list`
--
ALTER TABLE `transfer_list`
  ADD PRIMARY KEY (`tl_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`u_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `analyze_form`
--
ALTER TABLE `analyze_form`
  MODIFY `analyze_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `bar_bring`
--
ALTER TABLE `bar_bring`
  MODIFY `bar_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'کد بار', AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `doc_type`
--
ALTER TABLE `doc_type`
  MODIFY `d_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `driver`
--
ALTER TABLE `driver`
  MODIFY `dr_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'کد راننده', AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `factor`
--
ALTER TABLE `factor`
  MODIFY `f_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'کد ردیف', AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `factor_body`
--
ALTER TABLE `factor_body`
  MODIFY `fb_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'کد ردیف فاکتور فروش', AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `factor_buy`
--
ALTER TABLE `factor_buy`
  MODIFY `f_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'کد فاکتور', AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `factor_buy_body`
--
ALTER TABLE `factor_buy_body`
  MODIFY `fb_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'کد ردیف فاکتور خرید', AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `factor_buy_log`
--
ALTER TABLE `factor_buy_log`
  MODIFY `l_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `factor_description`
--
ALTER TABLE `factor_description`
  MODIFY `fd_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `factor_log`
--
ALTER TABLE `factor_log`
  MODIFY `l_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `group_info`
--
ALTER TABLE `group_info`
  MODIFY `g_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'کد جدول', AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `group_log`
--
ALTER TABLE `group_log`
  MODIFY `gl_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'کد گزارش جابجایی', AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `hse_item`
--
ALTER TABLE `hse_item`
  MODIFY `h_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'کد ایتم ایمنی', AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `hse_rates`
--
ALTER TABLE `hse_rates`
  MODIFY `hr_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `material`
--
ALTER TABLE `material`
  MODIFY `ma_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `media`
--
ALTER TABLE `media`
  MODIFY `m_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `media_factor`
--
ALTER TABLE `media_factor`
  MODIFY `mf_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;

--
-- AUTO_INCREMENT for table `media_secretariat`
--
ALTER TABLE `media_secretariat`
  MODIFY `ms_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'کد رسانه', AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `options`
--
ALTER TABLE `options`
  MODIFY `o_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `other_analyze`
--
ALTER TABLE `other_analyze`
  MODIFY `oa_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'کد جدول';

--
-- AUTO_INCREMENT for table `payroll`
--
ALTER TABLE `payroll`
  MODIFY `prl_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'کد جدول';

--
-- AUTO_INCREMENT for table `produce`
--
ALTER TABLE `produce`
  MODIFY `prc_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'کد تولید', AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `raw_rights`
--
ALTER TABLE `raw_rights`
  MODIFY `rr_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'کد جدول';

--
-- AUTO_INCREMENT for table `returned_factor`
--
ALTER TABLE `returned_factor`
  MODIFY `re_id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `schedule`
--
ALTER TABLE `schedule`
  MODIFY `sc_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'کد جدول';

--
-- AUTO_INCREMENT for table `secretariat`
--
ALTER TABLE `secretariat`
  MODIFY `s_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'کد دبیرخانه', AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `shifts`
--
ALTER TABLE `shifts`
  MODIFY `sh_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'کد شیفت', AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `stock`
--
ALTER TABLE `stock`
  MODIFY `s_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'کد ردیف', AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `stock_log`
--
ALTER TABLE `stock_log`
  MODIFY `p_id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `stock_material`
--
ALTER TABLE `stock_material`
  MODIFY `sm_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ردیف', AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `storage_list`
--
ALTER TABLE `storage_list`
  MODIFY `st_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `store`
--
ALTER TABLE `store`
  MODIFY `s_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `transfer_list`
--
ALTER TABLE `transfer_list`
  MODIFY `tl_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `u_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
