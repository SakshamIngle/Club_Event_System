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

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $new_password = $_POST['new_password'];
    $confirm_password = $_POST['confirm_password'];

    // Check if passwords match
    if ($new_password !== $confirm_password) {
        echo "<script>alert('Passwords do not match!'); window.history.back();</script>";
        exit();
    }

    // Check if email exists
    $sql = "SELECT * FROM users WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $hashed_password = password_hash($new_password, PASSWORD_BCRYPT);

        // Update new password in database
        $update_sql = "UPDATE users SET password = ? WHERE email = ?";
        $update_stmt = $conn->prepare($update_sql);
        $update_stmt->bind_param("ss", $hashed_password, $email);
        $update_stmt->execute();

        echo "<script>alert('Your password has been reset successfully!'); window.location.href = 'login.html';</script>";
    } else {
        echo "<script>alert('Email not found! Please enter a valid email.'); window.history.back();</script>";
    }

    $stmt->close();
    $conn->close();
}
?>
