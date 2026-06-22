<?php 


 function approve_count(){

 	$host="localhost";
  $db="sia_database";
  $user="sia_user";
  $password="Sia@8080";

$con = mysqli_connect($host,$user,$password,'sia_database')or die(mysqli_error());
 //$CI =& get_instance();
   // $CI->load->model('Backoffice_model');

$list="'333','338'";

	echo  $sql = "SELECT * FROM `tbl_client_application` WHERE `application_status` IN ($list)"; 
	
	$resultt = $con->query($sql);
//exit();

	$property = mysqli_fetch_array($resultt);
	 //print_r($property);
	//exit();
	
	 return $property;	
}
?>