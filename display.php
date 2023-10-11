<?php
 
//connect to mysql server with username password and database name
$connect = mysqli_connect("localhost", "siva", "", "hbm");
 
// Check connection
if ($connect === false) {
    die("Opps Unable to connect " . mysqli_connect_error());
}
 
// create query to select data
$sql = "SELECT * FROM images";
if ($result = mysqli_query($connect, $sql)) {
    if (mysqli_num_rows($result) > 0) {
        echo '<table border="1px">';
        echo "<tr>";
        echo "<th>Image</th>";
        echo "</tr>";
        while ($row = mysqli_fetch_array($result)) {
            echo "<tr>";
            $name="";
            $img=$row['img_data'];
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
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($connect);
}
 
// Close connection
mysqli_close($connect);
?>