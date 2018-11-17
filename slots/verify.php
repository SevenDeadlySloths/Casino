<?php
session_start();

$path=$_SERVER['DOCUMENT_ROOT'];
include($path."/config.php");

	if(isset($_SESSION["ID"])&&isset($_GET["s"])){
		$id=$_SESSION["ID"];
		$spent1=$_GET["s"];
		$spent=(int)$spent1;

		
		$result=1;

		$getsql = "select money from user where userid=?";

		if($con=connect_db()){
			if($s = $con->prepare($getsql)){
				$s->bind_param("i",$id);
				$s->execute();
				$s->bind_result($money);
					if($s->fetch()){
						if($spent>$money){
							$result=0;
						}
					}			
			}
		}



		$data = ['check' => $result];
		echo json_encode( $data );
}

?>