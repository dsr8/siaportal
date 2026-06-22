<?php
namespace App\Models;
use CodeIgniter\Model;
class Client_application_model extends Model {


	protected $table      = 'tbl_client_application';
    protected $primaryKey = 'id';

    protected $returnType     = 'array';
   // protected $useSoftDeletes = true;

 protected $allowedFields =['id','siaportalid','category','type','application_status','insert_on','update_on','assign_to','application_status_update','exp_date_to_apply','voice_msg','date_of_creation','log_in_info_pnp','application_number','job_noc','reg_score','upload_doc','application_mail_send','invitation_date_tantative','invitation_date_fina','invit_withdrawn_reason','app_sub_date','fee','mode_client_payment','confirm_with','date_of_payment_recive','client_card_note','adr_deadline','adr_note','approval_doc','approval_doc_link','nomination_refused_reason','app_sent_date','courier_receipt_slip','courier_receipt_slip_link','aor_app_number','aor_app_date','link','aor_online_detail','aor_linkreason','adr_submission_date','date_for_medical','date_for_medical_ten','medical_note','medical_submit','medical_sub_note','pp_deadline','pp_tentative','approve_note','refused_note','invitation_date_final','amount','c_transfer','app_recv','study_permit_exp','feerp','doc_await_note','add_imm_doc_rec','fee_receipt','sub_confim','date_bio_reciv','date_bio_sent','date_bio_comp','bio_com_note','date_int_req_rec','date_int_sent_client','int_req_upload','date_int_req_com','int_sub_to_ircc','refusal_date','refusal_letter','date_work_permit','approval_letter','doc_req_date','team_college_transfer','date_doc_to_team','doc_rec','fee_amount','fee_inv_no','info_doc_req_date','ad_job_start_date','ad_job_end_date','ad_il_start_date','ad_il_end_date','ad_ki_start_date','ad_ki_end_date','ad_ca_start_date','ad_ca_end_date','ad_oa_start_date','ad_oa_end_date','doc_req_on_date','st_job_start_date','st_job_end_date','st_il_start_date','st_il_end_date','st_ki_start_date','st_ki_end_date','st_ca_start_date','st_ca_end_date','st_oa_start_date','st_oa_end_date','stt_job_start_date','stt_job_end_date','stt_il_start_date','stt_il_end_date','stt_ki_start_date','stt_ki_end_date','stt_ca_start_date','stt_ca_end_date','stt_oa_start_date','stt_oa_end_date','lmia_rec_date','lmia_number','date_to_apply_exp','assign_to_exp','date_of_creation_exp','job_noc_exp','app_number_exp','upload_doc_exp','reg_score_exp','log_in_info_exp','app_recv_exp','exp_date_to_apply_expp','app_sub_date_exp','fee_exp','mode_client_payment_exp','confirm_with_exp','date_of_payment_recive_exp','amount_exp','client_card_note_exp','adr_deadline_exp','adr_note_exp','exp_date_to_apply_exp','gc_password','gc_username','if_any_note','free_text','CRS_score'];

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



      public function getTotalAppFinder()
      {
          return $this->db->table('client_application')
              ->where('application_number !=', '')
              ->orWhere('gc_username !=', '')
              ->orWhere('gc_password !=', '')
              ->countAllResults();
      }

      public function getFilteredAppFinder($searchValue)
      {
          $builder = $this->db->table('client_application')
              ->groupStart()
                  ->where('application_number !=', '')
                  ->orWhere('gc_username !=', '')
                  ->orWhere('gc_password !=', '')
              ->groupEnd();

          if ($searchValue) {
              $builder->groupStart()
                  ->like('client_application.id', $searchValue)
                  ->orLike('client_application.siaportalid', $searchValue)
                  ->orLike('client_application.application_number', $searchValue)
                  ->orLike('client_application.gc_username', $searchValue)
                  ->orLike('client_application.gc_password', $searchValue)
                  //->orLike('category', $searchValue)
                  //->orLike('type', $searchValue)
                  //->orLike('application_status', $searchValue)
              ->groupEnd();
          }

          return $builder->countAllResults();
      }

     public function getPaginatedAppFinder($start, $length, $searchValue)
  {
      $builder = $this->db->table('client_application')
          ->select("client_application.*, category.category as ct, type_client.type as ty, status.app_status as st, client_prospect.heading as name, CONCAT(tm.firstname, ' ', tm.lastname) as team_member_name, client_application.assign_to as team_member_col", false)
          ->join('client_prospect', 'client_prospect.id = client_application.siaportalid', 'left')
          ->join('reg as tm', 'tm.id = client_application.assign_to', 'left')
          ->join('category', 'category.id = client_application.category', 'left')
          ->join('type_client', 'type_client.id = client_application.type', 'left')
          ->join('status', 'status.id = client_application.application_status', 'left')
          ->groupStart()
              ->where('application_number !=', '')
              ->orWhere('gc_username !=', '')
              ->orWhere('gc_password !=', '')
          ->groupEnd();

      if ($searchValue) {
          $builder->groupStart()
              ->like('client_application.id', $searchValue)
              ->orLike('client_application.siaportalid', $searchValue)
              ->orLike('client_application.application_number', $searchValue)
              ->orLike('client_application.gc_username', $searchValue)
              ->orLike('client_application.gc_password', $searchValue)
          ->groupEnd();
      }

      $builder->orderBy('client_application.id', 'desc')
          ->limit($length, $start);

      return $builder->get()->getResultArray();
  }

}