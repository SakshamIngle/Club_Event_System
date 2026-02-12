<?php
$servername = "127.0.0.1:3307";
$username = "root";  
$password = "";  
$databasename = "club_event_management";

// Database connection
$conn = new mysqli($servername, $username, $password, $databasename);
if ($conn->connect_error) {
    die("Database Connection Failed: " . $conn->connect_error);
}

// Get form data
$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];  
$role = $_POST['role'];
$teamRole = isset($_POST['teamRole']) ? $_POST['teamRole'] : NULL;

// **Check if email or name already exists**
$checkQuery = "SELECT name, email FROM users WHERE email = ? OR name = ?";
$stmt = $conn->prepare($checkQuery);
$stmt->bind_param("ss", $email, $name);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $existingUser = $result->fetch_assoc();
    
    if ($existingUser['email'] === $email) {
        echo "<script>alert('Email already exists! Please use a different email.'); window.location.href = 'register.html';</script>";
    } elseif ($existingUser['name'] === $name) {
        echo "<script>alert('Name already exists! Please use a different name.'); window.location.href = 'register.html';</script>";
    }
    exit(); // **Stops execution if email or name exists**
}

// **Hash the password securely**
$hashedPassword = password_hash($password, PASSWORD_DEFAULT);

// Insert new user
$sql = "INSERT INTO users (name, email, password, role, team_role) VALUES (?, ?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sssss", $name, $email, $hashedPassword, $role, $teamRole);

if ($stmt->execute()) {
    echo "<script>alert('Registration Successful! Redirecting to Login...'); window.location.href = 'login.html';</script>";
} else {
    echo "<script>alert('Error: Could not register user. Please try again.'); window.location.href = 'register.html';</script>";
}

$stmt->close();
$conn->close();
?>
