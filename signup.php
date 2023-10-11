<?php

include('database.php');
$sql = "SELECT id FROM login WHERE role = 'customer' ORDER BY id DESC LIMIT 1";
$result=mysqli_query($conn,$sql);
$numrows=MySQLI_num_rows($result);  
if($numrows!=0)  
    {  
    while($row=mysqli_fetch_assoc($result))  
    {  
        $lastCustomerId = $row['id'];
    } }

$input = $lastCustomerId;
$number = intval(substr($input, 4)) + 1;
$custId = substr($input, 0, 4) . $number;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <title>Login Page</title>
    <style>
        /* Reset some default styles */
body, html {
    margin: 0;
    padding: 0;
    font-family: Arial, Helvetica, sans-serif;
}
.input-icons i {
            position: absolute;
        }
.input-icons {
            width: 100%;
            margin-bottom: 10px;
            color: #fff;
            min-width: 50px;
            font-size: 24px;
            text-align: center;
        }

/* Center the login container */
.login-container {

            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            position: relative;
            
        }
        .blur-background {
            height: 100%;
            width: 100%;
            position: absolute;
            background-image: url("hbm_background.jpg");
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            filter: blur(3px);
            z-index: -1;
        }


/* Style the login box */
.login-box {
    background: linear-gradient(to bottom, #7875ff  40%, #ab2ef1  60%);
    padding: 10px;
    border-radius:10px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    text-align: center;
    min-width: 450px;
    min-height: 600px;
}

h2 {
    color: #fff;
}

/* Style the input fields */
.input-container {
    margin: 40px 0;
}

input[type="text"],
input[type="password"] {
    width: 80%;
    padding: 10px 10px 10px 50px;
    border: none;
    text-align: left;
    color: #fff;
    font-size: 20px;
    border-bottom: 1px solid #aaa8a8;
    background-color: transparent;
    outline: none;
}
input[type="text"]::placeholder,
input[type="password"]::placeholder {
    color: #fff;
    font-size:20px;
    margin-left: 20px;
}
/* Style the login button */
button {
    background-color: #fff;
    color: gray;
    font-size: 20px;
    padding: 20px 40px;
    border: none;
    border-radius: 50px;
    cursor: pointer;
    transition: background-color 0.3s;
}

button:hover {
    background-color: #555;
}
.user-image-container {
            text-align: center;
            padding-top: 40px;
        }

        .user-image {
            width: 100px;
            height: 100px; 
            border-radius: 50%; 
            object-fit: cover;
            border: 2px solid #fff; 
        }

    </style>
</head>
<body>
    <div class="blur-background"></div>
    <div class="login-container" style="margin:60px;">
        <div class="login-box">
            <div class="user-image-container">
                <img src="hbm_icon.jpg" alt="User Image" class="user-image">
            </div>
            <h2>SIGN UP</h2>
            <form method="post">
                <div class="input-container">
                    <div class="input-icons">
                        <i class="fa fa-user icon"></i>
                        <input type="text" name="name" placeholder="Name" required>
                    </div>
                </div>
                <div class="input-container">
                    <div class="input-icons">
                        <i class="fa fa-envelope icon"></i>
                        <input type="text" name="mail" placeholder="Email" required>
                    </div>
                </div>
                <div class="input-container">
                    <div class="input-icons">
                        <i class="fa fa-phone icon"></i>
                        <input type="text" name="ph_no" placeholder="Mobile Number" required>
                    </div>
                </div>
                <div class="input-container">
                    <div class="input-icons">
                        <i class="fa fa-home icon"></i>
                        <input type="text" name="address" placeholder="Address" required>
                    </div>
                </div>
                <div class="input-container">
                    <div class="input-icons">
                    <i class="fa fa-user icon">
                    </i>
                    <input type="text" name="username" placeholder="Username" required>
                </div>
                </div>
                <div class="input-container">
                    <div class="input-icons">
                        <i class="fa fa-lock icon">
                        </i>
                    <input type="password" name="password" placeholder="Password" required>
                </div>
                </div>
                <button type="submit">Sign Up</button>
<?php  

          include('database.php');
if($_SERVER["REQUEST_METHOD"] == "POST"){  
  
if(!empty($_POST['name']) && !empty($_POST['email'])&& !empty($_POST['ph_no']) && !empty($_POST['address']) && !empty($_POST['username']) && !empty($_POST['password']) ) {  
  
    $name=$_POST['name'];
    $email=$_POST['mail'];
    $contact=$_POST['ph_no'];
    $address=$_POST['address'];
    $role="customer";
    $user=$_POST['username'];  
    $pass=$_POST['password'];  
    $query = "INSERT INTO login VALUES ('$custId', '$name', '$user', '$pass', '$email', '$role', '$contact', '$address')";
 if (mysqli_query($conn, $query)) {
    echo"success";
    header("Location: login.php");
    exit;
    } else {
        echo "Error: " . mysqli_error($conn);
    } 
   }
  
} else {  
    echo "All fields are required!";  
}  
 

?>
            </form>
        </div>
    </div>
    
</body>
</html>
