-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 09, 2019 at 12:15 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.1

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
  `cycle_id` int(11) NOT NULL DEFAULT '0' COMMENT 'کد مربوط به سیکل',
  `description` text COMMENT 'توضیحات',
  `sample_in_date` varchar(16) DEFAULT NULL COMMENT 'تاریخ دریافت نمونه',
  `analyze_date` varchar(16) DEFAULT NULL COMMENT 'تاریخ انجام آزمون',
  `analyzer` varchar(50) DEFAULT NULL COMMENT 'نمونه گیری توسط',
  `temprature` varchar(50) DEFAULT NULL COMMENT 'دمای محیط',
  `humidity` varchar(50) DEFAULT NULL COMMENT 'رطوبت محیط',
  `an_empty_weight` int(11) NOT NULL DEFAULT '0' COMMENT 'وزن خالی ناسل',
  `am_empty_weight` int(11) NOT NULL DEFAULT '0' COMMENT 'وزن خالص مواد',
  `an_full_weight` int(11) NOT NULL DEFAULT '0' COMMENT 'وزن پر ناسل',
  `hb_empty_weight` int(11) NOT NULL DEFAULT '0' COMMENT 'وزن خالی بیوکس',
  `hm_empty_weight` int(11) NOT NULL DEFAULT '0' COMMENT 'وزن خالص مواد در درصد رطوبت قبل از کوره',
  `hb_full_weight` int(11) NOT NULL DEFAULT '0' COMMENT 'وزن پر بیوکس',
  `ec_empty_weight` int(11) NOT NULL DEFAULT '0' COMMENT 'وزن خالی کروزه',
  `em_empty_weight` int(11) NOT NULL DEFAULT '0' COMMENT 'وزن خالص مواد فرار قبل از کوره',
  `ec_full_weight` int(11) NOT NULL DEFAULT '0' COMMENT 'وزن پر کروزه',
  `sulfur_percent` int(11) NOT NULL DEFAULT '0' COMMENT 'درصد گوگرد',
  `gm_weight` int(11) NOT NULL DEFAULT '0' COMMENT 'وزن مواد',
  `gm_less_weight` int(11) NOT NULL DEFAULT '0' COMMENT 'درصد مواد بالا',
  `gm_dot_weight` int(11) NOT NULL DEFAULT '0' COMMENT 'درصد مواد محدوده',
  `gm_more_weight` int(11) NOT NULL DEFAULT '0' COMMENT 'درصد مواد پایین'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `analyze_form`
--

INSERT INTO `analyze_form` (`analyze_id`, `cycle`, `cycle_id`, `description`, `sample_in_date`, `analyze_date`, `analyzer`, `temprature`, `humidity`, `an_empty_weight`, `am_empty_weight`, `an_full_weight`, `hb_empty_weight`, `hm_empty_weight`, `hb_full_weight`, `ec_empty_weight`, `em_empty_weight`, `ec_full_weight`, `sulfur_percent`, `gm_weight`, `gm_less_weight`, `gm_dot_weight`, `gm_more_weight`) VALUES
(22, 'other', 2, NULL, '1398/8/9', '1398/8/11', 'اسماعیلی', '20', '30', 2, 40, 20, 1, 60, 85, 2, 78, 57, 98, 200, 120, 40, 40),
(21, 'produce', 12, NULL, '1398/8/6', '1398/8/13', 'اسماعیلی', '20', '30', 1, 40, 20, 1, 80, 15, 2, 55, 13, 98, 200, 120, 50, 30),
(19, 'buy', 35, NULL, '1398/8/6', '1398/8/13', 'اسماعیلی', '20', '30', 2, 40, 20, 1, 60, 15, 1, 55, 13, 98, 200, 120, 50, 30),
(20, 'sell', 36, NULL, '1398/8/9', '1398/8/12', 'اسماعیلی', '20', '30', 1, 40, 20, 1, 60, 15, 2, 55, 13, 98, 200, 120, 60, 20),
(18, 'buy', 33, NULL, '1398/8/6', '1398/8/6', 'اسماعیلی', '20', '30', 1, 40, 20, 1, 60, 15, 2, 55, 13, 98, 200, 120, 50, 30),
(23, 'sell', 37, NULL, '1398/8/6', '1398/8/6', 'اسماعیلی', '20', '30', 2, 40, 20, 1, 60, 15, 2, 55, 13, 98, 200, 120, 50, 30),
(24, 'buy', 40, NULL, '1398/8/4', '1398/8/6', 'اسماعیلی', '20', '30', 1, 40, 20, 1, 60, 15, 2, 55, 13, 98, 200, 120, 50, 30);

-- --------------------------------------------------------

--
-- Table structure for table `apply_loan`
--

CREATE TABLE `apply_loan` (
  `al_id` int(11) NOT NULL,
  `u_id` int(11) DEFAULT NULL,
  `al_date` date NOT NULL COMMENT 'تاریخ درخواست',
  `al_amount` int(11) DEFAULT NULL COMMENT 'مبلغ درخواست',
  `al_details` text COMMENT 'توضیحات',
  `al_admin_verify` tinyint(4) DEFAULT '0',
  `al_admin_date` date NOT NULL,
  `al_admin_details` text,
  `al_hr_verify` tinyint(4) DEFAULT '0',
  `al_hr_date` date NOT NULL,
  `al_hr_details` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `apply_loan`
--

INSERT INTO `apply_loan` (`al_id`, `u_id`, `al_date`, `al_amount`, `al_details`, `al_admin_verify`, `al_admin_date`, `al_admin_details`, `al_hr_verify`, `al_hr_date`, `al_hr_details`) VALUES
(2, 1, '1398-09-04', 150000, 'درخواست وام خرید کتاب', 0, '0000-00-00', NULL, 0, '0000-00-00', NULL),
(3, 1, '1398-09-03', 100000, 'درخواست وام خرید منزل', 1, '1398-09-05', 'توسط مدیر تایید شد', 42, '1398-09-05', 'توسط منابع انسانی تایید شد'),
(7, 1, '1398-09-07', 120000, 'درخواست وام خرید موبایل', 0, '0000-00-00', NULL, 0, '0000-00-00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `bar_bring`
--

CREATE TABLE `bar_bring` (
  `bar_id` int(11) NOT NULL COMMENT 'کد بار',
  `st_id_from` int(11) DEFAULT '0' COMMENT 'از',
  `st_id_to` int(11) DEFAULT '0' COMMENT 'به',
  `fb_id` int(11) DEFAULT '0' COMMENT 'کد فاکتور',
  `fb_type` varchar(11) DEFAULT NULL COMMENT 'نوع بار',
  `dr_id` int(11) DEFAULT '0' COMMENT 'کد راننده',
  `bar_quantity` int(11) DEFAULT '0' COMMENT 'وزن بار',
  `bar_exited` int(11) DEFAULT '0' COMMENT 'بار خارج شده',
  `bar_date` date DEFAULT NULL COMMENT 'تاریخ بار',
  `bar_time` time DEFAULT NULL COMMENT 'ساعت بار',
  `bar_pic_doc` text COMMENT 'تصویر بارنامه',
  `bar_pic_gh` text COMMENT 'تصویر قبض باسکول',
  `description` text COMMENT 'توضیحات',
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
(8, 11, 12, 2, 'buy', 4, 100000, 900, '1398-08-06', '13:11:16', '', '', '', 20, 6, 876543),
(9, 12, 11, 1, 'sale', 6, 2500, 2680, '2019-10-28', '13:42:11', NULL, NULL, NULL, 16, 4, 0),
(10, 12, 11, 1, 'sale', 4, 6000, 5850, '2019-10-28', '13:44:50', NULL, NULL, NULL, 16, 4, 0),
(11, 12, 11, 2, 'sale', 6, 20000, 19430, '2019-10-28', '13:46:49', NULL, NULL, NULL, 16, 4, 0),
(12, 0, 11, 0, 'buy', 4, 0, 0, '1398-08-09', '18:58:09', 'logo.png', '', '', 6, 3, 0),
(13, 0, 11, 0, 'buy', 4, 0, 0, '1398-08-10', '13:21:46', '0010395_-_550.jpeg', '', '', 6, 3, 0),
(18, 0, 11, 2, 'buy', 4, 25, 20, '1398-08-10', '14:37:31', 'logo.png', '', '', 6, 3, 55),
(32, 11, 9, 10, 'buy', 6, 42000, 0, '1398-08-11', '10:03:56', '1572676664463.png', '1572676664905.jpg', 'جهت تست', 6, 3, 24),
(33, 12, 10, 8, 'sale', 6, 10000, 9500, NULL, NULL, NULL, NULL, NULL, 14, 10, 0),
(34, 11, 12, 10, 'buy', 6, 1200, 0, '1398-08-11', '18:45:31', '1572707773930.png', '', '', 6, 3, 45),
(35, 11, 10, 10, 'buy', 4, 200, 0, '1398-08-11', '19:18:37', '', '', '', 6, 3, 45),
(36, 12, 10, 8, 'sale', 6, 200, 100, NULL, NULL, NULL, NULL, NULL, 14, 10, 0),
(37, 12, 11, 9, 'sale', 6, 200, 150, NULL, NULL, NULL, NULL, NULL, 8, 3, 0),
(38, 12, 11, 9, 'sale', 0, 400, 0, NULL, NULL, NULL, NULL, NULL, 8, 3, 0),
(40, 0, 11, 16, 'buy', 4, 1000, 0, '1398-08-12', '17:53:39', '', '', '', 6, 3, 45);

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
  `c_oaddress` text COMMENT 'آدرس دفتر قانونی شخص/شرکت',
  `c_faddress` text COMMENT 'آدرس کارخانه',
  `c_state` varchar(100) DEFAULT NULL COMMENT 'استان',
  `c_county` varchar(100) DEFAULT NULL COMMENT 'شهرستان',
  `c_city` varchar(100) CHARACTER SET utf32 DEFAULT NULL COMMENT 'شهر',
  `c_email` text COMMENT 'آدرس پست الکترونیک',
  `c_vat` varchar(5) DEFAULT NULL COMMENT 'ارزش افزوده',
  `c_expire_vat` varchar(10) DEFAULT NULL COMMENT 'تاریخ انقضا ارزش افزوده',
  `c_activity` varchar(20) DEFAULT NULL COMMENT 'نوع فعالیت',
  `c_registernumber` varchar(20) DEFAULT NULL COMMENT 'شماره ثبت',
  `c_postalcode` varchar(20) DEFAULT NULL COMMENT 'کد پستی',
  `c_managername` varchar(20) DEFAULT NULL COMMENT 'نام مدیرعامل',
  `c_managercode` varchar(20) DEFAULT NULL COMMENT 'کدملی مدیرعامل',
  `c_businessinterface` varchar(20) DEFAULT NULL COMMENT 'تلفن رابط بازرگانی',
  `c_financialinterface` varchar(20) DEFAULT NULL COMMENT 'تلفن رابط مالی',
  `c_discharge` text COMMENT 'آدرس محل تخلیه بار',
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
-- Table structure for table `customs_media`
--

CREATE TABLE `customs_media` (
  `cm_id` int(11) NOT NULL,
  `lc_id` int(11) NOT NULL,
  `cm_link` text,
  `cm_name` text,
  `cm_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `customs_media`
--

INSERT INTO `customs_media` (`cm_id`, `lc_id`, `cm_link`, `cm_name`, `cm_date`) VALUES
(36, 4, '1575702246877.png', 'ff532', '1398-09-16');

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
  `f_VAT_status` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'وضعیت گواهی ارزش افزوده',
  `f_payment` varchar(50) NOT NULL COMMENT 'نحوه پرداخت'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `factor`
--

INSERT INTO `factor` (`f_id`, `c_id`, `st_id_to`, `f_type`, `f_date`, `u_id`, `f_VAT_status`, `f_payment`) VALUES
(1, 14, 11, 'محصول', '1398/8/6', 41, 1, 'نقدی'),
(2, 14, 11, 'محصول', '1398/8/6', 41, 1, 'نقدی'),
(3, 12, 10, 'محصول', '1398/8/9', 1, 1, 'نقدی'),
(4, 14, 11, 'مواد اولیه', '1398/8/10', 1, 1, 'غیر نقدی'),
(5, 14, 11, 'محصول', '1398/8/10', 1, 1, 'غیر نقدی'),
(6, 14, 11, 'محصول', '1398/8/10', 1, 1, 'نقدی'),
(7, 12, 10, 'محصول جانبی', '1398/8/11', 1, 1, 'نقدی'),
(8, 14, 11, 'مواد اولیه', '1398/8/11', 1, 1, 'نقدی'),
(9, 14, 11, 'ماده اولیه', '1398/8/11', 1, 1, 'نقدی'),
(10, 14, 11, 'محصول جانبی', '1398/8/11', 1, 1, 'نقدی'),
(11, 14, 11, 'محصول', '1398/8/12', 1, 1, 'نقدی'),
(12, 14, 11, 'ماده اولیه', '1398/8/12', 1, 1, 'نقدی'),
(13, 14, 11, 'محصول', '1398/8/12', 1, 1, 'نقدی'),
(14, 14, 11, 'محصول', '1398/8/12', 1, 1, 'نقدی');

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
  `fb_verify_admin1` tinyint(1) DEFAULT '0' COMMENT 'تایید مدیر',
  `fb_send_customer` tinyint(1) DEFAULT '0' COMMENT 'تاید فروش ۱',
  `fb_verify_customer` tinyint(1) DEFAULT '0' COMMENT 'تایید مشتری',
  `fb_verify_finan` tinyint(1) DEFAULT '0' COMMENT 'تایید مالی ۲',
  `fb_amount_sent` int(11) NOT NULL DEFAULT '0' COMMENT 'مقدار ارسال شده',
  `fb_status` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'پایان یافته؟',
  `date_verify_finan` date DEFAULT NULL COMMENT 'تاریخ تایید مالی',
  `fd_id` int(11) DEFAULT '0' COMMENT 'توضیحات پیش فاکتور',
  `delivery_time` varchar(50) DEFAULT NULL COMMENT 'مدت زمان تحویل کالا'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `factor_body`
--

INSERT INTO `factor_body` (`fb_id`, `f_id`, `p_id`, `cat_id`, `fb_quantity`, `fb_price`, `total_price`, `fb_verify_admin1`, `fb_send_customer`, `fb_verify_customer`, `fb_verify_finan`, `fb_amount_sent`, `fb_status`, `date_verify_finan`, `fd_id`, `delivery_time`) VALUES
(1, 1, 4, 16, 8500, 55000, 550000000, 41, 0, 41, 41, 8500, 1, '1398-08-06', 2, '3 روز'),
(2, 2, 4, 16, 17000, 55000, 1100000000, 41, 0, 41, 41, 20000, 1, '1398-08-06', 0, ''),
(8, 7, 10, 14, 29100, 5200, 104000000, 1, 0, 1, 1, 10200, 1, '1398-08-11', 3, '5 روزه'),
(9, 11, 3, 8, 600, 850, 4420000, 1, 0, 1, 1, 600, 1, '1398-08-12', 2, '4 روزه'),
(11, 12, 12, 9, 4200, 1200, 5040000, 1, 0, 1, 1, 0, 0, '1398-08-13', 3, '7 روزه'),
(12, 12, 12, 7, 6200, 780, 4836000, 1, 0, 1, 1, 0, 1, '1398-08-13', 3, '6 روزه'),
(15, 14, 3, 17, 9520, 8520, 81110400, 1, 0, 1, 0, 0, 0, NULL, 3, '7 روزه');

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
  `f_VAT_status` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'وضعیت گواهی ارزش افزوده',
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
(8, 12, 10, '1398/8/9', 1, 1, 'نقدی'),
(9, 14, 11, '1398/8/10', 1, 1, 'نقدی'),
(10, 14, 11, '1398/8/10', 1, 1, 'نقدی'),
(11, 14, 11, '1398/8/11', 1, 1, 'نقدی'),
(12, 14, 11, '1398/8/11', 1, 1, 'نقدی'),
(13, 14, 11, '1398/8/12', 1, 1, 'نقدی'),
(14, 14, 11, '1398/8/12', 1, 1, 'نقدی'),
(15, 14, 11, '1398/8/12', 1, 1, 'نقدی'),
(16, 12, 10, '1398/8/25', 1, 1, 'نقدی'),
(17, 14, 11, '1398/9/6', 1, 1, 'نقدی'),
(18, 0, 0, '1398/9/14', 1, 1, 'نقدی');

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
  `fb_verify_admin1` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'تایید مدیر',
  `fb_verify_finan` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'تایید اسناد',
  `fb_verify_sale` tinyint(4) NOT NULL COMMENT 'تایید فروش',
  `fb_outsourcing` varchar(10) DEFAULT NULL COMMENT 'برون سپاری؟',
  `fb_amount_get` int(11) NOT NULL DEFAULT '0' COMMENT 'مقدار دریافت شده',
  `fb_status` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'پایان یافته؟',
  `delivery_time` varchar(50) DEFAULT NULL COMMENT 'مدت زمان تحویل کالا',
  `fd_id` int(11) DEFAULT '0' COMMENT 'توضیحات'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='ردیف های فاکتور خرید';

--
-- Dumping data for table `factor_buy_body`
--

INSERT INTO `factor_buy_body` (`fb_id`, `f_id`, `ma_id`, `cat_id`, `fb_quantity`, `fb_price`, `total_price`, `fb_verify_admin1`, `fb_verify_finan`, `fb_verify_sale`, `fb_outsourcing`, `fb_amount_get`, `fb_status`, `delivery_time`, `fd_id`) VALUES
(1, 1, 3, 11, 300000, 7430, 2229000000, 1, 1, 32, 'no', 0, 0, '2 ماهه', 2),
(2, 2, 6, 20, 200000, 25000, 5000000000, 41, 41, 41, 'no', 0, 0, '30 ر.زه', 3),
(3, 3, 3, 11, 500000, 7430, 3715000000, 41, 41, 32, 'yes', 0, 0, '3 ماه', 2),
(4, 4, 3, 11, 200000, 7430, 1486000000, 41, 41, 32, 'no', 0, 0, '30 روز', 2),
(5, 6, 12, 20, 580, 120000, 69600000, 1, 1, 1, 'yes', 0, 0, '10 روزه', 2),
(10, 11, 12, 12, 45000, 12000, 540000000, 1, 1, 1, 'yes', 0, 0, '10 روزه', 2),
(11, 13, 12, 20, 5600, 8520, 47712000, 1, 1, 1, NULL, 0, 0, '12 روزه', 2),
(12, 14, 13, 20, 8520, 120, 1022400, 0, 0, 1, NULL, 0, 0, '5 روزه', 2),
(13, 14, 13, 20, 852, 52, 44304, 0, 0, 1, NULL, 0, 0, '8 روزه', 2),
(14, 14, 13, 20, 8520, 9600, 81792000, 0, 0, 1, NULL, 0, 0, '50 روزه', 3),
(15, 15, 13, 20, 2000, 5200, 10400000, 0, 0, 1, NULL, 0, 0, '10 روزه', 3),
(16, 15, 13, 20, 28000, 5600, 156800000, 1, 1, 1, 'yes', 0, 0, '10 روزه', 3),
(17, 17, 11, 20, 212, 652313, 138290356, 0, 0, 1, NULL, 0, 0, '10 روزه', 2),
(18, 18, 13, 20, 520, 4, 0, 0, 0, 1, NULL, 0, 0, '10 روزه', 2);

-- --------------------------------------------------------

--
-- Table structure for table `factor_buy_log`
--

CREATE TABLE `factor_buy_log` (
  `l_id` int(11) NOT NULL,
  `u_id` int(11) NOT NULL,
  `l_date` varchar(16) NOT NULL,
  `fb_id` int(11) NOT NULL,
  `l_details` text
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `factor_buy_log`
--

INSERT INTO `factor_buy_log` (`l_id`, `u_id`, `l_date`, `fb_id`, `l_details`) VALUES
(1, 1, '1398/08/12 17:13', 15, 'افزودن فاکتور خرید'),
(2, 1, '1398/08/12 17:13', 16, 'افزودن فاکتور خرید'),
(3, 1, '1398/08/12 17:14', 16, 'آپلود پیش فاکتور خرید'),
(4, 1, '1398/08/12 17:14', 16, 'آپلود پیش فاکتور خرید'),
(5, 1, '1398/08/12 17:15', 16, 'آپلود پیش فاکتور خرید'),
(6, 1, '1398/08/12 17:15', 16, 'حذف پیش فاکتور خرید'),
(7, 1, '1398/08/12 17:16', 16, 'ویرایش فاکتور خرید'),
(8, 1, '1398/08/12 17:20', 16, 'ویرایش فاکتور خرید'),
(9, 1, '1398/08/12 17:22', 16, 'ویرایش فاکتور خرید'),
(10, 1, '1398/08/12 17:22', 16, 'ویرایش فاکتور خرید'),
(11, 1, '1398/08/12 17:24', 16, 'ویرایش فاکتور خرید'),
(12, 1, '1398/08/12 17:25', 16, 'ویرایش فاکتور خرید'),
(13, 1, '1398/08/12 17:26', 16, 'ویرایش فاکتور خرید'),
(14, 1, '1398/08/12 17:27', 16, 'ویرایش فاکتور خرید'),
(15, 1, '1398/08/12 17:28', 16, ''),
(16, 1, '1398/08/12 17:29', 16, ''),
(17, 1, '1398/08/12 17:29', 16, 'تایید مدیر 1'),
(18, 1, '1398/08/12 17:31', 16, ''),
(19, 1, '1398/08/12 17:31', 16, 'تایید مدیر بخش خرید'),
(20, 1, '1398/08/12 17:31', 16, ''),
(21, 1, '1398/08/12 17:31', 16, 'تایید مالی'),
(22, 1, '1398/08/12 17:32', 16, ''),
(23, 1, '1398/08/12 17:35', 16, 'حذف اسکن چک/سفته ها'),
(24, 1, '1398/08/12 17:35', 16, 'بارگزاری اسکن چک/سفته ها'),
(25, 1, '1398/08/12 17:36', 16, 'برون سپاری'),
(26, 1, '1398/08/12 17:36', 4, 'خرید مستقیم'),
(27, 1, '1398/08/12 17:54', 16, 'ثبت ورودی انبار'),
(28, 1, '1398/08/12 18:04', 16, 'ویرایش فرم آزمایشگاه'),
(29, 1, '1398/08/12 18:05', 10, 'فرم آزمایشگاه'),
(30, 1, '1398/08/12 18:12', 16, 'حذف ورودی انبار'),
(31, 1, '1398/09/05 19:52', 11, ''),
(32, 1, '1398/09/05 19:52', 11, 'تایید مدیر بخش خرید'),
(33, 1, '1398/09/06 14:35', 17, 'افزودن فاکتور خرید'),
(34, 1, '1398/09/06 14:36', 17, 'آپلود پیش فاکتور خرید'),
(35, 1, '1398/09/06 14:36', 17, 'حذف پیش فاکتور خرید'),
(36, 1, '1398/09/06 14:36', 17, 'آپلود پیش فاکتور خرید'),
(37, 1, '1398/09/06 14:36', 17, 'حذف پیش فاکتور خرید'),
(38, 1, '1398/09/14 10:36', 18, 'افزودن فاکتور خرید'),
(39, 1, '1398/09/14 10:52', 1, 'آپلود پیش فاکتور خرید'),
(40, 1, '1398/09/14 10:52', 1, 'حذف پیش فاکتور خرید'),
(41, 1, '1398/09/14 12:33', 11, ''),
(42, 1, '1398/09/14 12:33', 11, 'تایید مالی بخش خرید');

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
  `l_details` text,
  `l_amount` int(11) NOT NULL DEFAULT '0' COMMENT 'مقدار ارسال شده',
  `fl_driver_id` int(11) NOT NULL DEFAULT '0' COMMENT 'کد راننده',
  `fl_exit_bar` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'خارج شده',
  `fl_analyze_id` int(11) NOT NULL DEFAULT '0' COMMENT 'کد آزمون',
  `fl_admin_confirm` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'تایید مدیر'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `factor_log`
--

INSERT INTO `factor_log` (`l_id`, `u_id`, `l_date`, `fb_id`, `l_details`, `l_amount`, `fl_driver_id`, `fl_exit_bar`, `fl_analyze_id`, `fl_admin_confirm`) VALUES
(60, 1, '1398/08/12 11:35', 9, '', 0, 0, 0, 0, 0),
(61, 1, '1398/08/12 11:35', 9, 'تایید مسئول فروش', 0, 0, 0, 0, 0),
(62, 1, '1398/08/12 11:35', 9, '', 0, 0, 0, 0, 0),
(63, 1, '1398/08/12 11:35', 9, 'تایید مالی', 0, 0, 0, 0, 0),
(64, 1, '1398/08/12 11:35', 9, 'بارگزاری پیش فاکتور امضا شده ی مشتری', 0, 0, 0, 0, 0),
(55, 1, '1398/08/12 11:32', 14, 'افزودن فاکتور فروش', 0, 0, 0, 0, 0),
(56, 1, '1398/08/12 11:32', 14, 'حذف فاکتور فروش', 0, 0, 0, 0, 0),
(58, 1, '1398/08/12 11:34', 9, '', 0, 0, 0, 0, 0),
(68, 1, '1398/08/12 12:21', 9, NULL, 200, 0, 0, 0, 0),
(59, 1, '1398/08/12 11:34', 9, 'تایید مدیر', 0, 0, 0, 0, 0),
(65, 1, '1398/08/12 11:36', 9, 'بارگزاری اسکن چک/سفته ها', 0, 0, 0, 0, 0),
(67, 1, '1398/08/12 12:05', 13, 'حذف فاکتور فروش', 0, 0, 0, 0, 0),
(69, 1, '1398/08/12 12:21', 9, 'تفکیک بار', 0, 0, 0, 0, 0),
(70, 1, '1398/08/12 12:31', 2, 'ثبت وزن نهایی', 0, 0, 0, 0, 0),
(71, 1, '1398/08/12 12:36', 2, 'ثبت وزن نهایی', 0, 0, 0, 0, 0),
(72, 1, '1398/08/12 12:36', 9, NULL, 400, 0, 0, 0, 0),
(73, 1, '1398/08/12 12:36', 9, 'تفکیک بار', 0, 0, 0, 0, 0),
(74, 1, '1398/08/12 12:36', 9, 'اتمام سفارش', 0, 0, 0, 0, 0),
(75, 1, '1398/08/12 12:40', 2, 'انتقال باقیمانده به فاکتور دیگر', 0, 0, 0, 0, 0),
(78, 1, '1398/08/12 12:45', 9, 'انتقال باقیمانده به فاکتور دیگر', 0, 0, 0, 0, 0),
(79, 1, '1398/08/12 12:53', 9, 'فرم آزمایشگاه', 0, 0, 0, 0, 0),
(80, 1, '1398/08/12 12:54', 9, 'ویرایش فرم آزمایشگاه', 0, 0, 0, 0, 0),
(81, 1, '1398/08/12 13:34', 15, 'افزودن فاکتور فروش', 0, 0, 0, 0, 0),
(82, 1, '1398/08/12 17:55', 16, 'فرم آزمایشگاه', 0, 0, 0, 0, 0),
(83, 1, '1398/08/12 17:58', 16, 'ویرایش فرم آزمایشگاه', 0, 0, 0, 0, 0),
(84, 1, '1398/08/12 18:42', 15, 'ویرایش فاکتور فروش', 0, 0, 0, 0, 0),
(85, 1, '1398/08/13 10:57', 12, '', 0, 0, 0, 0, 0),
(86, 1, '1398/08/13 10:57', 12, 'تایید مدیر', 0, 0, 0, 0, 0),
(87, 1, '1398/08/13 10:57', 12, '', 0, 0, 0, 0, 0),
(88, 1, '1398/08/13 10:57', 12, 'تایید مسئول فروش', 0, 0, 0, 0, 0),
(89, 1, '1398/08/13 10:57', 12, '', 0, 0, 0, 0, 0),
(90, 1, '1398/08/13 10:57', 12, 'تایید مالی', 0, 0, 0, 0, 0),
(91, 1, '1398/08/13 12:15', 12, 'اتمام سفارش', 0, 0, 0, 0, 0),
(92, 1, '1398/08/13 15:09', 11, '', 0, 0, 0, 0, 0),
(93, 1, '1398/08/13 15:09', 11, 'تایید مسئول فروش', 0, 0, 0, 0, 0),
(94, 1, '1398/08/13 15:09', 11, '', 0, 0, 0, 0, 0),
(95, 1, '1398/08/13 15:09', 11, 'تایید مالی', 0, 0, 0, 0, 0),
(96, 1, '1398/08/25 23:28', 15, '', 0, 0, 0, 0, 0),
(97, 1, '1398/08/25 23:28', 15, 'تایید مدیر', 0, 0, 0, 0, 0),
(98, 1, '1398/09/14 12:27', 15, '', 0, 0, 0, 0, 0),
(99, 1, '1398/09/14 12:27', 15, 'تایید مسئول فروش', 0, 0, 0, 0, 0);

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
-- Table structure for table `header_loading`
--

CREATE TABLE `header_loading` (
  `hl_id` int(11) NOT NULL,
  `hl_name` varchar(30) DEFAULT NULL,
  `hl_link` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `header_loading`
--

INSERT INTO `header_loading` (`hl_id`, `hl_name`, `hl_link`) VALUES
(1, 'سربرگ نامه ارسالی (a4)', 'letter-a4.jpg'),
(2, 'سربرگ نامه ارسالی (a5)', 'letter-a5.jpg'),
(3, 'سربرگ آزمایشگاه(a4)', 'lab-a4.jpg'),
(4, 'سربرگ مرخصی (a5)', 'rest-a5.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `hse_item`
--

CREATE TABLE `hse_item` (
  `h_id` int(11) NOT NULL COMMENT 'کد ایتم ایمنی',
  `h_name` varchar(20) DEFAULT NULL,
  `h_status` tinyint(1) NOT NULL DEFAULT '1' COMMENT 'وضعیت'
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
(24, 1, 18, '1398/8/21', 1),
(25, 33, 19, '1398/8/20', 1),
(26, 32, 18, '1398/8/20', 1),
(27, 33, 18, '1398/8/20', 1),
(28, 32, 19, '1398/8/20', 0),
(29, 44, 19, '1398/8/22', 0),
(30, 33, 19, '1398/8/13', 0),
(31, 32, 19, '1398/8/13', 0),
(32, 32, 18, '1398/8/13', 0),
(33, 33, 18, '1398/8/13', 0);

-- --------------------------------------------------------

--
-- Table structure for table `list_customs`
--

CREATE TABLE `list_customs` (
  `lc_id` int(11) NOT NULL,
  `lc_type` varchar(11) NOT NULL COMMENT 'نوع',
  `lc_company` varchar(50) DEFAULT NULL COMMENT 'نام شرکت',
  `lc_details` text COMMENT 'توضیحات',
  `fb_id` int(11) NOT NULL COMMENT 'شماره فاکتور',
  `lc_code` varchar(250) DEFAULT NULL COMMENT 'کد رهگیری'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `list_customs`
--

INSERT INTO `list_customs` (`lc_id`, `lc_type`, `lc_company`, `lc_details`, `fb_id`, `lc_code`) VALUES
(4, 'ارسالی', 'آلیاژ گستر اهورا', 'تایید و ارسال فاکتور منتهی به فروردین و خرداد', 8, '102739813000104770000113');

-- --------------------------------------------------------

--
-- Table structure for table `login_record`
--

CREATE TABLE `login_record` (
  `lr_id` int(11) NOT NULL,
  `u_id` int(11) NOT NULL,
  `lr_time` datetime NOT NULL,
  `lr_ip` varchar(15) CHARACTER SET utf8 NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login_record`
--

INSERT INTO `login_record` (`lr_id`, `u_id`, `lr_time`, `lr_ip`) VALUES
(6, 5, '2019-09-19 05:28:53', ''),
(5, 21, '2019-09-19 03:46:05', ''),
(4, 5, '2019-09-19 03:43:11', ''),
(8, 5, '2019-09-19 06:07:29', ''),
(9, 5, '2019-09-19 06:59:30', ''),
(10, 21, '2019-09-19 07:01:06', ''),
(11, 21, '2019-09-19 07:55:18', ''),
(12, 21, '2019-09-19 09:07:11', ''),
(13, 21, '2019-09-20 12:07:37', ''),
(14, 5, '2019-09-20 12:12:34', '46.225.213.168'),
(15, 21, '2019-09-20 07:48:06', '2.184.1.199'),
(16, 21, '2019-09-20 10:05:05', '2.184.1.199'),
(17, 24, '2019-09-21 10:51:55', '46.225.213.168'),
(18, 26, '2019-09-21 19:19:19', '37.27.61.116'),
(19, 21, '2019-09-21 19:27:06', '2.184.1.199'),
(20, 26, '2019-09-21 20:58:13', '46.225.213.168'),
(21, 21, '2019-09-21 20:58:47', '46.225.213.168'),
(22, 28, '2019-09-22 15:28:31', '104.237.226.177'),
(23, 5, '2019-09-22 15:42:24', '46.225.213.109'),
(24, 28, '2019-09-22 15:43:57', '46.225.213.109'),
(25, 21, '2019-09-22 22:27:53', '2.184.28.83'),
(26, 30, '2019-09-24 09:56:32', '5.120.137.204'),
(27, 5, '2019-09-24 10:37:19', '5.120.137.204'),
(28, 5, '2019-09-24 10:39:37', '5.120.137.204'),
(29, 30, '2019-09-24 10:44:18', '5.120.137.204'),
(30, 5, '2019-09-24 17:32:31', '86.57.115.46'),
(31, 5, '2019-09-24 17:32:43', '46.225.213.109'),
(32, 21, '2019-09-24 19:03:20', '46.225.213.109'),
(33, 21, '2019-09-24 21:34:33', '2.184.25.121'),
(34, 30, '2019-09-25 08:59:50', '5.120.137.204'),
(35, 22, '2019-09-25 10:31:28', '93.119.211.160'),
(36, 33, '2019-09-25 10:37:03', '93.119.211.160'),
(37, 5, '2019-09-25 10:54:20', '46.225.213.109'),
(38, 5, '2019-09-25 12:01:38', '46.225.213.109'),
(39, 21, '2019-09-25 17:40:13', '80.191.166.152'),
(40, 21, '2019-09-25 19:38:02', '80.191.166.152'),
(41, 21, '2019-09-25 21:43:31', '80.191.170.214'),
(42, 28, '2019-09-26 14:13:12', '2.177.158.195'),
(43, 5, '2019-09-26 14:54:22', '46.225.213.109'),
(44, 21, '2019-09-26 16:57:09', '2.183.144.176'),
(45, 21, '2019-09-26 17:49:36', '2.183.144.176'),
(46, 21, '2019-09-26 18:52:48', '2.183.144.176'),
(47, 21, '2019-09-26 19:46:16', '2.183.144.176'),
(48, 30, '2019-09-27 11:54:20', '80.191.165.189'),
(49, 21, '2019-09-27 17:36:01', '2.183.144.176'),
(50, 21, '2019-09-27 19:01:34', '2.183.144.176'),
(51, 30, '2019-09-28 09:03:51', '5.120.139.30'),
(52, 5, '2019-09-29 17:15:40', '5.120.139.30'),
(53, 5, '2019-09-30 15:57:21', '5.119.54.222'),
(54, 5, '2019-10-01 21:38:48', '46.225.208.85'),
(55, 21, '2019-10-01 21:40:10', '46.225.208.85'),
(56, 21, '2019-10-02 20:03:43', '78.39.94.52'),
(57, 21, '2019-10-04 00:12:37', '5.119.223.114'),
(58, 5, '2019-10-04 18:46:38', '5.119.223.114'),
(59, 21, '2019-10-04 18:46:53', '5.119.223.114'),
(60, 5, '2019-10-04 18:48:02', '5.119.223.114'),
(61, 5, '2019-10-04 18:49:06', '5.119.223.114'),
(62, 21, '2019-10-04 21:27:07', '78.39.94.52'),
(63, 5, '2019-10-04 21:46:35', '46.225.208.85'),
(64, 5, '2019-10-05 09:08:03', '46.225.208.85'),
(65, 28, '2019-10-05 09:11:37', '46.225.208.85'),
(66, 5, '2019-10-05 10:08:09', '5.119.223.114'),
(67, 34, '2019-10-06 12:41:09', '86.57.107.30'),
(68, 34, '2019-10-06 17:31:30', '51.75.165.229'),
(69, 5, '2019-10-07 18:52:43', '46.225.208.85'),
(70, 28, '2019-10-07 18:54:10', '89.198.181.221'),
(71, 29, '2019-10-07 21:26:45', '46.225.208.85'),
(72, 5, '2019-10-07 22:42:57', '46.225.208.85'),
(73, 29, '2019-10-08 11:46:14', '2.177.190.42'),
(74, 29, '2019-10-08 11:50:01', '84.241.11.195'),
(75, 29, '2019-10-10 13:35:05', '84.241.11.195'),
(76, 5, '2019-10-11 17:30:45', '5.202.97.119'),
(77, 5, '2019-10-11 18:19:57', '5.202.97.119'),
(78, 39, '2019-10-11 18:52:46', '5.202.97.119'),
(79, 39, '2019-10-11 18:56:23', '83.123.220.181'),
(80, 39, '2019-10-11 18:59:00', '37.129.67.105'),
(81, 39, '2019-10-11 19:01:39', '37.129.67.105'),
(82, 39, '2019-10-11 19:08:35', '37.129.67.105'),
(83, 39, '2019-10-11 20:09:28', '37.129.67.105'),
(84, 39, '2019-10-11 20:13:10', '37.129.67.105'),
(85, 21, '2019-10-11 22:13:58', '78.39.30.74'),
(86, 39, '2019-10-12 13:39:29', '31.56.185.89'),
(87, 39, '2019-10-12 17:16:16', '83.123.249.17'),
(88, 39, '2019-10-12 17:24:45', '5.202.97.119'),
(89, 39, '2019-10-12 18:48:11', '5.120.32.82'),
(90, 39, '2019-10-12 18:48:17', '5.202.97.119'),
(91, 43, '2019-10-13 11:08:46', '5.117.215.142'),
(92, 5, '2019-10-13 11:10:14', '5.120.12.76'),
(93, 43, '2019-10-13 13:36:48', '5.117.215.142'),
(94, 5, '2019-10-13 16:10:20', '46.225.209.197'),
(95, 43, '2019-10-13 16:12:10', '46.225.209.197'),
(96, 39, '2019-10-13 18:18:12', '5.202.97.119'),
(97, 5, '2019-10-13 21:08:37', '46.225.209.197'),
(98, 5, '2019-10-14 08:52:10', '5.119.139.84'),
(99, 5, '2019-10-14 09:21:12', '5.119.139.84'),
(100, 43, '2019-10-14 10:06:31', '5.119.139.84'),
(101, 39, '2019-10-14 18:20:56', '5.202.97.119'),
(102, 5, '2019-10-14 18:55:23', '46.225.209.55'),
(103, 21, '2019-10-14 18:56:03', '46.225.209.55'),
(104, 5, '2019-10-14 18:56:36', '46.225.209.55'),
(105, 5, '2019-10-15 12:49:19', '5.119.43.85'),
(106, 5, '2019-10-15 17:43:00', '46.225.209.55'),
(107, 5, '2019-10-15 20:07:00', '46.225.209.55'),
(108, 5, '2019-10-15 21:34:32', '46.225.209.55'),
(109, 5, '2019-10-15 22:54:19', '46.225.209.55'),
(110, 5, '2019-10-16 07:30:39', '46.225.209.55'),
(111, 5, '2019-10-16 08:02:19', '46.225.209.55'),
(112, 34, '2019-10-16 12:33:40', '51.75.165.229'),
(113, 5, '2019-10-16 13:03:09', '5.120.57.127'),
(114, 5, '2019-10-16 13:25:38', '5.120.57.127'),
(115, 5, '2019-10-16 16:32:57', '5.119.30.185'),
(116, 39, '2019-10-16 16:38:02', '5.202.97.119'),
(117, 34, '2019-10-16 16:59:22', '51.75.165.229'),
(118, 39, '2019-10-16 17:04:35', '5.202.97.119'),
(119, 39, '2019-10-16 17:06:49', '5.119.30.185'),
(120, 39, '2019-10-16 18:18:10', '5.202.97.119'),
(121, 39, '2019-10-16 18:18:20', '5.202.97.119'),
(122, 5, '2019-10-17 09:15:13', '5.119.131.162'),
(123, 43, '2019-10-17 09:22:59', '5.119.131.162'),
(124, 5, '2019-10-17 12:24:48', '5.119.131.162'),
(125, 39, '2019-10-17 19:08:50', '5.202.1.190'),
(126, 39, '2019-10-20 17:41:37', '5.202.1.190'),
(127, 39, '2019-10-22 17:23:29', '5.202.1.190'),
(128, 29, '2019-10-23 10:25:34', '104.237.226.177'),
(129, 5, '2019-10-23 10:25:44', '5.119.156.135'),
(130, 29, '2019-10-23 12:17:16', '104.237.226.177'),
(131, 29, '2019-10-23 14:50:05', '104.237.226.177'),
(132, 5, '2019-10-23 17:29:10', '5.119.156.135'),
(133, 5, '2019-10-23 17:31:52', '5.202.1.190'),
(134, 39, '2019-10-23 17:40:02', '5.202.1.190'),
(135, 39, '2019-10-23 17:45:53', '5.202.1.190'),
(136, 5, '2019-10-23 23:16:24', '46.225.232.47'),
(137, 5, '2019-10-24 13:16:48', '5.119.156.135'),
(138, 39, '2019-10-24 16:29:41', '5.202.1.190'),
(139, 5, '2019-10-24 17:06:11', '5.119.156.135'),
(140, 5, '2019-10-24 17:22:40', '5.119.156.135'),
(141, 29, '2019-10-24 19:17:19', '104.237.226.177'),
(142, 29, '2019-10-24 20:19:27', '84.241.11.195'),
(143, 29, '2019-10-24 20:25:33', '46.225.232.47'),
(144, 29, '2019-10-24 23:48:03', '104.237.226.177'),
(145, 29, '2019-10-25 11:08:20', '84.241.11.195'),
(146, 29, '2019-10-25 11:29:58', '104.237.226.177'),
(147, 29, '2019-10-25 12:31:17', '104.237.226.177'),
(148, 29, '2019-10-25 12:56:57', '84.241.11.195'),
(149, 29, '2019-10-25 13:15:38', '84.241.11.195'),
(150, 29, '2019-10-25 13:16:28', '104.237.226.177'),
(151, 29, '2019-10-25 13:37:04', '84.241.11.195'),
(152, 29, '2019-10-25 13:45:36', '104.237.226.177'),
(153, 29, '2019-10-25 13:52:02', '83.122.213.239'),
(154, 29, '2019-10-25 14:52:37', '84.241.11.195'),
(155, 29, '2019-10-25 14:59:07', '84.241.11.195'),
(156, 29, '2019-10-25 15:22:14', '84.241.11.195'),
(157, 29, '2019-10-25 15:45:48', '84.241.11.195'),
(158, 29, '2019-10-25 16:18:11', '104.237.226.177'),
(159, 29, '2019-10-25 18:17:36', '46.224.79.249'),
(160, 5, '2019-10-25 19:28:01', '5.202.1.190'),
(161, 29, '2019-10-25 20:02:32', '84.241.11.195'),
(162, 29, '2019-10-25 20:29:40', '46.224.79.249'),
(163, 5, '2019-10-26 08:00:35', '46.225.209.16'),
(164, 5, '2019-10-26 08:59:24', '46.225.209.16'),
(165, 29, '2019-10-26 09:56:53', '84.241.11.195'),
(166, 29, '2019-10-26 11:56:35', '84.241.11.195'),
(167, 29, '2019-10-26 12:02:03', '46.224.79.249'),
(168, 5, '2019-10-26 12:05:32', '5.120.4.43'),
(169, 29, '2019-10-26 13:02:39', '84.241.11.195'),
(170, 29, '2019-10-26 14:56:06', '5.120.4.43'),
(171, 29, '2019-10-26 14:56:46', '84.241.11.195'),
(172, 29, '2019-10-26 15:43:52', '89.196.188.101'),
(173, 29, '2019-10-26 15:55:37', '84.241.11.195'),
(174, 39, '2019-10-26 16:03:36', '5.202.1.190'),
(175, 29, '2019-10-26 17:51:53', '46.224.79.249'),
(176, 29, '2019-10-26 18:33:57', '104.237.225.11'),
(177, 39, '2019-10-26 18:58:19', '5.202.1.190'),
(178, 29, '2019-10-26 19:39:30', '5.120.4.43'),
(179, 39, '2019-10-26 19:50:47', '5.120.4.43'),
(180, 29, '2019-10-26 19:59:56', '5.120.4.43'),
(181, 39, '2019-10-26 20:52:56', '5.202.1.190'),
(182, 29, '2019-10-26 21:05:15', '5.120.4.43'),
(183, 29, '2019-10-26 21:13:45', '5.106.164.254'),
(184, 29, '2019-10-27 10:01:05', '46.224.79.249'),
(185, 29, '2019-10-27 14:47:19', '5.211.95.174'),
(186, 29, '2019-10-27 18:29:59', '104.237.226.177'),
(187, 29, '2019-10-27 22:16:16', '46.224.79.249'),
(188, 29, '2019-10-28 10:12:53', '84.241.11.195'),
(189, 29, '2019-10-28 13:55:03', '104.237.226.177'),
(190, 22, '2019-10-28 14:37:59', '93.119.223.37'),
(191, 22, '2019-10-28 15:13:32', '93.117.177.102'),
(192, 5, '2019-10-28 15:47:18', '46.225.209.16'),
(193, 29, '2019-10-28 16:14:42', '104.237.226.177'),
(194, 39, '2019-10-28 16:16:26', '5.202.1.190'),
(195, 22, '2019-10-28 18:34:34', '46.225.209.16'),
(196, 29, '2019-10-28 18:35:18', '46.225.209.16'),
(197, 29, '2019-10-29 10:34:19', '46.225.209.16'),
(198, 29, '2019-10-29 15:49:44', '84.241.11.195'),
(199, 29, '2019-10-30 10:34:10', '84.241.11.195'),
(200, 29, '2019-10-30 13:53:18', '104.237.226.135'),
(201, 5, '2019-10-30 15:44:14', '5.120.91.215'),
(202, 29, '2019-10-30 15:44:26', '5.120.91.215'),
(203, 22, '2019-10-30 15:50:05', '94.101.251.217'),
(204, 5, '2019-10-30 15:57:30', '5.120.91.215'),
(205, 29, '2019-10-30 16:07:18', '5.120.91.215'),
(206, 39, '2019-10-30 16:55:39', '5.202.1.190'),
(207, 39, '2019-10-30 19:01:55', '5.202.1.190'),
(208, 29, '2019-10-30 19:11:08', '5.202.1.190'),
(209, 39, '2019-10-30 19:11:40', '5.202.1.190'),
(210, 5, '2019-10-30 19:21:05', '5.202.1.190'),
(211, 39, '2019-10-30 19:23:40', '5.202.1.190'),
(212, 39, '2019-10-30 19:48:17', '37.129.31.105'),
(213, 39, '2019-10-30 19:58:47', '5.202.1.190'),
(214, 39, '2019-10-30 20:16:43', '5.202.1.190'),
(215, 39, '2019-10-31 08:03:39', '46.225.209.16'),
(216, 29, '2019-10-31 09:15:19', '46.225.209.16'),
(217, 39, '2019-10-31 09:19:04', '113.203.114.125'),
(218, 39, '2019-10-31 09:19:38', '5.202.1.190'),
(219, 29, '2019-10-31 09:54:24', '84.241.11.195'),
(220, 39, '2019-10-31 11:11:10', '83.122.188.153'),
(221, 39, '2019-10-31 12:36:27', '83.122.188.153'),
(222, 29, '2019-10-31 13:29:41', '84.241.11.195'),
(223, 29, '2019-10-31 13:37:08', '84.241.11.195'),
(224, 29, '2019-10-31 13:41:25', '84.241.11.195'),
(225, 29, '2019-10-31 13:48:46', '84.241.11.195'),
(226, 39, '2019-10-31 15:02:51', '5.202.1.190'),
(227, 39, '2019-10-31 16:11:05', '46.225.209.16'),
(228, 29, '2019-10-31 16:11:37', '46.225.209.16'),
(229, 39, '2019-10-31 16:20:51', '31.56.189.102'),
(230, 39, '2019-10-31 18:33:46', '46.225.209.16'),
(231, 39, '2019-10-31 18:50:10', '5.202.1.190'),
(232, 29, '2019-10-31 19:00:31', '46.225.209.16'),
(233, 39, '2019-10-31 19:02:11', '46.225.209.16'),
(234, 5, '2019-10-31 19:43:02', '46.225.209.16'),
(235, 39, '2019-10-31 19:52:10', '46.225.209.16'),
(236, 29, '2019-10-31 19:52:29', '46.225.209.16'),
(237, 29, '2019-10-31 20:08:05', '46.225.209.16'),
(238, 39, '2019-10-31 20:09:05', '5.202.1.190'),
(239, 39, '2019-10-31 20:37:03', '46.225.209.16'),
(240, 29, '2019-10-31 20:41:59', '46.225.209.16'),
(241, 29, '2019-10-31 20:49:43', '46.225.209.16'),
(242, 29, '2019-11-01 09:32:08', '192.254.92.6'),
(243, 29, '2019-11-01 11:00:59', '84.241.11.195'),
(244, 29, '2019-11-01 11:21:52', '46.225.209.16'),
(245, 29, '2019-11-01 11:32:36', '84.241.11.195'),
(246, 29, '2019-11-01 13:15:01', '5.120.91.215'),
(247, 39, '2019-11-01 13:46:11', '5.120.91.215'),
(248, 39, '2019-11-01 15:11:09', '5.202.25.36'),
(249, 29, '2019-11-01 15:36:24', '84.241.11.195'),
(250, 39, '2019-11-01 16:53:43', '31.56.189.102'),
(251, 29, '2019-11-01 17:46:15', '91.251.70.45'),
(252, 39, '2019-11-01 17:48:13', '31.56.189.102'),
(253, 29, '2019-11-01 17:52:53', '86.55.219.8'),
(254, 39, '2019-11-01 19:22:47', '46.225.209.16'),
(255, 39, '2019-11-01 19:33:16', '46.225.209.16'),
(256, 39, '2019-11-01 19:33:48', '46.225.209.16'),
(257, 29, '2019-11-01 19:37:21', '46.225.209.16'),
(258, 39, '2019-11-01 19:45:36', '46.225.209.16'),
(259, 29, '2019-11-01 19:50:30', '46.225.209.16'),
(260, 29, '2019-11-01 19:52:03', '84.241.11.195'),
(261, 39, '2019-11-01 19:52:09', '31.56.189.102'),
(262, 29, '2019-11-01 20:02:35', '46.225.209.16'),
(263, 39, '2019-11-01 20:02:45', '46.225.209.16'),
(264, 29, '2019-11-01 21:14:50', '46.225.209.16'),
(265, 29, '2019-11-01 21:19:13', '46.225.209.16'),
(266, 29, '2019-11-01 21:33:41', '5.211.72.214'),
(267, 39, '2019-11-02 10:43:03', '37.129.61.114'),
(268, 29, '2019-11-02 10:48:03', '84.241.11.195'),
(269, 29, '2019-11-02 13:36:33', '104.237.226.177'),
(270, 39, '2019-11-02 16:45:10', '5.202.25.36'),
(271, 29, '2019-11-02 17:25:25', '46.225.209.180'),
(272, 29, '2019-11-03 10:03:51', '84.241.11.195'),
(273, 29, '2019-11-03 10:56:27', '84.241.11.195'),
(274, 29, '2019-11-03 18:36:43', '46.225.215.100'),
(275, 29, '2019-11-03 20:16:24', '46.225.215.100'),
(276, 39, '2019-11-04 09:44:33', '5.202.99.219'),
(277, 29, '2019-11-04 11:01:51', '84.241.11.195'),
(278, 29, '2019-11-04 11:37:59', '84.241.11.195'),
(279, 39, '2019-11-04 12:56:14', '5.202.99.219'),
(280, 39, '2019-11-04 13:56:35', '5.202.99.219'),
(281, 29, '2019-11-04 16:09:54', '84.241.11.195'),
(282, 29, '2019-11-04 16:13:32', '104.237.226.177'),
(283, 22, '2019-11-04 16:50:28', '93.119.212.157'),
(284, 22, '2019-11-05 08:13:20', '37.98.46.143'),
(285, 22, '2019-11-05 11:02:50', '37.98.46.143'),
(286, 29, '2019-11-05 11:44:53', '84.241.11.195'),
(287, 29, '2019-11-05 11:55:30', '104.237.226.177'),
(288, 22, '2019-11-05 13:27:11', '37.98.26.113'),
(289, 29, '2019-11-05 14:11:22', '2.177.176.236'),
(290, 29, '2019-11-05 15:11:48', '84.241.11.195'),
(291, 22, '2019-11-05 16:27:45', '37.98.26.113'),
(292, 22, '2019-11-05 16:35:39', '37.98.46.143'),
(293, 22, '2019-11-05 19:11:19', '37.98.26.113'),
(294, 39, '2019-11-05 22:09:13', '46.225.232.201'),
(295, 29, '2019-11-06 09:00:40', '188.229.76.241'),
(296, 22, '2019-11-06 10:17:27', '94.101.251.124'),
(297, 29, '2019-11-06 10:39:13', '5.113.84.67'),
(298, 29, '2019-11-06 13:38:44', '188.229.76.241'),
(299, 29, '2019-11-06 14:12:28', '46.225.232.201'),
(300, 29, '2019-11-06 15:20:44', '188.229.76.241'),
(301, 29, '2019-11-06 15:51:39', '5.113.84.67'),
(302, 29, '2019-11-06 15:55:25', '5.113.84.67'),
(303, 29, '2019-11-06 18:55:54', '188.229.1.172'),
(304, 5, '2019-11-06 19:05:23', '46.225.232.201'),
(305, 22, '2019-11-07 08:22:55', '185.182.221.246'),
(306, 22, '2019-11-07 09:02:54', '185.182.221.246'),
(307, 5, '2019-11-07 09:05:30', '46.225.212.182'),
(308, 22, '2019-11-07 09:19:26', '185.182.221.246'),
(309, 22, '2019-11-07 10:16:12', '185.182.221.246'),
(310, 29, '2019-11-07 10:30:09', '5.113.84.67'),
(311, 29, '2019-11-07 11:00:43', '5.113.84.67'),
(312, 29, '2019-11-07 11:03:52', '5.113.84.67'),
(313, 29, '2019-11-07 11:12:55', '188.229.27.16'),
(314, 29, '2019-11-07 11:15:11', '5.113.84.67'),
(315, 29, '2019-11-07 11:27:29', '84.241.11.195'),
(316, 22, '2019-11-07 11:27:49', '185.182.221.246'),
(317, 29, '2019-11-07 11:30:01', '5.113.84.67'),
(318, 29, '2019-11-07 11:49:10', '84.241.11.195'),
(319, 29, '2019-11-07 11:51:52', '84.241.11.195'),
(320, 22, '2019-11-07 11:56:16', '185.182.221.246'),
(321, 29, '2019-11-07 12:02:21', '46.51.66.203'),
(322, 29, '2019-11-07 12:07:14', '46.51.66.203'),
(323, 22, '2019-11-07 12:07:43', '185.182.221.246'),
(324, 22, '2019-11-07 12:16:57', '185.182.221.246'),
(325, 29, '2019-11-07 12:19:23', '5.119.233.171'),
(326, 22, '2019-11-07 13:11:16', '185.182.221.246'),
(327, 22, '2019-11-07 13:11:52', '178.131.95.254'),
(328, 29, '2019-11-07 14:16:33', '5.112.77.8'),
(329, 22, '2019-11-07 14:22:32', '5.119.233.171'),
(330, 22, '2019-11-07 14:32:04', '185.182.221.246'),
(331, 29, '2019-11-07 14:53:03', '5.112.77.8'),
(332, 29, '2019-11-07 15:30:12', '5.112.77.8'),
(333, 29, '2019-11-07 16:32:17', '5.119.233.171'),
(334, 29, '2019-11-07 17:58:17', '46.225.212.182'),
(335, 29, '2019-11-07 23:54:18', '46.224.97.211'),
(336, 29, '2019-11-08 10:17:03', '5.112.77.8'),
(337, 29, '2019-11-08 11:03:49', '5.112.77.8'),
(338, 5, '2019-11-08 11:19:36', '46.225.212.182'),
(339, 5, '2019-11-08 12:35:24', '46.225.212.182'),
(340, 29, '2019-11-08 12:37:11', '46.225.212.182'),
(341, 39, '2019-11-08 12:39:26', '46.225.212.182'),
(342, 39, '2019-11-08 12:39:49', '46.225.212.182'),
(343, 5, '2019-11-08 12:43:36', '46.225.212.182'),
(344, 29, '2019-11-08 12:45:06', '46.225.212.182'),
(345, 5, '2019-11-08 13:03:55', '46.225.212.182'),
(346, 29, '2019-11-08 13:07:06', '84.241.11.195'),
(347, 29, '2019-11-08 13:53:59', '84.241.11.195'),
(348, 29, '2019-11-08 14:06:47', '84.241.11.195'),
(349, 39, '2019-11-08 15:23:49', '5.202.99.219'),
(350, 29, '2019-11-08 17:26:07', '5.106.49.32'),
(351, 29, '2019-11-08 18:41:47', '46.224.97.211'),
(352, 39, '2019-11-08 18:47:00', '46.225.212.182'),
(353, 29, '2019-11-08 18:47:12', '46.225.212.182'),
(354, 5, '2019-11-08 19:01:55', '46.225.212.182'),
(355, 5, '2019-11-08 19:31:29', '46.225.212.182'),
(356, 29, '2019-11-08 20:14:54', '46.225.212.182'),
(357, 5, '2019-11-08 20:16:13', '46.225.212.182'),
(358, 29, '2019-11-08 20:34:48', '46.225.212.182'),
(359, 5, '2019-11-08 20:49:49', '46.225.212.182'),
(360, 29, '2019-11-08 21:32:28', '46.225.212.182'),
(361, 5, '2019-11-08 21:32:58', '46.225.212.182'),
(362, 29, '2019-11-08 23:41:57', '46.225.212.182'),
(363, 5, '2019-11-08 23:47:07', '46.225.212.182'),
(364, 39, '2019-11-09 09:08:03', '46.225.212.182'),
(365, 5, '2019-11-09 09:08:28', '46.225.212.182'),
(366, 22, '2019-11-09 09:45:36', '185.103.84.50'),
(367, 29, '2019-11-09 10:37:38', '84.241.11.195'),
(368, 22, '2019-11-09 13:20:50', '185.103.84.50'),
(369, 29, '2019-11-09 13:41:41', '2.177.176.236'),
(370, 29, '2019-11-09 13:57:43', '86.55.245.226'),
(371, 29, '2019-11-09 14:32:38', '2.177.176.236'),
(372, 5, '2019-11-09 14:54:32', '5.120.73.27'),
(373, 29, '2019-11-09 15:31:43', '84.241.11.195'),
(374, 29, '2019-11-09 18:15:43', '46.225.212.182'),
(375, 29, '2019-11-09 20:02:03', '91.251.176.22'),
(376, 22, '2019-11-10 08:12:10', '94.101.248.160'),
(377, 22, '2019-11-10 09:10:46', '94.101.248.160'),
(378, 29, '2019-11-10 10:37:32', '5.114.218.201'),
(379, 22, '2019-11-10 11:07:02', '94.101.248.160'),
(380, 5, '2019-11-10 12:06:05', '113.203.123.195'),
(381, 22, '2019-11-10 14:41:57', '94.101.248.160'),
(382, 5, '2019-11-10 15:31:57', '83.123.25.12'),
(383, 29, '2019-11-10 15:56:26', '5.114.218.201'),
(384, 29, '2019-11-10 16:00:39', '89.199.108.139'),
(385, 39, '2019-11-10 16:11:07', '5.202.99.219'),
(386, 5, '2019-11-10 17:43:23', '5.119.130.242'),
(387, 29, '2019-11-10 17:43:41', '5.119.130.242'),
(388, 5, '2019-11-10 18:19:36', '5.119.130.242'),
(389, 29, '2019-11-10 18:21:10', '5.119.130.242'),
(390, 22, '2019-11-11 07:54:50', '93.117.191.83'),
(391, 22, '2019-11-11 09:04:38', '93.117.191.83'),
(392, 22, '2019-11-11 10:19:37', '93.117.191.83'),
(393, 29, '2019-11-11 10:57:24', '84.241.11.195'),
(394, 22, '2019-11-11 11:07:23', '94.101.249.80'),
(395, 5, '2019-11-11 11:33:00', '5.120.73.27'),
(396, 29, '2019-11-11 13:06:10', '5.120.73.27'),
(397, 29, '2019-11-11 13:06:48', '5.120.73.27'),
(398, 22, '2019-11-11 14:00:43', '93.117.191.83'),
(399, 22, '2019-11-11 16:21:58', '93.117.191.83'),
(400, 22, '2019-11-11 18:58:34', '94.101.249.80'),
(401, 29, '2019-11-11 20:05:16', '84.241.11.195'),
(402, 29, '2019-11-11 21:39:00', '5.114.139.244'),
(403, 22, '2019-11-12 07:55:23', '94.101.255.33'),
(404, 22, '2019-11-12 09:04:58', '94.101.255.33'),
(405, 5, '2019-11-12 09:37:50', '5.120.73.27'),
(406, 39, '2019-11-12 10:03:49', '5.202.99.219'),
(407, 29, '2019-11-12 10:24:57', '5.114.139.244'),
(408, 29, '2019-11-12 11:21:08', '5.114.139.244'),
(409, 29, '2019-11-12 12:47:37', '5.114.139.244'),
(410, 22, '2019-11-12 12:47:47', '94.101.255.33'),
(411, 22, '2019-11-12 13:07:34', '94.101.248.212'),
(412, 29, '2019-11-12 13:34:25', '5.114.139.244'),
(413, 22, '2019-11-12 13:47:17', '94.101.255.33'),
(414, 22, '2019-11-12 15:04:02', '94.101.255.33'),
(415, 22, '2019-11-12 15:05:10', '94.101.248.212'),
(416, 29, '2019-11-12 15:13:06', '5.114.139.244'),
(417, 29, '2019-11-12 15:24:47', '104.237.226.135'),
(418, 39, '2019-11-12 15:39:01', '5.120.73.27'),
(419, 5, '2019-11-12 17:02:19', '5.120.73.27'),
(420, 5, '2019-11-12 20:13:19', '5.120.73.27'),
(421, 5, '2019-11-12 20:48:41', '5.120.73.27'),
(422, 29, '2019-11-13 09:57:52', '5.120.73.27'),
(423, 22, '2019-11-13 10:02:02', '93.117.188.6'),
(424, 22, '2019-11-13 10:06:17', '93.117.188.6'),
(425, 22, '2019-11-13 10:18:14', '94.101.250.178'),
(426, 29, '2019-11-13 10:32:56', '5.114.139.244'),
(427, 22, '2019-11-13 10:42:03', '94.101.250.178'),
(428, 22, '2019-11-13 11:35:23', '94.101.250.178'),
(429, 29, '2019-11-13 12:39:24', '2.177.204.73'),
(430, 22, '2019-11-13 12:41:43', '94.101.250.178'),
(431, 22, '2019-11-13 16:21:32', '94.101.250.178'),
(432, 22, '2019-11-14 07:33:19', '185.162.43.147'),
(433, 22, '2019-11-14 08:06:43', '185.162.43.147'),
(434, 22, '2019-11-14 10:06:58', '185.162.43.147'),
(435, 29, '2019-11-14 10:20:31', '5.114.139.244'),
(436, 22, '2019-11-14 11:23:17', '185.162.43.147'),
(437, 22, '2019-11-14 13:53:46', '185.162.43.147'),
(438, 29, '2019-11-14 16:08:21', '5.114.139.244'),
(439, 29, '2019-11-14 16:18:14', '5.114.139.244'),
(440, 29, '2019-11-14 16:26:27', '46.225.213.223'),
(441, 29, '2019-11-14 16:27:35', '5.114.139.244'),
(442, 29, '2019-11-14 16:28:42', '5.114.139.244'),
(443, 22, '2019-11-14 16:38:13', '185.162.43.147'),
(444, 22, '2019-11-14 18:07:41', '94.101.249.36'),
(445, 29, '2019-11-14 20:59:34', '46.225.213.223'),
(446, 29, '2019-11-14 21:58:30', '84.241.11.195'),
(447, 29, '2019-11-15 11:02:17', '5.114.139.244'),
(448, 29, '2019-11-15 19:34:30', '185.44.78.101'),
(449, 5, '2019-11-15 21:25:08', '46.225.213.223'),
(450, 29, '2019-11-15 21:29:01', '46.225.213.223'),
(451, 29, '2019-11-15 21:29:11', '46.225.213.223'),
(452, 5, '2019-11-15 21:29:20', '46.225.213.223'),
(453, 22, '2019-11-16 07:48:00', '188.212.241.115'),
(454, 22, '2019-11-16 09:04:55', '188.212.241.115'),
(455, 22, '2019-11-16 09:48:22', '188.212.241.115'),
(456, 22, '2019-11-16 11:14:23', '188.212.241.115'),
(457, 22, '2019-11-16 11:30:55', '94.101.255.17'),
(458, 22, '2019-11-16 14:47:30', '93.117.177.19'),
(459, 22, '2019-11-16 17:40:17', '93.117.177.19'),
(460, 29, '2019-11-17 10:05:40', '5.117.115.187'),
(461, 29, '2019-11-17 11:09:05', '109.125.170.205'),
(462, 29, '2019-11-17 11:48:25', '109.125.170.205'),
(463, 29, '2019-11-17 11:51:54', '5.117.115.187'),
(464, 29, '2019-11-17 11:56:51', '2.177.204.73'),
(465, 29, '2019-11-17 11:58:15', '109.125.170.205'),
(466, 29, '2019-11-17 12:11:24', '2.177.204.73'),
(467, 29, '2019-11-17 12:58:48', '5.117.115.187'),
(468, 39, '2019-11-17 13:32:32', '5.202.19.73'),
(469, 39, '2019-11-17 13:32:53', '5.202.19.73'),
(470, 29, '2019-11-17 13:58:19', '5.117.115.187'),
(471, 29, '2019-11-17 14:38:21', '2.177.204.73'),
(472, 29, '2019-11-17 16:34:39', '5.117.115.187'),
(473, 29, '2019-11-17 17:44:06', '46.224.91.140'),
(474, 29, '2019-11-17 17:44:58', '46.224.91.140'),
(475, 29, '2019-11-17 19:44:03', '5.117.115.187'),
(476, 5, '2019-11-18 08:54:48', '109.125.170.205'),
(477, 29, '2019-11-18 08:55:54', '109.125.170.205'),
(478, 29, '2019-11-18 10:17:24', '5.117.115.187'),
(479, 22, '2019-11-18 10:55:19', '93.117.187.201'),
(480, 22, '2019-11-18 11:21:47', '62.102.132.161'),
(481, 29, '2019-11-18 11:36:12', '5.117.115.187'),
(482, 22, '2019-11-18 12:13:32', '62.102.132.161'),
(483, 22, '2019-11-18 12:30:08', '62.102.132.161'),
(484, 22, '2019-11-18 14:03:38', '62.102.132.161'),
(485, 29, '2019-11-18 14:55:03', '5.117.115.187'),
(486, 22, '2019-11-18 15:54:08', '93.119.213.208'),
(487, 29, '2019-11-18 17:43:46', '5.119.42.159'),
(488, 22, '2019-11-18 18:03:36', '93.119.213.208'),
(489, 29, '2019-11-18 20:04:09', '5.117.115.187'),
(490, 45, '2019-11-18 21:17:45', '46.225.213.223'),
(491, 5, '2019-11-19 09:58:59', '86.57.75.187'),
(492, 29, '2019-11-19 10:03:45', '86.57.75.187'),
(493, 29, '2019-11-19 10:17:23', '5.117.115.187'),
(494, 39, '2019-11-19 10:50:35', '86.57.75.187'),
(495, 29, '2019-11-19 11:32:28', '86.57.75.187'),
(496, 29, '2019-11-19 11:50:29', '5.117.115.187'),
(497, 29, '2019-11-19 13:16:55', '2.177.204.73'),
(498, 29, '2019-11-19 15:00:28', '5.117.115.187'),
(499, 39, '2019-11-19 16:31:35', '5.202.30.249'),
(500, 22, '2019-11-19 17:36:53', '93.117.177.150'),
(501, 29, '2019-11-19 18:31:05', '86.57.75.187'),
(502, 29, '2019-11-19 18:32:00', '204.18.229.155'),
(503, 29, '2019-11-19 20:23:03', '86.57.75.187'),
(504, 29, '2019-11-19 20:58:25', '86.57.75.187'),
(505, 5, '2019-11-19 21:06:53', '86.57.75.187'),
(506, 29, '2019-11-19 21:24:27', '5.117.115.187'),
(507, 29, '2019-11-19 21:26:08', '86.57.75.187'),
(508, 29, '2019-11-19 21:26:12', '5.117.115.187'),
(509, 29, '2019-11-19 23:09:12', '89.199.33.36'),
(510, 22, '2019-11-20 09:18:57', '93.119.220.126'),
(511, 29, '2019-11-20 09:50:58', '86.57.75.187'),
(512, 29, '2019-11-20 10:03:17', '86.57.75.187'),
(513, 5, '2019-11-20 10:03:23', '86.57.75.187'),
(514, 29, '2019-11-20 10:23:29', '86.57.75.187'),
(515, 29, '2019-11-20 10:31:11', '5.117.115.187'),
(516, 5, '2019-11-20 10:34:55', '86.57.75.187'),
(517, 22, '2019-11-20 11:46:00', '93.119.223.193'),
(518, 29, '2019-11-20 12:28:00', '86.57.75.187'),
(519, 22, '2019-11-20 13:06:57', '93.119.220.126'),
(520, 22, '2019-11-20 13:14:32', '93.119.223.193'),
(521, 5, '2019-11-20 14:26:46', '86.57.75.187'),
(522, 22, '2019-11-20 14:54:34', '93.119.223.193'),
(523, 5, '2019-11-20 15:09:48', '86.57.75.187'),
(524, 29, '2019-11-20 16:34:16', '5.117.115.187'),
(525, 22, '2019-11-20 16:34:41', '93.119.223.193'),
(526, 5, '2019-11-20 17:09:46', '86.57.75.187'),
(527, 29, '2019-11-20 17:12:08', '86.57.75.187'),
(528, 5, '2019-11-20 18:08:40', '46.225.212.232'),
(529, 29, '2019-11-20 18:44:45', '46.224.91.140'),
(530, 29, '2019-11-20 18:45:06', '46.224.91.140'),
(531, 29, '2019-11-20 19:33:48', '46.225.212.232'),
(532, 5, '2019-11-20 19:38:40', '46.225.212.232'),
(533, 29, '2019-11-20 19:51:53', '188.229.35.24'),
(534, 5, '2019-11-21 08:12:03', '46.225.212.232'),
(535, 5, '2019-11-21 09:02:28', '86.57.75.187'),
(536, 22, '2019-11-21 09:11:07', '93.119.215.96'),
(537, 29, '2019-11-21 09:30:54', '86.57.75.187'),
(538, 5, '2019-11-21 09:32:26', '86.57.75.187'),
(539, 29, '2019-11-21 10:16:26', '5.117.115.187'),
(540, 5, '2019-11-21 12:09:08', '86.57.75.187'),
(541, 29, '2019-11-21 13:55:42', '46.225.212.232'),
(542, 22, '2019-11-21 14:13:11', '93.119.215.96'),
(543, 22, '2019-11-21 14:15:13', '93.119.215.96'),
(544, 5, '2019-11-21 14:25:02', '46.225.212.232'),
(545, 29, '2019-11-21 14:37:45', '46.224.91.140'),
(546, 29, '2019-11-21 14:45:22', '46.225.212.232'),
(547, 29, '2019-11-21 15:17:57', '86.55.248.144'),
(548, 22, '2019-11-21 15:22:31', '93.119.215.96'),
(549, 29, '2019-11-21 17:30:01', '204.18.85.101'),
(550, 29, '2019-11-21 18:11:46', '46.225.212.232'),
(551, 29, '2019-11-21 18:15:18', '46.224.116.2'),
(552, 29, '2019-11-21 19:37:29', '46.225.212.232'),
(553, 29, '2019-11-21 20:31:43', '91.99.35.87'),
(554, 29, '2019-11-21 21:01:36', '46.225.212.232'),
(555, 29, '2019-11-21 21:29:34', '46.224.116.2'),
(556, 29, '2019-11-21 21:29:34', '46.224.116.2'),
(557, 29, '2019-11-21 22:21:02', '37.98.58.21'),
(558, 5, '2019-11-21 22:23:13', '46.225.212.232'),
(559, 29, '2019-11-21 22:31:12', '46.224.116.2'),
(560, 5, '2019-11-21 23:50:47', '46.225.212.232'),
(561, 29, '2019-11-22 10:26:11', '5.117.115.187'),
(562, 29, '2019-11-22 10:44:42', '46.225.209.100'),
(563, 5, '2019-11-22 10:44:58', '46.225.209.100'),
(564, 29, '2019-11-22 11:25:21', '46.225.209.100'),
(565, 5, '2019-11-22 11:26:16', '46.225.209.100'),
(566, 29, '2019-11-22 13:02:35', '5.117.115.187'),
(567, 29, '2019-11-22 15:12:36', '46.225.209.100'),
(568, 29, '2019-11-22 15:58:53', '89.196.127.122'),
(569, 29, '2019-11-22 17:43:56', '46.225.215.151'),
(570, 39, '2019-11-22 17:45:39', '46.225.215.151'),
(571, 29, '2019-11-22 17:52:59', '89.198.154.123'),
(572, 29, '2019-11-22 18:42:08', '46.225.215.151'),
(573, 29, '2019-11-22 19:59:46', '46.225.215.151'),
(574, 29, '2019-11-22 20:16:36', '5.117.115.187'),
(575, 29, '2019-11-22 21:51:28', '46.224.60.52'),
(576, 29, '2019-11-22 21:59:09', '188.229.17.176'),
(577, 22, '2019-11-23 10:18:20', '185.103.87.244'),
(578, 5, '2019-11-23 11:04:05', '86.57.43.59'),
(579, 29, '2019-11-23 11:36:26', '5.117.115.187'),
(580, 22, '2019-11-23 11:47:36', '185.182.222.235'),
(581, 22, '2019-11-23 13:42:33', '185.182.222.235'),
(582, 29, '2019-11-23 14:27:23', '91.98.40.6'),
(583, 22, '2019-11-23 14:39:09', '185.182.222.235'),
(584, 5, '2019-11-23 15:14:27', '86.57.43.59'),
(585, 29, '2019-11-23 15:33:35', '86.57.43.59'),
(586, 22, '2019-11-23 16:59:23', '178.131.65.50'),
(587, 29, '2019-11-23 17:00:28', '5.119.129.0'),
(588, 22, '2019-11-23 17:14:40', '94.101.250.244'),
(589, 29, '2019-11-23 17:33:38', '5.117.115.187'),
(590, 22, '2019-11-23 18:14:40', '94.101.250.244'),
(591, 29, '2019-11-23 18:53:03', '46.166.184.152'),
(592, 29, '2019-11-23 19:22:33', '5.113.20.65'),
(593, 29, '2019-11-23 19:56:49', '46.166.184.152'),
(594, 29, '2019-11-23 23:36:36', '46.224.60.52'),
(595, 22, '2019-11-24 08:49:33', '94.101.248.168'),
(596, 29, '2019-11-24 10:04:21', '5.117.115.187'),
(597, 29, '2019-11-24 10:18:34', '86.57.11.137'),
(598, 5, '2019-11-24 11:09:08', '5.113.6.218'),
(599, 29, '2019-11-24 11:15:00', '5.117.115.187'),
(600, 22, '2019-11-24 12:28:11', '94.101.248.168'),
(601, 22, '2019-11-24 13:35:55', '94.101.248.168'),
(602, 29, '2019-11-24 13:36:36', '5.113.6.218'),
(603, 22, '2019-11-24 13:40:50', '94.101.248.168'),
(604, 5, '2019-11-24 13:55:22', '86.57.60.164'),
(605, 29, '2019-11-24 14:01:41', '5.117.115.187'),
(606, 29, '2019-11-24 14:47:23', '2.177.201.102'),
(607, 29, '2019-11-24 14:52:18', '37.59.140.71'),
(608, 22, '2019-11-24 15:06:09', '178.131.65.50'),
(609, 29, '2019-11-24 15:10:55', '2.177.201.102'),
(610, 22, '2019-11-24 15:17:06', '5.113.6.218'),
(611, 22, '2019-11-24 16:00:58', '94.101.248.168'),
(612, 29, '2019-11-24 17:45:19', '46.225.215.151'),
(613, 47, '2019-11-24 20:05:37', '46.225.215.151'),
(614, 47, '2019-11-24 20:06:41', '164.138.141.234'),
(615, 47, '2019-11-24 20:08:07', '164.138.141.234'),
(616, 47, '2019-11-24 20:08:08', '164.138.141.234'),
(617, 47, '2019-11-24 20:08:43', '164.138.141.234'),
(618, 47, '2019-11-24 20:08:45', '164.138.141.234'),
(619, 47, '2019-11-24 20:09:21', '164.138.141.234'),
(620, 47, '2019-11-24 20:09:22', '164.138.141.234'),
(621, 47, '2019-11-24 20:15:56', '164.138.141.234'),
(622, 47, '2019-11-24 20:18:09', '164.138.141.234'),
(623, 29, '2019-11-24 20:33:05', '46.225.215.151'),
(624, 22, '2019-11-25 08:52:38', '62.102.128.210'),
(625, 5, '2019-11-25 09:20:51', '86.57.70.175'),
(626, 29, '2019-11-25 09:21:16', '86.57.70.175'),
(627, 5, '2019-11-25 09:48:37', '86.57.70.175'),
(628, 29, '2019-11-25 10:39:42', '5.116.4.113'),
(629, 22, '2019-11-25 11:58:32', '93.117.177.10'),
(630, 22, '2019-11-25 12:21:57', '62.102.128.210'),
(631, 29, '2019-11-25 12:51:28', '81.91.149.83'),
(632, 22, '2019-11-25 13:44:22', '62.102.128.210'),
(633, 22, '2019-11-25 15:55:48', '62.102.128.210'),
(634, 29, '2019-11-25 16:00:24', '84.241.11.195'),
(635, 22, '2019-11-25 17:00:26', '62.102.128.210'),
(636, 5, '2019-11-25 17:08:37', '5.113.7.71'),
(637, 5, '2019-11-25 17:28:34', '46.225.215.151'),
(638, 29, '2019-11-25 17:45:48', '46.225.215.151'),
(639, 29, '2019-11-25 19:54:16', '5.116.4.113'),
(640, 29, '2019-11-25 20:02:17', '5.113.22.65'),
(641, 5, '2019-11-25 20:02:56', '5.113.22.65'),
(642, 5, '2019-11-25 20:40:42', '5.113.22.65'),
(643, 29, '2019-11-25 20:51:39', '46.224.60.52'),
(644, 5, '2019-11-25 22:03:36', '5.113.22.65'),
(645, 29, '2019-11-25 22:04:32', '46.224.60.52'),
(646, 29, '2019-11-26 00:21:27', '46.224.60.52'),
(647, 29, '2019-11-26 10:31:13', '89.163.206.22'),
(648, 29, '2019-11-26 10:45:28', '5.116.4.113'),
(649, 29, '2019-11-26 11:15:22', '89.163.206.22'),
(650, 29, '2019-11-26 11:46:38', '89.163.206.22'),
(651, 5, '2019-11-26 12:15:40', '109.125.158.153'),
(652, 22, '2019-11-26 12:15:57', '185.182.223.96'),
(653, 29, '2019-11-26 12:57:21', '5.116.4.113'),
(654, 29, '2019-11-26 12:57:44', '5.116.4.113'),
(655, 29, '2019-11-26 12:58:16', '5.116.4.113'),
(656, 29, '2019-11-26 12:58:37', '5.116.4.113'),
(657, 29, '2019-11-26 12:59:01', '5.116.4.113'),
(658, 29, '2019-11-26 12:59:24', '5.116.4.113'),
(659, 29, '2019-11-26 12:59:45', '5.116.4.113'),
(660, 29, '2019-11-26 13:00:14', '5.116.4.113'),
(661, 29, '2019-11-26 13:00:32', '204.18.199.72'),
(662, 29, '2019-11-26 13:00:43', '2.177.201.102'),
(663, 29, '2019-11-26 13:00:49', '5.116.4.113'),
(664, 5, '2019-11-26 13:01:32', '109.125.158.153'),
(665, 29, '2019-11-26 13:02:23', '2.177.201.102'),
(666, 35, '2019-11-26 13:03:07', '5.116.4.113'),
(667, 29, '2019-11-26 13:03:59', '2.177.201.102'),
(668, 29, '2019-11-26 13:04:31', '2.177.201.102'),
(669, 29, '2019-11-26 13:05:53', '5.116.4.113'),
(670, 29, '2019-11-26 13:06:15', '89.163.206.22'),
(671, 22, '2019-11-26 13:24:37', '185.182.223.96'),
(672, 22, '2019-11-26 14:36:04', '185.182.223.96'),
(673, 22, '2019-11-26 14:49:38', '185.182.223.96'),
(674, 22, '2019-11-26 17:50:58', '185.182.223.96'),
(675, 39, '2019-11-26 18:04:13', '5.202.30.249'),
(676, 22, '2019-11-26 18:06:10', '185.182.223.96'),
(677, 39, '2019-11-26 18:14:01', '83.123.62.165'),
(678, 39, '2019-11-26 18:21:58', '5.202.30.249'),
(679, 39, '2019-11-26 19:24:59', '5.202.30.249'),
(680, 29, '2019-11-27 09:57:21', '5.116.4.113'),
(681, 29, '2019-11-27 09:59:23', '2.177.201.102'),
(682, 5, '2019-11-27 10:08:30', '109.125.158.153'),
(683, 29, '2019-11-27 10:19:16', '109.125.158.153'),
(684, 29, '2019-11-27 10:20:56', '2.177.201.102'),
(685, 39, '2019-11-27 10:23:05', '109.125.158.153'),
(686, 22, '2019-11-27 10:35:04', '185.182.223.96'),
(687, 22, '2019-11-27 11:42:27', '185.182.223.96'),
(688, 22, '2019-11-27 12:00:22', '62.102.140.61'),
(689, 5, '2019-11-27 12:18:17', '109.125.158.153'),
(690, 5, '2019-11-27 12:18:48', '109.125.158.153'),
(691, 29, '2019-11-27 13:48:32', '5.78.194.243'),
(692, 22, '2019-11-27 13:55:09', '185.182.223.96'),
(693, 5, '2019-11-27 14:19:19', '109.125.158.153'),
(694, 29, '2019-11-27 14:53:38', '5.78.194.243'),
(695, 29, '2019-11-27 15:16:10', '2.177.201.102'),
(696, 29, '2019-11-27 15:24:11', '5.116.4.113'),
(697, 22, '2019-11-27 16:38:59', '185.182.223.96'),
(698, 29, '2019-11-27 17:25:39', '2.177.201.102'),
(699, 29, '2019-11-27 18:37:37', '5.116.4.113'),
(700, 29, '2019-11-27 18:40:38', '5.116.4.113'),
(701, 22, '2019-11-27 19:05:37', '62.102.140.61'),
(702, 22, '2019-11-28 09:03:37', '62.102.134.48'),
(703, 22, '2019-11-28 09:38:12', '62.102.134.48'),
(704, 29, '2019-11-28 10:35:44', '5.116.4.113'),
(705, 49, '2019-11-28 12:04:04', '188.211.158.245'),
(706, 5, '2019-11-28 12:04:17', '5.120.115.154'),
(707, 49, '2019-11-28 12:04:54', '5.120.115.154'),
(708, 49, '2019-11-28 12:07:52', '188.211.158.245'),
(709, 29, '2019-11-28 12:14:36', '5.116.4.113'),
(710, 22, '2019-11-28 12:19:39', '62.102.134.48'),
(711, 22, '2019-11-28 12:36:46', '37.98.61.121'),
(712, 22, '2019-11-28 14:27:51', '62.102.134.48'),
(713, 29, '2019-11-28 14:33:33', '5.116.4.113'),
(714, 22, '2019-11-28 15:08:21', '62.102.134.48'),
(715, 50, '2019-11-28 15:42:34', '188.212.242.219'),
(716, 22, '2019-11-28 15:46:01', '37.98.61.121'),
(717, 29, '2019-11-28 16:40:31', '5.116.4.113'),
(718, 29, '2019-11-28 17:55:51', '5.116.4.113'),
(719, 29, '2019-11-28 19:36:09', '46.225.215.151'),
(720, 22, '2019-11-28 19:37:34', '46.225.215.151'),
(721, 29, '2019-11-28 20:54:52', '46.225.215.151'),
(722, 29, '2019-11-28 21:23:20', '188.212.243.97'),
(723, 29, '2019-11-28 21:36:51', '46.225.215.151'),
(724, 5, '2019-11-28 22:41:52', '46.225.215.151'),
(725, 29, '2019-11-29 11:13:11', '5.116.4.113'),
(726, 29, '2019-11-29 12:35:54', '5.116.4.113'),
(727, 49, '2019-11-29 12:45:14', '188.211.148.145'),
(728, 39, '2019-11-29 13:26:36', '86.57.59.54'),
(729, 29, '2019-11-29 13:36:28', '46.224.117.14'),
(730, 29, '2019-11-29 15:10:48', '5.116.4.113'),
(731, 29, '2019-11-29 16:21:46', '81.91.149.83'),
(732, 29, '2019-11-29 17:43:06', '46.225.215.151'),
(733, 29, '2019-11-29 17:58:48', '5.116.4.113'),
(734, 29, '2019-11-29 19:01:32', '5.116.4.113'),
(735, 29, '2019-11-29 19:12:56', '81.91.149.83'),
(736, 29, '2019-11-29 21:40:39', '46.225.232.239'),
(737, 5, '2019-11-29 22:49:07', '46.225.232.239'),
(738, 22, '2019-11-30 07:50:39', '178.131.79.101'),
(739, 22, '2019-11-30 08:17:32', '178.131.79.101'),
(740, 29, '2019-11-30 08:29:52', '46.225.232.239'),
(741, 22, '2019-11-30 09:13:11', '188.212.244.115'),
(742, 22, '2019-11-30 09:23:25', '178.131.79.101'),
(743, 29, '2019-11-30 10:06:05', '5.116.4.113'),
(744, 22, '2019-11-30 10:51:09', '178.131.79.101'),
(745, 29, '2019-11-30 12:04:41', '5.116.4.113'),
(746, 5, '2019-11-30 12:05:25', '83.123.4.156'),
(747, 22, '2019-11-30 12:15:38', '178.131.79.101'),
(748, 29, '2019-11-30 12:57:22', '5.78.153.238'),
(749, 29, '2019-11-30 13:36:13', '5.116.4.113'),
(750, 29, '2019-11-30 14:25:51', '5.78.153.238'),
(751, 29, '2019-11-30 15:09:43', '5.112.142.74'),
(752, 22, '2019-11-30 15:15:44', '188.212.244.115'),
(753, 29, '2019-11-30 15:24:53', '5.112.142.74'),
(754, 29, '2019-11-30 15:46:13', '5.112.142.74'),
(755, 22, '2019-11-30 16:01:00', '178.131.79.101'),
(756, 22, '2019-11-30 17:15:35', '188.212.244.115'),
(757, 29, '2019-11-30 18:34:06', '5.112.142.74'),
(758, 29, '2019-11-30 19:29:38', '5.112.142.74'),
(759, 29, '2019-11-30 21:01:53', '5.114.21.97'),
(760, 29, '2019-11-30 21:18:21', '5.78.153.238'),
(761, 39, '2019-12-01 07:27:25', '5.202.30.249'),
(762, 22, '2019-12-01 07:51:31', '178.131.166.110'),
(763, 5, '2019-12-01 10:26:43', '5.120.185.18'),
(764, 22, '2019-12-01 10:49:45', '178.131.166.110'),
(765, 29, '2019-12-01 11:04:58', '5.113.176.83'),
(766, 29, '2019-12-01 11:47:53', '5.120.185.18'),
(767, 5, '2019-12-01 11:52:52', '5.120.185.18'),
(768, 29, '2019-12-01 11:58:22', '5.209.186.246'),
(769, 29, '2019-12-01 13:11:01', '5.120.185.18'),
(770, 22, '2019-12-01 13:38:28', '178.131.166.110'),
(771, 5, '2019-12-01 13:38:33', '5.120.185.18'),
(772, 29, '2019-12-01 13:53:31', '2.177.201.102'),
(773, 29, '2019-12-01 13:53:35', '5.120.185.18'),
(774, 5, '2019-12-01 14:07:59', '5.120.185.18'),
(775, 5, '2019-12-01 14:50:57', '192.99.253.181'),
(776, 5, '2019-12-01 15:33:30', '5.120.185.18'),
(777, 22, '2019-12-01 16:21:30', '178.131.191.91'),
(778, 22, '2019-12-01 16:34:09', '178.131.166.110'),
(779, 29, '2019-12-01 18:48:55', '5.113.176.83'),
(780, 29, '2019-12-01 19:34:09', '172.80.194.215'),
(781, 5, '2019-12-01 21:01:25', '86.57.59.54'),
(782, 29, '2019-12-01 21:02:12', '86.57.59.54'),
(783, 5, '2019-12-01 21:35:17', '86.57.59.54'),
(784, 29, '2019-12-01 22:44:19', '91.251.181.114'),
(785, 29, '2019-12-01 23:00:30', '46.225.232.239'),
(786, 5, '2019-12-01 23:00:39', '46.225.232.239'),
(787, 29, '2019-12-01 23:04:25', '91.251.181.114'),
(788, 5, '2019-12-02 09:29:04', '86.57.59.54'),
(789, 29, '2019-12-02 10:02:21', '5.113.176.83'),
(790, 22, '2019-12-02 10:25:09', '178.131.241.16'),
(791, 29, '2019-12-02 11:02:31', '89.199.252.83'),
(792, 5, '2019-12-02 11:36:26', '86.57.59.54'),
(793, 29, '2019-12-02 11:53:16', '5.113.176.83'),
(794, 52, '2019-12-02 12:17:46', '31.59.218.170'),
(795, 52, '2019-12-02 12:18:43', '31.59.218.170'),
(796, 52, '2019-12-02 12:20:30', '86.57.59.54'),
(797, 52, '2019-12-02 12:27:34', '31.59.218.170'),
(798, 52, '2019-12-02 12:28:49', '31.59.218.170'),
(799, 22, '2019-12-02 12:41:28', '178.131.241.16'),
(800, 5, '2019-12-02 12:52:59', '86.57.59.54'),
(801, 29, '2019-12-02 13:26:30', '5.113.176.83'),
(802, 29, '2019-12-02 13:52:51', '5.208.76.161'),
(803, 29, '2019-12-02 15:59:31', '5.113.176.83'),
(804, 29, '2019-12-02 16:06:42', '46.225.232.239'),
(805, 29, '2019-12-02 16:25:16', '5.113.176.83'),
(806, 29, '2019-12-02 16:41:42', '5.113.176.83'),
(807, 22, '2019-12-02 17:08:08', '178.131.241.16'),
(808, 29, '2019-12-02 21:02:20', '5.209.141.5'),
(809, 29, '2019-12-02 21:07:54', '185.125.204.69'),
(810, 29, '2019-12-02 21:14:31', '46.225.232.239'),
(811, 5, '2019-12-02 21:18:21', '46.225.232.239'),
(812, 5, '2019-12-02 22:09:23', '46.225.232.239'),
(813, 5, '2019-12-02 23:40:25', '46.225.232.239'),
(814, 22, '2019-12-03 07:54:39', '62.102.128.31'),
(815, 22, '2019-12-03 09:05:18', '62.102.128.31'),
(816, 5, '2019-12-03 09:26:09', '46.225.232.239'),
(817, 29, '2019-12-03 10:11:56', '5.113.176.83'),
(818, 29, '2019-12-03 12:41:32', '5.113.176.83'),
(819, 54, '2019-12-03 12:46:51', '86.57.72.184'),
(820, 22, '2019-12-03 13:07:29', '62.102.128.31'),
(821, 29, '2019-12-03 13:15:03', '2.177.201.102'),
(822, 56, '2019-12-03 14:24:59', '5.127.28.105'),
(823, 29, '2019-12-03 14:59:09', '5.113.176.83'),
(824, 46, '2019-12-03 15:03:44', '151.235.253.176'),
(825, 22, '2019-12-03 15:06:11', '62.102.128.31'),
(826, 29, '2019-12-03 15:46:33', '5.113.176.83'),
(827, 29, '2019-12-03 15:52:22', '5.212.180.9'),
(828, 22, '2019-12-03 16:09:48', '62.102.128.31'),
(829, 29, '2019-12-03 16:17:44', '5.113.176.83'),
(830, 22, '2019-12-03 16:32:58', '94.101.248.38'),
(831, 22, '2019-12-03 17:07:31', '62.102.128.31'),
(832, 29, '2019-12-03 17:58:17', '104.237.225.11'),
(833, 29, '2019-12-03 17:58:53', '104.237.225.11'),
(834, 22, '2019-12-03 18:29:33', '62.102.128.31'),
(835, 29, '2019-12-03 19:05:56', '5.113.176.83'),
(836, 29, '2019-12-03 20:27:02', '91.99.28.198'),
(837, 29, '2019-12-03 20:27:56', '5.120.9.198'),
(838, 5, '2019-12-03 20:36:43', '5.119.134.56'),
(839, 22, '2019-12-03 23:06:56', '5.119.134.56'),
(840, 5, '2019-12-04 00:10:28', '5.120.148.219'),
(841, 22, '2019-12-04 07:44:09', '62.102.140.254'),
(842, 29, '2019-12-04 09:00:37', '5.120.148.219'),
(843, 5, '2019-12-04 09:00:46', '5.120.148.219'),
(844, 29, '2019-12-04 09:55:27', '5.113.176.83'),
(845, 29, '2019-12-04 11:30:35', '109.125.172.9'),
(846, 29, '2019-12-04 11:32:21', '5.113.176.83'),
(847, 22, '2019-12-04 11:33:56', '62.102.140.254'),
(848, 29, '2019-12-04 11:37:07', '91.99.28.198'),
(849, 5, '2019-12-04 12:04:34', '104.237.226.137'),
(850, 29, '2019-12-04 12:04:43', '104.237.226.137'),
(851, 29, '2019-12-04 12:24:48', '5.113.176.83'),
(852, 22, '2019-12-04 12:26:16', '62.102.140.254'),
(853, 29, '2019-12-04 14:04:16', '109.125.172.9'),
(854, 29, '2019-12-04 15:54:04', '5.113.176.83'),
(855, 29, '2019-12-04 16:36:50', '5.113.176.83'),
(856, 22, '2019-12-04 16:46:16', '62.102.140.254'),
(857, 29, '2019-12-04 17:21:17', '109.125.172.9'),
(858, 5, '2019-12-04 17:34:10', '109.125.172.9'),
(859, 29, '2019-12-04 17:42:40', '5.113.176.83'),
(860, 29, '2019-12-04 20:01:50', '5.120.148.219'),
(861, 5, '2019-12-04 20:02:19', '5.120.148.219'),
(862, 29, '2019-12-04 20:09:33', '5.113.176.83'),
(863, 29, '2019-12-04 21:14:49', '151.80.62.231'),
(864, 5, '2019-12-04 23:50:22', '5.120.148.219'),
(865, 29, '2019-12-05 01:10:16', '5.120.148.219'),
(866, 5, '2019-12-05 01:10:29', '5.120.148.219'),
(867, 22, '2019-12-05 08:41:26', '62.102.138.82'),
(868, 29, '2019-12-05 10:39:21', '5.113.176.83'),
(869, 22, '2019-12-05 11:25:36', '62.102.138.82'),
(870, 39, '2019-12-05 14:19:03', '31.56.186.39'),
(871, 39, '2019-12-05 14:21:16', '31.56.186.39'),
(872, 22, '2019-12-05 14:28:16', '185.136.103.102'),
(873, 39, '2019-12-05 14:53:26', '31.56.186.39'),
(874, 22, '2019-12-05 15:05:33', '185.136.103.102'),
(875, 22, '2019-12-05 15:26:46', '62.102.138.82'),
(876, 22, '2019-12-05 16:26:36', '62.102.138.82'),
(877, 39, '2019-12-05 17:30:57', '31.56.186.39'),
(878, 29, '2019-12-05 17:31:59', '46.224.58.87'),
(879, 29, '2019-12-05 17:33:19', '46.224.58.87'),
(880, 29, '2019-12-05 17:41:04', '46.225.232.239'),
(881, 29, '2019-12-05 20:09:56', '151.242.110.121'),
(882, 29, '2019-12-05 20:17:12', '46.225.232.239'),
(883, 39, '2019-12-05 20:20:11', '46.225.232.239'),
(884, 29, '2019-12-05 21:40:21', '5.113.176.83'),
(885, 29, '2019-12-06 10:03:34', '5.113.176.83'),
(886, 29, '2019-12-06 11:13:14', '31.56.216.50'),
(887, 5, '2019-12-06 11:15:57', '31.56.216.50'),
(888, 29, '2019-12-06 11:23:19', '5.113.176.83'),
(889, 29, '2019-12-06 11:33:40', '31.56.216.50'),
(890, 5, '2019-12-06 11:40:24', '31.56.216.50'),
(891, 5, '2019-12-06 11:42:10', '31.56.216.50'),
(892, 29, '2019-12-06 12:11:48', '5.113.176.83'),
(893, 29, '2019-12-06 13:12:38', '91.99.57.83'),
(894, 29, '2019-12-06 13:30:39', '5.113.176.83'),
(895, 29, '2019-12-06 15:04:11', '5.113.176.83'),
(896, 29, '2019-12-06 17:56:58', '188.229.69.106'),
(897, 29, '2019-12-06 18:26:14', '81.91.149.83'),
(898, 29, '2019-12-06 20:11:44', '5.113.176.83'),
(899, 29, '2019-12-06 20:27:14', '81.91.149.83'),
(900, 29, '2019-12-06 21:20:38', '89.219.102.19'),
(901, 29, '2019-12-06 22:09:11', '204.18.140.78'),
(902, 22, '2019-12-07 08:24:32', '185.103.85.122'),
(903, 29, '2019-12-07 10:21:04', '5.114.217.181'),
(904, 29, '2019-12-07 10:21:22', '5.114.217.181'),
(905, 29, '2019-12-07 10:26:52', '46.166.184.152'),
(906, 22, '2019-12-07 11:11:55', '94.101.252.205'),
(907, 29, '2019-12-07 11:38:13', '86.57.38.52'),
(908, 29, '2019-12-07 11:38:25', '46.166.184.152'),
(909, 29, '2019-12-07 11:49:51', '46.166.184.152'),
(910, 29, '2019-12-07 14:20:21', '31.2.223.44'),
(911, 29, '2019-12-07 14:45:53', '91.99.57.83'),
(912, 29, '2019-12-07 14:48:03', '46.225.232.239'),
(913, 22, '2019-12-07 14:58:58', '94.101.252.205'),
(914, 5, '2019-12-07 15:03:38', '46.225.232.239'),
(915, 22, '2019-12-07 15:41:11', '94.101.252.205'),
(916, 29, '2019-12-07 16:13:45', '5.114.217.181'),
(917, 39, '2019-12-07 16:19:40', '5.202.98.221'),
(918, 22, '2019-12-07 16:58:15', '94.101.252.205'),
(919, 29, '2019-12-07 17:27:42', '31.2.223.44'),
(920, 29, '2019-12-07 17:31:38', '5.119.137.224'),
(921, 5, '2019-12-07 17:32:46', '5.119.137.224'),
(922, 29, '2019-12-07 17:33:47', '5.114.217.181'),
(923, 29, '2019-12-07 17:34:06', '5.119.137.224'),
(924, 5, '2019-12-07 17:50:10', '5.119.137.224'),
(925, 22, '2019-12-07 17:53:56', '94.101.252.205'),
(926, 29, '2019-12-07 17:58:01', '5.119.137.224'),
(927, 29, '2019-12-07 18:05:40', '5.114.217.181'),
(928, 5, '2019-12-07 18:55:43', '5.119.137.224'),
(929, 5, '2019-12-07 19:26:24', '5.119.137.224'),
(930, 29, '2019-12-07 19:33:09', '5.114.217.181'),
(931, 29, '2019-12-07 19:43:45', '5.119.137.224'),
(932, 5, '2019-12-07 20:07:01', '5.119.137.224'),
(933, 29, '2019-12-07 20:08:20', '5.119.137.224'),
(934, 29, '2019-12-07 21:10:02', '5.114.217.181'),
(935, 29, '2019-12-07 21:22:06', '86.57.38.52'),
(936, 5, '2019-12-07 22:20:42', '86.57.38.52'),
(937, 29, '2019-12-07 22:24:08', '86.57.38.52'),
(938, 39, '2019-12-07 22:25:13', '86.57.38.52'),
(939, 5, '2019-12-07 22:33:33', '86.57.38.52'),
(940, 29, '2019-12-07 22:37:24', '86.57.38.52'),
(941, 29, '0000-00-00 00:00:00', ''),
(942, 29, '0000-00-00 00:00:00', ''),
(943, 29, '0000-00-00 00:00:00', ''),
(944, 29, '0000-00-00 00:00:00', ''),
(945, 29, '0000-00-00 00:00:00', ''),
(946, 29, '0000-00-00 00:00:00', ''),
(947, 29, '0000-00-00 00:00:00', ''),
(948, 29, '0000-00-00 00:00:00', ''),
(949, 29, '0000-00-00 00:00:00', ''),
(950, 29, '0000-00-00 00:00:00', ''),
(951, 29, '0000-00-00 00:00:00', ''),
(952, 29, '0000-00-00 00:00:00', ''),
(953, 29, '0000-00-00 00:00:00', ''),
(954, 29, '0000-00-00 00:00:00', ''),
(955, 22, '0000-00-00 00:00:00', ''),
(956, 29, '0000-00-00 00:00:00', ''),
(957, 29, '0000-00-00 00:00:00', ''),
(958, 29, '0000-00-00 00:00:00', ''),
(959, 29, '0000-00-00 00:00:00', ''),
(960, 29, '0000-00-00 00:00:00', ''),
(961, 29, '0000-00-00 00:00:00', ''),
(962, 29, '0000-00-00 00:00:00', ''),
(963, 29, '0000-00-00 00:00:00', ''),
(964, 22, '0000-00-00 00:00:00', ''),
(965, 29, '0000-00-00 00:00:00', ''),
(966, 29, '0000-00-00 00:00:00', ''),
(967, 22, '0000-00-00 00:00:00', ''),
(968, 22, '0000-00-00 00:00:00', ''),
(969, 22, '0000-00-00 00:00:00', ''),
(970, 22, '0000-00-00 00:00:00', ''),
(971, 22, '0000-00-00 00:00:00', ''),
(972, 29, '0000-00-00 00:00:00', ''),
(973, 29, '0000-00-00 00:00:00', ''),
(974, 29, '0000-00-00 00:00:00', ''),
(975, 29, '0000-00-00 00:00:00', ''),
(976, 29, '0000-00-00 00:00:00', ''),
(977, 29, '0000-00-00 00:00:00', ''),
(978, 29, '0000-00-00 00:00:00', ''),
(979, 29, '0000-00-00 00:00:00', ''),
(980, 29, '0000-00-00 00:00:00', ''),
(981, 29, '0000-00-00 00:00:00', ''),
(982, 29, '0000-00-00 00:00:00', ''),
(983, 29, '0000-00-00 00:00:00', ''),
(984, 29, '0000-00-00 00:00:00', ''),
(985, 29, '0000-00-00 00:00:00', ''),
(986, 29, '0000-00-00 00:00:00', ''),
(987, 29, '0000-00-00 00:00:00', ''),
(988, 29, '0000-00-00 00:00:00', ''),
(989, 29, '0000-00-00 00:00:00', ''),
(990, 29, '0000-00-00 00:00:00', ''),
(991, 29, '0000-00-00 00:00:00', ''),
(992, 29, '0000-00-00 00:00:00', ''),
(993, 22, '0000-00-00 00:00:00', ''),
(994, 22, '0000-00-00 00:00:00', ''),
(995, 29, '0000-00-00 00:00:00', ''),
(996, 29, '0000-00-00 00:00:00', ''),
(997, 22, '0000-00-00 00:00:00', ''),
(998, 22, '0000-00-00 00:00:00', ''),
(999, 29, '0000-00-00 00:00:00', ''),
(1000, 29, '0000-00-00 00:00:00', ''),
(1001, 29, '0000-00-00 00:00:00', ''),
(1002, 29, '0000-00-00 00:00:00', ''),
(1003, 29, '0000-00-00 00:00:00', ''),
(1004, 29, '0000-00-00 00:00:00', ''),
(1005, 22, '0000-00-00 00:00:00', ''),
(1006, 22, '0000-00-00 00:00:00', ''),
(1007, 22, '0000-00-00 00:00:00', ''),
(1008, 22, '0000-00-00 00:00:00', '');

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
(32, '1572254203398.jpg', 'buy_pre_invoice_sale', 'check', 10),
(35, 'melicart1572940588.png', 'user', 'melicart', 49);

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
(117, 8, '1572763772515.png', '1398/8/12', 'signed_customer', 'sale'),
(86, 1, '1572548616117.png', '1398/8/9', 'signed_customer', 'sale'),
(115, 11, '1572676335222.png', '1398/8/11', 'pre_invoice_buy', 'buy'),
(116, 10, '1572676395678.jpg', '1398/8/11', 'check', 'buy'),
(118, 8, '1572763781205.png', '1398/8/12', 'check', 'sale'),
(119, 11, '1572764235636.png', '1398/8/12', 'signed_customer', 'sale'),
(120, 9, '1572768355517.png', '1398/8/12', 'signed_customer', 'sale'),
(121, 9, '1572768367159.png', '1398/8/12', 'check', 'sale'),
(132, 16, '1572789953556.png', '1398/8/12', 'check', 'buy'),
(127, 13, '1572787773299.png', '1398/8/12', 'pre_invoice_buy', 'buy');

-- --------------------------------------------------------

--
-- Table structure for table `media_received_indicator`
--

CREATE TABLE `media_received_indicator` (
  `mri_id` int(11) NOT NULL,
  `ri_id` int(11) NOT NULL,
  `mri_link` text,
  `mri_date` date DEFAULT NULL,
  `mri_name` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
(27, 13, 'pictures/1398/7/1241570088953.png', '1398/7/11'),
(28, 16, 'pictures/1398/9/10076414381575702936.png', '1398/9/16');

-- --------------------------------------------------------

--
-- Table structure for table `media_sender_indicator`
--

CREATE TABLE `media_sender_indicator` (
  `msi_id` int(11) NOT NULL,
  `si_id` int(11) NOT NULL,
  `msi_link` text,
  `msi_date` date DEFAULT NULL,
  `msi_name` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `media_sender_indicator`
--

INSERT INTO `media_sender_indicator` (`msi_id`, `si_id`, `msi_link`, `msi_date`, `msi_name`) VALUES
(31, 2, '1575712653756.png', '1398-09-16', ''),
(32, 2, '1575713184432.pdf', '1398-09-16', '');

-- --------------------------------------------------------

--
-- Table structure for table `options`
--

CREATE TABLE `options` (
  `o_id` int(11) NOT NULL,
  `o_key` varchar(50) DEFAULT NULL,
  `o_value` text
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `options`
--

INSERT INTO `options` (`o_id`, `o_key`, `o_value`) VALUES
(28, 'com_name', 'شرکت پتروسامان آذرتتیس'),
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
  `p_id` int(11) NOT NULL COMMENT 'کد محصول',
  `cat_id` int(11) NOT NULL COMMENT 'کد دسته بندی',
  `oa_date` date DEFAULT NULL COMMENT 'تاریخ آزمون',
  `oa_description` text COMMENT 'توضیحات'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='آزمون های دلخواه';

--
-- Dumping data for table `other_analyze`
--

INSERT INTO `other_analyze` (`oa_id`, `p_id`, `cat_id`, `oa_date`, `oa_description`) VALUES
(1, 0, 0, '1398-08-07', 'جهت تست آزمایش دلخواه'),
(2, 4, 7, '1398-08-11', 'جهت تست');

-- --------------------------------------------------------

--
-- Table structure for table `payroll`
--

CREATE TABLE `payroll` (
  `prl_id` int(11) NOT NULL COMMENT 'کد جدول',
  `prl_uid` int(11) NOT NULL COMMENT 'کد کاربر',
  `prl_month` varchar(10) NOT NULL COMMENT 'ماه',
  `prl_monthly_right` int(11) DEFAULT '0' COMMENT 'پایه حقوق',
  `prl_bon` int(11) DEFAULT '0' COMMENT 'بن و خوار و بار',
  `prl_home_right` int(11) DEFAULT '0' COMMENT 'حق مسکن',
  `prl_child_right` int(11) DEFAULT '0' COMMENT 'عائله مندی',
  `prl_overtime_hours` varchar(15) DEFAULT NULL COMMENT 'کد ملی',
  `prl_overtime_right` int(11) NOT NULL COMMENT 'ساعت اضافه کار',
  `prl_penalty` int(11) DEFAULT '0' COMMENT 'کارانه/جریمه',
  `prl_shift_right` int(11) DEFAULT '0' COMMENT 'حق شیفت',
  `prl_night_work_right` int(11) DEFAULT '0' COMMENT 'شب کاری',
  `prl_traffic` int(11) DEFAULT '0' COMMENT 'ایاب و ذهاب',
  `prl_total_income` int(11) DEFAULT '0' COMMENT 'جمع دریافتی',
  `prl_insure` int(11) DEFAULT '0' COMMENT 'بیمه تامین اجتماعی',
  `prl_tax` int(11) DEFAULT '0' COMMENT 'مالیات',
  `prl_help` int(11) DEFAULT '0' COMMENT 'مساعده',
  `prl_debt` int(11) DEFAULT '0' COMMENT 'قسط وام',
  `prl_deficit` int(11) DEFAULT '0' COMMENT 'کسر از حقوق',
  `prl_saving` int(11) DEFAULT '0' COMMENT 'پس انداز',
  `prl_other` int(11) DEFAULT '0' COMMENT 'سایر',
  `prl_modifier` int(11) DEFAULT '0' COMMENT 'اصلاح حساب',
  `prl_total_expends` int(11) DEFAULT '0' COMMENT 'جمع کسورات',
  `prl_total` int(11) NOT NULL DEFAULT '0' COMMENT 'مبلغ خالص پرداختی',
  `prl_date` varchar(12) NOT NULL COMMENT 'تاریخ صدور'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `performance_indexes`
--

CREATE TABLE `performance_indexes` (
  `pi_id` int(11) NOT NULL,
  `pi_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `performance_indexes`
--

INSERT INTO `performance_indexes` (`pi_id`, `pi_name`) VALUES
(1, 'دقت در انجام امور محوله'),
(9, 'یافتن روش هایی جهت انجام کار'),
(10, 'میزان دلسوزی'),
(11, 'علاقه برای کسب دانش کار');

-- --------------------------------------------------------

--
-- Table structure for table `performance_rates`
--

CREATE TABLE `performance_rates` (
  `pr_id` int(11) NOT NULL,
  `u_id` int(11) NOT NULL,
  `pi_id` int(11) NOT NULL,
  `pr_fromdate` date NOT NULL,
  `pr_todate` date NOT NULL,
  `pr_admin_rate` float DEFAULT NULL,
  `pr_admin_date` date DEFAULT NULL,
  `pr_hr_rate` float DEFAULT NULL,
  `pr_hr_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `performance_rates`
--

INSERT INTO `performance_rates` (`pr_id`, `u_id`, `pi_id`, `pr_fromdate`, `pr_todate`, `pr_admin_rate`, `pr_admin_date`, `pr_hr_rate`, `pr_hr_date`) VALUES
(54, 1, 11, '1398-09-01', '1398-09-30', 50, '1398-09-04', 1, '1398-09-04'),
(55, 1, 10, '1398-09-01', '1398-09-30', 45, '1398-09-04', 2, '1398-09-04'),
(56, 1, 9, '1398-09-01', '1398-09-30', 31, '1398-09-04', 3, '1398-09-04'),
(57, 1, 1, '1398-09-01', '1398-09-30', 87, '1398-09-04', 5, '1398-09-04'),
(58, 44, 11, '1398-09-02', '1398-09-03', 0, '1398-09-02', 2, '1398-09-02'),
(59, 44, 10, '1398-09-02', '1398-09-03', 0, '1398-09-02', 1, '1398-09-02'),
(60, 44, 9, '1398-09-02', '1398-09-03', 0, '1398-09-02', 3, '1398-09-02'),
(61, 44, 1, '1398-09-02', '1398-09-03', 0, '1398-09-02', 2, '1398-09-02');

-- --------------------------------------------------------

--
-- Table structure for table `points_ceiling`
--

CREATE TABLE `points_ceiling` (
  `pc_id` int(11) NOT NULL,
  `pc_amount` int(11) DEFAULT NULL COMMENT 'مبلغ',
  `pc_points_needed` int(11) DEFAULT NULL COMMENT 'امتیاز مورددنیاز'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `points_ceiling`
--

INSERT INTO `points_ceiling` (`pc_id`, `pc_amount`, `pc_points_needed`) VALUES
(1, 200000, 17),
(2, 500000, 60);

-- --------------------------------------------------------

--
-- Table structure for table `produce`
--

CREATE TABLE `produce` (
  `prc_id` int(11) NOT NULL COMMENT 'کد تولید',
  `prc_type` varchar(25) NOT NULL COMMENT 'نوع تولید',
  `prc_date` varchar(12) DEFAULT NULL COMMENT 'تاریخ تولید',
  `prc_sh_id` int(11) DEFAULT NULL COMMENT 'کد شیفت',
  `prc_st_id` int(11) NOT NULL DEFAULT '0' COMMENT 'کد انبار',
  `inp_p_id` int(11) NOT NULL COMMENT 'محصول ورودی',
  `inp_cat_id` int(11) NOT NULL COMMENT 'دانه بندی ورودی',
  `prc_p_id` int(11) DEFAULT NULL COMMENT 'کد محصول',
  `prc_cat_id` int(11) DEFAULT NULL COMMENT 'کد دانه بندی',
  `prc_val` bigint(20) NOT NULL DEFAULT '0' COMMENT 'مقدار',
  `prc_status` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'وضعیت تایید'
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
(10, 'خردایش', '1398/8/6', 1, 12, 11, 12, 6, 19, 20000, 1),
(11, 'کلسیناسیون', '1398/8/12', 1, 0, 3, 6, 3, 7, 5000, 0),
(12, 'کلسیناسیون', '1398/8/6', 2, 0, 3, 6, 3, 6, 850, 0);

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
  `rr_work_days` int(11) NOT NULL DEFAULT '0' COMMENT 'روزهای کارکرد',
  `rr_overtime_hours` int(11) NOT NULL DEFAULT '0' COMMENT 'ساعت اضافه کاری',
  `rr_child_right_ratio` double NOT NULL DEFAULT '1' COMMENT 'ضریب حق اولاد',
  `rr_shift` int(11) NOT NULL DEFAULT '0' COMMENT 'شیفت',
  `rr_night_work_hours` int(11) NOT NULL DEFAULT '0' COMMENT 'ساعت شب',
  `rr_modifier` int(11) DEFAULT '0' COMMENT 'اصلاح حساب',
  `rr_penalty` int(11) DEFAULT '0' COMMENT 'جریمه / کارانه',
  `rr_traffic` int(11) DEFAULT '0' COMMENT 'ایاب ذهاب',
  `rr_help` int(11) DEFAULT '0' COMMENT 'مساعده',
  `rr_debt` int(11) DEFAULT '0' COMMENT 'قسط وام'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `received_indicator`
--

CREATE TABLE `received_indicator` (
  `ri_id` int(11) NOT NULL,
  `ri_number` varchar(50) DEFAULT NULL COMMENT 'شماره نامه',
  `ri_reg_date` date NOT NULL COMMENT 'تاریخ صدور نامه',
  `ri_sender` text NOT NULL COMMENT 'فرستنده',
  `ri_description` text COMMENT 'شرح نامه',
  `ri_receive_date` date NOT NULL COMMENT 'تاریخ دریافت نامه',
  `u_id` int(11) DEFAULT NULL COMMENT 'ارجاع به',
  `ri_reference_date` date NOT NULL COMMENT 'تاریخ ارجاع'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `received_indicator`
--

INSERT INTO `received_indicator` (`ri_id`, `ri_number`, `ri_reg_date`, `ri_sender`, `ri_description`, `ri_receive_date`, `u_id`, `ri_reference_date`) VALUES
(3, '970016308485', '1398-09-01', 'معاونت مالیات بر ارزش افزوده شرکت لوله سازی اهواز', 'گواهی نامه ثبت نام شرکت لوله سازی اهواز در نظام مالیات بر ارزش افزوده', '1398-09-07', 33, '1398-09-10'),
(6, '1/12/56/الف	', '1398-09-10', 'معاونت مالیات بر ارزش افزوده شرکت لوله سازی اهواز', 'VZC', '1398-09-04', 32, '1398-09-10');

-- --------------------------------------------------------

--
-- Table structure for table `rest_day`
--

CREATE TABLE `rest_day` (
  `r_id` int(11) NOT NULL,
  `r_type` varchar(25) CHARACTER SET utf8 NOT NULL,
  `u_id` int(11) NOT NULL,
  `r_fromdate` date NOT NULL,
  `r_todate` date NOT NULL,
  `r_total` int(11) NOT NULL,
  `r_destination` text CHARACTER SET utf8 NOT NULL,
  `r_details` text CHARACTER SET utf8 NOT NULL,
  `r_admin_verify` tinyint(4) NOT NULL DEFAULT '0',
  `r_admin_date` date NOT NULL,
  `r_admin_details` text CHARACTER SET utf8,
  `r_hr_verify` tinyint(4) NOT NULL DEFAULT '0',
  `r_hr_date` date NOT NULL,
  `r_hr_details` text CHARACTER SET utf8
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rest_day`
--

INSERT INTO `rest_day` (`r_id`, `r_type`, `u_id`, `r_fromdate`, `r_todate`, `r_total`, `r_destination`, `r_details`, `r_admin_verify`, `r_admin_date`, `r_admin_details`, `r_hr_verify`, `r_hr_date`, `r_hr_details`) VALUES
(1, 'استعلاجی', 1, '1398-08-26', '1398-08-27', 1, '999', 'به علت بیماری', 0, '0000-00-00', NULL, 0, '0000-00-00', NULL),
(2, 'استعلاجی', 1, '1398-08-26', '1398-08-27', 1, '999', 'به علت بیماری', 0, '0000-00-00', NULL, 0, '0000-00-00', NULL),
(3, 'استعلاجی', 1, '1398-08-25', '1398-08-12', 0, 'asdas', 'به علت بیماری', 0, '0000-00-00', NULL, 0, '0000-00-00', NULL),
(4, 'استحقاقی', 32, '1398-08-25', '1398-08-18', 0, 'dasdsad', 'به علت سفر کاری', 0, '0000-00-00', NULL, 0, '0000-00-00', NULL),
(5, 'استحقاقی', 32, '1398-08-25', '1398-08-18', 0, 'dasdsad', 'به علت سفر کاری', 1, '1398-09-11', '', 0, '0000-00-00', NULL),
(6, 'استحقاقی', 32, '1398-08-25', '1398-08-18', 0, 'dasdsad', 'مرخصی تسویقی', 1, '1398-09-17', 'تایید مرخصی روزانه توسط مدیر', 0, '0000-00-00', NULL),
(7, 'استحقاقی', 32, '1398-08-25', '1398-08-18', 0, 'dasdsad', 'سفر کاری', 1, '1398-09-05', 'تایید شد', 42, '0000-00-00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `rest_hour`
--

CREATE TABLE `rest_hour` (
  `r_id` int(11) NOT NULL,
  `r_type` varchar(25) CHARACTER SET utf8 NOT NULL,
  `u_id` int(11) NOT NULL,
  `r_date` date NOT NULL,
  `r_fromtime` time NOT NULL,
  `r_totime` time NOT NULL,
  `r_total` time NOT NULL,
  `r_details` text CHARACTER SET utf8 NOT NULL,
  `r_admin_verify` tinyint(4) NOT NULL DEFAULT '0',
  `r_admin_date` date NOT NULL,
  `r_admin_details` text CHARACTER SET utf8,
  `r_hr_verify` tinyint(4) NOT NULL DEFAULT '0',
  `r_hr_date` date NOT NULL,
  `r_hr_details` text CHARACTER SET utf8
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rest_hour`
--

INSERT INTO `rest_hour` (`r_id`, `r_type`, `u_id`, `r_date`, `r_fromtime`, `r_totime`, `r_total`, `r_details`, `r_admin_verify`, `r_admin_date`, `r_admin_details`, `r_hr_verify`, `r_hr_date`, `r_hr_details`) VALUES
(1, 'ساعتی', 1, '0000-00-00', '00:00:00', '00:00:00', '00:00:00', 'bhh', 0, '0000-00-00', NULL, 0, '0000-00-00', NULL),
(2, 'ساعتی', 1, '0000-00-00', '00:00:00', '00:00:00', '00:00:00', 'bhh', 0, '0000-00-00', NULL, 0, '0000-00-00', NULL),
(3, 'ساعتی', 1, '0000-00-00', '00:00:00', '00:00:00', '00:00:00', 'asdasdasd', 0, '0000-00-00', NULL, 0, '0000-00-00', NULL),
(4, 'استحقاقی', 32, '0000-00-00', '00:00:00', '00:00:00', '00:00:00', 'asda', 0, '0000-00-00', NULL, 0, '0000-00-00', NULL),
(5, 'استحقاقی', 32, '0000-00-00', '00:00:00', '00:00:00', '02:50:00', 'asda', 0, '0000-00-00', NULL, 0, '0000-00-00', NULL),
(6, 'استحقاقی', 32, '0000-00-00', '00:00:00', '00:00:00', '02:50:00', 'asda', 0, '0000-00-00', NULL, 0, '0000-00-00', NULL),
(7, 'استحقاقی', 32, '0000-00-00', '00:00:00', '00:00:00', '02:50:00', 'asda', 1, '1398-09-14', '2 ساعت مرخصی', 0, '0000-00-00', NULL),
(8, 'ساعتی', 1, '1398-08-26', '10:30:00', '12:30:00', '02:00:00', 'vvv', 1, '1398-09-17', 'تایید مرخصی ساعتی توسط مدیر', 0, '0000-00-00', NULL);

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
  `re_reason` text
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
(8, 6, 'خرید', '20000', '1398-08-06', 'کیفیت نا مطلوب'),
(9, 13, 'فروش', '600', '1398-08-12', 'قیمت'),
(10, 16, 'خرید', '2000', '1398-08-12', 'کیفیت نا مطلوب');

-- --------------------------------------------------------

--
-- Table structure for table `schedule`
--

CREATE TABLE `schedule` (
  `sc_id` int(11) NOT NULL COMMENT 'کد جدول',
  `sc_month` varchar(35) DEFAULT NULL,
  `sc_group` varchar(35) DEFAULT NULL,
  `sc_schedule` text
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
  `s_rescode` int(11) NOT NULL DEFAULT '0' COMMENT 'موضوع',
  `s_date` varchar(12) NOT NULL COMMENT 'تاریخ',
  `s_from` text COMMENT 'از',
  `s_to` text COMMENT 'به'
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
-- Table structure for table `sender_indicator`
--

CREATE TABLE `sender_indicator` (
  `si_id` int(11) NOT NULL,
  `si_receiver` text NOT NULL COMMENT 'گیرنده',
  `si_send_date` date NOT NULL COMMENT 'تاریخ ارسال نامه',
  `si_description` text COMMENT 'شرح نامه',
  `si_details` text COMMENT 'توضیحات',
  `si_text` text COMMENT 'متن نامه',
  `si_type` varchar(5) NOT NULL DEFAULT '0' COMMENT 'نوع برگه',
  `si_writer` tinyint(4) DEFAULT NULL,
  `si_admin_verify` tinyint(4) NOT NULL DEFAULT '0',
  `si_admin_details` text,
  `si_admin_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sender_indicator`
--

INSERT INTO `sender_indicator` (`si_id`, `si_receiver`, `si_send_date`, `si_description`, `si_details`, `si_text`, `si_type`, `si_writer`, `si_admin_verify`, `si_admin_details`, `si_admin_date`) VALUES
(1, 'شرکت اطمینان سازه شهربابک', '1398-09-07', 'تقاضای بررسی و تایید اجرای فونداسیون و آرماتوربندی', 'بدون توضیح', '<p style=\"text-align: center;\"><strong><em>بدینوسیله به پیوست3 نسخه فاکتور رسمی به شماره 74و 75و 76 دوره ی اسفند ماه سال97و فروردین ماه سال 98 تقدیم حضور میگردد. تقاضا می شود نسخه رنگی را پس از امضا و مهر آن شرکت محترم به آدرس پستی این شرکت ارسال نمائید. پیشاپیش از حسن اعتماد آن شرکت محترم سپاسگزاری می گردد.</em></strong></p>\r\n<p style=\"text-align: center;\">&nbsp;</p>\r\n<p style=\"text-align: center;\">&nbsp;</p>', 'a4', 1, 0, NULL, '0000-00-00'),
(2, 'شرکت لوله اهواز', '1398-09-10', 'تکمیل پیش فاکتور فروش لوله', 'ندارد', '<p style=\"text-align: right;\">بدینوسیله به پیوست3 نسخه فاکتور رسمی (7 برگ) به شماره 74و 75و 76 دوره ی اسفند ماه سال97و فروردین ماه سال 98 تقدیم حضور میگردد. تقاضا می شود نسخه رنگی را پس از امضا و مهر آن شرکت محترم به آدرس پستی این شرکت ارسال نمائید. پیشاپیش از حسن اعتماد آن شرکت محترم سپاسگزاری می گردد.</p>', 'a4', 1, 1, '.....', '1398-09-16');

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
  `st_address` text,
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
-- Table structure for table `tools`
--

CREATE TABLE `tools` (
  `t_id` int(11) NOT NULL,
  `t_name` varchar(100) NOT NULL COMMENT 'نام ابزارآلات',
  `tc_id` int(11) NOT NULL COMMENT 'دسته بندی',
  `t_unit` varchar(50) DEFAULT NULL COMMENT 'واحد',
  `t_stock` int(11) DEFAULT NULL COMMENT 'موجودی'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tools`
--

INSERT INTO `tools` (`t_id`, `t_name`, `tc_id`, `t_unit`, `t_stock`) VALUES
(4, 'بیل مکانیکی', 4, 'تعداد', 5),
(5, 'آچار فرانسه', 2, 'تعداد', 6),
(6, 'سیم مسی', 2, 'متر', 600),
(7, 'فیلتر هوا', 5, 'تعداد', 20);

-- --------------------------------------------------------

--
-- Table structure for table `tools_cat`
--

CREATE TABLE `tools_cat` (
  `tc_id` int(11) NOT NULL,
  `cat_name` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tools_cat`
--

INSERT INTO `tools_cat` (`tc_id`, `cat_name`) VALUES
(2, 'ابزارآلات مصرفی'),
(4, 'ماشین آلات'),
(5, 'فیلترها');

-- --------------------------------------------------------

--
-- Table structure for table `tools_repairs`
--

CREATE TABLE `tools_repairs` (
  `r_id` int(11) NOT NULL,
  `us_id` int(11) NOT NULL,
  `r_repaired` int(11) DEFAULT '0' COMMENT 'تعمیر شده',
  `r_notrepaired` int(11) DEFAULT '0' COMMENT 'تعمیر نشده',
  `r_date` date DEFAULT NULL COMMENT 'تاریخ تعمیر',
  `r_details` varchar(100) DEFAULT NULL COMMENT 'توضیحات'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tools_repairs`
--

INSERT INTO `tools_repairs` (`r_id`, `us_id`, `r_repaired`, `r_notrepaired`, `r_date`, `r_details`) VALUES
(2, 40, 30, 60, NULL, NULL),
(3, 39, 1, 0, NULL, NULL),
(4, 47, 0, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tools_returned`
--

CREATE TABLE `tools_returned` (
  `tr_id` int(11) NOT NULL,
  `us_id` int(11) NOT NULL,
  `tr_quantity` int(11) DEFAULT NULL COMMENT 'مقدار برگشتی',
  `tr_date` date DEFAULT NULL COMMENT 'تاریخ برگشت',
  `tr_details` varchar(100) DEFAULT NULL COMMENT 'توضیحات',
  `tr_condition` int(11) DEFAULT NULL COMMENT 'وضعیت'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tools_returned`
--

INSERT INTO `tools_returned` (`tr_id`, `us_id`, `tr_quantity`, `tr_date`, `tr_details`, `tr_condition`) VALUES
(8, 40, 10, '1398-08-17', 'بازگشت 10 متر سیم مسی ', -1),
(9, 40, 80, '1398-08-18', 'بازگشت 80 متر سیم مسی ', -1),
(10, 44, 1, '1398-08-15', 'بازگشت 1 عدد آچار فرانسه', NULL),
(12, 39, 2, '1398-08-28', 'تعمیر شود', 1),
(17, 40, 80, '1398-08-19', 'بازگشت 80 متر سیم مسی ', 1),
(18, 40, 10, '1398-08-09', 'بازگشت 10 متر سیم مسی ', 1),
(19, 39, 1, '1398-08-13', 'تعمیر شود', 1),
(20, 44, 1, '1398-08-13', 'ش', NULL),
(21, 47, 1, '1398-08-21', 'ش', 1);

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
-- Table structure for table `usage_tools`
--

CREATE TABLE `usage_tools` (
  `us_id` int(11) NOT NULL,
  `t_id` int(11) NOT NULL COMMENT 'کد ابزارآلات',
  `u_id` int(11) NOT NULL COMMENT 'کد کاربر',
  `us_details` varchar(100) DEFAULT NULL COMMENT 'توضیحات',
  `us_date` date DEFAULT NULL COMMENT 'تاریخ خروج ابزارآلات',
  `us_type` varchar(30) DEFAULT NULL COMMENT 'مصرفی یا امانتی',
  `us_quantity` float DEFAULT NULL COMMENT 'مقدار'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `usage_tools`
--

INSERT INTO `usage_tools` (`us_id`, `t_id`, `u_id`, `us_details`, `us_date`, `us_type`, `us_quantity`) VALUES
(39, 4, 1, 'خروج 3 عدد بیل مکانیکی', '1398-08-15', 'مصرفی', 3),
(40, 6, 1, '200 متر سیم مسی', '1398-08-07', 'مصرفی', 200),
(41, 5, 1, '6 عدد آچار امانت داده شد', '1398-08-13', 'امانتی', 3),
(43, 4, 1, 'امانتی بیل مکانیکی', '1398-08-05', 'امانتی', 2),
(44, 5, 1, 'امانت آچار فرانسه به انبار مرکزی', '1398-08-18', 'امانتی', 2),
(47, 4, 1, 'توسط سیروس', '1398-08-20', 'مصرفی', 1),
(48, 7, 1, 'توسط سیروس', '1398-08-25', 'مصرفی', 1),
(49, 5, 1, 'مهدی کرمی', '1398-08-25', 'امانتی', 1);

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
  `u_address` text COMMENT 'آدرس محل سکونت',
  `u_pre` text COMMENT 'سنوات',
  `u_group` varchar(10) DEFAULT NULL COMMENT 'نام گروه',
  `u_description` text COMMENT 'توضیحات',
  `u_pcode` varchar(20) DEFAULT NULL COMMENT 'شماره پرسنل',
  `u_wtype` varchar(20) DEFAULT NULL COMMENT 'سمت',
  `u_marital` varchar(20) DEFAULT NULL COMMENT 'وضعیت تاهل',
  `u_evidence` varchar(40) DEFAULT NULL COMMENT 'مدرک',
  `u_child_count` int(11) DEFAULT '0' COMMENT 'تعداد فرزند',
  `u_daily_wage` bigint(20) DEFAULT '0' COMMENT 'دستمزد روزانه',
  `u_fix_right` int(11) DEFAULT '0' COMMENT 'اضافه ثابت',
  `u_fin_contract` varchar(11) NOT NULL COMMENT 'تاریخ انقضای قرارداد',
  `u_cart` varchar(50) DEFAULT NULL COMMENT 'شماره کارت',
  `u_hesab` varchar(50) DEFAULT NULL COMMENT 'شماره حساب',
  `u_shaba` varchar(50) DEFAULT NULL COMMENT 'شماره شبا',
  `u_birth_city` varchar(40) DEFAULT NULL COMMENT 'محل تولد',
  `u_cert_number` varchar(20) DEFAULT NULL COMMENT 'شماره شناسنامه',
  `u_cert_city` varchar(40) DEFAULT NULL COMMENT 'محل صدور',
  `u_start_work` varchar(11) DEFAULT NULL COMMENT 'تاریخ شروع به کار',
  `u_end_work` varchar(11) DEFAULT NULL COMMENT 'تاریخ ترک کار',
  `u_link` text NOT NULL COMMENT 'تصویر پروفایل'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`u_id`, `u_name`, `u_family`, `u_level`, `u_username`, `u_password`, `u_father`, `u_meli`, `u_birth`, `u_live_city`, `u_destination`, `u_mobile`, `u_tell`, `u_address`, `u_pre`, `u_group`, `u_description`, `u_pcode`, `u_wtype`, `u_marital`, `u_evidence`, `u_child_count`, `u_daily_wage`, `u_fix_right`, `u_fin_contract`, `u_cart`, `u_hesab`, `u_shaba`, `u_birth_city`, `u_cert_number`, `u_cert_city`, `u_start_work`, `u_end_work`, `u_link`) VALUES
(1, 'سید مرتضی', 'مهدوی', 'مدیریت', 'gratech', '1456', '', '', '', '', '', '111111', '', '', '', '1', '', '', '', 'مجرد', '', 0, 0, 0, '', '', '', '', 'رفسنجان', '', '', '', '', ''),
(32, 'حسین', 'عباسی', 'بازرگانی', 'abbasi', '123456', '', '', '', '', '', '0000000', '', '', '', '2', '', '', '', 'مجرد', '', 0, 0, 0, '', '', '', '', '', '', '', '', '', ''),
(33, 'محمود', 'ملاک', 'اسناد', 'mallak', '1234', '', '', '', '', '', '09139923053', '', '', '', '2', '', '', '', 'مجرد', '', 0, 0, 0, '', '', '', '', '', '', '', '', '', ''),
(40, 'مسول آزمایشگاه', '', 'آزمایشگاه', 'lab', 'lab', '', '', '', '', '', '', '', '', '', '1', '', '', '', 'مجرد', '', 0, 0, 0, '', '', '', '', '', '', '', '1398/9/6', '', ''),
(41, 'حبیب الله', 'پیله وری', 'مدیر', 'habibpi', '123456', '', '', '', '', '', '22222222', '', '', '', '1', '', '', '', 'مجرد', '', 0, 0, 0, '', '', '', '', '', '', '', '', '', ''),
(42, 'محمد', 'اسماعیلی', 'منابع انسانی', 'mrm', '123', '', '', '', '', '', '2222222', '', '', '', '1', '', '', '', 'مجرد', '', 0, 0, 0, '', '', '', '', '', '', '', '', '', ''),
(43, 'کاوه', 'نوروزی', 'مالی', 'kaveh', '123456', '', '', '', '', '', '3333333', '', '', '', '1', '', '', '', 'مجرد', '', 0, 0, 0, '', '', '', '', '', '', '', '', '', ''),
(44, 'امین', 'حسنی', 'امور مالی', 'amin', '123456', 'رضا', '1', '1398/8/5', '', '', '', '', '', '', '1', '', '', '', 'مجرد', '', 0, 0, 0, '', '', '', '', '', '', '', '', '', '1573933268533.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `analyze_form`
--
ALTER TABLE `analyze_form`
  ADD PRIMARY KEY (`analyze_id`);

--
-- Indexes for table `apply_loan`
--
ALTER TABLE `apply_loan`
  ADD PRIMARY KEY (`al_id`);

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
-- Indexes for table `customs_media`
--
ALTER TABLE `customs_media`
  ADD PRIMARY KEY (`cm_id`);

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
-- Indexes for table `header_loading`
--
ALTER TABLE `header_loading`
  ADD PRIMARY KEY (`hl_id`);

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
-- Indexes for table `list_customs`
--
ALTER TABLE `list_customs`
  ADD PRIMARY KEY (`lc_id`);

--
-- Indexes for table `login_record`
--
ALTER TABLE `login_record`
  ADD PRIMARY KEY (`lr_id`);

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
-- Indexes for table `media_received_indicator`
--
ALTER TABLE `media_received_indicator`
  ADD PRIMARY KEY (`mri_id`);

--
-- Indexes for table `media_secretariat`
--
ALTER TABLE `media_secretariat`
  ADD PRIMARY KEY (`ms_id`);

--
-- Indexes for table `media_sender_indicator`
--
ALTER TABLE `media_sender_indicator`
  ADD PRIMARY KEY (`msi_id`);

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
-- Indexes for table `performance_indexes`
--
ALTER TABLE `performance_indexes`
  ADD PRIMARY KEY (`pi_id`);

--
-- Indexes for table `performance_rates`
--
ALTER TABLE `performance_rates`
  ADD PRIMARY KEY (`pr_id`);

--
-- Indexes for table `points_ceiling`
--
ALTER TABLE `points_ceiling`
  ADD PRIMARY KEY (`pc_id`);

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
-- Indexes for table `received_indicator`
--
ALTER TABLE `received_indicator`
  ADD PRIMARY KEY (`ri_id`);

--
-- Indexes for table `rest_day`
--
ALTER TABLE `rest_day`
  ADD PRIMARY KEY (`r_id`);

--
-- Indexes for table `rest_hour`
--
ALTER TABLE `rest_hour`
  ADD PRIMARY KEY (`r_id`);

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
-- Indexes for table `sender_indicator`
--
ALTER TABLE `sender_indicator`
  ADD PRIMARY KEY (`si_id`);

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
-- Indexes for table `tools`
--
ALTER TABLE `tools`
  ADD PRIMARY KEY (`t_id`);

--
-- Indexes for table `tools_cat`
--
ALTER TABLE `tools_cat`
  ADD PRIMARY KEY (`tc_id`);

--
-- Indexes for table `tools_repairs`
--
ALTER TABLE `tools_repairs`
  ADD PRIMARY KEY (`r_id`);

--
-- Indexes for table `tools_returned`
--
ALTER TABLE `tools_returned`
  ADD PRIMARY KEY (`tr_id`);

--
-- Indexes for table `transfer_list`
--
ALTER TABLE `transfer_list`
  ADD PRIMARY KEY (`tl_id`);

--
-- Indexes for table `usage_tools`
--
ALTER TABLE `usage_tools`
  ADD PRIMARY KEY (`us_id`);

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
  MODIFY `analyze_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `apply_loan`
--
ALTER TABLE `apply_loan`
  MODIFY `al_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `bar_bring`
--
ALTER TABLE `bar_bring`
  MODIFY `bar_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'کد بار', AUTO_INCREMENT=41;

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
-- AUTO_INCREMENT for table `customs_media`
--
ALTER TABLE `customs_media`
  MODIFY `cm_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

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
  MODIFY `f_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'کد ردیف', AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `factor_body`
--
ALTER TABLE `factor_body`
  MODIFY `fb_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'کد ردیف فاکتور فروش', AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `factor_buy`
--
ALTER TABLE `factor_buy`
  MODIFY `f_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'کد فاکتور', AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `factor_buy_body`
--
ALTER TABLE `factor_buy_body`
  MODIFY `fb_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'کد ردیف فاکتور خرید', AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `factor_buy_log`
--
ALTER TABLE `factor_buy_log`
  MODIFY `l_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `factor_description`
--
ALTER TABLE `factor_description`
  MODIFY `fd_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `factor_log`
--
ALTER TABLE `factor_log`
  MODIFY `l_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;

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
-- AUTO_INCREMENT for table `header_loading`
--
ALTER TABLE `header_loading`
  MODIFY `hl_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `hse_item`
--
ALTER TABLE `hse_item`
  MODIFY `h_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'کد ایتم ایمنی', AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `hse_rates`
--
ALTER TABLE `hse_rates`
  MODIFY `hr_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `list_customs`
--
ALTER TABLE `list_customs`
  MODIFY `lc_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `login_record`
--
ALTER TABLE `login_record`
  MODIFY `lr_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1009;

--
-- AUTO_INCREMENT for table `material`
--
ALTER TABLE `material`
  MODIFY `ma_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `media`
--
ALTER TABLE `media`
  MODIFY `m_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `media_factor`
--
ALTER TABLE `media_factor`
  MODIFY `mf_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=136;

--
-- AUTO_INCREMENT for table `media_received_indicator`
--
ALTER TABLE `media_received_indicator`
  MODIFY `mri_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `media_secretariat`
--
ALTER TABLE `media_secretariat`
  MODIFY `ms_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'کد رسانه', AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `media_sender_indicator`
--
ALTER TABLE `media_sender_indicator`
  MODIFY `msi_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `options`
--
ALTER TABLE `options`
  MODIFY `o_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `other_analyze`
--
ALTER TABLE `other_analyze`
  MODIFY `oa_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'کد جدول', AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `payroll`
--
ALTER TABLE `payroll`
  MODIFY `prl_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'کد جدول';

--
-- AUTO_INCREMENT for table `performance_indexes`
--
ALTER TABLE `performance_indexes`
  MODIFY `pi_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `performance_rates`
--
ALTER TABLE `performance_rates`
  MODIFY `pr_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `points_ceiling`
--
ALTER TABLE `points_ceiling`
  MODIFY `pc_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `produce`
--
ALTER TABLE `produce`
  MODIFY `prc_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'کد تولید', AUTO_INCREMENT=13;

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
-- AUTO_INCREMENT for table `received_indicator`
--
ALTER TABLE `received_indicator`
  MODIFY `ri_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `rest_day`
--
ALTER TABLE `rest_day`
  MODIFY `r_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `rest_hour`
--
ALTER TABLE `rest_hour`
  MODIFY `r_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `returned_factor`
--
ALTER TABLE `returned_factor`
  MODIFY `re_id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `schedule`
--
ALTER TABLE `schedule`
  MODIFY `sc_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'کد جدول';

--
-- AUTO_INCREMENT for table `secretariat`
--
ALTER TABLE `secretariat`
  MODIFY `s_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'کد دبیرخانه', AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `sender_indicator`
--
ALTER TABLE `sender_indicator`
  MODIFY `si_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

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
  MODIFY `st_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `store`
--
ALTER TABLE `store`
  MODIFY `s_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tools`
--
ALTER TABLE `tools`
  MODIFY `t_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tools_cat`
--
ALTER TABLE `tools_cat`
  MODIFY `tc_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tools_repairs`
--
ALTER TABLE `tools_repairs`
  MODIFY `r_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tools_returned`
--
ALTER TABLE `tools_returned`
  MODIFY `tr_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `transfer_list`
--
ALTER TABLE `transfer_list`
  MODIFY `tl_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `usage_tools`
--
ALTER TABLE `usage_tools`
  MODIFY `us_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `u_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
