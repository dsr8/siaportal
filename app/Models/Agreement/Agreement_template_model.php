<?php
namespace App\Models\Agreement;
use CodeIgniter\Model;

class Agreement_template_model extends Model
{
    protected $table      = 'tbl_agreement_template';
    protected $primaryKey = 'id';
    protected $returnType = 'array';

    protected $allowedFields = [
        'name', 'type_id', 'category_id', 'service_fee', 'government_fee',
        'govt_proc_main', 'govt_proc_spouse', 'govt_proc_dep_above22', 'govt_proc_dep_under22',
        'govt_pr_main', 'govt_pr_spouse', 'govt_pr_pnp',
        'other_fee', 'created_by', 'insert_on', 'update_on',
    ];

    public function getAll(): array
    {
        return $this->orderBy('name', 'asc')->findAll();
    }
}
