<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Database</title>
  <meta content="" name="description">
  <meta content="" name="keywords">
  
  <!-- icons -->
  <link href="assets/img/pes_logo.png" rel="icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Day
  * Updated: Jan 29 2024 with Bootstrap v5.3.2
  * Template URL: https://bootstrapmade.com/day-multipurpose-html-template-for-free/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
  <style>
        body {
            font-family: "Open Sans", sans-serif;
            background-color: #f4f4f4;
            text-align: center;
        }
        table {
            width: 80%;
            margin: auto;
            border-collapse: collapse;
            background: white;
        }
        th, td {
            padding: 10px;
            border: 1px solid #ddd;
        }
        #header .t1{
      color: #fff;
      font-size: 30px;
      margin: 0;
      padding: 0;
      line-height: 1;
      font-weight: 700;
      letter-spacing: 2px;
      text-transform: uppercase;
    }   
       h2{
        padding : 20px;
       }
        th {
            background: #cc1616;
            color: white;
        }
        button {
            padding: 10px 15px;
            background: green;
            color: white;
            border: none;
            cursor: pointer;
        }
        button:hover {
            background: darkgreen;
        }
    </style>
</head>
<body>

  <!-- ======= Top Bar ======= -->
  <section id="topbar" class="d-flex align-items-center">
    <div class="container d-flex justify-content-center justify-content-md-between">
      <div class="contact-info d-flex align-items-center">
        <i class="bi bi-envelope-fill"></i><a href="mailto:contact@example.com">saksham.ingle3177@gmail.com</a>
        <i class="bi bi-phone-fill phone-icon"></i> 9730860245
      </div>
      <div class="social-links d-none d-md-block">
        <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
        <a href="https://www.facebook.com/pesmoderncoepune/" class="facebook"><i class="bi bi-facebook"></i></a>
        <a href="https://www.instagram.com/mcoe_events/" class="instagram"><i class="bi bi-instagram"></i></a>
        <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></i></a>
      </div>
    </div>
  </section>

  <!-- ======= Header ======= -->
  <header id="header" class="d-flex align-items-center">
    <div class="container d-flex align-items-center justify-content-between">
    
      <h1 class="t1">Club Event Database</h1>
      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto active" href="index.php">Home</a></li>
          <li><a class="nav-link scrollto" href="logout.php">Logout</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav>
    </div>
  </header><!-- End Header -->


 <!-- ======= Team Members Approvals ======= -->
<h2>Admin - Approve Team Members</h2>
<form action="approve.php" method="POST">
    <table>
        <tr>
            <th>Select</th>
            <th>Name</th>
            <th>Email</th>
            <th>Role</th>
        </tr>
        
        <?php
        $conn = new mysqli("127.0.0.1:3307", "root", "", "club_event_management");

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "SELECT id, name, email, team_role FROM users WHERE role='team_member' AND approved=0";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td><input type='checkbox' name='approve[]' value='" . $row['id'] . "'></td>
                        <td>" . $row['name'] . "</td>
                        <td>" . $row['email'] . "</td>
                        <td>" . ucfirst($row['team_role']) . "</td>
                      </tr>";
            }
        } else {
            echo "<tr><td colspan='4'>No pending approvals</td></tr>";
        }

        ?>
    </table>
    <br>
    <button type="submit">Approve Selected</button>
</form>


<!-- ======= Event Approval ======= -->
<hr>
<h2>Pending Events for Approval</h2>
    <form action="approve_event.php" method="POST">
    <table border="1">
        <tr>
            <th>Image</th>
            <th>Title</th>
            <th>Description</th>
            <th>Link</th>
            <th>Added By</th>
            <th>Approve</th>
            <th>Not Approve</th>
        </tr>

        <?php
        $sql = "SELECT * FROM events WHERE approval = 0";
        $result = $conn->query($sql);

        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td><img src='" . $row['image'] . "' width='100'></td>";
            echo "<td>" . $row['title'] . "</td>";
            echo "<td>" . $row['description'] . "</td>";
            echo "<td><a href='" . $row['link'] . "' target='_blank'>View</a></td>";
            echo "<td>" . $row['team_member'] . "</td>";
            echo "<td><input type='checkbox' name='approve[]' value='" . $row['id'] . "'></td>";
            echo "<td><input type='checkbox' name='delete[]' value='" . $row['id'] . "'></td>";
            echo "</tr>";
        }
        ?>
    </table>
    <br>
    <button type="submit" name="approve_events">Approve Event</button>
    <button type="submit" name="delete_events">Not Approve (Delete)</button>
</form>


<!-- ======= User Details ======= -->
 <hr>
<h2>All Users</h2>
<form action="delete_users.php" method="POST">
    <table border="1">
        <tr>
            <th>Select</th>
            <th>Name</th>
            <th>Email</th>
            <th>Role</th>
            <th>Approved</th>
        </tr>

        <?php
        // Fetch all users from the database
        $sql = "SELECT * FROM users";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td><input type='checkbox' name='delete[]' value='" . $row['id'] . "'></td>";
                echo "<td>" . $row['name'] . "</td>";
                echo "<td>" . $row['email'] . "</td>";
                echo "<td>" . ucfirst($row['role']) . "</td>";
                echo "<td>" . ($row['approved'] ? "Yes" : "No") . "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='5'>No users found</td></tr>";
        }
        ?>
    </table>
    <br>
    <button type="submit" name="delete_users">Delete Selected Users</button>
</form>


<!-- ======= All Events ======= -->
<h2>All Events</h2>
<form action="delete_event.php" method="POST">
    <table border="1">
        <tr>
            <th>Select</th>
            <th>Image</th>
            <th>Title</th>
            <th>Description</th>
            <th>Link</th>
            <th>Added By</th>
        </tr>

        <?php
        // Fetch all events from the database
        $sql = "SELECT * FROM events";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td><input type='checkbox' name='delete[]' value='" . $row['id'] . "'></td>";
                echo "<td><img src='" . $row['image'] . "' width='100'></td>";
                echo "<td>" . $row['title'] . "</td>";
                echo "<td>" . $row['description'] . "</td>";
                echo "<td><a href='" . $row['link'] . "' target='_blank'>View</a></td>";
                echo "<td>" . $row['team_member'] . "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='6'>No events found</td></tr>";
        }
        ?>
    </table>
    <br>
    <button type="submit" name="delete_events">Delete Selected Events</button>
</form>

<!-- ======= Feedback Details ======= -->
 <hr>
<?php
$conn = new mysqli("127.0.0.1:3307", "root", "", "club_event_management");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM feedback ORDER BY submitted_at DESC";
$result = $conn->query($sql);

echo "<h2>Feedback Received</h2>";
echo "<table border='1'>";
echo "<tr><th>Name</th><th>Email</th><th>Subject</th><th>Message</th><th>Submitted At</th></tr>";

while ($row = $result->fetch_assoc()) {
    echo "<tr>";
    echo "<td>" . $row['name'] . "</td>";
    echo "<td>" . $row['email'] . "</td>";
    echo "<td>" . $row['subject'] . "</td>";
    echo "<td>" . $row['message'] . "</td>";
    echo "<td>" . $row['submitted_at'] . "</td>";
    echo "</tr>";
}

echo "</table>";
$conn->close();
?>

</body>
</html>

