<?php
session_start();
if (!isset($_SESSION['user'])) {
    echo "<script>alert('Session expired! Please log in again.'); window.location.href = 'login.html';</script>";
    exit();
}$role = $_SESSION['role'] ?? '';
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Explore Club Events</title>
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
  <style>
        .disabled-button {
            pointer-events: none;
            opacity: 0.5;
        }
        .btn-image {
            background-color:rgb(168, 177, 168); /* Green background */
            border: none;
            padding: 10px;
            border-radius: 60%; /* Fully rounded button */
            width: 30px;
            height: 30px;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: transform 0.2s;
        }
        .btn-image:hover {
            transform: scale(1.1);
        }
        .btn-image img {
            width: 30px;
            height: 30px;
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
    
      <h1 class="logo"><a href="index.php">Explore the Club Events</a></h1>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
          <li><a class="nav-link scrollto" href="#about">About</a></li>
          <li><a class="nav-link scrollto" href="events.php">Events</a></li>
          <li><a class="nav-link scrollto" href="team.html">Teams</a></li>
          <li><a class="nav-link scrollto" href="#admin">Admins</a></li>
          <li><a class="nav-link scrollto" href="#contact">Contact</a></li>
          <li><a class="nav-link scrollto" href="#feedback">Feedback</a></li>
          <li><a class="nav-link scrollto" href="logout.php">Logout</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
        <button id="editButton" class="btn-image" onclick="window.location.href='edit_page.php';" <?php echo ($role === 'student') ? 'disabled' : ''; ?>><img src="assets/img/edit_btn.png"></button>
      </nav><!-- .navbar -->
      

    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center">
    <div class="container position-relative" data-aos="fade-up" data-aos-delay="500">
      <h1>Your Go-To Platform for Club Events</h1>
      <h2>Stay updated, stay engaged, and never miss a club event again!</h2>
      <a href="#about" class="btn-get-started scrollto">Get Started</a>
    </div>
  </section><!-- End Hero -->

  <main id="main">

    <!-- ======= About Section ======= -->
    <section id="about" class="about">
      <div class="container">

        <div class="row">
          <div class="col-lg-6 order-1 order-lg-2" data-aos="fade-left">
            <img src="assets/img/about.jpg" class="img-fluid" alt="">
          </div>
          <div class="col-lg-6 pt-4 pt-lg-0 order-2 order-lg-1 content" data-aos="fade-right">
            <h3>EXPLORE THE CLUB EVENTS</h3>
            <p class="fst-italic">
              Our Club Event Management System is designed to simplify and enhance the way clubs organize and manage their events. Whether it’s a technical workshop, a cultural fest, or a networking session, our platform ensures seamless event coordination and participation.
            </p>
            <b><h4>Why Choose Our System?</h4></b>
            <ul>
              <li><i class="bi bi-check-circle"></i> Effortless Event Management – Plan, schedule, and promote club events with ease.</li>
              <li><i class="bi bi-check-circle"></i> Seamless Registration – Allow students to register and participate conveniently.</li>
              <li><i class="bi bi-check-circle"></i> Real-Time Notifications – Get instant updates on upcoming events and changes.</li>
            </ul>
            <p>
              We believe in making event organization more efficient and engaging, helping clubs focus on what truly matters – bringing people together for meaningful experiences!
            </p>
          </div>
        </div>

      </div>
    </section><!-- End About Section -->

    <!-- ======= Why Us Section ======= -->
    <section id="why-us" class="why-us">
      <div class="container">

        <div class="row">

          <div class="col-lg-4" data-aos="fade-up">
            <div class="box">
              <span>01</span>
              <h4>Networking Opportunities</h4>
              <p>Club events bring like-minded people together, helping build valuable personal and professional connections.</p>
            </div>
          </div>

          <div class="col-lg-4 mt-4 mt-lg-0" data-aos="fade-up" data-aos-delay="150">
            <div class="box">
              <span>02</span>
              <h4>Skill Development</h4>
              <p>They provide a platform to learn leadership, teamwork, and organizational skills through active participation.</p>
            </div>
          </div>

          <div class="col-lg-4 mt-4 mt-lg-0" data-aos="fade-up" data-aos-delay="300">
            <div class="box">
              <span>03</span>
              <h4>Fun & Engagement</h4>
              <p>These events offer entertainment, creativity, and a break from routine, making student life more enjoyable.</p>
            </div>
          </div>

        </div>

      </div>
    </section><!-- End Why Us Section -->

   

    <!-- ======= Cta Section ======= -->
    <section id="cta" class="cta">
      <div class="container" data-aos="zoom-in">

        <div class="text-center">
          <h3>Discover Exciting Club Events</h3>
          <p> Stay updated with the latest club events and exciting activities. Join us to connect, learn, and create unforgettable experiences!</p>
          <a class="cta-btn" href="events.php">Explore Now</a>
        </div>

      </div>
    </section><!-- End Cta Section -->


    <!-- ======= Admin Section ======= -->
    <section id="admin" class="admin">
      <div class="container">

        <div class="section-title">
          <span>Admins</span>
          <h2>Admins</h2>
          <p>Meet the admins who manage and organize club events seamlessly!</p>
        </div>

        <div class="row">
            
          <div class="row justify-content-center">
          <div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="zoom-in">
            <div class="member">
              <img src="assets/img/team/saksham.jpg" alt="">
              <h4>Saksham M. Ingle</h4>
              <span>SE Computer Engineering</span>
              <p> Progressive Education Society's Modern College Of Engineering, Pune.
              </p>
              </div>
            </div>
          </div>
          
        </div>

      </div>
    </section><!-- End Admin Section -->

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
      <div class="container">

        <div class="section-title">
          <span>Contact</span>
          <h2>Contact</h2>
          <p>Have questions or need assistance? Reach out to us! We're here to help with event inquiries, collaborations, and more.</p>
        </div>

        <div class="row" data-aos="fade-up">
          <div class="col-lg-6">
            <div class="info-box mb-4">
              <i class="bx bx-map"></i>
              <h3>Our Address</h3>
              <p>GRGW+F5J, 1186/A, Off J.M. Road, Shivaji nagar, Modern Engineering College Rd, Shivajinagar, Pune, Maharashtra 411005</p>
            </div>
          </div>

          <div class="col-lg-3 col-md-6">
            <div class="info-box  mb-4">
              <i class="bx bx-envelope"></i>
              <h3>Email Us</h3>
              <p>saksham.ingle3177@gmail.com</p>
            </div>
          </div>

          <div class="col-lg-3 col-md-6">
            <div class="info-box  mb-4">
              <i class="bx bx-phone-call"></i>
              <h3>Call Us</h3>
              <p>+91 9730860245</p>
            </div>
          </div>

        </div>
        
        <div class="row" data-aos="fade-up">

          <div class="col-lg-6 ">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3783.0598315749166!2d73.84392477496309!3d18.52619818256838!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3bc2c07e4111123b%3A0x3f92335c2e5c8400!2sP.E.S.%20Modern%20College%20of%20Engineering!5e0!3m2!1sen!2sin!4v1740223021534!5m2!1sen!2sin" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
          </div>
          </section><!--Feedback Form-->
         <section id="feedback" class="feedback">
         <div class="container register-container">
         <div class="register-box">
                  <div class="section-title">
              <span>Feedback</span>
              <h2>Feedback</h2>
          </div>
          <form  action="feedback.php" method="POST" class="php-feedback-form">
          <div class="row">
                <div class="col-md-6 form-group">
                  <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" required>
                </div>
                <div class="col-md-6 form-group mt-3 mt-md-0">
                  <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" required>
                </div>
              </div>
              <div class="form-group mt-3">
                <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" required>
              </div>
              <div class="form-group mt-3">
                <textarea class="form-control" name="message" rows="5" placeholder="Message" required></textarea>
              </div>
              <div><br></div>
              <div class="text-center"><button type="submit" style="font-family: 'Raleway', sans-serif; text-transform: uppercase;font-weight: 500; font-size: 14px; letter-spacing: 1px; display: inline-block; padding: 10px 28px; transition: 0.5s; margin-top: 10px;
                        border: 2px solid #fff;
                        color:rgb(255, 255, 255);
                        cursor: pointer;
                        background: #cc1616;">Send Feedback</button></div>
            </form>
            </div></div>
            </section>
   <!-- End Contact Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="container">
      <div class="copyright">
        &copy; <strong><span>2025</span></strong>. All Rights Reserved
      </div>
      <div class="credits">
       
        Designed by Saksham Ingle, Dhananjay Bankar, Payal Shinde.
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