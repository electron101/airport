-- phpMyAdmin SQL Dump
-- version 4.4.15.9
-- https://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 06, 2017 at 11:12 AM
-- Server version: 10.0.27-MariaDB
-- PHP Version: 5.6.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `airport`
--

-- --------------------------------------------------------

--
-- Table structure for table `class`
--

CREATE TABLE IF NOT EXISTS `class` (
  `id` int(11) NOT NULL,
  `name` varchar(256) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `class`
--

INSERT INTO `class` (`id`, `name`) VALUES
(1, 'Эконом класс'),
(2, 'Бизнес класс'),
(3, 'Первый класс');

-- --------------------------------------------------------

--
-- Table structure for table `gorod`
--

CREATE TABLE IF NOT EXISTS `gorod` (
  `id` int(11) NOT NULL,
  `name` varchar(256) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `gorod`
--

INSERT INTO `gorod` (`id`, `name`) VALUES
(1, 'Самара'),
(2, 'Екатеринбург'),
(3, 'Москва');

-- --------------------------------------------------------

--
-- Table structure for table `passajir`
--

CREATE TABLE IF NOT EXISTS `passajir` (
  `id` int(11) NOT NULL,
  `name` varchar(256) NOT NULL,
  `fname` varchar(256) NOT NULL,
  `date_rojden` date NOT NULL,
  `num_pasport` varchar(25) NOT NULL,
  `pol` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `reis`
--

CREATE TABLE IF NOT EXISTS `reis` (
  `id_reis` int(11) NOT NULL,
  `date_time_vilet` datetime NOT NULL,
  `date_time_posadka` datetime NOT NULL,
  `id_gorod_vilet` int(11) NOT NULL,
  `id_gorod_posadka` int(11) NOT NULL,
  `id_samolet` int(11) NOT NULL,
  `colvo_mest` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `reis`
--

INSERT INTO `reis` (`id_reis`, `date_time_vilet`, `date_time_posadka`, `id_gorod_vilet`, `id_gorod_posadka`, `id_samolet`, `colvo_mest`) VALUES
(2, '2017-03-30 18:03:14', '2017-03-30 16:03:14', 2, 1, 10, 11),
(3, '2017-03-29 18:03:57', '2017-03-29 18:03:57', 3, 1, 17, 23),
(4, '2017-03-30 18:03:54', '2017-03-31 19:03:54', 1, 3, 9, 500),
(6, '2017-04-03 16:44:59', '2017-04-04 09:09:59', 1, 2, 11, 300),
(7, '2017-04-03 16:49:03', '2017-04-11 13:13:03', 1, 2, 5, 100),
(8, '2017-04-03 17:17:21', '2017-04-03 19:19:21', 1, 1, 17, 23),
(9, '2017-04-08 09:11:28', '2017-04-08 19:15:28', 1, 2, 11, 300),
(10, '2017-04-08 14:14:04', '2017-04-20 18:18:04', 1, 2, 5, 100),
(11, '2017-04-08 10:10:22', '2017-04-08 06:06:23', 2, 1, 13, 0),
(12, '2017-04-08 14:14:38', '2017-04-28 19:15:38', 2, 1, 12, 234);

-- --------------------------------------------------------

--
-- Table structure for table `samolet`
--

CREATE TABLE IF NOT EXISTS `samolet` (
  `id` int(11) NOT NULL,
  `bort_num` varchar(256) DEFAULT NULL,
  `model` varchar(256) DEFAULT NULL,
  `company` varchar(256) DEFAULT NULL,
  `date_vipusk` varchar(256) DEFAULT NULL,
  `colvo_mest` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `samolet`
--

INSERT INTO `samolet` (`id`, `bort_num`, `model`, `company`, `date_vipusk`, `colvo_mest`) VALUES
(2, '----', '---', '----', '----', 155),
(3, '55', '55', '55', '55', 100),
(4, '777', '777', '777', '777', 100),
(5, 'епукм', 'кепм', 'укепм', 'укепм', 100),
(7, 'йй', 'йй', 'йй', 'йй', 100),
(8, 'wsdf', 'sdf', 'asdf', 'asdf', 0),
(9, 'asdf', 'asdf', 'asdf', 'asdf', 500),
(10, 'sdfg', 'sdfg', 'sdfg', 'sdfg', 500),
(11, 'dfg', 'dfg', 'gfd', 'sdfg', 300),
(12, 'sdf', 'qwer', 'qwer', 'qwer', 234),
(13, 'qwef', 'qwef', 'qwef', 'wqef', 0),
(14, 'его', 'екнг', 'кенг', 'кенг', 300),
(15, 'кен', 'укен', 'укен', 'укен', 300),
(16, 'ывап', 'ывап', 'ывап', 'ывап', 300),
(17, 'вап', 'ывап', 'выап', 'ывап', 23),
(18, 'фыва', 'фыва', 'фыва', 'фыва', 300),
(19, 'фыва', 'фыва', 'фыва', 'ыфва', 300);

-- --------------------------------------------------------

--
-- Table structure for table `stoimost`
--

CREATE TABLE IF NOT EXISTS `stoimost` (
  `id` int(11) NOT NULL,
  `id_reis` int(11) NOT NULL,
  `id_class` int(11) NOT NULL,
  `sum` decimal(10,2) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `stoimost`
--

INSERT INTO `stoimost` (`id`, `id_reis`, `id_class`, `sum`) VALUES
(1, 2, 3, '34.00'),
(2, 2, 1, '23.00'),
(3, 3, 2, '589.00'),
(4, 4, 2, '67.00'),
(6, 3, 2, '888.00'),
(7, 3, 2, '2569.79'),
(10, 9, 1, '1500.00'),
(11, 9, 2, '3500.00'),
(12, 9, 3, '7500.00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL,
  `fio` varchar(256) DEFAULT NULL,
  `login` varchar(64) DEFAULT NULL,
  `pass` varchar(64) DEFAULT NULL,
  `status` int(1) DEFAULT NULL,
  `priv` int(1) DEFAULT NULL,
  `email` varchar(64) DEFAULT NULL,
  `tel` varchar(32) DEFAULT NULL,
  `last_time` datetime DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fio`, `login`, `pass`, `status`, `priv`, `email`, `tel`, `last_time`) VALUES
(34, 'Администратор', 'admin', '356a192b7913b04c54574d18c28d46e6395428ab', 1, 0, 'sabashlive@gmail.com', '----', '2017-04-05 14:38:51'),
(35, 'Сергеев Артём Николаевич', 'U2', '356a192b7913b04c54574d18c28d46e6395428ab', 1, 2, 'sabashlive@gmail.com', '123', '2016-10-03 11:19:29'),
(36, 'Каплин Сергей Вячеславович', 'U', '356a192b7913b04c54574d18c28d46e6395428ab', 1, 2, 'sabashlive@gmail.com', '123', '2016-09-09 14:37:27'),
(38, 'Координатор', 'K', '356a192b7913b04c54574d18c28d46e6395428ab', 1, 1, 'sabashlive@gmail.com', '123', '2016-09-28 09:57:59'),
(42, 'Гришкова Алла Михайловна', 'U3', '356a192b7913b04c54574d18c28d46e6395428ab', 1, 2, 'sabashlive@gmail.com', '123', '2016-06-08 11:21:52'),
(44, 'Исполнитель', 'I', '0822e8ed92c42f678825aa67e6b1f8e130941230', 1, 2, 'sabashlive@gmail.com', '123', '2016-05-30 11:58:21');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `class`
--
ALTER TABLE `class`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gorod`
--
ALTER TABLE `gorod`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `passajir`
--
ALTER TABLE `passajir`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reis`
--
ALTER TABLE `reis`
  ADD PRIMARY KEY (`id_reis`);

--
-- Indexes for table `samolet`
--
ALTER TABLE `samolet`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stoimost`
--
ALTER TABLE `stoimost`
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
-- AUTO_INCREMENT for table `class`
--
ALTER TABLE `class`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `gorod`
--
ALTER TABLE `gorod`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `passajir`
--
ALTER TABLE `passajir`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `reis`
--
ALTER TABLE `reis`
  MODIFY `id_reis` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `samolet`
--
ALTER TABLE `samolet`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `stoimost`
--
ALTER TABLE `stoimost`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=45;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
