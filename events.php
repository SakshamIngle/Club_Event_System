<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>EXPLORE CLUB EVENTS</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <link href="assets/img/pes_logo.png" rel="icon">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans|Raleway|Poppins" rel="stylesheet">

  <!-- Vendor CSS -->
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Main CSS -->
  <link href="assets/css/style.css" rel="stylesheet">

  <style>
    h2 {
      margin-bottom: 30px;
      margin-top: 40px;
      color: #cc1616;
      text-align: center;
      font-weight: 700;
    }

    .event-card {
      background: #fff;
      border-radius: 15px;
      overflow: hidden;
      box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
      margin: 15px;
      transition: transform 0.3s ease, box-shadow 0.3s ease;
      display: flex;
      flex-direction: column;
      height: 100%;
    }

    .event-card:hover {
      transform: scale(1.02);
      box-shadow: 0 16px 40px rgba(0, 0, 0, 0.15);
    }

    .event-image-large {
      width: 100%;
      height: 200px;
      object-fit: cover;
      display: block;
    }

    .event-content {
      padding: 20px;
      flex-grow: 1;
      display: flex;
      flex-direction: column;
      justify-content: space-between;
    }

    .event-content h3 {
      font-size: 22px;
      font-weight: 600;
      color: #333;
      margin-bottom: 12px;
      text-transform: capitalize;
    }

    .event-content p {
      font-size: 16px;
      color: #555;
      line-height: 1.6;
      margin-bottom: 20px;
    }

    .event-link {
      display: inline-block;
      padding: 10px 20px;
      background: #007bff;
      color: #fff;
      font-weight: 600;
      text-decoration: none;
      border-radius: 8px;
      transition: background 0.3s ease;
      box-shadow: 0 5px 15px rgba(0, 123, 255, 0.3);
      text-align: center;
    }

    .event-link:hover {
      background: #0056b3;
    }

    @media (max-width: 768px) {
      .event-content h3 {
        font-size: 20px;
      }

      .event-content p {
        font-size: 15px;
      }

      .event-image-large {
        height: 180px;
      }
    }
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
        <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
      </div>
    </div>
  </section>

  <!-- ======= Header ======= -->
  <header id="header" class="d-flex align-items-center">
    <div class="container d-flex align-items-center justify-content-between">
      <h1 class="logo"><a href="#">EXPLORE CLUB EVENTS</a></h1>
      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto" href="index.php">Home</a></li>
        </ul>
      </nav>
    </div>
  </header>

  <main id="main">
    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
      <div class="container">
        <ol>
          <li><a href="index.php">Home</a></li>
          <li>Events</li>
        </ol>
      </div>
    </section>

    <!-- ======= Events Section ======= -->
    <section class="container">
      <div class="row">
        <?php
        $conn = new mysqli("127.0.0.1:3307", "root", "", "club_event_management");

        if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
        }

        $sql = "SELECT * FROM events WHERE approval = 1";
        $result = $conn->query($sql);

        while ($row = $result->fetch_assoc()) {
          echo "<div class='col-md-6 col-lg-4 d-flex'>";
          echo "<div class='event-card'>";
          echo "<img src='" . $row['image'] . "' class='event-image-large' alt='Event Image'>";
          echo "<div class='event-content'>";
          echo "<h3>" . $row['title'] . "</h3>";
          echo "<p>" . $row['description'] . "</p>";
          echo "<a href='" . $row['link'] . "' target='_blank' class='event-link'>Participate</a>";
          echo "</div>";
          echo "</div>";
          echo "</div>";
        }

        $conn->close();
        ?>
      </div>
    </section>
  </main>

  <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="container">
      <div class="copyright">
        &copy; <strong><span>2025</span></strong>. All Rights Reserved
      </div>
      <div class="credits">
        Designed by Saksham Ingle, Dhananjay Bankar, Shifa Ahmed, Dhanashri Karad, Ayesha Khan.
      </div>
    </div>
  </footer>

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
  <div id="preloader"></div>

  <!-- Vendor JS -->
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Main JS -->
  <script src="assets/js/main.js"></script>

</body>

</html>
