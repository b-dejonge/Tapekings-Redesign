-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 24, 2018 at 04:59 PM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tapekings_redesign`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `category` varchar(255) NOT NULL,
  `parent` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category`, `parent`) VALUES
(1, 'Baseball', 0),
(2, 'Softball', 0),
(3, 'Tennis', 0),
(4, 'Hockey', 0),
(5, 'Lacrosse', 0);

-- --------------------------------------------------------

--
-- Table structure for table `orderproducts`
--

CREATE TABLE `orderproducts` (
  `orderID` int(11) NOT NULL,
  `productID` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `qty` int(11) NOT NULL,
  `price` float NOT NULL,
  `grip_type` varchar(255) DEFAULT NULL,
  `design_type` varchar(255) DEFAULT NULL,
  `color1` varchar(255) DEFAULT NULL,
  `color2` varchar(255) DEFAULT NULL,
  `color3` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orderproducts`
--

INSERT INTO `orderproducts` (`orderID`, `productID`, `title`, `qty`, `price`, `grip_type`, `design_type`, `color1`, `color2`, `color3`) VALUES
(26, 103, 'Send Us Your Bat', 1, 30, 'Hydro', 'Viper Thread', 'Orange', 'Navy Blue', 'Purple'),
(27, 16, '1.5\" Black Tape', 1, 4, NULL, NULL, NULL, NULL, NULL),
(27, 2, 'Red Tape', 1, 4, NULL, NULL, NULL, NULL, NULL),
(27, 9, 'Orange Tape', 1, 4, NULL, NULL, NULL, NULL, NULL),
(28, 102, 'Send Us Your Bat', 1, 20, 'Standard', 'Weaver Series', 'Red', 'Yelow', 'Orange'),
(28, 16, '1.5\" Black Tape', 1, 4.25, NULL, NULL, NULL, NULL, NULL),
(29, 103, 'Send Us Your Bat', 1, 30, 'Hydro', 'Shadow X', 'Red', 'Orange', 'Royal Blue');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `orderID` int(10) NOT NULL,
  `userID` int(10) DEFAULT NULL,
  `orderDate` date NOT NULL,
  `total` float NOT NULL,
  `shipping` float NOT NULL,
  `tax` float NOT NULL,
  `billingFirstName` varchar(255) NOT NULL,
  `billingLastName` varchar(255) NOT NULL,
  `email` text NOT NULL,
  `billingAddress` text NOT NULL,
  `billingAddress2` varchar(255) DEFAULT NULL,
  `billingCity` varchar(255) NOT NULL,
  `billingState` varchar(255) NOT NULL,
  `billingZip` int(255) NOT NULL,
  `shippingFirstName` varchar(255) DEFAULT NULL,
  `shippingLastName` varchar(255) DEFAULT NULL,
  `shippingAddress` text,
  `shippingAddress2` varchar(255) DEFAULT NULL,
  `shippingCity` varchar(255) DEFAULT NULL,
  `shippingState` varchar(255) DEFAULT NULL,
  `shippingZip` int(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`orderID`, `userID`, `orderDate`, `total`, `shipping`, `tax`, `billingFirstName`, `billingLastName`, `email`, `billingAddress`, `billingAddress2`, `billingCity`, `billingState`, `billingZip`, `shippingFirstName`, `shippingLastName`, `shippingAddress`, `shippingAddress2`, `shippingCity`, `shippingState`, `shippingZip`) VALUES
(26, 6, '2018-04-24', 32.1, 0, 2.1, 'Joe', 'Smith', 'jsmith@gmail.com', '123 Main St', '', 'Hollywood', 'CA', 12345, 'Joe', 'Smith', '123 Main St', '', 'Hollywood', 'CA', 12345),
(27, 7, '2018-04-24', 17.84, 5, 0.84, 'Betty', 'Miller', 'bmiller@gmail.com', '534 New St', '', 'Detroit', 'MI', 54325, 'Betty', 'Miller', '534 New St', '', 'Detroit', 'MI', 54325),
(28, 8, '2018-04-24', 30.95, 5, 1.7, 'Jane', 'Doe', 'jdoe@gmail.com', '4535 Country Rd', '', 'Fort Wayne', 'IN', 4803, 'Jane', 'Doe', '324 City Rd', '', 'New York', 'NY', 34242),
(29, 9, '2018-04-24', 32.1, 0, 2.1, 'Tyler', 'Jones', 'tjones@gmail.com', '9829 Clinton St', '', 'Atlanta', 'GA', 34525, 'Tyler', 'Jones', '9829 Clinton St', '', 'Atlanta', 'GA', 34525);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `image` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `slug` varchar(255) NOT NULL,
  `sort` int(11) NOT NULL,
  `width` float NOT NULL,
  `length` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `title`, `price`, `image`, `description`, `slug`, `sort`, `width`, `length`) VALUES
(1, 'Yellow Tape', '4.00', './css/img/products/yellow-tape.jpg', 'Yellow Cloth Tape dyed twice for the eye popping color paired with the highest thread count to deliver the durability you need. Woven together with a thick consistent adhesive so it stays where you want the tape to stick.', 'yellow-tape', 8, 1, 25),
(2, 'Red Tape', '4.00', './css/img/products/red-tape.jpg', 'Red Cloth Tape dyed twice for the eye popping color paired with the highest thread count to deliver the durability you need. Woven together with a thick consistent adhesive so it stays where you want the tape to stick.', 'red-tape', 1, 1, 25),
(3, 'Navy Blue Tape', '4.00', './css/img/products/navyblue-tape.jpg', 'Navy Blue Cloth Tape dyed twice for the eye popping color paired with the highest thread count to deliver the durability you need. Woven together with a thick consistent adhesive so it stays where you want the tape to stick.', 'navy-blue-tape', 2, 1, 25),
(4, 'Royal Blue Tape', '4.00', './css/img/products/royalblue-tape.jpg', 'Royal Blue Cloth Tape dyed twice for the eye popping color paired with the highest thread count to deliver the durability you need. Woven together with a thick consistent adhesive so it stays where you want the tape to stick.', 'royal-blue-tape', 9, 1, 25),
(5, 'Pink Tape', '4.00', './css/img/products/pink-tape.jpg', 'Pink Cloth Tape dyed twice for the eye popping color paired with the highest thread count to deliver the durability you need. Woven together with a thick consistent adhesive so it stays where you want the tape to stick.', 'pink-tape', 11, 1, 25),
(6, 'Green Tape', '4.00', './css/img/products/green-tape.jpg', 'Green Cloth Tape dyed twice for the eye popping color paired with the highest thread count to deliver the durability you need. Woven together with a thick consistent adhesive so it stays where you want the tape to stick.', 'green-tape', 10, 1, 25),
(7, 'Neon Green Tape', '4.00', './css/img/products/neongreen-tape.jpg', 'Neon Green Cloth Tape dyed twice for the eye popping color paired with the highest thread count to deliver the durability you need. Woven together with a thick consistent adhesive so it stays where you want the tape to stick.', 'neon-green-tape', 19, 1, 25),
(8, 'Sky Blue Tape', '4.00', './css/img/products/skyblue-tape.jpg', 'Sky Blue Cloth Tape dyed twice for the eye popping color paired with the highest thread count to deliver the durability you need. Woven together with a thick consistent adhesive so it stays where you want the tape to stick.', 'sky-blue-tape', 3, 1, 25),
(9, 'Orange Tape', '4.00', './css/img/products/orange-tape.jpg', 'Orange Cloth Tape dyed twice for the eye popping color paired with the highest thread count to deliver the durability you need. Woven together with a thick consistent adhesive so it stays where you want the tape to stick.', 'orange-tape', 6, 1, 25),
(10, 'Purple Tape', '4.00', './css/img/products/purple-tape.jpg', 'Purple Cloth Tape dyed twice for the eye popping color paired with the highest thread count to deliver the durability you need. Woven together with a thick consistent adhesive so it stays where you want the tape to stick.', 'purple-tape', 13, 1, 25),
(11, 'Teal Tape', '4.00', './css/img/products/teal-tape.jpg', 'Teal Cloth Tape dyed twice for the eye popping color paired with the highest thread count to deliver the durability you need. Woven together with a thick consistent adhesive so it stays where you want the tape to stick.', 'teal-tape', 12, 1, 25),
(12, 'Maroon Tape', '4.00', './css/img/products/maroon-tape.jpg', 'Maroon Cloth Tape dyed twice for the eye popping color paired with the highest thread count to deliver the durability you need. Woven together with a thick consistent adhesive so it stays where you want the tape to stick.', 'maroon-tape', 15, 1, 25),
(13, 'White Tape', '4.00', './css/img/products/white-tape.jpg', 'Pink Cloth Tape dyed twice for the eye popping color paired with the highest thread count to deliver the durability you need. Woven together with a thick consistent adhesive so it stays where you want the tape to stick.', 'white-tape', 14, 1, 25),
(14, 'Black Tape', '4.00', './css/img/products/black-tape.jpg', 'Black Cloth Tape dyed twice for the eye popping color paired with the highest thread count to deliver the durability you need. Woven together with a thick consistent adhesive so it stays where you want the tape to stick.', 'black-tape', 16, 1, 25),
(15, '1.5\" White Tape', '4.25', './css/img/products/white_15-tape.jpg', '1.5\" White Cloth Tape dyed twice for the eye popping color paired with the highest thread count to deliver the durability you need. Woven together with a thick consistent adhesive so it stays where you want the tape to stick.', 'thick-white-tape', 17, 1.5, 15),
(16, '1.5\" Black Tape', '4.25', './css/img/products/black_15-tape.jpg', '1.5\" Black Cloth Tape dyed twice for the eye popping color paired with the highest thread count to deliver the durability you need. Woven together with a thick consistent adhesive so it stays where you want the tape to stick.', 'thick-black-tape', 4, 1.5, 15),
(17, 'American Flag Tape', '5.00', './css/img/products/american-tape.jpg', 'American Flag Cloth Tape dyed twice for the eye popping color paired with the highest thread count to deliver the durability you need. Woven together with a thick consistent adhesive so it stays where you want the tape to stick.', 'american-flag-tape', 7, 1, 20),
(18, 'Pink Camo Tape', '5.00', './css/img/products/pinkcamo-tape.jpg', 'Pink Camo Cloth Tape dyed twice for the eye popping color paired with the highest thread count to deliver the durability you need. Woven together with a thick consistent adhesive so it stays where you want the tape to stick.', 'pink-camo-tape', 18, 1, 20),
(19, 'Green Camo Tape', '5.00', './css/img/products/greencamo-tape.jpg', 'Green Camo Cloth Tape dyed twice for the eye popping color paired with the highest thread count to deliver the durability you need. Woven together with a thick consistent adhesive so it stays where you want the tape to stick.', 'green-camo-tape', 20, 1, 20),
(20, 'Winter Camo Tape', '5.00', './css/img/products/wintercamo-tape.jpg', 'Winter Camo Cloth Tape dyed twice for the eye popping color paired with the highest thread count to deliver the durability you need. Woven together with a thick consistent adhesive so it stays where you want the tape to stick.', 'winter-camo-tape', 5, 1, 20);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userID` int(11) NOT NULL,
  `firstName` varchar(255) NOT NULL,
  `lastName` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userID`, `firstName`, `lastName`, `username`, `password`) VALUES
(0, 'admin', 'admin', 'admin@gmail.com', '21232f297a57a5a743894a0e4a801fc3'),
(6, 'Joe', 'Smith', 'jsmith@gmail.com', '$2y$10$X9oJGwD8F.lYCwgYe22zyuhPTWD/U/tt/hg0Y5Ce5zINjll9/sWs.'),
(7, 'Betty', 'Miller', 'bmiller@gmail.com', '$2y$10$GQ9YdiyCD9Foh4hzyGeVuuhEXltZkHgDvuBfELmCB0GMc1Sb8O/RS'),
(8, 'Jane', 'Doe', 'jdoe@gmail.com', '$2y$10$AsfJTcoNDrpWU8cZA15ai.3fwF3UvXVqLzM/ffud1oxN0Bi8egwi6'),
(9, 'Tyler', 'Jones', 'tjones@gmail.com', '$2y$10$rh9lKFS1NSOn44DBZEnPJee93Eu5uwoFH/98MvndeAYCOYx..rN1i');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`orderID`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `orderID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
