CREATE TABLE `person` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nickname` varchar(50) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `modified_by` varchar(50) NOT NULL DEFAULT 'SYSTEM',
  `modified_on` datetime NOT NULL,
  `created_by` varchar(50) NOT NULL DEFAULT 'SYSTEM',
  `created_on` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `nickname_UNIQUE` (`nickname`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
