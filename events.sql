-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 14, 2023 at 12:33 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `calendar`
--

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` int(11) NOT NULL,
  `event_name` varchar(100) NOT NULL,
  `location` varchar(100) NOT NULL,
  `start_date` date NOT NULL,
  `start_time` time NOT NULL,
  `end_date` date NOT NULL,
  `end_time` time NOT NULL,
  `duration` varchar(100) NOT NULL,
  `priority` varchar(50) NOT NULL,
  `notes` varchar(250) NOT NULL,
  `quotes` varchar(250) NOT NULL,
  `upload` varchar(250) NOT NULL,
  `username` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `event_name`, `location`, `start_date`, `start_time`, `end_date`, `end_time`, `duration`, `priority`, `notes`, `quotes`, `upload`, `username`) VALUES
(121, 'Cicik\'s Crush', 'California', '2023-06-14', '20:43:00', '2023-06-21', '16:48:00', '6 days, 20 hours, 5 minutes, 0 seconds', 'High', 'nganu', 'Kapan Nikah', '', 'anglne24'),
(122, 'Nadine\'s Day', 'California', '2023-06-09', '20:09:00', '2023-06-10', '21:09:00', '1 days, 1 hours, 0 minutes, 0 seconds', 'High', 'Jangan lupa datang', 'Lagi nyari event yang buy one get you', '', 'anglne24'),
(123, 'APA YA', 'dimana aja', '2023-06-28', '19:03:00', '2023-06-30', '21:03:00', '2 days, 2 hours, 0 minutes, 0 seconds', 'High', 'iya tau', 'kapan lagi?', '', 'anglne24'),
(124, 'Nugas', 'rumah vincent', '2023-06-14', '21:05:00', '2023-06-17', '22:05:00', '3 days, 1 hours, 0 minutes, 0 seconds', 'Medium', '', '', 'upload/Cash Payment free vector icons designed by iconixar.png', 'anglne24'),
(125, 'nugas lagi', 'rumah cicik', '2023-06-23', '19:08:00', '2023-06-24', '20:08:00', '1 days, 1 hours, 0 minutes, 0 seconds', 'Low', '', 'kapan nikah?', 'upload/Арт-removebg-preview.png', 'anglne24'),
(126, 'oiuiy', 'oiugh', '2023-06-12', '20:03:00', '2023-06-21', '21:03:00', '9 days, 1 hours, 0 minutes, 0 seconds', 'Medium', '', '', '../form/upload/lingster 🪩 on Twitter.jpeg', 'anglne24'),
(127, 'Pemburu\'s Day', 'Klaten', '2023-06-13', '20:36:00', '2023-06-14', '22:36:00', '1 days, 2 hours, 0 minutes, 0 seconds', 'High', 'cepet sadar', 'kamu jodohku', 'upload/Virtual_Yoga_Vector_Illustration_Concept-removebg-preview.png', 'cicikP'),
(128, 'Hujan\'s Birthday', 'Dorm', '2023-06-29', '22:00:00', '2023-06-30', '10:00:00', '0 days, 12 hours, 0 minutes, 0 seconds', 'High', 'dc. Hitam', 'Harus cantik', '', 'icha12');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`),
  ADD KEY `usernam` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=129;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `events`
--
ALTER TABLE `events`
  ADD CONSTRAINT `events_ibfk_1` FOREIGN KEY (`username`) REFERENCES `admin` (`username`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
