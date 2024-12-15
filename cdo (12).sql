-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 13, 2024 at 01:27 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cdo`
--

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `sent_to` varchar(200) NOT NULL,
  `message` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `position` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `username`, `sent_to`, `message`, `created_at`, `position`) VALUES
(1, 'CDO Foodsphere Ecart', 'Dela Cruza, Juana', 'hi', '2024-11-27 02:14:53', 'admin'),
(2, 'CDO Foodsphere Ecart', 'Dela Cruz, Juan', 'hi', '2024-11-27 02:15:01', 'admin'),
(3, 'CDO Foodsphere Ecart', 'Dela Cruz, Juan', 'hi', '2024-11-27 02:15:09', 'admin'),
(4, 'CDO Foodsphere Ecart', 'Dela Cruza, Juana', 'hii', '2024-11-27 02:15:19', 'admin'),
(5, 'Dela Cruza, Juana', 'admin', 'Hello', '2024-11-27 02:18:29', 'customer'),
(6, 'CDO Foodsphere Ecart', 'Dela Cruza, Juana', 'Hi', '2024-11-27 02:18:41', 'admin'),
(7, 'CDO Foodsphere Ecart', 'Dela Cruz, Juan', 'Hi', '2024-11-27 02:19:24', 'admin'),
(8, 'CDO Foodsphere Ecart', 'Dela Cruz, Juan', 'Again', '2024-11-27 02:19:35', 'admin'),
(9, 'Dela Cruz, Juan', 'admin', 'wassup', '2024-11-27 02:19:38', 'customer'),
(10, 'CDO Foodsphere Ecart', 'Dela Cruz, Juan', 'a', '2024-11-27 02:29:06', 'admin'),
(11, 'CDO Foodsphere Ecart', 'Dela Cruza, Juana', '_', '2024-11-27 03:08:17', 'admin'),
(12, 'CDO Foodsphere Ecart', 'Dela Cruza, Juana', 'huh', '2024-11-27 03:08:29', 'admin'),
(13, 'Dela Cruza, Juana', 'admin', 'bruh', '2024-11-27 03:08:45', 'customer'),
(14, 'CDO Foodsphere Ecart', 'Dela Cruza, Juana', 'Hellow Juana', '2024-11-27 03:15:03', 'admin'),
(15, 'Dela Cruza, Juana', 'admin', 'Hi admin', '2024-11-27 03:15:10', 'customer'),
(16, 'Dela Cruza, Juana', 'admin', 'ayaw lumabas?', '2024-11-27 03:15:26', 'customer'),
(17, 'CDO Foodsphere Ecart', 'Dela Cruza, Juana', 'oo eh', '2024-11-27 03:15:31', 'admin'),
(18, 'CDO Foodsphere Ecart', 'Dela Cruza, Juana', 'ok na?', '2024-11-27 03:19:03', 'admin'),
(19, 'CDO Foodsphere Ecart', 'Dela Cruza, Juana', 'ok na?', '2024-11-27 03:19:39', 'admin'),
(20, 'Dela Cruza, Juana', 'admin', 'hindi', '2024-11-27 03:19:50', 'customer'),
(21, 'CDO Foodsphere Ecart', 'Dela Cruza, Juana', 'luh', '2024-11-27 03:20:10', 'admin'),
(22, 'Dela Cruza, Juana', 'admin', 'ulit', '2024-11-27 03:20:15', 'customer'),
(23, 'CDO Foodsphere Ecart', 'Dela Cruza, Juana', '1', '2024-11-27 03:23:05', 'admin'),
(24, 'Dela Cruza, Juana', 'admin', '2', '2024-11-27 03:23:08', 'customer'),
(25, 'CDO Foodsphere Ecart', 'Dela Cruza, Juana', '12', '2024-11-27 03:23:28', 'admin'),
(26, 'CDO Foodsphere Ecart', 'Dela Cruza, Juana', '3', '2024-11-27 03:23:31', 'admin'),
(27, 'CDO Foodsphere Ecart', 'Dela Cruza, Juana', '4', '2024-11-27 03:23:34', 'admin'),
(28, 'CDO Foodsphere Ecart', 'Dela Cruza, Juana', '5', '2024-11-27 03:23:36', 'admin'),
(29, 'Dela Cruza, Juana', 'admin', '6', '2024-11-27 03:23:43', 'customer'),
(30, 'Dela Cruza, Juana', 'admin', '7', '2024-11-27 03:23:46', 'customer'),
(31, 'Dela Cruza, Juana', 'admin', '8', '2024-11-27 03:23:48', 'customer'),
(32, 'CDO Foodsphere Ecart', 'Dela Cruza, Juana', 'asda', '2024-11-27 03:27:10', 'admin'),
(33, 'Dela Cruza, Juana', 'admin', 'hayp', '2024-11-27 03:27:20', 'customer'),
(34, 'CDO Foodsphere Ecart', 'Dela Cruza, Juana', 'a', '2024-11-27 03:51:47', 'admin'),
(35, 'Dela Cruza, Juana', 'admin', 's', '2024-11-27 03:51:51', 'customer'),
(36, 'CDO Foodsphere Ecart', 'Dela Cruza, Juana', 's', '2024-11-27 03:53:14', 'admin'),
(37, 'Dela Cruza, Juana', 'admin', 'asda', '2024-11-27 03:53:39', 'customer'),
(38, 'CDO Foodsphere Ecart', 'Dela Cruza, Juana', 'hi?', '2024-11-27 04:55:57', 'admin'),
(39, 'Dela Cruza, Juana', 'admin', 'Hello?', '2024-11-27 04:56:05', 'customer'),
(40, 'CDO Foodsphere Ecart', 'Dela Cruz, Juan', 'wassup', '2024-11-27 04:56:14', 'admin'),
(41, 'Lina, Mark Anthony ', 'admin', 'Hello', '2024-12-09 00:35:57', 'customer'),
(42, 'CDO Foodsphere Ecart', 'Lina, Mark Anthony', 'Hi', '2024-12-11 06:57:13', 'admin'),
(43, 'Ramos, Nathaniel Patrick L.', 'admin', 'yow', '2024-12-11 10:11:00', 'customer');

-- --------------------------------------------------------

--
-- Table structure for table `tblaccount`
--

CREATE TABLE `tblaccount` (
  `ID` int(11) NOT NULL,
  `fldname` varchar(200) DEFAULT NULL,
  `fldemail` varchar(200) DEFAULT NULL,
  `fldpassword` varchar(200) DEFAULT NULL,
  `fldposition` varchar(200) NOT NULL,
  `fldaddress` varchar(200) NOT NULL,
  `authentication` varchar(200) NOT NULL,
  `code` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblaccount`
--

INSERT INTO `tblaccount` (`ID`, `fldname`, `fldemail`, `fldpassword`, `fldposition`, `fldaddress`, `authentication`, `code`) VALUES
(2, 'CDO Foodsphere Ecart', 'cdofoodsphereecart@gmail.com', '123', 'admin', '01, barangay1, Lipa City, Batangas', 'True', '194265'),
(18, 'Lina, Mark Anthony ', 'markanthonylina05@gmail.com', '123', 'customer', '1, Barangay Uno, Lipa City, Batangas', 'True', '556100'),
(19, 'Ramos, Nathaniel Patrick L.', 'irumaramos123@gmail.com', '123', 'customer', '1, Barangay Uno, Lipa City, Batangas', 'True', '835638');

-- --------------------------------------------------------

--
-- Table structure for table `tblallprod`
--

CREATE TABLE `tblallprod` (
  `prodname` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblallprod`
--

INSERT INTO `tblallprod` (`prodname`) VALUES
('Hotdog'),
('Young Pork Tocino'),
('Young Pork Tocino Fatless'),
('Young Pork Tocino Chili'),
('Cheesedog (Go Balls)'),
('CDO Karne Norte'),
('Ulam Burger Regular'),
('Ulam Burger Mini'),
('Young Pork Bacon'),
('Luncheon Meat');

-- --------------------------------------------------------

--
-- Table structure for table `tblcart`
--

CREATE TABLE `tblcart` (
  `orderid` varchar(200) NOT NULL,
  `cusname` varchar(200) DEFAULT NULL,
  `prodimage` varchar(200) DEFAULT NULL,
  `prodname` varchar(200) DEFAULT NULL,
  `quan` varchar(200) DEFAULT NULL,
  `price` varchar(200) DEFAULT NULL,
  `prodstatus` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblcart`
--

INSERT INTO `tblcart` (`orderid`, `cusname`, `prodimage`, `prodname`, `quan`, `price`, `prodstatus`) VALUES
('6759355d0db2d', 'Lina, Mark Anthony ', '675012b2bc5ab.png', 'Young Pork Tocino', '4', '130', 'done'),
('67593c2c07aa7', 'Lina, Mark Anthony ', '6750188600193.png', 'Ulam Burger Mini', '5', '100', 'done'),
('67593c2c07aa7', 'Lina, Mark Anthony ', '67501730e5e3a.png', 'CDO Karne Norte', '4', '60', 'done'),
('67593c2c07aa7', 'Lina, Mark Anthony ', '675018274ca02.png', 'Ulam Burger Regular', '2', '300', 'done'),
('67593c45c32bf', 'Lina, Mark Anthony ', '6750195731312.png', 'Luncheon Meat', '2', '180', 'done'),
('67593c5b67e06', 'Lina, Mark Anthony ', '67501915907aa.png', 'Young Pork Bacon', '1', '180', 'done'),
('67593c5b67e06', 'Lina, Mark Anthony ', '6750143d7f3b9.png', 'Cheesedog (Go Balls)', '1', '140', 'done'),
('67593c624c949', 'Lina, Mark Anthony ', '6750195731312.png', 'Luncheon Meat', '2', '180', 'done'),
('67593c691871f', 'Lina, Mark Anthony ', '6750143d7f3b9.png', 'Cheesedog (Go Balls)', '4', '140', 'done'),
('67593c7446ed0', 'Lina, Mark Anthony ', '67501730e5e3a.png', 'CDO Karne Norte', '2', '60', 'done'),
('6759433418373', 'Lina, Mark Anthony ', '6750036a08490.png', 'Hotdog', '7', '20', 'done'),
('67594bf3573dd', 'Lina, Mark Anthony ', '6750036a08490.png', 'Hotdog', '1', '20', 'done'),
('67594bf3573dd', 'Lina, Mark Anthony ', '675012b2bc5ab.png', 'Young Pork Tocino', '1', '130', 'done'),
('67594bf3573dd', 'Lina, Mark Anthony ', '675013379102e.png', 'Young Pork Tocino Fatless', '2', '150', 'done'),
('67594bfe89e6f', 'Lina, Mark Anthony ', '675012b2bc5ab.png', 'Young Pork Tocino', '1', '130', 'done'),
('67594daa99d00', 'Lina, Mark Anthony ', '675012b2bc5ab.png', 'Young Pork Tocino', '1', '130', 'done'),
('67594e7c93a56', 'Lina, Mark Anthony ', '675012b2bc5ab.png', 'Young Pork Tocino', '1', '130', 'done'),
('67594f8ce2c04', 'Lina, Mark Anthony ', '675013379102e.png', 'Young Pork Tocino Fatless', '1', '150', 'done'),
('675952a5dc129', 'Lina, Mark Anthony ', '6750195731312.png', 'Luncheon Meat', '1', '180', 'done'),
('6759533c06bbe', 'Lina, Mark Anthony ', '675018274ca02.png', 'Ulam Burger Regular', '1', '300', 'done');

-- --------------------------------------------------------

--
-- Table structure for table `tblinventory`
--

CREATE TABLE `tblinventory` (
  `id` int(11) NOT NULL,
  `flddate` varchar(200) DEFAULT NULL,
  `fldname` varchar(200) DEFAULT NULL,
  `fldquan` varchar(200) DEFAULT NULL,
  `flddesc` varchar(200) DEFAULT NULL,
  `fldstatus` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblinventory`
--

INSERT INTO `tblinventory` (`id`, `flddate`, `fldname`, `fldquan`, `flddesc`, `fldstatus`) VALUES
(1, '2024-12-04', 'Hotdog', '20', 'Product Delivery', 'delivery'),
(2, '2024-12-04', 'Hotdog', '1', 'Expired', 'wastages'),
(3, '2024-12-04', 'Young Pork Tocino', '20', 'Product Delivery', 'delivery'),
(4, '2024-12-04', 'Young Pork Tocino Fatless', '30', 'Product Delivery', 'delivery'),
(5, '2024-12-04', 'Young Pork Tocino Chili', '20', 'Product Delivery', 'delivery'),
(6, '2024-12-04', 'Cheesedog (Go Balls)', '20', 'Product Delivery', 'delivery'),
(7, '2024-12-04', 'CDO Karne Norte', '30', 'Product Delivery', 'delivery'),
(8, '2024-12-04', 'Ulam Burger Regular', '20', 'Product Delivery', 'delivery'),
(9, '2024-12-04', 'Ulam Burger Mini', '20', 'Product Delivery', 'delivery'),
(10, '2024-12-04', 'Young Pork Bacon', '25', 'Product Delivery', 'delivery'),
(11, '2024-12-04', 'Luncheon Meat', '25', 'Product Delivery', 'delivery'),
(12, '2024-12-04', 'Hotdog', '1', 'Delivery', 'delivery'),
(13, '2024-12-04', 'Young Pork Tocino', '1', 'Import', 'delivery'),
(14, '2024-12-11', 'Hotdog', '20', 'From Mark', 'delivery'),
(15, '2024-12-11', 'Hotdog', '1', 'Outdated', 'wastages');

-- --------------------------------------------------------

--
-- Table structure for table `tblorders`
--

CREATE TABLE `tblorders` (
  `orderid` varchar(200) DEFAULT NULL,
  `date` varchar(200) NOT NULL,
  `cusname` varchar(200) DEFAULT NULL,
  `total` varchar(200) DEFAULT NULL,
  `method` varchar(200) DEFAULT NULL,
  `address` varchar(200) DEFAULT NULL,
  `status` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblorders`
--

INSERT INTO `tblorders` (`orderid`, `date`, `cusname`, `total`, `method`, `address`, `status`) VALUES
('6759355d0db2d', '2024-12-11', 'Lina, Mark Anthony ', '520', 'COD', '1, Barangay Uno, Lipa City, Batangas', 'Completed'),
('67593c2c07aa7', '2024-12-11', 'Lina, Mark Anthony ', '1340', 'COD', '1, Barangay Uno, Lipa City, Batangas', 'Shipping'),
('67593c45c32bf', '2024-12-11', 'Lina, Mark Anthony ', '360', 'COD', '1, Barangay Uno, Lipa City, Batangas', 'Completed'),
('67593c5b67e06', '2024-12-11', 'Lina, Mark Anthony ', '320', 'COD', '1, Barangay Uno, Lipa City, Batangas', 'Shipping'),
('67593c624c949', '2024-12-11', 'Lina, Mark Anthony ', '360', 'COD', '1, Barangay Uno, Lipa City, Batangas', 'Completed'),
('67593c691871f', '2024-12-11', 'Lina, Mark Anthony ', '560', 'COD', '1, Barangay Uno, Lipa City, Batangas', 'Shipping'),
('67593c7446ed0', '2024-12-11', 'Lina, Mark Anthony ', '120', 'COD', '1, Barangay Uno, Lipa City, Batangas', 'Processing'),
('6759433418373', '2024-12-11', 'Lina, Mark Anthony ', '140', 'COD', '1, Barangay Uno, Lipa City, Batangas', 'Processing'),
('67594bf3573dd', '2024-12-11', 'Lina, Mark Anthony ', '450', 'COD', '1, Barangay Uno, Lipa City, Batangas', 'Processing'),
('67594bfe89e6f', '2024-12-11', 'Lina, Mark Anthony ', '130', 'COD', '1, Barangay Uno, Lipa City, Batangas', 'Processing'),
('67594f8ce2c04', '2024-12-11', 'Lina, Mark Anthony ', '150', 'COD', '1, Barangay Uno, Lipa City, Batangas', 'Shipping'),
('6759533c06bbe', '2024-12-11', 'Lina, Mark Anthony ', '300', '6759533c06809.png', '1, Barangay Uno, Lipa City, Batangas', 'Completed');

-- --------------------------------------------------------

--
-- Table structure for table `tblproduct`
--

CREATE TABLE `tblproduct` (
  `prodid` int(11) NOT NULL,
  `prodname` varchar(255) NOT NULL,
  `prodprice` varchar(50) NOT NULL,
  `prodimage` varchar(255) DEFAULT NULL,
  `proddesc` varchar(500) DEFAULT NULL,
  `prodquantity` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblproduct`
--

INSERT INTO `tblproduct` (`prodid`, `prodname`, `prodprice`, `prodimage`, `proddesc`, `prodquantity`) VALUES
(1, 'Hotdog', '20', '6750036a08490.png', 'A hot dog is a dish consisting of a grilled, steamed, or boiled sausage served in the slit of a partially sliced bun. The term hot dog can refer to the sausage itself. The sausage used is a wiener (Vi', '31'),
(2, 'Young Pork Tocino', '130', '675012b2bc5ab.png', 'What makes CDO Funtastyk Tocino deliciously special? It’s made from 100% YOUNG PORK making it deliciously tender with the balanced taste of sweet and salty flavors. That’s why there’s no need to boil,', '13'),
(3, 'Young Pork Tocino Fatless', '150', '675013379102e.png', 'What makes CDO Funtastyk Tocino deliciously special? It’s made from 100% YOUNG PORK making it deliciously tender with the balanced taste of sweet and salty flavors. That’s why there’s no need to boil,', '27'),
(4, 'Young Pork Tocino Chili', '140', '6750139ed35ec.png', 'What makes CDO Funtastyk Tocino deliciously special? It’s made from 100% YOUNG PORK making it deliciously tender with the balanced taste of sweet and salty flavors. That’s why there’s no need to boil,', '20'),
(5, 'Cheesedog (Go Balls)', '140', '6750143d7f3b9.png', 'CDO Idol Cheesedog has the perfect blend of hotdog and delightfully creamy cheese bits in every bite.  Allergen Information: Contains Milk, Soya, and Wheat. May contain traces of Egg', '15'),
(6, 'CDO Karne Norte', '60', '67501730e5e3a.png', 'CDO Karne Norte is a Filipino-style corned beef with a delicious beefy guisado taste. Its fine beef strands and flavorful beef juice make it a family favorite. Whether you\'re cooking a quick meal or adding extra flavor to your dishes, CDO Karne Norte is the perfect kitchen partner. Try it in torta, lumpia, and sopas for a hearty, beefy twist! <br><br> Allergen Information: Contains Soy, Cereals and Milk', '24'),
(7, 'Ulam Burger Regular', '300', '675018274ca02.png', 'It\'s a delicious burger with strong beefy aroma that is best topped on rice. In addition to its satisfying flavor and appetizing aroma, CDO Ulam Burger is a great source of protein to give the kids the energy they need to start the day. <br><br> Allergen Information:  Contains Egg, Soya, and Wheat. May contain traces of Celery, Milk, Sesame.', '17'),
(8, 'Ulam Burger Mini', '100', '6750188600193.png', 'It\'s a delicious burger with strong beefy aroma that is best topped on rice. In addition to its satisfying flavor and appetizing aroma, CDO Ulam Burger is a great source of protein to give the kids the energy they need to start the day. <br><br> Allergen Information:  Contains Egg, Soya, and Wheat. May contain traces of Celery, Milk, Sesame.', '15'),
(9, 'Young Pork Bacon', '180', '67501915907aa.png', 'CDO Young Pork Bacon Smoked is the perfect all-around bacon, versatile for any dish. With its smoky flavor, it is suitably delightful with any flavor pairing at home.<br> <br> Allergen Information: May contain traces of Milk, Soya and Wheat', '24'),
(10, 'Luncheon Meat', '180', '6750195731312.png', '<p class=\"detail_desc\">CDO Chinese Style Luncheon Meat is a meaty and flavorful luncheon meat delightfully seasoned with unique blend of spices.<br> <br> Allergen information: Contains Soy</p>', '20');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblaccount`
--
ALTER TABLE `tblaccount`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblinventory`
--
ALTER TABLE `tblinventory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblproduct`
--
ALTER TABLE `tblproduct`
  ADD PRIMARY KEY (`prodid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `tblaccount`
--
ALTER TABLE `tblaccount`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `tblinventory`
--
ALTER TABLE `tblinventory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tblproduct`
--
ALTER TABLE `tblproduct`
  MODIFY `prodid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
