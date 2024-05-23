-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 04, 2024 at 12:28 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `users_db`
--
DROP DATABASE IF EXISTS `users_db`;
CREATE DATABASE IF NOT EXISTS `users_db` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `users_db`;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `is_logged_in` int(11) DEFAULT 0,
  `raise_hand` int(11) DEFAULT 0,
  `is_admin` tinyint(1) DEFAULT 0,
  `username` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `is_logged_in`, `raise_hand`, `is_admin`, `username`) VALUES
(1, 'user1@example.com', 'p1', 1, 1, 0, 'ΓΙΩΡΓΟΣ ΚΡΙΤΑΣΚΡΙΤΑΣΚΡΙΤΑΣ'),
(2, 'user2@example.com', 'p2', 0, 1, 0, 'ΔΗΜΗΤΡΗΣ ΜΠΑΚΤΖΗΣ'),
(3, 'admin@gep.com', 'admin', 1, 0, 1, 'ΕΚΠΑΙΔΕΥΤΗΣ'),
(4, 'stefanopoulos_giorgos@outlook.com', '$2y$10$jfpONwe01WiI8SMXNgAhq.dQETsmBzhzPGae36ZqsUuIsrMEx1OBK', 0, 0, 0, 'ΙΑΣΩΝΑΣ ΤΣΕΛΛΟΣ'),
(5, 'stefanopoulos_giorgos1@outlook.com', '000000abc', 0, 0, 0, 'ΘΟΔΩΡΗΣ ΣΤΑΜΑΤΟΥΚΟΣ'),
(6, 'stefanopoulos_giorgogs1@outlook.com', '000000abc', 0, 0, 0, 'ΚΥΡΙΑΚΟΣ ΦΙΣΚΑΤΩΡΗΣ'),
(7, 'user6@example.com', 'p6', 0, 1, 0, 'ΙΣΑΑΚ ΑΓΓΕΛΑΚΟΣ'),
(8, 'user7@example.com', 'p7', 0, 0, 0, 'ΘΑΝΑΣΗΣ ΒΑΛΚΑΝΟΣ'),
(9, 'user8@example.com', 'p8', 0, 1, 0, 'ΠΕΤΡΟΣ ΜΑΝΤΑΛΟΣ'),
(10, 'user9@example.com', 'p9', 0, 0, 0, 'ΒΑΓΓΕΛΗΣ ΜΑΝΤΑΣ'),
(11, 'user10@example.com', 'p10', 0, 0, 0, 'ΑΝΑΣΤΑΣΗΣ ΑΡΙΣΤΕΙΔΗΣ'),
(12, 'user11@example.com', 'p11', 0, 0, 0, 'ΑΡΙΣΤΟΣ ΑΝΑΝΙΑΣ'),
(13, 'user17@example.com', 'p17', 0, 1, 0, 'something'),
(14, 'user16@example.com', 'p16', 0, 1, 0, 'something'),
(15, 'user15@example.com', 'p15', 0, 0, 0, 'something'),
(16, 'user14@example.com', 'p14', 0, 1, 0, 'something'),
(17, 'user13@example.com', 'p13', 0, 0, 0, 'something'),
(18, 'user12@example.com', 'p12', 0, 0, 0, 'something'),
(19, 'kati@gmail.com', 'p1', 1, 1, 0, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
