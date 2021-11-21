CREATE DATABASE IF NOT EXISTS `bugme` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;

GRANT ALL PRIVILEGES ON bugme.* TO 'admin'@'localhost' IDENTIFIED BY 'password123';

USE `bugme`;

DROP TABLE IF EXISTS `users`;

CREATE TABLE IF NOT EXISTS `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `firstname` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `lastname` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `date_joined` datetime NOT NULL,
  PRIMARY KEY (`id`)
);

DROP TABLE IF EXISTS `issues`;

CREATE TABLE IF NOT EXISTS `issues` (
  `id` int NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `type` varchar(255) NOT NULL,
  `priority` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL COMMENT 'Open, closed or in progress',
  `assigned_to` int NOT NULL COMMENT 'ID of appropriate user',
  `created_by` int NOT NULL COMMENT 'ID of appropriate user',
  `created` datetime NOT NULL COMMENT 'date of creation',
  `updated` datetime NOT NULL COMMENT 'date of last update',
  PRIMARY KEY (`id`)
);

INSERT INTO `users` (`firstname`, `lastname`, `email`, `password`, `date_joined`) VALUES
('Admin', 'User', 'admin@project2.com', '$2y$10$sjxkpqc9.E9efPFsO23fseSmhCA5.j2HpQR2zfmATQPwpYutfbcdi', '2021-11-13 16:08:27');

-- INSERT INTO `issues` (`title`, `description`, `type`, `priority`, `status`, `assigned_to`, `created_by`, `created`, `updated`) VALUES
-- ('Test Issue', 'I am a test issue, I am useless, Why am I here, I dont know, Hello', 'Bug', 'High', 'Open', 1, 0, '2021-11-12 16:34:55', '2021-11-12 16:34:55'),
-- ('Test Issue 2', 'Issue is big plz help', 'Bug', 'Medium', 'Open', 1, 0, '2021-11-11 16:34:55', '2021-11-12 16:34:55'),
-- ('Test Issue 3', 'Not issue but propose', 'Proposal', 'Low', 'In Progress', 1, 0, '2021-11-11 16:34:55', '2021-11-12 16:34:55'),
-- ('Test Issue 4', 'Closed thing', 'Proposal', 'Low', 'Closed', 1, 0, '2021-11-11 16:34:55', '2021-11-12 16:34:55');