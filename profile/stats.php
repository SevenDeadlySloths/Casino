<?php
session_start();

if(isset($_SESSION['ID'])){
	$id=$_SESSION['ID'];
	$path = $_SERVER['DOCUMENT_ROOT'];
	include($path."/config.php");

	

	$getsql="select * from pairslots where userid=?";
	$getsql2="select * from threeslots where userid=?";
	$getsql3="select * from fourslots where userid=?";
	$getsql4="select * from fiveslots where userid=?";
	$getsql5="select totalspins,highestbet,highestwin from slots where userid=?";
	$getsql6="select photo,money from user where userid=?";
		if($con=connect_db()){

			if($s = $con->prepare($getsql)){

				$s->bind_param("i",$id);

				$s->execute();
				$s->bind_result($id2,$pair_cherries,$pair_oranges,$pair_grapefruits,$pair_bells,$pair_bars,$pair_sevens,$pair_total);	
				$s->fetch();	
			}
		}

		if($con=connect_db()){
			if($s = $con->prepare($getsql2)){
				$s->bind_param("i",$id);
				$s->execute();
				$s->bind_result($id3,$three_cherries,$three_oranges,$three_grapefruits,$three_bells,$three_bars,$three_sevens,$three_total);
				$s->fetch();		
			}
		}

		if($con=connect_db()){
			if($s = $con->prepare($getsql3)){
				$s->bind_param("i",$id);
				$s->execute();
				$s->bind_result($id4,$four_cherries,$four_oranges,$four_grapefruits,$four_bells,$four_bars,$four_sevens,$four_total);		
				$s->fetch();
			}
		}

		if($con=connect_db()){
			if($s = $con->prepare($getsql4)){
				$s->bind_param("i",$id);
				$s->execute();
				$s->bind_result($id5,$five_cherries,$five_oranges,$five_grapefruits,$five_bells,$five_bars,$five_sevens,$five_total);	
				$s->fetch();	
			}
		}
		if($con=connect_db()){
			if($s = $con->prepare($getsql5)){
				$s->bind_param("i",$id);
				$s->execute();
				$s->bind_result($totalspins,$highestbet,$highestwin);	
				$s->fetch();	
			}
		}
		if($con=connect_db()){

			if($s = $con->prepare($getsql6)){

				$s->bind_param("i",$id);

				$s->execute();
				$s->bind_result($photo,$money);	
				$s->fetch();	
			}
		}







		$data=[
			'money' => $money,
			'photo'=>$photo,
			'pair_cherries' => $pair_cherries,
			'pair_oranges'=> $pair_oranges,
			'pair_grapefruits'=> $pair_grapefruits,
			'pair_bells'=> $pair_bells,
			'pair_bars'=> $pair_bars,
			'pair_sevens'=> $pair_sevens,
			'pair_total'=> $pair_total,
			'three_cherries' => $three_cherries,
			'three_oranges'=> $three_oranges,
			'three_grapefruits'=> $three_grapefruits,
			'three_bells'=> $three_bells,
			'three_bars'=> $three_bars,
			'three_sevens'=> $three_sevens,
			'three_total'=> $three_total,
			'four_cherries' => $four_cherries,
			'four_oranges'=> $four_oranges,
			'four_grapefruits'=> $four_grapefruits,
			'four_bells'=> $four_bells,
			'four_bars'=> $four_bars,
			'four_sevens'=> $four_sevens,
			'four_total'=> $four_total,
			'five_cherries' => $five_cherries,
			'five_oranges'=> $five_oranges,
			'five_grapefruits'=> $five_grapefruits,
			'five_bells'=> $five_bells,
			'five_bars'=> $five_bars,
			'five_sevens'=> $five_sevens,
			'five_total'=> $five_total,
			'highestbet'=> $highestbet,
			'highestwin'=> $highestwin,
			'totalspins'=>$totalspins,

		];
	echo json_encode( $data );
		
}