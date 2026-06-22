<?php
namespace App\Models;
use CodeIgniter\Model;
class Refer_model extends Model {


	protected $table      = 'immigration_enquiry';
    protected $primaryKey = 'id';

    protected $returnType     = 'array';
   // protected $useSoftDeletes = true;

    protected $allowedFields = ['id','heading','full_heading','image','insert_on','update_on','short_news','agent_name','team_member','number','agent_status','admin_status','news_image1','status','email','walk_status','team_member_name','typee','mail_send','mail_send_on',' sms_send','sms_send_on','from_web','country_of_study','h_qulifaction','skilled','area_if_int','country_of_citizen','work','marital_status','ccr','fur_info','siblings','detail','siaprotal_id','refer_staus'];

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

    public function getpost_id($id){

      
      return $this->where('siaprotal_id', $id)
      ->orderBy('id', 'desc')
                   ->findAll();
    }


}