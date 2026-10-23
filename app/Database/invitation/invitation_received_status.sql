-- "Invitation Received" status at position 3 of the status dropdown for:
-- FSW NA (110), FSTW NA (109), Canadian Exp Class Express Entry (3), BC PNP SW In Can NA (104),
-- BC PNP SW Overseas NA (105), AINP NA (100), MINP NA (75), SINP NA (120),
-- BC PNP Heathcare Prof NA (103), NSNP Skilled Worked (122).
--
-- Dropdown order = IF(sort_order > 0, sort_order, id * 10) (see Status_model::getpost_status35()).
-- Every existing row keeps sort_order 0, so it stays in id order exactly as before; the new
-- row gets (2nd status id * 10) + 5, which puts it right after the 2nd status.

-- 0) Check first: type ids must match these names on this DB.
SELECT t.id, c.category, t.type FROM tbl_type_client t JOIN tbl_category c ON c.id = t.category_id
WHERE t.id IN (110, 109, 3, 104, 105, 100, 75, 120, 103, 122);

-- 1) Order column
ALTER TABLE tbl_status ADD COLUMN sort_order INT NOT NULL DEFAULT 0 AFTER status;

-- 2) NSNP Skilled Worked (122) has no statuses at all — give it the same flow as the others.
--    Inserted in order, so id order = dropdown order (Invitation Received is added in step 3).
INSERT INTO tbl_status (category_id, type_id, app_status, status, sort_order, insert_on, update_on)
SELECT t.category_id, t.id, x.app_status, 1, 0, NOW(), NOW()
FROM tbl_type_client t
JOIN (SELECT 1 AS n, 'Assign Team Member' AS app_status
      UNION ALL SELECT 2, 'Application In Process') x
WHERE t.id = 122
  AND NOT EXISTS (SELECT 1 FROM tbl_status s WHERE s.type_id = t.id)
ORDER BY x.n;

-- 3) Invitation Received after the 2nd status of each type
INSERT INTO tbl_status (category_id, type_id, app_status, status, sort_order, insert_on, update_on)
SELECT t.category_id, t.id, 'Invitation Received', 1,
       (SELECT s2.id FROM tbl_status s2 WHERE s2.type_id = t.id ORDER BY s2.id LIMIT 1, 1) * 10 + 5,
       NOW(), NOW()
FROM tbl_type_client t
WHERE t.id IN (110, 109, 3, 104, 105, 100, 75, 120, 103, 122)
  AND NOT EXISTS (SELECT 1 FROM tbl_status s WHERE s.type_id = t.id AND s.app_status LIKE '%invitation received%');

-- 4) Rest of the NSNP flow (after Invitation Received, so plain id order is enough)
INSERT INTO tbl_status (category_id, type_id, app_status, status, sort_order, insert_on, update_on)
SELECT t.category_id, t.id, x.app_status, 1, 0, NOW(), NOW()
FROM tbl_type_client t
JOIN (SELECT 1 AS n, 'Application Submitted' AS app_status
      UNION ALL SELECT 2, 'Approved'
      UNION ALL SELECT 3, 'Refused') x
WHERE t.id = 122
  AND (SELECT COUNT(*) FROM tbl_status s WHERE s.type_id = t.id) = 3
ORDER BY x.n;

-- 4b) Express Entry style flows: invitation comes after the profile is submitted.
--     CEC (3): after Profile submitted (17) -> 175.
--     FSW (110): Profile in process / created / submitted (590-592) were added later and sat after
--     Refused; move them to the top, then Invitation Received, all before Assign Team Member (380 -> 3800).
UPDATE tbl_status SET sort_order = 175  WHERE id = 596 AND type_id = 3;
UPDATE tbl_status SET sort_order = 3791 WHERE id = 590 AND type_id = 110;
UPDATE tbl_status SET sort_order = 3792 WHERE id = 591 AND type_id = 110;
UPDATE tbl_status SET sort_order = 3793 WHERE id = 592 AND type_id = 110;
UPDATE tbl_status SET sort_order = 3794 WHERE id = 603 AND type_id = 110;

-- 5) Verify: Invitation Received should be 3rd in every list (after Profile submitted for CEC / FSW)
SELECT s.type_id, s.id, s.app_status, s.sort_order
FROM tbl_status s
WHERE s.type_id IN (110, 109, 3, 104, 105, 100, 75, 120, 103, 122)
ORDER BY s.type_id + 0, IF(s.sort_order > 0, s.sort_order, s.id * 10), s.id;
