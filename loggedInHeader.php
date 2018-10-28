<link rel="stylesheet" href="css/style.css">
<?php
/*
	if(isset($_SESSION['ID'])){

		?>
<script language="javaScript">
	var timeout;
document.onmousemove = function(){
  clearTimeout(timeout);
  timeout = setTimeout(function(){
  	var xhttp;
           alert("You are inactive and therefore will be logged out");
           
        if (window.XMLHttpRequest) {
          xhttp = new XMLHttpRequest();
          } else {
          xhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xhttp.onreadystatechange = function() {
          if (this.readyState == 4 && this.status == 200) {
              
          }
        };
        xhttp.open("GET", "logout.php", false);
        xhttp.send();
  	
  }, 100000);
}
window.onbeforeunload = WindowCloseHanlder;
function WindowCloseHanlder()
{
window.alert('My Window is closing');
}
</script>
		<html>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet"  href="css/style.css">
<?php
$id=$_SESSION['ID'];
include_once("config.php");

$sql="select money from user where userid=?";
	if($con=connect_db()){
		if($stmt=$con->prepare($sql)){
			$stmt->bind_param("i",$id);
			$stmt->execute();
			$stmt->bind_result($money);
			if($stmt->fetch()){
$AddedMessage="";
*
		$id=$_SESSION['ID'];
	 	$username=$_SESSION['username'];
		$firstname= $_SESSION['firstname'];
		$lastname= $_SESSION['lastname'];	    
		$email= $_SESSION['email'];
	  	$photo=$_SESSION['photo'];	
	  	*/
	
?>



<!DOCTYPE html>
<html>

<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">


	<link rel="stylesheet" href="assets/demo.css">
	<link rel="stylesheet" href="css/loggedInHeader.css">
	<link href='http://fonts.googleapis.com/css?family=Cookie' rel='stylesheet' type='text/css'>


</head>

<body>

<header class="header-user-dropdown">

	<div class="header-limiter">
		<h1><a href="#">Oscar's <span>Casino</span></a></h1>

		<nav>
			<a href="#">Overview</a>
			<a href="#">Surveys</a>
			<a href="#">Reports</a>
		</nav>


		<div class="header-user-menu">
			<img src="Images/anonymous.jpeg" alt="User Image"/>

			<ul>
				<li><a href="#">Settings</a></li>
				<li><a href="#">Payments</a></li>
				<li><a href="logout.php" class="highlight">Logout</a></li>
			</ul>
		</div>

	</div>

</header>



<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script>

	$(document).ready(function(){

		var userMenu = $('.header-user-dropdown .header-user-menu');

		userMenu.on('touchend', function(e){

			userMenu.addClass('show');

			e.preventDefault();
			e.stopPropagation();

		});

		// This code makes the user dropdown work on mobile devices

		$(document).on('touchend', function(e){

			// If the page is touched anywhere outside the user menu, close it
			userMenu.removeClass('show');

		});

	});

</script>



</body>

</html>


	<?php
	/*
		}
		}
	}
}

</html>
*/
?>