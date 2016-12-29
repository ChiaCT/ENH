CREATE TABLE `reference` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `reference_number` varchar(20) NOT NULL DEFAULT 'n/a',
  `confirmation_number` varchar(20) NOT NULL DEFAULT 'n/a',
  `invoice_number` varchar(50) NOT NULL DEFAULT 'n/a',
  `order_number` varchar(20) NOT NULL DEFAULT 'n/a',
  `transaction_number` varchar(20) NOT NULL DEFAULT 'n/a',
  `check_number` varchar(20) NOT NULL DEFAULT 'n/a',
  `credit_card_id` int(11) NOT NULL DEFAULT '0',
  `modified_by` varchar(50) NOT NULL DEFAULT 'SYSTEM',
  `modified_on` datetime NOT NULL,
  `created_by` varchar(50) NOT NULL DEFAULT 'SYSTEM',
  `created_on` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
