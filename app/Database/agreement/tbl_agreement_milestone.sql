CREATE TABLE IF NOT EXISTS `tbl_agreement_milestone` (
  `id`                INT(11)      NOT NULL AUTO_INCREMENT,
  `agreement_id`      INT(11)      NOT NULL COMMENT 'FK tbl_agreement_agreement.id',
  `milestone`         VARCHAR(150) NOT NULL,
  `amount`            DECIMAL(10,2) DEFAULT NULL COMMENT 'NULL = shown as "Included"',
  `due_date`          VARCHAR(50)  DEFAULT NULL COMMENT 'free text: real date or relative text like "Within 7 days"',
  `included_services` VARCHAR(255) DEFAULT NULL,
  `sort_order`        INT(11)      NOT NULL DEFAULT 0,
  `insert_on`         DATETIME     DEFAULT NULL,
  `update_on`         DATETIME     DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `idx_agreement_id` (`agreement_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
