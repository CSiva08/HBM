<?php
      $name =$_POST['firstname'];
      $email =$_POST['email'];
      $address = $_POST['address'];
      $city = $_POST['city'];
      $state = $_POST['state'];
      $cardno =$_POST['cardnumber'];
$servername = "localhost";
$username = "siva";
$password = "";
$dbname = "hbm";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
$sql = "INSERT INTO payments (name, email, address,city,state,cardno)
VALUES ('$name','$email','$address','$city','$state','$cardno')";
if ($conn->query($sql) === TRUE) {
	include('payment.php');  
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}
$conn->close();
?>