<?php
session_start(); // Always at the top

// Database connection
$servername = "127.0.0.1:3307";
$username = "root";  
$password = "";  
$databasename = "club_event_management"; 

$conn = mysqli_connect($servername, $username, $password, $databasename);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Edit Page</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <link href="assets/img/pes_logo.png" rel="icon">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <link href="assets/css/style.css" rel="stylesheet">
<style>

 h2{
  color: #e40808;
  line-height: 20px;
  text-align: center;
 }
 
  @media (min-width: 1024px) {
    #d1 {
     margin-left: 150px;
     margin-right: 150px;
    }
  }
  @media (max-width: 800px) {
    #img-bg {
      background-attachment: fixed;
      height: 520px;
    }
  }
  @media (max-width: 800px) {
    #img-bg2 {
      background-attachment: fixed;
      height: 550px;
    }
  }
  
  @media (max-width: 768px) {
    #img-bg {
      text-align: center;
    }
  
    #img-bg .container {
      padding-top: 50px;
    }
  
    #img-bg h1 {
      font-size: 20px;
      line-height: 30px;
    }
  
    #hero h6 {
      font-size: 15px;
      line-height: 20px;
      margin-bottom: 30px;
    }
  }
  .register-container {
        background: white;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        width: 1000px;
        text-align: center;
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
    input, button {
        width: 20%;
        padding: 10px;
        margin: 8px 0;
        border: 1px solid #ccc;
        border-radius: 5px;
    }
    button{
      background:  #e82d2d;
      color:white;
    }
    textarea {
    width: 100%; 
    max-width: 100%; 
    min-width: 300px; 
    height: auto;
    min-height: 100px; 
    padding: 10px;
    resize: vertical; 
    box-sizing: border-box; 
}

  body { font-family: Arial, sans-serif; margin: 20px; }
        .form-container { max-width: 600px; margin: auto; padding: 20px; border: 1px solid #ccc; border-radius: 10px; background: #f9f9f9; }
        .form-group { margin-bottom: 15px; }
        button { margin: 10px 5px; padding: 10px; border: none; border-radius: 5px; cursor: pointer; }
        .add-btn { background: green; color: white; }
        .remove-btn { background: red; color: white; }
        .submit-btn { background: blue; color: white; }
        #generated-link { margin-top: 20px; font-weight: bold; }
        </style>
</head>

<body>

  <!-- ======= Top Bar ======= -->
  <div class="css-0">
    <div>
        <a class="chartbeat-section" name="home_top"></a>
    </div>
    </div>
  <section id="topbar" class="d-flex align-items-center">
    <div class="container d-flex justify-content-center justify-content-md-between">
      <div class="contact-info d-flex align-items-center">
        <i class="bi bi-envelope-fill"></i><a href="mailto:contact@example.com">saksham.ingle3177@gmail.com</a>
        <i class="bi bi-phone-fill phone-icon"></i>9730860245
      </div>
      <div class="social-links d-none d-md-block">
        <a href="#" class="facebook"><i class="bi bi-envelope-fill"></i></a>
        <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
        <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></i></a>
      </div>
    </div>
  </section>

  <!-- ======= Header ======= -->
  
  <header id="header" class="d-flex align-items-center">
    <div class="container d-flex align-items-center justify-content-between">
     
      <h1 class="logo"><a href="#">Edit Page</a></h1>
      
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

     
      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto " href="index.php">Home</a></li>
        </ul>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->

  <main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
      <div class="container">

        <ol>
          <li><a href="index.php">Home</a></li>
          <li><a href="#health_care">Edit</a></li>
        </ol>
      </div>
    </section><!-- End Breadcrumbs -->

  </main><!-- End #main -->

    <section id="contact" class="contact">
  <div class="container register-container">
      <div class="register-box">
          <div class="section-title">
              <span>Add Event</span>
              <h2>Add Event</h2>
          </div>
          <form id="registerForm" action="save_event.php" method="POST" enctype="multipart/form-data">
              <div class="form-group mt-3">
                  <input type="text" name="title" class="form-control" id="title" placeholder="Title" required>
              </div>
              <div class="form-group mt-3">
                <textarea id="description" name="description" class="form-control" rows="4" placeholder="Description"></textarea>
              </div>

              <div class="form-group mt-3">
                <input type="url" class="form-control" placeholder="Event Link" name="link">
            </div> 
              <div class="form-group mt-3">
                <label>Upload Event Image</label>
                <input type="file" class="form-control" name="image" id="image" placeholder="select image" required>
            </div>
              <div class="text-center"><button type="submit" style="font-family: 'Raleway', sans-serif; text-transform: uppercase;font-weight: 500; font-size: 14px; letter-spacing: 1px; display: inline-block;
              ">Register</button></div>
          </form>
      </div>
  </div>
</section>
      
    <!-- ======= Footer ======= -->
    <footer id="footer">
      <div class="container">
        <div class="copyright">
          &copy; <strong><span>2025</span></strong>. All Rights Reserved
        </div>
        <div class="credits">
          <!-- All the links in the footer should remain intact. -->
          <!-- You can delete the links only if you purchased the pro version. -->
          <!-- Licensing information: https://bootstrapmade.com/license/ -->
          <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/day-multipurpose-html-template-for-free/ -->
          Designed by Saksham Ingle, Dhananjay Bankar, Shifa Ahmed, Dhanashri Karad, Ayesha Khan.
        </div>
      </div>
    </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>