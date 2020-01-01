-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 01, 2020 at 04:13 PM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `church`
--

-- --------------------------------------------------------

--
-- Table structure for table `church_admin`
--

CREATE TABLE `church_admin` (
  `id` int(10) NOT NULL,
  `username` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `email` varchar(150) NOT NULL,
  `location` varchar(150) NOT NULL,
  `mobile` varchar(20) NOT NULL,
  `fullname` varchar(200) NOT NULL,
  `church_name` varchar(200) NOT NULL,
  `short_name` varchar(255) NOT NULL,
  `JOINDATE` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `church_admin`
--

INSERT INTO `church_admin` (`id`, `username`, `password`, `email`, `location`, `mobile`, `fullname`, `church_name`, `short_name`, `JOINDATE`) VALUES
(4, 'richy', '$2y$10$TIAtb2iWqncFrvaks1SfueGuXCjzD8eV/5OnIixboPyLrp3e8RgTC', 'glory@gmail.com', 'Asokwa', '0545804166', 'Gyasi', 'Glory Of God', '', '2012-06-19'),
(32, 'emmanuel', '$2y$10$TYvcMVLGz5CGb6vDjrJXPeRcHivqxjKyfz1Uj1KtAlVLiJ3ZrZzDG', 'papaswagger12@gmail.com', 'Asokwa', '0656789654', 'Emmanuel', 'Emmanuel Chapel', '', '0000-00-00'),
(33, '0656789654', '$2y$10$GGZhUUiwb2kv7rwD6yMy/OhG4LO2GhIM0aQQz/sCU/d5N.hunZD/m', 'Asokwa', 'Emmanuel', 'papaswagger12@gmail.', 'Emmanuel', 'Emmanuel Chapel', '', '0000-00-00'),
(34, 'oppong', '$2y$10$qjvyT2W2iOze2Lzy694sUOvycOE94SvdgbaPA0P8qazSuITuEOOVu', 'swanzybenjamin18@gmail.com', 'Junction', '0656789654', 'Joel', 'Assemblies Of God', 'Assemblies', '0000-00-00'),
(56, 'king', '$2y$10$vsBYwbL3mHzruPW0W6WSlu.XlURV5kQr62kWNuRyxe6vxTMzBe.dC', 'christ@yahoo.com', 'Fomena', '0545804166', 'Henry', 'Christ the King', 'Christ', '0000-00-00'),
(57, 'akoto', '$2y$10$X8QyYr279OuUmFzXJGodyuFSDPm4pVsKfAk0bTpJgR.9.G4kXDGbC', 'akoto@yahoo.com', 'AYEDUASE', '0200214569', 'AKOTO', 'akots home', 'AKHOME', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(10) NOT NULL,
  `username` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `id` int(10) NOT NULL,
  `name` varchar(200) NOT NULL,
  `description` text NOT NULL,
  `date_created` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `name`, `description`, `date_created`) VALUES
(1, 'hi', 'hi2', '2012-12-19'),
(2, 'Amazing', 'amazing girls', '2012-12-19'),
(3, 'fry', 'fry1', '2012-12-19'),
(4, 'se', 'se1', '2012-12-19'),
(5, 'GROUP1', 'HE', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `id` int(11) NOT NULL,
  `firstName` varchar(100) NOT NULL,
  `lastName` varchar(200) NOT NULL,
  `otherName` varchar(200) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `email` varchar(150) NOT NULL,
  `nationality` varchar(50) NOT NULL,
  `address` varchar(150) NOT NULL,
  `hometown` varchar(150) NOT NULL,
  `job` varchar(200) NOT NULL,
  `JOINDATE` date NOT NULL,
  `gender` varchar(200) NOT NULL,
  `status` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`id`, `firstName`, `lastName`, `otherName`, `phone`, `email`, `nationality`, `address`, `hometown`, `job`, `JOINDATE`, `gender`, `status`) VALUES
(3, 'Richard', 'Gyasi', '', '0244818454', 'richy@yahoo.com', '', '', 'kumasi', 'student', '2019-12-16', 'Male', 'Separated');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) NOT NULL,
  `username` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `church_admin`
--
ALTER TABLE `church_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `church_admin`
--
ALTER TABLE `church_admin`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
