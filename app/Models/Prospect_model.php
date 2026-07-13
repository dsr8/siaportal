<?php
namespace App\Models;
use CodeIgniter\Model;
class Prospect_model extends Model {


	protected $table      = 'client_prospect';
    protected $primaryKey = 'id';

    protected $returnType     = 'array';
   // protected $useSoftDeletes = true;

protected $allowedFields = ['id','heading','full_heading','image','insert_on','update_on','short_news','agent_name','team_member','number','agent_status','admin_status','news_image1','status','email','walk_status','team_member_name','typee','mail_send','mail_send_on','sms_send','sms_send_on','from_web','voice_added','entery_status','address','reff','client_status','user_dob','pass_pob','file_status','spouse_name','file_number','category','alt_mobile_no','city','source','family','master_sia_id','resume','tag_search','cc','num','having_canada_visa','pstatus','ppstatus','s_com','st','ot','currently','hide_prospect','hide_prospect_on'];

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

      return $this->select('id,news_image1,voice_added,from_web,heading,mail_send,mail_send_on,sms_send,sms_send_on,number,insert_on,pstatus,ppstatus,agent_name,team_member,number,admin_status')->where('appo_book', 'Appointment booked')->where('entery_status', 'prospect')

      ->orderBy('id', 'desc')
                   ->findAll();
                  // echo $this->db->last_query(); die;
    }


public function getentery_client(){

      return $this->where('entery_status', 'client')
      ->orderBy('id', 'desc')
                   ->findAll();
    }

    // Client-only search (entery_status='client') for the "Create New Agreement" client picker,
    // since only clients have applications to attach an agreement to.
    public function searchActiveClients(string $q = '', int $limit = 50): array
    {
        $builder = $this->select('id, heading, email, number, cc')
            ->where('entery_status', 'client')
            ->groupStart()->where('hide_prospect', null)->orWhere('hide_prospect !=', 1)->groupEnd()
            ->orderBy('id', 'desc');

        if ($q !== '') {
            $builder->groupStart()
                ->like('heading', $q)->orLike('id', $q)->orLike('number', $q)->orLike('email', $q)
                ->groupEnd();
        }

        // findAll()'s own $limit param always wins over an earlier ->limit() call
        // (it unconditionally re-applies limit(0) internally when called bare), so pass it here.
        return $builder->findAll($limit);
    }




    public function get_lmia($typee){

      return $this->where('typee', $typee)
      ->orderBy('id','desc')
                   ->findAll();
                    // echo $this->db->last_query(); die;
    }


    public function dob($aa){

      return $this->like('user_dob', $aa,'after')
      ->where('id >', 8044)
      ->orderBy('id','desc')
      ->findAll();
      // echo $this->db->last_query(); die;
      //8044 this ID are entries which were made after 15 Oct 2024 said finalised while discussion.
    }





}