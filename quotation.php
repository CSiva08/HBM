<?php
include('session.php'); // Include the session check function
// Check if the session is active, if not, the user will be redirected to login.php
checkSession();
include('database.php');
$role=$_SESSION["role"];
$id=$_SESSION["userid"];
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
        <a href="" >HOME</a>
        <a href="build.html">BUILD</a>
        <a href="">QUOTE</a>
        <a href="monitor.php" >MONITOR</a>
        <a href="payment.php" >PAYMENTS</a>
        <a href="inventory.php" >INVENTORY</a>
        
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



    <div class="body">
    <h1><b>Customer Quotes</b></h1>
    <table style="margin-left:40px; text-align:center; padding: 20px;0 0 0; width:90%; border:1px; font-size:25px;">
        <thead style="background-color:#BDF386; text-align:center; padding: 20px;0 0 0; font-size:30px;">
            <tr>
                <th>Customer Id</th>
                <th>Name</th>
                <th>Home Images</th>
                <th>Bids</th>
            </tr>
        </thead>
        <tbody style="background-color:D9DEDD;">
            <tr>
                <td>cust1001</td>
                <td >siva</td>
                <td><a href="#" >
                       
                    
                    <?php
                    $homeid="home1001";
                    echo '<a href="monitor.php?homeid=' . $homeid . '">';
                    ?>
                     <img src="hbm_icon.jpg" alt="Clickable Image" style="width:250px; height:25px;">
                    </a></td>
                <td>
                    <div class="dropdown">
                        <span>Bids</span>
                        <div class="dropdown-content">
                            <a href="#"id="showDetails">Option 1</a>
                            <a href="#">Option 2</a>
                            <a href="#">Option 3</a>
                        </div>
                    </div>
                </td>
            </tr>

        </tbody>
    </table>
      </div>



    <div id="detailsSection" style="background-color: #3498db; border-radius:20px;">
    <h1><b>Contractor Bids</b></h1>
    <table style="margin-left:100px;">
        <tr>
            <td style="font-size:25px; text-align=center; font-weight:bold; ">Contractor Id</td>
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

    <script>
        // JavaScript to show/hide the details section
        const showDetailsLink = document.getElementById("showDetails");
        const detailsSection = document.getElementById("detailsSection");
        const contractorName = document.getElementById("contractorName");

        showDetailsLink.addEventListener("click", function(event) {
            event.preventDefault(); // Prevent the default link behavior
            detailsSection.style.display = "block"; // Display the details section
            contractorName.textContent = "New Contractor Name";
        });
    </script>
   

     <div  class="grey">  
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
    echo "Session ID: " . $sessionID;
   ?>
      
  </body>
</html>