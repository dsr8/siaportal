<?php
namespace App\Models\Agreement;
use CodeIgniter\Model;

class Agreement_page_initial_model extends Model
{
    protected $table      = 'tbl_agreement_page_initial';
    protected $primaryKey = 'id';
    protected $returnType = 'array';

    protected $allowedFields = [
        'agreement_id', 'page_number', 'initial_type', 'initial_path', 'typed_initials',
        'initialed_at', 'initialed_ip', 'insert_on',
    ];

    public function getByAgreementId(int $agreementId): array
    {
        return $this->where('agreement_id', $agreementId)
                    ->orderBy('page_number', 'asc')
                    ->findAll();
    }

    // Upserts a single page's initial, keyed by (agreement_id, page_number).
    public function recordInitial(int $agreementId, int $pageNumber, array $data): void
    {
        $existing = $this->where('agreement_id', $agreementId)
                          ->where('page_number', $pageNumber)
                          ->first();

        if ($existing) {
            $this->update($existing['id'], $data);
            return;
        }

        $this->insert(array_merge($data, [
            'agreement_id' => $agreementId,
            'page_number'  => $pageNumber,
            'insert_on'    => date('Y-m-d H:i:s'),
        ]));
    }
}
