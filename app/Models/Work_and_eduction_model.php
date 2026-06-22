<?php
namespace App\Models;
use CodeIgniter\Model;
class Work_and_eduction_model extends Model {


	protected $table      = 'work_and_education';
    protected $primaryKey = 'id';

    protected $returnType     = 'array';
   // protected $useSoftDeletes = true;

protected $allowedFields = ['id','fname','lname','dob','phone_number','email','height_in_cms','  eyes_color','marriage_date','spouse_name','current_address','past_ten','uci','citizenship','have_a_relative','language_test','date_of_test_taken','date_of_sign','speaking','reading','listening','writing','TRF_no','CELPIP','test_PIN','l_certificate_no','employer_details','name_of_camp','job_title','hours_worked','employer_detail','e_from','e_to','e_institution','e_city','e_diploma','e_study','e_year_of_study','t_destination','t_travel_from','t_travel_to','reason_for_travel','t_city_of_travel','w_from','w_to','w_job_title','w_time','w_employer_name','w_omplete_ddress','w_country','h_from','h_to','w_occupation','name_of_employer','h_city','h_country','relationship','family_name','f_dob','f_date_of_death','f_place_of_birth','f_present_address','f_marital_status','applied_before','provide_details','applied_visa','visa_kind','insert_on','update_on'];

   // protected $useTimestamps = false;
    //protected $createdField  = 'created_at';
    //protected $updatedField  = 'updated_at';
    //protected $deletedField  = 'deleted_at';

   // protected $validationRules    = [];
    //protected $validationMessages = [];
    //protected $skipValidation     = false;
   // protected $beforeInsert = ['beforeInsert'];
     //protected $beforeUpdate = ['beforeUpdate'];



    public function getwork(){

    	return $this->findAll();


    }

     public function getwork_id($id){

      return $this->where('id',$id)->findAll();


    }

}