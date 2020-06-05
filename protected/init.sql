-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 14, 2020 at 09:35 PM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ixwyow`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` char(60) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `admin_index_username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'admin', '$2y$10$pwXHTdymWD.EUz/aXCWoBe4Jc4ugu5qzZpG0Z5j.lLvrRLlJ4jZb6');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

DROP TABLE IF EXISTS `product`;
CREATE TABLE IF NOT EXISTS `product` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `price` int(10) UNSIGNED NOT NULL,
  `stock` int(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `product_name_unique` (`name`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=97 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `name`, `price`, `stock`) VALUES
(82, 'CF541A Lézertoner HP ColorLaserJet Pro MFP M280nw, MFP M281fdn, MFP M281fdw nyomtatókhoz, HP 203A cián, 1,3k', 937834, 59),
(83, 'CF542A Lézertoner HP ColorLaserJet Pro MFP M280nw, MFP M281fdn, MFP M281fdw nyomtatókhoz,  HP 203A, sárga, 1,3k', 252396, 59),
(84, 'CF543A Lézertoner HP ColorLaserJet Pro MFP M280nw, MFP M281fdn, MFP M281fdw nyomtatókhoz, HP 203A, magenta, 1,3k', 162799, 67),
(85, 'CF531A Lézertoner  HP Color Laserjet MFP M181fw nyomtatókhoz, HP 205A, cián, 0,9k', 803073, 5),
(86, 'CF532A Lézertoner  HP Color Laserjet MFP M181fw nyomtatókhoz, HP 205A, sárga, 0,9k', 779855, 37),
(87, 'CF533A Lézertoner  HP Color Laserjet MFP M181fw nyomtatókhoz, HP 205A, magenta, 0,9k', 279554, 100),
(88, 'W2073A Lézertoner Color Laser 150, MFP178, MFP179 nyomtatókhoz, HP 117A, magenta, 0,7k', 775897, 7),
(89, 'W2072A Lézertoner Color Laser 150, MFP178, MFP179 nyomtatókhoz, HP 117A, sárga,  0,7k', 636546, 51),
(90, 'W2071A Lézertoner Color Laser 150, MFP178, MFP179 nyomtatókhoz, HP 117A, cián,  0,7k', 745445, 31),
(91, 'CF540A Lézertoner HP ColorLaserJet Pro MFP M280nw, MFP M281fdn, MFP M281fdw nyomtatókhoz, HP 203A, fekete, 1,4k', 526425, 84),
(92, 'CF530A Lézertoner HP Color Laserjet MFP M181fw nyomtatókhoz, HP 205A, fekete, 1,1k', 900654, 53),
(93, 'CF232A Dobegység Laserjet Pro M203, M227 nyomtatókhoz, HP 32A, fekete, 23k', 328331, 89),
(94, 'W2070A Lézertoner Color Laser 150, MFP178, MFP179 nyomtatókhoz, HP 117A, fekete, 1k', 848343, 44),
(95, 'CLT-C404S lézertoner, TENDER®, cián, 1k', 490359, 91),
(96, 'CLT-M404S lézertoner, TENDER®, magenta, 1k', 238104, 55);

-- --------------------------------------------------------

--
-- Table structure for table `purchase`
--

DROP TABLE IF EXISTS `purchase`;
CREATE TABLE IF NOT EXISTS `purchase` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` int(10) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `purchase_details`
--

DROP TABLE IF EXISTS `purchase_details`;
CREATE TABLE IF NOT EXISTS `purchase_details` (
  `order_id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `amount` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `password` char(60) NOT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) NOT NULL,
  `zipcode` varchar(4) NOT NULL,
  `city` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `user_unique_email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `email`, `password`, `first_name`, `last_name`, `zipcode`, `city`, `address`) VALUES
(4, 'arvai96@gmail.com', '$2y$10$EpCtDrWpCIzT9guqCGj1DudqD8oXDlmS2Onp9TruMSAuuiUzjf2Cm', 'Dániel', 'Árvai', '3300', 'Eger', 'Példa utca 1.');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
