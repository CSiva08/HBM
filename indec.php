<?php
include('session.php'); // Include the session check function
// Check if the session is active, if not, the user will be redirected to login.php
checkSession();
$role=$_SESSION["role"];
?>
<html>
  <head>
    <link rel="stylesheet" href="style.css">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <title>
    HBM
  </title>

  </head>
  <body>
    
      <div class="navbar">
        <b>
        <a href="" >HOME</a>
        
        <?php if ($role=="admin"): ?>
          <a href="build.html">BUILD</a>
          <?php elseif ($role=="worker"):?>
            <a href="bid.php">BID</a>
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



    <div class="body">
      <h1><b>Our Services</b></h1>
        <a href="">
          <img alt="Build" src="newhome.jpg"
          width="250" height="300" class="place_hover" style="margin-right: 20px;">
  
       </a>
       <a href="">
        <img alt="Reconstruct" src="remodel.jpg"
        width="250" height="300" class="place_hover">
     </a>
      </div>

   
    
      
      <div class="grey_background"></div>
      <h1><u>PORTFOLIO</h1></u>
      <div class="box">
        <div class="box_row">
          <div class="box_cell" style="padding:20px">
                <a href="">
                  <img alt="Build" src="home1.jpg" class ="portfolio_hover">
                  </a>
            </div>   
            <div class="box_cell" style="padding:20px">
                <a href="">
                  <img alt="Build" src="home2.jpeg" class ="portfolio_hover">
                  </a>
            </div>   
            <div class="box_cell" style="padding:20px">
                <a href="">
                  <img alt="Build" src="home3.jpg" class ="portfolio_hover">
                  </a>
            </div>   
            <div class="box_cell" style="padding:20px">
                <a href="">
                  <img alt="Build" src="home4.jpg" class ="portfolio_hover">
                  </a>
            </div>   
            </div>
           </div>
           
      
      
      <div class="plan">
        <h1><u>HOW IT WORKS?</h1></u>
        <div class="box">
          <div class="box_row">
            <div class="box_cell">
      
              <div class="card">
                <div >
                  <a href="build.html">
                  <img alt="design" src="req.png" class="imgbx">
                </a>
                    <h1 >Requirements</h1></div>
            
              </div>
              </div>        
      
              <div class="box_cell">
      
                <div class="card">
                  <div >
                  <a href="portfolio.php">
                    <img alt="design" src="design.png" class="imgbx">
                  </a>
                      <h1 >Design</h1></div>
              
                </div>
                </div> 
      
                <div class="box_cell">
      
                  <div class="card">
                    <div >
                      <img alt="design" src="cost.png" class="imgbx">
                        
                        <h1 >Estimation</h1></div>
                
                  </div>
                  </div> 
      
                  <div class="box_cell">
      
                    <div class="card">
                      <div >
                      <a href="monitor.php">
                        <img alt="design" src="construction.png" class="imgbx">
                      </a>
                          <h1 >Construction</h1></div>
                  
                    </div>
                    </div> 
      
                    <div class="box_cell">
      
                      <div class="card">
                        <div >
                          <img alt="design" src="delivery.png" class="imgbx">
                            
                            <h1 >Delivery</h1></div>
                    
                      </div>
                      </div> 
      
          </div>
        </div>
      
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
