CREATE TABLE `salary_history` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `salary` decimal(11,2) NOT NULL DEFAULT '0.00',
  `pay_period` tinyint(4) NOT NULL DEFAULT '1',
  `effective_date` date NOT NULL,
  `is_current` bit(1) NOT NULL DEFAULT b'1',
  `modified_by` varchar(50) NOT NULL DEFAULT 'SYSTEM',
  `modified_on` datetime NOT NULL,
  `created_by` varchar(50) NOT NULL DEFAULT 'SYSTEM',
  `created_on` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
