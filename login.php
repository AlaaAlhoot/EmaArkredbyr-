<?php

include 'includes/dbconnection.php';
session_start();

if (isset($_SESSION['bpmsuid']) && strlen($_SESSION['bpmsuid']) > 0) {
    header("Location: profile.php");
    exit();
}

if (isset($_POST['login'])) {
    $email = mysqli_real_escape_string($con, $_POST['emailcont']);
    $password = mysqli_real_escape_string($con, $_POST['password']);

    $query = mysqli_prepare($con, "SELECT ID, Password, IsRead FROM tbluser WHERE Email=?");
    mysqli_stmt_bind_param($query, 's', $email);
    mysqli_stmt_execute($query);
    $result = mysqli_stmt_get_result($query);
    $ret = mysqli_fetch_array($result);

    if ($ret && password_verify($password, $ret['Password'])) {
        if ($ret['IsRead'] == '1') {
            $_SESSION['bpmsuid'] = $ret['ID'];
            header('location:profile.php');
            exit();
        } else {
            $er_message = 'Waiting for the administrator to approve your request';
        }
    } else {
        $er_message = 'Invalid email or password';
    }
}
?>
<!doctype html>
<html lang="sv">

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
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,600;1,700&family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Raleway:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">

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
    <?php include_once 'includes/header.php'; ?>



    <script src="assets/js/jquery-3.3.1.min.js"></script> <!-- Common jquery plugin -->
    <!--bootstrap working-->
    <script src="assets/js/bootstrap.min.js"></script>
    <div class="breadcrumbs d-flex align-items-center" style="background-image: url('assets/img/hero-bg.jpg');">
        <div class="container position-relative d-flex flex-column align-items-center">

            <h2>Login</h2>


        </div>
    </div>
    <div class="w3l-contact-info-main" id="contact">
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
                                    <img src="https://img.icons8.com/external-smashingstocks-glyph-smashing-stocks/100/094067/external-contact-us-shopping-and-commerce-smashingstocks-glyph-smashing-stocks.png" />
                                </div>
                                <div class="cont-right">
                                    <h6>Call Us</h6>
                                    <p class="para"><a href="tel:+44 99 555 42">+<?php echo $row['MobileNumber']; ?></a></p>
                                </div>
                            </div>
                            <div class="cont-top margin-up">
                                <div class="cont-left text-center">
                                    <img src="https://img.icons8.com/sf-regular-filled/48/094067/secured-letter.png" />
                                </div>
                                <div class="cont-right">
                                    <h6>Email Us</h6>
                                    <p class="para"><a href="mailto:saljaf@hotmail.com" class="mail"><?php echo $row['Email']; ?></a></p>
                                </div>
                            </div>
                            <div class="cont-top margin-up">
                                <div class="cont-left text-center">
                                    <img src="https://img.icons8.com/sf-regular-filled/48/094067/address.png" />
                                </div>
                                <div class="cont-right">
                                    <h6>Address</h6>
                                    <p class="para"> <?php echo $row['PageDescription']; ?></p>
                                </div>
                            </div>
                            <div class="cont-top margin-up">
                                <div class="cont-left text-center">
                                    <img src="https://img.icons8.com/sf-regular-filled/48/094067/clock.png" />
                                </div>
                                <div class="cont-right">
                                    <h6>Time</h6>
                                    <p class="para"> <?php echo $row['Timing']; ?></p>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                    <div class="map-content-9 mt-lg-0 mt-4">
                        <form method="post">
                            <?php if (isset($er_message)) : ?>
                                <p class="animate__animated animate__fadeInDown" style="background-color: red; color: white; padding: 10px; border-radius: 20px;">
                                    <?php echo $er_message; ?></p>
                            <?php endif; ?>

                            <div>
                                <input type="email" class="form-control" name="emailcont" required placeholder="Email">
                            </div>
                            <div style="padding-top: 30px;">
                                <input type="password" class="form-control" name="password" required placeholder="Lösenord">
                            </div>
                            <div class="twice-two" style="padding-top: 30px;">
                                <!-- <a class="link--gray"
            style="color: #0f39f0; background-color: transparent; border-radius: 8px; padding: 5px; width: 220px; height: 50px; text-align: start; display: flex; justify-content: start; align-items: center;"
            href="forgot-password.php">Forgot Password?</a> -->
                            </div>
                            <button type="submit" class="btn btn-contact" style="float: left;" name="login">Logga
                                in</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include_once 'includes/footer.php'; ?>
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

</body>

</html>