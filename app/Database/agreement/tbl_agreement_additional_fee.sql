CREATE TABLE IF NOT EXISTS `tbl_agreement_additional_fee` (
  `id`            INT(11)      NOT NULL AUTO_INCREMENT,
  `agreement_id`  INT(11)      NOT NULL COMMENT 'FK tbl_agreement_agreement.id',
  `description`   VARCHAR(150) NOT NULL,
  `amount`        DECIMAL(10,2) NOT NULL DEFAULT 0,
  `sort_order`    INT(11)      NOT NULL DEFAULT 0,
  `insert_on`     DATETIME     DEFAULT NULL,
  `update_on`     DATETIME     DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `idx_agreement_id` (`agreement_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
