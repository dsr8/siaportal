<?php
namespace App\Models\Agreement;
use CodeIgniter\Model;

class Agreement_template_milestone_model extends Model
{
    protected $table      = 'tbl_agreement_template_milestone';
    protected $primaryKey = 'id';
    protected $returnType = 'array';

    protected $allowedFields = [
        'template_id', 'milestone', 'amount', 'due_date', 'included_services',
        'sort_order', 'insert_on', 'update_on',
    ];

    public function getByTemplateId(int $templateId): array
    {
        return $this->where('template_id', $templateId)
                    ->orderBy('sort_order', 'asc')
                    ->orderBy('id', 'asc')
                    ->findAll();
    }

    // Bulk-inserts milestone rows for a freshly-created template (no delete phase — templates aren't edited in place).
    public function insertAll(int $templateId, array $rows): void
    {
        $this->db->transStart();

        $now = date('Y-m-d H:i:s');
        foreach ($rows as $i => $row) {
            $milestone = trim($row['milestone'] ?? '');
            if ($milestone === '') {
                continue;
            }
            $this->insert([
                'template_id'       => $templateId,
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
