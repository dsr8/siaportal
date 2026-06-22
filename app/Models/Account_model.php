<?php
namespace App\Models;
use CodeIgniter\Model;
class Account_model extends Model {


	protected $table      = 'sia_account';
    protected $primaryKey = 'id';

    protected $returnType     = 'array';
   // protected $useSoftDeletes = true;

 protected $allowedFields =['id','siaportal_id','category','type','application_status','retainer_app','govt_fee','pay_plan','est_app','est_num','tolat_pay_plan','pay_one','pay_one_note','pay_two','pay_two_note','pay_three','pay_three_note','pay_four','pay_four_note','pay_five','pay_five_note','pay_sex','pay_sex_note','insert_on','update_on','app_id','tolat_pay_amount','pay_one_amount','pay_two_amount','pay_three_amount','pay_four_amount','pay_five_amount','pay_six_amount','account_status','payment_status'];

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

public function getaccount_id($sid){

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


    public function getaccount(){

       return $this->db->table('sia_account')
       ->select('sia_account.*,category.category as  ct,type_client.type as ty,status.app_status as st,client_prospect.heading as cname')

      
      ->join('category ','category.id=sia_account.category','left')
      ->join('type_client ','type_client.id=sia_account.type','left')
      ->join('status ','status.id=sia_account.application_status','left')
      ->join('client_prospect ','client_prospect.id=sia_account.siaportal_id','left')

     // ->where('client_application.siaportalid' ,$sid)
     // ->orderBy('sia_account.id','desc')
      ->get()->getResultArray();

      //return $this->findAll();
    }



     public function get_account($app_sid,$app_ct,$app_ty){

       return $this->db->table('sia_account')
       ->select('sia_account.*')

      
     
      ->where('sia_account.siaportal_id' ,$app_sid)
       ->where('sia_account.category' ,$app_ct)
        ->where('sia_account.type' ,$app_ty)
     // ->orderBy('sia_account.siaportal_id','desc')
      ->get()->getResultArray();

      //return $this->findAll();
    }



}