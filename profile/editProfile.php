<?php
session_start();
if(isset($_GET["e1"])&& isset($_SESSION["ID"]) &&isset($_GET["e2"]) &&isset($_GET["e3"])&&isset($_GET["e4"])&&isset($_GET["e5"])&&isset($_GET["e6"])&&isset($_GET["e7"])){

	if($_GET["e1"]!=="<br>"&& $_GET["e2"]!="<br>" && $_GET["e3"]!="<br>" && $_GET["e4"]!="<br>" && $_GET["e5"]!="<br>" && $_GET["e6"]!="<br>" && $_GET["e7"]!="<br>"){

	$ID=$_SESSION["ID"];
	//$string = str_replace(' ', '', $string);
	$p1 = str_replace(' ', '', $_GET["e1"]);
	$p2 = str_replace(' ', '', $_GET["e2"]);
	$p3 = str_replace(' ', '', $_GET["e3"]);
	$p4 = str_replace(' ', '', $_GET["e4"]);
	$p5 = str_replace(' ', '', $_GET["e5"]);
	$p6 = str_replace(' ', '', $_GET["e6"]);
	$p7 = str_replace(' ', '', $_GET["e7"]);

	$p11 = str_replace('<br>', '', $p1);
	$p22 = str_replace('<br>', '', $p2);
	$p33 = str_replace('<br>', '', $p3);
	$p44 = str_replace('<br>', '', $p4);
	$p55 = str_replace('<br>', '', $p5);
	$p66 = str_replace('<br>', '', $p6);
	$p77 = str_replace('<br>', '', $p7);
	
	$e1=htmlentities($p11);
	$e2=htmlentities($p22);
	$e3=htmlentities($p33);
	$e4=htmlentities($p44);
	$e5=htmlentities($p55);
	$e6=htmlentities($p66);
	$e7=htmlentities($p77);
	$path = $_SERVER['DOCUMENT_ROOT'];
	include($path."/config.php");

	if($con=connect_db()){
		$sql="update user set firstName=?,lastname=?,DOB=?,phone=?,city=?,country=?,email=? where userid=?";
		if($s=$con->prepare($sql)){
			$s->bind_param("sssssssi",$e1,$e2,$e3,$e4,$e5,$e6,$e7,$ID);
			$s->execute();
			$s->close();
			echo "Changes successfully saved!";

		}
	}
	else{
		echo "Failure";
	}
	
	}
	else{
		echo "Do not leave anything blank!";
	}
}
else{
		echo "Failure";
	}

?>