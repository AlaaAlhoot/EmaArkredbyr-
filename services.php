<?php
session_start();
error_reporting(0);
include 'includes/dbconnection.php';
?>
<!doctype html>
<html lang="sv" class="animate__animated animate__fadeIn ">

<head>
    <meta name="description" content="Ema-Ark redbyrå">
    <meta name="robots" content="Ema-Ark redbyrå, Ema-Ark, redbyrå">
    <meta name="google" content="Ema-Ark redbyrå">
    <meta name="keywords" content="Ema-Ark redbyrå, Ema-Ark, Ema-Ark redbyrå swiden, redbyrå">
    <meta name="theme-color" content="#094067">
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

<body class="page-index">
<?php include_once 'includes/header.php';?>




    <!-- disable body scroll which navbar is in active -->

    <div class="breadcrumbs d-flex align-items-center" style="background-image: url('assets/img/user-banner.png');">
      <div class="container position-relative d-flex flex-column align-items-center">

        <h2>Tjänster</h2>


      </div>
    </div>

    <div class="w3l-recent-work-hobbies">
        <div class="recent-work " style="background-color:#fefefe ;">
            <div class="container">
                <div class="row about-about">
                    <?php
$ret = mysqli_query($con, "select * from  tblservices");
$cnt = 1;
while ($row = mysqli_fetch_array($ret)) {

    ?>
                    <div class="col-lg-4 col-md-6 col-sm-6 propClone  widget-shadow" style="box-shadow: rgb(149 157 165 / 20%) 0px 8px 24px;
                     border-radius: 10px;
                     padding: 18px;  ">
                        <img loading="lazy" style="object-fit:cover;
                        border-radius: 10px;
                        " src="admin/images/<?php echo $row['Image'] ?>" alt="product" height="200" width="400"
                            class="img-responsive about-me"  style="display: flex;
  justify-content: center;">
                        <div class="about-grids ">
                            <br>
                            <h5 class="para"><?php echo $row['ServiceName']; ?></h5>
                            <p class="para "><?php echo $row['ServiceDescription']; ?> </p>
                            <p class="para " style="color: #9ed44a; font-weight: 500;"><span
                                    style="color: #000 !important;">Cost of Service:</span> $<?php echo $row['Cost']; ?>
                            </p>
                        </div>
                    </div>
                    <br><?php
$cnt = $cnt + 1;
}?>
                </div>
            </div>
        </div>
    </div>
    <?php include_once 'includes/footer.php';?>
    <!-- move top -->
    <button onclick="topFunction()" id="movetop" title="Go to top">
        <img loading="lazy" src="https://img.icons8.com/material-two-tone/34/null/circled-chevron-up.png" />
    </button>
    <script src="./script.js"></script>
    <script src="https://kit.fontawesome.com/4824b5dc23.js" crossorigin="anonymous"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
      <!-- Vendor JS Files -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>
  <script src="assets/js/jquery-3.3.1.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
</body>

</html>