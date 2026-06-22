<?php
namespace App\Models;
use CodeIgniter\Model;
class Voice_msg_model extends Model {


	protected $table      = 'voice_msg';
    protected $primaryKey = 'id';

    protected $returnType     = 'array';
   // protected $useSoftDeletes = true;

    protected $allowedFields = ['id','client_application_id','sia_id','voice_msg','insert_on','update_on'];

   // protected $useTimestamps = false;
    //protected $createdField  = 'created_at';
    //protected $updatedField  = 'updated_at';
    //protected $deletedField  = 'deleted_at';

   // protected $validationRules    = [];
    //protected $validationMessages = [];
    //protected $skipValidation     = false;


    public function getpost(){

       return $this->db->table('status')
       ->select('status.*,category.category as  ct,type_client.type as ty')
      ->join('category ','category.id=status.category_id','left')
      ->join('type_client ','type_client.id=status.type_id','left')
      ->orderBy('status.id','desc')
      ->get()->getResultArray();

    	//return $this->findAll();
    }




}