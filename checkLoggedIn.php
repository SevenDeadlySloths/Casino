<?php
	session_start();
	$path = $_SERVER['DOCUMENT_ROOT'];
	include($path."/config.php");
	$check=false;

	$photo=null;
	$money=null;
	if(isset($_SESSION["ID"])){

		$id=$_SESSION["ID"];

		

		$getsql="select photo,money from user where userid=?";

		if($con=connect_db()){
			if($s = $con->prepare($getsql)){
				$s->bind_param("i",$id);
				$s->execute();
				$s->bind_result($photo,$money);
				$s->fetch();
						
							
			}
		}

		$check=true;

	}

	$data=[
			'loggedIn' => $check,
			'photo' => $photo,
			'money' => $money
		];	
		
		echo json_encode($data);	

	?>