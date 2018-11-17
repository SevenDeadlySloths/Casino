<?php
session_start();
$path = $_SERVER['DOCUMENT_ROOT'];
include($path."/config.php");

if(isset($_SESSION["ID"])){
	$money=null;
	$id=$_SESSION['ID'];
	$con=connect_db();
	$con->multi_query('CALL select_user('.$id.')');

	if ($result = mysqli_store_result($con)) {
        if($row = mysqli_fetch_row($result)) {
            $money=$row[0];
        }
            mysqli_free_result($result);
   }	

   
   $data=[
   		'money' => $money
   ];

   echo json_encode($data);
}



?>