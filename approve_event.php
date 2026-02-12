<?php
session_start();

$servername = "127.0.0.1:3307";
$username = "root";  
$password = "";  
$databasename = "club_event_management"; 

$conn = mysqli_connect($servername, $username, $password, $databasename);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Approve Selected Events
if (isset($_POST['approve_events']) && isset($_POST['approve'])) {
    foreach ($_POST['approve'] as $event_id) {
        $sql = "UPDATE events SET approval = 1 WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $event_id);
        $stmt->execute();
    }
    echo "<script>alert('Selected events approved successfully!'); window.location.href='user_dashboard.php';</script>";
}

// Delete Selected Events
if (isset($_POST['delete_events']) && isset($_POST['delete'])) {
    foreach ($_POST['delete'] as $event_id) {
        // Fetch image path to delete file
        $query = "SELECT image FROM events WHERE id = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("i", $event_id);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();

        // Delete image file from server
        if (!empty($row['image']) && file_exists($row['image'])) {
            unlink($row['image']);
        }

        // Delete event from database
        $sql = "DELETE FROM events WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $event_id);
        $stmt->execute();
    }
    echo "<script>alert('Selected events deleted successfully!'); window.location.href='user_dashboard.php';</script>";
}

$conn->close();
?>
