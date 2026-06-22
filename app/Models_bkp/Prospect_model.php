<?php
namespace App\Models;
use CodeIgniter\Model;
class Prospect_model extends Model {


	protected $table      = 'client_prospect';
    protected $primaryKey = 'id';

    protected $returnType     = 'array';
   // protected $useSoftDeletes = true;

protected $allowedFields = ['id','heading','full_heading','image','insert_on','update_on','short_news','agent_name','team_member','number','agent_status','admin_status','news_image1','status','email','walk_status','team_member_name','typee','mail_send','mail_send_on','sms_send','sms_send_on','from_web','voice_added','entery_status','address','reff','client_status','user_dob','pass_pob','file_status','spouse_name','file_number','category','alt_mobile_no','city','source','family','master_sia_id','resume','tag_search','cc','num','having_canada_visa','pstatus','ppstatus'];

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

      
      return $this->where('id', $id)
      ->orderBy('id', 'desc')
                   ->findAll();
    }


 public function getentery(){

      return $this->where('appo_book', 'Appointment booked')

      ->orderBy('id', 'desc')
                   ->findAll();
                  // echo $this->db->last_query(); die;
    }


public function getentery_client(){

      return $this->where('entery_status', 'client')
      ->orderBy('id', 'desc')
                   ->findAll();
    }




    public function get_lmia($typee){

      return $this->where('typee', $typee)
      ->orderBy('id','desc')
                   ->findAll();
                    // echo $this->db->last_query(); die;
    }


    public function dob($aa){

      return $this->like('user_dob', $aa,'after')
      ->orderBy('id','desc')
                   ->findAll();
                    // echo $this->db->last_query(); die;
    }





}