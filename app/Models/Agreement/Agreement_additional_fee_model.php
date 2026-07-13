<?php
namespace App\Models\Agreement;
use CodeIgniter\Model;

class Agreement_additional_fee_model extends Model
{
    protected $table      = 'tbl_agreement_additional_fee';
    protected $primaryKey = 'id';
    protected $returnType = 'array';

    protected $allowedFields = [
        'agreement_id', 'description', 'amount', 'sort_order', 'insert_on', 'update_on',
    ];

    public function getByAgreementId(int $agreementId): array
    {
        return $this->where('agreement_id', $agreementId)
                    ->orderBy('sort_order', 'asc')
                    ->orderBy('id', 'asc')
                    ->findAll();
    }

    // Replaces every additional-fee row for this agreement with the given set (delete-then-bulk-insert).
    public function replaceAll(int $agreementId, array $rows): void
    {
        $this->db->transStart();

        $this->where('agreement_id', $agreementId)->delete();

        $now = date('Y-m-d H:i:s');
        foreach ($rows as $i => $row) {
            $description = trim($row['description'] ?? '');
            if ($description === '') {
                continue;
            }
            $this->insert([
                'agreement_id' => $agreementId,
                'description'  => $description,
                'amount'       => (float) ($row['amount'] ?? 0),
                'sort_order'   => $i,
                'insert_on'    => $now,
            ]);
        }

        $this->db->transComplete();
    }
}
