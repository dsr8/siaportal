<?php
namespace App\Models;
use CodeIgniter\Model;
class New_recod_model extends Model {


	protected $table      = 'news_new';
    protected $primaryKey = 'id';

    protected $returnType     = 'array';
   // protected $useSoftDeletes = true;

    protected $allowedFields = ['id','heading','full_heading','image','insert_on','update_on','short_news','agent_name','team_member','number','agent_status','admin_status',
    'news_image1','status','email','walk_status','team_member_name','typee','mail_send','mail_send_on','sms_send','sms_send_on','dob','h_qulifaction',
    'h_qulifaction_py','h_qulifaction_op','h_qulifaction_b','12_grade_pass','12_grade_math','12_grade_eng','12_grade_op','country_of_study','country_of_citizen',
    'ccr','skilled','fur_info','taken_test','name_of_test','resume_link','resume','req_pending','move_from','siaprotal_id','siblings','agent_mail','email_data',
    'option_status','show_hide','mark_dropped'];




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