<?php
namespace App\Models\Agreement;
use CodeIgniter\Model;

class Agreement_milestone_model extends Model
{
    protected $table      = 'tbl_agreement_milestone';
    protected $primaryKey = 'id';
    protected $returnType = 'array';

    protected $allowedFields = [
        'agreement_id', 'milestone', 'amount', 'due_date', 'included_services',
        'sort_order', 'insert_on', 'update_on',
    ];

    public function getByAgreementId(int $agreementId): array
    {
        return $this->where('agreement_id', $agreementId)
                    ->orderBy('sort_order', 'asc')
                    ->orderBy('id', 'asc')
                    ->findAll();
    }

    // Replaces every milestone row for this agreement with the given set (delete-then-bulk-insert).
    public function replaceAll(int $agreementId, array $rows): void
    {
        $this->db->transStart();

        $this->where('agreement_id', $agreementId)->delete();

        $now = date('Y-m-d H:i:s');
        foreach ($rows as $i => $row) {
            $milestone = trim($row['milestone'] ?? '');
            if ($milestone === '') {
                continue;
            }
            $this->insert([
                'agreement_id'      => $agreementId,
                'milestone'         => $milestone,
                'amount'            => ($row['amount'] ?? '') !== '' ? (float) $row['amount'] : null,
                'due_date'          => trim($row['due_date'] ?? '') ?: null,
                'included_services' => trim($row['included_services'] ?? '') ?: null,
                'sort_order'        => $i,
                'insert_on'         => $now,
            ]);
        }

        $this->db->transComplete();
    }
}
