-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 23, 2025 at 07:19 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `book_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `book_form`
--

CREATE TABLE `book_form` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `guests` int(11) DEFAULT NULL,
  `arrivals` date DEFAULT NULL,
  `leaving` date DEFAULT NULL,
  `payment_screenshot` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `book_form`
--

INSERT INTO `book_form` (`id`, `name`, `email`, `phone`, `address`, `location`, `guests`, `arrivals`, `leaving`, `payment_screenshot`) VALUES
(74, 'nanda', 'nandacumaars@gmail.com', '6384569404', 'mudalayarpet', 'bangalore', 1, '2024-07-05', '2024-07-06', 'uploads/q1.png'),
(75, 'rian', 'sakthrian.tpy@gmail.com', '9486415823', 'No.7,middle street,pudupet,lawspet post,puducherry 8.', 'bangalore', 2, '2024-07-05', '2024-07-07', 'uploads/q1ans.png'),
(76, 'rian', 'sakthrian.tpy@gmail.com', '9876543210', 'No.7,middle street,pudupet,lawspet post,puducherry 8.', 'kerala', 4, '2024-07-11', '2024-07-14', 'uploads/q1.png');

-- --------------------------------------------------------

--
-- Table structure for table `packages`
--

CREATE TABLE `packages` (
  `id` int(11) NOT NULL,
  `package_name` varchar(200) DEFAULT NULL,
  `image` varchar(200) DEFAULT NULL,
  `description` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `packages`
--

INSERT INTO `packages` (`id`, `package_name`, `image`, `description`) VALUES
(1, 'coimbatore', 'coimbatore1.jpg', 'Coimbatore is the third largest city of the state, one of the most industrialized cities in Tamil Nadu'),
(2, 'kerala', 'coimbatore2.jpg', 'Kerala is a picturesque state on the southwestern coast of India, known for its lush landscapes, serene backwaters ...'),
(5, 'Bangalore', 'coimbatore3.jpg', 'Bangalore, the capital city of Karnataka, is India\'s tech hub known for its vibrant IT industry, pleasant climate.'),
(6, 'Ooty', 'coimbatore4.jpg', 'Ooty, often called the \"Queen of Hill Stations,\" offers breathtaking views, serene landscapes, and a cool climate.'),
(7, 'Kodaikanal', 'coimbatore5.webp', 'Kodaikanal, often referred to as the \"Princess of Hill Stations,\" offers breathtaking views, and a cool climate.'),
(8, 'Shimla', 'coimbatore6.jpg', 'Shimla, the winter capital of Himachal Pradesh, offers stunning mountain views, lush green valleys, and cool climate.'),
(9, 'Kashmir', 'coimbatore7.webp', 'Kashmir, often called \"Paradise on Earth,\" is renowned for its picturesque valleys, serene lakes, and vibrant gardens.'),
(10, 'Delhi', 'coimbatore8.webp', 'Delhi, the capital of India, is a vibrant metropolis known for its rich history, diverse culture, and bustling markets'),
(11, 'Munar', 'coimbatore9.jpg', 'Munnar, a picturesque hill station in Kerala, is known for its expansive tea estates, scenic vistas, and pleasant weather.'),
(12, 'Goa', 'coimbatore10.jpg', 'Goa, a coastal paradise in India, is famous for its beautiful beaches, lively nightlife, and rich Portuguese heritage.'),
(13, 'Manali', 'manali.jpg', 'Manali, a popular hill station in Himachal Pradesh, offers breathtaking views, lush valleys, and for adventure sports.'),
(14, 'Mumbai', 'coimbatore11.jpg', 'Mumbai, India’s financial capital, is known for its bustling streets, and iconic landmarks like the Gateway of India.');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `Id` int(11) NOT NULL,
  `Username` varchar(200) DEFAULT NULL,
  `Email` varchar(200) DEFAULT NULL,
  `Age` int(11) DEFAULT NULL,
  `Password` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`Id`, `Username`, `Email`, `Age`, `Password`) VALUES

(6, 'rian', 'sakthrian.tpy@gmail.com', 21, '$2y$10$NC0.m3rHaiGZViP8MobuDOQhUkoNrGCF8O96qHDruGEP8dLkKFH3i');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `book_form`
--
ALTER TABLE `book_form`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `packages`
--
ALTER TABLE `packages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `book_form`
--
ALTER TABLE `book_form`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT for table `packages`
--
ALTER TABLE `packages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
