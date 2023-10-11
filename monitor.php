<?php
include('session.php'); // Include the session check function
// Check if the session is active, if not, the user will be redirected to login.php
checkSession();
$homeId="";
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
if($role!="admin"){
if($status=="partial"){
$homeId=$homeid;
}
if($homeId===null){
   echo"You dont have projects";
}}




?>
<html>
  <head>
    <link rel="stylesheet" href="style.css">  
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">  
  <title>
    HBM
  </title>
  <style>

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
      <a href="inventory.php" class="right">INVENTORY</a>
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
  <button class="tablinks" onclick="openCity(event, 'Videos')">Videos</button>
  
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
 mysqli_close($conn);
 
 ?>
<?php if ($role == "worker"): ?>
 <div id="uploadimage">
        <form action="upload_image.php" method="POST" enctype="multipart/form-data">
            <label for="image" class="upload-label">
                <i class="fa fa-upload icon"></i>
            </label>
            <input type="file" name="image" id="image" accept="image/*" style="display: none;">
            <span id="file-name"></span>
            <button type="submit">Upload</button>
        </form>
    </div>
    <?php endif; ?>
    <button id="viewMoreButton">View More</button>
    <div id="imageModal" class="modal">
  <span class="close" id="closeModal">&times;</span>
  <img class="modal-content" id="enlargedImage">
</div>
<?php if ($role !== "admin"): ?>
<form method="post" action="quote.php">
 <button class="button" type="submit">submit</button>
 </form>
 <?php endif; ?>
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

<div id="Videos" class="tabcontent">
 
<div class="monitor_video">

<div class="main-video-monitor_video">
   <video src="vid-0.mp4" loop controls class="main-video"></video>
   <h3 class="main-vid-title">house flood animation</h3>
</div>

<div class="video-list-monitor_video">

   <div class="list active">
      <video src="vid-0.mp4" class="list-video"></video>
      <h3 class="list-title">house flood animation</h3>
   </div>

   <div class="list">
      <video src="vid-2.mp4" class="list-video"></video>
      <h3 class="list-title">zoombie walking animation</h3>
   </div>

   <div class="list">
      <video src="vid-3.mp4" class="list-video"></video>
      <h3 class="list-title">emoji falling animation</h3>
   </div>

   <div class="list">
      <video src="vid-4.mp4" class="list-video"></video>
      <h3 class="list-title">3D town animation</h3>
   </div>

   <div class="list">
      <video src="vid-5.mp4" class="list-video"></video>
      <h3 class="list-title">man chasing carrot animation</h3>
   </div>

   <div class="list">
      <video src="vid-6.mp4" class="list-video"></video>
      <h3 class="list-title">door hinge animation</h3>
   </div>

   <div class="list">
      <video src="vid-7.mp4" class="list-video"></video>
      <h3 class="list-title">poeple walking in town animation</h3>
   </div>

   <div class="list">
      <video src="vid-8.mp4" class="list-video"></video>
      <h3 class="list-title">knight chasing virus animation</h3>
   </div>

   <div class="list">
      <video src="vid-9.mp4" class="list-video"></video>
      <h3 class="list-title">3D helicopter animation</h3>
   </div>

</div>
  </div>
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