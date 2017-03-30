-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 30, 2017 at 04:54 PM
-- Server version: 5.5.54-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `test`
--

-- --------------------------------------------------------

--
-- Table structure for table `ccataldo_shop_products`
--

CREATE TABLE IF NOT EXISTS `ccataldo_shop_products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(300) DEFAULT NULL,
  `description` text NOT NULL,
  `price` decimal(10,2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `ccataldo_shop_products`
--

INSERT INTO `ccataldo_shop_products` (`id`, `name`, `description`, `price`) VALUES
(1, 'Gucci sunglasses', '<ul>\r\n<li> Round lenses are fashion forward without being distracting - will suit many face shapes.<br />\r\n\r\n<li> Unique for their delicate detailing, like the thin rounded temples.<br />\r\n\r\n<li> Logo etched into a metallic section of temple, nearest end points.<br />\r\n\r\n<li> Full rim frame made of lustrous, hypoallergenic Acetate.<br />\r\n\r\n<li> Spring hinges make a this frame more comfortable and resilient, helping hold the initial balance and adjustment.<br />\r\n</ul>', '150.00'),
(2, 'Seiko watch', '<ul>\r\n<li> Stainless steel case with a stainless steel bracelet.<br /> \r\n<li> Day and date display at the 3 o''clock position.<br /> \r\n<li> Automatic movement.<br /> \r\n<li> Case diameter: 41mm. Case thickness: 13 mm.<br /> \r\n<li> Water resistant at 200 meters / 660 feet.<br /> \r\n<li> AdditionalInfo: bilingual calendar; date displays at 3 o''clock position.<br />\r\n</ul> ', '120.00'),
(3, 'Lewis jeans', 'Lewis jeans 501 original', '70.00'),
(4, 'Diesel jeans', 'Diesel jeans "cool fit"', '85.00'),
(5, 'No brand t-shirt', 'T-shirt no brand', '15.00'),
(6, 'Lumberjack shoes', 'Lumberjack shoes man "winter"', '120.00'),
(7, 'No brand hat', 'Hat no brand "summer"', '20.00'),
(8, 'H&M socks', 'H%M socks, "winter-long"', '10.00'),
(9, 'Armani shirt', 'Armani shirt "classic"', '60.00'),
(10, 'Hugo belt', 'Hugo Boss belt "classic"', '30.00');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
