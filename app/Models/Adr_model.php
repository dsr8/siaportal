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

    public function getAllWithTeamMember(array $filters = []): array
    {
        $builder = $this->db->table('adr a')
            ->select('a.*, cp.team_member AS team_member_name', false)
            ->join('client_prospect cp', 'cp.id = a.sia_id', 'left');

        if (!empty($filters['q'])) {
            $q = $filters['q'];
            $builder->groupStart()
                ->like('a.client_name', $q)
                ->orLike('a.sia_id', $q)
                ->orLike('a.app_number', $q)
                ->groupEnd();
        }

        if (isset($filters['status']) && $filters['status'] !== '') {
            $builder->where('a.status', $filters['status']);
        }

        return $builder->orderBy('a.id', 'DESC')
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