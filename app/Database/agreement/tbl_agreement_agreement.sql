CREATE TABLE IF NOT EXISTS `tbl_agreement_agreement` (
  `id`             INT(11)      NOT NULL AUTO_INCREMENT,
  `application_id` INT(11)      NOT NULL COMMENT 'FK tbl_client_application.id',
  `prospect_id`    INT(11)      NOT NULL COMMENT 'FK tbl_client_prospect.id, denormalized for lookups',
  `client_name`    VARCHAR(150) DEFAULT NULL COMMENT 'snapshot at draft creation',
  `client_email`   VARCHAR(100) DEFAULT NULL,
  `client_phone`   VARCHAR(30)  DEFAULT NULL,
  `client_address` VARCHAR(255) DEFAULT NULL COMMENT 'snapshot at draft creation, from tbl_client_prospect.address + city',
  `category_id`    INT(11)      DEFAULT NULL COMMENT 'snapshot, editable in a later phase',
  `type_id`        INT(11)      DEFAULT NULL COMMENT 'snapshot, editable in a later phase',
  `status`         VARCHAR(20)  NOT NULL DEFAULT 'draft' COMMENT 'draft|sent|viewed|signed|declined|cancelled',
  `hide`           TINYINT(1)   NOT NULL DEFAULT 0 COMMENT 'soft-hide, never hard delete',
  `created_by`     INT(11)      DEFAULT NULL COMMENT 'tbl_reg.id / session id of staff who triggered it',
  `insert_on`      DATETIME     DEFAULT NULL,
  `update_on`      DATETIME     DEFAULT NULL,
  `active_application_id` INT(11) GENERATED ALWAYS AS (IF(`hide` = 0, `application_id`, NULL)) VIRTUAL COMMENT 'NULL when hidden, so hidden rows never block a new draft for the same application',
  `reference_number` VARCHAR(30)   DEFAULT NULL COMMENT 'e.g. SIA-2026-000145, generated lazily from id',
  `agreement_date`   DATE          DEFAULT NULL,
  `consultant_name`  VARCHAR(150)  DEFAULT NULL,
  `rcic_number`      VARCHAR(30)   DEFAULT NULL,
  `currency`         VARCHAR(10)   DEFAULT 'CAD',
  `template_name`    VARCHAR(100)  DEFAULT 'Default Template',
  `service_fee`      DECIMAL(10,2) DEFAULT 0,
  `gst_rate`         DECIMAL(5,2)  DEFAULT 5.00,
  `gst_amount`       DECIMAL(10,2) DEFAULT 0,
  `government_fee`   DECIMAL(10,2) DEFAULT 0 COMMENT 'auto-summed from the govt_* breakdown fields below',
  `govt_proc_main`         DECIMAL(10,2) DEFAULT 0 COMMENT 'Government processing fee - Main Applicant',
  `govt_proc_spouse`       DECIMAL(10,2) DEFAULT 0 COMMENT 'Government processing fee - Spouse',
  `govt_proc_dep_above22`  TEXT DEFAULT NULL COMMENT 'Government processing fee - Dependent child(ren) above 22, JSON array of per-child fee amounts e.g. [500,300]; legacy rows may hold a single plain decimal',
  `govt_proc_dep_under22`  DECIMAL(10,2) DEFAULT 0 COMMENT 'Government processing fee - Dependent child under 22 (retired field, no longer editable in the UI; legacy value kept as-is and unused)',
  `govt_pr_main`           DECIMAL(10,2) DEFAULT 0 COMMENT 'Government Right of Permanent Residence fee - Main Applicant',
  `govt_pr_spouse`         DECIMAL(10,2) DEFAULT 0 COMMENT 'Government Right of Permanent Residence fee - Spouse',
  `govt_pr_pnp`            DECIMAL(10,2) DEFAULT 0 COMMENT 'Government Right of Permanent Residence fee - PNP Govt.',
  `other_fee`        DECIMAL(10,2) DEFAULT 0,
  `total_amount`     DECIMAL(10,2) DEFAULT 0,
  `require_client_signature`     TINYINT(1) DEFAULT 1,
  `require_consultant_signature` TINYINT(1) DEFAULT 1,
  `email_verification`          TINYINT(1) DEFAULT 1,
  `send_reminder`                TINYINT(1) DEFAULT 1,
  `reminder_days`    INT(11) DEFAULT 3 COMMENT 'retired: reminder timing is now the fixed 24h/3d/7d ladder in Agreement_model::getDueForReminder(), not this per-agreement interval',
  `max_reminders`    INT(11) DEFAULT 2 COMMENT 'retired: the fixed ladder always tops out at 3 reminders, not this per-agreement cap',
  `reminders_sent`   INT(11) NOT NULL DEFAULT 0 COMMENT 'how many of the 3 fixed-ladder reminders (24h/3d/7d after last_sent_at) have gone out so far',
  `last_reminder_at` DATETIME DEFAULT NULL COMMENT 'last reminder send time, informational — the ladder itself is timed from last_sent_at, not this',
  `sign_token`         VARCHAR(64)  DEFAULT NULL COMMENT 'generated lazily when a signing link is first created',
  `sign_password`      VARCHAR(10)  DEFAULT NULL COMMENT '6-digit access PIN emailed to the client, generated lazily alongside sign_token',
  `last_sent_at`       DATETIME     DEFAULT NULL COMMENT 'set on every successful "Send for eSign" email; guards against duplicate sends from rapid double-clicks',
  `viewed_at`          DATETIME     DEFAULT NULL,
  `viewed_ip`          VARCHAR(45)  DEFAULT NULL,
  `viewed_notified_at` DATETIME DEFAULT NULL COMMENT 'when the Team - Agreement Viewed email actually went out (see App\\Commands\\SendAgreementViewedNotifications) — null means either not yet due, or skipped because the client signed/declined before the debounce window passed',
  `consultant_signature` VARCHAR(255) DEFAULT NULL COMMENT 'file path under public/assets/agreement_signatures/',
  `client_signature`      VARCHAR(255) DEFAULT NULL COMMENT 'file path, current (draft or final) client signature image',
  `client_signature_type` VARCHAR(10)  DEFAULT NULL COMMENT 'draw|type|upload',
  `client_typed_name`     VARCHAR(150) DEFAULT NULL COMMENT 'only set when signature_type = type',
  `consent_accepted`   TINYINT(1)   NOT NULL DEFAULT 0,
  `client_signed_at`   DATETIME     DEFAULT NULL,
  `client_signed_ip`   VARCHAR(45)  DEFAULT NULL,
  `client_signed_device` VARCHAR(255) DEFAULT NULL COMMENT 'user agent string, captured at signing',
  `declined_at`        DATETIME     DEFAULT NULL,
  `decline_reason`     VARCHAR(255) DEFAULT NULL,
  `custom_clauses`     LONGTEXT     DEFAULT NULL COMMENT 'JSON map of clause-index => admin-edited HTML override, from the per-agreement clause text editor',
  `pdf_path`           VARCHAR(255) DEFAULT NULL COMMENT 'file path under public/assets/agreement_pdfs/, generated + locked once signed',
  `cancelled_at`       DATETIME     DEFAULT NULL,
  `cancel_reason`      VARCHAR(255) DEFAULT NULL,
  `cancelled_by`       INT(11)      DEFAULT NULL COMMENT 'tbl_reg.id / session id of staff who cancelled it',
  PRIMARY KEY (`id`),
  KEY `idx_application_id` (`application_id`),
  KEY `idx_prospect_id` (`prospect_id`),
  UNIQUE KEY `uniq_active_application` (`active_application_id`),
  UNIQUE KEY `uniq_sign_token` (`sign_token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Run these ALTERs if upgrading an existing table created before the unique-active-application guard:
-- ALTER TABLE `tbl_agreement_agreement`
--   ADD COLUMN `active_application_id` INT(11) GENERATED ALWAYS AS (IF(`hide` = 0, `application_id`, NULL)) VIRTUAL AFTER `update_on`,
--   ADD UNIQUE KEY `uniq_active_application` (`active_application_id`);

-- Run these ALTERs if upgrading an existing table created before the Create/Edit Agreement form fields:
-- ALTER TABLE `tbl_agreement_agreement`
--   ADD COLUMN `reference_number` VARCHAR(30) DEFAULT NULL AFTER `update_on`,
--   ADD COLUMN `agreement_date` DATE DEFAULT NULL,
--   ADD COLUMN `consultant_name` VARCHAR(150) DEFAULT NULL,
--   ADD COLUMN `rcic_number` VARCHAR(30) DEFAULT NULL,
--   ADD COLUMN `currency` VARCHAR(10) DEFAULT 'CAD',
--   ADD COLUMN `template_name` VARCHAR(100) DEFAULT 'Default Template',
--   ADD COLUMN `service_fee` DECIMAL(10,2) DEFAULT 0,
--   ADD COLUMN `gst_rate` DECIMAL(5,2) DEFAULT 5.00,
--   ADD COLUMN `gst_amount` DECIMAL(10,2) DEFAULT 0,
--   ADD COLUMN `government_fee` DECIMAL(10,2) DEFAULT 0,
--   ADD COLUMN `other_fee` DECIMAL(10,2) DEFAULT 0,
--   ADD COLUMN `total_amount` DECIMAL(10,2) DEFAULT 0,
--   ADD COLUMN `require_client_signature` TINYINT(1) DEFAULT 1,
--   ADD COLUMN `require_consultant_signature` TINYINT(1) DEFAULT 1,
--   ADD COLUMN `email_verification` TINYINT(1) DEFAULT 1,
--   ADD COLUMN `send_reminder` TINYINT(1) DEFAULT 1,
--   ADD COLUMN `reminder_days` INT(11) DEFAULT 3,
--   ADD COLUMN `max_reminders` INT(11) DEFAULT 2;

-- Run these ALTERs if upgrading an existing table created before the client signing page:
-- ALTER TABLE `tbl_agreement_agreement`
--   ADD COLUMN `sign_token` VARCHAR(64) DEFAULT NULL AFTER `max_reminders`,
--   ADD COLUMN `viewed_at` DATETIME DEFAULT NULL,
--   ADD COLUMN `viewed_ip` VARCHAR(45) DEFAULT NULL,
--   ADD COLUMN `consultant_signature` VARCHAR(255) DEFAULT NULL,
--   ADD COLUMN `client_signature` VARCHAR(255) DEFAULT NULL,
--   ADD COLUMN `client_signature_type` VARCHAR(10) DEFAULT NULL,
--   ADD COLUMN `client_typed_name` VARCHAR(150) DEFAULT NULL,
--   ADD COLUMN `consent_accepted` TINYINT(1) NOT NULL DEFAULT 0,
--   ADD COLUMN `client_signed_at` DATETIME DEFAULT NULL,
--   ADD COLUMN `client_signed_ip` VARCHAR(45) DEFAULT NULL,
--   ADD COLUMN `client_signed_device` VARCHAR(255) DEFAULT NULL,
--   ADD COLUMN `declined_at` DATETIME DEFAULT NULL,
--   ADD COLUMN `decline_reason` VARCHAR(255) DEFAULT NULL,
--   ADD UNIQUE KEY `uniq_sign_token` (`sign_token`);

-- Run this ALTER if upgrading an existing table created before PDF generation/locking:
-- ALTER TABLE `tbl_agreement_agreement`
--   ADD COLUMN `pdf_path` VARCHAR(255) DEFAULT NULL AFTER `decline_reason`;

-- Run this ALTER if upgrading an existing table created before the client-side access PIN:
-- ALTER TABLE `tbl_agreement_agreement`
--   ADD COLUMN `sign_password` VARCHAR(10) DEFAULT NULL AFTER `sign_token`;

-- Run this ALTER if upgrading an existing table created before the itemized government-fee breakdown
-- (Payment Terms and Conditions clause: Government processing fee + Government Right of Permanent
-- Residence fee, each split by applicant type). `government_fee` remains the auto-summed total.
-- ALTER TABLE `tbl_agreement_agreement`
--   ADD COLUMN `govt_proc_main`        DECIMAL(10,2) DEFAULT 0 AFTER `government_fee`,
--   ADD COLUMN `govt_proc_spouse`      DECIMAL(10,2) DEFAULT 0 AFTER `govt_proc_main`,
--   ADD COLUMN `govt_proc_dep_above22` DECIMAL(10,2) DEFAULT 0 AFTER `govt_proc_spouse`,
--   ADD COLUMN `govt_proc_dep_under22` DECIMAL(10,2) DEFAULT 0 AFTER `govt_proc_dep_above22`,
--   ADD COLUMN `govt_pr_main`          DECIMAL(10,2) DEFAULT 0 AFTER `govt_proc_dep_under22`,
--   ADD COLUMN `govt_pr_spouse`        DECIMAL(10,2) DEFAULT 0 AFTER `govt_pr_main`,
--   ADD COLUMN `govt_pr_pnp`           DECIMAL(10,2) DEFAULT 0 AFTER `govt_pr_spouse`;

-- Run this ALTER if upgrading an existing table created before the duplicate-send guard:
-- ALTER TABLE `tbl_agreement_agreement`
--   ADD COLUMN `last_sent_at` DATETIME DEFAULT NULL AFTER `sign_password`;

-- Run this ALTER if upgrading an existing table created before the "Dependent Child Above 22"
-- add-more-children UI. Widens the column from a single DECIMAL to TEXT so it can hold a JSON
-- array of per-child fees (e.g. "[500,300]"); existing plain-decimal values (e.g. "500.00")
-- are left as-is and are still read correctly (treated as a single-child list).
-- `govt_proc_dep_under22` is retired by the same change (the field was removed from the form);
-- its column is untouched and simply no longer read or written by the app.
-- ALTER TABLE `tbl_agreement_agreement`
--   MODIFY COLUMN `govt_proc_dep_above22` TEXT DEFAULT NULL;

-- Run this ALTER if upgrading an existing table created before the per-agreement clause
-- text editor (clause 6, the fee breakdown, is always auto-generated and never overridable):
-- ALTER TABLE `tbl_agreement_agreement`
--   ADD COLUMN `custom_clauses` LONGTEXT DEFAULT NULL AFTER `decline_reason`;

-- Run this ALTER if upgrading an existing table created before the client address snapshot
-- (auto-filled from tbl_client_prospect.address + city when the draft is first created,
-- editable afterward like client_name/client_phone):
-- ALTER TABLE `tbl_agreement_agreement`
--   ADD COLUMN `client_address` VARCHAR(255) DEFAULT NULL AFTER `client_phone`;

-- Run this ALTER if upgrading an existing table created before the automatic reminder-email
-- cron (see App\Commands\SendAgreementReminders): tracks how many of the fixed-ladder
-- reminders have gone out.
-- ALTER TABLE `tbl_agreement_agreement`
--   ADD COLUMN `reminders_sent` INT(11) NOT NULL DEFAULT 0 AFTER `max_reminders`,
--   ADD COLUMN `last_reminder_at` DATETIME DEFAULT NULL AFTER `reminders_sent`;

-- Run this ALTER if upgrading an existing table created before the debounced "Team - Agreement
-- Viewed" notification (see App\Commands\SendAgreementViewedNotifications):
-- ALTER TABLE `tbl_agreement_agreement`
--   ADD COLUMN `viewed_notified_at` DATETIME DEFAULT NULL AFTER `viewed_ip`;

-- Run this ALTER if upgrading an existing table created before the Team/Admin "Cancel
-- Agreement" action (Sent/Viewed/Signed documents can be cancelled; status becomes
-- 'cancelled', signed PDF/history stays untouched, and the row can no longer be edited or signed):
-- ALTER TABLE `tbl_agreement_agreement`
--   ADD COLUMN `cancelled_at`  DATETIME     DEFAULT NULL AFTER `pdf_path`,
--   ADD COLUMN `cancel_reason` VARCHAR(255) DEFAULT NULL AFTER `cancelled_at`,
--   ADD COLUMN `cancelled_by`  INT(11)      DEFAULT NULL AFTER `cancel_reason`;
