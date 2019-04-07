-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 07, 2019 at 10:01 PM
-- Server version: 5.7.24-0ubuntu0.18.04.1
-- PHP Version: 7.2.15-0ubuntu0.18.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecom`
--

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `prod_code` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `image` text NOT NULL,
  `category` varchar(255) NOT NULL,
  `price` double UNSIGNED NOT NULL,
  `added_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `prod_code`, `title`, `description`, `image`, `category`, `price`, `added_on`) VALUES
(2, 'J4', 'Samsung Galaxy J4 core 6.0 1GB 16GB', 'Product details of Samsung Galaxy J4 core 6.0 1GB 16GB\r\n\r\n    1.3 GHz QuadCore.\r\n    1 GB RAM.\r\n    16 GB Storage.\r\n    6.0\" (15.24 cm) Display.\r\n    3300 mAh Battery.\r\n    8 MP Rear Camera.\r\n    5 MP Front Camera.\r\n    VoLTE, Dual SIM.\r\n\r\n    1.3 GHz QuadCore.\r\n    1 GB RAM.\r\n    16 GB Storage.\r\n    6.0\" (15.24 cm) Display.\r\n    3300 mAh Battery.\r\n    8 MP Rear Camera.\r\n    5 MP Front Camera.\r\n    VoLTE, Dual SIM.\r\n\r\nSpecifications of Samsung Galaxy J4 core 6.0 1GB 16GB\r\n\r\n    Brand SAMSUNG.\r\n    SKU 103298025_PK-1249330578\r\n    Model Samsung Galaxy J4 core 6.0 1GB 16GB\r\n\r\nWhat’s in the boxcharger, hands free, phone', 'https://static-01.daraz.pk/p/97c35056441532d75bd76d924a2d67c1.jpg_340x340q80.jpg', 'Mobiles', 17479, '2019-04-06 17:27:19'),
(3, 'MQD32LL/A', 'Macbook Air 13-2017 MQD32LL/A', '    1.8 GHz Intel Core i5 Dual-Core\r\n    8GB of 1600 MHz LPDDR3 RAM 256GB SSD\r\n    Integrated Intel HD Graphics 6000\r\n    13.3\" 1440 x 900 Glossy Display\r\n    802.11ac Wi-Fi Bluetooth 4.0\r\n    Thunderbolt 2 USB 3.0\r\n    720p FaceTime HD Camera SDXC Card Slot\r\n    Stereo Speakers Dual Built-In Mics\r\n    Slim, Lightweight Design\r\n    macOS High Sierra\r\n\r\nMacbook Air 13-2017 MQD32LL/AFeaturing a thin and lightweight design, the silver mid 2017Apple 13.3\" MacBook Airfeatures a unibody aluminum enclosure that weighs less than 3 pounds. At its thickest point, the computer is only 0.68\" -- it tapers down to 0.11\" at its thinnest.\r\nAt 13.3\" in size, the 16:10 display features a screen resolution of 1440 x 900. It features a glossy finish and LED backlight technology for enhanced image quality and energy efficiency.\r\nThe MacBook Air is powered by an Intel Core i5 dual-core processor. This ultra-efficient architecture was designed to use less power and still deliver high performance. Which means not only can you do whatever you want - you can keep doing it for longer than before. In addition, the integrated Intel HD Graphics 6000 offers advanced performance you\'ll especially notice with games and other graphics-intensive tasks.\r\n', 'https://cnet2.cbsistatic.com/img/8_Y10cc5o9uvJzFX6hWPjDRR_rc=/830x467/2015/05/06/1503bb41-3bf4-412a-8e7a-a94c084b140d/apple-macbook-air-2015-02.jpg', 'Laptops', 165000, '2019-04-06 17:34:29'),
(4, 'X7', 'Rechargeable Wireless X7 LED Backlit Optical Ergonomic USB Gaming Mouse Black RF', '\r\n\r\nWe strive for our customer satisfaction at best possible. If you have any questions, please feel free to email our service specialists 24 Hours a Day, 7 Days a week. We will reply you ASAP. If no response within 24 Hours, please check the spam in your mail box.\r\n\r\nWe greatly appreciate your POSITIVE feedback. Please do NOT leave negative feedback without asking for help. Our aim is to provide Top Level Customer Service, normally so we will try our best to solve any problem you have.\r\n\r\nPlease DON\'T leave negative or neutral feedback if you haven\'t received item in 30 days, because we have mentioned the shipping time repeatedly.\r\n', 'https://i.ebayimg.com/images/g/RjsAAOSw2sxcLHPQ/s-l64.jpg', 'Mouses', 6500, '2019-04-06 17:37:35'),
(5, 'LED', 'Dell LED LCD Gaming Monitor 23.6\" - 16:9 - 2 ms - 1920 x 1080', 'Super-fast for a smooth and responsive gameplay.\r\n\r\n    Virtually lag-free with a fast response time\r\n    Dual HDMI ports for convenient switching between PC and gaming console\r\n    Play more: next business day shipping on replacement monitors minimizes your downtime and keeps you in the game', 'https://images.antonline.com/images/300/1032982813.jpg', 'Monitors', 12800, '2019-04-06 17:39:46'),
(6, 'VTG 90s', 'VTG 90s BAUHAUS - Peter Murphy goth band music blue eyes concert tour REPRINT', 'Product Details :\r\nOur great t-shirt is made of 100% preshrunk cotton high-quality and heavyweight. Standard Gildan.\r\nOur t-shirt will be printed using high performance digital printing technology in full color with durable photo quality reproduction.\r\n6.1 oz. 100% Heavyweight Cotton, Standard Fit, High Quality\r\nVery Comfortable and Looks Great with a pair of Jeans\r\nNever worn, brand new and factory sealed!\r\nSealed in plastic wrap.\r\n', 'https://i.ebayimg.com/images/g/9lMAAOSwuHdck4Q4/s-l64.jpg', 'Shirts', 1300, '2019-04-06 17:42:53');

-- --------------------------------------------------------

--
-- Table structure for table `product_properties`
--

CREATE TABLE `product_properties` (
  `prod_id` int(11) NOT NULL,
  `property` varchar(255) NOT NULL,
  `value` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `prod_code` (`prod_code`);

--
-- Indexes for table `product_properties`
--
ALTER TABLE `product_properties`
  ADD PRIMARY KEY (`prod_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `product_properties`
--
ALTER TABLE `product_properties`
  MODIFY `prod_id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
