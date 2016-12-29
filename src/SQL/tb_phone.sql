CREATE TABLE `phone` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `phone_type` varchar(20) NOT NULL DEFAULT 'MAIN',
  `phone_number` varchar(10) NOT NULL,
  `phone_ext` varchar(10) NOT NULL DEFAULT '',
  `modified_by` varchar(50) NOT NULL DEFAULT 'SYSTEM',
  `modified_on` datetime NOT NULL,
  `created_by` varchar(50) NOT NULL DEFAULT 'SYSTEM',
  `created_on` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
