<?php
namespace App\Models\Agreement;
use CodeIgniter\Model;

class Agreement_template_fee_model extends Model
{
    protected $table      = 'tbl_agreement_template_fee';
    protected $primaryKey = 'id';
    protected $returnType = 'array';

    protected $allowedFields = [
        'template_id', 'description', 'amount', 'sort_order', 'insert_on', 'update_on',
    ];

    public function getByTemplateId(int $templateId): array
    {
        return $this->where('template_id', $templateId)
                    ->orderBy('sort_order', 'asc')
                    ->orderBy('id', 'asc')
                    ->findAll();
    }

    // Bulk-inserts fee rows for a freshly-created template (no delete phase — templates aren't edited in place).
    public function insertAll(int $templateId, array $rows): void
    {
        $this->db->transStart();

        $now = date('Y-m-d H:i:s');
        foreach ($rows as $i => $row) {
            $description = trim($row['description'] ?? '');
            if ($description === '') {
                continue;
            }
            $this->insert([
                'template_id' => $templateId,
                'description' => $description,
                'amount'      => (float) ($row['amount'] ?? 0),
                'sort_order'  => $i,
                'insert_on'   => $now,
            ]);
        }

        $this->db->transComplete();
    }
}
