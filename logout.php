<?php

session_start();
if(isset($_SESSION['ID'])){
	session_destroy();
	
}

header("location:index.html");

?>