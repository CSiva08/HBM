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
    <div class="login-container">
        <div class="login-box">
            <div class="user-image-container">
                <img src="hbm_icon.jpg" alt="User Image" class="user-image">
            </div>
            <h2>LOG IN</h2>
            <form method="post">
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
                <button type="submit">Login</button>
                
                <?php  

          include('database.php');
if($_SERVER["REQUEST_METHOD"] == "POST"){  
  
if(!empty($_POST['username']) && !empty($_POST['password'])) {  
    $user=$_POST['username'];  
    $pass=$_POST['password'];  
    $query=mysqli_query($conn,"SELECT * FROM login WHERE username='".$user."' AND password='".$pass."'");  
    $numrows=MySQLI_num_rows($query);   
    if($numrows!=0)  
    {  
    while($row=mysqli_fetch_assoc($query))  
    {  
    $dbusername=$row['username'];  
    $dbpassword=$row['password'];  
    $userid=$row['id'];
    $role=$row['role'];
    }  
  
    if($user == $dbusername && $pass == $dbpassword)  
    {  
      session_start();  
      $_SESSION['session_id']=$user; 
      $_SESSION["userid"] =$userid;
      $_SESSION["role"]=$role;
          $cookie_name = $user;
          $time = date("Y-m-d H:i:s");
          setcookie($cookie_name, $time, time() + (86400 * 30), "/");  
    
    header("Location: home.php");   

    }  
    } else {  
    echo "Invalid username or password!";   
    }  
  
} else {  
    echo "All fields are required!";  
}  
}  

?>
            </form>
            <br>
            <a href="signup.php" style="text-decoration: none;">
            <button>Sign Up</button>
        </a>
        <a href="forgotpassword.php" style="text-decoration: none;"><button>Forgot Password</button></a>
        </div>
    </div>
    
</body>
</html>
