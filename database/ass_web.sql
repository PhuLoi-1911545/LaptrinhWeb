-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 28, 2021 at 03:05 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.3.31

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
(1, 'Pizza', 'Category_1139.jpg', 'Yes', 'Yes'),
(2, 'Burger', 'Category_8858.jpg', 'Yes', 'Yes'),
(12, 'Salad', 'Category_6737.jpg', 'Yes', 'Yes'),
(13, 'Meat', 'Category_3494.jpg', 'Yes', 'Yes'),
(17, 'Drink', 'Category_5552.jpg', 'No', 'Yes'),
(18, 'Dessert', 'Category_7622.jfif', 'No', 'Yes');

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
(1, 'Cheese Pizza', 'Pizza Viền Phô Mai 2 Loại Nhân Phủ cùng xốt Cà Chua và phô Mai Mozzarella', '12.00', 'Food_5172.jpg', 1, 'Yes', 'Yes'),
(2, 'Veggie Pizza', 'Thanh nhẹ với ô liu đen tuyệt hảo, cà chua bi tươi ngon, nấm, thơm, bắp, hành và phô mai Mozzarella cho bạn bữa tiệc rau củ tròn vị​', '14.00', 'Food_6039.jpg', 1, 'No', 'Yes'),
(9, 'Meat Pizza', 'Thơm ngon và giàu protein với thịt xông khói, xúc xích, thịt bò, giăm bông và pepperoni', '15.00', 'Food_1613.jpg', 1, 'No', 'Yes'),
(10, 'Bacon King Burger', 'Bacon King Burger gồm hai miếng thịt bò nướng lửa mặn cùng thịt xông khói cắt dày, pho mát Mỹ nấu chảy và phủ trên một lớp tương cà và sốt mayonnaise kem.', '14.00', 'Food_6155.jpg', 2, 'No', 'Yes'),
(11, 'Cheese Burger', 'Triple Cheese Whopper Burger gồm ba miếng thịt bò nướng lửa thơm ngon, phủ pho mát Mỹ tan chảy, cà chua ngon ngọt, rau diếp tươi, sốt mayonnaise kem, tương cà, dưa chua giòn và hành tây trắng thái lát', '15.00', 'Food_8399.jpg', 2, 'Yes', 'Yes'),
(12, 'Chicken Cheese Burger', 'Chicken Cheese Burger gồm một lát gà chiên giòn, phô mát Thụy Sỹ, thịt xông khói và sốt kem trứng', '15.00', 'Food_2963.jpg', 2, 'No', 'Yes'),
(13, 'Italian Salad', 'Với công thức dầu giấm đặc biệt, thơm dịu nhẹ và giàu hương vị, các loại nguyên liệu khác nhau trong salad Italian được hoà trộn một cách hài hoà, lan toả.', '11.00', 'Food_3547.jpg', 12, 'Yes', 'Yes'),
(15, 'Niçoise Salad', 'Niçoise Salad - Cá Ngừ Ngâm Dầu\r\nNhóm: salad truyền thống\r\nĐến từ miền Nam nước Pháp, salad Niçoise kết hợp rau quả tươi ngon cùng các loại nguyên liệu khác để tạo nên sự cân bằng giữa vitamin và protein.', '12.00', 'Food_8544.jpg', 12, 'No', 'Yes'),
(17, 'Caesar Salad', 'Vị cá mặn đặc trưng, bánh mì giòn rụm, phô mai thơm mềm, tất cả kết hợp hài hoà trong món salad Caesar đã nổi tiếng từ lâu.', '12.00', 'Food_7474.jpg', 12, 'No', 'Yes'),
(18, 'Monte Steak', 'Monte là dòng thịt bò cao cấp có nguồn gốc độc quyền của The Meat & Wine được nướng đến mức hoàn hảo ', '14.00', 'Food_6471.jpg', 13, 'Yes', 'Yes'),
(19, 'Lamb Rib Steak', 'Sườn cừu đến từ Bắc Âu được nấu theo công thức người Viking', '14.00', 'Food_5706.jpg', 13, 'No', 'Yes'),
(20, 'Chocolate Cheesecake', 'Bánh pho mát nướng với nhân kem sô cô la và lớp vỏ bơ.', '8.00', 'Food_5165.jpeg', 18, 'Yes', 'Yes'),
(21, 'Molten Chocolate Cake', 'Bánh sô cô la với phần trên là sô cô la nóng chảy, phủ kem vani ở giữa và lớp bánh so cô la ở dưới', '8.00', 'Food_4554.jpg', 18, 'No', 'Yes'),
(22, 'Creme Brulee', 'Bánh Creme Brulee với lớp đường đường ngào nâu màu cánh gián và nhân kem phô mai cùng quả dâu tằm', '9.00', 'Food_9791.jpg', 18, 'No', 'Yes'),
(23, 'Origin Boba', 'Trà sữa truyền thống với đường đen và trân châu từ Hồng Kông', '6.00', 'Food_6157.jpg', 1, 'Yes', 'Yes'),
(24, 'Caramel Macchiato', 'Macchiato Caramel với hương vị ngọt nhẹ thanh thoát cùng lớp bọt sữa béo nhẹ', '7.00', 'Food_7725.jpg', 17, 'No', 'Yes'),
(25, 'Cappuccino', 'Cappuccino của chúng tôi bắt đầu với cà phê espresso, sau đó thêm một lượng tương đương giữa sữa tươi và bọt sữa cho thật hấp dẫn.', '6.00', 'Food_3931.jpg', 17, 'No', 'Yes');

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
(13, '<span class=\"font-weight-bold\">1) </span>Monte Steak(x1); <span class=\"font-weight-bold\">2) </span>Italian Salad(x2); ', '25.00', 3, '75.00', '2021-11-28 14:54:11', 'Delivered', 'Bach Khoa', '123456', 'bachkhoa@yahoo.com', '268 Ly THuong Kiet', 'salad khong co rau'),
(14, '<span class=\"font-weight-bold\">1) </span>Triple Cheese Whopper Burger(x1); ', '15.00', 1, '15.00', '2021-11-28 15:04:31', 'Delivered', 'loi', '', '', '', ''),
(15, '<span class=\"font-weight-bold\">1) </span>Triple Cheese Whopper Burger(x4); <span class=\"font-weight-bold\">2) </span>Cheese Pizza(x5); ', '27.00', 9, '243.00', '2021-11-28 17:09:33', 'Delivered', 'Luong Huu Phu Loi', '1911545', 'loi.luonglucasia@hcmut.edu.vn', '268 Ly thuong Kkiet', ''),
(16, '<span class=\"font-weight-bold\">1) </span>Italian Salad(x4); ', '11.00', 4, '44.00', '2021-11-28 17:15:03', 'On Delivery', 'Bach Khoa', '1911545', 'bachkhoa@hcmut.edu.vn', '', 'salad khong co rau'),
(17, '<span class=\"font-weight-bold\">1) </span>Triple Cheese Whopper Burger(x5); ', '15.00', 5, '75.00', '2021-11-28 17:15:29', 'Ordered', 'test guest', '123456', 'guest@yahoo.com', '', ''),
(18, '<span class=\"font-weight-bold\">1) </span>Monte Steak(x1); <span class=\"font-weight-bold\">2) </span>Italian Salad(x1); ', '25.00', 2, '25.00', '2021-11-28 20:29:53', 'Ordered', 'Luong', '123456', 'testing@yahoo.com', '1665654', '565465459'),
(19, '<span class=\"font-weight-bold\">1) </span>Chocolate New York Cheesecake(x1); ', '8.00', 1, '8.00', '2021-11-28 20:31:39', 'Ordered', 'Viet', '111111', 'prnhub@hub.com', '', '');

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
(3, 'Admin', 'admin', '21232f297a57a5a743894a0e4a801fc3'),
(20, 'Phu Loi', 'loi', '84ab36b2995bb3949db34038a2b24c64'),
(21, 'Luong', 'luong', 'cd67e095aa87a04d2bfb63a3b8f24309'),
(22, 'Viet', 'viet', 'a4e614247683e150b2b9812a8fa33a71'),
(23, 'Trung', 'trung', 'c2d8730c4cdd662573b0214a0183bf98');

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
(13, 'phuloi', '2e348a4f3b4335587ba2b181ee7b621b', 'Loi_guest', '03/05/2001', '1911545', 'loi.luonglucasia@hcmut.edu.vn', '', ''),
(14, 'quangtrung', '19b0daf21b03f1eca638a683aab20200', 'Quang Trung', '6/9/2001', '1912330', 'trung.vu1912330@hcmut.edu.vn', 'Good', 'Cần phục vụ nhanh hơn'),
(15, 'thanhluong', 'f288bd2c10f6fa568fa813222adf6ed8', 'Thang Luong', '1/1/2001', '914076', 'luong.cao2202@hcmut.edu.vn', '', ''),
(16, 'vanviet', '080b6971159e2a47e8d0105719a9820e', 'Van Viet', '1/2/2001', '1912436', 'vanviet@hcmut.edu.vn', '', '');

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `food`
--
ALTER TABLE `food`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `food_order`
--
ALTER TABLE `food_order`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `manager`
--
ALTER TABLE `manager`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
