<?php
session_start();
$path = $_SERVER['DOCUMENT_ROOT'];
include($path."/config.php");
	if(isset($_SESSION['ID'])){
		
		$ID=$_SESSION['ID'];
		
		

						$target = "Images/profilePictures/"; 

						$target = $target . basename($_FILES['photo']['name']); 
						$imageFileType = strtolower(pathinfo($target,PATHINFO_EXTENSION));
						$fileName="Images/profilePictures/userImage_".$ID.".".$imageFileType;
						$pic=($_FILES['photo']['name']); 

						
					if($imageFileType=="png" || $imageFileType=="jpg" ){
						if(move_uploaded_file($_FILES['photo']['tmp_name'],$fileName)) {
							if($con=connect_db()){
								$sql="update user set photo=? where userID=?";
								if($s=$con->prepare($sql)){
									$s->bind_param("si",$fileName,$ID);
									$s->execute();
									$s->close();
									header("location:http://casino/profile/profile.php");
									echo "Photo Updated!";

						}
							}
								else{
									echo "Error 404";
								}
						}
					}
						else{
							header("location:http://casino/profile/profile.php");
						}

						

	
	
	}
	else{
		echo "Not logged in";
	}


?>