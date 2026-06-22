<?php
namespace App\Models;
use CodeIgniter\Model;
class Invoice_model extends Model {


	protected $table      = 'siaportal_invoice';
    protected $primaryKey = 'id';

    protected $returnType     = 'array';
   // protected $useSoftDeletes = true;

 protected $allowedFields =['id','i_date','company_name','email','cont_person','cont_no','client_name','app_type','remark','sem','account_name','account_num','bank_name','bank_add','ifsc_code','type_of_account','insert_on','update_on','swift_code','status','agree','agent_status'];

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


    public function getclient($sid){

       return $this->db->table('client_application')
       ->select('client_application.*,category.category as  ct,type_client.type as ty,status.app_status as st')

      
      ->join('category ','category.id=client_application.category','left')
      ->join('type_client ','type_client.id=client_application.type','left')
      ->join('status ','status.id=client_application.application_status','left')
      ->where('client_application.siaportalid' ,$sid)
      ->orderBy('client_application.id','desc')
      ->get()->getResultArray();

      //return $this->findAll();
    }

      public function getclient11($id){

       return $this->db->table('client_application')
       ->select('client_application.*,category.category as  ct,type_client.type as ty,status.app_status as st')
      ->join('category ','category.id=client_application.category','left')
      ->join('type_client ','type_client.id=client_application.type','left')
      ->join('status ','status.id=client_application.application_status','left')
      ->where('client_application.id',$id)
      ->orderBy('client_application.id','desc')
      ->get()->getResultArray();

      //return $this->findAll();
    }

      public function get_detail($id){

       return $this->db->table('client_application')
       ->select('client_application.id,client_application.siaportalid,client_application.category, client_application.type,client_application.application_status')
     
      ->where('client_application.id',$id)
     
      ->get()->getResultArray();

      //return $this->findAll();
    }

    public function approve_count(){


  return $this->db->table('client_application')
     
      ->whereIn('application_status', [490,485,480,475,471,451,438,433,428,423,418,413,408,403,398,393,388,383,378,373,368,363,358,353,348,343,338,333,324,307,298,290,282,272,264,256,245,233,222,212,204,196,188,180,170,160,150,140,133,127,117,107,97,85,75,64,55,44,33,21,13,7])
      ->orderBy('client_application.id','desc')
      ->get()->getResultArray();

    }

      public function approve_join(){


  return $this->db->table('client_application')
  ->select('client_application.*,category.category as  ct,type_client.type as ty,status.app_status as st')
      ->join('category ','category.id=client_application.category','left')
      ->join('type_client ','type_client.id=client_application.type','left')
      ->join('status ','status.id=client_application.application_status','left')
     
      ->whereIn('application_status', [490,485,480,475,471,451,438,433,428,423,418,413,408,403,398,393,388,383,378,373,368,363,358,353,348,343,338,333,324,307,298,290,282,272,264,256,245,233,222,212,204,196,188,180,170,160,150,140,133,127,117,107,97,85,75,64,55,44,33,21,13,7])
      ->orderBy('client_application.id','desc')
      ->get()->getResultArray();

    }


     public function app_finder(){


  return $this->db->table('client_application')
  ->select('client_application.*,category.category as  ct,type_client.type as ty,status.app_status as st,client_prospect.heading as name')
    ->join('client_prospect ','client_prospect.id=client_application.siaportalid','left')
      ->join('category ','category.id=client_application.category','left')
      ->join('type_client ','type_client.id=client_application.type','left')
      ->join('status ','status.id=client_application.application_status','left')
     
      ->where('application_number !=', '')
       ->orWhere('gc_username !=', '')
        ->orWhere('gc_password !=', '')
      ->orderBy('client_application.id','desc')
      ->get()->getResultArray();

    }









     public function ready_to_apply(){


  return $this->db->table('client_application')
     
      ->whereIn('application_status', [302,294,286,276,268,259,248,237,227,216,208,200,192,184,174,164,154,144,137,121,111,101,90,89,79,68,35
])
      ->orderBy('client_application.id','desc')
      ->get()->getResultArray();

    }

       public function ready_to_apply_join(){


  return $this->db->table('client_application')
    ->select('client_application.*,category.category as  ct,type_client.type as ty,status.app_status as st')
      ->join('category ','category.id=client_application.category','left')
      ->join('type_client ','type_client.id=client_application.type','left')
      ->join('status ','status.id=client_application.application_status','left')
     
      ->whereIn('application_status', [302,294,286,276,268,259,248,237,227,216,208,200,192,184,174,164,154,144,137,121,111,101,90,89,79,68,35
])
      ->orderBy('client_application.id','desc')
      ->get()->getResultArray();

    }








     public function refused(){


  return $this->db->table('client_application')
     
      ->whereIn('application_status', [491,486,481,476,439,434,429,424,419,414,409,404,399,394,389,384,379,374,369,364,359,354,349,344,339,334,325,308,299,291,283,273,265,257,246,234,223,213,205,197,189,181,171,161,151,141,134,128,118,108,98,86,76,65,54,43,34,22,14])
      ->orderBy('client_application.id','desc')
      ->get()->getResultArray();

    }


        public function refused_join(){


  return $this->db->table('client_application')
   ->select('client_application.*,category.category as  ct,type_client.type as ty,status.app_status as st')
      ->join('category ','category.id=client_application.category','left')
      ->join('type_client ','type_client.id=client_application.type','left')
      ->join('status ','status.id=client_application.application_status','left')
     
      ->whereIn('application_status', [491,486,481,476,439,434,429,424,419,414,409,404,399,394,389,384,379,374,369,364,359,354,349,344,339,334,325,308,299,291,283,273,265,257,246,234,223,213,205,197,189,181,171,161,151,141,134,128,118,108,98,86,76,65,54,43,34,22,14])
      ->orderBy('client_application.id','desc')
      ->get()->getResultArray();

    }


}