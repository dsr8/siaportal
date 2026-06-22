<?php
namespace App\Models;
use CodeIgniter\Model;
class Service_model extends Model {


	protected $table      = 'service';
    protected $primaryKey = 'id';

    protected $returnType     = 'array';
   // protected $useSoftDeletes = true;

    protected $allowedFields = ['id','heading','dataa','insert_on','status','update_on'];




    public function getpost(){

    	return $this->findAll();
    }



    public function dob($aa){

       // echo "hohoho";
        //exit();

      return $this->like('adr_end_date', $aa,'befor')
      ->orderBy('id','desc')
                   ->findAll();
                    // echo $this->db->last_query(); die;
    }

}