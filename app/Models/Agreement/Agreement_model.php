<?php
namespace App\Models\Agreement;
use CodeIgniter\Model;

class Agreement_model extends Model
{
    protected $table      = 'tbl_agreement_agreement';
    protected $primaryKey = 'id';
    protected $returnType = 'array';

    protected $allowedFields = [
        'application_id', 'prospect_id', 'client_name', 'client_email', 'client_phone', 'client_address',
        'category_id', 'type_id', 'status', 'hide', 'created_by', 'insert_on', 'update_on',
        'reference_number', 'agreement_date', 'consultant_name', 'rcic_number', 'currency', 'template_name',
        'service_fee', 'gst_rate', 'gst_amount', 'government_fee',
        'govt_proc_main', 'govt_proc_spouse', 'govt_proc_dep_above22', 'govt_proc_dep_under22',
        'govt_pr_main', 'govt_pr_spouse', 'govt_pr_pnp',
        'other_fee', 'total_amount',
        'require_client_signature', 'require_consultant_signature', 'email_verification',
        'send_reminder', 'reminder_days', 'max_reminders', 'reminders_sent', 'last_reminder_at',
        'sign_token', 'last_sent_at', 'viewed_at', 'viewed_ip', 'viewed_notified_at', 'consultant_signature',
        'client_signature', 'client_signature_type', 'client_typed_name', 'consent_accepted',
        'client_signed_at', 'client_signed_ip', 'client_signed_device',
        'declined_at', 'decline_reason', 'custom_clauses', 'pdf_path',
    ];

    // Latest non-hidden agreement for a specific application, or null if none exists yet.
    public function getByApplicationId(int $applicationId): ?array
    {
        return $this->where('application_id', $applicationId)
                    ->where('hide', 0)
                    ->orderBy('id', 'desc')
                    ->first();
    }

    // Inserts a new draft, tolerating a concurrent insert for the same application_id: the
    // `uniq_active_application` DB constraint is the real guard, this just returns whichever
    // row won the race instead of surfacing a duplicate-key error to the caller.
    public function createDraft(array $data): array
    {
        $newId = false;
        try {
            $newId = $this->insert($data);
        } catch (\CodeIgniter\Database\Exceptions\DatabaseException $e) {
            log_message('error', 'Agreement_model::createDraft insert failed: ' . $e->getMessage());
        }

        if ($newId) {
            return array_merge($data, ['id' => $newId]);
        }

        $dbError = $this->db->error();
        if (!empty($dbError['message'])) {
            log_message('error', 'Agreement_model::createDraft insert failed: ' . $dbError['message']);
        }

        $existing = $this->getByApplicationId((int) $data['application_id']);
        if ($existing) {
            return $existing;
        }

        throw new \RuntimeException('Could not create agreement draft.');
    }

    // Generates and persists the reference number the first time it's needed (deterministic from id, no counter table).
    public function ensureReferenceNumber(array $agreement): array
    {
        if (!empty($agreement['reference_number'])) {
            return $agreement;
        }

        $refNumber = 'SIA-' . date('Y') . '-' . $agreement['id'];
        $this->update($agreement['id'], ['reference_number' => $refNumber]);
        $agreement['reference_number'] = $refNumber;

        return $agreement;
    }

    // Atomically transitions the agreement to 'signed' only if it's still actionable
    // (sent|viewed) — the guard against duplicate submissions (double-click, a retried
    // request) racing each other into two "signed" states and two client emails. Returns
    // false if another request already won the race, so the caller can skip re-sending
    // the confirmation email / regenerating the PDF.
    public function claimSigning(int $id, array $data): bool
    {
        $this->builder()
            ->where('id', $id)
            ->whereIn('status', ['sent', 'viewed'])
            ->update($data);

        return $this->db->affectedRows() > 0;
    }

    // Generates and persists the signing-link token the first time it's needed.
    public function ensureSignToken(array $agreement): array
    {
        if (!empty($agreement['sign_token'])) {
            return $agreement;
        }

        $token = bin2hex(random_bytes(24));
        $this->update($agreement['id'], ['sign_token' => $token]);
        $agreement['sign_token'] = $token;

        return $agreement;
    }

    // Agreements due for an automatic reminder email (see App\Commands\SendAgreementReminders):
    // still actionable (sent/viewed — never signed/declined/hidden, which is what "stop all
    // reminders immediately after Signed or Declined" comes down to, since those statuses
    // simply fall outside this WHERE), reminders opted in, and due for the next rung of the
    // fixed ladder — 1st at 24h, 2nd at 3 days, 3rd at 7 days after the original send —
    // measured from last_sent_at regardless of when the previous reminder actually went out.
    // reminder_days/max_reminders are retired in favour of this fixed schedule (see column
    // comments in tbl_agreement_agreement.sql) but left in place, unread, for old data.
    public function getDueForReminder(): array
    {
        $sql = "SELECT * FROM {$this->table}
                WHERE hide = 0
                  AND status IN ('sent', 'viewed')
                  AND send_reminder = 1
                  AND sign_token IS NOT NULL
                  AND (
                    (reminders_sent = 0 AND TIMESTAMPDIFF(HOUR, last_sent_at, NOW()) >= 24)
                    OR (reminders_sent = 1 AND TIMESTAMPDIFF(DAY, last_sent_at, NOW()) >= 3)
                    OR (reminders_sent = 2 AND TIMESTAMPDIFF(DAY, last_sent_at, NOW()) >= 7)
                  )";

        return $this->db->query($sql)->getResultArray();
    }

    // Agreements whose "viewed" state has sat long enough (debounce window, see
    // App\Commands\SendAgreementViewedNotifications) that the client evidently isn't about to
    // sign right away — status = 'viewed' already excludes anything since signed/declined.
    public function getDueForViewedNotification(int $debounceMinutes): array
    {
        return $this->where('hide', 0)
                    ->where('status', 'viewed')
                    ->where('viewed_notified_at', null)
                    ->where('viewed_at <=', date('Y-m-d H:i:s', time() - $debounceMinutes * 60))
                    ->findAll();
    }

    // Dashboard stat cards. "Pending Signature" means the client actually has something to
    // sign — sent/viewed only. A draft was never sent, so it doesn't belong in that count; it
    // only shows up in the running total until "Send for eSign" moves it into sent/viewed.
    public function getDashboardCounts(): array
    {
        $counts = ['pending' => 0, 'signed' => 0, 'declined' => 0, 'total' => 0];

        $rows = $this->db->table($this->table)
            ->select('status, COUNT(*) as c')
            ->where('hide', 0)
            ->groupBy('status')
            ->get()->getResultArray();

        foreach ($rows as $row) {
            $c = (int) $row['c'];
            $counts['total'] += $c;
            if (in_array($row['status'], ['sent', 'viewed'], true)) {
                $counts['pending'] += $c;
            } elseif ($row['status'] === 'signed') {
                $counts['signed'] += $c;
            } elseif ($row['status'] === 'declined') {
                $counts['declined'] += $c;
            }
        }

        return $counts;
    }

    // Count of archived (soft-hidden) agreements, for the "View Archived" toggle's badge.
    public function getArchivedCount(): int
    {
        return $this->where('hide', 1)->countAllResults();
    }

    // Shared WHERE/JOIN builder for the dashboard table — called fresh for both the count
    // and the paginated list so the two never share (and accidentally leak) builder state.
    // $filters: q (matches client name, phone, email, agreement id, or client SIA id — the
    // single Search box), date_from, date_to (against insert_on), type_id, status_bucket
    // (pending|sent|viewed|signed|declined), archived (show hidden/archived rows instead of active ones).
    private function dashboardQuery(array $filters)
    {
        $builder = $this->db->table($this->table . ' a')
            ->select('a.*, tc.type as type_name, cat.category as category_name')
            ->join('type_client tc', 'tc.id = a.type_id', 'left')
            ->join('category cat', 'cat.id = tc.category_id', 'left')
            ->where('a.hide', !empty($filters['archived']) ? 1 : 0);

        if (!empty($filters['q'])) {
            $q = trim((string) $filters['q']);
            $builder->groupStart()
                ->like('a.client_name', $q)
                ->orLike('a.client_phone', $q)
                ->orLike('a.client_email', $q)
                ->orLike('a.id', $q)
                ->orLike('a.prospect_id', $q)
            ->groupEnd();
        }
        if (!empty($filters['date_from'])) {
            $builder->where('a.insert_on >=', $filters['date_from'] . ' 00:00:00');
        }
        if (!empty($filters['date_to'])) {
            $builder->where('a.insert_on <=', $filters['date_to'] . ' 23:59:59');
        }
        if (!empty($filters['type_id'])) {
            $builder->where('a.type_id', (int) $filters['type_id']);
        }
        if (!empty($filters['status_bucket'])) {
            if ($filters['status_bucket'] === 'pending') {
                $builder->whereIn('a.status', ['sent', 'viewed']);
            } else {
                $builder->where('a.status', $filters['status_bucket']);
            }
        }

        return $builder;
    }

    public function getDashboardTotal(array $filters): int
    {
        return $this->dashboardQuery($filters)->countAllResults();
    }

    public function getDashboardList(array $filters, int $page, int $perPage): array
    {
        return $this->dashboardQuery($filters)
            ->orderBy('a.id', 'desc')
            ->limit($perPage, ($page - 1) * $perPage)
            ->get()->getResultArray();
    }

    public function findByToken(string $token): ?array
    {
        if ($token === '') {
            return null;
        }

        return $this->where('sign_token', $token)
                    ->where('hide', 0)
                    ->first();
    }

    // Lookup array keyed by application_id -> latest non-hidden agreement row, for status badges on the client list.
    public function getStatusByApplicationIds(array $applicationIds): array
    {
        if (empty($applicationIds)) {
            return [];
        }

        $rows = $this->whereIn('application_id', $applicationIds)
                     ->where('hide', 0)
                     ->orderBy('id', 'desc')
                     ->findAll();

        $byApplication = [];
        foreach ($rows as $row) {
            $appId = (int) $row['application_id'];
            if (!isset($byApplication[$appId])) {
                $byApplication[$appId] = $row;
            }
        }

        return $byApplication;
    }
}
