-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 28, 2021 at 07:43 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

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

CREATE TABLE `issues` (
  `id` int(11) NOT NULL,
  `title` varchar(20) NOT NULL,
  `description` text NOT NULL,
  `type` varchar(20) NOT NULL,
  `priority` varchar(20) NOT NULL,
  `status` varchar(20) NOT NULL COMMENT 'Open, closed or in progress',
  `assigned_to` int(11) NOT NULL COMMENT 'ID of appropriate user',
  `created_by` int(11) NOT NULL COMMENT 'ID of appropriate user',
  `created` datetime NOT NULL COMMENT 'date of creation',
  `updated` datetime NOT NULL COMMENT 'date of last update'
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

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `firstname` varchar(20) NOT NULL,
  `lastname` varchar(20) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(30) NOT NULL,
  `date_joined` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `password`, `email`, `date_joined`) VALUES
(0, 'Key', 'Jug', '*182392BF1429D98EF9BE8A417B8772E7ACA7D942', 'keyjag@email.com', '2021-11-12 16:44:17'),
(1, 'Lock', 'Door', '*46007E4650191CF78B6CC53895E82F0669BD8B8F', 'lockedDoor@email.sub.sub.com', '2021-11-12 16:44:17'),
(2, 'ADMIN', 'USER', '*A0F874BC7F54EE086FCE60A37CE7887D8B31086B', 'admin@project2.com', '2021-11-13 16:08:27'),
(3, 'Akiel', 'Walsh', '*A0F874BC7F54EE086FCE60A37CE7887D8B31086B', 'jamwals@test.com', '2021-11-27 16:11:27');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `issues`
--
ALTER TABLE `issues`
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
-- AUTO_INCREMENT for table `issues`
--
ALTER TABLE `issues`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
