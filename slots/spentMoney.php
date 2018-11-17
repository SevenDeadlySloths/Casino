<?php
session_start();

if(isset($_SESSION['ID']) && isset($_GET['s']) && $_GET['s']!=""){
	$id=$_SESSION['ID'];
	$spent1=htmlentities($_GET['s']);
	$spent=(int) $spent1;
	$after=null;
	$check=true;
	$money=null;
	$highestbet=0;
	$path=$_SERVER['DOCUMENT_ROOT'];
	include($path."/config.php");

				$getsql = "select money from user where userid=?";
				$getsql2="select highestbet from slots where userid=?";

						if($con=connect_db()){

							if($s = $con->prepare($getsql)){
								$s->bind_param("i",$id);
								$s->execute();
								$s->bind_result($money);
									if($s->fetch()){
										if($money<$spent){
											
											$check=false;
										}
										else{
											$after=$money-$spent;
										}
									}
							}
						}
							if($con=connect_db()){
								if($s = $con->prepare($getsql2)){
									$s->bind_param("i",$id);
									$s->execute();
									$s->bind_result($a);
										if($s->fetch()){
											$highestbet=$a;
										}
										
									
							}
						}
				if($check){

						$sql = "update user set money=? where userid=?";

						$sql2 = "update slots set totalspins = totalspins + 1 where userid=?";

						$sql3="update slots SET moneyspent = moneyspent + ? where userid=?";

						$sql4="update slots SET highestbet = ? where userid=?";

							if($con=connect_db()){

								if($s = $con->prepare($sql)){
									$s->bind_param("ii",$after,$id);
									$s->execute();
								}
							}	
							if($con=connect_db()){
								if($s = $con->prepare($sql2)){
									$s->bind_param("i",$id);
									$s->execute();
								}
							}
							if($con=connect_db()){
								if($s = $con->prepare($sql3)){
									$s->bind_param("ii",$spent,$id);
									$s->execute();
								}
							}
							if($con=connect_db()){
								if($highestbet<$spent){
									if($s = $con->prepare($sql4)){
										$s->bind_param("ii",$spent,$id);
										$s->execute();

									}
								}
							
						}
							
				
			}
			
				$data = [
						'check' => $check,
						'money' => $after, 
						'tempMoney' => $after, 
						
					];

				echo json_encode( $data ); 
			
		}
?>