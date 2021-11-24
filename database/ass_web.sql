-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 24, 2021 at 09:00 AM
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
-- Database: `ass_web`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(100) NOT NULL,
  `image_name` varchar(255) NOT NULL,
  `featured` varchar(10) NOT NULL,
  `active` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `title`, `image_name`, `featured`, `active`) VALUES
(1, 'Pizza', 'Category_7248.png', 'Yes', 'Yes'),
(2, 'Burger', 'Category_4919.jpg', 'Yes', 'Yes'),
(3, 'Noodle', 'Category_6596.png', 'No', 'Yes'),
(9, 'Rice', 'Category_8347.png', 'Yes', 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `food`
--

CREATE TABLE `food` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `image_name` varchar(255) NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `featured` varchar(10) NOT NULL,
  `active` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `food`
--

INSERT INTO `food` (`id`, `title`, `description`, `price`, `image_name`, `category_id`, `featured`, `active`) VALUES
(1, 'Burger Gà', 'Ngon tuyệt vời', '12.00', 'Food_4494.png', 2, 'Yes', 'Yes'),
(2, 'Pizza Trứng', 'Bổ rẻ', '22.00', 'Food_4859.png', 1, 'Yes', 'Yes'),
(9, 'ttttt', 'jjjjjj', '4.00', 'Food_8375.png', 3, 'Yes', 'Yes'),
(10, 'iiiii', 'oooooo', '77.00', 'Food_1189.png', 2, 'Yes', 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `food_order`
--

CREATE TABLE `food_order` (
  `id` int(10) UNSIGNED NOT NULL,
  `food` varchar(500) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `quantity` int(11) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `order_date` datetime NOT NULL,
  `status` varchar(50) NOT NULL,
  `customer_name` varchar(150) NOT NULL,
  `customer_contact` varchar(20) NOT NULL,
  `customer_email` varchar(150) NOT NULL,
  `customer_address` varchar(255) NOT NULL,
  `note` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `food_order`
--

INSERT INTO `food_order` (`id`, `food`, `price`, `quantity`, `total`, `order_date`, `status`, `customer_name`, `customer_contact`, `customer_email`, `customer_address`, `note`) VALUES
(1, 'test22', '2.00', 3, '6.00', '2021-11-15 02:08:23', 'Delivered', 'Thanh Lương', '0916214675', 'caothanhluong56@gmail.com', '123, Phạm Hồng Thái, khu phố 4, phường Long Hoa, thị xã Hòa Thành, tỉnh Tây Ninh', 'Làm ngon ngon nha'),
(2, 'Burger Gà', '12.00', 2, '24.00', '2021-11-21 02:06:07', 'Delivered', 'alo', '0916214677', 'caothanhluong56@gmail.com', 'ttttt', 'thêm tí đường'),
(3, 'Burger Gà', '12.00', 2, '24.00', '2021-11-22 03:35:30', 'Ordered', 'alo', '0916214677', 'caothanhluong5226@gmail.com', 'tn', 'ww'),
(4, 'Pizza Trứng', '22.00', 10, '220.00', '2021-11-22 03:43:34', 'Delivered', 'Admin', '32323', 'luong.cao2202@hcmut.edu.vn', 'tn', 'nhiều nhiều muối'),
(13, '1) Pizza Trứng; 2) Burger Gà; 3) ttttt; ', '22.00', 1, '90.00', '2021-11-23 03:31:13', 'Ordered', 'alo', '0916214677', 'caothanhluong56@gmail.com', 'wwww', 'thêm tí đường'),
(14, '1) Burger Gà; 2) Pizza Trứng; ', '12.00', 2, '134.00', '2021-11-23 03:37:10', 'Ordered', 'Truong My Y', '0988227018', 'caothanhluong56@gmail.com', 'trường đông', 'thêm thịt'),
(15, '1) Burger Gà(x1); 2) Pizza Trứng(x2); 3) iiiii(x3); ', '111.00', 6, '287.00', '2021-11-24 03:15:57', 'Ordered', 'alo', '0916214677', 'caothanhluong56@gmail.com', 'wwww', 'thêm tí đường'),
(16, '<h6 class=\"font-weight-bold\">1</h6>) Burger Gà(x1); <h6 class=\"font-weight-bold\">2</h6>) Pizza Trứng', '34.00', 3, '56.00', '2021-11-24 03:21:15', 'Ordered', 'alo', '0916214677', 'caothanhluong56@gmail.com', 'uuuuu', 'uuuuu'),
(17, '<span class=\"font-weight-bold\">1) </span>Burger Gà(x1); <span class=\"font-weight-bold\">2) </span>Piz', '38.00', 4, '60.00', '2021-11-24 03:22:38', 'Ordered', 'Thanh Luong', '0916214677', 'caothanhluong56@gmail.com', 'yyyyy', 'đường'),
(18, '<span class=\"font-weight-bold\">1) </span>Burger Gà(x1); <span class=\"font-weight-bold\">2) </span>Piz', '111.00', 5, '210.00', '2021-11-24 03:23:45', 'Ordered', 'Thanh Luong', '0916214677', 'caothanhluong56@gmail.com', 'wwww', 'nhiều nhiều muối'),
(19, '<h6 class=\"font-weight-bold\">1) </h6>Burger Gà(x1); <h6 class=\"font-weight-bold\">2) </h6>Pizza Trứng', '111.00', 5, '210.00', '2021-11-24 03:24:05', 'Ordered', 'alo', '0916214677', 'caothanhluong56@gmail.com', 'ww', 'ww'),
(20, '<span class=\"font-weight-bold\">1) </span>Burger Gà(x1); <span class=\"font-weight-bold\">2) </span>Pizza Trứng(x2); <span class=\"font-weight-bold\">3) </span>iiiii(x2); ', '111.00', 5, '210.00', '2021-11-24 03:25:58', 'Ordered', 'alo', '0916214677', 'caothanhluong56@gmail.com', 'uuuuu', 'uuuuu'),
(21, '<span class=\"font-weight-bold\">1) </span>Burger Gà(x1); <span class=\"font-weight-bold\">2) </span>Pizza Trứng(x5); ', '34.00', 6, '122.00', '2021-11-24 04:25:44', 'Ordered', 'Thanh Luong', '0916214677', 'caothanhluong56@gmail.com', 'Tây Ninh', 'không'),
(22, '<span class=\"font-weight-bold\">1) </span>Burger Gà(x1); <span class=\"font-weight-bold\">2) </span>Pizza Trứng(x5); <span class=\"font-weight-bold\">3) </span>ttttt(x2); ', '38.00', 8, '130.00', '2021-11-24 04:28:58', 'Ordered', 'Admin', '32323', 'caothanhluong5226@gmail.com', 'uuuu', 'uuuu'),
(23, '<span class=\"font-weight-bold\">1) </span>Burger Gà(x10); ', '12.00', 10, '120.00', '2021-11-24 04:34:34', 'Ordered', 'Admin', '0916214677', 'caothanhluong56@gmail.com', 'test', 'test'),
(24, '<span class=\"font-weight-bold\">1) </span>Pizza Trứng(x10); <span class=\"font-weight-bold\">2) </span>Burger Gà(x2); ', '34.00', 12, '408.00', '2021-11-24 04:57:41', 'Delivered', 'Thanh Luong', '0916214677', 'caothanhluong56@gmail.com', 'tây ninh', 'không'),
(25, '<span class=\"font-weight-bold\">1) </span>Burger Gà(x2); <span class=\"font-weight-bold\">2) </span>Pizza Trứng(x5); ', '34.00', 7, '134.00', '2021-11-24 07:39:16', 'Ordered', 'Thanh Luong', '0916214677', 'caothanhluong56@gmail.com', 'ttttt', 'ttttt'),
(26, '<span class=\"font-weight-bold\">1) </span>Burger Gà(x1); <span class=\"font-weight-bold\">2) </span>Pizza Trứng(x2); <span class=\"font-weight-bold\">3) </span>ttttt(x5); <span class=\"font-weight-bold\">4) </span>iiiii(x1); ', '115.00', 9, '153.00', '2021-11-24 08:21:13', 'Ordered', 'alo', '0916214677', 'caothanhluong56@gmail.com', 'sss', 'sss'),
(27, '<span class=\"font-weight-bold\">1) </span>Burger Gà(x5); <span class=\"font-weight-bold\">2) </span>Pizza Trứng(x4); <span class=\"font-weight-bold\">3) </span>ttttt(x14); ', '38.00', 23, '204.00', '2021-11-24 08:50:56', 'Ordered', 'tw', '0916214677', 'caothanhluong56@gmail.com', 'iii', 'iii'),
(28, '<span class=\"font-weight-bold\">1) </span>Burger Gà(x2); <span class=\"font-weight-bold\">2) </span>Pizza Trứng(x2); <span class=\"font-weight-bold\">3) </span>ttttt(x2); <span class=\"font-weight-bold\">4) </span>iiiii(x1); ', '115.00', 7, '153.00', '2021-11-24 08:55:21', 'Ordered', 'Thanh Luong', '0916214677', 'caothanhluong56@gmail.com', 'uuu', 'uuu');

-- --------------------------------------------------------

--
-- Table structure for table `manager`
--

CREATE TABLE `manager` (
  `id` int(10) UNSIGNED NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `manager`
--

INSERT INTO `manager` (`id`, `full_name`, `username`, `password`) VALUES
(2, 'Thanh Luong', 'thanhluong', 'f288bd2c10f6fa568fa813222adf6ed8'),
(3, 'Admin', 'admin', '21232f297a57a5a743894a0e4a801fc3');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `birthday` varchar(50) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `rating` varchar(50) NOT NULL,
  `feedback` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `full_name`, `birthday`, `phone`, `email`, `rating`, `feedback`) VALUES
(1, 'thanhluong', '9c1ad00a16a7c67e2727b471ac969e96', 'Cao Thanh Luong', '22/02/2001', '0916214675', 'caothanhluong56@gmail.com', 'Very Bad', ''),
(2, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Adminnnn', '01/01/2022', '0916214671', 'caothanhluong2222@gmail.com', 'Bad', 'tôi thực sực rất hài lòng với cách làm việc của các bạntôi thực sực rất hài lòng với cách làm việc của các bạntôi thực sực rất hài lòng với cách làm việc của các bạn'),
(7, 'test', '098f6bcd4621d373cade4e832627b4f6', 'test', 'etsttt', '2993232', 'caothanhluong56@gmail.com', '', ''),
(8, 'alo', '1b2ccf52b54ea2c9468ca24fbe164919', 'alo', '01/01/2000', '0916214675', 'caothanhluong56@gmail.com', '', ''),
(9, 'aloalo', 'bc6f0aa94f722407f66281abd0f4027c', 'Thanh Luong', '01/01/2022', '0916214675', 'caothanhluong56@gmail.com', '', ''),
(10, 'myy', '5bbb16ac99f636dfac36a7c644732c88', 'Thanh Luong', '01/01/20222', '0916214675', 'caothanhluong56@gmail.com', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `food`
--
ALTER TABLE `food`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `food_order`
--
ALTER TABLE `food_order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `manager`
--
ALTER TABLE `manager`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `food`
--
ALTER TABLE `food`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `food_order`
--
ALTER TABLE `food_order`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `manager`
--
ALTER TABLE `manager`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
