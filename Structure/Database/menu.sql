-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 12, 2017 at 07:12 AM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `foodsite`
--

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id` int(255) NOT NULL,
  `foodName` text NOT NULL,
  `foodPrice` decimal(6,2) NOT NULL,
  `foodTag` text NOT NULL,
  `foodType` text NOT NULL,
  `foodSize` text NOT NULL,
  `foodImage` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id`, `foodName`, `foodPrice`, `foodTag`, `foodType`, `foodSize`, `foodImage`) VALUES
(1, '2 Piece Dark', '2.69', 'Chicken', 'Dark', '', ''),
(2, '3 Piece Dark', '3.59', 'Chicken', 'Dark', '', ''),
(3, '4 Piece Dark', '4.29', 'Chicken', 'Dark', '', ''),
(4, '8 Piece Dark', '8.49', 'Chicken', 'Dark', '', ''),
(5, '16 Piece Dark', '13.99', 'Chicken', 'Dark', '', ''),
(6, '2 Piece White', '3.59', 'Chicken', 'White', '', ''),
(7, '3 Piece White', '4.59', 'Chicken', 'White', '', ''),
(8, '4 Piece White', '6.59', 'Chicken', 'White', '', ''),
(9, '8 Piece White', '10.99', 'Chicken', 'White', '', ''),
(10, '16 Piece White', '17.99', 'Chicken', 'White', '', ''),
(11, '2 Piece Mixed', '2.99', 'Chicken', 'Mixed', '', ''),
(12, '3 Piece Mixed', '3.79', 'Chicken', 'Mixed', '', ''),
(13, '4 Piece Mixed', '4.69', 'Chicken', 'Mixed', '', ''),
(14, '8 Piece Mixed', '9.99', 'Chicken', 'Mixed', '', ''),
(15, '16 Piece Mixed', '14.99', 'Chicken', 'Mixed', '', ''),
(16, '3 Piece Tenders', '3.99', 'Chicken', 'Tenders', '', ''),
(17, '4 Piece Tenders', '4.99', 'Chicken', 'Tenders', '', ''),
(18, '6 Piece Tenders', '5.99', 'Chicken', 'Tenders', '', ''),
(19, '9 Piece Tenders', '8.99', 'Chicken', 'Tenders', '', ''),
(20, '12 Piece Tenders', '10.99', 'Chicken', 'Tenders', '', ''),
(21, '25 Piece Dark', '22.99', 'Chicken', 'Specials', '', ''),
(22, '25 Piece Mixed', '23.99', 'Chicken', 'Specials', '', ''),
(23, '2 Piece Dark Combo', '4.19', 'Combos', 'Chicken', '', ''),
(24, '3 Piece Dark Combo', '4.99', 'Combos', 'Chicken', '', ''),
(25, '4 Piece Dark Combo', '5.99', 'Combos', 'Chicken', '', ''),
(26, '2 Piece White Combo', '5.39', 'Combos', 'Chicken', '', ''),
(27, '3 Piece White Combo', '6.29', 'Combos', 'Chicken', '', ''),
(28, '4 Piece White Combo', '7.29', 'Combos', 'Chicken', '', ''),
(29, '2 Piece Mixed Combo', '4.99', 'Combos', 'Chicken', '', ''),
(30, '3 Piece Mixed Combo', '5.99', 'Combos', 'Chicken', '', ''),
(31, '4 Piece Mixed Combo', '6.99', 'Combos', 'Chicken', '', ''),
(32, '3 Piece Tenders Combo', '4.99', 'Combos', 'Chicken', '', ''),
(33, '4 Piece Tenders Combo', '5.99', 'Combos', 'Chicken', '', ''),
(34, '6 Piece Tenders Combo', '6.99', 'Combos', 'Chicken', '', ''),
(35, 'Fries (Small)', '1.99', 'Sides', 'Sides', 'Small', ''),
(36, 'Fries (Large)', '2.99', 'Sides', 'Sides', 'Large', ''),
(37, 'Red Beans and Rice (Small)', '1.99', 'Sides', 'Sides', 'Small', ''),
(38, 'Red Beans and Rice (Large)', '2.99', 'Sides', 'Sides', 'Large', ''),
(39, 'Jambalaya (Small)', '1.99', 'Sides', 'Sides', 'Small', ''),
(40, 'Jambalaya (Large)', '2.99', 'Sides', 'Sides', 'Large', ''),
(41, 'Potato Salad (Small)', '1.99', 'Sides', 'Sides', 'Small', ''),
(42, 'Potato Salad (Large)', '2.99', 'Sides', 'Sides', 'Large', ''),
(43, 'Jalapeno Poppers (Small)', '2.99', 'Sides', 'Sides', 'Small', ''),
(44, 'Jalapeno Poppers (Large)', '5.99', 'Sides', 'Sides', 'Large', ''),
(45, 'Meat Pie', '1.99', 'Sides', 'Sides', 'Small', ''),
(46, 'Breakfast Plate (Small)', '1.99', 'Breakfast', 'Breakfast', 'Small', ''),
(47, 'Breakfast Plate (Large)', '3.99', 'Breakfast', 'Breakfast', 'Large', ''),
(48, 'Pork Link Breakfast Sandwich', '2.99', 'Breakfast', 'Breakfast', '', ''),
(49, 'Smoked Sausage Breakfast Sandwich', '2.99', 'Breakfast', 'Breakfast', '', ''),
(50, 'Hot Sausage Breakfast Sandwich', '2.99', 'Breakfast', 'Breakfast', '', ''),
(51, 'Bacon Breakfast Sandwich', '2.99', 'Breakfast', 'Breakfast', '', ''),
(52, 'Sausage Patty Breakfast Sandwich', '2.99', 'Breakfast', 'Breakfast', '', ''),
(53, '6-Inch Roast Beef Po-boy', '2.99', 'Po-Boys', 'Po-Boys', '6-Inch', ''),
(54, '6-Inch Hot Sausage Po-boy', '2.99', 'Po-Boys', 'Po-Boys', '6-Inch', ''),
(55, '6-Inch Hamburger Po-boy', '2.99', 'Po-Boys', 'Po-Boys', '6-Inch', ''),
(56, '6-Inch Shrimp Po-boy', '4.99', 'Po-Boys', 'Po-Boys', '6-Inch', ''),
(57, '6-Inch Fish Po-boy', '4.99', 'Po-Boys', 'Po-Boys', '6-Inch', ''),
(58, '6-Inch Turkey Po-boy', '2.99', 'Po-Boys', 'Po-Boys', '6-Inch', ''),
(59, '6-Inch Ham Po-boy', '2.99', 'Po-Boys', 'Po-Boys', '6-Inch', ''),
(60, '6-Inch Chicken Tender Po-boy', '2.99', 'Po-Boys', 'Po-Boys', '6-Inch', ''),
(61, '12-Inch Roast Beef Po-boy', '4.99', 'Po-Boys', 'Po-Boys', '12-Inch', ''),
(62, '12-Inch Hot Sausage Po-boy', '4.99', 'Po-Boys', 'Po-Boys', '12-Inch', ''),
(63, '12-Inch Hamburger Po-boy', '4.99', 'Po-Boys', 'Po-Boys', '12-Inch', ''),
(64, '12-Inch Shrimp Po-boy', '6.99', 'Po-Boys', 'Po-Boys', '12-Inch', ''),
(65, '12-Inch Fish Po-boy', '6.99', 'Po-Boys', 'Po-Boys', '12-Inch', ''),
(66, '12-Inch Turkey Po-boy', '4.99', 'Po-Boys', 'Po-Boys', '12-Inch', ''),
(67, '12-Inch Ham Po-boy', '4.99', 'Po-Boys', 'Po-Boys', '12-Inch', ''),
(68, '12-Inch Chicken Tender Po-boy', '4.99', 'Po-Boys', 'Po-Boys', '12-Inch', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
