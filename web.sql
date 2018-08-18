-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 17, 2018 at 11:44 PM
-- Server version: 10.1.29-MariaDB
-- PHP Version: 7.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `web`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `cate_id` int(10) UNSIGNED NOT NULL,
  `cate_title` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cate_id`, `cate_title`) VALUES
(8, 'KhÃ³a há»c'),
(9, 'Giáº£ng viÃªn'),
(12, 'Há»c phÃ­');

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `cm_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(50) NOT NULL,
  `message` text NOT NULL,
  `time` datetime NOT NULL,
  `cm_check` varchar(1) NOT NULL,
  `new_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`cm_id`, `name`, `message`, `time`, `cm_check`, `new_id`) VALUES
(16, 'y', ' bÃ i nay hay', '2017-06-16 21:36:24', 'Y', 45),
(17, 'das', 'ssss', '2017-06-16 21:54:20', 'Y', 45);

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `new_id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `introduce` text COLLATE utf8_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8_unicode_ci NOT NULL,
  `cate_id` int(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`new_id`, `title`, `image`, `introduce`, `content`, `cate_id`) VALUES
(39, 'BÃ i viáº¿t thuá»™c chuyÃªn má»¥c kinh táº¿ Ä‘Æ°á»£c cáº­p nháº­t lÃºc 8h30 ngÃ y 11/10', 'táº£i xuá»‘ng.jpg', 'jose Mourinho vá» MU, Pep Guardiola tiáº¿p quáº£n Man City, Antonio Conte dáº«n dáº¯t Chelsea, Pochettino Ä‘Æ°á»£c Tottenham nÃ¢ng lÆ°Æ¡ng gia háº¡n há»£p Ä‘á»“ng. DÄ© nhiÃªn cÃ¡c CLB Premier League pháº£i dÃ¹ng tiá»n, ráº¥t nhiá»u tiá»n Ä‘á»ƒ quy tá»¥ dÃ n siÃªu HLV nhÆ° mÃ¹a nÃ y.', '<p>jose Mourinho vá» MU, Pep Guardiola tiáº¿p quáº£n Man City, Antonio Conte dáº«n dáº¯t Chelsea, Pochettino Ä‘Æ°á»£c Tottenham n&acirc;ng lÆ°Æ¡ng gia háº¡n há»£p Ä‘á»“ng. DÄ© nhi&ecirc;n c&aacute;c CLB Premier League pháº£i d&ugrave;ng tiá»n, ráº¥t nhiá»u tiá»n Ä‘á»ƒ quy tá»¥ d&agrave;n si&ecirc;u HLV nhÆ° m&ugrave;a n&agrave;y.</p>\r\n', 7),
(37, 'BÃ i viáº¿t thuá»™c chuyÃªn má»¥c kinh táº¿ Ä‘Æ°á»£c cáº­p nháº­t lÃºc 18h30', 'C.ronaldo.jpg', 'jose Mourinho vá» MU, Pep Guardiola tiáº¿p quáº£n Man City, Antonio Conte dáº«n dáº¯t Chelsea, Pochettino Ä‘Æ°á»£c Tottenham nÃ¢ng lÆ°Æ¡ng gia háº¡n há»£p Ä‘á»“ng. DÄ© nhiÃªn cÃ¡c CLB Premier League pháº£i dÃ¹ng tiá»n, ráº¥t nhiá»u tiá»n Ä‘á»ƒ quy tá»¥ dÃ n siÃªu HLV nhÆ° mÃ¹a nÃ y.', '<p>jose Mourinho vá» MU, Pep Guardiola tiáº¿p quáº£n Man City, Antonio Conte dáº«n dáº¯t Chelsea, Pochettino Ä‘Æ°á»£c Tottenham n&acirc;ng lÆ°Æ¡ng gia háº¡n há»£p Ä‘á»“ng. DÄ© nhi&ecirc;n c&aacute;c CLB Premier League pháº£i d&ugrave;ng tiá»n, ráº¥t nhiá»u tiá»n Ä‘á»ƒ quy tá»¥ d&agrave;n si&ecirc;u HLV nhÆ° m&ugrave;a n&agrave;y.</p>\r\n', 7),
(36, 'BÃ i viáº¿t thuá»™c chuyÃªn má»¥c thá»ƒ thao Ä‘Æ°á»£c cáº­p nháº­t lÃºc 9h45', 'images (2).jpg', 'jose Mourinho vá» MU, Pep Guardiola tiáº¿p quáº£n Man City, Antonio Conte dáº«n dáº¯t Chelsea, Pochettino Ä‘Æ°á»£c Tottenham nÃ¢ng lÆ°Æ¡ng gia háº¡n há»£p Ä‘á»“ng. DÄ© nhiÃªn cÃ¡c CLB Premier League pháº£i dÃ¹ng tiá»n, ráº¥t nhiá»u tiá»n Ä‘á»ƒ quy tá»¥ dÃ n siÃªu HLV nhÆ° mÃ¹a nÃ y.', '<p>jose Mourinho vá» MU, Pep Guardiola tiáº¿p quáº£n Man City, Antonio Conte dáº«n dáº¯t Chelsea, Pochettino Ä‘Æ°á»£c Tottenham n&acirc;ng lÆ°Æ¡ng gia háº¡n há»£p Ä‘á»“ng. DÄ© nhi&ecirc;n c&aacute;c CLB Premier League pháº£i d&ugrave;ng tiá»n, ráº¥t nhiá»u tiá»n Ä‘á»ƒ quy tá»¥ d&agrave;n si&ecirc;u HLV nhÆ° m&ugrave;a n&agrave;y.</p>\r\n', 15),
(38, 'BÃ i viáº¿t thuá»™c chuyÃªn má»¥c kinh táº¿ Ä‘Æ°á»£c cáº­p nháº­t lÃºc 8h10 ngÃ y 11/10', 'images.jpg', 'jose Mourinho vá» MU, Pep Guardiola tiáº¿p quáº£n Man City, Antonio Conte dáº«n dáº¯t Chelsea, Pochettino Ä‘Æ°á»£c Tottenham nÃ¢ng lÆ°Æ¡ng gia háº¡n há»£p Ä‘á»“ng. DÄ© nhiÃªn cÃ¡c CLB Premier League pháº£i dÃ¹ng tiá»n, ráº¥t nhiá»u tiá»n Ä‘á»ƒ quy tá»¥ dÃ n siÃªu HLV nhÆ° mÃ¹a nÃ y.', '<p>jose Mourinho vá» MU, Pep Guardiola tiáº¿p quáº£n Man City, Antonio Conte dáº«n dáº¯t Chelsea, Pochettino Ä‘Æ°á»£c Tottenham n&acirc;ng lÆ°Æ¡ng gia háº¡n há»£p Ä‘á»“ng. DÄ© nhi&ecirc;n c&aacute;c CLB Premier League pháº£i d&ugrave;ng tiá»n, ráº¥t nhiá»u tiá»n Ä‘á»ƒ quy tá»¥ d&agrave;n si&ecirc;u HLV nhÆ° m&ugrave;a n&agrave;y.</p>\r\n', 7),
(35, 'BÃ i viáº¿t thuá»™c chuyÃªn má»¥c thá»ƒ  thao Ä‘Æ°á»£c cáº­p nháº­t lÃºc 9h30', 'images (2).jpg', 'jose Mourinho vá» MU, Pep Guardiola tiáº¿p quáº£n Man City, Antonio Conte dáº«n dáº¯t Chelsea, Pochettino Ä‘Æ°á»£c Tottenham nÃ¢ng lÆ°Æ¡ng gia háº¡n há»£p Ä‘á»“ng. DÄ© nhiÃªn cÃ¡c CLB Premier League pháº£i dÃ¹ng tiá»n, ráº¥t nhiá»u tiá»n Ä‘á»ƒ quy tá»¥ dÃ n siÃªu HLV nhÆ° mÃ¹a nÃ y.', '<p>jose Mourinho vá» MU, Pep Guardiola tiáº¿p quáº£n Man City, Antonio Conte dáº«n dáº¯t Chelsea, Pochettino Ä‘Æ°á»£c Tottenham nÃ¢ng lÆ°Æ¡ng gia háº¡n há»£p Ä‘á»“ng. DÄ© nhiÃªn cÃ¡c CLB Premier League pháº£i dÃ¹ng tiá»n, ráº¥t nhiá»u tiá»n Ä‘á»ƒ quy tá»¥ dÃ n siÃªu HLV nhÆ° mÃ¹a nÃ y.</p>\r\n', 15),
(34, 'Há»c phÃ­ mÃ´n Tiáº¿ng PhÃ¡p', 'images.jpg', '120000000000', '1000000VND\r\n', 12),
(33, 'Há»c phÃ­ mÃ´n Tiáº¿ng Anh', 'táº£i xuá»‘ng.jpg', '1000000', '100000', 12),
(32, 'Giáº£ng viÃªn David', 'táº£i xuá»‘ng (2).jpg', 'Tháº§y Ä‘áº·c biá»‡t coi trá»ng viá»‡c xÃ¢y dá»±ng kiáº¿n thá»©c cÄƒn báº£n, luÃ´n khuyáº¿n khÃ­ch sá»± sÃ¡ng táº¡o, truyá»n cáº£m há»©ng vÃ  khÆ¡i gá»£i tÃ¬nh yÃªu HÃ³a há»c cho cÃ¡c há»c sinh.', '<p>Tháº§y Ä‘áº·c biá»‡t coi trá»ng viá»‡c xÃ¢y dá»±ng kiáº¿n thá»©c cÄƒn báº£n, luÃ´n khuyáº¿n khÃ­ch sá»± sÃ¡ng táº¡o, truyá»n cáº£m há»©ng vÃ  khÆ¡i gá»£i tÃ¬nh yÃªu Tiáº¿ng ANh cho cÃ¡c há»c sinh..</p>\r\n', 9),
(21, 'CÃ´ Tráº§n Thá»‹ VÃ¢n Anh', 'táº£i xuá»‘ng (1).jpg', 'Nhiá»u nÄƒm kinh nghiá»‡m giáº£ng dáº¡y vÃ  luyá»‡n thi mÃ´n Ngá»¯ vÄƒn, giá»ng giáº£ng sáº¯c sáº£o, tinh táº¿ vá»«a giÃºp HS hiá»ƒu bÃ i vá»«a tÄƒng kháº£ nÄƒng cáº£m thá»¥, khÆ¡i gá»£i há»©ng thÃº vá»›i mÃ´n há»c.', 'Nhiá»u nÄƒm kinh nghiá»‡m giáº£ng dáº¡y vÃ  luyá»‡n thi mÃ´n Ngá»¯ vÄƒn, giá»ng giáº£ng sáº¯c sáº£o, tinh táº¿ vá»«a giÃºp HS hiá»ƒu bÃ i vá»«a tÄƒng kháº£ nÄƒng cáº£m thá»¥, khÆ¡i gá»£i há»©ng thÃº vá»›i mÃ´n há»c.', 9),
(29, 'BÃ i viáº¿t thuá»™c chuyÃªn má»¥c kinh táº¿ Ä‘Æ°á»£c cáº­p nháº­t lÃºc 8h15', 'images (2).jpg', 'jose Mourinho vá» MU, Pep Guardiola tiáº¿p quáº£n Man City, Antonio Conte dáº«n dáº¯t Chelsea, Pochettino Ä‘Æ°á»£c Tottenham nÃ¢ng lÆ°Æ¡ng gia háº¡n há»£p Ä‘á»“ng. DÄ© nhiÃªn cÃ¡c CLB Premier League pháº£i dÃ¹ng tiá»n, ráº¥t nhiá»u tiá»n Ä‘á»ƒ quy tá»¥ dÃ n siÃªu HLV nhÆ° mÃ¹a nÃ y.', '<p>jose Mourinho vá» MU, Pep Guardiola tiáº¿p quáº£n Man City, Antonio Conte dáº«n dáº¯t Chelsea, Pochettino Ä‘Æ°á»£c Tottenham n&acirc;ng lÆ°Æ¡ng gia háº¡n há»£p Ä‘á»“ng. DÄ© nhi&ecirc;n c&aacute;c CLB Premier League pháº£i d&ugrave;ng tiá»n, ráº¥t nhiá»u tiá»n Ä‘á»ƒ quy tá»¥ d&agrave;n si&ecirc;u HLV nhÆ° m&ugrave;a n&agrave;y.</p>\r\n', 7),
(28, 'BÃ i viáº¿t thuá»™c chuyÃªn má»¥c kinh táº¿ Ä‘Æ°á»£c cáº­p nháº­t lÃºc 8h', 'C.ronaldo.jpg', 'jose Mourinho vá» MU, Pep Guardiola tiáº¿p quáº£n Man City, Antonio Conte dáº«n dáº¯t Chelsea, Pochettino Ä‘Æ°á»£c Tottenham nÃ¢ng lÆ°Æ¡ng gia háº¡n há»£p Ä‘á»“ng. DÄ© nhiÃªn cÃ¡c CLB Premier League pháº£i dÃ¹ng tiá»n, ráº¥t nhiá»u tiá»n Ä‘á»ƒ quy tá»¥ dÃ n siÃªu HLV nhÆ° mÃ¹a nÃ y.', '<p>jose Mourinho vá» MU, Pep Guardiola tiáº¿p quáº£n Man City, Antonio Conte dáº«n dáº¯t Chelsea, Pochettino Ä‘Æ°á»£c Tottenham nÃ¢ng lÆ°Æ¡ng gia háº¡n há»£p Ä‘á»“ng. DÄ© nhiÃªn cÃ¡c CLB Premier League pháº£i dÃ¹ng tiá»n, ráº¥t nhiá»u tiá»n Ä‘á»ƒ quy tá»¥ dÃ n siÃªu HLV nhÆ° mÃ¹a nÃ y.</p>\r\n', 7),
(30, 'KhÃ³a há»c tiáº¿ng HÃ n cho ngÆ°á»i má»›i báº¯t Ä‘áº§u', 'images.jpg', 'Há»c Tiáº¿ng HÃ n vá»›i gv Viá»‡t vÃ  HÃ n, phÆ°Æ¡ng phÃ¡p dáº¡y hiá»‡n Ä‘áº¡i káº¿t há»£p giá»¯a lÃ½ thuyáº¿t vÃ  thá»±c hÃ nh, giÃºp hv cÃ³ thá»ƒ giao tiáº¿p tá»‘t, Ä‘á»§ kháº£ nÄƒng vÆ°á»£t qua ká»³ thi TOPIK 4, 5, 6', '<p>Há»c Tiáº¿ng HÃ n vá»›i gv Viá»‡t vÃ  HÃ n, phÆ°Æ¡ng phÃ¡p dáº¡y hiá»‡n Ä‘áº¡i káº¿t há»£p giá»¯a lÃ½ thuyáº¿t vÃ  thá»±c hÃ nh, giÃºp hv cÃ³ thá»ƒ giao tiáº¿p tá»‘t, Ä‘á»§ kháº£ nÄƒng vÆ°á»£t qua ká»³ thi TOPIK 4, 5, 6.</p>\r\n', 8),
(31, 'KhÃ³a há»c 2', 'táº£i xuá»‘ng (1).jpg', 'Há»c tiáº¿ng PhÃ¡p', '<p>Há»c Tiáº¿ng PhÃ¡p vá»›i GV Viá»‡t vÃ  GV PhÃ¡p, phÆ°Æ¡ng phÃ¡p dáº¡y káº¿t há»£p lÃ½ thuyáº¿t vÃ  thá»±c hÃ nh, giÃºp há»c viÃªn giao tiáº¿p tá»‘t, vá»¯ng ngá»¯ phÃ¡p cho ká»³ thi TCF, DELF A1, A2, B1, B2.</p>\r\n', 8),
(45, 'KhÃ³a há»c 1', 'img_07.jpg', 'Há»c tiáº¿ng Anh', '<p>Tiáº¿ng Anh Online lÃ  trang web giÃºp hÆ¡n 5 triá»‡u ngÆ°á»i há»c tiáº¿ng Anh tá»‘t hÆ¡n má»—i ngÃ y hoÃ n toÃ n miá»…n phÃ­ vá»›i cÃ¡c bÃ i viáº¿t liÃªn tá»¥c Ä‘Æ°á»£c cáº­p nháº­t.</p>\r\n', 8);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `birthday` date NOT NULL,
  `gender` int(1) NOT NULL,
  `level` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `email`, `birthday`, `gender`, `level`) VALUES
(12, 'admin', 'e10adc3949ba59abbe56e057f20f883e', 'admin@gmail.com', '1996-01-01', 1, 1),
(13, 'Nguyen', 'e10adc3949ba59abbe56e057f20f883e', 'nguyen@gmail.com', '1996-06-14', 2, 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`cate_id`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`cm_id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`new_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `cate_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `cm_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `new_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
