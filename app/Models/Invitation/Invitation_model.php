<?php
namespace App\Models\Invitation;
use CodeIgniter\Model;

// Invitation Received dashboard + reminder/summary emails.
//
// There is no separate "invitation" record: every query reads tbl_client_application live, so
// a status change or an edit on the existing Edit Application page shows up here immediately.
// An application is "in" this dashboard while its status name contains "invitation received"
// (e.g. "Invitation received", "Invitation received(Bcpnp)", "Express entry invitation
// received") — matched by name rather than a hard-coded id list, so new categories/types whose
// status is named that way are picked up without a code change.
//
// This model's own table (tbl_invitation_archive) only stores the dashboard-only Archive/Hide flag.
class Invitation_model extends Model
{
    protected $table      = 'tbl_invitation_archive';
    protected $primaryKey = 'id';
    protected $returnType = 'array';

    protected $allowedFields = ['application_id', 'archived_by', 'archived_on'];

    public const STATUS_MATCH = 'invitation received';

    // Reminder ladder: days before the tentative submission date => email_type in the log.
    public const REMINDER_DAYS = [7 => 'reminder_7', 3 => 'reminder_3', 1 => 'reminder_1'];

    // Any real date sorts after this; '0000-00-00' (the "not entered" value) does not.
    private const VALID_DATE_FLOOR = '1000-01-01';

    // Shared FROM/JOIN/WHERE for every list/count/email query. $archived: false = active
    // dashboard (the default everywhere, incl. emails), true = the "View Hidden" list.
    private function baseBuilder(bool $archived = false)
    {
        $builder = $this->db->table('client_application a')
            ->join('status s', 's.id = a.application_status', 'inner')
            ->join('client_prospect p', 'p.id = a.siaportalid', 'left')
            ->join('reg tm', 'tm.id = a.assign_to', 'left')
            ->join('category c', 'c.id = a.category', 'left')
            ->join('type_client t', 't.id = a.type', 'left')
            ->join('invitation_archive ar', 'ar.application_id = a.id', 'left')
            ->like('s.app_status', self::STATUS_MATCH);

        $archived ? $builder->where('ar.id IS NOT NULL', null, false)
                  : $builder->where('ar.id IS NULL', null, false);

        return $builder;
    }

    private function overdueSql(string $today): string
    {
        return "(a.invitation_date_tantative > '" . self::VALID_DATE_FLOOR . "' AND a.invitation_date_tantative < " . $this->db->escape($today) . ")";
    }

    private function selectColumns($builder, string $today)
    {
        return $builder->select(
            "a.id, a.siaportalid, a.category, a.type, a.application_status, a.assign_to,
             a.invitation_date_tantative, a.invitation_date_final, a.update_on,
             p.heading AS client_name, p.email AS client_email,
             TRIM(CONCAT(IFNULL(tm.firstname,''), ' ', IFNULL(tm.lastname,''))) AS team_member_name,
             tm.email AS team_member_email,
             c.category AS category_name, t.type AS type_name, s.app_status AS status_name,
             ar.archived_on,
             IF(" . $this->overdueSql($today) . ", 'overdue', 'pending') AS invitation_status",
            false
        );
    }

    // $filters: q, team (tbl_reg.id), date_from, date_to (tentative date), inv (pending|overdue)
    private function applyFilters($builder, array $filters, string $today, bool $withInvStatus = true)
    {
        if (!empty($filters['team'])) {
            $builder->where('a.assign_to', (string) (int) $filters['team']);
        }
        if (!empty($filters['date_from'])) {
            $builder->where('a.invitation_date_tantative >=', $filters['date_from']);
        }
        if (!empty($filters['date_to'])) {
            $builder->where('a.invitation_date_tantative <=', $filters['date_to']);
        }
        if (!empty($filters['q'])) {
            $q = $filters['q'];
            $builder->groupStart()
                ->like('p.heading', $q)
                ->orLike('a.siaportalid', $q)
                ->orLike('p.email', $q)
                ->groupEnd();
        }
        if ($withInvStatus && !empty($filters['inv'])) {
            $builder->where(($filters['inv'] === 'overdue' ? '' : 'NOT ') . $this->overdueSql($today), null, false);
        }
        return $builder;
    }

    public function getList(array $filters, int $page, int $perPage, string $today, bool $archived = false): array
    {
        $builder = $this->selectColumns($this->baseBuilder($archived), $today);
        $this->applyFilters($builder, $filters, $today);

        // Dated entries first (earliest deadline on top, so overdue rises to the top), undated last.
        return $builder
            ->orderBy("(a.invitation_date_tantative > '" . self::VALID_DATE_FLOOR . "')", 'DESC', false)
            ->orderBy('a.invitation_date_tantative', 'ASC')
            ->orderBy('a.id', 'DESC')
            ->limit($perPage, ($page - 1) * $perPage)
            ->get()->getResultArray();
    }

    public function getTotal(array $filters, string $today, bool $archived = false): int
    {
        $builder = $this->baseBuilder($archived);
        $this->applyFilters($builder, $filters, $today);
        return (int) $builder->countAllResults();
    }

    // Card counts follow the team/date/search filters but ignore the Pending/Overdue card filter
    // itself, so clicking a card never zeroes out the other card. Archived rows never count.
    public function getCounts(array $filters, string $today): array
    {
        $builder = $this->baseBuilder(false)
            ->select("COUNT(*) AS total, SUM(" . $this->overdueSql($today) . ") AS overdue", false);
        $this->applyFilters($builder, $filters, $today, false);
        $row = $builder->get()->getRowArray() ?: [];

        $total   = (int) ($row['total'] ?? 0);
        $overdue = (int) ($row['overdue'] ?? 0);
        return ['total' => $total, 'pending' => $total - $overdue, 'overdue' => $overdue];
    }

    public function getArchivedCount(): int
    {
        return (int) $this->baseBuilder(true)->countAllResults();
    }

    // Team members who currently have at least one entry (active or hidden) — for the filter dropdown.
    public function getTeamMembers(): array
    {
        return $this->db->table('client_application a')
            ->select("DISTINCT tm.id, TRIM(CONCAT(tm.firstname, ' ', tm.lastname)) AS name", false)
            ->join('status s', 's.id = a.application_status', 'inner')
            ->join('reg tm', 'tm.id = a.assign_to', 'inner')
            ->like('s.app_status', self::STATUS_MATCH)
            ->orderBy('name', 'ASC')
            ->get()->getResultArray();
    }

    // Every active (non-archived) entry, unpaged — the daily summary's data set.
    public function getAllActive(string $today): array
    {
        return $this->selectColumns($this->baseBuilder(false), $today)
            ->orderBy('team_member_name', 'ASC')
            ->orderBy("(a.invitation_date_tantative > '" . self::VALID_DATE_FLOOR . "')", 'DESC', false)
            ->orderBy('a.invitation_date_tantative', 'ASC')
            ->get()->getResultArray();
    }

    // Active entries whose tentative date is exactly 7, 3 or 1 day(s) after $today. Undated
    // entries can never match, so they never get date-based reminders.
    public function getDueForReminder(string $today): array
    {
        $targets = [];
        foreach (array_keys(self::REMINDER_DAYS) as $days) {
            $targets[] = date('Y-m-d', strtotime($today . ' +' . $days . ' days'));
        }

        return $this->selectColumns($this->baseBuilder(false), $today)
            ->whereIn('a.invitation_date_tantative', $targets)
            ->get()->getResultArray();
    }

    // Adds an 'agreement' key (latest non-hidden retainer agreement, or null) to each row,
    // in one query for the whole page rather than one per row.
    public function attachAgreements(array $rows): array
    {
        if (empty($rows)) {
            return $rows;
        }

        $agreements = $this->db->table('tbl_agreement_agreement')
            ->whereIn('application_id', array_column($rows, 'id'))
            ->where('hide', 0)
            ->orderBy('id', 'ASC')
            ->get()->getResultArray();

        $byApp = [];
        foreach ($agreements as $agreement) {
            $byApp[(int) $agreement['application_id']] = $agreement; // ASC order: the latest wins
        }

        foreach ($rows as &$row) {
            $row['agreement'] = $byApp[(int) $row['id']] ?? null;
        }
        unset($row);

        return $rows;
    }

    // Archive/Hide: only applications that are currently Invitation Received can be archived.
    public function archiveMany(array $applicationIds, int $by): int
    {
        $applicationIds = array_values(array_unique(array_filter(array_map('intval', $applicationIds))));
        if (empty($applicationIds)) {
            return 0;
        }

        $eligible = $this->baseBuilder(false)
            ->select('a.id')
            ->whereIn('a.id', $applicationIds)
            ->get()->getResultArray();

        $now = date('Y-m-d H:i:s');
        $done = 0;
        foreach (array_column($eligible, 'id') as $appId) {
            $this->db->table('invitation_archive')->ignore(true)->insert([
                'application_id' => (int) $appId,
                'archived_by'    => $by,
                'archived_on'    => $now,
            ]);
            $done += $this->db->affectedRows() > 0 ? 1 : 0;
        }
        return $done;
    }

    public function restoreMany(array $applicationIds): int
    {
        $applicationIds = array_values(array_unique(array_filter(array_map('intval', $applicationIds))));
        if (empty($applicationIds)) {
            return 0;
        }

        $this->db->table('invitation_archive')->whereIn('application_id', $applicationIds)->delete();
        return (int) $this->db->affectedRows();
    }

    // Atomically reserves a scheduled email so it can only ever be sent once (the table's
    // unique key decides). Returns false if it was already sent/reserved.
    public function claimEmail(string $type, int $applicationId, string $targetDate, string $sentTo): bool
    {
        $this->db->table('invitation_email_log')->ignore(true)->insert([
            'email_type'     => $type,
            'application_id' => $applicationId,
            'target_date'    => $targetDate,
            'sent_to'        => mb_substr($sentTo, 0, 1000),
            'sent_on'        => date('Y-m-d H:i:s'),
        ]);
        return $this->db->affectedRows() > 0;
    }

    // Undoes claimEmail() when the actual send failed, so the next cron run can retry it.
    public function releaseEmail(string $type, int $applicationId, string $targetDate): void
    {
        $this->db->table('invitation_email_log')
            ->where('email_type', $type)
            ->where('application_id', $applicationId)
            ->where('target_date', $targetDate)
            ->delete();
    }
}
