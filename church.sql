-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 02, 2020 at 09:51 AM
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
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(10) NOT NULL,
  `username` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `date_added` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `username`, `password`, `date_added`) VALUES
(1, 'emmanuel', '$2y$10$JmnIafd39KFjU6udZHvEauxKalKSx9R0OQRPOh3ukTHS0kligB9lS', '0000-00-00'),
(2, 'kwame', '$2y$10$jch.xkrqPOb/ZbseiwHj/uvRn0A9ugJepxEwxVuiE9nmhnj7QOza6', '0000-00-00'),
(3, 'henry', '$2y$10$HmU.iz/BW7E0A/x92Kcwrefc.5ImivI9mIm7Gt.U7MkrH4owTSUEa', '2020-01-30'),
(4, 'emmanuel', '$2y$10$6K/0GBrzpIVqLTMd17p9ju6ihxey0io0YbOO/E9POKqFUbS2TMY9i', '2020-01-30'),
(5, 'henry', '$2y$10$x15b5t307ent3A4.6KAwfu0mtnVsE8e7wEkidN3nFgbv6UAhqKhl.', '2020-01-30'),
(6, 'testing', '$2y$10$33z.HBhb0elBsRU.idtklO/bZujGUeR2lNectK7OqHV5IPvtNeFhq', '2020-01-30');

-- --------------------------------------------------------

--
-- Table structure for table `calendar`
--

CREATE TABLE `calendar` (
  `id` int(11) NOT NULL,
  `event_name` varchar(150) DEFAULT NULL,
  `theme` varchar(255) DEFAULT NULL,
  `leader` varchar(255) DEFAULT NULL,
  `schedule` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `event_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `calendar`
--

INSERT INTO `calendar` (`id`, `event_name`, `theme`, `leader`, `schedule`, `description`, `event_date`) VALUES
(1, 'easter convention', 'dead of christ', 'Henry', 'Weekly', '2020-01-22', '0000-00-00'),
(2, 'easter convention', 'dead of christ', 'Asamoah', 'Monthly', '2020-01-21', '0000-00-00'),
(3, 'easter convention', 'dead of christ', 'Asamoah', 'Monthly', 'hello', NULL),
(4, 'easter convention', 'dead of christ', 'Henry', 'Weekly', 'hello', '2020-01-16');

-- --------------------------------------------------------

--
-- Table structure for table `church_admin`
--

CREATE TABLE `church_admin` (
  `id` int(11) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `church_name` varchar(255) NOT NULL,
  `short_name` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `JOINDATE` date DEFAULT NULL,
  `status` varchar(10) NOT NULL DEFAULT 'Inactive'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `church_admin`
--

INSERT INTO `church_admin` (`id`, `fullname`, `church_name`, `short_name`, `location`, `email`, `mobile`, `username`, `password`, `JOINDATE`, `status`) VALUES
(43, 'Emmanuel', 'Emmanuel Chapel', 'EmmaChurch', 'Asokwa', 'emma@yahoo.com', '0656789654', 'emmanuel', '$2y$10$OQwQU2a/q1E6VJVxuyEGm.jDvY3xHKtAwLZMB9aC2bWqHPl2Q6JHy', '0000-00-00', 'Inactive'),
(44, 'grace', 'grace of God', 'grace', 'Fomena', 'grace@yahoo.com', '0656789654', 'grace', '$2y$10$lPsKrcI1sEinj5SdtsqiluSiDaFwsDVDUcnpyw3tmexL2iuDpC9Oi', '0000-00-00', 'Inactive');

-- --------------------------------------------------------

--
-- Table structure for table `church_group`
--

CREATE TABLE `church_group` (
  `group_id` int(11) NOT NULL,
  `group_name` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `church_group`
--

INSERT INTO `church_group` (`group_id`, `group_name`, `description`) VALUES
(2, 'youth', 'youth of the church'),
(4, 'lion den', 'lion for christ'),
(5, 'comedian', 'comedians for christ');

-- --------------------------------------------------------

--
-- Table structure for table `counselling`
--

CREATE TABLE `counselling` (
  `id` int(11) NOT NULL,
  `cnsel_date` date DEFAULT NULL,
  `cnsel_time` time NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `counselling`
--

INSERT INTO `counselling` (`id`, `cnsel_date`, `cnsel_time`) VALUES
(1, '0000-00-00', '12:11:41'),
(2, '0000-00-00', '00:00:00'),
(3, '0000-00-00', '00:00:00'),
(4, '0000-00-00', '00:00:00'),
(5, '2020-01-15', '17:45:00'),
(6, '2020-01-25', '09:30:00');

-- --------------------------------------------------------

--
-- Table structure for table `funeral`
--

CREATE TABLE `funeral` (
  `id` int(11) NOT NULL,
  `person` varchar(150) DEFAULT NULL,
  `amount` varchar(255) DEFAULT NULL,
  `bereaved` varchar(255) DEFAULT NULL,
  `leader` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `funeral`
--

INSERT INTO `funeral` (`id`, `person`, `amount`, `bereaved`, `leader`) VALUES
(1, '', '', '', ''),
(2, '', '', '', ''),
(3, '', '', '', ''),
(4, '', '700', 'Victor', 'Henry'),
(5, 'george', '45', 'Victor', 'Henry'),
(6, 'king', '23', 'henry', 'Asamoah');

-- --------------------------------------------------------

--
-- Table structure for table `member_group`
--

CREATE TABLE `member_group` (
  `group_id` int(11) NOT NULL,
  `group_name` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `member_group`
--

INSERT INTO `member_group` (`group_id`, `group_name`, `description`) VALUES
(2, 'youth', 'hi');

-- --------------------------------------------------------

--
-- Table structure for table `new_convert`
--

CREATE TABLE `new_convert` (
  `id` int(11) NOT NULL,
  `name` varchar(150) DEFAULT NULL,
  `invited_by` varchar(255) DEFAULT NULL,
  `convert_date` date DEFAULT NULL,
  `mobile` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `baptism_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `new_convert`
--

INSERT INTO `new_convert` (`id`, `name`, `invited_by`, `convert_date`, `mobile`, `email`, `address`, `baptism_date`) VALUES
(1, 'Emmanuel', 'John', '2020-01-08', '0545804166', 'emma@yahoo.com', '123 kumasi', '2020-01-20');

-- --------------------------------------------------------

--
-- Table structure for table `pastor_event`
--

CREATE TABLE `pastor_event` (
  `id` int(10) NOT NULL,
  `event_name` varchar(200) NOT NULL,
  `event_date` date NOT NULL,
  `location` varchar(200) NOT NULL,
  `schedule` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pastor_event`
--

INSERT INTO `pastor_event` (`id`, `event_name`, `event_date`, `location`, `schedule`) VALUES
(1, '', '0000-00-00', '', ''),
(2, '', '2020-01-16', 'fomena', 'Morning'),
(3, 'Second coming of christ', '2020-01-18', 'Ho', 'Morning'),
(4, 'Second coming of christ', '2020-01-09', 'Ho', 'Evening'),
(5, 'Second coming of christ', '2020-01-22', 'kumasi', 'Afternoon'),
(6, 'Second coming of christ', '2020-01-25', 'fomena', 'Evening');

-- --------------------------------------------------------

--
-- Table structure for table `preaching`
--

CREATE TABLE `preaching` (
  `id` int(11) NOT NULL,
  `host_church` varchar(255) DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `preach_date` date DEFAULT NULL,
  `schedule` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `preaching`
--

INSERT INTO `preaching` (`id`, `host_church`, `location`, `preach_date`, `schedule`) VALUES
(1, '', '', NULL, ''),
(2, '', '', '0000-00-00', ''),
(3, 'Assemblies of God', 'fomena', '2020-01-24', 'Morning'),
(4, 'french church', 'Ho', '2020-01-22', 'Evening');

-- --------------------------------------------------------

--
-- Table structure for table `sermon`
--

CREATE TABLE `sermon` (
  `id` int(11) NOT NULL,
  `preacher` varchar(150) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `event_type` varchar(255) DEFAULT NULL,
  `key_scriptures` text DEFAULT NULL,
  `notes` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sermon`
--

INSERT INTO `sermon` (`id`, `preacher`, `title`, `event_type`, `key_scriptures`, `notes`) VALUES
(1, 'eugene', 'feeding', 'Sunday Preaching', 'hello', 'hi');

-- --------------------------------------------------------

--
-- Table structure for table `sunday_class`
--

CREATE TABLE `sunday_class` (
  `id` int(10) NOT NULL,
  `member` varchar(200) NOT NULL,
  `class` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sunday_class`
--

INSERT INTO `sunday_class` (`id`, `member`, `class`) VALUES
(1, 'kwame', 'jerusalem'),
(2, 'kwame', 'jerusalem'),
(3, '', 'jerusalem'),
(4, 'Asamoah', 'accra');

-- --------------------------------------------------------

--
-- Table structure for table `sunday_school`
--

CREATE TABLE `sunday_school` (
  `id` int(10) NOT NULL,
  `class` varchar(200) NOT NULL,
  `teacher` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sunday_school`
--

INSERT INTO `sunday_school` (`id`, `class`, `teacher`) VALUES
(4, 'jerusalem', 'emma'),
(5, 'jerusalem', 'emma'),
(6, 'jerusalem', 'emma'),
(7, 'jerusalem', 'emma'),
(8, 'kumasi', 'kofi'),
(9, 'kumasi', 'kofi'),
(10, 'accra', 'yaw');

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE `tasks` (
  `task_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `start_date` date DEFAULT NULL,
  `due_date` date DEFAULT NULL,
  `status` tinyint(4) NOT NULL,
  `priority` tinyint(4) NOT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `visitors`
--

CREATE TABLE `visitors` (
  `id` int(11) NOT NULL,
  `person` varchar(150) DEFAULT NULL,
  `mobile` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `member` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `visitors`
--

INSERT INTO `visitors` (`id`, `person`, `mobile`, `address`, `location`, `member`) VALUES
(1, 'Emmanuel', '0545804166', '123 kumasi', 'fomena', 'Sandra'),
(2, 'jackie', '0545804166', '123 kumasi', 'kumasi', 'Asamoah');

-- --------------------------------------------------------

--
-- Table structure for table `welfare`
--

CREATE TABLE `welfare` (
  `id` int(11) NOT NULL,
  `person` varchar(255) DEFAULT NULL,
  `amount` varchar(255) DEFAULT NULL,
  `date_paid` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `welfare`
--

INSERT INTO `welfare` (`id`, `person`, `amount`, `date_paid`) VALUES
(1, 'catty', '20', '2020-01-24');

-- --------------------------------------------------------

--
-- Table structure for table `youth_registration`
--

CREATE TABLE `youth_registration` (
  `id` int(11) NOT NULL,
  `name` varchar(150) DEFAULT NULL,
  `gender` varchar(255) DEFAULT NULL,
  `age` varchar(255) DEFAULT NULL,
  `working_status` varchar(255) DEFAULT NULL,
  `education` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `youth_registration`
--

INSERT INTO `youth_registration` (`id`, `name`, `gender`, `age`, `working_status`, `education`, `email`, `address`) VALUES
(1, 'Emmanuel', 'Male', '22', 'Self-Employed', 'Tertiary', 'emma@yahoo.com', '123 kumasi'),
(2, 'rich', 'Male', '19', 'Self-Employed', 'Senior High School', 'glory@gmail.com', '123 kumasi'),
(3, 'Georgina', 'Female', '27', 'Unemployed', 'Junior High School', 'georgina@yahoo.com', '123 kumasi'),
(4, 'rich', 'Male', '16', 'Self-Employed', 'Junior High School', 'richy@yahoo.com', '123 kumasi');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `calendar`
--
ALTER TABLE `calendar`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `church_admin`
--
ALTER TABLE `church_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `church_group`
--
ALTER TABLE `church_group`
  ADD PRIMARY KEY (`group_id`);

--
-- Indexes for table `counselling`
--
ALTER TABLE `counselling`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `funeral`
--
ALTER TABLE `funeral`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `member_group`
--
ALTER TABLE `member_group`
  ADD PRIMARY KEY (`group_id`);

--
-- Indexes for table `new_convert`
--
ALTER TABLE `new_convert`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pastor_event`
--
ALTER TABLE `pastor_event`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `preaching`
--
ALTER TABLE `preaching`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sermon`
--
ALTER TABLE `sermon`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sunday_class`
--
ALTER TABLE `sunday_class`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sunday_school`
--
ALTER TABLE `sunday_school`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`task_id`);

--
-- Indexes for table `visitors`
--
ALTER TABLE `visitors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `welfare`
--
ALTER TABLE `welfare`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `youth_registration`
--
ALTER TABLE `youth_registration`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `calendar`
--
ALTER TABLE `calendar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `church_admin`
--
ALTER TABLE `church_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `church_group`
--
ALTER TABLE `church_group`
  MODIFY `group_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `counselling`
--
ALTER TABLE `counselling`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `funeral`
--
ALTER TABLE `funeral`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `member_group`
--
ALTER TABLE `member_group`
  MODIFY `group_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `new_convert`
--
ALTER TABLE `new_convert`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pastor_event`
--
ALTER TABLE `pastor_event`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `preaching`
--
ALTER TABLE `preaching`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `sermon`
--
ALTER TABLE `sermon`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sunday_class`
--
ALTER TABLE `sunday_class`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `sunday_school`
--
ALTER TABLE `sunday_school`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tasks`
--
ALTER TABLE `tasks`
  MODIFY `task_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `visitors`
--
ALTER TABLE `visitors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `welfare`
--
ALTER TABLE `welfare`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `youth_registration`
--
ALTER TABLE `youth_registration`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
