SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

CREATE DATABASE IF NOT EXISTS `bugme`;

GRANT ALL PRIVILEGES ON bugme.* TO 'admin'@'localhost' IDENTIFIED BY 'password123';

USE `bugme`;

DROP TABLE IF EXISTS `issues`;
CREATE TABLE IF NOT EXISTS `issues` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `type` varchar(255) NOT NULL,
  `priority` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL COMMENT 'Open, closed or in progress',
  `assigned_to` int(11) NOT NULL COMMENT 'ID of appropriate user',
  `created_by` int(11) NOT NULL COMMENT 'ID of appropriate user',
  `created` datetime NOT NULL COMMENT 'date of creation',
  `updated` datetime NOT NULL COMMENT 'date of last update',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

INSERT INTO `issues` (`id`, `title`, `description`, `type`, `priority`, `status`, `assigned_to`, `created_by`, `created`, `updated`) VALUES
(1, 'Issue1', 'adsadadada', 'Bug', 'Major', 'In Progress', 1, 1, '2021-12-04 06:24:58', '2021-12-04 09:20:44'),
(2, 'Test Issue2', 'ISeessdsdISeessdsdISeessdsdISeessdsdISeessdsdISeessdsdISeessdsdISeessdsdISeessdsdISeessdsdISeessdsdISeessdsdISeessdsdISeessdsdISeessdsdISeessdsdISeessdsdISeessdsdISeessdsdISeessdsdISeessdsdISeessdsdISeessdsdISeessdsdISeessdsdISeessdsdISeessdsd', 'Bug', 'Major', 'Closed', 4, 4, '2021-12-04 06:35:15', '2021-12-04 09:20:53'),
(3, 'Test Issue 3', 'afdgs', 'Bug', 'Major', 'Open', 1, 4, '2021-12-04 06:58:34', '2021-12-04 06:58:34'),
(4, 'Test Issue 5', 'asgasdasdasdada', 'Bug', 'Major', 'Closed', 3, 4, '2021-12-04 06:58:49', '2021-12-04 09:16:45'),
(5, 'Test Proposal', 'I am a proposal much words hello there I am wordI am a proposal much words hello there I am wordI am a proposal much words hello there I am word', 'Proposal', 'Minor', 'In Progress', 7, 7, '2021-12-04 09:16:25', '2021-12-04 09:16:38'),
(6, 'Test Tasking', 'I am a test taskI am a test taskI am a test taskI am a test taskI am a test taskI am a test taskI am a test taskI am a test taskI am a test taskI am a test taskI am a test taskI am a test taskI am a test taskI am a test taskI am a test taskI am a test taskI am a test taskI am a test taskI am a test taskI am a test taskI am a test taskI am a test taskI am a test task', 'Task', 'Critical', 'Open', 1, 7, '2021-12-04 09:17:29', '2021-12-04 09:17:29');


DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `date_joined` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;


INSERT INTO `users` (`id`, `firstname`, `lastname`, `password`, `email`, `date_joined`) VALUES
(1, 'ADMIN', 'USER', '$2y$10$sjxkpqc9.E9efPFsO23fseSmhCA5.j2HpQR2zfmATQPwpYutfbcdi', 'admin@project2.com', '2021-11-13 16:08:27'),
(2, 'Key', 'Jug', '$2y$10$KPOeQC2cZXF99ZSDQZQQIu6Iq77k1eWMkSLXzVrS7NfTtWB8QCHi2', 'keyjag@email.com', '2021-11-12 16:44:17'),
(3, 'Lock', 'Door', '$2y$10$y0noBa12F5U39hQ4oWD8/.wA9wN2zKX3d1KG65weEVpTuoS44XTGO', 'lockedDoor@email.sub.sub.com', '2021-11-12 16:44:17'),
(4, 'Kieran', 'Jaggernauth', '$2y$10$foXuI6ExDs1Dx8g4q3MaFO2PdQGeUXpQUcG.pexCyKkRaJQcrAITe', 'kieranjag@email.com', '2021-12-04 06:32:09'),
(7, 'TestUser', 'Passwordis:Password123', '$2y$10$ZouvvwLQFQiTjhXSkptoue6o.V7BVdok3msyO9FZUlHG3vWQ5PvDW', 'test@user.domain.sub.email.com', '2021-12-04 09:15:36');
COMMIT;