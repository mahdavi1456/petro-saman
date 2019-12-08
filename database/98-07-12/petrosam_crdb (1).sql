-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 04, 2019 at 05:59 PM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `petrosam_crdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `analyze_form`
--

CREATE TABLE `analyze_form` (
  `analyze_id` int(11) NOT NULL,
  `factor_log_id` int(11) NOT NULL,
  `sample_in_date` varchar(16) DEFAULT NULL COMMENT 'تاریخ دریافت نمونه',
  `analyze_date` varchar(16) DEFAULT NULL COMMENT 'تاریخ انجام آزمون',
  `analyzer` varchar(50) DEFAULT NULL COMMENT 'نمونه گیری توسط',
  `temprature` varchar(50) DEFAULT NULL COMMENT 'دمای محیط',
  `humidity` varchar(50) DEFAULT NULL COMMENT 'رطوبت محیط',
  `an_empty_weight` int(11) NOT NULL DEFAULT '0',
  `am_empty_weight` int(11) NOT NULL DEFAULT '0',
  `an_full_weight` int(11) NOT NULL DEFAULT '0',
  `hb_empty_weight` int(11) NOT NULL DEFAULT '0',
  `hm_empty_weight` int(11) NOT NULL DEFAULT '0',
  `hb_full_weight` int(11) NOT NULL DEFAULT '0',
  `ec_empty_weight` int(11) NOT NULL DEFAULT '0',
  `em_empty_weight` int(11) NOT NULL DEFAULT '0',
  `ec_full_weight` int(11) NOT NULL DEFAULT '0',
  `sulfur_percent` int(11) NOT NULL DEFAULT '0',
  `gm_weight` int(11) NOT NULL DEFAULT '0',
  `gm_less_weight` int(11) NOT NULL DEFAULT '0',
  `gm_dot_weight` int(11) NOT NULL DEFAULT '0',
  `gm_more_weight` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `analyze_form`
--

INSERT INTO `analyze_form` (`analyze_id`, `factor_log_id`, `sample_in_date`, `analyze_date`, `analyzer`, `temprature`, `humidity`, `an_empty_weight`, `am_empty_weight`, `an_full_weight`, `hb_empty_weight`, `hm_empty_weight`, `hb_full_weight`, `ec_empty_weight`, `em_empty_weight`, `ec_full_weight`, `sulfur_percent`, `gm_weight`, `gm_less_weight`, `gm_dot_weight`, `gm_more_weight`) VALUES
(1, 15, '', '1398/5/17', '', '', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(2, 30, '1398/5/22', '1398/5/22', 'محمد اسماعیلی', '405', '30', 0, 0, 0, 0, 0, 0, 0, 0, 0, 20, 0, 0, 0, 0),
(3, 29, '', '', '', '', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(4, 49, '1398/5/20', '1398/5/20', '', '', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(5, 50, '1398/5/15', '1398/5/8', 'محمد اسماعیلی', '405', '30', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(6, 31, '1398/5/22', '1398/5/23', 'محمد اسماعیلی', '40', '30', 1, 1, 2, 1, 1, 2, 2, 1, 3, 1, 950, 800, 100, 50),
(7, 16, '1398/5/23', '1398/5/23', 'lll', '20', '40', 2, 1, 3, 4, 1, 5, 1, 1, 2, 2, 800, 500, 200, 100),
(8, 52, '1398/5/23', '1398/5/23', 'محمد اسماعیلی', '40', '30', 1, 1, 2, 1, 1, 2, 2, 1, 3, 1, 950, 800, 100, 50),
(9, 54, '1398/5/23', '1398/5/23', 'محمد اسماعیلی', '405', '30', 1, 1, 70, 1, 1, 2, 2, 1, 3, 1, 950, 800, 100, 50),
(10, 54, '1398/5/23', '1398/5/23', 'محمد اسماعیلی', '405', '30', 1, 1, 70, 1, 1, 2, 2, 1, 3, 1, 950, 800, 100, 50),
(11, 54, '1398/5/23', '1398/5/23', 'محمد اسماعیلی', '405', '30', 1, 1, 70, 1, 1, 2, 2, 1, 3, 1, 950, 800, 100, 50),
(12, 56, '1398/5/23', '1398/5/16', 'محمد اسماعیلی', '405', '30', 1, 1, 70, 1, 1, 2, 2, 1, 3, 0, 950, 800, 100, 50),
(13, 65, '', '', '', '', '', 1, 2, 2, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `bar_bring`
--

CREATE TABLE `bar_bring` (
  `bar_id` int(11) NOT NULL COMMENT 'کد بار',
  `fx_id` int(11) DEFAULT NULL COMMENT 'کد فاکتور',
  `fx_type` int(11) DEFAULT NULL COMMENT 'نوع بار',
  `dr_id` int(11) DEFAULT NULL COMMENT 'کد راننده',
  `bar_quantity` varchar(35) DEFAULT NULL COMMENT 'وزن بار',
  `bar_time` varchar(16) DEFAULT NULL COMMENT 'تاریخ بار',
  `bar_verify_admin` int(11) DEFAULT '0' COMMENT 'تایید مدیریت'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `bar_bring`
--

INSERT INTO `bar_bring` (`bar_id`, `fx_id`, `fx_type`, `dr_id`, `bar_quantity`, `bar_time`, `bar_verify_admin`) VALUES
(1, 7, 2, 3, '100', '1398/05/16 18:29', 0),
(2, 7, 2, 3, '100', '1398/05/16 18:32', 0),
(3, 7, 2, 3, '100', '1398/05/16 18:33', 0),
(4, 7, 2, 3, '100', '1398/05/16 18:34', 0),
(5, 7, 2, 3, '100', '1398/05/16 18:37', 0),
(6, 7, 2, 3, '100', '1398/05/16 18:37', 0),
(7, 7, 2, 3, '100', '1398/05/16 18:38', 0),
(8, 15, 2, 2, '100', '1398/05/16 18:56', 0),
(9, 15, 2, 2, '100', '1398/05/16 18:56', 0),
(10, 16, 2, 3, '100', '1398/05/17 09:25', 0),
(11, 29, 2, 3, '100', '1398/05/20 12:43', 0),
(12, 30, 2, 3, '100', '1398/05/20 17:59', 0),
(13, 30, 2, 3, '100', '1398/05/20 18:04', 0),
(14, 30, 2, 3, '100', '1398/05/20 18:04', 0),
(15, 30, 2, 3, '100', '1398/05/20 18:04', 0),
(16, 29, 2, 3, '100', '1398/05/20 18:09', 0),
(17, 49, 2, 3, '100', '1398/05/20 19:25', 0),
(18, 49, 2, 3, '100', '1398/05/20 19:25', 0),
(19, 31, 2, 3, '100', '1398/05/22 11:20', 0),
(20, 50, 2, 3, '100', '1398/05/22 11:21', 0),
(21, 50, 2, 3, '100', '1398/05/22 11:22', 0),
(22, 31, 2, 3, '100', '1398/05/22 12:00', 0),
(23, 52, 2, 3, '100', '1398/05/23 19:27', 0),
(24, 54, 2, 3, '1', '1398/05/23 19:29', 0),
(25, 55, 2, 3, '1', '1398/05/23 19:50', 0),
(26, 56, 2, 3, '3', '1398/05/23 20:22', 1),
(27, 56, 2, 3, '3', '1398/05/31 12:08', 0),
(28, 65, 2, 3, '12000', '1398/05/31 12:12', 0),
(29, 57, 2, 3, '1', '1398/05/31 12:12', 0),
(30, 65, 2, 3, '12000', '1398/05/31 12:13', 0),
(31, 16, 2, 3, '100', '1398/05/31 12:15', 0);

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
(1, 'دانه بندی 0-1'),
(2, 'دانه بندی 1-3'),
(4, 'دانه بندی 0-30'),
(5, 'دانه بندی 5-1');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `c_id` int(11) NOT NULL,
  `c_account` varchar(20) NOT NULL,
  `c_type` varchar(20) NOT NULL,
  `c_name` varchar(15) DEFAULT NULL,
  `c_family` varchar(25) DEFAULT NULL,
  `c_company` varchar(35) DEFAULT NULL,
  `c_national` varchar(10) DEFAULT NULL,
  `c_certificate` varchar(10) DEFAULT NULL,
  `c_national_id` varchar(15) DEFAULT NULL,
  `c_economic` varchar(12) DEFAULT NULL,
  `c_phone` varchar(11) DEFAULT NULL,
  `c_fax` varchar(11) DEFAULT NULL,
  `c_mobile` varchar(11) DEFAULT NULL,
  `c_oaddress` text,
  `c_faddress` text,
  `c_email` text,
  `c_vat` varchar(5) DEFAULT NULL,
  `c_expire_vat` varchar(10) DEFAULT NULL,
  `c_activity` varchar(20) DEFAULT NULL,
  `c_registernumber` varchar(20) DEFAULT NULL,
  `c_postalcode` varchar(20) DEFAULT NULL,
  `c_managername` varchar(20) DEFAULT NULL,
  `c_managercode` varchar(20) DEFAULT NULL,
  `c_businessinterface` varchar(20) DEFAULT NULL,
  `c_financialinterface` varchar(20) DEFAULT NULL,
  `c_discharge` text,
  `c_dischargephone` varchar(20) DEFAULT NULL,
  `c_stamp` varchar(20) DEFAULT NULL,
  `c_signaturep` varchar(20) DEFAULT NULL,
  `c_signaturep2` varchar(20) DEFAULT NULL,
  `c_pic_national` varchar(100) DEFAULT NULL,
  `c_pic_draft` varchar(100) DEFAULT NULL,
  `c_pic_taxes` varchar(100) DEFAULT NULL,
  `c_last_change` varchar(100) DEFAULT NULL,
  `c_pic_manager` varchar(100) DEFAULT NULL,
  `c_founded_ad` varchar(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`c_id`, `c_account`, `c_type`, `c_name`, `c_family`, `c_company`, `c_national`, `c_certificate`, `c_national_id`, `c_economic`, `c_phone`, `c_fax`, `c_mobile`, `c_oaddress`, `c_faddress`, `c_email`, `c_vat`, `c_expire_vat`, `c_activity`, `c_registernumber`, `c_postalcode`, `c_managername`, `c_managercode`, `c_businessinterface`, `c_financialinterface`, `c_discharge`, `c_dischargephone`, `c_stamp`, `c_signaturep`, `c_signaturep2`, `c_pic_national`, `c_pic_draft`, `c_pic_taxes`, `c_last_change`, `c_pic_manager`, `c_founded_ad`) VALUES
(3, 'تامین کننده', 'تامین کننده', 'حامد', '', '', '', '0', '0', '', '', '', '', '', '', '', 'yes', '', '', '', '', '', '', '', '', '', '', '', '0', '0', '0', '0', '0', '0', '0', '0'),
(2, 'مشتری', 'مشتری', 'مهسا', '', '', '', '0', '0', '', '', '', '', '', '', '', 'yes', '', '', '0', '', '0', '0', '', '', '', '', '1570083590357.png', '1570030210171.jpg', '1570030210663.png', '', '', '1570029063487.jpg', '', '', ''),
(4, 'مشتری', 'تامین کننده', 'مهراد', 'صالحی', 'گراتک', '8672572', '0', '0', '', '', '', '', '', '', '', 'yes', '', '', '0', '', '0', '0', '', '', '', '', '0', '0', '0', '0', '1570193265271.png', '1570193327441.jpg', '0', '0', '0'),
(5, 'تامین کننده', 'مشتری', 'آیلین', 'ابراهیمی', '', '', '0', '0', '', '', '', '', '', '', '', 'yes', '', '', '', '', '', '', '', '', '', '', '', '1570025288698.png', '', '', '', '', '', '', '');

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
(2, 'تست', 'تست', 0, '', '   ', 0, 1, '1565182132.png', NULL, NULL),
(3, 'تست ۳', 'تست ۳', 0, '', '   ', 0, 1, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `factor`
--

CREATE TABLE `factor` (
  `f_id` int(11) NOT NULL,
  `c_id` int(11) NOT NULL,
  `f_date` varchar(16) NOT NULL,
  `u_id` int(11) NOT NULL,
  `f_VAT_status` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'وضعیت گواهی ارزش افزوده'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `factor`
--

INSERT INTO `factor` (`f_id`, `c_id`, `f_date`, `u_id`, `f_VAT_status`) VALUES
(1, 2, '1398/5/16', 1, 1),
(2, 2, '1398/5/17', 1, 0),
(3, 2, '1398/5/16', 1, 1),
(4, 2, '1398/5/20', 1, 1),
(5, 2, '1398/5/20', 1, 0),
(6, 2, '1398/5/20', 1, 0),
(7, 2, '1398/5/20', 1, 1),
(8, 2, '1398/5/20', 1, 1),
(9, 15, '1398/5/20', 1, 1),
(10, 2, '1398/5/20', 1, 1),
(11, 2, '1398/5/22', 1, 1),
(12, 2, '1398/5/14', 1, 0),
(13, 2, '1398/5/22', 1, 0),
(14, 2, '1398/5/23', 1, 1),
(15, 2, '1398/5/14', 1, 1),
(16, 2, '1398/5/26', 1, 1),
(17, 2, '1398/5/20', 1, 1),
(18, 2, '1398/6/1', 32, 1),
(19, 23, '1398/3/4', 32, 1),
(20, 28, '1398/6/20', 32, 1),
(21, 28, '1398/6/20', 32, 1),
(22, 2, '1398/6/12', 1, 1),
(23, 2, '1398/7/17', 1, 1),
(24, 2, '1398/7/8', 1, 1);

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
  `fb_pre_invoice_scan` int(11) DEFAULT '0' COMMENT 'تایید اولیه مالی',
  `fb_verify_admin1` tinyint(1) DEFAULT '0' COMMENT 'تایید مدیر',
  `fb_send_customer` tinyint(1) DEFAULT '0' COMMENT 'تاید فروش ۱',
  `fb_verify_customer` tinyint(1) DEFAULT '0' COMMENT 'تایید مشتری',
  `fb_verify_docs` tinyint(1) DEFAULT '0' COMMENT 'تایید اسناد',
  `fb_verify_finan` tinyint(1) DEFAULT '0' COMMENT 'تایید مالی ۲',
  `fb_amount_sent` int(11) NOT NULL DEFAULT '0' COMMENT 'مقدار ارسال شده',
  `fb_status` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'پایان یافته؟'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `factor_body`
--

INSERT INTO `factor_body` (`fb_id`, `f_id`, `p_id`, `cat_id`, `fb_quantity`, `fb_price`, `fb_pre_invoice_scan`, `fb_verify_admin1`, `fb_send_customer`, `fb_verify_customer`, `fb_verify_docs`, `fb_verify_finan`, `fb_amount_sent`, `fb_status`) VALUES
(1, 1, 2, 1, 200, 250000, 1, 1, 1, 1, 1, 1, 106, 0),
(3, 3, 2, 1, 200, 200000, 1, 1, 1, 1, 1, 1, 200, 1),
(4, 3, 2, 1, 300, 250000, 1, 1, 1, 1, 1, 1, 300, 1),
(5, 9, 2, 1, 300, 250000, 1, 1, 0, 0, 0, 0, 0, 0),
(6, 10, 2, 1, 300, 250000, 1, 1, 1, 1, 1, 1, 300, 1),
(7, 11, 2, 1, 300, 250000, 1, 0, 0, 0, 0, 0, 0, 0),
(8, 15, 2, 1, 300, 250000, 0, 0, 0, 0, 0, 0, 0, 0),
(9, 18, 2, 1, 25000, 5500, 0, 0, 0, 0, 0, 0, 0, 0),
(10, 19, 2, 1, 12000, 6000, 1, 1, 1, 1, 1, 1, 12000, 1),
(11, 21, 2, 5, 5000, 5500, 0, 0, 0, 0, 0, 0, 0, 0),
(12, 22, 2, 1, 2500, 2000, 1, 1, 1, 1, 1, 1, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `factor_buy`
--

CREATE TABLE `factor_buy` (
  `f_id` int(11) NOT NULL COMMENT 'کد فاکتور',
  `c_id` int(11) NOT NULL COMMENT 'کد تامین کننده',
  `f_date` varchar(16) NOT NULL COMMENT 'تاریخ ثبت فاکتور',
  `u_id` int(11) NOT NULL COMMENT 'کد کاربر',
  `f_VAT_status` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'وضعیت گواهی ارزش افزوده'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `factor_buy`
--

INSERT INTO `factor_buy` (`f_id`, `c_id`, `f_date`, `u_id`, `f_VAT_status`) VALUES
(1, 16, '1398/5/13', 1, 0),
(2, 16, '1398/5/13', 1, 0),
(3, 16, '1398/5/22', 1, 0),
(4, 16, '1', 1, 0),
(5, 16, '1398/5/26', 1, 0),
(6, 16, '1398/5/20', 1, 0),
(7, 16, '1398/5/26', 1, 0),
(8, 16, '1398/5/8', 1, 0),
(9, 16, '1398/5/28', 1, 0),
(10, 16, '1398/5/31', 1, 0),
(11, 16, '1398/5/31', 1, 0),
(12, 16, '1398/5/11', 32, 0),
(13, 15, '1398/5/14', 32, 0),
(14, 16, '1398/5/8', 32, 0),
(15, 16, '1398/5/23', 32, 0),
(16, 16, '1398/5/13', 32, 0),
(17, 16, '1398/6/18', 1, 0),
(18, 4, '1398/7/11', 1, 0),
(19, 4, '1398/7/11', 1, 0),
(20, 4, '1398/3/4', 1, 0),
(21, 4, '1398/6/20', 1, 0),
(22, 4, '1398/7/11', 1, 0),
(23, 4, '1398/6/12', 1, 0),
(24, 3, '1398/7/11', 1, 0),
(25, 3, '1398/7/11', 1, 0),
(26, 3, '1398/7/11', 1, 0),
(27, 3, '1398/7/11', 1, 0),
(28, 3, '1398/7/11', 1, 0),
(29, 3, '1398/7/11', 1, 0),
(30, 3, '1398/7/11', 1, 0),
(31, 3, '1398/7/11', 1, 0),
(32, 3, '1398/7/11', 1, 0),
(33, 3, '1398/7/11', 1, 0),
(34, 3, '1398/7/11', 1, 0),
(35, 3, '1398/7/11', 1, 0),
(36, 4, '1398/7/11', 1, 0),
(37, 4, '1398/7/11', 1, 0),
(38, 3, '1398/7/11', 1, 0),
(39, 4, '1398/7/11', 1, 0),
(40, 4, '1398/7/11', 1, 0),
(41, 4, '1398/7/11', 1, 0),
(42, 3, '1398/7/11', 1, 0),
(43, 3, '1398/7/12', 1, 0),
(44, 4, '1398/7/12', 1, 0),
(45, 4, '1398/7/12', 1, 0),
(46, 3, '1398/7/12', 1, 0),
(47, 3, '1398/7/12', 1, 0),
(48, 3, '1398/7/12', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `factor_buy_body`
--

CREATE TABLE `factor_buy_body` (
  `fb_id` int(11) NOT NULL COMMENT 'کد ردیف فاکتور خرید',
  `f_id` int(11) NOT NULL COMMENT 'کد فاکتور خرید',
  `rm_id` int(11) NOT NULL COMMENT 'کد ماده اولیه',
  `cat_id` int(11) NOT NULL COMMENT 'کد دسته بندی',
  `fb_quantity` float NOT NULL COMMENT 'مقدار',
  `fb_price` double NOT NULL COMMENT 'مبلغ',
  `fb_pre_invoice_scan` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'تایید اولیه مالی',
  `fb_verify_admin1` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'تایید مدیر',
  `fb_send_customer` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'تاید فروش ۱',
  `fb_verify_customer` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'تایید مشتری',
  `fb_verify_docs` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'تایید اسناد',
  `fb_verify_finan` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'تایید مالی ۲',
  `fb_outsourcing` varchar(10) DEFAULT NULL COMMENT 'برون سپاری؟',
  `fb_amount_get` int(11) NOT NULL DEFAULT '0' COMMENT 'مقدار دریافت شده',
  `fb_status` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'پایان یافته؟'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='ردیف های فاکتور فروش';

--
-- Dumping data for table `factor_buy_body`
--

INSERT INTO `factor_buy_body` (`fb_id`, `f_id`, `rm_id`, `cat_id`, `fb_quantity`, `fb_price`, `fb_pre_invoice_scan`, `fb_verify_admin1`, `fb_send_customer`, `fb_verify_customer`, `fb_verify_docs`, `fb_verify_finan`, `fb_outsourcing`, `fb_amount_get`, `fb_status`) VALUES
(3, 7, 9, 1, 10000, 12222, 1, 1, 1, 1, 1, 1, 'yes', 10, 1),
(5, 7, 9, 1, 10000, 250000, 1, 1, 1, 1, 1, 1, 'no', 5, 1),
(7, 9, 10, 2, 10000, 210000, 1, 1, 1, 1, 1, 1, 'yes', 1000, 1),
(8, 11, 12, 2, 1000, 250000, 1, 1, 1, 1, 1, 1, 'yes', 0, 0),
(9, 15, 12, 2, 556545, 5400, 1, 1, 1, 1, 1, 1, NULL, 0, 0),
(10, 17, 13, 4, 50000, 3600, 1, 1, 1, 1, 1, 1, 'no', 0, 0),
(11, 23, 54, 5, 1000, 10000, 0, 0, 0, 0, 0, 0, NULL, 0, 0),
(12, 27, 54, 5, 1000, 1000, 0, 0, 0, 0, 0, 0, NULL, 0, 0),
(13, 29, 54, 5, 10000, 10000, 0, 0, 0, 0, 0, 0, NULL, 0, 0),
(14, 29, 54, 5, 100000, 10000000, 0, 0, 0, 0, 0, 0, NULL, 0, 0),
(15, 30, 54, 5, 10000, 1000000, 0, 0, 0, 0, 0, 0, NULL, 0, 0),
(16, 31, 54, 5, 1000, 100, 0, 0, 0, 0, 0, 0, NULL, 0, 0),
(17, 34, 54, 5, 1000, 1000, 0, 0, 0, 0, 0, 0, NULL, 0, 0),
(18, 34, 54, 5, 100, 1000, 0, 0, 0, 0, 0, 0, NULL, 0, 0),
(19, 36, 54, 5, 10000, 100, 0, 0, 0, 0, 0, 0, NULL, 0, 0),
(20, 37, 54, 5, 420, 45, 0, 0, 0, 0, 0, 0, NULL, 0, 0),
(21, 38, 54, 5, 10, 420, 0, 0, 0, 0, 0, 0, NULL, 0, 0),
(22, 43, 54, 5, 100000, 10000, 0, 0, 0, 0, 0, 0, NULL, 0, 0),
(23, 44, 54, 5, 10, 10, 0, 0, 0, 0, 0, 0, NULL, 0, 0),
(24, 45, 54, 5, 1000, 10000, 0, 0, 0, 0, 0, 0, NULL, 0, 0),
(25, 46, 54, 5, 100, 10000, 0, 0, 0, 0, 0, 0, NULL, 0, 0),
(26, 46, 54, 5, 100, 1000, 0, 0, 0, 0, 0, 0, NULL, 0, 0),
(27, 47, 54, 5, 1000, 1000, 0, 0, 0, 0, 0, 0, NULL, 0, 0),
(28, 48, 54, 5, 2500, 222, 0, 0, 0, 0, 0, 0, NULL, 0, 0);

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
(1, 1, '1398/05/27 11:10', 5, ''),
(2, 1, '1398/05/27 11:10', 5, ''),
(3, 1, '1398/05/27 11:10', 5, ''),
(4, 1, '1398/05/27 11:10', 5, ''),
(5, 1, '1398/05/27 11:12', 5, ''),
(6, 1, '1398/05/27 11:40', 5, ''),
(7, 1, '1398/05/27 11:40', 5, ''),
(8, 1, '1398/05/27 19:57', 3, ''),
(9, 1, '1398/05/27 19:57', 3, ''),
(10, 1, '1398/05/27 19:57', 3, ''),
(11, 1, '1398/05/27 19:57', 3, ''),
(12, 1, '1398/05/27 19:57', 3, ''),
(13, 1, '1398/05/27 19:57', 3, ''),
(14, 1, '1398/05/28 18:33', 7, ''),
(15, 1, '1398/05/28 18:34', 7, ''),
(16, 1, '1398/05/28 18:34', 7, ''),
(17, 1, '1398/05/28 18:34', 7, ''),
(18, 1, '1398/05/28 18:34', 7, ''),
(19, 1, '1398/05/28 18:34', 7, ''),
(20, 1, '1398/05/31 10:23', 8, ''),
(21, 1, '1398/05/31 10:23', 8, ''),
(22, 1, '1398/05/31 10:23', 8, ''),
(23, 1, '1398/05/31 10:25', 8, ''),
(24, 1, '1398/05/31 10:25', 8, ''),
(25, 1, '1398/05/31 10:25', 8, ''),
(26, 1, '1398/05/31 12:02', 9, ''),
(27, 1, '1398/05/31 12:03', 9, 'hkfyt'),
(28, 1, '1398/05/31 12:03', 9, ''),
(29, 1, '1398/05/31 12:03', 9, ''),
(30, 1, '1398/05/31 12:03', 9, ''),
(31, 1, '1398/05/31 12:03', 9, ''),
(32, 1, '1398/06/25 11:54', 10, ''),
(33, 1, '1398/06/25 11:55', 10, ''),
(34, 1, '1398/06/25 11:55', 10, ''),
(35, 1, '1398/06/25 11:55', 10, ''),
(36, 1, '1398/06/25 11:55', 10, ''),
(37, 1, '1398/06/25 11:55', 10, '');

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
(14, 1, '1398/05/16 18:54', 4, '', 0, 0, 0, 0, 0),
(13, 1, '1398/05/16 18:54', 4, '', 0, 0, 0, 0, 0),
(12, 1, '1398/05/16 18:54', 4, '', 0, 0, 0, 0, 0),
(11, 1, '1398/05/16 18:54', 4, '', 0, 0, 0, 0, 0),
(10, 1, '1398/05/16 18:54', 4, '', 0, 0, 0, 0, 0),
(9, 1, '1398/05/16 18:53', 4, '', 0, 0, 0, 0, 0),
(8, 1, '1398/05/16 18:53', 4, '', 0, 0, 0, 0, 0),
(15, 1, '1398/05/16 18:55', 4, NULL, 100, 2, 1, 1, 1),
(16, 1, '1398/05/17 09:25', 4, NULL, 100, 3, 1, 7, 1),
(17, 1, '1398/05/20 12:23', 3, '', 0, 0, 0, 0, 0),
(18, 1, '1398/05/20 12:24', 3, '', 0, 0, 0, 0, 0),
(19, 1, '1398/05/20 12:24', 3, '', 0, 0, 0, 0, 0),
(20, 1, '1398/05/20 12:27', 3, '', 0, 0, 0, 0, 0),
(21, 1, '1398/05/20 12:28', 3, '', 0, 0, 0, 0, 0),
(22, 1, '1398/05/20 12:28', 1, '', 0, 0, 0, 0, 0),
(23, 1, '1398/05/20 12:31', 1, '', 0, 0, 0, 0, 0),
(24, 1, '1398/05/20 12:32', 1, '', 0, 0, 0, 0, 0),
(25, 1, '1398/05/20 12:33', 1, '', 0, 0, 0, 0, 0),
(26, 1, '1398/05/20 12:33', 1, '', 0, 0, 0, 0, 0),
(27, 1, '1398/05/20 12:34', 1, '', 0, 0, 0, 0, 0),
(28, 1, '1398/05/20 12:35', 3, '', 0, 0, 0, 0, 0),
(29, 1, '1398/05/20 12:39', 3, NULL, 100, 3, 1, 3, 1),
(30, 1, '1398/05/20 17:53', 4, NULL, 100, 3, 1, 2, 0),
(31, 1, '1398/05/20 18:04', 3, NULL, 100, 3, 1, 6, 1),
(32, 1, '1398/05/20 19:12', 5, '', 0, 0, 0, 0, 0),
(33, 1, '1398/05/20 19:12', 5, '', 0, 0, 0, 0, 0),
(34, 1, '1398/05/20 19:16', 5, '', 0, 0, 0, 0, 0),
(35, 1, '1398/05/20 19:17', 5, '', 0, 0, 0, 0, 0),
(36, 1, '1398/05/20 19:19', 5, '', 0, 0, 0, 0, 0),
(37, 1, '1398/05/20 19:20', 5, '', 0, 0, 0, 0, 0),
(38, 1, '1398/05/20 19:20', 5, '', 0, 0, 0, 0, 0),
(39, 1, '1398/05/20 19:22', 5, '', 0, 0, 0, 0, 0),
(40, 1, '1398/05/20 19:22', 5, '', 0, 0, 0, 0, 0),
(41, 1, '1398/05/20 19:24', 5, '', 0, 0, 0, 0, 0),
(42, 1, '1398/05/20 19:24', 5, '', 0, 0, 0, 0, 0),
(43, 1, '1398/05/20 19:24', 6, '', 0, 0, 0, 0, 0),
(44, 1, '1398/05/20 19:24', 6, '', 0, 0, 0, 0, 0),
(45, 1, '1398/05/20 19:24', 6, '', 0, 0, 0, 0, 0),
(46, 1, '1398/05/20 19:25', 6, '', 0, 0, 0, 0, 0),
(47, 1, '1398/05/20 19:25', 6, '', 0, 0, 0, 0, 0),
(48, 1, '1398/05/20 19:25', 6, '', 0, 0, 0, 0, 0),
(49, 1, '1398/05/20 19:25', 6, NULL, 100, 3, 1, 4, 1),
(50, 1, '1398/05/22 11:20', 6, NULL, 100, 3, 1, 5, 1),
(51, 1, '1398/05/22 17:11', 7, '', 0, 0, 0, 0, 0),
(52, 1, '1398/05/23 19:27', 6, NULL, 100, 3, 1, 8, 0),
(53, 1, '1398/05/23 19:28', 1, '', 0, 0, 0, 0, 0),
(54, 1, '1398/05/23 19:28', 1, NULL, 1, 3, 1, 9, 0),
(55, 1, '1398/05/23 19:50', 1, NULL, 1, 3, 1, 0, 0),
(56, 1, '1398/05/23 20:22', 1, NULL, 3, 3, 1, 12, 1),
(57, 1, '1398/05/26 09:19', 1, NULL, 1, 3, 1, 0, 0),
(58, 1, '1398/05/31 12:07', 1, NULL, 100, 0, 0, 0, 0),
(59, 1, '1398/05/31 12:09', 10, '', 0, 0, 0, 0, 0),
(60, 1, '1398/05/31 12:09', 10, '', 0, 0, 0, 0, 0),
(61, 1, '1398/05/31 12:09', 10, '', 0, 0, 0, 0, 0),
(62, 1, '1398/05/31 12:10', 10, '', 0, 0, 0, 0, 0),
(63, 1, '1398/05/31 12:10', 10, '', 0, 0, 0, 0, 0),
(64, 1, '1398/05/31 12:10', 10, '', 0, 0, 0, 0, 0),
(65, 1, '1398/05/31 12:11', 10, NULL, 12000, 3, 1, 13, 1),
(66, 1, '1398/06/25 11:57', 12, '', 0, 0, 0, 0, 0),
(67, 1, '1398/06/25 11:57', 12, '', 0, 0, 0, 0, 0),
(68, 1, '1398/06/25 11:58', 12, '', 0, 0, 0, 0, 0),
(69, 1, '1398/06/25 11:58', 12, '', 0, 0, 0, 0, 0),
(70, 1, '1398/06/25 11:58', 12, '', 0, 0, 0, 0, 0),
(71, 1, '1398/06/25 11:58', 12, '', 0, 0, 0, 0, 0);

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
(6, 33, 19, '1398/6/27', 1);

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
(5, '1566112239254.png', 'buy_pre_invoice_sale', 'check', 5);

-- --------------------------------------------------------

--
-- Table structure for table `media_factor`
--

CREATE TABLE `media_factor` (
  `mf_id` int(11) NOT NULL,
  `fb_id` int(11) NOT NULL,
  `mf_link` text CHARACTER SET utf8 NOT NULL,
  `mf_date` varchar(12) CHARACTER SET utf16 NOT NULL,
  `mf_name` varchar(50) CHARACTER SET utf8 NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `media_factor`
--

INSERT INTO `media_factor` (`mf_id`, `fb_id`, `mf_link`, `mf_date`, `mf_name`) VALUES
(1, 23, 'pictures/1398/7/42311570189045.jpg', '1398/7/12', 'invoice'),
(2, 23, 'pictures/1398/7/234761570189045.png', '1398/7/12', 'invoice'),
(8, 25, '1570193490562.jpg', '1398/7/12', 'invoice'),
(6, 24, '1570192920103.jpg', '1398/7/12', 'invoice'),
(22, 27, '1570195069114.jpg', '1398/7/12', 'invoice'),
(23, 28, '1570200786598.jpg', '1398/7/12', 'invoice');

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
-- Table structure for table `produce`
--

CREATE TABLE `produce` (
  `prc_id` int(11) NOT NULL COMMENT 'کد تولید',
  `prc_date` varchar(12) DEFAULT NULL,
  `prc_sh_id` int(11) DEFAULT NULL,
  `prc_p_id` int(11) DEFAULT NULL,
  `prc_cat_id` int(11) DEFAULT NULL,
  `prc_val` bigint(20) NOT NULL DEFAULT '0' COMMENT 'مقدار',
  `prc_status` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'اضافه شده'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `produce`
--

INSERT INTO `produce` (`prc_id`, `prc_date`, `prc_sh_id`, `prc_p_id`, `prc_cat_id`, `prc_val`, `prc_status`) VALUES
(1, '', 1, 2, 1, 1000, 1),
(2, '1398/5/31', 1, 2, 1, 5000, 0),
(3, '1398/5/31', 2, 2, 1, 5500, 0),
(4, '1398/6/1', 2, 2, 1, 5000, 0),
(5, '1398/6/1', 1, 2, 1, 5700, 0);

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
(19, 'سه', 'تن', 'محصول جانبی'),
(17, 'یک', 'تن', 'محصول'),
(18, 'دو', 'تن', 'محصول'),
(20, 'چهار', 'کیلوگرم', 'محصول'),
(21, 'پنج', 'کیلوگرم', 'محصول جانبی');

-- --------------------------------------------------------

--
-- Table structure for table `raw_material`
--

CREATE TABLE `raw_material` (
  `rm_id` int(11) NOT NULL,
  `rm_name` varchar(20) DEFAULT NULL COMMENT 'نام مواد اولیه',
  `rm_unit` varchar(20) DEFAULT NULL COMMENT 'واحد مواد اولیه'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `raw_material`
--

INSERT INTO `raw_material` (`rm_id`, `rm_name`, `rm_unit`) VALUES
(54, 'موز', 'کیلوگرم');

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
(6, 3, 2, 600, 200000, 400000);

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
(26, 8, 1, 200, 200000, 250000);

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
  `u_end_work` varchar(11) DEFAULT NULL COMMENT 'تاریخ ترک کار'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`u_id`, `u_name`, `u_family`, `u_level`, `u_username`, `u_password`, `u_father`, `u_meli`, `u_birth`, `u_live_city`, `u_destination`, `u_mobile`, `u_tell`, `u_address`, `u_pre`, `u_group`, `u_description`, `u_pcode`, `u_wtype`, `u_marital`, `u_evidence`, `u_child_count`, `u_daily_wage`, `u_fix_right`, `u_fin_contract`, `u_cart`, `u_hesab`, `u_shaba`, `u_birth_city`, `u_cert_number`, `u_cert_city`, `u_start_work`, `u_end_work`) VALUES
(1, 'گراتک', '', 'مدیر', 'gratech', '1456', '', '', '', '', '', '09138630341', '', '', '', '1', '', '', '', 'مجرد', '', 0, 0, 0, '', '', '', '', 'رفسنجان', '', '', '', ''),
(32, 'حسین', 'عباسی', 'فروش', 'abbasi', '1234', '', '', '', '', '', '09378560820', '', '', '', '2', '', '', '', 'مجرد', '', 0, 0, 0, '', '', '', '', '', '', '', '', ''),
(31, '', 'عزیزی', 'مالی', 'azizi', '1234', '', '', '', '', '', '09139082558', '', '', '', '', '', '', '', 'مجرد', '', 0, 0, 0, '', '', '', '', '', '', '', '', ''),
(33, 'محمود', 'ملاک', 'اسناد', 'mallak', '1234', '', '', '', '', '', '09139923053', '', '', '', '2', '', '', '', 'مجرد', '', 0, 0, 0, '', '', '', '', '', '', '', '', ''),
(40, 'مسول آزمایشگاه', '', 'آزمایشگاه', 'lab', 'lab', '', '', '', '', '', '', '', '', '', '', '', '', '', 'مجرد', '', 0, 0, 0, '', '', '', '', '', '', '', '', ''),
(41, 'حبیب الله', 'پیله وری', 'مدیر', 'pilevary', '1234', '', '', '', '', '', '09123729651', '', '', '', '', '', '', '', 'مجرد', '', 0, 0, 0, '', '', '', '', '', '', '', '', '');

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
-- Indexes for table `raw_material`
--
ALTER TABLE `raw_material`
  ADD PRIMARY KEY (`rm_id`);

--
-- Indexes for table `raw_rights`
--
ALTER TABLE `raw_rights`
  ADD PRIMARY KEY (`rr_id`);

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
  MODIFY `analyze_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `bar_bring`
--
ALTER TABLE `bar_bring`
  MODIFY `bar_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'کد بار', AUTO_INCREMENT=32;
--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `doc_type`
--
ALTER TABLE `doc_type`
  MODIFY `d_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `driver`
--
ALTER TABLE `driver`
  MODIFY `dr_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'کد راننده', AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `factor`
--
ALTER TABLE `factor`
  MODIFY `f_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `factor_body`
--
ALTER TABLE `factor_body`
  MODIFY `fb_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'کد ردیف فاکتور فروش', AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `factor_buy`
--
ALTER TABLE `factor_buy`
  MODIFY `f_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'کد فاکتور', AUTO_INCREMENT=49;
--
-- AUTO_INCREMENT for table `factor_buy_body`
--
ALTER TABLE `factor_buy_body`
  MODIFY `fb_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'کد ردیف فاکتور خرید', AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT for table `factor_buy_log`
--
ALTER TABLE `factor_buy_log`
  MODIFY `l_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
--
-- AUTO_INCREMENT for table `factor_log`
--
ALTER TABLE `factor_log`
  MODIFY `l_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;
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
  MODIFY `hr_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `media`
--
ALTER TABLE `media`
  MODIFY `m_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `media_factor`
--
ALTER TABLE `media_factor`
  MODIFY `mf_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `media_secretariat`
--
ALTER TABLE `media_secretariat`
  MODIFY `ms_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'کد رسانه', AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT for table `payroll`
--
ALTER TABLE `payroll`
  MODIFY `prl_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'کد جدول';
--
-- AUTO_INCREMENT for table `produce`
--
ALTER TABLE `produce`
  MODIFY `prc_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'کد تولید', AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `raw_material`
--
ALTER TABLE `raw_material`
  MODIFY `rm_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;
--
-- AUTO_INCREMENT for table `raw_rights`
--
ALTER TABLE `raw_rights`
  MODIFY `rr_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'کد جدول';
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
  MODIFY `s_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'کد ردیف', AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `stock_log`
--
ALTER TABLE `stock_log`
  MODIFY `p_id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `stock_material`
--
ALTER TABLE `stock_material`
  MODIFY `sm_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ردیف', AUTO_INCREMENT=27;
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
  MODIFY `u_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
