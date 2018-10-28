
<?php


$bool=true;

if($_POST['username'] =="" ||  $_POST['password'] =="" ||
	 $_POST['email'] =="" || $_POST['checkPassword'] ==""
	|| $_POST['lastName'] =="" || $_POST['firstName']=="" 
	){
	
	header("location:signUpTemplate/signUp.php?Error=6");
$bool=false;
}
	else{
		$lastName = htmlentities($_POST['lastName']);
		$firstName = htmlentities($_POST['firstName']);
		$mail = htmlentities($_POST['email']);

		if(!preg_match("/^[a-zA-Z ]*$/",$lastName)){
			header("location:signUpTemplate/signUp.php?Error=1");
			$bool=false;
			}

			if(!preg_match("/^[a-zA-Z ]*$/",$firstName)){
			header("location:signUpTemplate/signUp.php?Error=1");
			$bool=false;
			}
				
		if(!filter_var($mail, FILTER_VALIDATE_EMAIL)){
				header("location:signUpTemplate/signUp.php?Error=5");
				$bool=false;
			}	
						
		if(strlen($_POST['password']) < 4){
						header("location:signUpTemplate/signUp.php?Error=3");
						$bool=false;;
					}
						else{
							if( $_POST['password']!= $_POST['checkPassword']){
							header("location:signUpTemplate/signUp.php?Error=4");
							$bool=false;
						}
						
					
					}
				}
				echo "1";
				
if(isset($_POST['username']) && isset($_POST['password']) && isset($_POST['firstName']) && isset($_POST['lastName']) && isset($_POST['email'])){

		if($bool==true ){
			session_start();

			echo "2";
			include('config.php');

				if($con =connect_db()){
					echo "3";
	

			$sql = "select count(username) from user where username = ?";
				
				if($stmt = $con->prepare($sql)){
					$stmt->bind_param("s",$_POST['username']);
					$stmt->execute();
					$stmt->bind_result($antal);
					$stmt->fetch();
					$stmt->close();
					if($antal >0){
						header("location:signUpTemplate/signUp?Error=2");
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
	
						$sql1 = 'insert into user values(0,?,?,?,?,null,?,?)';
						
						if($stmt1= $con->prepare($sql1)){
							$stmt1->bind_param("sssssi",$firstName,$lastName,$username,$email,$HashedPW,$money);
							$stmt1->execute();
							$stmt1->close();

						}
					

						/*
						$id = $con->insert_id;

							$target = "images/Profile/"; 

						$target = $target . basename( $_FILES['photo']['name']); 
						$imageFileType = strtolower(pathinfo($target,PATHINFO_EXTENSION));
						$fileName="images/Profile/Priv".$id.".".$imageFileType;
						$pic=($_FILES['photo']['name']); 
						

						if(move_uploaded_file($_FILES['photo']['tmp_name'],$fileName)) {

						}

						$sql1 = 'update user set photo = ? where userid=?';

						if($stmt2= $con->prepare($sql1)){
							$stmt2->bind_param("si",$fileName,$id);
							$stmt2->execute();
							$stmt2->close();
						}

							*/
					
						
								header('location:index.php?');	
								
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