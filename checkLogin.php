<?php
session_start();

if(isset($_POST['username']) && isset($_POST['password'])){
	$uname= htmlentities($_POST['username']);
	$pword= htmlentities($_POST['password']);
	
	$sql= "select userID, username, password from user where username = ?";

	include("config.php");
	if($con = connect_db()){
		
		if($s = $con->prepare($sql)){
			
			$s->bind_param("s",$uname);
			$s->execute();
			$s->bind_result($ID,$username,$hashedPword);
			$peppar="*^?/#fd.)*2+fh*-,<£€]";
			
			
			if($s->fetch() && checkPassword($pword.$peppar,$hashedPword)){
				
				$_SESSION['ID'] = $ID;
				$_SESSION['username'] = $username;
				    
				
				    header("location:index.php");
				}
				else{
					header("location:loginTemplate/login.php?Error=1");
				}
			}
		}



}