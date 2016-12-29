CREATE TABLE `address` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `address_ln1` varchar(60) NOT NULL,
  `address_ln2` varchar(60) DEFAULT NULL,
  `city` varchar(60) NOT NULL,
  `state` varchar(2) NOT NULL,
  `zip` varchar(10) NOT NULL,
  `modified_by` varchar(50) NOT NULL DEFAULT 'SYSTEM',
  `modified_on` datetime NOT NULL,
  `created_by` varchar(50) NOT NULL DEFAULT 'SYSTEM',
  `created_on` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
