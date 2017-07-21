-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 21, 2017 at 09:19 AM
-- Server version: 5.5.54-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `c9`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE IF NOT EXISTS `account` (
  `id` int(5) NOT NULL,
  `username` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(100) NOT NULL,
  `display` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT 'No name',
  `email` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `idvaitro` int(1) NOT NULL DEFAULT '0',
  `timeonline` date NOT NULL,
  `statust` tinyint(1) NOT NULL,
  `type` tinyint(1) NOT NULL DEFAULT '0',
  `dienthoai` varchar(12) NOT NULL,
  `url` varchar(1000) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`id`, `username`, `password`, `display`, `email`, `idvaitro`, `timeonline`, `statust`, `type`, `dienthoai`, `url`) VALUES
(0, 'dinhtruong', '123123', 'Vua Dong Ho', 'dinhtruong018@gmail.com', 1, '0000-00-00', 1, 1, '0945455777', 'soi.jpg'),
(1, 'dinhtruong1', '123', 'Đinh Quang Trưởng', 'dinhtruong0181@gmail.com', 2, '0000-00-00', 1, 1, '0945455777', 'tacgia1.jpg'),
(2, 'abc', '123123', 'quản lý', 'dlks@gmail.com', 5, '0000-00-00', 0, 0, '221', 'eng_il_Pall-PA-40-6160.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `binhluan`
--

CREATE TABLE IF NOT EXISTS `binhluan` (
  `id` int(11) NOT NULL,
  `username` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `comment` varchar(2000) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `date` int(11) NOT NULL,
  `id_sanpham` int(11) NOT NULL,
  `num_like` int(11) NOT NULL,
  `email` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `type` int(11) NOT NULL,
  PRIMARY KEY (`id`,`id_sanpham`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `binhluan`
--

INSERT INTO `binhluan` (`id`, `username`, `comment`, `date`, `id_sanpham`, `num_like`, `email`, `type`) VALUES
(1, 'Đinh Trưởng', '123', 2017, 7, 7, 'dinhtruong018@gmail.com', 0),
(2, 'dinhtruong', 'chào bạn', 2017, 7, 1, 'dinhtruong018@gmail.com', 1),
(3, 'Đinh Trưởng', '123', 2017, 7, 7, 'dinhtruong018@gmail.com', 0),
(4, 'Đinh Trưởng', '123', 2017, 7, 7, 'dinhtruong018@gmail.com', 0),
(1, 'test', 'không biết chạy dc ko', 2017, 2, 18, 'dinhtruong018@gmail.com', 0),
(2, 'Đinh Trưởng', 'ok đấy chứ', 2017, 2, 1, 'thanhvienwc@gmail.com', 0);

-- --------------------------------------------------------

--
-- Table structure for table `chitietdonhang`
--

CREATE TABLE IF NOT EXISTS `chitietdonhang` (
  `id_sp` int(5) NOT NULL,
  `so_luong` int(5) NOT NULL,
  `id_dh` int(5) NOT NULL,
  `number` int(11) NOT NULL,
  PRIMARY KEY (`id_sp`,`id_dh`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `chitietdonhang`
--

INSERT INTO `chitietdonhang` (`id_sp`, `so_luong`, `id_dh`, `number`) VALUES
(2, 2, 1, 2),
(3, 2, 1, 1),
(2, 3, 6, 1),
(2, 1, 5, 1),
(2, 2, 4, 1),
(3, 3, 3, 3),
(2, 2, 3, 2),
(1, 1, 3, 1),
(2, 4, 2, 2),
(3, 4, 2, 1),
(1, 5, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `chuyenmuc`
--

CREATE TABLE IF NOT EXISTS `chuyenmuc` (
  `id` int(5) NOT NULL,
  `tenchuyenmuc` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `tenchuyenmuc` (`tenchuyenmuc`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `chuyenmuc`
--

INSERT INTO `chuyenmuc` (`id`, `tenchuyenmuc`) VALUES
(2, 'Đồng hồ Rolex'),
(5, 'Đồng hồ Ogival'),
(7, 'Đồng hồ Omega'),
(1, 'Đồng hồ Tissot'),
(4, 'Đồng hồ Longines'),
(3, 'Đồng hồ Casio'),
(6, 'Đồng hồ Thông minh');

-- --------------------------------------------------------

--
-- Table structure for table `donhang`
--

CREATE TABLE IF NOT EXISTS `donhang` (
  `id` int(5) NOT NULL,
  `taikhoan` varchar(100) NOT NULL,
  `diachi` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `status` int(1) NOT NULL DEFAULT '0',
  `thanhtoan` tinyint(1) NOT NULL DEFAULT '0',
  `nguoithietlap` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `note` varchar(500) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `giamgia` int(12) NOT NULL,
  `phi` int(12) NOT NULL,
  `tong` int(12) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `donhang`
--

INSERT INTO `donhang` (`id`, `taikhoan`, `diachi`, `status`, `thanhtoan`, `nguoithietlap`, `date`, `note`, `giamgia`, `phi`, `tong`) VALUES
(1, 'dinhtruong', '', 2, 0, 'dinhtruong', '0000-00-00', '', 0, 0, 9000000),
(2, 'dinhtruong', 'vườn chuối,phường 4, quận 3, Hồ chí minh', 1, 0, 'dinhtruong', '2017-03-14', 'Email: dinhtruong018@gmail.com \r\n SDT: 0919934122 \r\n Note: ', 0, 0, 500000),
(3, 'dinhtruong', 'vườn chuối,phường 4, quận 3, Hồ chí minh', 0, 0, 'dinhtruong', '2017-03-20', 'Email: dinhtruong018@gmail.com \n SDT: 0919934122 \n Note: 123', 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `file`
--

CREATE TABLE IF NOT EXISTS `file` (
  `id` int(11) NOT NULL,
  `tentaptin` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `id_product` int(11) DEFAULT NULL,
  `date` datetime NOT NULL,
  `alt` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `chuthich` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `file`
--

INSERT INTO `file` (`id`, `tentaptin`, `username`, `id_product`, `date`, `alt`, `chuthich`) VALUES
(1, 'banners-7117.jpg', '34', 43, '2017-02-09 00:00:00', '', ''),
(2, 'banners-7117.jpg', '34', 43, '2017-02-09 00:00:00', '', ''),
(3, 'banners-7117.jpg', '345', 43, '2017-02-09 00:00:00', '', ''),
(4, 'banners-7117.jpg', 'dinhtruong', 5, '2017-03-31 14:55:57', '', ''),
(5, 'no-image.png', 'dinhtruong', 1, '2017-04-04 09:50:40', '', ''),
(6, '5.jpg', 'dinhtruong', 3, '2017-05-11 08:31:50', '', ''),
(7, '2.jpg', 'dinhtruong', 4, '2017-05-11 08:37:01', '', ''),
(8, 'long 2.jpg', 'dinhtruong', 5, '2017-05-11 08:38:51', '', ''),
(9, 'long 4.jpg', 'dinhtruong', 6, '2017-05-11 08:43:42', '', ''),
(10, 'long 3.jpg', 'dinhtruong', 7, '2017-05-11 08:44:45', '', ''),
(11, 'ogival5.png', 'dinhtruong', 8, '2017-05-11 08:45:42', '', ''),
(12, 'ogival 1.png', 'dinhtruong', 9, '2017-05-11 09:16:17', '', ''),
(13, 'ogival 2.jpg', 'dinhtruong', 10, '2017-05-11 09:17:09', '', ''),
(14, 'ogival 3.png', 'dinhtruong', 11, '2017-05-11 09:18:04', '', ''),
(15, 'omega 1.jpg', 'dinhtruong', 12, '2017-05-11 09:18:49', '', ''),
(16, 'omega 2.jpg', 'dinhtruong', 13, '2017-05-11 09:20:15', '', ''),
(17, 'omega 3.jpg', 'dinhtruong', 14, '2017-05-11 09:21:30', '', ''),
(18, 'omega 4.jpg', 'dinhtruong', 15, '2017-05-11 09:21:46', '', ''),
(19, 'smart 1.jpg', 'dinhtruong', 16, '2017-05-11 09:23:57', '', ''),
(20, 'smart 2.jpg', 'dinhtruong', 17, '2017-05-11 09:25:00', '', ''),
(21, 'smart 3.jpg', 'dinhtruong', 18, '2017-05-11 09:28:17', '', ''),
(22, 'tissot 1.jpg', 'dinhtruong', 19, '2017-05-11 09:29:05', '', ''),
(23, 'tissot 2.jpg', 'dinhtruong', 20, '2017-05-11 09:30:02', '', ''),
(24, 'tissot 4.jpg', 'dinhtruong', 21, '2017-05-11 09:30:47', '', ''),
(25, 'tissot 5.jpg', 'dinhtruong', 22, '2017-05-11 09:31:34', '', ''),
(26, 'tissot 7.jpg', 'dinhtruong', 23, '2017-05-11 09:32:26', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `giamgia`
--

CREATE TABLE IF NOT EXISTS `giamgia` (
  `id` int(11) NOT NULL,
  `id_sanpham` int(11) NOT NULL,
  `giamgia` int(11) NOT NULL,
  `date_strat` datetime NOT NULL,
  `date_end` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `khohang`
--

CREATE TABLE IF NOT EXISTS `khohang` (
  `id` int(11) NOT NULL,
  `id_sanpham` int(11) NOT NULL,
  `soluong` int(11) NOT NULL,
  `ngaynhap` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `khohang`
--

INSERT INTO `khohang` (`id`, `id_sanpham`, `soluong`, `ngaynhap`) VALUES
(1, 2, -5, '2017-03-14 00:00:00'),
(3, 4, 2, '2017-03-14 00:00:00'),
(2, 2, 1, '2017-03-14 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `luottruycap`
--

CREATE TABLE IF NOT EXISTS `luottruycap` (
  `id` int(11) NOT NULL,
  `ip` varchar(100) NOT NULL,
  `local` varchar(200) NOT NULL,
  `city` varchar(200) NOT NULL,
  `type` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE IF NOT EXISTS `menu` (
  `id` int(5) NOT NULL,
  `type` int(1) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `url` varchar(200) COLLATE utf8_unicode_ci NOT NULL DEFAULT '#',
  `img` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `menu_root` int(5) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id`, `type`, `name`, `url`, `img`, `menu_root`) VALUES
(1, 1, 'Trang chủ', 'trang-chu', NULL, NULL),
(2, 1, 'Đồng Hồ Nam', 'dong-ho-nam', NULL, NULL),
(3, 1, 'Đồng Hồ Nữ', 'dong-ho-nu', NULL, NULL),
(4, 1, 'Khuyến mãi', 'khuyen-mai', NULL, NULL),
(5, 1, 'Liên hệ', 'lien-he', NULL, NULL),
(6, 0, 'Đồng Hồ Rolex', 'dong-ho-rolex', NULL, NULL),
(7, 0, 'Đồng Hồ Ogival', 'dong-ho-ogival', NULL, NULL),
(8, 0, 'Đồng Hồ Omega', 'dong-ho-omega', NULL, NULL),
(9, 0, 'Đồng Hồ Tissot', 'dong-ho-tissot', NULL, NULL),
(10, 0, 'Đồng Hồ Longines', 'dong-ho-longines', NULL, NULL),
(11, 0, 'Đồng Hồ Casio', 'dong-ho-casio', NULL, NULL),
(12, 0, 'Đồng Hồ Thông Minh', 'dong-ho-thong-minh', NULL, NULL),
(13, 2, 'Trang chủ', 'index.php?action=home', 'image/home.jpg', NULL),
(14, 2, 'Sản phẩm', 'index.php?action=product', 'image/post.png', NULL),
(15, 2, 'Trang', 'index.php?action=page', 'image/page.png', NULL),
(16, 2, 'File', 'index.php?action=file', 'image/File - Video.png', NULL),
(17, 2, 'Đặt hàng', 'index.php?action=order', 'image/order.png', NULL),
(19, 2, 'Thành viên', 'index.php?action=account', 'image/thanhvien.png', NULL),
(20, 2, 'Admin', 'index.php?action=administrator', 'image/caidat.png', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE IF NOT EXISTS `message` (
  `id` int(11) NOT NULL,
  `tieude` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `noidung` varchar(5000) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `date` datetime NOT NULL,
  `nguoinhan` int(10) NOT NULL,
  `new` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`id`, `tieude`, `noidung`, `date`, `nguoinhan`, `new`) VALUES
(1, 'Sửa thông tin tài khoản: Mận Nguyễn (tác giả)', 'bạn can xem lai', '2017-03-06 00:00:00', 3, 1),
(2, 'kiểm tra lại account', '<p>\r\n	bạn can xem lai</p>\r\n', '2017-03-02 15:00:00', 2, 0),
(3, 'Sửa thông tin tài khoản: Mận Nguyễn (tác giả)', 'bạn can xem lai', '2017-03-02 00:00:00', 3, 1),
(4, 'Sửa thông tin tài khoản: Mận Nguyễn (tác giả)', 'bạn can xem lai', '2017-03-06 00:00:00', 3, 1),
(5, 'Sửa thông tin tài khoản: Mận Nguyễn (tác giả)', 'bạn can xem lai', '2017-03-06 00:00:00', 3, 1),
(6, 'Nhập tiêu đề thông báo ...', '<p>\r\n	Nhập nội dung th&ocirc;ng b&aacute;o tại đ&acirc;y ^ - ^</p>\r\n', '2017-03-07 12:51:37', 2, 1),
(7, 'Nhập tiêu đề thông báo ...', '<p>\r\n	Nhập nội dung th&ocirc;ng b&aacute;o tại đ&acirc;y ^ - ^</p>\r\n<p>\r\n	<img alt="" src="/test/dongho/upload/images/7.jpg" style="width: 250px; height: 250px;" /></p>\r\n', '2017-03-08 05:03:06', 2, 1),
(8, 'Nhập tiêu đề thông báo ...', '<p>\r\n	sdf</p>\r\n', '2017-03-31 06:39:59', 2, 1),
(9, 'Nhập tiêu đề thông báo ...', '<p>\r\n	nhớ l&agrave; lai</p>\r\n', '2017-03-31 06:42:32', 5, 1);

-- --------------------------------------------------------

--
-- Table structure for table `page`
--

CREATE TABLE IF NOT EXISTS `page` (
  `id` int(11) NOT NULL,
  `tieude` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `noidung` varchar(2000) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `tag` varchar(100) NOT NULL,
  `username` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE IF NOT EXISTS `product` (
  `id` int(5) NOT NULL,
  `ten` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT 'No name',
  `gia` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `xuatxu` int(11) NOT NULL,
  `thuonghieu` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `tinhtrang` tinyint(1) NOT NULL DEFAULT '0',
  `mota` varchar(2000) NOT NULL,
  `tag` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `tacgia` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `idchuyenmuc` int(3) NOT NULL,
  `date` datetime NOT NULL,
  `type` tinyint(1) NOT NULL DEFAULT '1',
  `urlimg` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT 'no-image.png',
  `noibat` tinyint(1) NOT NULL DEFAULT '0',
  `gioitinh` tinyint(1) NOT NULL DEFAULT '0',
  `luotxem` int(10) NOT NULL,
  `giamgia` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `ten`, `gia`, `xuatxu`, `thuonghieu`, `tinhtrang`, `mota`, `tag`, `tacgia`, `idchuyenmuc`, `date`, `type`, `urlimg`, `noibat`, `gioitinh`, `luotxem`, `giamgia`) VALUES
(1, 'Đồng Hồ Rolex 1', '15000000', 1, 'Rolex', 1, 'S?n ph?m chính hãng', 'Dong ho Relex,', 'dinhtruong', 2, '2017-05-11 08:07:47', 1, '1.jpg', 1, 1, 8, '14000000'),
(2, 'Đồng Hồ Rolex 2', '20100000', 4, 'Rolex', 1, 'San pham chinh hang', 'Dong ho Relex,', 'dinhtruong', 2, '2017-05-11 08:29:03', 1, '4.jpg', 0, 1, 7, '18000000'),
(3, 'Đồng Hồ Rolex 3', '15000000', 4, 'Rolex', 1, 'Chinh hang', 'Dong ho Relex,', 'dinhtruong', 2, '2017-05-11 08:31:50', 1, '5.jpg', 0, 1, 1, '14000000'),
(4, 'Đồng Hồ Rolex 4', '38000000', 4, 'Rolex', 1, 'Chinh hang', 'Dong ho Relex,', 'dinhtruong', 2, '2017-05-11 08:37:01', 1, '2.jpg', 0, 1, 3, '28000000'),
(5, 'Đồng hồ Longnes 1', '5600000', 3, 'Longnes', 1, 'Hàng Chính hãng', 'Dong ho Longnes', 'dinhtruong', 4, '2017-05-11 08:38:51', 1, 'long 2.jpg', 0, 1, 0, '5000000'),
(6, 'Đồng hồ Longnes 2', '6800000', 3, 'Longnes', 1, 'Hàng chính hãng', 'Dong ho Longnes', 'dinhtruong', 4, '2017-05-11 08:43:42', 1, 'long 4.jpg', 0, 0, 0, '6000000'),
(7, 'Đồng Hồ Rolex 3', '23000000', 3, 'Longnes', 1, 'Hàng Chính Hãng', 'Dong ho Longnes', 'dinhtruong', 4, '2017-05-11 08:44:45', 1, 'long 3.jpg', 0, 1, 0, '20000000'),
(8, 'Đồng Hồ Ogival 1', '8700000', 4, 'Ogival', 1, 'Hàng Chính Hãng', 'Dong ho Ogival,', 'dinhtruong', 5, '2017-05-11 08:45:42', 1, 'ogival5.png', 0, 1, 2, '8000000'),
(9, 'Đồng Hồ Ogival 2', '15000000', 4, 'Ogival', 1, 'Hàng chính hãng', 'Dong ho Ogival,', 'dinhtruong', 5, '2017-05-11 09:16:17', 1, 'ogival 1.png', 1, 1, 1, '14000000'),
(10, 'Đồng Hồ Ogival 3', '20100000', 4, 'Ogival', 1, 'Hàng chính hãng', 'Dong ho Ogival,', 'dinhtruong', 5, '2017-05-11 09:17:09', 1, 'ogival 2.jpg', 0, 1, 0, '14000000'),
(11, 'Đồng Hồ Ogival 4', '38000000', 4, 'Ogival', 1, 'Hàng Chính hãng', 'Dong ho Ogival,', 'dinhtruong', 5, '2017-05-11 09:18:04', 1, 'ogival 3.png', 0, 1, 0, '18000000'),
(12, 'Đồng hồ Omega 1', '6800000', 4, 'Omega', 1, 'Hàng Chính Hãng', 'Đồng hồ Omega ,', 'dinhtruong', 7, '2017-05-11 09:18:49', 1, 'omega 1.jpg', 0, 1, 3, '18000000'),
(13, 'Đồng hồ Omega 2', '5600000', 4, 'Omega', 1, 'Hàng chính Hãng', 'Đồng hồ Omega ,', 'dinhtruong', 7, '2017-05-11 09:20:15', 1, 'omega 2.jpg', 0, 0, 0, '5000000'),
(14, 'Đồng hồ Omega 3', '5600000', 4, 'Omega', 1, 'Hàng chính Hãng', 'Đồng hồ Omega ,', 'dinhtruong', 7, '2017-05-11 09:21:30', 1, 'omega 3.jpg', 0, 1, 0, '14000000'),
(15, 'Đồng hồ Omega 4', '38000000', 4, 'Omega', 1, 'Hàng chính Hãng', 'Đồng hồ Omega ,', 'dinhtruong', 7, '2017-05-11 09:21:46', 1, 'omega 4.jpg', 0, 0, 0, '18000000'),
(16, 'Đồng Hồ Smart', '500000', 4, 'Smart', 1, 'Hàng chính Hãng', 'Dong ho Smart', 'dinhtruong', 6, '2017-05-11 09:23:57', 1, 'smart 1.jpg', 0, 1, 0, '400000'),
(17, 'Đồng Hồ Smart 2', '300000', 2, 'Smart', 1, 'Hàng chính Hãng', 'Dong ho Smart', 'dinhtruong', 6, '2017-05-11 09:25:00', 1, 'smart 2.jpg', 0, 1, 0, '200000'),
(18, 'Đồng Hồ Smart 3', '15000000', 2, 'Smart', 1, 'Hàng chính Hãng', 'Dong ho Smart', 'dinhtruong', 6, '2017-05-11 09:28:17', 1, 'smart 3.jpg', 0, 1, 0, '14000000'),
(19, 'Đồng Hồ Tissot 1', '38000000', 4, 'Tissot', 1, 'Hàng chính Hãng', 'Dong ho Tissot', 'dinhtruong', 1, '2017-05-11 09:29:05', 1, 'tissot 1.jpg', 0, 1, 0, '18000000'),
(20, 'Đồng Hồ Tissot 2', '38000000', 1, 'Tissot', 1, 'Hàng chính Hãng', 'Dong ho Tissot', 'dinhtruong', 1, '2017-05-11 09:30:02', 1, 'tissot 2.jpg', 0, 1, 0, '18000000'),
(21, 'Đồng Hồ Tissot 3', '68000000', 4, 'Tissot', 1, 'Hàng chính Hãng', 'Dong ho Tissot', 'dinhtruong', 1, '2017-05-11 09:30:47', 1, 'tissot 4.jpg', 0, 1, 0, '18000000'),
(22, 'Đồng Hồ Tissot 4', '21000000', 4, 'Tissot', 1, 'Hàng chính Hãng', 'Dong ho Tissot', 'dinhtruong', 1, '2017-05-11 09:31:34', 1, 'tissot 5.jpg', 0, 0, 0, '21000000'),
(23, 'Đồng Hồ Tissot 5', '23000000', 4, 'Tissot', 1, 'Hàng chính Hãng', 'Dong ho Tissot', 'dinhtruong', 1, '2017-05-11 09:32:26', 1, 'tissot 7.jpg', 1, 1, 1, '18000000');

-- --------------------------------------------------------

--
-- Table structure for table `so_luot_truy_cap`
--

CREATE TABLE IF NOT EXISTS `so_luot_truy_cap` (
  `id` int(11) NOT NULL,
  `username` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `time` datetime DEFAULT NULL,
  `ip` varchar(50) NOT NULL,
  `local` varchar(100) NOT NULL,
  `city` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `tenthietbi` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `browse` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `so_luot_truy_cap`
--

INSERT INTO `so_luot_truy_cap` (`id`, `username`, `time`, `ip`, `local`, `city`, `tenthietbi`, `browse`) VALUES
(6, 'dinhtruong', '2017-05-11 03:16:08', '10.240.1.14', '', '', 'No name', 'No name'),
(5, 'dinhtruong', '2017-05-11 03:15:56', '10.240.0.240', '', '', 'No name', 'No name'),
(4, 'dinhtruong', '2017-05-11 03:15:35', '10.240.0.240', '', '', 'No name', 'No name'),
(3, 'dinhtruong', '2017-05-11 03:13:28', '10.240.1.16', '', '', 'No name', 'No name'),
(2, 'dinhtruong', '2017-05-11 03:11:38', '10.240.1.30', '', '', 'No name', 'No name'),
(1, 'dinhtruong', '2017-05-11 03:04:09', '10.240.0.214', '', '', 'No name', 'No name'),
(7, 'dinhtruong', '2017-05-11 03:19:27', '10.240.0.213', '', '', 'No name', 'No name'),
(8, 'dinhtruong', '2017-05-11 06:55:59', '10.240.0.214', '', '', 'No name', 'No name'),
(9, 'dinhtruong', '2017-05-11 10:25:24', '10.240.0.5', '', '', 'No name', 'No name'),
(10, 'dinhtruong', '2017-05-11 10:25:35', '10.240.0.33', '', '', 'No name', 'No name'),
(11, 'dinhtruong', '2017-05-11 10:25:38', '10.240.1.16', '', '', 'No name', 'No name'),
(12, 'dinhtruong', '2017-05-11 10:25:53', '10.240.0.33', '', '', 'No name', 'No name'),
(13, 'Ẩn danh', '2017-05-11 10:25:59', '10.240.0.182', '', '', 'No name', 'No name'),
(14, 'Ẩn danh', '2017-05-11 10:26:03', '10.240.0.204', '', '', 'No name', 'No name'),
(15, 'dinhtruong', '2017-05-11 10:38:27', '10.240.0.214', '', '', 'No name', 'No name'),
(16, 'Ẩn danh', '2017-05-11 11:06:29', '10.240.1.12', '', '', 'No name', 'No name'),
(17, 'Ẩn danh', '2017-05-14 16:49:18', '10.240.0.240', '', '', 'No name', 'No name'),
(18, 'Ẩn danh', '2017-05-14 16:49:31', '10.240.1.14', '', '', 'No name', 'No name'),
(19, 'dinhtruong', '2017-05-14 16:49:37', '10.240.0.240', '', '', 'No name', 'No name'),
(20, 'dinhtruong', '2017-05-14 16:49:39', '10.240.0.33', '', '', 'No name', 'No name'),
(21, 'Ẩn danh', '2017-05-16 08:27:59', '10.240.1.30', '', '', 'No name', 'No name'),
(22, 'Ẩn danh', '2017-05-16 08:28:26', '10.240.1.16', '', '', 'No name', 'No name'),
(23, 'Ẩn danh', '2017-05-16 08:28:31', '10.240.0.240', '', '', 'No name', 'No name'),
(24, 'Ẩn danh', '2017-05-16 08:28:36', '10.240.0.240', '', '', 'No name', 'No name'),
(25, 'Ẩn danh', '2017-05-16 08:28:43', '10.240.0.214', '', '', 'No name', 'No name'),
(26, 'Ẩn danh', '2017-05-16 08:40:04', '10.240.0.240', '', '', 'No name', 'No name'),
(27, 'Ẩn danh', '2017-05-16 08:40:06', '10.240.1.16', '', '', 'No name', 'No name'),
(28, 'Ẩn danh', '2017-05-16 08:56:22', '10.240.1.14', '', '', 'No name', 'No name'),
(29, 'Ẩn danh', '2017-05-16 08:56:46', '10.240.1.14', '', '', 'No name', 'No name'),
(30, 'Ẩn danh', '2017-05-16 08:57:43', '10.240.0.214', '', '', 'No name', 'No name'),
(31, 'Ẩn danh', '2017-05-16 08:57:48', '10.240.1.30', '', '', 'No name', 'No name'),
(32, 'Ẩn danh', '2017-05-16 08:57:56', '10.240.0.230', '', '', 'No name', 'No name'),
(33, 'Ẩn danh', '2017-05-16 08:58:02', '10.240.1.14', '', '', 'No name', 'No name'),
(34, 'Ẩn danh', '2017-05-16 08:58:06', '10.240.0.230', '', '', 'No name', 'No name'),
(35, 'Ẩn danh', '2017-05-16 08:58:12', '10.240.0.214', '', '', 'No name', 'No name'),
(36, 'Ẩn danh', '2017-05-16 08:58:35', '10.240.0.230', '', '', 'No name', 'No name'),
(37, 'Ẩn danh', '2017-05-16 08:58:47', '10.240.0.230', '', '', 'No name', 'No name'),
(38, 'Ẩn danh', '2017-05-16 08:58:58', '10.240.0.230', '', '', 'No name', 'No name'),
(39, 'Ẩn danh', '2017-05-16 08:59:33', '10.240.0.214', '', '', 'No name', 'No name'),
(40, 'Ẩn danh', '2017-05-16 08:59:52', '10.240.0.5', '', '', 'No name', 'No name'),
(41, 'Ẩn danh', '2017-05-16 09:00:03', '10.240.1.12', '', '', 'No name', 'No name'),
(42, 'Ẩn danh', '2017-05-16 09:00:08', '10.240.1.16', '', '', 'No name', 'No name'),
(43, 'Ẩn danh', '2017-05-16 09:00:16', '10.240.0.5', '', '', 'No name', 'No name'),
(44, 'Ẩn danh', '2017-05-16 09:00:23', '10.240.1.30', '', '', 'No name', 'No name'),
(45, 'Ẩn danh', '2017-05-16 09:00:26', '10.240.0.230', '', '', 'No name', 'No name'),
(46, 'Ẩn danh', '2017-05-16 09:00:43', '10.240.0.213', '', '', 'No name', 'No name'),
(47, 'Ẩn danh', '2017-05-16 09:00:52', '10.240.0.214', '', '', 'No name', 'No name'),
(48, 'Ẩn danh', '2017-05-16 09:01:29', '10.240.1.16', '', '', 'No name', 'No name'),
(49, 'Ẩn danh', '2017-05-16 09:51:55', '10.240.0.230', '', '', 'No name', 'No name'),
(50, 'Ẩn danh', '2017-05-16 09:52:16', '10.240.0.230', '', '', 'No name', 'No name'),
(51, 'Ẩn danh', '2017-05-16 09:52:55', '10.240.1.30', '', '', 'No name', 'No name'),
(52, 'Ẩn danh', '2017-05-16 09:54:13', '10.240.0.213', '', '', 'No name', 'No name'),
(53, 'Ẩn danh', '2017-05-16 09:54:23', '10.240.1.16', '', '', 'No name', 'No name'),
(54, 'Ẩn danh', '2017-05-23 01:59:08', '10.240.1.12', '', '', 'No name', 'No name'),
(55, 'Ẩn danh', '2017-05-23 01:59:39', '10.240.0.230', '', '', 'No name', 'No name'),
(56, 'Ẩn danh', '2017-05-23 01:59:42', '10.240.1.30', '', '', 'No name', 'No name'),
(57, 'Ẩn danh', '2017-05-23 01:59:52', '10.240.0.5', '', '', 'No name', 'No name'),
(58, 'dinhtruong', '2017-05-23 02:05:00', '10.240.0.5', '', '', 'No name', 'No name'),
(59, 'dinhtruong', '2017-05-23 02:05:08', '10.240.0.230', '', '', 'No name', 'No name'),
(60, 'dinhtruong', '2017-05-23 02:05:11', '10.240.0.240', '', '', 'No name', 'No name'),
(61, 'Ẩn danh', '2017-05-23 03:27:49', '10.240.0.213', '', '', 'No name', 'No name'),
(62, 'Ẩn danh', '2017-07-21 09:04:59', '10.240.1.16', '', '', 'No name', 'No name'),
(63, 'Ẩn danh', '2017-07-21 09:08:58', '10.240.0.33', '', '', 'No name', 'No name');

-- --------------------------------------------------------

--
-- Table structure for table `thuonghieu`
--

CREATE TABLE IF NOT EXISTS `thuonghieu` (
  `id` int(5) NOT NULL,
  `tenthuonghieu` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `thuonghieu`
--

INSERT INTO `thuonghieu` (`id`, `tenthuonghieu`) VALUES
(1, 'Tissot'),
(2, 'Rolex'),
(3, 'Casio'),
(4, 'Longines'),
(5, 'Ogvial'),
(6, 'Smart'),
(7, 'Omega');

-- --------------------------------------------------------

--
-- Table structure for table `tinhtrang_client`
--

CREATE TABLE IF NOT EXISTS `tinhtrang_client` (
  `id` int(11) NOT NULL,
  `id_dh` int(11) NOT NULL,
  `id_tinhtrang` int(11) NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`id`,`id_dh`,`id_tinhtrang`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tinhtrang_client`
--

INSERT INTO `tinhtrang_client` (`id`, `id_dh`, `id_tinhtrang`, `date`) VALUES
(1, 1, 0, '2017-03-14 16:26:03'),
(2, 2, 0, '2017-03-14 16:26:31'),
(3, 1, 1, '2017-03-14 16:26:52'),
(4, 1, 2, '2017-03-14 16:27:08'),
(5, 2, 1, '2017-03-20 06:38:13'),
(6, 3, 0, '2017-03-20 06:39:37');

-- --------------------------------------------------------

--
-- Table structure for table `tinhtrang_donhang`
--

CREATE TABLE IF NOT EXISTS `tinhtrang_donhang` (
  `id` int(11) NOT NULL,
  `tinhtrang` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tinhtrang_donhang`
--

INSERT INTO `tinhtrang_donhang` (`id`, `tinhtrang`) VALUES
(0, 'Đang xử lý'),
(1, 'Đang chuyển'),
(2, 'Hoàn thành'),
(3, 'Không hoàn thành');

-- --------------------------------------------------------

--
-- Table structure for table `useronline_client`
--

CREATE TABLE IF NOT EXISTS `useronline_client` (
  `time` int(15) NOT NULL,
  `ip` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `local` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`time`,`ip`,`local`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `useronline_client`
--

INSERT INTO `useronline_client` (`time`, `ip`, `local`) VALUES
(1500628139, '10.240.0.33', '/king_clocks/index.php');

-- --------------------------------------------------------

--
-- Table structure for table `vaitro`
--

CREATE TABLE IF NOT EXISTS `vaitro` (
  `id_vaitro` int(1) NOT NULL,
  `tenvaitro` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Thành viên',
  `quyenvietbai` bit(1) NOT NULL DEFAULT b'0',
  PRIMARY KEY (`id_vaitro`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vaitro`
--

INSERT INTO `vaitro` (`id_vaitro`, `tenvaitro`, `quyenvietbai`) VALUES
(1, 'Administractor', b'1'),
(0, 'Thành viên', b'0'),
(2, 'Cộng tác viên', b'1'),
(3, 'Biên tập viên', b'1'),
(4, 'Tác giả', b'1'),
(5, 'Quản lý', b'1');

-- --------------------------------------------------------

--
-- Table structure for table `xuatxu`
--

CREATE TABLE IF NOT EXISTS `xuatxu` (
  `id` int(5) NOT NULL,
  `tenxuatxu` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `xuatxu`
--

INSERT INTO `xuatxu` (`id`, `tenxuatxu`) VALUES
(1, 'Thụy Sĩ'),
(2, 'Trung Quốc'),
(3, 'Mỹ'),
(4, 'Nhật Bản');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
