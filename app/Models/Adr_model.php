<?php
namespace App\Models;
use CodeIgniter\Model;
class Adr_model extends Model {


	protected $table      = 'adr';
    protected $primaryKey = 'id';

    protected $returnType     = 'array';
   // protected $useSoftDeletes = true;

    protected $allowedFields = ['id','sia_id','client_name','notes','adr_start_date','adr_end_date','app_number','link','name','status','insert_on','update_on'];




    public function getpost(){

    	return $this->findAll();
    }

    public function getAllWithTeamMember(): array
    {
        return $this->db->table('adr a')
            ->select('a.*, cp.team_member AS team_member_name', false)
            ->join('client_prospect cp', 'cp.id = a.sia_id', 'left')
            ->orderBy('a.id', 'DESC')
            ->get()
            ->getResultArray();
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