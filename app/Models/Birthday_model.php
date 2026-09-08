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

    // Everyone whose birthday (month+day; year on dob is irrelevant / may be a placeholder)
    // started within the last 40 hours, for the header/sidebar birthday celebration — so it
    // keeps showing into the day after instead of cutting off at midnight. Checks both this
    // year's and last year's occurrence of the date so the window still works correctly for a
    // Dec 31 birthday viewed on Jan 1/2 (this year's Dec 31 hasn't happened yet at that point).
    public function getToday(){
        return $this->where('status', 1)
                     ->where('dob IS NOT NULL', null, false)
                     ->where(
                         "(NOW() >= STR_TO_DATE(CONCAT(YEAR(CURDATE()), '-', DATE_FORMAT(dob, '%m-%d')), '%Y-%m-%d')
                           AND NOW() < DATE_ADD(STR_TO_DATE(CONCAT(YEAR(CURDATE()), '-', DATE_FORMAT(dob, '%m-%d')), '%Y-%m-%d'), INTERVAL 40 HOUR))
                          OR
                          (NOW() >= STR_TO_DATE(CONCAT(YEAR(CURDATE()) - 1, '-', DATE_FORMAT(dob, '%m-%d')), '%Y-%m-%d')
                           AND NOW() < DATE_ADD(STR_TO_DATE(CONCAT(YEAR(CURDATE()) - 1, '-', DATE_FORMAT(dob, '%m-%d')), '%Y-%m-%d'), INTERVAL 40 HOUR))",
                         null, false
                     )
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
