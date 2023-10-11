<?php
include('session.php'); // Include the session check function
// Check if the session is active, if not, the user will be redirected to login.php
checkSession();
$homeId="home1001";
$homeid="";
include('database.php');
$role=$_SESSION["role"];
$id=$_SESSION["userid"];
if (isset($_GET['homeid'])) {
   $homeId = $_GET['homeid'];}
$sql = "SELECT homeid,status FROM home where id='$id'";
$result = mysqli_query($conn, $sql);
$status="partial";
while ($row = mysqli_fetch_array($result)) {
  $homeid=$row['homeid'];
             $status=$row['status'];
}
if($status=="partial"){
$homeId=$homeId;
}
if($homeId===null){
   echo"You dont have projects";
}

?>
<html>
  <head>
    <link rel="stylesheet" href="style.css">  
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">  
  <title>
    HBM
  </title>
  <style>
     h1{
    font-size:xxx-large;
  }

  table, th {
    
    margin-top:30px;
        }
        th, td {
          border:none;
            width:10%;
            text-align:left;
        }
        td.heading {
      background-color: #4AAEE3;
      padding: 20px 0;
      text-align: center;
    }
    select{
      font-size: 25px;
      padding:0 50px 0 50px;
    }
    input[type=text] {
      width: 60%;
      padding: 12px 20px;
      margin: 8px 0;
      box-sizing: border-box;
      font-size: 25px;
    }
.monitor_video{
   max-width: 1200px;
   margin:100px auto;
   display: flex;
   flex-wrap: wrap;
   align-items: flex-start;
   gap:20px;
}

.monitor_video .main-video-monitor_video{
   flex:1 1 700px;
   border-radius: 5px;
   box-shadow: 0 5px 15px rgba(0,0,0,.1);
   background-color: #fff;
   padding:15px;
}

.monitor_video .main-video-monitor_video .main-video{
   margin-bottom: 7px;
   border-radius: 5px;
   width: 100%;
}

.monitor_video .main-video-monitor_video .main-vid-title{
   font-size: 20px;
   color:#444;
}

.monitor_video .video-list-monitor_video{
   flex:1 1 350px;
   height: 485px;
   overflow-y: scroll;
   border-radius: 5px;
   box-shadow: 0 5px 15px rgba(0,0,0,.1);
   background-color: #fff;
   padding:15px;
}

.monitor_video .video-list-monitor_video::-webkit-scrollbar{
   width: 10px;
}

.monitor_video .video-list-monitor_video::-webkit-scrollbar-track{
   background-color: #fff;
   border-radius: 5px;
}

.monitor_video .video-list-monitor_video::-webkit-scrollbar-thumb{
   background-color: #444;
   border-radius: 5px;
}

.monitor_videoo .video-list-monitor_video .list{
   display: flex;
   align-items: center;
   gap:15px;
   padding:10px;
   background-color: #eee;
   cursor: pointer;
   border-radius: 5px;
   margin-bottom: 10px;
}

.monitor_video .video-list-monitor_video .list:last-child{
   margin-bottom: 0;
}

.monitor_video .video-list-monitor_video .list.active{
   background-color: #444;
}

.monitor_video .video-list-monitor_video .list.active .list-title{
   color:#fff;
}

.monitor_video .video-list-monitor_video .list .list-video{
   width: 100px;
   border-radius: 5px;
}

.monitor_video .video-list-monitor_video .list .list-title{
   font-size: 17px;
   color:#444;
}


@media (max-width:1200px){

.monitor_video{
   margin:0;
}

}

@media (max-width:450px){

.monitor_video .main-video-monitor_video .main-vid-title{
   font-size: 15px;
   text-align: center;
}

.monitor_video .video-list-monitor_video .list{
   flex-flow: column;
   gap:10px;
}

.monitor_video .video-list-monitor_video .list .list-video{
   width: 100%;
}

.monitor_video .video-list-monitor_video .list .list-title{
   font-size: 15px;
   text-align: center;
}

}
#uploadimage{
  width: 200px;
  height: 200px;
  background-color: red;
  margin:10px 0 10px 45%;
  align:center;
  font-size:100px;
}
/* CSS for modal */
.modal {
  display: none;
  position: fixed;
  z-index: 1;
  padding-top: 50px;
  left: 0;
  top: 0;
  width: 100%;
  height: 100%;
  background-color: rgba(0, 0, 0, 0.9);
}

.modal-content {
  margin: auto;
  display: block;
  max-width: 90%;
  max-height: 90%;
}

.close {
  position: absolute;
  top: 15px;
  right: 35px;
  font-size: 30px;
  cursor: pointer;
  color: white;
}
/* Style for previous and next buttons */
.prev, .next {
  cursor: pointer;
  position: absolute;
  top: 50%;
  width: auto;
  padding: 16px;
  margin-top: -22px;
  color: white;
  font-weight: bold;
  font-size: 24px;
  user-select: none;
  background-color: rgba(0, 0, 0, 0.8);
  border: 1px solid #ddd;
  border-radius: 5px;
}

.prev:hover, .next:hover {
  background-color: #555;
}


.button {
      background-color: #4CAF50; /* Green */
      border: none;
      color: white;
      margin:50px;
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
      <a href="" class="right">INVENTORY</a>
      <a href="contact.php" class="right">CONTACT US</a>
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
    </b>   
  </div>
  
  <div>
  
    <img class="slides" src="portfolio1.webp" style="height: 400px; width: 100%; ">
    <img class="slides" src="portfolio2.jpg" style="height: 400px; width: 100%;">
    <img class="slides" src="portfolio3.jpeg" style="height: 400px; width: 100%;">
    <img class="slides" src="portfolio4.jpeg" style="height: 400px  ; width: 100%;">
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
    <script>
      var role = "<?php echo $role; ?>";
      if(role=="customer"){
         document.getElementById("uploadimage").style.display="none";
      }
      </script>
  <!--
  <div class="grey">
   <div class="corner">-->
   <div class="grey">
   <div class="monitor_section">
<?php
try {
$sql = "SELECT image FROM $homeId LIMIT 1";
if ($result = mysqli_query($conn, $sql)) {
   if (mysqli_num_rows($result) > 0) {
       while ($row = mysqli_fetch_array($result)) {
           $img = $row['image'];
           $ext = pathinfo($img, PATHINFO_EXTENSION);
           echo '<img class="monitor_image" src="data:image/' . $ext . ';base64,' . base64_encode($img) . '">';
       }
   } else {
       echo "No images found.";
   }
} else {
   echo "Error: " . mysqli_error($conn); // Print any database query errors for debugging.
}}
catch(Exception $e){
   echo "";
}

?>

<div class="monitor_text"> <h1>Home details</h1></div>


  </div>
  </div>
  <div class="tab">
  <button class="tablinks" onclick="openCity(event, 'Images')" id="defaultOpen">Images</button>
  
  
</div>

<div id="Images" class="tabcontent">
<?php
  try{
 //conn to mysql server with username password and database name
 
  
 // Check connion
 if ($conn === false) {
     die("Opps Unable to conn " . mysqli_conn_error());
 }

 // create query to select data
 $sql = "
 SELECT *
FROM (
    SELECT image, ROW_NUMBER() OVER (ORDER BY image) AS rn
    FROM $homeId
) AS subquery
WHERE rn > 1";

 if ($result = mysqli_query($conn, $sql)) {
     if (mysqli_num_rows($result) > 0) {

         echo '<div class="image_container">';

         $count = 0; 
         while ($row = mysqli_fetch_array($result)) {
            // echo "<tr>";
             $name="";
             $img=$row['image'];
             $img = base64_encode($img);
             $ext = pathinfo($name, PATHINFO_EXTENSION);
             if ($count % 3 === 0) {
              echo '<div class="image_row">';
          }
          


          echo '<a href="data:image/' . $ext . ';base64,' . base64_encode($row['image']) . ' data-lightbox="image">';
          echo '<div class="image_cell"><img class="image" src="data:image/' . $ext . ';base64,' . base64_encode($row['image']) . '" alt="Home ">';
          echo '</a>';
          echo '</div>';

          if (($count + 1) % 3 === 0 || mysqli_num_rows($result) === ($count + 1)) {
              echo '</div>'; // Close the row after every three cells or at the end
          }
          
          $count++;
      }
      echo '</div>';
         mysqli_free_result($result);
     } else {
         echo "No records found";
     }
 } else {
     echo "you dont have projects";
 }
}
catch(Exception $e){
   echo "You dont have projects";
}
  
 // Close connion

 
 ?>

    <button id="viewMoreButton">View More</button>
    <div id="imageModal" class="modal">
  <span class="close" id="closeModal">&times;</span>
  <img class="modal-content" id="enlargedImage">
</div>


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

</div>

<script>
      let videoList = document.querySelectorAll('.video-list-monitor_video .list');

videoList.forEach(vid =>{
   vid.onclick = () =>{
      videoList.forEach(remove =>{remove.classList.remove('active')});
      vid.classList.add('active');
      let src = vid.querySelector('.list-video').src;
      let title = vid.querySelector('.list-title').innerHTML;
      document.querySelector('.main-video-monitor_video .main-video').src = src;
      document.querySelector('.main-video-monitor_video .main-video').play();
      document.querySelector('.main-video-monitor_video .main-vid-title').innerHTML = title;
   };
}); 
    </script>
<script>
function openCity(evt, cityName) {
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }
  document.getElementById(cityName).style.display = "block";
  evt.currentTarget.className += " active";
}

// Get the element with id="defaultOpen" and click on it
document.getElementById("defaultOpen").click();
// JavaScript to handle image click and modal display
var modal = document.getElementById("imageModal");
var closeModal = document.getElementById("closeModal");

// Function to open modal with the clicked image
function openModal(imgSrc) {
  var enlargedImage = document.getElementById("enlargedImage");
  enlargedImage.src = imgSrc;
  modal.style.display = "block";
}

// Function to close the modal
closeModal.onclick = function () {
  modal.style.display = "none";
};

// Attach a click event to each image
var images = document.querySelectorAll(".image");
images.forEach(function (img) {
  img.addEventListener("click", function () {
    openModal(this.src);
  });
});

</script>
   





  <?php
 /*
 //conn to mysql server with username password and database name
 $conn = mysqli_conn("localhost", "siva", "", "hbm");
  
 // Check connion
 if ($conn === false) {
     die("Opps Unable to conn " . mysqli_conn_error());
 }
  
 // create query to select data
 $sql = "SELECT * FROM images";
 if ($result = mysqli_query($conn, $sql)) {
     if (mysqli_num_rows($result) > 0) {
         echo '<table border="1px">';
         echo "<tr>";
         echo "<th>HOME IMAGES</th>";
         echo "</tr>";
         while ($row = mysqli_fetch_array($result)) {
             echo "<tr>";
             $name="";
             $img=$row['image'];
             $img = base64_encode($img);
             $ext = pathinfo($name, PATHINFO_EXTENSION);
             echo "<td>" ."<img src='data:image/".$ext.";base64,".$img."'>". "</td>";
             echo "</tr>";
             
         }
         echo "</table>";
         // Free result set
         mysqli_free_result($result);
     } else {
         echo "No records found";
     }
 } else {
     echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
 }
  
 // Close connion
 mysqli_close($conn);
 */
 ?>
 <!--
  </div>
</div>-->

<table class="heading" style="margin-left: 40px; width: 90%;">
  <tr>
    <td style="background-color: #4AAEE3; width: 90%;  text-align:center; padding: 20px;">
      <h1>Home Inventory List</h1>
    </td>
    <td style="width: 10%; text-align: center;">
      <img src='inventory_icon.png' width="100px" height="100px">
    </td>
  </tr>
</table>



<table style="margin-left:40px; width:90%;">
  <tr style="font-size:25px">
    <td style="background-color:#BDF386; text-align:center; padding: 20px;0 0 0" colspan="2"><h2>Person Details</h2></td>
    <td style="background-color:#86F3EE; text-align:center; padding: 20px;0 0 0" colspan="2"><h2>Contractor Details</h2></td>
  </tr>
  <tr style="font-size:20px;">
    <td><h2>Name</h2></td>
    <td>C.Siva</td>
    <td><h2>Name</h2></td>
    <td>G.Chandran</td>
  </tr>
  <tr style="font-size:20px;">
    <td><h2>Ph_No</h2></td>
    <td>6302287578</td>
    <td><h2>Ph_No</h2></td>
    <td>9989652417</td>
  </tr>
  <tr style="font-size:20px;">
    <td><h2>Email</h2></td>
    <td>sivaparthiban001</td>
    <td><h2>Email</h2></td>
    <td>sivachandran8111</td>
  </tr>
  <tr style="font-size:20px;">
    <td><h2>Address</h2></td>
    <td>1-71, papasamudram, gudipala, chittoor</td>
    <td><h2>Address</h2></td>
    <td>1-71, papasamudram, gudipala, chittoor</td>
  </tr>
</table>

<table style="margin-left:40px; width:90%;">
<tr style="font-size:25px">
    <td style="background-color:#86F3EE; text-align:center; width:50%; padding: 20px;0 0 0" colspan="2"><h2>Inventory Checklist</h2></td>
    <td style="background-color:#BDF386; text-align:center; width:50%; padding: 20px;0 0 0" colspan="2"><h2></h2></td>
  </tr>
  
</table>
<?php
// Assuming you have a database connection established
$inventoryid=$homeId."inventory";
// Fetch records from the database (replace with your SQL query)
$query = "SELECT * FROM $inventoryid";
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) > 0) {
    echo '<table style="margin-left:40px; width:90%;">';
    echo '<tr style="font-size:30px; background-color:D9DEDD;">';
    echo '<th>Item</th>';
    echo '<th>Status</th>';
    echo '<th>Vendor</th>';
    echo '<th>Category</th>';
    echo '<th>Unit Price</th>';
    echo '<th>Quantity</th>';
    echo '<th>Total Price</th>';
    echo '</tr>';

    while ($row = mysqli_fetch_assoc($result)) {
        echo '<tr style="font-size:25px; background-color:F5F9F8;">';
        echo '<td>' . $row['item'] . '</td>';
        echo '<td>' . $row['status'] . '</td>';
        echo '<td>' . $row['vendor'] . '</td>';
        echo '<td>' . $row['category'] . '</td>';
        echo '<td>$' . $row['unit'] . '</td>';
        echo '<td>' . $row['quantity'] . '</td>';
        echo '<td>$' . $row['total'] . '</td>';
        echo '</tr>';
    }

    echo '</table>';
} else {
    echo 'No records found.';
}

if($role=="worker"){
  echo'<div style="background-color: #3498db; margin:100px auto;border-radius:20px; width:50%;">';
  echo'<br>';
  echo'<h1><label style="background-color:#BDF386; text-align:center; border-radius:20px; padding:10px;">Add Inventory List</label></h1>';
  echo'<table style="text-align:center; font-size:35px; width:100%; margin:10px 0 0 100px;">';
  echo'<tr>';
  echo'<td><label for="item">Item</label></td>';
  echo'<td><select name="item">';
  echo'<option value="brick">Bricks</option>';
  echo'<option value="brick">Bricks</option>';
  echo'</select></td>';
  echo'</tr>';
  echo'<tr>';
  echo'<td><label for="status">Status</label></td>';
  echo'<td><select name="status">';
  echo'<option value="Runninglow">Running Low</option>';
  echo'<option value="Suffient">Suffient</option>';
  echo'</select></td>';
  echo'</tr>';
  echo'<td><label for="vendor">Vendor</label></td>';
  echo'<td><input type="text" name="vendor" placeholder="vendor" required></td>';
  echo'<tr>';
  echo'<td><label for="category">Category</label></td>';
  echo'<td><select name="category">';
  echo'<option value="wall">Wall</option>';
  echo'<option value="Painting">Painting</option>';
  echo'</select></td>';
  echo'</tr>';
  echo'</table>';
  echo'<form method="post" action="quote.php">
  <button class="button" type="submit">submit</button>
  </form>';
  echo'</div>';
}


// Close the database connection
mysqli_close($conn);
?>

 <!--


<table style="margin-left:40px; width:90%;">
<tr >
    <td style="background-color:#86F3EE; text-align:center; width:50%; padding: 20px;0 0 0" colspan="2"><h2>Inventory Checklist</h2></td>
    <td style="background-color:#BDF386; text-align:center; width:50%; padding: 20px;0 0 0" colspan="2"><h2></h2></td>
  </tr>
  
</table>
<table style="margin-left:40px; width:90%;  ">
        <tr style="font-size:30px;">
            <th>Item</th>
            <th>Status</th>
            <th>Vendor</th>
            <th>Category</th>
            <th>Unit Price</th>
            <th>Quantity</th>
            <th>Total Price</th>
        </tr>
        <tr>
            <td>Bricks</td>
            <td>Running Low	</td>
            <td>chandran	</td>
            <td>wall	</td>
            <td>$50.00	</td>
            <td>50</td>
            <td>$2,500.00	</td>

            	
        </tr>
    </table>
-->
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