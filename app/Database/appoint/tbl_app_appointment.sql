CREATE TABLE IF NOT EXISTS `tbl_app_appointment` (
  `id`                INT(11) NOT NULL AUTO_INCREMENT,
  `prospect_id`       INT(11)       DEFAULT NULL,
  `client_name`       VARCHAR(100) NOT NULL,
  `client_email`      VARCHAR(100) DEFAULT NULL,
  `client_phone`      VARCHAR(20)  DEFAULT NULL,
  `appointment_date`  DATE         NOT NULL,
  `appointment_time`  TIME         NOT NULL,
  `service_type`      VARCHAR(100) NOT NULL,
  `appointment_type`  VARCHAR(150) DEFAULT NULL,
  `consultation_type` VARCHAR(50)  DEFAULT NULL COMMENT 'Telephonic or In-Person',
  `office_location`   VARCHAR(100) DEFAULT NULL,
  `contact_method`    VARCHAR(50)  DEFAULT NULL,
  `inside_canada`     VARCHAR(10)  DEFAULT NULL COMMENT 'Yes or No',
  `existing_client`   VARCHAR(10)  DEFAULT NULL COMMENT 'Yes or No',
  `immigration_status` VARCHAR(150) DEFAULT NULL,
  `notes`             TEXT         DEFAULT NULL,
  `status`            TINYINT(1)   NOT NULL DEFAULT 0 COMMENT '0=Pending,1=Confirmed,2=Completed,3=Cancelled',
  `assigned_to`       VARCHAR(100) DEFAULT NULL,
  `insert_on`         DATETIME     DEFAULT NULL,
  `update_on`         DATETIME     DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Run these ALTER statements if upgrading an existing table:
-- ALTER TABLE `tbl_app_appointment` ADD COLUMN `inside_canada` VARCHAR(10) DEFAULT NULL AFTER `contact_method`;
-- ALTER TABLE `tbl_app_appointment` ADD COLUMN `existing_client` VARCHAR(10) DEFAULT NULL AFTER `inside_canada`;
-- ALTER TABLE `tbl_app_appointment` ADD COLUMN `immigration_status` VARCHAR(150) DEFAULT NULL AFTER `existing_client`;
