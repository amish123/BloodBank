-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 15, 2018 at 09:00 AM
-- Server version: 5.7.14
-- PHP Version: 7.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bloodbank`
--

-- --------------------------------------------------------

--
-- Table structure for table `hospital`
--

CREATE TABLE `hospital` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hospital`
--

INSERT INTO `hospital` (`id`, `name`, `email`, `password`) VALUES
(1, 'AIIMS Delhi', 'aiimsdelhi@gmail.com', '375bf323aab714e9de9229d830d81fb3'),
(2, 'fortis escort', 'fortisescort@gmail.com', '4bd079690c1718391db42231ca5d0339');

-- --------------------------------------------------------

--
-- Table structure for table `reciever`
--

CREATE TABLE `reciever` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `grp` varchar(5) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reciever`
--

INSERT INTO `reciever` (`id`, `name`, `email`, `password`, `grp`) VALUES
(7, 'abhay', 'abhay@gmail.com', '2f01618053cddf6b97f4f88df0d2d6af', 'AB+'),
(1, 'amish', 'amish@gmail.com', 'df702733e488a4bb89c7b6fea085fa76', 'B+');

-- --------------------------------------------------------

--
-- Table structure for table `request`
--

CREATE TABLE `request` (
  `id` int(11) NOT NULL,
  `requestor` varchar(50) NOT NULL,
  `sampleid` varchar(50) NOT NULL,
  `hospitalemail` varchar(50) DEFAULT NULL,
  `samplename` varchar(20) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `request`
--

INSERT INTO `request` (`id`, `requestor`, `sampleid`, `hospitalemail`, `samplename`) VALUES
(27, 'abhay@gmail.com', '14', 'aiimsdelhi@gmail.com', 'h3w2');

-- --------------------------------------------------------

--
-- Table structure for table `samples`
--

CREATE TABLE `samples` (
  `id` int(11) NOT NULL,
  `samplename` varchar(50) NOT NULL,
  `type` varchar(50) NOT NULL,
  `hospitalid` int(8) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `samples`
--

INSERT INTO `samples` (`id`, `samplename`, `type`, `hospitalid`) VALUES
(17, 'j7h4', 'O-', 2),
(16, 'h5s3', 'AB-', 2),
(15, 'h6y4', 'B-', 1),
(14, 'h3w2', 'AB+', 1),
(13, 'g2d3', 'AB+', 1),
(12, 'h1b2', 'A', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `hospital`
--
ALTER TABLE `hospital`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reciever`
--
ALTER TABLE `reciever`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `request`
--
ALTER TABLE `request`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `samples`
--
ALTER TABLE `samples`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `hospital`
--
ALTER TABLE `hospital`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `reciever`
--
ALTER TABLE `reciever`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `request`
--
ALTER TABLE `request`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT for table `samples`
--
ALTER TABLE `samples`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
