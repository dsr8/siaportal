<?php
namespace App\Models;
use CodeIgniter\Model;
class Lmia_job_model extends Model {


	protected $table      = 'lmia_job';
    protected $primaryKey = 'id';

    protected $returnType     = 'array';
   // protected $useSoftDeletes = true;

    protected $allowedFields = ['id', 'emp_name','req','job_dec','type','status','insert_on','update_on'];

   // protected $useTimestamps = false;
    //protected $createdField  = 'created_at';
    //protected $updatedField  = 'updated_at';
    //protected $deletedField  = 'deleted_at';

   // protected $validationRules    = [];
    //protected $validationMessages = [];
    //protected $skipValidation     = false;


    public function getpost(){

    	return $this->findAll();
    }

}