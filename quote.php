<?php
session_start();
include('database.php');
$id=$_SESSION["userid"];
echo $id;
$sql="
SELECT homeid
FROM home
ORDER BY homeid DESC
LIMIT 1";
if ($result = mysqli_query($conn, $sql)) {
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_array($result)) {
            $homeid=$row["homeid"];}}}

            $input = $homeid;
            $number = intval(substr($input, 4)) + 1;
            $homenumber = substr($input, 0, 4) . $number;
            
            $sql="CREATE TABLE $homenumber (
                `image` longblob NOT NULL,
                `main_image` longblob NOT NULL
              ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;";
              if ($conn->query($sql) === TRUE) {
                echo "Table created successfully.";
            } else {
                echo "Error creating table: " . $conn->error;
            }
            $sql = "INSERT INTO home (`id`, `name`, `homeid`, `address`, `details`, `status`) VALUES ('$id', 'siva', '$homenumber', 'nothing', '10008001', 'quoted')";

            if ($conn->query($sql) === TRUE) {
                echo "Inserted successfully.";
            } else {
                echo "Error creating table: " . $conn->error;
            }
            
          ?>
          
