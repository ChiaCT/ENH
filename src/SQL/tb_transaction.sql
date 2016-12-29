CREATE TABLE `transaction` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `account_id` int(11) NOT NULL DEFAULT '0',
  `payment_type_id` int(11) NOT NULL DEFAULT '0',
  `reference_id` int(11) NOT NULL DEFAULT '0',
  `note_id` int(11) NOT NULL DEFAULT '0',
  `amount` decimal(11,2) NOT NULL DEFAULT '0.00',
  `transaction_date` date NOT NULL,
  `pay_date` date DEFAULT NULL,
  `exclude` bit(1) NOT NULL DEFAULT b'0',
  `modified_by` varchar(50) NOT NULL DEFAULT 'SYSTEM',
  `modified_on` datetime NOT NULL,
  `created_by` varchar(50) NOT NULL DEFAULT 'SYSTEM',
  `created_on` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
