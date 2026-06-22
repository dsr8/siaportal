<?php
namespace App\Validation;
use App\Models\User_model;

class UserRules
{

  public function validateUser(string $str, string $fields, array $data){
    $model = new User_model();
     $user = $model->where('email', $data['email'])
                  ->first();
                 // print_r($user);
                  //exit();

    if(!$user){
    	//echo"hi";
    	//exit();
      return false;
    }
else{
	//echo "hello";
	//exit();
    return password_verify($data['password'], $user['password']);
  }
}
}