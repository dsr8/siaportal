CREATE TABLE IF NOT EXISTS `tbl_agreement_template` (
  `id`             INT(11)      NOT NULL AUTO_INCREMENT,
  `name`           VARCHAR(150) NOT NULL COMMENT 'template label shown in the picker',
  `type_id`        INT(11)      DEFAULT NULL COMMENT 'FK tbl_type_client.tyid, prefills Application Type',
  `category_id`    INT(11)      DEFAULT NULL,
  `service_fee`    DECIMAL(10,2) DEFAULT 0,
  `government_fee` DECIMAL(10,2) DEFAULT 0 COMMENT 'auto-summed from the govt_* breakdown fields below',
  `govt_proc_main`         DECIMAL(10,2) DEFAULT 0,
  `govt_proc_spouse`       DECIMAL(10,2) DEFAULT 0,
  `govt_proc_dep_above22`  DECIMAL(10,2) DEFAULT 0,
  `govt_proc_dep_under22`  DECIMAL(10,2) DEFAULT 0,
  `govt_pr_main`           DECIMAL(10,2) DEFAULT 0,
  `govt_pr_spouse`         DECIMAL(10,2) DEFAULT 0,
  `govt_pr_pnp`            DECIMAL(10,2) DEFAULT 0,
  `other_fee`      DECIMAL(10,2) DEFAULT 0,
  `created_by`     INT(11)      DEFAULT NULL COMMENT 'tbl_reg.id / session id of staff who saved it',
  `insert_on`      DATETIME     DEFAULT NULL,
  `update_on`      DATETIME     DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `idx_type_id` (`type_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Run this ALTER if upgrading an existing table created before the itemized government-fee breakdown:
-- ALTER TABLE `tbl_agreement_template`
--   ADD COLUMN `govt_proc_main`        DECIMAL(10,2) DEFAULT 0 AFTER `government_fee`,
--   ADD COLUMN `govt_proc_spouse`      DECIMAL(10,2) DEFAULT 0 AFTER `govt_proc_main`,
--   ADD COLUMN `govt_proc_dep_above22` DECIMAL(10,2) DEFAULT 0 AFTER `govt_proc_spouse`,
--   ADD COLUMN `govt_proc_dep_under22` DECIMAL(10,2) DEFAULT 0 AFTER `govt_proc_dep_above22`,
--   ADD COLUMN `govt_pr_main`          DECIMAL(10,2) DEFAULT 0 AFTER `govt_proc_dep_under22`,
--   ADD COLUMN `govt_pr_spouse`        DECIMAL(10,2) DEFAULT 0 AFTER `govt_pr_main`,
--   ADD COLUMN `govt_pr_pnp`           DECIMAL(10,2) DEFAULT 0 AFTER `govt_pr_spouse`;
