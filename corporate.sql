-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 18, 2018 at 11:50 PM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `corporate`
--

-- --------------------------------------------------------

--
-- Table structure for table `aboutusemp`
--

CREATE TABLE `aboutusemp` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `title` varchar(50) NOT NULL,
  `description` varchar(200) NOT NULL,
  `photo` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `aboutusemp`
--

INSERT INTO `aboutusemp` (`id`, `name`, `title`, `description`, `photo`) VALUES
(1, 'Pyllis Horton', 'CEO', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur consectetur ligula at ligula finibus efficitur.', '../images/aboutTeam.png'),
(2, 'Alton Stevenson', 'CEO - CO FOUNDER', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur consectetur ligula at ligula finibus efficitur.', '../images/aboutTeam2.png'),
(4, 'Bennie Figueroa', 'APP DEVELOPER', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur consectetur ligula at ligula finibus efficitur.', '../images/aboutTeam4.png'),
(7, 'Harriet Greer', 'CREATIVE DIRECTOR', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur consectetur ligula at ligula finibus efficitur.', '../images/aboutTeam3.png');

-- --------------------------------------------------------

--
-- Table structure for table `aboutustext`
--

CREATE TABLE `aboutustext` (
  `id` int(100) NOT NULL,
  `subtext` varchar(200) NOT NULL,
  `text` varchar(700) NOT NULL,
  `teamText` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `aboutustext`
--

INSERT INTO `aboutustext` (`id`, `subtext`, `text`, `teamText`) VALUES
(1, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua.\r\n', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\n	tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\n	quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\n	consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\n	cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\n	proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt.Lorem ipsum dolor sit amet, consectetur adipisicing elit.');

-- --------------------------------------------------------

--
-- Table structure for table `contactus`
--

CREATE TABLE `contactus` (
  `id` int(100) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(80) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `gender` enum('Male','Female') NOT NULL,
  `subject` enum('CustomerService','Subject2','Subject3','Other') NOT NULL,
  `message` text NOT NULL,
  `reach` enum('Phone','Email') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contactus`
--

INSERT INTO `contactus` (`id`, `name`, `email`, `phone`, `gender`, `subject`, `message`, `reach`) VALUES
(33, 'rina', 'ema@hotmail.com', '123123123', 'Male', 'Subject3', 'rina', 'Phone'),
(34, 'ema', 'emaadili@hotmail.com', '123123123', 'Male', 'Subject3', 'erdsa', 'Phone'),
(37, '1', 'rinaadili@hotmail.com', '044771217', 'Female', 'CustomerService', 'rgefwds', 'Phone'),
(38, '1', 'rinaadili@hotmail.com', '123456789', 'Female', 'CustomerService', 'rewtrgfdfds', 'Phone'),
(39, '1', 'rinaadili@hotmail.com', '123456789', 'Male', 'CustomerService', 'uytrgfeds', 'Phone'),
(40, '1', 'rinaadili@hotmail.com', '123123123', 'Female', 'CustomerService', 'ghhjghjk', 'Phone'),
(41, 'rina', 'rinaadili@hotmail.com', '123456789', 'Female', 'CustomerService', 'uytrgfeytrgfsdds', 'Email');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `description` varchar(200) NOT NULL,
  `photo` varchar(500) NOT NULL,
  `created_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `title`, `description`, `photo`, `created_date`) VALUES
(11, 'Director\'s Desk', 'Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. ', '../images/directorIcon.png', '2018-06-18'),
(12, 'Daily Updates', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur consectetur ligula at ligula finibus efficitur.', '../images/dailyIcon.png', '2018-06-18'),
(13, 'Portfolio', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur consectetur ligula at ligula finibus efficitur.', '../images/portfolioIcon.png', '2018-06-18'),
(14, 'Stock Charts', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur consectetur ligula at ligula finibus efficitur.', '../images/stockIcon.png', '2018-06-18'),
(15, 'Service1', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur consectetur ligula at ligula finibus efficitur.', '../images/dailyIcon.png', '2018-06-17'),
(16, 'Service2', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur consectetur ligula at ligula finibus efficitur.', '../images/portfolioIcon.png', '2018-06-17');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `surname` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `type` enum('admin','user') NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `surname`, `email`, `password`, `type`) VALUES
(1, 'rina', 'adili', 'rinaadili@hotmail.com', '$2y$10$t3PbW5uxG1knTVGTADfEDuYjfRgliWUTXa2y45IZ/TWVBI1RS/1JO', 'admin'),
(3, 'ema', 'adili', 'ema@hotmail.com', '$2y$10$6cl/6xaJj371XXjgo5tQHeWAuH2rcPSEo3XceEVfQuZvwpUfNvxyy', 'user'),
(5, 'rona', 'adili', 'rona@hotmail.com', '$2y$10$Le31O9.8Bns0tcp4gDZCueqU6X/pQ6f83QbWByUj49KADQ06p10SC', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `aboutusemp`
--
ALTER TABLE `aboutusemp`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `aboutustext`
--
ALTER TABLE `aboutustext`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contactus`
--
ALTER TABLE `contactus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
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
-- AUTO_INCREMENT for table `aboutusemp`
--
ALTER TABLE `aboutusemp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `aboutustext`
--
ALTER TABLE `aboutustext`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `contactus`
--
ALTER TABLE `contactus`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
