<?php
$servername = $config['localhost'];
$username = $config['username'];
$password = $config['password'];
$database = $config['database'];
// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
//echo "<font color='green'>MySQL Status: Connected successfully</font>";
?>


