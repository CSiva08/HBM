<?php
$_SESSION = array();
$_SESSION['session_id']=""; 
      $_SESSION["userid"] ="";
      $_SESSION["role"]="";
session_destroy(); // Destroy all session data
header("Location: login.php"); // Redirect to the login page
exit; // Make sure no code is executed after the redirection
?>
