-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 08, 2023 at 06:00 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `product_management`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `category` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category`) VALUES
(1, 'TV'),
(2, 'Washing Machine'),
(3, 'Air Conditioner'),
(4, 'Fan'),
(5, 'Refrigerator'),
(6, 'Cooker');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `product_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `id_category` int(11) NOT NULL,
  `image` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `product_name`, `id_category`, `image`) VALUES
(1, 'Android Tivi Casper 4K 50 inch 50UG6100 ', 1, 'pic1.jpg'),
(2, 'Máy giặt LG Inverter 10.5 kg FV1450S3W2', 2, 'pic2.jpg'),
(3, 'LG Inverter 11.5 Kg T2351VSAB', 2, 'pic3.jpg'),
(4, 'Panasonic Inverter 1 HP CU/CS-PU9XKH-8M', 3, 'pic4.jpg'),
(5, 'Panasonic Inverter 10.5 Kg NA-FD10AR1BV', 2, 'pic5.jpg'),
(6, 'Toshiba 9 Kg AW-K1005FV(SG)', 2, 'pic6.jpg'),
(7, 'Aqua Inverter 8 Kg AQD-A800F W', 2, 'pic7.jpg'),
(8, 'Samsung Inverter 1.5 HP AR13TYHYCWKNSV', 3, 'pic8.jpg'),
(9, 'Sharp Inverter 1 HP AH-X9XEW', 3, 'pic9.jpg'),
(10, 'Daikin Inverter 1 HP FTKA25VMVMV', 3, 'pic10.jpg'),
(11, 'Midea Inverter 1 HP MSAFA-10CRDN8', 3, 'pic11.jpg'),
(12, 'Sony Google TV KD-55X75K', 1, 'pic12.jpg'),
(13, 'LG Smart TV NanoCell 55NANO75TPA', 1, 'pic13.jpeg'),
(14, 'Casper Android TV 50UG6100', 1, 'pic14.jpg'),
(15, 'Samsung Smart TV Crystal UHD UA65AU8100', 1, 'pic15.jpeg'),
(16, 'Quạt lửng Senko L1638 47W', 4, 'pic16.jpg'),
(17, 'Quạt lửng Senko LTS1636 65W', 4, 'pic17.jpg'),
(18, 'LG Inverter 374 lít GN-D372BLA', 5, 'pic18.jpg'),
(19, 'Samsung Inverter 236 lít RT22M4032BY/SV', 5, 'pic19.jpg'),
(20, 'Aqua 130 lít AQR-T150FA(BS)', 5, 'pic20.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `test` (`id_category`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `test` FOREIGN KEY (`id_category`) REFERENCES `categories` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
