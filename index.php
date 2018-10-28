
<!DOCTYPE html>
<html lang="en">
<title>Oscar's Casino</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="shortcut icon" type="image/png" href="Images/casinoIcon.png"/>
<link rel="stylesheet" href="css/style.css">


<!-- Header -->
<?php
	include("config.php");
	session_start();

	if(isset($_SESSION["ID"])){
		include("loggedInHeader.php");
	}
	else{
		include("loggedOutHeader.php");

	}
?>
<body >
	<div id="hi">
<header class="w3-display-container w3-content w3-center" style="max-width:1500px">
  <img  src="Images/casino.jpg" alt="Casino" width="1500" height="600">
  <div class="w3-display-middle w3-padding-large w3-border w3-wide w3-text-light-grey w3-center">
    <h1 class="w3-hide-medium w3-hide-small w3-xxxlarge">Oscar's</h1>
    <h5 class="w3-hide-large" style="white-space:nowrap">O's Casino</h5>
    <h3 class="w3-hide-medium w3-hide-small">CASINO</h3>
  </div>
  
  <!-- Navbar (placed at the bottom of the header image) -->
  <div class="w3-bar w3-light-grey w3-round w3-display-bottommiddle w3-hide-small" style="bottom:-16px">
    <a href="#Blackjack" class="w3-bar-item w3-button">Blackjack</a>
    <a href="#Roulette" class="w3-bar-item w3-button">Roulette</a>
    <a href="#Slots" class="w3-bar-item w3-button">Slots</a>
  </div>
</header>

<!-- Navbar on small screens -->
<div class="w3-center w3-light-grey w3-padding-16 w3-hide-large w3-hide-medium">
<div class="w3-bar w3-light-grey">
  <a href="#Blackjack" class="w3-bar-item w3-button">Blackjack</a>
  <a href="#Roulette" class="w3-bar-item w3-button">Roulette</a>
  <a href="#Slots" class="w3-bar-item w3-button">Slots</a>
</div>
</div>
<!-- Page content -->

  <!-- Images (Portfolio) -->



      <div class="container">

 				<img src="Images/BlackJack-index.jpg" alt="Blackjack" class="index-games1"  id="Blackjack">
 		
            	<div class="serviceBox">
               		 <span class="service-icon"><img src="Images/blackjackicon.png" class="serviceBoxIcon"></span>
               		 <h3 class="title">Blackjack</h3>
               		 <h5 class="sub-title">Something here</h5>
               		 <p class="description">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec vitae tortor et lacus congue tincidunt sed vel lectus. Cras elementum urna non ornare laoreet. Cras auctor vitae ligula eget pharetra. Cras ultrices tortor vitae tellus commodo euismod. Duis sollicitudin urna.
               	 </p>
                <a href="#" class="read">PLAY</a>
          
        </div>
        
</div>

<div class="container">

  <img src="Images/roulette-index.png" alt="Roulette" class="index-games2"  id="Roulette">
 		
            	<div class="serviceBox">
               		 <span class="service-icon"><img src="Images/rouletteicon.jpg" class="serviceBoxIcon2"></span>
               		 <h3 class="title">Roulette</h3>
               		 <h5 class="sub-title">Something here</h5>
               		 <p class="description">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec vitae tortor et lacus congue tincidunt sed vel lectus. Cras elementum urna non ornare laoreet. Cras auctor vitae ligula eget pharetra. Cras ultrices tortor vitae tellus commodo euismod. Duis sollicitudin urna.
               	 </p>
                <a href="#" class="read">PLAY</a>
          
        </div>
        
</div>

<div class="container">

  <img src="Images/slots-index.jpg" alt="Slots" class="index-games1" id="Slots">
 		
            	<div class="serviceBox">
               		 <span class="service-icon"><img src="Images/slotsicon.jpg" class="serviceBoxIcon2"></span>
               		 <h3 class="title">Slots</h3>
               		 <h5 class="sub-title">Something here</h5>
               		 <p class="description">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec vitae tortor et lacus congue tincidunt sed vel lectus. Cras elementum urna non ornare laoreet. Cras auctor vitae ligula eget pharetra. Cras ultrices tortor vitae tellus commodo euismod. Duis sollicitudin urna.
               	 </p>
                <a href="#" class="read">PLAY</a>
          
        </div>
        
</div>






       
    








  <img src="Images/noImage.png" alt="" class="w3-image w3-margin-top" width="1000" height="500">
  <img src="Images/noImage.png" alt="" class="w3-image w3-margin-top" width="1000" height="500">

  <!-- Contact -->
  <div class="w3-light-grey w3-padding-large w3-padding-32 w3-margin-top" id="contact">
    <h3 class="w3-center">Contact</h3>
    <hr>
    <p>Mauris neque quam, fermentum ut nisl vitae, convallis maximus nisl. Sed mattis nunc id lorem euismod placerat. Vivamus porttitor magna enim, ac accumsan tortor cursus at. Phasellus sed ultricies mi non congue ullam corper. Praesent tincidunt sed tellus.</p>

    <form action="/action_page.php" target="_blank">
      <div class="w3-section">
        <label>Name</label>
        <input class="w3-input w3-border" type="text" required name="Name">
      </div>
      <div class="w3-section">
        <label>Email</label>
        <input class="w3-input w3-border" type="text" required name="Email">
      </div>
      <div class="w3-section">
        <label>Message</label>
        <input class="w3-input w3-border" required name="Message">
      </div>
      <button type="submit" class="w3-button w3-block w3-dark-grey">Send</button>
    </form><br>
    <p>Powered by <a href="https://www.w3schools.com/w3css/default.asp" target="_blank" class="w3-hover-text-green">w3.css</a></p>

  </div>

<!-- End page content -->
</div>


</body>
</html>
