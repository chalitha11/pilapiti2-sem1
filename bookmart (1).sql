-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 09, 2024 at 08:07 PM
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
-- Database: `bookmart`
--

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE `book` (
  `bookID` int(11) NOT NULL,
  `bname` varchar(255) NOT NULL,
  `bauthor` varchar(255) NOT NULL,
  `bprice` decimal(10,2) NOT NULL,
  `btype` enum('Novels','ShortStory','Thriller','Fantasy','Fiction') NOT NULL,
  `bimage` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`bookID`, `bname`, `bauthor`, `bprice`, `btype`, `bimage`) VALUES
(0, 'Book 5', 'Ashen', 2345.00, 'Novels', 'images/Novels/20241209134719.jpg'),
(1, 'Book 1', 'Author 1', 500.00, 'Novels', 'images/Novels/book1.jpg'),
(2, 'Book 2', 'Author 2', 750.00, 'Thriller', 'images/Thriller/book2.jpg'),
(3, 'Book 3', 'Author 3', 300.00, 'Fiction', 'images/Fiction/book3.jpg'),
(7, 'ashen', 'Ashen', 670.00, 'Thriller', 'images/Thriller/20241209081641.jpg'),
(8, 'ashen2', 'Ashen1', 234.00, 'ShortStory', 'images/ShortStory/20241209091623.jpg'),
(9, 'ashen2', 'Ashen1', 234.00, 'ShortStory', 'images/ShortStory/20241209091639.jpg'),
(10, 'ashen', 'Ashen1', 456.00, 'Novels', 'images/Novels/20241209093149.jpg'),
(11, 'ashen', 'Ashen1', 70.00, 'Novels', 'images/Novels/20241209094107.jpg'),
(12312304, 'Book 5', 'opiposad', 39.00, 'ShortStory', 'images/ShortStory/20241209140511.jpg'),
(1234556547, 'adfdsgs', '234', 567.00, 'Fantasy', 'images/Fantasy/20241209140618.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cartID` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `bookID` int(11) NOT NULL,
  `quantity` int(11) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cartID`, `userID`, `bookID`, `quantity`) VALUES
(15, 3, 11, 1),
(16, 3, 10, 1),
(17, 3, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `confirm_order`
--

CREATE TABLE `confirm_order` (
  `order_id` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `number` varchar(15) NOT NULL,
  `email` varchar(255) NOT NULL,
  `payment_method` enum('cash on delivery','Debit card','Amazon Pay','Paypal','Google Pay') NOT NULL,
  `uAddress` text NOT NULL,
  `total_books` text NOT NULL,
  `total_price` decimal(10,2) NOT NULL,
  `order_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_item_id` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `uAddress` text NOT NULL,
  `city` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `pincode` varchar(10) NOT NULL,
  `bookID` int(11) NOT NULL,
  `bname` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL,
  `unit_price` decimal(10,2) NOT NULL,
  `sub_total` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `payment_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `payment_method` enum('cash on delivery','Debit card','Paypal') NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `payment_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `userID` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `uname` varchar(100) NOT NULL,
  `contactNo` varchar(15) NOT NULL,
  `uAddress` text NOT NULL,
  `password` varchar(255) NOT NULL,
  `gender` enum('Male','Female') NOT NULL,
  `userType` enum('User','Admin') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userID`, `email`, `uname`, `contactNo`, `uAddress`, `password`, `gender`, `userType`) VALUES
(3, 'kaveeshamanusaraniG786@gmail.com', 'Kaveesha Manusarani', '0702489820', '335/1,Neelammahara raod, Godigamuwa,Maharagama', '$2y$10$Sv9ibuwRHaZ3CzDlrUuQL.1uqMTyn1RppZb2wrjUbQiqhJb8KxAAW', 'Female', 'Admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`bookID`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cartID`),
  ADD KEY `bookID` (`bookID`);

--
-- Indexes for table `confirm_order`
--
ALTER TABLE `confirm_order`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `userID` (`userID`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_item_id`),
  ADD KEY `userID` (`userID`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `bookID` (`bookID`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`payment_id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `userID` (`userID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cartID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `confirm_order`
--
ALTER TABLE `confirm_order`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_item_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`bookID`) REFERENCES `book` (`bookID`) ON DELETE CASCADE;

--
-- Constraints for table `confirm_order`
--
ALTER TABLE `confirm_order`
  ADD CONSTRAINT `confirm_order_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `user` (`userID`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `user` (`userID`) ON DELETE CASCADE,
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`order_id`) REFERENCES `confirm_order` (`order_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `orders_ibfk_3` FOREIGN KEY (`bookID`) REFERENCES `book` (`bookID`) ON DELETE CASCADE;

--
-- Constraints for table `payments`
--
ALTER TABLE `payments`
  ADD CONSTRAINT `payments_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `confirm_order` (`order_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `payments_ibfk_2` FOREIGN KEY (`userID`) REFERENCES `user` (`userID`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
