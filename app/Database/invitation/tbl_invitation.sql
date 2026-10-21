-- Invitation Received dashboard + reminder emails.
-- Applications themselves are NOT copied anywhere: the dashboard reads tbl_client_application
-- live (status name contains "invitation received"). These two tables only hold what the
-- application row can't: the dashboard-only Archive/Hide flag, and a sent-email log that
-- makes every scheduled email idempotent.

-- One row = application hidden from the Invitation Received dashboard (and from its
-- reminder/summary emails). Restore deletes the row. The application itself is never touched.
CREATE TABLE IF NOT EXISTS `tbl_invitation_archive` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `application_id` int(11) NOT NULL COMMENT 'FK tbl_client_application.id',
  `archived_by` int(11) DEFAULT NULL COMMENT 'tbl_reg.id of staff who archived it',
  `archived_on` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uniq_application` (`application_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- One row per email actually sent. The unique key is the duplicate guard:
--   reminder_7 / reminder_3 / reminder_1 -> application_id + the tentative date it was for
--     (so a changed tentative date gets a fresh set of reminders automatically)
--   daily_summary -> application_id = 0, target_date = the summary's day
CREATE TABLE IF NOT EXISTS `tbl_invitation_email_log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email_type` varchar(20) NOT NULL COMMENT 'reminder_7|reminder_3|reminder_1|daily_summary',
  `application_id` int(11) NOT NULL DEFAULT 0,
  `target_date` date NOT NULL,
  `sent_to` varchar(1000) DEFAULT NULL,
  `sent_on` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uniq_email` (`email_type`, `application_id`, `target_date`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
