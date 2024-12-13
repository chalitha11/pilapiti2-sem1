-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 13, 2024 at 01:38 PM
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
(7448031, 'Game of Throne', 'George R.R. Martin', 25.00, 'Novels', 'images/Novels/20241213131439.jpg'),
(8182221, 'The adventures of Sherlock Holmes', 'Arthur Conan Doyle', 15.00, 'Novels', 'images/Novels/20241213131659.jpg'),
(8564833, 'Forget me not', 'Julie Soto', 16.00, 'ShortStory', 'images/ShortStory/20241213131855.jpg'),
(140327592, 'Matilda', 'Dahl, Roald', 18.00, 'Novels', 'images/Novels/20241213132024.jpg'),
(141364726, 'Diary of a Wimpy kid: Old School', 'Jeff Kinney', 13.00, 'ShortStory', 'images/ShortStory/20241213132225.jpg'),
(316737372, 'How to train your dragon', 'Cressida Cowell', 25.00, 'ShortStory', 'images/ShortStory/20241213132503.jpg'),
(770430074, 'Life of Pi', 'Yann Martel', 21.00, 'Novels', 'images/Novels/20241213132639.jpg'),
(1421530546, 'Pokemon Adevnture : VOL1', 'Hindenori Kusaka', 24.00, 'ShortStory', 'images/ShortStory/20241213132850.jpg'),
(1569319006, 'Naruto : VOL 1', 'Masashi Kishimoto', 19.00, 'ShortStory', 'images/ShortStory/20241213133107.jpg'),
(1603095020, 'Animal Stories', 'Maria Hoey, Peter Hoey', 15.00, 'Novels', 'images/Novels/20241213133308.jpg');

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
(43, 5, 140327592, 1),
(44, 4, 770430074, 1);

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

--
-- Dumping data for table `confirm_order`
--

INSERT INTO `confirm_order` (`order_id`, `userID`, `name`, `number`, `email`, `payment_method`, `uAddress`, `total_books`, `total_price`, `order_date`) VALUES
(1, 3, 'Kaveesha Manusarani', '0702489820', 'kaveeshamanusaraniG786@gmail.com', 'cash on delivery', '335/1,Neelammahara raod, Godigamuwa,Maharagama', '1', 459.00, '2024-12-10'),
(2, 3, 'Kaveesha Manusarani', '0702489820', 'kaveeshamanusaraniG786@gmail.com', 'cash on delivery', '335/1,Neelammahara raod, Godigamuwa,Maharagama', '1', 459.00, '2024-12-10'),
(3, 3, 'Kaveesha Manusarani', '0702489820', 'kaveeshamanusaraniG786@gmail.com', 'Paypal', '335/1,Neelammahara raod, Godigamuwa,Maharagama', '1', 459.00, '2024-12-10'),
(10, 3, 'Kaveesha Manusarani', '0702489820', 'kaveeshamanusaraniG786@gmail.com', 'cash on delivery', '335/1,Neelammahara raod, Godigamuwa,Maharagama', '1', 73.00, '2024-12-12'),
(11, 3, 'Kaveesha Manusarani', '0702489820', 'kaveeshamanusaraniG786@gmail.com', 'cash on delivery', '335/1,Neelammahara raod, Godigamuwa,Maharagama', '2', 530.00, '2024-12-12'),
(12, 3, 'Kaveesha Manusarani', '0702489820', 'kaveeshamanusaraniG786@gmail.com', 'cash on delivery', '335/1,Neelammahara raod, Godigamuwa,Maharagama', '2', 530.00, '2024-12-12'),
(13, 4, 'customer1', '0702489820', 'customer1@gmail.com', 'cash on delivery', '335/1,Neelammahara raod, Godigamuwa,Maharagama', '1', 73.00, '2024-12-12'),
(14, 4, 'customer1', '0702489820', 'customer1@gmail.com', 'cash on delivery', '335/1,Neelammahara raod, Godigamuwa,Maharagama', '2', 141.00, '2024-12-13'),
(15, 3, 'Kaveesha Manusarani', '0702489820', 'kaveeshamanusaraniG786@gmail.com', 'cash on delivery', '335/1,Neelammahara raod, Godigamuwa,Maharagama', '0', 0.00, '2024-12-13'),
(16, 3, 'Kaveesha Manusarani', '0702489820', 'kaveeshamanusaraniG786@gmail.com', 'cash on delivery', '335/1,Neelammahara raod, Godigamuwa,Maharagama', '1', 73.00, '2024-12-13'),
(17, 4, 'customer1', '0702489820', 'customer1@gmail.com', 'cash on delivery', '335/1,Neelammahara raod, Godigamuwa,Maharagama', '2', 141.00, '2024-12-13'),
(18, 4, 'customer1', '0702489820', 'customer1@gmail.com', 'cash on delivery', '335/1,Neelammahara raod, Godigamuwa,Maharagama', '2', 141.00, '2024-12-13'),
(19, 4, 'customer1', '0702489820', 'customer1@gmail.com', 'cash on delivery', '335/1,Neelammahara raod, Godigamuwa,Maharagama', '2', 141.00, '2024-12-13'),
(20, 5, 'admin', '0702489820', 'admin@gmail.com', 'cash on delivery', '335/1,Neelammahara raod, Godigamuwa,Maharagama', '1', 73.00, '2024-12-13'),
(21, 4, 'customer1', '0741111315', 'customer1@gmail.com', 'cash on delivery', '16, pine Avenue', '2', 141.00, '2024-12-13'),
(22, 4, 'customer1', '0741111315', 'customer1@gmail.com', 'cash on delivery', '16, pine Avenue', '1', 26.00, '2024-12-13'),
(23, 4, 'customer1', '0741111315', 'customer1@gmail.com', 'cash on delivery', '16, Pine Avenue', '1', 24.00, '2024-12-13');

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
(3, 'kaveeshamanusaraniG786@gmail.com', 'Kaveesha Manusarani', '0702489820', '335/1,Neelammahara raod, Godigamuwa,Maharagama', '$2y$10$Sv9ibuwRHaZ3CzDlrUuQL.1uqMTyn1RppZb2wrjUbQiqhJb8KxAAW', 'Female', 'User'),
(4, 'customer1@gmail.com', 'customer1', '0740151481', '16, Pine Avenue', '$2y$10$Df2upQkm4tf.bwGtBaIx7.9gAdo617B9qli5kcs6Y6C44W4BgOLg6', 'Male', 'User'),
(5, 'admin@gmail.com', 'admin', '0740031781', '16, Glosflow ST', '$2y$10$0KvfzBB/CeAuWosyeYRIsObn4h.XNWtbj4Zgc0T9cfpFCF3zegF5q', 'Male', 'Admin'),
(6, 'customer2@gmail.com', 'customer2', '0741111315', '20, Hillwood', '$2y$10$CzZLVX5MB4Qza2bs516J0eSTv00Yz3KhWNHBxJ1sovpZhVCSvxKtq', 'Female', 'User');

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
  MODIFY `cartID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `confirm_order`
--
ALTER TABLE `confirm_order`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

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
-- Constraints for table `payments`
--
ALTER TABLE `payments`
  ADD CONSTRAINT `payments_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `confirm_order` (`order_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `payments_ibfk_2` FOREIGN KEY (`userID`) REFERENCES `user` (`userID`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
