<?php
namespace App\Models;
use CodeIgniter\Model;

class Birthday_model extends Model {

    protected $table      = 'birthday';
    protected $primaryKey = 'id';

    protected $returnType = 'array';

    protected $allowedFields = ['reg_id', 'name', 'email', 'dob', 'status', 'created_at', 'updated_at'];

    public function getAll(){
        return $this->where('status', 1)->orderBy('name', 'asc')->findAll();
    }

    // Everyone whose dob matches today's month+day (year on dob is irrelevant / may be a
    // placeholder), for the header/sidebar birthday celebration.
    public function getToday(){
        return $this->where('status', 1)
                     ->where('dob IS NOT NULL', null, false)
                     ->where("DATE_FORMAT(dob, '%m-%d') = DATE_FORMAT(CURDATE(), '%m-%d')", null, false)
                     ->findAll();
    }

    public function addBirthday($data){
        return $this->insert($data);
    }

    public function updateBirthday($id, $data){
        return $this->update($id, $data);
    }

    public function deleteBirthday($id){
        return $this->update($id, ['status' => 0]);
    }
}
