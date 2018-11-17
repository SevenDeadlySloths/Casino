<?php
$col=[];
for($i=0;$i<5;$i++){
		$random=rand(0,1000);
			if($random>=0 && $random<=300){
				$col[$i]=0;
			}
			else if($random>300 && $random<=500){
				$col[$i]=1;
			}
			else if($random>500 && $random<=750){
				$col[$i]=2;
			}
			else if($random>750 && $random<=850){
				$col[$i]=3;
			}
			else if($random>850 && $random<=930){
				$col[$i]=4;
			}
			else{
				$col[$i]=5;
			}
			
	}
	$data = [
		'col1' => $col[0], 
		'col2' => $col[1],  
		'col3' => $col[2], 
		'col4' => $col[3], 
		'col5' => $col[4], 
	];

	echo json_encode( $data );

?>

