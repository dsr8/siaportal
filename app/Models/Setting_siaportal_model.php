<?php
namespace App\Models;
use CodeIgniter\Model;
class Setting_siaportal_model extends Model {


	protected $table      = 'settings_siaportal';
    protected $primaryKey = 'id';

    protected $returnType     = 'array';
   // protected $useSoftDeletes = true;

    protected $allowedFields = ['id','option_name','option_value','added_by','date_created','date_updated'];




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