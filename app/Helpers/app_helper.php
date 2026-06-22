<?php 




 function get_type($id){

 	$host="localhost";
  $db="sia_database";
  $user="sia_user";
  $password="Sia@8080";

$con = mysqli_connect($host,$user,$password,'sia_database')or die(mysqli_error());
 //$CI =& get_instance();
   // $CI->load->model('Backoffice_model');

	 $sql = "SELECT * FROM tbl_client_application where 	siaportalid=$id "; 
	//exit();
	
	// $query = $CI->db->query($sql);
	//echo $this->db->last_query($query);
//	exit();
	$resultt = $con->query($sql);

	$property = mysqli_fetch_row($resultt);
	// print_r($property);
	//exit();
	return $property;	
}
    







?>