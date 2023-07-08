<?php

include 'includes/dbconnection.php';
session_start();

if (isset($_SESSION['bpmsuid']) && strlen($_SESSION['bpmsuid']) > 0) {
    header("Location: profile.php");
    exit();
}

if (isset($_POST['submit'])) {
    // Sanitize input
    $fname = clean_input($_POST['fname']);
    $lname = clean_input($_POST['lname']);
    $phone = clean_input($_POST['phone']);
    $email = clean_input($_POST['email']);
    $message = clean_input($_POST['message']);

    // Verify password and confirm password
    if ($_POST['password'] != $_POST['confirm_password']) {
        $er_message = "Passwords do not match.";
    } else {
        $pass = password_hash(clean_input($_POST['password']), PASSWORD_DEFAULT);

        // Check if data already exists in database
        $stmt = mysqli_prepare($con, "SELECT Email FROM tbluser WHERE Email = ?");
        mysqli_stmt_bind_param($stmt, "s", $email);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_store_result($stmt);
        if (mysqli_stmt_num_rows($stmt) > 0) {
            http_response_code(400);
            $er_message = "Email already exists. Please use a different email.";
        } else {
            // Check if an image file is uploaded
            if (isset($_FILES["image"]) && $_FILES["image"]["error"] != 4) {
                $image = $_FILES["image"];

                // Validate file size
                $max_size = 15 * 1024 * 1024;
                if ($image["size"] > $max_size) {
                    http_response_code(400);
                    die("File size should not exceed 15 MB.");
                }

                // Validate file type
                $allowed_types = array("jpg", "jpeg", "png", "gif", "pdf", "txt", "doc", "docx");
                $file_type = strtolower(pathinfo($image["name"], PATHINFO_EXTENSION));
                if (!in_array($file_type, $allowed_types)) {
                    http_response_code(400);
                    $er_message = "Invalid format. Only (jpg/jpeg/png/gif/pdf/txt/doc/docx) format allowed.";
                }

                // Upload file
                $new_image_name = $fname . "_" . $lname . "_" . time() . "." . $file_type;
                $upload_path = "uploads/" . $new_image_name;
                if (!move_uploaded_file($image["tmp_name"], $upload_path)) {
                    http_response_code(500);
                    $er_message = "Failed to upload file.";
                }
            } else {
                // No image file uploaded
                $new_image_name = "";
            }
            // Insert data into database
            $stmt = mysqli_prepare($con, "INSERT INTO tbluser (FirstName, LastName, MobileNumber, Email, Password, Message, filename) VALUES (?, ?, ?, ?, ?, ?, ?)");
            mysqli_stmt_bind_param($stmt, "sssssss", $fname, $lname, $phone, $email, $pass, $message, $new_image_name);
            if (mysqli_stmt_execute($stmt)) {
                http_response_code(200);
                $su_message = "successfully registered";
            } else {
                http_response_code(500);
                $er_message = "Something went wrong. Please try again.";
            }
        }
    }
}


function clean_input($input)
{
    $input = trim($input);
    $input = stripslashes($input);
    $input = htmlspecialchars($input);
    return $input;
}

?>





<!doctype html>
<html lang="sv">

<head>
    <title>Ema Ark redbyrå</title>
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <link rel="stylesheet" href="assets/css/style-starter.css">
    <link href="https://fonts.googleapis.com/css?family=Josefin+Slab:400,700,700i&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">
    <link rel="icon" href="./assets/images/logo.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />



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

<body class="page-index">

    <?php include_once 'includes/header.php'; ?>


    <div class="breadcrumbs d-flex align-items-center" style="background-image: url('assets/img/hero-bg.jpg');">
        <div class="container position-relative d-flex flex-column align-items-center">

            <h2>Bli Medlem</h2>


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
                                    <p class="para"><a href="tel:+44 99 555 42">+<?php echo $row['MobileNumber']; ?></a>
                                    </p>
                                </div>
                            </div>
                            <div class="cont-top margin-up">
                                <div class="cont-left text-center">
                                    <img src="https://img.icons8.com/sf-regular-filled/48/094067/secured-letter.png" />
                                </div>
                                <div class="cont-right">
                                    <h6>Email Us</h6>
                                    <p class="para"><a href="mailto:example@mail.com" class="mail"><?php echo $row['Email']; ?></a></p>
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

                    <div class="map-content-9 ">
                        <form method="post" enctype="multipart/form-data">


                            <?php if (isset($er_message)) : ?>
                                <p class="animate__animated animate__fadeInDown" style="background-color: red; color: white; padding: 10px; border-radius: 20px;">
                                    <?php echo $er_message; ?></p>
                            <?php endif; ?>

                            <?php if (isset($su_message)) : ?>
                                <p style="background-color: green; color: black;"><?php echo $su_message; ?></p>
                            <?php endif; ?>

                            <div class="form-group">
                                <!-- <label for="fname">First Name<span style="color: red;">*</span>:</label> -->
                                <input type="text" class="form-control" name="fname" id="fname" placeholder="Enter your first name" required>
                            </div>
                            <div class="form-group">
                                <!-- <label for="lname">Last Name<span style="color: red;">*</span>:</label> -->
                                <input type="text" class="form-control" name="lname" id="lname" placeholder="Enter your last name" required>
                            </div>
                            <div class="form-group">
                                <!-- <label for="phone">Phone<span style="color: red;">*</span>:</label> -->
                                <input type="tel" class="form-control" name="phone" id="phone" placeholder="Enter your phone number" required>
                            </div>
                            <div class="form-group">
                                <!-- <label for="email">Email<span style="color: red;">*</span>:</label> -->
                                <input type="email" class="form-control" name="email" id="email" placeholder="Enter your email address" required>
                            </div>
                            <div class="form-group">
                                <!-- <label for="password">Password<span style="color: red;">*</span>:</label> -->
                                <input type="password" class="form-control" name="password" id="password" placeholder="Enter your password" required>
                                <span id="password_error" style="color: red;"></span>
                            </div>
                            <div class="form-group">
                                <!-- <label for="confirm_password">Confirm Password<span style="color: red;">*</span>:</label> -->
                                <input type="password" class="form-control" name="confirm_password" id="confirm_password" placeholder="Confirm your password" required>
                                <span id="confirm_password_error" style="color: red;"></span>
                            </div>


                            <div class="form-group">
                                <!-- <label for="message">Message<span style="color: red;">*</span>:</label> -->
                                <textarea class="form-control" name="message" id="message" placeholder="Enter your message" required></textarea>
                            </div>
                            <div class="form-group">
                                <!-- <label for="image">Upload Image:</label> -->
                                <input type="file" class="form-control-file" name="image" id="image">
                            </div>
                            <button type="submit" class="btn btn-contact" name="submit">skicka</button>
                        </form>



                    </div>
                </div>
            </div>
        </div>

        <?php include_once 'includes/footer.php'; ?>
        <!-- move top -->
        <button onclick="topFunction()" id="movetop" title="Go to top">
            <span class="fa fa-long-arrow-up"></span>
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
        <script src="assets/js/jquery-3.3.1.min.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>


</body>

</html>