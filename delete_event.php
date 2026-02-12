<?php
// Connect to database
$conn = new mysqli("127.0.0.1:3307", "root", "", "club_event_management");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if delete request is submitted
if (isset($_POST['delete_events']) && !empty($_POST['delete'])) {
    $ids = implode(",", $_POST['delete']); // Convert array to comma-separated values

    // Delete selected events
    $sql = "DELETE FROM events WHERE id IN ($ids)";
    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Selected events deleted successfully!'); window.location.href='user_dashboard.php';</script>";
    } else {
        echo "Error deleting records: " . $conn->error;
    }
} else {
    echo "<script>alert('No events selected for deletion!'); window.location.href='user_dashboard.php';</script>";
}

// Close connection
$conn->close();
?>
