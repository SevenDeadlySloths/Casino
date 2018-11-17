<?php


	$suite=["H","D","S","C"];
	$value=["2","3","4","5","6","7","8","9","10","J","Q","K","A"];
	$cards=[];
	$selected_cards=[];

	for($i=0;$i<count($suite);$i++){
		for($j=0;$j<count($value);$j++){
			array_push($cards,($value[$j].$suite[$i]));
		}
	}
		shuffle($cards);
		
	$data=[
			'array'=> $cards

		];

		echo json_encode($data);


	

?>