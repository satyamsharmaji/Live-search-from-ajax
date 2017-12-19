-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 19, 2017 at 08:40 AM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `satyam-php`
--

-- --------------------------------------------------------

--
-- Table structure for table `ajax-php`
--

CREATE TABLE `ajax-php` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `maritul_status` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ajax-php`
--

INSERT INTO `ajax-php` (`id`, `name`, `email`, `date`, `maritul_status`) VALUES
(1, 'a', 'a@gmail.com', '2017-11-08 08:59:34', 0),
(2, 'b', 'b@gmail.com', '2017-11-08 09:11:55', 1),
(3, 'c', 'c@gmail.com', '2017-11-08 09:00:08', 1),
(4, 'd', 'd@gmail.com', '2017-11-08 09:00:17', 1),
(5, 'e', 'e@gmail.com', '2017-11-08 09:00:26', 1),
(6, 'f', 'f@gmail.com', '2017-11-08 09:00:35', 0),
(7, 'g', 'g@gmail.com', '2017-11-08 09:00:44', 1),
(8, 'h', 'h@gmail.com', '2017-11-08 09:00:53', 0),
(9, 'i', 'i@gmail.com', '2017-11-08 09:01:03', 0),
(10, 'j', 'j@gmail.com', '2017-11-08 09:01:12', 0),
(11, 'k', 'k@gmail.com', '2017-11-08 09:08:11', 1),
(12, 'l', 'l@gmail.com', '2017-11-08 09:01:31', 0),
(13, 'm', 'm@gmail.com', '2017-11-08 09:01:41', 0),
(14, 'n', 'n@gmail.com', '2017-11-08 09:01:50', 0),
(15, 'o', 'o@gmail.com', '2017-11-08 09:01:58', 0),
(16, 'p', 'p@gmail.com', '2017-11-08 09:02:04', 0),
(17, 'q', 'q@gmail.com', '2017-11-08 09:02:12', 0),
(18, 'r', 'r@gmail.com', '2017-11-08 09:02:20', 0),
(19, 's', 's@gmail.com', '2017-11-08 09:02:33', 0),
(20, 't', 't@gmail.com', '2017-11-08 09:02:45', 0),
(21, 'u', 'u@gmail.com', '2017-11-08 09:02:56', 0),
(22, 'v', 'v@gmail.com', '2017-11-08 09:03:11', 0),
(23, 'w', 'w@gmail.com', '2017-11-08 09:03:17', 0),
(24, 'x', 'x@gmail.com', '2017-11-08 09:03:25', 0),
(25, 'y', 'y@gmail.com', '2017-11-08 09:03:37', 0),
(26, 'stayam', 'sahslk', '2017-11-13 04:38:05', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ajax-php`
--
ALTER TABLE `ajax-php`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ajax-php`
--
ALTER TABLE `ajax-php`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
