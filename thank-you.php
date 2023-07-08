<?php
session_start();
error_reporting(0);
include 'includes/dbconnection.php';
if (strlen($_SESSION['bpmsuid'] == 0)) {
    header('location:logout.php');
} else {

    ?>
<!doctype html>
<html lang="sv">

<head>
    <title>Ema-Ark redbyrå</title>
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <link rel="stylesheet" href="assets/css/style-starter.css">
    <link href="https://fonts.googleapis.com/css?family=Josefin+Slab:400,700,700i&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />

    <link rel="icon" href="./assets/img/favicon.ico">


    <!-- Favicons -->
    <link href="assets/img/favicon.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,600;1,700&family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Raleway:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
    <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="assets/css/main.css" rel="stylesheet">

</head>

<body id="home">


    <style>
    #preloader {
        height: 100vh;
        width: 100%;
        position: fixed;
        z-index: 1000;
        background: #e3f4fd url(./assets/images/load.gif) no-repeat center;
        background-size: 30%;
    }
    </style>

    <script>
    var loader = document.getElementById('preloader');

    window.addEventListener('load', function() {

        loader.style.display = "none";


    });
    </script>


    <?php include_once 'includes/header.php';?>
    <script src="assets/js/jquery-3.3.1.min.js"></script> <!-- Common jquery plugin -->
    <!--bootstrap working-->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- //bootstrap working-->
    <!-- disable body scroll which navbar is in active -->
    <!-- disable body scroll which navbar is in active -->
    <!-- breadcrumbs -->
    <section class="w3l-inner-banner-main">
        <div class="about-inner contact ">
            <div class="container">
                <div class="main-titles-head text-center">
                    <h3 class="header-name ">
                        Appointment Confirmation
                    </h3>
                </div>
            </div>
        </div>
        <div class="breadcrumbs-sub">
            <div class="container">
                <ul class="breadcrumbs-custom-path">
                    <li class="right-side propClone">
                        <a href="index.php" class="">Home <span class="" aria-hidden="true">></span></a>
                        <p>
                    </li>
                    <li class="active ">
                        Thank You
                    </li>
                </ul>
            </div>
        </div>
        </div>
    </section>
    <!-- breadcrumbs //-->
    <section class="w3l-contact-info-main" id="contact">
        <div class="contact-sec	">
            <div class="container">
                <div>
                    <h4 class="w3ls_head">Thank you for applying. Your Appointment no is
                        <?php echo $_SESSION['aptno']; ?> </h4>
                </div>
            </div>
        </div>
    </section>
    <?php include_once 'includes/footer.php';?>
    <!-- move top -->
    <button onclick="topFunction()" id="movetop" title="Go to top">
        <img loading="lazy" src="https://img.icons8.com/material-two-tone/34/null/circled-chevron-up.png" />
    </button>
    <!-- /move top -->
    <script src="https://kit.fontawesome.com/4824b5dc23.js" crossorigin="anonymous"></script>
    <script src="./script.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
      <!-- Vendor JS Files -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>
<?php }?>