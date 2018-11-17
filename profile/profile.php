
<!DOCTYPE html>
<?php
	session_start();
	
	?>
<html>
<title> Profile </title>


<link rel="stylesheet" href="profile/assets/demo.css">
<link rel="shortcut icon" type="image/png" href="/Images/casinoIcon.png"/>
<script src="http://code.jquery.com/jquery-latest.min.js"
        type="text/javascript"></script>
<script src="js/script.js"></script>


<link href='http://fonts.googleapis.com/css?family=Cookie' rel='stylesheet' type='text/css'>
<link href="/profile/css/bootstrap.css" rel='stylesheet' type='text/css' />
<link href="/profile/css/style.css" rel='stylesheet' type='text/css' />
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href='//fonts.googleapis.com/css?family=Asap:400,700,400italic' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,600' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<style>
.yeah{font-family: "Raleway", sans-serif}


.listStyle{
  width:300px;
  background: black;
  border:1px solid #5383d3;
    padding: 5px;
}
</style>
			<?php
					$path = $_SERVER['DOCUMENT_ROOT'];
					include_once($path."/config.php");
					include($path."/header/loggedInHeader.html");

			?>

	<body>

	<div id="hi">
		<!-- container -->
			<!-- header -->
			<div id="home" class="header">
				<div class="container">
				<!-- top-hedader -->

				<div class="top-header">
					<!-- /logo -->
				<?php
				
					
						if(isset($_SESSION['ID'])){
							$ID=$_SESSION["ID"];

							
							$sql="select * from user where userid=?";
								if($con=connect_db()){
									if($s=$con->prepare($sql)){
										$s->bind_param("i",$ID);
										$s->execute();
										$s->bind_result($ID,$firstName,$lastName,$username,$email,$photo,$password,$money,$description,$DOB,$city,$country,$phone);
										if($s->fetch()){
											
											?>

											

			<div class="banner-info">
				<div class="col-md-7 header-right">
				

					<h6>
						Profile of 
						<?php 
							echo $username	; 
							
						?> 


						
							
					</h6>
					<ul class="address">
					
					<li>
							<ul class="address-text" >
								<li><b>FIRST NAME</b></li>
								
								<li id="edit1" >
									
									
										<?php 
										echo $firstName; 
										?>
									
							
							</li>
						
							</ul>
						</li>
						<li>
							<ul class="address-text" >
								<li><b>LAST NAME</b></li>
								<li id="edit2" >
									
										<?php 
										echo $lastName; 
										?>
							
							</li>
							</ul>
						</li>
						<li>
							<ul class="address-text">
								<li><b>USERNAME</b></li>
								<li >
									<?php 
									echo $username; 
									?> 
							</li>
							</ul>
						</li>
						<li>
							<ul class="address-text">
								<li><b>D.O.B</b></li>
								<li id="edit3" >
									<?php 
										
										
											echo $DOB;
										
									?>

								</li>
							</ul>
						</li>
						<li>
							<ul class="address-text">
								<li><b>PHONE </b></li>
								<li id="edit4" >
									<?php 
										
											echo $phone;
										
									?>
								</li>
							</ul>
						</li>
						<li>
							<ul class="address-text">
								<li><b>CITY </b></li>
								<li id="edit5">
									<?php 
											echo $city;
										
									?>
								</li>
							</ul>
						</li>
						<li>
							<ul class="address-text">
								<li><b>COUNTRY</b></li>
								<li id="edit6" >
									<?php 
										
											echo $country;
										
									?>
								</li>
							</ul>
						</li>
						<li>
							<ul class="address-text">
								<li><b>EMAIL </b></li>
								<li id="edit7" >
									<?php 
									
										
											echo $email;
										
									?>
								</li>
							</ul>
						</li>
						
					</ul>
					
					<img src="/Images/saveIcon.png" id="saveTextIcon">
   					
					<img id="editIcon" src="/Images/editProfileIcon.png" >
				</div>
				<div class="col-md-5 header-left">
					<?php
				if($photo=="-"){
					?>
					<img src="/Images/noProfilePicture.png" alt=""/>
					<?php
				}

				else{
					?>
					<img src="/<?php echo $photo; ?>" alt=""/>

					<?php
				}
			
			?>
					
				<form enctype="multipart/form-data" name='form' action='http://casino/changePicture.php' method='post' > 
				
					<div class="image-upload">
					<span id="imageName"></span>
				   
				    <label for="submit">
				       		 <img id="savePictureIcon" src="/Images/saveIcon.png" alt="save Picture Icon">
				    
				   		 </label>
				    	<label for="files">
				       		 <img id="editPictureIcon" src="/Images/changeProfilePictureIcon.png" alt="Change Picture Icon">
				        </label>
				        
				       
				    <input id="files" name="photo"  type="file" />
				    <input type="submit" id="submit">
				    
				</div>
			</form>

					




				</div>

				<div class="clearfix"> </div>
						
		      </div>
			</div>
		</div>
	</div>
			<!-- About Section -->
		
<div class="w3-container yeah" style="padding:50px 16px" id="about">
  <h1 class="w3-center">Statistics</h1>
  <p class="w3-center w3-large">Slots</p>
  <div class="w3-row-padding w3-center" style="margin-top:64px">
    <div class="w3-quarter ">

      <img src="http://casino/Images/fafaDiamond1.jpg" class="bigStatImg">
      <p class="w3-large">Pairs</p>

      	<ul class="statUL" >
      		<li >
      			<img src="http://casino/slots/images/slot1.png" class="statImg">	
      			<p class="iconText" id="pair_cherries"> 0 </p>
      		</li>

      		<li>
      			<img src="http://casino/slots/images/slot2.png" class="statImg">	
      			<p class="iconText" id="pair_oranges">0 </p>
      		</li>

      		<li>
      			<img src="http://casino/slots/images/slot3.png" class="statImg">	
      			<p class="iconText" id="pair_grapefruits"> 0 </p>
      		</li>

      		<li>
      			<img src="http://casino/slots/images/slot4.png" class="statImg">	
      			<p class="iconText" id="pair_bells"> 0 </p>
      		</li>

      		<li>
      			<img src="http://casino/slots/images/slot5.png" class="statImg">	
      			<p class="iconText" id="pair_bars"> 0 </p>
      		</li>

      		<li>
      			<img src="http://casino/slots/images/slot6.png" class="statImg">	
      			<p class="iconText" id="pair_sevens"> 0 </p>
      		</li>
      		<br>
      		<li>
      			<img src="http://casino/Images/statsTotal.png" class="statImg">	
      			<p class="iconText" id="pair_total"> 0 </p>
      		</li>


  		</ul>
      
     
    </div>
    <div class="w3-quarter">
      <img src="http://casino/Images/fafaDiamond2.jpg" class="bigStatImg">
      <p class="w3-large">Three of a Kind</p>
     	 <ul class="statUL2">
      		<li >
      			<p class="iconText2" id="three_cherries"> 0 </p>
      		</li>

      		<li>
      			<p class="iconText2" id="three_oranges"> 0 </p>
      		</li>

      		<li>
      			<p class="iconText2" id="three_grapefruits"> 0 </p>
      		</li>

      		<li>
      			<p class="iconText2" id="three_bells"> 0 </p>
      		</li>

      		<li>
      			<p class="iconText2" id="three_bars"> 0 </p>
      		</li>

      		<li>
      			<p class="iconText2" id="three_sevens"> 0 </p>
      		</li>
<br>
      		<li >
      			<p class="iconText2" id="three_total"> 0 </p>
      		</li>


  		</ul>
    </div>
    <div class="w3-quarter">
      <img src="http://casino/Images/fafaDiamond3.jpg" class="bigStatImg">
      <p class="w3-large">Four of a Kind</p>
       <ul class="statUL2">
      		<li >
      			<p class="iconText2" id="four_cherries"> 0 </p>
      		</li>

      		<li>
      			<p class="iconText2" id="four_oranges"> 0 </p>
      		</li>

      		<li>
      			<p class="iconText2" id="four_grapefruits"> 0 </p>
      		</li>

      		<li>
      			<p class="iconText2" id="four_bells"> 0 </p>
      		</li>

      		<li>
      			<p class="iconText2" id="four_bars"> 0 </p>
      		</li>

      		<li>
      			<p class="iconText2" id="four_sevens"> 0 </p>
      		</li>
<br>
      		<li >
      			<p class="iconText2" id="four_total"> 0 </p>
      		</li>


  		</ul>
    </div>
    <div class="w3-quarter">
    	<img src="http://casino/Images/fafaDiamond4.jpg" class="bigStatImg">
      <p class="w3-large">Five of a Kind</p>
       <ul class="statUL2">
      		<li >
      			<p class="iconText2" id="five_cherries"> 0 </p>
      		</li>

      		<li>
      			<p class="iconText2" id="five_oranges"> 0 </p>
      		</li>

      		<li>
      			<p class="iconText2" id="five_grapefruits"> 0 </p>
      		</li>

      		<li>
      			<p class="iconText2" id="five_bells"> 0 </p>
      		</li>

      		<li>
      			<p class="iconText2" id="five_bars"> 0 </p>
      		</li>

      		<li>
      			<p class="iconText2" id="five_sevens"> 0 </p>
      		</li>
<br>
      		<li >
      			<p class="iconText2" id="five_total"> 0 </p>
      		</li>

  		</ul>
    </div>


    
  </div>
  <div class="slotsInfoBox1">
  	<span class="slotsInfoBox_titel"> Total Spins </span>
  	<span id="totalspins" class="slotsInfoBox_Text">0</span>
  </div>

  <div class="slotsInfoBox">
  	<span class="slotsInfoBox_titel"> Highest Bet </span>
  	<span id="highestbet" class="slotsInfoBox_Text">0</span>
  </div>

  <div class="slotsInfoBox">
  	<span class="slotsInfoBox_titel"> Highest Win </span>
  	<span id="highestwin" class="slotsInfoBox_Text">0</span>
  </div>
  	
  	
</div>

	</body>

<footer>
  <?php
    include($path."/footer.html");
  ?>
</footer>


<script>
	document.getElementById("savePictureIcon").addEventListener("click", changeImage, false);
	document.getElementById("editPictureIcon").addEventListener('click', changeImage, false);
	document.getElementById("editIcon").addEventListener("click", ChangeEditable, false);
	document.getElementById("saveTextIcon").addEventListener("click", saveEdits, false);
			

				var e1 = document.getElementById("edit1");
				var e2 = document.getElementById("edit2");
				var e3 = document.getElementById("edit3");
				var e4 = document.getElementById("edit4");
				var e5 = document.getElementById("edit5");
				var e6 = document.getElementById("edit6");
				var e7 = document.getElementById("edit7");

				function changeImage(){
					var a=document.getElementById("editPictureIcon");
					var b=document.getElementById("savePictureIcon");
					


					if(b.style.display="none"){
						
						
						a.style.display="none"; 
						b.style.display = "initial"; 
					}

					
				}

		  function handleFileSelect(evt) {
		    var chosenFile = evt.target.files[0]; //get the first file in the FileList
			var fileName = chosenFile.name; //the name of the file as a string
			var fileSize = chosenFile.size; //the size of the file in bytes, as an integer
			var fileModifiedDate = chosenFile.lastModifiedDate; //a Date object
			document.getElementById("imageName").innerHTML="Change to: "+fileName+"?";
			
					  }
			

			 document.getElementById('files').addEventListener('change', handleFileSelect, false);



				function ChangeEditable(){

					if(e1.contentEditable=="true"){		

					document.getElementById("saveTextIcon").style.display="none";

						e1.contentEditable="false";
						e2.contentEditable="false";
						e3.contentEditable="false";
						e4.contentEditable="false";
						e5.contentEditable="false";
						e6.contentEditable="false";
						e7.contentEditable="false";

						document.getElementById("edit1").className="noStyle";
						document.getElementById("edit2").className="noStyle";
						document.getElementById("edit3").className="noStyle";
						document.getElementById("edit4").className="noStyle";
						document.getElementById("edit5").className="noStyle";
						document.getElementById("edit6").className="noStyle";
						document.getElementById("edit7").className="noStyle";

					}
		else{
			
			 e1.contentEditable="true";
			 e2.contentEditable="true";
			 e3.contentEditable="true";
			 e4.contentEditable="true";
			 e5.contentEditable="true";
			 e6.contentEditable="true";
			 e7.contentEditable="true";

					document.getElementById("edit1").className="listStyle";
					document.getElementById("edit2").className="listStyle";
					document.getElementById("edit3").className="listStyle";
					document.getElementById("edit4").className="listStyle";
					document.getElementById("edit5").className="listStyle";
					document.getElementById("edit6").className="listStyle";
					document.getElementById("edit7").className="listStyle";

					document.getElementById("saveTextIcon").style.display="initial";



		}
		
	}

				


	function saveEdits() {
		document.getElementById("saveTextIcon").style.display="none";
				var e11 = document.getElementById("edit1").innerHTML;
				var e22 = document.getElementById("edit2").innerHTML;
				var e33 = document.getElementById("edit3").innerHTML;
				var e44 = document.getElementById("edit4").innerHTML;
				var e55 = document.getElementById("edit5").innerHTML;
				var e66 = document.getElementById("edit6").innerHTML;
				var e77 = document.getElementById("edit7").innerHTML;



					document.getElementById("edit1").className="noStyle";
					document.getElementById("edit2").className="noStyle";
					document.getElementById("edit3").className="noStyle";
					document.getElementById("edit4").className="noStyle";
					document.getElementById("edit5").className="noStyle";
					document.getElementById("edit6").className="noStyle";
					document.getElementById("edit7").className="noStyle";

				


		if(e1.contentEditable=="true"){
		
			var xhttp;
  				if (window.XMLHttpRequest) {
  			 	
    				xhttp = new XMLHttpRequest();
    			} else {
    				
    				xhttp = new ActiveXObject("Microsoft.XMLHTTP");
  				}
  				xhttp.onreadystatechange = function() {
    				
  				};
  				xhttp.open("GET", "editProfile.php?e1="+e11+"&e2="+e22+"&e3="+e33 +"&e4="+e44+"&e5="+e55+"&e6="+e66+"&e7="+e77, false);
  				xhttp.send();

  				}
			}
			
		</script>
	<?php

										}

									}
								}
							
						}
		
				?>	
</html>

