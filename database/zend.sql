-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 19, 2016 at 06:55 PM
-- Server version: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `zend`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE IF NOT EXISTS `cart` (
`id` tinyint(4) NOT NULL,
  `code` varchar(10) NOT NULL,
  `product_id` varchar(200) NOT NULL,
  `price` varchar(500) NOT NULL,
  `quantity` varchar(100) NOT NULL,
  `total_product` int(11) NOT NULL,
  `size_name` varchar(500) NOT NULL,
  `voucher` varchar(5) NOT NULL,
  `total_money` decimal(10,0) NOT NULL,
  `user_id` int(11) NOT NULL,
  `customer_name` varchar(100) NOT NULL,
  `phone` int(12) NOT NULL,
  `email` varchar(50) NOT NULL,
  `ip_address` varchar(20) NOT NULL,
  `note` varchar(300) NOT NULL,
  `shipping_address` varchar(200) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `time_order` datetime NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=125 ;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `code`, `product_id`, `price`, `quantity`, `total_product`, `size_name`, `voucher`, `total_money`, `user_id`, `customer_name`, `phone`, `email`, `ip_address`, `note`, `shipping_address`, `status`, `time_order`) VALUES
(100, '28CL5V', '["33","64","55"]', '["145000","550000","370000"]', '["1","1","1"]', 3, '["default","default","default"]', '', '1065000', 0, 'duyquang', 1286483732, '01286483732', '127.0.0.1', '', '', 2, '2014-03-25 00:00:20'),
(101, 'BCDZQH', '["64","62"]', '["550000","120000"]', '["1","1"]', 2, '["default","default"]', '', '670000', 1, 'Duy Quang', 1286483732, 'Admin01@gmail.com', '127.0.0.1', '', '', 2, '2015-03-25 00:31:48'),
(102, 'WGOTCM', '51', '170000', '1', 1, '', '', '170000', 0, 'duyquang', 0, '', '127.0.0.1', '', '', 5, '2016-03-25 00:43:27'),
(103, 'WM3KQV', '["58","37"]', '["290000","95580"]', '["1","1"]', 2, '["default","default"]', '', '385580', 0, 'duyquang', 0, '', '127.0.0.1', '', '', 4, '2016-03-25 01:39:26'),
(104, '9FGUOY', '73', '130000', '1', 1, '', '', '130000', 0, 'Duy Quang', 1286483732, 'Admin01@gmail.com', '127.0.0.1', '', '', 4, '2016-05-07 19:03:03'),
(105, 'B25WJP', '61', '100000', '1', 1, '', '', '100000', 0, 'Duy Quang', 1286483732, 'Admin01@gmail.com', '127.0.0.1', '', '', 4, '2016-05-06 19:03:44'),
(106, '0SYJVF', '["72","71"]', '["110000","120000"]', '["1","1"]', 2, '["default","default"]', '', '230000', 1, 'Duy Quang', 1286483732, 'Admin01@gmail.com', '127.0.0.1', '', '', 5, '2016-02-01 19:57:56'),
(107, 'W9TNCA', '["71","72"]', '["120000","110000"]', '["1","1"]', 2, '["default","default"]', '', '230000', 0, 'Thượng', 1286483732, 'duy_quang422@yahoo.com', '127.0.0.1', '', '', 4, '2016-05-06 19:59:44'),
(108, '9T2WAS', '74', '210000', '1', 1, '', '', '210000', 0, '', 0, '', '127.0.0.1', '', '', 4, '2016-05-07 00:00:33'),
(109, '8B5USH', '["74","73","72"]', '["210000","130000","110000"]', '["1","1","1"]', 3, '["default","default","default"]', '', '450000', 0, '', 0, '', '127.0.0.1', '', '', 4, '2016-05-07 00:01:21'),
(110, 'DPJQMG', '33', '145000', '1', 1, '', '', '145000', 0, 'Duy Quang', 1286483732, 'Admin01@gmail.com', '127.0.0.1', '', '', 4, '2016-05-02 20:04:16'),
(111, '02ZAM1', '["71","70","72"]', '["120000","259900","110000"]', '["1","1","1"]', 3, '["default","default","default"]', '', '489900', 1, 'Administrator', 1286483732, 'Admin01@gmail.com', '::1', '', '', 5, '2016-05-07 10:38:08'),
(112, 'DJCI8E', '["73","55","60","64"]', '["130000","370000","230000","550000"]', '["1","1","1","1"]', 4, '["default","default","default","default"]', '', '1280000', 1, 'Administrator', 1286483732, 'Admin01@gmail.com', '::1', '', '', 4, '2016-05-05 10:38:45'),
(113, '4O5LF8', '["60"]', '["230000"]', '["1"]', 1, '["default"]', '', '230000', 1, 'Administrator', 1286483732, 'Admin01@gmail.com', '::1', '', '', 5, '2016-05-06 10:39:14'),
(114, 'Q2I410', '["74","60","54","59","33"]', '["210000","230000","250000","120000","145000"]', '["1","1","1","1","1"]', 5, '["default","default","default","default","default"]', '', '955000', 1, 'Administrator', 1286483732, 'Admin01@gmail.com', '::1', '', '', 4, '2016-05-04 10:40:00'),
(115, 'H05WI1', '61', '130000', '1', 1, 'XL', '', '130000', 0, 'Administrator', 1286483732, 'Admin01@gmail.com', '::1', '', '', 5, '2016-05-09 15:01:57'),
(116, 'VK530Y', '53', '250000', '1', 1, '', '', '250000', 0, 'Nguyễn Duy Quang', 1286483732, 'duy_quang422@yahoo.com', '::1', '', '', 0, '2016-05-14 21:00:08'),
(117, '9JAS80', '53', '250000', '1', 1, '', '', '250000', 0, 'Nguyễn Duy Quang', 1286483732, 'duy_quang422@yahoo.com', '::1', '', '', 0, '2016-05-14 21:02:19'),
(118, 'DHB05T', '53', '250000', '1', 1, '', '', '250000', 0, 'Nguyễn Duy Quang', 1286483732, 'duy_quang422@yahoo.com', '::1', '', '', 0, '2016-05-14 21:09:13'),
(119, 'O54RN3', '53', '250000', '3', 1, '', '', '750000', 0, 'Nguyễn Duy Quang', 1286483732, 'duy_quang422@yahoo.com', '::1', '', '', 0, '2016-05-14 21:26:30'),
(120, 'UBEGN5', '53', '250000', '3', 1, '', '', '750000', 0, 'Nguyễn Duy Quang', 1286483732, 'duy_quang422@yahoo.com', '::1', '', '', 0, '2016-05-14 21:28:20'),
(121, '5GRWQX', '53', '250000', '1', 1, '', '', '250000', 0, 'Nguyễn Duy Quang', 1286483732, 'duy_quang422@yahoo.com', '::1', '', '', 0, '2016-05-14 21:29:33'),
(122, 'VZJMIS', '["73","70"]', '["130000","259900"]', '["1","1"]', 2, '["default","default"]', '', '389900', 0, 'Nguyễn Duy Quang', 1286483732, 'duy_quang422@yahoo.com', '::1', '', '', 0, '2016-05-14 21:38:36'),
(123, '053WS1', '["74","75"]', '["210000","310000"]', '["5","8"]', 13, '["default","default"]', '', '520000', 0, 'Nguyễn Duy Quang', 1286483732, 'duy_quang422@yahoo.com', '::1', '', '', 0, '2016-05-14 21:43:07'),
(124, '6PV52A', '["74","75"]', '["210000","310000"]', '["9","20"]', 29, '["default","default"]', '', '520000', 0, 'Nguyễn Duy Quang', 1286483732, 'duy_quang422@yahoo.com', '::1', '', '', 0, '2016-05-14 21:45:04');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
`id` int(10) unsigned NOT NULL,
  `name` varchar(200) CHARACTER SET utf8 NOT NULL,
  `alias` varchar(100) CHARACTER SET utf8 NOT NULL,
  `image` varchar(50) NOT NULL,
  `description` text CHARACTER SET utf8 NOT NULL,
  `status` tinyint(1) NOT NULL,
  `parent` int(11) NOT NULL DEFAULT '0',
  `level` int(11) NOT NULL DEFAULT '0',
  `left` int(11) NOT NULL,
  `right` int(11) NOT NULL,
  `special` tinyint(4) NOT NULL,
  `created_date` datetime NOT NULL,
  `created_by` varchar(70) CHARACTER SET utf8 NOT NULL,
  `modified_date` datetime NOT NULL,
  `modified_by` varchar(70) CHARACTER SET utf8 NOT NULL,
  `hits` int(11) NOT NULL,
  `meta_description` varchar(200) CHARACTER SET utf8 NOT NULL,
  `meta_keyword` varchar(200) CHARACTER SET utf8 NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=187 ;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `alias`, `image`, `description`, `status`, `parent`, `level`, `left`, `right`, `special`, `created_date`, `created_by`, `modified_date`, `modified_by`, `hits`, `meta_description`, `meta_keyword`) VALUES
(166, 'thiết bị mạng', 'thiet-bi-mang', 'category_a3UrBv2W.jpg', '', 1, 138, 2, 70, 71, 0, '2015-10-31 00:00:00', '', '2015-11-07 00:00:00', '', 0, '', ''),
(165, 'thiết bị âm thanh', 'thiet-bi-am-thanh', 'category_alLzMeip.jpg', '', 1, 138, 2, 68, 69, 0, '2015-10-31 00:00:00', '', '2015-11-07 00:00:00', '', 0, '', ''),
(164, 'Phụ kiện máy tính', 'phu-kien-may-tinh', 'category_fIUPQ25V.jpg', '', 1, 138, 2, 66, 67, 0, '2015-10-31 00:00:00', '', '2015-11-07 00:00:00', '', 0, '', ''),
(163, 'Phụ kiện điện thoại', 'phu-kien-dien-thoai', 'category_geURv1DF.jpg', '', 1, 138, 2, 64, 65, 0, '2015-10-31 00:00:00', '', '2015-11-07 00:00:00', '', 0, '', ''),
(1, 'Root', 'root', '', '', 1, 0, 0, 0, 87, 0, '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '', 0, '', ''),
(162, 'trang điểm mặt', 'trang-diem-mat', 'category_PckJFylE.jpg', '', 1, 137, 2, 60, 61, 0, '2015-10-31 00:00:00', '', '2016-03-30 00:00:00', '', 0, '', ''),
(161, 'nước hoa', 'nuoc-hoa', 'category_T1miGncN.jpg', '', 1, 137, 2, 58, 59, 0, '2015-10-31 00:00:00', '', '2015-11-07 00:00:00', '', 0, '', ''),
(160, 'Tóc', 'toc', 'category_gmvut6Pi.jpg', '', 1, 137, 2, 56, 57, 0, '2015-10-31 00:00:00', '', '2015-11-07 00:00:00', '', 0, '', ''),
(159, 'Chăm sóc da nữ', 'cham-soc-da-nu', 'category_nyc6fd8x.jpg', '', 1, 137, 2, 54, 55, 0, '2015-10-31 00:00:00', '', '2015-11-07 00:00:00', '', 0, '', ''),
(158, 'Phụ kiện', 'phu-kien', 'category_letLyWIr.jpg', '', 1, 136, 2, 50, 51, 0, '2015-10-31 00:00:00', '', '2015-11-07 00:00:00', '', 0, '', ''),
(157, 'Đồng hồ cho bé', 'dong-ho-cho-be', 'category_34zZlY6u.jpg', '', 1, 136, 2, 48, 49, 0, '2015-10-31 00:00:00', '', '2015-11-07 00:00:00', '', 0, '', ''),
(156, 'Đồng hồ khác', 'dong-ho-khac', 'category_1oSf9lCp.jpg', '', 1, 136, 2, 46, 47, 0, '2015-10-31 00:00:00', '', '2015-11-07 00:00:00', '', 0, '', ''),
(155, 'Đồng hồ nữ', 'dong-ho-nu', 'category_37NHiUjh.jpg', '', 1, 136, 2, 44, 45, 0, '2015-10-31 00:00:00', '', '2015-11-07 00:00:00', '', 0, '', ''),
(133, 'Thời trang nữ', 'thoi-trang-nu', 'category_73UCoRQe.jpg', '<p>Con gái luôn rất chú trọng đến vẻ ngoài, dù là đến công sở, khi dạo phố hoặc đi dự tiệc,... Cũng chính vì vậy mà con gái và <strong>thời trang nữ</strong> dường như là hai khái niệm luôn song hành cùng nhau.</p>\r\n', 1, 1, 1, 1, 14, 0, '2015-10-31 00:00:00', '', '2016-04-19 00:00:00', 'Duy Quang', 0, '', ''),
(134, 'Thời trang nam', 'thoi-trang-nam', 'category_6Cmrqhux.jpg', '<p>Hãy tô thêm vẻ đẹp trai và đầy phong cách cho bạn nhé.</p>\r\n', 1, 1, 1, 15, 28, 0, '2015-10-31 00:00:00', '', '2016-01-05 00:00:00', '', 0, '', ''),
(135, 'Mẹ và bé', 'me-va-be', 'category_9SXMA7VI.jpg', '', 1, 1, 1, 29, 40, 0, '2015-10-31 00:00:00', '', '2015-12-06 00:00:00', '', 0, '', ''),
(136, 'Đồng hồ', 'dong-ho', 'category_i5svLWmO.jpg', '', 1, 1, 1, 41, 52, 0, '2015-10-31 00:00:00', '', '2015-11-07 00:00:00', '', 0, '', ''),
(137, 'Mỹ phẩm', 'my-pham', 'category_eTILa8sE.jpg', '', 1, 1, 1, 53, 62, 0, '2015-10-31 00:00:00', '', '2015-11-07 00:00:00', '', 0, '', ''),
(138, 'Phụ kiện công nghệ', 'phu-kien-cong-nghe', 'category_AMYgwPU5.JPG', '', 1, 1, 1, 63, 72, 0, '2015-10-31 00:00:00', '', '2015-11-07 00:00:00', '', 0, '', ''),
(139, 'Đồ ăn thức uống', 'do-an-thuc-uong', 'category_wlRvhKg6.jpg', '', 1, 1, 1, 73, 80, 0, '2015-10-31 00:00:00', '', '2016-03-30 00:00:00', '', 0, '', ''),
(140, 'Thể thao & giải trí', 'the-thao-giai-tri', 'category_uJErG63x.jpg', '', 1, 1, 1, 81, 86, 0, '2015-10-31 00:00:00', '', '2015-11-07 00:00:00', '', 0, '', ''),
(141, 'Áo nữ', 'ao-nu', 'category_dcN0UXp3.jpg', '<p>Hãy thể hiện sự cá tính của bạn qua những chiếc áo đầy hấp dẫn và lôi cuốn.</p>\r\n', 1, 133, 2, 12, 13, 1, '2015-10-31 00:00:00', '', '2016-01-05 00:00:00', '', 0, '', ''),
(142, 'Đầm Váy', 'dam-vay', 'category_Wu970fxh.jpg', '<p>Bạn có thích sự trang trọng, trẻ trung và đầy quyến rũ dưới những bộ đồ đầm váy đầy hấp dẫn không. Hãy đến với chúng tôi,</p>\r\n', 1, 133, 2, 2, 3, 1, '2015-10-31 00:00:00', '', '2016-01-14 00:00:00', '', 0, '', ''),
(143, 'Áo khoác', 'ao-khoac', 'category_2vDaFw9p.jpg', '<p>Mua đông ngày càng lạnh lẽo. Bạn đang tìm cho mình một bộ áo khoác đầy lịch lãm và sang trọng. Chúng tôi chuyên cung cấp cho bạn những chiếc áo khoác kiểu dáng hiện đại và trang nhã.</p>\r\n', 1, 133, 2, 4, 5, 0, '2015-10-31 00:00:00', '', '2016-01-05 00:00:00', '', 0, '', ''),
(144, 'Quần nữ', 'quan-nu', 'category_fOuTibks.png', '<p>Hãy thể hiện phong cách của bạn qua những chiếc quẩn nữ.</p>\r\n', 1, 133, 2, 6, 7, 0, '2015-10-31 00:00:00', '', '2016-01-05 00:00:00', '', 0, '', ''),
(145, 'Áo nam', 'ao-nam', 'category_8FUHLCkf.jpg', '', 1, 134, 2, 16, 17, 1, '2015-10-31 00:00:00', '', '2015-12-05 00:00:00', '', 0, '', ''),
(146, 'Áo khoác', 'ao-khoac', 'category_tTzYwQX3.jpg', '', 1, 134, 2, 18, 19, 1, '2015-10-31 00:00:00', '', '2015-12-05 00:00:00', '', 0, '', ''),
(147, 'Quần nam', 'quan-nam', 'category_zBMwQ8um.jpg', '', 1, 134, 2, 20, 21, 0, '2015-10-31 00:00:00', '', '2015-11-07 00:00:00', '', 0, '', ''),
(148, 'Giày dép nam', 'giay-dep-nam', 'category_qAkfpMxw.jpg', '', 1, 134, 2, 22, 23, 0, '2015-10-31 00:00:00', '', '2015-11-07 00:00:00', '', 0, '', ''),
(149, 'Thời trang bé gái', 'thoi-trang-be-gai', 'category_aQkOmIcy.jpg', '', 1, 135, 2, 30, 31, 1, '2015-10-31 00:00:00', '', '2015-11-07 00:00:00', '', 0, '', ''),
(150, 'Thời trang bé trai', 'thoi-trang-be-trai', 'category_3xsqtACv.jpg', '', 1, 135, 2, 32, 33, 0, '2015-10-31 00:00:00', '', '2015-11-07 00:00:00', '', 0, '', ''),
(151, 'Đồ chơi cho bé', 'do-choi-cho-be', 'category_9kwBljO3.jpg', '', 1, 135, 2, 34, 35, 0, '2015-10-31 00:00:00', '', '2015-11-07 00:00:00', '', 0, '', ''),
(152, 'Phụ kiện', 'phu-kien', 'category_VFULb0HB.jpg', '', 1, 135, 2, 36, 37, 0, '2015-10-31 00:00:00', '', '2015-11-07 00:00:00', '', 0, '', ''),
(153, 'Thời trang gia đình', 'thoi-trang-gia-dinh', 'category_A7w1D3p8.jpg', '', 1, 135, 2, 38, 39, 0, '2015-10-31 00:00:00', '', '2015-11-07 00:00:00', '', 0, '', ''),
(154, 'Đồng hồ nam', 'dong-ho-nam', 'category_B8Ro7VPS.jpg', '', 1, 136, 2, 42, 43, 0, '2015-10-31 00:00:00', '', '2015-11-07 00:00:00', '', 0, '', ''),
(167, 'Đồ dùng trong nhà', 'do-dung-trong-nha', 'category_4o0szqrW.jpg', '', 1, 139, 2, 74, 75, 0, '2015-10-31 00:00:00', '', '2015-11-07 00:00:00', '', 0, '', ''),
(168, 'Đồ điện gia dụng', 'do-dien-gia-dung', 'category_GcCgnE7q.jpg', '', 1, 139, 2, 76, 77, 0, '2015-10-31 00:00:00', '', '2015-11-07 00:00:00', '', 0, '', ''),
(169, 'Không gian nhà', 'khong-gian-nha', 'category_vNbJmOLr.jpg', '', 1, 139, 2, 78, 79, 0, '2015-10-31 00:00:00', '', '2015-11-07 00:00:00', '', 0, '', ''),
(170, 'Quần áo thể thao nam', 'quan-ao-the-thao-nam', 'category_hAsa16St.png', '', 1, 140, 2, 82, 83, 0, '2015-10-31 00:00:00', '', '2015-11-07 00:00:00', '', 0, '', ''),
(171, 'Quần áo thể thao nữ', 'quan-ao-the-thao-nu', 'category_nQBve6xR.jpg', '', 1, 140, 2, 84, 85, 0, '2015-10-31 00:00:00', '', '2015-11-07 00:00:00', '', 0, '', ''),
(179, 'Giầy dép nữ', 'giay-dep-nu', 'category_Og9d7e4F.jpg', '<p>Hãy cùng dạo phố với người thân yêu bằng những chiếc giày sinh sắn</p>\r\n', 1, 133, 2, 8, 9, 0, '2015-11-10 00:00:00', '', '2016-01-05 00:00:00', '', 0, '', ''),
(180, 'Phụ kiện', 'phu-kien', 'category_3TStw6Nm.jpg', '<p>Bạn hãy trang bị cho mình những phụ kiện để tô thêm vẻ đẹp.</p>\r\n', 1, 133, 2, 10, 11, 0, '2015-11-10 00:00:00', '', '2016-01-05 00:00:00', '', 0, '', ''),
(183, 'Đồ thể thao', 'do-the-thao', 'category_eGZoWJrP.jpg', '', 1, 134, 2, 24, 25, 0, '2015-11-10 00:00:00', '', '0000-00-00 00:00:00', '', 0, '', ''),
(184, 'Phụ kiện', 'phu-kien', 'category_46gR2Dzs.png', '', 1, 134, 2, 26, 27, 0, '2015-11-10 00:00:00', '', '0000-00-00 00:00:00', '', 0, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE IF NOT EXISTS `comment` (
`id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `user_id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `ip` varchar(20) NOT NULL,
  `parent_id` int(11) NOT NULL,
  `content` varchar(2000) NOT NULL,
  `status` int(11) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`id`, `product_id`, `username`, `user_id`, `email`, `ip`, `parent_id`, `content`, `status`, `date`) VALUES
(1, 53, 'Duy Quang', 1, 'duy_quang422@yahoo.com', '', 0, 'Sản phẩm tốt', 1, '2016-03-08 00:00:00'),
(2, 53, 'duy', 0, 'duy@yahoo.com', '', 0, 'tôi muốn mua 1 sản phẩm', 1, '2016-03-11 23:17:45'),
(3, 53, 'Quang', 0, 'duy@yahoo.com', '', 0, 'Sản phẩm tốt', 1, '2016-03-11 23:18:47'),
(4, 53, 'Quang', 0, 'duy@yahoo.com', '', 0, 'Sản phẩm tốt', 1, '2016-03-11 23:26:35'),
(9, 61, 'Quang', 0, 'duy@yahoo.com', '', 0, 'test', 1, '2016-03-16 22:16:42');

-- --------------------------------------------------------

--
-- Table structure for table `configuration`
--

CREATE TABLE IF NOT EXISTS `configuration` (
`id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `value` varchar(1000) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=48 ;

--
-- Dumping data for table `configuration`
--

INSERT INTO `configuration` (`id`, `name`, `value`) VALUES
(1, 'HOSTING_CONFIGURATION', '{"hosting_address":"112.213.89.147","port":"2082","account":"banhtuye","pass":"quang830890"}'),
(2, 'site_name', 'Thiết Kế Website Giá Rẻ'),
(3, 'site_off', '0'),
(4, 'meta_description', 'Chuyên tư vấn thiết kế website chuyên nghiệp, tinh tế, giả rẻ.'),
(8, 'num_sold_criteria', '110'),
(9, 'num_sales_criteria', '12000000'),
(10, 'num_order_criteria', '150'),
(13, 'image_nav_left_homepage', '{"133":"bannerMenu_u5cyMlq0.jpg","134":"bannerMenu_CBLl5KNv.jpg","135":"bannerMenu_4SqamhHX.jpg","136":"bannerMenu_yof2zGAm.jpg","137":"bannerMenu_yNTq6cpt.jpg","138":"bannerMenu_2ovUszAi.jpg","139":"bannerMenu_WfgCpXK3.jpg","140":"bannerMenu_utfqmzJH.jpg","undefined":"bannerMenu_vYfqGSzL.png"}'),
(14, 'logo_image', 'logoImage_s486z0FN.jpg'),
(47, 'images_slide_hometop', '{"1":"slideshow_srv7wPQ5.jpg","2":"slideshow_vr80WLMh.jpg","3":"slideshow_z20whfZu.jpg"}');

-- --------------------------------------------------------

--
-- Table structure for table `group`
--

CREATE TABLE IF NOT EXISTS `group` (
`id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` tinyint(1) DEFAULT '0',
  `group_acp` tinyint(1) NOT NULL,
  `permission_id` varchar(300) NOT NULL,
  `ordering` int(11) DEFAULT '10',
  `created` datetime DEFAULT '0000-00-00 00:00:00',
  `created_by` varchar(45) DEFAULT NULL,
  `modified` datetime DEFAULT '0000-00-00 00:00:00',
  `modified_by` varchar(45) DEFAULT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=73 ;

--
-- Dumping data for table `group`
--

INSERT INTO `group` (`id`, `name`, `status`, `group_acp`, `permission_id`, `ordering`, `created`, `created_by`, `modified`, `modified_by`) VALUES
(2, 'Manager', 1, 1, '["1","2","3","4","5","6","9","10","13","22","23","24"]', 2, '2013-11-07 00:00:00', 'admin', '2016-04-19 00:02:51', 'admin'),
(3, 'Member', 1, 0, '0', 1, '2013-11-12 00:00:00', 'admin', '2014-02-18 00:00:00', 'admin'),
(1, 'Admin', 1, 1, 'full', 3, '2014-12-02 05:54:41', 'admin', '2014-12-03 05:10:41', 'admin'),
(4, 'Register', 1, 0, 'false', 4, '2015-08-12 00:00:00', 'Duy Quang', '2015-08-12 00:00:00', 'Duy Quang');

-- --------------------------------------------------------

--
-- Table structure for table `history`
--

CREATE TABLE IF NOT EXISTS `history` (
`id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `rate` tinyint(1) NOT NULL,
  `comment` tinyint(1) NOT NULL,
  `buy` tinyint(4) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=24 ;

--
-- Dumping data for table `history`
--

INSERT INTO `history` (`id`, `product_id`, `date`, `rate`, `comment`, `buy`, `status`) VALUES
(3, 53, '2016-03-08 00:16:31', 0, 0, 6, 1),
(5, 64, '2016-03-08 00:18:52', 0, 0, 1, 1),
(6, 64, '2016-03-16 22:02:10', 0, 0, 1, 1),
(7, 36, '2016-03-16 22:03:06', 0, 0, 1, 1),
(8, 61, '2016-03-16 22:16:42', 0, 1, 0, 1),
(9, 54, '2016-03-22 23:59:18', 0, 0, 1, 1),
(10, 38, '2016-03-23 00:02:57', 0, 0, 1, 1),
(11, 59, '2016-03-23 20:43:28', 0, 0, 1, 1),
(12, 63, '2016-03-23 20:45:24', 0, 0, 3, 1),
(13, 53, '2016-03-23 20:52:03', 0, 0, 6, 1),
(15, 41, '2016-03-23 20:56:58', 0, 0, 1, 1),
(16, 51, '2016-03-25 00:43:27', 0, 0, 1, 1),
(17, 73, '2016-03-30 19:03:03', 0, 0, 1, 1),
(18, 61, '2016-03-30 19:03:44', 0, 0, 1, 1),
(19, 74, '2016-04-04 00:00:33', 0, 0, 1, 1),
(20, 33, '2016-04-04 20:04:17', 0, 0, 1, 1),
(21, 61, '2016-05-09 15:01:57', 0, 0, 1, 1),
(22, 53, '2016-05-14 21:00:08', 0, 0, 6, 1),
(23, 60, '2016-05-18 23:28:57', 1, 0, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `image_position`
--

CREATE TABLE IF NOT EXISTS `image_position` (
`id` int(11) NOT NULL,
  `position` varchar(50) NOT NULL,
  `image` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `manufacturer`
--

CREATE TABLE IF NOT EXISTS `manufacturer` (
`id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `alias` varchar(200) NOT NULL,
  `description` text NOT NULL,
  `picture` varchar(50) DEFAULT NULL,
  `status` tinyint(1) NOT NULL,
  `created_date` date NOT NULL,
  `created_by` varchar(70) NOT NULL,
  `modified_date` date NOT NULL,
  `modified_by` varchar(70) NOT NULL,
  `hits` int(11) NOT NULL,
  `meta_description` varchar(200) NOT NULL,
  `meta_keyword` varchar(200) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=39 ;

--
-- Dumping data for table `manufacturer`
--

INSERT INTO `manufacturer` (`id`, `name`, `alias`, `description`, `picture`, `status`, `created_date`, `created_by`, `modified_date`, `modified_by`, `hits`, `meta_description`, `meta_keyword`) VALUES
(30, 'UNIQLO', 'uniqlo', '', 'manufacturer_CquevVUa.png', 1, '2015-11-07', '', '2016-03-17', '', 0, '', ''),
(31, 'FOREVER 21', 'forever-21', '', 'manufacturer_0pYSfahm.jpg', 1, '2015-11-07', '', '2016-03-17', '', 0, '', ''),
(32, 'AEROPOSTALE', 'aeropostale', '', 'manufacturer_Vxh0ctUH.jpg', 1, '2015-11-07', '', '2016-03-17', '', 0, '', ''),
(33, 'CEZANO', 'cezano', '', 'manufacturer_KR5roWxD.jpg', 1, '2015-11-07', '', '2016-03-17', '', 0, '', ''),
(34, 'LEAP FROG', 'leap-frog', '', 'manufacturer_BwbpCiZg.jpg', 1, '2015-11-10', '', '2016-03-17', '', 0, '', ''),
(35, 'LEGO', 'lego', '', 'manufacturer_VAQfXlub.jpg', 1, '2015-11-10', '', '2016-03-17', '', 0, '', ''),
(36, 'BRUDER', 'bruder', '', 'manufacturer_fOuTibks.jpg', 1, '2015-11-10', '', '2016-03-17', '', 0, '', ''),
(37, 'FISHER PRICE', 'fisher-price', '', 'manufacturer_azT7gZyY.jpg', 1, '2015-11-10', '', '2016-03-17', '', 0, '', ''),
(38, 'H&M', 'h-m', '', 'manufacturer_70KjY25s.png', 1, '2015-11-10', '', '2016-03-17', '', 0, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE IF NOT EXISTS `pages` (
`id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `alias` varchar(200) NOT NULL,
  `create_by` varchar(100) NOT NULL,
  `hits` int(11) NOT NULL,
  `description` text NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `name`, `alias`, `create_by`, `hits`, `description`, `status`) VALUES
(1, 'test thui', 'test-thui', 'Duy Quang', 0, '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `permission`
--

CREATE TABLE IF NOT EXISTS `permission` (
`id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `module` varchar(45) NOT NULL,
  `controller` varchar(45) NOT NULL,
  `action` varchar(45) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=43 ;

--
-- Dumping data for table `permission`
--

INSERT INTO `permission` (`id`, `name`, `module`, `controller`, `action`) VALUES
(1, 'Truy cập bảng quản trị', 'admin', 'index', 'index'),
(2, 'Hiển thị danh sách các sản phẩm', 'admin', 'product', 'index'),
(3, 'Xóa sản phẩm', 'admin', 'product', 'delete'),
(4, 'thêm sản phẩm', 'admin', 'product', 'add'),
(5, 'Xem thông tin sản phẩm', 'admin', 'product', 'get-product'),
(6, 'chỉnh sửa sản phẩm', 'admin', 'product', 'edit'),
(7, 'Hiển thị các đơn hàng', 'admin', 'cart', 'index'),
(8, 'Xem đơn hàng', 'admin', 'cart', 'view-cart'),
(9, 'Hủy đơn hàng', 'admin', 'cart', 'orderCanceled'),
(10, 'Chuyển trạng thái đơn hàng thành đang giao', 'admin', 'cart', 'order-shipping'),
(11, 'Trạng thái đơn hàng thành công', 'admin', 'cart', 'orderComplete'),
(12, 'Truy cập vào trang chuyên mục sản phẩm', 'admin', 'category', 'index'),
(13, 'Chỉnh sửa chuyên mục sản phẩm', 'admin', 'category', 'edit'),
(14, 'Xem thông tin chuyên mục sản phẩm', 'admin', 'category', 'getCategory'),
(15, 'Xóa chuyên mục sản phẩm', 'admin', 'category', 'delete'),
(16, 'Thêm Chuyên mục sản phẩm', 'admin ', 'category', 'add'),
(17, 'Xem bình luận của sản phẩm', 'admin', 'comment', 'index'),
(18, 'Xóa bình luận của sản phẩm', 'admin', 'comment', 'delete'),
(19, 'Trả lời bình luận cho sản phẩm', 'admin', 'comment', 'add'),
(20, 'Xem quản lý nhóm', 'admin', 'group', 'index'),
(21, 'Thêm một nhóm mới', 'admin', 'group', 'add'),
(22, 'Cập nhật group', 'admin', 'group', 'update'),
(23, 'Xem danh sách các thương hiệu', 'admin', 'manufacturer', 'index'),
(24, 'Cập nhật danh sách thương hiệu', 'admin', 'manufacturer', 'edit'),
(25, 'Thêm mới một thương hiệu', 'admin', 'manufacturer', 'add'),
(26, 'Xóa thương hiệu', 'admin', 'manufacturer', 'delete'),
(27, 'Xem danh sách Pages', 'admin', 'pages', 'index'),
(28, 'Thêm mới một Page', 'admin', 'pages', 'add'),
(29, 'cập nhật Page', 'admin', 'pages', 'edit'),
(30, 'xóa Page', 'admin', 'pages', 'delete'),
(31, 'Xem thông tin Page', 'admin', 'pages', 'get-item'),
(32, 'Xem Chuyên mục bài viết', 'admin', 'postscategory', 'index'),
(33, 'Xem thông tin chuyên mục bài viết', 'admin', 'postscategory', 'get-category'),
(34, 'Thêm mới một chuyên mục bài viết', 'admin', 'postscategory', 'add'),
(35, 'Cập nhật chuyên mục bài viết', 'admin', 'postscategory', 'edit'),
(36, 'Xóa chuyên mục bài viết', 'admin', 'postscategory', 'delete'),
(37, 'Xem danh sách các bài viết', 'admin', 'posts', 'index'),
(38, 'xem thông tin bài viết', 'admin', 'posts', 'getPosts'),
(39, 'Thêm mới bài viết', 'admin', 'posts', 'add'),
(40, 'Cập nhật bài viết', 'admin', 'posts', 'edit'),
(41, 'Xóa bài viết', 'admin', 'posts', 'delete'),
(42, 'Xem danh sách các user', 'admin', 'user', 'index');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE IF NOT EXISTS `posts` (
`id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `alias` varchar(200) NOT NULL,
  `description` text NOT NULL,
  `status` tinyint(1) NOT NULL,
  `image` varchar(100) NOT NULL,
  `category_id` int(11) NOT NULL,
  `created_date` date NOT NULL,
  `created_by` varchar(70) NOT NULL,
  `modified_date` date NOT NULL,
  `modified_by` varchar(70) NOT NULL,
  `hits` int(11) NOT NULL,
  `meta_description` varchar(200) NOT NULL,
  `meta_keyword` varchar(200) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `name`, `alias`, `description`, `status`, `image`, `category_id`, `created_date`, `created_by`, `modified_date`, `modified_by`, `hits`, `meta_description`, `meta_keyword`) VALUES
(1, 'Trụ sở đầu tiên của các công ty công nghệ nổi tiếng', 'tru-so-dau-tien-cua-cac-cong-ty-cong-nghe-noi-tieng', '<p>Kh&ocirc;ng chỉ c&aacute;c cao ốc, văn ph&ograve;ng lớn, nhiều startup c&ocirc;ng nghệ được thai ngh&eacute;n tại những địa điểm khi&ecirc;m nhường như nh&agrave; ri&ecirc;ng, ph&ograve;ng k&yacute; t&uacute;c hay garage xe hơi cũ.</p>\n\n<p>Ch&uacute;ng l&agrave; minh chứng cho việc c&aacute;c &yacute; tưởng lớn c&oacute; thể bắt đầu tại bất kỳ đ&acirc;u. Dưới đ&acirc;y l&agrave; những c&ocirc;ng ty c&ocirc;ng nghệ đ&atilde; xuất ph&aacute;t một c&aacute;ch khi&ecirc;m tốn.</p>\n\n<h3>Apple</h3>\n\n<p>Steve Jobs vẫn sống với cha mẹ v&agrave;o năm 1976 trong căn nh&agrave; nhỏ số 2066 Crist Drive, Los Altos, California.</p>\n\n<p>Gara của ng&ocirc;i nh&agrave; n&agrave;y đ&atilde; đi v&agrave;o lịch sử, ghi dấu những &yacute; tưởng đầu ti&ecirc;n của Jobs v&agrave; Steve Wozniak. Tuy vậy, Wozniak cho rằng th&ocirc;ng tin n&agrave;y l&agrave; &ldquo;hơi ph&oacute;ng đại&rdquo;, theo&nbsp;<em>TechRadar</em>.</p>\n\n<p>Đ&acirc;y l&agrave; nơi Apple xuất hiện v&agrave; chứng kiến những chiếc m&aacute;y t&iacute;nh Apple I đầu ti&ecirc;n được ch&iacute;nh tay Steve Jobs v&agrave; v&agrave;i cộng sự lắp r&aacute;p.</p>\n\n<table align="center">\n	<tbody>\n		<tr>\n			<td><img alt="Tru so dau tien cua cac cong ty cong nghe noi tieng hinh anh 1" src="http://img.v3.news.zdn.vn/w660/Uploaded/wohasku/2016_05_17/Apple1.jpg" /></td>\n		</tr>\n		<tr>\n			<td>Ng&ocirc;i nh&agrave; của Steve Jobs nơi Apple ra đời. Ảnh:&nbsp;<strong><em>Google Streetview.</em></strong></td>\n		</tr>\n	</tbody>\n</table>\n\n<p>Hiện tại, trụ sở ch&iacute;nh của Apple được đặt tại trung t&acirc;m Sillicon Valley, số 1-6 Infinite Loop, Cupertino, California, với 6 t&ograve;a nh&agrave; tọa lạc tr&ecirc;n diện t&iacute;ch 79.000 m2.</p>\n\n<p>Ngo&agrave;i ra, họ c&ograve;n một k&yacute; t&uacute;c vệ tinh kh&aacute;c ở Sunny Vale, nơi đặt văn ph&ograve;ng nghi&ecirc;n cứu v&agrave; thử nghiệm sản phẩm. Vừa qua, Tim Cook tuy&ecirc;n bố Apple sẽ tiếp tục x&acirc;y dựng trụ sở mới với h&igrave;nh dạng &ldquo;t&agrave;u kh&ocirc;ng gian&rdquo; tại Cupertino, dự kiến rộng đến 260.000 m2, với k&yacute; t&uacute;c d&agrave;nh cho 13.000 nh&acirc;n vi&ecirc;n, phong cảnh rộng r&atilde;i, qu&aacute;n c&agrave; ph&ecirc; 3.000 chỗ ngồi c&ugrave;ng nhiều tiện &iacute;ch kh&aacute;c.</p>\n\n<table align="center">\n	<tbody>\n		<tr>\n			<td><img alt="Tru so dau tien cua cac cong ty cong nghe noi tieng hinh anh 2" src="http://img.v3.news.zdn.vn/w660/Uploaded/wohasku/2016_05_17/apple2.jpg" /></td>\n		</tr>\n		<tr>\n			<td>Một g&oacute;c trụ sở ch&iacute;nh Apple tại Curpetino v&agrave;o năm 2015. Ảnh:&nbsp;<strong><em>Office Snapshot.</em></strong></td>\n		</tr>\n	</tbody>\n</table>\n\n<h3>Facebook</h3>\n\n<p>Mark Zuckerberg viết những d&ograve;ng code đầu ti&ecirc;n cho Facebook v&agrave;o năm 2004 trong căn ph&ograve;ng k&yacute; t&uacute;c 6 người tại đại học Havard. Căn ph&ograve;ng hiện tại được biết đến với t&ecirc;n &ldquo;The Zuckerberg Suite&rdquo;. Đ&acirc;y cũng l&agrave; nơi Mark ấn n&uacute;t đưa Facebook v&agrave;o hoạt động ng&agrave;y 4/2/2004 v&agrave; nhận được 1.200 người d&ugrave;ng trong v&ograve;ng 24 giờ. L&uacute;c đ&oacute;, Facebook vẫn chỉ l&agrave; một nền tảng mạng x&atilde; hội, chưa phải t&ecirc;n một c&ocirc;ng ty ch&iacute;nh thức.</p>\n\n<table align="center">\n	<tbody>\n		<tr>\n			<td><img alt="Tru so dau tien cua cac cong ty cong nghe noi tieng hinh anh 3" src="http://img.v3.news.zdn.vn/w660/Uploaded/wohasku/2016_05_17/FB1.jpg" /></td>\n		</tr>\n		<tr>\n			<td>Mark Zuckerberg tại căn ph&ograve;ng k&yacute; t&uacute;c sản sinh ra Facebook. Ảnh:&nbsp;<strong><em>TechRadar.</em></strong></td>\n		</tr>\n	</tbody>\n</table>\n\n<p>Hiện tại, trụ sở lớn nhất của Facebook c&oacute; t&ecirc;n Anton Menlo, nằm ở C&ocirc;ng vi&ecirc;n Menlo, California với chi ph&iacute; đầu tư ước t&iacute;nh 120 triệu USD, theo<em>Business Insider</em>.</p>\n\n<p>Đ&acirc;y được gọi l&agrave; &ldquo;Thị trấn Facebook&rdquo;, tr&ecirc;n diện t&iacute;ch gần 60.000 m2, Facebook đặt 35 studio, 208 căn hộ một giường, 139 căn hộ hai giường c&ugrave;ng 12 căn hộ 3 giường cho c&aacute;c nh&acirc;n vi&ecirc;n cao cấp. Facebook c&oacute; ch&iacute;nh s&aacute;ch hỗ trợ tiền thu&ecirc; nh&agrave; cho nh&acirc;n vi&ecirc;n tại đ&acirc;y.</p>\n', 1, 'posts_2UadG1pL.jpg', 9, '2016-04-07', '', '2016-05-18', '', 0, '', ''),
(2, 'CEO Tim Cook lần đầu thăm Ấn Độ', 'ceo-tim-cook-lan-dau-tham-an-do', '<p>Sau khi kết th&uacute;c chuyến thăm&nbsp;Trung Quốc, CEO Apple sẽ bắt đầu tới Ấn Độ v&agrave;o ng&agrave;y mai nhằm th&uacute;c đẩy doanh số ở đ&acirc;y, đồng thời t&igrave;m kiếm những cơ hội hợp t&aacute;c với một trong những&nbsp;thị trường&nbsp;c&ocirc;ng nghệ tiềm năng v&agrave; tăng trưởng nhanh nhất tr&ecirc;n thế giới.</p>\n\n<p>Tại đ&acirc;y, Tim Cook sẽ c&oacute; cuộc gặp với&nbsp;Thủ tướng&nbsp;Ấn Độ Narendra Modi c&ugrave;ng giới c&ocirc;ng nghệ nước n&agrave;y, trong bối cảnh nh&agrave; sản xuất iPhone đang muốn t&igrave;m kiếm những thương vụ hợp t&aacute;c, mở rộng lĩnh vực kinh doanh sau khi doanh số sản phẩm chủ lực iPhone xuống thấp kỉ lục trong qu&yacute; đầu năm.</p>\n\n<p>Trong chuyến thăm Trung Quốc, Apple đ&atilde; c&ocirc;ng bố khoản đầu tư 1 tỉ USD v&agrave;o startup Didi, trong một thương vụ được đ&aacute;nh gi&aacute; rất cao từ giới chuy&ecirc;n gia, đồng thời h&eacute; lộ khả năng gia nhập ng&agrave;nh c&ocirc;ng nghiệp sản xuất &ocirc; t&ocirc; thế giới của h&atilde;ng c&ocirc;ng nghệ Mỹ.</p>\n\n<p>Hiện nay, thị phần smartphone của Apple ở Ấn Độ thấp hơn nhiều so với ở Trung Quốc, tuy nhi&ecirc;n đ&acirc;y vẫn l&agrave; một thị trường cực k&igrave; quan trọng đối với nh&agrave; sản xuất smartphone lớn thứ hai thế giới.</p>\n\n<p>T&iacute;nh tới cuối th&aacute;ng Ba, doanh số từ ch&acirc;u &Acirc;u, Trung Đ&ocirc;ng, ch&acirc;u Phi v&agrave; Ấn Độ chỉ chiếm 23% doanh thu của tập đo&agrave;n Mỹ, so s&aacute;nh với 25% chỉ t&iacute;nh ri&ecirc;ng tại Trung Quốc, Hồng K&ocirc;ng v&agrave; Đ&agrave;i Loan.</p>\n\n<p><img alt="" src="http://media.antt.vn/2016/05/17/BN_OA617_0516ca_M_2016051607344717_02_14_000000.jpg" /></p>\n\n<p><em>Tim Cook trong chuyến thăm Trung Quốc.</em></p>\n\n<p>Nhằm đẩy mạnh doanh số tại thị trường Nam &Aacute;, Apple đ&atilde; nộp đơn xin x&acirc;y dựng hệ thống cửa h&agrave;ng b&aacute;n lẻ tại Ấn Độ, đồng thời xin ph&eacute;p ph&acirc;n phối iPhone &ldquo;refurbished&rdquo;, tuy nhi&ecirc;n vẫn chưa được New Dehli chấp thuận, theo tờ The Hin Du.</p>\n\n<p>Theo CNN, Ấn Độ được dự&nbsp;b&aacute;o&nbsp;sẽ vượt qua Trung Quốc để trở th&agrave;nh quốc gia đ&ocirc;ng d&acirc;n nhất thế giới v&agrave;o năm 2022. Bởi vậy, mọi c&ocirc;ng ty tr&ecirc;n thế giới đều muốn th&acirc;m nhập v&agrave; chiếm thị phần ở đ&acirc;y.</p>\n\n<p>Theo h&atilde;ng nghi&ecirc;n cứu Counterpoint, mặc d&ugrave; doanh số đi xuống tr&ecirc;n to&agrave;n cầu, thị trường smartphone Ấn Độ lại tăng trưởng tới 23% trong qu&yacute; đầu năm nay, vượt qua Mỹ trở th&agrave;nh thị trường lớn thứ hai thế giới x&eacute;t theo số lượng người d&ugrave;ng.</p>\n\n<p>Tuy nhi&ecirc;n trở ngại lớn nhất đối với Apple ở quốc gia Nam &Aacute; tới từ thu nhập trung b&igrave;nh ở mức thấp của người d&acirc;n nước n&agrave;y. Tr&ecirc;n thực tế, phần lớn người ti&ecirc;u d&ugrave;ng Ấn Độ c&oacute; th&oacute;i quen sử dụng những chiếc điện thoại chỉ c&oacute; gi&aacute; trị thấp hơn 100 USD.</p>\n', 1, 'posts_lxBW2hVR.jpg', 9, '2016-05-17', 'Administrator', '2016-05-18', '', 0, '', ''),
(3, 'Soi chiếc điện thoại ‘bất khả xâm phạm’ của ông Obama', 'soi-chiec-dien-thoai-bat-kha-xam-pham-cua-ong-obama', '<p>Cơ quan An ninh Quốc gia (NSA) chịu tr&aacute;ch nhiệm ch&iacute;nh trong việc thiết kế c&aacute;c t&iacute;nh năng bảo mật cho chiếc BlackBerry của &ocirc;ng Obama khi &ocirc;ng nhậm chức v&agrave;o năm 2008. Chiếc điện thoại của &ocirc;ng được loại bỏ phần lớn c&aacute;c t&iacute;nh năng v&agrave; tiện &iacute;ch để nhường chỗ cho v&ocirc; số c&aacute;c lớp m&atilde; h&oacute;a bảo mật. NSA kh&ocirc;ng chịu tiết lộ liệu tổng thống c&oacute; thể gửi email hay thậm ch&iacute; nhắn tin bằng chiếc điện thoại đặc chế của m&igrave;nh hay kh&ocirc;ng.</p>\n\n<p>Theo tờ<em>&nbsp;India Times</em>, chiếc điện thoại n&agrave;y sau đ&oacute; được thay thế bởi một mẫu n&acirc;ng cấp của BlackBerry, được NSA phối hợp ph&aacute;t triển d&agrave;nh cho ri&ecirc;ng tổng thống Mỹ. Chiếc điện thoại n&agrave;y được t&iacute;ch hợp phần mềm đặc biệt SecurVoice, ph&aacute;t triển bởi h&atilde;ng c&ocirc;ng nghệ bảo mật The Genesis Key v&agrave; c&aacute;c kỹ sư của BlackBerry. Phần mềm n&agrave;y c&oacute; hai cấp độ an ninh, giữa điện thoại với điện thoại v&agrave; giữa điện thoại với nh&agrave; mạng. Điện thoại của &ocirc;ng Obama sử dụng cấp độ an ninh thứ hai. C&aacute;c cuộc gọi được chuyển đến m&aacute;y chủ bảo mật v&agrave; sau đ&oacute; mới kết nối đến điện thoại.</p>\n\n<p><a href="http://static.phapluattp.vn/w800/uploaded/thanhdanh/2016_05_17/dien_thoai_tong_thong_-_reuters_csod.jpg"><img alt="" src="http://static.phapluattp.vn/w470/uploaded/thanhdanh/2016_05_17/dien_thoai_tong_thong_-_reuters_csod.jpg" /></a><br />\n<em>Chiếc điện thoại BlackBerry của &ocirc;ng Obama được thiết kế đặc biệt để loại bỏ mọi rủi ro an ninh. (Ảnh: Reuters)</em></p>\n\n<p>Chiếc điện thoại của &ocirc;ng Obama bị loại bỏ gần như mọi t&iacute;nh năng m&agrave; một tin tặc c&oacute; thể lợi dụng khai th&aacute;c được. N&oacute; kh&ocirc;ng c&oacute; phần mềm chạy tr&ograve; chơi v&agrave; dường như cũng kh&ocirc;ng c&oacute; camera &ldquo;tự sướng&rdquo;. Nhiều khả năng điện thoại kh&ocirc;ng c&ograve;n chức năng nhắn tin th&ocirc;ng thường m&agrave; được bổ sung c&aacute;c ứng dụng nhắn tin &ldquo;si&ecirc;u m&atilde; h&oacute;a&rdquo;.</p>\n\n<p>Theo&nbsp;<em>India Times</em>, chiếc BlackBerry của &ocirc;ng Obama chỉ được giới hạn gọi v&agrave; nhận cuộc gọi từ khoảng 10 số điện thoại c&ugrave;ng sử dụng dạng thức m&atilde; h&oacute;a tương tự. Trong danh bạ &ldquo;ngh&egrave;o n&agrave;n&rdquo; n&agrave;y c&oacute; Ph&oacute; tổng thống Mỹ Joe Biden, ch&aacute;nh văn ph&ograve;ng tổng thống, một v&agrave;i cố vấn cấp cao th&acirc;n t&iacute;n, thư k&yacute; b&aacute;o ch&iacute;, đệ nhất Phu nh&acirc;n Michelle Obama v&agrave; một v&agrave;i th&agrave;nh vi&ecirc;n gia đ&igrave;nh.</p>\n', 1, 'posts_8dEnLcY9.jpg', 9, '2016-05-17', 'Administrator', '2016-05-18', '', 0, '', ''),
(4, 'Vì sao iPhone mãi là smartphone tốt nhất?', 'vi-sao-iphone-mai-la-smartphone-tot-nhat', '<p>Darrell Etherington, ph&oacute;ng vi&ecirc;n của TechCrunh nhận định, c&aacute;c nh&agrave; sản xuất Android lu&ocirc;n đi theo hướng kinh doanh thiết bị mở. Trong nhiều năm qua, họ cố gắng thuyết phục kh&aacute;ch h&agrave;ng sử dụng sản phẩm của m&igrave;nh theo nhiều hướng kh&aacute;c nhau.<br />\n<img src="http://img.v3.news.zdn.vn/w660/Uploaded/mzdyv/2014_05_29/iphone_bes.jpg" /><br />\nTuy nhi&ecirc;n, một số người đ&atilde; quay lại với iPhone sau một thời gian d&ugrave;ng, trong số đ&oacute; c&oacute; bạn g&aacute;i v&agrave; bố của Darrell. Trong khi một số kh&aacute;c th&igrave; lại th&iacute;ch những t&iacute;nh năng, ứng dụng đặc trưng tr&ecirc;n iPhone. Về l&yacute; thuyết, camera giữa c&aacute;c h&atilde;ng điện thoại kh&ocirc;ng phải l&agrave; yếu tố để x&aacute;c định ai tốt hơn. C&oacute; nhiều mẫu Android với camera vẫn cho chất lượng tốt v&agrave; rẻ hơn. Tuy nhi&ecirc;n, theo c&aacute;c nhiếp ảnh gia, thực tế cho thấy, những bức ảnh được chụp từ iPhone thường c&oacute; &iacute;t sai s&oacute;t trong kỹ thuật hơn so với c&aacute;c thiết bị kh&aacute;c. Vậy v&igrave; sao iPhone l&agrave; smartphone tốt nhất? Đầu ti&ecirc;n l&agrave; sự thống nhất trong trải nghiệm.&nbsp;C&aacute;c ứng dụng tr&ecirc;n Android thường thay đổi sự tương t&aacute;c t&ugrave;y theo thiết bị. Theo đ&oacute;, mỗi nh&agrave; sản xuất sẽ t&ugrave;y chỉnh v&agrave; c&oacute; những c&ocirc;ng thức ri&ecirc;ng. B&ecirc;n cạnh đ&oacute;, c&aacute;c nh&agrave; sản xuất Android thường gh&eacute;p nối phần cứng v&agrave; phần mềm từ nhiều đối t&aacute;c, trong khi Apple kiểm so&aacute;t việc n&agrave;y tốt hơn. Thứ hai l&agrave; t&iacute;nh cơ động. Nhiều kh&aacute;ch h&agrave;ng th&iacute;ch m&agrave;n h&igrave;nh lớn v&igrave; sự cuốn h&uacute;t của n&oacute; khi sử dụng. Tuy nhi&ecirc;n, ch&uacute;ng qu&aacute; cồng kềnh để mang khi di chuyển. Nhiều người chỉ d&agrave;nh phần lớn thời gian để điện thoại trong t&uacute;i quần. Do đ&oacute;, sở hữu một model m&agrave;n h&igrave;nh lớn g&acirc;y bất tiện hơn. Điểm thứ ba l&agrave; chất lượng của thiết bị.&nbsp;Mặc d&ugrave; iPhone 5S xuất hiện đ&atilde; l&acirc;u, nhưng cho đến nay vẫn kh&ocirc;ng c&oacute; ứng dụng phần mềm c&ocirc;ng nghệ web n&agrave;o m&agrave; n&oacute; kh&ocirc;ng xử l&yacute; được. Apple kiểm so&aacute;t sản phẩm của họ tốt hơn, mang tới một trải nghiệm thống nhất. Theo Darrell Etherington, những &yacute; kiến ​​n&agrave;y chắc chắn l&agrave;m cho nhiều người kh&ocirc;ng th&iacute;ch. Tuy nhi&ecirc;n, smartphone của Apple vẫn sẽ tỏa s&aacute;ng v&agrave; sẽ vượt qua những nỗ lực của đối thủ cạnh tranh.</p>\n', 1, 'posts_evtDq6o1.jpg', 9, '2016-05-17', 'Administrator', '2016-05-18', '', 0, '', ''),
(5, 'Trong tương lai, cả thế giới có thể nói chung một ngôn ngữ, với thiết bị này', 'trong-tuong-lai-ca-the-gioi-co-the-noi-chung-mot-ngon-ngu-voi-thiet-bi-nay', '<p>Waverly Labs c&oacute; lẽ sắp tung ra một trong những sản phẩm mang t&iacute;nh c&aacute;ch mạng đột ph&aacute; nhất hiện nay, gi&uacute;p con người tr&ecirc;n khắp thế giới n&agrave;y &quot;n&oacute;i chung 1 ng&ocirc;n ngữ&quot;.</p>\n\n<p>Thiết bị n&agrave;y được nh&agrave; sản xuất gọi l&agrave; The Pilot - một cặp tai nghe kh&ocirc;ng d&acirc;y c&oacute; khả năng dịch ng&ocirc;n ngữ theo thời gian thực, dưới sự trợ gi&uacute;p của phần mềm chuyển ngữ (hoạt động tr&ecirc;n smartphone) cũng do Waverly Labs tự thiết kế.</p>\n\n<p>The Pilot được cung cấp theo cặp, để cuộc hội thoại giữa 2 người với 2 ng&ocirc;n ngữ ho&agrave;n to&agrave;n kh&aacute;c biệt c&oacute; thể diễn ra kh&ocirc;ng kh&aacute;c g&igrave; những cuộc hội thoại c&ugrave;ng ng&ocirc;n ngữ.</p>\n\n<p><img alt="\nThe Pilot phiên bản thử nghiệm.\n" id="img_dd22a790-1be7-11e6-b3d1-11e3aadf807b" src="https://cafebiz.vcmedia.vn/k:thumb_w/660/2016/2016-05-17-1-1463459229813/trong-tuong-lai-ca-the-gioi-co-the-noi-chung-mot-ngon-ngu-voi-thiet-bi-nay.jpg" /></p>\n\n<p>The Pilot phi&ecirc;n bản thử nghiệm.</p>\n\n<p>Cặp tai nghe n&agrave;y cũng c&oacute; khả năng nghe nhạc như c&aacute;c tai nghe kh&ocirc;ng d&acirc;y th&ocirc;ng thường, đồng thời, người d&ugrave;ng c&oacute; thể lựa chọn cặp ng&ocirc;n ngữ sử dụng th&ocirc;ng qua điện thoại.</p>\n\n<p>Ngo&agrave;i việc truy vấn v&agrave;o cơ sở dữ liệu online, The Pilot cũng c&oacute; thể dịch offline để cung cấp khả năng dịch gần như tức thời cho người sử dụng.</p>\n\n<p>Đội ngũ của Waverly Labs đ&atilde; d&agrave;nh 2 năm nghi&ecirc;n cứu, trước khi tung ra những h&igrave;nh ảnh đầu ti&ecirc;n về thiết bị mang t&iacute;nh c&aacute;ch mạng n&agrave;y. Dự kiến, sản phẩm sẽ được b&aacute;n ra trong năm nay với mức gi&aacute; chưa được tiết lộ.</p>\n\n<p>V&agrave; cũng tương tự như cộng đồng Kickstarter, người mua đặt trước sẽ được hưởng mức gi&aacute; ưu đ&atilde;i hơn. Nh&agrave; sản xuất dự kiến sẽ b&aacute;n chiếc The Pilot với gi&aacute; 249 - 299 USD, nhưng d&agrave;nh mức gi&aacute; ưu đ&atilde;i 129, 149 v&agrave; 179 USD cho những người đặt h&agrave;ng sớm.</p>\n', 1, 'posts_DImpFsVe.JPG', 9, '2016-05-17', 'Administrator', '2016-05-18', '', 0, '', ''),
(6, 'iPad Pro 9.7 inch dính lỗi ngay sau khi cập nhật lên iOS 9.3.2', 'ipad-pro-9-7-inch-dinh-loi-ngay-sau-khi-cap-nhat-len-ios-9-3-2', '<p>H&ocirc;m qua, Apple đ&atilde; bắt đầu tung ra bản cập nhật iOS 9.3.2 với tuy&ecirc;n bố sẽ khắc phục một số lỗi nhỏ của phi&ecirc;n bản trước. Tuy nhi&ecirc;n, chỉ &iacute;t giờ sau khi bản cập nhật được ph&aacute;t h&agrave;nh, một số người d&ugrave;ng iPad Pro 9.7 inch đ&atilde; b&aacute;o c&aacute;o về một lỗi mới ph&aacute;t sinh tr&ecirc;n thiết bị của họ.</p>\n\n<p>&nbsp;</p>\n\n<p><img alt="" id="img_87e27bc0-1c05-11e6-b3d1-11e3aadf807b" src="https://genknews.vcmedia.vn/k:2016/pro-1463471976522/ipad-pro-97-inch-dinh-loi-ngay-sau-khi-cap-nhat-len-ios-932.jpg" /></p>\n\n<p>Cụ thể, sau khi cập nhật l&ecirc;n iOS 9.3.2 v&agrave; kết nối với iTunes, chiếc iPad Pro 9.7 sẽ b&aacute;o lỗi &quot;Error 56&quot;.</p>\n\n<p>Tuy nhi&ecirc;n, t&agrave;i liệu hỗ trợ của Apple lại n&oacute;i rằng &quot;Error 56&quot; l&agrave; vấn đề ph&aacute;t sinh do phần cứng. Apple cũng khuy&ecirc;n người d&ugrave;ng n&acirc;ng cấp l&ecirc;n phi&ecirc;n bản iTunes mới nhất v&agrave; tiến h&agrave;nh kiểm tra lại một lần nữa để chắn chắn rằng vấn đề kh&ocirc;ng phải do ứng dụng bảo mật của b&ecirc;n thứ 3 g&acirc;y ra. Người d&ugrave;ng cũng n&ecirc;n kiểm tra lại c&aacute;p USB, m&aacute;y t&iacute;nh bảng v&agrave; kết nối mạng để đảm bảo tất cả vẫn đang hoạt động tốt.</p>\n\n<p>Tiếp sau đ&oacute;, Apple khuy&ecirc;n người d&ugrave;ng &quot;restore&quot; lại chiếc iPad của m&igrave;nh 2 lần, nếu th&ocirc;ng b&aacute;o lỗi vẫn xuất hiện h&atilde;y li&ecirc;n hệ với bộ phận chăm s&oacute;c kh&aacute;ch h&agrave;ng của Apple để được hướng dẫn c&aacute;ch xử l&iacute;.</p>\n', 1, 'posts_3gRpVyF8.jpg', 9, '2016-05-17', 'Administrator', '2016-05-18', '', 0, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `posts_category`
--

CREATE TABLE IF NOT EXISTS `posts_category` (
`id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `image` varchar(100) NOT NULL,
  `alias` varchar(200) NOT NULL,
  `description` text NOT NULL,
  `status` tinyint(1) NOT NULL,
  `parent` int(11) NOT NULL,
  `level` int(11) NOT NULL,
  `left` int(11) NOT NULL,
  `right` int(11) NOT NULL,
  `created_date` date NOT NULL,
  `created_by` varchar(70) NOT NULL,
  `modified_date` date NOT NULL,
  `modified_by` varchar(70) NOT NULL,
  `hits` int(11) NOT NULL,
  `meta_description` varchar(200) NOT NULL,
  `meta_keyword` varchar(200) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `posts_category`
--

INSERT INTO `posts_category` (`id`, `name`, `image`, `alias`, `description`, `status`, `parent`, `level`, `left`, `right`, `created_date`, `created_by`, `modified_date`, `modified_by`, `hits`, `meta_description`, `meta_keyword`) VALUES
(1, 'Root', '', 'root', '', 1, 0, 0, 0, 13, '2015-10-09', '', '0000-00-00', '', 0, '', ''),
(9, 'Công Nghệ', 'post_category_ZVmTf4eJ.jpg', 'cong-nghe', '<p>Cras accumsan elit augue, sit amet vestibulum turpis fringilla nec. Etiam eu dictum tortor. Sed feugiat lacus non ultricies pulvinar.</p>\r\n', 1, 1, 1, 1, 2, '2016-04-08', 'Administrator', '2016-05-17', 'Administrator', 0, '', ''),
(10, 'Thời Trang', 'post_category_hb9MUPmI.jpg', 'thoi-trang', '<p>Cras accumsan elit augue, sit amet vestibulum turpis fringilla nec. Etiam eu dictum tortor. Sed feugiat lacus non ultricies pulvinar.</p>\r\n', 1, 1, 1, 3, 4, '2016-04-08', 'Administrator', '2016-04-09', '', 0, '', ''),
(11, 'Thể Thao', 'post_category_IP24CM9b.jpg', 'the-thao', '<p>Cras accumsan elit augue, sit amet vestibulum turpis fringilla nec. Etiam eu dictum tortor. Sed feugiat lacus non ultricies pulvinar.</p>\r\n', 1, 1, 1, 5, 6, '2016-04-08', 'Administrator', '2016-04-09', '', 0, '', ''),
(12, 'Thế Giới', 'post_category_OKPDY3f8.jpg', 'the-gioi', '<p>Cras accumsan elit augue, sit amet vestibulum turpis fringilla nec. Etiam eu dictum tortor. Sed feugiat lacus non ultricies pulvinar.</p>\r\n', 1, 1, 1, 7, 8, '2016-04-08', 'Administrator', '2016-04-09', '', 0, '', ''),
(13, 'Món Ăn Thức Uống', 'post_category_kcrNy3za.jpg', 'mon-an-thuc-uong', '<p>Cras accumsan elit augue, sit amet vestibulum turpis fringilla nec. Etiam eu dictum tortor. Sed feugiat lacus non ultricies pulvinar.</p>\r\n', 1, 1, 1, 9, 10, '2016-04-08', 'Administrator', '2016-04-09', '', 0, '', ''),
(14, 'Xã Hội', 'post_category_8bCnAszK.jpg', 'xa-hoi', '<p>Cras accumsan elit augue, sit amet vestibulum turpis fringilla nec. Etiam eu dictum tortor. Sed feugiat lacus non ultricies pulvinar.</p>\r\n', 1, 1, 1, 11, 12, '2016-04-08', 'Administrator', '2016-04-09', '', 0, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `post_tag`
--

CREATE TABLE IF NOT EXISTS `post_tag` (
`id` int(11) NOT NULL,
  `tag_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `post_tag`
--

INSERT INTO `post_tag` (`id`, `tag_id`, `post_id`) VALUES
(8, 2, 1),
(9, 3, 1),
(10, 4, 1),
(11, 5, 1),
(12, 6, 1),
(14, 8, 1);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE IF NOT EXISTS `products` (
`id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `alias` varchar(200) NOT NULL,
  `code` varchar(15) NOT NULL,
  `trademark` int(11) NOT NULL,
  `description` text,
  `price` decimal(10,0) NOT NULL,
  `special` tinyint(1) DEFAULT '0',
  `hot` tinyint(1) NOT NULL,
  `sale_off` int(11) DEFAULT '0',
  `percent_discount` tinyint(3) NOT NULL,
  `deal_time` date NOT NULL,
  `deal` tinyint(4) NOT NULL,
  `point` int(11) NOT NULL,
  `bought` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `picture` text,
  `image` varchar(50) NOT NULL,
  `zoom_image` varchar(500) NOT NULL,
  `created` date DEFAULT '0000-00-00',
  `created_by` varchar(255) DEFAULT NULL,
  `modified` date DEFAULT '0000-00-00',
  `modified_by` varchar(255) DEFAULT NULL,
  `hits` int(11) NOT NULL,
  `meta_description` varchar(150) NOT NULL,
  `meta_keyword` varchar(150) NOT NULL,
  `status` tinyint(1) DEFAULT '0',
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=76 ;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `alias`, `code`, `trademark`, `description`, `price`, `special`, `hot`, `sale_off`, `percent_discount`, `deal_time`, `deal`, `point`, `bought`, `quantity`, `picture`, `image`, `zoom_image`, `created`, `created_by`, `modified`, `modified_by`, `hits`, `meta_description`, `meta_keyword`, `status`, `category_id`) VALUES
(28, 'ÁO KHOÁC KAKI SIVER', 'ao-khoac-kaki-siver', 'BY4043', 32, '', '700000', 0, 0, 350000, 50, '0000-00-00', 0, 0, 28, 0, NULL, 'product_2dX30M5y.jpg', 'product_JXE9Ksoy.jpg', '2015-10-29', NULL, '2016-05-12', '', 2, '', '', 1, 143),
(32, 'Áo somi phối ren oversize', 'ao-somi-phoi-ren-oversize', 'BY2015', 0, '', '370000', 1, 0, 175000, 52, '0000-00-00', 0, 0, 0, 36, 'product_0raJ1yNv.jpg,product_Xpa8oAI3.jpg', 'product_AS3ZBzEN.jpg', 'product_EPr4u2Ua.jpg,product_PDNV4Zle.jpg', '2015-10-29', NULL, '2016-05-10', '', 68, '', '', 1, 141),
(33, 'Sơ Mi Sọc Cổ Trụ', 'so-mi-soc-co-tru', 'SMK05', 30, '<p>Kiểu dáng: Áo ren hoa thêu nổi là sản phẩm đảm bảo 100% như hình, với thiết kể cổ tròn, tay ngắn form suông sẽ mang đến cho người mặc cảm giác nhẹ nhàng kín đáo nhưng vẫn không kém phần duyên dáng, sang trọng.</p>\r\n\r\n<p>Với việc sở hữu nó đồng nghĩa với việc bạn đang mang trên mình một kiểu dáng sang nhã và đầy quyến rũ.</p>\r\n', '300000', 0, 0, 145000, 51, '0000-00-00', 0, 0, 0, 69, 'product_N78OY6QA.jpg,product_J1G8hMEH.jpg', 'product_pZbzwEPF.jpg', 'product_TCFBZxNL.jpg,product_h63gjZ7m.jpg', '2015-10-29', NULL, '2016-05-10', '', 19, '', '', 1, 141),
(34, 'Đầm body tay dài', 'dam-body-tay-dai', 'AHG91S', 31, '', '540000', 0, 1, 275000, 49, '0000-00-00', 0, 0, 0, 0, NULL, 'product_iyIv5gk6.jpg', 'product_Jqp29KsS.jpg', '2015-10-29', NULL, '2016-05-12', '', 0, '', '', 1, 142),
(35, 'Quần thun Alibaba', 'quan-thun-alibaba', 'AHGJHG', 31, '', '284000', 0, 1, 150000, 47, '0000-00-00', 0, 0, 0, 0, NULL, 'product_bptMCHR2.jpg', 'product_Bvjm9QqV.jpg', '2015-10-29', NULL, '2016-05-12', '', 0, '', '', 1, 144),
(36, ' Áo sơ mi nam tròng đầu Facioshop', 'ao-so-mi-nam-trong-dau-facioshop', ' SB359', 36, '', '187000', 0, 1, 110000, 41, '0000-00-00', 0, 0, 0, 0, NULL, 'product_dRzD5xVB.jpg', '', '2015-10-29', NULL, '2016-05-16', '', 158, '', '', 1, 145),
(37, 'Áo Khoác dù nam sọc ngực 2 màu', 'ao-khoac-du-nam-soc-nguc-2-mau', 'KB066', 30, '', '177000', 0, 1, 95580, 46, '0000-00-00', 0, 0, 0, 0, NULL, 'product_xfaX1yHR.jpg', 'product_7V5t4j0k.jpg', '2015-10-29', NULL, '2016-05-12', '', 2, '', '', 1, 146),
(38, 'Quần kaki nam Hàn Quốc', 'quan-kaki-nam-han-quoc', 'HHGEUG', 31, '', '200000', 0, 1, 180000, 10, '2016-05-31', 1, 0, 0, 0, NULL, 'product_b4L8tQpd.jpg', 'product_WTipwyfd.jpg', '2015-10-29', NULL, '2016-05-16', '', 3, '', '', 1, 147),
(39, 'Ví tiền cao cấp sang trọng', 'vi-tien-cao-cap-sang-trong', 'HJGEUN', 32, NULL, '190000', 1, 1, 100000, 47, '0000-00-00', 0, 0, 0, 0, NULL, 'product_FRoQ5h9D.jpg', '', '2015-10-29', NULL, '2015-12-06', NULL, 2, '', '', 1, 134),
(41, 'Bộ sọc Mickey kèm túi Oshkosh Xanh', 'bo-soc-mickey-kem-tui-oshkosh-xanh', 'AHGUH', 36, '', '199000', 1, 1, 179100, 10, '2016-05-31', 1, 0, 0, 0, NULL, 'product_xeENwMWa.jpg', 'product_69ICeZDS.jpg', '2015-10-29', NULL, '2016-05-16', '', 6, '', '', 1, 149),
(42, 'Bộ đồ caravat', 'bo-do-caravat', 'DB139', 33, '', '200000', 1, 1, 120000, 40, '0000-00-00', 0, 0, 0, 0, NULL, 'product_av7nkUfK.jpg', 'product_yPvnVZIL.jpg', '2015-10-29', NULL, '2016-05-12', '', 0, '', '', 1, 142),
(43, ' Máy bay cánh bằng Flycam Syma X8C', 'may-bay-canh-bang-flycam-syma-x8c', 'AJGOJH', 34, '', '500000', 1, 1, 450000, 10, '0000-00-00', 0, 0, 0, 0, NULL, 'product_gCvAkWi9.jpg', 'product_EhtbwasT.jpg', '2015-10-29', NULL, '2016-05-14', '', 0, '', '', 1, 138),
(44, 'Mũ vải che tai bé gái, đính hình thỏ trắng dễ thương', 'mu-vai-che-tai-be-gai-dinh-hinh-tho-trang-de-thuong', 'KGHUEB', 37, '', '50000', 1, 1, 40000, 20, '2016-05-31', 1, 0, 0, 0, NULL, 'product_SUchfpwD.jpg', 'product_MOVDqrhC.jpg', '2015-10-29', NULL, '2016-05-16', '', 0, '', '', 1, 152),
(45, 'Trọn gói đi sinh cho mẹ bầu', 'tron-goi-di-sinh-cho-me-bau', 'HGUNHJ', 38, '', '590000', 1, 1, 240000, 59, '2016-05-31', 1, 0, 0, 0, NULL, 'product_HuYd6I9O.jpg', '', '2015-10-29', NULL, '2016-05-16', '', 3, '', '', 1, 153),
(46, 'ĐỒNG HỒ NAM BURBERRY MỚI 2015', 'dong-ho-nam-burberry-moi-2015', 'DH872BU', 33, '', '1200000', 1, 1, 600000, -128, '2016-05-31', 1, 0, 0, 0, NULL, 'product_DGmA3dQs.jpg', 'product_NP1yaqQh.jpg', '2015-10-29', NULL, '2016-05-16', '', 29, '', '', 1, 154),
(47, 'Đồng hồ nữ sang trọng', 'dong-ho-nu-sang-trong', 'HUGHEJ', 0, '', '200000', 1, 1, 100000, 50, '2016-05-31', 1, 0, 0, 0, NULL, 'product_INnkheag.jpg', 'product_YmIngfZ0.jpg', '2015-10-29', NULL, '2016-05-16', '', 0, '', '', 1, 155),
(48, 'Tủ đựng đồng hồ và trang sức', 'tu-dung-dong-ho-va-trang-suc', 'HUGHEJ', 0, '', '200000', 1, 1, 100000, 50, '2016-05-31', 1, 0, 0, 0, 'product_ioZQ5Fj1.jpg,product_BOxNAyKn.jpg,product_miIgUWc1.jpg,product_xjRsk6IA.jpg', 'product_yWoefV30.jpg', 'product_XAMez0lq.jpg', '2015-10-29', NULL, '2016-05-16', '', 0, '', '', 1, 158),
(49, 'Sữa Dưỡng Da Aveeno Daily', 'sua-duong-da-aveeno-daily', 'GHUGH', 35, '<p>Kiểu dáng: Áo ren hoa thêu nổi là sản phẩm đảm bảo 100% như hình, với thiết kể cổ tròn, tay ngắn form suông sẽ mang đến cho người mặc cảm giác nhẹ nhàng kín đáo nhưng vẫn không kém phần duyên dáng, sang trọng.</p>\r\n\r\n<p>Với việc sở hữu nó đồng nghĩa với việc bạn đang mang trên mình một kiểu dáng sang nhã và đầy quyến rũ.</p>\r\n', '590000', 1, 1, 390000, 33, '2016-05-31', 1, 0, 0, 58, 'product_weQaUxyF.jpg,product_nVFzl5Ug.jpg', 'product_D8LzkRpb.jpg', 'product_y7M0nID6.jpg', '2015-10-29', NULL, '2016-05-16', '', 0, '', '', 1, 159),
(50, 'Giầy dép nữ cáo cấp', 'giay-dep-nu-cao-cap', 'MSHUWH', 33, '', '300000', 1, 1, 250000, 16, '2016-05-31', 1, 0, 0, 0, NULL, 'product_pf69l3YA.jpg', 'product_5LBE4hWP.jpg', '2015-11-08', NULL, '2016-05-16', '', 1, '', '', 1, 179),
(51, 'Đầm bé gái cao cấp', 'dam-be-gai-cao-cap', 'GHEID', 34, '', '250000', 1, 1, 170000, 32, '2016-05-31', 1, 0, 0, 0, NULL, 'product_yIL0oXsV.jpg', 'product_s5t4cUwO.jpg', '2015-11-10', NULL, '2016-05-16', '', 18, '', '', 1, 149),
(52, 'Đầm MuLet Phối Ren Sang Chảnh', 'dam-mulet-phoi-ren-sang-chanh', 'F9439', 37, '', '270000', 0, 1, 150000, 44, '2016-05-31', 1, 0, 0, 29, NULL, 'product_bAvtBucV.jpg', 'product_srnC3Quy.jpg', '2015-11-10', NULL, '2016-05-16', '', 2, '', '', 1, 142),
(53, 'Áo khoác hàn quốc cao cấp', 'ao-khoac-han-quoc-cao-cap', 'MSHTJ', 37, '<p>Kiểu dáng: Áo ren hoa thêu nổi là sản phẩm đảm bảo 100% như hình, với thiết kể cổ tròn, tay ngắn form suông sẽ mang đến cho người mặc cảm giác nhẹ nhàng kín đáo nhưng vẫn không kém phần duyên dáng, sang trọng.</p>\r\n\r\n<p>Với việc sở hữu nó đồng nghĩa với việc bạn đang mang trên mình một kiểu dáng sang nhã và đầy quyến rũ.</p>\r\n', '375000', 0, 1, 250000, 33, '2016-05-31', 1, 0, 11, 28, '', 'product_6kwDcVF0.jpg', 'product_35BOpa6E.jpg,product_ReTo5Pcj.jpg', '2015-11-14', NULL, '2016-05-16', '', 240, '', '', 1, 141),
(54, 'Áo thời trang eva', 'ao-thoi-trang-eva', 'UHGJD', 31, '<p>Kiểu dáng: Áo ren hoa thêu nổi là sản phẩm đảm bảo 100% như hình, với thiết kể cổ tròn, tay ngắn form suông sẽ mang đến cho người mặc cảm giác nhẹ nhàng kín đáo nhưng vẫn không kém phần duyên dáng, sang trọng.</p>\r\n\r\n<p>Với việc sở hữu nó đồng nghĩa với việc bạn đang mang trên mình một kiểu dáng sang nhã và đầy quyến rũ.</p>\r\n', '350000', 0, 1, 250000, 28, '2016-05-31', 1, 0, 0, 34, 'product_4D6yVjEr.jpg,product_NnBsU5W3.jpg', 'product_0MZqVint.jpg', 'product_jFgMuiZ5.jpg,product_Zqalb49A.jpg', '2015-11-14', NULL, '2016-05-16', '', 28, '', '', 1, 141),
(55, 'áo kiểu dáng sang nhã', 'ao-kieu-dang-sang-nha', 'HGUEIG', 34, '<p>Kiểu dáng: Áo ren hoa thêu nổi là sản phẩm đảm bảo 100% như hình, với thiết kể cổ tròn, tay ngắn form suông sẽ mang đến cho người mặc cảm giác nhẹ nhàng kín đáo nhưng vẫn không kém phần duyên dáng, sang trọng.</p>\r\n\r\n<p>Với việc sở hữu nó đồng nghĩa với việc bạn đang mang trên mình một kiểu dáng sang nhã và đầy quyến rũ.</p>\r\n', '450000', 0, 1, 370000, 17, '2016-05-31', 1, 0, 42, 33, 'product_1MV2GxCb.jpg,product_i5XbUgzR.jpg', 'product_aSifMcvK.jpg', 'product_vgtkTliu.jpg,product_P5ECmdDZ.jpg', '2015-11-14', NULL, '2016-05-16', '', 67, '', '', 1, 141),
(57, 'Áo công sở đi làm nữ', 'ao-cong-so-di-lam-nu', 'GHJEGH', 30, '<p>Kiểu dáng: Áo ren hoa thêu nổi là sản phẩm đảm bảo 100% như hình, với thiết kể cổ tròn, tay ngắn form suông sẽ mang đến cho người mặc cảm giác nhẹ nhàng kín đáo nhưng vẫn không kém phần duyên dáng, sang trọng.</p>\r\n\r\n<p>Với việc sở hữu nó đồng nghĩa với việc bạn đang mang trên mình một kiểu dáng sang nhã và đầy quyến rũ.</p>\r\n', '340000', 0, 1, 310000, 8, '2016-05-31', 1, 0, 16, 19, 'product_icul8zhk.jpg,product_Hc2p06wU.jpg', 'product_7A5mZxHS.jpg', 'product_gwfoOPR1.jpg,product_WFjBipMr.jpg', '2015-11-14', NULL, '2016-05-16', '', 18, '', '', 1, 141),
(58, 'Đầm váy nữ hàn quốc', 'dam-vay-nu-han-quoc', 'JGHEJG', 30, '<p>Kiểu dáng: Áo ren hoa thêu nổi là sản phẩm đảm bảo 100% như hình, với thiết kể cổ tròn, tay ngắn form suông sẽ mang đến cho người mặc cảm giác nhẹ nhàng kín đáo nhưng vẫn không kém phần duyên dáng, sang trọng.</p>\r\n\r\n<p>Với việc sở hữu nó đồng nghĩa với việc bạn đang mang trên mình một kiểu dáng sang nhã và đầy quyến rũ.</p>\r\n', '320000', 0, 1, 290000, 9, '2016-09-30', 1, 0, 37, 25, 'product_kT6SvUOR.jpg,product_n9RZgmaq.jpg', 'product_jRyLD71r.jpg', 'product_guDzsVH6.jpg,product_xEuk48nZ.jpg', '2015-11-14', NULL, '2016-05-10', '', 25, '', '', 1, 141),
(59, 'Áo sơ mi sang trọng', 'ao-so-mi-sang-trong', 'KGHEUS', 34, '<p>Kiểu dáng: Áo ren hoa thêu nổi là sản phẩm đảm bảo 100% như hình, với thiết kể cổ tròn, tay ngắn form suông sẽ mang đến cho người mặc cảm giác nhẹ nhàng kín đáo nhưng vẫn không kém phần duyên dáng, sang trọng.</p>\r\n\r\n<p>Với việc sở hữu nó đồng nghĩa với việc bạn đang mang trên mình một kiểu dáng sang nhã và đầy quyến rũ.</p>\r\n', '150000', 0, 1, 120000, 20, '0000-00-00', 0, 0, 0, 26, 'product_04SyPes9.jpg,product_GW9iXDFv.jpg', 'product_MuJH2fDc.jpg', 'product_YXwifEmc.jpg,product_zMDdyJmN.jpg', '2015-11-14', NULL, '2016-05-10', '', 8, '', '', 1, 141),
(60, 'Áo sơ mi nữ', 'ao-so-mi-nu', 'KGHEYG', 32, '<p>Kiểu dáng: Áo ren hoa thêu nổi là sản phẩm đảm bảo 100% như hình, với thiết kể cổ tròn, tay ngắn form suông sẽ mang đến cho người mặc cảm giác nhẹ nhàng kín đáo nhưng vẫn không kém phần duyên dáng, sang trọng.</p>\r\n\r\n<p>Với việc sở hữu nó đồng nghĩa với việc bạn đang mang trên mình một kiểu dáng sang nhã và đầy quyến rũ.</p>\r\n', '250000', 0, 1, 230000, 8, '2016-06-25', 1, 0, 22, 39, 'product_tOzVeFAQ.jpg,product_jDbN132h.jpg', 'product_oDgXzmwH.jpg', 'product_0zjDvkxB.jpg,product_dOIFhHze.jpg', '2015-11-14', NULL, '2016-05-10', '', 70, '', '', 1, 141),
(61, 'Áo khoách sành điệu cho giới nữ', 'ao-khoach-sanh-dieu-cho-gioi-nu', 'KGHUES', 30, '<p>Kiểu dáng: Áo ren hoa thêu nổi là sản phẩm đảm bảo 100% như hình, với thiết kể cổ tròn, tay ngắn form suông sẽ mang đến cho người mặc cảm giác nhẹ nhàng kín đáo nhưng vẫn không kém phần duyên dáng, sang trọng.</p>\r\n\r\n<p>Với việc sở hữu nó đồng nghĩa với việc bạn đang mang trên mình một kiểu dáng sang nhã và đầy quyến rũ.</p>\r\n', '220000', 0, 1, 100000, 54, '2017-01-27', 1, 0, 0, 70, 'product_hTs3NwJl.jpg,product_aK9n7IPL.jpg', 'product_e0PoE9Lq.jpg', 'product_kBvbYheV.jpg,product_YuFs9KHA.jpg', '2015-11-14', NULL, '2016-05-10', '', 96, '', '', 1, 141),
(62, 'Áo đầm xòe duyên dáng', 'ao-dam-xoe-duyen-dang', 'KGHUEN', 34, '<p>Kiểu dáng: Áo ren hoa thêu nổi là sản phẩm đảm bảo 100% như hình, với thiết kể cổ tròn, tay ngắn form suông sẽ mang đến cho người mặc cảm giác nhẹ nhàng kín đáo nhưng vẫn không kém phần duyên dáng, sang trọng.</p>\r\n\r\n<p>Với việc sở hữu nó đồng nghĩa với việc bạn đang mang trên mình một kiểu dáng sang nhã và đầy quyến rũ.</p>\r\n', '150000', 0, 1, 120000, 20, '2016-04-30', 1, 0, 0, 20, 'product_KtEfd61R.jpg,product_S9ywnlfX.jpg', 'product_c0GTSnza.jpg', 'product_oDjrwR2J.jpg,product_5pK0g289.jpg', '2015-11-14', NULL, '2016-05-10', '', 83, '', '', 1, 141),
(63, 'Áo nữ thời trang', 'ao-nu-thoi-trang', 'GKHUEA', 35, '<p>Kiểu dáng: Áo ren hoa thêu nổi là sản phẩm đảm bảo 100% như hình, với thiết kể cổ tròn, tay ngắn form suông sẽ mang đến cho người mặc cảm giác nhẹ nhàng kín đáo nhưng vẫn không kém phần duyên dáng, sang trọng.</p>\r\n\r\n<p>Với việc sở hữu nó đồng nghĩa với việc bạn đang mang trên mình một kiểu dáng sang nhã và đầy quyến rũ.</p>\r\n', '1400000', 0, 1, 1300000, 7, '0000-00-00', 0, 0, 31, 20, 'product_ncNk6dTD.jpg,product_uf8SM3hy.jpg', 'product_wxD7XBNz.jpg', 'product_ex70IGCl.jpg,product_Pw71Jils.jpg', '2015-11-14', NULL, '2016-05-10', '', 46, '', '', 1, 141),
(64, 'Áo váy đầm nữ', 'ao-vay-dam-nu', 'UGHEJH', 36, '<p>Kiểu dáng: Áo ren hoa thêu nổi là sản phẩm đảm bảo 100% như hình, với thiết kể cổ tròn, tay ngắn form suông sẽ mang đến cho người mặc cảm giác nhẹ nhàng kín đáo nhưng vẫn không kém phần duyên dáng, sang trọng.</p>\r\n\r\n<p>Với việc sở hữu nó đồng nghĩa với việc bạn đang mang trên mình một kiểu dáng sang nhã và đầy quyến rũ.</p>\r\n', '590000', 0, 1, 550000, 6, '2016-07-29', 1, 0, 0, 40, 'product_YAWI6MGh.jpg,product_lW5ROTPD.jpg', 'product_mHMcNq0f.jpg', '', '2015-11-14', NULL, '2016-05-10', '', 219, '', '', 1, 141),
(65, 'Tinh Chất Dưỡng Da Chia Seed', 'tinh-chat-duong-da-chia-seed', 'NLGEH', 33, '<p>Kiểu dáng: Áo ren hoa thêu nổi là sản phẩm đảm bảo 100% như hình, với thiết kể cổ tròn, tay ngắn form suông sẽ mang đến cho người mặc cảm giác nhẹ nhàng kín đáo nhưng vẫn không kém phần duyên dáng, sang trọng.</p>\r\n\r\n<p>Với việc sở hữu nó đồng nghĩa với việc bạn đang mang trên mình một kiểu dáng sang nhã và đầy quyến rũ.</p>\r\n', '200000', 0, 1, 150000, 25, '0000-00-00', 0, 0, 25, 50, 'product_lVcW6FN2.jpg,product_zB9Y7RPe.jpg', 'product_bjgnwUmI.png', 'product_w1BGh52X.jpg,product_GTjb9uUL.jpg', '2016-03-30', NULL, '2016-05-10', '', 1, '', '', 1, 159),
(66, 'Kem dưỡng da trắng chống nắng', 'kem-duong-da-trang-chong-nang', 'KGHEU', 33, '<p>Kiểu dáng: Áo ren hoa thêu nổi là sản phẩm đảm bảo 100% như hình, với thiết kể cổ tròn, tay ngắn form suông sẽ mang đến cho người mặc cảm giác nhẹ nhàng kín đáo nhưng vẫn không kém phần duyên dáng, sang trọng.</p>\r\n\r\n<p>Với việc sở hữu nó đồng nghĩa với việc bạn đang mang trên mình một kiểu dáng sang nhã và đầy quyến rũ.</p>\r\n', '290000', 0, 1, 190000, 34, '0000-00-00', 0, 0, 0, 50, 'product_gVMp1803.jpg,product_B9GhbWAe.jpg', 'product_jb3ZrLde.jpg', 'product_ex2CYHO4.png,product_WxAonUsb.jpg', '2016-03-30', NULL, '2016-05-10', '', 1, '', '', 1, 159),
(67, 'Kem Dưỡng Da Secret Cream', 'kem-duong-da-secret-cream', 'KHGUHE', 34, '<p>Kiểu dáng: Áo ren hoa thêu nổi là sản phẩm đảm bảo 100% như hình, với thiết kể cổ tròn, tay ngắn form suông sẽ mang đến cho người mặc cảm giác nhẹ nhàng kín đáo nhưng vẫn không kém phần duyên dáng, sang trọng.</p>\r\n\r\n<p>Với việc sở hữu nó đồng nghĩa với việc bạn đang mang trên mình một kiểu dáng sang nhã và đầy quyến rũ.</p>\r\n', '315000', 0, 0, 210000, 33, '0000-00-00', 0, 0, 25, 20, 'product_PoHd72hS.jpg,product_iVqbICrS.jpg', 'product_hYBZj0El.jpg', 'product_nbJlD7FW.png,product_RQYcPDjM.jpg', '2016-03-30', NULL, '2016-05-10', '', 0, '', '', 1, 159),
(68, 'Dưỡng Thể Nước Hoa Perfume', 'duong-the-nuoc-hoa-perfume', 'KHGUH', 35, '<p>Kiểu dáng: Áo ren hoa thêu nổi là sản phẩm đảm bảo 100% như hình, với thiết kể cổ tròn, tay ngắn form suông sẽ mang đến cho người mặc cảm giác nhẹ nhàng kín đáo nhưng vẫn không kém phần duyên dáng, sang trọng.</p>\r\n\r\n<p>Với việc sở hữu nó đồng nghĩa với việc bạn đang mang trên mình một kiểu dáng sang nhã và đầy quyến rũ.</p>\r\n', '650000', 0, 0, 520000, 20, '0000-00-00', 0, 0, 0, 40, 'product_8PKFdEwU.jpg,product_hxrlsvIO.jpg', 'product_2OrsdmJl.jpg', 'product_IAiRT4Yr.jpg,product_SgsQrkBV.png', '2016-03-30', NULL, '2016-05-10', '', 0, '', '', 1, 159),
(69, 'Tinh dầu Argan', 'tinh-dau-argan', 'KHGEH', 35, '<p>Kiểu dáng: Áo ren hoa thêu nổi là sản phẩm đảm bảo 100% như hình, với thiết kể cổ tròn, tay ngắn form suông sẽ mang đến cho người mặc cảm giác nhẹ nhàng kín đáo nhưng vẫn không kém phần duyên dáng, sang trọng.</p>\r\n\r\n<p>Với việc sở hữu nó đồng nghĩa với việc bạn đang mang trên mình một kiểu dáng sang nhã và đầy quyến rũ.</p>\r\n', '259000', 0, 1, 220000, 15, '0000-00-00', 0, 0, 10, 49, 'product_lqxDiRtS.jpg,product_Vbdh9PnF.jpg', 'product_wc7hTr5o.jpg', 'product_uQRErG8d.jpg,product_gMJp3m0G.png', '2016-03-30', NULL, '2016-05-10', '', 4, '', '', 1, 159),
(70, 'Buffet Thái Chính Hiệu', 'buffet-thai-chinh-hieu', 'HGKLHD', 31, '<p>Kiểu dáng: Áo ren hoa thêu nổi là sản phẩm đảm bảo 100% như hình, với thiết kể cổ tròn, tay ngắn form suông sẽ mang đến cho người mặc cảm giác nhẹ nhàng kín đáo nhưng vẫn không kém phần duyên dáng, sang trọng.</p>\r\n\r\n<p>Với việc sở hữu nó đồng nghĩa với việc bạn đang mang trên mình một kiểu dáng sang nhã và đầy quyến rũ.</p>\r\n', '399000', 0, 0, 259900, 34, '0000-00-00', 0, 0, 1, 50, 'product_eEuHh0tj.jpg,product_7KdLvp5q.jpg', 'product_vrqHfMCi.jpg', 'product_SWdjBCq6.jpg', '2016-03-30', NULL, '2016-05-11', '', 16, '', '', 1, 139),
(71, 'Lotteria Combo Giá Sốc nhất', 'lotteria-combo-gia-soc-nhat', 'GHKHG', 38, '<p>Kiểu dáng: Áo ren hoa thêu nổi là sản phẩm đảm bảo 100% như hình, với thiết kể cổ tròn, tay ngắn form suông sẽ mang đến cho người mặc cảm giác nhẹ nhàng kín đáo nhưng vẫn không kém phần duyên dáng, sang trọng.</p>\r\n\r\n<p>Với việc sở hữu nó đồng nghĩa với việc bạn đang mang trên mình một kiểu dáng sang nhã và đầy quyến rũ.</p>\r\n', '150000', 0, 1, 120000, 20, '0000-00-00', 0, 0, 3, 60, 'product_ztObTKVB.jpg,product_yCkbIV1m.jpg', 'product_74ynMTkl.jpg', 'product_q3DdQEJf.jpg', '2016-03-30', NULL, '2016-05-11', '', 2, '', '', 1, 139),
(72, 'Pizza Ý Đúng Điệu', 'pizza-y-dung-dieu', 'HGKUHE', 32, '<p>Kiểu dáng: Áo ren hoa thêu nổi là sản phẩm đảm bảo 100% như hình, với thiết kể cổ tròn, tay ngắn form suông sẽ mang đến cho người mặc cảm giác nhẹ nhàng kín đáo nhưng vẫn không kém phần duyên dáng, sang trọng.</p>\r\n\r\n<p>Với việc sở hữu nó đồng nghĩa với việc bạn đang mang trên mình một kiểu dáng sang nhã và đầy quyến rũ.</p>\r\n', '120000', 0, 0, 110000, 8, '0000-00-00', 0, 0, 21, 40, 'product_C8PXSlz9.jpg,product_Eorfbk71.jpg', 'product_JwstueCV.jpg', 'product_1HVzKLjy.jpg', '2016-03-30', NULL, '2016-05-11', '', 2, '', '', 1, 139),
(73, 'Cua Chế Biến Tùy Chọn', 'cua-che-bien-tuy-chon', 'GOHOHOD', 34, '<p>Kiểu dáng: Áo ren hoa thêu nổi là sản phẩm đảm bảo 100% như hình, với thiết kể cổ tròn, tay ngắn form suông sẽ mang đến cho người mặc cảm giác nhẹ nhàng kín đáo nhưng vẫn không kém phần duyên dáng, sang trọng.</p>\r\n\r\n<p>Với việc sở hữu nó đồng nghĩa với việc bạn đang mang trên mình một kiểu dáng sang nhã và đầy quyến rũ.</p>\r\n', '150000', 0, 1, 130000, 13, '0000-00-00', 0, 0, 1, 50, 'product_6iJt1fyb.jpg,product_pO5igxlk.jpg', 'product_lXsa6bFz.jpg', 'product_MlJEsPiW.jpg', '2016-03-30', NULL, '2016-05-11', '', 2, '', '', 1, 139),
(74, 'Combo 2 Kem Xôi Dừa/ Pizza', 'combo-2-kem-xoi-dua-pizza', 'LOGHE', 31, '<p>Kiểu dáng: Áo ren hoa thêu nổi là sản phẩm đảm bảo 100% như hình, với thiết kể cổ tròn, tay ngắn form suông sẽ mang đến cho người mặc cảm giác nhẹ nhàng kín đáo nhưng vẫn không kém phần duyên dáng, sang trọng.</p>\r\n\r\n<p>Với việc sở hữu nó đồng nghĩa với việc bạn đang mang trên mình một kiểu dáng sang nhã và đầy quyến rũ.</p>\r\n', '250000', 0, 0, 210000, 16, '0000-00-00', 0, 0, 14, 20, 'product_IHZLd8zF.jpg,product_7fDjMt2b.jpg', 'product_L5whOipE.jpg', 'product_7sl1YG3v.jpg', '2016-03-30', NULL, '2016-05-11', '', 1, '', '', 1, 167),
(75, 'Buffet Chooki BBQ & Hotpot', 'buffet-chooki-bbq-hotpot', 'LJGIB', 36, '', '320000', 0, 1, 310000, 3, '0000-00-00', 0, 0, 28, 50, 'product_6VtF5jL3.jpg,product_Hz7Excqv.jpg', 'product_ZInxjVet.jpg', 'product_xAKVhO56.jpg', '2016-03-30', NULL, '2016-05-11', '', 2, '', '', 1, 168);

-- --------------------------------------------------------

--
-- Table structure for table `product_attributes`
--

CREATE TABLE IF NOT EXISTS `product_attributes` (
`id` int(11) NOT NULL,
  `attributes` varchar(60) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `product_attributes`
--

INSERT INTO `product_attributes` (`id`, `attributes`, `status`) VALUES
(1, 'test', 1),
(2, 'test1', 1),
(3, 'test2', 1);

-- --------------------------------------------------------

--
-- Table structure for table `product_attributes_product`
--

CREATE TABLE IF NOT EXISTS `product_attributes_product` (
`id` int(11) NOT NULL,
  `attributes_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `value` varchar(60) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `product_attributes_product`
--

INSERT INTO `product_attributes_product` (`id`, `attributes_id`, `product_id`, `value`, `status`) VALUES
(2, 1, 75, 'abv', 1);

-- --------------------------------------------------------

--
-- Table structure for table `product_size`
--

CREATE TABLE IF NOT EXISTS `product_size` (
`id` int(11) NOT NULL,
  `size` varchar(30) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `product_size`
--

INSERT INTO `product_size` (`id`, `size`, `status`) VALUES
(13, 'XL', 1),
(15, 'L', 1),
(16, 'test', 1);

-- --------------------------------------------------------

--
-- Table structure for table `product_size_product`
--

CREATE TABLE IF NOT EXISTS `product_size_product` (
`id` int(11) NOT NULL,
  `size_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `price` decimal(10,0) NOT NULL,
  `status` tinyint(4) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=167 ;

--
-- Dumping data for table `product_size_product`
--

INSERT INTO `product_size_product` (`id`, `size_id`, `product_id`, `price`, `status`) VALUES
(69, 13, 64, '540000', 1),
(73, 13, 63, '1330000', 1),
(77, 13, 62, '150000', 1),
(82, 13, 61, '130000', 1),
(88, 13, 60, '250000', 1),
(94, 13, 59, '150000', 1),
(118, 13, 56, '490000', 1),
(129, 13, 65, '270000', 1),
(140, 13, 57, '330000', 1),
(144, 13, 58, '310000', 1),
(166, 13, 75, '100000', 1);

-- --------------------------------------------------------

--
-- Table structure for table `product_tag`
--

CREATE TABLE IF NOT EXISTS `product_tag` (
`id` int(11) NOT NULL,
  `tag_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `product_tag`
--

INSERT INTO `product_tag` (`id`, `tag_id`, `product_id`) VALUES
(2, 5, 75);

-- --------------------------------------------------------

--
-- Table structure for table `ratings`
--

CREATE TABLE IF NOT EXISTS `ratings` (
  `id` varchar(11) NOT NULL,
  `total_votes` int(11) NOT NULL DEFAULT '0',
  `total_value` int(11) NOT NULL DEFAULT '0',
  `used_ips` longtext
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ratings`
--

INSERT INTO `ratings` (`id`, `total_votes`, `total_value`, `used_ips`) VALUES
('32', 1, 6, 'a:1:{i:0;s:9:"127.0.0.1";}'),
('57', 1, 8, 'a:1:{i:0;s:9:"127.0.0.1";}'),
('62', 1, 10, 'a:1:{i:0;s:9:"127.0.0.1";}'),
('64', 1, 2, 'a:1:{i:0;s:9:"127.0.0.1";}'),
('53', 1, 8, 'a:1:{i:0;s:9:"127.0.0.1";}'),
('33', 1, 6, 'a:1:{i:0;s:9:"127.0.0.1";}'),
('63', 0, 0, ''),
('54', 1, 10, 'a:1:{i:0;s:9:"127.0.0.1";}'),
('61', 0, 0, ''),
('36', 0, 0, ''),
('39', 0, 0, ''),
('38', 0, 0, ''),
('51', 0, 0, ''),
('60', 0, 0, ''),
('59', 0, 0, ''),
('41', 0, 0, ''),
('55', 0, 0, ''),
('37', 0, 0, ''),
('73', 0, 0, ''),
('71', 0, 0, ''),
('74', 0, 0, ''),
('70', 0, 0, ''),
('72', 0, 0, ''),
('66', 0, 0, ''),
('75', 0, 0, ''),
('45', 0, 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE IF NOT EXISTS `tags` (
`id` int(11) NOT NULL,
  `description` text NOT NULL,
  `create_by` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `alias` varchar(100) NOT NULL,
  `hits` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`id`, `description`, `create_by`, `name`, `alias`, `hits`, `status`) VALUES
(5, '', 'Duy Quang', 'học mãi', 'hoc-mai', 0, 1),
(6, '', 'Duy Quang', 'học hoài', 'hoc-hoai', 0, 1),
(7, '', 'Duy Quang', 'hoc nưa học', 'hoc-nua-hoc', 0, 1),
(8, '', 'Duy Quang', 'hinhe', 'hinhe', 0, 1),
(9, '', 'Duy Quang', 'Quang E', 'quang-e', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
`id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `sex` tinyint(1) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `avatar` varchar(255) NOT NULL,
  `sign` text NOT NULL,
  `phone` varchar(12) NOT NULL,
  `birthday` date NOT NULL,
  `address` varchar(100) NOT NULL,
  `created` datetime DEFAULT '0000-00-00 00:00:00',
  `created_by` varchar(45) DEFAULT NULL,
  `modified` datetime DEFAULT '0000-00-00 00:00:00',
  `modified_by` varchar(45) DEFAULT NULL,
  `last_sign` datetime NOT NULL,
  `register_time` datetime DEFAULT '0000-00-00 00:00:00',
  `register_ip` varchar(25) DEFAULT NULL,
  `active_code` varchar(45) NOT NULL,
  `active_time` datetime NOT NULL,
  `status` tinyint(1) DEFAULT '0',
  `ordering` int(11) DEFAULT '10',
  `group_id` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=24 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `sex`, `email`, `password`, `avatar`, `sign`, `phone`, `birthday`, `address`, `created`, `created_by`, `modified`, `modified_by`, `last_sign`, `register_time`, `register_ip`, `active_code`, `active_time`, `status`, `ordering`, `group_id`) VALUES
(1, 'Administrator', 1, 'Admin01@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'user_DqlrdZVQ.jpg', '<p>The HeadScript helper allows you to manage both. The HeadScript helper supports the following methods for setting and adding scripts</p>\r\n', '01286483732', '1993-10-10', '', '2014-12-10 08:55:35', 'admin', '2014-12-16 12:08:59', 'admin', '2016-05-18 00:57:00', '0000-00-00 00:00:00', NULL, '1', '0000-00-00 00:00:00', 1, 2, 1),
(17, 'Nguyễn Duy Quang', 0, 'duy_quang422@yahoo.com', 'e10adc3949ba59abbe56e057f20f883e', '', '', '', '0000-00-00', '', '2015-12-28 04:29:03', NULL, '0000-00-00 00:00:00', NULL, '2016-05-16 11:34:55', '0000-00-00 00:00:00', '127.0.0.1', '1', '0000-00-00 00:00:00', 1, 0, 2),
(18, 'Nguyễn Văn A', 0, 'abc@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '', '', '', '0000-00-00', '', '2016-01-02 17:24:20', NULL, '0000-00-00 00:00:00', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '127.0.0.1', '1', '0000-00-00 00:00:00', 1, 0, 1),
(19, 'Nguyễn Hoài Thanh Nhi', 0, 'thanhnhi@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '', '', '', '0000-00-00', '', '2016-01-02 17:27:31', NULL, '0000-00-00 00:00:00', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '127.0.0.1', '1', '0000-00-00 00:00:00', 1, 0, 3),
(20, '123456', 0, 'test@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '', '', '', '0000-00-00', '', '2016-01-05 14:36:57', NULL, '0000-00-00 00:00:00', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '127.0.0.1', '1', '0000-00-00 00:00:00', 1, 0, 4),
(21, '123456', 0, 'admin02@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '', '', '', '0000-00-00', '', '2016-01-05 14:38:04', NULL, '0000-00-00 00:00:00', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '127.0.0.1', '1', '0000-00-00 00:00:00', 1, 0, 1),
(22, 'Nguyễn Thế Vinh', 0, 'admin03@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '', '', '', '0000-00-00', '', '2016-01-05 14:42:19', NULL, '0000-00-00 00:00:00', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '127.0.0.1', '1', '0000-00-00 00:00:00', 1, 0, 4),
(23, 'Test', 0, 'abc830@yahoo.com', 'e10adc3949ba59abbe56e057f20f883e', '', '', '', '0000-00-00', '', '2016-01-10 10:48:36', NULL, '0000-00-00 00:00:00', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '127.0.0.1', '1', '0000-00-00 00:00:00', 1, 0, 4);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `configuration`
--
ALTER TABLE `configuration`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `group`
--
ALTER TABLE `group`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `history`
--
ALTER TABLE `history`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `image_position`
--
ALTER TABLE `image_position`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `manufacturer`
--
ALTER TABLE `manufacturer`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `permission`
--
ALTER TABLE `permission`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts_category`
--
ALTER TABLE `posts_category`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `post_tag`
--
ALTER TABLE `post_tag`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_attributes`
--
ALTER TABLE `product_attributes`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_attributes_product`
--
ALTER TABLE `product_attributes_product`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_size`
--
ALTER TABLE `product_size`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_size_product`
--
ALTER TABLE `product_size_product`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_tag`
--
ALTER TABLE `product_tag`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ratings`
--
ALTER TABLE `ratings`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
MODIFY `id` tinyint(4) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=125;
--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=187;
--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `configuration`
--
ALTER TABLE `configuration`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=48;
--
-- AUTO_INCREMENT for table `group`
--
ALTER TABLE `group`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=73;
--
-- AUTO_INCREMENT for table `history`
--
ALTER TABLE `history`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `image_position`
--
ALTER TABLE `image_position`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `manufacturer`
--
ALTER TABLE `manufacturer`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=39;
--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `permission`
--
ALTER TABLE `permission`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=43;
--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `posts_category`
--
ALTER TABLE `posts_category`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `post_tag`
--
ALTER TABLE `post_tag`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=76;
--
-- AUTO_INCREMENT for table `product_attributes`
--
ALTER TABLE `product_attributes`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `product_attributes_product`
--
ALTER TABLE `product_attributes_product`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `product_size`
--
ALTER TABLE `product_size`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `product_size_product`
--
ALTER TABLE `product_size_product`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=167;
--
-- AUTO_INCREMENT for table `product_tag`
--
ALTER TABLE `product_tag`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `ratings`
--
ALTER TABLE `ratings`
AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=24;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
