<?php
namespace App\Models\Agreement;
use CodeIgniter\Model;

class Agreement_model extends Model
{
    protected $table      = 'tbl_agreement_agreement';
    protected $primaryKey = 'id';
    protected $returnType = 'array';

    protected $allowedFields = [
        'application_id', 'prospect_id', 'client_name', 'client_email', 'client_phone',
        'category_id', 'type_id', 'status', 'hide', 'created_by', 'insert_on', 'update_on',
        'reference_number', 'agreement_date', 'consultant_name', 'rcic_number', 'currency', 'template_name',
        'service_fee', 'gst_rate', 'gst_amount', 'government_fee', 'other_fee', 'total_amount',
        'require_client_signature', 'require_consultant_signature', 'email_verification',
        'send_reminder', 'reminder_days', 'max_reminders',
        'sign_token', 'viewed_at', 'viewed_ip', 'consultant_signature',
        'client_signature', 'client_signature_type', 'client_typed_name', 'consent_accepted',
        'client_signed_at', 'client_signed_ip', 'client_signed_device',
        'declined_at', 'decline_reason',
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

        $refNumber = 'SIA-' . date('Y') . '-' . str_pad((string) $agreement['id'], 6, '0', STR_PAD_LEFT);
        $this->update($agreement['id'], ['reference_number' => $refNumber]);
        $agreement['reference_number'] = $refNumber;

        return $agreement;
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
