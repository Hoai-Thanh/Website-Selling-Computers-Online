-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 26, 2013 at 03:33 PM
-- Server version: 5.6.12-log
-- PHP Version: 5.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `banhangmt`
--
CREATE DATABASE IF NOT EXISTS `banhangmt` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `banhangmt`;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `pwd` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `uid`, `pwd`) VALUES
(1, 'admin', '123');

-- --------------------------------------------------------

--
-- Table structure for table `chitiethoadon`
--

CREATE TABLE IF NOT EXISTS `chitiethoadon` (
  `idCTHD` int(11) NOT NULL AUTO_INCREMENT,
  `idHD` int(11) NOT NULL DEFAULT '0',
  `idSP` int(11) NOT NULL DEFAULT '0',
  `SoLuong` int(4) NOT NULL,
  `DonGia` float DEFAULT NULL,
  PRIMARY KEY (`idCTHD`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=32 ;

-- --------------------------------------------------------

--
-- Table structure for table `chungloaisp`
--

CREATE TABLE IF NOT EXISTS `chungloaisp` (
  `idCL` int(11) NOT NULL AUTO_INCREMENT,
  `TenCL` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  PRIMARY KEY (`idCL`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=174 ;

--
-- Dumping data for table `chungloaisp`
--

INSERT INTO `chungloaisp` (`idCL`, `TenCL`) VALUES
(163, 'Máy bộ'),
(164, 'Laptop'),
(166, 'Màn hình'),
(167, 'Phụ kiện Laptop'),
(169, 'Thiết bị mạng'),
(170, 'USB'),
(171, 'Bàn phím'),
(172, 'Chuột'),
(173, 'Loa');

-- --------------------------------------------------------

--
-- Table structure for table `hangsx`
--

CREATE TABLE IF NOT EXISTS `hangsx` (
  `idHang` int(11) NOT NULL AUTO_INCREMENT,
  `TenHang` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`idHang`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=11 ;

--
-- Dumping data for table `hangsx`
--

INSERT INTO `hangsx` (`idHang`, `TenHang`) VALUES
(1, 'Asus'),
(2, 'HP'),
(3, 'Gigabyte'),
(4, 'Dell'),
(5, 'IBM'),
(6, 'Transcend'),
(7, 'Intel'),
(8, 'Samsung'),
(9, 'Khác'),
(10, 'Acer');

-- --------------------------------------------------------

--
-- Table structure for table `hoadon`
--

CREATE TABLE IF NOT EXISTS `hoadon` (
  `idHD` int(11) NOT NULL AUTO_INCREMENT,
  `idKH` int(11) NOT NULL DEFAULT '0',
  `ThanhTien` double NOT NULL,
  `idSP` int(11) NOT NULL,
  `ThanhToan` tinyint(1) NOT NULL,
  `SoLuong` int(11) NOT NULL,
  `NgayLap` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`idHD`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=29 ;

-- --------------------------------------------------------

--
-- Table structure for table `khachhang`
--

CREATE TABLE IF NOT EXISTS `khachhang` (
  `idKH` int(11) NOT NULL AUTO_INCREMENT,
  `CongTy` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ThanhPho` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `SDT` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Email` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `TenKH` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`idKH`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `khachhang`
--

INSERT INTO `khachhang` (`idKH`, `CongTy`, `ThanhPho`, `SDT`, `Email`, `TenKH`) VALUES
(1, 'vietnext', 'ho chi minh', '123456', 'thehoipro200@yahoo.com.vn', ''),
(2, 'vietnext', 'ho chi minh', '123456', 'thehoipor200x@yahoo.com', '');

-- --------------------------------------------------------

--
-- Table structure for table `lienhe`
--

CREATE TABLE IF NOT EXISTS `lienhe` (
  `idTTLH` int(11) NOT NULL AUTO_INCREMENT,
  `TenKH` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `CongTy` varchar(255) COLLATE utf8_unicode_ci DEFAULT 'NULL',
  `DiaChi` varchar(255) COLLATE utf8_unicode_ci DEFAULT 'NULL',
  `Email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `SDT` varchar(255) COLLATE utf8_unicode_ci DEFAULT 'NULL',
  `NoiDung` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`idTTLH`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=6 ;

--
-- Dumping data for table `lienhe`
--

INSERT INTO `lienhe` (`idTTLH`, `TenKH`, `CongTy`, `DiaChi`, `Email`, `SDT`, `NoiDung`) VALUES
(4, 'Thái Hiển', 'abc', '3e', 'thaihien121293@gmail.com', '91', 'ưkgfiyefkjasdbfvilasupiegfkjavsduvifaewiyt'),
(5, 'abc', '', '', 'thaihien121293@gmail.com', '', 'aggdsg');

-- --------------------------------------------------------

--
-- Table structure for table `loaisp`
--

CREATE TABLE IF NOT EXISTS `loaisp` (
  `idLoai` int(11) NOT NULL AUTO_INCREMENT,
  `idCL` int(11) NOT NULL,
  `TenLoai` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`idLoai`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=46 ;

--
-- Dumping data for table `loaisp`
--

INSERT INTO `loaisp` (`idLoai`, `idCL`, `TenLoai`) VALUES
(1, 163, 'Asus'),
(2, 163, 'Dell'),
(3, 163, 'HP'),
(4, 164, 'Asus'),
(5, 164, 'Dell'),
(6, 164, 'HP'),
(9, 163, 'Acer'),
(10, 163, 'Khác'),
(11, 164, 'Acer'),
(12, 164, 'Samsung'),
(13, 164, 'Sony'),
(14, 164, 'Apple'),
(15, 166, 'Màn hình 17'''''),
(16, 166, 'Màn hình 19'''''),
(17, 166, 'Màn hình 20'''''),
(18, 166, 'Màn hình 22'''''),
(19, 166, 'Màn hình 24'''''),
(20, 166, 'Màn hình 27'''''),
(21, 167, 'Ram'),
(22, 167, 'DVD'),
(23, 167, 'Pin'),
(24, 167, 'Adapter'),
(25, 167, 'Keyboard'),
(26, 167, 'Quạt tản nhiệt'),
(27, 169, 'USB 3G'),
(28, 169, 'ADSL & ADSL Wireless'),
(29, 169, 'Hub - Switch'),
(31, 170, '4GB'),
(32, 170, '8GB'),
(33, 170, '16GB'),
(34, 170, '32GB'),
(35, 170, '64GB'),
(36, 171, 'A4 Tech'),
(37, 171, 'Genius'),
(38, 171, 'Khác'),
(39, 172, 'A4 Tech'),
(40, 172, 'Genius'),
(41, 172, 'Khác'),
(42, 173, 'Sound Max'),
(43, 173, 'Logitech'),
(44, 173, 'Microlab'),
(45, 173, 'Genius');

-- --------------------------------------------------------

--
-- Table structure for table `sanpham`
--

CREATE TABLE IF NOT EXISTS `sanpham` (
  `idSP` int(11) NOT NULL AUTO_INCREMENT,
  `TenSP` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `idCL` int(11) NOT NULL,
  `idLoai` int(11) NOT NULL,
  `idHang` int(11) NOT NULL,
  `ChiTietSP` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `Hinh` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `DonGia` float DEFAULT NULL,
  PRIMARY KEY (`idSP`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=304 ;

--
-- Dumping data for table `sanpham`
--

INSERT INTO `sanpham` (`idSP`, `TenSP`, `idCL`, `idLoai`, `idHang`, `ChiTietSP`, `Hinh`, `DonGia`) VALUES
(299, 'PC Dell Vostro 270 T222706 - 2G - 500GB (Mini)', 163, 2, 4, '<p><span style="color:rgb(0, 0, 0); font-family:tahoma,arial; font-size:12px">-&nbsp;</span><strong>Chipset&nbsp;Intel B75</strong><br />\r\n<span style="color:rgb(0, 0, 0); font-family:tahoma,arial; font-size:12px">- Intel</span><strong>&nbsp;Celeron G465</strong><span style="color:rgb(0, 0, 0); font-family:tahoma,arial; font-size:12px">&nbsp;1.9GHz</span><br />\r\n<span style="color:rgb(0, 0, 0); font-family:tahoma,arial; font-size:12px">- HDD 500GB SATA</span><br />\r\n<span style="color:rgb(0, 0, 0); font-family:tahoma,arial; font-size:12px">- DDRAM 2GB/1600</span><br />\r\n<strong>- Intel HD</strong><br />\r\n<span style="color:rgb(0, 0, 0); font-family:tahoma,arial; font-size:12px">- DVD-RW</span><br />\r\n<span style="color:rgb(0, 0, 0); font-family:tahoma,arial; font-size:12px">- LAN 10/100/1000</span><br />\r\n<span style="color:rgb(0, 0, 0); font-family:tahoma,arial; font-size:12px">- Card reader</span><br />\r\n<span style="color:rgb(0, 0, 0); font-family:tahoma,arial; font-size:12px">- Weight 7.9Kg</span><br />\r\n<span style="color:rgb(0, 0, 0); font-family:tahoma,arial; font-size:12px">- OS Option</span><br />\r\n<span style="color:rgb(0, 0, 0); font-family:tahoma,arial; font-size:12px">- Bảo h&agrave;nh 1 năm&nbsp;</span></p>\r\n', 'images/product/PC-Dell-Vostro 270.jpg', 6750000),
(300, 'PC HP Pro 3330MT D3U61PA', 163, 3, 2, '<ul>\r\n	<li><strong>Th&ocirc;ng tin khuyến m&atilde;i:</strong>\r\n	<div class="thongtinsp" style="margin: 0px; padding: 0px; border: 0px; outline: rgb(0, 0, 0); vertical-align: baseline; background-color: transparent;">\r\n	<p>K&egrave;m&nbsp;<strong>Keyboard + Mouse USB</strong></p>\r\n	</div>\r\n	<strong>T&iacute;nh năng nổi bật:</strong>\r\n\r\n	<div class="thongtinsp" style="margin: 0px; padding: 0px; border: 0px; outline: rgb(0, 0, 0); vertical-align: baseline; background-color: transparent;">\r\n	<p><strong><span style="color:rgb(255, 0, 0)">HP PRO 3330MT (D3U61PA)</span></strong><br />\r\n	- Intel Dual&nbsp;<strong>Core G645</strong>&nbsp;2.9GHz - 3M<br />\r\n	- DDRAM 2GB/1333<br />\r\n	- HDD 500GB SATA<br />\r\n	- Intel HD<br />\r\n	- DVD-ROM<br />\r\n	- Card Reader 15.1<br />\r\n	- LAN 10/100/1000<br />\r\n	- OS Option<br />\r\n	<strong>- Bảo h&agrave;nh 1 năm</strong></p>\r\n	</div>\r\n	</li>\r\n</ul>\r\n', 'images/product/25141_3330mtT.jpg', 6400000),
(301, 'PC Asus BM6820 - 0G20202160', 163, 1, 1, '<p><span style="color:rgb(0, 0, 0); font-family:tahoma,arial; font-size:12px">- Intel&nbsp;</span><strong>Pentium G2020</strong><span style="color:rgb(0, 0, 0); font-family:tahoma,arial; font-size:12px">&nbsp;2.9GHz - 3M</span><br />\r\n<span style="color:rgb(0, 0, 0); font-family:tahoma,arial; font-size:12px">- DDRAM 2GB/1333</span><br />\r\n<span style="color:rgb(0, 0, 0); font-family:tahoma,arial; font-size:12px">- HDD 500GB</span><br />\r\n<span style="color:rgb(0, 0, 0); font-family:tahoma,arial; font-size:12px">- Intel&nbsp;</span><strong>GMA HD</strong><br />\r\n<span style="color:rgb(0, 0, 0); font-family:tahoma,arial; font-size:12px">- DVD-ROM</span><br />\r\n<span style="color:rgb(0, 0, 0); font-family:tahoma,arial; font-size:12px">- Card Reader 6.1</span><br />\r\n<span style="color:rgb(0, 0, 0); font-family:tahoma,arial; font-size:12px">- LAN 10/100/1000</span><br />\r\n<span style="color:rgb(0, 0, 0); font-family:tahoma,arial; font-size:12px">- OS Option</span><br />\r\n<strong>- Bảo h&agrave;nh 2 năm</strong></p>\r\n', 'images/product/6109_68200.jpg', 6990000),
(281, 'Acer AS - XC600 (DT.SLJSV - 010) G2030', 163, 9, 10, '<p><span style="color:rgb(0, 0, 0); font-family:tahoma,arial; font-size:12px">-&nbsp;</span><strong>Chipset Intel H61</strong><br />\r\n<span style="color:rgb(0, 0, 0); font-family:tahoma,arial; font-size:12px">-&nbsp;</span><strong>Intel Pentium G2030</strong><span style="color:rgb(0, 0, 0); font-family:tahoma,arial; font-size:12px">&nbsp;3.0GHz</span><br />\r\n<span style="color:rgb(0, 0, 0); font-family:tahoma,arial; font-size:12px">- DDRAM 2GB/1333</span><br />\r\n<span style="color:rgb(0, 0, 0); font-family:tahoma,arial; font-size:12px">- HDD 500GB</span><br />\r\n<span style="color:rgb(0, 0, 0); font-family:tahoma,arial; font-size:12px">- DVD-RW</span><br />\r\n<span style="color:rgb(0, 0, 0); font-family:tahoma,arial; font-size:12px">- Intel HD&nbsp;</span><br />\r\n<span style="color:rgb(0, 0, 0); font-family:tahoma,arial; font-size:12px">- Card Reader - 8x USB 2.0</span><br />\r\n<span style="color:rgb(0, 0, 0); font-family:tahoma,arial; font-size:12px">- HDMI &amp; VGA</span><br />\r\n<span style="color:rgb(0, 0, 0); font-family:tahoma,arial; font-size:12px">- LAN 10/100/1000&nbsp;</span><br />\r\n<span style="color:rgb(0, 0, 0); font-family:tahoma,arial; font-size:12px">- Case Small Tower</span><br />\r\n<strong><span style="color:rgb(0, 0, 255)">- Bảo h&agrave;nh 1 năm</span></strong><span style="color:rgb(0, 0, 0); font-family:tahoma,arial; font-size:12px">&nbsp;</span></p>\r\n', 'images/product/Acer AS G2030.jpg', 6590000),
(283, 'PV PDG 2022', 163, 10, 9, '<div class="thongtinsp" style="margin: 0px; padding: 0px; border: 0px; outline: rgb(0, 0, 0); vertical-align: baseline; background-color: transparent;">\r\n<p>Tặng k&egrave;m KB + Mouse</p>\r\n</div>\r\n\r\n<ul>\r\n	<li><strong>T&iacute;nh năng nổi bật:</strong>\r\n\r\n	<div class="thongtinsp" style="margin: 0px; padding: 0px; border: 0px; outline: rgb(0, 0, 0); vertical-align: baseline; background-color: transparent;">\r\n	<p><strong>PC PV PDG 2022</strong><br />\r\n	-&nbsp;<strong>Chipset H61</strong><br />\r\n	- Intel&nbsp;<strong>Pentium Dual G2020</strong>&nbsp;2.9GHz - 3M<br />\r\n	- DDRAM 2GB/1333<br />\r\n	- HDD 250GB<br />\r\n	-&nbsp;<strong>VGA onboard (kh&ocirc;ng c&oacute; khe PCI)</strong><br />\r\n	- No HDMI, No Reader<br />\r\n	- LAN Gigabit<br />\r\n	- 8x USB<br />\r\n	- OS Option<br />\r\n	-&nbsp;<strong>Bảo h&agrave;nh 3 năm&nbsp;</strong></p>\r\n	</div>\r\n	</li>\r\n</ul>\r\n', 'images/product/24541_wisdomM.jpg', 5120000),
(284, 'Dell 3521 HNP6M10 (Đen)', 164, 5, 4, '<p><span style="color:rgb(0, 0, 0); font-family:tahoma,arial; font-size:12px">- Intel</span><strong>&nbsp;Pentium 2127U</strong><span style="color:rgb(0, 0, 0); font-family:tahoma,arial; font-size:12px">&nbsp;1.9GHz - 2M</span><br />\r\n<span style="color:rgb(0, 0, 0); font-family:tahoma,arial; font-size:12px">- DDRAM 4GB/1600</span><br />\r\n<span style="color:rgb(0, 0, 0); font-family:tahoma,arial; font-size:12px">- HDD 500GB</span><br />\r\n<span style="color:rgb(0, 0, 0); font-family:tahoma,arial; font-size:12px">- DVD-RW&nbsp;</span><br />\r\n<strong>- Intel HD 4000</strong><br />\r\n<span style="color:rgb(0, 0, 0); font-family:tahoma,arial; font-size:12px">- 15.6&quot; HD LED - HDMI - Webcam</span><br />\r\n<span style="color:rgb(0, 0, 0); font-family:tahoma,arial; font-size:12px">- LAN 10/100 - Wireless - Bluetooth</span><br />\r\n<span style="color:rgb(0, 0, 0); font-family:tahoma,arial; font-size:12px">- Card Reader - USB 3.0</span><br />\r\n<span style="color:rgb(0, 0, 0); font-family:tahoma,arial; font-size:12px">- Weight 2.25Kg - Battery 4 Cell</span><br />\r\n<span style="color:rgb(0, 0, 0); font-family:tahoma,arial; font-size:12px">- OS Option</span><br />\r\n<strong>- Bảo h&agrave;nh 1 năm&nbsp;</strong></p>\r\n', 'images/product/29506_35211.jpg', 8800000),
(285, 'Dell 3421 D0VFM4 (Đen)', 164, 5, 4, '<p><span style="color:rgb(0, 0, 0); font-family:tahoma,arial; font-size:12px">- Intel</span><strong>&nbsp;Core i3-3217U</strong><span style="color:rgb(0, 0, 0); font-family:tahoma,arial; font-size:12px">&nbsp;1.8GHz - 3M</span><br />\r\n<span style="color:rgb(0, 0, 0); font-family:tahoma,arial; font-size:12px">- DDRAM 2GB/1600</span><br />\r\n<span style="color:rgb(0, 0, 0); font-family:tahoma,arial; font-size:12px">- HDD 500GB</span><br />\r\n<span style="color:rgb(0, 0, 0); font-family:tahoma,arial; font-size:12px">- DVD-RW&nbsp;</span><br />\r\n<span style="color:rgb(0, 0, 0); font-family:tahoma,arial; font-size:12px">-&nbsp;</span><strong>Intel HD 4000</strong><br />\r\n<span style="color:rgb(0, 0, 0); font-family:tahoma,arial; font-size:12px">- 14.0&quot; HD LED - HDMI - Webcam</span><br />\r\n<span style="color:rgb(0, 0, 0); font-family:tahoma,arial; font-size:12px">- LAN 10/100 - Wireless - Bluetooth</span><br />\r\n<span style="color:rgb(0, 0, 0); font-family:tahoma,arial; font-size:12px">- Card Reader 8.1 - USB 3.0</span><br />\r\n<span style="color:rgb(0, 0, 0); font-family:tahoma,arial; font-size:12px">- Weight 2.1Kg - Battery 4 Cell</span><br />\r\n<span style="color:rgb(0, 0, 0); font-family:tahoma,arial; font-size:12px">- OS Option</span><br />\r\n<strong>- Bảo h&agrave;nh 1 năm&nbsp;</strong></p>\r\n', 'images/product/9396_34211.jpg', 9600000),
(291, 'Acer E1 - 432 - 29552G50Dnkk (001) đen', 164, 11, 10, '<p><span style="color:rgb(0, 0, 0); font-family:tahoma,arial; font-size:12px">- Intel&nbsp;</span><strong>Celeron 2955U</strong><span style="color:rgb(0, 0, 0); font-family:tahoma,arial; font-size:12px">&nbsp;1.4GHz - 2M</span><br />\r\n<span style="color:rgb(0, 0, 0); font-family:tahoma,arial; font-size:12px">- DDRAM 2GB/1333</span><br />\r\n<span style="color:rgb(0, 0, 0); font-family:tahoma,arial; font-size:12px">- HDD 500GB</span><br />\r\n<span style="color:rgb(0, 0, 0); font-family:tahoma,arial; font-size:12px">- Intel HD&nbsp;</span><br />\r\n<strong>- No DVD-RW</strong><br />\r\n<span style="color:rgb(0, 0, 0); font-family:tahoma,arial; font-size:12px">- Card Reader - USB 3.0</span><br />\r\n<span style="color:rgb(0, 0, 0); font-family:tahoma,arial; font-size:12px">- 14.0&quot; HD TFT - HDMI - Webcam</span><br />\r\n<span style="color:rgb(0, 0, 0); font-family:tahoma,arial; font-size:12px">- LAN 10/100/1000 - Wireless - Bluetooth</span><br />\r\n<span style="color:rgb(0, 0, 0); font-family:tahoma,arial; font-size:12px">- Weight 2.1Kg - Battery 4 Cell</span><br />\r\n<span style="color:rgb(0, 0, 0); font-family:tahoma,arial; font-size:12px">- OS Option</span><br />\r\n<strong>- Bảo h&agrave;nh 1 năm</strong></p>\r\n', 'images/product/Acer E1 - 432 - 29552G50Dnkk.jpg', 6990000),
(292, 'Acer E1 - 571 - 33112G50Mnks (008)', 164, 11, 10, '<p><span style="color:rgb(0, 0, 0); font-family:tahoma,arial; font-size:12px">- Intel&nbsp;</span><strong>Core i3-3110M</strong><span style="color:rgb(0, 0, 0); font-family:tahoma,arial; font-size:12px">&nbsp;2.4GHz - 3M</span><br />\r\n<span style="color:rgb(0, 0, 0); font-family:tahoma,arial; font-size:12px">- DDRAM 2GB/1600</span><br />\r\n<span style="color:rgb(0, 0, 0); font-family:tahoma,arial; font-size:12px">- HDD 500GB</span><br />\r\n<span style="color:rgb(0, 0, 0); font-family:tahoma,arial; font-size:12px">- DVD-RW</span><br />\r\n<span style="color:rgb(0, 0, 0); font-family:tahoma,arial; font-size:12px">-&nbsp;</span><strong>Intel HD 4000</strong><br />\r\n<span style="color:rgb(0, 0, 0); font-family:tahoma,arial; font-size:12px">- Card Reder - USB 3.0&nbsp;</span><br />\r\n<span style="color:rgb(0, 0, 0); font-family:tahoma,arial; font-size:12px">- 15.6&quot; LED - HDMI - Webcam</span><br />\r\n<span style="color:rgb(0, 0, 0); font-family:tahoma,arial; font-size:12px">- LAN - Wireless N</span><br />\r\n<span style="color:rgb(0, 0, 0); font-family:tahoma,arial; font-size:12px">- Weight 2.1Kg - Battery 6 Cell&nbsp;</span><br />\r\n<span style="color:rgb(0, 0, 0); font-family:tahoma,arial; font-size:12px">-</span><strong>&nbsp;<span style="color:rgb(255, 0, 0)">OS Windows 8 Single Language 64Bits</span></strong><br />\r\n<span style="color:rgb(0, 0, 0); font-family:tahoma,arial; font-size:12px">- Bảo h&agrave;nh 1 năm&nbsp;</span></p>\r\n', 'images/product/Acer - E1 - 571.jpg', 13000000),
(293, 'LCD Samsung 27'' S27C350H', 166, 20, 8, '<p><span style="color:rgb(0, 0, 0); font-family:tahoma,arial; font-size:12px">- Độ ph&acirc;n giải: 1920x1080 </span></p>\r\n\r\n<p><span style="color:rgb(0, 0, 0); font-family:tahoma,arial; font-size:12px">- Độ tương phản 1000:1</span></p>\r\n\r\n<p><span style="color:rgb(0, 0, 0); font-family:tahoma,arial; font-size:12px">- Thời gian đ&aacute;p ứng 5ms, </span></p>\r\n\r\n<p><span style="color:rgb(0, 0, 0); font-family:tahoma,arial; font-size:12px">- D-Sub, HDMI, Audio Out</span></p>\r\n', 'images/product/LCD S27C350H.jpg', 2000000),
(297, 'Asus X451CA - VX078D (2117U) trắng', 164, 4, 1, '', 'images/product/X451CA - VX078D.jpg', 7590000),
(302, 'PC Dell INS660ST 6HOF814 (Black) (mini)', 163, 2, 4, '<p><span style="color:rgb(0, 0, 0); font-family:tahoma,arial; font-size:12px">- Intel&nbsp;</span><strong>Pentium G2030&nbsp;</strong><span style="color:rgb(0, 0, 0); font-family:tahoma,arial; font-size:12px">3.0GHz</span><br />\r\n<span style="color:rgb(0, 0, 0); font-family:tahoma,arial; font-size:12px">- DDRAM 4GB/1600</span><br />\r\n<span style="color:rgb(0, 0, 0); font-family:tahoma,arial; font-size:12px">- HDD 500GB SATA</span><br />\r\n<strong>- Intel HD</strong><br />\r\n<span style="color:rgb(0, 0, 0); font-family:tahoma,arial; font-size:12px">- DVD-RW</span><br />\r\n<span style="color:rgb(0, 0, 0); font-family:tahoma,arial; font-size:12px">- Card reader 8.1 - HDMI&nbsp;</span><br />\r\n<span style="color:rgb(0, 0, 0); font-family:tahoma,arial; font-size:12px">- LAN 10/100/1000 - Wireless N</span><br />\r\n<span style="color:rgb(0, 0, 0); font-family:tahoma,arial; font-size:12px">- OS Option&nbsp;</span><br />\r\n<strong>- Bảo h&agrave;nh 1 năm&nbsp;</strong></p>\r\n', 'images/product/6053_660ss.jpg', 7600000);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
