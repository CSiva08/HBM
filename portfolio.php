<?php
$length =$_POST['length'];
$width =$_POST['width'];
$floor =$_POST['floor'];
$details = $length.$width.$floor;
//$user =$_POST['user'];
//echo $user;
//checkSession();
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
    label {
  display: inline-block;
  padding: 10px 30px;
  position: relative;
  font-weight: bold;
  
  text-align: center;
  font-family: inherit;
  font-size: 45px;
  
    font-style: bold;
    margin-top: 30px;
    margin-bottom: 30px;
  color: #fff; /* Text color */
  cursor: pointer;
}

/* Pseudo-element for the left half */
label::before {
  content: '';
  position: absolute;
  top: 0;
  left: 0;
  width: 50%; /* Half of the label's width */
  height: 100%;
  border-top-left-radius: 10px; /* Rounded top-left corner */
  border-bottom-left-radius: 10px; /* Rounded bottom-left corner */
  background-color:darkorange; /* Left color */
}

/* Pseudo-element for the right half */
label::after {
  content: '';
  position: absolute;
  top: 0;
  right: 0;
  width: 50%; /* Half of the label's width */
  height: 100%;
  border-top-right-radius: 10px; /* Rounded top-left corner */
  border-bottom-right-radius: 10px; /* Rounded bottom-left corner */
  background-color: black /* Right color */
}

/* Center the text vertically and horizontally */
label span {
  position: relative;
  z-index: 1;
}
.grey{
      background-color:rgb(197, 194, 194);
      margin:0;
    }
  </style>
  </head>
  <body>
    <div class="navbar">
      <b>
      <a href="" class="right">HOME</a>
      <?php if ($role=="admin"): ?>
          <a href="build.html">BUILD</a>
          <?php else: ?>
            <div class="dropdown">
              <button class="dropbtn">SERVICES</button>
              <div class="dropdown-content">
                <a href="build.html">Build</a>
                <a href="">Reconstruct</a>
              </div>
          </div>
            <?php endif; ?>
      <a href="monitor.php" class="right">MONITER</a>
      <a href="" class="right">PAYMENTS</a>
      <a href="" class="right">ABOUT US</a>
      <a href="contact.php" class="right">CONTACT US</a>
      <div class="dropdown">
        <button class="dropbtn">
          <i class="fa fa-fw fa-user"></i><i class="fa fa-caret-down"></i>
        </button>
        <div class="dropdown-content">
          <a href="">PROFILE</a>
          <a href="">LOGOUT</a>
        </div>
      </div> 
    </b>   
  </div>
  <div>
    
      <img class="slides" src="portfolio1.webp" style="height: 400px; width: 100%; ">
      <img class="slides" src="portfolio2.jpg" style="height: 400px; width: 100%;">
      <img class="slides" src="portfolio3.jpeg" style="height: 400px; width: 100%;">
      <img class="slides" src="portfolio4.jpeg" style="height: 400px  ; width: 100%;">
    </div>
    <label ><span>Portfolio</span></label>
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
 
 //conn to mysql server with username password and database name
 include('database.php');

 
$tablesQuery = "SELECT homeid FROM home WHERE details = '$details'";
$tablesResult = mysqli_query($conn, $tablesQuery);


// ... your previous PHP code ...

if ($tablesResult) {
  $count = 0;
  echo '<div class="image_container">';
  
  while ($tableRow = mysqli_fetch_assoc($tablesResult)) {
      $tablename = $tableRow['homeid'];
      if ($count % 3 === 0) {
        echo '<div class="image_row">';
    }

      // Query to select the first record from the current table
      $sql = "SELECT * FROM $tablename LIMIT 1";
      $result = mysqli_query($conn, $sql);
 
      if ($result && mysqli_num_rows($result) > 0) {
        
        $row = mysqli_fetch_assoc($result);
        // Display the first record from the current table
        $name="";
        $img=$row['image'];
        $img = base64_encode($img);
        $ext = pathinfo($name, PATHINFO_EXTENSION);
        $homeid = $tableRow['homeid'];
        echo '<a href="monitor.php?homeid=' . $homeid . '">';
        echo '<div class="image_cell"><img  class="image" src="data:image/' . $ext . ';base64,' . base64_encode($row['image']) . '" alt="Home">';
        echo '</a>';
        echo '<div class="content">Home </div>';//. $row['id'] . '</div>';
        echo '</div>';
        
        if (($count + 1) % 3 === 0 || mysqli_num_rows($result) === ($count + 1)) {
            echo '</div>'; // Close the row after every three cells or at the end
        }
    
        $count++;
    } else {
        echo "No records found in table $tablename";
    }
  }
  
  echo '</div>'; // Close the image_container div after the loop
  mysqli_free_result($tablesResult);
} else {
  echo "Error retrieving table names: " . mysqli_error($conn);
}




?>

 <button id="viewMoreButton">View More</button>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        const imageRows = document.querySelectorAll(".image_row");
        const viewMoreButton = document.getElementById("viewMoreButton");
        let visibleRows = 1; // Number of initially visible rows
        
        // Function to toggle visibility of rows
        function toggleRows() {
            for (let i = 0; i < imageRows.length; i++) {
                imageRows[i].style.display = i < visibleRows ? "flex" : "none";
                
            }
        }
        
        // Initially, display the first row
        toggleRows();
        
        viewMoreButton.addEventListener("click", function () {
            visibleRows += 1;
            toggleRows();
            
            // Hide the "View More" button when all rows are visible
            if (visibleRows >= imageRows.length) {
                viewMoreButton.style.display = "none";
            }
        });
    });
</script>

 <div  class="grey">
  
  <h2>FOLLOW</h2>
 <a href="https://www.facebook.com/profile.php?id=100072331284029" class="fa fa-facebook"></a>
<a href="https://twitter.com/CSiva811" class="fa fa-twitter"></a>
<a href="https://www.linkedin.com/in/siva-c-722147208/" class="fa fa-linkedin"></a>
<a href="https://www.youtube.com/channel/UClMKNVtWHQQ5x1K5-ECK9qg/featured" class="fa fa-youtube"></a>
<a href="https://www.instagram.com/csiva08/" class="fa fa-instagram"></a>

  </div>
    </body>
    </html>