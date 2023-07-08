<?php
session_start();
error_reporting(0);
include 'includes/dbconnection.php';
error_reporting(0);

if (isset($_POST['submit'])) {
    $contactno = $_POST['contactno'];
    $email = $_POST['email'];
    $password = md5($_POST['newpassword']);
    $query = mysqli_query($con, "select ID from tbluser where  Email='$email' and MobileNumber='$contactno' ");

    $ret = mysqli_num_rows($query);
    if ($ret > 0) {
        $_SESSION['contactno'] = $contactno;
        $_SESSION['email'] = $email;
        $query1 = mysqli_query($con, "update tbluser set Password='$password'  where  Email='$email' && MobileNumber='$contactno' ");
        if ($query1) {
            echo "<script>alert('Password successfully changed');</script>";

        }

    } else {

        echo "<script>alert('Invalid Details. Please try again.');</script>";
    }
}
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
    <script src="assets/js/jquery-3.3.1.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <section class="w3l-inner-banner-main">
        <div class="about-inner contact ">
            <div class="container">
                <div class="glow"></div>
                <div class="glow2"></div>
                <div class="main-titles-head text-center">
                    <h3 class="header-name ">
                        Forgot Password
                    </h3>
                    <p class="tiltle-para ">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Hic fuga sit illo
                        modi aut aspernatur tempore laboriosam saepe dolores eveniet.</p>
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
                        Forgot Password
                    </li>
                </ul>
            </div>
        </div>
        </div>
    </section>
    <section class="w3l-contact-info-main" id="contact">
        <div class="contact-sec	">
            <div class="container">
                <div class="d-grid contact-view">
                    <div class="cont-details">
                        <?php
$ret = mysqli_query($con, "select * from tblpage where PageType='contactus' ");
$cnt = 1;
while ($row = mysqli_fetch_array($ret)) {

    ?>
                        <div class="cont-top">
                            <div class="cont-left text-center">
                                <img loading="lazy" src="https://img.icons8.com/ios-filled/50/1A1A1A/phone.png" />
                            </div>
                            <div class="cont-right">
                                <h6>Call Us</h6>
                                <p class="para"><a href="tel:+44 99 555 42">+<?php echo $row['MobileNumber']; ?></a></p>
                            </div>
                        </div>
                        <div class="cont-top margin-up">
                            <div class="cont-left text-center">
                                <img loading="lazy" src="https://img.icons8.com/ios-filled/50/1A1A1A/new-post.png" />
                            </div>
                            <div class="cont-right">
                                <h6>Email Us</h6>
                                <p class="para"><a href="mailto:saljaf@hotmail.com"
                                        class="mail"><?php echo $row['Email']; ?></a></p>
                            </div>
                        </div>
                        <div class="cont-top margin-up">
                            <div class="cont-left text-center">
                                <img loading="lazy" src="https://img.icons8.com/ios-filled/50/1A1A1A/address--v1.png" />
                            </div>
                            <div class="cont-right">
                                <h6>Address</h6>
                                <p class="para"> <?php echo $row['PageDescription']; ?></p>
                            </div>
                        </div>
                        <div class="cont-top margin-up">
                            <div class="cont-left text-center">
                                <img loading="lazy" src="https://img.icons8.com/ios-filled/50/1A1A1A/clock--v1.png" />
                            </div>
                            <div class="cont-right">
                                <h6>Time</h6>
                                <p class="para"> <?php echo $row['Timing']; ?></p>
                            </div>
                        </div>
                        <?php }?>
                    </div>
                    <div class="map-content-9 mt-lg-0 mt-4">
                        <h3 style="padding-bottom: 10px;">Reset your password and Fill below details</h3>
                        <form method="post">
                            <div>
                                <input type="text" class="form-control" name="email" placeholder="Enter your email"
                                    required="true">
                            </div>
                            <div style="padding-top: 30px;">
                                <input type="text" class="form-control" name="contactno" placeholder="Kontaktnummer"
                                    required="true" pattern="[0-9]+">
                            </div>
                            <div style="padding-top: 30px;">
                                <input type="password" class="form-control" id="newpassword" name="newpassword"
                                    placeholder="Nytt lösenord">
                            </div>
                            <div style="padding-top: 30px;">
                                <input type="password" class="form-control" id="confirmpassword" name="confirmpassword"
                                    placeholder="Bekräfta lösenord">
                            </div>
                            <div class="twice-two" style="padding-top: 30px;">
                                <a class="link--gray"
                                    style="color: #0f39f0; background-color: transparent; border-radius: 8px; padding: 5px; width: 220px; height: 50px; text-align: start; display: flex; justify-content: start; align-items: center;"
                                    href="signin.php" href="login.php">signin</a>
                            </div>
                            <button type="submit" class="btn btn-contact" style="float: left;"
                                name="submit">Reset</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php include_once 'includes/footer.php';?>
    <button onclick="topFunction()" id="movetop" title="Go to top">
        <img loading="lazy" src="https://img.icons8.com/material-two-tone/34/null/circled-chevron-up.png" />
    </button>
    <!-- /move top -->
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

</body>

</html>