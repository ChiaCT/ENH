CREATE TABLE `company` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `company_name` varchar(120) NOT NULL,
  `modified_by` varchar(50) NOT NULL DEFAULT 'SYSTEM',
  `modified_on` datetime NOT NULL,
  `created_by` varchar(50) NOT NULL DEFAULT 'SYSTEM',
  `created_on` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `company_name_UNIQUE` (`company_name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
