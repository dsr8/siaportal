<?php
namespace App\Models;
use CodeIgniter\Model;
class Category_model extends Model {


	protected $table      = 'category';
    protected $primaryKey = 'id';

    protected $returnType     = 'array';
   // protected $useSoftDeletes = true;

    protected $allowedFields = ['id', 'category','status','insert_on','update_on'];

   // protected $useTimestamps = false;
    //protected $createdField  = 'created_at';
    //protected $updatedField  = 'updated_at';
    //protected $deletedField  = 'deleted_at';

   // protected $validationRules    = [];
    //protected $validationMessages = [];
    //protected $skipValidation     = false;


    public function getpost(){
      
    	return  $this
      ->orderBy('category', 'asc')
                   ->findAll();
    }

}