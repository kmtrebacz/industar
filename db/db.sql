-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 15, 2023 at 07:41 PM
-- Server version: 8.0.31
-- PHP Version: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `self-checkout-php`
--

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `id` int NOT NULL,
  `name` varchar(6) DEFAULT NULL,
  `price` decimal(3,2) DEFAULT NULL,
  `img_src` varchar(10) DEFAULT NULL,
  `id_category` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `img_src`, `id_category`) VALUES
(1, 'test_1', '3.20', '', 1),
(2, 'test_2', '4.20', '', 1),
(3, 'test_3', '3.70', '', 1),
(4, 'test_4', '5.00', '', 1),
(5, 'test_5', '3.00', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `products_category`
--

DROP TABLE IF EXISTS `products_category`;
CREATE TABLE IF NOT EXISTS `products_category` (
  `id` int NOT NULL,
  `name` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `products_category`
--

INSERT INTO `products_category` (`id`, `name`) VALUES
(1, 'category_1'),
(2, 'category_2');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
