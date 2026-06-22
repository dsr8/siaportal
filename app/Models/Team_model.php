<?php
namespace App\Models;
use CodeIgniter\Model;
class Team_model extends Model {


	protected $table      = 'reg';
    protected $primaryKey = 'id';

    protected $returnType     = 'array';
   // protected $useSoftDeletes = true;

protected $allowedFields = ['id', 'firstname','lastname','email','password','created_at','updated_at','type','status','mobile_no','pass','added_by','added_by_id','siaprotal_id','ref_hide'];

   // protected $useTimestamps = false;
    //protected $createdField  = 'created_at';
    //protected $updatedField  = 'updated_at';
    //protected $deletedField  = 'deleted_at';

   // protected $validationRules    = [];
    //protected $validationMessages = [];
    //protected $skipValidation     = false;
    protected $beforeInsert = ['beforeInsert'];
     protected $beforeUpdate = ['beforeUpdate'];


    protected function beforeInsert(array $data){
    $data = $this->passwordHash($data);
    $data['data']['created_at'] = date('Y-m-d H:i:s');

    return $data;
  }


 protected function beforeUpdate(array $data){
    $data = $this->passwordHash($data);
    $data['data']['updated_at'] = date('Y-m-d H:i:s');
    return $data;
  }
  protected function passwordHash(array $data){
    if(isset($data['data']['password']))
      $data['data']['password'] = password_hash($data['data']['password'], PASSWORD_DEFAULT);

    return $data;
  }


    public function getpost(){

    	return $this->where('type', 'Employee')

      ->findAll();



    

    }

}