-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 29, 2019 at 06:02 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 5.6.39

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `schedule`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointmentlist`
--

CREATE TABLE `appointmentlist` (
  `aiId` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `startTime` varchar(255) NOT NULL,
  `duration` int(11) NOT NULL,
  `serial` int(11) NOT NULL,
  `active` int(11) NOT NULL,
  `date` varchar(255) NOT NULL,
  `aId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `appointmentlist`
--

INSERT INTO `appointmentlist` (`aiId`, `userId`, `startTime`, `duration`, `serial`, `active`, `date`, `aId`) VALUES
(21, 3, '1:30', 60, 1, 0, '2019-04-26', 9),
(22, 3, '2:30', 60, 2, 0, '2019-04-26', 9),
(23, 3, '3:30', 60, 3, 0, '2019-04-26', 9),
(24, 3, '4:30', 60, 4, 0, '2019-04-26', 9),
(25, 3, '5:30', 60, 5, 0, '2019-04-26', 9),
(44, 5, '4:30', 60, 1, 0, '2019-04-29', 15),
(45, 5, '5:30', 60, 2, 0, '2019-04-29', 15),
(46, 6, '2:0', 60, 1, 0, '2019-04-30', 16),
(47, 6, '3:0', 60, 2, 0, '2019-04-30', 16),
(48, 6, '4:0', 60, 3, 0, '2019-04-30', 16),
(49, 6, '5:0', 60, 4, 0, '2019-04-30', 16),
(50, 6, '6:0', 60, 5, 0, '2019-04-30', 16),
(51, 7, '6:30', 60, 1, 0, '2019-04-24', 17),
(52, 7, '7:30', 60, 2, 0, '2019-04-24', 17);

-- --------------------------------------------------------

--
-- Table structure for table `appointments`
--

CREATE TABLE `appointments` (
  `aId` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `time` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `duration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `perSesssion` int(11) NOT NULL,
  `location` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `totalSession` int(11) NOT NULL,
  `userId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `appointments`
--

INSERT INTO `appointments` (`aId`, `title`, `time`, `date`, `duration`, `perSesssion`, `location`, `totalSession`, `userId`) VALUES
(4, 'qq', '01:30PM', '2019-04-05', '20', 300, 'qq', 15, 1),
(5, 'qq', '01:30PM', '2019-04-06', '20', 300, 'qq', 15, 1),
(6, 'Final Test', '01:30PM', '2019-04-26', '30', 300, 'Banani', 10, 1),
(7, 'ww', '01:30PM', '2019-04-26', '30', 300, 'AIUB', 10, 1),
(8, 'Test by sakib', '01:30AM', '2019-04-30', '30', 300, 'Rampura', 10, 3),
(15, 'aa', '04:30PM', '2019-04-29', '60', 120, 'Bashundhara c Block', 2, 5),
(16, 'class', '02:00PM', '2019-04-30', '60', 300, 'Rampura', 5, 6),
(17, 'aa', '06:30PM', '2019-04-24', '60', 120, 'Bashundhara c Block', 2, 7);

-- --------------------------------------------------------

--
-- Table structure for table `appointment_takens`
--

CREATE TABLE `appointment_takens` (
  `id` int(10) UNSIGNED NOT NULL,
  `aId` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `location` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `time` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `serial` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `finalticket`
--

CREATE TABLE `finalticket` (
  `user` varchar(200) NOT NULL,
  `fromstation` varchar(200) NOT NULL,
  `tostation` varchar(200) NOT NULL,
  `date` date NOT NULL,
  `id` int(11) NOT NULL,
  `currentdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `seatno` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `finalticket`
--

INSERT INTO `finalticket` (`user`, `fromstation`, `tostation`, `date`, `id`, `currentdate`, `seatno`) VALUES
('shad', 'madaripur', 'dhaka', '2019-04-28', 3, '2019-04-27 22:38:51', 'A1'),
('shad', 'madaripur', 'dhaka', '2019-04-28', 3, '2019-04-27 22:43:25', 'A1'),
('moin', 'dhaka', 'chittagong', '2019-04-29', 4, '2019-04-27 22:47:48', 'A2'),
('rana', 'dhaka', 'chittagong', '2019-04-29', 5, '2019-04-27 22:57:22', 'A4'),
('tarif', 'faridpur', 'dhaka', '2019-04-28', 5, '2019-04-28 12:02:40', 'B4'),
('shad', 'manikganj', 'dhaka', '2019-04-24', 8, '2019-04-28 12:42:33', 'B6'),
('sujoymota', 'narashingdi', 'dhaka', '2019-04-27', 2, '2019-04-28 13:42:27', 'C1'),
('moyeen', 'ctg', 'dhaka', '2019-04-27', 1, '2019-04-28 18:12:07', 'C1'),
('anas', 'dhaka', 'jhinaidaha', '2019-04-27', 1, '2019-04-29 04:00:40', 'A4, A5'),
('jahir', 'dhaka', 'chittagong', '2019-04-30', 5, '2019-04-29 05:43:48', 'H2');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2019_04_26_221155_create_userss_table', 1),
(2, '2019_04_26_221918_create_U_table', 2),
(5, '2019_04_27_064216_create_users_table', 3),
(6, '2019_04_27_064604_create_U_table', 3),
(8, '2019_04_27_223528_create_appointments_table', 4),
(10, '2019_04_27_225407_create_appointment_takens_table', 5);

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `msg` varchar(255) NOT NULL,
  `userId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `title`, `msg`, `userId`) VALUES
(1, 'Adnan', 'Hello world Have a nice', 1),
(2, 'Test News 2nd', 'Hello World', 1);

-- --------------------------------------------------------

--
-- Table structure for table `request`
--

CREATE TABLE `request` (
  `rid` int(11) NOT NULL,
  `requesterId` int(11) NOT NULL,
  `appointerId` int(11) NOT NULL,
  `active` int(11) NOT NULL,
  `aId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `request`
--

INSERT INTO `request` (`rid`, `requesterId`, `appointerId`, `active`, `aId`) VALUES
(1, 1, 3, 0, 2),
(2, 1, 3, 0, 2),
(3, 2, 1, 0, 3),
(4, 4, 5, 3, 40),
(5, 1, 5, 1, 40),
(6, 1, 5, 3, 41);

-- --------------------------------------------------------

--
-- Table structure for table `seller`
--

CREATE TABLE `seller` (
  `id` int(20) NOT NULL,
  `name` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `mobile` varchar(13) NOT NULL,
  `username` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `seller`
--

INSERT INTO `seller` (`id`, `name`, `email`, `mobile`, `username`, `password`) VALUES
(1, 'moinrana', 'moinrana.chy@gmail.com', '01705554859', 'moin', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `sellerstable`
--

CREATE TABLE `sellerstable` (
  `id` int(20) NOT NULL,
  `name` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `mobile` varchar(200) NOT NULL,
  `username` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `type` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sellerstable`
--

INSERT INTO `sellerstable` (`id`, `name`, `email`, `mobile`, `username`, `password`, `type`) VALUES
(1, 'moinrana', 'moin@gf.com', '0178165466', 'moinrana', '1234', 'seller'),
(2, 'rana', 'mukubizo@3mail.rocks', '4545', 'rana', '4567', 'seller'),
(3, 'chowdhury', 'chowdhury@hail.com', '7889', 'chy', '789', 'seller'),
(4, 'shad', 'shad@shad.com', '645489894', 'shad', 'shad', 'seller'),
(6, 'emon', 'emon@dsfs.com', '54668', 'emon', 'emon', 'seller'),
(7, 'tarif', 'tarif@gmail.com', '4545657889', 'tarif', 'tarif', 'seller');

-- --------------------------------------------------------

--
-- Table structure for table `tickethistory`
--

CREATE TABLE `tickethistory` (
  `user` varchar(200) NOT NULL,
  `fromstation` varchar(200) NOT NULL,
  `tostation` varchar(200) NOT NULL,
  `date` date NOT NULL,
  `historyid` int(11) NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL,
  `seatno` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tickethistory`
--

INSERT INTO `tickethistory` (`user`, `fromstation`, `tostation`, `date`, `historyid`, `created_at`, `updated_at`, `seatno`) VALUES
('sagor', 'gajipur', 'chittagong', '2019-04-27', 2, '2019-04-27', '2019-04-27', 'G1'),
('niloy', 'tangail', 'comilla', '2019-04-27', 3, '2019-04-27', '2019-04-27', 'G4,G3'),
('anik', 'dhaka', 'chittagong', '2019-04-30', 4, '2019-04-28', '2019-04-28', 'H1'),
('zahid', 'noakhali', 'dhaka', '2019-04-28', 6, '2019-04-26', '2019-04-26', 'N1'),
('karim', 'jessore', 'dhaka', '2019-04-28', 7, '2019-04-26', '2019-04-26', 'N2');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userId` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `job` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `location` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userId`, `name`, `email`, `password`, `job`, `location`) VALUES
(2, 'Nihal', 'n@n.com', '123', 'admin', 'AIUB'),
(7, 'adnan', 'a@gmail.com', '123', 'Teacher', 'AIUB'),
(8, 'Modarator', 'm@m.com', '123', 'modarator', 'Bashundhara c Block');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointmentlist`
--
ALTER TABLE `appointmentlist`
  ADD PRIMARY KEY (`aiId`);

--
-- Indexes for table `appointments`
--
ALTER TABLE `appointments`
  ADD PRIMARY KEY (`aId`);

--
-- Indexes for table `appointment_takens`
--
ALTER TABLE `appointment_takens`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `request`
--
ALTER TABLE `request`
  ADD PRIMARY KEY (`rid`);

--
-- Indexes for table `seller`
--
ALTER TABLE `seller`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sellerstable`
--
ALTER TABLE `sellerstable`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `tickethistory`
--
ALTER TABLE `tickethistory`
  ADD PRIMARY KEY (`historyid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointmentlist`
--
ALTER TABLE `appointmentlist`
  MODIFY `aiId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `appointments`
--
ALTER TABLE `appointments`
  MODIFY `aId` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `appointment_takens`
--
ALTER TABLE `appointment_takens`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `request`
--
ALTER TABLE `request`
  MODIFY `rid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `seller`
--
ALTER TABLE `seller`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sellerstable`
--
ALTER TABLE `sellerstable`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tickethistory`
--
ALTER TABLE `tickethistory`
  MODIFY `historyid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userId` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
