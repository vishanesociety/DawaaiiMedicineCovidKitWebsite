<?php 

$servername = "localhost";
$username = "u479256151_gbhatt2k";
$password = "Dawai@012";
$dbname = "u479256151_med_search";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
	die("Connection failed: " . mysqli_connect_error());
}



?>