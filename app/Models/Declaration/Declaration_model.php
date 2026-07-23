<?php
namespace App\Models\Declaration;
use CodeIgniter\Model;

class Declaration_model extends Model
{
    protected $table      = 'tbl_declaration_consent';
    protected $primaryKey = 'id';
    protected $returnType = 'array';

    protected $allowedFields = [
        'application_id', 'prospect_id', 'client_name', 'client_email', 'client_phone',
        'category_id', 'type_id', 'consent_type', 'title', 'content', 'consultant_name',
        'consent_date', 'status', 'hide', 'created_by', 'insert_on', 'update_on',
        'require_client_signature', 'require_initials', 'show_consent_checkbox',
        'sign_token', 'last_sent_at', 'viewed_at', 'viewed_ip',
        'client_signature', 'client_signature_type', 'client_typed_name',
        'client_initials', 'client_initials_type', 'client_typed_initials',
        'consent_accepted', 'client_signed_at', 'client_signed_ip',
        'client_signed_device', 'client_signed_browser',
        'declined_at', 'decline_reason', 'pdf_path',
    ];

    // Atomically transitions the declaration to 'signed' only if it's still actionable
    // (sent|viewed) — guards against duplicate submissions (double-click, a retried request)
    // racing each other into two "signed" states and two client emails. Returns false if
    // another request already won the race, so the caller can skip re-sending the
    // confirmation email / regenerating the PDF.
    public function claimSigning(int $id, array $data): bool
    {
        $this->builder()
            ->where('id', $id)
            ->whereIn('status', ['sent', 'viewed'])
            ->update($data);

        return $this->db->affectedRows() > 0;
    }

    // Generates and persists the signing-link token the first time it's needed.
    public function ensureSignToken(array $declaration): array
    {
        if (!empty($declaration['sign_token'])) {
            return $declaration;
        }

        $token = bin2hex(random_bytes(24));
        $this->update($declaration['id'], ['sign_token' => $token]);
        $declaration['sign_token'] = $token;

        return $declaration;
    }

    // Dashboard stat cards.
    public function getDashboardCounts(): array
    {
        $counts = ['draft' => 0, 'pending' => 0, 'signed' => 0, 'declined' => 0, 'total' => 0];

        $rows = $this->db->table($this->table)
            ->select('status, COUNT(*) as c')
            ->where('hide', 0)
            ->groupBy('status')
            ->get()->getResultArray();

        foreach ($rows as $row) {
            $c = (int) $row['c'];
            $counts['total'] += $c;
            if ($row['status'] === 'draft') {
                $counts['draft'] += $c;
            } elseif (in_array($row['status'], ['sent', 'viewed'], true)) {
                $counts['pending'] += $c;
            } elseif ($row['status'] === 'signed') {
                $counts['signed'] += $c;
            } elseif ($row['status'] === 'declined') {
                $counts['declined'] += $c;
            }
        }

        return $counts;
    }

    // Count of archived (soft-hidden) declarations, for the "View Archived" toggle's badge.
    public function getArchivedCount(): int
    {
        return $this->where('hide', 1)->countAllResults();
    }

    // Shared WHERE/JOIN builder for the dashboard table — called fresh for both the count
    // and the paginated list so the two never share (and accidentally leak) builder state.
    // $filters: q (matches client name, phone, email, id, or SiaID — the single Search box),
    // date_from, date_to (against insert_on), type_id, status_bucket (draft|pending|sent|
    // viewed|signed|declined), archived (show hidden/archived rows instead of active ones).
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
                ->orLike('a.title', $q)
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

    // Latest non-hidden declaration per application_id, for status badges on the client list.
    // Unlike Agreement (one per application), an application can have several Declaration/Consent
    // documents over time — this surfaces only the most recent one for the at-a-glance badge.
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
