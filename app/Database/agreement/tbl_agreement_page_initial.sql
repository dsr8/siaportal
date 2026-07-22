CREATE TABLE IF NOT EXISTS `tbl_agreement_page_initial` (
  `id`             INT(11)      NOT NULL AUTO_INCREMENT,
  `agreement_id`   INT(11)      NOT NULL COMMENT 'FK tbl_agreement_agreement.id',
  `page_number`    INT(11)      NOT NULL COMMENT '1-based page index within the signing document (1-9; page 10 uses the full signature instead)',
  `initial_type`   VARCHAR(10)  DEFAULT NULL COMMENT 'draw|type|upload',
  `initial_path`   VARCHAR(255) DEFAULT NULL COMMENT 'file path under public/assets/agreement_signatures/, when type=draw|upload',
  `typed_initials` VARCHAR(50)  DEFAULT NULL COMMENT 'when type=type',
  `initialed_at`   DATETIME     DEFAULT NULL,
  `initialed_ip`   VARCHAR(45)  DEFAULT NULL,
  `insert_on`      DATETIME     DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `idx_agreement_id` (`agreement_id`),
  UNIQUE KEY `uniq_agreement_page` (`agreement_id`, `page_number`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
