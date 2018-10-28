<?php 

	
function connect_db() { 

		

	$mysqli = new mysqli('localhost', 'root', '', 'casino');

		
	if (!$mysqli->set_charset("utf8")) {
		echo "UTF8 did not work". $mysqli->error;
	}

	if ($mysqli->connect_errno) {
		echo "Could not connect to mysql: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
	}

	return $mysqli;
}

function hasha($str) {
	$hash = password_hash($str, PASSWORD_DEFAULT);
	return $hash;
}

function checkPassword($pword,$hasedPword) {
	return password_verify($pword, $hasedPword);
}
function generateRandomString($length = 5) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

?>