-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 06, 2020 at 10:22 AM
-- Server version: 10.3.22-MariaDB-log-cll-lve
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `xsoftgh_booking`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(10) NOT NULL,
  `username` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `telephone` varchar(200) NOT NULL,
  `password` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `email`, `telephone`, `password`) VALUES
(2, 'emmanuel', 'emma@yahoo.com', '0656789654', '$2y$10$0NAoi0DLZh76AC/DqNLzjOxIk4z9ZMaS/EVQn.m9lsr1M/6MnDGl2'),
(3, 'emmanuel', 'papaswagger12@gmail.com', '0244789652', '$2y$10$3EVoRoJbG.Xm9/P2BjyhOeuwyOyZcBrZEWx/8KCsbqaiAdnmqm/vG'),
(4, 'Ebenasare', 'eben@web4ughana.com', '0234', '$2y$10$04R8KfiZ.tASBDNWcnAJG.2hRRYjf4oSjcYXmHJ3rm4OZa1CNN1Cy'),
(5, 'Hakeem', 'oneteyent@gmail.com', '3014123837', '$2y$10$aiHrh4WxIkRlSj8nvuXeJ.a4f/I/bVAdZVgn9iysJZMf/bo6hhuhi'),
(6, 'Nate', 'natbarnor@yahoo.com', '3012735968', '$2y$10$laRwUGuEehfUiE1dSzojjuzP3xCPJodVkDwzz07.GDzGa/1L0F0Au'),
(7, 'Jojo', 'jojo@yahoo.com', '3012735968', '$2y$10$FZJKnGxgiynVXkBR90CSCOum9Kd1DD.166TEhIwsxCF59LBjJP5Tu');

-- --------------------------------------------------------

--
-- Table structure for table `booked`
--

CREATE TABLE `booked` (
  `id` int(10) NOT NULL,
  `event_name` varchar(200) NOT NULL,
  `event_date` date NOT NULL,
  `guest` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `booked`
--

INSERT INTO `booked` (`id`, `event_name`, `event_date`, `guest`) VALUES
(32, 'music fest', '2020-02-27', 'Eben asare boafo \r\nDan net\r\nking Kong'),
(33, 'Fridays', '2020-02-29', 'kofi asare'),
(34, 'Fridays', '2020-02-29', 'kofi asare'),
(35, 'Thursdays', '2020-02-29', 'james\r\nVictor\r\nMary Asnong\r\nstoner\r\nbobby'),
(36, 'Fridays', '2020-03-31', 'freda,ama,yaw');

-- --------------------------------------------------------

--
-- Table structure for table `eventpromote`
--

CREATE TABLE `eventpromote` (
  `id` int(10) NOT NULL,
  `event` varchar(200) NOT NULL,
  `promoter` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `eventpromote`
--

INSERT INTO `eventpromote` (`id`, `event`, `promoter`) VALUES
(5, ' ', ' DJ cloud'),
(6, ' kwahu season', ' kofi'),
(7, 'Thursdays', 'Naija'),
(9, 'Friday', 'Jay'),
(10, 'Fridays', 'DJ Cool');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset`
--

CREATE TABLE `password_reset` (
  `id` int(10) NOT NULL,
  `email` varchar(200) NOT NULL,
  `token` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `password_reset`
--

INSERT INTO `password_reset` (`id`, `email`, `token`) VALUES
(0, '$', '0fdc32721a5e1a662e7dd88db4e77d73895299a5997fba92f0ddc176852089428c3783913dd3fbc0f5d661ebebdabee155fb'),
(0, '$', 'aa368df55921e9bdc8e55628dfee71fc229a3d2a9eddbdcbbc824bd1f10bbce087dceb56a04de9e81c565ed5b99a070718b7'),
(0, 'papaswagger12@gmail.com', 'f7743e4713f394965de212e7d35c5907861d50b29d6fa2b7602082563f7ada69df1f9d44bbe6ebe1cab730f616c2225eb7dc'),
(0, 'papaswagger12@gmail.com', '613e06fc70f1869421fd6c63da98da0e97629b8791da9c7101927dd77177fc804c303bb7835aa090a26595b98f62db19009a'),
(0, 'eben@web4ughana.com', 'b4dad773f939cad5a14063b19fc62db89abd0d530da9dbbce402da0d74d9f8bbe6a306c2fe648812d2577d32644da01c3713'),
(0, 'papaswagger12@gmail.com', '032d0e5f8ec707f896dac4ce2b238f83e2f321d623d2afbb738714344eaec046f559105a9a54d2829645c6de65273f98517e'),
(0, 'papaswagger12@gmail.com', 'e4af51938b9c5d5011dfdc3ec8d5bbae3755259727e325979793b2819b3f0e04858fee9f81935514ada63f8f8e21da8bbfd7'),
(0, 'papaswagger12@gmail.com', '3c4a87e246339da875c61fa43bd084a6c506776697f30d4868700ebaa8972c15cc660232905bd5bb28f2c4772681cf787bde'),
(0, 'papaswagger12@gmail.com', '226232e5d16cb785a49ee76d3260494102fa562c6ccbfe2c48d6401143e57c332dfe3e46803e56fdabc89fffca9fa4fad6f2'),
(0, 'papaswagger12@gmail.com', '0943f036b4238a516fa5d9f3d93f824f7caf4916ba6dd0b0f262017c7445ab21f963eaf6ac433f9e2dc684dc1d1965c11505'),
(0, 'papaswagger12@gmail.com', '944b97695bdba57114a6d8b5e6a59d93b4dfb32058513a1efb4b0958e2ad8af7a6fd8bdc3b577dd24b6c1ed9719c1826f24d'),
(0, 'papaswagger12@gmail.com', 'd3433a2da9cdfc9493b9455c60ec5f67cfd317d8a387710665f43f8b09fbdda03068ef67238f3f7493b6b36adae49357de6a'),
(0, 'papaswagger12@gmail.com', '87b0f0495a3c1445266adf10205e767ddd1bd82c54e966fc96979864897334d1555d4b9a08381e86e8d69c85d28bd55df101'),
(0, 'papaswagger12@gmail.com', '88eba7592a84be56a33dff9b1c0a6107a50ecbacbe8d67620e48fa9eb9e439160fe3070951276b148e7760b88584913ad3a7'),
(0, 'papaswagger12@gmail.com', 'f4d361cd14d5a403c199cc511b1be41df1ac30e91ce8cfada20ef3368793c8b07567170a5de19dc9fa3db6045be300ed04d7'),
(0, 'papaswagger12@gmail.com', '45a763ad0a7f2e68154f6ac9c619ef9c805e148b367f77af4e39f60255c7229aef50fca7d9badaa4f252d4b9cce8b246ba94'),
(0, 'papaswagger12@gmail.com', 'a35b5c41b2b553a73e7c6f5b93e7cd2e0bccf0a2a9e1fe6707e9e5cb91efb0b13ea57ce80a2435207b38f5db632107822c7c'),
(0, 'papaswagger12@gmail.com', 'c05e28471ad07ed36d40d9eaac3ba2e915691091c48e45640213a11e3a4325e096a7278e2cf71d1cb5b0ebb9be2b00dd97f0'),
(0, 'papaswagger12@gmail.com', '736aad00c099b186a4916b80d3aee06610a13d233a8efd609c04ea3954d77f42cccd718d5ffbed1fed67f4fe9832cff2433c'),
(0, 'papaswagger12@gmail.com', '4899dd94801cdcfd08a431516808f8d2e1e3f71502663226faed5de8e1c3f280fc419ff35e343e7c6bf44bcce1f5540224f2'),
(0, 'papaswagger12@gmail.com', 'e7a8460f35e3bd9a2ccc2630225df2a6bf0b33dd111fa325c759587e7f9abfe27c821daba293bc38c94567dc8d081ea8258d'),
(0, 'papaswagger12@gmail.com', '3745ba9f474a083421bafb0c648cc22cd37ae057a9689ac96efff7caf57ec5b835112297712b9ccb760aaedc100468a5fa7b'),
(0, 'papaswagger12@gmail.com', 'ecd7675dc6ce9dc6b5178688405cc8b110ea3fe0597ff7d3a1b41e4e49dbfdda44f02f35915b0a4cc4c7a69398bdfe21db18'),
(0, 'eben@web4ughana.com', '2f127efed4426bc2f9b59f6733ac77f2790720038f49ae01728d3e6743ec34035dd9b41747658611fc86ccdb69f09a69ae16'),
(0, 'papaswagger12@gmail.com', 'eda31c8a5073fbe65bc20f02bc47173b8d70a8db9417f1e5cb326cbffc1655b097c2a0f644c36461b4cd1a68dc99a40ae47b'),
(0, 'emmanuelobeng7788@gmail.com', '2315912fbd725b2d63cdc27566110db7b6fdb7ebc4314679d4d4874f0ed7c58d5708e22c7e08b651f30129ef01dfa8812e73'),
(0, 'emmanuelobeng7788@gmail.com', '6dcf911ef2baada89ab4d110597bb5719acc1250a132a1066a32abcd7b3febf35942093be35588c2863ff8e8e80443c1e211'),
(0, 'natbarnor@yahoo.com', 'a03bd0915027723bb2b3159035c72e53d6b1052c2d18914e1d7d0d1e66db06be7ea02cd12bf2d035d4ea8e96bba8ebf23224'),
(0, 'natbarnor@yahoo.com', 'a8398977ff2440e760d8b02194250ffd21c323d619167a79af886cba1af04b597fa9d72dc5ded2a9ca291098a65268c181d0'),
(0, 'natbarnor@yahoo.com', '14d39674ff3b7af1aab19848d2d8b5a0dd4b4a0d14d3008188e0002a416a9835b0cd44b5b7159c77eb885c34d49f9af9753e'),
(0, 'emmanuelobeng7788@gmail.com', '22fd4d03b4c3071f18fb452012dd7fe530ce82ea86e04fcdb16a7c3415932207e62cc45cade3a1933c26a6db257fa568cade'),
(0, 'eben@web4ughana.com', 'b3b8e196080e6dd096dd1312d2f82bade4630b72f813363f47d841bcc87b6c63c8b76d655544b0b7d6b49029537e9adebc06'),
(0, 'natbarnor@yahoo.com', '2456b04b10e034a4da7922e8228f4602d2f742894da48a9d8a03516f02819fab1c69921eb2eab9790b1bbe4fb8efc12eb1b5');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) NOT NULL,
  `username` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `mobile` varchar(200) NOT NULL,
  `password` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `mobile`, `password`) VALUES
(25, 'emmanuel', 'emmanuelobeng7788@gmail.com', '0656789654', '$2y$10$Z7npxShHt.lfXNnHIybNyeD2QjqbxG14VwB6rz40/Uc2xZtF4om/K'),
(26, 'nat', 'natbarnor@yahoo.com', '12345', '$2y$10$5xtvnxhdY.xnIGNbV8kGKelHUpxnq19rngbN/SDp0ifKA0sP699fq'),
(27, 'kofiasare', 'eeeee@eeeee.com', '211212', '$2y$10$nOqDgvq5T/6aACHaM8qHlON5VsAA/OZf87Bs8c66eieyk/m0NOEKG'),
(28, 'david@yahoo.com', 'david@yahoo.com', '123456789', '$2y$10$BuIWQSWhwc1fXNdy08R.Cuvtypwhm2ugIohgFNzB.DI07a9oaU6wS'),
(29, 'accra', 'eben@web4ughana.com', '332456', '$2y$10$PeVAcO915hRLKL/vU2btW.lmcUZDWeLJ7zHMIqozpx4U4OVFdHzyG'),
(30, 'santo@yahoo.com', 'sankoto@yahoo.com', '12345678', '$2y$10$fyD60RzlkF68eXJbpFwDZuQM7IDw3M..WGBDftJYnJP3aMqq.1qx2'),
(31, 'richy', 'richy@yahoo.com', '0545804166', '$2y$10$zjJ6rIn8gE2IEXHyuik20eJVAioiNKiJ9b5z4T/gKUipWo9sPq786');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `booked`
--
ALTER TABLE `booked`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `eventpromote`
--
ALTER TABLE `eventpromote`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset`
--
ALTER TABLE `password_reset`
  ADD UNIQUE KEY `token` (`token`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `booked`
--
ALTER TABLE `booked`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `eventpromote`
--
ALTER TABLE `eventpromote`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
