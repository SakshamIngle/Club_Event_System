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

// Ensure user is logged in
if (!isset($_SESSION['user'])) {
    echo "<script>alert('Please log in first!'); window.location.href='login.php';</script>";
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $team_member = $_SESSION['user']; // Logged-in user name
    $title = $_POST['title'];
    $description = $_POST['description'];
    $link = $_POST['link'];

    // Image Upload Handling
    $target_dir = "uploads/";

    // Check if 'uploads/' directory exists, if not, create it
    if (!is_dir($target_dir)) {
        mkdir($target_dir, 0777, true);
    }

    $target_file = $target_dir . basename($_FILES["image"]["name"]);

    if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
        // Insert event with approval = 0 (not approved yet)
        $sql = "INSERT INTO events (team_member, image, title, description, link, approval) 
                VALUES (?, ?, ?, ?, ?, 0)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssss", $team_member, $target_file, $title, $description, $link);
        
        if ($stmt->execute()) {
            echo "<script>alert('Event added successfully! Waiting for approval.'); window.location.href='edit_page.php';</script>";
        } else {
            echo "Error: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "<script>alert('Image upload failed! Check folder permissions.'); window.location.href='edit_page.php';</script>";
    }
}

$conn->close();
?>
