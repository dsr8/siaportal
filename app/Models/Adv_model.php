<?php
namespace App\Models;
use CodeIgniter\Model;
class Adv_model extends Model {


	protected $table      = 'advertisement';
    protected $primaryKey = 'id';

    protected $returnType     = 'array';
   // protected $useSoftDeletes = true;

    protected $allowedFields = ['id','add_head','add_type','status','insert_on','update_on','added_by'];

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