CREATE TABLE `email` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email_type` varchar(20) NOT NULL,
  `email_address` varchar(320) NOT NULL,
  `modified_by` varchar(50) NOT NULL DEFAULT 'SYSTEM',
  `modified_on` datetime NOT NULL,
  `created_by` varchar(50) NOT NULL DEFAULT 'SYSTEM',
  `created_on` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
