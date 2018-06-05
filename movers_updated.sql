-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 05, 2018 at 09:49 AM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 5.6.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `movers`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_users`
--

CREATE TABLE `admin_users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` text NOT NULL,
  `admin_type` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0 = superadmin, 1 = subadmin',
  `role` int(2) NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0 = active, 1 = deleted'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_users`
--

INSERT INTO `admin_users` (`id`, `name`, `username`, `email`, `password`, `admin_type`, `role`, `status`) VALUES
(1, 'test', 'test', 'test@a.com', 'e10adc3949ba59abbe56e057f20f883e', 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `Amenities`
--

CREATE TABLE `Amenities` (
  `amenities_id` int(100) NOT NULL,
  `values` varchar(100) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Amenities`
--

INSERT INTO `Amenities` (`amenities_id`, `values`, `description`) VALUES
(1, 'Modern Kitchen', ''),
(2, 'Furnished', ''),
(3, 'Storage', ''),
(4, 'Heater', ''),
(5, 'TV', ''),
(6, 'Washing Machine', ''),
(7, 'Fridge', ''),
(8, 'Elevator', ''),
(9, 'Gym', ''),
(10, '\r\nSwimming Pool', '');

-- --------------------------------------------------------

--
-- Table structure for table `area`
--

CREATE TABLE `area` (
  `id` int(11) NOT NULL,
  `city_id` int(11) NOT NULL,
  `area_name` varchar(100) NOT NULL,
  `featured` tinyint(1) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `area_code` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `area`
--

INSERT INTO `area` (`id`, `city_id`, `area_name`, `featured`, `status`, `area_code`) VALUES
(1, 1, 'North London234', 0, 1, 'NWL1'),
(2, 1, 'Old Trafford', 0, 1, 'NWL2'),
(3, 1, 'North London', 1, 1, 'NWL3'),
(5, 1, 'East London', 1, 1, 'NWL4'),
(6, 1, 'KingsStreet', 0, 0, 'NW11');

-- --------------------------------------------------------

--
-- Table structure for table `Bills`
--

CREATE TABLE `Bills` (
  `bill_id` int(11) NOT NULL,
  `values` varchar(100) NOT NULL,
  `description` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Bills`
--

INSERT INTO `Bills` (`bill_id`, `values`, `description`) VALUES
(1, 'Electricity', ''),
(2, 'Water', ''),
(3, 'Gas', ''),
(4, 'Wi-Fi', ''),
(5, 'Cleaning Service', ''),
(6, 'Council Tax', '');

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE `city` (
  `id` int(11) NOT NULL,
  `city_name` varchar(100) NOT NULL,
  `country` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`id`, `city_name`, `country`) VALUES
(1, 'London', 'England'),
(2, 'Manchester-11', 'England'),
(3, 'Chelsea', 'England'),
(4, 'London12', 'England');

-- --------------------------------------------------------

--
-- Table structure for table `property`
--

CREATE TABLE `property` (
  `property_id` int(11) NOT NULL,
  `property_name` varchar(100) NOT NULL,
  `type` varchar(50) NOT NULL,
  `floor` varchar(100) NOT NULL,
  `minimum_stay` int(11) NOT NULL,
  `added_on` date NOT NULL,
  `available_from` date NOT NULL,
  `description` text NOT NULL,
  `property_featured_image` varchar(10000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `property`
--

INSERT INTO `property` (`property_id`, `property_name`, `type`, `floor`, `minimum_stay`, `added_on`, `available_from`, `description`, `property_featured_image`) VALUES
(1, 'lhjajkshdjkad', 'Apartment', '1', 6, '2015-05-03', '1986-05-03', 'sbdfjkhdsjkfhkjldshfjkldshfjk', ''),
(2, 'qseqwqwe', 'Apartment', '12', 6, '2018-05-03', '2012-05-03', 'sdadjasdjas', ''),
(3, 'qseqwqwe', 'Apartment', '12', 6, '2018-05-03', '2012-05-03', 'sdadjasdjas', ''),
(4, 'qseqwqwe', 'Apartment', '12', 6, '2018-05-03', '2012-05-03', 'sdadjasdjas', ''),
(5, 'qseqwqwe', 'Apartment', '12', 6, '2018-05-03', '2012-05-03', 'sdadjasdjas', ''),
(6, 'qseqwqwe', 'Apartment', '12', 6, '2018-05-03', '2012-05-03', 'sdadjasdjas', ''),
(7, 'qseqwqwe', 'Apartment', '12', 6, '2018-05-03', '2012-05-03', 'sdadjasdjas', ''),
(8, 'qseqwqwe', 'Apartment', '12', 6, '2018-05-03', '2012-05-03', 'sdadjasdjas', ''),
(9, 'qseqwqwe', 'Apartment', '12', 6, '2018-05-03', '2012-05-03', 'sdadjasdjas', ''),
(10, 'qseqwqwe', 'Apartment', '12', 6, '2018-05-03', '2012-05-03', 'sdadjasdjas', ''),
(11, 'xvcxzc', '1', '3', 6, '1986-05-03', '2001-05-03', '', ''),
(12, 'test property', 'Studio', '2', 6, '2018-01-01', '2018-01-01', '', ''),
(13, 'test property', 'Studio', '2', 6, '2018-01-01', '2018-01-01', '', ''),
(14, 'test property', 'Studio', '2', 6, '2018-01-01', '2018-01-01', '', ''),
(15, 'test property', 'Studio', '2', 6, '2018-01-01', '2018-01-01', '', ''),
(16, 'test_property', 's', '2', 3, '2019-01-01', '2018-02-01', '', ''),
(17, 'test_property', 's', '2', 3, '2019-01-01', '2018-02-01', '', ''),
(18, 'test_property', 's', '2', 3, '2019-01-01', '2018-02-01', '', ''),
(19, 'test_property', 's', '2', 3, '2019-01-01', '2018-02-01', '', ''),
(20, 'test_pic', 'Studio', '2', 6, '2018-01-01', '2018-01-01', '', ''),
(21, 'test_pic1', 'Studio', '2', 6, '2018-01-01', '2019-01-01', '', ''),
(22, 'test_pic1', 'Studio', '2', 6, '2018-01-01', '2019-01-01', '', ''),
(23, 'TESTPic2', 'Studio', '1', 6, '2019-01-01', '2019-01-01', '', ''),
(24, 'dfsf', 'Studio', '2', 6, '2018-01-01', '2180-01-01', '', ''),
(25, 'test_pic3', 'Studio', '2', 6, '2018-01-01', '2019-01-01', '', ''),
(26, 'test_pic3', 'Studio', '2', 6, '2018-01-01', '2019-01-01', '', ''),
(27, 'fdfgdg', 'Studio', '2', 6, '2018-01-01', '2018-01-01', '', ''),
(28, 'fdfgdg', 'Studio', '2', 6, '2018-01-01', '2018-01-01', '', ''),
(29, 'asdsad', 'asd', '1', 6, '2018-01-01', '2018-01-01', '', ''),
(30, 'Doe2', 'Studio', '2', 6, '2018-01-01', '2019-01-01', '', ''),
(31, 'asdsa', 'Studio', '2', 5, '0001-01-01', '0001-01-01', '', ''),
(32, 'asdsa', 'Studio', '2', 5, '0001-01-01', '0001-01-01', '', ''),
(33, 'sadad', 'a', '2', 6, '0001-01-01', '0001-01-01', '', ''),
(34, 'asdas', 'asdas', '2', 6, '0010-01-01', '0001-01-01', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `property_amenities`
--

CREATE TABLE `property_amenities` (
  `property_id` int(11) NOT NULL,
  `amenities_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `property_amenities`
--

INSERT INTO `property_amenities` (`property_id`, `amenities_id`) VALUES
(2, 1),
(2, 2),
(2, 3),
(2, 4),
(2, 5),
(3, 1),
(3, 2),
(3, 3),
(3, 4),
(3, 5),
(4, 1),
(4, 2),
(4, 3),
(4, 4),
(4, 5),
(5, 1),
(5, 2),
(5, 3),
(5, 4),
(5, 5),
(6, 1),
(6, 2),
(6, 3),
(6, 4),
(6, 5),
(7, 1),
(7, 2),
(7, 3),
(7, 4),
(7, 5),
(8, 1),
(8, 2),
(8, 3),
(8, 4),
(8, 5),
(9, 1),
(9, 2),
(9, 3),
(9, 4),
(9, 5),
(10, 1),
(10, 2),
(10, 3),
(10, 4),
(10, 5),
(19, 1),
(19, 2),
(19, 3),
(19, 4),
(20, 1),
(20, 2),
(20, 3),
(21, 1),
(21, 2),
(21, 3),
(22, 1),
(22, 2),
(22, 3),
(23, 1),
(23, 2),
(24, 1),
(24, 2),
(25, 1),
(25, 2),
(26, 1),
(26, 2),
(27, 1),
(27, 2),
(27, 3),
(28, 1),
(28, 2),
(28, 3),
(29, 1),
(29, 2),
(30, 1),
(30, 2),
(31, 1),
(31, 2),
(32, 1),
(32, 2),
(33, 1),
(33, 2);

-- --------------------------------------------------------

--
-- Table structure for table `property_bills`
--

CREATE TABLE `property_bills` (
  `property_id` int(11) NOT NULL,
  `bills_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `property_bills`
--

INSERT INTO `property_bills` (`property_id`, `bills_id`) VALUES
(10, 1),
(10, 2),
(10, 3),
(10, 0),
(19, 0),
(19, 0),
(19, 0),
(20, 0),
(20, 0),
(20, 0),
(21, 0),
(21, 0),
(21, 0),
(22, 0),
(22, 0),
(22, 0),
(23, 0),
(23, 0),
(24, 0),
(24, 0),
(25, 0),
(25, 0),
(26, 0),
(26, 0),
(27, 0),
(27, 0),
(28, 0),
(28, 0),
(29, 0),
(29, 0),
(30, 0),
(30, 0),
(31, 0),
(32, 0),
(33, 0),
(33, 0);

-- --------------------------------------------------------

--
-- Table structure for table `property_rules`
--

CREATE TABLE `property_rules` (
  `property_id` int(11) NOT NULL,
  `rules_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `property_rules`
--

INSERT INTO `property_rules` (`property_id`, `rules_id`) VALUES
(9, 1),
(9, 2),
(10, 1),
(10, 2),
(19, 0),
(19, 0),
(20, 0),
(20, 0),
(21, 0),
(21, 0),
(22, 0),
(22, 0),
(23, 0),
(23, 0),
(24, 0),
(24, 0),
(25, 0),
(25, 0),
(26, 0),
(26, 0),
(27, 0),
(27, 0),
(28, 0),
(28, 0),
(29, 0),
(29, 0),
(30, 0),
(30, 0),
(31, 0),
(32, 0),
(33, 0),
(33, 0);

-- --------------------------------------------------------

--
-- Table structure for table `rules`
--

CREATE TABLE `rules` (
  `rule_id` int(11) NOT NULL,
  `values` varchar(100) NOT NULL,
  `description` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rules`
--

INSERT INTO `rules` (`rule_id`, `values`, `description`) VALUES
(1, 'No Pets', ''),
(2, 'No Smoking', '');

-- --------------------------------------------------------

--
-- Table structure for table `testimonial`
--

CREATE TABLE `testimonial` (
  `testimonial_id` int(11) NOT NULL,
  `testimonial_desc` text NOT NULL,
  `status` int(11) NOT NULL,
  `client_name` varchar(100) NOT NULL,
  `client_location` varchar(100) NOT NULL,
  `client_image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `testimonial`
--

INSERT INTO `testimonial` (`testimonial_id`, `testimonial_desc`, `status`, `client_name`, `client_location`, `client_image`) VALUES
(1, 'Amazing Website', 1, 'Captain America', 'USA', '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(20) NOT NULL,
  `password` text NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `gender` char(1) NOT NULL,
  `date_of_birth` date NOT NULL,
  `email_id` varchar(100) NOT NULL,
  `address` text NOT NULL,
  `govt_identification` varchar(50) NOT NULL,
  `phone` int(10) NOT NULL,
  `profile_pic` text NOT NULL,
  `facebook_id` text NOT NULL,
  `google_id` text NOT NULL,
  `status` int(1) NOT NULL DEFAULT '0',
  `active_inactive` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `password`, `first_name`, `last_name`, `gender`, `date_of_birth`, `email_id`, `address`, `govt_identification`, `phone`, `profile_pic`, `facebook_id`, `google_id`, `status`, `active_inactive`) VALUES
(1, 'e10adc3949ba59abbe56e057f20f883e', 'John', 'Doe', 'M', '2018-05-16', 'john.doe@a.com', 'Bengaluru,Karnataka', '123AQ45', 123456789, '', 'dummytext', 'dummytext', 0, 0),
(2, 'e10adc3949ba59abbe56e057f20f883e', 'John1', 'Doe1', 'M', '2018-05-15', 'a@a.com', 'Bengaluru,karnataka', 'fhgfdgdd', 123456789, '', '', '', 1, 1),
(3, '123456', 'test', 'testLast', 'M', '0000-00-00', 'a@a.com', '', '', 123456789, '', '', '', 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_users`
--
ALTER TABLE `admin_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Amenities`
--
ALTER TABLE `Amenities`
  ADD PRIMARY KEY (`amenities_id`);

--
-- Indexes for table `area`
--
ALTER TABLE `area`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Bills`
--
ALTER TABLE `Bills`
  ADD PRIMARY KEY (`bill_id`);

--
-- Indexes for table `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `property`
--
ALTER TABLE `property`
  ADD PRIMARY KEY (`property_id`);

--
-- Indexes for table `rules`
--
ALTER TABLE `rules`
  ADD PRIMARY KEY (`rule_id`);

--
-- Indexes for table `testimonial`
--
ALTER TABLE `testimonial`
  ADD PRIMARY KEY (`testimonial_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_users`
--
ALTER TABLE `admin_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `Amenities`
--
ALTER TABLE `Amenities`
  MODIFY `amenities_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `area`
--
ALTER TABLE `area`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `Bills`
--
ALTER TABLE `Bills`
  MODIFY `bill_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `city`
--
ALTER TABLE `city`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `property`
--
ALTER TABLE `property`
  MODIFY `property_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `rules`
--
ALTER TABLE `rules`
  MODIFY `rule_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `testimonial`
--
ALTER TABLE `testimonial`
  MODIFY `testimonial_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
