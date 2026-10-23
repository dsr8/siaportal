<?php
namespace App\Models;
use CodeIgniter\Model;
class Status_model extends Model {


	protected $table      = 'status';
    protected $primaryKey = 'id';

    protected $returnType     = 'array';
   // protected $useSoftDeletes = true;

    protected $allowedFields = ['id', 'category_id','type_id','app_status','status','sort_order','insert_on','update_on'];

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
      ->orderBy('IF(sort_order > 0, sort_order, id * 10)', 'asc', false)
      ->orderBy('status.id','asc')
      ->limit('1')
      ->get()->getResultArray();

      //return $this->findAll();
    }

    public function getpost_status35($tp,$ap){

       // Dropdown order: sort_order if set, else id * 10 (see Database/invitation/invitation_received_status.sql)
       $key = 'IF(sort_order > 0, sort_order, id * 10)';
       $cur = $this->db->table('status')->select("$key AS k", false)->where('id', $ap)->get()->getRowArray();
       $curKey = $cur ? (int) $cur['k'] : 0;

       return $this->db->table('status')
       ->select('status.*')
      ->where('type_id ',$tp)
      ->where("$key >= $curKey", null, false)

      ->orderBy($key, 'asc', false)
      ->orderBy('status.id','asc')
     // ->limit('2')
      //->limit('2')
      ->get()->getResultArray();

      //return $this->findAll();
    }


}