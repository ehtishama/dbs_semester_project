-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 07, 2019 at 07:31 AM
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

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `username`, `first_name`, `last_name`, `password`) VALUES
(1, 'username', 'Ehtisham', 'Hassan', '123456789'),
(2, 'asim', 'Muhammad', 'Asim', 'abcdefghi'),
(3, 'shahzaib', 'Shahzaib', '', 'xyzxyzxyx'),
(4, 'sakib', 'Sakib', 'Faraz', 'abcdefgh');

-- --------------------------------------------------------

--
-- Table structure for table `ordered_products`
--

CREATE TABLE `ordered_products` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `prod_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `discount` decimal(10,0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `charges` decimal(10,0) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `customer_id`, `charges`, `created_at`, `updated_at`) VALUES
(1, 4, '2500', '2019-05-04 15:57:34', '2019-05-04 15:57:34');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `image` text NOT NULL,
  `category` int(11) NOT NULL,
  `price` double UNSIGNED NOT NULL,
  `added_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `title`, `description`, `image`, `category`, `price`, `added_on`) VALUES
(2, 'Samsung Galaxy J4', 'Product details of Samsung Galaxy J4 core 6.0 1GB 16GB\r\n\r\n    1.3 GHz QuadCore.\r\n    1 GB RAM.\r\n    16 GB Storage.\r\n    6.0\" (15.24 cm) Display.\r\n    3300 mAh Battery.\r\n    8 MP Rear Camera.\r\n    5 MP Front Camera.\r\n    VoLTE, Dual SIM.\r\n\r\n    1.3 GHz QuadCore.\r\n    1 GB RAM.\r\n    16 GB Storage.\r\n    6.0\" (15.24 cm) Display.\r\n    3300 mAh Battery.\r\n    8 MP Rear Camera.\r\n    5 MP Front Camera.\r\n    VoLTE, Dual SIM.\r\n\r\nSpecifications of Samsung Galaxy J4 core 6.0 1GB 16GB\r\n\r\n    Brand SAMSUNG.\r\n    SKU 103298025_PK-1249330578\r\n    Model Samsung Galaxy J4 core 6.0 1GB 16GB\r\n\r\nWhat’s in the boxcharger, hands free, phone', 'https://i.imgur.com/kqJCLJ6.jpg', 1, 17479, '2019-04-06 17:27:19'),
(3, 'Macbook Air 13', '    1.8 GHz Intel Core i5 Dual-Core\r\n    8GB of 1600 MHz LPDDR3 RAM 256GB SSD\r\n    Integrated Intel HD Graphics 6000\r\n    13.3\" 1440 x 900 Glossy Display\r\n    802.11ac Wi-Fi Bluetooth 4.0\r\n    Thunderbolt 2 USB 3.0\r\n    720p FaceTime HD Camera SDXC Card Slot\r\n    Stereo Speakers Dual Built-In Mics\r\n    Slim, Lightweight Design\r\n    macOS High Sierra\r\n\r\nMacbook Air 13-2017 MQD32LL/AFeaturing a thin and lightweight design, the silver mid 2017Apple 13.3\" MacBook Airfeatures a unibody aluminum enclosure that weighs less than 3 pounds. At its thickest point, the computer is only 0.68\" -- it tapers down to 0.11\" at its thinnest.\r\nAt 13.3\" in size, the 16:10 display features a screen resolution of 1440 x 900. It features a glossy finish and LED backlight technology for enhanced image quality and energy efficiency.\r\nThe MacBook Air is powered by an Intel Core i5 dual-core processor. This ultra-efficient architecture was designed to use less power and still deliver high performance. Which means not only can you do whatever you want - you can keep doing it for longer than before. In addition, the integrated Intel HD Graphics 6000 offers advanced performance you\'ll especially notice with games and other graphics-intensive tasks.\r\n', 'https://i.imgur.com/xqRE2Id.jpg', 1, 165000, '2019-04-06 17:34:29'),
(4, 'Wireless X7 LED ', '\r\n\r\nWe strive for our customer satisfaction at best possible. If you have any questions, please feel free to email our service specialists 24 Hours a Day, 7 Days a week. We will reply you ASAP. If no response within 24 Hours, please check the spam in your mail box.\r\n\r\nWe greatly appreciate your POSITIVE feedback. Please do NOT leave negative feedback without asking for help. Our aim is to provide Top Level Customer Service, normally so we will try our best to solve any problem you have.\r\n\r\nPlease DON\'T leave negative or neutral feedback if you haven\'t received item in 30 days, because we have mentioned the shipping time repeatedly.\r\n', 'https://i.imgur.com/7wfiyXK.jpg', 1, 6500, '2019-04-06 17:37:35'),
(5, 'Dell LED LCD', 'Super-fast for a smooth and responsive gameplay.\r\n\r\n    Virtually lag-free with a fast response time\r\n    Dual HDMI ports for convenient switching between PC and gaming console\r\n    Play more: next business day shipping on replacement monitors minimizes your downtime and keeps you in the game', 'https://i.imgur.com/SCJ0taN.jpg', 1, 12800, '2019-04-06 17:39:46'),
(6, 'VTG 90s BAUHAUS', 'Product Details :\r\nOur great t-shirt is made of 100% preshrunk cotton high-quality and heavyweight. Standard Gildan.\r\nOur t-shirt will be printed using high performance digital printing technology in full color with durable photo quality reproduction.\r\n6.1 oz. 100% Heavyweight Cotton, Standard Fit, High Quality\r\nVery Comfortable and Looks Great with a pair of Jeans\r\nNever worn, brand new and factory sealed!\r\nSealed in plastic wrap.\r\n', 'https://i.imgur.com/Jhxr5av.jpg', 1, 1300, '2019-04-06 17:42:53'),
(7, 'Luminox Navy Seal Watch', 'Luminox Navy Seal Colormark Quartz Men\'s Watch - XS.3059.L\r\n\r\nLuminox Navy Seal Colormark Quartz Men’s Watch with 44mm Reinforced Carbon Black Composite Case. Features Hours, Minutes, Center Seconds, Date at 3 O’clock Position, Uni-Directional Rotating Bezel, Mineral Crystal, a Solid Case Back, and Luminous Hands and Hour Markers. Ships with Luminox Box and Papers. Includes 2 Year ShopWorn Warranty.', 'https://www.shopworn.com/wp-content/uploads/2018/10/XS.3059.L_a.jpg', 2, 1650, '2019-04-20 11:26:53'),
(9, 'Military Leather Waterproof', 'New with tags: A brand-new, unused, unopened, undamaged item in its original packaging (where packaging is applicable). Packaging should be the same as what is found in a retail store, unless the item is handmade or was packaged by the manufacturer in non-retail packaging, such as an unprinted box or plastic bag. See the seller\'s listing for full details', 'https://i.ebayimg.com/images/g/wjsAAOSwU8hY5bdw/s-l500.jpg', 2, 600, '2019-04-20 11:30:31'),
(10, 'New Cool Waterproof Mens Watch', 'New with tags: A brand-new, unused, unopened, undamaged item in its original packaging (where packaging is applicable). Packaging should be the same as what is found in a retail store, unless the item is handmade or was packaged by the manufacturer in non-retail packaging, such as an unprinted box or plastic bag. See the seller\'s listing for full details', 'https://i.ebayimg.com/images/g/yP0AAOSw9mFWNDDX/s-l500.jpg', 2, 900, '2019-04-20 11:31:56'),
(11, 'FIFA 18 PS3 Digital', 'ES- Edición europea, multiregión (puede ser descargado y jugado en cualquier ps3 de cualquier región/zona sin ninguna restricción)\r\nENG- European edition, multiregion (can be downloaded and played at any ps3 of any region/area without any restrictions.\r\nITA- Edizione europea, multiregione (può essere scaricato e riprodotto su qualsiasi ps3 di qualsiasi regione/area senza  restrizioni)\r\nFRA- Édition européenne, multirégion (peut être téléchargé et lu sur n’importe quelle ps3 de n’importe quelle région/région sans aucune restriction)\r\nGER- Europäische Ausgabe, Multiregion (kann auf jeder ps3 beliebiger Region/Region ohne Einschränkungen heruntergeladen und gelesen werden)', 'https://i.ebayimg.com/images/g/IisAAOSw6FNcZk1f/s-l500.jpg', 7, 2598, '2019-04-20 11:36:25'),
(12, 'Battlefield 4 PREMIUM [Origin game] ', 'EA DICE\'s military shooter series returns with all the explosive first-person action, vehicular combat, dynamic and destructible environments, and multiplayer modes gamers expect in Battlefield 4. Set in 2020, when America\'s implication in the assassination of a potential Chinese leader leads to extreme tensions between the U.S., China, and Russia, the single-player campaign puts gamers in charge of Sgt. Daniel Recker and his group of special operatives as they battle through Shanghai, Azerbaijan, and across a listing aircraft carrier in an attempt to prevent WWIII.\r\n\r\nBuilt using DICE\'s proprietary Frostbite 3 game engine, Battlefield 4 was designed to capture sights, sounds, and fury of all-out war on land, in the air, and at sea. New amphibious assault missions find gamers battling the high winds and heaving seas as they pilot agile attack boats to combat foes on water and on the shore, while the Levolution system challenges players to adjust to dynamically changing environments that feature battlefield deformation and collapsing buildings. The RTS-like Commander mode returns for Battlefield 4, with gamers gathering intelligence, providing key ammo and vehicle drops to the team, and delivering devastating gunship and missile strikes when needed.', 'https://i.ebayimg.com/images/g/mHYAAOSwszZa40Lp/s-l500.jpg', 7, 900, '2019-04-20 11:37:37'),
(13, 'Call Of Duty Black Ops 4 PC', 'By Buying this Product you will receive a Call Of Duty Black Ops 4 Standard Edition Battle.Net account.\r\nYou will be the first owner of the account and you will receive it\'s full information (Email access - Secret Questions).\r\nYou can change the email To yours and the password too.\r\nThe account is fully legal with 0 Hours played.\r\nThe account is Region Free does mean you can play it from any country.\r\nThe game costs 60$ but you can buy it from us at half of the price.\r\n\r\n', 'https://i.ebayimg.com/images/g/A4kAAOSwgYlco5IZ/s-l500.jpg', 7, 4200, '2019-04-20 11:40:39'),
(14, 'Just Cause 4 Steam PC ', 'Additional information\r\n\r\nInstructions for action after purchase:\r\n\r\n1. Enter the Steam app\r\n\r\n2.Click on \"login\" in the upper right corner of the steam program and select \"About account\"\r\n\r\n3. In the \"Contact Information\" section, be sure to add your phone by clicking on the \"Link Phone\" link. Without adding a phone you can not change the mail!\r\n\r\n4. Enter your phone number and confirm it with SMS message.\r\n\r\n5. After this, go to the settings. In the upper left corner of the steam program, click on the \"Steam\" menu and then \"Settings\"\r\n\r\n6. Click the \"Change contact email address\" button.\r\n\r\n7. Send the verification code to your number, enter it in the field and replace the E-mail with your own.\r\n\r\n8.Also in the settings, click the \"Change Password\" button. Change the password to your own and only then start the game. These security measures will help keep your account forever!\r\n\r\n9. Go to the \"Library\" section and right-click on \"install game\". The game will start downloading from the official Steam servers.', 'https://i.ebayimg.com/images/g/XPwAAOSwsYtcrgLk/s-l500.png', 7, 5150, '2019-04-20 11:40:39'),
(15, 'The Laws of Human Nature', 'THIS IS A DIGITAL VERSION\r\n\r\n                                       PRODUCT WILL BE DELIVERED TO THE EMAIL ON PAYPAL\r\n                                             ALLOW FOR 2-6 HOURS AFTER PURCHASE\r\n                                                           NO REFUNDS', 'https://i.ebayimg.com/images/g/vQMAAOSwWkFcZINZ/s-l500.jpg', 5, 99, '2019-04-20 11:43:20'),
(16, 'ASTROPHYSICS for PEOPLE in a HURRY ', 'ASTROPHYSICS for PEOPLE in a HURRY by Neil de Grasse Tyson  PDF High Quality \r\n\r\nThis is a PDF version so PLEASE after purchase send a valid email address in order to send it to you.\r\nOnce you receive the email you may download it to your computer from Google Drive or OneDrive.\r\nShipping : - I ship within 24 hours after receiving payment\r\nPDF is sent to the given Paypal e-mail if  you want it diliver to a different email please drop a message\r\n\r\n           Thank you for your purchase.', 'https://img13.androidappsapk.co/300/8/1/4/com.wAstrophysicsforPeopleinaHurry_6309256.png', 5, 70, '2019-04-20 11:47:19'),
(17, 'Furiously Happy', 'Furiously Happy : A Funny Book about Horrible Things by Jenny Lawson (2015, Hardcover)', 'https://i.ebayimg.com/images/g/aZ8AAOSwB3BZ6cwy/s-l640.jpg', 5, 530, '2019-04-20 11:49:33'),
(18, 'Abnormal Psychology', 'Abnormal Psychology An Integrative Approach 7th Edition Ebook/PDF ', 'https://i.ebayimg.com/images/g/kX0AAOSwJQVcQVJn/s-l500.jpg', 5, 3000, '2019-04-20 11:52:42');

-- --------------------------------------------------------

--
-- Table structure for table `product_categories`
--

CREATE TABLE `product_categories` (
  `id` int(11) NOT NULL,
  `category` varchar(255) NOT NULL,
  `parent_category` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_categories`
--

INSERT INTO `product_categories` (`id`, `category`, `parent_category`) VALUES
(1, 'Electronics', NULL),
(2, 'Fashion', NULL),
(3, 'Health & Beauty', NULL),
(4, 'Sports', NULL),
(5, 'Books', NULL),
(6, 'Tech', NULL),
(7, 'Video Games', NULL);

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
-- Indexes for table `ordered_products`
--
ALTER TABLE `ordered_products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_categories`
--
ALTER TABLE `product_categories`
  ADD PRIMARY KEY (`id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `ordered_products`
--
ALTER TABLE `ordered_products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `product_categories`
--
ALTER TABLE `product_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `product_properties`
--
ALTER TABLE `product_properties`
  MODIFY `prod_id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
