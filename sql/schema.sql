-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 14, 2021 at 05:15 AM
-- Server version: 5.7.31
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bugme`
--

-- --------------------------------------------------------

--
-- Table structure for table `issues`
--

CREATE DATABASE IF NOT EXISTS `bugme`;

GRANT ALL PRIVILEGES ON bugme.* TO 'admin'@'localhost' IDENTIFIED BY 'password123';

USE `bugme`;

DROP TABLE IF EXISTS `issues`;
CREATE TABLE IF NOT EXISTS `issues` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(20) NOT NULL,
  `description` text NOT NULL,
  `type` varchar(20) NOT NULL,
  `priority` varchar(20) NOT NULL,
  `status` varchar(20) NOT NULL COMMENT 'Open, closed or in progress',
  `assigned_to` int(11) NOT NULL COMMENT 'ID of appropriate user',
  `created_by` int(11) NOT NULL COMMENT 'ID of appropriate user',
  `created` datetime NOT NULL COMMENT 'date of creation',
  `updated` datetime NOT NULL COMMENT 'date of last update',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `issues`
--

INSERT INTO `issues` (`id`, `title`, `description`, `type`, `priority`, `status`, `assigned_to`, `created_by`, `created`, `updated`) VALUES
(1, 'Test Issue', 'I am a test issue, I am useless, Why am I here, I don\'t know, Hello', 'Bug', 'High', 'Open', 1, 0, '2021-11-12 16:34:55', '2021-11-12 16:34:55'),
(2, 'Test Issue 2', 'Issue is big plz help', 'Bug', 'Medium', 'Open', 1, 0, '2021-11-11 16:34:55', '2021-11-12 16:34:55'),
(3, 'Test Issue 3', 'Not issue but propose Not issue but proposeNot issue but proposeNot issue but proposeNot issue but proposeNot issue but proposeNot issue but proposeNot issue but proposeNot issue but proposeNot issue but proposeNot issue but proposeNot issue but proposeNot issue but proposeNot issue but proposeNot issue but proposeNot issue but proposeNot issue but proposeNot issue but proposeNot issue but proposeNot issue but proposeNot issue but proposeNot issue but proposeNot issue but proposeNot issue but proposeNot issue but proposeNot issue but proposeNot issue but proposeNot issue but proposeNot issue but proposeNot issue but propose', 'Proposal', 'Low', 'In Progress', 1, 0, '2021-11-11 16:34:55', '2021-11-12 16:34:55'),
(4, 'Test Issue 4', 'Closed thing Closed thingClosed thingClosed thingClosed thingClosed thingClosed thingClosed thingClosed thingClosed thingClosed thingClosed thingClosed thingClosed thingClosed thingClosed thingClosed thingClosed thingClosed thingClosed thingClosed thingClosed thingClosed thingClosed thingClosed thingClosed thingClosed thingClosed thingClosed thingClosed thingClosed thingClosed thingClosed thingClosed thingClosed thingClosed thingClosed thingClosed thingClosed thingClosed thingClosed thingClosed thingClosed thingClosed thingClosed thingClosed thingClosed thingClosed thingClosed thingClosed thingClosed thingClosed thingClosed thingClosed thingClosed thingClosed thingClosed thingClosed thingClosed thingClosed thingClosed thingClosed thingClosed thingClosed thingClosed thingClosed thingClosed thingClosed thingClosed thingClosed thingClosed thingClosed thing', 'Proposal', 'Low', 'Closed', 1, 0, '2021-11-11 16:34:55', '2021-11-12 16:34:55'),
(6, 'Cool Bug Bro', 'Test Bug 1', 'Bug', 'Minor', 'open', 9, 8, '2021-11-24 19:22:26', '2021-11-24 19:22:26'),
(7, 'Cool Bug Bro', 'Test Bug 1', 'Bug', 'Minor', 'Open', 9, 8, '2021-11-24 23:00:21', '2021-11-24 23:00:21'),
(11, 'Not that serious', 'Test a lot now', 'Proposal', 'Critical', 'Open', 2, 1, '2021-11-27 17:56:34', '2021-11-27 17:56:34'),
(12, 'Serious Serious  ', 'Oh boy this a big one ', 'Bug', 'Major', 'Open', 3, 1, '2021-11-27 17:57:40', '2021-11-27 17:57:40'),
(13, 'Clear bugs', 'Try to clean the bugs ', 'Task', 'Critical', 'Open', 2, 1, '2021-11-27 17:58:29', '2021-11-27 17:58:29'),
(14, 'Test bug ', 'Alright bug ', 'Bug', 'Minor', 'Open', 3, 1, '2021-11-27 18:26:49', '2021-11-27 18:26:49'),
(15, 'SeriousBug23', 'New serious Bug ', 'Bug', 'Minor', 'Open', 3, 1, '2021-11-27 18:33:18', '2021-11-27 18:33:18'),
(16, 'SeriousBug234', 'New serious Bug ', 'Bug', 'Minor', 'Open', 3, 1, '2021-11-27 18:34:02', '2021-11-27 18:34:02');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(20) NOT NULL,
  `lastname` varchar(20) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(30) NOT NULL,
  `date_joined` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `password`, `email`, `date_joined`) VALUES
(0, 'Key', 'Jug', '$2y$10$KPOeQC2cZXF99ZSDQZQQIu6Iq77k1eWMkSLXzVrS7NfTtWB8QCHi2', 'keyjag@email.com', '2021-11-12 16:44:17'),
(1, 'Lock', 'Door', '$2y$10$y0noBa12F5U39hQ4oWD8/.wA9wN2zKX3d1KG65weEVpTuoS44XTGO', 'lockedDoor@email.sub.sub.com', '2021-11-12 16:44:17'),
(2, 'ADMIN', 'USER', '$2y$10$sjxkpqc9.E9efPFsO23fseSmhCA5.j2HpQR2zfmATQPwpYutfbcdi', 'admin@project2.com', '2021-11-13 16:08:27');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;