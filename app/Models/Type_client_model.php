<?php
namespace App\Models;
use CodeIgniter\Model;
class Type_client_model extends Model {


	protected $table      = 'type_client';
    protected $primaryKey = 'id';

    protected $returnType     = 'array';
   // protected $useSoftDeletes = true;

    protected $allowedFields = ['id', 'category_id','type','status','insert_on','update_on'];

   // protected $useTimestamps = false;
    //protected $createdField  = 'created_at';
    //protected $updatedField  = 'updated_at';
    //protected $deletedField  = 'deleted_at';

   // protected $validationRules    = [];
    //protected $validationMessages = [];
    //protected $skipValidation     = false;


    public function getpost(){


    	//return $this->findAll();

      return $this->db->table('type_client')
       ->select('type_client.*,category.category as  ct,type_client.id as tyid')
      ->join('category ','type_client.category_id =category.id','left')
      ->get()->getResultArray();
    }

     public function getpost_id($id){


      //return $this->findAll();

      return $this->db->table('type_client')
       ->select('type_client.*,category.category as  ct,type_client.id as tyid')
      ->join('category ','type_client.category_id =category.id','left')
      ->where('type_client.id',$id)
      ->get()->getResultArray();
    }

}