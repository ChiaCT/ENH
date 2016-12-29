CREATE TABLE `account` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `account_name` varchar(60) NOT NULL,
  `account_type_id` int(11) NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `modified_by` varchar(50) NOT NULL DEFAULT 'SYSTEM',
  `modified_on` datetime NOT NULL,
  `created_by` varchar(50) NOT NULL DEFAULT 'SYSTEM',
  `created_on` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `ACCOUNT_NAME` (`account_name`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='An account may belong to a company but may not have a person and vice versa';
