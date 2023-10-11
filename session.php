<?php
function checkSession() {
    session_start();
    if (!isset($_SESSION['session_id'])) {
        header("Location: login.php"); // Redirect to the login page
        exit();
    }
}
?>
