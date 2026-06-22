<?php
namespace App\Models;
use CodeIgniter\Model;
class Status_model extends Model {


	protected $table      = 'status';
    protected $primaryKey = 'id';

    protected $returnType     = 'array';
   // protected $useSoftDeletes = true;

    protected $allowedFields = ['id', 'category_id','type_id','app_status','status','insert_on','update_on'];

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

        public function getpost1($id){

       return $this->db->table('status')
       ->select('status.*,category.category as  ct,type_client.type as ty')
      ->join('category ','category.id=status.category_id','left')
      ->join('type_client ','type_client.id=status.type_id','left')
       ->where('status.id ',$id)
      ->orderBy('status.id','desc')
      ->get()->getResultArray();

      //return $this->findAll();
    }

public function getpost_status($tp){

       return $this->db->table('status')
       ->select('status.*')
      ->where('type_id ',$tp)
     
      ->orderBy('status.id','asc')
      ->limit('1')
      ->get()->getResultArray();

      //return $this->findAll();
    }

    public function getpost_status35($tp,$ap){

       return $this->db->table('status')
       ->select('status.*')
      ->where('type_id ',$tp)
      ->where('id >=',$ap)
     
      ->orderBy('status.id','asc')
     // ->limit('2')
      //->limit('2')
      ->get()->getResultArray();

      //return $this->findAll();
    }


}