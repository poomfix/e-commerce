-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 30, 2025 at 09:48 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `it47`
--

-- --------------------------------------------------------

--
-- Table structure for table `deparment`
--

CREATE TABLE `deparment` (
  `id` text NOT NULL,
  `depart_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `deparment`
--

INSERT INTO `deparment` (`id`, `depart_name`) VALUES
('', 'เทคโนโลยีสารสนเทส'),
('', 'เทคโนโลยีสารสนเทส'),
('', 'เทคโนโลยีสารสนเทส');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `food_imag` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `product_name`, `description`, `price`, `created_at`, `food_imag`) VALUES
(1, 'ข้าวผัด', 'ข้าวผัดกับไข่และผักรวม', 120.00, '2025-06-25 06:23:07', 'ImageBanner_1140x507_RT1356.jpg'),
(2, 'ผัดไทย', 'ผัดไทยเส้นจันท์พร้อมกุ้งสดและถั่วงอก', 60.00, '2025-06-25 06:23:07', 'ผัดไทย.jpg'),
(3, 'ต้มยำกุ้ง', 'ต้มยำกุ้งรสจัดจ้านด้วยสมุนไพรสด', 120.00, '2025-06-25 06:23:07', '3.jpg'),
(4, 'ส้มตำ', 'ส้มตำไทยรสเผ็ดพร้อมข้าวเหนียว', 40.00, '2025-06-25 06:23:07', '4.jpg'),
(5, 'แกงเขียวหวานไก่', 'แกงเขียวหวานรสเผ็ดทานคู่ข้าวสวย', 80.00, '2025-06-25 06:23:07', 'แกงเขียวหวานไก่.jpg'),
(6, 'หมูสะเต๊ะ', 'หมูสะเต๊ะเสียบไม้ย่างราดซอสถั่ว', 70.00, '2025-06-25 06:23:07', '5.jpg'),
(7, 'ขนมจีนนํ้ายา', 'ขนมจีนเส้นสดกับนํ้ายาปลาราด', 50.00, '2025-06-25 06:23:07', 'ขนมจีย.jpg'),
(8, 'ผัดซีอิ๊ว', 'ผัดซีอิ๊วเส้นใหญ่พร้อมเนื้อสัตว์ตามชอบ', 60.00, '2025-06-25 06:23:07', 'ผัดซีอิ๊ว.jpg'),
(14, 'ชาเขียว', 'ชาเขียว', 65.00, '2025-07-16 07:39:25', 'ชาเขียว.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(20) DEFAULT NULL,
  `last_name` varchar(20) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `creat_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `role` enum('admin','customer') NOT NULL DEFAULT 'customer',
  `profile_image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `address`, `phone`, `email`, `password`, `creat_at`, `role`, `profile_image`) VALUES
(42, 'poom', 'chunking', '', '0653676196', 'nan@gmail.com', '$2y$10$3q0hF8YPnqRvdZr.eKvbo.k6k0fSHvk/AD94eF6cQl3YGYFCrtV2i', '2025-07-14 07:33:20', 'admin', 'wallhaven-5ge715.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
