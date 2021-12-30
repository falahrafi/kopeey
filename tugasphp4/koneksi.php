<?php 

// Local XAMPP Credentials
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "tugasphp4";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

?>