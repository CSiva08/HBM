<?php  
// Database configuration  
$dbHost     = "localhost";  
$dbUsername = "siva";  
$dbPassword = "";  
$dbName     = "hbm";  
  
// Create database connection  
$conn = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);  
  
// Check connection  
if ($conn->connect_error) {  
    die("Connection failed: " . $conn->connect_error);  
}