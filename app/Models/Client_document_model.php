<?php
namespace App\Models;
use CodeIgniter\Model;
class Client_document_model extends Model {


	protected $table      = 'client_document';
    protected $primaryKey = 'id';

    protected $returnType     = 'array';
   // protected $useSoftDeletes = true;

    protected $allowedFields = ['id','siaportal_id','client_document','upload_by','insert_on','category','type','status','application_id','client_document_link','doc_name'];

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

     public function document_upload($aa){

  //echo $aa;
 // exit();

      return $this->db->table('client_document')
      ->select('client_document.*,client_prospect.heading as  name')
      ->like('client_document.insert_on', $aa,'after')
      ->join('client_prospect ','client_prospect.id=client_document.siaportal_id','left')
      ->orderBy('client_document.id','desc')
    //  ->getCompiledSelect();
    ->get()->getResultArray();
                    
    }

   

}