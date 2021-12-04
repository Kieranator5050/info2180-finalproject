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
(3, 'Lock', 'Door', '$2y$10$y0noBa12F5U39hQ4oWD8/.wA9wN2zKX3d1KG65weEVpTuoS44XTGO', 'lockedDoor@email.sub.sub.com', '2021-11-12 16:44:17');
COMMIT;