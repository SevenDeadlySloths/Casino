<?php
session_start();

if(isset($_SESSION['ID']) && isset($_GET['i'])&& isset($_GET['t']) && isset($_GET['s'])   && isset($_GET['h']) ){
	$id=$_SESSION['ID'];
	$icon=htmlentities($_GET['i']);
	$type=htmlentities($_GET['t']);
	$spent=htmlentities($_GET['s']);
	$money=htmlentities($_GET['h']);
	  

	$win=0;
	$sqlType="";
	$path = $_SERVER['DOCUMENT_ROOT'];
	$check=true;
	include($path."/config.php");

	if($money<$spent){
		$check=false;
	}

	if($check){


		


		if($type==2){
			$sqlType="pair";
			switch ($icon) {
			    case "cherries":
			        $win=$spent*0.2;
			        break;
			    case "oranges":
			        $win=$spent*0.3;
			        break;
			    case "grapefruits":
			        $win=$spent*0.4;
			        break;
			    case "bells":
			    	$win=$spent*0.5;
			    	break;
			    case "bars":
			    	$win=$spent*1;
			    	break;
			    case "sevens":
			    	$win=$spent*3;
			    	break;
			}

		}
		if($type==3){
			$sqlType="three";
			switch ($icon) {
			    case "cherries":
			      
			        $win=$spent*1;
			        break;
			    case "oranges":
			        $win=$spent*2;
			        break;
			    case "grapefruits":
			        $win=$spent*4;
			        break;
			    case "bells":
			    	$win=$spent*6;
			    	break;
			    case "bars":
			    	$win=$spent*10;
			    	break;
			    case "sevens":
			    	$win=$spent*50;
			    	break;
			}

		}
		if($type==4){
			$sqlType="four";
			switch ($icon) {
			    case "cherries":
			      
			        $win=$spent*10;
			        break;
			    case "oranges":
			        $win=$spent*20;
			        break;
			    case "grapefruits":
			        $win=$spent*30;
			        break;
			    case "bells":
			    	$win=$spent*50;
			    	break;
			    case "bars":
			    	$win=$spent*100;
			    	break;
			    case "sevens":
			    	$win=$spent*500;
			    	break;
			}

		}
		if($type==5){
			$sqlType="five";
			switch ($icon) {
			    case "cherries":
			      
			        $win=$spent*300;
			        break;
			    case "oranges":
			        $win=$spent*500;
			        break;
			    case "grapefruits":
			        $win=$spent*1000;
			        break;
			    case "bells":
			    	$win=$spent*2000;
			    	break;
			    case "bars":
			    	$win=$spent*3000;
			    	break;
			    case "sevens":
			    	$win=$spent*5000;
			    	break;
			}

		}
		

		$win1=(int)$win;
		$money+=$win1;
		$highestwin=0;


		$getsql="select highestwin from slots where userid=?";

		if($con=connect_db()){
			if($s = $con->prepare($getsql)){
				$s->bind_param("i",$id);
				$s->execute();
				$s->bind_result($a);
					if($s->fetch()){
						$highestwin=$a;
					}			
			}
		}


		$sql = "update user set money=? where userid=?";
		$sql2="update slots SET highestwin = ? where userid=?";
		$sql3="update slots SET moneywon = moneywon + ? where userid=?";
		$sql4="update ".$sqlType."slots set ".$icon."= ".$icon." + 1 where userid=?";
		$sql5="update ".$sqlType."slots SET totalwins = totalwins + 1 where userid=?";


		if($con=connect_db()){
			if($stmt = $con->prepare($sql)){
				$stmt->bind_param("ii",$money,$id);
				$stmt->execute();			
			}
		}

		if($con=connect_db()){
			if($highestwin<$win1){
				if($s = $con->prepare($sql2)){
					$s->bind_param("ii",$win1,$id);
					$s->execute();
				}
			}
		}

		if($con=connect_db()){
			if($s = $con->prepare($sql3)){
				$s->bind_param("ii",$win1,$id);
				$s->execute();
			}
		}

		if($con=connect_db()){
			if($s = $con->prepare($sql4)){
				$s->bind_param("i",$id);
				$s->execute();
			}
		}

		if($con=connect_db()){
			if($s = $con->prepare($sql5)){
				$s->bind_param("i",$id);
				$s->execute();
			}
		}




	}
	$data = [
			'win' => $win1, 
			'money' => $money, 
			'check'=> $check, 
			
		];

		echo json_encode( $data ); 
						
		
}


?>