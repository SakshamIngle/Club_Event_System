<?php
$conn = new mysqli("127.0.0.1:3307", "root", "", "club_event_management");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST['approve'])) {
    foreach ($_POST['approve'] as $id) {
        $sql = "UPDATE users SET approved=1 WHERE id=$id";
        $conn->query($sql);
    }
}

$conn->close();
header("Location: user_dashboard.php");
exit();
?>

