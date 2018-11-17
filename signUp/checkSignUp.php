<?php


$bool=true;

if($_POST['username'] =="" ||  $_POST['password'] =="" ||
	 $_POST['email'] =="" || $_POST['checkPassword'] ==""
	|| $_POST['lastName'] =="" || $_POST['firstName']=="" 
	){
	
	header("location:/signUp/signUp.php?Error=6");
$bool=false;
}
	else{
		$lastName = htmlentities($_POST['lastName']);
		$firstName = htmlentities($_POST['firstName']);
		$mail = htmlentities($_POST['email']);

		if(!preg_match("/^[a-zA-Z ]*$/",$lastName)){
			header("location:/signUp/signUp.php?Error=1");
			$bool=false;
			}

			if(!preg_match("/^[a-zA-Z ]*$/",$firstName)){
			header("location:/signUp/signUp.php?Error=1");
			$bool=false;
			}
				
		if(!filter_var($mail, FILTER_VALIDATE_EMAIL)){
				header("location:/signUp/signUp.php?Error=5");
				$bool=false;
			}	
						
		if(strlen($_POST['password']) < 4){
						header("location:/signUp/signUp.php?Error=3");
						$bool=false;;
					}
						else{
							if( $_POST['password']!= $_POST['checkPassword']){
							header("location:/signUp/signUp.php?Error=4");
							$bool=false;
						}
						
					
					}
				}
				
				
if(isset($_POST['username']) && isset($_POST['password']) && isset($_POST['firstName']) && isset($_POST['lastName']) && isset($_POST['email'])){

		if($bool==true ){
			session_start();

			$path = $_SERVER['DOCUMENT_ROOT'];
			include($path.'/config.php');

				if($con =connect_db()){
					
	

			$sql = "select count(username) from user where username = ?";
				
				if($stmt = $con->prepare($sql)){
					$stmt->bind_param("s",$_POST['username']);
					$stmt->execute();
					$stmt->bind_result($antal);
					$stmt->fetch();
					$stmt->close();
					if($antal >0){
						header("location:/signUp/signUp?Error=2");
					}
				}
					
					
						echo "4";
						if(isset($_POST['username']) && isset($_POST['password']) && 
							isset($_POST['lastName']) && isset($_POST['firstName']) 
							&& isset($_POST['email']) ){
							
						
						$username= htmlentities($_POST['username']);
						$email = htmlentities($_POST['email']);
						$firstName = htmlentities($_POST['firstName']);
						$lastName = htmlentities($_POST['lastName']);
						$peppar="*^?/#fd.)*2+fh*-,<£€]";
						$password = htmlentities($_POST['password']).$peppar; 

						$HashedPW=hasha($password); 

						$money=10000;
						$nada="-";
						
						$sql1 = 'insert into user values(0,?,?,?,?,?,?,?,?,?,?,?,?)';
						
						if($stmt1= $con->prepare($sql1)){
							$stmt1->bind_param("ssssssisssss",$firstName,$lastName,$username,$email,$nada,$HashedPW,$money,$nada,$nada,$nada,$nada,$nada);
							$stmt1->execute();
							$stmt1->close();

						}
					

						$id = $con->insert_id;
						$zero=0;
						$sql2 = 'insert into fiveSlots values(?,?,?,?,?,?,?,?)';
						$sql3 = 'insert into fourSlots values(?,?,?,?,?,?,?,?)';
						$sql4 = 'insert into threeSlots values(?,?,?,?,?,?,?,?)';
						$sql5 = 'insert into pairSlots values(?,?,?,?,?,?,?,?)';
						$sql6 = 'insert into slots values(?,?,?,?,?,?)';

						if($s= $con->prepare($sql2)){
							$s->bind_param("iiiiiiii",$id,$zero,$zero,$zero,$zero,$zero,$zero,$zero);
							$s->execute();
							$s->close();

						}
						
						if($s= $con->prepare($sql3)){
							$s->bind_param("iiiiiiii",$id,$zero,$zero,$zero,$zero,$zero,$zero,$zero);
							$s->execute();
							$s->close();

						}
						
						if($s= $con->prepare($sql4)){
							$s->bind_param("iiiiiiii",$id,$zero,$zero,$zero,$zero,$zero,$zero,$zero);
							$s->execute();
							$s->close();

						}
						if($s= $con->prepare($sql5)){
							$s->bind_param("iiiiiiii",$id,$zero,$zero,$zero,$zero,$zero,$zero,$zero);
							$s->execute();
							$s->close();

						}
						if($s= $con->prepare($sql6)){
							$s->bind_param("iiiiii",$id,$zero,$zero,$zero,$zero,$zero);
							$s->execute();
							$s->close();

						}
							header('location:/index.html');	
								
								}
							
						}
					
			else{
				echo "Error Could not connect to database";
				}	
			}
		}
else{
	echo "Error: Something went wrong";
}



					?>