-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 11, 2021 at 03:06 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.3.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dawaaii_2`
--

-- --------------------------------------------------------

--
-- Table structure for table `location`
--

CREATE TABLE `location` (
  `id` int(11) NOT NULL,
  `searched_location` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `location`
--

INSERT INTO `location` (`id`, `searched_location`) VALUES
(1, 'Mirzapur'),
(2, 'Mau'),
(3, 'Allahabad'),
(4, 'Gorakhpur'),
(5, 'Ara'),
(6, 'Rewa'),
(7, 'Gaya'),
(8, 'Patna'),
(9, 'Ranchi'),
(10, 'Jamshedpur');

-- --------------------------------------------------------

--
-- Table structure for table `medicine_search`
--

CREATE TABLE `medicine_search` (
  `id` int(255) NOT NULL,
  `med_shop` varchar(300) NOT NULL,
  `shop_address` varchar(500) NOT NULL,
  `shop_location` varchar(255) NOT NULL,
  `contact` bigint(100) NOT NULL,
  `available_status` varchar(100) NOT NULL,
  `meds` varchar(400) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `medicine_search`
--

INSERT INTO `medicine_search` (`id`, `med_shop`, `shop_address`, `shop_location`, `contact`, `available_status`, `meds`) VALUES
(1, 'Avadh Medicals', 'Hyderabad Gate, Near Shree Nandani Vatika, B.H.U, Susuwahi, Varanasi, Uttar Pradesh 221005', 'Allahabad\r\n', 9631349717, 'Available', 'Remdesiver, Favipiravir, Fabiflu, Tocilizumab'),
(2, 'Nitin Medical Stores', 'N-/236, A-3, 8, BHU Rd, Banaras Hindu University Campus, Varanasi, Uttar Pradesh 221005', 'Mirzapur', 9631349717, 'Available', 'Remdesiver, Favipiravir'),
(3, 'Bharat Medical Store', ' BHU Rd, Opposite Upkar Hospital, Sundarpur, Newada, Varanasi, Uttar Pradesh 221005', 'Mirzapur', 9631349717, 'Available', ' Fabiflu, Tocilizumab'),
(4, 'Pal Medical Store', 'Shop No-3, BHU Rd, Karaundi Chauraha, Rajeev Nagar Colony, Nandan Nagar, Newada, Varanasi, Uttar Pradesh 221005', 'Allahabad', 9631349717, 'Available', 'Remdesiver, Favipiravir, Fabiflu, Tocilizumab'),
(9, '1', '1', '1', 1, 'Available', '1');

-- --------------------------------------------------------

--
-- Table structure for table `oxy_search`
--

CREATE TABLE `oxy_search` (
  `id` int(255) NOT NULL,
  `med_shop` varchar(300) NOT NULL,
  `shop_address` varchar(500) NOT NULL,
  `shop_location` varchar(255) NOT NULL,
  `contact` bigint(100) NOT NULL,
  `available_status` varchar(100) NOT NULL,
  `oxy_equipments` varchar(400) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `oxy_search`
--

INSERT INTO `oxy_search` (`id`, `med_shop`, `shop_address`, `shop_location`, `contact`, `available_status`, `oxy_equipments`) VALUES
(1, 'Avadh Medicals', 'Hyderabad Gate, Near Shree Nandani Vatika, B.H.U, Susuwahi, Varanasi, Uttar Pradesh 221005', 'Prayagraj', 9631349717, 'Available', 'Oxygen Kit, Cylinders, Refilling Centers'),
(2, 'Nitin Medical Stores', 'N-/236, A-3, 8, BHU Rd, Banaras Hindu University Campus, Varanasi, Uttar Pradesh 221005', 'Mirzapur', 9631349717, 'Available', 'Oxygen Kit, Cylinders, Refilling Centers'),
(3, 'Bharat Medical Store', ' BHU Rd, Opposite Upkar Hospital, Sundarpur, Newada, Varanasi, Uttar Pradesh 221005', 'Mirzapur', 9631349717, 'Available', 'Refilling Centers'),
(4, 'Pal Medical Store', 'Shop No-3, BHU Rd, Karaundi Chauraha, Rajeev Nagar Colony, Nandan Nagar, Newada, Varanasi, Uttar Pradesh 221005', 'Prayagraj', 9631349717, 'Available', 'Oxygen Kit, Cylinders, Refilling Centers'),
(36, '1', '1', 'Ranchi', 1, 'Available', '1'),
(37, '1', '1', 'Ranchi', 1, 'Available', '2');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `location`
--
ALTER TABLE `location`
  ADD PRIMARY KEY (`id`,`searched_location`);

--
-- Indexes for table `medicine_search`
--
ALTER TABLE `medicine_search`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oxy_search`
--
ALTER TABLE `oxy_search`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `location`
--
ALTER TABLE `location`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `medicine_search`
--
ALTER TABLE `medicine_search`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `oxy_search`
--
ALTER TABLE `oxy_search`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
