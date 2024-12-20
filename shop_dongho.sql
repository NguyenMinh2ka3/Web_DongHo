-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 12, 2024 at 01:28 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shop_dongho`
--

-- --------------------------------------------------------

--
-- Table structure for table `khachhang`
--

CREATE TABLE `khachhang` (
  `kh_id` int(11) NOT NULL,
  `kh_ten` varchar(100) NOT NULL,
  `kh_cty` varchar(100) NOT NULL,
  `kh_email` varchar(100) NOT NULL,
  `kh_sodienthoai` varchar(50) NOT NULL,
  `kh_quocgia` int(11) NOT NULL,
  `kh_diachi` text NOT NULL,
  `kh_thanhpho` varchar(100) NOT NULL,
  `kh_quan` varchar(100) NOT NULL,
  `kh_zip` varchar(30) NOT NULL,
  `kh_matkhau` varchar(100) NOT NULL,
  `kh_ngaygio` varchar(100) NOT NULL,
  `kh_mocthoigian` varchar(100) NOT NULL,
  `kh_trangthai` int(1) NOT NULL,
  `kh_token` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `khachhang`
--

INSERT INTO `khachhang` (`kh_id`, `kh_ten`, `kh_cty`, `kh_email`, `kh_sodienthoai`, `kh_quocgia`, `kh_diachi`, `kh_thanhpho`, `kh_quan`, `kh_zip`, `kh_matkhau`, `kh_ngaygio`, `kh_mocthoigian`, `kh_trangthai`, `kh_token`) VALUES
(6, 'Minhdz', 'Minh Thinh Phat', 'nguyenminhadmin@gmail.com', '0999999999', 237, 'Ha Nam', 'Ha Noi', 'Dong Da', '7000000', '202cb962ac59075b964b07152d234b70', '2024-10-18 04:40:52', '1729255252', 1, ''),
(7, 'Trung', 'aaa', 'trung@gmail.com', '123412', 237, 'Ninh Binh', 'Ha Noi', 'Hoang Mai', '700000', '202cb962ac59075b964b07152d234b70', '2024-10-19 11:09:10', '1729321750', 1, ''),
(9, 'Nguyá»…n Äá»©c Minh', 'Nguyá»…n Minh123Company', 'admin@gmail.com', '09999999888', 237, 'TÃ¢y Há»“, HÃ  Ná»™i', 'Ha Noi', 'Dong Da', '700000', '202cb962ac59075b964b07152d234b70', '2024-10-25 12:40:41', '1729852841', 1, '1e9340b53767c26f70bacf774b4824f3'),
(13, 'NguyenVanTrun', 'trung123Abc', 'trungabc@gmail.com', '0123456666', 237, 'Ninh Binh', 'Ha Noi', 'Hoang Mai', '89899', '202cb962ac59075b964b07152d234b70', '2024-11-04 09:47:00', '1730710020', 1, '1b83fbda67f6694e8ba4d4edcdb55a08'),
(14, 'Thá»§y Yáº¿n', 'Yennnnnnnnnn', 'thuyyen@gmail.com', '0149341234', 237, 'Ha Noi', 'HaNoi', 'Hoang Mai', '141234312', '202cb962ac59075b964b07152d234b70', '2024-11-04 10:08:31', '1730711311', 1, '755a05af8223eb171f5a6b6a99f26ea2'),
(15, 'Nguyá»…n Thá»‹ Thá»§y Yáº¿n', 'Ã¡dfadsf', 'yen123@gmail.com', '12341324', 237, 'Ã dasdf', 'ha nOi', 'Dong da', '124313241', '202cb962ac59075b964b07152d234b70', '2024-11-04 04:31:17', '1730734277', 1, '6b3d186dbeaa0c0376bde7f0083666aa'),
(16, 'Nguyá»…n Äá»©c Minh', 'MinhNCompany', 'nguyenminh@gmail.com', '0986868686', 237, 'HÃ  Nam', 'HÃ  Ná»™i', 'Äá»‘ng Äa', '76000', '202cb962ac59075b964b07152d234b70', '2024-11-11 04:14:32', '1731338072', 1, '267188a6a9d7ebd9a719d8feb32881cc'),
(17, 'Trung', 'aaaa', 'trung123@gmail.com', '0988356123', 237, 'Yen Mo, Ninh Binh', 'Ha Noi', 'Hoang Mai', '9000000', '202cb962ac59075b964b07152d234b70', '2024-11-12 09:18:18', '1731399498', 1, '27d58e3c9d258a0f074b35d0a4c96bed');

-- --------------------------------------------------------

--
-- Table structure for table `lienhe`
--

CREATE TABLE `lienhe` (
  `lh_hoten` varchar(30) NOT NULL,
  `lh_email` varchar(30) NOT NULL,
  `lh_sdt` varchar(10) NOT NULL,
  `lh_tinnhan` text NOT NULL,
  `lh_id` int(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `lienhe`
--

INSERT INTO `lienhe` (`lh_hoten`, `lh_email`, `lh_sdt`, `lh_tinnhan`, `lh_id`) VALUES
('Nguyá»…n Äá»©c Minh', 'Minhmacao1280@gmail.com', '0989429662', 'sdfasdf', 8),
('Nguyá»…n Äá»©c Minh', 'Minhmacao1280@gmail.com', '0989429662', 'sdfasdf', 9),
('sadfas', 'asdfasf@abc.cccc', '0989429662', '1ssafsfs', 26),
('Nguyá»…n Äá»©c Minh', 'NMinh123@gmail.com', '0989429662', 'Ahihihi ', 27),
('HÃªllo minh nhÃ© ^^', 'admin@gmail.com', '0999999988', 'Hellloooo ', 36),
('Nguyá»…n Thá»‹ Thá»§y Yáº¿n', 'yen123@gmail.com', '12341324', 'alooooooo alo alo ', 37),
('NguyenMinh2', 'nguyenminh@gmail.com', '0987763535', 'Xin ChÃ o Admin ^^', 38);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `order_kh_id` int(11) DEFAULT NULL,
  `total_amount` decimal(10,2) DEFAULT NULL,
  `payment_method` varchar(50) DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `order_kh_id`, `total_amount`, `payment_method`, `status`, `created_at`) VALUES
(15, 13, 21014.00, 'Chuyen khoan', 'Thanh cong', '2024-11-04 12:56:25'),
(16, 13, 14846.00, 'Tien mat', 'Xac nhan', '2024-11-04 12:57:54'),
(17, 13, 10045.00, 'Chuyen khoan', 'Thanh cong', '2024-11-04 13:07:52'),
(18, 13, 10045.00, 'Chuyen khoan', 'Thanh cong', '2024-11-04 13:08:07'),
(19, 13, 10045.00, 'Tien mat', 'Xac nhan', '2024-11-04 13:11:24'),
(20, 13, 34437.00, 'Chuyen khoan', 'Thanh cong', '2024-11-04 13:51:36'),
(21, 9, 38437.00, 'Tien mat', 'Xac nhan', '2024-11-04 14:09:21'),
(22, 13, 4494.00, 'Chuyen khoan', 'Thanh cong', '2024-11-04 15:08:58'),
(23, 13, 6716.00, 'Chuyen khoan', 'Thanh cong', '2024-11-04 15:15:23'),
(24, 13, 14846.00, 'Tien mat', 'Xac nhan', '2024-11-04 15:17:16'),
(25, 13, 10045.00, 'Chuyen khoan', 'Thanh cong', '2024-11-04 15:21:26'),
(26, 15, 21047.00, 'Tien mat', 'Xac nhan', '2024-11-04 15:34:08'),
(27, 9, 32340.00, 'Tien mat', 'Xac nhan', '2024-11-04 17:19:33'),
(28, 9, 55564.00, 'Tien mat', 'Xac nhan', '2024-11-05 06:43:10'),
(29, 9, 1549.00, 'Tien mat', 'Xac nhan', '2024-11-05 08:09:05'),
(30, 16, 36242.00, 'Tien mat', 'Xac nhan', '2024-11-11 15:15:40'),
(31, 16, 51042.00, 'Chuyen khoan', 'Thanh cong', '2024-11-11 15:21:33'),
(32, 16, 11160.00, 'Tien mat', 'Xac nhan', '2024-11-11 15:37:48'),
(33, 16, 19039.00, 'Tien mat', 'Xac nhan', '2024-11-12 08:10:29'),
(34, 17, 6716.00, 'Chuyen khoan', 'Thanh cong', '2024-11-12 08:26:15'),
(35, 16, 16247.00, 'Tien mat', 'Xac nhan', '2024-11-12 12:02:43'),
(36, 16, 2049.00, 'Tien mat', 'Xac nhan', '2024-11-12 12:12:33');

-- --------------------------------------------------------

--
-- Table structure for table `order_detail`
--

CREATE TABLE `order_detail` (
  `id` int(11) NOT NULL,
  `order_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `product_name` varchar(255) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `total` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `order_detail`
--

INSERT INTO `order_detail` (`id`, `order_id`, `product_id`, `product_name`, `quantity`, `price`, `total`) VALUES
(2, 15, 15, 'Seiko Presage SPB467J1', 3, 6988.00, 20964.00),
(3, 16, 17, 'Citizen BM7521', 4, 3699.00, 14796.00),
(4, 17, 1, 'Rolex Spain', 5, 1999.00, 9995.00),
(5, 18, 1, 'Rolex Spain', 5, 1999.00, 9995.00),
(6, 19, 1, 'Rolex Spain', 5, 1999.00, 9995.00),
(7, 20, 1, 'Rolex Spain', 5, 1999.00, 9995.00),
(8, 20, 2, 'Datejust 36', 4, 2499.00, 9996.00),
(9, 20, 4, 'Cosmograph Daytona', 1, 6999.00, 6999.00),
(10, 20, 5, 'Oyster Perpetual 41', 1, 5999.00, 5999.00),
(11, 20, 6, 'Sky-Dweller', 2, 699.00, 1398.00),
(12, 21, 1, 'Rolex Spain', 10, 1999.00, 19990.00),
(13, 21, 8, 'Titoni Airmaster 83743', 1, 6999.00, 6999.00),
(14, 21, 12, 'Fossil Raquel Watch Ring', 2, 5699.00, 11398.00),
(15, 22, 9, 'Titoni Cosmo Queen 729', 2, 2222.00, 4444.00),
(16, 23, 9, 'Titoni Cosmo Queen 729', 3, 2222.00, 6666.00),
(17, 24, 14, 'Seiko 5 Field Sports Style', 3, 3699.00, 11097.00),
(18, 24, 14, 'Seiko 5 Field Sports Style', 1, 3699.00, 3699.00),
(19, 25, 1, 'Rolex Spain', 5, 1999.00, 9995.00),
(20, 26, 13, 'King Seiko SJE109J1', 3, 6999.00, 20997.00),
(21, 27, 19, 'Orient SK RA', 1, 6895.00, 6895.00),
(22, 27, 11, 'Citizen EM0899', 3, 5999.00, 17997.00),
(23, 27, 14, 'Seiko 5 Field Sports Style', 2, 3699.00, 7398.00),
(24, 28, 3, 'Yacht-Master 42', 1, 1499.00, 1499.00),
(25, 28, 19, 'Orient SK RA', 3, 6895.00, 20685.00),
(26, 28, 28, 'Citizen Tsuyosa NJ0150', 5, 6666.00, 33330.00),
(27, 29, 3, 'Yacht-Master 42', 1, 1499.00, 1499.00),
(28, 30, 7, 'Doxa Noble D173TCM', 2, 6999.00, 13998.00),
(29, 30, 14, 'Seiko 5 Field Sports Style', 6, 3699.00, 22194.00),
(30, 31, 4, 'Cosmograph Daytona', 3, 6999.00, 20997.00),
(31, 31, 5, 'Oyster Perpetual 41', 5, 5999.00, 29995.00),
(32, 32, 9, 'Titoni Cosmo Queen 729', 5, 2222.00, 11110.00),
(35, 34, 9, 'Titoni Cosmo Queen 729', 3, 2222.00, 6666.00),
(36, 35, 2, 'Datejust 36', 5, 2499.00, 12495.00),
(37, 35, 10, 'Tissot T140', 3, 1234.00, 3702.00),
(38, 36, 1, 'Rolex Spain', 1, 1999.00, 1999.00);

-- --------------------------------------------------------

--
-- Table structure for table `quocgia`
--

CREATE TABLE `quocgia` (
  `country_id` int(11) NOT NULL,
  `country_name` varchar(100) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `quocgia`
--

INSERT INTO `quocgia` (`country_id`, `country_name`) VALUES
(1, 'Afghanistan'),
(2, 'Albania'),
(3, 'Algeria'),
(4, 'American Samoa'),
(5, 'Andorra'),
(6, 'Angola'),
(7, 'Anguilla'),
(8, 'Antarctica'),
(9, 'Antigua and Barbuda'),
(10, 'Argentina'),
(11, 'Armenia'),
(12, 'Aruba'),
(13, 'Australia'),
(14, 'Austria'),
(15, 'Azerbaijan'),
(16, 'Bahamas'),
(17, 'Bahrain'),
(18, 'Bangladesh'),
(19, 'Barbados'),
(20, 'Belarus'),
(21, 'Belgium'),
(22, 'Belize'),
(23, 'Benin'),
(24, 'Bermuda'),
(25, 'Bhutan'),
(26, 'Bolivia'),
(27, 'Bosnia and Herzegovina'),
(28, 'Botswana'),
(29, 'Bouvet Island'),
(30, 'Brazil'),
(31, 'British Indian Ocean Territory'),
(32, 'Brunei Darussalam'),
(33, 'Bulgaria'),
(34, 'Burkina Faso'),
(35, 'Burundi'),
(36, 'Cambodia'),
(37, 'Cameroon'),
(38, 'Canada'),
(39, 'Cape Verde'),
(40, 'Cayman Islands'),
(41, 'Central African Republic'),
(42, 'Chad'),
(43, 'Chile'),
(44, 'China'),
(45, 'Christmas Island'),
(46, 'Cocos (Keeling) Islands'),
(47, 'Colombia'),
(48, 'Comoros'),
(49, 'Congo'),
(50, 'Cook Islands'),
(51, 'Costa Rica'),
(52, 'Croatia (Hrvatska)'),
(53, 'Cuba'),
(54, 'Cyprus'),
(55, 'Czech Republic'),
(56, 'Denmark'),
(57, 'Djibouti'),
(58, 'Dominica'),
(59, 'Dominican Republic'),
(60, 'East Timor'),
(61, 'Ecuador'),
(62, 'Egypt'),
(63, 'El Salvador'),
(64, 'Equatorial Guinea'),
(65, 'Eritrea'),
(66, 'Estonia'),
(67, 'Ethiopia'),
(68, 'Falkland Islands (Malvinas)'),
(69, 'Faroe Islands'),
(70, 'Fiji'),
(71, 'Finland'),
(72, 'France'),
(73, 'France, Metropolitan'),
(74, 'French Guiana'),
(75, 'French Polynesia'),
(76, 'French Southern Territories'),
(77, 'Gabon'),
(78, 'Gambia'),
(79, 'Georgia'),
(80, 'Germany'),
(81, 'Ghana'),
(82, 'Gibraltar'),
(83, 'Guernsey'),
(84, 'Greece'),
(85, 'Greenland'),
(86, 'Grenada'),
(87, 'Guadeloupe'),
(88, 'Guam'),
(89, 'Guatemala'),
(90, 'Guinea'),
(91, 'Guinea-Bissau'),
(92, 'Guyana'),
(93, 'Haiti'),
(94, 'Heard and Mc Donald Islands'),
(95, 'Honduras'),
(96, 'Hong Kong'),
(97, 'Hungary'),
(98, 'Iceland'),
(99, 'India'),
(100, 'Isle of Man'),
(101, 'Indonesia'),
(102, 'Iran (Islamic Republic of)'),
(103, 'Iraq'),
(104, 'Ireland'),
(105, 'Israel'),
(106, 'Italy'),
(107, 'Ivory Coast'),
(108, 'Jersey'),
(109, 'Jamaica'),
(110, 'Japan'),
(111, 'Jordan'),
(112, 'Kazakhstan'),
(113, 'Kenya'),
(114, 'Kiribati'),
(115, 'Korea, Democratic People\'s Republic of'),
(116, 'Korea, Republic of'),
(117, 'Kosovo'),
(118, 'Kuwait'),
(119, 'Kyrgyzstan'),
(120, 'Lao People\'s Democratic Republic'),
(121, 'Latvia'),
(122, 'Lebanon'),
(123, 'Lesotho'),
(124, 'Liberia'),
(125, 'Libyan Arab Jamahiriya'),
(126, 'Liechtenstein'),
(127, 'Lithuania'),
(128, 'Luxembourg'),
(129, 'Macau'),
(130, 'Macedonia'),
(131, 'Madagascar'),
(132, 'Malawi'),
(133, 'Malaysia'),
(134, 'Maldives'),
(135, 'Mali'),
(136, 'Malta'),
(137, 'Marshall Islands'),
(138, 'Martinique'),
(139, 'Mauritania'),
(140, 'Mauritius'),
(141, 'Mayotte'),
(142, 'Mexico'),
(143, 'Micronesia, Federated States of'),
(144, 'Moldova, Republic of'),
(145, 'Monaco'),
(146, 'Mongolia'),
(147, 'Montenegro'),
(148, 'Montserrat'),
(149, 'Morocco'),
(150, 'Mozambique'),
(151, 'Myanmar'),
(152, 'Namibia'),
(153, 'Nauru'),
(154, 'Nepal'),
(155, 'Netherlands'),
(156, 'Netherlands Antilles'),
(157, 'New Caledonia'),
(158, 'New Zealand'),
(159, 'Nicaragua'),
(160, 'Niger'),
(161, 'Nigeria'),
(162, 'Niue'),
(163, 'Norfolk Island'),
(164, 'Northern Mariana Islands'),
(165, 'Norway'),
(166, 'Oman'),
(167, 'Pakistan'),
(168, 'Palau'),
(169, 'Palestine'),
(170, 'Panama'),
(171, 'Papua New Guinea'),
(172, 'Paraguay'),
(173, 'Peru'),
(174, 'Philippines'),
(175, 'Pitcairn'),
(176, 'Poland'),
(177, 'Portugal'),
(178, 'Puerto Rico'),
(179, 'Qatar'),
(180, 'Reunion'),
(181, 'Romania'),
(182, 'Russian Federation'),
(183, 'Rwanda'),
(184, 'Saint Kitts and Nevis'),
(185, 'Saint Lucia'),
(186, 'Saint Vincent and the Grenadines'),
(187, 'Samoa'),
(188, 'San Marino'),
(189, 'Sao Tome and Principe'),
(190, 'Saudi Arabia'),
(191, 'Senegal'),
(192, 'Serbia'),
(193, 'Seychelles'),
(194, 'Sierra Leone'),
(195, 'Singapore'),
(196, 'Slovakia'),
(197, 'Slovenia'),
(198, 'Solomon Islands'),
(199, 'Somalia'),
(200, 'South Africa'),
(201, 'South Georgia South Sandwich Islands'),
(202, 'Spain'),
(203, 'Sri Lanka'),
(204, 'St. Helena'),
(205, 'St. Pierre and Miquelon'),
(206, 'Sudan'),
(207, 'Suriname'),
(208, 'Svalbard and Jan Mayen Islands'),
(209, 'Swaziland'),
(210, 'Sweden'),
(211, 'Switzerland'),
(212, 'Syrian Arab Republic'),
(213, 'Taiwan'),
(214, 'Tajikistan'),
(215, 'Tanzania, United Republic of'),
(216, 'Thailand'),
(217, 'Togo'),
(218, 'Tokelau'),
(219, 'Tonga'),
(220, 'Trinidad and Tobago'),
(221, 'Tunisia'),
(222, 'Turkey'),
(223, 'Turkmenistan'),
(224, 'Turks and Caicos Islands'),
(225, 'Tuvalu'),
(226, 'Uganda'),
(227, 'Ukraine'),
(228, 'United Arab Emirates'),
(229, 'United Kingdom'),
(230, 'United States'),
(231, 'United States minor outlying islands'),
(232, 'Uruguay'),
(233, 'Uzbekistan'),
(234, 'Vanuatu'),
(235, 'Vatican City State'),
(236, 'Venezuela'),
(237, 'Vietnam'),
(238, 'Virgin Islands (British)'),
(239, 'Virgin Islands (U.S.)'),
(240, 'Wallis and Futuna Islands'),
(241, 'Western Sahara'),
(242, 'Yemen'),
(243, 'Zaire'),
(244, 'Zambia'),
(245, 'Zimbabwe');

-- --------------------------------------------------------

--
-- Table structure for table `sanpham`
--

CREATE TABLE `sanpham` (
  `sp_id` int(11) NOT NULL,
  `sp_ten` varchar(255) NOT NULL,
  `sp_giacu` int(10) NOT NULL,
  `sp_giamoi` int(10) NOT NULL,
  `sp_tonkho` int(10) NOT NULL,
  `sp_img` varchar(255) NOT NULL,
  `sp_chitietsp` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sanpham`
--

INSERT INTO `sanpham` (`sp_id`, `sp_ten`, `sp_giacu`, `sp_giamoi`, `sp_tonkho`, `sp_img`, `sp_chitietsp`) VALUES
(1, 'Rolex Spain', 2500, 1999, 94, 'anh1.png', '<p><span style=\"color: rgb(10, 10, 10); font-family: opensans, \"Helvetica Neue\", Helvetica, Helvetica, Arial, sans-serif;\"><b>Chat lieu:</b> Kham kim cuong D.</br>\r\n<b>So hieu san pham:</b> AE-1999MHD-1AVDF</br>\r\n<b>Duong kinh mat so:</b> 41 mm x 40.1 mm</br>\r\n<b>Be day mat so:</b> 11.5 mm</br>\r\n<b>Chong nuoc:</b> 10 ATM</br>\r\n<b>Xuat xu:</b> Viet Nam</br>\r\n'),
(2, 'Datejust 36', 3999, 2499, 95, 'anh2.png', '<p><span style=\"color: rgb(10, 10, 10); font-family: opensans, \"Helvetica Neue\", Helvetica, Helvetica, Arial, sans-serif;\"><b>Chat lieu:</b> Bach Kim Ngoc Luc Bao.</br>\r\n<b>So hieu san pham:</b> NM-9200BHD-1AVDF</br>\r\n<b>Duong kinh mat so:</b> 48 mm x 45.1 mm</br>\r\n<b>Be day mat so:</b> 15.5 mm</br>\r\n<b>Chong nuoc:</b> 10 ATM</br>\r\n<b>Xuat xu:</b> USA</br>\r\n'),
(3, 'Yacht-Master 42', 1900, 1499, 94, 'anh3.png', '<p><span style=\"color: rgb(10, 10, 10); font-family: opensans, \"Helvetica Neue\", Helvetica, Helvetica, Arial, sans-serif;\"><b>Chat lieu:</b> Thach Anh Ma Vang 9999.</br>\r\n<b>So hieu san pham:</b> DM-AZ200WHD-1AVDF</br>\r\n<b>Duong kinh mat so:</b> 39 mm x 37.1 mm</br>\r\n<b>Be day mat so:</b> 12.5 mm</br>\r\n<b>Chong nuoc:</b> 11 ATM</br>\r\n<b>Xuat xu:</b> Itali</br>\r\n'),
(4, 'Cosmograph Daytona', 9500, 6999, 97, 'anh4.png', '<p><span style=\"color: rgb(10, 10, 10); font-family: opensans, \"Helvetica Neue\", Helvetica, Helvetica, Arial, sans-serif;\"><b>Chat lieu:</b> Ma Vang 9999.</br>\r\n<b>So hieu san pham:</b> AE-1200WHD-1AVDF</br>\r\n<b>Duong kinh mat so:</b> 45 mm x 42.1 mm</br>\r\n<b>Be day mat so:</b> 12.5 mm</br>\r\n<b>Chong nuoc:</b> 12 ATM</br>\r\n<b>Xuat xu:</b> Itali</br>\r\n'),
(5, 'Oyster Perpetual 41', 8999, 5999, 5, 'anh5.png', '<p><span style=\"color: rgb(10, 10, 10); font-family: opensans, \"Helvetica Neue\", Helvetica, Helvetica, Arial, sans-serif;\"><b>Chat lieu:</b> Ma vang 24carat.</br>\r\n<b>So hieu san pham:</b> AE-1200WHD-1AVDF</br>\r\n<b>Duong kinh mat so:</b> 45 mm x 42.1 mm</br>\r\n<b>Be day mat so:</b> 12.5 mm</br>\r\n<b>Chong nuoc:</b> 10 ATM</br>\r\n<b>Xuat xu:</b> Thuy Si</br>\r\n'),
(6, 'Sky-Dweller', 899, 699, 20, 'anh6.png', '<p><span style=\"color: rgb(10, 10, 10); font-family: opensans, \"Helvetica Neue\", Helvetica, Helvetica, Arial, sans-serif;\"><b>Chat lieu:</b> Ma vang 24carat.</br>\r\n<b>So hieu san pham:</b> AE-1200WHD-1AVDF</br>\r\n<b>Duong kinh mat so:</b> 45 mm x 42.1 mm</br>\r\n<b>Be day mat so:</b> 12.5 mm</br>\r\n<b>Chong nuoc:</b> 10 ATM</br>\r\n<b>Xuat xu:</b> Thuy Si</br>\r\n'),
(7, 'Doxa Noble D173TCM', 9500, 6999, 10, 'anh7.png', '<p><span style=\"color: rgb(10, 10, 10); font-family: opensans, \"Helvetica Neue\", Helvetica, Helvetica, Arial, sans-serif;\"><b>Chat lieu:</b> Ma vang 24carat.</br>\r\n<b>So hieu san pham:</b> AE-1200WHD-1AVDF</br>\r\n<b>Duong kinh mat so:</b> 45 mm x 42.1 mm</br>\r\n<b>Be day mat so:</b> 12.5 mm</br>\r\n<b>Chong nuoc:</b> 10 ATM</br>\r\n<b>Xuat xu:</b> Thuy Si</br>\r\n'),
(8, 'Titoni Airmaster 83743', 0, 6999, 20, 'anh8.png', '<p><span style=\"color: rgb(10, 10, 10); font-family: opensans, \"Helvetica Neue\", Helvetica, Helvetica, Arial, sans-serif;\"><b>Chat lieu:</b> Ma vang 24carat.</br>\r\n<b>So hieu san pham:</b> AE-1200WHD-1AVDF</br>\r\n<b>Duong kinh mat so:</b> 45 mm x 42.1 mm</br>\r\n<b>Be day mat so:</b> 12.5 mm</br>\r\n<b>Chong nuoc:</b> 10 ATM</br>\r\n<b>Xuat xu:</b> Thuy Si</br>\r\n'),
(9, 'Titoni Cosmo Queen 729', 2899, 2222, 8, 'anh9.png', '<p><span style=\"color: rgb(10, 10, 10); font-family: opensans, \"Helvetica Neue\", Helvetica, Helvetica, Arial, sans-serif;\"><b>Chat lieu:</b> Ma vang 24carat.</br>\r\n<b>So hieu san pham:</b> AE-1200WHD-1AVDF</br>\r\n<b>Duong kinh mat so:</b> 45 mm x 42.1 mm</br>\r\n<b>Be day mat so:</b> 12.5 mm</br>\r\n<b>Chong nuoc:</b> 10 ATM</br>\r\n<b>Xuat xu:</b> Thuy Si</br>\r\n'),
(10, 'Tissot T140', 0, 1234, 6, 'anh10.png', '<p><span style=\"color: rgb(10, 10, 10); font-family: opensans, \"Helvetica Neue\", Helvetica, Helvetica, Arial, sans-serif;\"><b>Chat lieu:</b> Ma vang 24carat.</br>\r\n<b>So hieu san pham:</b> AE-1200WHD-1AVDF</br>\r\n<b>Duong kinh mat so:</b> 45 mm x 42.1 mm</br>\r\n<b>Be day mat so:</b> 12.5 mm</br>\r\n<b>Chong nuoc:</b> 10 ATM</br>\r\n<b>Xuat xu:</b> Thuy Si</br>\r\n'),
(11, 'Citizen EM0899', 9969, 5999, 16, 'anh11.png', '<p><span style=\"color: rgb(10, 10, 10); font-family: opensans, \"Helvetica Neue\", Helvetica, Helvetica, Arial, sans-serif;\"><b>Chat lieu:</b> Ma vang 24carat.</br>\r\n<b>So hieu san pham:</b> AE-1200WHD-1AVDF</br>\r\n<b>Duong kinh mat so:</b> 45 mm x 42.1 mm</br>\r\n<b>Be day mat so:</b> 12.5 mm</br>\r\n<b>Chong nuoc:</b> 10 ATM</br>\r\n<b>Xuat xu:</b> Thuy Si</br>\r\n'),
(12, 'Fossil Raquel Watch Ring', 6999, 5699, 24, 'anh12.png', '<p><span style=\"color: rgb(10, 10, 10); font-family: opensans, \"Helvetica Neue\", Helvetica, Helvetica, Arial, sans-serif;\"><b>Chat lieu:</b> Ma vang 24carat.</br>\r\n<b>So hieu san pham:</b> AE-1200WHD-1AVDF</br>\r\n<b>Duong kinh mat so:</b> 45 mm x 42.1 mm</br>\r\n<b>Be day mat so:</b> 12.5 mm</br>\r\n<b>Chong nuoc:</b> 10 ATM</br>\r\n<b>Xuat xu:</b> Thuy Si</br>\r\n'),
(13, 'King Seiko SJE109J1', 8999, 6999, 15, 'anh13.png', '<p><span style=\"color: rgb(10, 10, 10); font-family: opensans, \"Helvetica Neue\", Helvetica, Helvetica, Arial, sans-serif;\"><b>Chat lieu:</b> Ma vang 24carat.</br>\r\n<b>So hieu san pham:</b> AE-1200WHD-1AVDF</br>\r\n<b>Duong kinh mat so:</b> 45 mm x 42.1 mm</br>\r\n<b>Be day mat so:</b> 12.5 mm</br>\r\n<b>Chong nuoc:</b> 10 ATM</br>\r\n<b>Xuat xu:</b> Thuy Si</br>\r\n'),
(14, 'Seiko 5 Field Sports Style', 5999, 3699, 100, 'anh14.png', '<p><span style=\"color: rgb(10, 10, 10); font-family: opensans, \"Helvetica Neue\", Helvetica, Helvetica, Arial, sans-serif;\"><b>Chat lieu:</b> Ma vang 24carat.</br>\r\n<b>So hieu san pham:</b> AE-1200WHD-1AVDF</br>\r\n<b>Duong kinh mat so:</b> 45 mm x 42.1 mm</br>\r\n<b>Be day mat so:</b> 12.5 mm</br>\r\n<b>Chong nuoc:</b> 10 ATM</br>\r\n<b>Xuat xu:</b> Thuy Si</br>\r\n'),
(15, 'Seiko Presage SPB467J1', 0, 6988, 18, 'anh15.png', '<p><span style=\"color: rgb(10, 10, 10); font-family: opensans, \"Helvetica Neue\", Helvetica, Helvetica, Arial, sans-serif;\"><b>Chat lieu:</b> Ma vang 24carat.</br>\r\n<b>So hieu san pham:</b> AE-1200WHD-1AVDF</br>\r\n<b>Duong kinh mat so:</b> 45 mm x 42.1 mm</br>\r\n<b>Be day mat so:</b> 12.5 mm</br>\r\n<b>Chong nuoc:</b> 10 ATM</br>\r\n<b>Xuat xu:</b> Thuy Si</br>\r\n'),
(16, 'Orient Sun And Moon Open Heart', 8999, 5999, 29, 'anh16.png', '<p><span style=\"color: rgb(10, 10, 10); font-family: opensans, \"Helvetica Neue\", Helvetica, Helvetica, Arial, sans-serif;\"><b>Chat lieu:</b> Ma vang 24carat.</br>\r\n<b>So hieu san pham:</b> AE-1200WHD-1AVDF</br>\r\n<b>Duong kinh mat so:</b> 45 mm x 42.1 mm</br>\r\n<b>Be day mat so:</b> 12.5 mm</br>\r\n<b>Chong nuoc:</b> 10 ATM</br>\r\n<b>Xuat xu:</b> Thuy Si</br>\r\n'),
(17, 'Citizen BM7521', 5999, 3699, 32, 'anh17.png', '<p><span style=\"color: rgb(10, 10, 10); font-family: opensans, \"Helvetica Neue\", Helvetica, Helvetica, Arial, sans-serif;\"><b>Chat lieu:</b> Ma vang 24carat.</br>\r\n<b>So hieu san pham:</b> AE-1200WHD-1AVDF</br>\r\n<b>Duong kinh mat so:</b> 45 mm x 42.1 mm</br>\r\n<b>Be day mat so:</b> 12.5 mm</br>\r\n<b>Chong nuoc:</b> 10 ATM</br>\r\n<b>Xuat xu:</b> Thuy Si</br>\r\n'),
(18, 'Citizen NH9130', 10299, 8999, 30, 'anh18.png', '<p><span style=\"color: rgb(10, 10, 10); font-family: opensans, \"Helvetica Neue\", Helvetica, Helvetica, Arial, sans-serif;\"><b>Chat lieu:</b> Ma vang 24carat.</br>\r\n<b>So hieu san pham:</b> AE-1200WHD-1AVDF</br>\r\n<b>Duong kinh mat so:</b> 45 mm x 42.1 mm</br>\r\n<b>Be day mat so:</b> 12.5 mm</br>\r\n<b>Chong nuoc:</b> 10 ATM</br>\r\n<b>Xuat xu:</b> Thuy Si</br>\r\n'),
(19, 'Orient SK RA', 8912, 6895, 100, 'anh19.png', '<p><span style=\"color: rgb(10, 10, 10); font-family: opensans, \"Helvetica Neue\", Helvetica, Helvetica, Arial, sans-serif;\"><b>Chat lieu:</b> Ma vang 24carat.</br>\r\n<b>So hieu san pham:</b> AE-1200WHD-1AVDF</br>\r\n<b>Duong kinh mat so:</b> 45 mm x 42.1 mm</br>\r\n<b>Be day mat so:</b> 12.5 mm</br>\r\n<b>Chong nuoc:</b> 10 ATM</br>\r\n<b>Xuat xu:</b> Thuy Si</br>\r\n'),
(20, 'Orient Star Contemporary', 8666, 6999, 15, 'anh20.png', '<p><span style=\"color: rgb(10, 10, 10); font-family: opensans, \"Helvetica Neue\", Helvetica, Helvetica, Arial, sans-serif;\"><b>Chat lieu:</b> Ma vang 24carat.</br>\r\n<b>So hieu san pham:</b> AE-1200WHD-1AVDF</br>\r\n<b>Duong kinh mat so:</b> 45 mm x 42.1 mm</br>\r\n<b>Be day mat so:</b> 12.5 mm</br>\r\n<b>Chong nuoc:</b> 10 ATM</br>\r\n<b>Xuat xu:</b> Thuy Si</br>\r\n'),
(21, 'Orient Esteem Gen 2', 12999, 10999, 5, 'anh21.png', '<p><span style=\"color: rgb(10, 10, 10); font-family: opensans, \"Helvetica Neue\", Helvetica, Helvetica, Arial, sans-serif;\"><b>Chat lieu:</b> Ma vang 24carat.</br>\r\n<b>So hieu san pham:</b> AE-1200WHD-1AVDF</br>\r\n<b>Duong kinh mat so:</b> 45 mm x 42.1 mm</br>\r\n<b>Be day mat so:</b> 12.5 mm</br>\r\n<b>Chong nuoc:</b> 10 ATM</br>\r\n<b>Xuat xu:</b> Thuy Si</br>\r\n'),
(22, 'Rado Golden Horse ', 0, 5699, 15, 'anh22.png', '<p><span style=\"color: rgb(10, 10, 10); font-family: opensans, \"Helvetica Neue\", Helvetica, Helvetica, Arial, sans-serif;\"><b>Chat lieu:</b> Ma vang 24carat.</br>\r\n<b>So hieu san pham:</b> AE-1200WHD-1AVDF</br>\r\n<b>Duong kinh mat so:</b> 45 mm x 42.1 mm</br>\r\n<b>Be day mat so:</b> 12.5 mm</br>\r\n<b>Chong nuoc:</b> 10 ATM</br>\r\n<b>Xuat xu:</b> Thuy Si</br>\r\n'),
(23, 'Longines Master L2', 7899, 6322, 5, 'anh23.png', '<p><span style=\"color: rgb(10, 10, 10); font-family: opensans, \"Helvetica Neue\", Helvetica, Helvetica, Arial, sans-serif;\"><b>Chat lieu:</b> Ma vang 24carat.</br>\r\n<b>So hieu san pham:</b> AE-1200WHD-1AVDF</br>\r\n<b>Duong kinh mat so:</b> 45 mm x 42.1 mm</br>\r\n<b>Be day mat so:</b> 12.5 mm</br>\r\n<b>Chong nuoc:</b> 10 ATM</br>\r\n<b>Xuat xu:</b> Thuy Si</br>\r\n'),
(24, 'Citizen NH9130', 12999, 11666, 5, 'anh24.png', '<p><span style=\"color: rgb(10, 10, 10); font-family: opensans, \"Helvetica Neue\", Helvetica, Helvetica, Arial, sans-serif;\"><b>Chat lieu:</b> Ma vang 24carat.</br>\r\n<b>So hieu san pham:</b> AE-1200WHD-1AVDF</br>\r\n<b>Duong kinh mat so:</b> 45 mm x 42.1 mm</br>\r\n<b>Be day mat so:</b> 12.5 mm</br>\r\n<b>Chong nuoc:</b> 10 ATM</br>\r\n<b>Xuat xu:</b> Thuy Si</br>\r\n'),
(25, 'Rado Diastar Original ', 6999, 3999, 36, 'anh25.png', '<p><span style=\"color: rgb(10, 10, 10); font-family: opensans, \"Helvetica Neue\", Helvetica, Helvetica, Arial, sans-serif;\"><b>Chat lieu:</b> Ma vang 24carat.</br>\r\n<b>So hieu san pham:</b> AE-1200WHD-1AVDF</br>\r\n<b>Duong kinh mat so:</b> 45 mm x 42.1 mm</br>\r\n<b>Be day mat so:</b> 12.5 mm</br>\r\n<b>Chong nuoc:</b> 10 ATM</br>\r\n<b>Xuat xu:</b> Thuy Si</br>\r\n'),
(26, 'Rado True Square ', 9888, 6999, 21, 'anh26.png', '<p><span style=\"color: rgb(10, 10, 10); font-family: opensans, \"Helvetica Neue\", Helvetica, Helvetica, Arial, sans-serif;\"><b>Chat lieu:</b> Ma vang 24carat.</br>\r\n<b>So hieu san pham:</b> AE-1200WHD-1AVDF</br>\r\n<b>Duong kinh mat so:</b> 45 mm x 42.1 mm</br>\r\n<b>Be day mat so:</b> 12.5 mm</br>\r\n<b>Chong nuoc:</b> 10 ATM</br>\r\n<b>Xuat xu:</b> Thuy Si</br>\r\n'),
(27, 'Rado Kunihiko Morinaga', 12899, 10699, 9, 'anh27.png', '<p><span style=\"color: rgb(10, 10, 10); font-family: opensans, \"Helvetica Neue\", Helvetica, Helvetica, Arial, sans-serif;\"><b>Chat lieu:</b> Ma vang 24carat.</br>\r\n<b>So hieu san pham:</b> AE-1200WHD-1AVDF</br>\r\n<b>Duong kinh mat so:</b> 45 mm x 42.1 mm</br>\r\n<b>Be day mat so:</b> 12.5 mm</br>\r\n<b>Chong nuoc:</b> 10 ATM</br>\r\n<b>Xuat xu:</b> Thuy Si</br>\r\n'),
(28, 'Citizen Tsuyosa NJ0150', 9999, 6666, 14, 'anh28.png', '<p><span style=\"color: rgb(10, 10, 10); font-family: opensans, \"Helvetica Neue\", Helvetica, Helvetica, Arial, sans-serif;\"><b>Chat lieu:</b> Ma vang 24carat.</br>\r\n<b>So hieu san pham:</b> AE-1200WHD-1AVDF</br>\r\n<b>Duong kinh mat so:</b> 45 mm x 42.1 mm</br>\r\n<b>Be day mat so:</b> 12.5 mm</br>\r\n<b>Chong nuoc:</b> 10 ATM</br>\r\n<b>Xuat xu:</b> Thuy Si</br>\r\n'),
(29, 'Doxa Executive D206SWH', 0, 299, 29, 'anh29.png', '<p><span style=\"color: rgb(10, 10, 10); font-family: opensans, \"Helvetica Neue\", Helvetica, Helvetica, Arial, sans-serif;\"><b>Chat lieu:</b> Ma vang 24carat.</br>\r\n<b>So hieu san pham:</b> AE-1200WHD-1AVDF</br>\r\n<b>Duong kinh mat so:</b> 45 mm x 42.1 mm</br>\r\n<b>Be day mat so:</b> 12.5 mm</br>\r\n<b>Chong nuoc:</b> 10 ATM</br>\r\n<b>Xuat xu:</b> Thuy Si</br>\r\n'),
(30, 'Saga 53198', 899, 599, 22, 'anh30.png', '<p><span style=\"color: rgb(10, 10, 10); font-family: opensans, \"Helvetica Neue\", Helvetica, Helvetica, Arial, sans-serif;\"><b>Chat lieu:</b> Ma vang 24carat.</br>\r\n<b>So hieu san pham:</b> AE-1200WHD-1AVDF</br>\r\n<b>Duong kinh mat so:</b> 45 mm x 42.1 mm</br>\r\n<b>Be day mat so:</b> 12.5 mm</br>\r\n<b>Chong nuoc:</b> 10 ATM</br>\r\n<b>Xuat xu:</b> Thuy Si</br>\r\n');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `khachhang`
--
ALTER TABLE `khachhang`
  ADD PRIMARY KEY (`kh_id`);

--
-- Indexes for table `lienhe`
--
ALTER TABLE `lienhe`
  ADD PRIMARY KEY (`lh_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kh_id` (`order_kh_id`);

--
-- Indexes for table `order_detail`
--
ALTER TABLE `order_detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `quocgia`
--
ALTER TABLE `quocgia`
  ADD PRIMARY KEY (`country_id`);

--
-- Indexes for table `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`sp_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `khachhang`
--
ALTER TABLE `khachhang`
  MODIFY `kh_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `lienhe`
--
ALTER TABLE `lienhe`
  MODIFY `lh_id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `order_detail`
--
ALTER TABLE `order_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `quocgia`
--
ALTER TABLE `quocgia`
  MODIFY `country_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=246;

--
-- AUTO_INCREMENT for table `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `sp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`order_kh_id`) REFERENCES `khachhang` (`kh_id`);

--
-- Constraints for table `order_detail`
--
ALTER TABLE `order_detail`
  ADD CONSTRAINT `order_detail_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`),
  ADD CONSTRAINT `order_detail_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `sanpham` (`sp_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
