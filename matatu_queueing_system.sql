-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 02, 2018 at 03:09 AM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `matatu_queueing_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `matatu`
--

CREATE TABLE `matatu` (
  `no_plate` varchar(225) NOT NULL,
  `sacco` varchar(225) NOT NULL,
  `route` varchar(25) NOT NULL,
  `id` int(11) NOT NULL,
  `status` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `matatu`
--

INSERT INTO `matatu` (`no_plate`, `sacco`, `route`, `id`, `status`) VALUES
('', 'KCA 657M', 'MILITINI', 0, ''),
('KAA 342W', 'TAHAMID', 'NJORO', 0, 'Active'),
('KBA 435N', 'MOLOLINE', 'TUDOR', 0, 'Active'),
('KBA 867N', '', 'MILITINI', 0, 'Inactive'),
('KBC 456W', 'HIGHWAY', 'PIPELINE', 0, 'Active'),
('KCA 657M', '2NK', 'MAUCHE', 0, 'Active'),
('MOLO LINE', '2NK', 'NJORO', 0, 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `sacco`
--

CREATE TABLE `sacco` (
  `id` int(11) NOT NULL,
  `sacco_name` varchar(225) NOT NULL,
  `county` varchar(225) NOT NULL,
  `status` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sacco`
--

INSERT INTO `sacco` (`id`, `sacco_name`, `county`, `status`) VALUES
(1, 'MOM ', 'MOMBASA', 'Active'),
(2, '2NK', 'NAKURU', 'Active'),
(3, 'TAHAMID', 'MOMBASA', 'Active'),
(4, 'MOLOLINE', 'NAKURU', 'Active'),
(5, 'HIGHWAY', 'NAKURU', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `trips`
--

CREATE TABLE `trips` (
  `id` int(11) NOT NULL,
  `matatu` varchar(25) NOT NULL,
  `login_time` datetime NOT NULL,
  `route` varchar(25) NOT NULL,
  `entered_by` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `trips`
--

INSERT INTO `trips` (`id`, `matatu`, `login_time`, `route`, `entered_by`) VALUES
(1, 'KBA 867N', '2018-07-01 09:08:06', 'MILITINI', ''),
(2, 'KCA 657M', '2018-07-01 08:46:45', 'MILITINI', 'conductor'),
(3, 'KCA 657M', '2018-07-01 09:17:19', 'TUDOR', 'conductor'),
(4, 'KCA 657M', '2018-07-01 09:30:18', 'MSHOMOLONI', 'conductor'),
(5, 'KCA 657M', '2018-07-01 09:30:58', 'TUDOR', 'conductor'),
(6, 'KCA 657M', '2018-07-01 10:04:19', 'NJORO', 'conductor'),
(8, 'KCA 657M', '2018-07-01 11:46:33', 'MILITINI', 'fraka'),
(9, 'KCA 657M', '2018-06-30 11:20:38', 'MILITINI', 'conductor'),
(10, 'KCA 657M', '2018-07-01 01:01:59', 'TUDOR', 'conductor'),
(11, 'KCA 657M', '2018-07-02 02:27:25', 'MAUCHE', 'conductor');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(225) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` varchar(15) NOT NULL,
  `mobile` varchar(25) NOT NULL,
  `matatu` varchar(25) NOT NULL,
  `level` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `status`, `mobile`, `matatu`, `level`) VALUES
(1, 'conductor', '12345678', 'Active', '0707071957', 'KCA 657M', 'Conductor'),
(3, 'James', '12345678', 'Active', '070707234', 'MOLO LINE', 'admin'),
(4, 'FRAKA', '12345678', 'Inactive', '0707074534', 'KBA 435N', ''),
(5, 'PETER', '12345678', 'Active', '0756423126', 'KBA 435N', ''),
(6, 'FRANCK', '12345678', 'Active', '075656644', 'KBC 456W', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `matatu`
--
ALTER TABLE `matatu`
  ADD PRIMARY KEY (`no_plate`);

--
-- Indexes for table `sacco`
--
ALTER TABLE `sacco`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `trips`
--
ALTER TABLE `trips`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `sacco`
--
ALTER TABLE `sacco`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `trips`
--
ALTER TABLE `trips`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
