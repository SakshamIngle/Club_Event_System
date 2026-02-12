<?php
$servername = "127.0.0.1:3307";
$username = "root";  // Default MySQL username
$password = "";  // Keep empty if no password is set
$databasename = "club_event_db";

$conn = mysqli_connect($servername,$username,$password,$databasename);

if (!$conn) {
    die("Database Connection Failed: " . $conn->connect_error);
}else{
    echo"connected";
}
?>
