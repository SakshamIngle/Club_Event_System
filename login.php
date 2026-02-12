<?php
session_start();
$servername = "127.0.0.1:3307";
$username = "root";  
$password = "";  
$databasename = "club_event_management";

$conn = mysqli_connect($servername, $username, $password, $databasename);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get form data
$email = $_POST['email'];
$password = $_POST['password'];

// Admin Login
if ($email === "saksham@gmail.com" && $password === "123") {
    $_SESSION['user'] = "Admin";
    $_SESSION['role'] = "admin";  // Store role in session
    echo "<script>alert('Admin Login Successful!'); window.location.href = 'user_dashboard.php';</script>";
    exit();
}

// Check user credentials from the database
$sql = "SELECT * FROM users WHERE email = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 1) {
    $row = $result->fetch_assoc();

    // Verify password
    if (password_verify($password, $row['password'])) {
        $_SESSION['user'] = $row['name'];
        $_SESSION['role'] = $row['role']; // Store role in session

        if ($row['role'] == 'student') {
            echo "<script>window.location.href = 'index.php';</script>";
            exit();
        } elseif ($row['role'] == 'team_member') {
            if ($row['approved'] == 1) {
                echo "<script>window.location.href = 'index.php';</script>";
                exit();
            } else {
                echo "<script>alert('Admin permission required to login.'); window.history.back();</script>";
                exit();
            }
        }
    } else {
        echo "<script>alert('Invalid Password!'); window.history.back();</script>";
    }
} else {
    echo "<script>alert('User not found! Please register first.'); window.history.back();</script>";
}

$stmt->close();
$conn->close();
?>
