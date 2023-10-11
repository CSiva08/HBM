<?php
include('session.php'); // Include the session check function
// Check if the session is active, if not, the user will be redirected to login.php
checkSession();
$role=$_SESSION["role"];
include('database.php');
?>
<html>
  <head>
    <link rel="stylesheet" href="style.css">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <title>
    HBM
  </title>
  <style>
  .button {
      background-color: #4CAF50; /* Green */
      border: none;
      color: white;
      padding: 15px 32px;
      text-align: center;
      text-decoration: none;
      display: inline-block;
      font-size: 16px;
      border-radius: 25px;
    }
</style>
  </head>
  <body>
    
      <div class="navbar">
        <b>
        <a href="home.php" >HOME</a>
        
        <?php if ($role=="admin"): ?>
          <a href="build.html">BUILD</a>
          <?php elseif ($role=="worker"):?>
            <a href="">BID</a>
          <?php else: ?>
            <div class="dropdown">
              <button class="dropbtn">SERVICES</button>
              <div class="dropdown-content">
                <a href="build.html">Build</a>
                <a href="">Reconstruct</a>
              </div>
          </div>
            <?php endif; ?>
        <a href="monitor.php" >MONITER</a>
        
        <a href="payment.php" >PAYMENTS</a>
        <a href="inventory.php" >INVENTORY</a>
        <?php if ($role=="admin"): ?>
          <a href="quotation.php" >QUOTATION</a>
          <?php else: ?>
        <a href="contact.php" >CONTACT</a>
        <?php endif; ?>
        <div class="dropdown">
        <button class="dropbtn">
          <i class="fa fa-fw fa-user"></i><i class="fa fa-caret-down"></i>
        </button>
        <div class="dropdown-content">
        <?php
    if (isset($_SESSION['session_id'])) {
        echo '<a href="logout.php" id="loginlink">LOGOUT</a>';
        echo' <a href="">PROFILE</a>';
    } else {
        echo '<a href="login.php" id="loginlink">LOGIN</a>';
    }
    
    ?>
        </div>
      </div> 
       <!-- <div class="dropdown">
          <button class="dropbtn">
           <a href=""> <i class="fa fa-fw fa-user"></i><i class="fa fa-caret-down"></i></a>
          </button>
          <div class="dropdown-content">
            <a href="">PROFILE</a>
            <a href="">LOGOUT</a>
          </div>
        </div> -->
      </b>   
    </div>
    <div>
      <img class="slides" src="Hbm_logo1.jpg" style="height: 100%; width: 100%;">
      <img class="slides" src="Hbm_logo2.jpg" style="height: 100%; width: 100%;">
      <img class="slides" src="Hbm_logo3.jpg" style="height: 100%; width: 100%;">
      <img class="slides" src="Hbm_logo4.jpg" style="height: 100%; width: 100%;">
    </div>
    


    <script>
      var myIndex = 0;
      carousel();
      
      function carousel() {
        var i;
        var x = document.getElementsByClassName("slides");
        for (i = 0; i < x.length; i++) {
          x[i].style.display = "none";  
        }
        myIndex++;
        if (myIndex > x.length) {myIndex = 1}    
        x[myIndex-1].style.display = "block";  
        setTimeout(carousel, 5000);
      }
      </script>



    <?php
    $query = "SELECT * FROM home where status='quoted'";
    $result = mysqli_query($conn, $query);
    
    if (mysqli_num_rows($result) > 0) {
        echo'<div class="body">';
    echo'<h1><b>Customer Quotes</b></h1>';
    echo'<table style="margin-left:40px; text-align:center; padding: 20px;0 0 0; width:90%; border:1px; font-size:25px;">';
        echo'<thead style="background-color:#BDF386; text-align:center; padding: 20px;0 0 0; font-size:30px;">';
            echo'<tr>';
                echo'<th>Customer Id</th>';
                echo'<th>Name</th>';
                echo'<th>Home Images</th>';
                echo'<th>Details</th>';
            echo'</tr>';
        echo'</thead>';
        while ($row = mysqli_fetch_assoc($result)) {
        echo'<tbody style="background-color:D9DEDD;">';
            echo'<tr>';
                echo'<td>'.$row['id'].'</td>';
                echo'<td >'.$row['name'].'</td>';
                echo'<td><a href="#" >';
                       $homeid="home1001";
                    echo '<a href="monitor.php?homeid=' . $homeid . '">';
                    
                     echo'<img src="hbm_icon.jpg" alt="Clickable Image" style="width:250px; height:25px;"></a></td>';
                echo'<td>';

                    echo'   <a href="#"id="showDetails">Details</a>';
                    echo'</td>';
                    echo'</tr>';

                    echo'</tbody>';
        }
        echo '</table>';
        echo' </div>';
    } else {
        echo 'No records found.';
    }
    
    // Close the database connection
    mysqli_close($conn);
    ?>
     

      
    <div id="detailsSection" style="background-color: #3498db; border-radius:20px;">
    <h1><b>Contractor Bids</b></h1>
    <table style="margin-left:100px;">
        <tr>
            <td style="font-size:25px; text-align=center; font-weight:bold; ">Customer Id</td>
            <td style="font-size:25px; text-align=center; padding:0 0 0 30px; color:white;">staff1001</td>
        </tr>
        <tr>
        <td style="font-size:25px; text-align=center; font-weight:bold; ">Name</td>
            <td id="contractorName" style="font-size:25px; text-align=center; padding:0 0 0 30px;">chandran</td>
        </tr>
        <tr>
        <td style="font-size:25px; text-align=center; font-weight:bold; ">Bid Amount</td>
            <td style="font-size:25px; text-align=center; padding:0 0 0 30px;">$100000</td>
        </tr>
        <tr>
        <td style="font-size:25px; text-align=center; font-weight:bold; ">Bid Details</td>
            <td style="font-size:25px; text-align=center; padding:0 0 0 30px;">bid detailsSection</td>
        </tr>
    </table>
    <form method="post" action="payment.php">
 <button class="button" type="submit">submit</button>
 </form>
    </div>




     <div  class="footer">  
      <h1>FOLLOW US</h1>
     <a href="" class="fa fa-facebook"></a>
     <a href="" class="fa fa-twitter"></a>
    <a href="" class="fa fa-linkedin"></a>
    <a href="" class="fa fa-youtube"></a>
    <a href="" class="fa fa-instagram"></a>
    
      </div>
   <?php
    $sessionID = $_SESSION["userid"];

    // Display the session ID
    echo "Session ID: " . $_SESSION["userid"];
   ?>
      
  </body>
</html>