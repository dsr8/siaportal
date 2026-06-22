<?php
namespace App\Models;
use CodeIgniter\Model;
class Immigration_enquiry_model extends Model {


	protected $table      = 'immigration_enquiry';
    protected $primaryKey = 'id';

    protected $returnType     = 'array';
   // protected $useSoftDeletes = true;

   // protected $allowedFields = ['id','heading','short_news','news_image1','number','email','agent_status','status','typee','insert_on','admin_status'];

protected $allowedFields = ['id','siaprotal_id','heading','full_heading','image','insert_on','update_on','short_news','agent_name','team_member','number'
,'agent_status','admin_status','news_image1','status','email','walk_status','team_member_name','typee','mail_send','mail_send_on','sms_send','sms_send_on'
,'from_web','country_of_study','h_qulifaction','skilled','area_if_int','country_of_citizen','work','marital_status','ccr','fur_info','siblings',
'detail','dob','taken_test','name_of_test','resume','resume_link','ccode','refer_staus','chaa','entery_type','sstatus'];

    public function getpost(){

    	return $this->findAll();
    }

}