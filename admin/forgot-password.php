<?php
session_start();
error_reporting(0);
include 'includes/dbconnection.php';

if (isset($_POST['submit'])) {
    $contactno = $_POST['contactno'];
    $email = $_POST['email'];

    $query = mysqli_query($con, "select ID from tbladmin where  Email='$email' and MobileNumber='$contactno' ");
    $ret = mysqli_fetch_array($query);
    if ($ret > 0) {
        $_SESSION['contactno'] = $contactno;
        $_SESSION['email'] = $email;
        header('location:reset-password.php');
    } else {
        $msg = "Invalid Details. Please try again.";
    }
}
?>
<!DOCTYPE HTML>
<html>

<head>
    <title>Forgot Page </title>
    <link rel="icon" type="png/jpg" href="../assets/images/logo.png">

    <script type="application/x-javascript">
        addEventListener("load", function() {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        }
    </script>
    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
    <!-- Custom CSS -->
    <link href="css/style.css" rel='stylesheet' type='text/css' />
    <!-- font CSS -->
    <!-- font-awesome icons -->
    <link href="css/font-awesome.css" rel="stylesheet">
    <!-- //font-awesome icons -->
    <!-- js-->
    <script src="js/jquery-1.11.1.min.js"></script>
    <script src="js/modernizr.custom.js"></script>
    <!--webfonts-->
    <link href='//fonts.googleapis.com/css?family=Roboto+Condensed:400,300,300italic,400italic,700,700italic' rel='stylesheet' type='text/css'>
    <!--//webfonts-->
    <!--animate-->
    <link href="css/animate.css" rel="stylesheet" type="text/css" media="all">
    <script src="js/wow.min.js"></script>
    <script>
        new WOW().init();
    </script>
    <!--//end-animate-->
    <!-- Metis Menu -->
    <script src="js/metisMenu.min.js"></script>
    <script src="js/custom.js"></script>
    <link href="css/custom.css" rel="stylesheet">
    <!--//Metis Menu -->
</head>

<body class="cbp-spmenu-push">

    <style>
        #preloader {
            height: 100vh;
            width: 100%;
            position: fixed;
            z-index: 1000;
            background: #e3f4fd url(../assets/images/load.gif) no-repeat center;
            background-size: 30%;
        }
    </style>

    <script>
        var loader = document.getElementById('preloader');

        window.addEventListener('load', function() {

            loader.style.display = "none";


        });
    </script>
    <div class="main-content">

        <!-- main content start-->
        <div style="background-color: linear-gradient(to bottom, hsl(236, 50%, 98%), hsl(236, 50%, 94%)); height:800px;">
            <div class="main-page login-page ">
                <h3 class="title1">Forgot Page</h3>
                <div class="widget-shadow">
                    <div class="login-top">
                        <h4>Welcome back to BPMS AdminPanel ! </h4>
                    </div>
                    <div class="login-body">
                        <form role="form" method="post" action="">
                            <p style="font-size:16px; color:#7FD1AE" align="center"> <?php if ($msg) {
                                                                                            echo $msg;
                                                                                        } ?> </p>
                            <input type="text" name="email" class="lock" placeholder="Email" required="true">

                            <input type="text" name="contactno" class="lock" placeholder="Mobile Number" required="true" maxlength="10" pattern="[0-9]+">

                            <input type="submit" name="submit" value="Reset">
                            <div class="forgot-grid">

                                <div class="forgot">
                                    <a href="index.php">Already have an account</a>
                                </div>
                                <div class="clearfix"> </div>
                            </div>
                        </form>
                    </div>
                </div>


            </div>
        </div>

    </div>
    <!-- Classie -->
    <script src="js/classie.js"></script>
    <script>
        var menuLeft = document.getElementById('cbp-spmenu-s1'),
            showLeftPush = document.getElementById('showLeftPush'),
            body = document.body;

        showLeftPush.onclick = function() {
            classie.toggle(this, 'active');
            classie.toggle(body, 'cbp-spmenu-push-toright');
            classie.toggle(menuLeft, 'cbp-spmenu-open');
            disableOther('showLeftPush');
        };

        function disableOther(button) {
            if (button !== 'showLeftPush') {
                classie.toggle(showLeftPush, 'disabled');
            }
        }
    </script>
    <script src="js/scripts.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.js"> </script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>

</html>