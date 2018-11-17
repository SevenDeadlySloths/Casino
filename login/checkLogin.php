<?php
session_start();

if(isset($_POST['username']) && isset($_POST['password'])){
	$uname= htmlentities($_POST['username']);
	$pword= htmlentities($_POST['password']);
	
	$sql= "select userID, username, password from user where username = ?";
	$path = $_SERVER['DOCUMENT_ROOT'];
	include($path."/config.php");

	if($con = connect_db()){
		
		if($s = $con->prepare($sql)){
			
			$s->bind_param("s",$uname);
			$s->execute();
			$s->bind_result($ID,$username,$hashedPword);
			$peppar="*^?/#fd.)*2+fh*-,<£€]";
			
			
			if($s->fetch() && checkPassword($pword.$peppar,$hashedPword)){
				$_SESSION['ID'] = $ID;
				$sessionID=session_id();

				$stmt="insert into session values(?,?,null)";

				$con2=connect_db();
					$s2=$con2->prepare($stmt);
					$s2->bind_param("is",$ID,$sessionID);
					$s2->execute();
					$s2->close();

					
				    
				
				    header("location:/index.html");
				}
				else{
					header("location:/login/login.php?Error=1");
				}
			}
		}



}