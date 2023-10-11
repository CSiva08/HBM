<?php
include('session.php');
include('database.php');
checkSession();
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
table, th, td {
  border: 1px solid black;
  
  border-collapse:collapse;
  text-align:center;
      margin:100px auto;
}
tr{

}
th{
  font-size:25px;
  background-color:#86F3EE;
}
td{
  font-size:20px;
  
}
.button {
      background-color: #4CAF50; /* Green */
      border: none;
      color: white;
      margin:10px 0 0 0;
      padding: 15px 32px;
      text-align: center;
      text-decoration: none;
      display: inline-block;
      font-size: 16px;
      border-radius: 25px;
    }

    .custom-dropdown {
  position: relative;
  margin: 100px;
  width: 90%;
  height:10px;
}

.custom-dropdown-header {
  background-color: #333;
  color: white;
  padding: 10px;
  cursor: pointer;
  display: flex;
  justify-content: space-between;
  align-items: center;
}

.custom-arrow {
  font-size: 20px;
  transition: transform 0.2s;
}

.custom-dropdown-content {
  background-color: #fff;
  border: 1px solid #ccc;
  border-top: none;
  display: none;
  padding: 10px;
}

  </style>
  </head>
  <body>
    <div class="navbar">
      <b>
      <a href="" class="right">HOME</a>
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
      <a href="monitor.php" class="right">MONITER</a>
      <a href="" class="right">PAYMENTS</a>
      <a href="" class="right">ABOUT US</a>
      <a href="contact.html" class="right">CONTACT US</a>
      <div class="dropdown">
        <button class="dropbtn">
          <i class="fa fa-fw fa-user"></i><i class="fa fa-caret-down"></i>
        </button>
        <div class="dropdown-content">
          <a href="">PROFILE</a>
          <a href="logout.php">LOGOUT</a>
        </div>
      </div> 
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
      <?php if ($role!="admin"):?>
      <div>

        <?php
// Assuming you have a database connection established
// Fetch records from the database (replace with your SQL query)
$query = "SELECT * FROM home1001payment";
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) > 0) {
 
    echo '<table  style="width:90%; ">';
    echo'<tr >';
    echo '<th style="font-size:50px;" colspan="5"><b>Receipts</b></th>';
  echo'</tr>';
    echo '<tr  >';
    echo '  <th style="background-color:D9DEDD;" >RECEIPT NUMBER</th>';
    echo '  <th style="background-color:D9DEDD;">DATE</th>';
    echo '  <th style="background-color:D9DEDD;">PAYMENT DETAILS</th>';
    echo '  <th style="background-color:D9DEDD;">AMOUNT</th>';
    echo '  <th style="background-color:D9DEDD;">VIEW</th>';
    echo '</tr>';
          while ($row = mysqli_fetch_assoc($result)) {
            echo '<tr>';
            echo '<td >'.$row['id'].'</td>';
            echo '<td>'.$row['date'].'</td>';
            echo '<td>'.$row['details'].'</td>';
            echo '<td>'.$row['amount'].'</td>';
            echo '<td><button><i class="fa fa-search"></i></button></td>';
            echo '</tr>';
        }

        echo '</table>';
    } else {
        echo 'No records found.';
    }
    
    // Close the database connection
    mysqli_close($conn);
    ?>

        
        <table  style="width:50%; ">
          <tr >
            <td style="font-size:50px; background-color:#86F3EE" colspan="5"><b>Payments</b></td>
          </tr>
          <tr>
          <td>Customer Id</td>
          <td>cust1001</td>
          </tr>
          <tr>
            <td>Name</td>
            <td>Siva</td>
          </tr>
          <tr>
          <td>Payment Details</td>
          <td>Basement</td>
          </tr>
          <tr>
            <td>Deadline</td>
            <td >
            <input style="color:red;" type="date" name="date" placeholder="Deadline" required>
          </td>
          </tr>
          <tr>
          <td>Amount</td>
          <td>$
          <input type="text" name="amount" placeholder="Amount" required>
          </td>
          </tr>
          <tr><td colspan="2"><form method="post" action="details.php">
 <button class="button" type="submit">Request</button>
 </form></td></tr>
        </table>
      </div>

<?php else:?>
  <div class="custom-dropdown">
    <div class="custom-dropdown-header" id="custom-dropdown-header">
      <span>
        <table style="margin:0 0 0 0; width:100%;    color:white;">
          <tr style=" ">
            <td style="width:25%;  padding:0 70px; font-size:30px;">Home Id</td>
            <td style="width:25%; padding:0 90px; font-size:30px;">Customer Name</td>
            <td style="width:25%; padding:0 50px; font-size:30px;">Contractor Name</td>
            <td style="width:25%; padding:0 80px; font-size:30px;">Pending</td>
          </tr>
        </table>
      </span>
      <span class="custom-arrow" id="custom-arrow">&#9660;</span><!-- Down arrow -->
    </div>


    <div class="custom-dropdown-content" id="custom-dropdown-content">
      <table  style="width:90%; margin:10px;  ">
          <tr  >
            <th >RECEIPT NUMBER</th>
            <th>DATE</th>
            <th>PAYMENT DETAILS</th>
            <th>AMOUNT</th>
            <th>VIEW</th>
          </tr>
          <tr>
            <td >111111</td>
            <td>27-09-2023</td>
            <td>$20000</td>
            <td>Basement</td>
            <td><button><i class="fa fa-search"></i></button></td>
          </tr>
        </table>
    </div>
  </div>
  <?php endif ?>

  <script>
const customDropdownHeader = document.getElementById("custom-dropdown-header");
const customArrow = document.getElementById("custom-arrow");
const customDropdownContent = document.getElementById("custom-dropdown-content");

customDropdownHeader.addEventListener("click", () => {
  if (customDropdownContent.style.display === "block") {
    customDropdownContent.style.display = "none";
    customArrow.innerHTML = "&#9660;"; // Down arrow
  } else {
    customDropdownContent.style.display = "block";
    customArrow.innerHTML = "&#9650;"; // Up arrow
  }
});

</script>

    </body>
    </html>